<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <title><?php echo $templateParams["titolo"]; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="icon" type="image/png" sizes="32x32" href="upload/logos/NetGamers_Icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="upload/logos/NetGamers_Icon.png">
    
    <meta name="theme-color" content="white">
    <!-- Theme mode-->
    <script>
        let mode = window.localStorage.getItem('mode'),
        root = document.getElementsByTagName('html')[0];
        if (mode !== undefined && mode === 'dark') {
            root.classList.add('dark-mode');
        } else {
            root.classList.remove('dark-mode');
        }
    </script>
    
    <!-- Page loading styles-->
    <style>
        .page-loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transition: all .4s .2s ease-in-out;
            transition: all .4s .2s ease-in-out;
            background-color: #fff;
            opacity: 0;
            visibility: hidden;
            z-index: 9999;
        }
        .dark-mode .page-loading {
            background-color: #121519;
        }
        .page-loading.active {
            opacity: 1;
            visibility: visible;
        }
        .page-loading-inner {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: opacity .2s ease-in-out;
            transition: opacity .2s ease-in-out;
            opacity: 0;
        }
        .page-loading.active > .page-loading-inner {
            opacity: 1;
        }
        .page-loading-inner > span {
            display: block;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: normal;
            color: #6f788b;
        }
        .dark-mode .page-loading-inner > span {
            color: #fff;
            opacity: .6;
        }
        .page-spinner {
            display: inline-block;
            width: 2.75rem;
            height: 2.75rem;
            margin-bottom: .75rem;
            vertical-align: text-bottom;
            background-color: #d7dde2; 
            border-radius: 50%;
            opacity: 0;
            -webkit-animation: spinner .75s linear infinite;
            animation: spinner .75s linear infinite;
        }
        .dark-mode .page-spinner {
            background-color: rgba(255,255,255,.25);
        }
        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
            }
            50% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }
        @keyframes spinner {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
            }
            50% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }
        
    </style>
    <!-- Page loading scripts-->
    <script>
        (function () {
            window.onload = function () {
                const preloader = document.querySelector('.page-loading');
                preloader.classList.remove('active');
                setTimeout(function () {
                    preloader.remove();
                }, 1500);
            };
        })();
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet" id="google-font">
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
    <link rel="stylesheet" media="screen" href="css/custom.css">
</head>
<body>
    <div class="page-loading active">
        <div class="page-loading-inner">
            <div class="page-spinner"></div><span>Loading...</span>
        </div>
    </div>
    
    <main class="page-wrapper">
        <div class="offcanvas offcanvas-end" id="offcanvasPost" tabindex="-1">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title">New posts</h5>
                <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <div class="toast fade show" role="alert" style="margin-bottom: 7%;" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                    <div class="toast-header bg-primary text-white">
                        <i class="ai-bell fs-lg me-2"></i>
                        <span class="fw-medium me-auto">New post!</span>
                        <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">'User' posted something new!</div>
                </div>
                
                <div class="toast fade show" role="alert" style="margin-bottom: 7%;" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                    <div class="toast-header bg-primary text-white">
                        <i class="ai-bell fs-lg me-2"></i>
                        <span class="fw-medium me-auto">New post!</span>
                        <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">'User' posted something new!</div>
                </div>
            </div>
        </div>
        
        <div class="offcanvas offcanvas-end" id="offcanvasLike" tabindex="-1">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title">Likes</h5>
                <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <div class="toast fade show" role="alert" style="margin-bottom: 7%;" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                    <div class="toast-header text-white" style="background-color: #e23152;">
                        <i class="ai-bell fs-lg me-2"></i>
                        <span class="fw-medium me-auto">New like!</span>
                        <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">'User' liked your post!</div>
                </div>
                
                <div class="toast fade show" role="alert" style="margin-bottom: 7%;" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                    <div class="toast-header text-white" style="background-color: #e23152;">
                        <i class="ai-bell fs-lg me-2"></i>
                        <span class="fw-medium me-auto">New like!</span>
                        <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">'User' liked your comment!</div>
                </div>
            </div>
        </div>
        
        <div class="offcanvas offcanvas-end" id="offcanvasFollow" tabindex="-1">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title">New followers</h5>
                <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <div class="toast fade show" role="alert" style="margin-bottom: 7%;" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                    <div class="toast-header bg-dark text-white">
                        <i class="ai-bell fs-lg me-2"></i>
                        <span class="fw-medium me-auto">New follower!</span>
                        <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">'User' started following you!</div>
                </div>
                
                <div class="toast fade show" role="alert" style="margin-bottom: 7%;" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                    <div class="toast-header bg-dark text-white" >
                        <i class="ai-bell fs-lg me-2"></i>
                        <span class="fw-medium me-auto">New follower!</span>
                        <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">'User' started following you!</div>
                </div>
            </div>
        </div>
        
        <div class="offcanvas offcanvas-end" id="offcanvasComment" tabindex="-1">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title">New comments</h5>
                <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <div class="toast fade show" role="alert" style="margin-bottom: 7%;" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                    <div class="toast-header bg-success text-white">
                        <i class="ai-bell fs-lg me-2"></i>
                        <span class="fw-medium me-auto">New comment!</span>
                        <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">'User' commented on your post!</div>
                </div>
                
                <div class="toast fade show" role="alert" style="margin-bottom: 7%;" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                    <div class="toast-header bg-success text-white">
                        <i class="ai-bell fs-lg me-2"></i>
                        <span class="fw-medium me-auto">New comment!</span>
                        <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">'User' commented on your post!</div>
                </div>
            </div>
        </div>
        
        <div class="offcanvas offcanvas-end" id="offcanvasAccount" tabindex="-1">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title">My account</h5>
                <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <div class="pb-2 pb-lg-0 mb-2 d-flex justify-content-center align-items-center">
                    <img class="userImg d-block rounded-circle mb-2 img-fluid" src="upload/userImages/default.png" width="80" alt="User image">
                </div>
                <div class="text-center">
                    <h3 class="h5 mb-1"><?php printUserName(); ?></h3>
                    <p class="fs-sm text-muted mb-0"><?php printEmail($dbh); ?></p>
                </div>
                <ul class="navbar-nav p-0">
                    <li class="nav-item mt-3">
                        <div class="dropdown-menu show">
                            <h6 class="dropdown-header fs-xs fw-medium text-muted text-uppercase pb-1">Account</h6>
                            <a class="dropdown-item" href="account.php"><i class="ai-settings fs-lg opacity-70 me-2"></i>Account settings</a>
                            <a class="dropdown-item" href="profile.php"><i class="ai-user-check fs-lg opacity-70 me-2"></i>View personal page</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php"><i class="ai-logout fs-lg opacity-70 me-2"></i>Sign out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <header class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand pe-sm-3" href="index.php" style="margin-left: 1%;"><span class="text-primary flex-shrink-0 me-2">
                    <img class="logoImg img-fluid" src="upload/logos/NetGamers_Icon.png" style="height: 70px;" alt="" />
                </a>
                <div class="form-check form-switch mode-switch order-lg-1 me-3 me-lg-4 ms-auto" data-bs-toggle="mode">
                    <input class="form-check-input" type="checkbox" id="theme-mode" onclick="changeTheme()">
                    <label class="form-check-label" for="theme-mode"><i class="ai-sun fs-lg"></i></label>
                    <label class="form-check-label" for="theme-mode"><i class="ai-moon fs-lg"></i></label>
                </div>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 order-lg-2">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                    <div class="order-lg-3">
                        <?php 
                            if(isset($_SESSION["userID"])){
                                require("loggedin-menu.php");
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </header>

            <!-- Page content-->
            <div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5">
                <div class="row pt-sm-2 pt-lg-0 align-items-center">
                    <?php
                    if(isset($templateParams["nome"])){
                        require($templateParams["nome"]);
                    }
                    ?>
                </div>
            </div>
        </main>
        <!-- Vendor scripts: js libraries and plugins-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
        <!-- Main theme script-->
        <script src="js/theme.min.js"></script>
        <!-- theme changer script -->
        <script src="js/themeChange.js"></script>
    </body>
    </html>