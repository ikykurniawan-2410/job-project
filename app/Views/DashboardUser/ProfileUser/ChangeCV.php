<?= $this->extend('DashboardUser/DashboardLayout') ?>

<?= $this->section('content') ?>
    <div class="col-12">
        <?php if ($message = session()->getFlashdata('success')) { ?>
            <div class="alert alert-success" role="alert">
                <?= $message ?>
            </div>
        <?php } ?>
        <div>
            <iframe class="preview-new-cv" style="width: 100%; min-height: 400px" src="/<?= $detailResume['addressCVPDF'] ?>" title="Preview CV"></iframe>
        </div>
        <div>
            <form class="d-inline-block" action="/dashboard_user/get_new_cv" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <input type="hidden" name="idResume" value="<?= $detailResume['idResume'] ?>">

                <div class="mb-3">
                    <label for="formFile" class="form-label">Pilih CV</label>
                    <input class="form-control change-cv <?= session()->getFlashdata('fileNewCv') ? 'is-invalid' : '' ?>" type="file" name="fileNewCv" accept="application/pdf" id="formFile">
                    <p style="color: rgb(222,53,69)" class="mt-2 d-none">Invalid Format</p>
                    <?php if (session()->getFlashdata('fileNewCv')) { ?>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= session()->getFlashdata('fileNewCv') ?>
                        </div>
                    <?php } ?>
                </div>

                <button onclick="return confirm('Apakah Ingin Mengubah CV Anda Sendiri ?')" type="submit" class="btn btn-warning align-middle d-flex align-items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                    Ubah
                </button>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>