<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class paypal_class {
    
   var $last_error;                 // holds the last error encountered
   
   var $ipn_log;                    // bool: log IPN results to text file?
   
   var $ipn_log_file;               // filename of the IPN log
   var $ipn_response;               // holds the IPN response from paypal   
   var $ipn_data = array();         // array contains the POST values for IPN
   
   var $fields = array();           // array holds the fields to submit to paypal

   
   function paypal_class() {
       
      // initialization constructor.  Called when class is created.
      
      $this->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
      
      $this->last_error = '';
      
      $this->ipn_log_file = '.ipn_results.log';
      $this->ipn_log = true; 
      $this->ipn_response = '';
                                                                
      // populate $fields array with a few default values.  See the paypal
      // documentation for a list of fields and their data types. These defaul
      // values can be overwritten by the calling script.

      $this->add_field('rm','2');           // Return method = POST
      $this->add_field('cmd','_xclick'); 
      
   }
   
   function add_field($field, $value) {
      
      // adds a key=>value pair to the fields array, which is what will be 
      // sent to paypal as POST variables.  If the value is already in the 
      // array, it will be overwritten.
            
      $this->fields["$field"] = $value;
   }

   function submit_paypal_post() {
 
      // this function actually generates an entire HTML page consisting of
      // a form with hidden elements which is submitted to paypal via the 
      // BODY element's onLoad attribute.  We do this so that you can validate
      // any POST vars from you custom form before submitting to paypal.  So 
      // basically, you'll have your own form which is submitted to your script
      // to validate the data, which in turn calls this function to create
      // another hidden form and submit to paypal.
 
      // The user will briefly see a message on the screen that reads:
      // "Please wait, your order is being processed..." and then immediately
      // is redirected to paypal.

      echo "<html>\n";
      echo "<head><title>Processing Payment...</title></head>\n";
      echo "<body onLoad=\"document.forms['paypal_form'].submit();\">\n";
   //   echo "<center><h2>Please wait, your order is being processed and you";
    //  echo " will be redirected to the paypal website.</h2></center>\n";
      echo "<form method=\"post\" name=\"paypal_form\" ";
      echo "action=\"".$this->paypal_url."\">\n";

      foreach ($this->fields as $name => $value) {
         echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
      }
      //echo "<center><br/><br/>If you are not automatically redirected to ";
     // echo "paypal within 5 seconds...<br/><br/>\n";
     // echo "<input type=\"submit\" value=\"Click Here\"></center>\n";
      
      echo "</form>\n";
      echo "</body></html>\n";
    
   }
   
   function validate_ipn() {

      // parse the paypal URL
      $url_parsed=parse_url($this->paypal_url);        

      // generate the post string from the _POST vars aswell as load the
      // _POST vars into an arry so we can play with them from the calling
      // script.
      $post_string = '';    
      foreach ($_POST as $field=>$value) { 
         $this->ipn_data["$field"] = $value;
         $post_string .= $field.'='.urlencode(stripslashes($value)).'&'; 
      }
      $post_string.="cmd=_notify-validate"; // append ipn command

      // open the connection to paypal
      $fp = fsockopen($url_parsed[host],"80",$err_num,$err_str,30); 
      if(!$fp) {
          
         // could not open the connection.  If loggin is on, the error message
         // will be in the log.
         $this->last_error = "fsockopen error no. $errnum: $errstr";
         $this->log_ipn_results(false);       
         return false;
         
      } else { 
 
         // Post the data back to paypal
         fputs($fp, "POST $url_parsed[path] HTTP/1.1\r\n"); 
         fputs($fp, "Host: $url_parsed[host]\r\n"); 
         fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n"); 
         fputs($fp, "Content-length: ".strlen($post_string)."\r\n"); 
         fputs($fp, "Connection: close\r\n\r\n"); 
         fputs($fp, $post_string . "\r\n\r\n"); 

         // loop through the response from the server and append to variable
         while(!feof($fp)) { 
            $this->ipn_response .= fgets($fp, 1024); 
         } 

         fclose($fp); // close connection

      }
      
      if (eregi("VERIFIED",$this->ipn_response)) {
  
         // Valid IPN transaction.
         $this->log_ipn_results(true);
         return true;       
         
      } else {
  
         // Invalid IPN transaction.  Check the log for details.
         $this->last_error = 'IPN Validation Failed.';
         $this->log_ipn_results(false);   
         return false;
         
      }
      
   }
   
   function log_ipn_results($success) {
       
      if (!$this->ipn_log) return;  // is logging turned off?
      
      // Timestamp
      $text = '['.date('m/d/Y g:i A').'] - '; 
      
      // Success or failure being logged?
      if ($success) $text .= "SUCCESS!\n";
      else $text .= 'FAIL: '.$this->last_error."\n";
      
      // Log the POST variables
      $text .= "IPN POST Vars from Paypal:\n";
      foreach ($this->ipn_data as $key=>$value) {
         $text .= "$key=$value, ";
      }
 
      // Log the response from the paypal server
      $text .= "\nIPN Response from Paypal Server:\n ".$this->ipn_response;
      
      // Write to log
      $fp=fopen($this->ipn_log_file,'a');
      fwrite($fp, $text . "\n\n"); 

      fclose($fp);  // close file
   }

   function dump_fields() {
 
      // Used for debugging, this function will output all the field/value pairs
      // that are currently defined in the instance of the class using the
      // add_field() function.
      
      echo "<h3>paypal_class->dump_fields() Output:</h3>";
      echo "<table width=\"95%\" border=\"1\" cellpadding=\"2\" cellspacing=\"0\">
            <tr>
               <td bgcolor=\"black\"><b><font color=\"white\">Field Name</font></b></td>
               <td bgcolor=\"black\"><b><font color=\"white\">Value</font></b></td>
            </tr>"; 
      
      ksort($this->fields);
      foreach ($this->fields as $key => $value) {
         echo "<tr><td>$key</td><td>".urldecode($value)."&nbsp;</td></tr>";
      }
 
      echo "</table><br>"; 
   }
} //paypal_class ends    



class Checkout extends CI_Controller {


    function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('checkout_model');
		
	}
	
	public function index()
	{
		$buyAmount = $this->input->post('buyAmount');
		$data['buy_amount'] = $buyAmount;
		$data['session'] = $this->input->post('session');
		$data['main_content'] = 'checkout_view';		
		$this->load->view('includes/template', $data);
	}
	
	public function free_trial()
	{
		$data['main_content'] = 'free_trial';		
		$this->load->view('includes/template', $data);
	}
	
	public function successForm($resArray)
	{
		//print_r($resArray); die();
		
		$tsId = $this->uri->segment(3);
		$status = $this->uri->segment(4);
		$data['tsId'] = $tsId;
		$data['status'] = $status;
		$data['main_content'] = 'successForm';		
		$this->load->view('includes/template', $data);
	}
		
	public function checkoutValidation()
	{
		//////////////////////////////////////////
		
		if($this->input->post('submit')){//print_r($_POST);die;
		
		$this->form_validation->set_error_delimiters('<div class="err">', '</div>');
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('lastname', 'last name', 'trim|required');
		$this->form_validation->set_rules('address1', 'Address1', 'trim|required');
		$this->form_validation->set_rules('address2', 'Address2', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
		$this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
		
			if($this->form_validation->run() == FALSE){
				$data['main_content'] = 'payumoneyForm';		
				$this->load->view('includes/template', $data);	
			}else {
				
				print_r($_POST);//die;
			/*Array ( [key] => JBZaLc [hash] => [txnid] => 292c74d972322464077f [amount] => 15 [firstname] => fghfgh [email] => gurjeet@revinfotech.com [phone] => 56456456 [productinfo] => tryrt [surl] => [furl] => [service_provider] => 292c74d972322464077f [lastname] => rtyrty [address1] => trytr [address2] => rtytr [city] => rtyr [state] => rtyrt [country] => rtyrt [zipcode] => ytry [submit] => Submit ) */
				////////////////////////////////////////////////////////////////////////
				// Merchant key here as provided by Payu
			$MERCHANT_KEY = "JBZaLc";

			// Merchant Salt as provided by Payu
			$SALT = "GQs7yium";

			// End point - change to https://secure.payu.in for LIVE mode
			$PAYU_BASE_URL = "https://test.payu.in";

			$action = '';

			$posted = array();
			if(!empty($_POST)) {
			   // print_r($_POST);die;
			  foreach($_POST as $key => $value) {    
			    $posted[$key] = $value; 
				
			  }
			}

			$formError = 0;

			if(empty($posted['txnid'])) {
				echo 'c'; die();
			  // Generate random transaction id
			  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
			} else {

			  $txnid = $posted['txnid'];
			  //echo $txnid; die();
			}
			$hash = '';
			// Hash Sequence
			$hashSequence = "key|txnid|amount|firstname|email";
			if(empty($posted['hash']) && sizeof($posted) > 0) {
				
			  
			    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
				$hashVarsSeq = explode('|', $hashSequence);
			    $hash_string = '';	
		//	echo "<hr>";print_r($hashVarsSeq);   
				foreach($hashVarsSeq as $hash_var) {
			      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
			      $hash_string .= '|';
				}

			    $hash_string .= $SALT;

 //echo "<hr>";print_r($hash_string); die();
			    $hash = strtolower(hash('sha512', $hash_string));
			    $action = $PAYU_BASE_URL . '/_payment';
			 // }
			} elseif(!empty($posted['hash'])) {
				echo 'b'; die();
			  $hash = $posted['hash'];
			  $action = $PAYU_BASE_URL . '/_payment';
			}
		//echo $hash;
			}
		}
				//---------------------------------------
				$data['posted'] = $_POST;	
				$data['action'] = $action;	$data['hash'] = $hash;$data['buy_amount'] = $_POST['amount'];	
				$data['main_content'] = 'payumoneyForm';	
				$this->load->view('includes/template', $data);	
				//---------------------------------------
		//////////////////////////////////////////
		//$data['main_content'] = $action;	
//		redirect($action, 'refresh');	
		//$this->load->view('includes/template', $data);
	}
	

	public function paypal()
	{
		$p = new paypal_class;             // initiate an instance of the class
		$p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   // testing paypal url
		//$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url
		            
		// setup a variable for this script (ie: 'http://www.micahcarrick.com/paypal.php')
		$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		$string = $_SERVER['HTTP_HOST'];
		$toptal_pos = strpos($string,'toptals');
		if($toptal_pos>0){
			$first_dot = strpos($string,'.');
			$subdomain = substr($string,0,$first_dot);
			$organization_query = mysql_query("SELECT * FROM `organization` WHERE `subdomain`='$subdomain'");
			$organization = mysql_fetch_array($organization_query); 
			$organization_id = $organization['id'];
		}
		// if there is not action variable, set the default action of 'process'
		if (empty($_GET['action'])) $_GET['action'] = 'process';  

		switch ($_GET['action']) {
		    
		   case 'process':      // Process and order...

		      // There should be no output at this point.  To process the POST data,
		      // the submit_paypal_post() function will output all the HTML tags which
		      // contains a FORM which is submited instantaneously using the BODY onload
		      // attribute.  In other words, don't echo or printf anything when you're
		      // going to be calling the submit_paypal_post() function.
		 
		      // This is where you would have your form validation  and all that jazz.
		      // You would take your POST vars and load them into the class like below,
		      // only using the POST values instead of constant string expressions.
		 
		      // For example, after ensureing all the POST variables from your custom
		      // order form are valid, you might have:
		      //
		      // $p->add_field('first_name', $_POST['first_name']);
		      // $p->add_field('last_name', $_POST['last_name']);
		      echo "Please wait while we are redirecting you to the paypal website...";
		      $CatDescription = $_REQUEST['CatDescription'];
		      $payment = $_REQUEST['payment'];
		      $id = $_REQUEST['id'];
		      $key = $_REQUEST['key'];

		      $p->add_field('business', 'harish-facilitator@revinfotech.com'); //put the paypal email id where you want to receive payment
		      $p->add_field('return', $this_script.'?action=success&organization_id='.$organization_id);
		      
		      $p->add_field('cancel_return', $this_script.'?action=cancel');
		      $p->add_field('notify_url', $this_script.'?action=ipn');
		      $p->add_field('item_name', $CatDescription);
		      $p->add_field('amount', $payment);
		      $p->add_field('key', $key);
		      $p->add_field('item_number', $id);
		      

		      $p->submit_paypal_post(); // submit the fields to paypal
		      //$p->dump_fields();      // for debugging, output a table of all the fields
		      break;
		      
		   case 'success':      // Order was successful...
		   
		      // This is where you would probably want to thank the user for their order
		      // or what have you.  The order information at this point is in POST 
		      // variables.  However, you don't want to "process" the order until you
		      // get validation from the IPN.  That's where you would have the code to
		      // email an admin, update the database with payment status, activate a
		      // membership, etc.  
		   	    
		   	

				$payment_insert_data = array(
			'organization_id' => $_GET['organization_id'],
			'owner_email' => $_POST['payer_email'],
			'fisrtname' => $_POST['first_name'],
			'lastname'    => $_POST['last_name'],
			'amount' => $_POST['payment_gross'],
			'time_stamp'    => $_POST['payment_date'],
			'correlation_id'    => '',
			'ack'    => 'Success',
			'version' => $_POST['notify_version'],
			'build'    => '',
			'avs_code'    => 'X',
			'ccv_match'    => 'M',
			'transacton_id' => $_POST['txn_id'],
			'date_added'    => date('Y-m-d h:i:s')					
			);
			$this->db->insert("credit_card_payment",$payment_insert_data);
	
	 		
				$this->checkout_model-> after_payment_insert($_GET['organization_id'],$_POST['payment_gross'],'','paypal');
		        $this->checkout_model-> after_payment_session_insert($_GET['organization_id'], $_POST['payment_gross'],'');
				
		       header('location:http://'.$_SERVER['HTTP_HOST'].'/index.php/checkout/successForm/'.$_POST['txn_id'].'/'.$_POST['payment_status']);
		      
		      
		      //foreach ($_POST as $key => $value) { $data[$key] .= $value; }
		      		  
		      // You could also simply re-direct them to another page, or your own 
		      // order status page which presents the user with the status of their
		      // order based on a database (which can be modified with the IPN code 
		      // below).
		      
		      break;
		      
		   case 'cancel':       // Order was canceled...

		      // The order was canceled before being completed.
		 
		 
		      echo "<br/><p><b>The order was canceled!</b></p><br /> Please return to the <a href=\"http://".$_SERVER['HTTP_HOST']."/plan\">plan's page</a>";
		    foreach ($_POST as $key => $value) { echo "$key: $value<br>"; }
		      
		      break;
		      
		   case 'ipn':          // Paypal is calling page for IPN validation...
		   
		      // It's important to remember that paypal calling this script.  There
		      // is no output here.  This is where you validate the IPN data and if it's
		      // valid, update your database to signify that the user has payed.  If
		      // you try and use an echo or printf function here it's not going to do you
		      // a bit of good.  This is on the "backend".  That is why, by default, the
		      // class logs all IPN data to a text file.
		      
		      if ($p->validate_ipn()) { 
		          
		         // Payment has been recieved and IPN is verified.  This is where you
		         // update your database to activate or process the order, or setup
		         // the database with the user's order details, email an administrator,
		         // etc.  You can access a slew of information via the ipn_data() array.
		  
		         // Check the paypal documentation for specifics on what information
		         // is available in the IPN POST variables.  Basically, all the POST vars
		         // which paypal sends, which we send back for validation, are now stored
		         // in the ipn_data() array.
		  
		         // For this example, we'll just email ourselves ALL the data.
		         $dated = date("D, d M Y H:i:s", time()); 
		         
		         $subject = 'Instant Payment Notification - Recieved Payment';
		         $to = 'hb@supertec.com';    //  your email
		         $body =  "An instant payment notification was successfully recieved\n";
		         $body .= "from ".$p->ipn_data['payer_email']." on ".date('m/d/Y');
		         $body .= " at ".date('g:i A')."\n\nDetails:\n";
		         $headers = "";
		         $headers .= "From: Test Paypal \r\n";
		         $headers .= "Date: $dated \r\n";
		        
		        $PaymentStatus =  $p->ipn_data['payment_status']; 
		        $Email        =  $p->ipn_data['payer_email'];
		        $id           =  $p->ipn_data['item_number'];
		        
		        if($PaymentStatus == 'Completed' or $PaymentStatus == 'Pending'){
		            $PaymentStatus = '2';
		        }else{
		            $PaymentStatus = '1';
		        }
		        /*                                                                           
		        *
		        * 
		        *
		        *      Here you write your quries to make payment received or pending etc. 
		        * 
		        *  
		        * 
		        */
		        foreach ($p->ipn_data as $key => $value) { $body .= "\n$key: $value"; }
		        //fopen("http://www.virtualphoneline.com/admins/TestHMS.php?to=".urlencode($to)."&subject=".urlencode($subject)."&message=".urlencode($body)."&headers=".urlencode($headers)."","r");         
		  } 
		      break;
		 }
	}




	public function paypal_entry()
	{
		include(APPPATH.'libraries/callerService.php');
		if($this->input->post('submit')){//print_r($_POST);die;
		$this->form_validation->set_error_delimiters('<div class="err">', '</div>');
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lname', 'last name', 'trim|required');
		$this->form_validation->set_rules('ftotal', 'Amount', 'trim|required');
		$this->form_validation->set_rules('creditCardNumber', 'Card Number', 'trim|required');
		$this->form_validation->set_rules('cvv2Number', 'CVV Number', 'trim|required');
		$data['buy_amount']=$this->input->post('buy_amount');
			if($this->form_validation->run() == FALSE){
				$data['main_content'] = 'creditcardForm';		
				$this->load->view('includes/template', $data);	
			}else {
			/*** Get required parameters from the web form for the request ***/
			$paymentType =urlencode( $_POST['paymentType']);
			$firstName =urlencode( $_POST['fname']);
			$lastName =urlencode( $_POST['lname']);
			$creditCardType =urlencode( $_POST['creditCardType']);
			$creditCardNumber = urlencode($_POST['creditCardNumber']);
			$expDateMonth =urlencode( $_POST['expDateMonth']);
			//Month must be padded with leading zero
			$padDateMonth = str_pad($expDateMonth, 2, '0', STR_PAD_LEFT);
			$expDateYear =urlencode( $_POST['expDateYear']);
			$cvv2Number = urlencode($_POST['cvv2Number']);
			$amount = urlencode($_POST['ftotal']);
			$organization_id = $_POST['organization_id'];
			$owner_email = $_POST['owner_email'];
			$currencyCode="USD";
			$session=$_POST['session'];
			/* Construct the request string that will be sent to PayPal.
			The variable $nvpstr contains all the variables and is a
			name value pair string with & as a delimiter */
			$nvpstr="&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber&EXPDATE=".$padDateMonth.$expDateYear."&CVV2=$cvv2Number&FIRSTNAME=$firstName&COUNTRYCODE=US&CURRENCYCODE=$currencyCode";
			//echo $nvpstr; die();
			/* Make the API call to PayPal, using API signature.
			The API response is stored in an associative array called $resArray */
			$resArray=hash_call("doDirectPayment",$nvpstr);
			//print_r($resArray); die();
			/* Display the API response back to the browser.
			If the response from PayPal was a success, display the response parameters'
			If the response was an error, display the errors received using APIError.php.
			*/
			$ack = strtoupper($resArray["ACK"]);
		//echo "#$";print_r($_POST);echo "$#";die;	//echo $ack; die();
			if($ack!="SUCCESS")  {
			$_SESSION['reshash']=$resArray;
				$data['main_content'] = 'creditcardForm';		
				$this->load->view('includes/template', $data);	
			}
			if($ack=="SUCCESS")  {
				$this->checkout_model->creditcard_data_insert($resArray,$organization_id,$owner_email);
	 	
				$this->checkout_model-> after_payment_insert($organization_id,$amount,$session,'creditcard');
		        $this->checkout_model-> after_payment_session_insert($organization_id, $amount,$session);
				
				//here will add function for the payment session counting in two tables
				header('location:http://'.$_SERVER['HTTP_HOST'].'/index.php/checkout/successForm/'.$resArray['TRANSACTIONID'].'/'.$resArray['ACK']);
				
				//redirect('checkout/successForm/'.$resArray['TRANSACTIONID'].'/'.$resArray['ACK'],'refresh');
				// $data['res'] = $resArray;
				// $data['main_content'] = 'successForm';		
				// $this->load->view('includes/template', $data);
				} 
			}
		}
	}

	
	public function checkoutform()
	{
			$checkoutPayment = $this->input->post('checkoutPayment');
			$buyAmount = $this->input->post('buyAmount');
			$session = $this->input->post('session');
			if($checkoutPayment == 'creditcard'){
				$data['buy_amount'] = $buyAmount;
				$data['session'] = $session;
				$data['main_content'] = 'creditcardForm';		
				$this->load->view('includes/template', $data);
			}else if($checkoutPayment == 'paypal'){
				//echo 'b'; die();
				$data['buy_amount'] = $buyAmount;
				$data['main_content'] = 'paypalForm';		
				$this->load->view('includes/template', $data);
			}else if($checkoutPayment == 'payumoney'){
				$data['buy_amount'] = $buyAmount;
				redirect('checkout/payumoney/amount/'.$buyAmount, 'refresh');
				//$data['main_content'] = 'payumoneyForm';		
				//$this->load->view('includes/template', $data);
			}
	}
	
////////////////////////////////////////////////
	public function payumoney(){ 
		$get = $this->uri->uri_to_assoc();
		$buy_amount=$get['amount'];
		$data['buy_amount'] = $buy_amount;
		//////////////////////////////////////////
		
		if($this->input->post('submit')){//print_r($_POST);die;
		
		$this->form_validation->set_error_delimiters('<div class="err">', '</div>');
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('lastname', 'last name', 'trim|required');
		$this->form_validation->set_rules('address1', 'Address1', 'trim|required');
		$this->form_validation->set_rules('address2', 'Address2', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
		$this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
		
		/*	if($this->form_validation->run() == FALSE){
				$data['main_content'] = 'payumoneyForm';		
				$this->load->view('includes/template', $data);	
			}else {*/
				
				//print_r($_POST);die;
			/*Array ( [key] => JBZaLc [hash] => [txnid] => 292c74d972322464077f [amount] => 15 [firstname] => fghfgh [email] => gurjeet@revinfotech.com [phone] => 56456456 [productinfo] => tryrt [surl] => [furl] => [service_provider] => 292c74d972322464077f [lastname] => rtyrty [address1] => trytr [address2] => rtytr [city] => rtyr [state] => rtyrt [country] => rtyrt [zipcode] => ytry [submit] => Submit ) */
				////////////////////////////////////////////////////////////////////////
				// Merchant key here as provided by Payu
			$MERCHANT_KEY = "JBZaLc";

			// Merchant Salt as provided by Payu
			$SALT = "GQs7yium";

			// End point - change to https://secure.payu.in for LIVE mode
			$PAYU_BASE_URL = "https://test.payu.in";

			$action = '';

			$posted = array();
			if(!empty($_POST)) {
			   // print_r($_POST);die;
			  foreach($_POST as $key => $value) {    
			    $posted[$key] = $value; 
				
			  }
			}

			$formError = 0;

			if(empty($posted['txnid'])) {
				//echo 'c'; die();
			  // Generate random transaction id
			  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
			} else {

			  $txnid = $posted['txnid'];
			  //echo $txnid; die();
			}
			$hash = '';
			// Hash Sequence
		//	print_r($posted);die();
			$hashSequence = "key|txnid|amount|firstname|email";
			if(empty($posted['hash']) && sizeof($posted) > 0) {
				
			  
			    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
				$hashVarsSeq = explode('|', $hashSequence);
			    $hash_string = '';	
		//	echo "<hr>";print_r($hashVarsSeq);   
				foreach($hashVarsSeq as $hash_var) {
			      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
			      $hash_string .= '|';
				}

			    $hash_string .= $SALT;

 //echo "<hr>";print_r($hash_string); die();
			    $hash = strtolower(hash('sha512', $hash_string));
			    $action = $PAYU_BASE_URL . '/_payment';
			 // }
			} elseif(!empty($posted['hash'])) {
			//	echo 'b'; die();
			  $hash = $posted['hash'];
			  $action = $PAYU_BASE_URL . '/_payment';
			}
		//echo $hash;
/*			}*/
		}
				//---------------------------------------
				$data['posted'] = $_POST;
				if(isset($txnid)||isset($action)){	
				$data['action'] = $action;	$data['hash'] = $hash;//$data['buy_amount'] = $_POST['amount'];	
				$data['txnid'] = $txnid;
				}else{
				$data['action'] = '';	$data['hash'] = '';	
				$data['txnid'] = '';	
				}
				//---------------------------------------
		//////////////////////////////////////////
		
		
		$data['main_content'] = 'payumoneyForm';		
        $this->load->view('includes/template', $data);	
	}
/////////////////////////////////////////////////

	
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */