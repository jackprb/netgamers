        <?php
        if (isset($_GET['p']) && $_GET['p'] > 0){
            $res = $dbh->getPostData($_GET['p']);
            if(count($res) != 0){ // post esiste
                $username = $dbh->getUsernameFromPost($_GET['p']);
                if($res[0]['img'] != NULL){ // prende immagine del post
                    
                }
            } else { // post NON esiste
                require "error.php";
                exit();
            }
        }

        function printDatePublished($res, $username){
            echo '<p class="text-center text-muted">Published on ' . $res[0]['dateTimePublished'] . ' by 
                        <a href="profile.php?u='. $res[0]['userID'] .'">'. $username[0]['username'] .'</a>
                    </p>';
        }
        ?>

        <section id="post" class="mt-5 mx-sm-1"> 

            <?php 
            if($res[0]['img'] != NULL) : /* post CON IMMAGINE */ ?> 
            <div class="card py-1 p-md-2 p-xl-3 mb-4">
                <?php require 'single-post-header.php'; ?>
                <div class="card-body">
                    <?php printDatePublished($res, $username); ?>
                    <img class="img-fluid w-50 w-sm-75" src="<?php echo UPLOAD_USERIMG_DIR. $res[0]['img']?>" alt="<?php echo $res[0]['altText']?>"
                        data-bs-toggle="modal" data-bs-target="#modalImg" />                        
                </div>
                <?php require 'single-post-footer.php'; ?>
            </div>

            <?php else: /*post SENZA IMMAGINE*/?>

            <div class="card py-1 p-md-2 p-xl-3 mb-4">
                <?php require 'single-post-header.php'; ?>
                <div class="card-body">
                    <?php printDatePublished($res, $username); ?>
                    <p class="text-center card-text">
                        <?php echo $res[0]['text']; ?>
                    </p>
                </div>
                <?php require 'single-post-footer.php'; ?>
            </div>
            <?php endif; ?>

        </section>