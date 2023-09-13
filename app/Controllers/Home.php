<?php

namespace App\Controllers;

use App\Models\AduanModel;
use App\Models\BeritaModel;
use App\Models\BerkasModel;
use App\Models\CategoryModel;
use App\Models\GalleryModel;
use App\Models\KuesionerModel;
use App\Models\MenuModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->kuesionerModel = new KuesionerModel();
        $this->berkasModel = new BerkasModel();
        $this->galleryModel = new GalleryModel();
        $this->categoryModel = new CategoryModel();
        $this->beritaModel = new BeritaModel();
        $this->aduanModel = new AduanModel();
        $this->menuModel = new MenuModel();
    }

    public function index()
    {
        $berita = $this->beritaModel->join('categories', 'categories.id = berita.category_id')
            ->select('berita.*, categories.nama as nama_kategori')
            ->findAll();
        $pengaduan = $this->aduanModel->findAll();
        $data = [
            'pengaduan' => $pengaduan,
            'berita' => $berita,
        ];
        return view('home', $data);
    }

    // detail berita
    public function show_berita($slug)
    {
        $berita = $this->beritaModel->where('slug', $slug)->first();

        $beritaLainnya = $this->beritaModel->where('id !=', $berita['id'])->findAll();
        $bulan = date('M', strtotime($berita['tanggal']));
        $tanggal = date('d', strtotime($berita['tanggal']));

        $data = [
            'berita' => $berita,
            'bulan' => $bulan,
            'tanggal' => $tanggal,
            'beritaLainnya' => $beritaLainnya
        ];

        return view('isi_berita', $data);
    }

    // detail aduan
    public function show_aduan($slug)
    {
        $aduan = $this->aduanModel->where('slug', $slug)->first();
        $aduanLainnya = $this->aduanModel->where('id !=', $aduan['id'])->findAll();

        $data = [
            'aduan' => $aduan,
            'aduanLainnya' => $aduanLainnya
        ];

        return view('detail_aduan', $data);
    }


    // kirim aduan di web
    public function aduan()
    {
        $aduan = $this->aduanModel->findAll();
        $validation = \Config\Services::validation();
        $data = [
            'aduan' => $aduan,
            'validation' => $validation
        ];
        return view('isi_aduan', $data);
    }

    public function aduan_simpan()
    {
        if ($this->validate([
            'subjek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'subjek wajib diisi'
                ]
            ],
            'isian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isian wajib diisi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal wajib diisi'
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'lokasi wajib diisi'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kategori wajib diisi'
                ]
            ],
        ])) {
            $data = [
                'subjek' => $this->request->getPost('subjek'),
                'isian' => $this->request->getPost('isian'),
                'tanggal' => $this->request->getPost('tanggal'),
                'lokasi' => $this->request->getPost('lokasi'),
                'kategori' => $this->request->getPost('kategori'),
                'slug' => url_title($this->request->getPost('subjek'), '-', true)
            ];

            $image = $this->request->getFile('image');

            if ($image->isValid()) {
                $newName = $image->getRandomName();
                $image->move('gambar', $newName);

                $data['image'] = $newName;
            }

            $this->aduanModel->insert($data);

            session()->setFlashdata('pesan', 'Aduan anda sudah Terkirim.');
            return redirect()->to(base_url('/home'));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/aduan'))->withInput()->with('errors', $validation->getErrors());
        }
    }


    public function profil_sejarah()
    {
        return view('profil_sejarah');
    }

    public function profil_visimisi()
    {
        return view('profil_visimisi');
    }

    public function profil_organisasi()
    {
        return view('profil_organisasi');
    }

    public function profil_sambutan()
    {
        return view('profil_sambutan');
    }

    public function profil_pejabat()
    {
        return view('profil_pejabat');
    }

    public function peta_rencana()
    {
        return view('peta_rencana');
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function perizinan()
    {
        return view('perizinan');
    }

    public function berita()
    {
        $berita = $this->beritaModel->join('categories', 'categories.id = berita.category_id')
            ->select('berita.*, categories.nama as nama_kategori')
            ->paginate(3, 'berita');
        $data = [
            'berita' => $berita,
            'pager' => $this->beritaModel->pager,
        ];

        return view('berita', $data);
    }

    public function galeri()
    {
        $galleries = $this->galleryModel->join('categories', 'categories.id = gallery.category_id')
            ->select('gallery.*, categories.nama as nama_kategori')
            ->paginate(3, 'gallery');

        $data = [
            'galleries' => $galleries,
            'pager' => $this->galleryModel->pager,
        ];
        return view('galeri', $data);
    }

    public function kuesioner()
    {
        return view('kuesioner');
    }

    public function add_kuesioner()
    {
        if ($this->validate([
            'pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pendidikan harus di isi'
                ]
            ],
        ])) {
            $data = [
                // 'tgl_survei' => $this->request->getPost('tgl_survei'),
                // 'jam_survei' => $this->request->getPost('jam_survei'),
                'jk' => $this->request->getPost('jk'),
                'pendidikan' => $this->request->getPost('pendidikan'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'jenis_layanan' => $this->request->getPost('jenis_layanan'),
                'p1' => $this->request->getPost('p1'),
                'p2' => $this->request->getPost('p2'),
                'p3' => $this->request->getPost('p3'),
                'p4' => $this->request->getPost('p4'),
                'p5' => $this->request->getPost('p5'),
                'p6' => $this->request->getPost('p6'),
                'p7' => $this->request->getPost('p7'),
                'p8' => $this->request->getPost('p8'),
                'p9' => $this->request->getPost('p9'),
                'kritik_saran' => $this->request->getPost('kritik_saran'),
                // 'slug' => url_title($this->request->getPost('jenis_layanan'), '-', true),
            ];
            $this->kuesionerModel->insert($data);
            $id_kuesioner = $this->kuesionerModel->insertID();
            session()->setFlashdata('pesanku', 'Selesai!, Silahkan Isi Nama dan Nomor HP/WhatsApp');
            return redirect()->to(base_url('/progres_add_kuesioner/' . $id_kuesioner));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/web/kuesioner'))->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function halaman_baru($id_kuesioner)
    {
        $kuesioner = $this->kuesionerModel->find($id_kuesioner);
        $data = [
            'kuesioner' => $kuesioner
        ];
        return view('kuesioner_halaman', $data);
    }

    public function proses_nomor_wa()
    {
        $id_kuesioner = $this->request->getPost('id_kuesioner');
        if ($this->validate([
            'nama' => 'required',
            'wa' => 'required',
        ])) {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'wa' => $this->request->getPost('wa'),
            ];
            $this->kuesionerModel->update($id_kuesioner, $data);

            // Redirect atau tampilkan pesan sukses
            session()->setFlashdata('pesan', 'Kuesioner anda sudah Terkirim!...');
            return redirect()->to(base_url('/home'));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/halaman_baru/' . $id_kuesioner))->withInput()->with('errors', $validation->getErrors());
        }
    }


    public function sop()
    {
        $berkas = $this->berkasModel->findAll();
        $data = [
            'berkas' => $berkas,
        ];
        return view('sop', $data);
    }
}
