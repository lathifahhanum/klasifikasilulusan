<?php

namespace App\Models;

use CodeIgniter\Model;

class mahasiswaModel extends Model
{
    protected $table = 'mahasiswa2';

    public function getProdi()
    {
        $builder = $this->db->table('prodi');
        return $builder->get();
    }

    public function getAngkatan()
    {
        $builder = $this->db->table('angkatan');
        return $builder->get();
    }

    public function getMahasiswa()
    {
        $builder = $this->db->table('mahasiswa2');
        $builder->select('*');
        $builder->join('prodi', 'kode_prodi = mahasiswa_kode_prodi', 'left');
        $builder->join('angkatan', 'id_angkatan = mahasiswa_id_angkatan', 'left');
        return $builder->get();
    }

    public function insertMahasiswa($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateMahasiswa($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['nim' => $id]);
    }

    public function deleteMahasiswa($id)
    {
        return $this->db->table($this->table)->delete(['nim' => $id]);
    }
}
