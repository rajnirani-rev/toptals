<!-- Start Form Content Part -->


<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
			<div class="col-md-12 padding-left-right-0">
                  <!--Admin top menu-->
                  <div class="bs-example">
                  <ul class="nav nav-pills nav-back">
                  <li class="custom-active-color xs-margin-left-0"><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/home"><i class="fa fa-home fa-icons-custom"></i></a></li>
                  <li class="custom-active-color"><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/exam"><i class="fa fa-file-o fa-icons-custom"></i></a></li>
                  <li class="active custom-active-color"><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/student_administration"><i class="fa fa-users fa-icons-custom"></i></a></li>
                  <li class="custom-active-color"><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/report"><i class="fa fa-trophy fa-icons-custom"></i></a></li>
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
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
			<?php echo $this->session->flashdata('exam_created_successfully');?>
            </div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15 mgmt-col-font">Exam Administration</h2>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<div class="col-md-3 col-sm-6 col-xs-12 padding-left-right-0">
					<a class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/add_exam">Add new Exam</a>
				</div>
				
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<div class="divider"><hr style="border-color:#000000;"></div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				
                <?php if(empty($arr_all_exam_from_organization)){?>
                <span class="astrik-img col-md-1 col-sm-1 col-xs-2 padding-left-right-0" style="line-height: 3;"><img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/alert-icon.png" /></span>
				<h5 class="create-exam col-md-11 col-sm-10 col-xs-10 padding-left-right-0">NEW! You no longer need to add students before they can sit the exam. Simply email, tweet or Facebook the Student Link to your students which you can find in the <a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/add_exam" >Exams section.</a></h5>
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
                        </tr><?php 
					  foreach($arr_all_exam_from_organization as $r){
						echo '<tr><td>'.$r->exam_name.' | <a href="http://'.$_SERVER['HTTP_HOST'].'/organization/question/exam_id/'.$r->id.'">Question</a></td><td><input type="text" value="'.$r->exam_link.'"></td><td>'.$r->number_of_question.'</td><td>'.$r->time_limit.' min</td><td>'.$r->created_date.'</td></tr>';  
					  }
					  ?>
                      </table>
                </div>
                </div>
                <?php }//end of table?>
			</div>
			</div>
		</div>
	</div>
</div>
<!-- End Form Content Part -->