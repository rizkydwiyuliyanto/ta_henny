<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWilayah extends Model
{
    public function AllDataWilayah($id_tahun)
    {
        return $this->db->table('tbl_wilayah')
            ->where('id_tahun', $id_tahun)
            ->get()->getResultArray();
    }

    public function DeleteWilayah($data)
    {
        $this->db->table('tbl_wilayah')
            ->where('id_wilayah', $data['id_wilayah'])
            ->delete($data);
    }

    public function InsertWilayah($data)
    {
        $this->db->table('tbl_wilayah')->insert($data);
    }

    public function InsertAnggota($data)
    {
        $this->db->table('tbl_anggota_wilayah')->insert($data);
    }

    public function DeleteAnggota($data)
    {
        $this->db->table('tbl_anggota_wilayah')
            ->where('id_anggota', $data['id_anggota'])
            ->delete($data);
    }
}
