<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php'; // contiene sanitizeInput() e checkPassword()

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST" && isImageChosen()){ // se utente è loggato e se c'è invio con POST
    if(areAllFieldsSet()){
        list($resultUpload, $msg, $finalImgPath) = uploadImage("../".UPLOAD_USERIMG_DIR, $_FILES["userImg"]);
    
        if($resultUpload == 1){ //upload completato con successo in cartella upload/userImages, ma non in DB
            $altText = $_POST['altText'];
            $longDesc = $_POST['longDesc'];
            $idUserImg = $dbh->addImg($altText, $longDesc, $finalImgPath); //inserisce nuova img in db
            $resIdUserImg = $idUserImg[0]['ID']; //ottiene id di img caricata
    
            $resChangeImg = $dbh->updateUserImg($_SESSION["username"], $resIdUserImg); //aggiorna img di utente
    
            if($resChangeImg == 0){ 
                $_SESSION["userImg"] = $finalImgPath;
                header("location: ../account.php?i=0"); // tutto ok -> img modificata
            } else {
                header("location: ../account.php?i=1"); // errore inserimento in db -> img non modificata
            }
        } else {
            header("location: ../account.php?i=2"); // errore in upload -> img non modificata
        }
    } else {
        header("location: ../account.php?i=5"); // altText e longDesc non specificati -> img non modificata
    }
}

function isImageChosen(){
    return isset($_FILES["userImg"]);
}

function areAllFieldsSet(){
    return isset($_POST['altText'], $_POST['longDesc']) && strlen($_POST['altText']) >= 10 && strlen($_POST['longDesc']) >= 20;
}
?>