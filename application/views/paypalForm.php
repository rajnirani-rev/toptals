<div id="free-trial">
    <div class="free-trial-headline">
      <div class="container  ">
       <div class="col-md-12 col-sm-12 col-xs-12 text-center text-col-white">
            <h3 class="text-font-35 sm-text-font-20"> Pay with Paypal Account </h3>
          </div>
          <?php 
          if($this->session->userdata('user_data')) {
    $user_logged_rec = $this->session->userdata('user_data');
    $organization_id=$user_logged_rec['organization_id'];         
    $owner_first_name=$user_logged_rec['owner_first_name'];         
    $owner_last_name=$user_logged_rec['owner_last_name'];         
    $owner_email=$user_logged_rec['owner_email'];                 
    }
    ?>
    <div class="bg-col-white col-md-6 col-md-offset-3">
 <?php /* $attributes = array('class' => 'form-horizontal');
      echo form_open('checkout/paypal_entry',$attributes);  */?>
     Full Name : <?php echo $owner_first_name.' '.$owner_last_name; ?><br />
     Amount : $<?php echo $buy_amount; ?>
     <form name="paypalForm" action="http://<?php echo $_SERVER['HTTP_HOST'];?>/index.php/checkout/paypal" method="post">
		<input type="hidden" name="id" value="123">
		<input type="hidden" name="CatDescription" value="Upgrade plan">
         <input type="hidden" name="payment" value="<?php echo $buy_amount; ?>">  
         <input type="hidden" name="key" value="<? echo md5(date("Y-m-d:").rand()); ?>">
         <input type="hidden" name="organization_id" value="<?php echo $organization_id;?>" /> 
         <input type="hidden" name="owner_email" value="<?php echo $owner_email;?>" />  
         
        <input TYPE="image" SRC="http://www.coachsbr.com/images/site/paypal_button.gif" name="paypal"  value="Continue payment through Paypal" class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10">
	</form>

     
         
</div>
</div>
</div>
</div>

