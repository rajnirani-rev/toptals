<!-- Start Header of the Page -->
<?php include 'menu.php'; ?>
<!-- Ends Header of the page -->

<!-- Start content of the Page -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
    	<div class="row margin-0">
        	<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
        	<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0">
            	<!--Admin top menu-->
                <div class="bs-example">
                <ul class="nav nav-pills nav-back">
                <li class="custom-active-color xs-margin-left-0"><a href="#"><i class="fa fa-home fa-icons-custom"></i></a></li>
                <li class="custom-active-color"><a href="#"><i class="fa fa-file-o fa-icons-custom"></i></a></li>
                <li class="custom-active-color"><a href="#"><i class="fa fa-users fa-icons-custom"></i></a></li>
                <li class="active custom-active-color"><a href="#"><i class="fa fa-trophy fa-icons-custom"></i></a></li>
                <li class="pull-right">
                <ul class="right-menu">
                <li><a href="#"><span class="text-col-white"> school 114 </span></a><span style="padding-left:2px;">|</span></li> 
                <li><a href="#"><span class="text-col-white"> Administrators</span></a><span style="padding-left:2px;">|</span></li>
                <li><a href="#"><span class="text-col-white"> 10 sessions remaining - purchase more</span></a><span style="padding-left:2px;">|</span></li>
                <li><a href="#"><span class="text-col-white"> Email Support</span></a></li>
                </ul>
                </li>
                </ul>
                </div>
                <!--Admin top menu ends-->
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
            	<h2 class="pull-left padding-top-40-bottom-15 mgmt-col-font">Management Report</h2>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
            	<div class="col-md-2 col-sm-4 col-xs-12 padding-left-0 xs-margin-bottom-10">
                	<div class="mgmt-btn-col-styl text-center col-md-12 txt-line-height">Income</div>
                   	<div class="table-responsive col-md-12 text-center">
						<table class="table">none</table>
					</div>
                </div>
            	<div class="col-md-2 col-sm-4 col-xs-12 padding-left-0 xs-margin-bottom-10">
                	<div class="mgmt-btn-col-styl text-center col-md-12 txt-line-height">Income</div>
                    <div class="text-center col-md-12"><em>none</em></div>
                </div>
            	<div class="col-md-2 col-sm-4 col-xs-12 padding-left-0 xs-margin-bottom-10">
                	<div class="mgmt-btn-col-styl text-center col-md-12 txt-line-height">Income</div>
                    <div class="text-center col-md-12"><em>none</em></div>
                </div>
            	<div class="col-md-2 col-sm-4 col-xs-12 padding-left-0 xs-margin-bottom-10">
                	<div class="mgmt-btn-col-styl text-center col-md-12 txt-line-height">Income</div>
                    <div class="text-center col-md-12"><em>none</em></div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
            	<h4 class="margin-top-bottom-10" style="color: #000; font-size:16px; font-weight: bold;">Custom Report</h4>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40" style="display: inline-block;">
            	<span class="mgmt-col-font margin-top-bottom-2 mgmt-line-height col-md-1 col-sm-2 col-xs-2 padding-left-0">Exam</span>
                <span class="padding-left-right-0 mgmt-line-height col-md-2 col-sm-3 col-xs-12 lg-sm-xs-margin-top-bottom-7">
                    <span class="dropdown">
                    <button class="btn btn-default dropdown-toggle custom-dropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">-all exams-</button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Pass</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Fail</a></li>
                    </ul>
                    </span>
                </span>
                <span class="padding-left-right-0 margin-top-bottom-2 mgmt-line-height col-md-3 col-sm-6 col-xs-12 lg-sm-xs-margin-top-bottom-7">
                    <label class="checkbox-inline padding-left-right-0" class="col-sm-1 text-align-left">
                    <input type="radio" id="all" name="radio" value="all" style="background-color: #00d3ff !important; color: #fff; ">ALL
                    </label>
                    <label class="checkbox-inline padding-left-right-0" class="col-sm-1 text-align-left">
                    <input type="radio" id="pass" name="radio" value="pass">PASS
                    </label>
                    <label class="checkbox-inline padding-left-right-0" class="col-sm-1 text-align-left">
                    <input type="radio" id="fail" name="radio" value="fail">FAIL
                    </label>
                </span>
                <span class="margin-right-15 col-md-4 col-sm-6 col-xs-12 lg-sm-xs-margin-top-bottom-7">
                    <a class="btn btn-outline btn-md mgmt-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="#" style="font-weight:bold;">Export</a>
                    <a class="btn btn-outline btn-md mgmt-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="#" style="font-weight:bold;">Search</a>
                </span>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40 margin-bottom-30">
				<span style="font-size:12px; color: #000;">Nothing to report</span>
            </div>
        </div>
    </div>
</div>

<!-- Ends content of the Page -->

<!-- Start Footer of the Page -->
<?php include 'footer.php'; ?>
<!-- Ends Footer of the Page -->