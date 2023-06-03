            <section class="card border-0 py-1 p-md-2 p-xl-3 mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3">
                        <i class="ai-square-plus text-primary lead pe-1 me-2"></i>
                        <h2 class="h4 mb-0">Create new post</h2>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row g-3 g-sm-4 mt-0 mt-lg-2">
                            <div class="col-sm-12 col-lg-10">
                                <label class="form-label" for="title">Title</label>
                                <input class="form-control" type="text" placeholder="Post title" id="title">
                            </div>
                            <div class="col-sm-12 col-lg-10">
                                <label class="form-label" for="postImg">Choose post image</label>
                                <input class="form-control" type="file" value="postImg" id="postImg" accept=".png,.gif,.jpg,.jpeg">
                            </div>
                        
                            <div class="col-sm-12 col-lg-10">
                                <label class="form-label" for="content">Post content</label>
                                <textarea class="form-control" rows="5" placeholder="Post content" id="content"></textarea>
                            </div>
                            <div class="col-sm-6 col-lg-5">
                                <input type="submit" class="btn btn-primary ms-auto" value="Publish"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>