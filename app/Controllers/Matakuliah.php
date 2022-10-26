<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\matakuliahModel;

class Matakuliah extends Controller
{
    public function index()
    {
        $matakuliahModel = new matakuliahModel();
        $data['matakuliah2'] = $matakuliahModel->getMatakuliah()->getResult();
        $data['prodi'] = $matakuliahModel->getProdi()->getResult();
        #$data['profil_lulusan'] = $matakuliahModel->getProfil()->getResult();
        echo view('imatakuliah', $data);
    }

    public function create()
    {
        $matakuliahModel = new matakuliahModel();
        $data = array(
            'kode_matakuliah' => $this->request->getPost('kode_matakuliah'),
            'matakuliah' => $this->request->getPost('matakuliah'),
            'matakuliah_kode_prodi' => $this->request->getPost('matakuliah_kode_prodi'),
            #'matakuliah_kode_profil' => $this->request->getPost('matakuliah_kode_profil'),
        );

        $matakuliahModel->insertMatakuliah($data);
        return redirect()->to('/matakuliah');
    }

    public function update()
    {
        $matakuliahModel = new matakuliahModel();
        $id = $this->request->getPost('kode_matakuliah');
        $data = array(
            'kode_matakuliah' => $this->request->getPost('kode_matakuliah'),
            'matakuliah' => $this->request->getPost('matakuliah'),
            'matakuliah_kode_prodi' => $this->request->getPost('matakuliah_kode_prodi'),
            #'matakuliah_kode_profil' => $this->request->getPost('matakuliah_kode_profil'),
        );

        $matakuliahModel->updateMatakuliah($data, $id);
        return redirect()->to('/matakuliah');
    }

    public function delete()
    {
        $matakuliahModel = new matakuliahModel();
        $id = $this->request->getPost('kode_matakuliah');
        $matakuliahModel->deleteMatakuliah($id);
        return redirect()->to('/matakuliah');
    }
}
