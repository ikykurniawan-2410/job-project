<?= $this->extend('LayoutHome/LayoutHomeView') ?>
<?= $this->section('content') ?>


<style>
    .dashboard-layout {
        min-height: 100vh;
        display: flex;
        overflow: hidden;
        background-color: #f0f4fc; /* warna background konten */
    }

    .sidebar {
        width: 260px;
        background-color: #fff;
        color: #4a5c82;
        padding: 1.5rem 1rem;
        border-right: 1px solid #eee;
    }

    .sidebar a {
        color: #0E565B;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        font-weight: 500;
        transition: background 0.3s;
    }

    .sidebar a:hover {
        background-color: #E7F0FD;
    }

    .sidebar svg {
        flex-shrink: 0;
    }

    .menu-section {
        margin-bottom: 1rem;
    }

    .menu-section h6 {
        font-size: 0.9rem;
        margin: 1rem 1rem 0.5rem;
        color: #999;
    }

    .content-area {
        flex: 1;
        padding: 2rem;
        overflow: auto;
    }

    .dropdown-toggle::after {
        margin-left: auto;
        transform: rotate(90deg);
    }

    .submenu {
        padding-left: 2.5rem;
        display: none;
        flex-direction: column;
    }

    .submenu a {
        font-size: 0.95rem;
    }

    .dropdown.open .submenu {
        display: flex;
    }
</style>

<div class="dashboard-layout">
    <div class="sidebar">
        <ul class="list-unstyled fs-6">
            <li class="mb-2">
                <a href="/dashboard_user/profile">
                    <i class="bi bi-person-circle"></i> Profile
                </a>
            </li>
            <li class="mb-2">
                <a href="/dashboard_user/my_application">
                    <i class="bi bi-pen"></i> Lamaran Saya
                </a>
            </li>
            <li class="mb-2">
                <a href="/dashboard_user/resume_cv">
                    <i class="bi bi-person-badge-fill"></i> CV Saya
                </a>
            </li>
            <li class="mb-2">
                <a href="/dashboard_user/status_lamaran">
                    <i class="bi bi-card-checklist"></i> Status Lamaran
                </a>
            </li>
        </ul>
    </div>

    <div class="content-area">
        <?= $this->renderSection('content') ?>
    </div>
</div>

<!-- Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<?= $this->endSection() ?>
