<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKasIkt;
use App\Models\ModelAdmin;

class KasIkt extends BaseController
{

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasIkt = new ModelKasIkt;
    }

    public function index()
    {
        $data = [
            'judul' => 'Rekap Kas Rumah Tongkonan',
            'subjudul' => '',
            'menu' => 'kas-ikt',
            'submenu' => 'rekap-kas',
            'page' => 'kas-ikt/v_rekap_kas_ikt',
            'kas' => $this->ModelKasIkt->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasMasuk()
    {
        $data = [
            'judul' => 'Kas Masuk Rumah Tongkonan',
            'subjudul' => '',
            'menu' => 'kas-ikt',
            'submenu' => 'kas-masuk',
            'page' => 'kas-ikt/v_kas_ikt_masuk',
            'kas' => $this->ModelKasIkt->AllDataKasMasuk(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasKeluar()
    {
        $data = [
            'judul' => 'Kas Keluar Rumah Tongkonan',
            'subjudul' => '',
            'menu' => 'kas-ikt',
            'submenu' => 'kas-keluar',
            'page' => 'kas-ikt/v_kas_ikt_keluar',
            'kas' => $this->ModelKasIkt->AllDataKasKeluar(),
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
        $this->ModelKasIkt->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('KasIkt/KasMasuk'));
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
        $this->ModelKasIkt->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('KasIkt/KasKeluar'));
    }

    public function UpdateKasMasuk($id_kas_ikt)
    {
        $data = [
            'id_kas_ikt' => $id_kas_ikt,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
        ];
        $this->ModelKasIkt->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('KasIkt/KasMasuk'));
    }

    public function UpdateKasKeluar($id_kas_ikt)
    {
        $data = [
            'id_kas_ikt' => $id_kas_ikt,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_keluar' => $this->request->getPost('kas_keluar'),
        ];
        $this->ModelKasIkt->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('KasIkt/KasKeluar'));
    }

    public function DeleteKasMasuk($id_kas_ikt)
    {
        $data = [
            'id_kas_ikt' => $id_kas_ikt,
        ];
        $this->ModelKasIkt->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('KasIkt/KasMasuk'));
    }

    public function DeleteKasKeluar($id_kas_ikt)
    {
        $data = [
            'id_kas_ikt' => $id_kas_ikt,
        ];
        $this->ModelKasIkt->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('KasIkt/KasKeluar'));
    }

    public function Laporan()
    {
        $data = [
            'judul' => 'Laporan Kas Rumah Tongkonan',
            'menu' => 'laporan-kas',
            'submenu' => 'laporan-kas-ikt',
            'page' => 'kas-ikt/v_laporan_kas_ikt',
            'ikt' => $this->ModelAdmin->ViewSetting(),
        ];
        return view('v_template_admin', $data);
    }

    public function ViewLaporan()
    {

        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'kas' => $this->ModelKasIkt->AllDataBulanan($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('kas-ikt/v_data_laporan', $data),
        ];

        echo json_encode($response);
    }
}
