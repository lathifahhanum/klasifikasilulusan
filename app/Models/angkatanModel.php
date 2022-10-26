<?php

namespace App\Models;

use CodeIgniter\Model;

class angkatanModel extends Model
{
    protected $table = 'angkatan';

    public function getAngkatan()
    {
        $builder = $this->db->table('angkatan');
        return $builder->get();
    }

    public function insertAngkatan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateAngkatan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_angkatan' => $id]);
    }

    public function deleteAngkatan($id)
    {
        return $this->db->table($this->table)->delete(['id_angkatan' => $id]);
    }
}
