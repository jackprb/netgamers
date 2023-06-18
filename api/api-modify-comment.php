<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST"){  // se utente è loggato e se c'è invio con POST
    if(isset($_GET['c']) && isset($_GET['p'])){
        $currentUserComment= $dbh->modifyComment($_GET['c'], $_POST['CommentTxt']);
        if($currentUserComment === TRUE){ // tutto ok
            header("location: ../post.php?p=".$_GET['p']."&r=3");
        } else {
            header('location: ../modifycomment.php?p=c='.$_GET['c'].'p='.$_GET['p']."&r=1"); //errore aggiornamento in db
        }
    }else{
        header("location: ../error.php");
    }
}
?>