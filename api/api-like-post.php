<?php
require '../CONFIG.php';

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "GET"){ // se utente è loggato e se c'è invio con GET

    if(isset($_GET['p']) && $_GET['p'] > 0 && $_GET['u'] && $_GET['u'] > 0){ // se specificato id di post a cui mettere like
        $postToLike = $dbh->newLikeToPost($_GET['u'], $_GET['p']);

            header('Content-Type: application/json');
            echo json_encode($postToLike);
        
    }
}
?>