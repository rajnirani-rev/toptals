<div class="row">
<div class="col-md-12">
<?php echo $this->session->flashdata('registered_successfully');?>
<h1>Login Form</h1>
<?php
	echo form_open('login/validate_credentials');	
	echo '<div class="form-group">';
	echo form_label('Username', 'username');
	$data = array(
	   'name'        => 'username',
       'value'       => $this->input->post('username'),	   
	   'class'       => 'form-control'
	);
	echo form_input($data);
	echo '</div>';
	echo '<div class="form-group">';
	echo form_label('Password', 'password');
	$data = array(
	   'name'        => 'password',
       'value'       => $this->input->post('password'),
	   'class'       => 'form-control' 
	);	
	echo form_password($data);
	echo '</div>';
	echo '<div class="form-group">';	
	$data = array(
	   'name'        => 'submit',
       'value'       => 'Login',
	   'class'       => 'btn btn-danger' 
	);
	echo form_submit($data);
	echo '</div>';
	echo form_close();
?>

</div>
</div>

