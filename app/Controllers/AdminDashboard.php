<?php

namespace App\Controllers;

use App\Models\CompanyModel;
use App\Models\JobModel;

class AdminDashboard extends BaseController
{
    protected $companyModel;

    public function __construct()
    {
        $this->companyModel = new CompanyModel();
    }

    // List perusahaan pending
    public function index()
    {
        $companyModel = new \App\Models\CompanyModel();
        $userModel = new \App\Models\UserModel();
        $jobModel = new \App\Models\JobDeskModel();

        $data['companies'] = $companyModel->findAll();
        $data['users'] = $userModel->findAll();
        $data['jobs'] = $jobModel->select('job_desk.*, company.namaCompany')
                                ->join('company', 'company.id = job_desk.idCompany', 'left')
                                ->findAll();

        return view('admin/dashboard', $data);
    }

    // Approve perusahaan
    public function approve($id)
    {
        if ($this->companyModel->find($id)) {
            $this->companyModel->update($id, ['status' => 'approved']);
            return redirect()->back()->with('success', 'Perusahaan disetujui.');
        } else {
            return redirect()->back()->with('error', 'Perusahaan tidak ditemukan.');
        }
    }

    // Reject perusahaan
    public function reject($id)
    {
        if ($this->companyModel->find($id)) {
            $this->companyModel->update($id, ['status' => 'rejected']);
            return redirect()->back()->with('success', 'Perusahaan ditolak.');
        } else {
            return redirect()->back()->with('error', 'Perusahaan tidak ditemukan.');
        }
    }
}