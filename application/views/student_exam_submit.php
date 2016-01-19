<!-- Start Form Content Part -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40" style="text-align:right;">    
          <a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/student/exam_process/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4);?>/<?php echo $this->uri->segment(5);?>/<?php echo $this->uri->segment(6);?>">Prev</a></div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
            
		    <h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">There are no more question available for this exam</h2>
			</div>
			<!----- Array ( [id] => 8 [question] => what is php [answer] => Array ( [0] => stdClass Object ( [id] => 4 [answer_title] => laguage [correct] => 1 [short_form_response] => 0 ) [1] => stdClass Object ( [id] => 5 [answer_title] => color [correct] => 0 [short_form_response] => 0 ) [2] => stdClass Object ( [id] => 6 [answer_title] => band [correct] => 0 [short_form_response] => 0 ) [3] => stdClass Object ( [id] => 7 [answer_title] => syntax [correct] => 0 [short_form_response] => 0 ) ) ) --------->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
function makeAjaxCall(){
	$.ajax({
		type: "post",
		url: "<?php echo base_url();?>student/save_myanswer",
		cache: false,				
		data: $('#userForm').serialize(),
		success: function(json){						
		try{		
			var obj = jQuery.parseJSON(json);
			alert( obj['STATUS']);	
		}catch(e) {		
			alert('Exception while request..');
		}		
		},
		error: function(){						
			alert('Error while request..');
		}
 });
}
</script> -->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $("p").slideToggle();
    });
}); </script>--> 
<script>function check(){
	if(document.getElementById('chkFinished').checked==false){
	alert("Please select the checkbox to finish the exam");return false;
	}return true;
	}</script>         
			 <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 padding-bottom-15">
          
             <?php //echo "####".count($arr_get_questions);//print_r($arr_get_questions);
			 $attributes = array('class' => 'form-horizontal','onsubmit'=>"return check()");
				 echo form_open('student/exam_submit/'.$this->uri->segment(3).'/'.$this->uri->segment(4),$attributes);	
			 	 ?>
              <p>
                  You have reached the end of the exam. Please ensure any skipped questions are answered. 
                  Unanswered/skipped questions are counted as incorrect.
                  <br>
                  <strong>Once you submit your results, you will not be able to change your answers.</strong>
              </p>
              <p><input type="checkbox" value="1" id="chkFinished"> I have finished the exam.</p>
              
             <input type="submit" id="button" name="submit" value="Finish" class="btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour btn-font-size"/>
                </div>
             
			 <?php echo form_close();?>
          	</div>
        
		</div>
	</div>
</div>
<!-- End Form Content Part -->
