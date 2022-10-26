<?php

namespace App\Models;

use CodeIgniter\Model;

class hasilModel extends Model
{
    public function allData()
    {
        $data = $this->db->table('mahasiswa2')
            // ->join('mahasiswa2', 'nilai_nim = nim')
            // ->join('angkatan', 'mahasiswa2.mahasiswa_id_angkatan = angkatan.id_angkatan')
            ->where('mahasiswa2.prediksi_k13 !=', NULL)
            ->orderBy('nim', 'asc');
        //->groupBy('mahasiswa2.prediksi_k13');
        // $data = $this->db->table('mahasiswa_predict')->select()->groupBy('k13');
        return $data->get();
    }

    public function getHasil()
    {
        $data = $this->db->table('mahasiswa2')
            ->join('angkatan', 'mahasiswa2.mahasiswa_id_angkatan = angkatan.id_angkatan')
            //->where('mahasiswa2.prediksi_k13 !=', NULL)
            //->like('tahun_angkatan', $search)
            ->select('nim, nama_mahasiswa, prediksi_k13')
            ->orderBy('nim', 'asc');
        //->groupBy('nim');

        return $data->get();
    }

    public function seacrhHasil($search)
    {
        $data = $this->db->table('mahasiswa2')
            ->join('angkatan', 'mahasiswa2.mahasiswa_id_angkatan = angkatan.id_angkatan')
            ->where('mahasiswa2.prediksi_k13 !=', NULL)
            ->like('tahun_angkatan', $search)
            ->select('nim, nama_mahasiswa, prediksi_k13')
            ->orderBy('nim', 'asc');
        //->groupBy('nim');

        return $data->get();
    }
}
