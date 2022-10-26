<?php

namespace App\Models;

use CodeIgniter\Model;

class profilModel extends Model
{

    protected $table = 'profil_lulusan';

    public function getProdi()
    {
        $builder = $this->db->table('prodi');
        return $builder->get();
    }

    public function getProfil()
    {
        $builder = $this->db->table('profil_lulusan');
        $builder->join('prodi', 'kode_prodi = profil_kode_prodi', 'left');
        return $builder->get();
    }

    public function getMatakuliah()
    {
        $builder = $this->db->table('matakuliah');
        #$builder->join('prodi', 'kode_prodi = profil_kode_prodi', 'left');
        return $builder->get();
    }

    public function insertProfil($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateProfil($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['kode_profil' => $id]);
    }

    public function deleteProfil($id)
    {
        return $this->db->table($this->table)->delete(['kode_profil' => $id]);
    }
}
