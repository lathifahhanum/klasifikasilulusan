<?php

namespace App\Models;

use CodeIgniter\Model;

class nilaiModel extends Model
{
    protected $table = 'nilai_mahasiswa';

    public function getMatakuliah()
    {
        $builder = $this->db->table('matakuliah2');
        return $builder->get();
    }

    public function getMahasiswa()
    {
        $builder = $this->db->table('mahasiswa2');
        return $builder->get();
    }

    public function getNilai()
    {
        $builder = $this->db->table('nilai_mahasiswa');
        $builder->select('*');
        $builder->join('matakuliah2', 'kode_matakuliah = nilai_kode_matakuliah', 'left');
        $builder->join('mahasiswa2', 'nim = nilai_nim', 'left');
        return $builder->get();
    }

    public function getNilaiMhs($nim)
    {
        $data = $this->db->table('nilai_mahasiswa')
            ->join('matakuliah2', 'nilai_kode_matakuliah = kode_matakuliah')
            ->select('id_nilai, nilai, matakuliah')
            ->where('nilai_nim', $nim);
        return $data->get();
    }
    public function getDetailMahasiswa($nim)
    {
        $data = $this->db->table('mahasiswa2')
            ->join('prodi', 'mahasiswa_kode_prodi = kode_prodi')
            ->join('angkatan', 'mahasiswa_id_angkatan = id_angkatan')
            ->select('nim, nama_mahasiswa, prodi, tahun_angkatan')
            ->where('nim', $nim);
        return $data->get();
    }

    public function insertNilai($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateNilai($data, $id)
    {
        return $this->db->table('nilai_mahasiswa')->update($data, ['id_nilai' => $id]);
    }

    public function deleteNilai($id)
    {
        return $this->db->table('nilai_mahasiswa')->delete(['id_nilai' => $id]);
    }
}
