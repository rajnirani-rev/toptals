<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Search extends CI_Controller {

    function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('search_model');
	}
	

	public function index(){
		$search=  $this->input->post('search');
		$query = $this->search_model->getStudentThroughSearch($search);
		echo json_encode ($query);
	}
}
?>