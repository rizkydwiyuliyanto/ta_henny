<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKasIbadah extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_kas_ibadah')
            ->get()->getResultArray();
    }

    public function AllDataKasMasuk()
    {
        return $this->db->table('tbl_kas_ibadah')
            ->where('status', 'Masuk')
            ->get()->getResultArray();
    }

    public function AllDataKasKeluar()
    {
        return $this->db->table('tbl_kas_ibadah')
            ->where('status', 'Keluar')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_kas_ibadah')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_kas_ibadah')
            ->where('id_kas_ibadah', $data['id_kas_ibadah'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_kas_ibadah')
            ->where('id_kas_ibadah', $data['id_kas_ibadah'])
            ->delete($data);
    }


    public function AllDataBulanan($bulan, $tahun)
    {
        return $this->db->table('tbl_kas_ibadah')
            ->where('month(tanggal)', $bulan)
            ->where('year(tanggal)', $tahun)
            ->get()->getResultArray();
    }
}
