<?php
//include("utils.php") ;

function main_menu(){
    $text = "We invite you to fundraise by adopting a poll station.\nReply with:\n1.Yes \n2.No \n";
    ussd_proceed($text);
}



function ussd_proceed($text){
    echo "CON".$text;
}

function ussd_stop($text){
    echo "END".$text;
}
?>