<?php
require_once 'CONFIG.php';

//if(isUserLoggedIn()){
    $templateParams["titolo"] = "NetGamers - Profile";
    $templateParams["nome"] = "profile.php";
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }
//} else {
 //   header("location:login.php?a=1");
//}

require 'template/base.php';

?>