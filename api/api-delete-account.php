<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php'; // contiene sanitizeInput() e checkPassword()

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST"){ // se utente è loggato e se c'è invio con POST
    
    if(isConfirmChecked()){ // se utente ha messo spunta su checkbox
        if($dbh->standbyAccount($_SESSION["username"]) == 0){ //
            header('location: ../logout.php?d=1'); // disconnette utente e mostra messaggio cancellazione avvenuta
        } else {
            header("location: ../account.php?r=8"); //errore -> account non cancellato
        }
        
    } else {
        header("location: ../account.php?r=7"); // utente non ha messo spunta su checkbox -> account non cancellato
    }
}

function isConfirmChecked(){
    return isset($_POST["confirmDelete"]) && $_POST["confirmDelete"] == "on";
}
?>