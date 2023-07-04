<?php
require_once 'CONFIG.php';

$templateParams["titolo"] = "NetGamers - Error";
$templateParams["nome"] = "error.php";
$templateParams["js"] = array("https://unpkg.com/axios/dist/axios.min.js","./api/js/get_notifications.js",
            "./api/js/read_notification.js");

require 'template/base.php';

?>