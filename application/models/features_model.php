<?php 
class features_model extends CI_Model {
	
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
	
	 
	function create_organization(){
		$new_organization_insert_data = array(
			'organization_name' => $this->input->post('organization'),
			'owner_email'    => $this->input->post('email'),
			'owner_first_name' => $this->input->post('firstname'),
			'owner_last_name'    => $this->input->post('lastname'),
			'password'    => md5($this->input->post('password')),
			'subdomain'    => $this->input->post('subdomain'),
			'created_date'    => date('Y-m-d h:i:s')					
		);
		$insert = $this->db->insert("organization",$new_organization_insert_data);
		return $insert;
		}
		
	function add_plans(){
		$add_plans_insert_data = array(
			'plan_title' => $this->input->post('title_name'),
			'plan_amount'    => $this->input->post('amount'),
			'plan_summary' => $this->input->post('planSummary'),
			'no_of_test'    => $this->input->post('noOfTests'),
			'date_added'    => date('Y-m-d h:i:s')					
		);
		$insert = $this->db->insert("plans",$add_plans_insert_data);
		return $insert;
	}	
			
	function admin_login($adminUsername, $adminPassword)
	{
		
		$adminPassword=md5($adminPassword);
		$this -> db -> select('*');
		$this -> db -> from('admin_login');
		//$this -> db -> where("owner_email='".$email."' AND password = '".$password."'");
		$this -> db->where('admin_userName', $adminUsername);
        $this -> db->where('admin_password', $adminPassword);
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
	
	
	function get_all_features() {
		
		//$this->db->select('*');
		//$this->db->from('plans');
		//$this->db->where('plan_status','1');
		$query = $this->db->get('features', 8, 0);
		
		  
	    
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	
}
?>