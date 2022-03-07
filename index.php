<?php

// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];



if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON We invite you to fundraise by adopting a poll station.\nReply with:.\n";
    $response .= "1.Yes \n";
    $response .= "2. No";

} else if ($text == "1") {
    // Business logic for first level response
    $response .= "CON Please specify the poling station to adopt: \n";
    
    if($text == "1") { 
        // This is a second level response where the user selected 1 in the first instance
        $response .= "CON Thank you, Reply with amount to contribute: \n";
        $response .= "1. 100 Ksh \n";
        $response .= "2. Other amount \n";
    
    }
} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response .= "END Thank you ";

}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;