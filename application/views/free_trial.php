<!-- Start Free Trial Page -->
<style>.form-horizontal .form-group p{font-size:10px; color:#9e3a5e;}</style>
	<div id="free-trial">
		<div class="free-trial-headline">
			<div class="container">
				<div class="row margin-bottom-70">

					
					<?php if($this->session->userdata('user_data')!=''){ ?>
					<div class="col-md-12 col-sm-12 col-xs-12 text-center text-col-white">
						<h6 class="text-font-35 sm-text-font-20"> You are already logged In. <br>Please Logout first to register a new account. </h6>
					</div>

					<?php } else { ?>
					<?php if(isset($_GET['success'])!=''){ ?>
					<div class="col-md-12 col-sm-12 col-xs-12 text-center text-col-white">
						<h4 style="color:#70D0FA;"> You have successfully registered your account.<br> Please check your email to visit your subdomain. </h4>
					</div>

					<?php } ?>	
					<div class="col-md-12 col-sm-12 col-xs-12 text-center text-col-white">
						
						<h3 class="text-font-35 sm-text-font-20"> Create your free account </h3>
					</div>
					<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
						<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-12 xs-margin-bottom-20">
							<div class="text-col-white text-left padding-10 text-font-16 tab-text-font-12" style="border:1px solid #f9f9f9;">
								<p>If you're a teacher, facilitator or an instructor, here's where you signup! Complete the form to become an administrator, giving you the ability to create exams for your students, staff, job applicants and anything else you can think of.</p>
								<p>Already have an administrator account?</p>
								<!--<p class="text-center text-underline"><a class="text-col-white" href="">Login Here</a></p>-->
								<p class="text-center text-underline"><a class="text-col-white" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/contact';?>">Need help or have questions?</a></p>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12 bg-col-white form-border">
    					<?php $attributes = array('class' => 'form-horizontal');
							echo form_open('organization/free_trial',$attributes);	?>
								<div class="row">
									<div class="col-md-12 col-sm-12 text-align-right">
										<span class="text-font-10">All fields are required</span>
									</div>
									<div class="col-sm-12 col-md-12">
										<div class="form-group margin-bottom-5">
                                        <?php
										$attributes = array('class' => 'col-md-12 control-label text-align-left');
										echo form_label('Your Name', 'yourname', $attributes);?>
											<!--<label for="Fullname" class="col-md-12 control-label text-align-left">Your Name</label>-->
											<div class="col-md-6">
												<!--<input class="form-control" id="inputFirstName" placeholder="First Name" type="text">-->
                                                <?php $data = array('name'  => 'firstname','id'  => 'inputFirstName','class'  => 'form-control',
												  'placeholder'   => 'First Name','value'=> $this->input->post('firstname'));
												  echo form_input($data);?><?php echo form_error('firstname'); ?>
									  		</div>
											<div class="col-md-6">
												<!--<input class="form-control" id="inputLastName" placeholder="Last Name" type="text">-->
                                                <?php $data = array('name'  => 'lastname','id'  => 'inputLastName','class'  => 'form-control',
												  'placeholder'   => 'Last Name','value'=> $this->input->post('lastname'));
												  echo form_input($data);?><?php echo form_error('lastname'); ?>
									  		</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-12">
										<div class="form-group margin-bottom-5">
										<?php
										$attributes = array('class' => 'col-md-12 control-label text-align-left');
										echo form_label('Username', 'username', $attributes);?>
											<div class="col-md-12">
												 <?php $data = array('name'  => 'username','id'  => 'inputusername','class'  => 'form-control',
												  'placeholder'   => 'Username','value'=> $this->input->post('username'));
												  echo form_input($data);?><?php echo form_error('username'); ?>
									  		</div>
										</div>
									</div>
                                    
                                    <div class="col-sm-12 col-md-12">
										<div class="form-group margin-bottom-5">
										<!--<label for="emailaddress" class="col-md-12 control-label text-align-left">Email address</label>-->
                                        <?php
										$attributes = array('class' => 'col-md-12 control-label text-align-left');
										echo form_label('Email address', 'emailaddress', $attributes);?>
											<div class="col-md-12">
												<!--<input class="form-control" id="inputEmailAddress" placeholder="Email Address" type="email">-->
                                                <?php $data = array('name'  => 'email','id'  => 'inputEmailAddress','class'  => 'form-control',
												  'placeholder'   => 'Email Address','value'=> $this->input->post('email'));
												  echo form_input($data);?><?php echo form_error('email'); ?>
									  		</div>
										</div>
									</div>
                                    
									<div class="col-sm-12 col-md-12">
										<div class="form-group margin-bottom-5">
											<!--<label for="password" class="col-md-12 control-label text-align-left">Password</label>-->
                                            <?php
										     $attributes = array('class' => 'col-md-12 control-label text-align-left');
										     echo form_label('Password', 'password', $attributes);?>
											<div class="col-md-12">
												<!--<input class="form-control" id="inputPassword" placeholder="Email Password" type="password">-->
                                                 <?php $data = array('name'  => 'password','id'  => 'inputPassword','class'  => 'form-control',
												  'placeholder'   => 'Email Password','type'=>'password','value'=> $this->input->post('password'));
												  echo form_input($data);?><?php echo form_error('password'); ?>
									  		</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-12">
										<div class="form-group margin-bottom-5">
											<!--<label for="conPassword" class="col-md-12 control-label text-align-left">Confirm password</label>-->
                                            <?php
										     $attributes = array('class' => 'col-md-12 control-label text-align-left');
										     echo form_label('Confirm password', 'conPassword', $attributes);?>
											<div class="col-md-12">
												<!--<input class="form-control" id="inputConPassword" placeholder="Confirm Password" type="password">-->
                                                 <?php $data = array('name'  => 'conpassword','id'  => 'inputConPassword','class'  => 'form-control',
												  'placeholder'   => 'Confirm Password','type'=>'password','value'=> $this->input->post('conpassword'));
												  echo form_input($data);?><?php echo form_error('conpassword'); ?>
									  		</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-12">
										<div class="form-group margin-bottom-5">
											<!--<label for="organization" class="col-md-12 control-label text-align-left">Organization/School</label>-->
                                             <?php
										     $attributes = array('class' => 'col-md-12 control-label text-align-left');
										     echo form_label('Organization/School', 'organization', $attributes);?>
											<div class="col-md-12">
												<!--<input class="form-control" id="inputOrganization" placeholder="Organization/School" type="text">-->
                                                 <?php $data = array('name'  => 'organization','id'  => 'inputOrganization','class'  => 'form-control',
												  'placeholder'   => 'Organization/School','value'=> $this->input->post('organization'));
												  echo form_input($data);?><?php echo form_error('organization'); ?>
									  		</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-12">
										<div class="form-group margin-bottom-5">
											<!--<label for="examUrl" class="col-md-12 control-label text-align-left">Personalize your exam URL</label>-->
                                             <?php
										     $attributes = array('class' => 'col-md-12 control-label text-align-left');
										     echo form_label('Personalize your exam URL', 'examUrl', $attributes);?>
											<div class="col-md-8">
												<!--<input class="form-control" id="examUrl" placeholder="Exam Url..." type="text">-->
                                                <?php $data = array('name'  => 'subdomain','id'  => 'subdomain','class'  => 'form-control',
												  'placeholder'   => 'Subdomain...','value'=> $this->input->post('subdomain'));
												  echo form_input($data);?><?php echo form_error('subdomain'); ?>
									  		</div>
											<div class="col-md-4">
												<span>.toptals.com</span>
									  		</div>
										</div>
										<p class="text-font-10">Your participants will access their exams from this address (displayed in the exam welcome emails to participants). Max 12 characters, all lower-case letters, no spaces or punctuation except dashes.</p>
									</div>
									<div class="col-sm-12 col-md-12 text-center">
										<!--<a class="btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="#">Sign up</a>-->
                                        <?php $data = array('name'        => 'submit', 'value'       => 'Sign up',
								'class'  => 'btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10' 
										  );
										  echo form_submit($data);?>
									</div>
								</div>
							<?php echo form_close();?>
                            </div>
						<div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-12 xs-margin-top-20 margin-tab-left">
							<div class="text-col-white text-left text-font-16 tab-text-font-12 padding-10" style="border:1px solid #f9f9f9;">
								<p>Get 10 free tests, including every awesome paid feature of Toptals: custom exam banners, custom domain name, weighted exams and more!</p>
							</div>
						</div>
					</div>
					
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

<!-- End Free Trial Page -->