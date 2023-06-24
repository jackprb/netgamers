            <?php 
                function publishPostMsg($code){
                    $msg[0] = "Comment not modified. Error in DataBase(commentID or postID does not exist)";
                    $msg[1] = "Comment not deleted. Error in DataBase(commentID or postID does not exist)";
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
                        </svg><h3 class="h4 mb-0">Modify comment</h3>
                    </div>
                    <form action="<?php echo getApiPath('api-modify-comment.php?c='.$_GET['c'].'&p='.$_GET['p']); ?>" method="post" autocomplete="off" >
                        <div class="row g-3 g-sm-4 mt-1 mt-lg-2">
                            <?php if(isset($_GET["r"]) && $_GET["r"] >= 0 && $_GET["r"] <= 4): ?>
                            <div class="col-sm-12 col-lg-10">
                                <div class="alert <?php echo publishPostMsg($_GET["r"])[0]; ?> alert-dismissible fade show" role="alert">
                                    <div><?php echo publishPostMsg($_GET["r"])[1]; ?></div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="col-sm-12 col-lg-10">
                                <label class="form-label" for="CommentTxt" >Type your comment</label>
                                <textarea class="form-control" rows="5" placeholder="Comment text" id="CommentTxt" name="CommentTxt" minlength="1" required></textarea>
                            </div>
                        </div>
                        <div class="mt-4 d-flex justify-content-start">
                            <input type="submit" class="btn btn-primary" value="Save changes" title="Save changes"/>
                        
                            <a class="btn btn-danger ms-4" href="#." data-bs-toggle="modal" data-bs-target="#modalDeleteComment" title="Delete comment">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash text-dark me-3 svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Delete comment">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                </svg>
                                Delete comment
                            </a>
                        </div>
                    </form>
                </div>
            </section>
            <div class="modal fade" id="modalDeleteComment" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Confirm delete comment</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete your comment?</p>
                            <p class="text-danger">It can't be undone.</p>
                        </div>
                        <div class="modal-footer row">
                            <form id="deleteComment" method="post" action="<?php echo getApiPath('api-delete-comment.php?c='.$_GET['c'].'&p='.$_GET['p']); ?>" autocomplete="off">
                                <button type="button" class="btn btn-secondary col-sm-12 col-md-4" data-bs-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-danger col-sm-12 col-md-5 ms-3" value="Delete comment" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>