<!-- Include header file -->
<?php include 'menu.php'; ?>

<!-- Start Form Content Part -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
                <div class="col-md-12 padding-left-right-0">
                    <!--Admin top menu-->
                    <div class="bs-example">
                    <ul class="nav nav-pills nav-back text-center">
                    <li class="custom-active-color xs-margin-left-0"><a href="#"><i class="fa fa-home fa-icons-custom"></i></a></li>
                    <li class="custom-active-color"><a href="#"><i class="fa fa-file-o fa-icons-custom"></i></a></li>
                    <li class="active custom-active-color"><a href="#"><i class="fa fa-users fa-icons-custom"></i></a></li>
                    <li class="custom-active-color"><a href="#"><i class="fa fa-trophy fa-icons-custom"></i></a></li>
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
                     <h2 class="pull-left mgmt-col-font padding-top-40-bottom-15">Create a new Administrator</h2>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label text-align-left">Name</label>
                    <div class="col-md-4 col-sm-5 col-xs-12 xs-margin-bottom-15">
                      <input type="text" class="form-control" id="firstName" placeholder="First Name">
                    </div>
                    <div class="col-md-4 col-sm-5 col-xs-12 xs-margin-bottom-15">
                      <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label text-align-left">Email</label>
                    <div class="col-md-4 col-sm-5 col-xs-12">
                      <input type="email" class="form-control" id="inputPassword3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label text-align-left">Password</label>
                    <div class=" col-md-4 col-sm-5 col-xs-12 xs-margin-bottom-15">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                    <div class=" col-md-4 col-sm-5 col-xs-12 xs-margin-bottom-15">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
		                <a class="btn btn-outline btn-lg btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="#">Save</a>
                    </div>
                  </div>
                </form>
                </div>
			</div>
		</div>
	</div>
</div>
<!-- End Form Content Part -->

<!-- Include Footer PHP File -->
<?php include 'footer.php'; ?>