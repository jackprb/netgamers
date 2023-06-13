<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php'; // contiene sanitizeInput() e checkPassword()

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST"){  // se utente è loggato e se c'è invio con POST

    if (areFieldsSet()){

        //mette nel database il post in base al tipo (immagine o solo testo)
        if(isset($_POST["postImg"])){
            //$currentUserPost= $dbh->insertNewPostImg($_SESSION["useID"], $_POST["postImg"], $_POST["altText"], $_POST["longDesc"], $_POST["title"], $_POST["content"]);

        }else{
            $currentUserPost= $dbh->insertNewPost($_SESSION["useID"], NULL, $_POST["title"], $_POST["content"]);
        }
    
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