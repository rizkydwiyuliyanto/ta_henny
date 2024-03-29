<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelIbadah;

class Ibadah extends BaseController
{

    public function __construct()
    {
        $this->ModelIbadah = new ModelIbadah();
    }

    public function index()
    {
        $data = [
            'judul' => 'Ibadah',
            'menu' => 'ibadah',
            'submenu' => '',
            'page' => 'v_ibadah',
            'ibadah' => $this->ModelIbadah->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nama_ibadah' => [
                'label' => 'Nama Ibadah',
                'rules' => 'required|is_unique[tbl_ibadah.nama_ibadah]',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!',
                    'is_unique' => '{field} Ini sudah ada !!!'
                ]
            ],
            'isi_ibadah' => [
                'label' => 'Isi Ibadah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!',
                ]
            ],
            'foto_ibadah' => [
                'label' => 'Foto Ibadah',
                'rules' => 'uploaded[foto_ibadah]|max_size[foto_ibadah, 1024]|mime_in[foto_ibadah,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Wajib Di Isi !!!',
                    'max_size' => '{field} Max 1024 Kb !!!',
                    'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG !!!'
                ]
            ],
        ])) {
            // mengambil foto dari form input
            $foto = $this->request->getFile('foto_ibadah');
            // merename nama file foto
            $nama_file = $foto->getRandomName();
            // jika valid
            $data = [
                'nama_ibadah' => $this->request->getPost('nama_ibadah'),
                'slug_ibadah' => url_title($this->request->getPost('nama_ibadah'), '-', true),
                'isi_ibadah' => $this->request->getPost('isi_ibadah'),
                'tanggal' => $this->request->getPost('tanggal'),
                'jam' => $this->request->getPost('jam'),
                'tempat_ibadah' => $this->request->getPost('tempat_ibadah'),
                'pemimpin_ibadah' => $this->request->getPost('pemimpin_ibadah'),
                'foto_ibadah' => $nama_file,
            ];
            // memindahkan file foto dari form input ke folder foto di directory
            $foto->move('fotoibadah', $nama_file);

            $this->ModelIbadah->InsertData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
            return redirect()->to(base_url('Ibadah'));
        } else {
            // jika tidak valid
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
            return redirect()->to(base_url('Ibadah'));
        }
    }

    public function UpdateData($id_ibadah)
    {
        if ($this->validate([
            'foto_ibadah' => [
                'label' => 'Foto Dosen',
                'rules' => 'uploaded[foto_ibadah]|max_size[foto_ibadah, 1024]|mime_in[foto_ibadah,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Wajib Di Isi !!!',
                    'max_size' => '{field} Max 1024 Kb !!!',
                    'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG !!!'
                ]
            ],
        ])) {
            // mengambil foto dari form input
            $foto = $this->request->getFile('foto_ibadah');
            if ($foto->getError() == 4) {

                // jika foto tidak diganti
                $data = array(
                    'id_ibadah' => $id_ibadah,
                    'nama_ibadah' => $this->request->getPost('nama_ibadah'),
                    'slug_ibadah' => url_title($this->request->getPost('nama_ibadah'), '-', true),
                    'isi_ibadah' => $this->request->getPost('isi_ibadah'),
                    'tanggal' => $this->request->getPost('tanggal'),
                    'jam' => $this->request->getPost('jam'),
                    'tempat_ibadah' => $this->request->getPost('tempat_ibadah'),
                    'pemimpin_ibadah' => $this->request->getPost('pemimpin_ibadah'),
                );
                $this->ModelIbadah->UpdateData($data);
            } else {
                // menghapus foto lama
                $kegiatan = $this->ModelIbadah->detailData($id_ibadah);
                if ($kegiatan['foto_ibadah'] != "") {
                    unlink('fotoibadah/' . $kegiatan['foto_ibadah']);
                }
                // merename nama file foto
                $nama_file = $foto->getRandomName();
                // jika valid
                $data = array(
                    'id_ibadah' => $id_ibadah,
                    'nama_ibadah' => $this->request->getPost('nama_ibadah'),
                    'slug_ibadah' => url_title($this->request->getPost('nama_ibadah'), '-', true),
                    'isi_ibadah' => $this->request->getPost('isi_ibadah'),
                    'tanggal' => $this->request->getPost('tanggal'),
                    'jam' => $this->request->getPost('jam'),
                    'tempat_ibadah' => $this->request->getPost('tempat_ibadah'),
                    'pemimpin_ibadah' => $this->request->getPost('pemimpin_ibadah'),
                    'foto_ibadah' => $nama_file,
                );
                // memindahkan file foto dari form input ke folder foto di directory
                $foto->move('fotoibadah', $nama_file);
                $this->ModelIbadah->UpdateData($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
            return redirect()->to(base_url('Ibadah'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Ibadah'));
        }
    }

    public function DeleteData($id_ibadah)
    {
        // menghapus foto lama
        $ibadah = $this->ModelIbadah->detailData($id_ibadah);
        if ($ibadah['foto_ibadah'] != "") {
            unlink('fotoibadah/' . $ibadah['foto_ibadah']);
        }

        $data = [
            'id_ibadah' => $id_ibadah,
        ];
        $this->ModelIbadah->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('Ibadah'));
    }
}
