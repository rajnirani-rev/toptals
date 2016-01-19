<?php 
class register_model extends CI_Model {
	
	function checkusername_availability($username)
	{
		$this -> db -> where('username' , $username);
		$query = $this -> db -> get('users');
		if($query -> num_rows() > 0 )
			return FALSE;
		else
			return TRUE;
		
	}
	function checkemail_availability($email)
	{
		$this -> db -> where('email' , $email);
		$query = $this -> db -> get('users');
		if($query -> num_rows() > 0 )
			return FALSE;
		else
			return TRUE;
		
	}
	function create_user(){
		
		$new_user_insert_data = array(
			'username' => $this->input->post('username'),
			'email'    => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'email'    => $this->input->post('firstname'),
			'email'    => $this->input->post('lastname')		
		);
		
		$insert = $this->db->insert("users",$new_user_insert_data);
		
		return $insert;
		
		}
    
}
?>