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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square text-dark me-3 svg-lg" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg><h2 class="h4 mb-0">Modify comment</h2>
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