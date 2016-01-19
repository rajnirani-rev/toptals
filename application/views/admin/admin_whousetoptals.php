<!-- Start Form Content Part -->
<div class="admin-background">
    <div class="container padding-top-bottom-80">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 bg-col-white padding-left-right-0">
             <?php $this->load->view('admin/includes/menu'); ?>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
             <?php echo $this->session->flashdata('registered_successfully');?>
                <h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Who Use Toptals</h2>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="margin-left-right-10">
                    <a class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="<?php echo base_url(); ?>admin/add_logo">Add new logo</a>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="divider"><hr style="border-color:#000000;"></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 margin-bottom-30">
               <!--  <span style="margin-right:2px;"><img src="<?php echo base_url(); ?>images/alert-icon.png" /></span>
                <span class="create-exam">No exam have been created.<a href="#" style="text-decoration: underline;">Click here to create your first one.</a></span> -->
                 <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="table-responsive">
                      <table class="table">
            <tr>
                            <th>Logo</th>
                            <th>Action</th>                            
                        </tr><?php
                        
                       foreach($arr_all_image as $r){
                          
                        echo '<tr><td><img width="150" src="'.base_url().'upload/'.$r->logo_name.'" /></td><td><a href="'.base_url().'admin/image_delete/'.$r->logo_id.'">Delete</a></td></tr>';  
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
