<?php 
class organization_model extends CI_Model {


	function view_exam_model(){	
		$this->db->select('ex.exam_name,ex.number_of_question,ex.time_limit,std.student_email,std.student_first_name,std.student_last_name');    
		$this->db->from('exam ex');
		$this->db->join('assign_student_exam ass', 'ass.exam_id = ex.id');
		$this->db->join('student std', 'std.id = ass.student_id');
		$this->db->where('ass.exam_id' , $this->uri->segment(4));		
		$query = $this->db->get();
		return $query->result();
	}
	function checksubdomain_availability($subdomain)
	{
		$this -> db -> where('subdomain' , $subdomain);
		$query = $this -> db -> get('organization');
		if($query -> num_rows() > 0 )
			return FALSE;
		else
			return TRUE;	
	}
	
	
	function checkemail_availability($email)
	{
		$this -> db -> where('owner_email' , $email);
		$query = $this -> db -> get('organization');
		if($query -> num_rows() > 0 )
			return FALSE;
		else
			return TRUE;	
	}
	
	function checkusername_availability($username)
	{
		$this -> db -> where('organization_username' , $username);
		$query = $this -> db -> get('organization');
		if($query -> num_rows() > 0 )
			return FALSE;
		else
			return TRUE;	
	}
		
	
	function checkemail_student_availability($email)
	{
		$this -> db -> where('student_email' , $email);
		
		$exclude_id = $this->input->post('student_id'); 
		$this -> db -> where('id !=' , $exclude_id);
		$query = $this -> db -> get('student');
		if($query -> num_rows() > 0)
			{ return FALSE;}
		else
			return TRUE;	
	}
		 
	function create_organization(){
		$new_organization_insert_data = array(
			'organization_name' => $this->input->post('organization'),
			'organization_username' => $this->input->post('username'),
			'owner_email'    => $this->input->post('email'),
			'owner_first_name' => $this->input->post('firstname'),
			'owner_last_name'    => $this->input->post('lastname'),
			'password'    => md5($this->input->post('password')),
			'subdomain'    => $this->input->post('subdomain'),
			'created_date'    => date('Y-m-d h:i:s')					
		);
		$insert = $this->db->insert("organization",$new_organization_insert_data);
		$id=$this->db->insert_id();
		
		$after_payment_session_data = array(
			'organization_id' => $id,
			'all_session' => '10',
			'used_session'    => '0',
			'remaining_session' => '10'
		);
		$insertafter_payment_session = $this->db->insert("after_payment_session",$after_payment_session_data);
		return $insert;
	}
		
	function add_student($organization_id){
		$add_student_insert_data = array(
			'student_first_name' => $this->input->post('student_first_name'),
			'student_last_name'    => $this->input->post('student_last_name'),
			'student_email' => $this->input->post('student_email'),
			'password'    => md5($this->input->post('password')),
			'company_name'    => $this->input->post('company_name'),
			'organization_id'    => $organization_id,
			'created_date'    => date('Y-m-d h:i:s')					
		);
		$insert = $this->db->insert("student",$add_student_insert_data);//echo $this->db->last_query();die;
		if($insert){				
			$this->email->set_mailtype("html");
			$this->email->to($this->input->post('student_email'));
			$this->email->from('hello@toptals.com');//hello@toptals.com
			$this->email->subject('Added as a student in '.base_url());
			$this->email->message('Hi '.$this->input->post('student_first_name').',<br>Your Student Panel Login Details:<br>'.base_url().'<br>Username : '.$this->input->post('student_email').'<br>Password : '.$this->input->post('password'));
			$this->email->send();
								
		}
		return $insert;
	}

	function edit_student_detail($student_id,$student_first_name,$student_last_name,$student_email,$password,$company_name,$crm_id){
		$student_edit_data = array(
			'student_first_name' => $student_first_name,
			'student_last_name'    => $student_last_name,
			'student_email' => $student_email,
			'password'    => $password,
			'company_name'    => $company_name,
			'crm_id'    => $crm_id		
		);
		$this->db->where('id', $student_id);
		$update=$this->db->update('student', $student_edit_data); 

		return $update;
	}	

	function add_question($exam_id, $question,$marks_assign, $organization_id){
		$add_question_insert_data = array(
			'exam_id' => $exam_id,
			'organization_id'    => $organization_id,
			'question_title' => $question,
			'marks_assign'    => $marks_assign,
			'status'    => 1					
		);
		$insert = $this->db->insert("question",$add_question_insert_data);
		return $this->db->insert_id();
	}	
	

	function add_answer($question_id,$answer_title,$correct,$short_form_response){
		$add_answer_insert_data = array(
			'question_id' => $question_id,
			'answer_title'    => $answer_title,
			'correct' => $correct,
			'short_form_response'    => $short_form_response					
		);
		$insert = $this->db->insert("answer",$add_answer_insert_data);
		return $insert;
	}	
   public function edit_answer(){ 
   				$qdata = array('question_title' => $_POST['question'],'marks_assign' => $_POST['marks_assign']);
				$this->db->where('id', $_POST['question_id']);
				$update=$this->db->update('question', $qdata); 
				
		foreach($_POST['answer_id'] as $ar){
				$data = array(
                'answer_title' => $_POST['answer-'.$ar],
                'short_form_response' => $_POST['shortform-'.$ar],'correct' => $_POST['correct-'.$ar]
					);
				$this->db->where('question_id', $_POST['question_id']);
				$this->db->where('id', $ar);
				$update=$this->db->update('answer', $data); 
			}
			return true;
	}
	
	function delete_question_answer($question_id){
		$q=$this->db->delete('question', array('id' => $question_id)); 	
		if($q){
			$a=$this->db->delete('answer', array('question_id' => $question_id)); 	
		}return $a;
	}
	
	function add_exam($organization_id){
		$add_exam_insert_data = array(
			'exam_name' => $this->input->post('exam_name'),
			'created_date' => date('Y-m-d h:i:s'),
			'organization_id' =>$organization_id,
			'number_of_question'    => $this->input->post('number_of_question'),
			'passmarks' => $this->input->post('passmarks'),
			'time_limit'    => $this->input->post('time_limit'),
			'full_name'    => $this->input->post('full_name'),
			'email'    => $this->input->post('email'),
			'bcc_results'    => $this->input->post('bcc_results'),
			'exam_banner'    => $this->input->post('exam_banner'),
			'styling'    => $this->input->post('styling'),
			'weighted_exam'    => $this->input->post('weighted_exam'),
			'show_final_score'    => $this->input->post('show_final_score'),
			'display_incorrect_answers_on_completion'    => $this->input->post('display_incorrect_answers_on_completion'),
			'exam_code'    => $this->input->post('exam_code'),
			'exam_introduction_text'    => $this->input->post('exam_introduction_text'),
			'email_invitation_note_optional'    => $this->input->post('email_invitation_note_optional'),
			'text_completion_success'    => $this->input->post('text_completion_success'),
			'automated_email_reminder_text'    => $this->input->post('automated_email_reminder_text'),
			'text_completion_fail'    => $this->input->post('text_completion_fail')			
		);
		$insert = $this->db->insert("exam",$add_exam_insert_data);
		$id=$this->db->insert_id();
		$data = array('exam_link' => 'http://'.$_SERVER['HTTP_HOST'].'/student/'.$id);
		$this->db->where('id', $id);
		$this->db->update('exam', $data); 
		//echo $this->db->last_query();
		return $id;
	}	
	
	
			
	function organisation_login($username, $password)
	{
		$password=md5($password);
		$this -> db -> select('*');
		$this -> db -> from('organization');
		//$this -> db -> where("owner_email='".$email."' AND password = '".$password."'");
		$this -> db->where('organization_username', $username);
        $this -> db->where('password', $password);
		//echo $password."****".$email."****";exit;
	
		$this -> db -> limit(1);		
		$query = $this -> db -> get();
		//echo $this->db->last_query();
		//echo "<pre>";print_r($query->result());exit;
		if($query -> num_rows() == 1)
		{
		 	return $query->result();
		}
		else
		{
		 	return false;
		}
	}
	
	
	function get_all_student_from_organization($where_arr = NULL) {
		$this->db->select('id,student_first_name,student_last_name,student_email,company_name,created_date');
		$this->db->from('student');
		$this->db->where($where_arr);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	function get_student_detail($student_id) {
		$this->db->select('id,student_first_name,student_last_name,student_email,password,crm_id,company_name,created_date');
		$this->db->from('student');
		$this -> db->where('id', $student_id);
		$query = $this->db->get();
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
		
	
	function get_all_exam_from_organization($where_arr = NULL) {
		$this->db->select('id,exam_name,exam_link,number_of_question,time_limit,created_date');
		$this->db->from('exam');
		$this->db->where($where_arr);
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	function get_all_student_exam_report_organization($where_arr = NULL) {
		$this->db->select('e.id,e.exam_name,e.number_of_question,e.passmarks,s.id as student_id,s.student_first_name ,s.student_last_name,s.student_email,exam_result.marks_got, exam_result.exam_date');
		$this->db->from('exam e');
		$this->db->join('assign_student_exam', 'e.id = assign_student_exam.exam_id');
		$this->db->join('student s', 's.id = assign_student_exam.student_id');
		$this->db->join('exam_result', 'exam_result.session_id = assign_student_exam.id');
		
		$this->db->where($where_arr);
		$query = $this->db->get(); // echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}


	function get_search_all_student_exam_report_organization($where_arr = NULL,$exam_id = NULL,$report_type = NULL,$date_range = NULL) {
		$this->db->select('e.id,e.exam_name,e.number_of_question,e.passmarks,s.id as student_id,s.student_first_name ,s.student_last_name,s.student_email,exam_result.marks_got, exam_result.exam_date');
		$this->db->from('exam e');
		$this->db->join('assign_student_exam', 'e.id = assign_student_exam.exam_id');
		$this->db->join('student s', 's.id = assign_student_exam.student_id');
		$this->db->join('exam_result', 'exam_result.session_id = assign_student_exam.id');
		$this->db->where($where_arr);
		if($exam_id!=NULL){$this->db->where('e.id',$exam_id);}
		if($report_type!=NULL){
			if($report_type=='fail'){$sign=' < ';}else{$sign=' >= ';}
			$this->db->where('e.passmarks '.$sign.' ','exam_result.marks_got');
			}
		if($date_range!=NULL){
			$explode_arr=explode('-',$date_range);
			$month=$explode_arr[0];
			$year=$explode_arr[1];
			$this->db->where('MONTH(exam_result.exam_date)',$month);
			$this->db->where('YEAR(exam_result.exam_date)',$year);
			}
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}


	//function get_exam_summary_of_organization($where_arr = NULL) {		  
	   /*$this->db->select('e.id,e.exam_name,(select count(id) from assign_student_exam where e.id = assign_student_exam.exam_id) as session_alloted,
  (select count(id) from exam_result where e.id = exam_result.exam_id and exam_result.marks_got >= e.passmarks) as passed,
  (select count(id) from exam_result where e.id = exam_result.exam_id and exam_result.marks_got < e.passmarks) as failed,
  MONTH(exam_result.exam_date) as exam_month,YEAR(exam_result.exam_date) as exam_year',TRUE);
		$this->db->from('exam e');
		$this->db->join('exam_result', 'exam_result.exam_id = e.id');
		$this->db->where($where_arr);
		$this->db->group_by('MONTH(exam_result.exam_date), YEAR(exam_result.exam_date)');
		$query = $this->db->get(); 
		
		//echo $this->output->enable_profiler(TRUE);
		echo $this->db->last_query();exit();die();
		  if(($query->num_rows()) > 0) {
			  return $query->result();
		  } else {
			  return false;
		  }*/
	//	$this->db->select('e.id,e.exam_name');
//		$this->db->from('exam e');
//		$this->db->where($where_arr);
//		$query = $this->db->get();
//		if(($query->num_rows()) > 0) {
//			  return $query->result();
//		  } else {
//			  return false;
//		  } 
//	}



	function get_exam_summary_of_organization($where_arr = NULL) {
		$this->db->distinct();
		$this->db->select('`e`.`id`, `e`.`exam_name`,e.passmarks, (select count(id) from assign_student_exam where e.id = assign_student_exam.exam_id) as session_alloted, (select count(id) from exam_result where `e`.id = exam_result.exam_id and exam_result.marks_got >= e.passmarks) as passed, (select count(id) from exam_result where `e`.id = exam_result.exam_id and exam_result.marks_got < e.passmarks) as failed, YEAR(exam_result.exam_date) as exam_year');
		$this->db->from('exam e');
		$this->db->join('exam_result', 'exam_result.exam_id = e.id');
		$this->db->join('assign_student_exam', 'assign_student_exam.exam_id = e.id');
		$this->db->where($where_arr);
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}


	function get_exam_summary_of_organization_session($where_arr = NULL) {
		$this->db->distinct();
		$this->db->select('YEAR( exam_result.exam_date ) AS exam_year, MONTH( exam_result.exam_date ) AS exam_mnt, `e`.`id` , `e`.`exam_name` , count( * ) AS session_done');
		$this->db->from('exam e');
		$this->db->join('exam_result', 'exam_result.exam_id = e.id');
		$this->db->where($where_arr);
		$this->db->group_by("YEAR(exam_result.exam_date ) , MONTH( exam_result.exam_date ) , exam_result.exam_id"); 
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	function get_exam_summary_of_organization_passfail($where_arr = NULL) {
		$this->db->distinct();
		$this->db->select('YEAR( exam_result.exam_date ) AS exam_year, MONTH( exam_result.exam_date ) AS exam_mnt, e.id , e.exam_name , e.passmarks, exam_result.marks_got, sum( CASE WHEN e.passmarks >= exam_result.marks_got THEN 1 ELSE 0 END)  AS failed, sum( CASE WHEN  e.passmarks < exam_result.marks_got  THEN 1 ELSE 0 END ) AS passed');
		$this->db->from('exam e');
		$this->db->join('exam_result', 'exam_result.exam_id = e.id');
		$this->db->where($where_arr);
		$this->db->group_by("YEAR(exam_result.exam_date ) , MONTH( exam_result.exam_date ) , exam_result.exam_id"); 
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	function get_exam_given_dates($where_arr = NULL) {
		$this->db->distinct();
		$this->db->select('YEAR(exam_result.exam_date) as exam_year,MONTH( exam_result.exam_date ) AS exam_month');
		$this->db->from('exam e');
		$this->db->join('exam_result', 'exam_result.exam_id = e.id');
		$this->db->where($where_arr);
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function get_exam($where_arr = NULL) {
		$this->db->distinct();
		$this->db->select('e.id,e.exam_name');
		$this->db->from('exam e');
		$this->db->where($where_arr);
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}	 
	function get_assign_exam_student($student_id){
		$this->db->select('exam_name,assign_student_exam.id');
		$this->db->from('assign_student_exam');
		$this->db->join('exam', 'exam.id = assign_student_exam.exam_id');
		$this->db->where('student_id', $student_id); 
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		return $query->result();
	}
	 
	 
	function get_all_questions_from_exam($where_arr = NULL) {
		$this->db->select('id,exam_id,question_title,status,marks_assign');
		$this->db->from('question');
		$this->db->where($where_arr);
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			//return $query->result();
			//-----answer fetch start----
			foreach($query->result() as $v){//print_r($v);
				$this->db->select('a.id,a.answer_title,a.correct,a.short_form_response');
				$this->db->from(' answer a');
				$this->db->where('a.question_id', $v->id);
				$query1 = $this->db->get();
				$arr[]=array('id'=>$v->id,'question_title'=>$v->question_title,'marks_assign'=>$v->marks_assign,'answer'=>$query1->result());
				//echo $this->db->last_query();//echo $this->db->last_query();die();
			}//echo '<pre>';print_r($arr);die();
			return $arr;
			//------answer fetch end---	
		} else {
			return false;
		}
	}
	
	function assign_exam_student($student_id,$send_email,$exam_id){
		$add_exam_student = array(
			'student_id' => $student_id,
			'exam_id'    => $exam_id,
			'assign_date' => date('Y-m-d h:i:s'),
			'send_email'    => $send_email					
		);
				if($send_email==1){
					$this->db->select('*');
					$this->db->from('student');
					$this->db->where('id', $student_id);
					$query = $this->db->get();  //echo $this->db->last_query();exit();die();
					if(($query->num_rows()) > 0) {
						foreach($query->result() as $v){
							$this->email->set_mailtype("html");
							$this->email->to($v->student_email);
							$this->email->from('hello@toptals.com');//hello@toptals.com
							$this->email->subject('Exam Assigned On '.date('Y-m-d h:i:s'));
							$this->email->message('A new exam assigned to you. Please login into your student panel.<br>'.base_url().'<br>Username : '.$v->student_email.'<br>Password : '.$v->password);
							$this->email->send();
						}
					}
				
				}
		$insert = $this->db->insert("assign_student_exam",$add_exam_student);
		return $insert;	
	}
   
    	
	function get_question_to_edit() {
		$question_id = $this->input->post('type');
		$this->db->select('q.id,q.exam_id,q.question_title');
		$this->db->from('question q');
		$this->db->where('q.status',1);
		$this->db->where('q.id', $question_id);

		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			//return $query->result();
			foreach($query->result() as $v){//print_r($v);
			
				$this->db->select('a.id,a.answer_title,a.correct,a.short_form_response');
				$this->db->from('answer a');
				$this->db->where('a.question_id', $v->id);
				$query1 = $this->db->get();
				foreach($query1->result() as $a){$ar[]=array('id'=>$a->id,'answer_title'=>$a->answer_title,'correct'=>$a->correct,'short_form_response'=>$a->short_form_response);}
				$arr=array('id'=>$v->id,'question'=>$v->question_title,'answer'=>$ar);
				//echo $this->db->last_query();//echo $this->db->last_query();die();
				
			}return $arr;//print_r($arr);die();
		} else {
			return false;
		}
	}
   

	function export($where_arr = NULL) {
		$this->db->select('e.exam_name,e.number_of_question,e.passmarks,s.id as student_id,s.student_first_name ,s.student_last_name,s.student_email,exam_result.marks_got, exam_result.exam_date');
		$this->db->from('exam e');
		$this->db->join('assign_student_exam', 'e.id = assign_student_exam.exam_id');
		$this->db->join('student s', 's.id = assign_student_exam.student_id');
		$this->db->join('exam_result', 'exam_result.session_id = assign_student_exam.id');
		$this->db->where($where_arr);
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		$this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
		$delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
        force_download('Student_Exam_Report.csv', $data);
	}	

	function remaining_session($organization_id){
		$this->db->select('all_session,used_session,remaining_session');
		$this->db->from('after_payment_session');
		$this->db->where('organization_id', $organization_id);
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			foreach($query->result() as $v){
				$remaining_session=$v->remaining_session;
				}
			return $remaining_session;	
		}else{
			return 0;
		}
	}
	
	
	function get_exam_detail($exam_id) {
		$this->db->select('id as exam_id,exam_name,organization_id,number_of_question,passmarks,time_limit,full_name,email,bcc_results,exam_banner,styling,weighted_exam,show_final_score,display_incorrect_answers_on_completion,exam_code,exam_introduction_text,email_invitation_note_optional,text_completion_success,automated_email_reminder_text,text_completion_fail');
		$this->db->from('exam');
		$this->db->where('id', $exam_id);
		$query = $this->db->get();
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	
	function get_exam_weighted_exam($exam_id) {
		$this->db->select('weighted_exam');
		$this->db->from('exam');
		$this->db->where('id', $exam_id);
		$query = $this->db->get();
		if(($query->num_rows()) > 0) {
			foreach($query->result() as $v){
				return $v->weighted_exam;
			}
		} else {
			return 0;
		}
	}

	
	function edit_exam($exam_id){
		$edit_exam_insert_data = array(
			'exam_name' => $this->input->post('exam_name'),
			//'created_date' => date('Y-m-d h:i:s'),
			//'organization_id' =>$organization_id,
			'number_of_question'    => $this->input->post('number_of_question'),
			'passmarks' => $this->input->post('passmarks'),
			'time_limit'    => $this->input->post('time_limit'),
			'full_name'    => $this->input->post('full_name'),
			'email'    => $this->input->post('email'),
			'bcc_results'    => $this->input->post('bcc_results'),
			'exam_banner'    => $this->input->post('exam_banner'),
			'styling'    => $this->input->post('styling'),
			'weighted_exam'    => $this->input->post('weighted_exam'),
			'show_final_score'    => $this->input->post('show_final_score'),
			'display_incorrect_answers_on_completion'    => $this->input->post('display_incorrect_answers_on_completion'),
			'exam_code'    => $this->input->post('exam_code'),
			'exam_introduction_text'    => $this->input->post('exam_introduction_text'),
			'email_invitation_note_optional'    => $this->input->post('email_invitation_note_optional'),
			'text_completion_success'    => $this->input->post('text_completion_success'),
			'automated_email_reminder_text'    => $this->input->post('automated_email_reminder_text'),
			'text_completion_fail'    => $this->input->post('text_completion_fail')			
		);
		$this->db->where('id', $exam_id);
		$this->db->update('exam', $edit_exam_insert_data); 
		//echo $this->db->last_query();
		return $exam_id;
	}
	
   
}
?>