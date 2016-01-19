<!--live search start-->
<script type="text/javascript" language="javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/json2.js"></script>
<script>
	$(document).ready(function(){
	  $("#search").keyup(function(){
		if($("#search").val().length>0){document.getElementById('finalResult').style.display='block';
		$.ajax({
			type: "post",
			url: "http://<?php echo $_SERVER['HTTP_HOST'];  ?>/search/index",
			cache: false,				
			data:'search='+$("#search").val(),
			success: function(response){
				$('#finalResult').html("");
				var obj = JSON.parse(response);
				if(obj.length>0){
					try{
						var items=[]; 
						name_title='<b>Student Name</b>';email_title='<b>Email</b>';
							items.push($('<li/>').html(name_title));
							items.push($('<li/>').html(email_title));	
						$.each(obj, function(i,val){	
						name='<a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/edit_student/sid/'+val.id +'">'+val.student_first_name + " " + val.student_last_name+'</a>';												    						
						email='<a href="mailto:'+val.student_email+'">'+val.student_email+'</a>';	
						    items.push($('<li/>').html(name));
							items.push($('<li/>').html(email));
						});	
						$('#finalResult').append.apply($('#finalResult'), items);
					}catch(e) {		
						alert('Exception while request..');
					}		
				}else{
					$('#finalResult').html($('<li/>').text("No Student Found With Search Name!!"));		
				}		
			},
			error: function(){						
				alert('Error while request..');
			}
		});
		}else{document.getElementById('finalResult').style.display='none';}
		return false;
	  });
	});
</script>
<style>

#finalResult li{float:left; width:50%; list-style:none;background:#efefef;padding:5px;}</style>
<!--live search end-->




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
			 <h5 class="pull-left padding-left-right-0  mgmt-col-font"><?php echo $this->session->flashdata('registered_successfully');?>
            <?php echo $this->session->flashdata('updated_successfully');?></h5>
            </div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15 mgmt-col-font">Student Administration</h2>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<div class="col-md-3 col-sm-6 col-xs-12 padding-left-right-0">
					<a class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/add_student">Add new Student</a>
				</div>
				<div class="margin-top-bottom-10 col-md-5 col-sm-10 col-xs-12 padding-left-right-0">
				   
					    <span class="text-font-16 text-font-weight col-md-3 col-sm-2 col-xs-12">Search</span>
					    <input type="text" class="input-medium search-query input-field-css col-md-8 col-sm-8 col-xs-12" placeholder="Enter firstname, surname or email" name="search" id="search"/>
				  
                    			
								<!--<ul id="finalResult"></ul>-->
				</div>
                <div class="margin-top-bottom-10 col-md-4 col-sm-12 col-xs-12 padding-left-right-0">
					<a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/csv/import_student"><span class="text-font-weight" style="text-decoration: underline;">Bulk Import Students</span></a>
					<span class="text-font-weight">&#124;</span>
					<span class="text-font-weight">Currently <?php echo count($arr_all_student_from_organization);?> users</span>
				</div>
			</div>
            
            <ul id="finalResult" class="col-md-6 col-sm-6 col-xs-6 padding-left-right-40">
            </ul>
				
            
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<div class="divider"><hr style="border-color:#000000;"></div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<span class="astrik-img col-md-1 col-sm-1 col-xs-2 padding-left-right-0" style="line-height: 3;"><img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/alert-icon.png" /></span>
				<h5 class="create-exam col-md-11 col-sm-10 col-xs-10 padding-left-right-0">NEW! You no longer need to add students before they can sit the exam. Simply email, tweet or Facebook the Student Link to your students which you can find in the <a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/exam" >Exams section.</a></h5>
                
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <?php if(!empty($arr_all_student_from_organization)){?>
                <div class="table-responsive">
                      <table class="table">
						<tr>
                        	<th>Student</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Added</th>
                        </tr><?php 
					  foreach($arr_all_student_from_organization as $r){
						echo '<tr><td><a href="http://'.$_SERVER['HTTP_HOST'].'/organization/edit_student/sid/'.$r->id.'">'.$r->student_first_name.' '.$r->student_last_name.'</a></td><td>'.$r->student_email.'</td><td>'.$r->company_name.'</td><td>'.$r->created_date.'</td></tr>';  
					  }
					  ?>
                      </table>
                </div>
                <?php }?>
                </div>
			</div>
			</div>
		</div>
	</div>
</div>
<!-- End Form Content Part -->