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
                            <a href="#" title="Like" class="nav-item position-relative fs-4 p-2 mx-sm-1">
                                <i class="ai-heart"></i>
                            </a>
                        </div>
                    </div>   
                </div>
                