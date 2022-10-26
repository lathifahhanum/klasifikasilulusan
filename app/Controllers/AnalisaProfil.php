<?php

namespace App\Controllers;

use App\Models\AnalisaProfilModel;
use App\Models\angkatanModel;
use CodeIgniter\Controller;
use Phpml\Classification\KNearestNeighbors;
use \PhpOffice\PhpSpreadsheet\Reader\Xls;
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class AnalisaProfil extends Controller
{
    protected $analisaProfil;
    public function __construct()
    {
        $this->analisaProfil = new AnalisaProfilModel();
    }

    public function index()
    {
        // return view('ianalisaprofil');
        return redirect()->route('analisaProfil');
    }

    public function analisaProfil()
    {
        $request = service('request');
        $searchData = $request->getGet();

        $search = "";
        if (isset($searchData) && isset($searchData['search'])) {
            $search = $searchData['search'];
        }

        $samples = array(
            [2.621,    2.645,    2.805,    2.761],
            [3.427,    3.452,    3.375,    3.489],
            [3.266,    3.331,    3.367,    3.386],
            [3.242,    3.202,    3.289,    3.386],
            [3.435,    3.435,    3.414,    3.523],
            [3.363,    3.347,    3.383,    3.432],
            [2.782,    2.774,    2.750,    2.898],
            [3.444,    3.444,    3.430,    3.557],
            [3.387,    3.444,    3.539,    3.477],
            [2.629,    2.653,    2.641,    2.705],
            [2.758,    2.774,    2.805,    2.864],
            [2.589,    2.589,    2.555,    2.693],
            [3.306,    3.298,    3.305,    3.341],
            [3.758,    3.806,    3.797,    3.955],
            [3.274,    3.218,    3.266,    3.364],
            [2.863,    2.903,    2.797,    2.977],
            [3.323,    3.331,    3.234,    3.341],
            [2.677,    2.685,    2.625,    2.705],
            [3.185,    3.169,    3.109,    3.250],
            [3.516,    3.516,    3.430,    3.636],
            [2.718,    2.750,    2.617,    2.750],
            [3.250,    3.298,    3.375,    3.295],
            [3.371,    3.452,    3.563,    3.534],
            [3.331,    3.339,    3.273,    3.318],
            [3.427,    3.444,    3.398,    3.545],
            [2.871,    2.847,    3.016,    2.966],
            [3.702,    3.685,    3.734,    3.750],
            [2.758,    2.798,    2.688,    2.875],
            [3.702,    3.677,    3.688,    3.750],
            [3.242,    3.282,    3.266,    3.386],
            [3.315,    3.339,    3.328,    3.489]
        );

        $labels = array(
            'IT Support',
            'Computer Application Programmer',
            'IT Support',
            'IT Support',
            'Administrasi Jaringan',
            'Administrasi Jaringan',
            'Computer Application Programmer',
            'IT Support',
            'Computer Application Programmer',
            'IT Entrepreneur',
            'IT Entrepreneur',
            'Computer Application Programmer',
            'Computer Application Programmer',
            'Computer Application Programmer',
            'IT Support',
            'IT Support',
            'Administrasi Jaringan',
            'Administrasi Jaringan',
            'Administrasi Jaringan',
            'IT Entrepreneur',
            'Administrasi Jaringan',
            'IT Support',
            'Computer Application Programmer',
            'Administrasi Jaringan',
            'Computer Application Programmer',
            'Computer Application Programmer',
            'Computer Application Programmer',
            'IT Support',
            'IT Support',
            'IT Support',
            'IT Entrepreneur'
        );

        //Pilih nilai $k
        $data['classifier'] = new KNearestNeighbors($k = 19);

        // data test
        $data['testing'] = [];
        $testingXC1 = $this->analisaProfil->getTesting()->getResult();
        $testingXC2 = $this->analisaProfil->getTesting2()->getResult();
        $testingXC3 = $this->analisaProfil->getTesting3()->getResult();
        $testingXC4 = $this->analisaProfil->getTesting4()->getResult();

        for ($i = 0; $i < count($testingXC1); $i++) {
            $data['testing'][] = array_merge([], [$testingXC1[$i]->rata2, $testingXC2[$i]->rata2, $testingXC3[$i]->rata2, $testingXC4[$i]->rata2]);
        }

        //dd($data);
        // knn dengan php-ml
        $data['classifier']->train($samples, $labels);
        $data['knn'] = $data['classifier']->predict($data['testing']);

        // penggabungan array
        if ($search == '') {
            $detailKnn = $this->analisaProfil->getDetailKnn()->getResultArray();
        } else {
            $detailKnn = $this->analisaProfil->seacrhDetailKnn($search)->getResultArray();
        }

        $i = 0;
        $data['newData'] = [];
        foreach ($detailKnn as $key) {
            $data['newData'][] = array_merge($key, ['k13' => $data['knn'][$i]]);
            $i++;
        }

        // data angkatan
        $angkatanModel = new angkatanModel();
        $data['angkatan'] = $angkatanModel->getAngkatan()->getResult();
        return view('ianalisaprofil.php', $data);
    }

    public function updatePrediksiK3()
    {
        if ($this->request->getMethod() == 'post') {
            $data['knn'] = $this->request->getPost('k13');
            $data['nim'] = $this->request->getPost('nim');

            $i = 0;
            $data['rs'] = [];
            foreach ($data['nim'] as $key) {
                $data['rs'][] = array_merge(['nim' => $key], ['k13' => $data['knn'][$i]]);
                $i++;
            }

            foreach ($data['rs'] as $key) {
                $data = ['prediksi_k13' => $key['k13']];
                $id = $key['nim'];
                $this->analisaProfil->updateKnn13($data, $id);
            }
        }
        return redirect()->route('analisaProfil');
    }
}
