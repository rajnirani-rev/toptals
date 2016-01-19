<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TopTals</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

	<!-- Font Awesome CSS -->    
	<link href="css/font-awesome.min.css" rel="stylesheet">
	
    <!-- Enlarge Image Slider CSS -->
    <link rel="stylesheet" href="css/lightbox.css">
    
    <!-- Hover Effects on Images in Home Page -->
    <link rel="stylesheet" href="css/ihover.min.css">
    <link rel="stylesheet" href="css/blue.css">
    <link rel="stylesheet" href="css/plan-page-css.css">
	
    <!-- jQuery -->
    <script src="js/jquery-1.11.2.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- slider javascript -->
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
    
    <!-- enlarge image slider Javascript -->
    <script src="js/lightbox.js" type="text/javascript"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Developer Javascript -->
    <script src="js/developer.js"></script>
    <script src="js/jquery.icheck.min.js" type="text/javascript"></script>
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white border-bottom-left-right-radius">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a href="<?php echo base_url(); ?>"><img class="image-responsive toptals-img-resize" src="images/tabtol.png" alt="Toptals-png" /></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav margin-left-50 sm-margin-left-0 md-margin-left-10">
				<li>
				<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="index.php">Home</a>
				</li>
				<li>
				<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="features.php">Features</a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
				<li><a tabindex="-1" href="features-offers.php">Features-Offered</a></li>
				</ul>
				</li>
				<li>
				<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="plans.php">Plans</a>
				</li>
				<li>
				<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="free-trial.php">Free Trial</a>
				</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<li>
					<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="#" data-toggle="modal" data-target="#login-modal">Login</a>
					<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header login_modal_header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h3 class="modal-title" id="myModalLabel">LogIn</h3>
								</div>
								<div class="modal-body login-modal">
									<div class="clearfix"></div>
									<div id='social-icons-conatainer'>
										<div class='modal-body-left'>
											<div class="form-group">
												<i class="fa fa-user login-field-icon"></i>
												<input type="text" id="username" placeholder="Enter your name" value="" class="form-control login-field">
											</div>
							
											<div class="form-group">
												<i class="fa fa-lock login-field-icon"></i>
												<input type="password" id="login-pass" placeholder="Password" value="" class="form-control login-field">
											</div>
							
											<a href="#" class="btn btn-success modal-login-btn">Login</a>
											<a href="#" class="login-link text-center">Lost your password?</a>
										</div>
									
										<div class='modal-body-right'>
											<div class="modal-social-icons">
												<a href='#' class="btn btn-default facebook"> <i class="fa fa-facebook modal-icons"></i> Sign In with Facebook </a>
												<a href='#' class="btn btn-default twitter"> <i class="fa fa-twitter modal-icons"></i> Sign In with Twitter </a>
												<a href='#' class="btn btn-default google"> <i class="fa fa-google-plus modal-icons"></i> Sign In with Google </a>
												<a href='#' class="btn btn-default linkedin"> <i class="fa fa-linkedin modal-icons"></i> Sign In with Linkedin </a>
											</div> 
										</div>	
										<div id='center-line'> OR </div>
									</div>																												
									<div class="clearfix"></div>
								</div>
								<div class="modal-footer login_modal_footer">
								</div>
							</div>
						</div>
					</div>
				</li>
				<li><a href="#" class="login-icon"><span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
				</div>
			</div><!-- .col-md-8 .col-md-offset-3 -->
		</div><!-- .row -->
	<!-- /.navbar-collapse -->
	</div>
<!-- /.container -->
</nav>
<!-- Navbar Is finished -->