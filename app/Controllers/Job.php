<?php

namespace App\Controllers;

use App\Models\UserModel;

class Job extends BaseController
{
    private $jobDeskModel;
    private $resumeModel;
    private $cvModel;
    private $userModel;
    protected $db;

    public function __construct()
    {
        // Inisialisasi model yang dibutuhkan
        $this->jobDeskModel = new \App\Models\JobDeskModel();
        $this->resumeModel  = new \App\Models\ResumeModel();
        $this->cvModel      = new \App\Models\CVModel();
        $this->userModel    = new \App\Models\UserModel();
        $this->db           = \Config\Database::connect();
    }

    /**
     * Halaman utama lowongan kerja
     * Menampilkan jumlah lowongan Web Development
     */
    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        // Hitung jumlah lowongan Web Development
        $webDevCount = $this->jobDeskModel
            ->like('namaJob', 'Web Development')
            ->countAllResults();

        // Hitung jumlah perusahaan
        $companyModel = new \App\Models\CompanyModel();
        $companyCount = $companyModel->countAllResults();

        return view('Job/JobView', [
            'keyword'      => $keyword,
            'webDevCount'  => $webDevCount,
            'companyCount' => $companyCount,
        ]);
    }

    /**
     * Mendapatkan detail job berdasarkan idJob (AJAX)
     */
    public function detailJob()
    {
        $detailJob = $this->jobDeskModel
            ->join('company', 'company.idCompany = job_desk.idCompany')
            ->where('idJob', $this->request->getPost('idJob'))
            ->first();

        return json_encode([
            'data'       => $detailJob,
            'success'    => 'WORK',
            'csrf_token' => csrf_hash(),
        ]);
    }

    /**
     * Melamar pekerjaan (AJAX)
     * - Cek apakah user sudah upload CV
     * - Cek apakah sudah pernah melamar job yang sama
     * - Simpan data lamaran jika valid
     */
    public function applyJob()
    {
        if (session()->get('idUser')) {
            // Cek apakah user sudah upload CV
            $checkCV = $this->resumeModel->where('idUser', session()->get('idUser'))->first();
            if (empty($checkCV)) {
                return json_encode([
                    'idJob'     => $this->request->getPost('idJob'),
                    'checkCV'   => 'Silahkan Upload CV Anda Terlebih Dahulu',
                    'success'   => 'WORK',
                    'csrf_token'=> csrf_hash(),
                ]);
            } else {
                // Cek apakah user sudah pernah melamar job ini
                $checkDuplicateApplyJob = $this->cvModel
                    ->where('idUser', session()->get('idUser'))
                    ->where('idJob', $this->request->getPost('idJob'))
                    ->first();

                if (empty($checkDuplicateApplyJob)) {
                    try {
                        // Simpan data lamaran baru
                        $this->cvModel->insert([
                            'idCV'     => 'CV - ' . uniqid(),
                            'idUser'   => session()->get('idUser'),
                            'idJob'    => $this->request->getPost('idJob'),
                            'idResume' => $checkCV['idResume']
                        ]);

                        if ($this->db->affectedRows()) {
                            return json_encode([
                                'checkCV'   => 'Anda Berhasil Melamar Pekerjaan Ini',
                                'success'   => 'WORK',
                                'csrf_token'=> csrf_hash(),
                            ]);
                        } else {
                            return json_encode([
                                'checkCV'   => 'Coba lagi nanti....',
                                'success'   => 'WORK',
                                'csrf_token'=> csrf_hash(),
                            ]);
                        }
                    } catch (\ReflectionException $e) {
                        return json_encode([
                            'checkCV'   => $e,
                            'csrf_token'=> csrf_hash(),
                        ]);
                    }
                } else {
                    // Sudah pernah melamar job ini
                    return json_encode([
                        'checkCV'   => 'Maaf Anda Sudah Melamar Pekerjaan Ini',
                        'csrf_token'=> csrf_hash(),
                    ]);
                }
            }
        } else {
            // User belum login
            return json_encode([
                'checkCV'   => 'Anda Harus Login',
                'csrf_token'=> csrf_hash(),
            ]);
        }
    }

    /**
     * Fitur pencarian lowongan kerja
     * Menampilkan hasil pencarian berdasarkan keyword
     */
    public function search()
    {
        $keyword = $this->request->getGet('keyword');
        $jobDeskModel = new \App\Models\JobDeskModel();

        // Query pencarian: cari di namaJob, namaCompany, atau alamat
        $jobDesk = $jobDeskModel
            ->join('company', 'company.idCompany = job_desk.idCompany')
            ->like('namaJob', $keyword)
            ->orLike('namaCompany', $keyword)
            ->orLike('alamat', $keyword)
            ->paginate(30, 'job_desk');

        $pager = $jobDeskModel->pager;

        return view('Search/SearchResultView', [
            'jobDesk' => $jobDesk,
            'pager'   => $pager
        ]);
    }
}
