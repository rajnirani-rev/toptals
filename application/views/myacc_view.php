<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
			
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Change Password</h2>
               
			</div>
			
			 <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 padding-bottom-15">
             
               <div style="padding-left:30px;">

            <form action="<?php echo base_url(); ?>student/change_std_password" method="post" accept-charset="utf-8" class="form-horizontal"> 

              <div class="form-group">

                    <label for="oldpassword" class="col-md-4 col-sm-6 col-xs-12 control-label" style="text-align: left;">Old Password<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>

                    <span class="col-md-4 col-sm-6 col-xs-6">
                        <input type="password" name="oldpass" required value="" class="form-control input-field-css">
                    </span>

              </div>

              <div class="form-group">

                    <label for="newpassword" class="col-md-4 col-sm-6 col-xs-12 control-label" style="text-align: left;">New Password<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>

                    <span class="col-md-4 col-sm-6 col-xs-6">
                        <input type="password" name="newpass" required value="" class="form-control input-field-css">
                    </span>
                    
              </div>

              <div class="form-group">

                    <label for="confirmpassword"  class="col-md-4 col-sm-6 col-xs-12 control-label" style="text-align: left;">Confirm Password<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>

                    <span class="col-md-4 col-sm-6 col-xs-6">
                        <input type="password" name="confirmpass" required value="" class="form-control input-field-css">
                    </span>
                    
              </div>
          
              <div class="form-group">
                    <span class="col-md-12 col-sm-5" style="float:right;">
                        <input type="submit" name="submit" value="Save" class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10">                    
                        <input type="hidden" name="hid_url" value="http://<?php echo $_SERVER['HTTP_HOST'];?>">                    
                    </span>
              </div>
              <?php if($this->uri->segment(3)==1){?>
                <p class="alert alert-success">Password has been changed <span data-dismiss='alert' class='close'>&times;</span></p>
              <?php } ?>


              <?php if($this->uri->segment(3)==2){?>
                <p class="alert alert-danger">Password does not exist <span data-dismiss='alert' class='close'>&times;</span></p>
              <?php } ?>

              <?php if($this->uri->segment(3)==3){?>
                <p class="alert alert-danger">Please fill all the above fields , <b>new</b> and <b>confirm</b> password should be same<span data-dismiss='alert' class='close'>&times;</span></p>
              <?php } ?>



              <!-- 
              <p class="alert alert-danger">Please fill all the above fields , <b>new</b> and <b>confirm</b> password should be same<span data-dismiss='alert' class='close'>&times;</span></p> -->

              </form>

          </div>
          </div>
          
		</div>
	</div>
</div>