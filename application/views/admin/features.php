<!-- Start Form Content Part -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
			 <?php $this->load->view('admin/includes/menu'); ?>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
			 <?php echo $this->session->flashdata('registered_successfully');?>
				<h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Features</h2>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 padding-bottom-15">
				<h5 class="pull-left padding-left-right-0" style="color:black; font-weight:bold;">Add New Features</h5>
			</div>
			<div class="col-md-12 col-sm-12 padding-left-right-0 padding-left-right-40">
			 <?php echo $this->session->flashdata('registered_successfully');?>
				 <?php $attributes = array('class' => 'form-horizontal');
							echo form_open('admin/add_new_features',$attributes);	?>
				  <div class="form-group">
					<label for="fullName" class="col-md-2 col-sm-3 col-xs-12 control-label" style="text-align: left;">Title<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class=" col-md-10 col-sm-3 col-xs-6">
					 <!-- <input type="text" class="form-control input-field-css" id="fName">-->
                       <?php $data = array('name'  => 'featuresTitle','id'  => 'featuresTitle','class'  => 'form-control input-field-css',
					    'value'       => $this->input->post('featuresTitle'));
							 echo form_input($data);?><?php echo form_error('featuresTitle'); ?>
					</div>
					
				  </div>
				  
				  <div class="form-group">
					<label for="company" class="col-md-2 col-sm-3 control-label" style="text-align: left;">Summary<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class="col-md-10 col-sm-5">
					   <?php $data = array('name'  => 'featuresSummary','id'  => 'featuresSummary','class'  => 'form-control input-field-css',
					    'value'       => $this->input->post('featuresSummary'));
							  echo form_input($data);?><?php echo form_error('featuresSummary'); ?>
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
<!-- End Form Content Part -->
