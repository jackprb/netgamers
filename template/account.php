            <?php
                $res = $dbh->getNotificationSettings($_SESSION["userID"]);
                $arr = array();
                for ($i=0; $i < count($res); $i++) { 
                    $val = $res[$i];
                    $values = array_values($val);
                    $arr[$values[0]] = $values[1];
                }
                
                function pswChangeMsg($code){
                    $msg[1] = "Cannot change password: retry later.";
                    $msg[2] = "Cannot change password: your current password is not correct.";
                    $msg[3] = "Cannot change password: the new password does not match the requirements.";
                    $msg[4] = "Cannot change password: the fields 'new password' and 'confirm password' do not match.";
                    $msg[5] = "Cannot change password: the new password is equal to the current password.";
                    $msg[6] = "Cannot change password: fill in all the required fields.";
                    return $msg[$code];
                }
                
                function getStatus($notificationType, $res){
                    if($res[$notificationType] == 1){
                        echo " checked ";
                    }
                }
            ?>
            <section class="card border-0 py-1 p-md-2 p-xl-3 mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mt-sm-n1 pb-2 mb-0 mb-lg-1 mb-xl-3">
                        <i class="ai-user text-primary lead pe-1 me-2"></i>
                        <h2 class="h4 mb-0">User info</h2>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="dropdown">
                            <a class="d-flex flex-column justify-content-end position-relative overflow-hidden rounded-circle bg-size-cover bg-position-center flex-shrink-0" 
                                href="#" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100px; height: 100px;">
                                <img src="upload/userImages/default.png" class="userImg rounded-circle img-fluid" alt="User image" />
                                <span class="d-block text-light text-center lh-1 pb-1" style="background-color: rgba(0,0,0,.5)">
                                    <i class="ai-camera"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu my-1">
                                <a class="dropdown-item fw-normal" href="#" data-bs-toggle="modal" data-bs-target="#modalUploadPhoto">
                                    <i class="ai-camera fs-base opacity-70 me-2"></i>Upload new photo
                                </a>
                                <a class="dropdown-item fw-normal" href="#" data-bs-toggle="modal" data-bs-target="#modalDeletePhoto">
                                    <i class="ai-trash fs-base me-2"></i>Delete photo
                                </a>
                            </div>
                        </div>
                        <div class="ps-3">
                            <h3 class="h5 mb-1"><?php printUserName(); ?> - 
                                <span class="fs-lg text-muted mb-0"><?php printEmail($dbh); ?></span>
                            </h3>

                            <p class="fs-sm text-muted mb-0">Click on the image to change or delete it. <br> 
                                Upload only PNG, JPG of GIF images, max 500KB.
                            </p>
                        </div>
                    </div>
                    <div class="row g-3 g-sm-4 mt-0 mt-lg-2">
                        <div class="col-12 col-sm-12 col-md-6">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" type="text" value="name" id="name">
                        </div>
                        <div class="col-12 col-sm-12 col-md-6">
                            <label class="form-label" for="surname">Surname</label>
                            <input class="form-control" type="text" value="surname" id="surname">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label" for="country">Country</label>
                            <select class="form-select" id="country" name="country">
                                <option value="" selected disabled>Select country</option>
                                <?php generateListOfCountries(); ?>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label" for="language">Language</label>
                            <select class="form-select" id="language" name="language">
                                <option value="" selected disabled>Select language</option>
                                <option value="English">English</option>
                                <option value="Italiano">Italiano</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6">
                            <label class="form-label" for="email">Email address</label>
                            <input class="form-control" type="email" value="<?php printEmail($dbh); ?>" id="email" name="email">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="bio">Bio</label>
                            <textarea class="form-control" rows="5" placeholder="Add a bio" id="bio" name="bio"></textarea>
                        </div>
                        
                        <div class="col-12 d-flex justify-content-end pt-3">
                            <input type="submit" class="btn btn-primary ms-3" value="Save changes" name="submit"/>
                        </div>
                    </div>
                </div>
            </section>
        
            <!-- Password-->
            <section class="card border-0 py-1 p-md-2 p-xl-3  mb-4">
                <div class="card-body">
                    <form action="<?php echo getApiPath('api-change-psw.php'); ?>" method="post">
                        <div class="d-flex align-items-center pb-4 mt-sm-n1 mb-0 mb-lg-1 mb-xl-3">
                            <i class="ai-lock-closed text-primary lead pe-1 me-2"></i>
                            <h2 class="h4 mb-0">Password change</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-sm-12 col-md-6">
                                <?php if(isset($_GET["r"]) && $_GET["r"] == 0): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <div><i class="ai-circle-check fs-xl pe-1 me-2"></i>Password modificata con successo!</div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                                <?php if(isset($_GET["r"]) && $_GET["r"] >= 1 && $_GET["r"] <= 6): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <div><i class="ai-circle-alert fs-xl pe-1 me-2"></i><?php echo pswChangeMsg($_GET["r"]);?></div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row align-items-center g-3 g-sm-4 pb-3">
                            <div class="col-sm-6">
                                <label class="form-label" for="currPsw">Current password</label>
                                <div class="password-toggle">
                                    <input class="form-control" type="password" placeholder="Current password" id="currPsw" name="currPsw" required/>
                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                        <input class="password-toggle-check" type="checkbox" />
                                        <span class="password-toggle-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <label class="form-label" for="newPsw">New password</label>
                                <div class="password-toggle">
                                    <input class="form-control" type="password" placeholder="New password" id="newPsw" name="newPsw" required />
                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                        <input class="password-toggle-check" type="checkbox">
                                        <span class="password-toggle-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="confirmPsw">Confirm new password</label>
                                <div class="password-toggle">
                                    <input class="form-control" type="password" placeholder="Confirm new password" id="confirmPsw" name="confirmPsw" required />
                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                        <input class="password-toggle-check" type="checkbox" />
                                        <span class="password-toggle-indicator"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-info d-flex my-3 my-sm-4">
                            <i class="ai-circle-info fs-xl me-2"></i>
                            <p class="mb-0">Password must be minimum 10 characters long and must contain at least 
                                <ul>
                                    <li>a number</li>
                                    <li>a special char and</li>
                                    <li>a capital letter.</li>
                                </ul>
                            </p>
                        </div>
                        <div class="d-flex justify-content-end pt-3">
                            <input type="submit" class="btn btn-primary ms-3" value="Save changes" />
                        </div>
                    </form>
                </div>
            </section>

            <!-- Notifications-->
            <section class="card border-0 py-1 p-md-2 p-xl-3 mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center pb-4 mt-sm-n1 mb-0 mb-lg-1 mb-xl-3">
                        <i class="ai-bell text-primary lead pe-1 me-2"></i>
                        <h2 class="h4 mb-0">Notifications</h2>
                        <button class="btn btn-sm btn-primary ms-auto" type="button" data-bs-toggle="checkbox" 
                            data-bs-target="#checkboxList">Toggle all</button>
                    </div>
                    <form action="<?php echo getApiPath('api-notification-preferences.php'); ?>" method="post">
                        <?php if(isset($_GET["n"]) && $_GET["n"] == 0): ?>
                            <div class="alert alert-success alert-dismissible fade show col-sm-12 col-md-6" role="alert">
                                <div><i class="ai-circle-check fs-xl pe-1 me-2"></i>Notification settings updated successfully.</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;?>
                        <?php if(isset($_GET["n"]) && $_GET["n"] == 1): ?>
                            <div class="alert alert-success alert-dismissible fade show col-sm-12 col-md-6" role="alert">
                                <div><i class="ai-circle-check fs-xl pe-1 me-2"></i>Cannot update notification settings. Retry later.</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;?>
                        <div id="checkboxList">
                            <div class="form-check form-switch d-flex pb-md-2 mb-4">
                                <input class="form-check-input flex-shrink-0" type="checkbox" <?php getStatus("NFOLLOWER", $arr); ?> id="NFOLLOWER" name="NFOLLOWER" />
                                <label class="form-check-label ps-3 ps-sm-4" for="NFOLLOWER">
                                    <span class="h6 d-block mb-2">New follower notifications <span class="badge bg-info">Active by default</span></span>
                                    
                                    <span class="fs-sm text-muted">Send a notification when someone starts following me.</span>
                                </label>
                            </div>
                            <div class="form-check form-switch d-flex pb-md-2 mb-4">
                                <input class="form-check-input flex-shrink-0" type="checkbox" <?php getStatus("NCOMMENT", $arr); ?> id="NCOMMENT" name="NCOMMENT" />
                                <label class="form-check-label ps-3 ps-sm-4" for="NCOMMENT">
                                    <span class="h6 d-block mb-2">New comment notifications <span class="badge bg-info">Active by default</span></span>
                                    <span class="fs-sm text-muted">Send a notification when someone comments one of my posts.</span>
                                </label>
                            </div>
                            <div class="form-check form-switch d-flex pb-md-2 mb-4">
                                <input class="form-check-input flex-shrink-0" type="checkbox" <?php getStatus("NPOSTFEED", $arr); ?> id="NPOSTFEED" name="NPOSTFEED" />
                                <label class="form-check-label ps-3 ps-sm-4" for="NPOSTFEED">
                                    <span class="h6 d-block mb-2">New post on feed notifications</span>
                                    <span class="fs-sm text-muted">Send a notification when someone I follow posts something new.</span>
                                </label>
                            </div>
                            <div class="form-check form-switch d-flex pb-md-2 mb-4">
                                <input class="form-check-input flex-shrink-0" type="checkbox" <?php getStatus("NLIKEPOST", $arr); ?> id="NLIKEPOST" name="NLIKEPOST" />
                                <label class="form-check-label ps-3 ps-sm-4" for="NLIKEPOST">
                                    <span class="h6 d-block mb-2">New like on post notifications</span>
                                    <span class="fs-sm text-muted">Send a notification when someone likes one of my posts.</span>
                                </label>
                            </div>
                            <div class="form-check form-switch d-flex pb-md-2 mb-4">
                                <input class="form-check-input flex-shrink-0" type="checkbox" <?php getStatus("NLIKECOMMENT", $arr); ?> id="NLIKECOMMENT" name="NLIKECOMMENT" />
                                <label class="form-check-label ps-3 ps-sm-4" for="NLIKECOMMENT">
                                    <span class="h6 d-block mb-2">New like on comment notifications</span>
                                    <span class="fs-sm text-muted">Send a notification when someone likes one of my comments.</span>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end pt-3">
                            <input type="submit" class="btn btn-primary ms-3" value="Save changes" />
                        </div>
                    </form>
                </div>
            </section>
            
            <!-- Delete account-->
            <section class="card border-0 py-1 p-md-2 p-xl-3">
                <div class="card-body">
                    <div class="d-flex align-items-center pb-4 mt-sm-n1 mb-0 mb-lg-1 mb-xl-3">
                        <i class="ai-trash text-primary lead pe-1 me-2"></i>
                        <h2 class="h4 mb-0">Delete account</h2>
                    </div>
                    <div class="alert alert-danger d-flex mb-4"><i class="ai-triangle-alert fs-xl me-2"></i>
                        <p class="mb-0">If you delete your account, your public profile will be deactivated immediately.<br>
                        There is no way back!!</p>
                    </div>

                    <?php if(isset($_GET["r"]) && $_GET["r"] == 7): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div><i class="ai-triangle-alert fs-xl pe-1 me-2"></i>To delete your account, you need to tick the checkbox</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(isset($_GET["r"]) && $_GET["r"] == 8): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div><i class="ai-triangle-alert fs-xl pe-1 me-2"></i>An error occurred while deleting your account. Your account has NOT been deleted.</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo getApiPath('api-delete-account.php'); ?>" method="post" id="deleteAccount">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="confirmDelete" id="confirmDelete" required>
                            <label class="form-check-label text-dark fw-medium" for="confirmDelete">Yes, I want to delete my account</label>
                        </div>
                        <div class="d-flex flex-column flex-sm-row justify-content-end pt-4 mt-sm-2 mt-md-3">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalConfirmDelete" class="btn btn-danger">Delete account</button>
                        </div>
                    </form>
                </div>
            </section>

            <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Confirm delete account</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete your account?</p>
                            <p class="text-danger">There is NO WAY BACK!</p>
                        </div>
                        <div class="modal-footer row">
                            <button type="button" class="btn btn-secondary col-sm-12 col-md-4" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-danger col-sm-12 col-md-5 ms-3" value="Delete account" form="deleteAccount" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalUploadPhoto" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Upload photo</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Choose the image to upload as your profile image. <br>
                                Upload only PNG, JPG of GIF images, max 500KB.
                            </p>
                            <form action="" method="post">
                                <div class="col-12">
                                    <label class="form-label" for="postImg">Choose post image</label>
                                    <input class="form-control" type="file" value="postImg" id="postImg" accept=".png,.gif,.jpg,.jpeg">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer row">
                            <button type="button" class="btn btn-secondary col-sm-12 col-md-4" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary col-sm-12 col-md-5 ms-3" value="Upload image" form="uploadPhoto" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalDeletePhoto" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Confirm delete photo</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete your profile image?</p>
                            <p class="text-danger">It can't be undone.</p>
                        </div>
                        <div class="modal-footer row">
                            <button type="button" class="btn btn-secondary col-sm-12 col-md-4" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-danger col-sm-12 col-md-5 ms-3" value="Delete photo"/>
                        </div>
                    </div>
                </div>
            </div>
