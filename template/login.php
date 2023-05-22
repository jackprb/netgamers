<!-- Sign in form-->
<div class="col-md-6 mb-5 mb-md-0">
  <div class="card dark-mode border-0 bg-primary py-md-3 py-lg-4 px-lg-4 px-xl-5">
    <div class="card-body">
      <h1 class="py-2 pb-lg-3">LogIn</h1>
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
            <label class="form-check-label ms-1" for="keep-signedin">Keep me loged in</label>
          </form-check><a class="text-light fs-sm fw-semibold text-decoration-none my-1" href="account-password-recovery.html">Forgot password?</a>
        </div>
        <button class="btn btn-lg btn-light w-100 mb-4" type="submit">LogIn</button>
      </form>
    </div>
  </div>
</div>
<div class="col-md-6 col-xl-5 offset-xl-1">
  <div class="ps-md-3 ps-lg-5 ps-xl-0">
    <h2 class="h1 pb-2 pb-lg-3">No account? SignUp</h2>
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
      <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Sign up</button>
    </form>
  </div>
</div>