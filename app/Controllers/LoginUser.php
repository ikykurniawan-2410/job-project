<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\UserModel;

class LoginUser extends BaseController
{
    private $userModel;
    private $validation;
    protected $db;

    /**
     * Konstruktor: Inisialisasi model, validasi, dan koneksi database.
     */
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->validation->setRules([
            'username' => [
                'label'  => 'Username',
                'rules'  => 'required|alpha_numeric|min_length[3]|max_length[20]',
                'errors' => [
                    'required'      => '{field} Wajib Diisi',
                    'alpha_numeric' => '{field} harus kombinasi angka dan huruf',
                    'min_length'    => '{field} minimal 3 karakter',
                    'max_length'    => '{field} maksimal 20 karakter',
                ],
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required|alpha_numeric|min_length[8]|max_length[20]',
                'errors' => [
                    'required'      => '{field} Wajib Diisi',
                    'alpha_numeric' => '{field} harus berupa huruf / angka',
                    'min_length'    => '{field} minimal 8 karakter',
                    'max_length'    => '{field} maksimal 20 karakter',
                ],
            ],
        ]);
        $this->userModel = new \App\Models\UserModel();
        $this->db = \Config\Database::connect();
    }

    /**
     * Menampilkan halaman login user.
     */
    public function index()
    {
        $data = [
            'title' => 'Pasang Iklan Lowongan Kerja Gratis | JobStreet Employer ID'
        ];
        return view('loginUser/View', $data);
    }

    /**
     * Proses login user.
     * Validasi input, cek username dan password, set session jika berhasil.
     */
    public function loginUser()
    {
        if ($this->validation->withRequest($this->request)->run()) {
            $user = $this->userModel
                ->where('username', $this->request->getPost('username'))
                ->first();

            if (!empty($user)) {
                $passwordString = $this->request->getPost('password');
                $passwordVerify = $user['password'];

                if (!password_verify($passwordString, $passwordVerify)) {
                    session()->setFlashdata('password', 'Password salah');
                } else {
                    session()->set([
                        'idUser' => $user['idUser'],
                        'nama'   => $user['nama']
                    ]);
                    return redirect()->to('/job');
                }
            } else {
                session()->setFlashdata('username', 'Username tidak ditemukan');
            }
        } else {
            session()->setFlashdata([
                'username' => $this->validation->getError('username'),
                'password' => $this->validation->getError('password'),
            ]);
        }
        return redirect()->back()->withInput();
    }

    /**
     * Logout user dan hapus session.
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/job');
    }

    /**
     * Proses login untuk admin dan user.
     */
    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cek admin dulu
        $adminModel = new \App\Models\AdminModel();
        $admin = $adminModel->where('username', $username)->first();
        // var_dump($admin); exit;
        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                session()->set('is_admin_logged_in', true);
                session()->set('admin_username', $admin['username']);
                return redirect()->to('/admin-dashboard');
            } else {
                die('Password admin salah');
            }
        }

        // Cek user biasa
        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('username', $username)->first();
        if ($user && password_verify($password, $user['password'])) {
            session()->set('idUser', $user['idUser']); // BENAR, ini string seperti 'USER - 6252f211c78cd'
            session()->set('nama', $user['nama']);
            return redirect()->to('/');
        }

        // Jika gagal
        return redirect()->back()->withInput()->with('error', 'Username atau password salah');
    }

    /**
     * Logout admin dan hapus session.
     */
    public function logout_admin()
    {
        session()->destroy();
        return redirect()->to('/'); // ke halaman awal
    }
}

