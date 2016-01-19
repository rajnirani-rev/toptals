<?php
 
class Dashboard extends CI_Controller {
 
     function __construct() {
		parent::__construct();
         
       // $subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2); //creates the various parts
       // $subdomain_name = $subdomain_arr[0]; //assigns the first part
        //echo $subdomain_name; // for testing only
		//echo "hello";
		
		
		
         
        $subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2);
        $subdomain_name = $subdomain_arr[0];
         
         
        $this->db->from('organization')->where('subdomain', $subdomain_name);
        $query = $this->db->get();
         
        if($query->num_rows() < 1)
        {
        redirect ('error');
        }
		
		
		
    }
 
    function index()
    {
		 $subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2);
        $subdomain_name = $subdomain_arr[0];
         
        $this->db->from('organization')->where('subdomain', $subdomain_name);
        $query = $this->db->get();
         
        $subdomain_info = $query->row();
        $data['fname'] = 'gfhgfhg';//$subdomain_info->owner_first_name;
        $data['sname'] = 'vbnvnbvnbv';//$subdomain_info->owner_first_name;
    
		
		
       $data['main_content'] = 'dashboard';		
		$this->load->view('includes/template', $data);
    }
}