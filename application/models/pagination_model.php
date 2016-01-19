

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pagination_Model extends CI_Model {
	function __construct() {
	parent::__construct();
	}
	// Count all record of table "contact_info" in database.
	public function record_count($table) {
		return $this->db->count_all($table);
	}
	
	// Fetch data according to per_page limit.
	public function fetch_data($tableName,$tableId,$limit, $id) {

		$this->db->limit($limit);
		$this->db->where($tableId, $id);
		$query = $this->db->get($tableName);

		if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
		$data[] = $row;
		}

		return $data;
		}
		return false;
	}
}
?>

