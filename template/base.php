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
      if (mode === 'dark'){
        document.getElementById("logoImg").src = "upload/logos/NetGamers_Logo_White.png";
      }
      if (mode !== 'dark'){
        document.getElementById("logoImg").src = "upload/logos/NetGamers_Logo.png";        
      }
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
  </head>
  <body>
    <div class="page-loading active">
      <div class="page-loading-inner">
        <div class="page-spinner"></div><span>Loading...</span>
      </div>
    </div>

    <main class="page-wrapper">
    <header class="navbar navbar-expand-lg fixed-top">
        <div class="container">
          <a class="navbar-brand pe-sm-3" href="index.php"><span class="text-primary flex-shrink-0 me-2">
              <img id="logoIcon" src="upload/logos/NetGamers_Icon.png" style="height: 50px;" alt="" />
          </a>
          <div class="form-check form-switch mode-switch order-lg-2 me-3 me-lg-4 ms-auto" data-bs-toggle="mode">
            <input class="form-check-input" type="checkbox" id="theme-mode">
            <label class="form-check-label" for="theme-mode"><i class="ai-sun fs-lg"></i></label>
            <label class="form-check-label" for="theme-mode"><i class="ai-moon fs-lg"></i></label>
          </div>

          <!-- User signed in state. Account dropdown on screens > 576px-->
          <div class="dropdown nav d-none d-sm-block order-lg-3"><a class="nav-link d-flex align-items-center p-0" href="#" data-bs-toggle="dropdown" aria-expanded="false"><img class="border rounded-circle" src="assets/img/avatar/01.jpg" width="48" alt="Isabella Bocouse">
              <div class="ps-2">
                <div class="fs-xs lh-1 opacity-60">Hello,</div>
                <div class="fs-sm dropdown-toggle">Isabella</div>
              </div></a>
            <div class="dropdown-menu dropdown-menu-end my-1">
              <h6 class="dropdown-header fs-xs fw-medium text-muted text-uppercase pb-1">Account</h6>
              <a class="dropdown-item" href="#"><i class="ai-user-check fs-lg opacity-70 me-2"></i>Settings</a>
              <a class="dropdown-item" href="#"><i class="ai-settings fs-lg opacity-70 me-2"></i>View personal page</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php"><i class="ai-logout fs-lg opacity-70 me-2"></i>Sign out</a>
            </div>
          </div>

          <button class="navbar-toggler ms-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
          <nav class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav navbar-nav-scroll me-auto" style="--ar-scroll-height: 520px;">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Account</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#"><i class="ai-user-check fs-lg opacity-70 me-2"></i>Settings</a></li>
                  <li><a class="dropdown-item" href="#"><i class="ai-settings fs-lg opacity-70 me-2"></i>View personal page</a></li>
                </ul>
              </li>

              <!-- User signed in state. Account dropdown on screens > 576px-->
              <li class="nav-item dropdown d-sm-none border-top mt-2 pt-2"><a class="nav-link" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="border rounded-circle" src="" width="48" alt="User image">
                  <div class="ps-2">
                    <div class="fs-xs lh-1 opacity-60">Hello,</div>
                    <div class="fs-sm dropdown-toggle">User</div>
                  </div></a>
                <div class="dropdown-menu">
                  <h6 class="dropdown-header fs-xs fw-medium text-muted text-uppercase pb-1">Account</h6>
                  <a class="dropdown-item" href="#"><i class="ai-user-check fs-lg opacity-70 me-2"></i>Settings</a>
                  <a class="dropdown-item" href="#"><i class="ai-settings fs-lg opacity-70 me-2"></i>View personal page</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php"><i class="ai-logout fs-lg opacity-70 me-2"></i>Sign out</a>
                </div>
              </li>
            </ul>
          </nav>
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
  </body>
</html>