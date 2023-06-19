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
                                <i class="ai-edit"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>