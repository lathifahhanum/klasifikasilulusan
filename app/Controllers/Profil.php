<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\profilModel;

class Profil extends Controller
{
    public function index()
    {
        $profilModel = new profilModel();
        $data['profil_lulusan'] = $profilModel->getProfil()->getResult();
        $data['prodi'] = $profilModel->getProdi()->getResult();
        $data['matakuliah'] = $profilModel->getMatakuliah()->getResult();
        echo view('iprofil', $data);
    }

    public function create()
    {
        $profilModel = new profilModel();
        $data = array(
            'kode_profil' => $this->request->getPost('kode_profil'),
            'profil_lulusan' => $this->request->getPost('profil_lulusan'),
            'profil_kode_prodi' => $this->request->getPost('profil_kode_prodi'),
        );

        $profilModel->insertProfil($data);
        return redirect()->to('/profil');
    }

    public function update()
    {
        $profilModel = new profilModel();
        $id = $this->request->getPost('kode_profil');
        $data = array(
            'kode_profil' => $this->request->getPost('kode_profil'),
            'profil_lulusan' => $this->request->getPost('profil_lulusan'),
            'profil_kode_prodi' => $this->request->getPost('profil_kode_prodi'),

        );

        $profilModel->updateProfil($data, $id);
        return redirect()->to('/profil');
    }

    public function delete()
    {
        $profilModel = new profilModel();
        $id = $this->request->getPost('kode_profil');
        $profilModel->deleteProfil($id);
        return redirect()->to('/profil');
    }
}
