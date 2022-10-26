<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\nilaiModel;

class Nilai extends Controller
{
    public function index()
    {
        $nilaiModel = new nilaiModel();
        $data['nilai_mahasiswa'] = $nilaiModel->getNilai()->getResult();
        $data['mahasiswa2'] = $nilaiModel->getMahasiswa()->getResult();
        $data['matakuliah2'] = $nilaiModel->getMatakuliah()->getResult();
        echo view('inilai', $data);
    }

    public function create()
    {
        $nilaiModel = new nilaiModel();
        $data = array(
            'nilai_nim' => $this->request->getPost('nilai_nim'),
            'nilai_kode_matakuliah' => $this->request->getPost('nilai_kode_matakuliah'),
            'nilai' => $this->request->getPost('nilai'),
        );

        $nilaiModel->insertNilai($data);
        return redirect()->to('/nilai');
    }

    public function update()
    {
        $nilaiModel = new nilaiModel();
        $nim = $this->request->getPost('nim');
        $url = 'nilai/detail/' . $nim;
        $id = $this->request->getPost('id_nilai');

        $data = array(
            'nilai' => $this->request->getPost('nilai'),
        );

        $nilaiModel->updateNilai($data, $id);
        return redirect()->to($url);
    }

    public function delete()
    {
        $nilaiModel = new nilaiModel();
        $id = $this->request->getPost('id_nilai');
        $nim = $this->request->getPost('nim');
        $url = 'nilai/detail/' . $nim;
        $nilaiModel->deleteNilai($id);
        return redirect()->to($url);
    }

    public function detail($nim)
    {
        $nilaiModel = new nilaiModel();
        $data['mhs'] = $nilaiModel->getDetailMahasiswa($nim)->getResultArray();
        $data['nilai'] = $nilaiModel->getNilaiMhs($nim)->getResult();
        echo view('idetailnilai', $data);
    }

    public function tambah($nim)
    {
        $nilaiModel = new nilaiModel();
        $data['mhs'] = $nilaiModel->getDetailMahasiswa($nim)->getResultArray();
        $data['nilai'] = $nilaiModel->getNilaiMhs($nim)->getResult();
        $data['matakuliah2'] = $nilaiModel->getMatakuliah($nim)->getResult();
        echo view('itambahnilai', $data);
    }
}
