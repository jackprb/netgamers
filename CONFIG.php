<?php
session_start();
define("UPLOAD_DIR", "./upload/userImages/");
require_once("utils/functions.php");
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "netgamers", 3306);
?>