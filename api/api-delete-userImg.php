<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST"){ // se utente è loggato e se c'è invio con POST
    
    // ottiene user img attuale
    $currUserImg = $dbh->getUserImgByUserID($_SESSION['userID']);
    $currUserImgPath = $currUserImg['path'];
    $currUserImgID = $currUserImg['ID'];

    if($dbh->setDefaultUserImg($_SESSION["username"]) == 0){ //reimposta img utente di default
        $_SESSION["userImg"] = "default.png";

        $dbh->deleteUserImg($currUserImgID); // cancella img dal DB 
        if(file_exists(".".UPLOAD_USERIMG_DIR . $currUserImgPath)){ // se img esiste,
            unlink(".".UPLOAD_USERIMG_DIR . $currUserImgPath); // la cancella dalla cartella upload/userImages
        }

        header('location: ../account.php?i=3'); // img profilo utente cancellata -> ritorna img di default
    } else {
        header("location: ../account.php?i=4"); //errore -> img profilo non cancellata
    }
}
?>