        <?php
        function publishCommentMsg($code){
            $msg[0] = "Comment published successfully.";
            $msg[1] = "Comment not published: fill the required fields.";
            $msg[2] = "An error occurred. Comment not published. Retry later.";
            $msg[3] = "Comment modified successfully.";
            $msg[4] = "Post modified successfully.";
            $msg[5] = "Comment deleted successfully.";
            if($code == 0 || $code == 3 || $code == 4 || $code == 5){
                $type = "alert-success";
            } else {
                $type = "alert-danger";
            }
            return array($type, $msg[$code]);
        }
        if (isset($_GET['p']) && $_GET['p'] > 0){
            $res = $dbh->getPostData($_GET['p']);
            if(count($res) != 0){ // post esiste
                $username = $dbh->getUsernameFromPost($_GET['p']);
                $userImg = $dbh->getUserImgByUserID($res[0]['userID']);
                if($res[0]['img'] != NULL){ // prende immagine del post
                    $imgPost = $dbh->getPostImgByPostID($_GET['p']);
                }
            }
        }

        function printDatePublished($res, $username){
            echo '<p class="text-center text-muted">Published on ' . $res[0]['dateTimePublished'] . ' by 
                        <a href="profile.php?u='. $res[0]['userID'] .'">'. $username[0]['username'] .'</a>
                    </p>';
        }
        ?>
        
        <section id="post" class="mt-5 mx-sm-1">
            <input type="hidden" id="pId" value = "<?php echo $_GET["p"];?>" />
            <input type="hidden" id="uId" value = "<?php echo $_SESSION["userID"];?>" />
            <?php if(isset($_GET["r"]) && $_GET["r"] >= 0 && $_GET["r"] <= 5): ?>
            <div class="col-12">
                <div class="alert <?php echo publishCommentMsg($_GET["r"])[0]; ?> alert-dismissible fade show" role="alert">
                    <div><?php echo publishCommentMsg($_GET["r"])[1]; ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <?php endif; ?>

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
        <section id="insertComment">
            <div class="card border-0 pt-2 p-md-2 p-xl-3 p-xxl-4 mt-n3 mt-md-0">
                <div class="card-body">
                    <h2 class="pb-2 pb-lg-3 pb-xl-4">Leave a comment:</h2>
                    <form class="g-4" method="POST" action="<?php echo getApiPath('api-insert-new-comment.php'); ?>" autocomplete="off">
                        <div class="row">
                            <div class="col-12">
                                <input type = "hidden" value="<?php echo $_GET['p']; ?>" id="postId" name = "postId"/>
                                <label class="form-label" for="CommentText">Type here</label>
                                <textarea class="form-control" rows="4" placeholder="Type your comment here..." required id="CommentText" name="CommentText"></textarea>
                            </div>
                            <div class="col-12 justify-content-end d-flex">
                                <button class="btn btn-primary mt-4" type="submit">Post a comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <div class="invisible my-4 py-4" id="commentTop">
        </div>
        <section id="getComments">
            <div class="card border-0 pt-2 p-md-2 p-xl-3 p-xxl-4 mt-n3 mt-md-0">
                <div class="card-body">
                    <h3 class="pb-2 pb-lg-3 pb-xl-4 justify-content-start d-flex" id="commentsCount"></h3>
                    <ul class="list-group list-group-flush" id="commentsList">
                    </ul>
                </div>
            </div>
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

        <?php 
        if($res[0]['img'] != NULL) : /* post CON IMMAGINE */ ?> 
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
        <?php endif; ?>

        <?php if($_SESSION['userID'] == $res[0]['userID']): ?>
        <div class="modal fade" id="modalDeletePost" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirm delete post</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this post?</p>
                        <p class="text-danger">It can't be undone.</p>
                        <form id="deletePost" method="post" action="<?php echo getApiPath('api-delete-post.php'); ?>">
                            <input type="hidden" id="postID1" name="postID1" value="<?php echo $_GET['p']; ?>"/>
                        </form>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-danger" value="Delete post" form="deletePost"/>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <script>
            setTimeout(() => {
                let el = document.getElementById("<?php echo $_GET['s']; ?>");
                el.scrollIntoView({behavior: "smooth", block: "center", inline: "end"});
                el.classList.add('selectedComment');
            }, 1000);
        </script>
