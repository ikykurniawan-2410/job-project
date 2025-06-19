<?= $this->extend('LayoutHome/LayoutHomeView') ?>

<?= $this->section('content') ?>
<div class="bg-success">
    <div style="min-height: 1100px" class="section-one">
        <div class="container-employee bg-employee position-relative">
            <div class="bg-white form-employee me-3 rounded">
                <form action="/loginCompany" method="post">
                    <?= csrf_field() ?>
                    <div class="row p-3">
                        <h3 style="color: rgb(13,56,128)" class="fw-bold">Mulai rekrut kandidat!</h3>
                        <?php if ($message = session()->getFlashdata('success')) { ?>
                            <div class="alert alert-success alert-dismissible fade show col-10" role="alert">
                                <?= $message ?> <a class="text-decoration-none" href="/login_company">login</a>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>

                        <span class="mb-2">
                                <span style="color: rgb(230,2,133)">Nikmati pasang 1 iklan lowongan GRATIS untuk pengguna perdana</span>.
                                <br>
                                <span style="color: rgb(0,91,182)">New user ?
                                    <a href="/registration_company" class="text-decoration-none fw-bold">Create an account</a>
                                </span>
                            </span>
                        <div class="col-12 mt-2">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control <?= session()->getFlashdata('email') ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= old('email') ?? '' ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= session()->getFlashdata('email') ?? '' ?>
                                </div>
                            </div>
                            <div class="mb-3 mt-1">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control <?= session()->getFlashdata('password') ? 'is-invalid' : '' ?>" id="password" name="password">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= session()->getFlashdata('password') ?? '' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-3">
                        <button style="background-color: rgb(230,2,120)" type="submit" class="btn btn-primary mb-1 border-0">Masuk</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="feature position-relative">
            <div class="list-feature">
                <div class="d-flex align-items-center gap-1">
                    <object style="color: rgb(230,2,120)" data="<?= base_url() ?>/icons/people-search-svgrepo-com.svg" width="64" height="64"> </object>
                    <span class="fw-bold align-middle">
                        Terhubung langsung ke talent yang tepat dengan <br>
                        <a class="text-decoration-none" href="#">Talent Search ></a>
                    </span>
                </div>

                <div class="d-flex align-items-center gap-1 mt-3">
                    <object style="color: rgb(230,2,120)" data="<?= base_url() ?>/icons/big-data-svgrepo-com.svg" width="64" height="64"> </object>
                    <span class="fw-bold align-middle">
                            Menarik talent yang tepat dengan <br>
                            <a class="text-decoration-none" href="#">Data akurat yang terperinci dari Big Data ></a>
                        </span>
                </div>

                <div class="d-flex align-items-center gap-1 mt-3">
                    <object style="color: rgb(230,2,120)" data="<?= base_url() ?>/icons/video-person-star-svgrepo-com.svg" width="64" height="64"> </object>
                    <span class="fw-bold align-middle">
                            Cari, filter, dan menarik talent yang tepat dengan <br>
                            <a class="text-decoration-none" href="#">Solusi Rekrutmen Terlengkap ></a>
                        </span>
                </div>
            </div>
        </div>

        <div class="offering">
            <div style="padding-top: 50px">
                <h1 class="fw-bold text-center">JobStreet menawarkan Anda lebih dari <br>
                    sekadar iklan lowongan
                </h1>
                <span class="text-center fs-5 mx-auto d-grid justify-content-center">Kami menawarkan berbagai produk dan solusi yang membantu Anda menemukan kandidat terbaik.</span>
            </div>

            <div style="min-height: 500px" class="row">
                <div style="padding-top: 10px" class="col-12 col-sm-8 mx-auto gap-5 feature-one">
                    <div class="image">
                        <img src="/img/magnet-me-315vPGsAFUk-unsplash.jpg" alt="">
                    </div>
                    <div class="text">
                        <h3 class="fw-bold">Iklan lowongan Anda akan menarik
                            perhatian jutaan kandidat
                        </h3>
                        <span>
                                JobStreet.com adalah pilihan utama jutaan kandidat untuk mencari pekerjaan.
                                Dengan pasang iklan lowongan di JobStreet,
                                Anda memiliki kesempatan 8x lebih besar untuk mendapatkan kandidat yang tepat.
                            </span>
                    </div>
                </div>
            </div>

            <div style="min-height: 500px" class="row">
                <div style="padding-top: 10px" class="col-12 col-sm-8 mx-auto gap-5 feature-one">
                    <div class="text">
                        <h3 class="fw-bold">Proses seleksi pelamar yang mudah dan efisien</h3>
                        <span class="text-two">
                                JobStreet memiliki <span class="fw-bold">aplikasi dan fitur</span> yang canggih untuk mempermudah proses seleksi
                                dan rekrutmen Anda ketika menerima lamaran yang banyak.
                                Semuanya dapat diakses secara gratis.
                            </span>
                    </div>
                    <div class="image">
                        <img class="image-two" src="/img/sebastian-herrmann-NbtIDoFKGO8-unsplash.jpg" alt="">
                    </div>
                </div>
            </div>

            <div style="min-height: 500px" class="row">
                <div style="padding-top: 10px" class="col-12 col-sm-8 mx-auto gap-5 feature-one">
                    <div class="image">
                        <img src="/img/mateus-campos-felipe-zd8px974bC8-unsplash.jpg" alt="">
                    </div>
                    <div class="text">
                        <h3 class="fw-bold">Cari kandidat yang tepat dari jutaan database kami
                        </h3>
                        <span>
                                Anda dapat memasang iklan lowongan di JobStreet.com kapan saja, tapi tidak hanya itu.
                                Anda juga dapat menggunakan fitur <span class="fw-bold">Talent Search</span> untuk mencari jutaan database
                                kandidat kami.
                            </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
<footer style="background-color: #243650; padding: 40px 0;">
    <div class="container text-white">
        <div class="row">
            <!-- Logo dan Deskripsi -->
            <div class="col-lg-3 col-md-6 mb-4">
                <img src="<?= base_url('icons/logo-simkerja.png') ?>" alt="SimKerja" style="height: 40px;" />
                <p class="mt-3">Platform pencari kerja terpercaya<br>untuk membantu kamu<br>menemukan karier impian.</p>
            </div>

            <!-- Navigasi -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5>Navigasi</h5>
                <a href="#" class="d-block text-decoration-none text-light">Cari Lowongan</a>
                <a href="#" class="d-block text-decoration-none text-light">Telusuri Perusahaan</a>
                <a href="#" class="d-block text-decoration-none text-light">Tips Karir</a>
            </div>

            <!-- Bantuan -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5>Bantuan</h5>
                <a href="#" class="d-block text-decoration-none text-light">FAQ</a>
                <a href="#" class="d-block text-decoration-none text-light">Hubungi Kami</a>
            </div>

            <!-- Sosial Media -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5>Sosial Media</h5>
                <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-light me-3"><i class="fab fa-google"></i></a>
            </div>
        </div>
    </div>
</footer>

    </div>
</div>
<?= $this->endSection() ?>

