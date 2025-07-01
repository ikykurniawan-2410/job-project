<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Dashboard Admin</h2>
        <form action="<?= base_url('logout_admin') ?>" method="get">
            <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
    </div>
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <ul class="nav nav-tabs mb-4" id="adminTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="company-tab" data-bs-toggle="tab" data-bs-target="#company" type="button" role="tab">Perusahaan</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab">User</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="job-tab" data-bs-toggle="tab" data-bs-target="#job" type="button" role="tab">Lowongan</button>
        </li>
    </ul>
    <div class="tab-content" id="adminTabContent">
        <!-- Tab Perusahaan -->
        <div class="tab-pane fade show active" id="company" role="tabpanel">
            <div class="card mb-4">
                <div class="card-header">Data Perusahaan</div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(empty($companies)): ?>
                            <tr><td colspan="5" class="text-center">Tidak ada data perusahaan.</td></tr>
                        <?php else: ?>
                            <?php foreach($companies as $c): ?>
                            <tr>
                                <td><?= esc($c['namaCompany']) ?></td>
                                <td><?= esc($c['emailCompany']) ?></td>
                                <td><?= esc($c['alamat']) ?></td>
                                <td>
                                    <?php if($c['status'] == 'pending'): ?>
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    <?php elseif($c['status'] == 'approved'): ?>
                                        <span class="badge bg-success">Approved</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Rejected</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($c['status'] == 'pending'): ?>
                                        <a href="<?= site_url('admin-dashboard/approve/'.$c['id']) ?>" class="btn btn-success btn-sm">Approve</a>
                                        <a href="<?= site_url('admin-dashboard/reject/'.$c['id']) ?>" class="btn btn-danger btn-sm">Reject</a>
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Tab User -->
        <div class="tab-pane fade" id="user" role="tabpanel">
            <div class="card mb-4">
                <div class="card-header">Data User</div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Handphone</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(empty($users)): ?>
                            <tr><td colspan="5" class="text-center">Tidak ada data user.</td></tr>
                        <?php else: ?>
                            <?php foreach($users as $u): ?>
                            <tr>
                                <td><?= esc($u['nama']) ?></td>
                                <td><?= esc($u['email']) ?></td>
                                <td><?= esc($u['username']) ?></td>
                                <td><?= esc($u['handphone']) ?></td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Tab Lowongan -->
        <div class="tab-pane fade" id="job" role="tabpanel">
            <div class="card mb-4">
                <div class="card-header">Data Lowongan</div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Perusahaan</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Dibuka</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(empty($jobs)): ?>
                            <tr><td colspan="5" class="text-center">Tidak ada data lowongan.</td></tr>
                        <?php else: ?>
                            <?php foreach($jobs as $j): ?>
                            <tr>
                                <td><?= esc($j['namaJob']) ?></td>
                                <td><?= esc($j['namaCompany']) ?></td>
                                <td><?= $j['deskripsiJob'] ?></td>
                                <td><?= esc($j['created_at']) ?></td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>