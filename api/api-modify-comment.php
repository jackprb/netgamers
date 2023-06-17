<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST"){  // se utente è loggato e se c'è invio con POST
//newComment($SrcUserId, $postId, $img, $text)
    $currentUserComment= $dbh->modifyComment($_POST["c"], $_POST["content"]);
    if($currentUserComment === TRUE){ // tutto ok
        header("location: ../modifycomment.php?c=".$_POST["c"]."&r=0");
    } else {
        header("location: ../modifycomment.php?c=".$_POST["c"]."&r=2"); //errore inserimento commento in db
    }
}
?>