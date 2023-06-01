<?php
require_once 'CONFIG.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"]) && allFieldsAreSet()) {
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);

    $result = $dbh->getCurrentUserPsw($username);

    if (count($result) == 1) {
        $hashedPassword = $result[0]['psw'];
        // Verifica la corrispondenza della password hashata
        if (password_verify($password, $hashedPassword)) {
            $userID = $dbh->getUserId($username, $hashedPassword)[0];
            // Login riuscito
            $_SESSION["username"] = $username;
            $_SESSION["userID"] = $userID["id"];
            $cookieContent = "loggedIn: " . date("Y-m-d H:i:s");
            setcookie("loggedin", $cookieContent, time() + (3600 * 6)); //cookie expires in 6 hours
            header("Location: profile.php"); // Redirect alla dashboard o pagina successiva al login
            exit();
        } else {
            // Login fallito
            header("location:login.php?el=1");
        }
    } else {
        // Login fallito
        header("location:login.php?el=1");
    }

} else if(!allFieldsAreSet()){
    header("location:login.php?el=2");
}

function allFieldsAreSet(){
    return isset($_POST["username"], $_POST["password"]);
}
?>