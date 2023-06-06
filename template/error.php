<?php 
    $title = "Unexpected error";
    $msg = "An error occurred. That's all.";
    
    if(isset($_GET['e'])){
        switch ($_GET['e']) {
            case 1: //errore 404
                $title = "Page not found - 404 Error";
                $msg = "The page you were looking does not exist.";
                break;
            
            case 2: // errore 400
                $title = "Bad request - 400 Error";
                $msg = "The server cannot fulfill your request. Maybe you followed an incorrect link.";
                break;

            default:
                break;
        }
    }
?>

<div class="container d-flex flex-column justify-content-center py-5">
    <div class="text-center pt-4 mt-lg-2">
        <h1 class="display-5"><?php echo $title; ?></h1>
        <p class="fs-lg pb-2 pb-md-0 mb-4 mb-md-5"><?php echo $msg; ?></p>
        <a class="btn btn-lg btn-primary" onclick="history.back()">Go back</a>
    </div>
</div>