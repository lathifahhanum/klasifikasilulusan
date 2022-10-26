<?php

namespace App\Controllers;

use App\Models\angkatanModel;
use CodeIgniter\Controller;
use \PhpOffice\PhpSpreadsheet\Reader\Xls;
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Angkatan extends Controller
{

    public function __construct()
    {
        $this->angkatan = new angkatanModel();
    }

    public function index()
    {
        $data['angkatan'] = $this->angkatan->getAngkatan()->getResult();
        echo view('iangkatan', $data);
    }

    public function prosesExcel()
    {
        $file_excel = $this->request->getFile('fileexcel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new Xls();
        } else {
            $render = new Xlsx();
        }
        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $x => $row) {
            if ($x == 0) {
                continue;
            }

            $No = $row[0];
            $tahun_angkatan = $row[1];

            $db = \Config\Database::connect();

            $cekNis = $db->table('angkatan')->getWhere(['tahun_angkatan' => $tahun_angkatan])->getResult();

            if (count($cekNis) > 0) {
                session()->setFlashdata('message', '<b style="color:red">Data Gagal di Import NIS ada yang sama</b>');
            } else {

                $simpandata = [
                    'tahun_angkatan' => $tahun_angkatan
                ];

                $db->table('angkatan')->insert($simpandata);
                session()->setFlashdata('message', 'Berhasil import excel');
            }
        }

        return redirect()->to('/angkatan');
    }

    public function create()
    {
        $angkatanModel = new angkatanModel();
        $data = array(
            'tahun_angkatan' => $this->request->getPost('tahun_angkatan'),
        );

        $angkatanModel->insertAngkatan($data);
        return redirect()->to('/angkatan');
    }

    public function update()
    {
        $angkatanModel = new angkatanModel();
        $id = $this->request->getPost('id_angkatan');
        $data = array(
            'tahun_angkatan' => $this->request->getPost('tahun_angkatan'),
        );

        $angkatanModel->updateAngkatan($data, $id);
        return redirect()->to('/angkatan');
    }

    public function delete()
    {
        $angkatanModel = new angkatanModel();
        $id = $this->request->getPost('id_angkatan');
        $angkatanModel->deleteAngkatan($id);
        return redirect()->to('/angkatan');
    }
}
