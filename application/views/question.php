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
                  <li class="active custom-active-color"><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/exam"><i class="fa fa-file-o fa-icons-custom"></i></a></li>
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
			 <h5 class="pull-left padding-left-right-0  mgmt-col-font"><?php echo $this->session->flashdata('question_created_successfully');?></h5>
            </div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
             <h5 class="pull-left padding-left-right-0  mgmt-col-font"><?php echo $this->session->flashdata('exam_created_successfully');?></h5>
             </div>
             <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<h2 class="pull-left padding-left-right-0  mgmt-col-font">Questions</h2>
			</div>
			<?php /*?><div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 padding-top-40-bottom-15">
				<div class="col-md-3 col-sm-6 col-xs-12 padding-left-right-0">
					<a class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="<?php echo base_url(); ?>organization/add_exam">Add new Exam</a>
				</div>	
			</div><?php */?>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<div class="divider"><hr style="border-color:#000000;"></div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				
             
                <span class="astrik-img col-md-1 col-sm-1 col-xs-2 padding-left-right-0" style="line-height: 3;"><img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/alert-icon.png" /></span>
				<!--<h5 class="create-exam col-md-11 col-sm-10 col-xs-10 padding-left-right-0">NEW! You no longer need to add students before they can sit the exam. Simply email, tweet or Facebook the Student Link to your students which you can find in the <a href="<?php echo base_url(); ?>organization/add_exam" >Exams section.</a></h5>-->
             
             <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
            <script type="application/javascript">
			$(document).ready(
			  function(){$("#add_new_question_info").hide();
				  $("#add_new_question").click(function () {
					  $("#add_new_question_info").show("slow");$(".panel").hide("fast");
				  });
				  
				  
				  $('.my_new_answer').click(function(){ 
					var n = $('.text-box').length + 1;
					if( 5 < n ) {
						alert('Stop it!');
						return false;
					}
					var box_html = $('<div class="text-box"><input type="hidden" name="answerarr[]" value="' + n + '" /><textarea tabindex="2" style="width:100%;height:40px;vertical-align:middle;" name="new-answer' + n + '"></textarea><div class="answer-options"> <input type="checkbox" value="1" name="correct-new' + n + '"> This answer is correct<br><input type="checkbox" value="1" name="shortform-new' + n + '"> This answer requires a short-form response  </div> </div>');
					box_html.hide();
					$('.my_form_for_answer div.text-box:last').after(box_html);
					box_html.fadeIn('slow');
					return false;
				});
				  
				  
			  });
			</script> 
        <?php $get = $this->uri->uri_to_assoc();
								$exam_id=$get['exam_id'];?>
             <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-40 margin-top-bottom-20">
                  <div class="col-md-6 col-sm-12 col-xs-12">
                  <a id="add_new_question" class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="javascript:void();">Add New Question</a>
                  	<h3>Question Pool</h3>
                   <?php //echo "<pre>";print_r($arr_all_questions_from_exam);
				   if(!empty($arr_all_questions_from_exam)){
					 
				   foreach($arr_all_questions_from_exam as $r){
					echo '<div class="flip "><span title="Edit" class="glyphicon-pencil" id="'.$r['id'].'"></span> | <a href="http://'.$_SERVER['HTTP_HOST'].'/organization/delete_question_answer/exam_id/'.$exam_id.'/question_id/'.$r['id'].'" title="Delete"  onclick="return confirm(\'Are you sure you want to delete this question?\');"><span class="glyphicon-minus"></span></a> | '.$r['question_title'].'</div><br>'; 
					// print_r($r['answer']);
				   }}?>
                  </div>
                 <!--for edit part start-->
                 <?php if(!empty($arr_all_questions_from_exam))
				 foreach($arr_all_questions_from_exam as $r){?>
                <div id="panel<?php echo $r['id'];?>" class=" panel col-md-6 col-sm-12 col-xs-12 ">
                 <!--question create section start-->
                          <div id="edit-questionanswer">
                          <form method="post" action="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/answer_edit/exam_id/<?php echo $exam_id;?>" id="frmEditQ" class="my_form_for_answer">
                              <input type="hidden" value="save-question" name="action">
                              <input type="hidden" value="<?php echo $r['id'];?>" name="question_id">
                              <textarea tabindex="1" style="width:100%;height:100px;font-size:13px;" name="question" id="q-text"><?php echo $r['question_title'];?></textarea><?php if($get_exam_weighted_exam==1){?>Points <input type="text" name="marks_assign" value="<?php echo $r['marks_assign'];?>" size="3"/>
                              <?php }else{?><input type="hidden" name="marks_assign" value="1"/><?php }?>
                              <br>
                              <h3>Answers</h3>
                             
                              <?php foreach($r['answer'] as $ans){?>
                              <div class="text-box-edit">
                                     	  <input type="hidden" name="answer_id[]" value="<?php echo $ans->id;?>" />
                                          <textarea tabindex="2" style="width:100%;height:40px;vertical-align:middle;" name="answer-<?php echo $ans->id;?>"><?php echo $ans->answer_title;?></textarea>
                                          <div class="answer-options">
                                          <input type="hidden" value="0" name="correct-<?php echo $ans->id;?>">
                                              <input type="checkbox" value="1" name="correct-<?php echo $ans->id;?>" <?php if($ans->correct==1){echo "checked";}?>> This answer is correct<br>  <input type="hidden" value="0" name="shortform-<?php echo $ans->id;?>">
                                              <input type="checkbox" value="1" name="shortform-<?php echo $ans->id;?>" <?php if($ans->short_form_response==1){echo "checked";}?>> This answer requires a short-form response 
                                          </div>
                                      </div>
                              <?php }?>
                              <div class="buttonContainer">
                              <input type="submit" tabindex="3" value="Update" class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10">
                              </div>
                          </form>
                          </div>
                <!--question create section end-->  
                </div>
                 <?php }?>
                  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
				  <script> 
                  $(document).ready(function(){
                     $(".glyphicon-pencil").click(function(){
						var id=this.id;  
						$(".panel").hide("fast");$("#add_new_question_info").hide("fast");
                          $("#panel"+id).slideToggle("slow");
                      });
                  });
                  </script>
                  
                  <style> 
                  #panel,.panel, .flip {padding: 5px;background-color: #f6dde5;border: solid 1px #c3c3c3; }
				  .glyphicon-pencil{ cursor:pointer;}
                  .panel {display: none; }
                  </style>
                 <!--for edit part end-->
                  
             <div class="col-md-6 col-sm-12 col-xs-12 ">
                  	
                    
                    <div id="add_new_question_info" >
                    <h3>Question</h3>
                          <!--question create section start-->
                          
                          <div id="edit-answers">
                          <form method="post" action="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/question/exam_id/<?php echo $exam_id;?>" id="frmEditQ" class="my_form_for_answer">
                              <input type="hidden" value="save-question" name="action">
                              
                              <input type="hidden" value="<?php echo $exam_id;?>" name="exam_id">
                             
                              <textarea tabindex="1" style="width:100%;height:100px;font-size:13px;" name="question" id="q-text"></textarea>
                              <?php if($get_exam_weighted_exam==1){?>Points  <input type="text" name="marks_assign" value="1" size="3"/>
                              <?php }else{?><input type="hidden" name="marks_assign" value="1"/><?php }?>
                              <br>
                              <h3>Answers</h3>
                              <p style="margin:0;" class="notes">Type each single answer into a 'new answer' box below. Tick the correct answer(s). Hit Save when you're done.</p>
                              <div id="answer-order-success" class="alertBoxGood" style="display:none;">Answer order has been saved</div>
                              <ol id="answer-list"></ol>
                              
                              
                              <div id="new-answers">
                                  <div class="new-answer" id="new-answer-wrapper">
                                     <strong>NEW ANSWER</strong> <span class="notes">(type a single answer here, then press "Add another answer" below)</span>
                                     
                                      <div class="text-box">
                                     	  <input type="hidden" name="answerarr[]" value="1" />
                                          <textarea tabindex="2" style="width:100%;height:40px;vertical-align:middle;" name="new-answer"></textarea>
                                          <div class="answer-options">
                                              <input type="checkbox" value="1" name="correct-new"> This answer is correct<br>
                                              <input type="checkbox" value="1" name="shortform-new"> This answer requires a short-form response 
                                          </div>
                                      </div>
                                 
                                  </div>
                              </div>
                              <div class="buttonContainer">
                              <a class="button add-button my_new_answer" onclick="addQ();return false;" href="#">Add another answer</a>
                              <input type="submit" style="" tabindex="3" value="Save" class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10">
                              </div>
                          </form>
                          </div>
                          <!-------------question create section end----------->
                          
                    </div>
                  </div>
              </div>
               </div>
             
             
			</div>
			</div>
		</div>
	</div>
</div>
<!-- End Form Content Part -->