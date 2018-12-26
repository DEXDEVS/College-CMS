<?php

	// $basic  = new \Nexmo\Client\Credentials\Basic('cac59791', 'a7w4558bZx9vpAoX');
	// $client = new \Nexmo\Client($basic);
	
	// $message = $client->message()->send([
 //    'to' => '923063772105',
 //    'from' => 'DEXDEVS',
 //    'text' => 'A text message sent using the Nexmo SMS API'
	// ]);


// // to send an sms message
$sms = new \dosamigos\nexmo\Sms(['key' => 'cac59791', 'secret' => 'a7w4558bZx9vpAoX', 'from' => 'SENDERID']);

// lets call the API to get a json response
$sms->format = 'json';

// send a message with an optional parameter (see Nexmo doc for more optional parameters)
$response = $sms->sendText('923063772105', 'DEXDEVS...\nThis is testing SMS from NEXMO Api....\n\n', ['clientRef' => 'YOURCLIENTREF']);

// if a response expects a JSON object, it will return as an array, if format was a XML, it will return an object.
echo $response['message-count']."<br>"; // the number of parts the message was split into
echo 	
	"<div class='col-md-12 alert alert-success text-center'>	
		<b>Message</b> has been send <b>Successfully...!</b>
	</div>";
?>