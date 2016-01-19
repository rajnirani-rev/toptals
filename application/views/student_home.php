<!-- Start Form Content Part -->
<div class="admin-background">
	<div class="container padding-top-bottom-80">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0">
			
			<div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
				<h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Student Dashboard</h2>
               
			</div>
			
			 <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 padding-bottom-15">
              <?php echo $this->session->flashdata('message');?>
                <div class="table-responsive">
                      <table class="table">
						<tr>
                        	<th>Session#</th>
                            <th>Exam</th>
                            <th>Result(%)</th>
                            
                        </tr><?php

                        
					  foreach($arr_get_assign_exam_student as $r){
					  /*echo '<tr><td>#'.$r->id.'</td><td><a href="'.base_url().'student/exam_start/'.$r->id.'/'.$r->exam_id.'">'.$r->exam_name.'</a></td><td>'.($r->marks_got==''?'':round($r->marks_got,2)).'</td></tr>';*/ 
					  echo '<tr><td>#'.$r->id.'</td><td><a href="http://'.$organization_name.'.toptals.com/student/exam_start/'.$r->id.'/'.$r->exam_id.'">'.$r->exam_name.'</a></td><td>'.($r->marks_got==''?'':round($r->marks_got,2)).'</td></tr>'; 
					  }
					  ?>
                      </table>
                </div>
          </div>
          
		</div>
	</div>
</div>
<!-- End Form Content Part -->
