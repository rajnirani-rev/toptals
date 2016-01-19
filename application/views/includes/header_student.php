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
    <link href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/css/custom.css" rel="stylesheet">
     <!-- PLAN PAGE CSS -->
 	<link href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/css/plan-page-css.css" rel="stylesheet">
	<!-- Font Awesome CSS -->    
	<link href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/css/font-awesome.min.css" rel="stylesheet">
	
    <!-- Enlarge Image Slider CSS -->
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/css/lightbox.css">
    
    <!-- Hover Effects on Images in Home Page -->
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/css/ihover.min.css">
	
    <!-- jQuery -->
    <script src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/js/jquery-1.11.2.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/js/bootstrap.min.js"></script>

	<!-- slider javascript -->
	<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/js/jquery.flexisel.js"></script>
    
    <!-- enlarge image slider Javascript -->
    <script src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/js/lightbox.js" type="text/javascript"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Developer Javascript -->
    <script src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/js/developer.js"></script>
</head>

<body>
<?php 
if($this->session->userdata('suser_data')) 
{
$user_logged_rec = $this->session->userdata('suser_data');
$org_name=$user_logged_rec['organization_name'];
$loc=$org_name.".toptals.com";
if($_SERVER['HTTP_HOST']!=$loc)
{
	header("location:http://".$loc);
}


}
?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white border-bottom-left-right-radius">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				<!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>-->
				<a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/"><img class="image-responsive toptals-img-resize" src="<?php echo base_url(); ?>images/tabtol.png" alt="Toptals-png" /></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<?php /*?><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav margin-left-50 sm-margin-left-0 md-margin-left-10">
				<li>
				<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="<?php echo base_url(); ?>">Home</a>
				</li>
				<li>
				<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="<?php echo base_url(); ?>features">Features</a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
				<li><a tabindex="-1" href="features-offers.php">Features-Offered</a></li>
				</ul>
				</li>
				<li>
				<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="<?php echo base_url(); ?>plan">Plans</a>
				</li>
				<li>
				<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="<?php echo base_url(); ?>organization/free_trial">Free Trial</a>
				</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<li><?php if(!empty($user_logged_rec['organization_name'])){?>
					<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="#">Welcome <?php echo $user_logged_rec['organization_name'];?>!</a>
                    <?php }?>
					<?php if(empty($user_logged_rec['organization_name'])){?><a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="#" data-toggle="modal" data-target="#login-modal">Login</a>
					<?php }?>
					<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header login_modal_header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title" id="myModalLabel">
									LogIn
                                    </h3>
								</div>
								<div class="modal-body login-modal">
									<div class="clearfix"></div>
									<div id='social-icons-conatainer'>
                                    
										<?php echo form_open('organization/login_post');	?>
                                        <div class='modal-body-left'>
											<div class="form-group">
												<i class="fa fa-user login-field-icon"></i>
											<!--<input type="text" id="username" placeholder="Enter your name" value="" class="form-control login-field">-->
                                                <?php $data = array('name'  => 'username','id'  => 'inputusername','class'  => 'form-control login-field',
												  'placeholder'   => 'Enter your username');
												  echo form_input($data);?>
											</div>
							
											<div class="form-group">
												<i class="fa fa-lock login-field-icon"></i>
											<!--<input type="password" id="login-pass" placeholder="Password" value="" class="form-control login-field">-->
                                                <?php $data = array('name'  => 'password','id'  => 'inputpassword','class'  => 'form-control login-field',
												  'placeholder'   => 'Password');
												  echo form_input($data);?>
											</div>
							
										  <!--<a href="#" class="btn btn-success modal-login-btn">Login</a>-->
                                          <?php $data = array('name' => 'submit', 'value'=> 'Login','class'  => 'btn btn-success modal-login-btn' );
										  echo form_submit($data);?>
											<a href="#" class="login-link text-center">Lost your password?</a>
										</div>
									    <?php echo form_close();?>
                                    
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
				</li><?php */?>
				
				<ul class="nav navbar-nav navbar-right">
               <?php if(!empty($user_logged_rec['student_first_name'])){?> <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/student/home" class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white">Welcome <?php echo $user_logged_rec['student_first_name'].' '.$user_logged_rec['student_last_name']?></a></li>
               <li> <a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/student/myacc_view">My Account</a></li>
               <li> <a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/student/logout">Logout</a></li><?php }?>
				<li><a href="#" class="login-icon"><span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
				</div><?php //print_r($user_logged_rec);?>
			</div><!-- .col-md-8 .col-md-offset-3 -->
		</div><!-- .row -->
	<!-- /.navbar-collapse -->
	</div>
<!-- /.container -->
</nav>
<!-- Navbar Is finished -->