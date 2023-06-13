<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php'; // contiene sanitizeInput() e checkPassword()

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST"){  // se utente è loggato e se c'è invio con POST

    if (areFieldsSet()){
        //mette nel database il post in base al tipo (immagine o solo testo)
        list($resultUpload, $msg, $finalImgPath) = uploadImage("../".UPLOAD_POSTIMG_DIR, $_FILES["postImg"]);
        if($resultUpload == 1){ //upload completato con successo in cartella upload/userImages, ma non in DB
            $altText = $_POST['altText'];
            $longDesc = $_POST['longDesc'];
        }
        if(isset($_FILE["postImg"])){
            $currentUserPost= $dbh->insertNewPostImg($_SESSION["userID"], $finalImgPath, $altText, $longDesc, $_POST["title"], $_POST["content"]);
            if($currentUserPost == 0){ // tutto ok 
                header("location: ../newpost.php?r=0");
            } else {
                header("location: ../newpost.php?r=3");
            }
        }else{
            $currentUserPost = $dbh->insertNewPost(NULL, $_SESSION["userID"], $_POST["title"], $_POST["content"]);
            if($currentUserPost == 0){ // tutto ok 
                header("location: ../newpost.php?r=0");
            } else {
                header("location: ../newpost.php?r=3");
            }
        }
    } else {
        header("location: ../newpost.php?r=1");
    }
} 

function areFieldsSet(){
    //capisce se un post con immagine ha tutti i campi richiesti o se un post senza immagine ha i campi richiesti
    if (isset($_POST["postImg"])){
        return isset($_POST["title"], $_POST["postImg"], $_POST["altText"], $_POST["longDesc"], $_POST["content"]);
    }else{
        return isset($_POST["title"], $_POST["content"]);
    }
}

?>