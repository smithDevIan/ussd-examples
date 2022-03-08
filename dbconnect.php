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
    if ($conn->connect_error) {
      echo "Error connecting";
      die("Connection failed: " . $conn->connect_error);
    }else{
      echo "connected successfully";
    }
    



?>