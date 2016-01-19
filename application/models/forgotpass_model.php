<?php 
class forgotpass_model extends CI_Model {
	
	function resetpassword($user)
	{
		date_default_timezone_set('GMT');
		$this->load->helper('string');
		$password= random_string('alnum', 10);
		$this->db->where('id', $user->id);
		$this->db->update('student',array('password'=>md5($password)));
		$this->load->library('email');
		$this->email->from('hello@toptals.com', 'Toptals');
		$this->email->to($user->student_email); 	
		$this->email->subject('Password Reset');
		$this->email->message('You have requested the new password, Here is you new password:'. $password);	
		$this->email->send();
	} 
	
	
    
}
?>