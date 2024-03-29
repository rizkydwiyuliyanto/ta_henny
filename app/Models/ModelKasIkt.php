<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKasIkt extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_kas_ikt')
            ->get()->getResultArray();
    }

    public function AllDataKasMasuk()
    {
        return $this->db->table('tbl_kas_ikt')
            ->where('status', 'Masuk')
            ->get()->getResultArray();
    }

    public function AllDataKasKeluar()
    {
        return $this->db->table('tbl_kas_ikt')
            ->where('status', 'Keluar')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_kas_ikt')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_kas_ikt')
            ->where('id_kas_ikt', $data['id_kas_ikt'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_kas_ikt')
            ->where('id_kas_ikt', $data['id_kas_ikt'])
            ->delete($data);
    }


    public function AllDataBulanan($bulan, $tahun)
    {
        return $this->db->table('tbl_kas_ikt')
            ->where('month(tanggal)', $bulan)
            ->where('year(tanggal)', $tahun)
            ->get()->getResultArray();
    }
}
