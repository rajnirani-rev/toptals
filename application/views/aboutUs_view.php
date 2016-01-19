

<!-- Start HTML Content of About Us Page -->
<div id="aboutUs" class="padding-top-80-bottom-120 xs-padding-top-40-bottom-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-col-white text-center padding-bottom-15">
                <h2>About Us</h2>
            </div>
            <div class="col-md-11 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
            <?php  foreach ($arr_all_main as $key) { ?>
                <div class="col-md-7 col-sm-12 col-xs-12 padding-left-right-0">
                    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 bg-col-white padding-10" style="border-radius: 15px;">
                        <div class="col-md-7 col-sm-7 col-xs-12 padding-left-right-0"><img src="images/about-us.png" alt="img" style="width:100%;" /></div>
                       
                            
                        <div class="col-md-5 col-sm-5 col-xs-12 padding-left-right-0"><p class="padding-10 text-font-12 change-text-font-11 sm-text-font-12 text-center xs-padding-5 xs-text-font-11"> <?php echo $key->about_us_main;?></p></div>
                    </div>
                </div><!-- .col-md-7 .col-sm-7 .col-xs-12 -->
                <div class="col-md-4 col-sm-11 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-10">
                        <div class="dashed-border btn-outer-widthSet padding-10">
                            <span><img src="images/aboutus-circle.png" /></span>
                            <button type="button" class="btn btn-default change-btn-col text-col-white aboutus-btn-toggle" onclick="toggle_visibility('hide_aboutus_content1');">Who we are?</button>
                            <p id="hide_aboutus_content1" class="scroll-textBox text-col-white padding-10 aboutus-content"><?php echo $key->who_we_are; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-10">
                        <div class="dashed-border btn-outer-widthSet padding-10">
                            <span><img src="images/aboutus-circle.png" alt="" /></span>
                            <button type="button" class="btn btn-default change-btn-col text-col-white" onclick="toggle_visibility('hide_aboutus_content2');">What we do?</button>
                            <p id="hide_aboutus_content2" class="scroll-textBox text-col-white padding-10 aboutus-content" style="display: none;"><?php echo $key->what_we_do; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-10">
                        <div class="dashed-border btn-outer-widthSet padding-10">
                            <span><img src="images/aboutus-circle.png" alt="" /></span>
                            <button type="button" class="btn btn-default change-btn-col text-col-white" onclick="toggle_visibility('hide_aboutus_content3');">What we look?</button>
                            <p id="hide_aboutus_content3" class="scroll-textBox text-col-white padding-10 aboutus-content" style="display: none;"><?php echo $key->what_we_look; ?>
                            </p>
                        </div>

                    </div>
                </div><?php }?><!-- .col-md-4 .col-sm-4 .col-xs-12 -->
            </div>
            <?php /*?
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 margin-top-40">
             <?php foreach ($arr_all_team as $key) {?>
                <div class="col-md-3 col-sm-6 col-xs-12 text-center">
               
                    <p class="comment-triangle-right col-md-8 col-sm-8 col-xs-8"><?php echo $key->team_name;?></p>
                    <span class="col-md-12 col-sm-12 col-xs-12 margin-bottom-30"><img src="images/aboutus-img-outer.png" class="aboutus-person-img-outer" /><img width="120" src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/upload/teamImages/<?php echo $key->team_image;?>" class="aboutus-person-img-inner" /></span>
                    <span class="col-md-12 col-sm-12 col-xs-12 solid-border text-center text-col-white padding-10"><?php echo $key->team_desprection;?></span>
                    
                </div>
                <?php }?>
               
            </div>*/?>

        </div>
    </div>
</div>
<!-- End HTML Content of About Us Page -->
