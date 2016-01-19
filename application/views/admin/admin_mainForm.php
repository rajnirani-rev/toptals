<!-- Start Form Content Part -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
		
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
			 <?php $this->load->view('admin/includes/menu'); ?>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
			 <?php echo $this->session->flashdata('registered_successfully');?>
			 <?php echo $this->upload->display_errors();?>
				<h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">About Us</h2>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 padding-bottom-15">
				<h5 class="pull-left padding-left-right-0" style="color:black; font-weight:bold;">About</h5>
			</div>
			<div class="col-md-12 col-sm-12 padding-left-right-0 padding-left-right-40">
				<?php foreach ($arr_all_about_main as  $value) {?>
			 <?php echo $this->session->flashdata('registered_successfully');?>
				 <?php $attributes = array('class' => 'form-horizontal');
							echo form_open_multipart('admin/main_about/'.$value->id,$attributes);	?>
							<div class="form-group">
					<label for="company" class="col-md-2 col-sm-3 control-label" style="text-align: left;">Main Content<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class="col-md-6 col-sm-5">
					   <?php $data = array('name'  => 'aboutMain','id'  => 'aboutMain','class'  => 'form-control input-field-css',
					    'value'       => $value->about_us_main);
							  echo form_textarea($data);?><?php echo form_error('aboutMain'); ?>
					</div>
				  </div>
				  <div class="form-group">
					<label for="company" class="col-md-2 col-sm-3 control-label" style="text-align: left;">Who we are<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class="col-md-6 col-sm-5">
					   <?php $data = array('name'  => 'desprection1','id'  => 'desprection1','class'  => 'form-control input-field-css','value'       => $value->who_we_are);
							  echo form_textarea($data);?><?php echo form_error('desprection1'); ?>
					</div>
				  </div>
				  <div class="form-group">
					<label for="company" class="col-md-2 col-sm-3 control-label" style="text-align: left;">What we do<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class="col-md-6 col-sm-5">
					   <?php $data = array('name'  => 'desprection2','id'  => 'desprection2','class'  => 'form-control input-field-css','value'       => $value->what_we_do);
							  echo form_textarea($data);?><?php echo form_error('desprection2'); ?>
					</div>
				  </div>
				  <div class="form-group">
					<label for="company" class="col-md-2 col-sm-3 control-label" style="text-align: left;">What we look<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class="col-md-6 col-sm-5">
					   <?php $data = array('name'  => 'desprection3','id'  => 'desprection3','class'  => 'form-control input-field-css','value'       => $value->what_we_look);
							  echo form_textarea($data);?><?php echo form_error('desprection3'); ?>
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-md-12 col-sm-5">
                    <?php $data = array('name'        => 'submit', 'value'       => 'Update',
								'class'  => 'btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10' 
										  ); echo form_submit($data);?>
                    </div>
				  </div>
					<?php echo form_close();?>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Form Content Part -->
