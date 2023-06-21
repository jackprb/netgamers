                <div class="card-footer">
                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <?php if($res[0]['img'] != NULL) : ?>
                            <a href="#" title="View the text content of this post" class="nav-item position-relative fs-4 p-2 mx-sm-1" data-bs-toggle="modal" data-bs-target="#modalText" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-list text-dark me-2 svg-lg" viewBox="0 0 16 16" role="img" aria-label="View the text content of this post">
                                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                </svg></a>
                            <?php endif; ?>
                            <a href="#commentTop" title="View comments" class="nav-item position-relative fs-4 p-2 mx-sm-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chat-right-dots text-dark me-2 svg-lg" viewBox="0 0 16 16" role="img" aria-label="View the comments for this post">
                                    <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                                    <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                            </a>
                            <a href="#." title="Like" class="nav-item text-danger position-relative fs-4 p-2 mx-sm-1"
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
                        echo '
                        <svg id="pLikeID" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-heart text-dark svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Like button">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                        </svg>';
                        
                    } else { // c'è like
                        echo '
                        <svg id="pLikeID" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-heart-fill text-dark svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Unlike button">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                        </svg>';
                    }
                }
                ?>