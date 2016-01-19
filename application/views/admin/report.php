<!-- Start Form Content Part -->
<div class="admin-background">
    <div class="container padding-top-bottom-80">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 bg-col-white padding-left-right-0">
             <?php $this->load->view('admin/includes/menu'); ?>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
             <?php echo $this->session->flashdata('registered_successfully');?>
                <h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Credit Card Payment</h2>
            </div>
            
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="divider"><hr style="border-color:#000000;"></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 margin-bottom-30">
                <!--<span style="margin-right:2px;"><img src="<?php //echo base_url(); ?>images/alert-icon.png" /></span>
                <span class="create-exam">No exam have been created.<a href="#" style="text-decoration: underline;">Click here to create your first one.</a></span>-->
                 <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="table-responsive">
                      <table class="table">
           			    <tr>
                          <th>Transacton ID</th>
                          <th>Amount</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Date</th>
                          <th>Status</th>                            
                        </tr>
						
						<?php
                       foreach($arr_all_organization as $r){  
                        echo '<tr><td>'.$r->transacton_id.'</td><td>'.$r->amount.'</td><td>'.$r->fisrtname.'</td><td>'.$r->lastname.'</td><td>'.$r->owner_email.'</td><td>'.$r->date_added.'</td><td>'.$r->ack.'</td></tr>';  
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
