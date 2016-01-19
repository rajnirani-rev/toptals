<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Myacc extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Myacc_model');
	}

	public function index()
	{
		
		echo "ji";
	  //  $this->data['records'] = $this->myacc_model->myacc(); 
	    //print_r( $this->data);
	   // $this->load->view('myacc_view', $this->data);

		
	}



	public function myacc_view()
	{
		
		echo "ji";
	 /*  $this->data['records'] = $this->Myacc_model->myacc(); 
	  print_r( $this->data);
	  $this->load->view('myacc_view', $this->data);*/

		
	}


}
?>