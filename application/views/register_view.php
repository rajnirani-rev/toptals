<div class="row">
<div class="col-md-12">
<h1>Register Form</h1>

<?php
	echo form_open('register/validate_credentials');	
	echo '<div class="form-group">';
	echo form_label('Username', 'username');
	$data = array(
	   'name'        => 'username',
       'value'       => $this->input->post('username'),	   
	   'class'       => 'form-control'
	);
	echo form_input($data);
	echo form_error('username', '<div class="text-danger">', '</div>');
	echo form_error('username_exist', '<div class="text-danger">', '</div>');
	echo '</div>';
	echo '<div class="form-group">';
	echo form_label('Email', 'email');
	$data = array(
	   'name'        => 'email',
       'value'       => $this->input->post('email'),	   
	   'class'       => 'form-control'
	);
	echo form_input($data);
	echo form_error('email', '<div class="text-danger">', '</div>');
	echo '</div>';
	echo '<div class="form-group">';
	echo form_label('First Name', 'firstname');
	$data = array(
	   'name'        => 'firstname',
       'value'       => $this->input->post('firstname'),	   
	   'class'       => 'form-control'
	);
	echo form_input($data);
	echo form_error('firstname', '<div class="text-danger">', '</div>');
	echo '</div>';
	echo '<div class="form-group">';
	echo form_label('Last Name', 'lastname');
	$data = array(
	   'name'        => 'lastname',
       'value'       => $this->input->post('lastname'),	   
	   'class'       => 'form-control'
	);
	echo form_input($data);
	echo form_error('lastname', '<div class="text-danger">', '</div>');
	echo '</div>';
	echo '<div class="form-group">';
	echo form_label('Password', 'password');	
	$data = array(
	   'name'        => 'password',
       'value'       => $this->input->post('password'),
	   'class'       => 'form-control' 
	);	
	echo form_password($data);
	echo form_error('password', '<div class="text-danger">', '</div>');
	echo '</div>';
		echo '<div class="form-group">';
	echo form_label('Confirm Password', 'confirm_password');
	$data = array(
	   'name'        => 'confirm_password',
       'value'       => $this->input->post('confirm_password'),
	   'class'       => 'form-control' 
	);	
	echo form_password($data);
	echo form_error('confirm_password', '<div class="text-danger">', '</div>');
	echo '</div>';
	echo '<div class="form-group">';	
	$data = array(
	   'name'        => 'submit',
       'value'       => 'Register',
	   'class'       => 'btn btn-danger' 
	);
	echo form_submit($data);
	echo '</div>';
	echo form_close();
?>

</div>
</div>

