<?php
require_once 'CONFIG.php';

if(isUserLoggedIn()){
    $templateParams["titolo"] = "NetGamers - Modify comment";
    $templateParams["nome"] = "modifycomment.php";
} else {
    header("location:login.php?a=1");
}

require 'template/base.php';

?>