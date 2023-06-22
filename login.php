<?php 
require_once 'CONFIG.php';

$templateParams["titolo"] = "NetGamers - Login";
$templateParams["nome"] = "login-form.php";

if(isUserLoggedIn()){
    header("location:account.php");
}

require 'template/base.php';
?>