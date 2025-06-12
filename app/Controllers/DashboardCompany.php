<?php
namespace App\Controllers;

class DashboardCompany extends BaseController
{
    public function call_interview()
    {
        $idUser = $this->request->getPost('idPelamar');
        $idJob = $this->request->getPost('idJob');
        $cvModel = new \App\Models\CVModel();

        $cvModel->where('idUser', $idUser)
                ->where('idJob', $idJob)
                ->set(['status' => 'dipanggil_interview'])
                ->update();

        return redirect()->back()->with('success', 'Pelamar dipanggil interview.');
    }

    public function accept_pelamar()
    {
        $idUser = $this->request->getPost('idPelamar');
        $idJob = $this->request->getPost('idJob');
        $cvModel = new \App\Models\CVModel();

        // Cek data dulu
        $cv = $cvModel->where('idUser', $idUser)
                      ->where('idJob', $idJob)
                      ->first();

        if (!$cv) {
            return redirect()->back()->with('error', 'Data lamaran tidak ditemukan!');
        }

        // Gunakan objek baru untuk update agar where tidak menumpuk
        $cvModel2 = new \App\Models\CVModel();
        $cvModel2->where('idUser', $idUser)
                 ->where('idJob', $idJob)
                 ->set(['status' => 'diterima'])
                 ->update();

        return redirect()->back()->with('success', 'Pelamar diterima.');
    }
}