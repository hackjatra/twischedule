<?php

if(!function_exists('mdie')){
    function mdie($message){
        echo "<pre>";
        print_r($message);
        die();
    }
}

if(!function_exists('ndie')){
    function ndie($message){
        echo "<pre>";
        print_r($message);
        
    }
}
