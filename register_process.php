<?php
require_once 'CONFIG.php';
require_once './utils/functions.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"]) && allFieldsAreSet()){
    $username = sanitizeInput($_POST["usernameReg"]);
    $email = sanitizeInput($_POST["email"]);
    $psw = sanitizeInput($_POST["psw"]);

    // se psw = confPsw
    if(checkNewConfirmPsw()){

        // Check sui caratteri obbligatori della psw
        if(checkPassword($psw)){
            // Genera l'hash della password
            $hashedPassword = password_hash($psw, PASSWORD_DEFAULT);
    
            // i controlli su email e password sono inclusi in registerNewUser
            $result = $dbh->registerNewUser($username, $hashedPassword, $email);
    
            if ($result === TRUE){ //registrazione con successo
                header("location:login.php?r=1"); //redirect a login, deve fare accesso di nuovo
                // ottiene id di utente appena registrato
                $userID = $dbh->getUserId($username, $hashedPassword)[0]['id'];
    
                // inserisce le impostazioni di default per le notifiche
                $res = $dbh->setDefaultNotificationSettings($userID);
            } else if($result == "usernameExist"){
                header("location:login.php?er=2"); //redirect a login
    
            } else if($result == "emailExist"){
                header("location:login.php?er=3"); //redirect a login
            }
        }else{
            header("location:login.php?er=4"); //la password non soddisfa i requisiti
        }

    } else {
        header("location:login.php?er=5"); // psw e confPsw non coincidono
    }

} else if(!allFieldsAreSet()){
    header("location:login.php?er=1");
}

function allFieldsAreSet(){ //check if email address is valid
    return filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && isset($_POST["usernameReg"], $_POST["email"], $_POST["psw"], $_POST["confPsw"]);
}

function checkNewConfirmPsw(){ // psw = confPsw 
    return strcmp($_POST["psw"], $_POST["confPsw"]) == 0;
}
?>

    

    

    