<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

    // Load Helper in and Start session.
    function __construct() {
      parent::__construct();
      $this->load->helper('url');
	  $this->load->library('email');
      $this->load->helper('form');
      $this->load->library('session');
      $this->load->library('form_validation');
      $this->load->model('contact_model');
    }
    public function index()
    {   
      if(!empty($_POST)){$this->email->set_mailtype("html");
			$name=$this->input->post('name');$email=$this->input->post('email');
			$phone=$this->input->post('phone');$message=$this->input->post('message');
			 $this->email->to('hello@toptals.com');//hello@toptals.com
			$this->email->from($email);
			$this->email->subject('Contacted Through Toptals.Com');
			$this->email->message($message.'<br>Name: '.$name.'<br>Phone: '.$phone.'<br>');
			$this->email->send();
	  }
	
      $data['main_content'] = 'contact_view';    
      $this->load->view('includes/template', $data);
    }
	
}
 ?>