<!-- Start Form Content Part -->


<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
			 <?php $this->load->view('admin/includes/menu'); ?>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
			<?php echo $this->session->flashdata('registered_successfully');?>
            </div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15 mgmt-col-font">Student Administration</h2>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<div class="col-md-3 col-sm-6 col-xs-12 padding-left-right-0">
					<a class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="<?php echo base_url(); ?>organization/add_student">Add new Student</a>
				</div>
				<div class="margin-top-bottom-10 col-md-5 col-sm-10 col-xs-12 padding-left-right-0">
				    <form class="form-search">
					    <span class="text-font-16 text-font-weight col-md-3 col-sm-2 col-xs-12">Search</span>
					    <input type="text" class="input-medium search-query input-field-css col-md-8 col-sm-8 col-xs-12" placeholder="Enter firstname, surname or email" />
				    </form>
				</div>
				<div class="margin-top-bottom-10 col-md-4 col-sm-12 col-xs-12 padding-left-right-0">
					<span class="text-font-weight" style="text-decoration: underline;">Bulk Import Students</span>
					<span class="text-font-weight">&#124;</span>
					<span class="text-font-weight">Currently 0 users</span>
				</div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<div class="divider"><hr style="border-color:#000000;"></div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<span class="astrik-img col-md-1 col-sm-1 col-xs-2 padding-left-right-0" style="line-height: 3;"><img src="<?php echo base_url(); ?>images/alert-icon.png" /></span>
				<h5 class="create-exam col-md-11 col-sm-10 col-xs-10 padding-left-right-0">NEW! You no longer need to add students before they can sit the exam. Simply email, tweet or Facebook the Student Link to your students which you can find in the <a href="#" >Exams section.</a></h5>
                
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="table-responsive">
                      <table class="table">
						<tr>
                        	<th>Student</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Added</th>
                        </tr><?php
					  foreach($arr_all_student_from_organization as $r){
						echo '<tr><td>'.$r->student_first_name.' '.$r->student_last_name.'</td><td>'.$r->student_email.'</td><td>'.$r->company_name.'</td><td>'.$r->created_date.'</td></tr>';  
					  }
					  ?>
                      </table>
                </div>
                </div>
			</div>
			</div>
		</div>
	</div>
</div>
<!-- End Form Content Part -->