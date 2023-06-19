<?php
require '../CONFIG.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "GET"){ // se utente è loggato e se c'è invio con GET

    if(isset($_GET['c']) && $_GET['c'] > 0){ // se specificato id di post da cui togliere like
        $commentHaslike = $dbh->hasLikeComment($_SESSION['userID'], $_GET['c']);
        header('Content-Type: application/json');
        echo json_encode($commentHaslike);
    }
}
?>