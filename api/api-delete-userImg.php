<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php'; // contiene sanitizeInput() e checkPassword()

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST"){ // se utente è loggato e se c'è invio con POST
    
    // TODO: eliminare foto profilo da cartella upload e da db
    
    if($dbh->setDefaultUserImg($_SESSION["username"]) == 0){ //
        header('location: ../account.php?i=3'); // img profilo utente cancellata -> ritorna img di default
    } else {
        header("location: ../account.php?i=4"); //errore -> img profilo non cancellata
    }
}

function deleteImg(){ // from upload folder

}

?>