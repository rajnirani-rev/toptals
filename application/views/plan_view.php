
<div class="plan-background plan-top-bar">
<div class="section top-bottom-arrow" style="padding-bottom: 0px;">

  <div class="container plan-wrapper">
    <div class="row">
 <?php 
if($this->session->userdata('user_data')) {
$user_logged_rec = $this->session->userdata('user_data');					
}
?>       
        <div class="col-md-12">
          <div class="top-text text-center ">
          <div class="top-arrow-title">TopTal Plans</div><h3 class="text-center" style=" color: #fff; margin-top: 7px !important; margin-bottom: 3px !important;">No monthly fee - Pay for what you use.</h3>
        <p class="sub-text">Our plans let you conduct a set number of exams for up to 1 year.</p></div>   
        </div>
        <div class="section">
  <div class="container">
      <div class="row">
        <div class="col-md-12 cycle-blocks">
        <div class="border-circle">
        <?php
          foreach ($arr_all_plans as $allPlanView) {?>
        
           <div class="col-md-3 cycle-sub-block">    
            <div class="text-center inner-num-text">
              <p class="number1" ><?php echo $allPlanView->no_of_test ?></p>
              <p class="test1"><?php echo $allPlanView->plan_title ?></p>
            </div>
          </div>
          <?php } ?>
        </div>      
        </div>
    </div>
  </div>
 </div>

        <div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="prize-wrapper">

         <?php foreach ($arr_all_plans as $allPlanView) {?>
        <div class="prize-list">
               <div class="my-inner prize-list-text">
                 <ul>
                    <li><?php echo $allPlanView->plan_summary ?></li>
                    <li><div class="money text-center"><?php echo '$'.$allPlanView->plan_amount ?></div></li>
                    <li><?php /* $attributes = array('class' => 'form-horizontal');
                        echo form_open('checkout/index',$attributes);*/  ?>
                          <form action="http://<?php echo $_SERVER['HTTP_HOST']; ?>/index.php/checkout/index" method="post" accept-charset="utf-8" class="form-horizontal">
                          <input type="hidden" name="buyAmount" value="<?php echo $allPlanView->plan_amount ?>" />
                           <input type="hidden" name="session" value="<?php echo $allPlanView->no_of_test ?>" />
                        <?php if(empty($user_logged_rec['organization_name'])){?>
                      <button type="button" onclick="alert('Please Login To Purchase Plan!!');" class="btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour margin-top-bottom-20 btn-shadow buy-now">Buy Now</button>
                        <?php }else{?>
                        <button type="submit" class="btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour margin-top-bottom-20 btn-shadow buy-now">Buy Now</button> <?php }?>
                        </form>
                        <?php //echo form_close();?>
                    </li>
                  </ul>
                 </div>
             </div> 
             <?php } ?>  
             
             </div>  
             
             <div class="plan-bottom-arrow">
                <img class="img-responsive" src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/images/bottom arrow.png" />
                
             </div>
              
           </div>    
        </div>
      </div>
   </div>
</div>   
    </div>
  </div>
    <div class="footer-bottom-plan-back">
          <div class="footer-arrow">
              <div class="hidden">
                <a class="center-block text-center" href="#">
                <button type="button" class="btn btn-outline btn-lg btn-white-border btn-padding text-col-white btn-bg-colour">Sign up</button></a>
                <h5 class="text-center">Need help or have a questions? hello@toptel.com</h5>
              </div>
          </div>
        </div>  
  </div>
</div>
