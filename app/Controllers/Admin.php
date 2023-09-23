<?php

namespace App\Controllers;

use TCPDF;

use App\Models\CategoryModel;
use App\Models\GalleryModel;
use App\Models\BeritaModel;
use App\Models\AduanModel;
use App\Models\BerkasModel;
use App\Models\JenisAduanModel;
use App\Models\JenisPerizinanModel;
use App\Models\KuesionerModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->jenisPerizinanModel = new JenisPerizinanModel();
        $this->jenisAduanModel = new JenisAduanModel();
        $this->berkasModel = new BerkasModel();
        $this->userModel = new UserModel();
        $this->kuesionerModel = new KuesionerModel();
        $this->aduanModel = new AduanModel();
        $this->beritaModel = new BeritaModel();
        $this->categoryModel = new CategoryModel();
        $this->galleryModel = new GalleryModel();
    }

    public function index()
    {
        return view('admin/index');
    }

    // menu kategori
    public function kategori()
    {
        $categories = $this->categoryModel->findAll();
        $validation = \Config\Services::validation();
        $data = [
            'validation' => $validation,
            'categories' => $categories,
        ];
        return view('admin/kategori', $data);
    }

    public function kategori_create()
    {
        $categories = $this->categoryModel->findAll();
        $validation = \Config\Services::validation();
        $data = [
            'validation' => $validation,
            'categories' => $categories,
        ];
        return view('admin/kategori_create', $data);
    }

    public function kategori_store()
    {
        if ($this->validate([
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[50]|is_unique[categories.nama]',
                'errors' => [
                    'required' => 'Kategori Wajib Diisi',
                    'is_unique' => 'Kategori sudah ada, masukkan kategori yang berbeda.',
                ]
            ],
        ])) {
            $data = [
                'nama' => $this->request->getPost('nama'),
            ];
            $this->categoryModel->insert($data);
            session()->setFlashdata('pesan', 'Kategori berhasil ditambah');
            return redirect()->to(base_url('/admin/kategori'));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/admin/kategori_create'))->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function kategori_edit($id)
    {
        $category = $this->categoryModel->find($id);
        $validation = \Config\Services::validation();
        $data = [
            'validation' => $validation,
            'category' => $category,
        ];
        return view('admin/kategori_edit', $data);
    }

    public function kategori_update($id)
    {
        $rules = [
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[50]|is_unique[categories.nama]',
                'errors' => [
                    'required' => 'Kategori Wajib Diisi',
                    'is_unique' => 'Kategori sudah ada, masukkan kategori yang berbeda.',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = [
            'nama' => $this->request->getPost('nama')
        ];

        $this->categoryModel->update($id, $data);

        return redirect()->to('/admin/kategori')->with('pesan', 'Kategori berhasil diupdate');
    }

    public function kategori_delete($id)
    {
        $this->categoryModel->delete($id);
        session()->setFlashdata('pesan', 'Kategori berhasil dihapus');
        return redirect()->to('/admin/kategori');
    }



    // menu gallery
    public function gallery()
    {
        $galleries = $this->galleryModel->join('categories', 'categories.id = gallery.category_id')
            ->select('gallery.*, categories.nama as nama_kategori')
            ->findAll();

        $data = [
            'galleries' => $galleries,
        ];
        return view('admin/gallery', $data);
    }

    public function gallery_create()
    {
        $categories = $this->categoryModel->findAll();
        $galleries = $this->galleryModel->findAll();
        $data = [
            'categories' => $categories,
            'galleries' => $galleries,
        ];
        return view('admin/gallery_create', $data);
    }

    public function gallery_store()
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
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan wajib diisi'
                ]
            ],
        ])) {
            $data = [
                'category_id' => $this->request->getPost('category_id'),
                'keterangan' => $this->request->getPost('keterangan')
            ];
            $image = $this->request->getFile('image');

            if ($image->isValid()) {
                $newName = $image->getRandomName();
                $image->move('gambar', $newName);

                $data['image'] = $newName;
            }

            $this->galleryModel->insert($data);
            session()->setFlashdata('pesan', 'Gallery berhasil ditambah');
            return redirect()->to(base_url('/admin/gallery'));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/admin/gallery_create'))->withInput()->with('errors', $validation->getErrors());
        }
    }


    public function gallery_edit($id)
    {
        $gallery = $this->galleryModel->find($id);
        $categories = $this->categoryModel->findAll();

        $data = [
            'categories' => $categories,
            'gallery' => $gallery,
        ];
        return view('admin/gallery_edit', $data);
    }

    public function gallery_update($id)
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
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan wajib diisi'
                ]
            ],
        ])) {
            $data = [
                'category_id' => $this->request->getPost('category_id'),
                'keterangan' => $this->request->getPost('keterangan'),
            ];

            $image = $this->request->getFile('image');
            if ($image && $image->isValid()) {
                $newImageName = $image->getRandomName();
                $image->move('gambar', $newImageName);

                $data['image'] = $newImageName;
            }
            $this->galleryModel->update($id, $data);
            session()->setFlashdata('pesan', 'Gallery berhasil diupdate');
            return redirect()->to('/admin/gallery');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function gallery_delete($id)
    {
        $this->galleryModel->delete($id);
        session()->setFlashdata('pesan', 'Gallery berhasil dihapus');

        return redirect()->to('/admin/gallery');
    }


    // menu aduan
    public function aduan()
    {
        $aduan = $this->aduanModel->join('jenis_aduan', 'jenis_aduan.id_jenis = aduan.jenis_id')
            ->select('aduan.*, jenis_aduan.nama_aduan as nama_jenis_aduan')
            ->findAll();
        // $aduan = $this->aduanModel->findAll();
        $data = [
            'aduan' => $aduan,
        ];

        return view('admin/aduan', $data);
    }


    public function aduan_edit($id)
    {
        $aduan = $this->aduanModel->join('jenis_aduan', 'jenis_aduan.id_jenis = aduan.jenis_id')
            ->select('aduan.*, jenis_aduan.nama_aduan as nama_jenis_aduan')
            ->find($id);
        $data = [
            'aduan' => $aduan
        ];
        return view('admin/aduan_edit', $data);
    }

    public function aduan_update($id)
    {
        if ($this->validate([
            'tanggapan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggapan wajib diisi'
                ]
            ],
        ])) {
            $data = [
                'tanggapan' => $this->request->getPost('tanggapan')
            ];

            $this->aduanModel->update($id, $data);

            session()->setFlashdata('pesan', 'Aduan Sudah diTanggapi');

            return redirect()->to('/admin/aduan');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function aduan_delete($id)
    {
        $this->aduanModel->delete($id);

        session()->setFlashdata('pesan', 'Aduan berhasil dihapus.');

        return redirect()->to('/admin/aduan');
    }
    // end aduan

    // jenis aduan
    public function jenis_aduan()
    {
        $jenis_aduan = $this->jenisAduanModel->findAll();
        $data = [
            'jenis_aduan' => $jenis_aduan,
        ];
        return view('admin/jenis_aduan', $data);
    }

    public function jenis_aduan_create()
    {
        $jenis_aduan = $this->jenisAduanModel->findAll();
        $data = [
            'jenis_aduan' => $jenis_aduan,
        ];
        return view('admin/jenis_aduan_create', $data);
    }

    public function jenis_aduan_store()
    {
        if ($this->validate([
            'nama_aduan' => [
                'rules' => 'required|is_unique[jenis_aduan.nama_aduan]',
                'errors' => [
                    'required' => 'Jenis Aduan Wajib Diisi',
                    'is_unique' => 'Jenis Aduan sudah ada, masukkan Nama Jenis Aduan yang berbeda.',
                ]
            ],
        ])) {
            $data = [
                'nama_aduan' => $this->request->getPost('nama_aduan'),
            ];
            $this->jenisAduanModel->insert($data);
            session()->setFlashdata('pesan', 'Jenis Aduan berhasil ditambah');
            return redirect()->to(base_url('/admin/jenis_aduan'));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/admin/jenis_create'))->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function jenis_aduan_edit($id_jenis)
    {
        $jenis_aduans = $this->jenisAduanModel->find($id_jenis);
        $validation = \Config\Services::validation();
        $data = [
            'validation' => $validation,
            'jenis_aduans' => $jenis_aduans
        ];
        return view('admin/jenis_aduan_edit', $data);
    }

    public function jenis_aduan_update($id_jenis)
    {
        $rules = [
            'nama_aduan' => [
                'rules' => 'required|is_unique[jenis_aduan.nama_aduan]',
                'errors' => [
                    'required' => 'Jenis Aduan Wajib Diisi',
                    'is_unique' => 'Jenis Aduan sudah ada, masukkan Nama Jenis Aduan yang berbeda.',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = [
            'nama_aduan' => $this->request->getPost('nama_aduan')
        ];

        $this->jenisAduanModel->update($id_jenis, $data);

        return redirect()->to('/admin/jenis_aduan')->with('pesan', 'Jenis Aduan berhasil diupdate');
    }

    // menu berita
    public function berita()
    {
        $beritas = $this->beritaModel->join('categories', 'categories.id = berita.category_id')
            ->select('berita.*, categories.nama as nama_kategori')
            ->findAll();

        $data = [
            'beritas' => $beritas,
        ];
        return view('admin/berita', $data);
    }


    public function berita_create()
    {
        $categories = $this->categoryModel->findAll();
        $beritas = $this->beritaModel->findAll();
        $data = [
            'categories' => $categories,
            'beritas' => $beritas,
        ];
        return view('admin/berita_create', $data);
    }

    public function berita_store()
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
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'judul wajib diisi'
                ]
            ],
            'konten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'konten wajib diisi'
                ]
            ],
            'author' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'author wajib diisi'
                ]
            ],
        ])) {
            $data = [
                'category_id' => $this->request->getPost('category_id'),
                'judul' => $this->request->getPost('judul'),
                'konten' => $this->request->getPost('konten'),
                'tanggal' => $this->request->getPost('tanggal'),
                'author' => $this->request->getPost('author'),
                'slug' => url_title($this->request->getPost('judul'), '-', true)
            ];

            $image = $this->request->getFile('image');

            if ($image->isValid()) {
                $newName = $image->getRandomName();
                $image->move('gambar', $newName);

                $data['image'] = $newName;
            }

            $this->beritaModel->insert($data);

            session()->setFlashdata('pesan', 'Berita berhasil ditambahkan.');
            return redirect()->to(base_url('/admin/berita'));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/admin/berita_create'))->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function berita_edit($id)
    {
        $berita = $this->beritaModel->find($id);
        $data['berita'] = $berita;

        $categories = $this->categoryModel->findAll();
        $data['categories'] = $categories;

        return view('admin/berita_edit', $data);
    }

    public function berita_update($id)
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
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'judul wajib diisi'
                ]
            ],
            'konten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'konten wajib diisi'
                ]
            ],
            'author' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'author wajib diisi'
                ]
            ],
        ])) {
            $data = [
                'category_id' => $this->request->getPost('category_id'),
                'judul' => $this->request->getPost('judul'),
                'konten' => $this->request->getPost('konten'),
                'tanggal' => $this->request->getPost('tanggal'),
                'author' => $this->request->getPost('author'),
                'slug' => url_title($this->request->getPost('judul'), '-', true),
            ];

            $image = $this->request->getFile('image');
            if ($image && $image->isValid()) {
                $newImageName = $image->getRandomName();
                $image->move('gambar', $newImageName);

                $data['image'] = $newImageName;
            }

            $this->beritaModel->update($id, $data);

            session()->setFlashdata('pesan', 'Gallery berhasil diupdate');

            return redirect()->to('/admin/berita');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function berita_delete($id)
    {
        $this->beritaModel->delete($id);

        session()->setFlashdata('pesan', 'Berita berhasil dihapus.');

        return redirect()->to('/admin/berita');
    }

    public function kuesioner()
    {
        $kuesioner = $this->kuesionerModel->findAll();
        $data = [
            'kuesioner' => $kuesioner,
        ];
        return view('admin/kuesioner', $data);
    }

    public function pdf_kuesioner($id_kuesioner)
    {
        $kuesioner = $this->kuesionerModel->find($id_kuesioner);
        $jenis_kelamin = $kuesioner['jk'];
        $pendidikan = $kuesioner['pendidikan'];
        $pekerjaan = $kuesioner['pekerjaan'];
        $soal_pertama = $kuesioner['p1'];
        $soal_kedua = $kuesioner['p2'];
        $soal_ketiga = $kuesioner['p3'];
        $soal_keempat = $kuesioner['p4'];
        $soal_kelima = $kuesioner['p5'];
        $soal_keenam = $kuesioner['p6'];
        $soal_ketujuh = $kuesioner['p7'];
        $soal_kedelapan = $kuesioner['p8'];
        $soal_kesembilan = $kuesioner['p9'];
        $data = [
            'jenis_kelamin' => $jenis_kelamin,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan,
            'kuesioner' => $kuesioner,
            'soal_pertama' => $soal_pertama,
            'soal_kedua' => $soal_kedua,
            'soal_ketiga' => $soal_ketiga,
            'soal_keempat' => $soal_keempat,
            'soal_kelima' => $soal_kelima,
            'soal_keenam' => $soal_keenam,
            'soal_ketujuh' => $soal_ketujuh,
            'soal_kedelapan' => $soal_kedelapan,
            'soal_kesembilan' => $soal_kesembilan,
        ];
        $html = view('admin/pdf_kuesioner', $data);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('DPMPTSP');
        $pdf->SetTitle('Kuesioner');
        $pdf->SetSubject('Kuesioner');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('kuesioner.pdf', 'I');
    }

    public function data_login()
    {
        $login = $this->userModel->findAll();
        $validation = \Config\Services::validation();
        $data = [
            'validation' => $validation,
            'login' => $login,
        ];

        return view('/admin/data_login', $data);
    }

    public function data_login_create()
    {
        $login = $this->userModel->findAll();
        $validation = \Config\Services::validation();
        $data = [
            'validation' => $validation,
            'login' => $login,
        ];
        return view('admin/data_login_create', $data);
    }

    public function data_login_store()
    {
        if ($this->validate([
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Username Wajib Diisi',
                    'is_unique' => 'Username sudah ada, masukkan username yang berbeda.',
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email Wajib Diisi',
                    'is_unique' => 'Email sudah ada, masukkan email yang berbeda.',
                ]
            ],
        ])) {
            $data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
            ];
            $this->userModel->insert($data);
            session()->setFlashdata('pesan', 'Data Login berhasil ditambah');
            return redirect()->to(base_url('/admin/menu/login'));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/admin/data_login_create'))->withInput()->with('errors', $validation->getErrors());
        }
    }


    public function data_login_edit($id_user)
    {
        $login = $this->userModel->find($id_user);
        $validation = \Config\Services::validation();
        $data = [
            'validation' => $validation,
            'login' => $login,
        ];
        return view('admin/data_login_edit', $data);
    }

    public function data_login_update($id_user)
    {
        $rules = [
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Username Wajib Diisi',
                    'is_unique' => 'Username sudah ada, masukkan username yang berbeda.',
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email Wajib Diisi',
                    'is_unique' => 'Email sudah ada, masukkan email yang berbeda.',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];

        $this->userModel->update($id_user, $data);

        return redirect()->to('/admin/menu/login')->with('pesan', 'Data Login berhasil diupdate');
    }

    public function data_login_delete($id_user)
    {
        $this->userModel->delete($id_user);
        session()->setFlashdata('pesan', 'Data Login berhasil dihapus');
        return redirect()->to('/admin/menu/login');
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function data_sop()
    {
        $berkas = $this->berkasModel->findAll();
        $data = [
            'berkas' => $berkas,
        ];
        return view('admin/sop', $data);
    }

    public function data_sop_create()
    {
        $berkas = $this->berkasModel->findAll();
        $data = [
            'berkas' => $berkas,
        ];
        return view('admin/sop_create', $data);
    }

    public function data_sop_store()
    {
        if ($this->validate([
            'nama_file' => [
                'rules' => 'uploaded[nama_file]|ext_in[nama_file,pdf,doc,docx]',
                'errors' => [
                    'uploaded' => 'Berkas wajib diunggah',
                    'ext_in' => 'Berkas harus berupa PDF',
                ],
            ],
        ])) {
            $nama_file = $this->request->getFile('nama_file');

            if ($nama_file->isValid() && $nama_file->getClientMIMEType() == 'application/pdf') {
                $newName = $nama_file->getName();
                $uploadPath = ROOTPATH . 'public/sop';

                if ($nama_file->move($uploadPath, $newName)) {
                    $data = [
                        'nama_file' => $newName,
                    ];
                    $this->berkasModel->insert($data);

                    session()->setFlashdata('pesan', 'Berkas berhasil diunggah');
                    return redirect()->to(base_url('/admin/data_sop'));
                } else {
                    session()->setFlashdata('errors', ['nama_file' => 'Gagal menyimpan berkas di folder sop']);
                }
            } else {
                session()->setFlashdata('errors', ['nama_file' => 'Berkas harus berupa PDF']);
            }
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/admin/data_sop_create'))->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function layanan_perizinan()
    {
        $perizinan = $this->jenisPerizinanModel->findAll();
        $data = [
            'perizinan' => $perizinan,
        ];
        return view('admin/jenis_layanan', $data);
    }

    public function layanan_perizinan_create()
    {
        $perizinan = $this->jenisPerizinanModel->findAll();
        $data = [
            'perizinan' => $perizinan,
        ];
        return view('admin/jenis_layanan_create', $data);
    }

    public function layanan_perizinan_store()
    {
        if ($this->validate([
            'nama_sektor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Sektor Wajib Diisi',
                ]
            ],
            'nama_perizinan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Perizinan Wajib Diisi',
                ]
            ],
        ])) {
            $data = [
                'nama_sektor' => $this->request->getPost('nama_sektor'),
                'nama_perizinan' => $this->request->getPost('nama_perizinan'),
            ];
            $this->jenisPerizinanModel->insert($data);
            session()->setFlashdata('pesan', 'Nama Perizinan berhasil ditambah');
            return redirect()->to(base_url('/admin/jenis_perizinan'));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/admin/perizinan_create'))->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function layanan_perizinan_edit($id_perizinan)
    {
        $perizinan = $this->jenisPerizinanModel->find($id_perizinan);
        $validation = \Config\Services::validation();
        $data = [
            'validation' => $validation,
            'perizinan' => $perizinan
        ];
        return view('admin/jenis_layanan_edit', $data);
    }

    public function layanan_perizinan_update($id_perizinan)
    {
        $rules = [
            'nama_sektor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Sektor Wajib Diisi',
                ]
            ],
            'nama_perizinan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Perizinan Wajib Diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = [
            'nama_sektor' => $this->request->getPost('nama_sektor'),
            'nama_perizinan' => $this->request->getPost('nama_perizinan')
        ];

        $this->jenisPerizinanModel->update($id_perizinan, $data);

        return redirect()->to('/admin/jenis_perizinan')->with('pesan', 'Nama Perizinan berhasil diupdate');
    }


    public function layanan_perizinan_delete($id_perizinan)
    {
        $this->jenisPerizinanModel->delete($id_perizinan);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/jenis_perizinan');
    }
}
