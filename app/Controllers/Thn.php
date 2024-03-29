<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TahunModel;

class Thn extends BaseController
{

    public function __construct()
    {
        $this->TahunModel = new TahunModel;
    }

    public function index()
    {
        $data = [
            'judul' => 'Tahun',
            'menu' => 'thn',
            'submenu' => 'thn',
            'page' => 'kerukunan/v_thn',
            'thn' => $this->TahunModel->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData()
    {
        $data = [
            'tahun' => $this->request->getPost('tahun'),
        ];
        $this->TahunModel->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('Thn'));
    }

    public function UpdateData($id_tahun)
    {
        $data = [
            'id_tahun' => $id_tahun,
            'tahun' => $this->request->getPost('tahun'),
        ];
        $this->TahunModel->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('Thn'));
    }

    public function DeleteData($id_tahun)
    {
        $data = [
            'id_tahun' => $id_tahun,
        ];
        $this->TahunModel->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('Thn'));
    }
}
