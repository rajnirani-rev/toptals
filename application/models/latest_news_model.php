<?php 
class latest_news_model extends CI_Model {
	
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
	function get_all_homepost() {
		
		//$this->db->select('*');
		//$this->db->from('plans');
		//$this->db->where('plan_status','1');
		$query = $this->db->get('homepage_post', 4, 0);
		
		  
	    
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function get_all_images() {
		
		$this->db->select('*');
		$this->db->from('who_use_toptals');
		//$this->db->where('plan_status','1');
		
		$query = $this->db->get();
	    
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function get_all_testimonial() {
		
		$query = $this->db->get('testimonial', 3, 0);
		
		//echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	
    
}
?>