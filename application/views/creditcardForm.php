<div id="free-trial">
    <div class="free-trial-headline">
      <div class="container  ">
       <div class="col-md-12 col-sm-12 col-xs-12 text-center text-col-white">
            <h3 class="text-font-35 sm-text-font-20"> Credit Card Information </h3>
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
 <?php /*$attributes = array('class' => 'form-horizontal');
      echo form_open('checkout/paypal_entry',$attributes);*/  ?>
      <form action="http://<?php echo $_SERVER['HTTP_HOST'];?>/index.php/checkout/paypal_entry" method="post" accept-charset="utf-8" class="form-horizontal"> 
   <input type="hidden" name="paymentType" value="Sale" />
   <input type="hidden" name="organization_id" value="<?php echo $organization_id;?>" /> 
   <input type="hidden" name="owner_email" value="<?php echo $owner_email;?>" />  
   <input type="hidden" name="session" value="<?php echo $session;?>" />  
              <div class="table-responsive">
                      <table class="table">
              
                
                  <tr>
                    <td width="100%" colspan="2" background="images/collectionbg1_see.png">
                    <b>Personal Information</b></td>
                  </tr>
                  <tr>
                    <td width="35%" background="images/collectionbg1_see.png" align="right">
                    <b>First Name:</b></td>
                    <td width="50%" background="images/collectionbg1_see.png"><input type="text" name="fname" value="<?php echo $owner_first_name;?>" /><?php echo form_error('fname'); ?></td>
                  </tr>
                  <tr>
                    <td width="35%" background="images/collectionbg1_see.png" align="right">
                    <b>Last Name:</b></td>
                    <td width="50%" background="images/collectionbg1_see.png"><input type="text" name="lname" value="<?php echo $owner_last_name;?>" /><?php echo form_error('lname'); ?></td>
                  </tr>
                  <tr>
                    <td width="35%" background="images/collectionbg1_see.png" align="right">
                    <b>Amount: </b> </td>
                  
                    <td width="50%" background="images/collectionbg1_see.png">$<input readonly="readonly" type="text" name="ftotal" value="<?php echo $buy_amount; ?>"><?php echo form_error('ftotal'); ?></td>
                  </tr>
                  <tr>
                    <td width="100%" colspan="2" background="images/collectionbg1_see.png"><b>
                   Credit Card Information</b></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"><b>Card Type :</b></td>
                    <td width="65%" align="left">
                    <select name="creditCardType" style="width:150px;">
                              <option value="Visa" selected="selected">Visa</option>
                              <option value="MasterCard">MasterCard</option>
                              <option value="Discover">Discover</option>
                              <option value="Amex">American Express</option>
                    </select></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"><b>Card Number :</b></td>
                    <td width="65%" align="left">
                    <input type="text" size="19" maxlength="19" name="creditCardNumber" style="width:150px;" /><?php echo form_error('creditCardNumber'); ?></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"><b>Expiration Date :</b></td>
                    <td width="65%" align="left">
                                      <select name="expDateMonth">
                              <option value="1">01</option>
                              <option value="2">02</option>
                              <option value="3">03</option>
                              <option value="4">04</option>
                              <option value="5">05</option>
                              <option value="6">06</option>
                              <option value="7">07</option>
                              <option value="8">08</option>
                              <option value="9">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              </select> <select name="expDateYear" size="1">
                                <option value="2013" selected>2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                              </select></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"><b>CVV Number :</b></td>
                    <td width="65%" align="left">
                    <input type="text" size="3" maxlength="4" name="cvv2Number" /><?php echo form_error('cvv2Number'); ?><input type="hidden" name="paymentType" value="Sale" /></td>
                  </tr>
                  </table>
              </div>
              </td>
              <!-- <td width="50%" valign="top">

              <?php if($_GET['flag']==2){ ?>
              <div align="right">
                <table border="0" width="98%" cellspacing="0" cellpadding="4" class="content4" style="border:1px solid #333333;">
                  <tr>
                    <td width="100%" background="images/collectionbg1_see.png" align="center">
                    <b><font size="2" color="#FF0000">Transaction Declined</font></b></td>
                  </tr>
                  <tr>
                    <td width="100%" align="left" height="10"></td>
                  </tr>
                  <tr>
                    <td width="100%" align="left">
                    <?php 

                      $err=$_SESSION['reshash'];
                      //print_r($err); die();
                              if($err[L_LONGMESSAGE0] != ""){
                                print  $err[L_LONGMESSAGE0]."<br><br>";
                              }
                              if($err[L_LONGMESSAGE1] != ""){
                                print  $err[L_LONGMESSAGE1]."<br><br>";
                              }
                              if($err[L_LONGMESSAGE2] != ""){
                                print  $err[L_LONGMESSAGE2]."<br><br>";
                              }
                            ?></td>
                  </tr>
                  </table>
              </div>
              <?php } ?></td> -->
            </tr></table>
            
         <div class="bg-col-white col-md-6 col-md-offset-3 text-center"> <input type="submit" value="Submit" name="submit" class="btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10">
         </div>
          </form>
         <?php //echo form_close();?>
</div>
</div>
</div>
</div>

