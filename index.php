<?php
    require_once('dbconnect.php');

	//2. receive the POST from AT
	$sessionId     =$_POST['sessionId'];
	$serviceCode   =$_POST['serviceCode'];
	$phoneNumber   =$_POST['phoneNumber'];
	$text          =$_POST['text'];


    //Check if user is in the database
    $sql = "SELECT * FROM `sessions_table` WHERE sessionId= ? and phoneNumber=?";
    if ($conn -> prepare($sql)) {
        $stmt->bind_param("ss", $sessionId, $phoneNumber);

        $sessionId = "vhbj2231";
        $phoneNumber = "+254741931015";
        $stmt->execute();

        echo "Records inserted successfully.";
    }
    else{
        echo "not created";
    }
    

    
    
    $text = '';
    switch(count($inputs)){
        case 0: 
            $text = "CON We invite you to fundraise by adopting a poll station.\nReply with:\n1.Yes \n2. No";
            break;
         case 1: 
            $input = $inputs[count($inputs)- 1];
            if($input == "1"){
                $text = "CON Please specify the poling station to adopt: \n";
            }else{
                $text="END Thank you";
            }
            break;
        case 2: 
            $text = "CON Thank you, Reply with amount to contribute:\n1. KES 100\n 2.Other amount";
            break;
        case 3: 
            $input = $inputs[count($inputs)- 1];
            if($input == "1"){
                $text = "END STK PUSH initiated. Please wait fpr the M-PESA pop up then enter your M-PESA PIN";
            }else{
                $text = "CON Please enter amount (KES)";
            }
            break; 
        case 4: 
            $text = "END STK PUSH initiated. Please wait fpr the M-PESA pop up then enter your M-PESA PIN";  
            break;            
    }
    // Echo the response back to the API
    header('Content-type: text/plain');
    echo $text;
?>