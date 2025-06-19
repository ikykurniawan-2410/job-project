<?php
if (!isset($detailUser) && session()->get('idUser')) {
    $userModel = new \App\Models\UserModel();
    $detailUser = $userModel->where('idUser', session()->get('idUser'))->first();
}
?>

<style>
    .custom-navbar {
        padding: 0.5rem 1rem;
        background-color: #fff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .navbar-brand {
        margin-right: 1.5rem;
        display: flex;
        align-items: center;
        height: 56px;
    }

    .navbar-brand img.navbar-logo {
        height: 80px;
        transform: scale(1.3);
        transform-origin: left center;
    }

    .navbar-nav .nav-link {
        padding: 0.5rem 1rem;
        font-size: 16px;
        color: rgb(85, 95, 96);
        display: flex;
        align-items: center;
    }

    .navbar-nav .nav-link.active {
        font-weight: 600;
        color: rgb(0, 0, 0);
    }

    .user-photo {
        width: 36px;
        height: 36px;
        object-fit: cover;
        border-radius: 50%;
    }

    .small-text {
        font-size: 14px;
        color: #333;
    }

    .logout-btn svg {
        vertical-align: middle;
    }

    .custom-outline {
        color: #0d6efd;
        border: 1px solid #0d6efd;
        background-color: transparent;
        border-radius: 0.5rem;
        padding: 0.8rem .9rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .custom-outline:hover {
        background-color: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light sticky-top custom-navbar">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <a class="navbar-brand d-flex align-items-center" href="/Job">
            <img src="<?= base_url('icons/logo2.png') ?>" alt="Logo" class="navbar-logo">
        </a>

        <button class="navbar-toggler text-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="text-dark bi bi-chevron-down">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
            </svg>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto align-items-center">
                <?php
                $uri = service('uri');
                $isProfile = in_array($uri->getSegment(1), ['dashboard_user', 'profile_user']);
                $isJob = $uri->getSegment(1) === 'job';
                ?>
                <li class="nav-item">
                    <a class="nav-link<?= $isJob ? ' active' : '' ?>" href="/job">Cari Lowongan</a>
                </li>
                <li class="nav-item">
                    <?php if (session()->get('idUser')): ?>
                        <a class="nav-link<?= $isProfile ? ' active' : '' ?>" href="<?= base_url('dashboard_user') ?>">Profil Saya</a>
                    <?php else: ?>
                        <a class="nav-link" href="<?= base_url('loginUser') ?>">Profil Saya</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Telusuri Perusahaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('TipsKarir') ?>">Tips Karir</a>
                </li>
            </ul>

            <ul class="navbar-nav align-items-center">
                <?php if (session()->get('idUser')): ?>
                    <li class="nav-item d-flex align-items-center gap-2">
                        <img src="<?= base_url($detailUser['photo_profile']) ?>" alt="Foto Profil" class="user-photo">
                        <span class="small-text"><?= session()->get('nama') ?></span>
                        <span class="mx-1">|</span>
                        <form action="/login_user/logout" method="post" class="d-inline logout-btn">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <button type="submit" class="btn p-0 border-0 bg-transparent" title="Logout">
                                <i class="fas fa-sign-out-alt fa-lg"></i>
                            </button>
                        </form>
                    </li>
                <?php else: ?>
                    <li class="nav-item me-2">
                        <a class="btn custom-outline" href="<?= base_url() ?>/login_user">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="<?= base_url() ?>/registration_company">Perusahaan</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
