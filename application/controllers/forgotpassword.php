<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgotpassword extends CI_Controller {


    function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('forgotpassword_model');
	  }
	  
	  public function index()
	  {
		  if (isset($_GET['info'])) {
               $data['info'] = $_GET['info'];
              }
		  if (isset($_GET['error'])) {
              $data['error'] = $_GET['error'];
              }
		
		 
		  /*
		  $arr_all_main = $this->forgotpassword_model->get_all_main();
		  $data['arr_all_main']= $arr_all_main;
		  $arr_all_team = $this->forgotpassword_model->get_all_about_us();
		  $data['arr_all_team']= $arr_all_team;*/
		  $data['main_content'] = 'forgotpassword_view';		
		  $this->load->view('includes/template', $data);
	}
	 
	
	public function doforget()
	{
		$email= $_POST['email'];
		$q = $this->db->query("select * from organization where owner_email='" . $email . "'");
        if ($q->num_rows > 0) {
            $r = $q->result();
            $user=$r[0];
			$this->forgotpassword_model->resetpassword($user);
			$info= "Password has been reset and has been sent to email id: ". $email;
			redirect('forgotpassword/index?info=' . $info, 'refresh');
        }
		$error= "The email id you entered not found on our database ";
		redirect('forgotpassword/index?error=' . $error, 'refresh');
		
	} 	
	
}



/* End of file home.php */
/* Location: ./application/controllers/home.php */