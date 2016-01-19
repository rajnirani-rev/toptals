
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pagination extends CI_Controller {

// Load libraries in Constructor.
	function __construct() {
	parent::__construct();
		$this->load->model('pagination_model');
		$this->load->library('pagination');
		$this->load->helper('url');
	}

	// Set array for PAGINATION LIBRARY, and show view data according to page.
	public function contact_info(){
		$config = array();
		$config["base_url"] = base_url() . "pagination/contact_info";
		$total_row = $this->pagination_model->record_count('features');
		$config["total_rows"] = $total_row;
		$config["per_page"] = 1;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);
		if($this->uri->segment(3)){
		$page = ($this->uri->segment(3)) ;
		}
		else{
		$page = 1;
		}
		$data["results"] = $this->pagination_model->fetch_data('features','features_id',$config["per_page"], $page);
		//$data["sadf"] = $this->pagination_model->fetch_data('plan','plan_id',$config["per_page"], $page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );

		// View data according to array.
		$data['main_content'] = 'admin/admin_pagination';		
		$this->load->view('admin/includes/template', $data);
		//$this->load->view("admin/admin_pagination", $data);
	}
}
?>

