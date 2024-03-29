<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunModel extends Model
{
    public function AllData()
    {
        return $this->db->table('tahun_tbl')
            ->get()->getResultArray();
    }

    public function DetailData($id_tahun)
    {
        return $this->db->table('tahun_tbl')
            ->where('id_tahun', $id_tahun)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tahun_tbl')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tahun_tbl')
            ->where('id_tahun', $data['id_tahun'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tahun_tbl')
            ->where('id_tahun', $data['id_tahun'])
            ->delete($data);
    }
}
