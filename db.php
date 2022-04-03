<?php

/*
	print('<div class="alert alert-danger" >');
	print('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
	print('Password Did Not Match');
	print('</div>');
*/

function sms($message,$mobileNumber)
{
//  $apiKey = urlencode('uECjNtH/7vM-mUKO9OM3bM3dwnBAdbVfemPnUN8qPU');
// 	// // Message details
// 	$numbers = array($mobileNumber);
// 	 $sender = urlencode('TXTLCL');
// 	 $message = rawurlencode($message);
// 	$numbers = implode(',', $numbers);
// 	//  Prepare data for POST request
// 	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
// 	// // Send the POST request with cURL
// 	 $ch = curl_init('https://api.textlocal.in/send/');
// 	 curl_setopt($ch, CURLOPT_POST, true);
// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	$response = curl_exec($ch);
// 	 curl_close($ch);   
// 	// // Process your response here
// 	echo $response;
$message = urlencode($message);
	$data = "username=alzohara.udp@gmail.com&hash=945c3181af49e4c8e3ff0815e1def3c12e71e9275fbf47d48ecd19b42265d562&message=".$message."&sender=DHDHAM&numbers=".$mobileNumber."&test=0";
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 $result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	echo $result;
}

	$dbhost= "localhost";
	$dbuser= "root";
	$dbpass="";
	$dbname="attendence";

	$link=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if ($link)
	{
		//echo 'done';
	}
	else
	{
		echo 'error';
	}
	// $apiKey = urlencode('uECjNtH/7vM-AeOquePIvmfKBdeZmWm1tYEli0hJG3');
	// // Message details
	// $numbers = array($mobileNumber);
	// $sender = urlencode('TXTLCL');
	// $message = rawurlencode($message);
	// $numbers = implode(',', $numbers);
	// // Prepare data for POST request
	// $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
	// // Send the POST request with cURL
	// $ch = curl_init('https://api.textlocal.in/send/');
	// curl_setopt($ch, CURLOPT_POST, true);
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// $response = curl_exec($ch);
	// curl_close($ch);   
	// // Process your response here
	// // echo $response;
	?>