<!-- Include header file -->
<?php include 'menu.php'; ?>
<!-- Ends header -->

<!-- Start Form Content Part -->
<div class="admin-background">
    <div class="container padding-top-bottom-80">
        <div class="row margin-0">
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0">
				<?php include 'inner-page-nav.php'; ?>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15">Import Users</h2>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <h5 class="pull-left padding-left-right-0 text-col-font">Copy and paste user data from Excel &#40;tab separated&#41;.</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <span class="astrik-img col-md-1 col-sm-1 col-xs-3 padding-left-right-0"><img src="images/astrik-sign.png" alt="image"></span>
                <h5 class="pull-left padding-left-right-0 text-col-font col-md-8 col-sm-8 col-xs-8">Select only: Firstname, Lastname, Email, Company Name, CRM ID<br><span style="font-weight: normal;">&#40;CRM ID field optional&#41; columns &#40;remove all other columns&#41;.</span></h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <span class="astrik-img col-md-1 col-sm-1 col-xs-3 padding-left-right-0"><img src="images/astrik-sign.png" alt="image"></span>
                <h5 class="pull-left padding-left-right-0 text-col-font col-md-8 col-sm-8 col-xs-8">MUST BE in that order.</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <span class="astrik-img col-md-1 col-sm-1 col-xs-3 padding-left-right-0"><img src="images/astrik-sign.png" alt="image"></span>
                <h5 class="pull-left padding-left-right-0 text-col-font col-md-8 col-sm-8 col-xs-8">DO NOT include column headings (or any other extraneous data).</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <span class="astrik-img col-md-1 col-sm-1 col-xs-3 padding-left-right-0"><img src="images/astrik-sign.png" alt="image"></span>
                <h5 class="pull-left padding-left-right-0 text-col-font col-md-8 col-sm-8 col-xs-8">Passwords will be automatically assigned.</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <h5 class="pull-left padding-left-right-0 text-col-font">Enrol intro exam</h5>
            </div>
            <form>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
              <div class="dropdown">
              <button class="btn btn-default dropdown-toggle custom-dropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">--Dont enrol--</button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">0459</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">09898</a></li>
              </ul>
            </div>
           </div>
            <div class="col-md-9 col-sm-12 padding-left-right-0 padding-left-right-40" style="display: inline-flex;">
				<div class="demo-list col-md-1 col-sm-1 col-xs-3 padding-left-0"><input type="checkbox" class="chk-box-size"></div>
				<div><h5 class="text-col-font">Send welcome email<br/><span class="text-font-12" style="font-weight: normal;">Send the participant the login URL for the exam, along with their login details &#40;email & password&#41;.Also includes the "Invitation Note" if you have one setup for the selected exam.</span></h5></div>
            </div>
            <div class="col-md-9 col-sm-12 padding-left-right-0 padding-left-right-40" style="display: inline-flex;">
				<div class="demo-list col-md-1 col-sm-1 col-xs-3 padding-left-0"><input type="checkbox" class="chk-box-size"></div>
				<div><h5 class="text-col-font">Enrol duplicates<br/><span class="text-font-12" style="font-weight: normal;">If duplicate &#40;existing email address&#41; contacts are found, enrol them into the selected exam. Leave unticked to ignore duplicate email addresses &#40;recommended&#41;.</span></h5></div>
            </div>
            <div class="col-md-12 col-sm-12 padding-left-right-0 padding-left-right-40">
                <h5 class="pull-left padding-left-right-0 text-col-font">Paste Excel data here<br/><span class="text-font-12" style="font-weight: normal;">Columns Firstname, Lastname, Email, Company Name, CRM ID Optional</span></h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
			  <div class="form-group">
				<textarea class="form-control" rows="7"></textarea>
			  </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 text-align-right">
				<a class="btn btn-outline btn-md text-col-white btn-bg-colour btn-shadow margin-bottom-10 text-font-20" href="#" style="font-weight:bold;">Import</a>
			</div>
            </form>
			</div>
        </div>
    </div>
</div>
<!-- End Form Content Part -->


<!-- Include Footer PHP File -->
<?php include 'footer.php'; ?> 
<!-- Ends Footer File -->