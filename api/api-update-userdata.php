<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php'; // contiene sanitizeInput() e checkPassword()

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST"){ // se utente è loggato e se c'è invio con POST
    $bio = isStringSet($_POST['bio']) == TRUE ? $_POST['bio'] : NULL;
    $language = isStringSet($_POST['language']) == TRUE ? $_POST['language'] : NULL;
    $country = isStringSet($_POST['country']) == TRUE ? $_POST['country'] : NULL;
    $surname = isStringSet($_POST['surname']) == TRUE ? $_POST['surname'] : NULL;
    $name = isStringSet($_POST['name']) == TRUE ? $_POST['name'] : NULL;
    $email = isStringSet($_POST['email']) == TRUE ? $_POST['email'] : NULL;

    $res = $dbh->updateUserData($_SESSION['userID'], $email, $name, $surname, $country, $language, $bio);
    if($res == 0){ //tutto ok
        header("location: ../account.php?u=0");
    } else {
        header("location: ../account.php?u=1");
    }
}

function isStringSet($str){
    return isset($str) && strlen($str) > 0;
}
?>