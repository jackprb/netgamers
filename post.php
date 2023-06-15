<?php
require_once 'CONFIG.php';

if(isUserLoggedIn()){
    $templateParams["titolo"] = "NetGamers - Post";
    $templateParams["nome"] = "post.php";
    
    if(!isset($_GET['p']) || (int) $_GET['p'] <= 0){
        header("location: error.php?u=3");
    }

} else {
    header("location:login.php?a=1");
}

require 'template/base.php';

?>