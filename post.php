<?php
require_once 'CONFIG.php';

if(isUserLoggedIn()){
    $templateParams["titolo"] = "NetGamers - Post";
    $templateParams["nome"] = "post.php";
    $templateParams["js"] = array("https://unpkg.com/axios/dist/axios.min.js","./api/js/get_notifications.js",
            "./api/js/read_notification.js", "./api/js/get_comments.js", "./api/js/like-manager.js");
    
    if(!isset($_GET['p']) || (int) $_GET['p'] <= 0){
        header("location: error.php?u=3");
    }

} else {
    header("location:login.php?a=1");
}

require 'template/base.php';

?>