<?php
if (!isset($detailUser) && session()->get('idUser')) {
    $userModel = new \App\Models\UserModel();
    $detailUser = $userModel->where('idUser', session()->get('idUser'))->first();
}
?>
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container-fluid gap-3">
        <a class="navbar-brand" href="/Job">
            <img src="<?= base_url() ?>/icons/logo-jobstreet-my-1.png" alt="">
        </a>
        <button class="navbar-toggler text-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="text-dark bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chevron-up d-none" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
            </svg>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul style="color: rgb(85,95,96)" class="navbar-nav link-one">
                <li class="nav-item">
                    <?php
                    $uri = service('uri');
                    $isProfile = in_array($uri->getSegment(1), ['dashboard_user', 'profile_user']);
                    $isJob = $uri->getSegment(1) === 'job';
                    ?>
                    <a class="nav-link align-middle<?= $isJob ? ' active' : '' ?>" aria-current="page" href="/job">Cari Lowongan</a>
                </li>
                <li class="nav-item menu-responsive-two">
                    <?php if (session()->get('idUser')): ?>
                        <a class="nav-link<?= $isProfile ? ' active' : '' ?>" href="<?= base_url('dashboard_user') ?>">Profil Saya</a>
                    <?php else: ?>
                        <a class="nav-link" href="<?= base_url('loginUser') ?>">Profil Saya</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item menu-responsive-two">
                    <a class="nav-link" href="#">Telusuri Perusahaan</a>
                </li>
                <li class="nav-item menu-responsive-two">
                    <a class="nav-link" href="<?= base_url('TipsKarir') ?>">Tips Karir</a>
                </li>

                <li class="nav-item menu-responsive">
                    <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Lainnya
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="nav-link active align-middle" aria-current="page" href="/job">Cari Lowongan</a></li>
                        <li><a class="nav-link" href="#">My Jobstreet</a></li>
                        <li><a class="nav-link" href="#">Profil Perusahaan</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav link-two ms-auto position-relative align-items-center mx-3">
                <?php if (!session()->get('idUser')) { ?>

                <?php } ?>
                <li class="nav-item d-flex align-items-center gap-1">
                    <?php if (session()->get('idUser')) { ?>
                        <img style="width: 25px; height: 25px" class="img-thumbnail rounded-circle" src="<?= base_url() ?>/<?= $detailUser['photo_profile'] ?>" alt="">
                        <span><?= session()->get('nama') ?></span>|
                        <a class="text-decoration-none text-dark" title="Dashboard User" href="/dashboard_user">

                        </a>
                        <form action="/login_user/logout" method="post">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <button type="submit" class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg>
                            </button>
                        </form>
                    <?php } else { ?>
                <li class="nav-item company">
                    <a style="color: rgb(73,100,234)" class="nav-link color" href="<?= base_url() ?>/login_user">Masuk</a>
                </li>
            <?php } ?>
            </li>
            <?php if (!session()->get('idUser')) { ?>
                <li>
                    <a style="color: rgb(73,100,234)" class="nav-link color" href="<?= base_url() ?>/registration_company">Perusahaan</a>
                </li>
            <?php } ?>
            </ul>
        </div>
    </div>
</nav>