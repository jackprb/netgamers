<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST"){ // se utente è loggato e se c'è invio con POST
    
    // ottiene post img 
    $postImg = $dbh->getPostImgByPostID($_POST['postID1']);
    $postImgPath = $postImg['path'];
    $postImgID = $postImg['ID'];

    // elimina post e tutti i commenti
    if($dbh->deletePost($_POST['postID1']) === TRUE){ //se post cancellato con successo
        $dbh->deletePostImg($postImgID); // cancella img dal DB 
        if(file_exists(".".UPLOAD_POSTIMG_DIR . $postImgPath)){ // se img esiste,
            unlink(".".UPLOAD_POSTIMG_DIR . $postImgPath); // la cancella dalla cartella upload/postImages
        }

        header('location: ../profile.php?d=0&u='.$_SESSION['userID']); // post cancellato
    } else {
        header("location: ../profile.php?d=1&u=".$_SESSION['userID']); //errore -> post non cancellato
    }
}
?>