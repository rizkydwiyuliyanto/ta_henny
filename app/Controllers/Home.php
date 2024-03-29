<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelHome;
use App\Models\ModelKasIkt;
use App\Models\ModelRekening;

$pager = \Config\Services::pager();

class Home extends BaseController
{
    private $ModelHome;
    private $ModelAdmin;
    private $ModelKasIkt;
    private $ModelRekening;

    public function __construct()
    {
        $this->ModelHome = new ModelHome();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasIkt = new ModelKasIkt();
        $this->ModelRekening = new ModelRekening();
    }

    public function index()
    {
        $setting = $this->ModelAdmin->ViewSetting();

        $url = 'https://api.myquran.com/v1/sholat/jadwal/' . $setting['id_kota'] . '/' . date('Y') . '/' . date('m') . '/' . date('d');
        // $waktu = json_decode(file_get_contents($url), true);

        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            // 'waktu' => $waktu,
            'agenda' => $this->ModelHome->Agenda(),
            'ibadah' => $this->ModelHome->Ibadah(),
            'kas_i' => $this->ModelKasIkt->AllData(),
            'kerukunan' => $this->ModelHome->AllDataKerukunan(),
            'wilayah' => $this->ModelHome->AllDataWilayah(),
        ];

        return view('v_template', $data);
    }

    // Start Agenda
    public function Agenda()
    {
        $data = [
            'judul' => 'Agenda',
            'page' => 'front-end/v_agenda',
            'agenda' => $this->ModelHome->Agenda(),
        ];

        return view('v_template', $data);
    }

    public function ViewAgenda($slug_kegiatan)
    {
        $data = [
            'judul' => 'Detail Kegiatan',
            'page' => 'v_detail_agenda',
            'agenda' => $this->ModelHome->ViewAgenda($slug_kegiatan),
            'agendabaru' => $this->ModelHome->AllDataLimit(),
        ];

        return view('v_template', $data);
    }

    // Start Ibadah

    public function Ibadah()
    {
        $data = [
            'judul' => 'Ibadah',
            'page' => 'front-end/v_ibadah',
            'ibadah' => $this->ModelHome->Ibadah(),
        ];

        return view('v_template', $data);
    }

    public function ViewIbadah($slug_ibadah)
    {
        $data = [
            'judul' => 'Detail Ibadah',
            'page' => 'v_detail_ibadah',
            'ibadah' => $this->ModelHome->ViewIbadah($slug_ibadah),
            'ibadahbaru' => $this->ModelHome->AllDataLimitIbadah(),
        ];

        return view('v_template', $data);
    }

    public function Kerukunan()
    {
        $y = date('Y');
        $m = $y - 579;

        $data = [
            'judul' => 'Data Kerukunan Tahun ' . $m . 'H / ' . date('Y') . 'M',
            'page' => 'front-end/v_anggota_kerukunan',
            'kerukunan' => $this->ModelHome->AllDataKerukunan(),
        ];

        return view('v_template', $data);
    }

    public function Wilayah()
    {
        $y = date('Y');
        $m = $y - 579;

        $data = [
            'judul' => 'Data Wilayah Tahun ' . $m . 'H / ' . date('Y') . 'M',
            'page' => 'front-end/v_anggota_wilayah',
            'wilayah' => $this->ModelHome->AllDataWilayah(),
        ];

        return view('v_template', $data);
    }

    public function RekapKasIkt()
    {
        $data = [
            'judul' => 'Rekap Kas Ikt',
            'page' => 'front-end/v_rekap_kas',
            'kas' => $this->ModelHome->AllDataKasIkt(),
        ];

        return view('v_template', $data);
    }

    public function Donasi()
    {
        $data = [
            'judul' => 'Donasi',
            'page' => 'front-end/v_donasi',
            'rek' => $this->ModelRekening->AllData(),
            'validation' => \Config\Services::validation(),
        ];

        return view('v_template', $data);
    }

    public function KirimDonasi()
    {
        if ($this->validate([
            'bukti' => [
                'label' => 'Bukti Transfer',
                'rules' => 'uploaded[bukti]|max_size[bukti,1500]|mime_in[bukti,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Belum Di Pilih !',
                    'max_size' => '{field} Max 1500 KB !',
                    'mime_in' => 'Format {field} Wajib JPG, PNG JPEG',
                ],
            ],
        ])) {
            $bukti = $this->request->getFile('bukti');
            $nama_file = $bukti->getRandomName();
            $data = [
                'id_rekening' => $this->request->getPost('id_rekening'),
                'nama_bank' => $this->request->getPost('nama_bank'),
                'no_rek' => $this->request->getPost('no_rek'),
                'nama_pengirim' => $this->request->getPost('nama_pengirim'),
                'jumlah' => $this->request->getPost('jumlah'),
                'jenis_donasi' => $this->request->getPost('jenis_donasi'),
                'bukti' => $nama_file,
                'tgl' => date('Y-m-d'),
            ];
            $bukti->move('bukti', $nama_file);
            $this->ModelHome->InsertDonasi($data);
            session()->setFlashdata('pesan', 'Terima Kasih ! Bukti Transaksi Sudah Dikirim !!!');

            return redirect()->to(base_url('Home/Donasi'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());

            return redirect()->to(base_url('Home/Donasi'))->withInput('validation', \Config\Services::validation());
        }
    }
    public function KirimDonasi2()
    {
        $data = array(
            "nama_pengirim" => $this->request->getPost("nama_pengirim"),
            "no_telp" => $this->request->getPost("no_telp"),
            "jenis_donasi" => $this->request->getPost("jenis_donasi"),
            "jumlah_donasi" => $this->request->getPost("jumlah")
        );
        session()->setFlashdata('pesan', 'Terima Kasih ! Bukti Transaksi Sudah Dikirim !!!');
        $this->ModelHome->InsertDonasi2($data);
        $this->response->setStatusCode(200);
    }
}
