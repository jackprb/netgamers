<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php'; // contiene sanitizeInput() e checkPassword()

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST"){ // se utente è loggato e se c'è invio con POST
    
    if($dbh->setDefaultUserImg($_SESSION["username"]) == 0){ //
        header('location: ../account.php?i='); // img profilo utente cancellata -> ritorna img di default
    } else {
        header("location: ../account.php?i="); //errore -> account non cancellato
    }
}


?>