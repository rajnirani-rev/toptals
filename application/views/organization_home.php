<!-- Start Form Content Part -->
<?php
ob_start();

if(isset($_GET['del']))
{
  $exid=$_GET['del'];
  $sql = "Delete from exam where id='$exid'";
  $this->db->query($sql);
echo"<script>window.location='http://".$_SERVER['HTTP_HOST']."/organization/home';</script>
";
}



?>
<div class="admin-background">
    <div class="container padding-top-bottom-80">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 bg-col-white padding-left-right-0">
            <div class="col-md-12 padding-left-right-0">
                  <!--Admin top menu-->
                  <div class="bs-example">
                  <ul class="nav nav-pills nav-back">
                  <li class="active custom-active-color xs-margin-left-0"><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/home"><i class="fa fa-home fa-icons-custom"></i></a></li>
                  <li class="custom-active-color"><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/exam"><i class="fa fa-file-o fa-icons-custom"></i></a></li>
                  <li class="custom-active-color"><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/student_administration"><i class="fa fa-users fa-icons-custom"></i></a></li>
                  <li class="custom-active-color"><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/report"><i class="fa fa-trophy fa-icons-custom"></i></a></li>
                  <li class="pull-right text-center">
                  <ul class="right-menu">
                  <li><a href="#"><span style="color:white;"><?php echo $organization_owner_name;?> </span></a><span style="padding-left:2px;">|</span></li> 
                  <li><a href="#"><span style="color:white;"> <?php echo $organization_name;?> Administrators</span></a><span style="padding-left:2px;">|</span></li>
                  <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/plan"><span style="color:white;"> <?php echo $remaining_session;?> sessions remaining - purchase more</span></a><span style="padding-left:2px;">|</span></li>
                  <li><a href="mailto:hello@toptals.com"><span style="color:white;"> Email Support</span></a></li>
                  </ul>
                  </li>
                  </ul>
                  </div>
                  <!--Admin top menu ends-->
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
            <?php echo $this->session->flashdata('exam_created_successfully');?>
                <h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Exams</h2>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="margin-left-right-10">
                    <a class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/add_exam">Add new exam</a>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="divider"><hr style="border-color:#000000;"></div>
            </div>
            <!--adding exam list start-->
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 ">
				
                <?php if(empty($arr_all_exam_from_organization)){?>
                <span class="astrik-img col-md-1 col-sm-1 col-xs-2 padding-left-right-0" style="line-height: 3;"><img src="<?php echo base_url(); ?>images/alert-icon.png" /></span>
				<h5 class="create-exam col-md-11 col-sm-10 col-xs-10 padding-left-right-0">NEW! You no longer need to add students before they can sit the exam. Simply email, tweet or Facebook the Student Link to your students which you can find in the <a href="<?php echo base_url(); ?>organization/add_exam" >Exams section.</a></h5>
                <?php }else{?>
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="table-responsive">
                      <table class="table">
						<tr>
                        	<th>Exam Name</th>
                            <th>Exam Link</th>
                            <th># Questions</th>
                            <th>Time Limit</th>
                             <th>Created</th>
                             <th></th>
                        </tr><?php 
                        

					  foreach($arr_all_exam_from_organization as $r){
						echo '<tr><td><a href="http://'.$_SERVER['HTTP_HOST'].'/organization/edit_exam/exam_id/'.$r->id.'">'.$r->exam_name.'</a> | <a href="http://'.$_SERVER['HTTP_HOST'].'/organization/question/exam_id/'.$r->id.'">Question</a></td><td><a href="http://'.$_SERVER['HTTP_HOST'].'/organization/view_exam/exam_id/'.$r->id.'">View</a></td><td>'.$r->number_of_question.'</td><td>'.$r->time_limit.' min</td><td>'.$r->created_date.'</td><td><a href="?del='.$r->id.'">Delete</a></td></tr>';  
					  }
					  ?>
                      </table>
                </div>
                </div>
                <?php }//end of table?>
			</div>
            <!--adding exam list end here-->
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Students</h2>
            </div>
            <!--student list start-->
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				
                <?php if(empty($arr_all_student_exam_report_organization)){?>
                <span class="astrik-img col-md-1 col-sm-1 col-xs-2 padding-left-right-0" style="line-height: 3;"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST']; ?>/images/alert-icon.png" /></span>
				<h5 class="create-exam col-md-11 col-sm-10 col-xs-10 padding-left-right-0">NEW! You no longer need to add students before they can sit the exam. Simply email, tweet or Facebook the Student Link to your students which you can find in the <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST']; ?>/organization/add_exam" >Exams section.</a></h5>
                <?php }else{?>
               
                <div class="table-responsive">
                      <table class="table">
						<tr>
                        	<th>Student Name</th>
                            <th>Email</th>
                            <th>Exam Name</th>
                            <th>Marks</th>
                             <th>Completed Date</th>
                        </tr><?php 
					  foreach($arr_all_student_exam_report_organization as $r){
						echo '<tr><td>'.$r->student_first_name.' '.$r->student_last_name.'</td><td>'.$r->student_email.'</td><td> <a href="http://'.$_SERVER['HTTP_HOST'].'/organization/question/exam_id/'.$r->id.'">'.$r->exam_name.'</a></td><td>'.$r->marks_got.'% </td><td>'.$r->exam_date.'</td></tr>';  
					  }
					  ?>
                      </table>     
                </div>
              
                <?php } //end of table ?>
			</div>
            <!--student list ends-->
            
           <!-- <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 margin-bottom-30">
                <span style="margin-right:2px;"><img src="<?php echo base_url(); ?>images/alert-icon.png" /></span>
                <span class="create-exam">No exam have been created.<a href="#" style="text-decoration: underline;">Click here to create your first one.</a></span>
            </div>-->
            </div>
        </div>
    </div>
</div>
<!-- End Form Content Part -->
