            <section class="card border-0 py-1 p-md-2 p-xl-3 mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3"><i class="ai-user text-primary lead pe-1 me-2"></i>
                        <h2 class="h4 mb-0">User profile</h2>
                        <a class="btn btn-sm btn-secondary ms-auto" href="account.php">
                            <i class="ai-edit ms-n1 me-2"></i>Edit info
                        </a>
                    </div>
                    <div class="row d-flex align-items-center text-nowrap">
                        <div class="col-2">
                            <img src="upload/userImages/default.png" class="userImg rounded-circle" alt="User image" style="width: 100px; height: 100px;" />
                        </div>
                        <div class="col-10">
                            <h3 class="h5 mb-2">User</h3>
                            <p class="fs-sm">
                                Followers: 
                                <a data-bs-toggle="modal" data-bs-target="#modalFollowers" href="#">100</a>
                                Followed: 
                                <a data-bs-toggle="modal" data-bs-target="#modalFollowed" href="#">1</a>
                            </p>
                            <p class="fs-sm"><i class="ai-mail me-1"></i>email@example.com</p>
                            <i class="ai-map-pin me-1"></i>USA
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="modal fade" id="modalFollowers" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Followers</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p> lista followers</p>
                    </div>
                    <div class="modal-footer flex-column flex-sm-row">
                        <button type="button" class="btn btn-secondary w-100 w-sm-auto mb-3 mb-sm-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="modalFollowed" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Followed</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p> lista followed</p>
                    </div>
                    <div class="modal-footer flex-column flex-sm-row">
                        <button type="button" class="btn btn-secondary w-100 w-sm-auto mb-3 mb-sm-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>