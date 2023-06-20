<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST"){  // se utente è loggato e se c'è invio con POST

    if(isImageChosen()){ // post con immagine
        if(areFieldsSetPostImage()){
            // uploads image in UPLOAD_POSTIMG_DIR
            list($resultUpload, $msg, $finalImgPath) = uploadImagePost("../".UPLOAD_POSTIMG_DIR, $_FILES["postImg"]);
            if($resultUpload == 1){ //upload completato con successo in cartella upload/postImages, ma non in DB
                $altText = $_SESSION["username"] . "'s post image: " . $_POST['altText'];
                $longDesc = $_SESSION["username"] . "'s post image. Details: " . $_POST['longDesc'];
                $idPostImg = $dbh->addPostImg($altText, $longDesc, $finalImgPath); //inserisce nuova img in db

                if($idPostImg !== FALSE){ //img inserita in db con successo
                    $residPostImg = $idPostImg[0]['ID']; //ottiene id di img caricata

                    $currentUserPost = $dbh->updatePost($_POST['postID'], $residPostImg, $_POST["title"], $_POST["content"]);
                    if($currentUserPost == 0){ // tutto ok
                        header("location: ../post.php?r=4&p=" . $_POST['postID']);
                    } else {
                        header("location: ../modifyPost.php?r=2&p=" . $_POST['postID']); //errore inserimento post in db
                    }
                } else {
                    header("location: ../modifyPost.php?r=2&p=" . $_POST['postID']); //errore inserimento img in db
                }
            } else {
                header("location: ../modifyPost.php?r=2&p=" . $_POST['postID']); //img non caricata , errore server
            }
        } else {
            header("location: ../modifyPost.php?r=3&p=" . $_POST['postID']); // mancano alcuni field necessari
        }

    } else { //post senza immagine
        if(areFieldsSetPostNOimage()){
            $currentUserPost = $dbh->updatePost($_POST['postID'], NULL, $_POST["title"], $_POST["content"]);
            if($currentUserPost == 0){ // tutto ok 
                header("location: ../post.php?r=4&p=" . $_POST['postID']);
            } else {
                header("location: ../modifyPost.php?r=2&p=" . $_POST['postID']);
            }
        } else {
            header("location: ../modifyPost.php?r=4&p=" . $_POST['postID']); // mancano alcuni field necessari
        }
    }
} 

function isImageChosen(){
    return isset($_FILES["postImg"]) && $_FILES["postImg"]["error"] == 0;
}

function areFieldsSetPostImage(){
    return isset($_POST["title"], $_POST["content"], $_POST["altText"], $_POST["longDesc"]) && strlen($_POST["title"]) > 0
        && strlen($_POST["content"]) > 0 && strlen($_POST["altText"]) > 10 && strlen($_POST["longDesc"]) > 20;
}

function areFieldsSetPostNOimage(){
    return isset($_POST["title"], $_POST["content"]) && strlen($_POST["title"]) > 0 && strlen($_POST["content"]) > 0;
}

?>