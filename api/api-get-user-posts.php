<?php
require_once '../CONFIG.php';
$posts = $dbh->getPosts($_SESSION["username"]);


header('Content-Type: application/json');
echo json_encode($posts);
?>