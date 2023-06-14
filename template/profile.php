            <?php
                $infoUser = array();
                $id = -1;
                if(isset($_GET['u']) && (int) $_GET['u'] > 0){
                    $infoUser = $dbh->getUserDataByID($_GET['u']);
                    $id = $_GET['u'];
                    if (count($infoUser) == 0){
                        require 'error.php';
                        exit();
                    }
                } else {
                    $infoUser = $dbh->getUserDataByID($_SESSION['userID']);
                    $id = $_SESSION['userID'];
                }
                $username = $infoUser['username'];
                $email = $infoUser['email'];
                $imgPath = $infoUser['img']['path'];
                $imgAltText = $infoUser['img']['altText'];
                $followers = $dbh->getFollowersList($id);
                $followed = $dbh->getFollowedList($id);
                $nrFollower = count($followers);
                $nrFollowed = count($followed);
            ?>
            <section class="card border-0 py-1 p-md-2 p-xl-3 mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3"><i class="ai-user text-primary lead pe-1 me-2"></i>
                        <?php if($_SESSION["userID"] == $id): ?>
                        <h2 class="h4 mb-0">My profile</h2>
                        <a class="btn btn-sm btn-primary ms-auto" href="account.php">
                            <i class="ai-edit ms-n1 me-2"></i>Edit info
                        </a>
                        <?php else: ?>
                        <h2 class="h4 mb-0">User profile</h2>
                        <form class="ms-auto" method="post" action="<?php ?>">
                            <input type="hidden" name="userID" id="userID" value="<?php echo $_GET['u']; ?>" />
                            <a class="btn btn-sm btn-primary" id="followButton" href="#">
                                <i class="ai-user-plus ms-n1 me-2"></i>Follow
                            </a>
                        </form>
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
                                <a data-bs-toggle="modal" data-bs-target="#modalFollowers" href="#"><?php echo $nrFollower; ?></a>
                                Followed: 
                                <a data-bs-toggle="modal" data-bs-target="#modalFollowed" href="#"><?php echo $nrFollowed; ?></a>
                            </p>
                            <p class="fs-sm"><i class="ai-mail me-1"></i><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
                            <i class="ai-map-pin me-1"></i>USA
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <img src="upload/logos/NetGamers_Logo.png" class="img-fluid" alt="User image" />
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <img src="upload/logos/NetGamers_Logo.png" class="img-fluid" alt="User image" />
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <img src="upload/logos/NetGamers_Logo.png" class="img-fluid" alt="User image" />
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <img src="upload/logos/NetGamers_Logo.png" class="img-fluid" alt="User image" />
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <img src="upload/logos/NetGamers_Logo.png" class="img-fluid" alt="User image" />
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <img src="upload/logos/NetGamers_Logo.png" class="img-fluid" alt="User image" />
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <img src="upload/logos/NetGamers_Logo.png" class="img-fluid" alt="User image" />
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <img src="upload/logos/NetGamers_Logo.png" class="img-fluid" alt="User image" />
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <img src="upload/logos/NetGamers_Logo.png" class="img-fluid" alt="User image" />
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <img src="upload/logos/NetGamers_Logo.png" class="img-fluid" alt="User image" />
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <img src="upload/logos/NetGamers_Logo.png" class="img-fluid" alt="User image" />
                                </div>
                            </div>
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
                        <p>Total followers: <?php echo $nrFollower; ?></p>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($followers as $username => $values): ?>
                            <li class="list-group-item">
                                <div class="card border-0 overflow-hidden">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-2 col-sm-2 ms-4 bg-repeat-0">
                                            <img src="<?php echo getUserImagePath($values['path']); ?>" class="img-fluid" alt="<?php echo $values['altText']; ?>" />
                                        </div>
                                        <div class="col-8 col-sm-8 ">
                                            <div class="card-body">
                                                <p class="card-text"><a href="profile.php?u=<?php echo $values['id']; ?>"><?php echo $username; ?></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
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
                        <p>Total followed: <?php echo $nrFollowed; ?></p>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($followed as $username => $values): ?>
                            <li class="list-group-item">
                                <div class="card border-0 overflow-hidden">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-2 col-sm-2 ms-4 bg-repeat-0">
                                            <img src="<?php echo getUserImagePath($values['path']); ?>" class="img-fluid" alt="<?php echo $values['altText']; ?>" />
                                        </div>
                                        <div class="col-8 col-sm-8 ">
                                            <div class="card-body">
                                                <p class="card-text"><a href="profile.php?u=<?php echo $values['id']; ?>"><?php echo $username; ?></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="modal-footer flex-column flex-sm-row">
                        <button type="button" class="btn btn-secondary w-100 w-sm-auto mb-3 mb-sm-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>