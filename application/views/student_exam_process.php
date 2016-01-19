<?php
if($this->session->userdata('target_timelimit')){
	$sess = $this->session->userdata("target_timelimit");
	$targetDate = $sess['book_id'];
	}
/*session_start();
if (isset($_SESSION['target_timelimit'])) {
    // session variable_exists, use that
    $targetDate = $_SESSION['target_timelimit'];
	$sess = $this->session->userdata("target_timelimit");
}*/ else {
    // No session variable, red from mysql
    $result=mysql_query("select * from exam where id='".$exam_id."'");
	
    $time=mysql_fetch_array($result);
    $dateFormat = "d F Y -- g:i a";
    $targetDate = time() + ($time['time_limit']*60);
   // $_SESSION['target_timelimit'] = $targetDate;
	
	$session_data = $this->session->userdata('target_timelimit');
	$session_data['book_id'] = $targetDate;
	$this->session->set_userdata("target_timelimit", $session_data);
}


//session_destroy();
$actualDate = time();
$secondsDiff = $targetDate - $actualDate;
$remainingDay     = floor($secondsDiff/60/60/24);
$remainingHour    = floor(($secondsDiff-($remainingDay*60*60*24))/60/60);
$remainingMinutes = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))/60);
$remainingSeconds = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))-($remainingMinutes*60));
//$actualDateDisplay = date($dateFormat,$actualDate);
//$targetDateDisplay = date($dateFormat,$targetDate);

?>


<style>.container a{color:#e95364;}</style>
<!-- Start Form Content Part -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
			<div id="remain" class=" padding-left-right-40"><?php echo "$remainingHour hours, $remainingMinutes minutes, $remainingSeconds seconds";?></div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
		    <!--<h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Exam : <?php //echo $r->exam_name;?></h2>-->
			</div>
			 <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40" style="text-align:right;"><?php echo $prv;?> | <?php echo $next;?></div>       
			 <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 padding-bottom-15">
             <?php //echo $if_answer_given;//echo "####".count($arr_get_questions);//print_r($arr_get_questions);
			 $attributes = array('class' => 'form-horizontal');
				 echo form_open('student/exam_process/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6),$attributes);	
			 	 foreach($arr_get_questions as $arr_get_question){
				 echo "<div id='div".$arr_get_question['id']."'><b>Question : ".$arr_get_question['question']."</b>";
				 echo "<input type='hidden' name='marks_assign' value='".$arr_get_question['marks_assign']."'>";
				 foreach ($arr_get_question['answer'] as $a){
					 if($if_answer_given==$a->id){$ch="checked";}else{$ch="";}
					echo '<hr><input type="radio" name="answer" value="'.$a->id.'" '.$ch.'>  '.$a->answer_title;
					if($a->correct!=0){$correct=$a->id;}
					if($a->short_form_response!=0){echo '<br><br>Short Description <input type="text" name="short_form_response" value="" class="form-control login-field">';}?>
              <?php }echo '<input type="hidden" name="correct_answer_id" value="'.$correct.'">
			  <input type="hidden" name="question_id" value="'.$arr_get_question['id'].'">
			  <input type="hidden" name="student_id" value="'.$student_id.'">
			   <input type="hidden" name="if_answer_given" value="'.$if_answer_given_id.'"><hr>';?>
             <input type="submit" id="button" name="submit" value="Submit Answer" class="btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour btn-font-size" onclick="javascript:abc();"/>
             
             <a href="http://<?php echo $organization_name.'.toptals.com/student/exam_get_next_question/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.($this->uri->segment(6)+1);?>">Skip</a>
                </div>
             <?php }?>
			 <?php echo form_close();?>
          	</div>
        <!-------question review start--------> 
        <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
		    <h3 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Question Review</h3>
		</div>
        <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
        <?php 
		foreach($all_question as $q){
			echo $q;	
		}?>
        </div>
        <!-------question review end-------->
		</div>
	</div>
</div>
<!-- End Form Content Part -->
<script type="text/javascript">
 var days = <?php echo $remainingDay; ?>  
var hours = <?php echo $remainingHour; ?>  
var minutes = <?php echo $remainingMinutes; ?>  
var seconds = <?php echo $remainingSeconds; ?> 
  function setCountDown ()
	{
	 seconds--;
	 if (seconds < 0){
		minutes--;
		seconds = 59
	 }
	 if (minutes < 0){
		 hours--;
		 minutes = 59
	 }
	  if (hours < 0){
	  hours = 23
	 }
	  document.getElementById("remain").innerHTML = "  "+hours+" hr  "+minutes+" min  "+seconds+" sec";
	  SD=window.setTimeout( "setCountDown()", 1000 );
	  if (minutes == '00' && seconds == '00') { seconds = "00"; window.clearTimeout(SD);
		window.location = "http://<?php echo $_SERVER['HTTP_HOST'];  ?>/student/timeout_exam_submit/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>"
	} 
  }
  window.onLoad = setCountDown()
 </script>