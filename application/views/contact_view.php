<!-- Start HTML Content of About Us Page -->
<div id="aboutUs" class="padding-top-80-bottom-120 xs-padding-top-40-bottom-80">
            <div class="bg-col-white padding-topBottom-10-leftRight-20 contact-form-border col-md-4 col-sm-6 col-xs-10 contact-form-css">
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group margin-bottom-5">
                        <div class="col-md-12 col-sm-12 col-xs-12 left-inner-addon">
                            <i class="fa fa-user"></i><?php $data = array('placeholder'=>'Name','name'  => 'name','id'  => 'name','class'  => 'form-control input-field-css','value' => set_value('name'),'maxlength'   => '100','size'  => '50');
                        echo form_input($data);?><?php echo form_error('name'); ?>
                        </div>
                    </div>
                    <div class="form-group margin-bottom-5">
                        <div class="col-md-12 col-sm-12 col-xs-12 left-inner-addon">
                            <i class="fa fa-envelope-o"></i><?php $data = array('placeholder'=>'Email','name'  => 'email','id'  => 'email','class'  => 'form-control input-field-css','value' => set_value('Email'),'maxlength'   => '100','size'  => '50');
                        echo form_input($data);?><?php echo form_error('email'); ?>
                        </div>
                    </div>
                    <div class="form-group margin-bottom-5">
                        <div class="col-md-12 col-sm-12 col-xs-12 left-inner-addon">
                            <i class="fa fa-phone"></i><?php $data = array('placeholder'=>'Phone','name'  => 'phone','id'  => 'phone','class'  => 'form-control input-field-css','value' => set_value('phone'));
                        echo form_input($data);?><?php echo form_error('phone'); ?>
                        </div>
                    </div>
                    <div class="form-group margin-bottom-5">
                        <div class="col-md-12 col-sm-12 col-xs-12 left-inner-addon">
                            <i class="glyphicon glyphicon-comment"></i><?php $data = array('placeholder'=>'comments...','name'  => 'message','id'  => 'message','class'  => 'form-control input-field-css','value' => set_value('Message'),'maxlength'   => '1000','size'  => '50');
                        echo form_textarea($data);?><?php echo form_error('Message'); ?>
                        </div>
                    </div>
                  <?php /*?>  <div class="form-group margin-bottom-5">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <!--  <?php // Captcha is only shown if not already solved
                            if (!$captchaSolved) { ?>
                           <?php echo $captchaHtml; ?>
                              <?php  $data = array('name' => 'captcha','id'   => 'captcha','value' => '','maxlength' => '100','size' => '50','class'  => 'form-control input-field-css' );
                               echo form_textarea($data);?><?php echo form_error('CaptchaCode'); }?> -->
                        </div>
                    </div><?php */?>
                    <div class="form-group margin-bottom-5">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <button type="submit" class="btn btn-default btn-white-border btn-padding text-col-white btn-bg-colour change-fontPadding contact-btn-border-col">Submit</button>
                        </div>
                    </div>
                </form>
            </div>        
  <div class="contact-first-div margin-top-bottom-10" style="position:relative;">
      <div class="dashed-border-img margin-top-10">&nbsp;</div>
        <div id="contact-map-canvas"></div>
        <div class="dashed-border-img margin-top-bottom-20">&nbsp;</div>
    </div>
    <div>
      <div class="container">
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="col-md-7 col-sm-7 col-xs-12 padding-left-right-0 xs-margin-bottom-10">
                        <div class="col-md-8 col-md-offset-4 col-sm-10 col-xs-12 solid-border padding-10">
                            <div class="text-col-white margin-bottom-10 setdiv-width">
                                <span class="col-md-1 padding-left-right-0">&nbsp;</span>
                                <h4 class="text-col-white txt-decoration">Contact details</h4>
                            </div>
                            <div class="text-col-white margin-bottom-10 setdiv-width">
                                <span class="col-md-1 padding-left-right-0"><i class="fa fa-envelope-o"></i></span>
                                <span class="col-md-10 padding-left-right-0">123 Suspendis mattis, SollicitudinDistrict, Accums Fringilla</span>
                            </div>
                            <div class="text-col-white margin-bottom-10 setdiv-width">
                                <span class="col-md-1 padding-left-right-0"><i class="fa fa-phone"></i></span>
                                <span class="col-md-10 padding-left-right-0">(012) 345 678 910    (012) 345 678 920</span>
                            </div>
                            <div class="text-col-white setdiv-width">
                                <span class="col-md-1 padding-left-right-0"><i class="fa fa-map-marker"></i></span>
                                <span class="col-md-10 padding-left-right-0">Hello@toptals.com</span>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-md-5 col-sm-5 col-xs-12 padding-left-right-0">
                        <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 solid-border">
                            <div class="text-col-white setdiv-width">
                                <h4 class="text-col-white txt-decoration">Our monthly news</h4>
                            </div>
                            <div class="text-col-white margin-bottom-10 setdiv-width">
                                <span class="col-md-12 col-sm-12 col-xs-12 padding-left-right-0">Subscribe to our newsletter and stay up to date with the latest news and deals!</span>
                            </div>
                            <div class="text-col-white margin-bottom-10 setdiv-width">
                                <form class="form-inline" role="form">
                                <div class="form-group">
                                    <label class="sr-only" for="email">Email address:</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <button type="submit" class="btn btn-default btn-white-border btn-padding text-col-white btn-bg-colour change-fontPadding">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End HTML Content of About Us Page -->
