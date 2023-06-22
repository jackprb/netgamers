<?php
require_once 'CONFIG.php';

if(isUserLoggedIn()){
    $templateParams["titolo"] = "NetGamers - Modify comment";
    $templateParams["nome"] = "modifycomment.php";
    $templateParams["js"] = array("https://unpkg.com/axios/dist/axios.min.js","./api/js/get_notifications.js",
            "./api/js/read_notification.js");

    if(!isset($_GET['p']) || $_GET['p'] <= 0 || !isset($_GET['c']) || $_GET['c'] <= 0){
        header("location:error.php");
    }
} else {
    header("location:login.php?a=1");
}

require 'template/base.php';

?>