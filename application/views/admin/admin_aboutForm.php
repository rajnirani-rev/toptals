<!-- Start Form Content Part -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
		
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
			 <?php $this->load->view('admin/includes/menu'); ?>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
			 <?php echo $this->session->flashdata('registered_successfully');?>
			 <?php echo $this->upload->display_errors();?>
				<h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Team</h2>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 padding-bottom-15">
				<h5 class="pull-left padding-left-right-0" style="color:black; font-weight:bold;">Add New Team</h5>
			</div>
			<div class="col-md-12 col-sm-12 padding-left-right-0 padding-left-right-40">
				
			 <?php echo $this->session->flashdata('registered_successfully');?>
				 <?php $attributes = array('class' => 'form-horizontal');
							echo form_open_multipart('admin/add_new_about',$attributes);	?>
				  <div class="form-group">
					<label for="company" class="col-md-2 col-sm-3 control-label" style="text-align: left;">Name<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class="col-md-6 col-sm-5">
					   <?php $data = array('name'  => 'teamName','id'  => 'teamName','class'  => 'form-control input-field-css',
					    'value'       => $this->input->post('teamName'));
							  echo form_input($data);?><?php echo form_error('teamName '); ?>
					</div>
				  </div>
				  <div class="form-group">
					<label for="fullName" class="col-md-2 col-sm-3 col-xs-12 control-label" style="text-align: left;">Image</label>
					<div class=" col-md-6 col-sm-3 col-xs-6">
					 <!-- <input type="text" class="form-control input-field-css" id="fName">-->
                      <?php $data = array('type' => 'file','name'  => 'logoImage','id'  => 'sd','class'  => 'form-control input-field-css');
							 echo form_input($data);?>
					</div>
				  </div>
				  <div class="form-group">
					<label for="company" class="col-md-2 col-sm-3 control-label" style="text-align: left;">Summary<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class="col-md-6 col-sm-5">
					   <?php $data = array('name'  => 'teamSummary','id'  => 'teamSummary','class'  => 'form-control input-field-css', 'value'       => $this->input->post('teamSummary'));
							  echo form_textarea($data);?><?php echo form_error('teamSummary'); ?>
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-md-12 col-sm-5">
                    <?php $data = array('name'        => 'submit', 'value'       => 'Save',
								'class'  => 'btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10' 
										  ); echo form_submit($data);?>
                    </div>
				  </div>
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Form Content Part -->
