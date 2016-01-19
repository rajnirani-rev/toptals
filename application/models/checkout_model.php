<?php 
class checkout_model extends CI_Model {
	
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
		 
	function creditcard_data_insert($arrayRes,$organization_id,$owner_email){
		//print_r($arrayRes); die();
		$payment_insert_data = array(
			'organization_id' => $_POST['organization_id'],
			'owner_email' => $_POST['owner_email'],
			'fisrtname' => $_POST['fname'],
			'lastname'    => $_POST['lname'],
			'amount' => $_POST['ftotal'],
			'time_stamp'    => $arrayRes['TIMESTAMP'],
			'correlation_id'    => $arrayRes['CORRELATIONID'],
			'ack'    => $arrayRes['ACK'],
			'version' => $arrayRes['VERSION'],
			'build'    => $arrayRes['BUILD'],
			'avs_code'    => $arrayRes['AVSCODE'],
			'ccv_match'    => $arrayRes['CVV2MATCH'],
			'transacton_id' => $arrayRes['TRANSACTIONID'],
			'date_added'    => date('Y-m-d h:i:s')					
		);
		$insert = $this->db->insert("credit_card_payment",$payment_insert_data);
		return $insert;
		}
	
	
	function after_payment_insert($organization_id,$plan,$session,$via){
	$after_payment_data = array(
			'organization_id' => $organization_id,'pay_date'    => date('Y-m-d h:i:s'),
			'plan' => $plan,'session' => $session,'via' => $via							
		);
		$insert = $this->db->insert("after_payment",$after_payment_data);
		return $insert;
	
	}
	
	function after_payment_session_insert($organization_id, $plan, $session){
		$this->db->select('all_session,used_session,remaining_session');
		$this->db->from('after_payment_session');
		$this->db->where('organization_id', $organization_id);
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			foreach($query->result() as $v){
				$all_session=$v->all_session;$used_session=$v->used_session;$remaining_session=$v->remaining_session;
				}
			$all_session=$v->all_session+$session; $remaining_session=$v->remaining_session+$session;
			$data = array( 'all_session' => $all_session,'remaining_session' => $remaining_session );
			$this->db->where('organization_id', $organization_id);
			$update=$this->db->update('after_payment_session', $data); 
			//echo $this->db->last_query();exit();//die();
			return $update;	
		}else{
			$data = array('organization_id'=>$organization_id, 'all_session' => $session,'used_session' => 0,'remaining_session' => $session );
			$insert = $this->db->insert("after_payment_session",$data);
			return $insert;
		}
	}
		
	function add_student(){
		$add_student_insert_data = array(
			'student_first_name' => $this->input->post('student_first_name'),
			'student_last_name'    => $this->input->post('student_last_name'),
			'student_email' => $this->input->post('student_email'),
			'password'    => $this->input->post('password'),
			'company_name'    => $this->input->post('company_name'),
			'crm_id'    => $this->input->post('crm_id'),
			'created_date'    => date('Y-m-d h:i:s')					
		);
		$insert = $this->db->insert("student",$add_student_insert_data);
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

	function add_question($exam_id, $question, $organization_id){
		$add_question_insert_data = array(
			'exam_id' => $exam_id,
			'organization_id'    => $organization_id,
			'question_title' => $question,
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
		//echo $this->db->last_query();
		return $this->db->insert_id();
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
	 
	function success_message() {
		$this->db->select('*');
		$this->db->from('credit_card_payment');
		//$this->db->where($where_arr);
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	
   
}
?>