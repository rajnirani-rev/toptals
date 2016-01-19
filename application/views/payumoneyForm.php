<?php
//echo "<hr>".$action."<hr>".$hash;
// Merchant key here as provided by Payu
$MERCHANT_KEY = "JBZaLc";

// Merchant Salt as provided by Payu
$SALT = "GQs7yium";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";


?>


 <body onLoad="submitPayuForm()">
 
 
  <div id="free-trial">
		<div class="free-trial-headline">
			<div class="container">
		<div class="row margin-bottom-70">
		<div class="col-md-12 col-sm-12 col-xs-12 text-center text-col-white">
			<h3 class="text-font-35 sm-text-font-20">PayUMoney Checkout Form </h3>
		</div>
		
<?php if(empty($action)){$form_action='checkout/payumoney/amount/'.$buy_amount;}else{$form_action=$action;}?>

    <div class="col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2 col-xs-12 bg-col-white form-border" >
    <!-- <form action="<?php echo $action; ?>" method="post" name="payuForm"> -->
    	 <?php $attributes = array('class' => 'form-horizontal','name'=>'payuForm','method'=>'post');
			echo form_open($form_action,$attributes);	?>
		 <?php $data = array('type' => 'hidden','name'  => 'key','id'  => 'key','value'=>$MERCHANT_KEY);
			echo form_input($data);?>
		 <?php $data = array('type' => 'hidden','name'  => 'hash','id'  => 'hash','value'=>$hash);
			echo form_input($data);?>
		 <?php $data = array('type' => 'hidden','name'  => 'txnid','id'  => 'txnid','value'=>$txnid);
		 	echo form_input($data);?>
            <?php $data = array('type' => 'hidden','name'  => 'service_provider','id'  => 'service_provider','value'=>'payu_paisa');
		 	echo form_input($data);?>
     
     <div class="table-responsive">
                  <table class="table">
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td><label for="amount" class="col-md-12 col-sm-3 col-xs-12 control-label">Amount</label></td>
          <td><?php $data = array('readonly'=>'readonly','name'  => 'amount','id'  => 'amount','class'  => 'form-control input-field-css','value'=>''.$buy_amount.'');
			echo form_input($data);?>
			<?php echo form_error('amount'); ?></td></td>
          <td><label for="firstname" class="col-md-12 col-sm-3 col-xs-12 control-label">First Name<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label></td>
          <td><?php $data = array('name'  => 'firstname','id'  => 'firstname','class'  => 'form-control input-field-css','value'=>''.empty($posted['firstname']) ? '' : $posted['firstname'].'');
			echo form_input($data);?><?php echo form_error('firstname'); ?></td>
        </tr>
        <tr>
          <td><label for="email" class="col-md-12 col-sm-3 col-xs-12 control-label">Email<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label></td>
          <td><?php $data = array('name'  => 'email','id'  => 'email','class'  => 'form-control input-field-css','value'=>''.empty($posted['email']) ? '' : $posted['email'].'');
			echo form_input($data);?><?php echo form_error('email'); ?></td>
          <td><label for="phone" class="col-md-12 col-sm-3 col-xs-12 control-label">Phone<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label></td>
          <td><?php $data = array('name'  => 'phone','id'  => 'phone','class'  => 'form-control input-field-css','value'=>''.empty($posted['phone']) ? '' : $posted['phone'].'');
			echo form_input($data);?><?php echo form_error('phone'); ?></td>
        </tr>
        <tr>
          <td><label for="productinfo" class="col-md-12 col-sm-3 col-xs-12 control-label">Product Info</label></td>
          <td colspan="3"><textarea class="form-control input-field-css" name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea><?php echo form_error('productinfo'); ?></td>
        </tr>
        <tr>
          <td><label for="surl" class="col-md-12 col-sm-3 col-xs-12 control-label">Success URI</label></td>
          <td colspan="3"><?php $data = array('name'  => 'surl','id'  => 'surl','class'  => 'form-control input-field-css','value'=>''.empty($posted['surl']) ? '' : $posted['surl'].'');
			echo form_input($data);?><?php echo form_error('surl'); ?></td>
        </tr>
        <tr>
        <td><label for="furl" class="col-md-12 col-sm-3 col-xs-12 control-label">Failure URI</label></td>
          <td colspan="3"><?php $data = array('name'  => 'furl','id'  => 'furl','class'  => 'form-control input-field-css','value'=>''.empty($posted['furl']) ? '' : $posted['furl'].'');
			echo form_input($data);?><?php echo form_error('furl'); ?></td>
        </tr>

        <tr>
          <td colspan="3"><?php $data = array('type' => 'hidden','name'  => 'service_provider','id'  => 'service_provider','class'  => 'form-control input-field-css','value'=>''.$txnid.'');
		 	echo form_input($data);?></td>
        </tr>

        <tr>
          <td><b>Optional Parameters</b></td>
        </tr>
        <tr>
          <td><label for="lastname" class="col-md-12 col-sm-3 col-xs-12 control-label">Last Name<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label></td>
          <td><?php $data = array('name'  => 'lastname','id'  => 'lastname','class'  => 'form-control input-field-css','value'=>''.empty($posted['lastname']) ? '' : $posted['lastname'].'');
			echo form_input($data);?><?php echo form_error('lastname'); ?>
			</td>
          <td><label for="cancel_url" class="col-md-12 col-sm-3 col-xs-12 control-label">Cancel URl</label></td>
          <td><?php $data = array('name'  => 'curl','id'  => 'curl','class'  => 'form-control input-field-css','value'=>''.empty($posted['curl']) ? '' : $posted['curl'].'');
			echo form_input($data);?><?php echo form_error('curl'); ?></td>
        </tr>
        <tr>
          <td><label for="address1" class="col-md-12 col-sm-3 col-xs-12 control-label">Address1<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label></td>
          <td><?php $data = array('name'  => 'address1','id'  => 'address1','class'  => 'form-control input-field-css','value'=>''.empty($posted['address1']) ? '' : $posted['address1'].'');
			echo form_input($data);?><?php echo form_error('address1'); ?></td>
          <td><label for="address2" class="col-md-12 col-sm-3 col-xs-12 control-label">Address2<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label></td>
          <td><?php $data = array('name'  => 'address2','id'  => 'address2','class'  => 'form-control input-field-css','value'=>''.empty($posted['address2']) ? '' : $posted['address2'].'');
			echo form_input($data);?><?php echo form_error('address2'); ?></td>
        </tr>
        <tr>
          <td><label for="city" class="col-md-12 col-sm-3 col-xs-12 control-label">City<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label></td>
          <td><?php $data = array('name'  => 'city','id'  => 'city','class'  => 'form-control input-field-css','value'=>''.empty($posted['city']) ? '' : $posted['city'].'');
			echo form_input($data);?><?php echo form_error('city'); ?></td>
          <td><label for="state" class="col-md-12 col-sm-3 col-xs-12 control-label">State<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label></td>
          <td><?php $data = array('name'  => 'state','id'  => 'state','class'  => 'form-control input-field-css','value'=>''.empty($posted['state']) ? '' : $posted['state'].'');
			echo form_input($data);?><?php echo form_error('state'); ?></td>
        </tr>
        <tr>
        <td><label for="country" class="col-md-12 col-sm-3 col-xs-12 control-label">Country<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label></td>
          <td><?php $data = array('name'  => 'country','id'  => 'country','class'  => 'form-control input-field-css','value'=>''.empty($posted['country']) ? '' : $posted['country'].'');
			echo form_input($data);?><?php echo form_error('country'); ?></td>
          <td><label for="zipcode" class="col-md-12 col-sm-3 col-xs-12 control-label">Zipcode<i class="fa fa-asterisk margin-left-right-5" style="color:#AC3052;"></i></label></td>
          <td><?php $data = array('name'  => 'zipcode','id'  => 'zipcode','class'  => 'form-control input-field-css','value'=>''.empty($posted['zipcode']) ? '' : $posted['zipcode'].'');
			echo form_input($data);?><?php echo form_error('zipcode'); ?></td>
        </tr>
        
        <tr>
          <td>UDF1: </td>
          <td><input name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
          <td>UDF2: </td>
          <td><input name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF3: </td>
          <td><input name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
          <td>UDF4: </td>
          <td><input name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF5: </td>
          <td><input name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
          <td>PG: </td>
          <td><input name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
        </tr>
        
        
        <tr>
          <?php  if(!$hash) { ?>
            <td colspan="4"><div class="form-group">
					<div class="col-md-12 col-sm-5">
                    <?php $data = array('name'=> 'submit', 'value'=> 'Submit',
								'class'=> 'btn btn-outline btn-lg admin-btn-padding text-col-white btn-bg-colour btn-shadow margin-bottom-10');
								 echo form_submit($data);?>
                    </div>
				  </div></td>
          <?php } ?>
        </tr>
      </table>
      </div>
   <?php echo form_close();?>
    </div>
  <script>
     var hash = '<?php echo $hash ?>';
//    function submitPayuForm() {
//      if(hash == '') {
//        return;
//      }
	var action = '<?php echo $action ?>';
    function submitPayuForm() {//alert(hash);alert(action);
      if(action == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
    payuForm.submit();
    }

  </script>

    </div>
    </div>
    </div>
    </div>
  </body>
