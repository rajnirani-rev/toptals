<!-- Add Include Menu File -->
<?php include 'menu.php'; ?>

<!-- Start Structure of the Page -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0">
                    <!--Admin top menu-->
                    <div class="bs-example">
                    <ul class="nav nav-pills nav-back">
                    <li class="active custom-active-color"><a href="#"><i class="fa fa-home fa-icons-custom"></i></a></li>
                    <li class="custom-active-color"><a href="#"><i class="fa fa-file-o fa-icons-custom"></i></a></li>
                    <li class="custom-active-color"><a href="#"><i class="fa fa-users fa-icons-custom"></i></a></li>
                    <li class="custom-active-color"><a href="#"><i class="fa fa-trophy fa-icons-custom"></i></a></li>
                    <li class="pull-right">
                    <ul class="right-menu">
                    <li><a href="#"><span style="color:white;"> school 114 </span></a><span style="padding-left:2px;">|</span></li> 
                    <li><a href="#"><span style="color:white;"> Administrators</span></a><span style="padding-left:2px;">|</span></li>
                    <li><a href="#"><span style="color:white;"> 10 sessions remaining - purchase more</span></a><span style="padding-left:2px;">|</span></li>
                    <li><a href="#"><span style="color:white;"> Email Support</span></a></li>
                    </ul>
                    </li>
                    </ul>
                    </div>
                    <!--Admin top menu ends-->
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40 margin-top-bottom-20">
                	<button type="button" class="btn btn-default btn-lg exam-set setup-btn-style text-col-white">Exam Settings</button>
                    <button type="button" class="btn btn-default btn-lg exam-set custom-exam-btn">Questions</button>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
                	<h2 class="pull-left mgmt-col-font">Exam Setup</h2>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
                	<div class="divider"><hr style="border-color: #000; border-bottom-width:thick;"></div>
                </div>
                <form class="form-horizontal">
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
                	<div class="form-group margin-bottom-15">
                    	<label for="examTitle" class="col-md-4 col-sm-4 col-xs-12 control-label text-align-left">Exam Title</label>
                        <div class="col-md-6 col-sm-7 col-xs-12"><input type="text" class="form-control" id="exam-title"></div>
                    </div>
                	<div class="form-group">
                    	<label for="exam Title" class="col-md-4 col-sm-4 col-xs-12 control-label text-align-left">Number of Questions To Be Asked</label>
                        <div class="col-md-2 col-sm-7 col-xs-12"><input type="text" class="form-control" id="totalQuesAsk"></div>
                        <span class="col-md-6 col-sm-7 text-font-12">Number of questions presented to participants.The question pool may containes more questions than this number - which is actually recommended to avoid cheating.</span>
                    </div>
                	<div class="form-group">
                    	<label for="exam Title" class="col-md-4 col-sm-4 col-xs-12 control-label text-align-left">Pass Marks</label>
                        <div class="col-md-2 col-sm-4 col-xs-12"><input type="text" class="form-control" id="passMarks">%</div>
                    </div>
                	<div class="form-group">
                    	<label for="exam Title" class="col-md-4 col-sm-4 col-xs-12 control-label text-align-left">Time Limit</label>
                        <div class="col-md-2 col-sm-4 col-xs-12"><input type="text" class="form-control" id="exam-title">minutes</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 padding-left-right-40">
                	<button type="button" class="btn btn-default btn-lg exam-set setup-btn-style text-col-white text-font-26 text-font-weight xs-text-font-17" onClick="toggler('show-advance-options');" id="onBtnClick">Advance Options<span class="glyphicon glyphicon-cog text-font-26 text-col-white"></span></button>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
                	<span class="text-font-weight">Required Field</span>
                </div>
                <div id="show-advance-options">
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 margin-top-bottom-20">
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-right-0">
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0">
                                <div class="col-md-5 col-sm-12 col-xs-12 padding-right-0 xs-margin-bottom-10">
                                	<div id="arrow_box"><span class="text-col-white arrow-text-line-height text-font-14 padding-left-4 margin-top-20">Contact</span>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-11 padding-left-right-0 margin-bottom-10">
									<div class="form-group col-md-6 col-sm-6 col-xs-12 margin-right-5">
                                    	<label class="sr-only" for="fullName">Full Name</label>
                                        <input type="text" class="form-control" id="fullName" placeholder="enter name....">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label class="sr-only" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="email">
                                    </div>
                                    <h5>Displayed upon exam completion and email communications relating to the exam</h5>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 margin-bottom-10">
                                <div class="col-md-5 col-sm-12 col-xs-12 padding-right-0">
                                	<div id="arrow_box"><span class="text-col-white arrow-text-line-height text-font-14 padding-left-4 margin-top-20">BCC Results</span>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-11 padding-left-right-0">
									<div class="demo-list col-md-3 col-sm-3 col-xs-3"><input type="checkbox" class="chk-box-size"></div>
                                    <h5>Emails a copy of the participant's completion results email to above contact</h5>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 margin-bottom-10">
                                <div class="col-md-5 col-sm-12 col-xs-11 padding-right-0 xs-margin-bottom-10">
                                	<div id="arrow_box"><span class="text-col-white arrow-text-line-height text-font-14 padding-left-4 margin-top-20">Exam Banner</span>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-11 padding-left-right-0">
									<div class="form-group col-md-6 col-sm-6 col-xs-11 margin-right-5">
                                    	<label class="sr-only" for="fullName">Full Name</label>
                                        <input type="text" class="form-control" id="fullName" placeholder="enter name....">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-11">
                                        <label class="sr-only" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="email">
                                    </div>
                                    <h5>Displayed upon exam completion and email communications relating to the exam</h5>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 margin-bottom-10">
                                <div class="col-md-5 col-sm-12 col-xs-11 padding-right-0">
                                	<div id="arrow_box"><span class="text-col-white arrow-text-line-height text-font-14 padding-left-4 margin-top-20">Styling</span>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-11 padding-left-right-0 margin-top-bottom-11">
                                    <h5 style="float:left;" class="margin-right-5">Background Color</h5>
									<div class="form-group col-md-6 margin-right-5">
                                    	<label class="sr-only" for="bgColor">BG Color</label>
                                        <input type="text" class="form-control" id="bgColor">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0">
                                <div class="col-md-5 col-sm-12 col-xs-12 padding-right-0">
                                	<div id="arrow_box"><span class="text-col-white arrow-text-line-height text-font-14 padding-left-4 margin-top-10">Weighted Exam</span>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-8 padding-left-right-0 margin-bottom-10">
									<div class="demo-list col-md-3 col-sm-3 col-xs-3"><input type="checkbox" class="chk-box-size"></div>
                                    <h5 class="margin-0">Allows you specify varying points per question. Weighted exam must only have the exact number of questions specified above. Leave unchecked for each correct answer = 1 (default).</h5>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 margin-bottom-10">
                                <div class="col-md-5 col-sm-12 col-xs-11 padding-right-0">
                                	<div id="arrow_box"><span class="text-col-white arrow-text-line-height text-font-14 padding-left-4 margin-top-10">Question Display</span>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-11 padding-left-right-0">
                                    <h5>The order in which questions are presented to students</h5>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 margin-bottom-10">
                                <div class="col-md-5 col-sm-12 col-xs-11 padding-right-0">
                                	<div id="arrow_box"><div class="text-col-white arrow-text-line-height text-font-14 padding-left-4 margin-top-10">Show Final Score</div>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-11 padding-left-right-0">
									<div class="demo-list col-md-3 col-sm-3 col-xs-3"><input type="checkbox" class="chk-box-size"></div>
                                    <h5>Show participant their score upon completion.</h5>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 margin-bottom-10">
                                <div class="col-md-5 col-sm-12 col-xs-11 padding-right-0">
                                	<div id="arrow_box"><span class="text-col-white arrow-text-line-height text-font-14 padding-left-4" style="line-height: 1.1;">Display Incorrect Answers On Completion</span>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-8 padding-left-right-0 margin-top-bottom-11">
									<div class="demo-list col-md-3 col-sm-3 col-xs-3"><input type="checkbox" class="chk-box-size"></div>
                                    <h5 class="margin-right-5">Optional. Displays the incorrect questions after a user submits their results</h5>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 margin-bottom-10">
                                <div class="col-md-5 col-sm-12 col-xs-11 padding-right-0">
                                	<div id="arrow_box"><div class="text-col-white arrow-text-line-height text-font-14 padding-left-4 margin-top-20">Exam Code</div>
								    	<div class="arrow-right"></div>
    								</div>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-11 padding-left-right-0 margin-top-bottom-11">
									<div class="form-group col-md-5 col-sm-5 margin-right-5">
                                    	<label class="sr-only" for="bgColor">Exam Code</label>
                                        <input type="text" class="form-control" id="examCode">
                                    </div>
                                    <h5 class="margin-right-5" style="margin: 0px;">Optional.Exam Code for CRM integration</h5>
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
							<h6>Users see this text just before they begin the exam</h6>
							<div class="form-group col-md-12">
								<textarea class="form-control" rows="3" id="exam-text"></textarea>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-md-12 col-sm-12 col-xs-12 padding-right-0">
							<h5 class="text-font-weight">Email - Invitation Note Optional</h5>
							<h6>Personalisation fields [FNAME] = Firstname, [EXAM-TITLE] = Exam Title (case sensitive) This note is inserted into the exam invitation email. A link to the exam and the user's login details are automatically inserted.</h6>
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<textarea class="form-control" rows="3" id="exam-text"></textarea>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
						<div class="col-md-6 col-sm-6 col-xs-12 padding-left-0">
							<h5 class="text-font-weight">Text - Completion Success</h5>
							<h6>Shown to the user if they pass the exam. A copy is also sent via email</h6>
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<textarea class="form-control" rows="3" id="exam-text"></textarea>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-md-12 col-sm-12 col-xs-12 padding-right-0">
							<h5 class="text-font-weight">Automated email reminder text</h5>
							<h6>Email reminders are sent to students that have a session created for them but have not yet attempted the exam. Reminders are sent at 2 weeks and 1 month.</h6>
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<textarea class="form-control" rows="3" id="exam-text"></textarea>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
						<div class="col-md-6 col-sm-6 col-xs-12 padding-left-0">
							<h5 class="text-font-weight">Text - Completion Fail</h5>
							<h6>Shown to the user if they fail the exam. A copy is also sent via email</h6>
							<div class="form-group col-md-12">
								<textarea class="form-control" rows="3" id="exam-text"></textarea>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-md-12 col-sm-12 col-xs-12 padding-right-0">
		            		<a class="btn btn-outline btn-lg btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10 xs-text-font-17" href="#">Save & begin entering questions</a>
						</div>
					</div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
                	<div class="divider"><hr style="border-color: #999; border-bottom-width:thick;"></div>
                </div>
                </form>
			</div>
        </div>
	</div>
</div>

<!-- Ends Structure of the Page -->

<!-- Add Footer File -->
<?php include 'footer.php'; ?>