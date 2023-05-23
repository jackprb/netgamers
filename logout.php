<?php
session_destroy();
setcookie("loggedin", "", time()-3600);
header("location:login.php");
?>