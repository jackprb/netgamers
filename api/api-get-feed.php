<?php
require_once '../CONFIG.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "GET"){ // se utente è loggato e se c'è invio con GET

    $posts = $dbh->getFeedOfUser($_SESSION['userID']);

    header('Content-Type: application/json');
    echo json_encode($posts);
}
?>