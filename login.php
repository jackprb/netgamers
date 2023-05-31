<?php 
require_once 'CONFIG.php';
require_once 'register.php';

// Funzione per proteggere l'input dagli attacchi di injection
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Gestione login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);

$result = $dbh->getCurrentUserPsw($username);

    if (count($result) == 1) {
        $hashedPassword = $result[0]['psw'];

        // Verifica la corrispondenza della password hashata
        if (password_verify($password, $hashedPassword)) {
            // Login riuscito
            session_start();
            $_SESSION["username"] = $username;
            header("Location: profile.php"); // Redirect alla dashboard o pagina successiva al login
            exit();
        } else {
            // Login fallito
            $loginError = "Credenziali non valide.";
        }
    } else {
        // Login fallito
        $loginError = "Credenziali non valide.";
    }
}


/*
if(isset($_POST["username"], $_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Controllare username o password!";
    } else{
        registerLoggedUser($login_result[0]);
        print_r($login_result[0]);
        setcookie("loggedin", "", time()+ (3600 * 6)); //cookie expires in 6 hours
    }
}
*/

if(isUserLoggedIn()){
    $templateParams["titolo"] = "NetGamers - Homepage";
    $templateParams["nome"] = "login-form.php";
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }
} else {
    $templateParams["titolo"] = "NetGamers - Login";
    $templateParams["nome"] = "login-form.php";
}

require 'template/base.php';
?>