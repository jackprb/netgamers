<?php
require '../CONFIG.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST"){ // se utente è loggato e se c'è invio con GET

    $notificationToRead = $dbh->readNotification($_POST['firstName']);

    header('Content-Type: application/json');
    echo json_encode($notificationToRead);
}
?>