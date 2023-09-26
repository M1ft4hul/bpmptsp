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
        $jenisizin_id = $this->request->getPost('jenisizin_id');
        $validationRules = [];

        $validationRules += [
            'jenisizin_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Izin Wajib Diisi',
                ],
            ],
            'nama_lengkap' => 'required',
            'tempat_tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required',
        ];

        if ($this->validate($validationRules)) {
            $data = [
                'jenisizin_id' => $jenisizin_id,
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'tempat_tgl_lahir' => $this->request->getPost('tempat_tgl_lahir'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'nomor_telepon' => $this->request->getPost('nomor_telepon'),
                'email' => $this->request->getPost('email'),
            ];

            if ($jenisizin_id === '2') {
                $data += [
                    'nik' => $this->request->getPost('nik'),
                    'pekerjaan' => $this->request->getPost('pekerjaan'),
                    'alamat_tempat_tinggal' => $this->request->getPost('alamat_tempat_tinggal'),
                    'nama_izin' => $this->request->getPost('nama_izin'),
                    'nama_sarana_praktik' => $this->request->getPost('nama_sarana_praktik'),
                    'alamat_sarana_praktik' => $this->request->getPost('alamat_sarana_praktik'),
                ];
            } elseif ($jenisizin_id === '1') { // nomor ini yang statis.. akan lebih susah kalau tambah layanan
                $data += [
                    'alamat_ktp' => $this->request->getPost('alamat_ktp'),
                    'alamat_domisili' => $this->request->getPost('alamat_domisili'),
                    'tahun_lulusan' => $this->request->getPost('tahun_lulusan'),
                    'nomor_strtgm' => $this->request->getPost('nomor_strtgm'),
                    'nama_fasilitas_kefarmasian' => $this->request->getPost('nama_fasilitas_kefarmasian'),
                    'alamat_praktik' => $this->request->getPost('alamat_praktik'),
                    'nomor_telepons' => $this->request->getPost('nomor_telepons'),
                ];
            }

            // mengupload file ijazah
            $upload_ijazah = $this->request->getFile('fc_ijazah');
            if ($upload_ijazah->isValid() && $upload_ijazah->getClientMIMEType() == 'application/pdf') {
                $fc_ijazah = $upload_ijazah->getName();
                $uploadFciajazah = ROOTPATH . 'public/perizinan';

                if ($upload_ijazah->move($uploadFciajazah, $fc_ijazah)) {
                    $data['fc_ijazah'] = $fc_ijazah;
                } else {
                    session()->setFlashdata('errors', ['upload_ijazah' => 'Gagal menyimpan berkas Ijazah di folder sop']);
                }
            } else {
                session()->setFlashdata('errors', ['upload_ijazah' => 'Berkas Ijazah harus berupa PDF']);
            }

            // mengupload file str
            $upload_str = $this->request->getFile('fc_str');
            if ($upload_str->isValid() && $upload_str->getClientMIMEType() == 'application/pdf') {
                $fc_str = $upload_str->getName();
                $uploadFcstr = ROOTPATH . 'public/perizinan';

                if ($upload_str->move($uploadFcstr, $fc_str)) {
                    $data['fc_str'] = $fc_str;
                } else {
                    session()->setFlashdata('errors', ['upload_str' => 'Gagal menyimpan berkas STR di folder sop']);
                }
            } else {
                session()->setFlashdata('errors', ['upload_str' => 'Berkas STR harus berupa PDF']);
            }

            // mengupload file KTP
            $upload_ktp = $this->request->getFile('fc_ktp');
            if ($upload_ktp->isValid() && $upload_ktp->getClientMIMEType() == 'application/pdf') {
                $fc_ktp = $upload_ktp->getName();
                $uploadFcktp = ROOTPATH . 'public/perizinan';

                if ($upload_ktp->move($uploadFcktp, $fc_ktp)) {
                    $data['fc_ktp'] = $fc_ktp;
                } else {
                    session()->setFlashdata('errors', ['upload_ktp' => 'Gagal menyimpan berkas KTP di folder sop']);
                }
            } else {
                session()->setFlashdata('errors', ['upload_ktp' => 'Berkas KTP harus berupa PDF']);
            }

            // mengupload file NPWP
            $upload_npwp = $this->request->getFile('fc_npwp');
            if ($upload_npwp->isValid() && $upload_npwp->getClientMIMEType() == 'application/pdf') {
                $fc_npwp = $upload_npwp->getName();
                $uploadFcnpwp = ROOTPATH . 'public/perizinan';

                if ($upload_npwp->move($uploadFcnpwp, $fc_npwp)) {
                    $data['fc_npwp'] = $fc_npwp;
                } else {
                    session()->setFlashdata('errors', ['upload_npwp' => 'Gagal menyimpan berkas NPWP di folder sop']);
                }
            } else {
                session()->setFlashdata('errors', ['upload_npwp' => 'Berkas NPWP harus berupa PDF']);
            }

            // mengupload file keterangan berbadan sehat
            $upload_surat_keterangan_sehat = $this->request->getFile('surat_keterangan_sehat');
            if ($upload_surat_keterangan_sehat->isValid() && $upload_surat_keterangan_sehat->getClientMIMEType() == 'application/pdf') {
                $fc_upload_surat_keterangan_sehat = $upload_surat_keterangan_sehat->getName();
                $uploadKeterangansehat = ROOTPATH . 'public/perizinan';

                if ($upload_surat_keterangan_sehat->move($uploadKeterangansehat, $fc_upload_surat_keterangan_sehat)) {
                    $data['surat_keterangan_sehat'] = $fc_upload_surat_keterangan_sehat;
                } else {
                    session()->setFlashdata('errors', ['upload_surat_keterangan_sehat' => 'Gagal menyimpan berkas Keterangan Sehat di folder sop']);
                }
            } else {
                session()->setFlashdata('errors', ['upload_surat_keterangan_sehat' => 'Berkas Keterangan Sehat harus berupa PDF']);
            }

            // mengupload file surat rekomendasi dinas
            $upload_surat_rekom_dinkes = $this->request->getFile('surat_rekom_dinkes');
            if ($upload_surat_rekom_dinkes->isValid() && $upload_surat_rekom_dinkes->getClientMIMEType() == 'application/pdf') {
                $fc_upload_surat_rekom_dinkes = $upload_surat_rekom_dinkes->getName();
                $uploadKeterangansehat = ROOTPATH . 'public/perizinan';

                if ($upload_surat_rekom_dinkes->move($uploadKeterangansehat, $fc_upload_surat_rekom_dinkes)) {
                    $data['surat_rekom_dinkes'] = $fc_upload_surat_rekom_dinkes;
                } else {
                    session()->setFlashdata('errors', ['upload_surat_rekom_dinkes' => 'Gagal menyimpan berkas Rekomendasi Dinkes di folder sop']);
                }
            } else {
                session()->setFlashdata('errors', ['upload_surat_rekom_dinkes' => 'Berkas Rekomendasi Dinkes harus berupa PDF']);
            }

            // mengupload file Sertifikat Kompetensi
            $upload_fc_sertifikat_komp = $this->request->getFile('fc_sertifikat_komp');
            if ($upload_fc_sertifikat_komp->isValid() && $upload_fc_sertifikat_komp->getClientMIMEType() == 'application/pdf') {
                $fc_sertifikat_komp = $upload_fc_sertifikat_komp->getName();
                $uploadSertifikatKom = ROOTPATH . 'public/perizinan';

                if ($upload_fc_sertifikat_komp->move($uploadSertifikatKom, $fc_sertifikat_komp)) {
                    $data['fc_sertifikat_komp'] = $fc_sertifikat_komp;
                } else {
                    session()->setFlashdata('errors', ['upload_fc_sertifikat_komp' => 'Gagal menyimpan berkas Sertifikat Kompetensi di folder sop']);
                }
            } else {
                session()->setFlashdata('errors', ['upload_fc_sertifikat_komp' => 'Berkas Sertifikat Kompetensi harus berupa PDF']);
            }

            // mengupload file rekomendasi organisasi profesi
            $upload_rekom_organisasi_profesi = $this->request->getFile('rekom_organisasi_profesi');
            if ($upload_rekom_organisasi_profesi->isValid() && $upload_rekom_organisasi_profesi->getClientMIMEType() == 'application/pdf') {
                $rekom_organisasi_profesi = $upload_rekom_organisasi_profesi->getName();
                $uploadRekomendasiOrganisasi = ROOTPATH . 'public/perizinan';

                if ($upload_rekom_organisasi_profesi->move($uploadRekomendasiOrganisasi, $rekom_organisasi_profesi)) {
                    $data['rekom_organisasi_profesi'] = $rekom_organisasi_profesi;
                } else {
                    session()->setFlashdata('errors', ['upload_rekom_organisasi_profesi' => 'Gagal menyimpan berkas Rekomendasi Organisasi Profesi di folder sop']);
                }
            } else {
                session()->setFlashdata('errors', ['upload_rekom_organisasi_profesi' => 'Berkas Rekomendasi Organisasi Profesi harus berupa PDF']);
            }

            // mengupload file keterangan aktif menjalankan tugas
            $upload_fc_ket_aktif = $this->request->getFile('fc_ket_aktif');
            if ($upload_fc_ket_aktif->isValid() && $upload_fc_ket_aktif->getClientMIMEType() == 'application/pdf') {
                $fc_ket_aktif = $upload_fc_ket_aktif->getName();
                $uploadKeteranganAktif = ROOTPATH . 'public/perizinan';

                if ($upload_fc_ket_aktif->move($uploadKeteranganAktif, $fc_ket_aktif)) {
                    $data['fc_ket_aktif'] = $fc_ket_aktif;
                } else {
                    session()->setFlashdata('errors', ['upload_fc_ket_aktif' => 'Gagal menyimpan berkas Keterangan Aktif di folder sop']);
                }
            } else {
                session()->setFlashdata('errors', ['upload_fc_ket_aktif' => 'Berkas Keterangan Aktif harus berupa PDF']);
            }

            // mengupload file Foto
            $upload_pas_poto = $this->request->getFile('pas_poto');
            if ($upload_pas_poto->isValid() && $upload_pas_poto->getClientMIMEType() == 'application/pdf') {
                $pas_poto = $upload_pas_poto->getName();
                $uploadPasFoto = ROOTPATH . 'public/perizinan';

                if ($upload_pas_poto->move($uploadPasFoto, $pas_poto)) {
                    $data['pas_poto'] = $pas_poto;
                } else {
                    session()->setFlashdata('errors', ['upload_pas_poto' => 'Gagal menyimpan berkas Foto di folder sop']);
                }
            } else {
                session()->setFlashdata('errors', ['upload_pas_poto' => 'Berkas Foto harus berupa PDF']);
            }

            // mengupload materai
            $upload_meterai = $this->request->getFile('meterai');
            if ($upload_meterai->isValid() && $upload_meterai->getClientMIMEType() == 'application/pdf') {
                $meterai = $upload_meterai->getName();
                $uploadMaterai = ROOTPATH . 'public/perizinan';

                if ($upload_meterai->move($uploadMaterai, $meterai)) {
                    $data['meterai'] = $meterai;
                } else {
                    session()->setFlashdata('errors', ['upload_meterai' => 'Gagal menyimpan berkas Materai di folder sop']);
                }
            } else {
                session()->setFlashdata('errors', ['upload_meterai' => 'Berkas Materai harus berupa PDF']);
            }

            $this->perizinanKesehatanModel->insert($data);

            session()->setFlashdata('pesan', 'Nama Perizinan berhasil ditambah');
            return redirect()->to(base_url('/home'));
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
