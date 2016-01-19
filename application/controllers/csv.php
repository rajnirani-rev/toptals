<?php
 
class Csv extends CI_Controller {
 
    function __construct() {
        parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
        $this->load->model('csv_model');
        $this->load->library('csvimport');
		 $this->load->library('email');
    }
 
 
 
    function import_student() {
		if(!$this->session->userdata('user_data')) {
			redirect('/', 'refresh');	
		}
		if($this->session->userdata('user_data')) {
		$user_logged_rec = $this->session->userdata('user_data');
		$organization_id=$user_logged_rec['organization_id'];	
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name'] = $organization_name;
		$organization_owner_name=$user_logged_rec['owner_first_name'].' '.$user_logged_rec['owner_last_name'];
		$data['organization_owner_name'] = $organization_owner_name;
		$this->load->model('organization_model');
		$remaining_session=$this->organization_model->remaining_session($organization_id);$data['remaining_session'] = $remaining_session;					
		}
		
		
       // $data['addressbook'] = $this->csv_model->get_addressbook();
        $data['error'] = '';    //initialize image upload error array to empty
 //print_r($_FILES);
       $config['upload_path'] = 'upload/csv/';
	  // $config['file_ext'] = 'csv';
		$config['allowed_types'] = '*';
		$config['max_size']	= '1000000';
		$config['post_max_size']	= '10000000';
	//print_r($config);
		
		$this->load->library('upload', $config);
 		$this->upload->initialize($config);
      //  $this->load->library('upload');
 
 
        // If upload failed, display error
        if (!$this->upload->do_upload('userfile')) {
           $data['error'] = $this->upload->display_errors();
           // $this->load->view('csvindex', $data);
		   $data['main_content'] = 'import_student';		
				$this->load->view('includes/template', $data);
        } else {
            $file_data = $this->upload->data();
            $file_path =  './upload/csv/'.$file_data['file_name'];
// echo $file_path;
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
					//$password=str_shuffle($row['firstname']);
					$password=str_shuffle($row['firstname'].'2345');
                    $insert_data = array(
                        'student_first_name'=>$row['firstname'],
                        'student_last_name'=>$row['lastname'],
						'password'=>$password,
                        'student_email'=>$row['email'],
						'company_name'=>$row['company'],
						'organization_id'=>$organization_id,
						'student_status'=>'1',
						'created_date'=>date('Y-m-d h:i:s'),
                    );
                    $insert=$this->csv_model->insert_csv($insert_data);
					if($insert){				
						$this->email->set_mailtype("html");
						$this->email->to($row['email']);
						$this->email->from('hello@toptals.com');//hello@toptals.com
						$this->email->subject('Student Login Credentials For '.base_url());
						$this->email->message('Hi '.$row['firstname'].',<br>Your Student Panel Login Details:<br>'.base_url().'<br>Username : '.$row['email'].'<br>Password : '.$password);
						$this->email->send();						
					}
                }
                $this->session->set_flashdata('registered_successfully', 'Csv Data Of Student Imported Succesfully');
             redirect('organization/student_administration/', 'refresh');		
                //echo "<pre>"; print_r($insert_data);
            } else 
                $data['error'] = "Error occured";
                //$this->load->view('csvindex', $data);
				$data['main_content'] = 'import_student';		
				$this->load->view('includes/template', $data);
            }
 
        } 
 
}
/*END OF FILE*/