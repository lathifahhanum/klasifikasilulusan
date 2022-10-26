<?php

namespace App\Controllers;

use App\Models\GrafikAnalisaProfilModel;
use CodeIgniter\Controller;
use Dompdf\dompdf;

class GrafikAnalisaProfil extends Controller
{
    protected $grafikAnalisa;
    public function __construct()
    {
        $this->grafikAnalisa = new GrafikAnalisaProfilModel();
    }
    public function index()
    {
        return redirect()->route('loadGrafikAnalisaProfil');
    }

    public function loadGrafikAnalisaProfil()
    {
        $data['grafikChart'] = $this->grafikAnalisa->getGrafik()->getResultArray();
        //return view('igrafikanalisaprofil', $data);
        return view('dashboard', $data);
    }

    public function printpdf()
    {
        $data = ['klasifikasi' => $this->grafikAnalisa->getMhs(),];

        $html = view('iprint', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHTML($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream();
    }
}
