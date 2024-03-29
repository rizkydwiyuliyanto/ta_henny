<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelKasIbadah;
use App\Models\ModelKasIkt;
use App\Models\ModelKasIm;

class Admin extends BaseController
{
    private $ModelAdmin;
    private $ModelKasIkt;
    private $ModelKasIbadah;
    private $ModelKasIm;

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasIkt = new ModelKasIkt();
        $this->ModelKasIbadah = new ModelKasIbadah();
        $this->ModelKasIm = new ModelKasIm();
    }

    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'menu' => 'dashboard',
            'submenu' => '',
            'page' => 'v_dashboard',
            'kas_i' => $this->ModelKasIkt->AllData(),
            'kas_s' => $this->ModelKasIbadah->AllData(),
            'kasikt' => $this->ModelAdmin->AllDataKasIkt(),
            'kasibadah' => $this->ModelAdmin->AllDataKasIbadah(),
            'kasim' => $this->ModelAdmin->AllDataKasIm(),
        ];

        return view('v_template_admin', $data);
    }

    public function Setting()
    {
        $url = 'https://api.myquran.com/v1/sholat/kota/semua';
        $kota = json_decode(file_get_contents($url), true);
        $data = [
            'judul' => 'Setting',
            'menu' => 'setting',
            'submenu' => '',
            'page' => 'v_setting',
            'setting' => $this->ModelAdmin->ViewSetting(),
            'kota' => $kota,
        ];

        return view('v_template_admin', $data);
    }

    public function UpdateSetting()
    {
        $data = [
            'id' => 1,
            'nama_masjid' => $this->request->getPost('nama_masjid'),
            'id_kota' => $this->request->getPost('id_kota'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'no_telpon' => $this->request->getPost('no_telpon'),
        ];
        $this->ModelAdmin->UpdateSetting($data);
        session()->setFlashdata('pesan', 'Setting Berhasil Diupdate !!');

        return redirect()->to(base_url('Admin/Setting'));
    }

    public function DonasiMasuk()
    {
        $data = [
            'judul' => 'Donasi Masuk',
            'menu' => 'donasi',
            'submenu' => '',
            'page' => 'v_donasi_masuk',
            'donasi' => $this->ModelAdmin->AllDonasi(),
        ];

        return view('v_template_admin', $data);
    }
}
