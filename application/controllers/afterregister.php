<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class afterregister extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('plan_model');
	}
	
	
	public function index()
	{
		
		$data['main_content'] = 'successful_registered';		
		$this->load->view('includes/template',$data);
		
		//$this->load->view('successful_registered');
		
	}
}

?>