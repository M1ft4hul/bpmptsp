<?php

namespace App\Controllers;

use App\Models\AduanModel;
use App\Models\BeritaModel;
use App\Models\CategoryModel;
use App\Models\GalleryModel;
use App\Models\MenuModel;

class Home extends BaseController
{
    public function __construct()
    {
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
            'image' => [
                'rules' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
                'errors' => [
                    'uploaded' => 'Gambar wajib diunggah',
                    'max_size' => 'Ukuran gambar maksimum adalah 1MB',
                    'is_image' => 'File harus berupa gambar'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal wajib diisi'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Hp/Wa wajib diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email wajib diisi'
                ]
            ],
            'nama_pengadu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pengadu wajib diisi'
                ]
            ],
            'isian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isian wajib diisi'
                ]
            ],
            'alamat_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Lengkap wajib diisi'
                ]
            ],
            'subjek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'subjek wajib diisi'
                ]
            ],
        ])) {
            $data = [
                'nama_pengadu' => $this->request->getPost('nama_pengadu'),
                'subjek' => $this->request->getPost('subjek'),
                'email' => $this->request->getPost('email'),
                'telp' => $this->request->getPost('telp'),
                'tanggal' => $this->request->getPost('tanggal'),
                'isian' => $this->request->getPost('isian'),
                'alamat_lengkap' => $this->request->getPost('alamat_lengkap'),
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
}
