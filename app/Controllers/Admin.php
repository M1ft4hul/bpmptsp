<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\GalleryModel;
use App\Models\BeritaModel;
use App\Models\AduanModel;


class Admin extends BaseController
{
    public function __construct()
    {
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
        $aduan = $this->aduanModel->findAll();
        $data = [
            'aduan' => $aduan,
        ];

        return view('admin/aduan', $data);
    }

    public function aduan_create()
    {
        $aduan = $this->aduanModel->findAll();
        $data = [
            'aduan' => $aduan,
        ];
        return view('admin/aduan_create', $data);
    }

    public function aduan_store()
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

            session()->setFlashdata('pesan', 'Aduan berhasil ditambahkan.');
            return redirect()->to(base_url('/admin/aduan'));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/admin/aduan_create'))->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function aduan_edit($id)
    {
        $aduan = $this->aduanModel->find($id);
        $data = [
            'aduan' => $aduan
        ];
        return view('admin/aduan_edit', $data);
    }

    public function aduan_update($id)
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
            if ($image && $image->isValid()) {
                $newImageName = $image->getRandomName();
                $image->move('gambar', $newImageName);

                $data['image'] = $newImageName;
            }

            $this->aduanModel->update($id, $data);

            session()->setFlashdata('pesan', 'Aduan berhasil diupdate');

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
}
