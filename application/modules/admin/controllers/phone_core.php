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

class Phone_core extends CI_Controller {

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
        $this->manage();
    }

    public function manage($id = '') {
        $values = array();
        if ($id != '') {
            $values['action_type'] = 'update';
            $values['page'] = $this->page_model->get_page_by_id($id);
        }
        $data['title'] = 'صفحه جدید';
        $data['content'] = $this->load->view('pages/page_view', $values, TRUE);
        $this->load->view('admin/template/template_view', $data);
    }

    public function count_all_undeleted($table) {
        $this->db->select('COUNT(*) AS `numrows`');
        $this->db->where(array(
            'delete' => '0'
        ));
        $query = $this->db->get($table);
        return $query->row()->numrows;
    }

    public function lists($start = 0) {

        //$this->output->enable_profiler();
        if (!is_admin()) {
            echo 'You dont have permission to access this page';
            return;
        }


        //var_dump($items);
        // die();
        // Load the subscribed phones
        $value = array();
        $value['phones'] = $this->get_all_phones($start, 10, 'id', 'desc');

        $total = $this->count_all_undeleted("phone");

        $value['pages'] = configPagination('admin/phone/lists', $total, 10, $this->per_page);

        $value['start'] = $start;

        $data['title'] = 'لیست شماره تماس ها';

        $data['content'] = $this->load->view('admin/phone/list_view', $value, TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    public function sent($start = 0) {

        //$this->output->enable_profiler();
        if (!is_admin()) {
            echo 'You dont have permission to access this page';
            return;
        }

        // Load the subscribed phones
        $value = array();
        $value['phones'] = $this->get_all_sentmessages($start, 10, 'id', 'desc');

        $total = $this->db->count_all("phone");

        $value['pages'] = configPagination('admin/phone/sent', $total, 10, $this->per_page);

        $value['start'] = $start;

        $data['title'] = 'شماره های ارسالی';

        $data['content'] = $this->load->view('admin/phone/sent_view', $value, TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    public function delete($id = '') {
        if (!is_admin()) {
            echo 'You dont have permission to access this page';
            die();
        }
        $value = array();
        $value["id"] = $id;

        if ($this->input->post("phone")) {
            // save to database
            $this->deletebyid($id, array("delete" => 1));
            $this->session->set_flashdata('msg', '<div class="alert alert-success">شماره تماس با موفقیت حذف گردید</div>');
            redirect(site_url('admin/phone/lists/' . 0));
        } else {


            $data['title'] = 'حذف شماره تماس';
            $data['content'] = $this->load->view('admin/phone/delete_view', $value, TRUE);
            $this->load->view('admin/template/template_view', $data);
        }
    }

    public function settings() {

        if (!is_admin()) {
            echo 'You dont have permission to access this page';
            die();
        }

        $rules = array(
            array(
                "field" => "smsnumber",
                "label" => "شماره ارسال پیامک",
                "rules" => "required|numeric"
            ),
            array(
                "field" => "username",
                "label" => "نام کاربری پنل پیامک",
                "rules" => "required|xss_clean|trim"
            ), array(
                "field" => "password",
                "label" => "رمز عبوی پنل پیامک",
                "rules" => "required|xss_clean|trim"
            ),
            array(
                "field" => "subscribetext",
                "label" => "متن ارسال عضویت در سامانه",
                "rules" => "required|xss_clean|trim"
            ),
            array(
                "field" => "bongahname",
                "label" => "نام بنگاه",
                "rules" => "required|xss_clean|trim"
            ),
            array(
                "field" => "enablesms",
                "label" => "فعال سازی ارسال پیامک",
                "rules" => "required|greater_than[-1]|less_than[2]"
            ), array(
                "field" => "callbackphone",
                "label" => "شماره تماس برگشتی",
                "rules" => "required|numeric|exact_length[11]"
            ),
        );
        $value = array();
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $subscribetext = $this->input->post("subscribetext");
            $smsnumber = $this->input->post("smsnumber");
            $enablesms = $this->input->post("enablesms");
            $callbackphone = $this->input->post("callbackphone");
            $bongahname = $this->input->post("bongahname");

            // save to database
            $this->db->update('phonesetting', array(
                "value" => $smsnumber
                    ), array(
                "name" => "smsnumber"
            ));

            $this->db->update('phonesetting', array(
                "value" => $subscribetext
                    ), array(
                "name" => "subscribetext"
            ));

            $this->db->update('phonesetting', array(
                "value" => $enablesms
                    ), array(
                "name" => "enablesms"
            ));

            $this->db->update('phonesetting', array(
                "value" => $callbackphone
                    ), array(
                "name" => "callbackphone"
            ));

            $this->db->update('phonesetting', array(
                "value" => $bongahname
                    ), array(
                "name" => "bongahname"
            ));

            $this->db->update('phonesetting', array(
                "value" => $username
                    ), array(
                "name" => "username"
            ));

            $this->db->update('phonesetting', array(
                "value" => $password
                    ), array(
                "name" => "passoword"
            ));


            $value['msg'] = '<div class="alert alert-success">اطلاعات شما با موفقیت ذخیره گردید</div>';
        }


        // SMS Number
        $value['smsnumber'] = $this->getSettings("smsnumber");

        // Subscribe Text
        $value['subscribetext'] = $this->getSettings("subscribetext");

        // User Name
        $value['username'] = $this->getSettings("username");

        // Password
        $value['password'] = $this->getSettings("password");

        // Enable SMS
        $value['enablesms'] = $this->getSettings("enablesms");

        // Callback Phone Number
        $value['callbackphone'] = $this->getSettings("callbackphone");

        // Bongah Name
        $value['bongahname'] = $this->getSettings("bongahname");


        $data['title'] = 'تنظیمات ارسال پیامک';
        $data['content'] = $this->load->view('admin/phone/setting_view', $value, TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    public function add() {

        if (!is_admin()) {
            echo 'You dont have permission to access this page';
            die();
        }

        $rules = array(
            array(
                "field" => "phone",
                "label" => "شماره تماس",
                "rules" => "required|numeric|exact_length[11]"
            ),
            array(
                "field" => "type",
                "label" => "نوع ملک",
                "rules" => "required|xss_clean"
            ),
            array(
                "field" => "purpose",
                "label" => "منظور ملک",
                "rules" => "required|xss_clean|trim"
            ),
            array(
                "field" => "bedstart",
                "label" => "حداقل خواب",
                "rules" => "required|greater_than[0]|less_than[12]"
            ),
            array(
                "field" => "bedend",
                "label" => "حداکثر خواب",
                "rules" => "required|greater_than[0]|less_than[12]"
            ),
            array(
                "field" => "salestart",
                "label" => "حداقل قیمت فروش",
                "rules" => "numeric|greater_than[0]"
            ),
            array(
                "field" => "saleend",
                "label" => "حداکثر قیمت فروش",
                "rules" => "numeric|greater_than[0]"
            ),
            array(
                "field" => "rahnstart",
                "label" => "حداقل رهن",
                "rules" => "numeric|greater_than[0]"
            ),
            array(
                "field" => "rahnend",
                "label" => "جداکثر رهن",
                "rules" => "numeric|greater_than[0]"
            ),
            array(
                "field" => "ejarestart",
                "label" => "حداقل اجاره",
                "rules" => "numeric|greater_than[0]"
            ),
            array(
                "field" => "ejareend",
                "label" => "حداکثر اجاره",
                "rules" => "numeric|greater_than[0]"
            )
        );

        $value = array();
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {

            $data["phonenumber"] = $_POST["phone"];
            $data["type"] = $_POST["type"];
            $data["purpose"] = $_POST["purpose"];
            $data["bedroomstart"] = $_POST["bedstart"];
            $data["bedroomend"] = $_POST["bedend"];
            $data["salestart"] = doubleval($_POST["salestart"]) > 0 ? $_POST["salestart"] : null;
            $data["saleend"] = doubleval($_POST["saleend"]) > 0 ? $_POST["saleend"] : null;
            $data["rahnstart"] = doubleval($_POST["rahnstart"]) > 0 ? $_POST["rahnstart"] : null;
            $data["rahnend"] = doubleval($_POST["rahnend"]) > 0 ? $_POST["rahnend"] : null;
            $data["ejarestart"] = doubleval($_POST["ejarestart"]) > 0 ? $_POST["ejarestart"] : null;
            $data["ejareend"] = doubleval($_POST["ejareend"]) > 0 ? $_POST["ejareend"] : null;
            $data["date"] = time();
            $data["receivedcount"] = 0;

            // save to database
            $this->db->insert('phone', $data);
            //$value['msg'] = '<div class="alert alert-success">شماره تماس با موفقیت اضافه گردید</div>';
            $this->session->set_flashdata('msg', '<div class="alert alert-success">شماره تماس با موفقیت اضافه گردید</div>');

            // we have to send sms to the user about new system
            if ((bool) ($this->getSettings("enablesms")) == true) {
                $this->sendSmsAboutAdd($_POST["phone"]);
            }

            redirect('admin/phone/add');
        }


        $data['title'] = 'افزودن شماره تماس';
        $data['content'] = $this->load->view('admin/phone/add_view', $value, TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    public function enablephone($page = '0', $id = '') {
        // enable phone status
        if (!is_admin()) {
            echo 'You don\'t have permission for this action';
            die;
        }

        $this->update_phone_by_id(array('status' => 1), $id);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">شماره تماس برای دریافت ملک فعال گردید</div>');

        redirect(site_url('admin/phone/lists/' . $page));
    }

    public function disablephone($page = '0', $id = '') {
        // enable phone status
        if (!is_admin()) {
            echo 'You don\'t have permission for this action';
            die;
        }

        $this->update_phone_by_id(array('status' => 0), $id);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">شماره تماس برای دریافت ملک غیر فعال گردید</div>');

        redirect(site_url('admin/phone/lists/' . $page));
    }

    function get_all_phones($start, $limit = 20, $order_by = 'id', $order_type = 'desc') {
        $this->db->order_by($order_by, $order_type);
        $query = $this->db->get_where('phone', array("delete" => 0), $limit, $start);
        return $query;
    }

    function get_all_sentmessages($start, $limit = 20, $order_by = 'id', $order_type = 'desc') {
        $this->db->order_by($order_by, $order_type);
        $query = $this->db->get_where('sentmessage', array(), $limit, $start);
        return $query;
    }

    public function update_phone_by_id($data, $id) {
        $this->db->update('phone', $data, array('id' => $id));
    }

    public function deletebyid($id, $data) {
        $this->db->update('phone', $data, array('id' => $id));
    }

    public function sendSmsAboutAdd($phone) {
        sendsms($phone, $this->getSettings("subscribetext"));
    }

    public function getSettings($name) {
        $row = $this->db->get_where("phonesetting", array("name" => $name))->row_array();
        return $row["value"];
    }

}
