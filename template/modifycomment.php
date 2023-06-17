            <?php 
                function publishPostMsg($code){
                    $msg[0] = "Post published successfully.";
                    $msg[1] = "Post not published: fill the required fields.";
                    $msg[2] = "An error occurred. Post not published. Retry later.";
                    $msg[3] = "Post not published: the fields 'title', 'content', 'short description' and 'long description' are mandatory for post that include an image.";
                    $msg[4] = "Post not published: the fields 'title' and 'content' are mandatory for post that do not include an image.";
                    if($code == 0){
                        $type = "alert-success";
                    } else {
                        $type = "alert-danger";
                    }
                    return array($type, $msg[$code]);
                }
            ?>
            <section class="card border-0 py-1 p-md-2 p-xl-3 mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3">
                        <i class="ai-square-plus text-primary lead pe-1 me-2"></i>
                        <h2 class="h4 mb-0">Modify comment</h2>
                    </div>
                    <form action="<?php echo getApiPath('api-modify-comment.php?c='.$_GET["c"]); ?>" method="post" >
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
                                <label class="form-label" for="title">Modify comment:</label>
                            </div>
                            <div class="col-sm-12 col-lg-10">
                                <textarea class="form-control" rows="5" placeholder="Comment text" id="content" name="content" minlength="1" required></textarea>
                            </div>
                            <div class="col-sm-6 col-lg-5">
                                <input type="submit" class="btn btn-primary ms-auto" value="Publish"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>