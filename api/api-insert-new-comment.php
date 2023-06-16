<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST"){  // se utente è loggato e se c'è invio con POST
//newComment($SrcUserId, $postId, $img, $text)
    $currentUserComment= $dbh->newComment($_SESSION["userID"], $_POST["postId"], $_POST["CommentText"]);
    if($currentUserComment === TRUE){ // tutto ok
        header("location: ../post.php?p=".$_POST["postId"]."&r=0");
    } else {
        header("location: ../post.php?p=".$_POST["postId"]."&r=2"); //errore inserimento post in db
    }
}
?>