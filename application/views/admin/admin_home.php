<!-- Start Form Content Part -->
<div class="admin-background">
    <div class="container padding-top-bottom-80">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 bg-col-white padding-left-right-0">
            <?php $this->load->view('admin/includes/menu'); ?>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
             <?php echo $this->session->flashdata('plan_successfully');?>
                <h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Plans</h2>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="margin-left-right-10">
                    <a class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="<?php echo base_url(); ?>admin/add_plans">Add new plan</a>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="divider"><hr style="border-color:#000000;"></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 margin-bottom-30">
                <span style="margin-right:2px;"><img src="<?php echo base_url(); ?>images/alert-icon.png" /></span>
                <span class="create-exam">Only 4 Plans will shown in Frontend. In case of any change you may delete existing plan and create a new one.</span>
                 <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="table-responsive">
                      <table class="table">
            <tr>
                            <th>Plan Title</th>
                            <th>Summary</th>
                            <th>Amount</th>
                            <th>Number of test</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>                            
                        </tr><?php
                       foreach($arr_all_plans as $r){
                          if($r->plan_status == 1){
                            $plan = 'Active';
                          }else{
                            $plan = 'Deactive';
                          }
                        echo '<tr><td>'.$r->plan_title.'</td><td>'.$r->plan_summary.'</td><td>'.$r->plan_amount.'</td><td>'.$r->no_of_test.'</td><td>'.$plan.'</td><td>'.$r->date_added.'</td><td><a href="'.base_url().'admin/plan_delete/'.$r->plan_id.'">Delete</a></td></tr>';  
                        }
                     
                        ?>
                      </table>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- End Form Content Part -->
