<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Student extends CI_Controller {

    function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('student_model');
	}
	
	public function myacc_view()
	{

		$this->load->view('includes/header_student');
		$data['records']=$this->student_model->sell();	
		$this->load->view('myacc_view',$data);		
		$this->load->view('includes/footer_student');
		//$data['main_content'] = 'myacc_view';
		//$data['main_content1'] = 
		//$this->load->view('includes/template_student', $data);
		
		
	}
	public function change_std_password()
	{

		$this->student_model->change_std_password_model();
		
		
	}

	public function index()
	{
		$data['main_content'] = 'student_register';		
		$this->load->view('includes/template_student', $data);
	}
	public function login()
	{
		$data['main_content'] = 'student_login';		
		$this->load->view('includes/template_student', $data);
	}	
	
	public function home()
	{	// echo "dff";print_r($this->session->userdata('suser_data'));die;
		if(!$this->session->userdata('suser_data')) {
			redirect('home/index', 'refresh');	
		}
		$user_logged_rec = $this->session->userdata('suser_data');	
		$student_id=$user_logged_rec['id'];
		
		$organization_name=$user_logged_rec['organization_name'];
		$data['organization_name']=$organization_name;
		
		$arr_get_assign_exam_student = $this->student_model->get_assign_exam_student($student_id);
		$data['arr_get_assign_exam_student']= $arr_get_assign_exam_student;
		$data['main_content'] = 'student_home';		
		$this->load->view('includes/template_student', $data);
	}	
	
	public function exam_start()
	{
		if(!$this->session->userdata('suser_data')) {
			redirect('home/index', 'refresh');	
		}
		$user_logged_rec = $this->session->userdata('suser_data');	
		$student_id=$user_logged_rec['id'];
		
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name']=$organization_name;
		
		$exam_id=$this->uri->segment(4);
		$session_id=$this->uri->segment(3);
		$offset=0;
		$arr_get_exam_detail = $this->student_model->get_exam_detail($student_id,$exam_id,$session_id);
		$arr_get_first_questions = $this->student_model->get_first_questions($exam_id, $offset);
		$data['arr_get_first_questions']= $arr_get_first_questions;
		$data['arr_get_exam_detail']= $arr_get_exam_detail;
		$data['main_content'] = 'student_exam_start';		
		$this->load->view('includes/template_student', $data);
	}	


	public function exam_get_next_question()
	{
		$user_logged_rec = $this->session->userdata('suser_data');	
		$student_id=$user_logged_rec['id'];
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name']=$organization_name;
		
		$exam_id=$this->uri->segment(4);
		$session_id=$this->uri->segment(3);
		$question_id=$this->uri->segment(5);
		$offset=$this->uri->segment(6);
		$prv_question=$question_id;
		$prv_offset=$offset;
		$question_id = $this->student_model->get_first_questions($exam_id, $offset);
		if(!$question_id){
			redirect('http://'.$organization_name.'.toptals.com/student/exam_submit/'.$session_id.'/'.$exam_id.'/'.$prv_question.'/'.$prv_offset, 'refresh');
		}
			
		redirect('http://'.$organization_name.'.toptals.com/student/exam_process/'.$session_id.'/'.$exam_id.'/'.$question_id.'/'.$offset, 'refresh');	
	}

	public function exam_process()
	{
		if(!$this->session->userdata('suser_data')) {
			redirect('home/index', 'refresh');	
		}
		//$this->session->set_userdata('suser_data', $sess_array);
		$user_logged_rec = $this->session->userdata('suser_data');	
		$student_id=$user_logged_rec['id'];$data['student_id']= $student_id;
		$organization_id=$user_logged_rec['organization_id'];
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name']=$organization_name;
		$exam_id=$this->uri->segment(4);$data['exam_id']= $exam_id;
		$session_id=$this->uri->segment(3);
		$offset=$this->uri->segment(6);$data['offset']= $offset;
		$question_id=$this->uri->segment(5);
		$prv_question=$question_id;
		$prv_offset=$offset;
		
		$check_organization_remaining_session=$this->student_model->check_organization_remaining_session($organization_id);
		if(!$check_organization_remaining_session){
				$this->session->set_flashdata('message', 'The exam session limit of organization finished. Please contact organization!');redirect('http://'.$organization_name.'.toptals.com/student/home', 'refresh');
				}
		$check_exam_given_or_not = $this->student_model->check_exam_given_or_not($exam_id,$session_id, $student_id);
		if($check_exam_given_or_not){$this->session->set_flashdata('message', 'Exam Already Given!');redirect('student/home', 'refresh');}
		
		$question_id = $this->student_model->get_first_questions($exam_id, $offset);	
			if(!$question_id){
				redirect('http://'.$organization_name.'.toptals.com/student/exam_submit/'.$session_id.'/'.$exam_id.'/'.$prv_question.'/'.$prv_offset, 'refresh');
				}
				
		$if_answer_given = $this->student_model->if_answer_given($exam_id,$session_id, $student_id, $question_id);	
		if($if_answer_given){
			$if_answer_given_arr=explode('##',$if_answer_given);
			$data['if_answer_given']= $if_answer_given_arr[1];
			$data['if_answer_given_id']= $if_answer_given_arr[0];
			}else{$data['if_answer_given']= '';$data['if_answer_given_id']='';}		
			
		$arr_check_assign_detail = $this->student_model->check_assign($student_id,$exam_id,$session_id);
		if(!$arr_check_assign_detail){redirect('http://'.$organization_name.'.toptals.com/student/home', 'refresh');}
		
		//---------question review start-----
		$get_all_question=$this->student_model->get_all_question_of_exam($exam_id);
		$data['get_all_question']= $get_all_question;
		$i=0;$next='';$prv='';
		foreach($get_all_question as $q){
			if($this->uri->segment(5)==$q->id){
				$next='<a href="http://'.$organization_name.'.toptals.com/student/exam_get_next_question/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.($this->uri->segment(6)+1).'">Next</a>';
				if($this->uri->segment(6)!=0)
				$prv='<a href="http://'.$organization_name.'.toptals.com/student/exam_get_next_question/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.($this->uri->segment(6)-1).'">Prev</a>';
				}
			$url='http://'.$organization_name.'.toptals.com/student/exam_process/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$q->id.'/'.$i;
			$all_question[]='<a href="'.$url.'">'.$q->question_title.'</a><hr>';$i++;
		}
		$data['all_question']= $all_question;
		$data['next']= $next;
		$data['prv']= $prv;
		//---------question review end-----
		
		//------$post start--------
		if($this->input->post('submit')){ //print_r($_POST); die();
			  $answer=$this->input->post('answer');
			  $marks_assign=$this->input->post('marks_assign');
			  $correct_answer_id=$this->input->post('correct_answer_id');
			  $question_id=$this->input->post('question_id');
			  $if_answer_given=$this->input->post('if_answer_given');
			  
			  $student_id=$this->input->post('student_id');
			  $short_form_response=$this->input->post('short_form_response');
			  
			if($if_answer_given==''){
			$insert_exam_give=$this->student_model->insert_exam_giving($answer,$correct_answer_id,$question_id,$student_id,$short_form_response,$session_id);
			  }else{
			$update_exam_give=$this->student_model->update_exam_giving($if_answer_given,$answer,$short_form_response);	
			  }
			$offset = $offset + 1; //die();
			$question_id = $this->student_model->get_first_questions($exam_id, $offset);
			
			if(!$question_id){
				redirect('http://'.$organization_name.'.toptals.com/student/exam_submit/'.$session_id.'/'.$exam_id.'/'.$prv_question.'/'.$prv_offset, 'refresh');
				}
			
			redirect('http://'.$organization_name.'.toptals.com/student/exam_process/'.$session_id.'/'.$exam_id.'/'.$question_id.'/'.$offset, 'refresh');		   
		}
		//--------$post end-------
		
		$arr_get_questions = $this->student_model->get_questions($exam_id,$question_id);
		
		$data['arr_get_questions']= $arr_get_questions;
		 
		$data['main_content'] = 'student_exam_process';		
		$this->load->view('includes/template_student', $data);
	}	
	
	
	function login_post()
	 {
		 $username = $this->input->post('username');
		 $password = $this->input->post('password');
		 $result = $this->student_model->login($username, $password);
		// print_r($result); die;
		 $bAuthenticated=FALSE;
		 if($result)
		 {	
			$sess_array = array();
			 foreach($result as $row)
			 {		 $organization_name=$this->student_model->get_organization_name($row->organization_id);
				   $sess_array = array(
				   	 'id' => $row->id,
					 'student_email' => $row->student_email,
					 'organization_id' => $row->organization_id,
					 'organization_name' => $organization_name,
					 'student_first_name' => $row->student_first_name,
					 'student_last_name' => $row->student_last_name
				   );
				  
				   // print_r($sess_array);die();
					$bAuthenticated=TRUE;
					$this->session->set_userdata('suser_data', $sess_array);
			 } 
		   }
		   else
		   {
			 $this->session->set_flashdata('message', 'Invalid username or password.');
		   } 
		   if($bAuthenticated)
		   {
			   redirect('http://'.$organization_name.'.toptals.com/student/home', 'refresh');
			   //redirect('student/home', 'refresh');// 
		   }else{$this->session->set_flashdata('message', 'Invalid username or password.');
			   redirect('/','refresh');
		  }
	 }
 
 
	public function logout()
	{
		$this->session->unset_userdata('suser_data');
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}	
	
	
	public function timeout_exam_submit()
	{
		if(!$this->session->userdata('suser_data')) {
			redirect('home/index', 'refresh');	
		}
		//unset($_SESSION['target_timelimit']);
		//$sess = $this->session->userdata("verified");
		//echo $sess['book_id'];
		$this->session->unset_userdata('target_timelimit');
		
		$exam_id=$this->uri->segment(4);
		$session_id=$this->uri->segment(3);
		$user_logged_rec = $this->session->userdata('suser_data');	
		$student_id=$user_logged_rec['id'];$data['student_id']= $student_id;
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name']=$organization_name;
		$result_id = $this->student_model->get_result($exam_id, $session_id,$student_id);
		redirect('http://'.$organization_name.'.toptals.com/student/exam_result/'.$result_id, 'refresh');
	}
	
	
	public function exam_submit()
	{
		if(!$this->session->userdata('suser_data')) {
			redirect('home/index', 'refresh');	
		}
		//$this->session->set_userdata('suser_data', $sess_array);
		$user_logged_rec = $this->session->userdata('suser_data');	
		$student_id=$user_logged_rec['id'];$data['student_id']= $student_id;
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name']=$organization_name;
		$exam_id=$this->uri->segment(4);
		$session_id=$this->uri->segment(3);
		if($_POST){
		$this->session->unset_userdata('target_timelimit');
		$update_organization_session=$this->student_model->update_organization_session($user_logged_rec['organization_id']);	
		$result_id = $this->student_model->get_result($exam_id, $session_id,$student_id);
		redirect('http://'.$organization_name.'.toptals.com/student/exam_result/'.$result_id, 'refresh');
		}
		$data['main_content'] = 'student_exam_submit';		
		$this->load->view('includes/template_student', $data);
		//$get_result = $this->student_model->get_result($exam_id, $session_id,$student_id);
	}
	
	
	public function exam_result()
	{
		if(!$this->session->userdata('suser_data')) {
			redirect('home/index', 'refresh');	
		}
		$user_logged_rec = $this->session->userdata('suser_data');	
		$student_id=$user_logged_rec['id'];$data['student_id']= $student_id;
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name']=$organization_name;
		$result_id=$this->uri->segment(3);
		$percentage = $this->student_model->get_marks_details($result_id);
		$data['percentage'] = $percentage;	
		$data['main_content'] = 'student_exam_result';		
		$this->load->view('includes/template_student', $data);
	}


	public function myacc()
	{
		if(!$this->session->userdata('suser_data')) {
			redirect('home/index', 'refresh');	
		}
		$user_logged_rec = $this->session->userdata('suser_data');	
		$student_id=$user_logged_rec['id'];$data['student_id']= $student_id;
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name']=$organization_name;
		$result_id=$this->uri->segment(3);
		$percentage = $this->student_model->get_marks_details($result_id);
		$data['percentage'] = $percentage;	
		$data['main_content'] = 'myacc_view';		
		$this->load->view('includes/template_student', $data);
	}
	
		
}
?>