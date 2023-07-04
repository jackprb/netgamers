            <?php
                $id = -1; // di utente visualizzato
                $infoUser = array();

                $infoLoggedinUser = $dbh->getUserDataByID($_SESSION['userID']);
                $idLoggedinUser = $_SESSION['userID'];
                $followersLoggedInUser = $dbh->getFollowersList($idLoggedinUser);
                $followedLoggedinUser = $dbh->getFollowedList($idLoggedinUser);
                $allPosts = $dbh->getAllPostOfUser($_GET['u']);

                if(isset($_GET['u']) && (int) $_GET['u'] > 0){
                    $infoUser = $dbh->getUserDataByID($_GET['u']);
                    $id = $_GET['u'];
                }

                $username = $infoUser['username'];
                $email = $infoUser['email'];
                $imgPath = $infoUser['img']['path'];
                $imgAltText = $infoUser['img']['altText'];
                $bio = $infoUser['bio'];
                $name = $infoUser['name'];
                $surname = $infoUser['surname'];
                $country = $infoUser['country'];
                
                $followers = $dbh->getFollowersList($id);
                $followed = $dbh->getFollowedList($id);
                $nrFollower = count($followers);
                $nrFollowed = count($followed);
                
                function printFollowUnFollow($username, $listFollowed){
                    if (array_key_exists($username, $listFollowed)){ // se utente loggedin segue già utente visualizzato
                        return '<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-dash text-dark me-2 svg-md" viewBox="0 0 16 16" aria-hidden="true">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7ZM11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1Zm0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                                    <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                                </svg>Unfollow';
                    } else {
                        return '<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-add text-dark me-2 svg-md" viewBox="0 0 16 16" aria-hidden="true">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                                    <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                                </svg>Follow';
                    }
                }
            ?>
            <section class="card border-0 py-1 p-md-2 p-xl-3 mb-4">
                <div class="card-body">
                    <?php if(isset($_GET["d"]) && $_GET["d"] == 0): ?>
                    <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                        <div>Post deleted successfully.</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($_GET["d"]) && $_GET["d"] == 1): ?>
                    <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                        <div>An error occurred. The post has NOT been deleted.</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                    <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person text-dark me-3 svg-lg" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                        </svg><input type="hidden" name="userID" id="userID" value="<?php echo $_GET['u']; ?>" />     
                    <?php if($_SESSION["userID"] == $id): ?>
                        <h2 class="h4 mb-0">
                            <?php 
                                if ($name != NULL && $surname != NULL){
                                    echo $name . ' ' . $surname;
                                }else {
                                    echo 'My Profile';
                                }      
                            ?>
                        </h2>
                        <a class="btn btn-sm btn-primary ms-auto" href="account.php">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square text-dark me-3 svg-md" viewBox="0 0 16 16" aria-hidden="true">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            Edit info
                        </a>
                    <?php else: ?>
                        <h2 class="h4 mb-0">
                            <?php 
                                if ($name != NULL && $surname != NULL){
                                    echo $name . ' ' . $surname;
                                }else {
                                    echo 'User Profile';
                                } 
                            ?>
                        </h2>
                        <div class="ms-auto">
                            <button class="btn btn-sm btn-primary" id="followButton" onclick="update();">
                                <?php echo printFollowUnFollow($username, $followedLoggedinUser); ?>
                            </button>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="row d-flex align-items-center text-nowrap">
                        <div class="col-5 col-sm-5 col-md-3 col-lg-4 ms-4">
                            <img src="<?php echo getUserImagePath($imgPath); ?>" class="userImg rounded-circle img-fluid" alt="<?php echo $imgAltText;?>" />
                        </div>
                        <div class="col-5 col-sm-5 col-md-6 col-lg-7">
                            <h3 class="h5 mb-2"><?php echo $username; ?></h3>
                            <p class="fs-sm">
                                Followers: 
                                <a data-bs-toggle="modal" data-bs-target="#modalFollowers" href="#" class="followerCount" title="Follower"></a>
                                &nbsp;Followed: 
                                <a data-bs-toggle="modal" data-bs-target="#modalFollowed" href="#" class="followedCount" title="Followed"></a>
                            </p>
                            <p class="fs-sm">Published posts: <?php echo count($allPosts);?></p>
                            <p class="fs-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-envelope text-dark me-2 svg-md" viewBox="0 0 16 16" role="img" aria-label="User email">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                </svg>
                                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                            </p>
                            <?php 
                                if ($country != NULL){
                                    echo '<p class="fs-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-geo-alt text-dark me-2 svg-md" viewBox="0 0 16 16" role="img" aria-label="User location">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                        <a class="text-decoration-none" target="_blank" href="https://google.com/maps/place/' . $country . '">' . $country . '</a></p>';
                                }
                            ?>                           
                        </div>
                        
                        <?php if($bio != NULL): ?>
                        <div class="col-12 card mt-3">
                            <div class="card-body">
                                <h4 class="card-title d-inline fs-5">BIO</h4>
                                <p class="card-text mt-4" style="white-space: pre-wrap;"><?php echo $bio; ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="card mt-5">
                        <div class="card-body">
                            <h4 class="card-title d-inline fs-5">POST</h4>
                            <div class="row mt-4">
                                <?php 
                                    if (count($allPosts) == 0) : ?>
                                    <div class="col-12 mb-4">
                                        <p class="text-center card-text"><?php echo $username; ?> has not published anything yet. 
                                            <br/> Come by again later...
                                        </p>
                                    </div>
                                <?php else: 
                                        foreach ($allPosts as $key => $value): ?>
                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                                                <a class="fs-md" href="post.php?p=<?php echo $value["ID"]; ?>"><?php echo $value['title']; ?></a>
                                                <?php if($value['img']!= NULL){
                                                    $idPostImg = $dbh->getPostImgByPostID($value["ID"]);
                                                    echo '<a class="fs-md" href="post.php?p='. $value["ID"] .'"><img class="img-fluid" src="'.UPLOAD_POSTIMG_DIR . $idPostImg["path"] .'" alt="'. $idPostImg["altText"] .'"></a>';
                                                }else{
                                                    echo '<a class="fs-sm text-decoration-none" href="post.php?p='. $value["ID"] .'"><p class="fs-sm">'. $value['text'] .'</p></a>';
                                                };
                                                ?>
                                            </div>
                                <?php   endforeach; 
                                    endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        
        <div class="modal fade" id="modalFollowers" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Followers</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Total followers: <span class="followerCount"></span></p>
                        <ul class="list-group list-group-flush" id="followerList">
                        </ul>
                    </div>
                    <div class="modal-footer flex-column flex-sm-row">
                        <button type="button" class="btn btn-secondary w-100 w-sm-auto mb-3 mb-sm-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="modalFollowed" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Followed</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Total followed: <span class="followedCount"></span></p>
                        <ul class="list-group list-group-flush" id="followedList">
                        </ul>
                    </div>
                    <div class="modal-footer flex-column flex-sm-row">
                        <button type="button" class="btn btn-secondary w-100 w-sm-auto mb-3 mb-sm-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>