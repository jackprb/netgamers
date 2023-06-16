        <section id="search" class="mt-5 mx-sm-1">
            <div class="row justify-content-center text-center">
                <div class="col-12 col-sm-12 col-md-6">
                    <label class="form-label fs-lg" for="search">Search</label>
                    <input class="form-control form-control-lg" type="text" autofocus name="searchI" id="searchI" placeholder="Type here to search users and posts">
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
                    <input type="button" onclick="updateSearchData();" class="btn btn-primary ms-3" id="searchBtn" href="#" value="Search"/>
                </div>
            </div>
        </section>
        <section class="row justify-content-center text-center">
            <ul class="list-group list-group-flush" id="resultsList">
            </ul>
        </section>