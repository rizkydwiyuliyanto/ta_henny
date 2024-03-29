<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelWilayah;
use App\Models\TahunModel;


class DataWilayah extends BaseController
{

    public function __construct()
    {
        $this->ModelWilayah = new ModelWilayah;
        $this->TahunModel = new TahunModel;
    }

    public function index()
    {
        $data = [
            'judul' => 'Wilayah IKT',
            'menu' => 'data-wilayah',
            'submenu' => 'anggota-wilayah',
            'page' => 'wilayah/v_wilayah',
            'thn' => $this->TahunModel->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AnggotaWilayah($id_tahun)
    {
        $thn = $this->TahunModel->DetailData($id_tahun);
        $data = [
            'judul' => 'Anggota Wilayah Tahun ' . $thn['tahun'],
            'menu' => 'data-wilayah',
            'submenu' => 'anggota-wilayah',
            'page' => 'wilayah/v_anggota_wilayah',
            'thn' => $thn,
            'wilayah' => $this->ModelWilayah->AllDataWilayah($id_tahun),
        ];
        return view('v_template_admin', $data);
    }

    public function DeleteWilayah($id_tahun, $id_wilayah)
    {
        $data = [
            'id_wilayah' => $id_wilayah,
        ];
        $this->ModelWilayah->DeleteWilayah($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('DataWilayah/AnggotaWilayah/' . $id_tahun));
    }

    public function InsertWilayah()
    {
        $id_tahun =  $this->request->getPost('id_tahun');
        $data = [
            'id_tahun' => $id_tahun,
            'nama_wilayah' => $this->request->getPost('nama_wilayah'),
        ];
        $this->ModelWilayah->InsertWilayah($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('DataWilayah/AnggotaWilayah/' . $id_tahun));
    }

    public function InsertAnggota()
    {
        $id_tahun =  $this->request->getPost('id_tahun');
        $id_wilayah =  $this->request->getPost('id_wilayah');
        $data = [
            'id_wilayah' => $id_wilayah,
            'nama_anggota' => $this->request->getPost('nama_anggota'),
            'jabatan' => $this->request->getPost('jabatan'),
        ];
        $this->ModelWilayah->InsertAnggota($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('DataWilayah/AnggotaWilayah/' . $id_tahun));
    }

    public function DeleteAnggota($id_tahun, $id_anggota)
    {
        $data = [
            'id_anggota' => $id_anggota,
        ];
        $this->ModelWilayah->DeleteAnggota($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('DataWilayah/AnggotaWilayah/' . $id_tahun));
    }
}
