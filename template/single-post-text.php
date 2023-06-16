            <?php 
            $hasImage = FALSE;
            ?>
            
            

            <?php if(isset($_GET['c']) && $_GET['c'] == 1): ?>
            <div class="card py-1 p-md-2 p-xl-3 mb-4">
                <div class="ms-4 mt-4 p-2 w-sm-auto w-md-75" id="comments">
                    <h2 class="h1 py-lg-1 py-xl-3">14 comments</h2>
                    <!-- Comment-->
                    <div class="pt-2 pb-4">
                        <div class="d-flex align-items-center pb-1 mb-3"><img class="rounded-circle" src="assets/img/avatar/11.jpg" width="48" alt="Comment author">
                            <div class="ps-3">
                                <h6 class="mb-0">Jenny Wilson</h6><span class="fs-sm text-muted">2 days ago at 9:20</span>
                            </div>
                        </div>
                        <p class="pb-2 mb-0">Pellentesque urna pharetra.</p>
                        <button class="nav-link fs-sm fw-semibold px-0 py-2" type="button">Reply<i class="ai-redo fs-xl ms-2"></i></button>
                        
                        <!-- Comment reply-->
                        <div class="card card-body border-0 bg-secondary mt-4">
                            <div class="d-flex align-items-center pb-1 mb-3"><img class="rounded-circle" src="assets/img/avatar/10.jpg" width="48" alt="Comment author">
                                <div class="ps-3">
                                <h6 class="mb-0">Ralph Edwards</h6><span class="fs-sm text-muted">2 days ago at 11:45</span>
                                </div>
                            </div>
                        <p class="mb-0"><a class="fw-bold text-decoration-none" href="#">@Jenny Wilson</a> Massa morbi duis et ornare urna dictum vestibulum pulvinar nunc facilisis ornare id at at ut arcu integer tristique placerat non turpis nibh turpis ullamcorper est porttitor.</p>
                        </div>
                    </div>
                
                    <!-- All comments button-->
                    <div class="text-end pb-5 mb-lg-1 mb-xl-3">
                        <a class="btn btn-link px-0" href="#">Show all comments<i class="ai-chevron-right fs-lg ms-1"></i></a>
                    </div>
                    
                    <!-- Comment form-->
                    <div class="card border-0 pt-2 p-md-2 p-xl-3 p-xxl-4 mt-n3 mt-md-0">
                        <div class="card-body">
                            <h2 class="pb-2 pb-lg-3 pb-xl-4">Leave a comment</h2>
                            <form class="g-4" novalidate>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="c-name">Name</label>
                                        <input class="form-control" type="text" placeholder="Your name" required id="c-name">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="c-email">Email</label>
                                        <input class="form-control" type="email" placeholder="Your email" required id="c-email">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="c-comment">Comment</label>
                                        <textarea class="form-control" rows="4" placeholder="Type your comment here..." required id="c-comment"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Post a comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="modal fade" id="modalText" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Post title</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p> testo del post</p>
                        </div>
                        <div class="modal-footer flex-column flex-sm-row">
                            <button type="button" class="btn btn-secondary w-100 w-sm-auto mb-3 mb-sm-0" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>