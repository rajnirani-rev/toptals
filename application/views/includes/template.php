<?php
if($this->session->userdata('suser_data')) 
	$this->load->view('includes/header_student');
else
	$this->load->view('includes/header');
?>

<?php $this->load->view($main_content); ?>

<?php $this->load->view('includes/footer'); ?>