<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;
use App\Models\ModelKasIkt;
use App\Models\ModelKasIbadah;

class Bendahara extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasIkt = new ModelKasIkt();
        $this->ModelKasIbadah = new ModelKasIbadah();
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
        ];
        return view('v_template_admin', $data);
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
