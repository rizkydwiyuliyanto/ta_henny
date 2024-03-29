<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKasIbadah;
use App\Models\ModelAdmin;

class KasIbadah extends BaseController
{

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasIbadah = new ModelKasIbadah;
    }

    public function index()
    {
        $data = [
            'judul' => 'Rekap Kas Ikt',
            'subjudul' => '',
            'menu' => 'kas-ibadah',
            'submenu' => 'rekap-kas',
            'page' => 'kas-ibadah/v_rekap_kas_ikt',
            'kas' => $this->ModelKasIbadah->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasMasuk()
    {
        $data = [
            'judul' => 'Kas Ikt Masuk',
            'subjudul' => '',
            'menu' => 'kas-ibadah',
            'submenu' => 'kas-masuk',
            'page' => 'kas-ibadah/v_kas_ikt_masuk',
            'kas' => $this->ModelKasIbadah->AllDataKasMasuk(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasKeluar()
    {
        $data = [
            'judul' => 'Kas Ikt Keluar',
            'subjudul' => '',
            'menu' => 'kas-ibadah',
            'submenu' => 'kas-keluar',
            'page' => 'kas-ibadah/v_kas_ikt_keluar',
            'kas' => $this->ModelKasIbadah->AllDataKasKeluar(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertKasMasuk()
    {
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
            'kas_keluar' => 0,
            'status' => 'Masuk',
        ];
        $this->ModelKasIbadah->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('KasIbadah/KasMasuk'));
    }

    public function InsertKasKeluar()
    {
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => 0,
            'kas_keluar' => $this->request->getPost('kas_keluar'),
            'status' => 'Keluar',
        ];
        $this->ModelKasIbadah->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('KasIbadah/KasKeluar'));
    }

    public function UpdateKasMasuk($id_kas_ibadah)
    {
        $data = [
            'id_kas_ibadah' => $id_kas_ibadah,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
        ];
        $this->ModelKasIbadah->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('KasIbadah/KasMasuk'));
    }

    public function UpdateKasKeluar($id_kas_ibadah)
    {
        $data = [
            'id_kas_ibadah' => $id_kas_ibadah,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_keluar' => $this->request->getPost('kas_keluar'),
        ];
        $this->ModelKasIbadah->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('KasIbadah/KasKeluar'));
    }

    public function DeleteKasMasuk($id_kas_ibadah)
    {
        $data = [
            'id_kas_ibadah' => $id_kas_ibadah,
        ];
        $this->ModelKasIbadah->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('KasIbadah/KasMasuk'));
    }

    public function DeleteKasKeluar($id_kas_ibadah)
    {
        $data = [
            'id_kas_ibadah' => $id_kas_ibadah,
        ];
        $this->ModelKasIbadah->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('KasIbadah/KasKeluar'));
    }

    public function Laporan()
    {
        $data = [
            'judul' => 'Laporan Kas Ikt',
            'menu' => 'laporan-kas',
            'submenu' => 'laporan-kas-ibadah',
            'page' => 'kas-ibadah/v_laporan_kas_ikt',
            'ikt' => $this->ModelAdmin->ViewSetting(),
        ];
        return view('v_template_admin', $data);
    }

    public function ViewLaporan()
    {

        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'kas' => $this->ModelKasIbadah->AllDataBulanan($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('kas-ibadah/v_data_laporan', $data),
        ];

        echo json_encode($response);
    }
}
