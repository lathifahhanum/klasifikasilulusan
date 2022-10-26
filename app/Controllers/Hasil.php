<?php

namespace App\Controllers;

use App\Models\hasilModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class Hasil extends Controller
{
    public function __construct()
    {
        $this->hasilModel = new hasilModel();
    }

    public function index()
    {
        $data['mahasiswa2'] = $this->hasilModel->allData()->getResult();
        echo view('ihasil', $data);
    }

    public function printpdf()
    {
        $data['mahasiswa2'] = $this->hasilModel->allData()->getResult();
        $html = view('iprint', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHTML($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
}
