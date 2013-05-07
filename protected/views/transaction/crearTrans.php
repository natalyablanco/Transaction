<?php
require_once('GWebService\nusoap\nusoap.php');
	$client = new nusoap_client("https://esitef-homologacao.softwareexpress.com.br/e-sitef/Payment2?wsdl",true);
	//$client = new nusoap_client("https://esitef-homologacao.softwareexpress.com.br/e-sitef-hml/Payment2?wsdl",true);
	//$client = new nusoap_client("https://esitef-homologacao.softwareexpress.com.br/esitef/Payment2?wsdl", true);
	
	$err = $client->getError();
	
	if ($err) {
		echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
		echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->getDebug(), 
		ENT_QUOTES) . '</pre>';
		exit();
	}


	$transactionRequest = array('transactionRequest' => array
														(
															'amount' => '1012',
															'merchantId' => 'TESTSTORE',
															'merchantUSN' => '19945x9576',
															'orderId' => '19949576'
														));
	$payment = $client->getProxy();

	try{
		$transactionResponse = $payment->beginTransaction($transactionRequest);
	}catch(Exception $e){
		echo "holaaa222";
		echo $e->getmessage();
	}
	
	$nit = $transactionResponse['transactionResponse']['nit'];
	$paymentRequest = array('paymentRequest' => array
												(
													'authorizerId' => '1',
													'autoConfirmation' => 'true',
													'cardExpiryDate' => '1016',
													'cardNumber' => '4563470000000000004',
													'cardSecurityCode' => '12345',
													'customerId' => 'TEST',
													'extraField' => 'bonus',
													'installmentType' => '3',
													'installments' => '1',
													'nit' => $nit
												));
	$result = $payment->doPayment($paymentRequest);

	if ($client->fault) {
		echo '<h2>Fault</h2><pre>';
		print_r($result);
		echo '</pre>';
	} else {
		$err = $client->getError();
		
		if ($err) {
			echo '<h2>Error</h2><pre>' . $err . '</pre>';
		} else {
			echo '<h2>Result</h2><pre>';
			print_r($result['paymentResponse']);
			echo '</pre>';
		}
	}
