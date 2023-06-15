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
    <img class="logoBig" src="" style="height: 140px;" alt="" />
</div>
<div class="col-md-6 mb-5 mb-md-0">
    <div class="card dark-mode border-0 bg-primary py-md-3 py-lg-4 px-lg-4 px-xl-5">
        <div class="card-body">
            <h1 class="py-2 pb-lg-3">Log in</h1>

            <?php if(isset($_GET)): ?>
                <p class="fw-semibold"><?php echo getLoginMsg(); ?></p>
            <?php endif; ?>

            <form action="./login_process.php" method="POST">
                <div class="pb-3 mb-3">
                    <div class="position-relative"><i class="ai-user fs-lg position-absolute top-50 start-0 translate-middle-y text-light opacity-80 ms-3"></i>
                        <input class="form-control form-control-lg ps-5" type="text" name="username" id="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="position-relative"><i class="ai-lock-closed fs-lg position-absolute top-50 start-0 translate-middle-y text-light opacity-80 ms-3"></i>
                        <div class="password-toggle">
                            <input class="form-control form-control-lg ps-5" type="password" placeholder="Password" id="password" name="password" required>
                            
                        </div>
                    </div>
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

        <form action="./register_process.php" method="POST">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-1 row-cols-lg-2">
                <div class="col mb-4">
                    <input class="form-control form-control-lg" type="text" placeholder="Username" required name="usernameReg" id="usernameReg">
                </div>
                <div class="col mb-4">
                    <input class="form-control form-control-lg" type="email" placeholder="Email address" required name="email" id="email">
                </div>
            </div>
            <div class="password-toggle mb-4">
                <input class="form-control form-control-lg" type="password" placeholder="Password" required name="psw" id="psw">
                
            </div>
            <div class="password-toggle mb-4">
                <input class="form-control form-control-lg" type="password" placeholder="Confirm password" required name="confPsw" id="confPsw">
                
            </div>
            <div class="alert alert-info d-flex my-3 my-sm-4">
                <i class="ai-circle-info fs-xl me-2"></i>
                <p class="mb-0">Password <strong>must</strong> be minimum 10 characters long and <strong>must</strong> contain at least one number, one special char and one capital letter.</p>
            </div>
            <button class="btn btn-lg btn-primary w-100 mb-4" type="submit" name="signup">Sign up</button>
        </form>
    </div>
</div>