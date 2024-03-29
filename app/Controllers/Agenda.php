<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAgenda;

class Agenda extends BaseController
{

    public function __construct()
    {
        $this->ModelAgenda = new ModelAgenda();
    }

    public function index()
    {
        $data = [
            'judul' => 'Kegiatan',
            'menu' => 'kegiatan',
            'submenu' => '',
            'page' => 'v_agenda',
            'agenda' => $this->ModelAgenda->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nama_kegiatan' => [
                'label' => 'Nama Kegiatan',
                'rules' => 'required|is_unique[tbl_agenda.nama_kegiatan]',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!',
                    'is_unique' => '{field} Ini sudah ada !!!'
                ]
            ],
            'isi_kegiatan' => [
                'label' => 'Isi Kegiatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!',
                ]
            ],
            'foto_kegiatan' => [
                'label' => 'Foto Kegiatan',
                'rules' => 'uploaded[foto_kegiatan]|max_size[foto_kegiatan, 1024]|mime_in[foto_kegiatan,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Wajib Di Isi !!!',
                    'max_size' => '{field} Max 1024 Kb !!!',
                    'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG !!!'
                ]
            ],
        ])) {
            // mengambil foto dari form input
            $foto = $this->request->getFile('foto_kegiatan');
            // merename nama file foto
            $nama_file = $foto->getRandomName();
            // jika valid
            $data = [
                'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
                'slug_kegiatan' => url_title($this->request->getPost('nama_kegiatan'), '-', true),
                'isi_kegiatan' => $this->request->getPost('isi_kegiatan'),
                'tanggal' => $this->request->getPost('tanggal'),
                'jam' => $this->request->getPost('jam'),
                'tempat_kegiatan' => $this->request->getPost('tempat_kegiatan'),
                'foto_kegiatan' => $nama_file,
            ];
            // memindahkan file foto dari form input ke folder foto di directory
            $foto->move('fotokegiatan', $nama_file);

            $this->ModelAgenda->InsertData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
            return redirect()->to(base_url('Agenda'));
        } else {
            // jika tidak valid
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
            return redirect()->to(base_url('Agenda'));
        }
    }

    public function UpdateData($id_agenda)
    {
        if ($this->validate([
            'foto_kegiatan' => [
                'label' => 'Foto Dosen',
                'rules' => 'uploaded[foto_kegiatan]|max_size[foto_kegiatan, 1024]|mime_in[foto_kegiatan,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Wajib Di Isi !!!',
                    'max_size' => '{field} Max 1024 Kb !!!',
                    'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG !!!'
                ]
            ],
        ])) {
            // mengambil foto dari form input
            $foto = $this->request->getFile('foto_kegiatan');
            if ($foto->getError() == 4) {

                // jika foto tidak diganti
                $data = array(
                    'id_agenda' => $id_agenda,
                    'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
                    'slug_kegiatan' => url_title($this->request->getPost('nama_kegiatan'), '-', true),
                    'isi_kegiatan' => $this->request->getPost('isi_kegiatan'),
                    'tanggal' => $this->request->getPost('tanggal'),
                    'jam' => $this->request->getPost('jam'),
                    'tempat_kegiatan' => $this->request->getPost('tempat_kegiatan'),
                );
                $this->ModelAgenda->UpdateData($data);
            } else {
                // menghapus foto lama
                $kegiatan = $this->ModelAgenda->detailData($id_agenda);
                if ($kegiatan['foto_kegiatan'] != "") {
                    unlink('fotokegiatan/' . $kegiatan['foto_kegiatan']);
                }
                // merename nama file foto
                $nama_file = $foto->getRandomName();
                // jika valid
                $data = array(
                    'id_agenda' => $id_agenda,
                    'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
                    'slug_kegiatan' => url_title($this->request->getPost('nama_kegiatan'), '-', true),
                    'isi_kegiatan' => $this->request->getPost('isi_kegiatan'),
                    'tanggal' => $this->request->getPost('tanggal'),
                    'jam' => $this->request->getPost('jam'),
                    'tempat_kegiatan' => $this->request->getPost('tempat_kegiatan'),
                    'foto_kegiatan' => $nama_file,
                );
                // memindahkan file foto dari form input ke folder foto di directory
                $foto->move('fotokegiatan', $nama_file);
                $this->ModelAgenda->UpdateData($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
            return redirect()->to(base_url('Agenda'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Agenda'));
        }
    }

    public function DeleteData($id_agenda)
    {
        // menghapus foto lama
        $agenda = $this->ModelAgenda->detailData($id_agenda);
        if ($agenda['foto_kegiatan'] != "") {
            unlink('fotokegiatan/' . $agenda['foto_kegiatan']);
        }

        $data = [
            'id_agenda' => $id_agenda,
        ];
        $this->ModelAgenda->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('Agenda'));
    }
}
