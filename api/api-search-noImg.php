<?php
require '../CONFIG.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "GET"){ // se utente è loggato 
    
    if(isAllSet()){
        $res = array();

        switch ($_GET['searchType']) {
            case 'username':
                $res = $dbh->searchUserByUsername($_GET['searchI']);
                break;

            case 'postTitle':
                $res = $dbh->searchPostWithOutImgByTitle($_GET['searchI']);
                
                break;
                
            case 'postContent':
                $res = $dbh->searchPostWithOutImageByContent($_GET['searchI']);
                break;

            default:
                break;
        }
        
        header('Content-Type: application/json');
        echo json_encode($res);
    }
}

function isAllSet(){
    return isset($_GET['searchType'], $_GET['searchI']) && strlen($_GET['searchI']) > 0 ;
}
?>