<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Memento users Controller
 *
 * This class handles users management related functionality
 *
 * @package		Admin
 * @subpackage	users
 * @author		dbcinfotech
 * @link		http://amlakgostar.ir
 */
class Users_core extends CI_Controller {

    var $per_page = 3;

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
//        $this->per_page = 2;
        $this->load->model('users_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error input-xlarge">', '</div>');
    }

    public function index() {
        $this->all();
    }

    #load all services view with paging

    public function all($start = '0') {
        $value['posts'] = $this->users_model->get_all_users_by_range($start, $this->per_page, 'id');
        $total = $this->users_model->count_all_pages();
        $value['pages'] = configPagination('admin/users/all', $total, 5, $this->per_page);

        $data['title'] = 'کاربران';
        $data['content'] = $this->load->view('admin/users/allusers_view', $value, TRUE);
        $this->load->view('admin/template/template_view', $data);
    }

    public function ban_user($user_id = 0, $page = 1) {
        $this->users_model->ban_user($user_id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success">کاربر ممنوع گردید.</div>');
        redirect(site_url('admin/users/all/' . $page));
    }

    public function unban_user($user_id = 0, $page = 1) {
        $this->users_model->unban_user($user_id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success">کاربر از وضعیت ممنوع حذف گردید</div>');
        redirect(site_url('admin/users/all/' . $page));
    }

    public function update_menu() {
        add_option('top_menu', $this->input->post('top_menu'));
        $this->session->set_flashdata('msg', '<div class="alert alert-success">منو به روز گردید</div>');
        redirect(site_url('admin/page/menu'));
    }

    public function detail($id) {
        $value['profile'] = $this->users_model->get_user_by_id($id);
        $data['title'] = 'پروفایل کاربر';
        $data['content'] = $this->load->view('users/detail_view', $value, TRUE);
        $this->load->view('admin/template/template_view', $data);
    }

    public function banuser($page = '0', $id = '', $limit = '') {
        $this->load->model('user/user_model');
        if ($limit == 'forever') {
            $this->user_model->banuser($id, $limit);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">کاربر ممنوع گردید</div>');
            redirect(site_url('admin/userdetail/' . $id));
        }

        $this->form_validation->set_rules('limit', 'Limit', 'required|numeric|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->userdetail($id);
        } else {
            $limit = $this->input->post('limit');
            $this->user_model->banuser($id, $limit);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">کاربر ممنوع گردید</div>');
            redirect(site_url('admin/userdetail/' . $id));
        }
    }

}

/* End of file users.php */
/* Location: ./application/modules/admin/controllers/admin.php */