<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelIbadah extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_ibadah')
            ->get()->getResultArray();
    }

    public function detailData($id_ibadah)
    {
        return $this->db->table('tbl_ibadah')
            ->where('id_ibadah', $id_ibadah)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_ibadah')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_ibadah')
            ->where('id_ibadah', $data['id_ibadah'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_ibadah')
            ->where('id_ibadah', $data['id_ibadah'])
            ->delete($data);
    }
}
