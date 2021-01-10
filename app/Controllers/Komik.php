<?php

namespace App\Controllers;

use App\Models\KomikModel;
use CodeIgniter\HTTP\Request;

class Komik extends BaseController
{
    protected $komikModel;

    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function index()
    {
        //$komik = $this->komikModel->findAll();

        $data = [
            'title' => 'Daftar Komik',
            'komik' => $this->komikModel->getKomik()
        ];

        // Cara Connect DB tanpa Model
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * From komik");
        // foreach ($komik->getResultArray() as $row) {
        //     d($row);
        // }

        // Cara Connect DB dgn Model
        //  Bisa pakai ini:
        // $komikModel = new \App\Models\KomikModel();
        //  Atau ini :
        // $komikModel = new KomikModel();

        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Comics',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        // Jika komik tidak ada di table
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik ' . $slug . 'Tidak Ditemukan');
        }

        return view('komik/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Komik',
            'validation' => \Config\Services::validation()
        ];

        return view('komik/create', $data);
    }

    public function save()
    {
        // Validasi Input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} Komik Harus di Isi.',
                    'is_unique' => '{field} Sudah Ada'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar Terlalu Besar',
                    'is_image' => 'Yang Anda Masukan Bukan File Gambar',
                    'mime_in' => 'Yang Anda Masukan Bukan File Gambar'
                ]
            ]
        ])) {
            // Menangkap pesan kesalahan
            // $validation = \Config\Services::validation();

            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/komik/create')->withInput();
        }

        // Ambil Gambar
        $fileSampul = $this->request->getFile('sampul');
        // Apakah tidak ada gambar yg di upload?
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // Generate Nama Sampul Random
            $namaSampul = $fileSampul->getRandomName();
            // Pindahkan File ke Folder img
            $fileSampul->move('img', $namaSampul);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');

        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        // Cari gambar bedasarkan id
        $komik = $this->komikModel->find($id);

        // Cek jika file gambarnya default.jpg
        if ($komik['sampul'] != 'default.jpg') {
            // Hapus File Gambar
            unlink('img/' . $komik['sampul']);
        }

        $this->komikModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil di Hapus!');

        return redirect()->to('/komik');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];

        return view('komik/edit', $data);
    }

    public function update($id)
    {
        // Cek Judul
        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.judul]';
        }

        // Validasi Data
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} Komik Harus di Isi.',
                    'is_unique' => '{field} Sudah Ada'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar Terlalu Besar',
                    'is_image' => 'Yang Anda Masukan Bukan File Gambar',
                    'mime_in' => 'Yang Anda Masukan Bukan File Gambar'
                ]
            ]
        ])) {

            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');

        // Cek Gambar, apakah tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // Generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            // Pindahkan Gambar
            $fileSampul->move('img', $namaSampul);
            // Hapus file Lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil di Ubah!');

        return redirect()->to('/komik');
    }
    //--------------------------------------------------------------------

}
