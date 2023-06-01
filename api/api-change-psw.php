<?php
require_once '../CONFIG.php';
require_once '../utils/functions.php'; // contiene sanitizeInput() e checkPassword()

if(isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] == "POST"){ // se utente è loggato e se c'è invio con POST
    
    if(areAllFieldsSet()){ // se utente ha riempito tutti i campi richiesti

        if(checkCurrPswDifferentNewPsw()){ // se currPsw != newPsw
            
            if(checkNewConfirmPsw()){ // se newPsw = confirmPsw
            
                if (checkValidPsw()){ // newPsw soddisfa i requisiti

                    $currPswP = sanitizeInput($_POST["currPsw"]);
                    $newPswP = sanitizeInput($_POST["newPsw"]);
                    $confirmPswP = sanitizeInput($_POST["confirmPsw"]);

                    $currUserPswHash = $dbh->getCurrentUserPsw($_SESSION["username"])[0]['psw']; // ottiene psw crittografata attuale
                    $newHashedPassword = password_hash($newPswP, PASSWORD_DEFAULT); // calcola hash nuova psw
            
                    if (password_verify($currPswP, $currUserPswHash)) { // se psw attuale è corretta
                        $res = $dbh->setNewUserPsw($_SESSION["username"], $newHashedPassword);
                       
                        if($res == 0){
                            header("location: ../account.php?r=0");
                        } else {
                            header("location: ../account.php?r=1");
                        }
                    } else {
                        header("location: ../account.php?r=2");
                    }
                } else {
                    header("location: ../account.php?r=3");
                }
            } else {
                header("location: ../account.php?r=4");
            }
        } else {
            header("location: ../account.php?r=5");
        }
    } else {
        header("location: ../account.php?r=6");
    }
}

function checkValidPsw(){
    return checkPassword($_POST["newPsw"]);
}

function checkCurrPswDifferentNewPsw(){ // currPsw != newPsw
    return strcmp($_POST["newPsw"], $_POST["currPsw"]) != 0;
}

function checkNewConfirmPsw(){ // newPsw = confirmPsw 
    return strcmp($_POST["newPsw"], $_POST["confirmPsw"]) == 0;
}

function areAllFieldsSet(){
    return isset($_POST["currPsw"], $_POST["newPsw"], $_POST["confirmPsw"]) 
        && strlen($_POST["currPsw"]) > 0 && strlen($_POST["newPsw"]) > 0 && strlen($_POST["confirmPsw"]) > 0;
}
?>