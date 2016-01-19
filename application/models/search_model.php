<?php 

class search_model extends CI_Model {
	function getStudentThroughSearch($search){
		$this->db->select("id,student_first_name,student_last_name,student_email");
		$this->db->like('student_first_name', $search);
		$this->db->or_like('student_last_name', $search);
		$this->db->or_like('student_email', $search);
		$this->db->from('student');
		$query = $this->db->get();
		return $query->result();
	}
}
?>