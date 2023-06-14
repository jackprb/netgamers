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
            @media (max-width: 367px) {
                html, body {
                    overflow: hidden;
                }
            }
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
                <div class="offcanvas-body" id="newPostList">
                </div>
            </div>
            
            <div class="offcanvas offcanvas-end" id="offcanvasLike" tabindex="-1">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title">Likes</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body" id="newLikeList">
                </div>
            </div>
            
            <div class="offcanvas offcanvas-end" id="offcanvasFollow" tabindex="-1">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title">New followers</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body" id="newFollowList">
                </div>
            </div>
            
            <div class="offcanvas offcanvas-end" id="offcanvasComment" tabindex="-1">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title">New comments</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body" id="newCommentList">
                </div>
            </div>
            
            <div class="offcanvas offcanvas-end" id="offcanvasAccount" tabindex="-1">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title">My account</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="pb-2 pb-lg-0 mb-2 d-flex justify-content-center align-items-center">
                        <img class="userImg d-block rounded-circle mb-2 img-fluid" src="<?php echo getUserProfileImgPath(); ?>" width="80" alt="User image">
                    </div>
                    <div class="text-center">
                        <h3 class="h5 mb-1"><?php printUserName(); ?></h3>
                        <p class="fs-sm text-muted mb-0"><a href="<?php printEmail($dbh); ?>"><?php printEmail($dbh); ?></a></p>
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
            
            <header class="navbar navbar-expand-sm fixed-top">
                <div class="container">
                    <div class="navbar-brand pe-sm-3 logoNavBar">
                        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-expanded="false" aria-controls="menu" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a href="index.php">
                            <img class="logoImg img-fluid" src="upload/logos/NetGamers_Icon.png" alt="" />
                        </a>
                    </div>
                    <div class="nav align-items-center order-sm-2">
                        <?php if(isset($_SESSION["userID"])): ?>
                        <div class="dropdown nav d-block">
                            <a class="nav-link position-relative p-2" href="#" data-bs-toggle="dropdown" aria-expanded="false" onclick="getNotifications();">
                                <div class="dropdown-toggle">
                                    <i class="ai-bell"></i><span id="totalNotification" class="badge bg-primary ms-2"></span>
                                </div>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasPost">
                                    New posts<span id="postNotification" class="badge bg-primary ms-2"></span>
                                </a>
                                <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLike">
                                    New likes<span id="likeNotification" class="badge bg-primary ms-2"></span>
                                </a>
                                <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFollow">
                                    New followers<span id="followNotification" class="badge bg-primary ms-2"></span>
                                </a>
                                <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasComment">
                                    New comments<span  id="commentNotification" class="badge bg-primary ms-2"></span>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                        <a class="nav-link p-1 me-2" href="#">
                            <div class="form-check form-switch mode-switch me-3 me-lg-4 ms-auto" data-bs-toggle="mode">
                                <input class="form-check-input" type="checkbox" id="theme-mode" onclick="changeTheme()">
                                <label class="form-check-label" for="theme-mode"><i class="ai-sun fs-lg"></i></label>
                                <label class="form-check-label" for="theme-mode"><i class="ai-moon fs-lg"></i></label>
                            </div>
                        </a>
                    </div>
                    <?php if(isset($_SESSION["userID"])): ?>
                    <nav class="navbar-collapse collapse" id="menu">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount">Account</a>
                            </li>
                        </ul>
                    </nav>
                    <?php endif; ?>
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
        <footer class="footer bg-secondary pb-4">
            <div class="container pt-3 pt-sm-2 pt-md-3 pt-lg-4">
                <div class="border-bottom text-center pb-4">
                    <a class="navbar-brand d-inline-flex text-nav py-0 mb-1" href="index.php">
                        <img class="logoBig" src="upload/logos/NetGamers_Logo_White.png" alt=""/>
                    </a>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between pt-4 mt-2 mt-sm-0">
                    <p class="fs-sm text-center mb-0 opacity-70">&copy; 2023. All rights reserved. Made by Michele Andrenacci, Andrea Dotti and Giacomo Pierbattista.</p>
                </div>
            </div>
        </footer>
        <!-- Vendor scripts: js libraries and plugins-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Main theme script-->
        <script src="js/theme.min.js"></script>
        <!-- theme changer script -->
        <script src="js/themeChange.js"></script>

        <?php
        $templateParams["js"] = array("https://unpkg.com/axios/dist/axios.min.js","./api/js/get_notifications.js",
            "./api/js/read_notification.js", "./api/js/follow-manager.js");
        if(isset($templateParams["js"])):
            foreach($templateParams["js"] as $script):
        ?>
            <script src="<?php echo $script; ?>"></script>
        <?php
            endforeach;
        endif;
        ?>
    </body>
</html>