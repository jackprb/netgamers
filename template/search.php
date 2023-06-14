        <section id="search" class="mt-5 mx-sm-1">
            <form method="post" action="<?php echo getApiPath("api-search.php"); ?>">
                <div class="row justify-content-center text-center">
                    <div class="col-12 col-sm-12 col-md-6">
                        <label class="form-label fs-lg" for="search">Search</label>
                        <input class="form-control form-control-lg" type="text" required name="search" id="search" placeholder="Type here to search users and posts">
                    </div>
                    <div class="d-flex justify-content-center pt-3">
                        <input type="submit" class="btn btn-primary ms-3" value="Search" />
                    </div>
                </div>
            </form>
        </section>
