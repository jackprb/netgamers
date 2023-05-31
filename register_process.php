<?php
require_once 'CONFIG.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"]) && allFieldsAreSet()){
    $username = sanitizeInput($_POST["usernameReg"]);
    $email = sanitizeInput($_POST["email"]);
    $psw = sanitizeInput($_POST["psw"]);

    // Genera l'hash della password
    $hashedPassword = password_hash($psw, PASSWORD_DEFAULT);

    // i controlli su email e password sono inclusi in registerNewUser
    $result = $dbh->registerNewUser($username, $hashedPassword, $email);

    if ($result === TRUE){ //registrazione con successo
        header("location:login.php?r=1"); //redirect a login, deve fare accesso di nuovo

    } else if($result == "usernameExist"){
        header("location:login.php?er=2"); //redirect a login

    } else if($result == "emailExist"){
        header("location:login.php?er=3"); //redirect a login
    }

} else if(!allFieldsAreSet()){
    header("location:login.php?er=1");
}

function allFieldsAreSet(){ //check if email address is valid
    return filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && isset($_POST["usernameReg"], $_POST["email"], $_POST["psw"], $_POST["confPsw"]);
}

// Funzione per proteggere l'input dagli attacchi di injection
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

    

    

    