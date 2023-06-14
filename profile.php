<?php
require_once 'CONFIG.php';

if(isUserLoggedIn()){
    $templateParams["titolo"] = "NetGamers - Profile";
    $templateParams["nome"] = "profile.php";
    $templateParams["js"] = array("https://unpkg.com/axios/dist/axios.min.js","./api/js/get_notifications.js",
            "./api/js/read_notification.js", "./api/js/follow-manager.js", "./api/js/get_followers_followed.js");
    
    if(!isset($_GET['u']) || (int) $_GET['u'] <= 0){
        header("location: profile.php?u=". $_SESSION['userID']);
    }

} else {
    header("location:login.php?a=1");
}

require 'template/base.php';

?>