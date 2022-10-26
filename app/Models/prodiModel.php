<?php

namespace App\Models;

use CodeIgniter\Model;

class prodiModel extends Model
{
    protected $table = 'prodi';

    public function getProdi()
    {
        $builder = $this->db->table('prodi');
        return $builder->get();
    }

    public function insertProdi($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateProdi($data, $id)
    {
        return $this->db->table($this->table)->update($data, array('kode_prodi' => $id));
    }

    public function deleteProdi($id)
    {
        return $this->db->table($this->table)->delete(['kode_prodi' => $id]);
    }
}
