<?php 
class Myacc_model extends CI_Model {
	
	public function myacc()
	{
		echo "hi";

		$this->db->select("student_first_name,student_last_name,student_email,organization_id,company_name");
		$this->db->from('student');
		$query = $this->db->get();
  		return $query->result();
	}
	 
    
}
?>