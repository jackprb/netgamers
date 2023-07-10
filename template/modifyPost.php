            <?php 
                if(isset($_GET['p']) && $_GET['p'] > 0){
                    $res = $dbh->getPostData($_GET['p']);
                    $img = $dbh->getPostImgByPostID($_GET['p']);
                }

                function modifyPostMsg($code){
                    $msg[0] = "Post modified successfully.";
                    $msg[1] = "Post not modified: fill the required fields.";
                    $msg[2] = "An error occurred. Post not modified. Retry later.";
                    $msg[3] = "Post not published: the fields 'title', 'content' and 'short description' are mandatory for post that include an image.";
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square text-dark me-3 svg-lg" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        <h2 class="h4 mb-0">Modify post</h2>
                    </div>
                    <form action="<?php echo getApiPath('api-update-post.php'); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="row g-3 g-sm-4 mt-0 mt-lg-2">
                            <?php if(isset($_GET["r"]) && $_GET["r"] >= 0 && $_GET["r"] <= 4): ?>
                            <div class="col-sm-12 col-lg-10">
                                <div class="alert <?php echo modifyPostMsg($_GET["r"])[0]; ?> alert-dismissible fade show" role="alert">
                                    <div><?php echo modifyPostMsg($_GET["r"])[1]; ?></div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="col-sm-12 col-lg-10">
                                <input type="hidden" name="postID" id="postID" value="<?php echo $_GET['p']; ?>" />
                                <label class="form-label" for="title">Title</label>
                                <input class="form-control" type="text" placeholder="Post title" id="title" name="title" minlength="1" required value="<?php echo $res[0]['title']; ?>" />
                            </div>
                            <div class="col-sm-12 col-lg-10">
                                <label class="form-label" for="content">Post content</label>
                                <textarea class="form-control" rows="5" placeholder="Post content" id="content" name="content" minlength="1" required><?php echo $res[0]['text']; ?></textarea>
                            </div>
                            <?php if(isset($img['path'])): ?>
                            <div class="col-sm-12 col-lg-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="keepImg" name="keepImg">
                                    <label class="form-check-label" for="keepImg">Check to keep the previous image</label>
                                </div>
                            </div>
                            <input type="hidden" id="prevImg" name="prevImg" value="<?php echo $img['ID']; ?>" />
                            <div class="col-sm-12 col-lg-10" id="previousImg">
                                <img class="img-fluid" alt="<?php echo $img['altText']; ?>" src="<?php echo UPLOAD_POSTIMG_DIR . $img['path']; ?>" />
                            </div>
                            <?php endif; ?>
                            <div class="col-sm-12 col-lg-10" id="img">
                                <label class="form-label" for="postImg">Choose the new post image</label>
                                <input class="form-control" type="file" name="postImg" id="postImg" accept=".png,.gif,.jpg,.jpeg" />
                            </div>
                            <div class="col-sm-12 col-lg-10" id="altTextImg">
                                <label class="form-label" for="altText">Image alternative text</label>
                                <input class="form-control" type="text" placeholder="Short description of post image" id="altText" name="altText" minlength="10" value="<?php if(count($img) > 0) echo $img['altText']; ?>" />
                            </div>
                            <div class="col-sm-6 col-lg-5">
                                <input type="submit" class="btn btn-primary ms-auto" value="Update post"/>
                            </div>
                            <script>
                                let checkBox = document.getElementById("keepImg");
                                window.addEventListener("load", function(){
                                    document.getElementById("previousImg").style.display = "none";
                                });
                                checkBox.addEventListener("click", function(){
                                    if(checkBox.checked){
                                        document.getElementById("img").style.display = "none";
                                        document.getElementById("altTextImg").style.display = "none";
                                        document.getElementById("previousImg").style.display = "block";
                                    } else {
                                        document.getElementById("img").style.display = "block";
                                        document.getElementById("altTextImg").style.display = "block";
                                        document.getElementById("previousImg").style.display = "none";
                                    }
                                });
                            </script>
                        </div>
                    </form>
                </div>
            </div>
        </section>