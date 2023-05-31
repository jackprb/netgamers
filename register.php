<?php
require_once 'CONFIG.php';

if($_POST && allFieldsAreSet()){
    $username = $_POST["usernameReg"];
    $email = $_POST["email"];
    $psw = $_POST["psw"];
    

// Funzione per proteggere l'input dagli attacchi di injection
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// Gestione registrazione
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    $username = sanitizeInput($_POST["usernameReg"]);
    $psw = sanitizeInput($_POST["psw"]);


// Genera l'hash della password
    $hashedPassword = password_hash($psw, PASSWORD_DEFAULT);


if ($result->num_rows == 0) {
        // L'utente non esiste, si può procedere con la registrazione
	$result = $dbh->registerNewUser($username, $hashedPassword, $email);
        $signupSuccess = "Registrazione completata con successo. Effettua il login.";
    } else {
        // L'utente esiste già
        $signupError = "Username già in uso.";
    }
}


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

    

    

    