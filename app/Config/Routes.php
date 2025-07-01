<?php

namespace Config;

// Membuat instance baru dari RouteCollection
$routes = Services::routes();

// Memuat file routing bawaan sistem terlebih dahulu
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
// Set namespace, controller, dan method default
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Route utama ke halaman Home
$routes->get('/', 'Home::index');

// Route untuk registrasi user (hanya bisa diakses jika belum login)
$routes->get('/registration_user', 'RegistrationUser::index', ['filter' => 'LoginFilter']);

// Route untuk proses signup user
$routes->post('/signupUser', 'RegistrationUser::signupUser');

// Route untuk proses login user
$routes->post('/loginUser', 'LoginUser::login');

// Route untuk logout user (hanya bisa diakses jika sudah login user)
$routes->post('/login_user/logout', 'LoginUser::logout', ['filter' => 'UserFilter']);

// Route ke halaman login user (hanya bisa diakses jika belum login)
$routes->get('/login_user', 'LoginUser::index', ['filter' => 'LoginFilter']);

// Route ke halaman login perusahaan (hanya bisa diakses jika belum login perusahaan)
$routes->get('/login_company', 'LoginCompany::index', ['filter' => 'LoginFilterCompany']);

// Route untuk proses login perusahaan
$routes->post('/loginCompany', 'LoginCompany::loginCompany');

// Route ke halaman registrasi perusahaan
$routes->get('/registration_company', 'RegistrationCompany::index');

// Route untuk proses signup perusahaan
$routes->post('/signupCompany', 'RegistrationCompany::registrationCompany');

// Route ke halaman utama lowongan kerja
$routes->get('/job', 'Job::index');

// Route untuk melamar pekerjaan
$routes->post('/apply_job', 'Job::applyJob');

// Route untuk melihat detail pekerjaan
$routes->post('/detail_job', 'Job::detailJob');

// Route ke halaman tips karir
$routes->get('/TipsKarir', 'TipsKarir::index');

// ------------------- Dashboard User -------------------

// Route ke dashboard user (hanya bisa diakses jika sudah login user)
$routes->get('/dashboard_user', 'UserDashboard::index', ['filter' => 'UserFilter']);

// Route ke profil user
$routes->get('/dashboard_user/profile', 'UserDashboard::user', ['filter' => 'UserFilter']);

// Route ke daftar lamaran user
$routes->get('/dashboard_user/my_application', 'UserDashboard::myApplication', ['filter' => 'UserFilter']);

// Route ke halaman resume/CV user
$routes->get('/dashboard_user/resume_cv', 'UserDashboard::resumeCV', ['filter' => 'UserFilter']);

// Route untuk upload CV
$routes->post('/dashboard_user/upload_resume_cv', 'UserDashboard::uploadCV', ['filter' => 'UserFilter']);

// Route untuk download CV
$routes->post('/dashboard_user/download_cv', 'UserDashboard::downloadCV', ['filter' => 'UserFilter']);

// Route untuk hapus CV
$routes->post('/dashboard_user/delete_cv', 'UserDashboard::deleteCV', ['filter' => 'UserFilter']);

// Route untuk mendapatkan email user
$routes->post('/dashboard_user/get_email', 'UserDashboard::getEmail', ['filter' => 'UserFilter']);

// Route untuk mendapatkan CV terbaru
$routes->post('/dashboard_user/get_new_cv', 'UserDashboard::getNewCV', ['filter' => 'UserFilter']);

// Route untuk hapus lamaran user
$routes->post('/dashboard_user/delete_my_application', 'UserDashboard::deleteMyApplication', ['filter' => 'UserFilter']);

// Route untuk mengubah CV user berdasarkan segment id
$routes->get('/dashboard_user/change_cv/(:segment)', 'UserDashboard::changeCV/$1', ['filter' => 'UserFilter']);

// Route untuk melihat status lamaran user
$routes->get('/dashboard_user/status_lamaran', 'UserDashboard::statusLamaran');

// ------------------- Dashboard Company -------------------

// Route ke dashboard perusahaan (hanya bisa diakses jika sudah login perusahaan)
$routes->get('/dashboard_company', 'CompanyDashboard::index', ['filter' => 'CompanyFilter']);

// Route untuk mengubah deskripsi lowongan
$routes->get('/dashboard_company/change_description_job/(:segment)', 'CompanyDashboard::changeDescription/$1', ['filter' => 'CompanyFilter']);

// Route untuk melihat CV pelamar
$routes->get('/dashboard_company/view_cv/(:segment)', 'CompanyDashboard::viewCV/$1', ['filter' => 'CompanyFilter']);

// Route untuk melihat detail lowongan
$routes->get('/dashboard_company/view_job/(:segment)/(:segment)', 'CompanyDashboard::previewJob/$1/$2', ['filter' => 'CompanyFilter']);

// Route untuk membuat lowongan baru
$routes->get('/dashboard_company/create_lowongan', 'CompanyDashboard::createLowongan', ['filter' => 'CompanyFilter']);

// Route untuk melihat pelamar pada lowongan tertentu
$routes->get('/dashboard_company/view_pelamar_job/(:segment)/(:segment)', 'CompanyDashboard::pelamarLowongan/$1/$2', ['filter' => 'CompanyFilter']);

// Route untuk logout perusahaan
$routes->post('/logout_company', 'CompanyDashboard::logoutCompany', ['filter' => 'CompanyFilter']);

// Route untuk mendapatkan data lowongan
$routes->post('/getLowongan', 'CompanyDashboard::getLowongan', ['filter' => 'CompanyFilter']);

// Route untuk mengubah data lowongan
$routes->post('/changeLowongan', 'CompanyDashboard::changeLowongan', ['filter' => 'CompanyFilter']);

// Route untuk menghapus lowongan
$routes->post('/deleteLowongan', 'CompanyDashboard::deleteLowongan', ['filter' => 'CompanyFilter']);

// Route untuk download CV pelamar
$routes->post('/dashboard_company/download_cv', 'CompanyDashboard::downloadCV', ['filter' => 'CompanyFilter']);

// Route untuk memanggil interview pelamar
$routes->post('/dashboard_company/call_interview', 'DashboardCompany::call_interview');

// Route untuk menerima pelamar
$routes->post('/dashboard_company/accept_pelamar', 'DashboardCompany::accept_pelamar');

// ------------------- Fitur Pencarian -------------------

// Route untuk pencarian pekerjaan
$routes->get('job/search', 'Job::search');

// ------------------- Dashboard Admin -------------------

// Route ke dashboard admin
$routes->get('admin-dashboard', 'AdminDashboard::index', ['filter' => 'AdminFilter']);

// Route untuk approve user
$routes->get('admin-dashboard/approve/(:num)', 'AdminDashboard::approve/$1', ['filter' => 'AdminFilter']);

// Route untuk reject user
$routes->get('admin-dashboard/reject/(:num)', 'AdminDashboard::reject/$1', ['filter' => 'AdminFilter']);

// Route untuk logout admin
$routes->get('logout_admin', 'LoginUser::logout_admin');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 * Untuk kebutuhan routing tambahan berbasis environment
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
