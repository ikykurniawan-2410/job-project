<?= $this->extend('LayoutHome/LayoutHomeView') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('/css/auth.css') ?>">
<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="<?= base_url('loginUser') ?>" method="post">
          <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start mb-3">
            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-facebook-f"></i>
            </button>
            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>
            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-linkedin-in"></i>
            </button>
            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-google"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Or</p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" name="username" id="form3Example3" class="form-control form-control-lg <?= session()->getFlashdata('username') ? 'is-invalid' : '' ?>"
              placeholder="Enter a valid email address or username" value="<?= old('username') ?? '' ?>" />
            <label class="form-label" for="form3Example3"></label>
            <?php if (session()->getFlashdata('username')) { ?>
              <div class="invalid-feedback">
                <?= session()->getFlashdata('username') ?>
              </div>
            <?php } ?>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg <?= session()->getFlashdata('password') ? 'is-invalid' : '' ?>"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4"></label>
            <?php if (session()->getFlashdata('password')) { ?>
              <div class="invalid-feedback">
                <?= session()->getFlashdata('password') ?>
              </div>
            <?php } ?>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg w-100"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?
              <a href="<?= base_url('/registration_user') ?>" class="link-danger">Register</a>
            </p>
          </div>
        </form>
        <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>
      </div>
    </div>
  </div>
  
</section>
<?= $this->endSection() ?>

