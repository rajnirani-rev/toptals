<?php 

class student_model extends CI_Model {
	function login($username, $password)
	{
		$password=$password;
		$this -> db -> select('*');
		$this -> db -> from('student');
		$this -> db->where('student_email', $username);
        $this -> db->where('password',md5($password));
		$this -> db->where('student_status', 1);
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


	public function change_std_password_model()
	{
		if(($this->input->post('oldpass')!='') && ($this->input->post('newpass')!='') && ($this->input->post('confirmpass')!='')){

			$redire_url=$this->input->post('hid_url').'/student/myacc/';

			if($this->input->post('newpass')!=$this->input->post('confirmpass')){
				redirect($redire_url.'3', 'refresh');
			}
			else{
				$this->db->select('password');
				$this->db->from('student');
				$this->db->where('password',md5($this->input->post('oldpass')));
				$query = $this->db->get();
				if(($query->num_rows()) > 0) {
					$std_log_arr = $this->session->userdata('suser_data');
					$data = array(
		               'password' => md5($this->input->post('newpass'))
		            );
					$this->db->where('student_email', $std_log_arr['student_email']);
					$this->db->update('student', $data); 
					redirect($redire_url.'1', 'refresh');
					//echo 'Password has been changed ';	
					

				} else {
					//echo 'records not found';	
					redirect($redire_url.'2', 'refresh');		
				}
			}
		}
		else{
			//$this->session->set_userdata('fill_all', '1');
			//echo 'Please fill all the above fields , <b>new</b> and <b>confirm</b> password should be same';
			redirect($redire_url.'3', 'refresh');
		}
	}



	
	function get_organization_name($organization_id){ 	
		$this->db->select('subdomain');
		$this->db->from('organization');
		$this->db->where('id', $organization_id);
		$query = $this->db->get(); // echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			foreach($query->result() as $v){
			return $v->subdomain;
			}
		} else {
			return false;
		}
	}

	function sell(){ 	
		$this->db->select('password');
		$this->db->from('student');
		
		$query = $this->db->get(); // echo $this->db->last_query();exit();die();
		return $query->result();
		//print_r($query->result());
		//echo 'h';
		/*if(($query->num_rows()) > 0) 
		{
			foreach($query->result() as $v){
			return $v->student_first_name;
			return $v->student_last_name;
			return $v->student_email;
			return $v->organization_id;
			return $v->company_name;
			}
		} 
		else 
		{
			return false;
		}*/
	}

	
	
	function check_exam_given_or_not($exam_id,$session_id, $student_id){ 	
		$this->db->select('exam_date');
		$this->db->from('exam_result');
		$this->db->where('student_id', $student_id);
		$this->db->where('exam_id', $exam_id);
		$this->db->where('session_id', $session_id);
		$query = $this->db->get(); // echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	function if_answer_given($exam_id,$session_id, $student_id, $question_id){
		$this->db->select('answer_id,id');
		$this->db->from('student_question_answer');
		$this->db->where('student_id', $student_id);
	//	$this->db->where('exam_id', $exam_id);
		$this->db->where('session_id', $session_id);
		$this->db->where('question_id', $question_id);
		$query = $this->db->get(); //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			foreach($query->result() as $v){
			return $v->id."##".$v->answer_id;
			}
		} else {
			return false;
		}	
	}
	 
	function get_assign_exam_student($student_id){
		$this->db->select('assign_student_exam.id,exam_name,assign_student_exam.exam_id,marks_got');
		$this->db->from('assign_student_exam');
		$this->db->join('exam_result', 'exam_result.session_id = assign_student_exam.id','left');
		$this->db->join('exam', 'exam.id = assign_student_exam.exam_id');
		$this->db->where('assign_student_exam.student_id', $student_id); 
		$this->db->distinct();
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		return $query->result();
	}
	
	function get_exam_detail($student_id,$exam_id,$session_id) {
		$this->db->select('e.id,e.exam_name,e.number_of_question,e.time_limit,s.student_first_name,s.student_last_name,s.student_email');
		$this->db->from('exam e');
		$this->db->join('assign_student_exam a', 'e.id = a.exam_id');
		$this->db->join('student s', 's.id = a.student_id');
		$this->db->where('a.student_id', $student_id);
		$this->db->where('e.id', $exam_id);
		$this->db->where('a.id', $session_id);
		$query = $this->db->get(); // echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	
	function check_assign($student_id,$exam_id,$session_id) {
		$this->db->select('e.id');
		$this->db->from('exam e');
		$this->db->join('assign_student_exam a', 'e.id = a.exam_id');
		$this->db->join('student s', 's.id = a.student_id');
		$this->db->where('a.student_id', $student_id);
		$this->db->where('e.id', $exam_id);
		$this->db->where('a.id', $session_id);
		$query = $this->db->get(); // echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	
	
	function get_questions($exam_id, $question_id) {
		$this->db->select('q.id,q.exam_id,q.question_title,q.marks_assign');
		$this->db->from('question q');
		$this->db->where('q.status',1);
		$this->db->where('q.id', $question_id);
		$this->db->where('q.exam_id', $exam_id);

		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			//return $query->result();
			foreach($query->result() as $v){//print_r($v);
				$this->db->select('a.id,a.answer_title,a.correct,a.short_form_response');
				$this->db->from(' answer a');
				$this->db->where('a.question_id', $v->id);
				$query1 = $this->db->get();
				$arr[]=array('id'=>$v->id,'marks_assign'=>$v->marks_assign,'question'=>$v->question_title,'answer'=>$query1->result());
				//echo $this->db->last_query();//echo $this->db->last_query();die();	
			}return $arr;//print_r($arr);die();
		} else {
			return false;
		}
	}
	
		
	function get_first_questions($exam_id,$offset) {
		$this->db->select('q.id,q.exam_id,q.question_title');
		$this->db->from('question q');
		$this->db->where('q.status',1);
		$this->db->where('q.exam_id', $exam_id);
		
		$this->db->limit(1, $offset);
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			foreach($query->result() as $v){
			return $v->id;
			}
		} else {
			return false;
		}
	}
	

	function insert_exam_giving($answer,$correct_answer_id,$question_id,$student_id,$short_form_response,$session_id){
		$student_answer_data = array(
			'answer_id' => $answer,
			'correct_answer_id' => $correct_answer_id,
			'question_id'    => $question_id,
			'student_id' => $student_id,
			'short_form_response' => $short_form_response,
			'session_id' => $session_id					
		);
		$insert = $this->db->insert("student_question_answer",$student_answer_data);//echo $this->db->last_query();exit();//die();
		return $insert;
	}
	
	function update_exam_giving($if_answer_given,$answer,$short_form_response){
		$data = array(
               'answer_id' => $answer,
               'short_form_response' => $short_form_response
            );
		$this->db->where('id', $if_answer_given);
		$update=$this->db->update('student_question_answer', $data); 
		//echo $this->db->last_query();exit();//die();
		return $update;
	}
				
		 
	function get_result($exam_id, $session_id,$student_id){
		$this->db->select('s.exam_name,e.id,e.student_id,e.question_id,e.answer_id,e.correct_answer_id,e.short_form_response,e.session_id,q.marks_assign');
		$this->db->from('student_question_answer e');
		$this->db->join('question q', 'e.question_id = q.id');
		$this->db->join('assign_student_exam a', 'e.session_id = a.id');
		$this->db->join('exam s', 's.id = a.exam_id');
		$this->db->where('e.student_id', $student_id);
		$this->db->where('s.id', $exam_id);
		$this->db->where('e.session_id', $session_id);
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		//echo $this->db->last_query();exit();die();
		
		/*SELECT `s`.`exam_name`, `e`.`id`, `e`.`student_id`, `e`.`question_id`, `e`.`answer_id`, `e`.`correct_answer_id`, `e`.`short_form_response`, `e`.`session_id` FROM (`student_question_answer` e) JOIN `assign_student_exam` a ON `e`.`session_id` = `a`.`id` JOIN `exam` s ON `s`.`id` = `a`.`exam_id` WHERE `e`.`student_id` = '2' AND `s`.`id` = '2' AND `e`.`session_id` = '5'*/
		if(($query->num_rows()) > 0) {
			$count=0;$all_marks_assign_count=0;
			foreach($query->result() as $v){//print_r($v);
				if($v->answer_id==$v->correct_answer_id){$count=$count+$v->marks_assign;/*$count++;*/}
				$all_marks_assign_count=$all_marks_assign_count+$v->marks_assign;
				$exam_name=$v->exam_name;
			}
			//$percentage=($count/$rowcount)*100;
			$percentage=($count/$all_marks_assign_count)*100;
			$exam_result_data = array(
			'student_id' => $student_id,
			'exam_id' => $exam_id,
			'session_id' => $session_id,
			'exam_date' => date('Y-m-d h:i:s'),
			'marks_got' => $percentage		
		);
			$insert = $this->db->insert("exam_result",$exam_result_data);
			//$arr[]=array('id'=>$v->id,'question'=>$v->question_title,'answer'=>$query1->result());
			return $this->db->insert_id();//print_r($arr);die();
		} else {
			return false;
		}	
	}
	
	function get_marks_details($result_id){
		$this->db->select('q.marks_got');
		$this->db->from('exam_result q');
		$this->db->where('q.id', $result_id);
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			foreach($query->result() as $v){
			return $v->marks_got;
			}
		} else {
			return false;
		}
	}
	
	function get_all_question_of_exam($exam_id) {
		$this->db->select('q.id,q.question_title');
		$this->db->from('question q');
		$this->db->where('q.status',1);
		$this->db->where('q.exam_id', $exam_id);
		
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	function update_organization_session($organization_id){
		$this->db->select('all_session,used_session,remaining_session');
		$this->db->from('after_payment_session');
		$this->db->where('organization_id', $organization_id);
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			foreach($query->result() as $v){
				$all_session=$v->all_session;$used_session=$v->used_session;$remaining_session=$v->remaining_session;
				}
			$used_session=$v->used_session+1; $remaining_session=$v->remaining_session-1;
			$data = array( 'used_session' => $used_session,'remaining_session' => $remaining_session );
			$this->db->where('organization_id', $organization_id);
			$update=$this->db->update('after_payment_session', $data); 
			//echo $this->db->last_query();exit();//die();
			return $update;	
		}else{
			return false;
		}	
	}
	
	function check_organization_remaining_session($organization_id){
		$this->db->select('all_session,used_session,remaining_session');
		$this->db->from('after_payment_session');
		$this->db->where('organization_id', $organization_id);
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			foreach($query->result() as $v){
				$remaining_session=$v->remaining_session;
				}
			if($remaining_session>0){return true;}else{return false;}	
		}else{
			return false;
		}	
	}
		
		
}
?>