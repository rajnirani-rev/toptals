<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['main_content'] = 'login_view';		
		$this->load->view('includes/template', $data);
	}	
	public function validate_credentials(){
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
		
		if($this->form_validation->run() == FALSE)
		{
		 //Field validation failed.  User redirected to login page
		 $this->index();
		}
		else
		{
		 //Go to private area
		 redirect('home', 'refresh');
		}
   
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */