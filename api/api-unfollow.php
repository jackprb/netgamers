<?php
require '../CONFIG.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "GET"){ // se utente è loggato e se c'è invio con GET

    if(isset($_GET['u']) && $_GET['u'] > 0){ // se specificato id di utente da non seguire più
        $userToUnfollow = $dbh->removeFollow($_SESSION['userID'], $_GET['u']);

        if($userToUnfollow === FALSE){
            header('Content-Type: application/json');
            echo json_encode($userToUnfollow);
        }
    }
}
?>