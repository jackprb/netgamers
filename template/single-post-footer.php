                <div class="card-footer">
                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <?php if($res[0]['img'] != NULL) : ?>
                            <a href="#" title="View text content" class="nav-item position-relative fs-4 p-2 mx-sm-1" data-bs-toggle="modal" data-bs-target="#modalText" >
                                <i class="ai-note"></i>
                            </a>
                            <?php endif; ?>
                            <a href="#commentTop" title="View comments" class="nav-item position-relative fs-4 p-2 mx-sm-1">
                                <i class="ai-messages"></i>
                            </a>
                            <a href="#" title="Like" class="nav-item text-danger position-relative fs-4 p-2 mx-sm-1 likeBtn"
                                onclick="likeButtonChanger(<?php echo $_GET['p']; ?>, <?php echo intval($_SESSION['userID']); ?>);">
                                <?php hasLike($dbh); ?>
                            </a>
                        </div>
                    </div>   
                </div>
                
                <?php 
                function hasLike($dbh){
                    $postID = $_GET['p'];
                    $userID = intval($_SESSION['userID']);
                    $res = $dbh->hasLikePost($userID, $postID);
                    if(count($res) == 0){ //no like
                        echo '<i class="ai-heart"></i>';
                    } else { // c'è like
                        echo '<i class="ai-heart-filled"></i>';
                    }
                }
                ?>