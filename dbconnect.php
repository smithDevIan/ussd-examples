<?php 

//Connection Credentials
$servername = 'localhost';
$username = 'root';
$password = "";
$database = "ussd-sms";
$dbport = 3306;



    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        header('Content-type: text/plain');
        die("END An error was encountered. Please try again later");
    } 



?>