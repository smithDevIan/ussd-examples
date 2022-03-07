<?php
include("utils.php") ;

function main_menu(){
    ussd_proceed(Util::$introduction_message);
}



function ussd_proceed($text){
    echo "CON".$text;
}

function ussd_stop($text){
    echo "END".$text;
}
?>