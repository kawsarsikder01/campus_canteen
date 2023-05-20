<?php

function d($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

function dd($var){
d($var);
die();
}
function location($url){
    header("location:$url");
}
$webroot = "http://campus_canteen.test".'/';
$docroot = $_SERVER['DOCUMENT_ROOT'];
$partialAdmin = $docroot.'/'.'campus_canteen'.'/'.'admin'.'/'.'partials'.'/';
$frontEndElement = $docroot.'/'.'campus_canteen'.'/'.'frontend'.'/'.'partials'.'/';
$adminSources = $docroot.'/'.'campus_canteen'.'/'.'admin'.'/'.'sources'.'/';
$frontEndSources =  $docroot.'/'.'campus_canteen'.'/'.'frontend'.'/'.'sources'.'/';