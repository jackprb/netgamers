<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <title><?php echo $templateParams["titolo"]; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon and Touch Icons-->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">

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
  </head>
  <body>
    <div class="page-loading active">
      <div class="page-loading-inner">
        <div class="page-spinner"></div><span>Loading...</span>
      </div>
    </div>

    <main class="page-wrapper">
      <!-- Page content-->
      <div class="d-flex flex-column position-relative h-100 pt-5">
        <!-- Home button-->
        <a class="text-nav btn btn-icon bg-light border rounded-circle position-absolute top-0 end-0 zindex-2 p-0 mt-3 me-3 mt-sm-4 me-sm-4" 
          href="index-2.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Back to home">
          <i class="ai-home"></i>
        </a>
        <div class="container mt-auto">
          <div class="row align-items-center">
            <!-- Sign in form-->
            <div class="col-md-6 mb-5 mb-md-0">
              <div class="card dark-mode border-0 bg-primary py-md-3 py-lg-4 px-lg-4 px-xl-5">
                <div class="card-body">
                  <h1 class="py-2 pb-lg-3">Sign in</h1>
                  <form>
                    <div class="pb-3 mb-3">
                      <div class="position-relative"><i class="ai-mail fs-lg position-absolute top-50 start-0 translate-middle-y text-light opacity-80 ms-3"></i>
                        <input class="form-control form-control-lg ps-5" type="email" placeholder="Email address" required>
                      </div>
                    </div>
                    <div class="mb-4">
                      <div class="position-relative"><i class="ai-lock-closed fs-lg position-absolute top-50 start-0 translate-middle-y text-light opacity-80 ms-3"></i>
                        <div class="password-toggle">
                          <input class="form-control form-control-lg ps-5" type="password" placeholder="Password" required>
                          <label class="password-toggle-btn" aria-label="Show/hide password">
                            <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex flex-wrap align-items-center justify-content-between pb-4">
                      <form-check class="my-1">
                        <input class="form-check-input" type="checkbox" id="keep-signedin">
                        <label class="form-check-label ms-1" for="keep-signedin">Keep me signed in</label>
                      </form-check><a class="text-light fs-sm fw-semibold text-decoration-none my-1" href="account-password-recovery.html">Forgot password?</a>
                    </div>
                    <button class="btn btn-lg btn-light w-100 mb-4" type="submit">Sign in</button>
                    <h2 class="h6 text-center pt-3 pt-lg-4 mb-4">Or sign in with your social account</h2>
                    <div class="row row-cols-1 row-cols-sm-2 gy-3 pb-2">
                      <div class="col"><a class="btn btn-icon btn-outline-secondary btn-google btn-lg w-100" href="#"><i class="ai-google fs-xl me-2"></i>Google</a></div>
                      <div class="col"><a class="btn btn-icon btn-outline-secondary btn-facebook btn-lg w-100" href="#"><i class="ai-facebook fs-xl me-2"></i>Facebook</a></div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-5 offset-xl-1">
              <div class="ps-md-3 ps-lg-5 ps-xl-0">
                <h2 class="h1 pb-2 pb-lg-3">No account? Sign up</h2>
                <form class="needs-validation" novalidate>
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-1 row-cols-lg-2">
                    <div class="col mb-4">
                      <input class="form-control form-control-lg" type="text" placeholder="Your name" required>
                    </div>
                    <div class="col mb-4">
                      <input class="form-control form-control-lg" type="email" placeholder="Email address" required>
                    </div>
                  </div>
                  <div class="password-toggle mb-4">
                    <input class="form-control form-control-lg" type="password" placeholder="Password" required>
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                      <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                  </div>
                  <div class="password-toggle mb-4">
                    <input class="form-control form-control-lg" type="password" placeholder="Confirm password" required>
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                      <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                  </div>
                  <div class="pb-4">
                    <div class="form-check my-2">
                      <input class="form-check-input" type="checkbox" id="terms">
                      <label class="form-check-label ms-1" for="terms">I agree to <a href="#">Terms &amp; Conditions</a></label>
                    </div>
                  </div>
                  <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Sign up</button>
                  <h2 class="h6 text-center pt-3 pt-lg-4 mb-4">Or sign in with your social account</h2>
                  <div class="row row-cols-1 row-cols-sm-2 gy-3">
                    <div class="col"><a class="btn btn-icon btn-outline-secondary btn-google btn-lg w-100" href="#"><i class="ai-google fs-xl me-2"></i>Google</a></div>
                    <div class="col"><a class="btn btn-icon btn-outline-secondary btn-facebook btn-lg w-100" href="#"><i class="ai-facebook fs-xl me-2"></i>Facebook</a></div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Copyright-->
        <div class="container fs-sm pt-5 mt-auto mb-5"><span class="text-muted">&copy; All rights reserved. Made by</span><a class="nav-link d-inline-block p-0 ms-1" href="https://createx.studio/" target="_blank" rel="noopener">Createx Studio</a></div>
      </div>
    </main>
    <!-- Back to top button-->
    <a class="btn-scroll-top" href="#top" data-scroll>
      <svg viewBox="0 0 40 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <circle cx="20" cy="20" r="19" fill="none" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"></circle>
      </svg><i class="ai-arrow-up"></i>
    </a>
    <!-- Vendor scripts: js libraries and plugins-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
  </body>
</html>