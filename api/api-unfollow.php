<?php
require '../CONFIG.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "GET"){ // se utente è loggato e se c'è invio con GET

    $userToUnfollow = $dbh->removeFollow($_SESSION['userID'], $userIdFollowed);

    header('Content-Type: application/json');
    echo json_encode($notificationToRead);
}
?>