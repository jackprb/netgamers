        <section id="search" class="mt-5 mx-sm-1">
            <div class="d-flex justify-content-center pb-4 mb-0 mb-lg-1 mb-xl-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-search text-dark me-3 svg-lg" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg><h2 class="h4 mb-0">Search</h2>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-12 col-sm-12 col-md-6">
                    <label class="form-label fs-lg d-none" for="search">Search</label>
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