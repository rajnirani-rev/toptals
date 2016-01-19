<!-- Start Form Content Part -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
		
			<!--<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Student Registration</h2>
			</div>-->
			<!--<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 padding-bottom-15">
				<h5 class="pull-left padding-left-right-0" style="color:black; font-weight:bold;">Add New Student</h5>
			</div>-->
			<div class="col-md-12 col-sm-12 padding-left-right-0 padding-left-right-40">
            Work in progress in this page....<br /><br /><br />
				 <?php /*?><?php $attributes = array('class' => 'form-horizontal');
							echo form_open('organization/add_student',$attributes);	?>
				  <div class="form-group">
					<label for="fullName" class="col-md-2 col-sm-3 col-xs-12 control-label" style="text-align: left;">Name<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class=" col-md-2 col-sm-3 col-xs-6">
					 <!-- <input type="text" class="form-control input-field-css" id="fName">-->
                       <?php $data = array('name'  => 'student_first_name','id'  => 'student_first_name','class'  => 'form-control input-field-css',
					    'value'       => $this->input->post('student_first_name'));
							 echo form_input($data);?><?php echo form_error('student_first_name'); ?>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-6">
					  
                     <?php $data = array('name'  => 'student_last_name','id'  => 'student_last_name','class'  => 'form-control input-field-css',
					    'value'       => $this->input->post('student_last_name'));
							 echo form_input($data);?> <?php echo form_error('student_last_name'); ?>
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputEmail3" class="col-md-2 col-sm-3 control-label" style="text-align: left;">Email<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class="col-md-3 col-sm-5">
					<!--  <input type="email" class="form-control input-field-css" id="inputEmail3">-->
                      <?php $data = array('name'  => 'student_email','id'  => 'student_email','class'  => 'form-control input-field-css',
					    'value'       => $this->input->post('student_email'));
							 echo form_input($data);?> <?php echo form_error('student_email'); ?>
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="col-md-2 col-sm-3 control-label" style="text-align: left;">Password<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class="col-md-3 col-sm-5">
					  
                      <?php $data = array('name'  => 'password','id'  => 'password','class'  => 'form-control input-field-css','type'=>'password');
							 echo form_input($data);?><?php echo form_error('password'); ?>
					</div>
				  </div>
				  <div class="form-group">
					<label for="company" class="col-md-2 col-sm-3 control-label" style="text-align: left;">Company<!--<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i>--></label>
					<div class="col-md-3 col-sm-5">
					   <?php $data = array('name'  => 'company_name','id'  => 'company_name','class'  => 'form-control input-field-css',
					    'value'       => $this->input->post('company_name'));
							 echo form_input($data);?> 
					</div>
				  </div>
				  <div class="form-group">
					<label for="crmId" class="col-md-2 col-sm-3 control-label" style="text-align: left;">CRM ID<!--<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i>--></label>
					<div class="col-md-6 col-sm-5">
					
                       <?php $data = array('name'  => 'crm_id','id'  => 'crm_id','class'  => 'form-control input-field-css','style'=>'width:35%',
					    'value'       => $this->input->post('crm_id'));
							 echo form_input($data);?>
					  <span>OPTIONAL Used for integration into your CRM system</span>
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-md-12 col-sm-5">
                    <?php $data = array('name'        => 'submit', 'value'       => 'Save',
								'class'  => 'btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10' 
										  ); echo form_submit($data);?>
                    
					</div>
				  </div>
					<?php echo form_close();?><?php */?><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/student/login">Login here</a><br /><br /><br />
			</div>
		</div> 
	</div>
</div>
<!-- End Form Content Part -->
