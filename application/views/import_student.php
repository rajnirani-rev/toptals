<!-- Start Form Content Part -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
			<div class="col-md-12 padding-left-right-0">
                  <!--Admin top menu-->
                  <div class="bs-example">
                  <ul class="nav nav-pills nav-back">
                  <li class="custom-active-color xs-margin-left-0"><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/home"><i class="fa fa-home fa-icons-custom"></i></a></li>
                  <li class="custom-active-color"><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/exam"><i class="fa fa-file-o fa-icons-custom"></i></a></li>
                  <li class="active custom-active-color"><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/student_administration"><i class="fa fa-users fa-icons-custom"></i></a></li>
                  <li class="custom-active-color"><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/report"><i class="fa fa-trophy fa-icons-custom"></i></a></li>
                  <li class="pull-right text-center">
                   <ul class="right-menu">
                  <li><a href="#"><span style="color:white;"><?php echo $organization_owner_name;?> </span></a><span style="padding-left:2px;">|</span></li> 
                  <li><a href="#"><span style="color:white;"> <?php echo $organization_name;?> Administrators</span></a><span style="padding-left:2px;">|</span></li>
                  <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/plan"><span style="color:white;"> <?php echo $remaining_session;?> sessions remaining - purchase more</span></a><span style="padding-left:2px;">|</span></li>
                  <li><a href="mailto:hello@toptals.com"><span style="color:white;"> Email Support</span></a></li>
                  </ul>
                  </li>
                  </ul>
                  </div>
                  <!--Admin top menu ends-->
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
			 <h5 class="pull-left padding-left-right-0  mgmt-col-font"><?php echo $this->session->flashdata('registered_successfully');?>
            <?php echo $this->session->flashdata('updated_successfully');?></h5>
            </div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15 mgmt-col-font">Import Student</h2>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<!--<div class="col-md-3 col-sm-6 col-xs-12 padding-left-right-0">
					<a class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="<?php echo base_url(); ?>organization/add_student">Add new Student</a>
				</div>-->
                <h4>Upload student data file in CSV Format(comma separated).</h4>
                <ul>
                    <li>File should have the fields: Firstname, Lastname, Email, Company Name columns (remove all other columns).MUST BE in that order.</li>
                    <li>First row of the csv file should be headers: "firstname, lastname, email, company" in each column</li>
                   <!-- <li>DO NOT include column headings (or any other extraneous data).</li>-->
                    <li>Passwords will be automatically assigned.</li>
                    <li>An email with login credentials will send automatically to all imported students.</li>
                </ul>
                
			<!--<form enctype="multipart/form-data" method="post" role="form" action="<?php echo base_url(); ?>organization/import_student">
            
                  <div class="form-group">
                           <label for="exampleInputFile">File Upload</label>
                           <input type="file" name="file" id="file" size="150">
                          <p class="help-block">
                                  Only CSV File Import.
                          </p>
                  </div>
                  <button type="submit" class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" name="submit" value="submit">Upload</button>
             </form>-->	
			</div>
            
            	
            
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<div class="divider"><hr style="border-color:#000000;"></div>
                 
            <?php if ($this->session->flashdata('success') == TRUE): ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
                  <h2>Student Import</h2>
              <!--  <form method="post" action="<?php echo base_url() ?>csv/importcsv" enctype="multipart/form-data">-->
              <?php echo form_open_multipart('csv/import_student');?>
                    <input type="file" name="userfile" >
                     <?php if (isset($error)): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
                   <br><br> <input type="submit" name="submit" value="UPLOAD" class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10">
                </form>
			</div>
			
			</div>
		</div>
	</div>
</div>
<!-- End Form Content Part -->