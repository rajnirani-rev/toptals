<!-- Include header file -->
<?php include 'menu.php'; ?>

<!-- Start Form Content Part -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row margin-0">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
			<div class="col-md-12 padding-left-right-0">
            	<?php include 'inner-page-nav.php'; ?>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Student Administration</h2>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 padding-bottom-15">
				<h5 class="pull-left padding-left-right-0" style="color:black; font-weight:bold;">Add New Student</h5>
			</div>
			<div class="col-md-12 col-sm-12 padding-left-right-0 padding-left-right-40">
				<form class="form-horizontal">
				  <div class="form-group">
					<label for="fullName" class="col-md-2 col-sm-3 col-xs-12 control-label" style="text-align: left;">Name<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class=" col-md-2 col-sm-3 col-xs-12 xs-margin-bottom-10">
					  <input type="text" class="form-control input-field-css" id="fName">
					</div>
					<div class="col-md-2 col-sm-3 col-xs-12">
					  <input type="text" class="form-control input-field-css" id="lName">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputEmail3" class="col-md-2 col-sm-3 control-label" style="text-align: left;">Email<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class="col-md-3 col-sm-5">
					  <input type="email" class="form-control input-field-css" id="inputEmail3">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="col-md-2 col-sm-3 control-label" style="text-align: left;">Password<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class="col-md-3 col-sm-5">
					  <input type="password" class="form-control input-field-css" id="inputPassword3">
					</div>
				  </div>
				  <div class="form-group">
					<label for="company" class="col-md-2 col-sm-3 control-label" style="text-align: left;">Company<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class="col-md-3 col-sm-5">
					  <input type="text" class="form-control input-field-css" id="company">
					</div>
				  </div>
				  <div class="form-group">
					<label for="crmId" class="col-md-2 col-sm-3 control-label" style="text-align: left;">CRM ID<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label>
					<div class="col-md-6 col-sm-5">
					  <input type="text" class="form-control input-field-css" id="crmId" style="width: 35%;">
					  <span>OPTIONAL Used for integration into your CRM system</span>
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-md-12 col-sm-5">
                    <a class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="#">Save</a>
					</div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Form Content Part -->

<!-- Include Footer PHP File -->
<?php include 'footer.php'; ?> 
<!--header starts-->