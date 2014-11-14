<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * realestate realestate Controller

 *

 * This class handles only realestate related functionality

 *

 * @package		Admin

 * @subpackage	realestate

 * @author		dbcinfotech

 * @link		http://amlakgostar.ir

 */
class Realestate_core extends CI_Controller {

    var $per_page = 10;

    public function __construct() {

        parent::__construct();

        is_installed(); #defined in auth helper

        checksavedlogin(); #defined in auth helper

        if (!is_admin() && $this->session->userdata('user_type') != 2) {

            if (count($_POST) <= 0)
                $this->session->set_userdata('req_url', current_url());

            redirect(site_url('admin/auth'));
        }



        $this->per_page = get_per_page_value(); #defined in auth helper

        $this->load->helper('text');

        $this->load->model('show/show_model');

        $this->load->model('admin/realestate_model');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }

    public function index() {

        if (!is_admin()) {
            $this->allestatesagent();
        } else
            $this->allestates();
    }

    #approve a post

    public function approvepost($page = '0', $from = 'activeposts', $id = '', $confirmation = '') {
        if (!is_admin()) {
            echo 'You don\'t have permission to access this page';
            die;
        }

        $this->post_model->update_post_by_id(array('status' => 1), $id);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">پست پذیرفته گردید</div>');

        redirect(site_url('admin/memento/' . $from . '/' . $page));
    }

    #delete a properties

    public function deleteestate($page = '0', $id = '', $confirmation = '') {

        if (!is_admin()) {
            echo 'You don\'t have permission to access this page';
            die;
        }

        if ($confirmation == '') {

            $data['content'] = $this->load->view('admin/confirmation_view', array('id' => $id, 'url' => site_url('admin/realestate/deleteestate/' . $page)), TRUE);

            $this->load->view('admin/template/template_view', $data);
        } else {

            if ($confirmation == 'yes') {

                $this->realestate_model->delete_post_by_id($id);

                $this->session->set_flashdata('msg', '<div class="alert alert-success">پست حذف گردید</div>');
            }

            redirect(site_url('admin/realestate/allestates/' . $page));
        }
    }

    public function enablephone($page = '0', $id = '') {
        // enable phone status
        if (!is_admin()) {
            echo 'You don\'t have permission for this action';
            die;
        }

        $this->realestate_model->update_phone_by_id(array('status' => 1), $id);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">شماره تماس برای دریافت ملک فعال گردید</div>');

        redirect(site_url('admin/realestate/allestates/' . $page));
    }

    public function disablephone($page = '0', $id = '') {
        // enable phone status
        if (!is_admin()) {
            echo 'You don\'t have permission for this action';
            die;
        }

        $this->realestate_model->update_phone_by_id(array('status' => 0), $id);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">شماره تماس برای دریافت ملک غیر فعال گردید</div>');

        redirect(site_url('admin/realestate/allestates/' . $page));
    }

    public function approveestate($page = '0', $id = '', $confirmation = '') {

        if (!is_admin()) {
            echo 'You don\'t have permission for this action';
            die;
        }

        $this->realestate_model->update_post_by_id(array('status' => 1), $id);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">پست تایید گردید</div>');

        redirect(site_url('admin/realestate/allestates/' . $page));
    }

    #feature a service

    public function featurepost($page = '0', $id = '', $confirmation = '') {
        if (!is_admin()) {
            echo 'You don\'t have permission for this action';
            die;
        }

        $this->realestate_model->update_post_by_id(array('featured' => 1), $id);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">پست برجسته گردید</div>');

        redirect(site_url('admin/realestate/allestates/' . $page));
    }

    #feature a service

    public function removefeaturepost($page = '0', $id = '', $confirmation = '') {

        if (!is_admin()) {
            echo 'You don\'t have permission for this action';
            die;
        }

        $this->realestate_model->update_post_by_id(array('featured' => 0), $id);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">Post Un-Featured</div>');

        redirect(site_url('admin/realestate/allestates/' . $page));
    }

    public function bulkapprove($from = 'activeposts') {

        if (!is_admin()) {
            echo 'You don\'t have permission to access this page';
            die;
        }


        $data['status'] = 1;

        $this->post_model->bulk_update_post($data, $this->input->post('id'));

        $this->session->set_flashdata('msg', '<div class="alert alert-success">پست ها تایید گردیدند</div>');

        redirect(site_url('admin/memento/' . $from));
    }

    public function bulkdelete($from = 'activeposts') {

        if (!is_admin()) {
            echo 'You don\'t have permission to access this page';
            die;
        }

        $data['status'] = 0;

        $this->post_model->bulk_update_post($data, $this->input->post('id'));

        $this->session->set_flashdata('msg', '<div class="alert alert-success">پست حذف گردید</div>');

        redirect(site_url('admin/memento/' . $from));
    }

    #load site settings , settings are saved as json data

    public function realestatesettings($key = 'realestate_settings') {

        if (!is_admin()) {
            echo 'You don\'t have permission to access this page';
            die;
        }

        $this->load->model('admin/system_model');

        $this->load->model('options_model');



        $settings = $this->options_model->getvalues($key);

        $settings = json_encode($settings);

        $value['settings'] = $settings;

        $data['title'] = 'تنظیمات بنگاه';

        $data['content'] = $this->load->view('admin/estate/settings_view', $value, TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    #save site settings

    public function saverealestatesettings($key = 'realestate_settings') {

        if (!is_admin()) {
            echo 'You don\'t have permission to access this page';
            die;
        }

        $this->load->model('admin/system_model');

        $this->load->model('options_model');



        foreach ($_POST as $k => $value) {

            $rules = $this->input->post($k . '_rules');

            if ($rules != '')
                $this->form_validation->set_rules($k, $k, $rules);
        }



        if ($this->form_validation->run() == FALSE) {

            $this->realestatesettings($key);
        } else {

            $data['values'] = json_encode($_POST);

            $res = $this->options_model->getvalues($key);

            if ($res == '') {

                $data['key'] = $key;

                $this->options_model->addvalues($data);
            } else
                $this->options_model->updatevalues($key, $data);





            $this->session->set_flashdata('msg', '<div class="alert alert-success">اطلاعات به روز گردید</div>');

            redirect(site_url('admin/realestate/realestatesettings/' . $key));
        }
    }

    #load site settings , settings are saved as json data

    public function paypalsettings($key = 'paypal_settings') {

        if (!is_admin()) {
            echo 'You don\'t have permission to access this page';
            die;
        }

        $this->load->model('admin/system_model');

        $this->load->model('options_model');



        $settings = $this->options_model->getvalues($key);

        $settings = json_encode($settings);

        $value['settings'] = $settings;

        $data['title'] = 'تنظیمات پیپال';

        $data['content'] = $this->load->view('admin/estate/paypalsettings_view', $value, TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    #save site settings

    public function savepaypalsettings($key = 'paypal_settings') {

        if (!is_admin()) {
            echo 'You don\'t have permission to access this page';
            die;
        }

        $this->load->model('admin/system_model');

        $this->load->model('options_model');



        foreach ($_POST as $k => $value) {

            $rules = $this->input->post($k . '_rules');

            if ($rules != '')
                $this->form_validation->set_rules($k, $k, $rules);
        }



        if ($this->form_validation->run() == FALSE) {

            $this->paypalsettings($key);
        } else {

            $data['values'] = json_encode($_POST);

            $res = $this->options_model->getvalues($key);

            if ($res == '') {

                $data['key'] = $key;

                $this->options_model->addvalues($data);
            } else
                $this->options_model->updatevalues($key, $data);





            $this->session->set_flashdata('msg', '<div class="alert alert-success">اطلاعات به روز گردید</div>');

            redirect(site_url('admin/realestate/paypalsettings/' . $key));
        }
    }

    #load allestates view

    public function allestates($start = 0) {
        if (!is_admin()) {
            echo 'You dont have permission to access this page';
            return;
        }

        if (isset($_POST['filter_purpose'])) {

            $this->session->set_userdata('filter_purpose', $this->input->post('filter_purpose'));
        }


        if (isset($_POST['filter_beds'])) {

            $this->session->set_userdata('filter_beds', $this->input->post('filter_beds'));
        }



        if (isset($_POST['filter_type'])) {

            $this->session->set_userdata('filter_type', $this->input->post('filter_type'));
        }



        if (isset($_POST['filter_condition'])) {

            $this->session->set_userdata('filter_condition', $this->input->post('filter_condition'));
        }



        if (isset($_POST['filter_status'])) {

            $this->session->set_userdata('filter_status', $this->input->post('filter_status'));
        }



        if (isset($_POST['filter_orderby'])) {

            $this->session->set_userdata('filter_orderby', $this->input->post('filter_orderby'));
        }




        if (isset($_POST['filter_ordertype'])) {

            $this->session->set_userdata('filter_ordertype', $this->input->post('filter_ordertype'));
        }


        if (!isset($_POST['filter_orderby']) && !isset($_POST['filter_ordertype'])) {
            $this->session->set_userdata('filter_orderby', 'id');
            $this->session->set_userdata('filter_ordertype', 'DESC');
        }



        $value['posts'] = $this->realestate_model->get_all_estates_admin($start, $this->per_page, 'create_time', 'desc');


        // Load the subscribed phones
        $value['phones'] = $this->realestate_model->get_all_subscibed($start, $this->per_page, 'create_time', 'desc');


        $total = $this->realestate_model->count_all_estates_admin();

        $value['pages'] = configPagination('admin/realestate/allestates', $total, 5, $this->per_page);

        $value['start'] = $start;

        $data['title'] = 'تمامی املاک';

        $data['content'] = $this->load->view('admin/estate/all_estates_view', $value, TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    #load allestates view

    public function allestatesagent($start = 0) {

        if (isset($_POST['filter_purpose'])) {

            $this->session->set_userdata('filter_purpose', $this->input->post('filter_purpose'));
        }



        if (isset($_POST['filter_type'])) {

            $this->session->set_userdata('filter_type', $this->input->post('filter_type'));
        }



        if (isset($_POST['filter_condition'])) {

            $this->session->set_userdata('filter_condition', $this->input->post('filter_condition'));
        }



        if (isset($_POST['filter_status'])) {

            $this->session->set_userdata('filter_status', $this->input->post('filter_status'));
        }



        if (isset($_POST['filter_orderby'])) {

            $this->session->set_userdata('filter_orderby', $this->input->post('filter_orderby'));
        }



        if (isset($_POST['filter_ordertype'])) {

            $this->session->set_userdata('filter_ordertype', $this->input->post('filter_ordertype'));
        }



        $value['posts'] = $this->realestate_model->get_all_estates_agent($start, $this->per_page, 'create_time', 'desc');

        $total = $this->realestate_model->count_all_estates_agent();

        $value['pages'] = configPagination('admin/realestate/allestatesagent', $total, 5, $this->per_page);

        $value['start'] = $start;

        $data['title'] = 'تمامی املاک';

        $data['content'] = $this->load->view('admin/estate/all_estates_view', $value, TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    #load edit estate form

    function editestate($page = 0, $id = '') {

        $data['title'] = 'ویرایش ملک';

        $value['page'] = $page;

        $value['estate'] = $this->realestate_model->get_estate_by_id($id);

        $data['content'] = $this->load->view('admin/estate/edit_estate_view', $value, TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    #insert estate

    public function updateestate() {

        $id = $this->input->post('id');

        $page = $this->input->post('page');

        if (!$this->realestate_model->check_post_permission($id)) {

            $this->session->set_flashdata('msg', '<div class="alert alert-danger">You don\'t have permission to update this</div>');

            redirect(site_url('admin/realestate/editestate/' . $page . '/' . $id));
        }



        $dl = default_lang();

        $this->form_validation->set_rules('id', 'Id', 'required');

        $this->form_validation->set_rules('page', 'Page', 'required');

        $this->form_validation->set_rules('title' . $dl, 'Title', 'required');

        $this->form_validation->set_rules('description' . $dl, 'Description', 'required');

        $this->form_validation->set_rules('type', 'Type', 'required');

        $this->form_validation->set_rules('purpose', 'Purpose', 'required');

        $this->form_validation->set_rules('private_phone', 'Private Phone', 'required');

        $this->form_validation->set_rules('private_address', 'Private Address', 'required');

        $purpose = $this->input->post('purpose');

        $type = $this->input->post('type');



        $meta_search_text = '';  //meta information for simple searching



        if ($purpose == 'DBC_PURPOSE_SALE') {

            $this->form_validation->set_rules('total_price', 'Sales Price', 'required');

            $this->form_validation->set_rules('price_per_unit', 'Price per Unit', 'required');

            $this->form_validation->set_rules('price_unit', 'Price unit', 'required');



            $meta_search_text .= 'sale' . ' ';
        } elseif ($purpose == 'DBC_PURPOSE_RENT') {

            $this->form_validation->set_rules('rent_price', 'Rent Price', 'required');
            $this->form_validation->set_rules('rent_pricerahn', 'Rahn Price', 'required');

            $this->form_validation->set_rules('rent_price_unit', 'Rent Price unit', 'required');



            $meta_search_text .= 'sale' . ' ';
        } else {

            $this->form_validation->set_rules('total_price', 'Sales Price', 'required');

            $this->form_validation->set_rules('price_per_unit', 'Price per Unit', 'required');

            $this->form_validation->set_rules('price_unit', 'Price unit', 'required');

            $this->form_validation->set_rules('rent_price', 'Rent Price', 'required');

            $this->form_validation->set_rules('rent_pricerahn', 'Rahn Price', 'required');

            $this->form_validation->set_rules('rent_price_unit', 'Rent Price unit', 'required');
        }

        #price validation end



        if ($type == 'DBC_TYPE_APARTMENT') {

            $this->form_validation->set_rules('home_size', 'Home size', 'required');

            $this->form_validation->set_rules('home_size_unit', 'Home size unit', 'required');

            $this->form_validation->set_rules('bedroom', 'Bed rooms', 'required');

            $this->form_validation->set_rules('bath', 'Bathroom', 'required');

            $this->form_validation->set_rules('year_built', 'Year Built', 'required');



            $meta_search_text .= 'apartment' . ' ';
        } else if ($type == 'DBC_TYPE_HOUSE') {

            $this->form_validation->set_rules('home_size', 'سایز خانه', 'required');

            $this->form_validation->set_rules('home_size_unit', 'Home size unit', 'required');

            $this->form_validation->set_rules('lot_size', 'سایز زمین', 'required');

            $this->form_validation->set_rules('lot_size_unit', 'Lot size unit', 'required');

            $this->form_validation->set_rules('bedroom', 'تعداد اتاق خواب', 'required');

            $this->form_validation->set_rules('bath', 'تعداد حمام', 'required');

            $this->form_validation->set_rules('year_built', 'Year Built', 'required');



            $meta_search_text .= 'house' . ' ';
        } else if ($type == 'DBC_TYPE_LAND') {

            $this->form_validation->set_rules('lot_size', 'سایز زمین', 'required');

            $this->form_validation->set_rules('lot_size_unit', 'Lot size unit', 'required');



            $meta_search_text .= 'land' . ' ';
        } else if ($type == 'DBC_TYPE_COMSPACE') {

            $this->form_validation->set_rules('home_size', 'Home size', 'required');

            $this->form_validation->set_rules('home_size_unit', 'Home size unit', 'required');

            $this->form_validation->set_rules('year_built', 'Year Built', 'required');



            $meta_search_text .= 'comercial space' . ' ';
        } else if ($type == 'DBC_TYPE_CONDO') {

            $this->form_validation->set_rules('home_size', 'Home size', 'required');

            $this->form_validation->set_rules('home_size_unit', 'Home size unit', 'required');

            $this->form_validation->set_rules('bedroom', 'Bed rooms', 'required');

            $this->form_validation->set_rules('bath', 'Bathroom', 'required');

            $this->form_validation->set_rules('year_built', 'Year Built', 'required');



            $meta_search_text .= 'condo' . ' ';
        } else if ($type == 'DBC_TYPE_VILLA') {

            $this->form_validation->set_rules('home_size', 'Home size', 'required');

            $this->form_validation->set_rules('home_size_unit', 'Home size unit', 'required');

            $this->form_validation->set_rules('lot_size', 'Lot size', 'required');

            $this->form_validation->set_rules('lot_size_unit', 'Lot size unit', 'required');

            $this->form_validation->set_rules('bedroom', 'Bed rooms', 'required');

            $this->form_validation->set_rules('bath', 'Bathroom', 'required');

            $this->form_validation->set_rules('year_built', 'Year Built', 'required');



            $meta_search_text .= 'villa' . ' ';
        }







        $this->form_validation->set_rules('condition', 'Condition', 'required');

        $this->form_validation->set_rules('address', 'Address', 'required');

        $this->form_validation->set_rules('country', 'Country', 'required');

        //$this->form_validation->set_rules('selected_state', 'State/province', 'required');

        $this->form_validation->set_rules('state', 'State/province', 'required');

        //$this->form_validation->set_rules('selected_city', 'City/Twon', 'required');

        $this->form_validation->set_rules('city', 'City/Twon', 'required');

        $this->form_validation->set_rules('zip_code', 'Zip code', 'required');

        $this->form_validation->set_rules('latitude', 'Latitude', 'required');

        $this->form_validation->set_rules('longitude', 'Longitude', 'required');

        $this->form_validation->set_rules('featured_img', 'Featured image', 'required');





        if ($this->form_validation->run() == FALSE) {

            $this->editestate($page, $id);
        } else {

            $data = array();

            $data['type'] = $this->input->post('type');

            $data['purpose'] = $this->input->post('purpose');



            if ($purpose == 'DBC_PURPOSE_SALE') {

                $data['total_price'] = $this->input->post('total_price');

                $data['price_per_unit'] = $this->input->post('price_per_unit');

                $data['price_unit'] = $this->input->post('price_unit');
            } elseif ($purpose == 'DBC_PURPOSE_RENT') {

                $data['total_price'] = $this->input->post('rent_price');

                $data['rent_price'] = $this->input->post('rent_price');

                $data['rent_pricerahn'] = $this->input->post('rent_pricerahn');

                $data['rent_price_unit'] = $this->input->post('rent_price_unit');
            } else {

                $data['total_price'] = $this->input->post('total_price');

                $data['price_per_unit'] = $this->input->post('price_per_unit');

                $data['price_unit'] = $this->input->post('price_unit');

                $data['rent_price'] = $this->input->post('rent_price');

                $data['rent_pricerahn'] = $this->input->post('rent_pricerahn');

                $data['rent_price_unit'] = $this->input->post('rent_price_unit');
            }

            #price validation end



            if ($type == 'DBC_TYPE_APARTMENT') {

                $data['home_size'] = $this->input->post('home_size');

                $data['home_size_unit'] = $this->input->post('home_size_unit');

                $data['bedroom'] = $this->input->post('bedroom');

                $data['bath'] = $this->input->post('bath');

                $data['year_built'] = $this->input->post('year_built');



                $meta_search_text .= ' bedroom bathroom' . $data['bedroom'] . ' ' . $data['bath'] . ' ' . $data['year_built'];
            } else if ($type == 'DBC_TYPE_HOUSE') {

                $data['home_size'] = $this->input->post('home_size');

                $data['home_size_unit'] = $this->input->post('home_size_unit');

                $data['lot_size'] = $this->input->post('lot_size');

                $data['lot_size_unit'] = $this->input->post('lot_size_unit');

                $data['bedroom'] = $this->input->post('bedroom');

                $data['bath'] = $this->input->post('bath');

                $data['year_built'] = $this->input->post('year_built');



                $meta_search_text .= ' bedroom bathroom' . $data['bedroom'] . ' ' . $data['bath'] . ' ' . $data['year_built'];
            } else if ($type == 'DBC_TYPE_LAND') {

                $data['lot_size'] = $this->input->post('lot_size');

                $data['lot_size_unit'] = $this->input->post('lot_size_unit');
            } else if ($type == 'DBC_TYPE_COMSPACE') {

                $data['home_size'] = $this->input->post('home_size');

                $data['home_size_unit'] = $this->input->post('home_size_unit');

                $data['year_built'] = $this->input->post('year_built');



                $meta_search_text .= ' ' . $data['year_built'];
            } else if ($type == 'DBC_TYPE_CONDO') {

                $data['home_size'] = $this->input->post('home_size');

                $data['home_size_unit'] = $this->input->post('home_size_unit');

                $data['bedroom'] = $this->input->post('bedroom');

                $data['bath'] = $this->input->post('bath');

                $data['year_built'] = $this->input->post('year_built');



                $meta_search_text .= ' bedroom bathroom' . $data['bedroom'] . ' ' . $data['bath'] . ' ' . $data['year_built'];
            } else if ($type == 'DBC_TYPE_VILLA') {

                $data['home_size'] = $this->input->post('home_size');

                $data['home_size_unit'] = $this->input->post('home_size_unit');

                $data['lot_size'] = $this->input->post('lot_size');

                $data['lot_size_unit'] = $this->input->post('lot_size_unit');

                $data['bedroom'] = $this->input->post('bedroom');

                $data['bath'] = $this->input->post('bath');

                $data['year_built'] = $this->input->post('year_built');



                $meta_search_text .= ' bedroom bathroom' . $data['bedroom'] . ' ' . $data['bath'] . ' ' . $data['year_built'];
            }



            $data['estate_condition'] = $this->input->post('condition');

            $meta_search_text .= ' ' . $data['estate_condition'];



            $data['address'] = $this->input->post('address');

            $meta_search_text .= ' ' . $data['address'];



            $data['country'] = $this->input->post('country');

            $meta_search_text .= ' ' . $data['country'];



            $state_id = $this->realestate_model->get_location_id_by_name($this->input->post('state'), 'state', $data['country']);

            $data['state'] = $state_id;

            $meta_search_text .= ' ' . $this->input->post('state');



            $city_id = $this->realestate_model->get_location_id_by_name($this->input->post('city'), 'city', $state_id);

            $data['city'] = $city_id;

            $meta_search_text .= ' ' . $this->input->post('city');

            $data['private_phone'] = $this->input->post('private_phone');
            $data['private_mobile'] = $this->input->post('private_mobile');
            $data['private_address'] = $this->input->post('private_address');


            $data['zip_code'] = $this->input->post('zip_code');

            $data['latitude'] = $this->input->post('latitude');

            $data['longitude'] = $this->input->post('longitude');

            $facilities = ($this->input->post('facilities') == '') ? json_encode(array()) : json_encode($this->input->post('facilities'));

            $data['facilities'] = $facilities;

            $data['featured_img'] = $this->input->post('featured_img');

            $data['gallery'] = json_encode($this->input->post('gallery'));



            $this->load->helper('date');

            $format = 'DATE_RFC822';

            $time = time();



            //$data['create_time'] 	= standard_date($format, $time);

            $data['created_by'] = ($this->input->post('created_by') != '') ? $this->input->post('created_by') : $this->session->userdata('user_id');

            $data['status'] = 1;



            $this->realestate_model->update_estate($data, $id);



            $default_title = $this->input->post('title' . $dl);

            $meta_search_text .= ' ' . $default_title;



            $default_description = $this->input->post('description' . $dl);

            $meta_search_text .= ' ' . $default_description;


            $meta_search_text .= $this->input->post('tags');

            #collecting meta information for simple searching is complete
            #now update the post table with the information

            $data = array();

            $data['search_meta'] = $meta_search_text;

            $this->realestate_model->update_estate($data, $id);



            $this->load->model('admin/system_model');

            $query = $this->system_model->get_all_langs();

            $active_languages = $query->result();



            $data = array();

            $data['post_id'] = $id;

            $data['key'] = 'title';

            $data['status'] = 1;



            $value = array();

            foreach ($active_languages as $row) {



                $title = $this->input->post('title' . $row->short_name);

                $value[$row->short_name] = $title;
            }



            $data['value'] = json_encode($value);

            $this->realestate_model->update_estate_meta($data, $id, 'title');



            $data = array();

            $data['post_id'] = $id;

            $data['key'] = 'description';

            $data['status'] = 1;



            $value = array();

            foreach ($active_languages as $row) {



                $description = $this->input->post('description' . $row->short_name);

                $value[$row->short_name] = $description;
            }



            $data['value'] = json_encode($value);

            $this->realestate_model->update_estate_meta($data, $id, 'description');


            add_post_meta($id, 'tags', $this->input->post('tags'));
            add_post_meta($id, 'video_url', $this->input->post('video_url'));


            if ($purpose == 'DBC_PURPOSE_RENT') {
                add_post_meta($id, 'from_rent_date', $this->input->post('from_date'));
                add_post_meta($id, 'to_rent_date', $this->input->post('to_date'));
            }

            $this->session->set_flashdata('msg', '<div class="alert alert-success">ملک به روز گردید</div>');

            redirect(site_url('admin/realestate/editestate/' . $page . '/' . $id));
        }
    }

    function if_have_create_permission() {

        if (is_admin())
            return 1;



        if (get_settings('realestate_settings', 'enable_pricing', 'Yes') == 'Yes') {

            $this->load->helper('date');

            $user_id = $this->session->userdata('user_id');

            $datestring = "%Y-%m-%d";

            $time = time();

            $today = mdate($datestring, $time);

            if (strtotime($today) > strtotime(get_user_meta($user_id, 'expirtion_date')))
                return 2;



            $user_package = get_user_meta($user_id, 'current_package', '');

            if ($user_package == '')
                return 3;



            $this->load->model('admin/package_model');

            $package = $this->package_model->get_package_by_id($user_package);


            if (get_user_meta($user_id, 'post_count', 0) + 1 > $package->max_post)
                return 4;

            return 1;
        } else
            return 1;
    }

    #load new estate form

    function newestate() {

        $res = $this->if_have_create_permission();

        if ($res != 1) {

            if ($res == 2)
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">You\'re package is expired. Please renew</div>');

            elseif ($res == 3)
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">No package data found. Please choose a package.</div>');

            elseif ($res == 4)
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">Your maximum posting limit is over. Please renew.</div>');

            redirect(site_url('account/renew'));
        }



        $data['title'] = 'ساخت ملاک جدید';

        $data['content'] = $this->load->view('admin/estate/new_estate_view', '', TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    #insert estate

    public function addestate() {


        $searchquery = array();



        $dl = default_lang();

        $this->form_validation->set_rules('title' . $dl, 'Title', 'required');

        $this->form_validation->set_rules('description' . $dl, 'Description', 'required');

        $this->form_validation->set_rules('type', 'Type', 'required');

        $this->form_validation->set_rules('purpose', 'Purpose', 'required');

        $purpose = $this->input->post('purpose');

        $type = $this->input->post('type');



        $meta_search_text = '';  //meta information for simple searching



        if ($purpose == 'DBC_PURPOSE_SALE') {

            $this->form_validation->set_rules('total_price', 'Sales Price', 'required');

            $this->form_validation->set_rules('price_per_unit', 'Price per Unit', 'required');

            $this->form_validation->set_rules('price_unit', 'Price unit', 'required');



            $meta_search_text .= 'sale' . ' ';
        } elseif ($purpose == 'DBC_PURPOSE_RENT') {

            $this->form_validation->set_rules('rent_price', 'Rent Price', 'required');

            $this->form_validation->set_rules('rent_pricerahn', 'Rahn Price', 'required');

            $this->form_validation->set_rules('rent_price_unit', 'Rent Price unit', 'required');



            $meta_search_text .= 'rent' . ' ';
        } else {

            $this->form_validation->set_rules('total_price', 'Sales Price', 'required');

            $this->form_validation->set_rules('price_per_unit', 'Price per Unit', 'required');

            $this->form_validation->set_rules('price_unit', 'Price unit', 'required');

            $this->form_validation->set_rules('rent_price', 'Rent Price', 'required');

            $this->form_validation->set_rules('rent_pricerahn', 'Rahn Price', 'required');

            $this->form_validation->set_rules('rent_price_unit', 'Rent Price unit', 'required');
        }

        #price validation end



        if ($type == 'DBC_TYPE_APARTMENT') {

            $this->form_validation->set_rules('home_size', 'Home size', 'required');

            $this->form_validation->set_rules('home_size_unit', 'Home size unit', 'required');

            $this->form_validation->set_rules('bedroom', 'Bed rooms', 'required');

            $this->form_validation->set_rules('bath', 'Bathroom', 'required');

            $this->form_validation->set_rules('year_built', 'Year Built', 'required');



            $meta_search_text .= 'apartment' . ' ';
        } else if ($type == 'DBC_TYPE_HOUSE') {

            $this->form_validation->set_rules('home_size', 'Home size', 'required');

            $this->form_validation->set_rules('home_size_unit', 'Home size unit', 'required');

            $this->form_validation->set_rules('lot_size', 'Lot size', 'required');

            $this->form_validation->set_rules('lot_size_unit', 'Lot size unit', 'required');

            $this->form_validation->set_rules('bedroom', 'Bed rooms', 'required');

            $this->form_validation->set_rules('bath', 'Bathroom', 'required');

            $this->form_validation->set_rules('year_built', 'Year Built', 'required');



            $meta_search_text .= 'house' . ' ';
        } else if ($type == 'DBC_TYPE_LAND') {

            $this->form_validation->set_rules('lot_size', 'Lot size', 'required');

            $this->form_validation->set_rules('lot_size_unit', 'Lot size unit', 'required');



            $meta_search_text .= 'land' . ' ';
        } else if ($type == 'DBC_TYPE_COMSPACE') {

            $this->form_validation->set_rules('home_size', 'Home size', 'required');

            $this->form_validation->set_rules('home_size_unit', 'Home size unit', 'required');

            $this->form_validation->set_rules('year_built', 'Year Built', 'required');



            $meta_search_text .= 'comercial space' . ' ';
        } else if ($type == 'DBC_TYPE_CONDO') {

            $this->form_validation->set_rules('home_size', 'Home size', 'required');

            $this->form_validation->set_rules('home_size_unit', 'Home size unit', 'required');

            $this->form_validation->set_rules('bedroom', 'Bed rooms', 'required');

            $this->form_validation->set_rules('bath', 'Bathroom', 'required');

            $this->form_validation->set_rules('year_built', 'Year Built', 'required');



            $meta_search_text .= 'condo' . ' ';
        } else if ($type == 'DBC_TYPE_VILLA') {

            $this->form_validation->set_rules('home_size', 'Home size', 'required');

            $this->form_validation->set_rules('home_size_unit', 'Home size unit', 'required');

            $this->form_validation->set_rules('lot_size', 'Lot size', 'required');

            $this->form_validation->set_rules('lot_size_unit', 'Lot size unit', 'required');

            $this->form_validation->set_rules('bedroom', 'Bed rooms', 'required');

            $this->form_validation->set_rules('bath', 'Bathroom', 'required');

            $this->form_validation->set_rules('year_built', 'Year Built', 'required');



            $meta_search_text .= 'villa' . ' ';
        }



        $this->form_validation->set_rules('private_phone', 'Private Phone', 'required');

        $this->form_validation->set_rules('private_address', 'Private Address', 'required');



        $this->form_validation->set_rules('condition', 'Condition', 'required');

        $this->form_validation->set_rules('address', 'Address', 'required');

        $this->form_validation->set_rules('country', 'Country', 'required');

        //$this->form_validation->set_rules('selected_state', 'State/province', 'required');

        $this->form_validation->set_rules('state', 'State/province', 'required');

        //$this->form_validation->set_rules('selected_city', 'City/Twon', 'required');

        $this->form_validation->set_rules('city', 'City/Twon', 'required');

        $this->form_validation->set_rules('zip_code', 'Zip code', 'required');

        $this->form_validation->set_rules('latitude', 'Latitude', 'required');

        $this->form_validation->set_rules('longitude', 'Longitude', 'required');

        $this->form_validation->set_rules('featured_img', 'Featured image', 'required');





        if ($this->form_validation->run() == FALSE) {

            $this->newestate();
        } else {

            $data = array();

            $data['unique_id'] = uniqid();

            $data['type'] = $this->input->post('type');

            $data['purpose'] = $this->input->post('purpose');



            if ($purpose == 'DBC_PURPOSE_SALE') {

                $data['total_price'] = $this->input->post('total_price');

                $data['price_per_unit'] = $this->input->post('price_per_unit');

                $data['price_unit'] = $this->input->post('price_unit');
            } elseif ($purpose == 'DBC_PURPOSE_RENT') {

                $data['total_price'] = $this->input->post('rent_price');

                $data['rent_price'] = $this->input->post('rent_price');

                $data['rent_pricerahn'] = $this->input->post('rent_pricerahn');

                $data['rent_price_unit'] = $this->input->post('rent_price_unit');
            } else {

                $data['total_price'] = $this->input->post('total_price');

                $data['price_per_unit'] = $this->input->post('price_per_unit');

                $data['price_unit'] = $this->input->post('price_unit');

                $data['rent_price'] = $this->input->post('rent_price');

                $data['rent_pricerahn'] = $this->input->post('rent_pricerahn');

                $data['rent_price_unit'] = $this->input->post('rent_price_unit');
            }

            #price validation end



            if ($type == 'DBC_TYPE_APARTMENT') {

                $data['home_size'] = $this->input->post('home_size');

                $data['home_size_unit'] = $this->input->post('home_size_unit');

                $data['bedroom'] = $this->input->post('bedroom');

                $data['bath'] = $this->input->post('bath');

                $data['year_built'] = $this->input->post('year_built');



                $meta_search_text .= ' bedroom bathroom' . $data['bedroom'] . ' ' . $data['bath'] . ' ' . $data['year_built'];
            } else if ($type == 'DBC_TYPE_HOUSE') {

                $data['home_size'] = $this->input->post('home_size');

                $data['home_size_unit'] = $this->input->post('home_size_unit');

                $data['lot_size'] = $this->input->post('lot_size');

                $data['lot_size_unit'] = $this->input->post('lot_size_unit');

                $data['bedroom'] = $this->input->post('bedroom');

                $data['bath'] = $this->input->post('bath');

                $data['year_built'] = $this->input->post('year_built');



                $meta_search_text .= ' bedroom bathroom' . $data['bedroom'] . ' ' . $data['bath'] . ' ' . $data['year_built'];
            } else if ($type == 'DBC_TYPE_LAND') {

                $data['lot_size'] = $this->input->post('lot_size');

                $data['lot_size_unit'] = $this->input->post('lot_size_unit');
            } else if ($type == 'DBC_TYPE_COMSPACE') {

                $data['home_size'] = $this->input->post('home_size');

                $data['home_size_unit'] = $this->input->post('home_size_unit');

                $data['year_built'] = $this->input->post('year_built');



                $meta_search_text .= ' ' . $data['year_built'];
            } else if ($type == 'DBC_TYPE_CONDO') {

                $data['home_size'] = $this->input->post('home_size');

                $data['home_size_unit'] = $this->input->post('home_size_unit');

                $data['bedroom'] = $this->input->post('bedroom');

                $data['bath'] = $this->input->post('bath');

                $data['year_built'] = $this->input->post('year_built');



                $meta_search_text .= ' bedroom bathroom' . $data['bedroom'] . ' ' . $data['bath'] . ' ' . $data['year_built'];
            } else if ($type == 'DBC_TYPE_VILLA') {

                $data['home_size'] = $this->input->post('home_size');

                $data['home_size_unit'] = $this->input->post('home_size_unit');

                $data['lot_size'] = $this->input->post('lot_size');

                $data['lot_size_unit'] = $this->input->post('lot_size_unit');

                $data['bedroom'] = $this->input->post('bedroom');

                $data['bath'] = $this->input->post('bath');

                $data['year_built'] = $this->input->post('year_built');



                $meta_search_text .= ' bedroom bathroom' . $data['bedroom'] . ' ' . $data['bath'] . ' ' . $data['year_built'];
            }



            $data['estate_condition'] = $this->input->post('condition');

            $meta_search_text .= ' ' . $data['estate_condition'];



            $data['address'] = $this->input->post('address');

            $meta_search_text .= ' ' . $data['address'];



            $data['country'] = $this->input->post('country');

            $meta_search_text .= ' ' . $data['country'];



            $state_id = $this->realestate_model->get_location_id_by_name($this->input->post('state'), 'state', $data['country']);

            $data['state'] = $state_id;

            $meta_search_text .= ' ' . $this->input->post('state');



            $city_id = $this->realestate_model->get_location_id_by_name($this->input->post('city'), 'city', $state_id);

            $data['city'] = $city_id;

            $meta_search_text .= ' ' . $this->input->post('city');



            $data['zip_code'] = $this->input->post('zip_code');

            $data['latitude'] = $this->input->post('latitude');

            $data['longitude'] = $this->input->post('longitude');

            $data['facilities'] = json_encode($this->input->post('facilities'));

            $data['featured_img'] = $this->input->post('featured_img');

            $data['private_phone'] = $this->input->post('private_phone');
            $data['private_mobile'] = $this->input->post('private_mobile');
            $data['private_address'] = $this->input->post('private_address');

            $this->load->helper('date');

            $format = 'DATE_RFC822';

            $time = time();

            $data['create_time'] = standard_date($format, $time);

            $data['created_by'] = ($this->input->post('created_by') != '') ? $this->input->post('created_by') : $this->session->userdata('user_id');

            $publish_directly = get_settings('memento_settings', 'publish_directly', 'Yes');

            $data['status'] = ($publish_directly == 'Yes') ? 1 : 2; // 2 = pending

            $data['adddate'] = time() . "";

            $id = $this->realestate_model->insert_estate($data);

            $default_title = $this->input->post('title' . $dl);

            $meta_search_text .= ' ' . $default_title;

            $default_description = $this->input->post('description' . $dl);

            $meta_search_text .= ' ' . $default_description;

            $meta_search_text .= $this->input->post('tags');
            #collecting meta information for simple searching is complete
            #now update the post table with the information

            $data = array();

            $data['search_meta'] = $meta_search_text;

            $this->realestate_model->update_estate($data, $id);


            $this->load->model('admin/system_model');

            $query = $this->system_model->get_all_langs();

            $active_languages = $query->result();



            $data = array();

            $data['post_id'] = $id;

            $data['key'] = 'title';

            $data['status'] = 1;



            $value = array();

            foreach ($active_languages as $row) {

                $title = $this->input->post('title' . $row->short_name);

                $value[$row->short_name] = $title;
            }


            $data['value'] = json_encode($value);

            $this->realestate_model->insert_estate_meta($data);

            $data = array();

            $data['post_id'] = $id;

            $data['key'] = 'description';

            $data['status'] = 1;

            $value = array();

            foreach ($active_languages as $row) {



                $description = $this->input->post('description' . $row->short_name);

                $value[$row->short_name] = $description;
            }



            $data['value'] = json_encode($value);

            $this->realestate_model->insert_estate_meta($data);

            add_post_meta($id, 'tags', $this->input->post('tags'));

            if ($purpose == 'DBC_PURPOSE_RENT') {
                add_post_meta($id, 'from_rent_date', $this->input->post('from_date'));
                add_post_meta($id, 'to_rent_date', $this->input->post('to_date'));
            }

            #increase users post count

            $user_id = $this->session->userdata('user_id');

            $post_count = get_user_meta($user_id, 'post_count', 0);

            $post_count++;

            add_user_meta($user_id, 'post_count', $post_count);


            $flashmessage = '<div class="alert alert-success">ملک اضافه گردید</div>';


            // get subscribed phones based on the items
            $subscribePhones = $this->findAllItems($purpose, $type, $this->input->post('bedroom'), $this->input->post('rent_price'), $this->input->post('rent_pricerahn'), $this->input->post('total_price'));
            $SUBCOUNT = count($subscribePhones);
            $flashmessage .= "<div class='alert alert-success'>$SUBCOUNT مشتری متناسب با ملک اضافه گردیده دریافت شد</div>";

            if ((bool) ($this->getSettings("enablesms")) == true && count($subscribePhones) > 0) {

                // generate estate infos
                $estateInfo = $this->generatePropertyMessage($id, $purpose, $type, $this->input->post('bedroom'), $this->input->post('rent_price'), $this->input->post('rent_pricerahn'), $this->input->post('total_price'), $this->input->post('address'), $this->input->post('lot_size'), $this->input->post('home_size'));

                // Generate List of phones that we have to sned message
                $phones = array();
                foreach ($subscribePhones as $user) {
                    $phones[] = $user->phonenumber;
                }

                // sne dthe phone to sers
                sendsms($phones, $this->getSmsMessage($estateInfo));

                // increase user received count
                foreach ($subscribePhones as $user) {
                    $this->db->set("receivedcount", "receivedcount+1", FALSE);
                    $this->db->where("id", $user->id);
                    $this->db->update("phone");
                }

                $flashmessage .= "<div class='alert alert-success'>مشتریان متناسب با ملک توسط پیامک مطلع گردیدند</div>";
            }

            $this->session->set_flashdata('msg', $flashmessage);
            redirect(site_url('admin/realestate/editestate/0/' . $id));
        }
    }

    public function generatePropertyMessage($id, $purpose, $type, $beds, $ejare, $rahn, $sale, $address, $lotsize, $homesize) {
        $message = "";


        switch ($type) {
            case "DBC_TYPE_APARTMENT":
                $message.="آپارتمان" . "،";
                break;
            case "DBC_TYPE_HOUSE":
                $message.="خانه" . "،";
                break;
            case "DBC_TYPE_LAND":
                $message.="زمین" . "،";
                break;
            case "DBC_TYPE_COMSPACE":
                $message.="دفتر کار" . "،";
                break;
            case "DBC_TYPE_CONDO":
                $message.="محل سکونت" . "،";
                break;
            case "DBC_TYPE_VILLA":
                $message.="ویلا" . "،";
                break;
            default:
                break;
        }


        switch ($type) {
            case "DBC_TYPE_APARTMENT":
                $message.= $beds . " خوابه" . "،";
                $message.= "زیربنا" . $homesize . " مترمربع" . "،";
                break;
            case "DBC_TYPE_HOUSE":
                $message.= $beds . " خوابه" . "،";
                $message.= "متراژ" . $lotsize . " مترمربع" . "،";
                $message.= "زیربنا" . $homesize . " مترمربع" . "،";
                break;
            case "DBC_TYPE_LAND":
                $message.= $lotsize . " متری" . "،";
                break;
            case "DBC_TYPE_COMSPACE":
                $message.="دفتر کار" . "،";
                $message.= "متراژ" . $homesize . " مترمربع" . "،";
                break;
            case "DBC_TYPE_CONDO":
                $message.= $beds . " خوابه" . "،";
                break;
            case "DBC_TYPE_VILLA":
                $message.= $beds . " خوابه" . "،";
                $message.= $lotsize . " متری" . "،";
                break;
            default:
                break;
        }


        switch ($purpose) {
            case "DBC_PURPOSE_SALE":
                $message.= "جهت فروش" . " ";
                $message .= "به مبلغ " . show_price($sale) . " ،";
                break;
            case "DBC_PURPOSE_RENT":
                $message.= "جهت رهن و اجاره" . " ";
                $message .= "به رهن " . show_price($rahn) . " و اجاره" . show_price($ejare) . " ،";
                break;
            case "DBC_PURPOSE_BOTH":
                $message.= "جهت اجاره و فروش" . " ";
                $message .= "به مبلغ " . show_price($sale) . " ";
                $message .= "به رهن " . show_price($rahn) . " و اجاره" . show_price($ejare) . " ،";
                break;
            default:
                break;
        }


        $message.= "واقع در" . " " . $address . "." . " کد ملک: " . $id;

        return $message;
    }

    public function findAllItems($purpose, $type, $beds, $ejare, $rahn, $sale) {

        // Purpose Filter
        if ($purpose == "DBC_PURPOSE_BOTH") {
            $this->db->where_in("purpose", array(
                "DBC_PURPOSE_SALE",
                "DBC_PURPOSE_RENT",
                "DBC_PURPOSE_BOTH"
            ));
        } else {
            $this->db->where("purpose", $purpose);
        }

        // Bedroom Filter
        if ($type == "DBC_TYPE_APARTMENT" || $type == "DBC_TYPE_HOUSE" || $type == "DBC_TYPE_VILLA") {
            $this->db->where("bedroomstart <=", $beds);
            $this->db->where("bedroomend >=", $beds);
        }


        // Ejare Price Filter
        if ($purpose == "DBC_PURPOSE_SALE") {

            $this->db->where("salestart <=", $sale);
            $this->db->where("saleend >=", $sale);
            $this->db->or_where("saleend", null);
        } else if ($purpose == "DBC_PURPOSE_RENT") {

            // rahn
            $this->db->where("rahnstart <=", $rahn);
            $this->db->where("rahnend >=", $rahn);
            $this->db->or_where("rahnend", null);
            // ejare
            $this->db->where("ejarestart <=", $ejare);
            $this->db->where("ejareend >=", $ejare);
            $this->db->or_where("ejareend", null);
        } else if ($purpose == "DBC_PURPOSE_BOTH") {
            // rahn
            $this->db->where("rahnstart <=", $rahn);
            $this->db->where("rahnend >=", $rahn);
            $this->db->or_where("rahnend", null);

            // ejare
            $this->db->where("ejarestart <=", $ejare);
            $this->db->where("ejareend >=", $ejare);
            $this->db->or_where("ejareend", null);


            $this->db->where("salestart <=", $sale);
            $this->db->where("saleend >=", $sale);
            $this->db->or_where("saleend", null);
        }

        $this->db->where("delete", "0");
        $this->db->where("status", "1");
        
        $this->db->group_by("phonenumber");

        return $this->db->get_where("phone", array(
                    "type" => "DBC_TYPE_APARTMENT",
                ))->result();
    }

    public function getSmsMessage($estateinfo) {

        $bonphone = $this->getSettings("callbackphone");
        $bname = $this->getSettings("bongahname");

        $msg = "";
        $msg .= "مشتری گرامی، ملک جدیدی مطابق با نیاز شما به بنگاه سپرده گردید";
        $msg .= "\r\n";
        $msg .= "\r\n";
        $msg .= $estateinfo;
        $msg .= "\r\n";
        $msg .= "\r\n";
        $msg .= "برای کسب اطلاعات بیشتر با شماره $bonphone تماس بگرید.
با تشکر،بنگاه $bname";

        return $msg;
    }

    public function getSettings($name) {
        $row = $this->db->get_where("phonesetting", array("name" => $name))->row_array();
        return $row["value"];
    }

    public function get_states_ajax($term = '') {

        if ($term == '')
            $term = $this->input->post('term');

        $country = $this->input->post('country');

        $data = $this->realestate_model->get_locations_json($term, 'state', $country);

        echo json_encode($data);
    }

    public function get_cities_ajax($term = '') {

        if ($term == '')
            $term = $this->input->post('term');

        $state = $this->input->post('state');

        $data = $this->realestate_model->get_locations_json($term, 'city', $state);

        echo json_encode($data);
    }

    public function locations($start = '0') {

        $data['title'] = 'تمامی موقعیت ها';

        $value['posts'] = $this->realestate_model->get_all_locations_by_range($start, $this->per_page, 'id');

        $total = $this->realestate_model->count_all_locations();

        $value['pages'] = configPagination('admin/realestate/locations', $total, 5, $this->per_page);



        $data['content'] = $this->load->view('admin/estate/all_locations_view', $value, TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    public function newlocation($type = 'country') {

        $value['type'] = $type;

        $value['countries'] = $this->realestate_model->get_locations_by_type('country');

        $value['states'] = $this->realestate_model->get_locations_by_type('state');

        $this->load->view('admin/estate/new_location_view', $value);
    }

    public function savelocation() {

        if (!is_admin()) {
            echo 'You don\'t have permission to access this page';
            die;
        }

        $this->form_validation->set_rules('type', 'Type', 'required');

        $type = $this->input->post('type');

        if ($type == 'state' || $type == 'city')
            $this->form_validation->set_rules('country', 'Country', 'required');



        if ($type == 'city') {

            $this->form_validation->set_rules('country', 'Country', 'required');

            $this->form_validation->set_rules('state', 'State', 'required');
        }



        $this->form_validation->set_rules('locations', 'Names', 'required');



        if ($this->form_validation->run() == FALSE) {

            $this->newlocation($type);
        } else {

            $locations = $this->input->post('locations');

            $locations_array = explode(',', $locations);

            if ($type == 'country')
                $parent = 0;

            elseif ($type == 'state')
                $parent = $this->input->post('country');

            elseif ($type == 'city')
                $parent = $this->input->post('state');



            foreach ($locations_array as $location) {

                $data = array();

                $data['name'] = $location;

                $data['type'] = $type;

                $data['parent'] = $parent;

                $data['status'] = 1;

                $this->realestate_model->insert_location($data);
            }





            $this->session->set_flashdata('msg', '<div class="alert alert-success">اطلاعات اضافه گردید</div>');

            redirect(site_url('admin/realestate/newlocation'));
        }
    }

    public function editlocation($type = 'country', $id = '') {

        if (!is_admin()) {
            echo 'You don\'t have permission to access this page';
            die;
        }

        $value['type'] = $type;

        $value['editlocation'] = $this->realestate_model->get_location_by_id($id);

        $value['countries'] = $this->realestate_model->get_locations_by_type('country');

        $value['states'] = $this->realestate_model->get_locations_by_type('state');

        $this->load->view('admin/estate/edit_location_view', $value);
    }

    public function updatelocation() {

        if (!is_admin()) {
            echo 'You don\'t have permission to access this page';
            die;
        }

        $this->form_validation->set_rules('type', 'Type', 'required');

        $id = $this->input->post('id');

        $type = $this->input->post('type');

        if ($type == 'state' || $type == 'city')
            $this->form_validation->set_rules('country', 'Country', 'required');



        if ($type == 'city') {

            $this->form_validation->set_rules('country', 'Country', 'required');

            $this->form_validation->set_rules('state', 'State', 'required');
        }



        $this->form_validation->set_rules('location', 'Name', 'required');



        if ($this->form_validation->run() == FALSE) {

            $this->editlocation($type, $id);
        } else {

            if ($type == 'country')
                $parent = 0;

            elseif ($type == 'state')
                $parent = $this->input->post('country');

            elseif ($type == 'city')
                $parent = $this->input->post('state');



            $data = array();

            $data['name'] = $this->input->post('location');

            $data['type'] = $type;

            $data['parent'] = $parent;

            $data['status'] = 1;

            $this->realestate_model->update_location($data, $id);





            $this->session->set_flashdata('msg', '<div class="alert alert-success">اطلاعات ذخیره گردید</div>');

            redirect(site_url('admin/realestate/editlocation/' . $type . '/' . $id));
        }
    }

    #delete a location

    public function deletelocation($page = '0', $id = '', $confirmation = '') {

        if (!is_admin()) {
            echo 'You don\'t have permission to access this page';
            die;
        }

        if ($confirmation == '') {

            $data['content'] = $this->load->view('admin/confirmation_view', array('id' => $id, 'url' => site_url('admin/realestate/deletelocation/' . $page)), TRUE);

            $this->load->view('admin/template/template_view', $data);
        } else {

            if ($confirmation == 'yes') {

                $this->realestate_model->delete_location_by_id($id);

                $this->session->set_flashdata('msg', '<div class="alert alert-success">موقعیت حذف گردید</div>');
            }

            redirect(site_url('admin/realestate/locations/' . $page));
        }
    }

    #get and display facility information

    public function facilities() {



        $this->load->model('admin/facility_model');



        $value['facilities'] = $this->facility_model->get_all_facilities_by_range('all');

        $data['title'] = 'امکانات';

        $data['content'] = $this->load->view('admin/facilities/facilities_view', $value, TRUE);



        $this->load->view('admin/template/template_view', $data);
    }

    #remove a single facility by its id

    public function remove_facility($id) {

        if (!is_admin()) {
            echo 'You don\'t have permission to access this page';
            die;
        }

        if (!isset($id))
            redirect(site_url('admin/realestate/facilities'));



        $this->load->model('admin/facility_model');



        $data['status'] = 0;

        $this->facility_model->update_facility($data, $id);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">امکانات حذف گردید</div>');

        redirect(site_url('admin/realestate/facilities'));
    }

    #edit a single facility by its id

    public function edit_facility($id) {



        if (!isset($id))
            redirect(site_url('admin/realestate/facilities'));



        $this->load->model('admin/facility_model');



        $value['post'] = $this->facility_model->get_facility_by_id($id);

        $data['content'] = $this->load->view('admin/facilities/edit_facility_view', $value, TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    #save the updated facility information

    public function update_facility() {

        if (!is_admin()) {
            echo 'You don\'t have permission to access this page';
            die;
        }

        $this->load->model('admin/facility_model');



        $this->form_validation->set_rules('title', 'Title', 'required');



        if ($this->form_validation->run() == FALSE) {

            $id = $this->input->post('id');

            $this->edit_facility($id);
        } else {

            $id = $this->input->post('id');



            $data = array();

            $data['title'] = $this->input->post('title');

            $data['icon'] = $this->input->post('icon');



            $this->facility_model->update_facility($data, $id);

            $this->session->set_flashdata('msg', '<div class="alert alert-success">اطلاعات به روز گردید</div>');

            //redirect(site_url('admin/category/edit/'.$id));

            $this->edit_facility($id);
        }
    }

    #delete multiple facilities

    public function remove_bulk_facilities() {

        $this->load->model('admin/facility_model');



        $data['status'] = 0;

        $this->facility_model->bulk_update_facilities($data, $this->input->post('id'));

        $this->session->set_flashdata('msg', '<div class="alert alert-success">امکانات حذف گردیدند</div>');

        redirect(site_url('admin/realestate/facilities'));
    }

    #load new facility page

    function newfacility() {



        $data['title'] = 'ساخت یک امکان جدید';

        $data['content'] = $this->load->view('admin/facilities/create_facility_view', '', TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    #add facility information to the database

    function addfacility() {

        $this->form_validation->set_rules('title', 'Title', 'required');



        if ($this->form_validation->run() == FALSE) {

            $this->newfacility();
        } else {

            $data = array();

            $data['title'] = $this->input->post('title');

            $data['icon'] = $this->input->post('icon');

            $data['status'] = 1;



            $this->load->model('facility_model');

            $id = $this->facility_model->insert_facility($data);

            if ($id > 0) {



                $this->session->set_flashdata('msg', '<div class="alert alert-success">امکان جدید اضافه گردید</div>');
            } else {



                $this->session->set_flashdata('msg', '<div class="alert alert-success">خطا در اضافه کردن امکان جدید</div>');
            }

            redirect(site_url('admin/realestate/newfacility'));
        }
    }

    # image upload functions

    public function create_date_directory() {

        $year = date('Y');

        $mon = date('M');

        if (!file_exists('./uploads/' . $year)) {

            mkdir('./uploads/' . $year);
        }

        if (!file_exists('uploads/' . $year . '/' . $mon)) {

            mkdir('./uploads/' . $year . '/' . $mon);
        }



        return $year . '/' . $mon . '/';
    }

    public function iconuploader() {

        $this->load->view('admin/facilities/icon_uploader_view');
    }

    public function featuredimguploader() {

        $this->load->view('admin/estate/featured_img_uploader_view');
    }

    public function searchbguploader() {

        $this->load->view('admin/estate/searchbg_uploader_view');
    }

    public function galleryimguploader($count = 1) {

        $value['count'] = $count;

        $this->load->view('admin/estate/gallery_img_uploader_view', $value);
    }

    public function bannerimguploader($count = 1) {

        $value['count'] = $count;

        $this->load->view('admin/estate/banner_img_uploader_view', $value);
    }

    public function profile_photo_uploader() {

        $this->load->view('users/profile_photo_uploader_view');
    }

    public function upload_profile_photo() {

        $date_dir = 'profile_photos/';

        $config['upload_path'] = './uploads/profile_photos/';

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

            $media['media_url'] = base_url() . 'uploads/profile_photos/' . $data['file_name'];

            $media['create_time'] = standard_date($format, $time);

            $media['status'] = 1;



            create_square_thumb('./uploads/profile_photos/' . $data['file_name'], './uploads/profile_photos/thumb/');



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

    public function uploadiconfile() {

        $date_dir = $this->create_date_directory();

        $config['upload_path'] = './uploads/' . $date_dir;

        $config['allowed_types'] = 'gif|jpg|png';

        $config['max_size'] = '1000';

        $config['max_width'] = '32';

        $config['max_height'] = '32';

        $config['min_width'] = '32';

        $config['min_height'] = '32';



        $this->load->library('dbcupload', $config);

        $this->dbcupload->display_errors('', '');

        if ($this->dbcupload->do_upload('photoimg')) {

            $data = $this->dbcupload->data();

            $this->load->helper('date');

            $format = 'DATE_RFC822';

            $time = time();

            create_square_thumb('./uploads/' . $date_dir . $data['file_name'], './uploads/thumbs/');

            $media['media_name'] = $data['file_name'];

            $media['media_url'] = base_url() . 'uploads/' . $date_dir . $data['file_name'];

            $media['create_time'] = standard_date($format, $time);

            $media['status'] = 1;



            $status['error'] = 0;

            $status['name'] = $data['file_name'];
        } else {

            $errors = $this->dbcupload->display_errors();

            $errors = str_replace('<p>', '', $errors);

            $errors = str_replace('</p>', '', $errors);

            $status = array('error' => $errors, 'name' => '');
        }



        echo json_encode($status);

        die;
    }

    public function uploadsearchbgfile() {

        //$date_dir = $this->create_date_directory();

        $config['upload_path'] = './uploads/banner/';

        $config['allowed_types'] = 'gif|jpg|png';

        $config['max_size'] = '5120';

        $config['min_width'] = '1024';

        $config['min_height'] = '600';



        $this->load->library('dbcupload', $config);

        $this->dbcupload->display_errors('', '');

        if ($this->dbcupload->do_upload('photoimg')) {

            $data = $this->dbcupload->data();

            $this->load->helper('date');

            $format = 'DATE_RFC822';

            $time = time();

            //create_square_thumb('./uploads/'.$date_dir.$data['file_name'],'./uploads/thumbs/');

            $media['media_name'] = $data['file_name'];

            $media['media_url'] = base_url() . 'uploads/banner/' . $data['file_name'];

            $media['create_time'] = standard_date($format, $time);

            $media['status'] = 1;



            $status['error'] = 0;

            $status['name'] = $data['file_name'];
        } else {

            $errors = $this->dbcupload->display_errors();

            $errors = str_replace('<p>', '', $errors);

            $errors = str_replace('</p>', '', $errors);

            $status = array('error' => $errors, 'name' => '');
        }



        echo json_encode($status);

        die;
    }

    public function uploadfeaturedfile() {

        $date_dir = $this->create_date_directory();

        $config['upload_path'] = './uploads/' . $date_dir;

        $config['allowed_types'] = 'gif|jpg|png';

        $config['max_size'] = '5120';

        $config['min_width'] = '256';

        $config['min_height'] = '256';



        $this->load->library('dbcupload', $config);

        $this->dbcupload->display_errors('', '');

        if ($this->dbcupload->do_upload('photoimg')) {

            $data = $this->dbcupload->data();

            $this->load->helper('date');

            $format = 'DATE_RFC822';

            $time = time();

            create_square_thumb('./uploads/' . $date_dir . $data['file_name'], './uploads/thumbs/');

            $media['media_name'] = $data['file_name'];

            $media['media_url'] = base_url() . 'uploads/' . $date_dir . $data['file_name'];

            $media['create_time'] = standard_date($format, $time);

            $media['status'] = 1;



            $status['error'] = 0;

            $status['name'] = $data['file_name'];
        } else {

            $errors = $this->dbcupload->display_errors();

            $errors = str_replace('<p>', '', $errors);

            $errors = str_replace('</p>', '', $errors);

            $status = array('error' => $errors, 'name' => '');
        }



        echo json_encode($status);

        die;
    }

    public function uploadgalleryfile() {

        //$date_dir = $this->create_date_directory();

        $config['upload_path'] = './uploads/gallery/';

        $config['allowed_types'] = 'gif|jpg|png';

        $config['max_size'] = '5120';

        // $config['min_width'] = '256';
        // $config['min_height'] = '256';



        $this->load->library('dbcupload', $config);

        $this->dbcupload->display_errors('', '');

        if ($this->dbcupload->do_upload('photoimg')) {

            $data = $this->dbcupload->data();

            $this->load->helper('date');

            $format = 'DATE_RFC822';

            $time = time();

            //create_square_thumb('./uploads/'.$date_dir.$data['file_name'],'./uploads/thumbs/');

            $media['media_name'] = $data['file_name'];

            $media['media_url'] = base_url() . 'uploads/gallery/' . $data['file_name'];

            $media['create_time'] = standard_date($format, $time);

            $media['status'] = 1;



            $status['error'] = 0;

            $status['name'] = $data['file_name'];
        } else {

            $errors = $this->dbcupload->display_errors();

            $errors = str_replace('<p>', '', $errors);

            $errors = str_replace('</p>', '', $errors);

            $status = array('error' => $errors, 'name' => '');
        }



        echo json_encode($status);

        die;
    }

    public function uploadbannerfile() {

        //$date_dir = $this->create_date_directory();

        $config['upload_path'] = './uploads/banner/';

        $config['allowed_types'] = 'gif|jpg|png';

        $config['max_size'] = '5120';

        $config['min_width'] = '1024';

        $config['min_height'] = '600';



        $this->load->library('dbcupload', $config);

        $this->dbcupload->display_errors('', '');

        if ($this->dbcupload->do_upload('photoimg')) {

            $data = $this->dbcupload->data();

            $this->load->helper('date');

            $format = 'DATE_RFC822';

            $time = time();

            //create_square_thumb('./uploads/'.$date_dir.$data['file_name'],'./uploads/thumbs/');

            $media['media_name'] = $data['file_name'];

            $media['media_url'] = base_url() . 'uploads/banner/' . $data['file_name'];

            $media['create_time'] = standard_date($format, $time);

            $media['status'] = 1;



            $status['error'] = 0;

            $status['name'] = $data['file_name'];
        } else {

            $errors = $this->dbcupload->display_errors();

            $errors = str_replace('<p>', '', $errors);

            $errors = str_replace('</p>', '', $errors);

            $status = array('error' => $errors, 'name' => '');
        }



        echo json_encode($status);

        die;
    }

    public function crop($src = '', $width = 256, $height = 256) {

        $config['image_library'] = 'gd2';

        $config['source_image'] = $src;

        $config['width'] = $width;

        $config['height'] = $height;



        $this->load->library('image_lib', $config);



        $this->image_lib->resize();
    }

    public function test_filter() {

        $data['title'] = 'فیلتر تست';

        $data['content'] = $this->load->view('admin/estate/test_filter_view', '', TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    public function cutomfields() {

        $data['title'] = 'مدیریت فیلد اخصصاصی';

        $data['content'] = $this->load->view('admin/estate/test_filter_view', '', TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    #load banner settings

    public function bannersettings() {

        $data['title'] = 'تمامی املاک';

        $data['content'] = $this->load->view('admin/estate/banner_settings_view', '', TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    #slider validation function

    public function slider_required($str) {

        $flag = FALSE;

        foreach ($_POST['banner'] as $value) {

            if ($value != '')
                $flag = TRUE;
        }



        if ($flag == FALSE) {

            $this->form_validation->set_message('slider_required', 'You must set atleast one slider image');

            return FALSE;
        } else {

            return TRUE;
        }
    }

    #save banner settings

    public function savebannersettings($key = 'banner_settings') {

        if ($this->input->post('banner_type') == 'Slider') {

            $rule = '|callback_slider_required';

            $this->form_validation->set_rules('slider_speed', 'Slider speed', 'required');
        } else {

            $rule = '';
        }

        $this->form_validation->set_rules('banner_type', 'Banner type', 'required' . $rule);

        $this->form_validation->set_rules('search_box_position', 'Search box position', 'required');

        $this->form_validation->set_rules('search_bg', 'BG image', 'required');



        if ($this->form_validation->run() == FALSE) {

            $this->bannersettings();
        } else {

            $data = array();

            $data['menu_bg_color'] = $this->input->post('menu_bg_color');

            $data['menu_text_color'] = $this->input->post('menu_text_color');

            $data['banner_type'] = $this->input->post('banner_type');

            $data['slider_speed'] = $this->input->post('slider_speed');

            $data['sliders'] = json_encode($_POST['banner']);

            $data['search_box_position'] = $this->input->post('search_box_position');

            $data['search_bg'] = $this->input->post('search_bg');

            $data['map_latitude'] = $this->input->post('map_latitude');

            $data['map_longitude'] = $this->input->post('map_longitude');

            $data['map_zoom'] = $this->input->post('map_zoom');

            add_option('banner_settings', json_encode($data));

            $this->session->set_flashdata('msg', '<div class="alert alert-success">تنظیمات به روز گردید</div>');

            redirect(site_url('admin/realestate/bannersettings'));
        }
    }

    public function payments($start = 0) {

        $this->load->model('admin/realestate_model');

        $value['start'] = $start;

        $value['posts'] = $this->realestate_model->get_all_payment_history($start, $this->per_page, 'id', 'desc');

        $total = $this->realestate_model->count_all_payment_history();

        $value['pages'] = configPagination('admin/realestate/payments', $total, 5, $this->per_page);



        $data['title'] = 'سابقه پرداخت';

        $data['content'] = $this->load->view('admin/estate/all_payments_view', $value, TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    #delete a service

    public function deletehistory($page = '0', $id = '', $confirmation = '') {

        if ($confirmation == '') {

            $data['content'] = $this->load->view('admin/confirmation_view', array('id' => $id, 'url' => site_url('admin/realestate/deletehistory/' . $page . '/')), TRUE);

            $this->load->view('admin/template/template_view', $data);
        } else {

            if ($confirmation == 'yes') {

                $this->realestate_model->deletehistory($id);

                $this->session->set_flashdata('msg', '<div class="alert alert-success">دیتا حذف گردید</div>');
            }

            redirect(site_url('admin/realestate/payments/' . $page));
        }
    }

    #word filter functions#

    public function wordfilter() {

        $row = get_option('wordfilters');

        $wordfilters = '';

        if (!is_array($row)) {

            $words = json_decode($row->values);

            foreach ($words as $key => $value) {

                $wordfilters .= $key . '|' . $value . ',';
            }



            $wordfilters .= '#';

            $wordfilters = str_replace(',#', '', $wordfilters);
        }



        $value = array('wordfilters' => $wordfilters);

        $data['title'] = 'فیلتر کلمه';



        $data['content'] = $this->load->view('admin/memento/wordfilter_view', $value, TRUE);

        $this->load->view('admin/template/template_view', $data);
    }

    public function addwordfilters() {

        $this->form_validation->set_rules('wordfilters', 'Words', 'required');



        if ($this->form_validation->run() == FALSE) {

            $this->wordfilter();
        } else {

            $pairs = explode(',', $this->input->post('wordfilters'));

            $words = array();

            foreach ($pairs as $pair) {

                $pair = explode('|', $pair);

                $words[$pair[0]] = $pair[1];
            }



            add_option('wordfilters', json_encode($words));

            $this->filterposts($words);

            $this->session->set_flashdata('msg', '<div class="alert alert-success">فیلتر اضافه گردید</div>');

            redirect(site_url('admin/memento/wordfilter'));
        }
    }

    public function filterposts($words) {

        $this->load->model('show/post_model');

        $query = $this->post_model->get_all_posts_by_range('all', '', 'id');

        foreach ($query->result_array() as $post) {

            foreach ($words as $key => $value) {

                $post['title'] = str_replace($key, $value, $post['title']);
            }

            $this->post_model->update_post_by_id($post, $post['id']);
        }
    }

}

/* End of file realestate_core.php */

/* Location: ./application/modules/admin/controllers/realestate_core.php */