<?php

namespace App\Models;

use CodeIgniter\Model;

class GrafikAnalisaProfilModel extends Model
{
    public function getGrafik()
    {
        $data = $this->db->table('mahasiswa2')
            // ->join('mahasiswa2', 'nilai_nim = nim')
            // ->join('angkatan', 'mahasiswa2.mahasiswa_id_angkatan = angkatan.id_angkatan')
            ->where('mahasiswa2.prediksi_k13 !=', NULL)
            ->select('count(prediksi_k13) as qty, prediksi_k13')
            // ->orderBy('nim', 'asc')
            ->groupBy('mahasiswa2.prediksi_k13');
        // $data = $this->db->table('mahasiswa_predict')->select()->groupBy('k13');
        return $data->get();
    }
}
