<?php

// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

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

}else if (!empty($incomming_text)||$text!=null){
    
    // This is a second level response where the user selected 1 in the first instance
    $response .= "CON Thank you, Reply with amount to contribute: \n";
    $response .= "1. 100 Ksh \n";
    $response .= "2. Other amount \n";

    if($text == "1" ) {
        echo "thanks";
    }else{
        $response .= "CON Enter amount you want to pay:  \n";
    }

}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;