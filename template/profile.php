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
                    if (count($infoUser) == 0){
                        require 'error.php';
                        exit();
                    }
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
                        return '<i class="ai-user-minus ms-n1 me-2"></i>Unfollow';
                    } else {
                        return '<i class="ai-user-plus ms-n1 me-2"></i>Follow';
                    }
                }
            ?>
            <section class="card border-0 py-1 p-md-2 p-xl-3 mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3"><i class="ai-user text-primary lead pe-1 me-2"></i>
                    <input type="hidden" name="userID" id="userID" value="<?php echo $_GET['u']; ?>" />     
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
                            <i class="ai-edit ms-n1 me-2"></i>Edit info
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
                                <a data-bs-toggle="modal" data-bs-target="#modalFollowers" href="#" class="followerCount"></a>
                                Followed: 
                                <a data-bs-toggle="modal" data-bs-target="#modalFollowed" href="#" class="followedCount"></a>
                            </p>
                            <p class="fs-sm"><i class="ai-mail me-1"></i><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
                            <?php 
                                if ($country != NULL){
                                    echo '<p class="fs-sm"><i class="ai-map-pin me-1"></i>' . $country . "</p>";
                                }
                            ?>                           
                        </div>
                        
                        <?php if($bio != NULL): ?>
                        <div class="col-12 card mt-3">
                            <div class="card-body">
                                <h4 class="card-title d-inline fs-5">BIO:&nbsp;</h4><span class="card-text"><?php echo $bio; ?></span>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!--<div class="col-12 card mt-3" style="display: flex; justify-content: center; align-items: left; white-space: pre-line; ">
                            <?php /*echo $bio."</br>"; */ ?>
                            <div style="position: absolute; top: -12px; left: 40px; z-index: 1; color: #4999e9;">BIO</div>
                        </div>-->
                    </div>

                    <div class="card mt-5">
                        <div class="card-body">
                            <h4 class="card-title fs-5">POST</h4>
                            <div class="row mt-4">
                                <?php 
                                    if (count($allPosts) == 0) : ?>
                                    <div class="col-12 mb-4">
                                        <p class="text-center card-text"><?php echo $username; ?> has not published anything yet. 
                                            <br /> Come by again later...
                                        </p>
                                    </div>
                                <?php else: 
                                        foreach ($allPosts as $key => $value): ?>
                                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                                                <a href="post.php?p=<?php echo $value["ID"]; ?>"><p class="fs-md"><?php echo $value['title']; ?></p></a>
                                                <?php if($value['img']!= NULL){
                                                    $idPostImg = $dbh->getPostImgByPostID($value["ID"]);
                                                    echo '<img class="img-fluid" src="'.UPLOAD_POSTIMG_DIR . $idPostImg["path"] .'" alt="'. $idPostImg["altText"] .'">';
                                                }else{
                                                    echo '<p class="fs-sm">'. $value['text'] .'</p>';
                                                };
                                                ?>
                                            </div>
                                        <?php endforeach; 
                                    endif; ?>
                            </div>
                        </div>
                    </div>

                    <!--<div class="card mt-5">
                        <div class="card-body">
                            <div class="row">
                            <?php /*
                                foreach ($allPosts as $key => $value) {
                                    echo '<div class="card mt-5" style=" margin-top: 20px; margin-bottom: 20px; display: flex; justify-content: center; align-items: center; ">';
                                    echo '<div>'.$value['title']."<br></br>"; 
                                        if($value['img']!= NULL){
                                            $idPostImg = $dbh->getPostImgByPostID($value["ID"]);

                                            echo "<img src=".UPLOAD_POSTIMG_DIR.$idPostImg["path"].">";
                                        }else{
                                            echo $value['text'];
                                        };
                                        
                                        echo "</div>";
                                    echo "</div>";
                                }
                                */
                             ?>
                            </div>
                            <div style="position: absolute; top: -12px; left: 40px; z-index: 1; color: #4999e9;">POST</div>

                        </div>
                    </div>-->

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