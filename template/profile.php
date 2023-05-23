        <div class="col-lg-10 col-sm-12 pb-2 pb-sm-4">
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
                        <img src="" alt="User image" />
                        <span class="d-block text-light text-center lh-1 pb-1" style="background-color: rgba(0,0,0,.5)">
                            <i class="ai-camera"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu my-1">
                        <a class="dropdown-item fw-normal" href="#"><i class="ai-camera fs-base opacity-70 me-2"></i>Upload new photo</a>
                        <a class="dropdown-item text-danger fw-normal" href="#"><i class="ai-trash fs-base me-2"></i>Delete photo</a>
                    </div>
                  </div>
                  <div class="ps-3">
                    <h3 class="h5 mb-1">Username - <span class="fs-lg text-muted mb-0">user@example.com</span></h3>
                    
                    <p class="fs-sm text-muted mb-0">Click on the image to change or delete it. <br> 
                        Upload only PNG, JPG of GIF images, max 500KB.
                    </p>
                  </div>
                </div>
                <div class="row g-3 g-sm-4 mt-0 mt-lg-2">
                  <div class="col-sm-6">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" type="text" value="name" id="name">
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="surname">Surname</label>
                    <input class="form-control" type="text" value="surname" id="surname">
                  </div>
                  <div class="col-sm-6">
                      <label class="form-label" for="country">Country</label>
                    <select class="form-select" id="country">
                        <option value="" selected disabled>Select country</option>
                      <?php generateListOfCountries(); ?>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="language">Language</label>
                    <select class="form-select" id="language">
                        <option value="" selected disabled>Select language</option>
                      <option value="English">English</option>
                      <option value="Français">Français</option>
                      <option value="Deutsch">Deutsch</option>
                      <option value="Italiano">Italiano</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="email">Email address</label>
                    <input class="form-control" type="email" value="email@example.com" id="email">
                  </div>
                  <div class="col-12">
                    <label class="form-label" for="bio">Bio</label>
                    <textarea class="form-control" rows="5" placeholder="Add a bio" id="bio"></textarea>
                  </div>

                  <div class="col-12 d-flex justify-content-end pt-3">
                    <input type="submit" class="btn btn-primary ms-3" value="Save changes" />
                  </div>
                </div>
              </div>
            </section>

            <!-- Password-->
            <section class="card border-0 py-1 p-md-2 p-xl-3  mb-4">
              <div class="card-body">
                <form action="" method="post">
                    <div class="d-flex align-items-center pb-4 mt-sm-n1 mb-0 mb-lg-1 mb-xl-3">
                        <i class="ai-lock-closed text-primary lead pe-1 me-2"></i>
                        <h2 class="h4 mb-0">Password change</h2>
                      </div>
                      <div class="row align-items-center g-3 g-sm-4 pb-3">
                        <div class="col-sm-6">
                          <label class="form-label" for="current-pass">Current password</label>
                          <div class="password-toggle">
                            <input class="form-control" type="password" value="hidden@password" id="current-pass">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                              <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6">
                          <label class="form-label" for="new-pass">New password</label>
                          <div class="password-toggle">
                            <input class="form-control" type="password" id="new-pass">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                              <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <label class="form-label" for="confirm-pass">Confirm new password</label>
                          <div class="password-toggle">
                            <input class="form-control" type="password" id="confirm-pass">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                              <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="alert alert-info d-flex my-3 my-sm-4"><i class="ai-circle-info fs-xl me-2"></i>
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
                <div class="d-flex align-items-center pb-4 mt-sm-n1 mb-0 mb-lg-1 mb-xl-3"><i class="ai-bell text-primary lead pe-1 me-2"></i>
                  <h2 class="h4 mb-0">Notifications</h2>
                  <button class="btn btn-sm btn-outline-secondary ms-auto" type="button" data-bs-toggle="checkbox" data-bs-target="#checkboxList">Toggle all</button>
                </div>
                <form action="" method="post">
                    <div id="checkboxList">
                        <div class="form-check form-switch d-flex pb-md-2 mb-4">
                          <input class="form-check-input flex-shrink-0" type="checkbox" checked id="product-sold">
                          <label class="form-check-label ps-3 ps-sm-4" for="product-sold"><span class="h6 d-block mb-2">Product sold notifications</span><span class="fs-sm text-muted">Send an email when someone purchased one of my products</span></label>
                        </div>
                        <div class="form-check form-switch d-flex pb-md-2 mb-4">
                          <input class="form-check-input flex-shrink-0" type="checkbox" checked id="product-update">
                          <label class="form-check-label ps-3 ps-sm-4" for="product-update"><span class="h6 d-block mb-2">Product update notifications</span><span class="fs-sm text-muted">Send an email when a product I've purchased is updated</span></label>
                        </div>
                        <div class="form-check form-switch d-flex pb-md-2 mb-4">
                          <input class="form-check-input flex-shrink-0" type="checkbox" id="product-comment">
                          <label class="form-check-label ps-3 ps-sm-4" for="product-comment"><span class="h6 d-block mb-2">Product comment notifications</span><span class="fs-sm text-muted">Send an email when someone comments on one of my products</span></label>
                        </div>
                        <div class="form-check form-switch d-flex pb-md-2 mb-4">
                          <input class="form-check-input flex-shrink-0" type="checkbox" checked id="product-review">
                          <label class="form-check-label ps-3 ps-sm-4" for="product-review"><span class="h6 d-block mb-2">Product review notifications</span><span class="fs-sm text-muted">Send an email when someone leaves a review with his/her rating</span></label>
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
                <div class="d-flex align-items-center pb-4 mt-sm-n1 mb-0 mb-lg-1 mb-xl-3"><i class="ai-trash text-primary lead pe-1 me-2"></i>
                  <h2 class="h4 mb-0">Delete account</h2>
                </div>
                <div class="alert alert-warning d-flex mb-4"><i class="ai-triangle-alert fs-xl me-2"></i>
                  <p class="mb-0">When you delete your account, your public profile will be deactivated immediately.
                    If you change your mind before the 14 days are up, sign in with your email and password to reactivate account.
                    <a href='#' class='alert-link'>Learn more</a></p>
                </div>
                <form action="" method="post">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="confirmDelete">
                      <label class="form-check-label text-dark fw-medium" for="confirmDelete">Yes, I want to delete my account</label>
                    </div>
                    <div class="d-flex flex-column flex-sm-row justify-content-end pt-4 mt-sm-2 mt-md-3">
                      <input type="submit" class="btn btn-danger" type="button" value="Delete account" />
                    </div>
                </form>
              </div>
            </section>
        </div>