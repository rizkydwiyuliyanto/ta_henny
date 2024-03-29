<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKerukunan;
use App\Models\TahunModel;


class DataKerukunan extends BaseController
{

    public function __construct()
    {
        $this->ModelKerukunan = new ModelKerukunan;
        $this->TahunModel = new TahunModel;
    }

    public function index()
    {
        $data = [
            'judul' => 'Kerukunan IKT',
            'menu' => 'data-kerukunan',
            'submenu' => 'anggota-kerukunan',
            'page' => 'kerukunan/v_kerukunan',
            'thn' => $this->TahunModel->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AnggotaKerukunan($id_tahun)
    {
        $thn = $this->TahunModel->DetailData($id_tahun);
        $data = [
            'judul' => 'Anggota Kerukunan Tahun ' . $thn['tahun'],
            'menu' => 'data-kerukunan',
            'submenu' => 'anggota-kerukunan',
            'page' => 'kerukunan/v_anggota_kerukunan',
            'thn' => $thn,
            'kerukunan' => $this->ModelKerukunan->AllDataKerukunan($id_tahun),
        ];
        return view('v_template_admin', $data);
    }

    public function DeleteKerukunan($id_tahun, $id_kerukunan)
    {
        $data = [
            'id_kerukunan' => $id_kerukunan,
        ];
        $this->ModelKerukunan->DeleteKerukunan($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('DataKerukunan/AnggotaKerukunan/' . $id_tahun));
    }

    public function InsertKerukunan()
    {
        $id_tahun =  $this->request->getPost('id_tahun');
        $data = [
            'id_tahun' => $id_tahun,
            'nama_kerukunan' => $this->request->getPost('nama_kerukunan'),
        ];
        $this->ModelKerukunan->InsertKerukunan($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('DataKerukunan/AnggotaKerukunan/' . $id_tahun));
    }

    public function InsertAnggota()
    {
        $id_tahun =  $this->request->getPost('id_tahun');
        $id_kerukunan =  $this->request->getPost('id_kerukunan');
        $data = [
            'id_kerukunan' => $id_kerukunan,
            'nama_anggota' => $this->request->getPost('nama_anggota'),
            'jabatan' => $this->request->getPost('jabatan'),
        ];
        $this->ModelKerukunan->InsertAnggota($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('DataKerukunan/AnggotaKerukunan/' . $id_tahun));
    }

    public function DeleteAnggota($id_tahun, $id_anggota)
    {
        $data = [
            'id_anggota' => $id_anggota,
        ];
        $this->ModelKerukunan->DeleteAnggota($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('DataKerukunan/AnggotaKerukunan/' . $id_tahun));
    }
}
