<?= $this->extend('LayoutHome/LayoutHomeView') ?>

<?= $this->section('content') ?>

<input type="hidden" class="txt-csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
<div class="job-view">

    <!-- Search Bar -->
    <div class="search-bar d-grid align-items-center">
        <div class="box-search">
            <form action="<?= base_url('job/search') ?>" method="get">
                <div class="d-flex flex-wrap gap-2 justify-content-center align-items-stretch">
                    
                    <!-- Input Search -->
                    <div class="search position-relative d-flex bg-white align-items-center col-12 col-sm-7 p-1 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search ms-2 text-muted" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        <input type="text" name="keyword" class="form-control border-0 ms-2" placeholder="Jabatan, kata kunci, perusahaan" value="<?= esc($keyword ?? '') ?>">
                    </div>

                    <!-- Tombol -->
                    <div class="button col-12 col-sm-4 d-flex">
                        <button type="submit" class="btn btn-outline-light text-white border-2 fw-medium w-50 h-100">
                            Cari
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="container my-5"></div>
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <h2 class="mb-3 fw-bold">Bangun Karier Impianmu Bersama <span class="text-primary">JobStreet</span></h2>
            <p class="lead mb-4">
                Temukan lowongan yang sesuai dengan passion dan keahlianmu. Lamar hanya dalam hitungan klik!
            </p>
        </div>
    </div>

    <!-- Zig-Zag Section 1 -->
    <div class="container my-5 py-4">
        <div class="row align-items-center g-5">
            <div class="col-md-6">
                <img src="<?= base_url('assets/images/f1.jpg') ?>" alt="Cari Kerja" class="img-fluid rounded-4 shadow">
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

    <!-- Zig-Zag Section 2 -->
    <div class="container my-5 py-4">
        <div class="row align-items-center g-5 flex-md-row-reverse">
            <div class="col-md-6">
                <img src="<?= base_url('assets/images/f2.jpg') ?>" alt="Lamar Mudah" class="img-fluid rounded-4 shadow">
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

    <!-- Info Cards -->
    <div class="container my-5">
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
                <a href="/login_user" class="btn btn-primary btn-lg px-5 shadow">Daftar Sekarang</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div style="min-height: 300px; background-color: rgb(36, 54, 80)">
        <div style="min-height: inherit !important; width: 85%;" class="footer-registration-company mx-auto">
            <div>
                <p style="color: white">Perusahaan</p>
                <a class="d-block text-decoration-none text-muted" href="#">Beranda</a>
                <a class="d-block text-decoration-none text-muted" href="#">Berpartner dengan kami</a>
                <a class="d-block text-decoration-none text-muted" href="#">Harga & Paket</a>
            </div>
            <div>
                <p style="color: white">Produk dan layanan</p>
                <a class="d-block text-decoration-none text-muted" href="#">Iklan lowongan</a>
                <a class="d-block text-decoration-none text-muted" href="#">Iklan lowongan bintang 5</a>
                <a class="d-block text-decoration-none text-muted" href="#">Talent Search</a>
                <a class="d-block text-decoration-none text-muted" href="#">SiVA Recruitment Centre</a>
                <a class="d-block text-decoration-none text-muted" href="#">Layanan Branding Perusahaan</a>
            </div>
            <div>
                <p style="color: white">Bantuan</p>
                <a class="d-block text-decoration-none text-muted" href="#">Help Centre</a>
                <a class="d-block text-decoration-none text-muted" href="#">Hubungi kami</a>
            </div>
            <div>
                <p style="color: white">Informasi lainnya</p>
                <a class="d-block text-decoration-none text-muted" href="#">Laws of Attraction</a>
                <a class="d-block text-decoration-none text-muted" href="#">Artikel</a>
                <a class="d-block text-decoration-none text-muted" href="#">Testimoni</a>
            </div>
            <div>
                <p style="color: white">Temukan kami di</p>
                <a class="text-decoration-none" href="#"><img src="/icons/facebook-logo.png" alt=""></a>
                <a class="text-decoration-none" href="#"><img src="/icons/twitter.png" alt=""></a>
                <a class="text-decoration-none" href="#"><img src="/icons/youtube.png" alt=""></a>
                <a class="text-decoration-none" href="#"><img src="/icons/linkedin.png" alt=""></a>
                <a class="text-decoration-none" href="#"><img src="/icons/instagram.png" alt=""></a>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
