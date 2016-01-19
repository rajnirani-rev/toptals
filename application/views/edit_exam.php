
<!-- Start Structure of the Page -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row margin-0">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0">
                    <!--Admin top menu-->
                    <div class="bs-example">
                    <ul class="nav nav-pills nav-back">
                    <li class="custom-active-color"><a href="<?php echo base_url(); ?>organization/home"><i class="fa fa-home fa-icons-custom"></i></a></li>
                    <li class="active custom-active-color"><a href="<?php echo base_url(); ?>organization/exam"><i class="fa fa-file-o fa-icons-custom"></i></a></li>
                    <li class="custom-active-color"><a href="<?php echo base_url(); ?>organization/student_administration"><i class="fa fa-users fa-icons-custom"></i></a></li>
                    <li class="custom-active-color"><a href="#"><i class="fa fa-trophy fa-icons-custom"></i></a></li>
                    <li class="pull-right">
                     <ul class="right-menu">
                  <li><a href="#"><span style="color:white;"><?php echo $organization_owner_name;?> </span></a><span style="padding-left:2px;">|</span></li> 
                  <li><a href="#"><span style="color:white;"> <?php echo $organization_name;?> Administrators</span></a><span style="padding-left:2px;">|</span></li>
                  <li><a href="<?php echo base_url();?>plan"><span style="color:white;"> <?php echo $remaining_session;?> sessions remaining - purchase more</span></a><span style="padding-left:2px;">|</span></li>
                  <li><a href="mailto:hello@toptals.com"><span style="color:white;"> Email Support</span></a></li>
                  </ul>
                    </li>
                    </ul>
                    </div>
                    <!--Admin top menu ends-->
                </div>
               <!-- <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40 margin-top-bottom-20">
                	<button type="button" class="btn btn-default btn-lg exam-set setup-btn-style text-col-white">Exam Settings</button>
                    <button type="button" class="btn btn-default btn-lg exam-set custom-exam-btn">Questions</button>
                </div>-->
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
                	<h2 class="pull-left mgmt-col-font">Exam Setup Update</h2>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
                	<div class="divider"><hr style="border-color: #000; border-bottom-width:thick;"></div>
                </div>
                <?php foreach($get_exam_detail as $ged){?>
                
                <?php $attributes = array('class' => 'form-horizontal');
							echo form_open('organization/edit_exam/exam_id/'.$ged->exam_id,$attributes);	?>
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
                	<div class="form-group margin-bottom-15">
                    	<label for="examTitle" class="col-md-4 col-sm-4 col-xs-12 control-label text-align-left">Exam Title</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                         <?php $data = array('name'  => 'exam_name','id'  => 'exam_name','class'  => 'form-control',
					    'value'       => $ged->exam_name);
							 echo form_input($data);?><?php echo form_error('exam_name'); ?>
                        </div>
                    </div>
                	<div class="form-group">
                    	<label for="exam Title" class="col-md-4 col-sm-4 col-xs-12 control-label text-align-left">Number of Questions To Be Asked</label>
                        <div class="col-md-2 col-sm-7 col-xs-12">
                        <?php $data = array('name'  => 'number_of_question','id'  => 'number_of_question','class'  => 'form-control',
					    'value'       => $ged->number_of_question);
							 echo form_input($data);?> <?php echo form_error('number_of_question'); ?>
                        </div>
                        <span class="col-md-6 col-sm-7 text-font-12">Number of questions presented to participants.The question pool may containes more questions than this number - which is actually recommended to avoid cheating.</span>
                    </div>
                	<div class="form-group">
                    	<label for="exam Title" class="col-md-4 col-sm-4 col-xs-12 control-label text-align-left">Pass Marks</label>
                        <div class="col-md-2 col-sm-4 col-xs-12">
                        <?php $data = array('name'  => 'passmarks','id'  => 'passmarks','class'  => 'form-control',
					    'value'       => $ged->passmarks);
							 echo form_input($data);?> <?php echo form_error('passmarks'); ?>%</div>
                    </div>
                	<div class="form-group">
                    	<label for="exam Title" class="col-md-4 col-sm-4 col-xs-12 control-label text-align-left">Time Limit</label>
                        <div class="col-md-2 col-sm-4 col-xs-12">
                         <?php $data = array('name'  => 'time_limit','id'  => 'time_limit','class'  => 'form-control',
					    'value'       => $ged->time_limit);
							 echo form_input($data);?> <?php echo form_error('time_limit'); ?>
                        minutes</div>
                    </div>
                </div><?php 
					  if($this->session->userdata('user_data')) {
					  $user_logged_rec = $this->session->userdata('user_data');					
					  }
					  ?>
                <div class="col-md-4 col-sm-6 col-xs-12 padding-left-right-40">
                	<button type="button" class="btn btn-default btn-lg exam-set setup-btn-style text-col-white text-font-26 text-font-weight xs-text-font-17 sm-adv-btn-font-size-16" onClick="toggler('show-advance-options');" id="onBtnClick">Advance Options<span class="glyphicon glyphicon-cog text-font-26 text-col-white"></span></button>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
                	<span class="text-font-weight">Required Field</span>
                </div>
                <div id="show-advance-options" class="hide-advance-options">
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40 margin-top-bottom-20">
                        <div class="col-md-6 col-sm-12 col-xs-12 padding-left-right-0">
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0">
                                <div class="col-md-5 col-sm-4 col-xs-12 padding-left-right-0 xs-margin-bottom-10 xs-padding-left-0">
                                	<div id="arrow_box"><span class="text-col-white arrow-text-line-height text-font-12 padding-left-4 margin-top-20">Contact</span>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-8 col-xs-11 padding-left-right-0 margin-bottom-10">
									<div class="form-group col-md-6 col-sm-6 col-xs-12 margin-right-5">
                                    	<label class="sr-only" for="fullName">Full Name</label>
                                        <!--<input type="text" class="form-control" id="fullName" placeholder="enter name....">-->
                                        <?php $data = array('name'  => 'full_name','id'  => 'full_name','class'  => 'form-control',
					    'value'       => $user_logged_rec['owner_first_name'].' '.$user_logged_rec['owner_last_name']);
							 echo form_input($data);?> <?php echo form_error('full_name'); ?>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label class="sr-only" for="email">Email</label>
                                       <!-- <input type="email" class="form-control" id="email" placeholder="email">-->
                                        <?php $data = array('name'  => 'email','id'  => 'email','class'  => 'form-control',
					    'value'       => $user_logged_rec['owner_email']);
							 echo form_input($data);?> <?php echo form_error('email'); ?>
                                    </div>
                                    <h5 class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0">Displayed upon exam completion and email communications relating to the exam</h5>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 margin-bottom-10">
                                <div class="col-md-5 col-sm-4 col-xs-12 padding-left-right-0 xs-padding-left-0">
                                	<div id="arrow_box"><span class="text-col-white arrow-text-line-height text-font-12 padding-left-4 margin-top-20">BCC Results</span>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-8 col-xs-11 padding-left-right-0">
									<div class="demo-list col-md-3 col-sm-2 col-xs-3 padding-left-right-0">
                                    <!--<input type="checkbox" class="chk-box-size">-->
                                    <input type="hidden" name="bcc_results" value="0" />
                                    <?php if($ged->bcc_results==1){$ch=TRUE;}else{$ch=FALSE;}
									$data = array('name' => 'bcc_results','id' => 'bcc_results','value' =>'1','class'  => 'chk-box-size','checked'=> $ch);
									echo form_checkbox($data);?>
<!--<input type="checkbox" name="newsletter" id="newsletter" value="accept" checked="checked" style="margin:10px" />--></div>
                                    <h5 class="col-md-9 col-sm-10 col-xs-9 padding-left-right-0">Emails a copy of the participant's completion results email to above contact</h5>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 margin-bottom-10">
                                <div class="col-md-5 col-sm-4 col-xs-11 padding-left-right-0 xs-margin-bottom-10 xs-padding-left-0">
                                	<div id="arrow_box"><span class="text-col-white arrow-text-line-height text-font-12 padding-left-4 margin-top-20">Exam Banner</span>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-8 col-xs-11 padding-left-right-0">
									<!--<div class="form-group col-md-6 col-sm-6 col-xs-11 margin-right-5">
                                    	<label class="sr-only" for="fullName">Full Name</label>
                                        <input type="text" class="form-control" id="fullName" placeholder="enter name....">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-11">
                                        <label class="sr-only" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="email">
                                    </div>-->
                                     <?php $data = array('name' => 'exam_banner','id' => 'exam_banner','type' => 'file','class'  => 'form-control');
									echo form_input($data);?>
                                    <h5 class="col-md-10 col-sm-10 col-xs-12">Displayed upon exam completion and email communications relating to the exam</h5>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 margin-bottom-10">
                                <div class="col-md-5 col-sm-4 col-xs-11 padding-left-right-0 xs-padding-left-0">
                                	<div id="arrow_box"><span class="text-col-white arrow-text-line-height text-font-12 padding-left-4 margin-top-20">Styling</span>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-8 col-xs-11 padding-left-right-0 margin-top-bottom-11">
                                    <h5 style="float:left;" class="margin-right-5">Background Color</h5>
									<div class="form-group col-md-6 col-sm-6 col-xs-6 margin-right-5">
                                    	<label class="sr-only" for="bgColor">BG Color</label>
                                        <!--<input type="text" class="form-control" id="bgColor">-->
                                        <?php $data = array('name' => 'styling','id' => 'styling','value' => $ged->styling,'class'  => 'form-control');
									echo form_input($data);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 sm-padding-left-right-0">
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0">
                                <div class="col-md-5 col-sm-4 col-xs-12 padding-left-right-0 xs-padding-left-0">
                                	<div id="arrow_box"><span class="text-col-white arrow-text-line-height text-font-12 padding-left-4 margin-top-20">Weighted Exam</span>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-8 col-xs-8 padding-left-right-0 margin-bottom-10">
									<div class="demo-list col-md-3 col-sm-2 col-xs-3 padding-left-0"><!--<input type="checkbox" class="chk-box-size">-->
                                    <input type="hidden" name="weighted_exam" value="0" />
                                     <?php if($ged->weighted_exam==1){$ch=TRUE;}else{$ch=FALSE;}
									$data = array('name' => 'weighted_exam','id' => 'weighted_exam','value' => '1','class'  => 'chk-box-size', 'checked' => $ch);
									echo form_checkbox($data);?>
                                    </div>
                                    <h5 class="margin-0 col-md-9 col-sm-10 col-xs-9 padding-left-right-0">Allows you specify varying points per question. Weighted exam must only have the exact number of questions specified above. Leave unchecked for each correct answer = 1 (default).</h5>
                                </div>
                            </div>
                           <!-- <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 margin-bottom-10">
                                <div class="col-md-5 col-sm-4 col-xs-11 padding-left-right-0 xs-padding-left-0">
                                	<div id="arrow_box"><span class="text-col-white arrow-text-line-height text-font-12 padding-left-4 margin-top-10">Question Display</span>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-8 col-xs-11 padding-left-right-0">
                                    <h5>The order in which questions are presented to students</h5>
                                </div>
                            </div>-->
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 margin-bottom-10">
                                <div class="col-md-5 col-sm-4 col-xs-11 padding-left-right-0 xs-padding-left-0">
                                	<div id="arrow_box"><div class="text-col-white arrow-text-line-height text-font-12 padding-left-4 margin-top-10">Show Final Score</div>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-8 col-xs-11 padding-left-right-0">
									<div class="demo-list col-md-3 col-sm-2 col-xs-3 padding-left-0"><!--<input type="checkbox" class="chk-box-size">-->
                                    <input type="hidden" name="show_final_score" value="0" />
									<?php if($ged->show_final_score==1){$ch=TRUE;}else{$ch=FALSE;}
									$data = array('name' => 'show_final_score','id' => 'show_final_score','value' => '1','class'  => 'chk-box-size', 'checked'     => $ch);
									echo form_checkbox($data);?></div>
                                    <h5>Show participant their score upon completion.</h5>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 margin-bottom-10">
                                <div class="col-md-5 col-sm-4 col-xs-11 padding-left-right-0 xs-padding-left-0">
                                	<div id="arrow_box"><span class="text-col-white arrow-text-line-height text-font-12 padding-left-4 margin-top-bottom-5" style="line-height: 1.1;">Display Incorrect Answers On Completion</span>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-8 col-xs-8 padding-left-right-0 margin-top-bottom-11">
									<div class="demo-list col-md-3 col-sm-2 col-xs-3 padding-left-0"><!--<input type="checkbox" class="chk-box-size">-->
                                       <input type="hidden" name="display_incorrect_answers_on_completion" value="0" />
									   <?php if($ged->display_incorrect_answers_on_completion==1){$ch=TRUE;}else{$ch=FALSE;}
									$data = array('name' => 'display_incorrect_answers_on_completion','id' => 'display_incorrect_answers_on_completion','value' => '1','class'  => 'chk-box-size', 'checked' => $ch);
									echo form_checkbox($data);?>
                                    </div>
                                    <h5 class="col-md-9 col-sm-10 padding-left-right-0">Optional. Displays the incorrect questions after a user submits their results</h5>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 margin-bottom-10">
                                <div class="col-md-5 col-sm-4 col-xs-11 padding-left-right-0 xs-padding-left-0">
                                	<div id="arrow_box"><div class="text-col-white arrow-text-line-height text-font-12 padding-left-4 margin-top-20">Exam Code</div>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-8 col-xs-11 padding-left-right-0 margin-top-bottom-11">
									<div class="form-group col-md-5 col-sm-5 margin-right-5">
                                    	<label class="sr-only" for="bgColor">Exam Code</label>
                                       <!-- <input type="text" class="form-control" id="examCode">-->
                                         <?php 
										 $data = array('name' => 'exam_code','id' => 'exam_code','value' => $ged->exam_code,'class'  => 'form-control');
									echo form_input($data);?>
                                    </div>
                                    <h5 class="margin-right-5 margin-0 col-md-7 col-sm-7 padding-left-right-0">Optional.Exam Code for CRM integration</h5>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40 notify-message">
						<h5 class="text-col-white">Notification Messages</h5>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
						<div class="col-md-6 col-sm-6 col-xs-12 padding-left-0">
							<h5 class="text-font-weight">Exam Introduction Text</h5>
							<h6 class="margin-bottom-35 xs-margin-bottom-10">Users see this text just before they begin the exam</h6>
							<div class="form-group col-md-12">
								<!--<textarea class="form-control" rows="3" id="exam-text"></textarea>-->
                                <?php $data = array('name' => 'exam_introduction_text','id' => 'exam_introduction_text','type' => 'textarea','class'  => 'form-control','value'=>$ged->exam_introduction_text);
									echo form_input($data);?>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-md-12 col-sm-12 col-xs-12 padding-right-0 xs-padding-left-0">
							<h5 class="text-font-weight">Email - Invitation Note Optional</h5>
							<h6>Personalisation fields [FNAME] = Firstname, [EXAM-TITLE] = Exam Title (case sensitive) This note is inserted into the exam invitation email. A link to the exam and the user's login details are automatically inserted.</h6>
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<!--<textarea class="form-control" rows="3" id="exam-text"></textarea>-->
                                 <?php $data = array('name' => 'email_invitation_note_optional','id' => 'email_invitation_note_optional','type' => 'textarea','class'  => 'form-control','value'=>$ged->email_invitation_note_optional);
									echo form_input($data);?>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
						<div class="col-md-6 col-sm-6 col-xs-12 padding-left-0">
							<h5 class="text-font-weight">Text - Completion Success</h5>
							<h6>Shown to the user if they pass the exam. A copy is also sent via email</h6>
							<div class="form-group col-md-12 col-sm-12 col-xs-12 margin-top-15 xs-margin-top-0">
								<!--<textarea class="form-control" rows="3" id="exam-text"></textarea>-->
                                 <?php $data = array('name' => 'text_completion_success','id' => 'text_completion_success','type' => 'textarea','class'  => 'form-control','value'=>$ged->text_completion_success);
									echo form_input($data);?>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-md-12 col-sm-12 col-xs-12 padding-right-0 xs-padding-left-0">
							<h5 class="text-font-weight">Automated email reminder text</h5>
							<h6>Email reminders are sent to students that have a session created for them but have not yet attempted the exam. Reminders are sent at 2 weeks and 1 month.</h6>
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<!--<textarea class="form-control" rows="3" id="exam-text"></textarea>-->
                                 <?php $data = array('name' => 'automated_email_reminder_text','id' => 'automated_email_reminder_text','type' => 'textarea','class'  => 'form-control','value'=>$ged->automated_email_reminder_text);
									echo form_input($data);?>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
						<div class="col-md-6 col-sm-6 col-xs-12 padding-left-0">
							<h5 class="text-font-weight">Text - Completion Fail</h5>
							<h6>Shown to the user if they fail the exam. A copy is also sent via email</h6>
							<div class="form-group col-md-12">
								<!--<textarea class="form-control" rows="3" id="exam-text"></textarea>-->
                                 <?php $data = array('name' => 'text_completion_fail','id' => 'text_completion_fail','type' => 'textarea','class'  => 'form-control','value'=>$ged->text_completion_fail);
									echo form_input($data);?>
							</div>
						</div>
						
					</div>
                    
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40 text-align-right margin-top-97 xs-margin-top-10">
                              <?php $data = array('name'        => 'submit', 'value'       => 'Save',
								'class'  => 'btn btn-outline btn-lg btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10 xs-text-font-12 sm-btn-text-font-12'); echo form_submit($data);?>
						</div>
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
                	<div class="divider"><hr style="border-color: #999; border-bottom-width:thick;"></div>
                </div>
               <?php echo form_close();?>
               <?php }//foreach end?>
			</div>
        </div>
	</div>
</div>

<!-- Ends Structure of the Page -->
