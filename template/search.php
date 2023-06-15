        <section id="search" class="mt-5 mx-sm-1">
            <form method="get" action="getSearchResult(searchI);">
                <div class="row justify-content-center text-center">
                    <div class="col-12 col-sm-12 col-md-6">
                        <label class="form-label fs-lg" for="search">Search</label>
                        <input class="form-control form-control-lg" type="text" required name="searchI" id="searchI" placeholder="Type here to search users and posts">
                    </div>
                    <div class="row justify-content-center text-center mt-4">
                        <div class="col-12 col-sm-12 col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="searchUsername" name="searchType" checked value="username">
                                <label class="form-check-label" for="searchUsername">Search username</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="searchPostTitle" name="searchType" value="postTitle">
                                <label class="form-check-label" for="searchPostTitle">Search in post title</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="searchPostContent" name="searchType" value="postContent">
                                <label class="form-check-label" for="searchPostContent">Search in post content</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <input type="submit" class="btn btn-primary ms-3" id="searchBtn" href="#" value="Search" data-bs-toggle="#modalSearch"/>
                    </div>
                </div>
            </form>
        </section>
        
        <div class="modal fade" id="modalSearch" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Results: </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Total results: <span class="resultsCount"></span></p>
                        <ul class="list-group list-group-flush" id="resultsList">
                        </ul>
                    </div>
                    <div class="modal-footer flex-column flex-sm-row">
                        <button type="button" class="btn btn-secondary w-100 w-sm-auto mb-3 mb-sm-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
