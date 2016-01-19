<!-- Start Form Content Part -->
<div class="admin-background">
    <div class="container padding-top-bottom-80">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 bg-col-white padding-left-right-0">
             <?php $this->load->view('admin/includes/menu'); ?>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
             <?php echo $this->session->flashdata('registered_successfully');?>
                <h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Organization</h2>
            </div>
            
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="divider"><hr style="border-color:#000000;"></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 margin-bottom-30">
                <span style="margin-right:2px;"><img src="<?php echo base_url(); ?>images/alert-icon.png" /></span>
                <!--<span class="create-exam">No exam have been created.<a href="#" style="text-decoration: underline;">Click here to create your first one.</a></span>-->
                 <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="table-responsive">
                      <table class="table">
            <tr>
                            <th>organization Name</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Domain</th>
                            <th>Date</th>
                            <th>Action</th>                            
                        </tr><?php
                       foreach($arr_all_organization as $r){  
                        echo '<tr><td>'.$r->organization_name.'</td><td>'.$r->owner_email.'</td><td>'.$r->owner_first_name.'</td><td>'.$r->owner_last_name.'</td><td>'.$r->subdomain.'</td><td>'.$r->created_date.'</td><td><a href="'.base_url().'admin/org_delete/'.$r->id.'">Delete</a></td></tr>';  
                        }
                     
                        ?>
                      </table>
                </div>
                    <?php echo $this->pagination->create_links();?>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- End Form Content Part -->
