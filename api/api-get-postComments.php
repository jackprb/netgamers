<?php
require '../CONFIG.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "GET"){ // se utente è loggato e se c'è invio con GET
    
    $res = array();
    if (isset($_GET['p']) && $_GET['p'] > 0){
        $res = $dbh->getComments($_GET['p']);
    }
    header('Content-Type: application/json');
    echo json_encode($res);
}
?>