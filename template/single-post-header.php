                <div class="card-header">
                    <div class="row align-content-center">
                        <div class="col-2">
                            <img class="img-fluid userImgPostHeader" src="<?php echo UPLOAD_USERIMG_DIR . $userImg['path']; ?>" alt="<?php echo $userImg['altText']; ?>" />
                        </div>
                        <div class="col-8">
                            <h1 class="card-title text-center"><?php echo $res[0]['title']?></h1>
                        </div>
                        <div class="col-2 d-flex justify-content-end">
                            <?php if($_SESSION['userID'] == $res[0]['userID']): ?>
                            <a class="fs-4 p-2 mx-sm-1" href="modifyPost.php?p=<?php echo $res[0]['ID']?>">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square text-dark svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Edit post">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                            <a class="fs-4 p-2 mx-sm-1" data-bs-toggle="modal" data-bs-target="#modalDeletePost" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash text-dark me-2 svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Delete post">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                </svg>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>