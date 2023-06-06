<?php

require '../CONFIG.php';
$notifications = $dbh->NotificationsToRead($_SESSION['userID']);

header('Content-Type: application/json');
echo json_encode($notifications);
?>