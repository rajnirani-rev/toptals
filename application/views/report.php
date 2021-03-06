<!-- Start Form Content Part --> 
<?php //echo '<pre>';print_r($arr_all_student_exam_report_organization); ?>

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
                  <li class="custom-active-color"><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/student_administration"><i class="fa fa-users fa-icons-custom"></i></a></li>
                 <li class="active custom-active-color"><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/report"><i class="fa fa-trophy fa-icons-custom"></i></a></li>
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
			</div><?php //echo '<pre>';print_r($arr_exam_summary_of_organization);?>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
			<?php echo $this->session->flashdata('exam_created_successfully');?>
            </div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15 mgmt-col-font">Management Report</h2>
			</div>

            <?php /* <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="table-responsive">
                      <table class="table">
						<tr><th>Exam Name</th><th>Session</th><th>Passed</th><th>Failed</th><th>Year</th></tr><?php 
					  foreach($arr_exam_summary_of_organization as $r){
					  echo '<tr><td> <a href="'.base_url().'organization/question/exam_id/'.$r->id.'">'.$r->exam_name.'</a></td><td>'.$r->session_alloted.'</td><td>'.$r->passed.'</td><td>'.$r->failed.'</td><td>'.$r->exam_year.'</td></tr>';  
					  } ?>
                      </table>     
                </div>
                </div> */?>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
              <?php if(empty($arr_exam_summary_of_organization_session)){
                echo "There is no exam attempted by any user";
            } else { ?>
              <div class="col-md-4 col-sm-4 col-xs-4 padding-left-right-0">
                  <div class="table-responsive">
                      <table class="table">
						<tr><th>Exam Name</th><th>Session</th><th>Month</th><th>Year</th></tr><?php 
					  
            
            foreach($arr_exam_summary_of_organization_session as $r){
					  echo '<tr><td> <a href="http://'.$_SERVER['HTTP_HOST'].'/organization/question/exam_id/'.$r->id.'">'.$r->exam_name.'</a></td><td>'.$r->session_done.'</td><td>'.date('F', mktime(0, 0, 0, $r->exam_mnt, 10)).'</td><td>'.$r->exam_year.'</td></tr>';  
					  } ?>
                      </table>     
                  </div>
              </div>
              <div class="col-md-8 col-sm-8 col-xs-8 padding-left-right-0 padding-left-right-40">
              <?php //print_r($arr_exam_summary_of_organization_passfail); ?>
              	  <div class="table-responsive">
                      <table class="table">
						<tr><th>Exam Name</th><th>Passmarks</th><th>Passed</th><th>failed</th><th>Month</th><th>Year</th></tr><?php 
					  foreach($arr_exam_summary_of_organization_passfail as $r){
					  echo '<tr><td> <a href="http://'.$_SERVER["HTTP_HOST"].'/organization/question/exam_id/'.$r->id.'">'.$r->exam_name.'</a></td><td>'.$r->passmarks.'</td><td>'.$r->passed.'</td><td>'.$r->failed.'</td><td>'.date('F', mktime(0, 0, 0, $r->exam_mnt, 10)).'</td><td>'.$r->exam_year.'</td></tr>';  
					  } ?>
                      </table>     
                  </div>
              </div>
           <?php } ?>
           </div> 
            
            
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<div class="divider"><hr style="border-color:#000000;"></div>
                <!--search start-->
                <form id="frmReport" action="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/report" method="get">
				<strong>Exam</strong> <select name="exam_id">
                <option value="">&ndash;&ndash; all exams &ndash;&ndash;</option>
               		<?php foreach($arr_exam as $r){?>
					<option value="<?php echo $r->id;?>"><?php echo $r->exam_name;?></option>
                    <?php } ?>
				</select>
				&nbsp;
				<input type="radio" value="" name="report_type" checked> <label>All</label> &nbsp;
				<input type="radio" value="pass" name="report_type"> <label>Pass</label> &nbsp;
				<input type="radio" value="fail" name="report_type"> <label>Fail</label> &nbsp;
						&nbsp;
						<strong>Date</strong> <select name="date_range"> 
							<option value="">&ndash;&ndash; all dates &ndash;&ndash;</option>
                            <?php foreach($arr_exam_given_dates as $d){?>
							<option value="<?php echo $d->exam_month.'-'.$d->exam_year;?>"><?php echo date('F', mktime(0, 0, 0, $d->exam_month, 10)).' '.$d->exam_year;?></option>
                            <?php }?>
						</select>		
				<input type="submit"  value="Search" class="btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour btn-font-size">
				<a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/export" class="btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour btn-font-size">Export</a>
				</form>
                <!--search end-->
			<div class="divider"><hr style="border-color:#000000;"></div>
            </div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				
                <?php if(empty($arr_all_student_exam_report_organization)){?>
                <span class="astrik-img col-md-1 col-sm-1 col-xs-2 padding-left-right-0" style="line-height: 3;"><img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/alert-icon.png" /></span>
				<h5 class="create-exam col-md-11 col-sm-10 col-xs-10 padding-left-right-0">NEW! You no longer need to add students before they can sit the exam. Simply email, tweet or Facebook the Student Link to your students which you can find in the <a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/add_exam" >Exams section.</a></h5>
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
              
                <?php }//end of table?>
			</div>
			</div>
		</div>
	</div>
</div>
<!-- End Form Content Part -->