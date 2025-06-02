<?= $this->extend('LayoutHome/LayoutHomeView') ?>

<?= $this->section('content') ?>

<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-10 col-lg-6 d-none d-lg-block">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
             class="img-fluid" alt="Illustration">
      </div>

      <div class="col-md-8 col-lg-6 col-xl-4">
        <?php if (session()->getFlashdata('successSignUp')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('successSignUp') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <form action="<?= base_url('signupUser') ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>

          <!-- Username -->
          <div class="form-outline mb-3">
            <input type="text" name="username" value="<?= old('username') ?>" placeholder="Username"
                   class="form-control <?= session()->getFlashdata('username') ? 'is-invalid' : '' ?>" />
            <div class="invalid-feedback"><?= session()->getFlashdata('username') ?></div>
          </div>

          <!-- Email -->
          <div class="form-outline mb-3">
            <input type="email" name="email" value="<?= old('email') ?>" placeholder="Email address"
                   class="form-control <?= session()->getFlashdata('email') ? 'is-invalid' : '' ?>" />
            <div class="invalid-feedback"><?= session()->getFlashdata('email') ?></div>
          </div>

          <!-- Nama -->
          <div class="form-outline mb-3">
            <input type="text" name="nama" value="<?= old('nama') ?>" placeholder="Nama Lengkap"
                   class="form-control <?= session()->getFlashdata('nama') ? 'is-invalid' : '' ?>" />
            <div class="invalid-feedback"><?= session()->getFlashdata('nama') ?></div>
          </div>

          <!-- Handphone -->
          <div class="form-outline mb-3">
            <input type="text" name="handphone" value="<?= old('handphone') ?>" placeholder="No. Handphone"
                   class="form-control <?= session()->getFlashdata('handphone') ? 'is-invalid' : '' ?>" />
            <div class="invalid-feedback"><?= session()->getFlashdata('handphone') ?></div>
          </div>

          <!-- Password -->
          <div class="form-outline mb-3">
            <input type="password" name="password" placeholder="Password"
                   class="form-control <?= session()->getFlashdata('password') ? 'is-invalid' : '' ?>" />
            <div class="invalid-feedback"><?= session()->getFlashdata('password') ?></div>
          </div>

          <!-- Photo Profile -->
          <div class="mb-3 d-flex align-items-center gap-2">
            <img src="<?= base_url() ?>/img/profile/user.png" class="img-thumbnail" style="width: 36px; height: 36px;" />
            <input type="file" name="photo_profile"
                   class="form-control <?= session()->getFlashdata('photo_profile') ? 'is-invalid' : '' ?>" />
            <div class="invalid-feedback"><?= session()->getFlashdata('photo_profile') ?></div>
          </div>

          <!-- Submit -->
          <div class="d-grid mb-3">
            <button type="submit" class="btn btn-success">Daftar Sekarang</button>
          </div>

          <!-- Divider -->
          <div class="text-center my-3 text-muted">ATAU</div>

          <!-- Google Sign Up -->
          <a class="btn btn-primary w-100 mb-3" href="#">
            <i class="fab fa-google me-2"></i> Masuk dengan Google
          </a>

          <!-- Info -->
          <p class="small text-center text-muted">
            Dengan mendaftar, Anda menyetujui
            <a href="#" class="text-decoration-none">Syarat & Ketentuan</a> dan
            <a href="#" class="text-decoration-none">Kebijakan Privasi</a>.
          </p>
          <p class="text-center mt-2">Sudah punya akun?
            <a href="<?= base_url('login_user') ?>" class="text-decoration-none">Masuk sekarang</a>
          </p>
        </form>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
