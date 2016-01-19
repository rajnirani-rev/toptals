<!-- Start Form Content Part -->
<?php
ob_start();
?>
<div class="admin-background">
    <div class="container padding-top-bottom-80">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
                        <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">

            <?php /*echo '<pre>';
                 print_r($exam_detail);
                        echo '</pre>';*/foreach ($exam_detail as $value) { ?>                        
            <h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black;font-weight:bold;">Exam : 
            <?php echo $value->exam_name;?>
            </h2>
            </div>
            
             <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 padding-bottom-15">
              <div><b>Number Of Question : </b><?php echo $value->number_of_question;?></div>  
              <div><b>Time Limit : </b><?php echo $value->time_limit;?> minutes</div>  <br>


            <!--   <div><b>Student Name : </b><?php echo $value->student_first_name.' '.$value->student_last_name;?></div>  
              <div><b>Student Email : </b><?php echo $value->student_email;?></div> <br> -->
            <?php break; } ?> 

            <?php foreach ($exam_detail as $value) { ?>                        
           <!--  <h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black;font-weight:bold;">Exam : 
            <?php echo $value->exam_name;?>
            </h2> -->
            <!-- </div>
            
             <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 padding-bottom-15">
              <div><b>Number Of Question : </b><?php echo $value->number_of_question;?></div>  
              <div><b>Time Limit : </b><?php echo $value->time_limit;?> minutes</div>   --><br>


              <div><b>Student Name : </b><?php echo $value->student_first_name.' '.$value->student_last_name;?></div>  
              <div><b>Student Email : </b><?php echo $value->student_email;?></div> <br>
            <?php } ?>                        
              <!-- <div>Once you commence the exam you will have 4 minutes to complete it. During that time you may exit the system and return at your leisure. Please note that the timer does not stop if you leave the system.</div> <br>
              <div><a href="http://harish.toptals.com/student/exam_process/14/55/83/0" class="btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour btn-font-size">Start Exam</a></div>
              <div>Note: This will start your exam timer</div> -->
            </div>
                </div>
        </div>
    </div>
</div>
<!-- End Form Content Part -->
