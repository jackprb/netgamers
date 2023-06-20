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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus-square text-dark me-3 svg-lg" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg><h2 class="h4 mb-0">Create new post</h2>
                    </div>
                    <form action="<?php echo getApiPath('api-insert-new-post.php'); ?>" method="post" enctype="multipart/form-data">
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
                                <label class="form-label" for="title">Title</label>
                                <input class="form-control" type="text" placeholder="Post title" id="title" name="title" minlength="1" required>
                            </div>
                            <div class="col-sm-12 col-lg-10">
                                <label class="form-label" for="content">Post content</label>
                                <textarea class="form-control" rows="5" placeholder="Post content" id="content" name="content" minlength="1" required></textarea>
                            </div>
                            <div class="col-sm-12 col-lg-10">
                                <label class="form-label" for="postImg">Choose post image</label>
                                <input class="form-control" type="file" name="postImg" id="postImg" accept=".png,.gif,.jpg,.jpeg">
                            </div>
                            <div class="col-sm-12 col-lg-10">
                                <label class="form-label" for="altText">Image alternative text</label>
                                <input class="form-control" type="text" placeholder="Short description of post image" id="altText" name="altText" minlength="10">
                            </div>
                            <div class="col-sm-12 col-lg-10">
                                <label class="form-label" for="longDesc">Image long description</label>
                                <input class="form-control" type="text" placeholder="Long description of post image" id="longDesc" name="longDesc" minlength="20">
                            </div>
                            <div class="col-sm-6 col-lg-5">
                                <input type="submit" class="btn btn-primary ms-auto" value="Publish"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>