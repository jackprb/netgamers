<?php
require_once 'CONFIG.php';

if($_POST && allFieldsAreSet()){
    $username = $_POST["usernameReg"];
    $email = $_POST["email"];
    $psw = $_POST["psw"];
    $result = $dbh->registerNewUser($username, $psw, $email);

    if ($result === TRUE){ //registrazione con successo
        header("location:account.php"); //redirect a pagina impostazioni utente
        echo "result=true";
    } else {
        echo "result=false";
        $templateParams["erroreregister"] = "An error occurred. Registration was not completed successfully.";
    }

} else if($_POST && !allFieldsAreSet()){
    echo "some fields not set";
    $templateParams["erroreregister"] = "Some required fields are missing.";
}

function allFieldsAreSet(){
    return isset($_POST["usernameReg"], $_POST["email"], $_POST["psw"], $_POST["confPsw"]);
}
?>