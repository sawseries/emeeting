<?php

require_once './app/Base.php';

function topcode() {
    
    $base = new Base();
    $top = $base->query("select max(id)+1 as mx from meeting")->one();
   
    if(empty($top["mx"])){
        return "T1";
   }else{
       return "T" . $top["mx"];     
   }
}


?>