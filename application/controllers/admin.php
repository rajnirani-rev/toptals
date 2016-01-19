<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {


    function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('admin_model');
		$this->load->library('pagination');
		
	}
	
	public function index()
	{
		
		$data['main_content'] = 'admin/admin_login';		
		$this->load->view('admin/includes/template', $data);
	}
	
	public function admin_home()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		$arr_all_plans = $this->admin_model->get_all_plans();
		$data['arr_all_plans']= $arr_all_plans;
		$data['main_content'] = 'admin/admin_home';		
		$this->load->view('admin/includes/template', $data);
	}
	public function admin_features()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		$arr_all_plans = $this->admin_model->get_all_features();
		$data['arr_all_plans']= $arr_all_plans;
		$data['main_content'] = 'admin/admin_features';		
		$this->load->view('admin/includes/template', $data);
	}
	public function aboutus()	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		$arr_all_about = $this->admin_model->get_about();
		//print_r($arr_all_image); die();
		$data['arr_all_about']= $arr_all_about;
		$data['main_content'] = 'admin/admin_about';		
		$this->load->view('admin/includes/template', $data);
	}
	public function about_main()	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		 $arr_all_about_main = $this->admin_model->get_main_about();
		//print_r($arr_all_image); die();
		$data['arr_all_about_main']= $arr_all_about_main;
		$data['main_content'] = 'admin/admin_mainForm';		
		$this->load->view('admin/includes/template', $data);
	}
	public function admin_org()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		$config = array();
		$config["base_url"] = base_url() . "admin/admin_org";
		$total_row = $this->admin_model->record_count('organization');
		$config["total_rows"] = $total_row;
		$config["per_page"] = 10;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = ' Next ';
		$config['prev_link'] = ' Previous ';
		//print_r($this->pagination->initialize($config)); die();
		$this->pagination->initialize($config);
		if($this->uri->segment(3)){
		//$offset = ($this->uri->segment(3));
		$offset = ($this->uri->segment(3)-1)*($config["per_page"]);
		}
		else{
		$offset = 0;
		}
		//$data["arr_all_plans"] = $this->pagination_model->fetch_data('organization','id',$config["per_page"], $page);
		//$data["sadf"] = $this->pagination_model->fetch_data('plan','plan_id',$config["per_page"], $page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		//print_r($data); die();
		$arr_all_organization = $this->admin_model->fetch_data('organization',$config["per_page"],$offset);
		//print_r($arr_all_organization); die();
		$data['arr_all_organization']= $arr_all_organization;
		$data['main_content'] = 'admin/admin_org';		
		$this->load->view('admin/includes/template', $data);
	}	
	
	
	public function report()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		$config = array();
		$config["base_url"] = base_url() . "admin/report";
		$total_row = $this->admin_model->record_count('credit_card_payment');
		$config["total_rows"] = $total_row;
		$config["per_page"] = 10;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = ' Next ';
		$config['prev_link'] = ' Previous ';
		$this->pagination->initialize($config);
		if($this->uri->segment(3)){
		$offset = ($this->uri->segment(3)-1)*($config["per_page"]);
		}
		else{
		$offset = 0;
		}
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		//print_r($data); die();
		$arr_all_organization = $this->admin_model->fetch_data('credit_card_payment',$config["per_page"],$offset);
		//print_r($arr_all_organization); die();
		$data['arr_all_organization']= $arr_all_organization;
		$data['main_content'] = 'admin/report';		
		$this->load->view('admin/includes/template', $data);
	}
	
	
	public function admin_homepost()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		$arr_all_homepost = $this->admin_model->get_all_homepost();
		$data['arr_all_homepost']= $arr_all_homepost;
		$data['main_content'] = 'admin/admin_homepost';		
		$this->load->view('admin/includes/template', $data);
	}	
	public function admin_whoUseToptals()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		$arr_all_image = $this->admin_model->get_images();
		$data['arr_all_image']= $arr_all_image;
		$data['main_content'] = 'admin/admin_whousetoptals';		
		$this->load->view('admin/includes/template', $data);
	}	
	public function admin_testimonial()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		 $arr_all_testimonial = $this->admin_model->get_testimonial();
		//print_r($arr_all_image); die();
		$data['arr_all_testimonial']= $arr_all_testimonial;
		//$arr_all_image = $this->admin_model->get_images();
		//$data['arr_all_image']= $arr_all_image;
		$data['main_content'] = 'admin/admin_testimonail';		
		$this->load->view('admin/includes/template', $data);
	}	
	public function add_plans()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		$data['main_content'] = 'admin/students_plans';		
		$this->load->view('admin/includes/template', $data);
	}

	public function add_features()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		$data['main_content'] = 'admin/features';		
		$this->load->view('admin/includes/template', $data);
	}	
	public function add_about_us()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		$data['main_content'] = 'admin/admin_aboutForm';		
		$this->load->view('admin/includes/template', $data);
	}
		
	public function add_logo()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		//$this->load->view('admin_logo', array('error' => ' ' ));
		$data['main_content'] = 'admin/admin_logo';		
		$this->load->view('admin/includes/template', $data);
	}
	public function add_testimonial()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }

		//$this->load->view('admin_logo', array('error' => ' ' ));
		$data['main_content'] = 'admin/admin_testimonailForm';		
		$this->load->view('admin/includes/template', $data);
	}
	public function do_upload()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		
		//print_r($this->input->post('logo'));die();
		//print_r($_SERVER);
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$data['main_content'] = 'admin/admin_logo';		
			$this->load->view('admin/includes/template',$data);
		}
		else{
			$this->load->model('admin_model');
			$imagedata = $this->upload->data();
			if($this->admin_model->insert_images($imagedata)){			
				$data['upload_successfully'] = "";
				$this->session->set_flashdata('upload_successfully', 'upload successfully.');	
				redirect('admin/image_administration', 'refresh');		
			}
		}
	}
	
	function add_new_testimonial() {
    //validate form input
		
        $this->form_validation->set_error_delimiters('<div class="err">', '</div>');
		$this->form_validation->set_rules('testimonialName', 'Name', 'trim|required');
		$this->form_validation->set_rules('testimonialSummary', 'Summary', 'trim|required');
		$this->form_validation->set_rules('testimonialEmail', 'Email', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {     
       // echo 'sd'; die(); 
      	 $this->load->view('admin/admin_testimonailForm');	 
			
         }else {
         	$config['upload_path'] = './upload/testimonial/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1000';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

	        $this->load->library('upload', $config);
			$this->upload->initialize($config);
	        
	       
	   		 if ( ! $this->upload->do_upload())
			{
			$error = array('error' => $this->upload->display_errors());
			$data['main_content'] = 'admin/admin_testimonailForm';		
			$this->load->view('admin/includes/template',$data);
			}else{
			$this->load->model('admin_model');
			$imagedata = $this->upload->data();
				if($this->admin_model->insert_testimonial($imagedata)){			
					$data['upload_successfully'] = "";
					$this->session->set_flashdata('upload_successfully', 'upload successfully.');	
					redirect('admin/testimonial_administration', 'refresh');		
				}
			}
		}
		$data['main_content'] = 'admin/admin_testimonailForm';		
		$this->load->view('admin/includes/template', $data);
	}
	public function add_new_about()
	{

    //validate form input
		
        $this->form_validation->set_error_delimiters('<div class="err">', '</div>');
		$this->form_validation->set_rules('teamName', 'Name', 'trim|required');
		$this->form_validation->set_rules('teamSummary', 'Summary', 'trim|required');
		

        if ($this->form_validation->run() == FALSE)
        {     
       // echo 'sd'; die(); 
      	 $this->load->view('admin/admin_aboutForm');	 
			
         }else {
         	$config['upload_path'] = './upload/teamImages/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1000';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

	        $this->load->library('upload', $config);
			$this->upload->initialize($config);
	        
	       
	   		 if ( ! $this->upload->do_upload())
			{
			$error = array('error' => $this->upload->display_errors());
			$data['main_content'] = 'admin/admin_aboutForm';		
			$this->load->view('admin/includes/template',$data);
			}else{
			$this->load->model('admin_model');
			$imagedata = $this->upload->data();
				if($this->admin_model->insert_aboutInfo($imagedata)){			
					$data['upload_successfully'] = "";
					$this->session->set_flashdata('upload_successfully', 'upload successfully.');	
					redirect('admin/aboutus_administration	', 'refresh');		
				}
			}
		}
		$data['main_content'] = 'admin/admin_aboutForm';		
		$this->load->view('admin/includes/template', $data);
	
	}
	public function plan_administration()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
	
		$arr_all_plans = $this->admin_model->get_all_plans();
		//print_r($arr_all_student_from_organization); die();
		$data['arr_all_plans']= $arr_all_plans;
		$data['main_content'] = 'admin/admin_home';		
		$this->load->view('admin/includes/template', $data);
	}	

	public function features_administration()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }	
		$arr_all_plans = $this->admin_model->get_all_features();
		//print_r($arr_all_student_from_organization); die();
		$data['arr_all_plans']= $arr_all_plans;
		$data['main_content'] = 'admin/admin_features';		
		$this->load->view('admin/includes/template', $data);
	}	
	public function image_administration()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		//echo'sdfsdfsdfsd'; die();
		$arr_all_image = $this->admin_model->get_images();
		//print_r($arr_all_image); die();
		$data['arr_all_image']= $arr_all_image;
		$data['main_content'] = 'admin/admin_whousetoptals';		
		$this->load->view('admin/includes/template', $data);
	}	
	public function testimonial_administration()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		//echo'sdfsdfsdfsd'; die();
		$arr_all_testimonial = $this->admin_model->get_testimonial();
		//print_r($arr_all_image); die();
		$data['arr_all_testimonial']= $arr_all_testimonial;
		$data['main_content'] = 'admin/admin_testimonail';		
		$this->load->view('admin/includes/template', $data);
	}
	public function aboutus_administration()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		//echo'sdfsdfsdfsd'; die();
		$arr_all_about = $this->admin_model->get_about();
		//print_r($arr_all_image); die();
		$data['arr_all_about']= $arr_all_about;
		$data['main_content'] = 'admin/admin_about';		
		$this->load->view('admin/includes/template', $data);
	}
	public function about_main_administration()
	{
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		//echo'sdfsdfsdfsd'; die();
		$arr_all_about_main = $this->admin_model->get_main_about();
		//print_r($arr_all_image); die();
		$data['arr_all_about_main']= $arr_all_about_main;
		$data['main_content'] = 'admin/admin_mainForm';		
		$this->load->view('admin/includes/template', $data);
	}
	public function plan_delete(){
		
		$delete_id = $this->uri->segment(3);
		//print_r($delete_id); die();
		$result = $this->admin_model->delete_plan_id($delete_id);
		redirect('admin/plan_administration', 'refresh');
	}
	public function image_delete(){
		
		$delete_id = $this->uri->segment(3);
		//print_r($delete_id); die();
		$result = $this->admin_model->delete_image_id($delete_id);
		redirect('admin/image_administration', 'refresh');
	}
	public function testimonial_delete(){
		
		$delete_id = $this->uri->segment(3);
		//print_r($delete_id); die();
		$result = $this->admin_model->delete_testimonial_id($delete_id);
		redirect('admin/testimonial_administration', 'refresh');
	}
	public function about_delete(){
		
		$delete_id = $this->uri->segment(3);
		//print_r($delete_id); die();
		$result = $this->admin_model->delete_about_id($delete_id);
		redirect('admin/aboutus_administration', 'refresh');
	}
	public function features_delete(){
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		$delete_id = $this->uri->segment(3);
		//print_r($delete_id); die();
		$result = $this->admin_model->delete_features_id($delete_id);
		redirect('admin/features_administration', 'refresh');
	}
	public function org_delete(){
		
		$delete_id = $this->uri->segment(3);
		//print_r($delete_id); die();
		$result = $this->admin_model->delete_org_id($delete_id);
		redirect('admin/admin_org', 'refresh');
	}
	
	
	public function add_new_plans(){
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
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
	public function main_about(){
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		//////////////////////////////////////////
		
		if($this->input->post('submit')){
		 $this->form_validation->set_error_delimiters('<div class="err">', '</div>');
		$this->form_validation->set_rules('aboutMain', 'Heading', 'trim|required');
		$this->form_validation->set_rules('desprection1', 'Desprection 1', 'trim|required');
		$this->form_validation->set_rules('desprection2', 'Desprection 2', 'trim|required');
		$this->form_validation->set_rules('desprection3', 'Desprection 3', 'trim|required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('admin/admin_aboutForm');	
		}
		else {
			$about_id = $this->uri->segment(3);
			$this->load->model('admin_model');
			if($this->admin_model->update_about_main($about_id)){			
				$data['registered_successfully'] = "";
				$this->session->set_flashdata('successfully', 'saved.');	
				redirect('admin/about_main_administration', 'refresh');		
				}
			}
		}
		//////////////////////////////////////////
		$data['main_content'] = 'admin/admin_aboutForm';		
		$this->load->view('admin/includes/template', $data);
	}
	public function add_new_features(){
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }
		//////////////////////////////////////////
		if($this->input->post('submit')){
		 $this->form_validation->set_error_delimiters('<div class="err">', '</div>');
		$this->form_validation->set_rules('featuresTitle', 'Title', 'trim|required');
		$this->form_validation->set_rules('featuresSummary', 'Summary', 'trim|required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('admin/features');	
		}
		else {
			$this->load->model('admin_model');
			if($this->admin_model->add_features()){			
				$data['registered_successfully'] = "";
				$this->session->set_flashdata('features_successfully', 'features saved.');	
				redirect('admin/features_administration', 'refresh');		
				}
			}
		}
		//////////////////////////////////////////
		$data['main_content'] = 'admin/features';		
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
					//$data['main_content'] = 'admin/admin_home';		
					//$this->load->view('admin/includes/template', $data);
			   }else{

				   redirect('admin/','refresh');
			  }
			}
		}
		//////////////////////////////////////////
		$data['main_content'] = 'admin/admin_home';		
		$this->load->view('admin/includes/template', $data);
	}
	public function validate_credentials_homepage_post()
	{
		
		//$arr_all_homepost = $this->admin_model->get_all_homepost();
		//$data['arr_all_homepost']= $arr_all_homepost;
		//////////////////////////////////////////

		if($this->input->post('submit')){
		$this->form_validation->set_error_delimiters('<div class="err">', '</div>');
		$this->form_validation->set_rules('postTitle', 'Title', 'trim|required');
		$this->form_validation->set_rules('postSummary', 'Summary', 'trim|required');
		$this->form_validation->set_rules('postDetails', 'Details', 'trim|required');
		if($this->form_validation->run() == FALSE){
			//$this->load->view('admin/admin_homepost');	
			//$this->session->set_flashdata('message', 'Invalid username or password.');
		}
		else {
			
			$home_id = $this->uri->segment(3);
			$this->load->model('admin_model');
			if($this->admin_model->update_homepagepost($home_id)){			
				$data['registered_successfully'] = "";
				$this->session->set_flashdata('update_successfully', 'update successfully.');	
				redirect('admin/admin_homepost', 'refresh');		
				}
			}
		}
		//////////////////////////////////////////
		$data['main_content'] = 'admin/admin_homepost';		
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
		if(!$this->session->userdata('user_data')) {
		   redirect('/', 'refresh'); 
		 }	
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