<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Bookit Themes Core Controller
 *
 * This class handles theme functionality
 *
 * @package		bookit
 * @subpackage	Themes
 * @author		sc mondal
 * @link		http://scmondal.dbcinfotech.com
 */

class Themes_core extends CI_Controller {
	
	var $per_page = 10;
	
	public function __construct()
	{
		parent::__construct();
		is_installed(); #defined in auth helper
		checksavedlogin(); #defined in auth helper
		
		if(!is_admin())
		{
			if(count($_POST)<=0)
			$this->session->set_userdata('req_url',current_url());
			redirect(site_url('admin/auth'));
		}

		$this->per_page = get_per_page_value();#defined in auth helper

		$this->load->model('themes_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error input-xxlarge">', '</div>');
	}
	
	public function index()
	{
		$data['title']   	= 'پوسته ها';
		$data['sel_menu'] 	= 'themes';
		$data['content'] 	= $this->load->view('admin/themes/index_view','',TRUE);
		$this->load->view('admin/template/template_view',$data);
	}

	public function activate()
	{
		$this->themes_model->activate();
		$this->session->set_flashdata('msg', '<div class="alert alert-success">قالب فعال گردید</div>');
		redirect(site_url('admin/themes'));
	}
	
}

/* End of file themes.php */
/* Location: ./application/controllers/themes.php */