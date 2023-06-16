        <?php
        if (isset($_GET['p']) && $_GET['p'] > 0){
            $res = $dbh->getPostData($_GET['p']);
            if(count($res) != 0){ // post esiste
                $username = $dbh->getUsernameFromPost($_GET['p']);
                $userImg = $dbh->getUserImgByUserID($res[0]['userID']);
                if($res[0]['img'] != NULL){ // prende immagine del post
                    $imgPost = $dbh->getPostImgByPostID($_GET['p']);
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
                    <div class="row align-content-center">
                        <img class="img-fluid" src="<?php echo UPLOAD_POSTIMG_DIR. $imgPost['path']; ?>" alt="<?php echo $imgPost['altText']; ?>"
                            data-bs-toggle="modal" data-bs-target="#modalImg" />            
                    </div>            
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

        <div class="modal fade" id="modalText" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo $res[0]['title']?></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><?php echo $res[0]['text']; ?></p>
                    </div>
                    <div class="modal-footer flex-column flex-sm-row">
                        <button type="button" class="btn btn-secondary w-100 w-sm-auto mb-3 mb-sm-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalImg" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title"><?php echo $res[0]['title']?></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img class="img-fluid h-100" src="<?php echo UPLOAD_POSTIMG_DIR. $imgPost['path']; ?>" alt="<?php echo $imgPost['altText']; ?>" /> 
                    </div>
                </div>
            </div>
        </div>