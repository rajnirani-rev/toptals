<?php
/****************************************************
CallerService.php

This file uses the constants.php to get parameters needed to make an API call and calls the server.if you want use your own credentials, you have to change the constants.php

Called by TransactionDetails.php, ReviewOrder.php, DoDirectPaymentReceipt.php and DoExpressCheckoutPayment.php.

****************************************************/
set_time_limit(0);
//require_once 'constants.php';
require_once(APPPATH.'libraries/constants.php');

$API_UserName="jb-us-seller_api1.paypal.com";


$API_Password= "WX4WTU3S8MY44S7F";


$API_Signature="AFcWxV21C7fd0v3bYYYRCpSSRl31A7yDhhsPUU2XhtMoZXsWHFxu-RWy";


$API_Endpoint ="https://api-3t.sandbox.paypal.com/nvp";


$version= urlencode("53.0");

//session_start();

/**
  * hash_call: Function to perform the API call to PayPal using API signature
  * @methodName is name of API  method.
  * @nvpStr is nvp string.
  * returns an associtive array containing the response from the server.
*/


function hash_call($methodName,$nvpStr)
{
$API_UserName="jb-us-seller_api1.paypal.com"; 


$API_Password= "WX4WTU3S8MY44S7F";


$API_Signature="AFcWxV21C7fd0v3bYYYRCpSSRl31A7yDhhsPUU2XhtMoZXsWHFxu-RWy";


$API_Endpoint ="https://api-3t.sandbox.paypal.com/nvp";


$version= urlencode("53.0");
	//echo "string"; die();
	//declaring of global variables
	//global $API_Endpoint,$version,$API_UserName,$API_Password,$API_Signature,$nvp_Header;

	//setting the curl parameters.
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"https://api-3t.sandbox.paypal.com/nvp");
	curl_setopt($ch, CURLOPT_VERBOSE, 1);

	//turning off the server and peer verification(TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_POST, 1);
    //if USE_PROXY constant set to TRUE in Constants.php, then only proxy will be enabled.
   //Set proxy name to PROXY_HOST and port number to PROXY_PORT in constants.php 
	if(USE_PROXY)
	curl_setopt ($ch, CURLOPT_PROXY, PROXY_HOST.":".PROXY_PORT); 

	//NVPRequest for submitting to server
	$nvpreq="METHOD=".urlencode($methodName)."&VERSION=".urlencode("53.0")."&PWD=".urlencode("WX4WTU3S8MY44S7F")."&USER=".urlencode("jb-us-seller_api1.paypal.com")."&SIGNATURE=".urlencode("AFcWxV21C7fd0v3bYYYRCpSSRl31A7yDhhsPUU2XhtMoZXsWHFxu-RWy").$nvpStr;

	//setting the nvpreq as POST FIELD to curl
	curl_setopt($ch,CURLOPT_POSTFIELDS,$nvpreq);

	//getting response from server
	$response = curl_exec($ch);
//	print_r($response); die();
	//convrting NVPResponse to an Associative Array
	$nvpResArray=deformatNVP($response);
	$nvpReqArray=deformatNVP($nvpreq);
	$_SESSION['nvpReqArray']=$nvpReqArray;

	if (curl_errno($ch)) {
		// moving to display page to display curl errors
		  $_SESSION['curl_error_no']=curl_errno($ch) ;
		  $_SESSION['curl_error_msg']=curl_error($ch);
		  $location = "APIError.php";
		  header("Location: $location");
	 } else {
		 //closing the curl service
			curl_close($ch);
	  }

return $nvpResArray;
}

/** This function will take NVPString and convert it to an Associative Array and it will decode the response.
  * It is usefull to search for a particular key and displaying arrays.
  * @nvpstr is NVPString.
  * @nvpArray is Associative Array.
  */

function deformatNVP($nvpstr)
{

	$intial=0;
 	$nvpArray = array();


	while(strlen($nvpstr)){
		//postion of Key
		$keypos= strpos($nvpstr,'=');
		//position of value
		$valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

		/*getting the Key and Value values and storing in a Associative Array*/
		$keyval=substr($nvpstr,$intial,$keypos);
		$valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
		//decoding the respose
		$nvpArray[urldecode($keyval)] =urldecode( $valval);
		$nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
     }
	return $nvpArray;
}
?>
