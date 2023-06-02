<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php'; // contiene sanitizeInput() e checkPassword()

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST"){ // se utente è loggato e se c'è invio con POST
    
    $nFollower = FALSE;
    $nComment = FALSE;
    $nPostFeed = FALSE;
    $nLikePost = FALSE;
    $nLikeComment = FALSE;

    if(isset($_POST['NFOLLOWER']) && $_POST['NFOLLOWER'] == "on"){ // notifica per nuovo follower
        $nFollower = TRUE;
    } else {
        $nFollower = FALSE;
    }

    if(isset($_POST['NCOMMENT']) && $_POST['NCOMMENT'] == "on"){ // notifica per nuovo commento
        $nComment = TRUE;
    } else {
        $nComment = FALSE;
    }

    if(isset($_POST['NPOSTFEED']) && $_POST['NPOSTFEED'] == "on"){ // notifica per nuovo post in feed
        $nPostFeed = TRUE;
    } else {
        $nPostFeed = FALSE;
    }
    
    if(isset($_POST['NLIKEPOST']) && $_POST['NLIKEPOST'] == "on"){ // notifica per nuovo like a post
        $nLikePost = TRUE;
    } else {
        $nLikePost = FALSE;
    }

    if(isset($_POST['NLIKECOMMENT']) && $_POST['NLIKECOMMENT'] == "on"){ // notifica per nuovo like a commento
        $nLikeComment = TRUE;
    } else {
        $nLikeComment = FALSE;
    }

    $result = $dbh->modifyNotificationSettings($nFollower, $nComment, $nPostFeed, $nLikePost, $nLikeComment, $_SESSION['userID']);
    if($result === TRUE){ //impostazioni modificate con successo
        header("location: ../account.php?n=0");
    } else { //impostazioni NON modificate
        header("location: ../account.php?n=1");
    }
}
?>