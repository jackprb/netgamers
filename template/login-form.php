<?php 
    function getRegisterMSg($code){
        $msg[1] = "Error: Fill in all fields to complete the registration.";
        $msg[2] = "Error: there already is a user with this username.";
        $msg[3] = "Error: there already is a user registered with this email.";
        $msg[4] = "Error: the password does not match the requirements.";
        $msg[5] = "Error: the fields password and confirm password do not match.";
        return $msg[$code];
    }

    function getLoginMsg(){
        if(isset($_GET["d"]) && $_GET["d"] == 1){
            return "Your account has been deleted successfully.";
        }
        if(isset($_GET["a"]) && $_GET["a"] == 1){
            return "Error: Login to access the page.";
        }
        if(isset($_GET["el"]) && $_GET["el"] == 1){
            return "Error: Username and/or password are not valid.";
        }
        if(isset($_GET["el"]) && $_GET["el"] == 2){
            return "Error: To log in, type in your username and password.";
        }
    }
?>
    <!-- Sign in form-->
    <div class="d-flex justify-content-center align-items-center mb-4">
        <img class="logoBig" src="upload/logos/NetGamers_Logo_White.png" alt="Netgamers logo" style="height: 140px;" />
    </div>
    <div class="col-md-6 mb-5 mb-md-0">
        <div class="card dark-mode border-0 bg-primary py-md-3 py-lg-4 px-lg-4 px-xl-5">
            <div class="card-body">
                <h1 class="py-2 pb-lg-3">Log in</h1>

                <?php if(isset($_GET)): ?>
                    <p class="fw-semibold"><?php echo getLoginMsg(); ?></p>
                <?php endif; ?>

                <form action="./login_process.php" method="POST" autocomplete="off">
                    <div class="pb-3 mb-3">
                        <label class="form-label d-none" for="username">Username</label>
                        <input class="form-control form-control-lg" type="text" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="password-toggle mb-4">
                        <label class="form-label d-none" for="password">Password</label>
                        <input class="form-control form-control-lg" type="password" placeholder="Password" id="password" name="password" required>
                    </div>
                    <button class="btn btn-lg btn-light w-100 mb-4" type="submit" name="login">Log in</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-5 offset-xl-1">
        <div class="ps-md-3 ps-lg-5 ps-xl-0">
            <h2 class="h1 pb-2 pb-lg-3">No account? Sign Up</h2>

            <?php if(isset($_GET["r"]) && $_GET["r"] == 1): ?>
                <p class="fw-semibold">Registration completed successfully! Please log in.</p>
            <?php endif; ?>
            <?php if(isset($_GET["er"]) && $_GET["er"] >= 1 && $_GET["er"] <= 5): ?>
                <p class="fw-semibold"><?php echo getRegisterMSg($_GET["er"]); ?></p>
            <?php endif; ?>

            <form action="./register_process.php" method="POST" autocomplete="off">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-1 row-cols-lg-2">
                    <div class="col mb-4">
                        <label class="form-label d-none" for="usernameReg">Username</label>
                        <input class="form-control form-control-lg" type="text" placeholder="Username" required name="usernameReg" id="usernameReg">
                    </div>
                    <div class="col mb-4">
                        <label class="form-label d-none" for="email">Email address</label>
                        <input class="form-control form-control-lg" type="email" placeholder="Email address" required name="email" id="email">
                    </div>
                </div>
                <div class="password-toggle mb-4">
                    <label class="form-label d-none" for="psw">Password</label>
                    <input class="form-control form-control-lg" type="password" placeholder="Password" required name="psw" id="psw">
                </div>
                <div class="password-toggle mb-4">
                    <label class="form-label d-none" for="confPsw">Confirm password</label>
                    <input class="form-control form-control-lg" type="password" placeholder="Confirm password" required name="confPsw" id="confPsw">
                </div>
                <div class="alert alert-info d-flex my-3 my-sm-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-info-circle text-dark me-2 svg-md align-self-start" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                    <p class="mb-0">Password <strong>must</strong> be minimum 10 characters long and <strong>must</strong> contain at least one number, one special char and one capital letter.</p>
                </div>
                <button class="btn btn-lg btn-primary w-100 mb-4" type="submit" name="signup">Sign up</button>
            </form>
        </div>
    </div>