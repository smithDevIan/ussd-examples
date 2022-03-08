<?php


	//2. receive the POST from AT
	$sessionId     =$_POST['sessionId'];
	$serviceCode   =$_POST['serviceCode'];
	$phoneNumber   =$_POST['phoneNumber'];
	$text          =$_POST['text'];

	//3. Explode the text to get the value of the latest interaction - think 1*1
	$inputs = explode('*', $text);
	
	//4. Set the default level of the user
    $text = '';
    switch(inputs.count){
        case 0: 
            $text = "CON We invite you to fundraise by adopting a poll station.\nReply with:\n1.Yes \n2. No";
            break;
         case 1: 
            $input = $inputs[inputs.count - 1];
            if($input == "1"){
                $text = "CON Please specify the poling station to adopt: \n";
            }else{
                $text="END Thank you";
            }
            break;
        case 2: 
            $text = "CON Thank you, Reply with amount to contribute:\n1. KES 100 2. \nOther amount";
            break;
        case 3: 
            $input = $inputs[inputs.count - 1];
            if(input == 1){
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