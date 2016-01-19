<!-- Start Form Content Part -->
<div class="admin-background">
    <div class="container padding-top-bottom-80">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 bg-col-white padding-left-right-0">
             <?php $this->load->view('admin/includes/menu'); ?>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
             <?php echo $this->session->flashdata('registered_successfully');?>
                <h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Features</h2>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="margin-left-right-10">
                    <a class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="<?php echo base_url(); ?>admin/add_features">Add new Features</a>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="divider"><hr style="border-color:#000000;"></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 margin-bottom-30">
                <span style="margin-right:2px;"><img src="<?php echo base_url(); ?>images/alert-icon.png" /></span>
                <span class="create-exam">Only 8 Plans will shown in Frontend. In case of any change you may delete existing plan and create a new one.</a></span>
                 <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="table-responsive">
                      <table class="table">
            <tr>
                            <th>Title</th>
                            <th>Summary</th>
                            <th>Date</th>
                            <th>Action</th>                            
                        </tr><?php

                       foreach($arr_all_plans as $r){
                          
                        echo '<tr><td>'.$r->features_title.'</td><td>'.$r->features_summary.'</td><td>'.$r->date_added.'</td><td><a href="'.base_url().'admin/features_delete/'.$r->features_id.'">Delete</a></td></tr>';  
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
