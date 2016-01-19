<!-- Full Width Image Header -->
    <header class="header-image">
        <div class="headline">
            <div class="container">
				<div class="row">
       
                	<div class="col-md-4 col-sm-4 col-xs-4" style="position: absolute;">
                        <img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/gear-img1.png" alt="big-img" class="big-gear" />
                        <img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/gear-img2.png" alt="medium-img" class="medium-gear" />
                        <img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/gear-img3.png" alt="small-img" class="small-gear" />
                    </div>
					<div class="col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-10 col-xs-offset-1 text-align-right text-col-white">
						<h2 class="margin-top-bottom-11"> Create your own online exams </h2>
						<h3 class="margin-top-bottom-11"> Automatic marking &amp; results notification </h3>
						<h3 class="margin-top-bottom-11"> No monthly fees </h3>
						<h3 class="margin-top-bottom-11"> Students take tests when they&rsquo;re ready </h3>
						<h6>&#40;and are reminded if they don&rsquo;t&#41;
                       
                        </h6>
						<a class="btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour btn-font-size" href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/organization/free_trial">Free Signup</a>
					</div>
				</div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
        <!-- First Featurette -->
            <div class="container">
              <!-- Example row of columns -->
              <div class="row">
              	<div class="col-md-10 col-md-offset-1 col-xs-12 padding-top-bottom-20">
                <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                  <img style="" alt="Generic placeholder image" src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/brain-cog-icon.jpg" class="toptals-icon rotate-icon-img">
                  <h4><?php echo $arr_all_plans[0]->homepage_title;?></h4>
                  <p class="content-height-120 padding-left-right-10 text-font-12"><?php echo $arr_all_plans[0]->homepage_summary;?></p>
                  <?php /*<p><a role="button" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/readcont#part1" class="btn btn-default border-color-none"><span class="small-circle text-col-white">&#10095;</span> Read More</a></p>*/?>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                  <img style="" alt="Generic placeholder image" src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/how-it-works-icon.jpg" class="how-it-works-icon rotate-icon-img">
                  <h4><?php echo $arr_all_plans[1]->homepage_title;?></h4>
                  <p class="content-height-120 padding-left-right-10 text-font-12"><?php echo $arr_all_plans[1]->homepage_summary;?></p>
                  
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                  <img style="" alt="Generic placeholder image" src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/no-ins-req-icon.jpg" class="no-ins-req-icon rotate-icon-img">
                  <h4><?php echo $arr_all_plans[2]->homepage_title;?></h4>
                  <p class="content-height-120 padding-left-right-10 text-font-12"><?php echo $arr_all_plans[2]->homepage_summary;?></p>
                  
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                  <img style="" alt="Generic placeholder image" src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/conv-for-student.jpg" class="conv-for-student rotate-icon-img">
                  <h4><?php echo $arr_all_plans[3]->homepage_title;?></h4>
                  <p class="content-height-120 padding-left-right-10 text-font-12"><?php echo $arr_all_plans[3]->homepage_summary;?></p>
                  
                </div><!-- /.col-md-3 -->
                </div><!-- .col-md-10 -->
              </div><!-- /.row -->
            </div><!-- .container -->

        <!-- Second Featurette -->
        <div class="bottom-img" style="background-color:#A03D65;">
			<div class="container">
            	<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				  <h2 class="bs-docs-featurette-title text-center text-col-white">Who&prime;s using Toptals.</h2>
				</div>

				<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 border-radius-20">
				  <ul id="flexiselDemo1">
          <?php foreach($arr_all_image as $img){ ?>
					<li><img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/upload/<?php echo $img->logo_name;?>" alt="whoUsetoptals" /></li>
				  <?php }?>
				  </ul>
				</div>
	
				<div class="col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-12 text-center">
         <?php foreach($get_all_testimonial as $testimonial){ ?>
				  <div class="col-md-4 col-sm-10 col-xs-12">
                  <div class="bg-col-white border-radius-20 margin-top-bottom-20 padding-top-bottom-10">
                  <!-- normal -->
                  	<div class="ih-item circle effect16 right_to_left" style="margin: auto;">
                    	<a href="#">           
                    	<div class="img"><img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/upload/testimonial/<?php echo $testimonial->image;?>" alt="logo"></div>
                        <div class="info">
                        <h3><?php echo $testimonial->name;?></h3>
                       
                        </div>
                        </a>
                    </div>
				  <!-- end normal -->
				  <h4 class="margin-top-bottom-20"><span class="h4-bg-color padding-10 text-col-white border-radius-20"><?php echo $testimonial->name;?></span></h4>
				  <p><img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/5.png" class="image-responsive" alt="rating-image">
          <?php /* if($testimonial->testimonial_rating == 1){
            ?><img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/1.png" class="image-responsive" alt="rating-image"><?php
          }else if($testimonial->testimonial_rating == 2){
           ?><img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/2.png" class="image-responsive" alt="rating-image"><?php
          }else if($testimonial->testimonial_rating == 3){
            ?><img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/3.png" class="image-responsive" alt="rating-image"><?php
          }else if($testimonial->testimonial_rating == 4){
            ?><img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/4.png" class="image-responsive" alt="rating-image"><?php
          }else{
           ?><img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/5.png" class="image-responsive" alt="rating-image"><?php
          }*/
          ?>
          </p>
				  <p class="content-box-height-180 padding-left-right-10 text-font-12"><?php echo $testimonial->testimonial_summary;?></p>
				  <?php /*<p><?php echo date('d M H:i',strtotime($testimonial->date_added));?>
          </p>*/ ?>
                  </div>
				  </div>
          <?php }?><!-- /.col-md-4 .col-sm-10 .col-xs-12 -->
				  
				  
				</div>
	
              	<br>
                <br>
                <br>
                <br>
                <br>
                
            </div>
			</div><!-- .container -->
        </div> <!-- .bottom-img -->

        <!-- Third Featurette -->
        <!--<div class="bs-docs-featurette background-bottom-img">
          <div class="container">
            <h2 class="bs-docs-featurette-title margin-bottom-55">Works across all types of devices</h2>
			
            <div class="row bs-docs-featured-sites margin-top-bottom-10">
        
              <div class="col-md-1 col-md-offset-1 col-sm-12 text-center" style=" margin-top: 39px; padding-right: 0px">
                <a title="Lyft" target="_blank" href="#">
                  <img class="img-responsive display-inline" alt="All Platforms Icons" src="images/all-platforms-icons.png">
                </a>
              </div>
        
              <div class="col-md-2 col-sm-12 text-center" style="padding-left: 0px;padding-right: 0px">
                <a title="Vogue" target="_blank" href="#">
                  <img class="img-responsive display-inline" alt="Tab Devices" src="images/tab-device.png">
                </a>
              </div>
        
              <div class="col-md-6 col-sm-12 text-center" style="padding-left: 0px;padding-right: 0px">
                <a title="Riot Design" target="_blank" href="#">
                  <img class="img-responsive display-inline" alt="Mac Devices" src="images/mac-device.png">
                </a>
              </div>
        
              <div class="col-md-1 col-sm-12 text-center" style=" margin-top: 35px">
                <a title="Newsweek" target="_blank" href="#">
                  <img class="img-responsive display-inline" alt="Mobile Devices" src="images/mobile-device.png">
                </a>
              </div>
            </div>

            
        <div class="row bs-docs-featured-sites">
            <div class="col-md-2"></div>
              <div class="col-md-3 col-sm-12 text-center">
				<a class="example-image-link" href="images/thumb-img1.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                	<img class="example-image" src="images/thumb-img1.jpg" alt=""/>
                </a>
              </div>
        
              <div class="col-md-3 col-sm-12 text-center">
				<a class="example-image-link" href="images/thumb-img2.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                	<img class="example-image" src="images/thumb-img2.jpg" alt=""/>
                </a>
              </div>
        
              <div class="col-md-3 col-sm-12 text-center">
				<a class="example-image-link" href="images/thumb-img3.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                	<img class="example-image" src="images/thumb-img3.jpg" alt=""/>
                </a>
              </div>
              <div class="col-md-2"></div>
        </div>
            
          <a class="btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour margin-top-bottom-20 btn-shadow" href="#">Free Signup</a>
          </div>
        </div>-->
    </div>
    <!-- /.container -->