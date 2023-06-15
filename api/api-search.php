<?php
require '../CONFIG.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "GET"){ // se utente è loggato e se c'è invio con GET
    
    $res = array();
    if(isAllSet()){
        switch ($_GET['searchType']) {
            case 'username':
                $res = $dbh->searchUserByUsername($_GET['searchI']);
                break;

            case 'postTitle':
                $res = $dbh->searchPostWithImgByTitle($_GET['searchI']);

                break;
                
            case 'postContent':
                $res = $dbh->searchPostWithImgByContent($_GET['searchI']);
                break;

            default:
                break;
        }    
    }
    header('Content-Type: application/json');
    echo json_encode($res);
}

function isAllSet(){
    return isset($_GET['searchType'], $_GET['searchI']) && strlen($_GET['searchI']) > 0 ;
}
?>