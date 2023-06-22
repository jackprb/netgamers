<?php
require_once 'CONFIG.php';

if(isUserLoggedIn()){
    $templateParams["titolo"] = "NetGamers - Profile";
    $templateParams["nome"] = "profile.php";
    $templateParams["js"] = array("https://unpkg.com/axios/dist/axios.min.js","./api/js/get_notifications.js",
            "./api/js/read_notification.js", "./api/js/follow-manager.js", "./api/js/get_followers_followed.js");
    
    if(!isset($_GET['u'])){
        header("location: profile.php?u=". $_SESSION['userID']);

    } else {
        $infoUser = $dbh->getUserDataByID($_GET['u']);
        if (count($infoUser) == 0){ // se utente cercato non esiste
            header("location: error.php?e=5");
        } 
    }

} else {
    header("location:login.php?a=1");
}

require 'template/base.php';
?>