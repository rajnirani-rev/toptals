

<!-- Start HTML Content of About Us Page -->
<div id="aboutUs" class="padding-top-80-bottom-120 xs-padding-top-40-bottom-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-col-white text-center padding-bottom-15">
                <h2>Forgot Password</h2>
            </div>
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1  bg-col-white " style="border-radius: 15px;">
          
                <div class="col-md-10 col-sm-10 col-xs-10 padding-left-right-40 padding-10">
                     
                <form class="form-horizontal" method="post" id="form" action="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/forgotpass/doforget">
				
				<div class="form-group">
					<label for="email" class="control-label">Enter Your Email Id </label>
					<input class="form-control input-field-css col-md-3 col-sm-3"  type="text" id="email" name="email" />
                    <input type="submit" class="col-md-3 col-sm-3 btn btn-outline btn-lg btn-padding text-col-white btn-bg-colour btn-shadow margin-top-10 xs-text-font-12 sm-btn-text-font-12" value="Reset" />
				</div>
				
				<?php if( isset($info)): ?>
					<div class="alert alert-success">
						<?php echo($info) ?>
					</div>
				<?php elseif( isset($error)): ?>
					<div class="alert alert-error">
						<?php echo($error) ?>
					</div>
				<?php endif; ?>
				
			
				</form>
               
                    </div>
             <!-- .col-md-7 .col-sm-7 .col-xs-12 -->
               
                
               
                
            </div>

            

        </div>
    </div>
</div>
<!-- End HTML Content of About Us Page -->
