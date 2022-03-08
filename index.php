<?php
    //include("dbconnect.php");

	//2. receive the POST from AT
	$sessionId     =$_POST['sessionId'];
	$serviceCode   =$_POST['serviceCode'];
	$phoneNumber   =$_POST['phoneNumber'];
	$text          =$_POST['text'];


    //Check if user is in the database
    /*$stmt = $conn -> prepare("SELECT * FROM `sessions_table` WHERE sessionId= ? and phoneNumber=?");
    $stmt->bind_param("ii", $sessionId, $phoneNumber);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();*/

    
	//3. Explode the text to get the value of the latest interaction - think 1*1
    $inputs = [];
    if($text != ''){
        $inputs = explode('*', $text);
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