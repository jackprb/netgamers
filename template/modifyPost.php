            <?php 
                if(isset($_GET['p']) && $_GET['p'] > 0){
                    $res = $dbh->getPostData($_GET['p']);
                    $img = $dbh->getPostImgByPostID($_GET['p']);
                } else {
                    require 'error.php';
                    exit();
                }

                function modifyPostMsg($code){
                    $msg[0] = "Post modified successfully.";
                    $msg[1] = "Post not modified: fill the required fields.";
                    $msg[2] = "An error occurred. Post not modified. Retry later.";
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
                        <h2 class="h4 mb-0">Modify post</h2>
                    </div>
                    <form action="<?php echo getApiPath('api-update-post.php'); ?>" method="post" enctype="multipart/form-data">
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
                            <div class="col-sm-12 col-lg-10">
                                <label class="form-label" for="postImg">Choose post image</label>
                                <input class="form-control" type="file" name="postImg" id="postImg" accept=".png,.gif,.jpg,.jpeg" />
                            </div>
                            <div class="col-sm-12 col-lg-10">
                                <label class="form-label" for="altText">Image alternative text</label>
                                <input class="form-control" type="text" placeholder="Short description of post image" id="altText" name="altText" minlength="10" value="<?php if(count($img) > 0) echo $img['altText']; ?>" />
                            </div>
                            <div class="col-sm-12 col-lg-10">
                                <label class="form-label" for="longDesc">Image long description</label>
                                <input class="form-control" type="text" placeholder="Long description of post image" id="longDesc" name="longDesc" minlength="20" value="<?php if(count($img) > 0) echo $img['longdesc']; ?>" />
                            </div>
                            <div class="col-sm-6 col-lg-5">
                                <input type="submit" class="btn btn-primary ms-auto" value="Update post"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>