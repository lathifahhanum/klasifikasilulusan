<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\mahasiswaModel;

class Mahasiswa extends Controller
{
    public function index()
    {
        $mahasiswaModel = new mahasiswaModel();
        $data['mahasiswa2'] = $mahasiswaModel->getMahasiswa()->getResult();
        $data['prodi'] = $mahasiswaModel->getProdi()->getResult();
        $data['angkatan'] = $mahasiswaModel->getAngkatan()->getResult();
        echo view('imahasiswa', $data);
    }

    public function create()
    {
        $mahasiswaModel = new mahasiswaModel();
        $data = array(
            'nim' => $this->request->getPost('nim'),
            'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
            'mahasiswa_kode_prodi' => $this->request->getPost('mahasiswa_kode_prodi'),
            'mahasiswa_id_angkatan' => $this->request->getPost('mahasiswa_id_angkatan'),
        );

        $mahasiswaModel->insertMahasiswa($data);
        return redirect()->to('/mahasiswa');
    }

    public function update()
    {
        $mahasiswaModel = new mahasiswaModel();
        $id = $this->request->getPost('nim');
        $data = array(
            'nim' => $this->request->getPost('nim'),
            'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
            'mahasiswa_kode_prodi' => $this->request->getPost('mahasiswa_kode_prodi'),
            'mahasiswa_id_angkatan' => $this->request->getPost('mahasiswa_id_angkatan'),
        );

        $mahasiswaModel->updateMahasiswa($data, $id);
        return redirect()->to('/mahasiswa');
    }

    public function delete()
    {
        $mahasiswaModel = new mahasiswaModel();
        $id = $this->request->getPost('nim');
        $mahasiswaModel->deleteMahasiswa($id);
        return redirect()->to('/mahasiswa');
    }
}
