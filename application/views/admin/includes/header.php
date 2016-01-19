<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TopTals</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">

	<!-- Font Awesome CSS -->    
	<link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet">
	
    <!-- Enlarge Image Slider CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.css">
    
    <!-- Hover Effects on Images in Home Page -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ihover.min.css">
	
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>js/jquery-1.11.2.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

	<!-- slider javascript -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.flexisel.js"></script>
    
    <!-- enlarge image slider Javascript -->
    <script src="<?php echo base_url(); ?>js/lightbox.js" type="text/javascript"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Developer Javascript -->
    <script src="<?php echo base_url(); ?>js/developer.js"></script>
</head>

<body>
<?php 
if($this->session->userdata('user_data')) {
$user_logged_rec = $this->session->userdata('user_data');					
}
?>
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
				<a href="<?php echo base_url(); ?>"><img class="image-responsive toptals-img-resize" src="<?php echo base_url(); ?>images/tabtol.png" alt="Toptals-png" /></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
				<ul class="nav navbar-nav navbar-right">
				<?php if(!empty($user_logged_rec['admin_id'])){?> <li><a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="<?php echo base_url(); ?>admin/logout">LogOut</a></li>
				<li><a href="#" class="login-icon"><span class="glyphicon glyphicon-user"></span></a></li>
               <?php }?>
				
				</ul>
				</div>
			</div><!-- .col-md-8 .col-md-offset-3 -->
		</div><!-- .row -->
	<!-- /.navbar-collapse -->
	</div>
<!-- /.container -->
</nav>
<!-- Navbar Is finished -->