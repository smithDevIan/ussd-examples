<?php

include("functions.php");
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

$data = explode("*",$text);

$level = 0;
$level = count($data);

if ($level ==0 || $level ==1) {
    main_main();
}
// Echo the response back to the API
header('Content-type: text/plain');
echo $response;