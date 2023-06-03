<?php
session_start();
define("UPLOAD_USERIMG_DIR", "./upload/userImages/");
define("UPLOAD_POSTIMG_DIR", "./upload/postImages/");
require_once("utils/functions.php");
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "netgamers", 3306);
?>