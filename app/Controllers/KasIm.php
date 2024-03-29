<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKasIm;
use App\Models\ModelAdmin;

class KasIm extends BaseController
{

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasIm = new ModelKasIm;
    }

    public function index()
    {
        $data = [
            'judul' => 'Rekap Kas Ibadah Mingguan',
            'subjudul' => '',
            'menu' => 'kas-im',
            'submenu' => 'rekap-kas',
            'page' => 'kas-im/v_rekap_kas_im',
            'kas' => $this->ModelKasIm->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasMasuk()
    {
        $data = [
            'judul' => 'Kas Masuk Ibadah Mingguan ',
            'subjudul' => '',
            'menu' => 'kas-im',
            'submenu' => 'kas-masuk',
            'page' => 'kas-im/v_kas_im_masuk',
            'kas' => $this->ModelKasIm->AllDataKasMasuk(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasKeluar()
    {
        $data = [
            'judul' => 'Kas Keluar Ibadah Mingguan',
            'subjudul' => '',
            'menu' => 'kas-im',
            'submenu' => 'kas-keluar',
            'page' => 'kas-im/v_kas_im_keluar',
            'kas' => $this->ModelKasIm->AllDataKasKeluar(),
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
        $this->ModelKasIm->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('KasIm/KasMasuk'));
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
        $this->ModelKasIm->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('KasIm/KasKeluar'));
    }

    public function UpdateKasMasuk($id_kas_im)
    {
        $data = [
            'id_kas_im' => $id_kas_im,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
        ];
        $this->ModelKasIm->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('KasIm/KasMasuk'));
    }

    public function UpdateKasKeluar($id_kas_im)
    {
        $data = [
            'id_kas_im' => $id_kas_im,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_keluar' => $this->request->getPost('kas_keluar'),
        ];
        $this->ModelKasIm->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('KasIm/KasKeluar'));
    }

    public function DeleteKasMasuk($id_kas_im)
    {
        $data = [
            'id_kas_im' => $id_kas_im,
        ];
        $this->ModelKasIm->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('KasIm/KasMasuk'));
    }

    public function DeleteKasKeluar($id_kas_im)
    {
        $data = [
            'id_kas_im' => $id_kas_im,
        ];
        $this->ModelKasIm->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('KasIm/KasKeluar'));
    }

    public function Laporan()
    {
        $data = [
            'judul' => 'Laporan Kas Ibadah Mingguan',
            'menu' => 'laporan-kas',
            'submenu' => 'laporan-kas-im',
            'page' => 'kas-im/v_laporan_kas_im',
            'ikt' => $this->ModelAdmin->ViewSetting(),
        ];
        return view('v_template_admin', $data);
    }

    public function ViewLaporan()
    {

        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'kas' => $this->ModelKasIm->AllDataBulanan($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('kas-im/v_data_laporan', $data),
        ];

        echo json_encode($response);
    }
}
