<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Memento System Controller
 *
 * This class handles System management related functionality
 *
 * @package		Admin
 * @subpackage	System
 * @author		dbcinfotech
 * @link		http://amlakgostar.ir
 */
require_once'google_translate.php';

class System_core extends CI_Controller {

    var $per_page = 10;

    public function __construct() {
        parent::__construct();
        is_installed(); #defined in auth helper
        checksavedlogin(); #defined in auth helper

        if (!is_admin()) {
            if (count($_POST) <= 0)
                $this->session->set_userdata('req_url', current_url());
            redirect(site_url('admin/auth'));
        }

        $this->per_page = get_per_page_value(); #defined in auth helper

        $this->load->model('system_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }

    public function index() {
        $this->allbackups();
    }

    #load all db backups view

    public function allbackups($start = 0) {
        $this->load->helper('directory');
        $map = directory_map('./assets/backups');
        $value['posts'] = $map;
        $data['title'] = 'مدیریت پشتیبان ها';
        $data['content'] = $this->load->view('admin/system/allbackups_view', $value, TRUE);
        $this->load->view('admin/template/template_view', $data);
    }

    #create db backup

    public function createbackup() {
        $this->system_model->create_db_backup();
        redirect(site_url('admin/system/allbackups'));
    }

    #restore db from a backup file

    public function restoredb($key = 0) {
        $this->load->helper('directory');
        $map = directory_map('./assets/backups');
        $file = $map[$key];
        $this->system_model->restore_db_backup($file);
        $this->session->set_flashdata('msg', '<div class="alert alert-success">دیتابیس بازخوانی گردید</div>');
        redirect(site_url('admin/system/allbackups'));
    }

    #download a backup file

    public function dlbackup($key = 0) {
        $this->load->helper('directory');
        $this->load->helper('file');
        $map = directory_map('./assets/backups');
        $file = $map[$key];
        $backup = read_file('assets/backups/' . $file);
        # Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($file, $backup);
    }

    #delete a db backup

    public function deletebackup($key) {
        $this->load->helper('directory');
        $map = directory_map('./assets/backups');
        $file = $map[$key];
        unlink('./assets/backups/' . $file);
        $this->session->set_flashdata('msg', '<div class="alert alert-success">پشتیبان حذف گردید</div>');
        redirect(site_url('admin/system/allbackups'));
    }

    #load webadmin settings , settings are saved as json data

    public function settings($key = 'webadmin_email') {
        $this->load->model('options_model');

        $settings = $this->options_model->getvalues($key);
        if ($settings == '') {
            $settings = array('contact_email' => '', 'webadmin_email' => '');
        }
        $settings = json_encode($settings);
        $value['settings'] = $settings;
        $data['title'] = 'تنظیمات مدیریتی';
        $data['content'] = $this->load->view('admin/settings/default_view', $value, TRUE);
        $this->load->view('admin/template/template_view', $data);
    }

    #save webadmin settings

    public function savesettings($key = 'webadmin_email') {
        $this->load->model('options_model');

        foreach ($_POST as $key => $value) {
            $this->form_validation->set_rules($key, $key, 'required');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->settings($key);
        } else {
            $data['values'] = json_encode($_POST);
            $res = $this->options_model->getvalues($key);
            if ($res == '') {
                $data['key'] = $key;
                $this->options_model->addvalues($data);
            } else
                $this->options_model->updatevalues($key, $data);


            $this->session->set_flashdata('msg', '<div class="alert alert-success">اطلاعات ذخیره گردید</div>');
            redirect(site_url('admin/system/settings/' . $key));
        }
    }

    #********* lang function *************#

    public function editasnewlang($id = '') {
        if ($this->input->post('sel_lang') != '')
            $id = $this->input->post('sel_lang');
        $all_langs = $this->system_model->get_all_langs();
        $lang = $this->system_model->get_lang_by_id($id);
        $data['title'] = 'زبان جدید';
        $data['content'] = $this->load->view('admin/langeditor/edit_as_new_lang_view', array('all_langs' => $all_langs, 'lang' => $lang), TRUE);
        $this->load->view('admin/template/template_view', $data);
    }

    public function addlang() {
        $lang_data = array();
        foreach ($_POST['lang_key'] as $key => $value) {
            $lang_data[$value] = $_POST['lang_text'][$key];
        }


        $data['lang'] = $this->input->post('lang');
        $data['file'] = $this->input->post('file');
        $data['unique_id'] = $data['lang'] . '-' . $data['file'];
        $data['values'] = json_encode($lang_data);
        $data['status'] = 1;

        $id = $this->system_model->addlang($data);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">اطلاعات اضافه گردید</div>');
        redirect(site_url('admin/system/editlang/' . $id));
    }

    public function editlang($id = '') {
        if ($this->input->post('sel_lang') != '')
            $id = $this->input->post('sel_lang');
        $all_langs = $this->system_model->get_all_langs();
        $lang = $this->system_model->get_lang_by_id($id);
        $data['title'] = ($id == '') ? 'مدیریت زبان' : 'ویرایش زبان';
        $data['content'] = $this->load->view('admin/langeditor/lang_view', array('all_langs' => $all_langs, 'lang' => $lang), TRUE);
        $this->load->view('admin/template/template_view', $data);
    }

    public function updatelang() {
        $this->form_validation->set_rules('lang', 'Lang name', 'required');
        $this->form_validation->set_rules('short_name', 'Short name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->editlang($this->input->post('id'));
        } else {

            $lang_data = array();
            foreach ($_POST['lang_key'] as $key => $value) {
                $lang_data[$value] = $_POST['lang_text'][$key];
            }

            $data['lang'] = $this->input->post('lang');
            $data['short_name'] = $this->input->post('short_name');
            $data['values'] = json_encode($lang_data);
            $data['status'] = 1;

            $id = $this->input->post('id');
            $this->system_model->update_lang_data($data, $id);

            $this->session->set_flashdata('msg', '<div class="alert alert-success">اطلاعات ذخیره گردید</div>');
            redirect(site_url('admin/system/editlang/' . $id));
        }
    }

    function deletelang($id = '', $confirmation = '') {
        if ($confirmation == '') {
            $data['content'] = $this->load->view('admin/confirmation_view', array('id' => $id, 'url' => site_url('admin/system/deletelang')), TRUE);
            $this->load->view('admin/template/template_view', $data);
        } else {
            if ($confirmation == 'yes') {
                $this->system_model->delete_lang_by_id($id);
                $this->session->set_flashdata('msg', '<div class="alert alert-success">اطلاعات حذف گردید</div>');
            }
            redirect(site_url('admin/system/editlang/'));
        }
    }

    #********* lang functions for developer use ************#

    public function newlang() {
        $data['title'] = 'زبان جدید';
        $data['content'] = $this->load->view('admin/langeditor/newlang_view', '', TRUE);
        $this->load->view('admin/template/template_view', $data);
    }

    function check_unique_short_name($str) {
        $res = $this->system_model->is_lang_short_name_unique($str);
        if ($res > 0) {
            $this->form_validation->set_message('check_unique_short_name', 'Short name needs to be unique');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function savelang() {
        $this->form_validation->set_rules('lang', 'Lang name', 'required');
        $this->form_validation->set_rules('short_name', 'Short name', 'required|callback_check_unique_short_name');

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id');
            if ($id == '')
                $this->newlang();
            else
                $this->editasnewlang($id);
        }
        else {
            $lang_data = array();
            foreach ($_POST['lang_key'] as $key => $value) {
                $lang_data[$value] = $_POST['lang_text'][$key];
            }


            $data['lang'] = $this->input->post('lang');
            $data['short_name'] = $this->input->post('short_name');
            $data['unique_id'] = $data['lang'] . '-' . $data['short_name'];
            $data['values'] = json_encode($lang_data);
            $data['status'] = 1;

            $this->system_model->addlang($data);

            $this->session->set_flashdata('msg', '<div class="alert alert-success">اطلاعات اضافه گردید</div>');
            redirect(site_url('admin/system/newlang/'));
        }
    }

    #*************** site settings  *****************#
    #load site settings , settings are saved as json data

    public function sitesettings($key = 'site_settings') {
        $this->load->model('options_model');

        $settings = $this->options_model->getvalues($key);
        if ($settings == '') {
            $settings = array('site_title' => '', 'site_lang' => '');
        }
        $settings = json_encode($settings);
        $value['settings'] = $settings;
        $value['langs'] = $this->system_model->get_all_lang();
        $data['title'] = 'تنظیمات سایت';
        $data['content'] = $this->load->view('admin/settings/site_view', $value, TRUE);
        $this->load->view('admin/template/template_view', $data);
    }

    #save site settings

    public function savesitesettings($key = 'site_settings') {
        $this->load->model('options_model');

        foreach ($_POST as $k => $value) {
            $this->form_validation->set_rules($k, $k, 'required');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->sitesettings($key);
        } else {
            $data['values'] = json_encode($_POST);
            $res = $this->options_model->getvalues($key);
            if ($res == '') {
                $data['key'] = $key;
                $this->options_model->addvalues($data);
            } else
                $this->options_model->updatevalues($key, $data);


            $this->session->set_flashdata('msg', '<div class="alert alert-success">اطلاعات ذخیره گردید</div>');
            redirect(site_url('admin/system/sitesettings/' . $key));
        }
    }

    #*************** site settings  *****************#
    #load email templates , settings are saved as json data

    public function emailtmpl($id = '') {
        $value['email'] = $this->system_model->get_email_by_id($id);
        $value['emails'] = $this->system_model->get_all_emails();
        $data['title'] = 'ویرایش متن ایمیل';
        $data['content'] = $this->load->view('admin/emailtmp/email_view', $value, TRUE);
        $this->load->view('admin/template/template_view', $data);
    }

    public function updateemail() {
        $email = array();
        $email['subject'] = $this->input->post('subject');
        $email['body'] = $this->input->post('body');
        $email['avl_vars'] = $this->input->post('avl_vars');

        $data['values'] = json_encode($email);
        $data['status'] = 1;

        $id = $this->input->post('id');
        $this->system_model->update_email_tmpl($data, $id);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">اطلاعات ذخیره گردید</div>');
        redirect(site_url('admin/system/emailtmpl/' . $id));
    }

    public function site_logo_uploader() {
        $this->load->view('admin/settings/logo_uploader_view');
    }

    public function upload_logo() {
        $config['upload_path'] = './assets/images/logo/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5120';

        $this->load->library('upload', $config);
        $this->upload->display_errors('', '');

        if ($this->upload->do_upload('photoimg')) {
            $data = $this->upload->data();
            $this->load->helper('date');
            $format = 'DATE_RFC822';
            $time = time();

            $media['media_name'] = $data['file_name'];
            $media['media_url'] = base_url() . 'assets/images/logo/' . $data['file_name'];
            $media['create_time'] = standard_date($format, $time);
            $media['status'] = 1;

            //create_square_thumb('./uploads/profile_photos/'.$data['file_name'],'./uploads/profile_photos/thumb/');

            $status['error'] = 0;
            $status['name'] = $data['file_name'];
        } else {
            $errors = $this->upload->display_errors();
            $errors = str_replace('<p>', '', $errors);
            $errors = str_replace('</p>', '', $errors);
            $status = array('error' => $errors, 'name' => '');
        }
        echo json_encode($status);
        die;
    }

    public function translate() {
        $value['all_langs'] = $this->system_model->get_all_langs();
        $data['title'] = 'ترجمه اتوماتیک';
        $data['content'] = $this->load->view('admin/langeditor/translate_view', $value, TRUE);
        $this->load->view('admin/template/template_view', $data);
    }

    #save webadmin settings

    public function translatelang() {
        $this->load->model('system_model');


        $this->form_validation->set_rules('base_lang', 'base lang', 'required');
        $this->form_validation->set_rules('target_lang_full_name', 'Taget lang full name', 'required');
        $this->form_validation->set_rules('target_lang_short_name', 'Taget lang short name', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->translate();
        } else {

            $base_lang = $this->input->post('base_lang');
            $target_lang_full_name = $this->input->post('target_lang_full_name');
            $target_lang_short_name = $this->input->post('target_lang_short_name');

            $target_lang = $this->input->post('target_lang');
            $base_seg = explode('-', $base_lang);

            $translator = new GoogleTranslate();

            $lang_data = $this->system_model->get_language_data($base_lang);
            $lang_data_array = json_decode($lang_data->values);
            $translate_array = $translator->get_translated_data_array($base_seg[1], $target_lang_short_name, $lang_data_array);


            $translated_data['unique_id'] = $target_lang_full_name . '-' . $target_lang_short_name;
            $translated_data['lang'] = $target_lang_full_name;
            $translated_data['short_name'] = $target_lang_short_name;
            $translated_data['values'] = json_encode($translate_array);
            $translated_data['status'] = 1;
            $this->system_model->add_or_update_lang($translated_data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">زبان ترجمه گردید</div>');
            redirect(site_url('admin/system/translate/'));
        }
    }

}

/* End of file system.php */
/* Location: ./application/modules/admin/controllers/admin/system.php */