<?php

namespace App\Models;

use CodeIgniter\Model;

class matakuliahModel extends Model
{
    protected $table = 'matakuliah2';

    public function getProdi()
    {
        $builder = $this->db->table('prodi');
        return $builder->get();
    }

    public function getProfil()
    {
        $builder = $this->db->table('profil_lulusan');
        return $builder->get();
    }

    public function getMatakuliah()
    {
        $builder = $this->db->table('matakuliah2');
        $builder->select('*');
        // $builder->join('prodi', 'kode_prodi = matakuliah_kode_prodi', 'left');
        $builder->orderBy('kode_matakuliah', 'asc');
        #$builder->join('profil_lulusan', 'kode_profil = matakuliah_kode_profil', 'left');
        return $builder->get();
    }

    public function insertMatakuliah($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateMatakuliah($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['kode_matakuliah' => $id]);
    }

    public function deleteMatakuliah($id)
    {
        return $this->db->table($this->table)->delete(['kode_matakuliah' => $id]);
    }
}
