<?php
 
class Csv_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
 
    }
 
    function insert_csv($data) {
        $insert=$this->db->insert('student', $data);
		return $insert;
    }
}
/*END OF FILE*/