<?php 

//Connection Credentials
$servername = '127.0.0.1';
$username = 'root';
$password = "";
$database = "ussd-sms";
$dbport = 3306;



    // Create connection
    $conn = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($conn === false) {
      die("ERROR: Could not connect. " . $conn->connect_error);
    }
      echo "connected successfully". $conn->host_info;
    



?>