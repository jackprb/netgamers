<?php
require '../CONFIG.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "GET"){ // se utente è loggato e se c'è invio con GET

    if(isset($_GET['p']) && $_GET['p'] > 0){ // se specificato id di post da cui togliere like
        $postToUnlike = $dbh->removeLikeToPost($_SESSION['userID'], $_GET['p']);

        if($postToUnlike === FALSE){
            header('Content-Type: application/json');
            echo json_encode($postToUnlike);
        }
    }
}
?>