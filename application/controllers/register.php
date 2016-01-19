<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {


    function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		
		$data['main_content'] = 'register_view';		
		$this->load->view('includes/template', $data);
		
	}
	
	public function validate_credentials(){	
				
		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_exists_username');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_exists_email');
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
		
		if($this->form_validation->run() == FALSE){
			$this->index();	
		}
		else {
			
			$this->load->model('register_model');
			if($this->register_model->create_user()){	
						
				$data['registered_successfully'] = "";
				$this->session->set_flashdata('registered_successfully', 'You have registered successfully, Please login here.');	
				redirect('login', 'refresh');		
				}
			
			
			}
		
		}
		
		function exists_username($username)
		{			
			$this->load->model('register_model');
			$username_avail = $this->register_model->checkusername_availability($username);
			if($username_avail){				
				return true;			
				}
			else {
				return false;
				}
		}
		
		function exists_email($email)
		{			
			$this->load->model('register_model');
			$email_avail = $this->register_model->checkemail_availability($email);
			if($email_avail){				
				return true;			
				}
			else {
				return false;
				}
		}
		
	
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */