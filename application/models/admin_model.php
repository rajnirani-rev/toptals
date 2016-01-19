<?php 
class admin_model extends CI_Model {
	
	function checksubdomain_availability($subdomain)
	{
		$this -> db -> where('subdomain' , $subdomain);
		$query = $this -> db -> get('organization');
		if($query -> num_rows() > 0 )
			return FALSE;
		else
			return TRUE;	
	}
	
	function checkemail_availability($email)
	{
		$this -> db -> where('owner_email' , $email);
		$query = $this -> db -> get('organization');
		if($query -> num_rows() > 0 )
			return FALSE;
		else
			return TRUE;	
	}
	
	 
	function create_organization(){
		$new_organization_insert_data = array(
			'organization_name' => $this->input->post('organization'),
			'owner_email'    => $this->input->post('email'),
			'owner_first_name' => $this->input->post('firstname'),
			'owner_last_name'    => $this->input->post('lastname'),
			'password'    => md5($this->input->post('password')),
			'subdomain'    => $this->input->post('subdomain'),
			'created_date'    => date('Y-m-d h:i:s')					
		);
		$insert = $this->db->insert("organization",$new_organization_insert_data);
		return $insert;
		}
		
	function add_plans(){
		$add_plans_insert_data = array(
			'plan_title' => $this->input->post('title_name'),
			'plan_amount'    => $this->input->post('amount'),
			'plan_summary' => $this->input->post('planSummary'),
			'no_of_test'    => $this->input->post('noOfTests'),
			'date_added'    => date('Y-m-d h:i:s')					
		);
		$insert = $this->db->insert("plans",$add_plans_insert_data);
		return $insert;
	}
	function update_homepagepost($homeId)
    {
    	
    	$update_homepost = array(
			'homepage_title' => $this->input->post('postTitle'),
			'homepage_summary'    => $this->input->post('postSummary'),
			'homepage_details' => $this->input->post('postDetails')
		);
		//$homepostId = $this->input->post('postId');
		
		//print_r($homeId);die();
       $update = $this->db->update('homepage_post', $update_homepost,array('homepage_id' => $homeId));
        //echo $this->db->last_query();exit();die();

        return $update;
    }	
	function add_features(){
		$add_features_insert_data = array(
			'features_title' => $this->input->post('featuresTitle'),
			'features_summary'    => $this->input->post('featuresSummary'),
			'date_added'    => date('Y-m-d h:i:s')					
		);
		$insert = $this->db->insert("features",$add_features_insert_data);
		return $insert;
	}				
	function admin_login($adminUsername, $adminPassword)
	{
		
		$adminPassword=md5($adminPassword);
		$this -> db -> select('*');
		$this -> db -> from('admin_login');
		//$this -> db -> where("owner_email='".$email."' AND password = '".$password."'");
		$this -> db->where('admin_userName', $adminUsername);
        $this -> db->where('admin_password', $adminPassword);
		//echo $password."****".$email."****";exit;
	
		$this -> db -> limit(1);		
		$query = $this -> db -> get();
		//echo $this->db->last_query();
		//echo "<pre>";print_r($query->result());exit;
		if($query -> num_rows() == 1)
		{
		 	return $query->result();
		}
		else
		{
		 	return false;
		}
	}
	
	
	function get_all_plans() {
		
		$this->db->select('*');
		$this->db->from('plans');
		//$this->db->where('plan_status','1');
		
		$query = $this->db->get();
	    
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function get_all_features() {
		
		$this->db->select('*');
		$this->db->from('features');
		//$this->db->where('plan_status','1');
		
		$query = $this->db->get();
	    
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function get_all_organization() {
		
		$this->db->select('*');
		$this->db->from('organization');
		//$this->db->where('plan_status','1');
		
		$query = $this->db->get();
	    
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function get_all_homepost() {
		
		$this->db->select('*');
		$this->db->from('homepage_post');
		//$this->db->where('plan_status','1');
		
		$query = $this->db->get();
	    
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function delete_plan_id($delId){
		$this->db->where('plan_id', $delId);
		$this->db->delete('plans');
		//$query = $this->db->get();
		//echo $this->db->last_query();exit();die();
		
	}
	function delete_features_id($delId){
		$this->db->where('features_id', $delId);
		$this->db->delete('features');
		//$query = $this->db->get();
		//echo $this->db->last_query();exit();die();
		
	}
	function delete_org_id($delId){
		$this->db->where('id', $delId);
		$this->db->delete('organization');
		//$query = $this->db->get();
		//echo $this->db->last_query();exit();die();
		
	}
	function insert_images($image_data = array()){
		//echo 'image'; die();
      $data = array(
          'logo_name' => $image_data['file_name'],
          'logo_path' => $image_data['full_path']
      );
      $insert = $this->db->insert('who_use_toptals', $data);
      return $insert;
	}
	function insert_testimonial($image_data = array()){
		//echo 'image'; die();
	$data = array(
				'image'         	  => $image_data['file_name'],	
                'name'        		  => $this->input->post('testimonialName'),
                'testimonial_rating'  => $this->input->post('testimonialRating'),
                'testimonial_summary' => $this->input->post('testimonialSummary'),
                'email'      		  => $this->input->post('testimonialEmail'),
                'date_added'      	  => date('Y-m-d h:i:s')	
            );
     
      $insert = $this->db->insert('testimonial', $data);
      return $insert;
	}
	function insert_aboutInfo($image_data = array()){
		//echo 'image'; die();
	$data = array(
			     'team_name'      	=> $this->input->post('teamName'),
                'team_image'        => $image_data['file_name'],	
                'team_desprection'  => $this->input->post('teamSummary'),
                'date_added'      	=> date('Y-m-d h:i:s')	
            );
     
      $insert = $this->db->insert('about_us', $data);
      return $insert;
	}
	function get_images() {
		
		$this->db->select('*');
		$this->db->from('who_use_toptals');
		//$this->db->where('plan_status','1');
		
		$query = $this->db->get();
	    
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function update_about_main($aboutId)
    {
    	
    	$update_homepost = array(
			'about_us_main' => $this->input->post('aboutMain'),
			'who_we_are'    => $this->input->post('desprection1'),
			'what_we_do' => $this->input->post('desprection2'),
			'what_we_look'    => $this->input->post('desprection3')
		);
		//$homepostId = $this->input->post('postId');
		
		//print_r($homeId);die();
       $update = $this->db->update('about_main', $update_homepost,array('id' => $aboutId));
        //echo $this->db->last_query();exit();die();

        return $update;
    }	
	function get_testimonial() {
		
		$this->db->select('*');
		$this->db->from('testimonial');
		//$this->db->where('plan_status','1');
		
		$query = $this->db->get();
	    
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function get_about() {
		
		$this->db->select('*');
		$this->db->from('about_us');
		//$this->db->where('plan_status','1');
		
		$query = $this->db->get();
	    
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function get_main_about() {
		
		$this->db->select('*');
		$this->db->from('about_main');
		//$this->db->where('plan_status','1');
		
		$query = $this->db->get();
	    
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function delete_image_id($delId){
		$this->db->where('logo_id', $delId);
		$this->db->delete('who_use_toptals');
		//$query = $this->db->get();
		//echo $this->db->last_query();exit();die();
		
	}
	function delete_testimonial_id($delId){
		$this->db->where('testimonial_id', $delId);
		$this->db->delete('testimonial');
		//$query = $this->db->get();
		//echo $this->db->last_query();exit();die();
		
	}
	function delete_about_id($delId){
		$this->db->where('id', $delId);
		$this->db->delete('about_us');
		//$query = $this->db->get();
		//echo $this->db->last_query();exit();die();
		
	}
	public function record_count($table) {
		return $this->db->count_all($table);
	}
	public function get_id() {
		$this->db->select('id');
		$this->db->from('organization');
		$query = $this->db->get();
	    
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	// Fetch data according to per_page limit.
	public function fetch_data($tableName,$limit,$offset) {	
		//$this->db->limit($offset,$limit);
		//$this->db->where($tableId, $id);
		$this->db->order_by('id desc');
		$query = $this->db->get($tableName,$limit,$offset);
		
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