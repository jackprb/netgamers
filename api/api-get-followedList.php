<?php
require '../CONFIG.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "GET"){ // se utente è loggato e se c'è invio con GET
    
    if(isset($_GET['u']) && $_GET['u'] > 0){
        $res = $dbh->getFollowedList($_GET['u']);
        
        header('Content-Type: application/json');
        echo json_encode($res);
    }
}
?>