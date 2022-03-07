<?php

// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = ltrim($_POST["phoneNumber"],'+');
$text        = $_POST["text"];

$textArray=explode('*', $text);
$userResponse=trim(end($textArray));


switch ($userResponse) {
    case '':
        $response  = "CON We invite you to fundraise by adopting a poll station.\nReply with:\n";
        $response .= "1.Yes \n";
        $response .= "2. No";
        break;
    
    case '1':
        $response .= "CON Please specify the poling station to adopt. \n";
        break;

    case '2':
        $response .= "END Thank you. \n";
        break;
    
    default:
        # code...
        break;
}
if ($userResponse=="1*1") {
    $response .= "CON Thank you, Reply with amount to contribute: \n";
    $response .= "1. 100 Ksh \n";
    $response .= "2. Other amount \n";
}
/*if ($text == "") {
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

}else if (!empty($incomming_text) && $text!=null){
        
    $response .= "CON Thank you, Reply with amount to contribute: \n";
    $response .= "1. 100 Ksh \n";
    $response .= "2. Other amount \n";

}else if ((!empty($incomming_text)||$text!=null) && $text=="1"){
    
    
    $response .= "END Thank you";

}*/

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;