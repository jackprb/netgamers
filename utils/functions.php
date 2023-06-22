<?php

// Funzione per proteggere l'input dagli attacchi di injection
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function printEmail($dbh){
    echo $dbh->getUserEmail($_SESSION["username"])[0]['email'];
}

function printUserName(){
    if (isset($_SESSION["username"])){
        echo $_SESSION["username"];
    }
}

function getApiPath($nomeFile){
    return "api/" . $nomeFile;
}

function getUserProfileImgPath(){
    return UPLOAD_USERIMG_DIR . $_SESSION["userImg"];
}

function getUserImagePath($filename){
    return UPLOAD_USERIMG_DIR . $filename;
}

function getPostImgPath($nomeFile){
    return UPLOAD_POSTIMG_DIR . $nomeFile;
}

function checkPassword($psw){

// Controlla se la password contiene almeno una lettera maiuscola
if (!preg_match('/[A-Z]/', $psw)) {
    return false;
}

// Controlla se la password contiene almeno una lettera minuscola
if (!preg_match('/[a-z]/', $psw)) {
    return false;
}

// Controlla se la password contiene almeno un numero
if (!preg_match('/[0-9]/', $psw)) {
    return false;
}

// Controlla se la password contiene almeno un carattere speciale (simbolo)
if (!preg_match('/[^A-Za-z0-9]/', $psw)) {
    return false;
}

// Controlla se la password è lunga almeno 10 caratteri
if (strlen($psw) <= 10){
    return false;
}

// Se tutti i controlli passano, la password è valida
return true;
}


function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}

function getIdFromName($name){
    return preg_replace("/[^a-z]/", '', strtolower($name));
}

function isUserLoggedIn(){
    return !empty($_SESSION['userID']);
}

function getEmptyArticle(){
    return array("idarticolo" => "", "titoloarticolo" => "", "imgarticolo" => "", "testoarticolo" => "", "anteprimaarticolo" => "", "categorie" => array());
}

function getAction($action){
    $result = "";
    switch($action){
        case 1:
            $result = "Inserisci";
            break;
        case 2:
            $result = "Modifica";
            break;
        case 3:
            $result = "Cancella";
            break;
    }

    return $result;
}

function uploadImagePost($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;

    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }

    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }

    return array($result, $msg, $imageName);
}

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;

    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }

    list($width, $height, $type, $attr) = getimagesize($image["tmp_name"]);
    if(($width / $height) > 1.2 || ($width / $height) < 0.8) { // se img NON è quadrata o quasi quadrata
        $msg .= "Scegli un'immagine quadrata.";
    }

    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }

    return array($result, $msg, $imageName);
}

?>