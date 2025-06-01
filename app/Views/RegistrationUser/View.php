<?= $this->extend('LayoutHome/LayoutHomeView') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('/css/auth.css') ?>">
<div class="registration-view py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="mb-2 text-center">Kandidat Daftar</h3>
                    <p class="text-center text-muted mb-4">Temukan lowongan sesuai gaji Anda</p>
                    <div class="d-grid mb-3">
                        <a class="btn btn-danger btn-google mb-2" href="#">
                            <i class="fab fa-google me-2"></i> Masuk dengan Google
                        </a>
                    </div>
                    <small class="d-block text-center mb-3">Sangat mudah dan cepat. Kami tidak akan mengunggah apapun tanpa izin dari Anda</small>
                    <div class="d-flex align-items-center mb-3">
                        <hr class="flex-grow-1">
                        <span class="mx-2 text-muted">Atau</span>
                        <hr class="flex-grow-1">
                    </div>
                    <?php if (session()->getFlashdata('successSignUp')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('successSignUp') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('signupUser') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <div class="mb-3">
                            <input type="text" name="username" class="form-control <?= session()->getFlashdata('username') ? 'is-invalid' : '' ?>" placeholder="Username" value="<?= old('username') ?>">
                            <div class="invalid-feedback"><?= session()->getFlashdata('username') ?></div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="email" class="form-control <?= session()->getFlashdata('email') ? 'is-invalid' : '' ?>" placeholder="Email" value="<?= old('email') ?>">
                            <div class="invalid-feedback"><?= session()->getFlashdata('email') ?></div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="nama" class="form-control <?= session()->getFlashdata('nama') ? 'is-invalid' : '' ?>" placeholder="Nama" value="<?= old('nama') ?>">
                            <div class="invalid-feedback"><?= session()->getFlashdata('nama') ?></div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="handphone" class="form-control <?= session()->getFlashdata('handphone') ? 'is-invalid' : '' ?>" placeholder="Handphone" value="<?= old('handphone') ?>">
                            <div class="invalid-feedback"><?= session()->getFlashdata('handphone') ?></div>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control <?= session()->getFlashdata('password') ? 'is-invalid' : '' ?>" placeholder="Password">
                            <div class="invalid-feedback"><?= session()->getFlashdata('password') ?></div>
                        </div>
                        <div class="mb-3 d-flex align-items-center gap-2">
                            <div class="profile-images">
                                <img src="<?= base_url() ?>/img/profile/user.png" class="img-thumbnail profile-thumbnail" alt="Photo Profile" style="width:48px;height:48px;">
                            </div>
                            <input name="photo_profile" class="form-control <?= session()->getFlashdata('photo_profile') ? 'is-invalid' : '' ?>" type="file">
                            <div class="invalid-feedback"><?= session()->getFlashdata('photo_profile') ?></div>
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-success btn-daftar">Daftar</button>
                        </div>
                        <div class="mb-3 text-center">
                            <p class="mb-1">Sudah menjadi anggota? <a class="text-decoration-none" href="<?= base_url('login_user') ?>">Masuk sekarang</a></p>
                            <p class="small text-muted">
                                Dengan memilih "Daftar Sekarang", saya telah membaca dan menyetujui
                                <a class="text-decoration-none" href="#">Persyaratan penggunaan JobStreet.com</a> dan
                                <a class="text-decoration-none" href="#">Kebijakan privasi</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
