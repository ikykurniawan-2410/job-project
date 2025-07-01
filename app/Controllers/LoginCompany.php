<?php

namespace App\Controllers;

use App\Models\CompanyModel;

class LoginCompany extends BaseController
{

    private $validation;
    private $companyModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->db = \Config\Database::connect();
        $this->companyModel = new \App\Models\CompanyModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pasang Iklan Lowongan Kerja Gratis | JobStreet Employer ID'
        ];

        return view('LoginCompany/View', $data);
    }

    public function loginCompany()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $companyModel = new \App\Models\CompanyModel();
        $company = $companyModel->getCompanyByEmail($email);

        if ($company) {
            if ($company['status'] == 'pending') {
                return redirect()->back()->withInput()->with('error', 'Akun perusahaan Anda masih menunggu persetujuan admin.');
            }
            if ($company['status'] == 'rejected') {
                return redirect()->back()->withInput()->with('error', 'Akun perusahaan Anda ditolak. Silakan hubungi admin.');
            }
            if (password_verify($password, $company['passwordCompany'])) {
                session()->set('idCompany', $company['id']); // integer
                session()->set('idCompanyStr', $company['idCompany']); // varchar, contoh: "COMPANY - ..."
                session()->set('namaCompany', $company['namaCompany']);
                return redirect()->to('/dashboard_company');
            } else {
                return redirect()->back()->withInput()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Email tidak ditemukan.');
        }
    }
}