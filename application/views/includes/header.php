<?php

$string = $_SERVER['HTTP_HOST'];
$toptal_pos = strpos($string,'toptals');
if($toptal_pos>0){
 $first_dot = strpos($string,'.');
 $subdomain = substr($string,0,$first_dot);
 
$query = mysql_query("SELECT * FROM `organization` WHERE `subdomain`='$subdomain'");



$result_query = mysql_num_rows($query);

if($result_query==0)
{
	header('location:http://toptals.com/404');
}


}

?>
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
	<!-- Blue CSS -->    
	<link href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/css/blue.css" rel="stylesheet">
	
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
    <!-- Contact us Page Map Javascript -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="js/developer.js"></script>
    <script src="js/jquery.icheck.min.js" type="text/javascript"></script>
    <script type="text/javascript">
	 jQuery(document).resize(function () {
	  var screen = $(window)    
	   if (screen.width <= 768) {
		$(".prize-list").css({width:47% !important}); 
	  }
	 });
	</script>
	
</head>

<body>
<?php 
if($this->session->userdata('user_data')) {
$user_logged_rec = $this->session->userdata('user_data');
$org_name=$user_logged_rec['subdomain'];
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
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/"><img class="image-responsive toptals-img-resize" src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/tabtol.png" alt="Toptals-png" /></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav sm-margin-left-0 md-margin-left-10">
				<li>
				<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/">Home </a>
				</li>
				<li>
				<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/features">Features</a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
				<li><a tabindex="-1" href="features-offers.php">Features-Offered</a></li>
				</ul>
				</li>
				<li>
				<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/plan">Plans</a>
				</li>
				<li>
				<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/free_trial">Free Trial</a>
				</li>
				<li>
				<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/aboutus">About us</a>
				</li>
				<li>
				<a class="nav-text-color text-font-16 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/contact">Contact</a>
				</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<li><?php if(!empty($user_logged_rec['organization_name'])){?>
					<a class="nav-text-color text-font-12 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/home">Welcome <?php echo ucfirst($user_logged_rec['organization_username']);?>!</a>
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
												  'placeholder'   => 'Enter organization username');
												  echo form_input($data);?>
											</div>
							
											<div class="form-group">
												<i class="fa fa-lock login-field-icon"></i>
											<!--<input type="password" id="login-pass" placeholder="Password" value="" class="form-control login-field">-->
                                                <?php $data = array('name'  => 'password','id'  => 'inputpassword','class'  => 'form-control login-field',
												  'placeholder'   => 'Password', 'type'=>'password');
												  echo form_input($data);?>
											</div>
							
										  <!--<a href="#" class="btn btn-success modal-login-btn">Login</a>-->
                                          <?php $data = array('name' => 'submit', 'value'=> 'Organization Login','class'  => 'btn btn-success modal-login-btn' );
										  echo form_submit($data);?>
											<a href="<?php echo base_url();?>forgotpassword" class="login-link text-center">Lost your password?</a>
										</div>
									    <?php echo form_close();?>
                                    
										<div class='modal-body-right'>
											<div class="modal-social-icons">
                                      <!--<a href='#' class="btn btn-default facebook"> <i class="fa fa-facebook modal-icons"></i> Sign In with Facebook </a>
                                      <a href='#' class="btn btn-default twitter"> <i class="fa fa-twitter modal-icons"></i> Sign In with Twitter </a>
                                      <a href='#' class="btn btn-default google"> <i class="fa fa-google-plus modal-icons"></i> Sign In with Google </a>
                                      <a href='#' class="btn btn-default linkedin"> <i class="fa fa-linkedin modal-icons"></i> Sign In with Linkedin </a>-->
                                      <!--student logn start-->
                                            	  <?php $attributes = array('class' => 'form-horizontal');
      echo form_open('student/login_post',$attributes);	?>
                  <div class='form-group'>
                      <div class="form-group">
                          <i class="fa fa-user login-field-icon"></i>
                      
                          <?php $data = array('name'  => 'username','id'  => 'inputusername','class'  => 'form-control login-field',
                            'placeholder'   => 'Enter student email-id');
                            echo form_input($data);?>
                      </div>
      
                      <div class="form-group">
                          <i class="fa fa-lock login-field-icon"></i>
                     
                          <?php $data = array('name'  => 'password','id'  => 'inputpassword','class'  => 'form-control login-field',
                            'placeholder'   => 'Password', 'type'=>'password');
                            echo form_input($data);?>
                      </div>
      
                    <?php $data = array('name' => 'submit', 'value'=> 'Student Login','class'  => 'btn btn-success modal-login-btn' );
                    echo form_submit($data);?>

                    <a href="<?php echo base_url();?>forgotpass" class="login-link text-center">Lost your password?</a>
                    
                  </div>
           <?php echo form_close();?><?php //echo $this->session->flashdata('message');?> 
                                            <!--student login end-->
                                            
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
               <?php if(!empty($user_logged_rec['organization_name'])){?> <li><a class="nav-text-color text-font-12 sm-nav-text-font-13 sm-nav-padding-10 border-bottom-white" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/logout">Logout</a></li>
			 <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/home" class="login-icon"><span class="glyphicon glyphicon-user"></span></a></li><?php }else{?>
				<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/home" class="login-icon"><span class="glyphicon glyphicon-user"></span></a></li><?php }?>
				</ul>
				</div>
			</div><!-- .col-md-8 .col-md-offset-3 -->
		</div><!-- .row --><?php //echo $this->session->flashdata('message');?> 
	<!-- /.navbar-collapse -->
	</div>
<!-- /.container -->
</nav>
<!-- Navbar Is finished -->  