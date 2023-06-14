<?php
require '../CONFIG.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "GET"){ // se utente è loggato e se c'è invio con GET

        //$res = $dbh->search();

        header('Content-Type: application/json');
        echo json_encode($res);
    }
}
?>