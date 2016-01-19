<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


    function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('home_model');
	  }
	  
	  public function index()
	  {
		  $arr_all_plans = $this->home_model->get_all_homepost();
		  $data['arr_all_plans']= $arr_all_plans;
		  $arr_all_image = $this->home_model->get_all_images();
		  $data['arr_all_image']= $arr_all_image;
		  $get_all_testimonial = $this->home_model->get_all_testimonial();
		  $data['get_all_testimonial']= $get_all_testimonial;
		  $data['main_content'] = 'home_view';		
		  $this->load->view('includes/template', $data);
		  
	  }

	
	
		
	
}



/* End of file home.php */
/* Location: ./application/controllers/home.php */