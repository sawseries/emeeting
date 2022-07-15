<?php

require_once './app/Base.php';

function subcode() {
    
    $base = new Base();
    $sub = $base->query("select max(id)+1 as mx from meeting_term")->one();
    if(empty($sub["mx"])){
         return "S1";
    }else{
        return "S" . $sub["mx"];     
    }
}

?>