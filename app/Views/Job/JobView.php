<?= $this->extend('LayoutHome/LayoutHomeView') ?>

<?= $this->section('content') ?>

    <input type="hidden" class="txt-csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
    <div class="job-view">
        <div class="search-bar d-grid align-items-center">
            <div class="box-search">
                <form action="<?= base_url('job/search') ?>" method="get">
                    <div class="d-flex flex-wrap gap-2 justify-content-center align-items-center">
                        <div class="search position-relative d-flex bg-white align-items-center col-12 col-sm-7 p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search ms-1" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                            <input type="text" name="keyword" class="form-control" placeholder="Jabatan, kata kunci, perusahaan" value="<?= esc($keyword ?? '') ?>">
                        </div>
                        <div class="button col-12 col-sm-4 d-flex">
                            <button type="submit" class="btn-search">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Landing Page Info Start -->
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mb-3 fw-bold">Selamat Datang di <span class="text-primary">JobStreet</span></h2>
                    <p class="lead mb-4">
                        Platform pencarian kerja modern yang menghubungkan pencari kerja dengan perusahaan terbaik di Indonesia.<br>
                        Temukan pekerjaan impianmu dengan mudah, cepat, dan aman!
                    </p>
                </div>
            </div>
            <div class="row text-center g-4 mt-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="mb-3" style="font-size:2rem;">🔎</div>
                            <h5 class="card-title fw-semibold">Cari Lowongan</h5>
                            <p class="card-text">Jelajahi ribuan lowongan kerja dari berbagai bidang dan perusahaan ternama.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="mb-3" style="font-size:2rem;">📄</div>
                            <h5 class="card-title fw-semibold">Lamar Mudah</h5>
                            <p class="card-text">Buat profil, unggah CV, dan lamar pekerjaan hanya dengan beberapa klik.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="mb-3" style="font-size:2rem;">🏢</div>
                            <h5 class="card-title fw-semibold">Untuk Perusahaan</h5>
                            <p class="card-text">Pasang lowongan dan temukan kandidat terbaik untuk kebutuhan bisnismu.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <a href="#register" class="btn btn-primary btn-lg px-5 shadow">Daftar Sekarang</a>
                </div>
            </div>
        </div>
        <!-- Landing Page Info End -->

        <!-- Zig-Zag Section 1 -->
        <div class="container my-5 py-4">
            <div class="row align-items-center g-5">
                <div class="col-md-6">
                    <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=600&q=80" alt="Cari Kerja" class="img-fluid rounded-4 shadow">
                </div>
                <div class="col-md-6">
                    <h3 class="fw-bold mb-3">Temukan Pekerjaan Impianmu</h3>
                    <p class="fs-5">
                        Dengan fitur pencarian canggih, kamu bisa menemukan lowongan kerja yang sesuai dengan minat dan keahlianmu.<br>
                        Proses pencarian jadi lebih mudah dan efisien!
                    </p>
                </div>
            </div>
        </div>
        <!-- Zig-Zag Section 1 End -->

        <!-- Zig-Zag Section 2 (reverse) -->
        <div class="container my-5 py-4">
            <div class="row align-items-center g-5 flex-md-row-reverse">
                <div class="col-md-6">
                    <img src="https://images.unsplash.com/photo-1515168833906-d2a3b82b302b?auto=format&fit=crop&w=600&q=80" alt="Lamar Mudah" class="img-fluid rounded-4 shadow">
                </div>
                <div class="col-md-6">
                    <h3 class="fw-bold mb-3">Lamar Mudah &amp; Cepat</h3>
                    <p class="fs-5">
                        Cukup buat profil dan unggah CV, kamu bisa melamar ke banyak perusahaan hanya dengan beberapa klik.<br>
                        Pantau status lamaranmu secara real-time!
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer Start -->
        <footer class="text-center text-white" style="background-color: #3f51b5;">
            <div class="container">
                <!-- Section: Links -->
                <section class="mt-5">
                    <div class="row text-center d-flex justify-content-center pt-5">
                        <div class="col-md-2">
                            <h6 class="text-uppercase fw-bold">
                                <a href="#!" class="text-white text-decoration-none">Tentang Kami</a>
                            </h6>
                        </div>
                        <div class="col-md-2">
                            <h6 class="text-uppercase fw-bold">
                                <a href="#!" class="text-white text-decoration-none">Penghargaan</a>
                            </h6>
                        </div>
                        <div class="col-md-2">
                            <h6 class="text-uppercase fw-bold">
                                <a href="#!" class="text-white text-decoration-none">Bantuan</a>
                            </h6>
                        </div>
                        <div class="col-md-2">
                            <h6 class="text-uppercase fw-bold">
                                <a href="#!" class="text-white text-decoration-none">Kontak</a>
                            </h6>
                        </div>
                    </div>
                </section>
                <hr class="my-5" />
                <!-- Section: Text -->
                <section class="mb-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <p>
                                JobStreet adalah platform pencarian kerja modern yang menghubungkan pencari kerja dengan perusahaan terbaik di Indonesia. Temukan pekerjaan impianmu dengan mudah, cepat, dan aman!
                            </p>
                        </div>
                    </div>
                </section>
                <!-- Section: Social -->
                <section class="text-center mb-5">
                    <a href="#" class="text-white me-4 text-decoration-none">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-white me-4 text-decoration-none">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white me-4 text-decoration-none">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="text-white me-4 text-decoration-none">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-white me-4 text-decoration-none">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="text-white me-4 text-decoration-none">
                        <i class="fab fa-github"></i>
                    </a>
                </section>
            </div>
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0,0,0,0.2);">
                © <?= date('Y') ?> JobStreet
            </div>
        </footer>
        <!-- Footer End -->


<?= $this->endSection() ?>
