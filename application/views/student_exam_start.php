<!-- Start Form Content Part -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
			<?php foreach($arr_get_exam_detail as $r){?>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
		    <h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black;font-weight:bold;">Exam : <?php echo $r->exam_name;?></h2>
			</div>
			
			 <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 padding-bottom-15">
              <div><b>Number Of Question : </b><?php echo $r->number_of_question;?></div>  
              <div><b>Time Limit : </b><?php echo $r->time_limit.' minutes';?></div>  <br />
              <div><b>Student Name : </b><?php echo $r->student_first_name.' '.$r->student_last_name;?></div>  
              <div><b>Student Email : </b><?php echo $r->student_email;?></div> <br />
              <div>Once you commence the exam you will have <?php echo $r->time_limit;?> minutes to complete it. During that time you may exit the system and return at your leisure. Please note that the timer does not stop if you leave the system.</div> <br />
              <div><a href="http://<?php echo $organization_name;?>.toptals.com/student/exam_process/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php echo $arr_get_first_questions;?>/0" class="btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour btn-font-size">Start Exam</a></div>
              <div>Note: This will start your exam timer</div>
          	</div>
          <?php }?>
		</div>
	</div>
</div>
<!-- End Form Content Part -->