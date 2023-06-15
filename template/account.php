            <?php
                $res = $dbh->getNotificationSettings($_SESSION["userID"]);
                $userImg = $dbh->getUserImg($_SESSION["username"]);
                $allInfoUser = $dbh->getAllUserData($_SESSION["userID"]);

                $arr = array();
                for ($i=0; $i < count($res); $i++) { 
                    $val = $res[$i];
                    $values = array_values($val);
                    $arr[$values[0]] = $values[1];
                }
                
                function updateDataMsg($code){
                    $msg[0] = "User data updated successfully.";
                    $msg[1] = "An error occurred. User data NOT updated. Retry later.";
                    if($code == 0){
                        $type = "alert-success";
                    } else {
                        $type = "alert-danger";
                    }
                    return array($type, $msg[$code]);
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

                function imgChangeMsg($code){
                    $type = "";
                    $msg[0] = "Profile image changed successfully.";
                    $msg[1] = "Cannot change profile image. Retry later. (DB error)";
                    $msg[2] = "Cannot change profile image: an error occurred while uploading the image.";
                    $msg[3] = "Profile image deleted successfully.";
                    $msg[4] = "Cannot delete your profile image. Retry later.";
                    $msg[5] = "The fields Alternative text and Long description must contain a description of your user profile image, at least 10 and 20 characters long, respectively.";
                    if($code == 0 || $code == 3){
                        $type = "alert-success";
                    } else {
                        $type = "alert-danger";
                    }
                    return array($type, $msg[$code]);
                }
                
                function getStatus($notificationType, $res){
                    if($res[$notificationType] == 1){
                        echo " checked ";
                    }
                }
                
                function printUserImgAlt($userImg){
                    echo $userImg[0]["altText"];
                }

                function isDefaultProfileImg($userImg){
                    return stripos($userImg[0]["path"], "default.png");
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
                                <img src="<?php echo getUserProfileImgPath(); ?>" class="userImg rounded-circle img-fluid" alt="<?php printUserImgAlt($userImg); ?>" />
                                <span class="d-block text-light text-center lh-1 pb-1" style="background-color: rgba(0,0,0,.5)">
                                    <i class="ai-camera"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu my-1">
                                <a class="dropdown-item fw-normal" href="#" data-bs-toggle="modal" data-bs-target="#modalUploadPhoto">
                                    <i class="ai-camera fs-base opacity-70 me-2"></i>Upload new photo
                                </a>
                                <?php if(!isDefaultProfileImg($userImg)): ?>
                                    <a class="dropdown-item fw-normal" href="#" data-bs-toggle="modal" data-bs-target="#modalDeletePhoto">
                                        <i class="ai-trash fs-base me-2"></i>Delete photo
                                    </a>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="ps-3">
                            <h3 class="h5 mb-1"><?php printUserName(); ?> - 
                                <span class="fs-lg text-muted mb-0"><a href="mailto:<?php printEmail($dbh); ?>"><?php printEmail($dbh); ?></a></span>
                            </h3>

                            <p class="fs-sm text-muted mb-0">Click on the image to change or delete it. <br> 
                                Upload only PNG, JPG of GIF images, max 500KB.
                            </p>
                        </div>
                    </div>
                    <?php if(isset($_GET["i"]) && $_GET["i"] >= 0 && $_GET["i"] <= 5): ?>
                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-6 alert <?php echo imgChangeMsg($_GET["i"])[0]; ?> alert-dismissible fade show" role="alert">
                                <div><?php echo imgChangeMsg($_GET["i"])[1]; ?></div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="<?php echo getApiPath('api-update-userdata.php'); ?>">
                        <?php if(isset($_GET["u"]) && $_GET["u"] >= 0 && $_GET["u"] <= 1): ?>
                        <div class="row g-3 g-sm-4 mt-0 mt-lg-2">
                            <div class="col-sm-12 col-md-6">
                                <div class="alert <?php echo updateDataMsg($_GET["u"])[0]; ?> alert-dismissible fade show" role="alert">
                                    <div><?php echo updateDataMsg($_GET["u"])[1]; ?></div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="row mt-0 mt-lg-2">
                            <div class="col-12 col-sm-12 col-md-6">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Type your name" value="<?php if(strlen($allInfoUser[0]['name'])>0) echo $allInfoUser[0]['name'];?>">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label class="form-label" for="surname">Surname</label>
                                <input class="form-control" type="text" name="surname" id="surname" placeholder="Type your surname" value="<?php if(strlen($allInfoUser[0]['surname'])>0) echo $allInfoUser[0]['surname'];?>">
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="form-label" for="country">Country</label>
                                <select class="form-select" id="country" name="country">
                                    <option value="" selected="" disabled="">Select country</option>
                                    <option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="British Virgin Islands">British Virgin Islands</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Colombia">Colombia</option><option value="Congo">Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Cote D Ivoire">Cote D Ivoire</option><option value="Croatia">Croatia</option><option value="Cruise Ship">Cruise Ship</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Polynesia">French Polynesia</option><option value="French West Indies">French West Indies</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guinea Bissau">Guinea Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kuwait">Kuwait</option><option value="Kyrgyz Republic">Kyrgyz Republic</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macau">Macau</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mexico">Mexico</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Namibia">Namibia</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reunion">Reunion</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Saint Pierre &amp; Miquelon">Saint Pierre &amp; Miquelon</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Satellite">Satellite</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="South Africa">South Africa</option><option value="South Korea">South Korea</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="St Kitts &amp; Nevis">St Kitts &amp; Nevis</option><option value="St Lucia">St Lucia</option><option value="St Vincent">St Vincent</option><option value="St. Lucia">St. Lucia</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Timor L'Este">Timor L'Este</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks &amp; Caicos">Turks &amp; Caicos</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Virgin Islands (US)">Virgin Islands (US)</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="form-label" for="language">Your main language</label>
                                <select class="form-select" id="language" name="language">
                                    <option value="" selected disabled>Select your main language</option>
                                    <option value="English">English</option>
                                    <option value="Italiano">Italiano</option>
                                    <option value="Espanol">Español</option>
                                    <option value="Francais">Français</option>
                                    <option value="Deutsch">Deutsch</option>
                                    <option value="Portugues">Português</option>
                                    <option value="Nederlands">Nederlands</option>
                                    <option value="Russian">Русский</option>
                                    <option value="Giapponese">日本語</option>
                                    <option value="CineseS">简体中文</option>
                                    <option value="Coreano">한국어</option>
                                    <option value="Arabo">العربية</option>
                                    <option value="Svenska">Svenska</option>
                                    <option value="Norsk">Norsk</option>
                                    <option value="Dansk">Dansk</option>
                                    <option value="Suomi">Suomi</option>
                                    <option value="Polski">Polski</option>
                                    <option value="Ceco">Čeština</option>
                                    <option value="Magyar">Magyar</option>
                                    <option value="Rumeno">Română</option>
                                    <option value="Greco">Ελληνικά</option>
                                    <option value="Turco">Türkçe</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label class="form-label" for="email">Email address</label>
                                <input class="form-control" type="email" value="<?php printEmail($dbh); ?>" id="email" name="email">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="bio">Bio</label>
                                <textarea class="form-control" rows="5" placeholder="Add a bio" id="bio" name="bio"><?php echo $allInfoUser[0]['bio']; ?></textarea>
                            </div>
                            <div class="col-12 d-flex justify-content-end pt-3">
                                <input type="submit" class="btn btn-primary ms-3" value="Save changes" name="submit"/>
                            </div>
                        </div>
                    </form>
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
                            <form action="<?php echo getApiPath('api-change-userImg.php'); ?>" method="post" id="uploadPhoto" enctype="multipart/form-data">
                                <div class="col-12">
                                    <label class="form-label" for="userImg">Choose your new profile image</label>
                                    <input class="form-control" required type="file" name="userImg" id="userImg" accept=".png,.gif,.jpg,.jpeg" />
                                </div>
                                <div class="col-12 mt-3">
                                    <label class="form-label" for="altText">Profile image alternative text</label>
                                    <textarea class="form-control" required placeholder="Short description of your user profile image - required for screen readers (minimum 10 chars)" name="altText" id="altText"></textarea>
                                </div>
                                <div class="col-12 mt-3">
                                    <label class="form-label" for="longDesc">Profile image long description text</label>
                                    <textarea class="form-control" required placeholder="Long description of your user profile image - required for screen readers (minimum 20 chars)" name="longDesc" id="longDesc"></textarea>
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
                            <form id="deletePhoto" method="post" action="<?php echo getApiPath('api-delete-userImg.php'); ?>">
                                <button type="button" class="btn btn-secondary col-sm-12 col-md-4" data-bs-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-danger col-sm-12 col-md-5 ms-3" value="Delete photo" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                let selectCountry = document.getElementById("country");
                selectCountry.value = "<?php echo $allInfoUser[0]['country'];?>"; 
                let selectLanguage = document.getElementById("language");
                selectLanguage.value = "<?php echo $allInfoUser[0]['language'];?>"; 
            </script>
