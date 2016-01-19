<!-- Start Form Content Part -->
<div class="admin-background">
    <div class="container padding-top-bottom-80">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 bg-col-white padding-left-right-0">
             <?php $this->load->view('admin/includes/menu'); ?>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
             <?php echo $this->session->flashdata('registered_successfully');?>
                <h2 class="pull-left padding-left-right-0 padding-top-40-bottom-15" style="color:black; font-weight:bold;">Home Post</h2>
            </div>
            
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
                <div class="divider"><hr style="border-color:#000000;"></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40 margin-bottom-30">
               <!--  <span style="margin-right:2px;"><img src="<?php echo base_url(); ?>images/alert-icon.png" /></span>
                <span class="create-exam">No exam have been created.<a href="#" style="text-decoration: underline;">Click here to create your first one.</a></span> -->
                 <div class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0 padding-left-right-40">
               
                    <?php
                          
                        //echo '<form>'.$r->homepage_title.'</td><td>'.$r->homepage_summary.'</td><td>'.$r->homepage_details.'</td><td><a href="'.base_url().'admin/org_delete/'.$r->homepage_id.'">Submit</a></td></tr>';  
                        
                      
                        ?>
                           <?php
          foreach($arr_all_homepost as $r){?>
             <?php $attributes = array('class' => 'form-horizontal');
   
              echo form_open('admin/validate_credentials_homepage_post/'.$r->homepage_id.'',$attributes);  ?>
                <div class="row">
                  
                  <div class="col-sm-12 col-md-12">
                  <?php echo $this->session->flashdata('message');?>
                    <div class="form-group margin-bottom-5">
                    
                                        <?php
                    $attributes = array('class' => 'col-md-12 control-label text-align-left');
                   // echo form_label('User Name', 'yourname', $attributes);?>
                      <!--<label for="Fullname" class="col-md-12 control-label text-align-left">Your Name</label>-->
                      <div class="col-md-12">
                        <!--<input class="form-control" id="inputFirstName" placeholder="First Name" type="text">-->
                        
                        <?php echo form_label('Title', 'title', $attributes);?>
                          <?php $data = array('name'  => 'postTitle','id'  => 'postTitle','class'  => 'form-control',
                          'placeholder'   => 'Title' , 'value' => ''.$r->homepage_title.'');
                                                 
                          echo form_input($data); echo form_error('postTitle'); ?>

                           <?php echo form_label('Summary', 'summary', $attributes);?>
                          <?php $data = array('rows' => '4','type' => 'textarea','name'  => 'postSummary','id'  => 'postSummary','class'  => 'form-control',
                          'placeholder'   => 'Summary' , 'value' => ''.$r->homepage_summary.'');
                                                 
                          echo form_input($data); echo form_error('postSummary'); ?>

                           <?php echo form_label('Details', 'details', $attributes);?>
                           <?php $data = array('name'  => 'postDetails','id'  => 'postDetails','class'  => 'form-control',
                          'placeholder'   => 'Datails' , 'value' => ''.$r->homepage_details.'');
                                                 
                          echo form_input($data); echo form_error('postDetails'); ?>

                          <?php $data = array('name' => 'submit', 'value'       => 'Submit',
                'class'  => 'btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10' 
                      );
                      echo form_submit($data);?>

                        </div>
                      
                    
                    </div>

                  </div>
                </div>
                
                  
              <?php echo form_close();?>
                <?php }?>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- End Form Content Part -->
