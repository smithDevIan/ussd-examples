<?php

// Read the variables sent via POST from our API
//$sessionId   = $_POST["sessionId"];
//$serviceCode = $_POST["serviceCode"];
$phoneNumber = ltrim($_GET["phoneNumber"],'+');
$text        = $_GET["text"];

$incomming= explode('*', $text );
$incomming_text = $incomming[1];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON We invite you to fundraise by adopting a poll station.\nReply with:.\n";
    $response .= "1.Yes \n";
    $response .= "2. No";

} else if ($text == "1") {
    // Business logic for first level response
    $response .= "CON Please specify the poling station to adopt: \n";
    
} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response .= "END Thank you ";

}else if (empty($text)){
        
    $response .= "CON Please enter amount: \n";

}else if ($text=="1*1"){
    
    
    $response .= "END Thank you";

}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;