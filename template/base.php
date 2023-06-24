<!DOCTYPE html>
<html lang="en">
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" media="screen" href="js/smooth-scroll/aos.css" />
    </head>
    <body>
        <div class="page-loading active">
            <div class="page-loading-inner">
                <div class="page-spinner"></div><span>Loading...</span>
            </div>
        </div>
        
        <main class="page-wrapper">
            <?php if(!str_contains(basename($_SERVER['PHP_SELF']), "login.php")): ?>
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
                        <p class="h5 mb-1"><?php printUserName(); ?></p>
                        <p class="fs-sm text-muted mb-0"><a href="<?php printEmail($dbh); ?>"><?php printEmail($dbh); ?></a></p>
                    </div>
                    <ul class="navbar-nav p-0">
                        <li class="nav-item mt-3">
                            <div class="dropdown-menu show">
                                <h6 class="dropdown-header fs-xs fw-medium text-muted text-uppercase pb-1">Account</h6>
                                <a class="dropdown-item" href="account.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-gear text-dark me-2 svg-md" viewBox="0 0 16 16" aria-hidden="true">
                                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                    </svg>Account settings
                                </a>
                                <a class="dropdown-item" href="profile.php">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-check-fill text-dark me-2 svg-md" viewBox="0 0 16 16" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>View personal page
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-box-arrow-right text-dark me-2 svg-md" viewBox="0 0 16 16" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                    </svg>Sign out
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
            
            <header class="navbar navbar-expand-sm fixed-top">
                <div class="container">
                    <div class="navbar-brand logoNavBar">
                        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-expanded="false" aria-controls="menu" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a href="index.php">
                            <img class="logoImg img-fluid" src="upload/logos/NetGamers_Icon.png" alt="Netgamers Icon" />
                        </a>
                    </div>
                    <div class="nav align-items-center order-sm-2">
                        <?php if(isset($_SESSION["userID"])): ?>
                        <div class="dropdown nav d-block">
                            <a class="nav-link position-relative p-2" aria-expanded="false" onclick="getNotifications();">
                                <div class="dropdown-toggle">
                                    <svg href="#." xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bell text-dark svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Click to open the notifications popup">
                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                                    </svg>
                                    <span id="totalNotification" class="badge bg-primary ms-2"></span>
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
                        <a class="nav-link p-1" href="#">
                            <div class="form-check form-switch mode-switch" data-bs-toggle="mode">
                                <label class="d-none" for="theme-mode">Switch theme mode</label>
                                <input class="form-check-input" type="checkbox" id="theme-mode" onclick="changeTheme()">
                                <label class="form-check-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-sun text-dark me-2 svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Light theme">
                                        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                                    </svg>
                                </label>
                                <label class="form-check-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-moon text-dark svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Dark theme">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                                    </svg>
                                </label>
                            </div>
                        </a>
                    </div>
                    <?php if(isset($_SESSION["userID"])): ?>
                    <nav class="navbar-collapse collapse" id="menu">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php" title="Home">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-house text-dark svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Home">
                                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                                    </svg><span class="nav-link d-sm-none ms-2">Home</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="search.php" class="nav-link" title="Search">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-search text-dark svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Search">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg><span class="nav-link d-sm-none ms-2">Search</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="newpost.php" class="nav-link" title="New post">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus-square text-dark svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Create new post">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg><span class="nav-link d-sm-none ms-2">New post</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" title="Account" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person text-dark svg-navbar" viewBox="0 0 16 16" role="img" aria-label="Account menu">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                    </svg><span class="nav-link d-sm-none ms-2">Account</span>
                                </a>
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
                        <img class="logoBig" src="upload/logos/NetGamers_Logo_White.png" alt="Netgamers logo"/>
                    </a>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between pt-4 mt-2 mt-sm-0">
                    <p class="fs-sm text-center mb-0 opacity-70">&copy; 2023. All rights reserved. Made by Michele Andrenacci, Andrea Dotti and Giacomo Pierbattista.</p>
                </div>
            </div>
        </footer>
        <!-- Vendor scripts: js libraries and plugins-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/smooth-scroll/aos.js"></script>
        <script src="js/smooth-scroll/smooth-scroll.polyfills.min.js"></script>
        <!-- Main theme script-->
        <script src="js/theme.min.js"></script>
        <!-- theme changer script -->
        <script src="js/themeChange.js"></script>

        <?php
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