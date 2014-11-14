<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * Memento admin Controller

 *

 * This class handles user account related functionality

 *

 * @package		Show

 * @subpackage	ShowCore

 * @author		dbcinfotech

 * @link		http://amlakgostar.ir

 */
class Show_core extends CI_controller {

    var $PER_PAGE = 2;
    var $active_theme = '';

    public function __construct() {

        parent::__construct();

        is_installed(); #defined in auth helper		

        $this->PER_PAGE = get_per_page_value(); #defined in auth helper

        $this->active_theme = get_active_theme();

        $this->load->model('show_model');

        $this->load->model('user/user_model');

        $this->load->library('encrypt');
        $this->load->helper('text');


        if (isset($_POST['view_orderby'])) {

            $this->session->set_userdata('view_orderby', $this->input->post('view_orderby'));
        }



        if (isset($_POST['view_ordertype'])) {

            $this->session->set_userdata('view_ordertype', $this->input->post('view_ordertype'));
        }

        $system_currency_type = get_settings('realestate_settings', 'system_currency_type', 0);

        if ($system_currency_type == 0) {

            $system_currency = get_currency_icon(get_settings('realestate_settings', 'system_currency', 'USD'));
        } else {

            $system_currency = get_settings('realestate_settings', 'system_currency', 'USD');
        }


        $this->session->set_userdata('system_currency', $system_currency);

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }

    public function index() {

        $this->posts();
    }

    public function posts($start = 0) {
        $value['recents'] = $this->show_model->get_properties_by_range($start, $this->PER_PAGE, 'id', 'desc');

        $value['featured'] = $this->show_model->get_featured_properties_by_range($start, $this->PER_PAGE, 'id', 'desc');

        $value['view_style'] = 'grid';

        $data['content'] = load_view('home_view', $value, TRUE);

        $data['alias'] = 'dbc_home';

        load_template($data, $this->active_theme);
    }

    public function properties($type = 'recent', $start = 0) {

        $value['page_title'] = 'تمام ' . ucfirst($type);

        if ($type == 'recent') {

            $value['query'] = $this->show_model->get_properties_by_range($start, $this->PER_PAGE, 'id');

            $total = $this->show_model->count_properties();
        } elseif ($type == 'top') {

            $value['query'] = $this->show_model->get_properties_by_range($start, $this->PER_PAGE, 'total_view', 'desc');

            $total = $this->show_model->count_properties();
        } elseif ($type == 'featured') {

            $value['query'] = $this->show_model->get_featured_properties_by_range($start, $this->PER_PAGE, 'id');

            $total = $this->show_model->count_featured_properties();
        }



        $value['pages'] = configPagination('show/properties/' . $type, $total, 5, $this->PER_PAGE);



        $value['view_style'] = 'grid';

        $data['content'] = load_view('general_view', $value, TRUE);

        $data['alias'] = 'type';

        load_template($data, $this->active_theme);
    }

    public function type($type = 'DBC_TYPE_APARTMENT', $start = 0) {

        $value['page_title'] = 'تمام ' . lang_key($type);

        $value['query'] = $this->show_model->get_properties_by_type_range($type, $start, $this->PER_PAGE, 'id');

        $total = $this->show_model->count_properties_by_type($type);

        $value['pages'] = configPagination('show/type/' . $type, $total, 5, $this->PER_PAGE);



        $value['view_style'] = 'grid';

        $data['content'] = load_view('general_view', $value, TRUE);

        $data['alias'] = 'type';

        load_template($data, $this->active_theme);
    }

    public function purpose($purpose = 'DBC_PURPOSE_SALE', $start = 0) {

        $value['page_title'] = 'تمام ' . lang_key($purpose);

        $value['query'] = $this->show_model->get_properties_by_purpose_range($purpose, $start, $this->PER_PAGE, 'id');

        $total = $this->show_model->count_properties_by_purpose($purpose);

        $value['pages'] = configPagination('show/purpose/' . $purpose, $total, 5, $this->PER_PAGE);



        $value['view_style'] = 'grid';

        $data['content'] = load_view('general_view', $value, TRUE);

        $data['alias'] = 'purpose';

        load_template($data, $this->active_theme);
    }

    #get all estate information by term

    public function all($term = 'recent', $start = '') {



        if ($term == 'recent') {



            $query = $this->show_model->get_recent_estates($start);

            echo '<pre/>';

            print_r($query->result());

            if ($query->num_rows() > 0) {



                foreach ($query->result() as $row) {

                    print_r($row);
                }
            } else {

                echo "no result found for recent estates";
            }
        } else if ($term == 'featured') {



            $query = $this->show_model->get_featured_estates($start);

            echo '<pre/>';



            if ($query->num_rows() > 0) {



                foreach ($query->result() as $row) {

                    print_r($row);
                }
            } else {

                echo "no result found for featured estates";
            }
        } else {

            //undefined term
        }
    }

    public function all_by_agent($agent_id = '', $start = '') {



        if (!isset($agent_id) || $agent_id == '') {



            return;
        }



        $query = $this->show_model->get_estates_by_agent($agent_id, $start);



        echo '<pre/>';



        if ($query->num_rows() > 0) {



            foreach ($query->result() as $row) {

                print_r($row);
            }
        } else {

            echo "no result found for the agent";
        }
    }

    public function detail($unique_id = '') {

        $value['post'] = $this->show_model->get_post_by_unique_id($unique_id);

        $data['content'] = load_view('detail_view', $value, TRUE);

        $data['alias'] = 'detail';

        $id = 0;
        if ($value['post']->num_rows() > 0) {
            $row = $value['post']->row();
            $id = $row->id;
            $seo['key_words'] = get_post_meta($row->id, 'tags');
        }
        $curr_lang = ($this->uri->segment(1) != '') ? $this->uri->segment(1) : 'en';
        $title = get_title_for_edit_by_id_lang($id, $curr_lang);
        $description = get_description_for_edit_by_id_lang($id, $curr_lang);
        $data['sub_title'] = $title;
        $seo['meta_description'] = $description;
        $data['seo'] = $seo;
        load_template($data, $this->active_theme);
    }

    public function printview($unique_id = '') {

        $value['post'] = $this->show_model->get_post_by_unique_id($unique_id);

        $data['content'] = load_view('print_view', $value, TRUE);

        echo $data['content'];
    }

    public function contact() {

        $data['content'] = load_view('contact_view', '', TRUE);

        $data['alias'] = 'contact';

        load_template($data, $this->active_theme);
    }

    public function search() {

        $value['data'] = array();

        $value['query'] = $this->show_model->get_properties_by_range(0, $this->PER_PAGE, 'id');

        $data['content'] = load_view('adsearch_view', $value, TRUE);

        $data['alias'] = 'search';

        load_template($data, $this->active_theme);
    }

    public function instant_search_ajax() {



        $this->load->helper('html');

        $this->load->helper('url');



        $response = '';



        $search_string = $this->input->post('query');

        if (strlen($search_string) > 3) {



            $search_result = $this->show_model->get_plain_search_result($search_string);

            if ($search_result->num_rows() > 0) {

                foreach ($search_result->result() as $row) {



                    $anchor_text = substr($row->address, 0, 100);

                    $response .= anchor("#", $anchor_text, "class = form-control");
                }

                echo $response;
            } else
                echo 'hide';
        } else
            echo 'hide';
    }

    public function list_view() {

        $value['view_style'] = 'list';

        $data['content'] = load_view('home_view', $value, TRUE);

        $data['alias'] = 'home';

        load_template($data, $this->active_theme);
    }

    public function toggle($type = 'grid', $url = '') {

        $this->session->set_userdata('view_style', $type);

        $url = base64_decode($url);

        redirect($url);
    }

    public function terms() {

        $data['content'] = load_view('termscondition_view', '', TRUE);

        $data['alias'] = 'terms';

        load_template($data, $this->active_theme);
    }

    public function advfilter() {

        $string = '';



        foreach ($_POST as $key => $value) {

            if (is_array($value)) {

                $val = '';

                foreach ($value as $row) {

                    $val .= $row . ',';
                }

                $string .= $key . '=' . $val . '|';
            } else {

                $string .= $key . '=' . $value . '|';
            }
        }

        //$this->result(base64_encode($string));
        redirect(site_url('show/result/' . $string));
    }

    public function tag($string = '', $start = '0') {

        $data = array();

        $data['plainkey'] = $string;

        $value = array();

        $value['data'] = $data;



        #get estates based on the advanced search criteria



        $value['query'] = $this->show_model->get_advanced_search_result($data, $start, $this->PER_PAGE);

        $total = $this->show_model->count_search_result($data);

        $value['pages'] = configPagination('show/tag/' . $string, $total, 5, $this->PER_PAGE);



        $data = array();

        $data['content'] = load_view('adsearch_view', $value, TRUE);

        $data['alias'] = 'contact';

        load_template($data, $this->active_theme);
    }

    public function result($string = '', $start = '0') {

        $string = rawurldecode($string);

        $data = array();

        $values = explode("|", $string);

        foreach ($values as $value) {

            $get = explode("=", $value);

            $s = (isset($get[1])) ? $get[1] : '';

            $val = explode(",", $s);

            if (count($val) > 1) {

                $data[$get[0]] = $val;
            } else
                $data[$get[0]] = (isset($get[1])) ? $get[1] : '';
        }



        $value = array();

        $value['data'] = $data;



        #get estates based on the advanced search criteria

        $value['query'] = $this->show_model->get_advanced_search_result($data, $start, $this->PER_PAGE);

        $total = $this->show_model->count_search_result($data);

        $value['pages'] = configPagination('show/result/' . $string, $total, 5, $this->PER_PAGE);


        $messages = null;
        if (strlen($this->input->post("subscribephone")) > 0) {
            $purpose = $data["purpose_sale"];
            $types = $data["type"]; // array
            $bedroommin = $data["bedroom_min"]; // array
            $bedroommax = $data["bedroom_max"]; // array
            $bathmin = $data["bath_min"]; // array
            $bathmax = $data["bath_max"]; // array
            $phone = $this->input->post("subscribephone");
            if (strlen($phone) != 11) {
                $messages .= '<div class="alert alert-danger">شماره موبایل وارد شده صحیح نمیباشد، شماره تماس میبایست 11 رقمی باشد</div>';
            } else {
                // we have to add the item for each type
                foreach ($types as $type) {
                    if (strlen($type) > 0) {
                        $this->addSubscriber($messages, $phone, $purpose, $type, $bedroommin, $bedroommax, $bathmin, $bathmax);
                    }
                }

                $messages .= '<div class="alert alert-success">شماره تماس با موفقیت اضافه گردید</div>';

                // we have to send sms to the user about new system
                if ((bool) (getPhoneSetting("enablesms")) == true) {
                    $this->sendSmsAboutAdd($phone);
                }
            }
        }

        $data = array();

        $value["msg"] = $messages;

        $data['content'] = load_view('adsearch_view', $value, TRUE);

        $data['alias'] = 'contact';

        load_template($data, $this->active_theme);
    }

    public function addSubscriber(&$messages, $phone, $purpose, $type, $bedroommin, $bedroommax, $bathmin, $bathmax) {
        // add subscriber

        $data["phonenumber"] = $phone;
        $data["type"] = $type;
        $data["purpose"] = $purpose;
        $data["bedroomstart"] = $bedroommin;
        $data["bedroomend"] = $bedroommax;
        $data["salestart"] = null;
        $data["saleend"] = null;
        $data["rahnstart"] = null;
        $data["rahnend"] = null;
        $data["ejarestart"] = null;
        $data["ejareend"] = null;
        $data["date"] = time();
        $data["receivedcount"] = 0;

        // save to database
        $result = $this->db->insert('phone', $data);
        if ($result > 0) {
            return true;
        }

        return false;
    }

    public function sendSmsAboutAdd($phone) {
        sendsms($phone, getPhoneSetting("subscribetext"));
    }

    public function get_states_ajax($term = '') {

        $this->load->model('admin/realestate_model');

        if ($term == '')
            $term = $this->input->post('term');

        $country = $this->input->post('country');

        $data = $this->realestate_model->get_locations_json($term, 'state', $country);

        echo json_encode($data);
    }

    public function get_cities_ajax($term = '') {

        $this->load->model('admin/realestate_model');

        if ($term == '')
            $term = $this->input->post('term');

        $state = $this->input->post('state');

        $data = $this->realestate_model->get_locations_json($term, 'city', $state);

        echo json_encode($data);
    }

    public function agent($start = '0') {

        $value['query'] = $this->show_model->get_users_by_range($start, $this->PER_PAGE, 'id');

        $total = $this->show_model->count_users();

        $value['pages'] = configPagination('show/agent/', $total, 4, $this->PER_PAGE);

        $data['content'] = load_view('agent_view', $value, TRUE);

        $data['alias'] = 'agent';

        load_template($data, $this->active_theme);
    }

    public function agentproperties($user_id = '0', $start = 0) {

        $value['user'] = $this->show_model->get_user_by_userid($user_id);

        $value['page_title'] = lang_key('DBC_AGENT_PROPERTIES');

        $value['query'] = $this->show_model->get_all_estates_agent($user_id, $start, $this->PER_PAGE, 'id');

        $total = $this->show_model->count_all_estates_agent($user_id);

        $value['pages'] = configPagination('show/agentproperties/' . $user_id, $total, 5, $this->PER_PAGE);



        $value['view_style'] = 'grid';

        $data['content'] = load_view('agent_properties_view', $value, TRUE);

        $data['alias'] = 'type';

        load_template($data, $this->active_theme);
    }

    public function page($alias = '') {

        $value['alias'] = $alias;

        $value['query'] = $this->show_model->get_page_by_alias($alias);

        $data['content'] = load_view('page_view', $value, TRUE, $this->active_theme);

        $data['alias'] = $alias;

        load_template($data, $this->active_theme);
    }

    public function sendemailtoagent($agent_id = '0') {

        $this->form_validation->set_rules('sender_name', 'Name', 'required');

        $this->form_validation->set_rules('sender_email', 'Email', 'required|valid_email');

        $this->form_validation->set_rules('subject', 'Subject', 'required');

        $this->form_validation->set_rules('msg', 'Message', 'required');

        $unique_id = $this->input->post('unique_id');

        $title = $this->input->post('title');

        if ($this->form_validation->run() == FALSE) {

            $this->detail($unique_id, $title);
        } else {



            $this->load->library('email');

            $config['mailtype'] = "html";

            $config['charset'] = "utf-8";

            $this->email->initialize($config);



            $this->email->from($this->input->post('sender_email'), $this->input->post('sender_name'));

            $this->email->to(get_user_email_by_id($agent_id));



            $this->email->subject($this->input->post('subject'));

            $this->email->message($this->input->post('msg'));



            $this->email->send();



            $this->session->set_flashdata('msg', '<div class="alert alert-success">ایمیل ارسال شد</div>');

            redirect(site_url('show/detail/' . $unique_id . '/' . $title));
        }
    }

    public function sendcontactemail() {

        $this->form_validation->set_rules('sender_name', 'Name', 'required');

        $this->form_validation->set_rules('sender_email', 'Email', 'required|valid_email');

        $this->form_validation->set_rules('msg', 'Message', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->contact();
        } else {


            $this->load->library('email');

            $config['mailtype'] = "html";

            $config['charset'] = "utf-8";

            $this->email->initialize($config);



            $this->email->from($this->input->post('sender_email'), $this->input->post('sender_name'));

            // TODO EMAIL TO RECEIVED
            $this->email->to(get_settings('webadmin_email', 'contact_email', 'convertersoft@gmail.com'));


            $this->email->subject("New Message");

            $this->email->message($this->input->post('msg'));



            $this->email->send();



            $this->session->set_flashdata('msg', '<div class="alert alert-success">ایمیل ارسال شد</div>');

            redirect(site_url('show/contact/'));
        }
    }

}

/* End of file install.php */

/* Location: ./application/modules/show/controllers/show_core.php */