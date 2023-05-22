<!-- Sign in form-->
<div class="col-md-6 mb-5 mb-md-0">
  <div class="card dark-mode border-0 bg-primary py-md-3 py-lg-4 px-lg-4 px-xl-5">
    <div class="card-body">
      <h1 class="py-2 pb-lg-3">Log in</h1>

      <?php if(isset($templateParams["errorelogin"])): ?>
      <p><?php echo $templateParams["errorelogin"]; ?></p>
      <?php endif; ?>

      <form action="#" method="POST">
        <div class="pb-3 mb-3">
          <div class="position-relative"><i class="ai-mail fs-lg position-absolute top-50 start-0 translate-middle-y text-light opacity-80 ms-3"></i>
            <input class="form-control form-control-lg ps-5" type="text" name="username" id="username" placeholder="Username" required>
          </div>
        </div>
        <div class="mb-4">
          <div class="position-relative"><i class="ai-lock-closed fs-lg position-absolute top-50 start-0 translate-middle-y text-light opacity-80 ms-3"></i>
            <div class="password-toggle">
              <input class="form-control form-control-lg ps-5" type="password" placeholder="Password" id="password" name="password" required>
              <label class="password-toggle-btn" aria-label="Show/hide password">
                <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
              </label>
            </div>
          </div>
        </div>
        <button class="btn btn-lg btn-light w-100 mb-4" type="submit">LogIn</button>
      </form>
    </div>
  </div>
</div>
<div class="col-md-6 col-xl-5 offset-xl-1">
  <div class="ps-md-3 ps-lg-5 ps-xl-0">
    <h2 class="h1 pb-2 pb-lg-3">No account? Sign Up</h2>
    <form action="#" method="POST">
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
      <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Sign up</button>
    </form>
  </div>
</div>