<?php 
    $title = "User not found - 404 Error";
    $msg = "The user you are looking for does not exist. Maybe you followed an incorrect link.";
    
    if(isset($_GET['e'])){
        switch ($_GET['e']) {
            case 1: //errore 404
                $title = "Page not found - 404 Error";
                $msg = "The page you were looking for does not exist.";
                break;
            
            case 2: // errore 400
                $title = "Bad request - 400 Error";
                $msg = "The server cannot fulfill your request. Maybe you followed an incorrect link.";
                break;
            
            case 3: //errore 404
                $title = "Post not found - 404 Error";
                $msg = "The post you were looking for does not exist.";
                break;

            default:
                $title = "Unexpected error";
                $msg = "An error occurred. That's all.";
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