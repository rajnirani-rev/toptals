<!-- Include header file -->
<?php include 'menu.php'; ?>

<!-- Start Form Content Part -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 bg-col-white padding-left-right-0">
			<div class="col-md-12 padding-left-right-0">
				<!--Admin top menu-->
				<div class="bs-example">
				<ul class="nav nav-pills nav-back">
				<li class="active custom-active-color"><a href="#"><i class="fa fa-home fa-icons-custom"></i></a></li>
				<li class="custom-active-color"><a href="#"><i class="fa fa-file-o fa-icons-custom"></i></a></li>
				<li class="custom-active-color"><a href="#"><i class="fa fa-users fa-icons-custom"></i></a></li>
				<li class="custom-active-color"><a href="#"><i class="fa fa-trophy fa-icons-custom"></i></a></li>
				<li class="pull-right text-center">
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
            <div class="col-md-11 col-md-offset-1 padding-left-right-0 margin-bottom-30" style="margin-left: 33px;">
            <div class="col-md-10" style="margin-top: 33px;">
            <a class="btn btn-lg btn-primary exam-set" role="button" href="#" style="background-color: #00d3ff !important; color: #fff; margin-right:10px; border: 0 none;">Exam Settings</a>			
            <a class="btn btn-lg btn-default custom-exam-btn" role="button" href="#">Questions</a>
            </div>
			<div class="col-md-4" style="margin-bottom: -22px;">
				 <h2 class="pull-left" style="color:black; font-weight:bold;">Exam Setup</h2></br>
			</div>
            <div class="col-md-11 col-sm-11 col-xs-11">
               <div class="divider"><hr style="border-color: #000; border-bottom-width:thick;"></div>
            </div>
           <form class="form-horizontal" role="form">
            <div class="col-md-12">
                <div class="form-group">
                <label class="col-sm-4 col-md-4 text-align-left" for="ExamTitle">Exam Title
                <span aria-hidden="true" class="glyphicon glyphicon-asterisk custom-color icon-custom-size" style="font-size: 12px;"></span></label>
                <div class="col-sm-5 col-md-5 padding-left-right-0"><input class="form-control input-custom" placeholder="" type="text"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label class="col-sm-4 col-md-4 text-align-left" style="padding-right:0px!important;" for="Numofquestions" >Num Questions To Be Asked<span aria-hidden="true" class="glyphicon glyphicon-asterisk custom-color icon-custom-size" style="font-size: 12px;"></span></label>
                <div class="col-sm-1 col-md-1 padding-left-right-0" ><input class="form-control input-custom"  placeholder="" type="text"></div>
                <div class="col-sm-7 col-md-7" style="padding-right: 0px!important;"><p style="font-size:12px;">Number of questions presented to participants.The question pool may containes more questions than this number - which is actually recommended to avoid cheating.</p></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label class="col-sm-4 col-md-4 text-align-left" for="passmark">Passmark<span aria-hidden="true" class="glyphicon glyphicon-asterisk custom-color icon-custom-size" style="font-size: 12px;"></span></label>
                <div class="col-sm-1 col-md-1 padding-left-right-0"><input class="form-control input-custom" placeholder="" type="text"></div><div class="col-sm-1 col-md-1">%</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label class="col-sm-4 col-md-4 text-align-left" for="timelimit">Time Limit<span aria-hidden="true" class="glyphicon glyphicon-asterisk custom-color icon-custom-size" style="font-size: 12px;"></span></label>
                <div class="col-sm-2 col-md-2 padding-left-right-0"><input class="form-control input-custom" placeholder="" type="text"></div>
                <div class="col-md-2 col-sm-2"><span>minutes</span></div>
                </div>
            </div>
        	<div class="col-md-2">
            <button type="button" class="btn btn-default btn-lg custom-exam-btn"><span> Advanced options </span><img src="images/sky-blue.png" /></button>
        <span>Required fields</span>
        </div>
            <div class="col-md-3 col-md-offset-6 padding-imp-top-25">
            <a class="btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="#">Save & begin entering questions</a>
            </div>
        </form>
            <!--Form ends-->
			</div>
			</div>
		</div>
	</div>
</div>
<!-- End Form Content Part -->

<!-- Include Footer PHP File -->
<?php include 'footer.php'; ?> 
