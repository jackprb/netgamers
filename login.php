<?php 
require_once 'CONFIG.php';

$templateParams["titolo"] = "NetGamers - Login";
$templateParams["nome"] = "login-form.php";

if(isUserLoggedIn()){
    header("location:account.php");
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }
}

require 'template/base.php';
?>