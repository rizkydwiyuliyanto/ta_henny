<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKerukunan extends Model
{
    public function AllDataKerukunan($id_tahun)
    {
        return $this->db->table('tbl_kerukunan')
            ->where('id_tahun', $id_tahun)
            ->get()->getResultArray();
    }

    public function DeleteKerukunan($data)
    {
        $this->db->table('tbl_kerukunan')
            ->where('id_kerukunan', $data['id_kerukunan'])
            ->delete($data);
    }

    public function InsertKerukunan($data)
    {
        $this->db->table('tbl_kerukunan')->insert($data);
    }

    public function InsertAnggota($data)
    {
        $this->db->table('tbl_anggota_kerukunan')->insert($data);
    }

    public function DeleteAnggota($data)
    {
        $this->db->table('tbl_anggota_kerukunan')
            ->where('id_anggota', $data['id_anggota'])
            ->delete($data);
    }
}
