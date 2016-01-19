  <div class="container">
    <div class="row">
      <div class="col-md-4 text-center text-bg-white">
          
      </div> 
    </div>
</div>
<!-- Start Free Trial Page -->

  <div id="free-trial">
    <div class="free-trial-headline">
      <div class="container">
        <div class="row margin-bottom-70">
          <div class="col-md-12 col-sm-12 col-xs-12 text-center text-col-white">
            <h3 class="text-font-35 sm-text-font-20"> Checkout </h3>
          </div>
          <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
            <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-12 xs-margin-bottom-20">
              
            </div>
            <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12 bg-col-white form-border">
              <?php /*$attributes = array('class' => 'form-horizontal');
              echo form_open('checkout/checkoutform',$attributes);*/  ?>
              <form action="http://<?php echo $_SERVER['HTTP_HOST']; ?>/index.php/checkout/checkoutform" method="post" accept-charset="utf-8" class="form-horizontal">
                <div class="row">
                  <input type="hidden" name="session" value="<?php echo $session;?>" />
                  <div class="col-sm-12 col-md-12">
                    <div class="form-group margin-bottom-5">
                      <?php
                    $attributes = array('class' => 'col-md-8 control-label text-align-left');
                    echo form_label('Pay with Credit Card', 'creditcard', $attributes);?> 
                      <!--<label for="Fullname" class="col-md-12 control-label text-align-left">Your Name</label>-->
                      
                      <?php $data = array('type' => 'hidden','name'  => 'buyAmount','id'  => 'buyAmount','class'  => 'form-control',
                        'value'=>''.$buy_amount.''); echo form_input($data);?>
                        
                      <div class="col-md-4">
                        <!--<input class="form-control" id="inputFirstName" placeholder="First Name" type="text">-->
                          <?php $data = array('name'  => 'checkoutPayment','id'  => 'creditcard','class'  => 'form-control',
                         'type'=>'radio','value'=>'creditcard');
                          echo form_input($data);?>
                        </div>
                     <?php ?>   <?php
                    $attributes = array('class' => 'col-md-8 control-label text-align-left');
                    echo form_label('Pay with Paypal', 'paypal', $attributes);?> 
                      <!--<label for="Fullname" class="col-md-12 control-label text-align-left">Your Name</label>-->
                      <div class="col-md-4">
                        <!--<input class="form-control" id="inputFirstName" placeholder="First Name" type="text">-->
                          <?php $data = array('name'  => 'checkoutPayment','id'  => 'paypal','class'  => 'form-control',
                         'type'=>'radio','value'=>'paypal');
                          echo form_input($data);?>
                        </div><?php ?>
                        <?php
                    /*$attributes = array('class' => 'col-md-8 control-label text-align-left');
                    echo form_label('Payumoney', 'payumoney', $attributes);?> 
                      <!--<label for="Fullname" class="col-md-12 control-label text-align-left">Your Name</label>-->
                      <div class="col-md-4">
                          <?php $data = array('name'  => 'checkoutPayment','id'  => 'payumoney','class'  => 'form-control',
                         'type'=>'radio','value'=>'payumoney');
                          echo form_input($data); */?>
                        </div>
                      
                    </div>
                  </div>
                  
                  <div class="col-sm-12 col-md-12 text-center">
                    <!--<a class="btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10" href="#">Sign up</a>-->
                    <?php $data = array('name' => 'submit', 'value' => 'Submit', 'class'  => 'btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10');
                      echo form_submit($data);?>
                  </div>
                </div>
                </form>
              <?php //echo form_close();?>
                            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- End Free Trial Page -->