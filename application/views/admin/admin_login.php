<!-- Start Form Content Part -->
<div class="admin-background">
    <div class="container padding-top-bottom-80">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-left-right-0"><div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2 bg-col-white form-border">
    <?php $attributes = array('class' => 'form-horizontal');
              echo form_open('admin/validate_credentials_admin_login',$attributes);  ?>
                <div class="row">
                  <div class="col-md-12 col-sm-12 text-align-right">
                    <span class="text-font-10">All fields are required</span>
                  </div>
                  <div class="col-sm-12 col-md-12">
                  <?php echo $this->session->flashdata('message');?>
                    <div class="form-group margin-bottom-5">
                                        <?php
                    $attributes = array('class' => 'col-md-12 control-label text-align-left');
                    echo form_label('User Name', 'yourname', $attributes);?>
                      <!--<label for="Fullname" class="col-md-12 control-label text-align-left">Your Name</label>-->
                      <div class="col-md-12">
                        <!--<input class="form-control" id="inputFirstName" placeholder="First Name" type="text">-->
                                                <?php $data = array('name'  => 'adminname','id'  => 'adminname','class'  => 'form-control',
                          'placeholder'   => 'User Name');
                                                 
                          echo form_input($data); echo form_error('adminname'); ?>

                        </div>
                      
                    </div>
                  </div>
                  
                  <div class="col-sm-12 col-md-12">
                    <div class="form-group margin-bottom-5">
                      <!--<label for="password" class="col-md-12 control-label text-align-left">Password</label>-->
                                            <?php
                         $attributes = array('class' => 'col-md-12 control-label text-align-left');
                         echo form_label('Password', 'password', $attributes);?>
                      <div class="col-md-12">
                        <!--<input class="form-control" id="inputPassword" placeholder="Email Password" type="password">-->
                                                 <?php $data = array('name'  => 'adminPassword','id'  => 'adminPassword','class'  => 'form-control',
                          'placeholder'   => 'Password','type'=>'password');
                          echo form_input($data); echo form_error('adminPassword'); ?>
                        </div>
                    </div>
                  </div>
                  
                  
                  
                  <div class="col-sm-12 col-md-12 text-center">
                    <!--<a class="btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="#">Sign up</a>-->
                                        <?php $data = array('name'        => 'submit', 'value'       => 'login',
                'class'  => 'btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10' 
                      );
                      echo form_submit($data);?>
                  </div>
                </div>
              <?php echo form_close();?>
                            </div></div>
        </div>
    </div>
</div>
<!-- End Form Content Part -->
