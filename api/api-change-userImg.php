<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php'; // contiene sanitizeInput() e checkPassword()

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST" && isImageChosen()){ // se utente è loggato e se c'è invio con POST
    echo "files:"; print_r($_FILES);
    list($resultUpload, $msg, $finalImgPath) = uploadImage("../".UPLOAD_USERIMG_DIR, $_FILES["userImg"]);

    if($resultUpload == 1){ //upload completato con successo in cartella upload/userImages, ma non in DB
        $altText = $_SESSION["username"] . "'s profile image.";
        $longDesc = $_SESSION["username"] . "'s profile image. No more information provided.";
        $idUserImg = $dbh->addImg($altText, $longDesc, $finalImgPath); //inserisce nuova img in db
        $resIdUserImg = $idUserImg[0]['ID']; //ottiene id di img caricata

        $resChangeImg = $dbh->updateUserImg($_SESSION["username"], $resIdUserImg); //aggiorna img di utente

        if($resChangeImg == 0){ 
            header("location: ../account.php?i=0"); // tutto ok -> img modificata
        } else {
            header("location: ../account.php?i=1"); // errore inserimento in db -> img non modificata
        }
    } else {
        header("location: ../account.php?i=2"); // errore in upload -> img non modificata
    }
}

function isImageChosen(){
    return isset($_FILES["userImg"]);
}
?>