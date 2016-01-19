<?php
$sdkConfig = array(
  "mode" => "sandbox"
);

$cred = new OAuthTokenCredential("AQkquBDf1zctJOWGKWUEtKXm6qVhueUEMvXO_-MCI4DQQ4-LWvkDLIN2fGsd","EL1tVxAjhT7cJimnz5-Nsx9k2reTKSVfErNQF-CmrwJgxRtylkGTKlU4RvrX", $sdkConfig);

$sdkConfig = array(
  "mode" => "sandbox"
);

$cred = "Bearer A015d7Hgq2BK1aZBmgfBDDc5CfMZpSlU.dXo7HDGvUT7y-k";
$apiContext = new ApiContext($cred, 'Request' . time());
$apiContext->setConfig($sdkConfig);

$card = new CreditCard();
$card->setType("visa");
$card->setNumber("4446283280247004");
$card->setExpire_month("11");
$card->setExpire_year("2018");
$card->setFirst_name("Joe");
$card->setLast_name("Shopper");


$fundingInstrument = new FundingInstrument();
$fundingInstrument->setCredit_card($card);

$payer = new Payer();
$payer->setPayment_method("credit_card");
$payer->setFunding_instruments(array($fundingInstrument));

$amount = new Amount();
$amount->setCurrency("USD");
$amount->setTotal("12");

$transaction = new Transaction();
$transaction->setAmount($amount);
$transaction->setDescription("creating a direct payment with credit card");

$payment = new Payment();
$payment->setIntent("sale");
$payment->setPayer($payer);
$payment->setTransactions(array($transaction));

$payment->create($apiContext);

Payment Completed for Payment Id: PAY-0XE96410E82554217KUN6PAQ Payment Status: approved 
?>