<?php
// Assuming this is a PHP file and the context is within a table structure
?>
<?= $this->extend('DashboardUser/DashboardLayout') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="navbar-cv d-flex align-items-center justify-content-center mx-auto">
        <h3>Status Lamaran Saya</h3>
    </div>

    <div class="table-responsive mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Lowongan</th>
                    <th>Perusahaan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listLamaran as $lamaran): ?>
                    <tr>
                        <td><?= esc($lamaran['namaLowongan']) ?></td>
                        <td><?= esc($lamaran['namaPerusahaan']) ?></td>
                        <td>
                            <?php $status = $lamaran['status'] ?? 'pending'; ?>
                            <?php if ($status == 'dipanggil_interview'): ?>
                                <span class="badge bg-warning text-dark">Dipanggil Interview</span>
                            <?php elseif ($status == 'diterima'): ?>
                                <span class="badge bg-success">Diterima</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Menunggu</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>