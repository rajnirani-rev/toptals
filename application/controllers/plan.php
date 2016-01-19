<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plan extends CI_Controller {


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
		$arr_all_plans = $this->plan_model->get_all_plans();
		//print_r($arr_all_student_from_organization); die();
		$data['arr_all_plans']= $arr_all_plans;
		$data['main_content'] = 'plan_view';		
		$this->load->view('includes/template', $data);
	}
	
	// public function admin_home()
	// {
	// 	$data['main_content'] = 'admin/admin_home';		
	// 	$this->load->view('admin/includes/template', $data);
	// }
		
	// public function add_plans()
	// {
	// 	$data['main_content'] = 'admin/students_plans';		
	// 	$this->load->view('admin/includes/template', $data);
	// }
	
	public function plan_administration()
	{
		// if($this->session->userdata('user_data')) {
		// $user_logged_rec = $this->session->userdata('user_data');
		// $organization_id=$user_logged_rec['admin_id'];					
		// }
		//$student_where = array('plan_id'=>$organization_id);
		$arr_all_plans = $this->plan_model->get_all_plans();
		//print_r($arr_all_student_from_organization); die();
		$data['arr_all_plans']= $arr_all_plans;
		$data['main_content'] = 'plan_view';		
		$this->load->view('includes/template', $data);
	}	

	
	public function add_new_plans(){
		//////////////////////////////////////////
		if($this->input->post('submit')){
		 $this->form_validation->set_error_delimiters('<div class="err">', '</div>');
		$this->form_validation->set_rules('title_name', 'Title Name', 'trim|required');
		$this->form_validation->set_rules('planSummary', 'Summary', 'trim|required');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required');
		$this->form_validation->set_rules('noOfTests', 'Number of tests', 'trim|required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('admin/students_plans');	
		}
		else {
			$this->load->model('admin_model');
			if($this->admin_model->add_plans()){			
				$data['registered_successfully'] = "";
				$this->session->set_flashdata('plan_successfully', 'plan saved.');	
				redirect('admin/plan_administration', 'refresh');		
				}
			}
		}
		//////////////////////////////////////////
		$data['main_content'] = 'admin/students_plans';		
		$this->load->view('admin/includes/template', $data);
	}
	
	public function validate_credentials(){		
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_exists_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('conpassword', 'Confirm Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('organization', 'Organization', 'trim|required');
		$this->form_validation->set_rules('subdomain', 'Sub Domain', 'trim|required|callback_exists_subdomain');
		if($this->form_validation->run() == FALSE){
		//	$this->load->view('add_student');	
		}
		else {
			
			$this->load->model('register_model');
			if($this->organization_model->create_organization()){	
						
				$data['registered_successfully'] = "";
				$this->session->set_flashdata('registered_successfully', 'You have registered successfully, Please login here.');	
				redirect('login', 'refresh');		
				}
			}
		}

	public function validate_credentials_admin_login()
	{
		//////////////////////////////////////////
		if($this->input->post('submit')){
		 $this->form_validation->set_error_delimiters('<div class="err">', '</div>');
		$this->form_validation->set_rules('adminname', 'User Name', 'trim|required');
		$this->form_validation->set_rules('adminPassword', 'Password', 'trim|required');
		if($this->form_validation->run() == FALSE){
			//$this->load->view('admin/admin_login');

		}
		else {
			$adminUsername = $this->input->post('adminname');
			 $adminPassword = $this->input->post('adminPassword');
			 $result = $this->admin_model->admin_login($adminUsername, $adminPassword);
			 $bAuthenticated=FALSE;
			 if($result)
			 {	
			 	
				$sess_array = array();
				 foreach($result as $row)
				 {
				
						   $sess_array = array(
						     'admin_userName' => $row->admin_userName,
						     'admin_id' => $row->admin_id,
							 'admin_password' => $row->admin_password,
							 'admin_email' => $row->admin_email,
							);
						   
							$bAuthenticated=TRUE;
							$this->session->set_userdata('user_data', $sess_array);
				 } 
			   }
			   else
			   {

			   	 $this->session->set_flashdata('message', 'Invalid username or password.');
			   } 
			   if($bAuthenticated)
			   {
					$arr_all_plans = $this->admin_model->get_all_plans();
					$data['arr_all_plans']= $arr_all_plans;
					$data['main_content'] = 'admin/admin_home';		
					$this->load->view('admin/includes/template', $data);
			   }else{

				   redirect('admin/','refresh');
			  }
			}
		}
		//////////////////////////////////////////
		$data['main_content'] = 'admin/admin_login';		
		$this->load->view('admin/includes/template', $data);
	}
		
	public function validate_credentials_add_student(){		
		$this->form_validation->set_rules('student_first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('student_last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('student_email', 'Email', 'trim|required|valid_email|callback_exists_email_student');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('company_name', 'Company', 'trim');
		if($this->form_validation->run() == FALSE){
			$this->load->view('add_student');	
		}
		else {
			$this->load->model('organization_model');
			if($this->organization_model->add_student()){			
				$data['registered_successfully'] = "";
				$this->session->set_flashdata('registered_successfully', 'Student registered successfully.');	
				redirect('student_administration', 'refresh');		
				}
			}
	  }

	
/*	public function validate_login_credentials(){		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_exists_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == FALSE){
			$this->index();	
		}
		else {
			$this->load->model('organization_model');
			if($this->organization_model->organisation_login()){			
				$data['login_successfully'] = "";
				$this->session->set_flashdata('login_successfully', 'You have login successfully.');	
				redirect('dashboard', 'refresh');		
				}
			}
		}
		*/


		
		function exists_subdomain($examurl)
		{			
			$this->load->model('organization_model');
			$examurl_avail = $this->organization_model->checksubdomain_availability($examurl);
			if($examurl_avail){				
				return true;			
				}
			else {
				return false;
				}
		}
		
		
		function exists_email($email)
		{			
			$this->load->model('organization_model');
			$email_avail = $this->organization_model->checkemail_availability($email);
			if($email_avail){				
				return true;			
				}
			else {
				return false;
				}
		}
		
		function login_post()
		 {
		 	
			 $adminUsername = $this->input->post('adminname');
			 $adminPassword = $this->input->post('adminPassword');
			 $result = $this->admin_model->admin_login($adminUsername, $adminPassword);
			 $bAuthenticated=FALSE;
			 if($result)
			 {	
			 	
				$sess_array = array();
				 foreach($result as $row)
				 {
				
						   $sess_array = array(
						     'admin_userName' => $row->admin_userName,
						     'admin_id' => $row->admin_id,
							 'admin_password' => $row->admin_password,
							 'admin_email' => $row->admin_email,
							);
						   
							$bAuthenticated=TRUE;
							$this->session->set_userdata('user_data', $sess_array);
				 } 
			   }
			   else
			   {
				 $this->session->set_flashdata('message', 'Invalid username or password.');
			   } 
			   if($bAuthenticated)
			   {
			   	
				   redirect('organization/home/', 'refresh');
			   }else{

				   redirect('admin/','refresh');
			  }
		 }
 
	public function logout()
	{
		$this->session->unset_userdata('user_data');
		$this->session->sess_destroy();
		redirect('admin/', 'refresh');
	}	
	
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */