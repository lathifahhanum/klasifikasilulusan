<?php

namespace App\Models;

use CodeIgniter\Model;

class AnalisaProfilModel extends Model
{
    // mencari x1,2,3,4 data testing
    public function getTesting()
    {
        $data = $this->db->table('nilai_mahasiswa')
            ->join('mahasiswa2', 'nilai_nim = nim', 'right')
            ->join('matakuliah2', 'kode_matakuliah = nilai_kode_matakuliah')
            ->join('detail_profil_lulusan', 'detail_kode_matakuliah = kode_matakuliah', 'left')
            ->join('profil_lulusan', 'kode_profil = detail_kode_profil', 'left')

            ->select('AVG(nilai) as rata2')
            ->where('kode_profil', 'PL01')
            ->groupBy('nim');
        return $data->get();
    }
    public function getTesting2()
    {
        $data = $this->db->table('nilai_mahasiswa')
            ->join('mahasiswa2', 'nilai_nim = nim', 'right')
            ->join('matakuliah2', 'kode_matakuliah = nilai_kode_matakuliah')
            ->join('detail_profil_lulusan', 'detail_kode_matakuliah = kode_matakuliah', 'left')
            ->join('profil_lulusan', 'kode_profil = detail_kode_profil', 'left')

            ->select('AVG(nilai) as rata2')
            ->where('kode_profil', 'PL02')
            ->groupBy('nim');
        return $data->get();
    }
    public function getTesting3()
    {

        $data = $this->db->table('nilai_mahasiswa')
            ->join('mahasiswa2', 'nilai_nim = nim', 'right')
            ->join('matakuliah2', 'kode_matakuliah = nilai_kode_matakuliah')
            ->join('detail_profil_lulusan', 'detail_kode_matakuliah = kode_matakuliah', 'left')
            ->join('profil_lulusan', 'kode_profil = detail_kode_profil', 'left')

            ->select('AVG(nilai) as rata2')
            ->where('kode_profil', 'PL03')
            ->groupBy('nim');
        return $data->get();
    }
    public function getTesting4()
    {
        $data = $this->db->table('nilai_mahasiswa')
            ->join('mahasiswa2', 'nilai_nim = nim', 'right')
            ->join('matakuliah2', 'kode_matakuliah = nilai_kode_matakuliah')
            ->join('detail_profil_lulusan', 'detail_kode_matakuliah = kode_matakuliah', 'left')
            ->join('profil_lulusan', 'kode_profil = detail_kode_profil', 'left')

            ->select('AVG(nilai) as rata2')
            ->where('kode_profil', 'PL04')
            ->groupBy('nim');
        return $data->get();
    }

    public function getDetailKnn()
    {

        $data = $this->db->table('nilai_mahasiswa')
            ->join('mahasiswa2', 'nilai_nim = nim')
            ->join('angkatan', 'mahasiswa2.mahasiswa_id_angkatan = angkatan.id_angkatan')
            // ->where('mahasiswa2.prediksi_k13', NULL)
            ->select('nim, nama_mahasiswa, tahun_angkatan')
            ->orderBy('nim', 'asc')
            ->groupBy('nama_mahasiswa');

        return $data->get();
    }

    public function seacrhDetailKnn($search)
    {
        $data = $this->db->table('nilai_mahasiswa')
            ->join('mahasiswa2', 'nilai_nim = nim')
            ->join('angkatan', 'mahasiswa2.mahasiswa_id_angkatan = angkatan.id_angkatan')
            // ->where('mahasiswa2.prediksi_k13', NULL)
            ->like('tahun_angkatan', $search)
            ->select('nim, nama_mahasiswa, tahun_angkatan')
            ->orderBy('nim', 'asc')
            ->groupBy('nim');

        return $data->get();
    }

    public function updateKnn13($data, $id)
    {
        $this->db->table('mahasiswa2')->update($data, ['nim' => $id]);
    }
}
