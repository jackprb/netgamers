<?php
require '../CONFIG.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "GET"){ // se utente è loggato 
    
    if(isAllSet()){
        $res = $_GET['searchType'];
        header('Content-Type: application/json');
        echo json_encode($res);
    }
}

function isAllSet(){
    return isset($_GET['searchType'], $_GET['searchI']) && strlen($_GET['searchI']) > 0 ;
}
?>