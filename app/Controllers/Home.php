<?php

namespace App\Controllers;

use App\Models\AduanModel;
use App\Models\BeritaModel;
use App\Models\BerkasModel;
use App\Models\CategoryModel;
use App\Models\GalleryModel;
use App\Models\JenisAduanModel;
use App\Models\JenisPerizinanModel;
use App\Models\MenuModel;
use App\Models\KuesionerModel;
use App\Models\PerizinanKesehatanModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->jenisPerizinanModel = new JenisPerizinanModel();
        $this->perizinanKesehatanModel = new PerizinanKesehatanModel();
        $this->jenisAduanModel = new JenisAduanModel();
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

        $pengaduan = $this->aduanModel->join('jenis_aduan', 'jenis_aduan.id_jenis = aduan.jenis_id')
            ->select('aduan.*, jenis_aduan.nama_aduan as nama_jenis_aduan')
            ->findAll();
        // $pengaduan = $this->aduanModel->findAll();
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
        $aduan = $this->aduanModel->join('jenis_aduan', 'jenis_aduan.id_jenis = aduan.jenis_id')
            ->select('aduan.*, jenis_aduan.nama_aduan as nama_jenis_aduan')
            ->where('slug', $slug)
            ->first();
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
        $jenis_aduan = $this->jenisAduanModel->findAll();
        $aduan = $this->aduanModel->findAll();
        $validation = \Config\Services::validation();
        $data = [
            'jenis_aduan' => $jenis_aduan,
            'aduan' => $aduan,
            'validation' => $validation
        ];
        return view('isi_aduan', $data);
    }

    public function aduan_simpan()
    {
        if ($this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama wajib diisi'
                ]
            ],
            'alamat_rumah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat rumah wajib diisi'
                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pekerjaan wajib diisi'
                ]
            ],
            'alamat_kantor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat kantor wajib diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'email wajib diisi'
                ]
            ],
            'ktp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ktp wajib diisi'
                ]
            ],
            'tlp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tlp wajib diisi'
                ]
            ],
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
            'tanggal_kejadian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal kejadian wajib diisi'
                ]
            ],
            'tujuan_pengaduan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tujuan pengaduan wajib diisi'
                ]
            ],
        ])) {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'jk' => $this->request->getPost('jk'),
                'alamat_rumah' => $this->request->getPost('alamat_rumah'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'alamat_kantor' => $this->request->getPost('alamat_kantor'),
                'email' => $this->request->getPost('email'),
                'ktp' => $this->request->getPost('ktp'),
                'tlp' => $this->request->getPost('tlp'),
                'jenis_id' => $this->request->getPost('jenis_id'),
                'subjek' => $this->request->getPost('subjek'),
                'lokasi' => $this->request->getPost('lokasi'),
                'isian' => $this->request->getPost('isian'),
                'tanggal_kejadian' => $this->request->getPost('tanggal_kejadian'),
                'tujuan_pengaduan' => $this->request->getPost('tujuan_pengaduan'),
                'slug' => url_title($this->request->getPost('subjek'), '-', true)
            ];

            // $image = $this->request->getFile('image');

            // if ($image->isValid()) {
            //     $newName = $image->getRandomName();
            //     $image->move('gambar', $newName);

            //     $data['image'] = $newName;
            // }

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

    public function izin($nama_formulir)
    {
        $formulirDir = APPPATH . 'Views/perizinan/';
        $formulirFile = $formulirDir . $nama_formulir;

        if (file_exists($formulirFile)) {
            return view('perizinan/' . $nama_formulir);
        } else {
            return view('perizinan/form_not_found');
        }
    }

    public function layanan_kesehatan()
    {
        $jenis_perizinan = $this->jenisPerizinanModel->findAll();
        $grouped_izin = [];

        foreach ($jenis_perizinan as $izin) {
            $sektor = $izin['nama_sektor'];
            if (!isset($grouped_izin[$sektor])) {
                $grouped_izin[$sektor] = [];
            }
            $grouped_izin[$sektor][] = $izin;
        }

        $data = [
            'izin' => $grouped_izin,
        ];
        return view('layanan_kesehatan', $data);
    }

    public function layanan_kesehatan_store()
    {
        if ($this->validate([
            'jenisizin_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Izin Wajib Diisi',
                ]
            ],
            'alamat_ktp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat KTP Wajib Diisi',
                ]
            ],
            'alamat_domisili' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Domisili Wajib Diisi',
                ]
            ],
            'tempat_tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat/Tgl Lahir Wajib Diisi',
                ]
            ],
        ])) {
            $nama_file = $this->request->getFile('fc_ijazah');

            if ($nama_file->isValid() && $nama_file->getClientMIMEType() == 'application/pdf') {
                $newName = $nama_file->getName();
                $uploadPath = ROOTPATH . 'public/perizinan';

                if ($nama_file->move($uploadPath, $newName)) {
                    $data = [
                        'fc_ijazah' => $newName,
                        'jenisizin_id' => $this->request->getPost('jenisizin_id'),
                        'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                        'alamat_ktp' => $this->request->getPost('alamat_ktp'),
                        'alamat_domisili' => $this->request->getPost('alamat_domisili'),
                        'tempat_tgl_lahir' => $this->request->getPost('tempat_tgl_lahir'),
                        'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                        'tahun_lulusan' => $this->request->getPost('tahun_lulusan'),
                        'nomor_strtgm' => $this->request->getPost('nomor_strtgm'),
                        'nomor_telepon' => $this->request->getPost('nomor_telepon'),
                        'email' => $this->request->getPost('email'),
                        'nama_fasilitas_kefarmasian' => $this->request->getPost('nama_fasilitas_kefarmasian'),
                        'alamat_praktik' => $this->request->getPost('alamat_praktik'),
                        'nomor_telepons' => $this->request->getPost('nomor_telepons'),
                    ];
                    $this->perizinanKesehatanModel->insert($data);

                    session()->setFlashdata('pesan', 'Nama Perizinan berhasil ditambah');
                    return redirect()->to(base_url('/home'));
                } else {
                    session()->setFlashdata('errors', ['nama_file' => 'Gagal menyimpan berkas di folder sop']);
                }
            } else {
                session()->setFlashdata('errors', ['nama_file' => 'Berkas harus berupa PDF']);
            }
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/PerizinanKesehatan'))->withInput()->with('errors', $validation->getErrors());
        }
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
