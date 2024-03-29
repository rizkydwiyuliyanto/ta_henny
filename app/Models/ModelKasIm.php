<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKasIm extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_kas_ibadah_mingguan')
            ->get()->getResultArray();
    }

    public function AllDataKasMasuk()
    {
        return $this->db->table('tbl_kas_ibadah_mingguan')
            ->where('status', 'Masuk')
            ->get()->getResultArray();
    }

    public function AllDataKasKeluar()
    {
        return $this->db->table('tbl_kas_ibadah_mingguan')
            ->where('status', 'Keluar')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_kas_ibadah_mingguan')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_kas_ibadah_mingguan')
            ->where('id_kas_im', $data['id_kas_im'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_kas_ibadah_mingguan')
            ->where('id_kas_im', $data['id_kas_im'])
            ->delete($data);
    }


    public function AllDataBulanan($bulan, $tahun)
    {
        return $this->db->table('tbl_kas_ibadah_mingguan')
            ->where('month(tanggal)', $bulan)
            ->where('year(tanggal)', $tahun)
            ->get()->getResultArray();
    }
}
