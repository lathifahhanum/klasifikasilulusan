<?php

namespace App\Controllers;

use App\Models\prodiModel;
use CodeIgniter\Controller;

class Prodi extends Controller
{
    public function index()
    {
        $prodiModel = new prodiModel();
        $data['prodi'] = $prodiModel->getProdi()->getResult();
        echo view('iprodi', $data);
    }

    public function create()
    {
        $prodiModel = new prodiModel();
        $data = array(
            'kode_prodi' => $this->request->getPost('kode_prodi'),
            'prodi' => $this->request->getPost('prodi'),
        );

        $prodiModel->insertProdi($data);
        return redirect()->to('/prodi');
    }

    public function update()
    {
        $prodiModel = new prodiModel();
        $id = $this->request->getPost('kode_prodi');
        $data = array(
            'kode_prodi' => $this->request->getPost('kode_prodi'),
            'prodi' => $this->request->getPost('prodi'),
        );

        $prodiModel->updateProdi($data, $id);
        return redirect()->to('/prodi');
    }

    public function delete()
    {
        $prodiModel = new prodiModel();
        $id = $this->request->getPost('kode_prodi');
        $prodiModel->deleteProdi($id);
        return redirect()->to('/prodi');
    }
}
