<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organization extends CI_Controller {


    function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('organization_model');
		$this->load->library('email');
	}
	public function view_exam(){
		$this->load->view('includes/header');
		$data['exam_detail'] = $this->organization_model->view_exam_model();	
		$this->load->view('view_exam',$data);
		$this->load->view('includes/footer_student'); 
	}
	
  /*public function index()
	{
		$data['main_content'] = 'register_view';		
		$this->load->view('includes/template', $data);
	}*/

/*	public function import_student()
	{	if(!$this->session->userdata('user_data')) {
			redirect('/', 'refresh');	
		}
		if($this->session->userdata('user_data')) {
		$user_logged_rec = $this->session->userdata('user_data');
		$organization_id=$user_logged_rec['organization_id'];	
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name'] = $organization_name;
		$organization_owner_name=$user_logged_rec['owner_first_name'].' '.$user_logged_rec['owner_last_name'];
		$data['organization_owner_name'] = $organization_owner_name;
		$remaining_session=$this->organization_model->remaining_session($organization_id);$data['remaining_session'] = $remaining_session;					
		}
		if($this->input->post('submit')){print_r($_POST);print_r($_FILE);die;
			  echo $filename=$_FILES["file"]["tmp_name"];
			  if($_FILES["file"]["size"] > 0)
			  {
			  $file = fopen($filename, "r");
			  //$sql_data = "SELECT * FROM prod_list_1 ";
			  while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
			  {
			  //print_r($emapData);
			  //exit();
			  $sql = "INSERT into student(student_first_name,student_last_name) values ('$emapData[0]','$emapData[1]')";
			  mysql_query($sql);
			  }
			  fclose($file);
			  echo 'CSV File has been successfully Imported';
			  header('Location: index.php');
			  }
			  else
			  echo 'Invalid File:Please Upload CSV/XLS File';
			  die;
		}
		$data['main_content'] = 'import_student';		
		$this->load->view('includes/template', $data);
	}*/
	public function free_trial()
	{
		//-----------------Start-------------------------------------
		if($this->input->post('submit')){
		  $this->form_validation->set_rules('username', 'UserName', 'trim|required|callback_exists_username');
		  $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		  $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		  $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_exists_email');
		  $this->form_validation->set_rules('password', 'Password', 'trim|required');
		  $this->form_validation->set_rules('conpassword', 'Confirm Password', 'trim|required|matches[password]');
		  $this->form_validation->set_rules('organization', 'Organization', 'trim|required');
		  $this->form_validation->set_rules('subdomain', 'Sub Domain', 'trim|required|callback_exists_subdomain');
		  if($this->form_validation->run() == FALSE){
			  //$this->load->view('add_student');	
		  }
		  else {
			  $this->load->model('register_model');
			  if($this->organization_model->create_organization()){		  
				  
			  		$this->load->library('email');
					$this->email->from('no-reply@toptals.com', 'toptals');
					$this->email->to($this->input->post('email'));
					//$this->email->cc('another@another-example.com');
					//$this->email->bcc('them@their-example.com');
					$this->email->subject('Thankyou for register and account');
					$this->email->message('You have registered successfully, Please login here. http://'.$this->input->post('subdomain').'.toptals.com');
					$this->email->send();

					//echo $this->email->print_debugger();

				  $data['registered_successfully'] = "";
				  $this->session->set_flashdata('registered_successfully', 'You have registered successfully, Please login here. http://'.$this->input->post('subdomain').'.toptals.com');	
				  
				  //redirect('/', 'refresh');		
				  redirect('http://'.$_SERVER['HTTP_HOST'].'/organization/free_trial?success','refresh');
				  



				  }



			  }
		}
		//------------------End------------------------------------
		$data['main_content'] = 'free_trial';		
		$this->load->view('includes/template', $data);
	}
	
	public function home()
	{
		if(!$this->session->userdata('user_data')) {
			redirect('/', 'refresh');	
		}
		if($this->session->userdata('user_data')) {
		$user_logged_rec = $this->session->userdata('user_data');
		$organization_id=$user_logged_rec['organization_id'];	
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name'] = $organization_name;
		$organization_owner_name=$user_logged_rec['owner_first_name'].' '.$user_logged_rec['owner_last_name'];
		$data['organization_owner_name'] = $organization_owner_name;
		$remaining_session=$this->organization_model->remaining_session($organization_id);$data['remaining_session'] = $remaining_session;					
		}
		//-------------exam list start------
		$exam_where = array('organization_id'=>$organization_id);
		$arr_all_exam_from_organization = $this->organization_model->get_all_exam_from_organization($exam_where);
		$data['arr_all_exam_from_organization']= $arr_all_exam_from_organization;
		//-----------exam list end--------
		$exam_where = array('e.organization_id'=>$organization_id);
		$arr_all_student_exam_report_organization = $this->organization_model->get_all_student_exam_report_organization($exam_where);
		$data['arr_all_student_exam_report_organization']= $arr_all_student_exam_report_organization;
		//----------student list ends here----
		$data['main_content'] = 'organization_home';		
		$this->load->view('includes/template', $data);
	}
		
	public function add_exam()
	{
		//////////////////////////////////////////
		if($this->session->userdata('user_data')) {
		$user_logged_rec = $this->session->userdata('user_data');
		$organization_id=$user_logged_rec['organization_id'];	
		$subdomain=$user_logged_rec['subdomain'];	
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name'] = $organization_name;
		$organization_owner_name=$user_logged_rec['owner_first_name'].' '.$user_logged_rec['owner_last_name'];
		$data['organization_owner_name'] = $organization_owner_name;
		$remaining_session=$this->organization_model->remaining_session($organization_id);$data['remaining_session'] = $remaining_session;					
		}
		if($this->input->post('submit')){//print_r($_POST);die;
		
		$this->form_validation->set_error_delimiters('<div class="err">', '</div>');
		$this->form_validation->set_rules('exam_name', 'Exam Name', 'trim|required');
		$this->form_validation->set_rules('number_of_question', 'Number Of Question', 'trim|required');
		$this->form_validation->set_rules('passmarks', 'Passmarks', 'trim|required');
		$this->form_validation->set_rules('time_limit', 'Time Limit', 'trim|required');
		
		$this->form_validation->set_rules('full_name', 'Full Name', 'trim');
		$this->form_validation->set_rules('email', 'Email', 'trim');
		$this->form_validation->set_rules('bcc_results', 'Bcc Result', 'trim');
		$this->form_validation->set_rules('exam_banner', 'Exam Banner', 'trim');
		$this->form_validation->set_rules('styling', 'Styling', 'trim');
		$this->form_validation->set_rules('weighted_exam', 'Weighted Exam', 'trim');
		$this->form_validation->set_rules('show_final_score', 'Show Final Score', 'trim');
		$this->form_validation->set_rules('display_incorrect_answers_on_completion', 'Display Incorrect Answers On Completion', 'trim');
		$this->form_validation->set_rules('exam_code', 'Exam Code', 'trim');
		$this->form_validation->set_rules('exam_introduction_text', 'Exam Introduction Text', 'trim');
		$this->form_validation->set_rules('email_invitation_note_optional', 'Email Invitation Note Optional', 'trim');
		$this->form_validation->set_rules('text_completion_success', 'Text Completion Success', 'trim');
		$this->form_validation->set_rules('automated_email_reminder_text', 'Automated Email Reminder Text', 'trim');
		$this->form_validation->set_rules('text_completion_fail', 'Text Completion Fail', 'trim');
		
		if($this->form_validation->run() == FALSE){
			//$this->load->view('add_exam');	
		}
		else {
			$this->load->model('organization_model');
			if($exam_id=$this->organization_model->add_exam($organization_id,$subdomain)){			
				$data['exam_created_successfully'] = "";
				$this->session->set_flashdata('exam_created_successfully', 'Exam created successfully.');	
				//redirect('http://'.$_SERVER['HTTP_HOST'].'/organization/question/exam_id/'.$exam_id);	
					header("Location:http://".$subdomain.".toptals.com/organization/question/exam_id/".$exam_id);
				}
			}
		}
		//////////////////////////////////////////
		$data['main_content'] = 'add_exam';		
		$this->load->view('includes/template', $data);
	}
	
	public function student_administration()
	{
		if(!$this->session->userdata('user_data')) {
			redirect('/', 'refresh');	
		}
		if($this->session->userdata('user_data')) {
		$user_logged_rec = $this->session->userdata('user_data');
		$organization_id=$user_logged_rec['organization_id'];	
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name'] = $organization_name;
		$organization_owner_name=$user_logged_rec['owner_first_name'].' '.$user_logged_rec['owner_last_name'];
		$data['organization_owner_name'] = $organization_owner_name;
		$remaining_session=$this->organization_model->remaining_session($organization_id);$data['remaining_session'] = $remaining_session;					
		}
		$student_where = array('organization_id'=>$organization_id);
		$arr_all_student_from_organization = $this->organization_model->get_all_student_from_organization($student_where);
		
		$data['arr_all_student_from_organization']= $arr_all_student_from_organization;
		$data['main_content'] = 'student_administration';		
		$this->load->view('includes/template', $data);
	}
	

	public function exam()
	{
		if(!$this->session->userdata('user_data')) {
			redirect('/', 'refresh');	
		}
		if($this->session->userdata('user_data')) {
		$user_logged_rec = $this->session->userdata('user_data');
		$organization_id=$user_logged_rec['organization_id'];	
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name'] = $organization_name;
		$organization_owner_name=$user_logged_rec['owner_first_name'].' '.$user_logged_rec['owner_last_name'];
		$data['organization_owner_name'] = $organization_owner_name;
		$remaining_session=$this->organization_model->remaining_session($organization_id);$data['remaining_session'] = $remaining_session;					
		}
		$exam_where = array('organization_id'=>$organization_id);
		$arr_all_exam_from_organization = $this->organization_model->get_all_exam_from_organization($exam_where);
		$data['arr_all_exam_from_organization']= $arr_all_exam_from_organization;
		$data['main_content'] = 'exam';		
		$this->load->view('includes/template', $data);
	}


	public function report()
	{
		if(!$this->session->userdata('user_data')) {
			redirect('/', 'refresh');	
		}
		if($this->session->userdata('user_data')) {
		$user_logged_rec = $this->session->userdata('user_data');
		$organization_id=$user_logged_rec['organization_id'];	
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name'] = $organization_name;
		$organization_owner_name=$user_logged_rec['owner_first_name'].' '.$user_logged_rec['owner_last_name'];
		$data['organization_owner_name'] = $organization_owner_name;
		$remaining_session=$this->organization_model->remaining_session($organization_id);$data['remaining_session'] = $remaining_session;					
		}
		$exam_where = array('e.organization_id'=>$organization_id);
		$arr_all_student_exam_report_organization = $this->organization_model->get_all_student_exam_report_organization($exam_where);
		$data['arr_all_student_exam_report_organization']= $arr_all_student_exam_report_organization;
		
		
		//$arr_exam_summary_of_organization = $this->organization_model->get_exam_summary_of_organization($exam_where);
		//$data['arr_exam_summary_of_organization']= $arr_exam_summary_of_organization;
		
		$arr_exam_summary_of_organization_session = $this->organization_model->get_exam_summary_of_organization_session($exam_where);
		$data['arr_exam_summary_of_organization_session']= $arr_exam_summary_of_organization_session;
		$arr_exam_summary_of_organization_passfail = $this->organization_model->get_exam_summary_of_organization_passfail($exam_where);
		$data['arr_exam_summary_of_organization_passfail']= $arr_exam_summary_of_organization_passfail;
		
		//----for search start---
		if($_GET){//print_r($_GET);  
		$arr_search_all_student_exam_report_organization = $this->organization_model->get_search_all_student_exam_report_organization($exam_where,$_GET['exam_id'],$_GET['report_type'],$_GET['date_range']);
		$data['arr_all_student_exam_report_organization']= $arr_search_all_student_exam_report_organization;
		}
		$arr_exam = $this->organization_model->get_exam($exam_where);$data['arr_exam']= $arr_exam;
		$arr_exam_given_dates = $this->organization_model->get_exam_given_dates($exam_where);
		$data['arr_exam_given_dates']= $arr_exam_given_dates;
		//---for search end---
		$data['main_content'] = 'report';		
		$this->load->view('includes/template', $data);
	}


	public function export(){
		if($this->session->userdata('user_data')) {
		$user_logged_rec = $this->session->userdata('user_data');
		$organization_id=$user_logged_rec['organization_id'];
		$organization_name=$user_logged_rec['organization_name'];	$data['organization_name']= $organization_name;				
		} 
		$exam_where = array('e.organization_id'=>$organization_id);
		$report=$this->organization_model->export($exam_where);	
	}

	public function question()
	{
		if(!$this->session->userdata('user_data')) {
			redirect('/', 'refresh');	
		}
		else{
			
		$user_logged_rec = $this->session->userdata('user_data');
		$organization_id=$user_logged_rec['organization_id'];	
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name'] = $organization_name;
		$organization_owner_name=$user_logged_rec['owner_first_name'].' '.$user_logged_rec['owner_last_name'];
		$data['organization_owner_name'] = $organization_owner_name;
		$remaining_session=$this->organization_model->remaining_session($organization_id);$data['remaining_session'] = $remaining_session;					
		
		 //$data['list'] = $this->organization_model->get_question_to_edit();
		if(!empty($_POST)){
			$question=$this->input->post('question');
			$marks_assign=$this->input->post('marks_assign');
			$question_id=$this->organization_model->add_question($this->input->post('exam_id'),$question,$marks_assign,$organization_id);
		//	print_r($insert_question);
			foreach($_POST['answerarr'] as $ar){
				if($ar==1){$ar='';}
				$newanswer='new-answer'.$ar;
				$correctnew='correct-new'.$ar;
				$shortformnew='shortform-new'.$ar;
				if(isset($_POST[$correctnew])){$correct=1;}else{$correct='';}
				if(isset($_POST[$shortformnew])){$short_form_response=1;}else{$short_form_response='';}
				$answer_title=$_POST[$newanswer];	
				$insert_answer=$this->organization_model->add_answer($question_id,$answer_title,$correct,$short_form_response);
			}
		}
		$get = $this->uri->uri_to_assoc();
		$exam_id=$get['exam_id'];
		
		
		$get_exam_weighted_exam=$this->organization_model->get_exam_weighted_exam($exam_id);
		$data['get_exam_weighted_exam'] = $get_exam_weighted_exam;
		
		$exam_where = array('exam_id'=>$exam_id);
		$arr_all_questions_from_exam = $this->organization_model->get_all_questions_from_exam($exam_where);
		$data['arr_all_questions_from_exam']= $arr_all_questions_from_exam;
		$data['main_content'] = 'question';		
		$this->load->view('includes/template', $data);
		}//else section for logged in users
	}
	
	public function answer_edit(){ 
		$get = $this->uri->uri_to_assoc();
		$exam_id=$get['exam_id'];
		$update_answer=$this->organization_model->edit_answer();	
		if($update_answer){redirect('http://'.$_SERVER['HTTP_HOST'].'/organization/question/exam_id/'.$exam_id, 'refresh');		}	
	}
	
	public function delete_question_answer(){ 
		$get = $this->uri->uri_to_assoc();
		$exam_id=$get['exam_id'];$question_id=$get['question_id'];
		$update_answer=$this->organization_model->delete_question_answer($question_id);	
		if($update_answer){redirect('http://'.$_SERVER['HTTP_HOST'].'/organization/question/exam_id/'.$exam_id, 'refresh');		}	
	}
			
			
	public function add_student()
	{
		//////////////////////////////////////////
		if(!$this->session->userdata('user_data')) {
			redirect('/', 'refresh');	
		}
		if($this->session->userdata('user_data')) {
		$user_logged_rec = $this->session->userdata('user_data');
		$organization_id=$user_logged_rec['organization_id'];	
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name'] = $organization_name;
		$organization_owner_name=$user_logged_rec['owner_first_name'].' '.$user_logged_rec['owner_last_name'];
		$data['organization_owner_name'] = $organization_owner_name;
		$remaining_session=$this->organization_model->remaining_session($organization_id);$data['remaining_session'] = $remaining_session;					
		}
		if($this->input->post('submit')){
		$this->form_validation->set_error_delimiters('<div class="err">', '</div>');
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
			if($this->organization_model->add_student($organization_id)){			
				$data['registered_successfully'] = "";
				$this->session->set_flashdata('registered_successfully', 'Student registered successfully.');	
				redirect('http://'.$_SERVER['HTTP_HOST'].'/organization/student_administration', 'refresh');		
				}
			}
		}
		//////////////////////////////////////////
		$data['main_content'] = 'add_student';		
		$this->load->view('includes/template', $data);
	}

			
	public function edit_student()
	{
		if(!$this->session->userdata('user_data')) {
			redirect('/', 'refresh');	
		}if($this->session->userdata('user_data')) {
		$user_logged_rec = $this->session->userdata('user_data');
		$organization_id=$user_logged_rec['organization_id'];	
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name'] = $organization_name;
		$organization_owner_name=$user_logged_rec['owner_first_name'].' '.$user_logged_rec['owner_last_name'];
		$data['organization_owner_name'] = $organization_owner_name;
		$remaining_session=$this->organization_model->remaining_session($organization_id);$data['remaining_session'] = $remaining_session;					
		}
		$get = $this->uri->uri_to_assoc();
		$student_id=$get['sid'];
		$data['sid']= $student_id;
		$arr_student_detail = $this->organization_model->get_student_detail($student_id);
		$data['arr_student_detail']= $arr_student_detail;
		
		$user_logged_rec = $this->session->userdata('user_data');
		$organization_id=$user_logged_rec['organization_id'];					
		$exam_where = array('organization_id'=>$organization_id);
		$arr_all_exam_from_organization = $this->organization_model->get_all_exam_from_organization($exam_where);
		$data['arr_all_exam_from_organization']= $arr_all_exam_from_organization;
		
		if($this->input->post('submit')=='Create Exam Session'){
			$exam_id=$this->input->post('exam_id');
			$send_email=$this->input->post('send_email');
				$this->load->library('email');
			$arr_assign_exam_student = $this->organization_model->assign_exam_student($student_id,$send_email,$exam_id);
			//print_r($_POST);die;
			}
		
		$arr_get_assign_exam_student = $this->organization_model->get_assign_exam_student($student_id);
		$data['arr_get_assign_exam_student']= $arr_get_assign_exam_student;
		
		
		if($this->input->post('submit')=='Save'){//print_r($_POST);
		/*Array ( [student_first_name] => fewtttt [student_last_name] => werwettt [student_email] => asdsdasd@fhf.jtyjyt [password] => aaa [company_name] => rweree [crm_id] => 123 [submit] => Save ) */
			$this->form_validation->set_error_delimiters('<div class="err">', '</div>');
			$this->form_validation->set_rules('student_first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('student_last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('student_email', 'Email', 'trim|required|valid_email|callback_exists_email_student');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('company_name', 'Company', 'trim');
		if($this->form_validation->run() == FALSE){
			   //$this->load->view('add_student');	
		}else {
			  $student_first_name=$this->input->post('student_first_name');
			  $student_last_name=$this->input->post('student_last_name');
			  $student_email=$this->input->post('student_email');
			  $password=$this->input->post('password');
			  $company_name=$this->input->post('company_name');
			  $crm_id=$this->input->post('crm_id');
			  
			  $arr_student_detail = $this->organization_model->edit_student_detail($student_id,$student_first_name,$student_last_name,$student_email,$password,$company_name,$crm_id);
			  
			  if($arr_student_detail){
					  $data['updated_successfully'] = "";
					  $this->session->set_flashdata('updated_successfully', 'Student updated successfully.');	
					  redirect('http://'.$_SERVER['HTTP_HOST'].'/organization/student_administration', 'refresh');	
			  }
		}
		/*$this->form_validation->set_error_delimiters('<div class="err">', '</div>');
		$this->form_validation->set_rules('student_first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('student_last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('student_email', 'Email', 'trim|required|valid_email|checkemail_student_availability');
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
				redirect('http://'.$_SERVER['HTTP_HOST'].'/organization/student_administration', 'refresh');		
				}
			}*/
		}
		$data['main_content'] = 'edit_student';		
		$this->load->view('includes/template', $data);
	}
	

	
	public function validate_credentials(){		
		$this->form_validation->set_rules('username', 'UserName', 'trim|required|callback_exists_username');
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
				redirect('/', 'refresh');		
				}
			}
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
				$this->form_validation->set_message('exists_email', '%s is already exist');return false;
				}
		}
		function exists_username($username)
		{			
			$this->load->model('organization_model');
			$username_avail = $this->organization_model->checkusername_availability($username);
			if($username_avail){				
				return true;			
				}
			else {
				$this->form_validation->set_message('exists_username', '%s is already exist');return false;
				}
		}
		
		function exists_email_student($email)
		{			
			$this->load->model('organization_model');
			$this->form_validation->set_message('student_email','already exists.'); 
			 
			$email_avail = $this->organization_model->checkemail_student_availability($email);
			if($email_avail){				
				return true;			
				}
			else {
				$this->form_validation->set_message('exists_email_student', '%s is already exist');return false;
				}
		}
				
		function login_post()
		 {
			 $username = $this->input->post('username');
			 $password = $this->input->post('password');
			 $result = $this->organization_model->organisation_login($username, $password);
			// print_r($result); die;
			 $bAuthenticated=FALSE;
			 if($result)
			 {	
				$sess_array = array();
				 foreach($result as $row)
				 {
						   $sess_array = array(
						     'organization_username' => $row->organization_username,
						     'organization_id' => $row->id,
							 'organization_name' => $row->organization_name,
							 'owner_email' => $row->owner_email,
							 'owner_first_name' => $row->owner_first_name,
							 'owner_last_name'=>$row->owner_last_name,
							 'subdomain'=>$row->subdomain
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
				   redirect('http://'.$sess_array['subdomain'].'.toptals.com/organization/home/');
			   }else{
				   redirect('/','refresh');
			  }

		 }
 
	public function logout()
	{
		$this->session->unset_userdata('user_data');
		$this->session->sess_destroy();
		redirect('http://'.$_SERVER['HTTP_HOST']);
		//redirect('home', 'refresh');
	}	
	
	
	function get_question_to_edit(){
		$data = array();
        $data['title'] = 'Lorem ipsum';
        $data['list'] = $this->organization_model->get_question_to_edit();echo($data['list']);
        //$this->load->view('question','cvcvcv');
    }
	
		
	public function edit_exam()
	{
		if($this->session->userdata('user_data')) {
		$user_logged_rec = $this->session->userdata('user_data');
		$organization_id=$user_logged_rec['organization_id'];	
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name'] = $organization_name;
		$organization_owner_name=$user_logged_rec['owner_first_name'].' '.$user_logged_rec['owner_last_name'];
		$data['organization_owner_name'] = $organization_owner_name;
		$remaining_session=$this->organization_model->remaining_session($organization_id);$data['remaining_session'] = $remaining_session;					
		}
		
		$get = $this->uri->uri_to_assoc();
		$exam_id=$get['exam_id'];
		$get_exam_detail=$this->organization_model->get_exam_detail($exam_id);
		$data['get_exam_detail'] = $get_exam_detail;
		
		if($this->input->post('submit')){//print_r($_POST);die;
		//$exam_id=$this->input->post('exam_id');
		$this->form_validation->set_error_delimiters('<div class="err">', '</div>');
		$this->form_validation->set_rules('exam_name', 'Exam Name', 'trim|required');
		$this->form_validation->set_rules('number_of_question', 'Number Of Question', 'trim|required');
		$this->form_validation->set_rules('passmarks', 'Passmarks', 'trim|required');
		$this->form_validation->set_rules('time_limit', 'Time Limit', 'trim|required');
		
		$this->form_validation->set_rules('full_name', 'Full Name', 'trim');
		$this->form_validation->set_rules('email', 'Email', 'trim');
		$this->form_validation->set_rules('bcc_results', 'Bcc Result', 'trim');
		$this->form_validation->set_rules('exam_banner', 'Exam Banner', 'trim');
		$this->form_validation->set_rules('styling', 'Styling', 'trim');
		$this->form_validation->set_rules('weighted_exam', 'Weighted Exam', 'trim');
		$this->form_validation->set_rules('show_final_score', 'Show Final Score', 'trim');
		$this->form_validation->set_rules('display_incorrect_answers_on_completion', 'Display Incorrect Answers On Completion', 'trim');
		$this->form_validation->set_rules('exam_code', 'Exam Code', 'trim');
		$this->form_validation->set_rules('exam_introduction_text', 'Exam Introduction Text', 'trim');
		$this->form_validation->set_rules('email_invitation_note_optional', 'Email Invitation Note Optional', 'trim');
		$this->form_validation->set_rules('text_completion_success', 'Text Completion Success', 'trim');
		$this->form_validation->set_rules('automated_email_reminder_text', 'Automated Email Reminder Text', 'trim');
		$this->form_validation->set_rules('text_completion_fail', 'Text Completion Fail', 'trim');
		
		if($this->form_validation->run() == FALSE){
			//$this->load->view('add_exam');	
		}
		else {
			$this->load->model('organization_model');
			if($exam_id=$this->organization_model->edit_exam($exam_id)){			
				$data['exam_created_successfully'] = "";
				$this->session->set_flashdata('exam_created_successfully', 'Exam Updated successfully.');	
				redirect('http://'.$_SERVER['HTTP_HOST'].'/organization/question/exam_id/'.$exam_id, 'refresh');		
				}
			}
		}

		$data['main_content'] = 'edit_exam';		
		$this->load->view('includes/template', $data);
	}
	
	
	
}



/* End of file organization.php */
/* Location: ./application/controllers/organization.php */