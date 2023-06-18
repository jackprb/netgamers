            <?php 
                function publishPostMsg($code){
                    $msg[0] = "Comment not modified. Error in DataBase(commentID or postID does not exist)";
                    $type = "alert-success";
                    return array($type, $msg[$code]);
                }
            ?>
            <section class="card border-0 py-1 p-md-2 p-xl-3 mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3">
                        <i class="ai-square-plus text-primary lead pe-1 me-2"></i>
                        <h2 class="h4 mb-0">Modify comment</h2>
                    </div>
                    <form action="<?php echo getApiPath('api-modify-comment.php?c='.$_GET['c'].'&p='.$_GET['p']); ?>" method="post" >
                        <div class="row g-3 g-sm-4 mt-0 mt-lg-2">
                            <?php if(isset($_GET["r"]) && $_GET["r"] >= 0 && $_GET["r"] <= 4): ?>
                            <div class="col-sm-12 col-lg-10">
                                <div class="alert <?php echo publishPostMsg($_GET["r"])[0]; ?> alert-dismissible fade show" role="alert">
                                    <div><?php echo publishPostMsg($_GET["r"])[1]; ?></div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="col-sm-12 col-lg-10">
                                <textarea class="form-control" rows="5" placeholder="Comment text" id="CommentTxt" name="CommentTxt" minlength="1" required></textarea>
                            </div>
                            <div class="col-sm-6 col-lg-5">
                                <input type="submit" class="btn btn-primary ms-auto" value="Save changes"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>