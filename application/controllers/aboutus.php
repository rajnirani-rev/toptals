<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aboutus extends CI_Controller {


    function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('aboutus_model');
	  }
	  
	  public function index()
	  {
		  $arr_all_main = $this->aboutus_model->get_all_main();
		  $data['arr_all_main']= $arr_all_main;
		  $arr_all_team = $this->aboutus_model->get_all_about_us();
		  $data['arr_all_team']= $arr_all_team;
		  $data['main_content'] = 'aboutUs_view';		
		  $this->load->view('includes/template', $data);
	}
	 
	
		
	
}



/* End of file home.php */
/* Location: ./application/controllers/home.php */