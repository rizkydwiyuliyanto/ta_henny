<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHome extends Model
{
    // Start Agenda
    public function Agenda()
    {
        return $this->db->table('tbl_agenda')
            ->where('month(tanggal)', date('m'))
            ->where('year(tanggal)', date('Y'))
            ->orderBy('tanggal', 'ASC')
            ->get()->getResultArray();
    }

    public function AllDataLimit()
    {
        return $this->db->table('tbl_agenda')
            ->limit(10)
            ->orderBy('id_agenda', 'ASC')
            ->get()->getResultArray();
    }

    public function ViewAgenda($slug_kegiatan)
    {
        return $this->db->table('tbl_agenda')
            ->where('slug_kegiatan', $slug_kegiatan)
            ->get()->getRowArray();
    }

    // End Agenda


    // Start Ibadah
    public function Ibadah()
    {
        return $this->db->table('tbl_ibadah')
            ->where('month(tanggal)', date('m'))
            ->where('year(tanggal)', date('Y'))
            ->orderBy('tanggal', 'ASC')
            ->get()->getResultArray();
    }

    public function AllDataLimitIbadah()
    {
        return $this->db->table('tbl_ibadah')
            ->limit(10)
            ->orderBy('id_ibadah', 'ASC')
            ->get()->getResultArray();
    }

    public function ViewIbadah($slug_ibadah)
    {
        return $this->db->table('tbl_ibadah')
            ->where('slug_ibadah', $slug_ibadah)
            ->get()->getRowArray();
    }
    // End Ibadah

    public function AllDataKerukunan()
    {
        return $this->db->table('tbl_kerukunan')
            ->join('tahun_tbl', 'tahun_tbl.id_tahun = tbl_kerukunan.id_tahun', 'left')
            ->where('tahun', date('Y'))
            ->get()->getResultArray();
    }

    public function AllDataWilayah()
    {
        return $this->db->table('tbl_wilayah')
            ->join('tahun_tbl', 'tahun_tbl.id_tahun = tbl_wilayah.id_tahun', 'left')
            ->where('tahun', date('Y'))
            ->get()->getResultArray();
    }

    public function AllDataKasIkt()
    {
        return $this->db->table('tbl_kas_ikt')
            ->where('month(tanggal)', date('m'))
            ->where('year(tanggal)', date('Y'))
            ->get()->getResultArray();
    }

    public function InsertDonasi($data)
    {
        $this->db->table('tbl_donasi')->insert($data);
    }
    public function InsertDonasi2($data)
    {
        $this->db->table('tbl_donasi2')->insert($data);
    }
}
