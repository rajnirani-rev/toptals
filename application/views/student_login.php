<!-- Start Form Content Part -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
		
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Student Login</h2>
			</div>
			
			<div class="col-md-4 col-sm-4 padding-left-right-0 padding-left-right-40">
				 <?php $attributes = array('class' => 'form-horizontal');
							echo form_open('student/login_post',$attributes);	?>
                                        <div class='form-group'>
											<div class="form-group">
												<i class="fa fa-user login-field-icon"></i>
											<!--<input type="text" id="username" placeholder="Enter your name" value="" class="form-control login-field">-->
                                                <?php $data = array('name'  => 'username','id'  => 'inputusername','class'  => 'form-control login-field',
												  'placeholder'   => 'Enter your username');
												  echo form_input($data);?>
											</div>
							
											<div class="form-group">
												<i class="fa fa-lock login-field-icon"></i>
											<!--<input type="password" id="login-pass" placeholder="Password" value="" class="form-control login-field">-->
                                                <?php $data = array('name'  => 'password','id'  => 'inputpassword','class'  => 'form-control login-field',
												  'placeholder'   => 'Password');
												  echo form_input($data);?>
											</div>
							
										  <!--<a href="#" class="btn btn-success modal-login-btn">Login</a>-->
                                          <?php $data = array('name' => 'submit', 'value'=> 'Login','class'  => 'btn btn-success modal-login-btn' );
										  echo form_submit($data);?>
											<!--<a href="#" class="login-link text-center">Lost your password?</a>-->
										</div>
									  <?php echo form_close();?>
			</div>
		</div> 
	</div>
</div>
<!-- End Form Content Part -->
