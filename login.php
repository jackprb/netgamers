<?php 
require_once 'CONFIG.php';
require_once 'register.php';

if(isset($_POST["username"], $_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Controllare username o password!";
    } else{
        registerLoggedUser($login_result[0]);
        print_r($login_result[0]);
        setcookie("loggedin", "", time()+ (3600 * 6)); //cookie expires in 6 hours
    }
}

if(isUserLoggedIn()){
    $templateParams["titolo"] = "NetGamers - Homepage";
    $templateParams["nome"] = "login-form.php";
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }
} else {
    $templateParams["titolo"] = "NetGamers - Login";
    $templateParams["nome"] = "login-form.php";
}

require 'template/base.php';
?>