<?= $this->extend('LayoutHome/LayoutHomeView') ?>

<?= $this->section('content') ?>

<div class="job-view">

    <!-- Search Bar -->
    <main>
        <section
            class="hero-section d-flex justify-content-center align-items-center"
            id="section_1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <h1 class="text-white text-center">Temukan. Lamar. Sukses.</h1>
                        <h6 class="text-center">
                            Portal kerja bagi pencari dan pemberi kerja.
                        </h6>

                        <form
                            action="<?= base_url('job/search') ?>"
                            method="get"
                            class="custom-form mt-4 pt-2 mb-lg-0 mb-5"
                            role="search">
                            <input type="hidden" class="txt-csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <div class="input-group input-group-lg">
                                <span
                                    class="input-group-text bi-search"
                                    id="basic-addon1"></span>
                                <input
                                    name="keyword"
                                    type="search"
                                    class="form-control"
                                    id="keyword"
                                    placeholder="Jabatan, kata kunci, perusahaan"
                                    aria-label="Search"
                                    value="<?= esc($keyword ?? '') ?>" />
                                <button type="submit" class="form-control">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <section class="featured-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                    <div class="custom-block bg-white shadow-lg">
                        <a href="topics-detail.html">
                            <div class="d-flex">
                                <div>
                                    <h5 class="mb-2">Web Development</h5>
                                    <p class="mb-0">
                                        Temukan lowongan kerja di bidang pengembangan web dari berbagai perusahaan dan startup. Dapatkan kesempatan berkarier di industri teknologi.
                                    </p>
                                </div>
                                <span class="badge bg-design rounded-pill ms-auto"><?= esc($webDevCount ?? 0) ?></span>
                            </div>
                            <img src="<?= base_url('img/undraw.jpg') ?>" class="custom-block-image img-fluid" alt="" />
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="custom-block custom-block-overlay">
                        <div class="d-flex flex-column h-100">
                            <img src="<?= base_url('img/bisnis.jpg') ?>" class="custom-block-image img-fluid" alt="" />


                            <div class="custom-block-overlay-text d-flex">
                                <div>
                                    <h5 class="text-white mb-2">Jelajahi Perusahaan</h5>
                                    <p class="text-white">
                                        Kenali perusahaan incaranmu sebelum melamar. Yuk, jelajahi sekarang!
                                    </p>
                                    <a
                                        href="topics-detail.html"
                                        class="btn custom-btn mt-2 mt-lg-3">Telusuri Sekarang</a>
                                </div>
                                <span class="badge bg-finance rounded-pill ms-auto"><?= esc($companyCount ?? 0) ?></span>
                            </div>

                            <div class="social-share d-flex">
                                <p class="text-white me-4">Share:</p>
                                <ul class="social-icon">
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-twitter"></a>
                                    </li>
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-facebook"></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="section-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section section-padding bg-white" id="section_4">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <h2 class="mb-4">Frequently Asked Questions</h2>
                </div>

                <div class="clearfix"></div>

                <div class="col-lg-5 col-12">
                    <img src="img/faq.jpg" class="img-fluid" alt="FAQs">
                </div>

                <div class="col-lg-6 col-12 m-auto">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What is Topic Listing?
                                </button>
                            </h2>

                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Sistem ini adalah platform digital yang menyediakan informasi mengenai lowongan kerja dari berbagai perusahaan dan bidang. Tujuannya adalah untuk menghubungkan pencari kerja dengan perusahaan secara mudah dan cepat melalui satu platform online.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Bagaimana cara melamar pekerjaan melalui website ini?

                                </button>
                            </h2>

                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Pengguna dapat membuat akun terlebih dahulu, lalu memilih lowongan yang sesuai. Setelah itu, cukup klik tombol "Lamar" dan ikuti instruksi pengunggahan CV atau data lainnya yang dibutuhkan oleh perusahaan.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Apakah menggunakan layanan ini berbayar?
                                </button>
                            </h2>

                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Tidak. Semua fitur yang tersedia di website ini dapat digunakan secara gratis, baik oleh pencari kerja maupun perusahaan yang ingin memposting lowongan.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>






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