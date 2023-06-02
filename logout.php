<?php
require_once 'CONFIG.php';

session_destroy();
setcookie("loggedin", "", time() -3600);

if(isset($_GET["d"]) && $_GET["d"] == 1){   // dopo cancellazione account
    header("location:login.php?d=1");
} else {                                    // in tutti gli altri casi
    header("location:login.php");
}
?>