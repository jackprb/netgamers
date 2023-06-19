<?php
require '../CONFIG.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "GET"){ // se utente è loggato e se c'è invio con GET

    if(isset($_GET['c']) && $_GET['c'] > 0){ 
        $commentToLike = $dbh->newLikeToComment($_SESSION['userID'], $_GET['c']);

        if($commentToLike === FALSE){
            header('Content-Type: application/json');
            echo json_encode($commentToLike);
        }
    }
}
?>