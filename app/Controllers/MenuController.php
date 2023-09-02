<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\HalamanModel;
use App\Models\MenuModel;
use App\Models\MenusubModel;

class MenuController extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        $this->halamanModel = new HalamanModel();
        $this->menuModel = new MenuModel();
        $this->beritaModel = new BeritaModel();
        $this->menusubModel = new MenusubModel();
    }

    public function show_halaman($slug)
    {
        $halaman = $this->halamanModel->where('slug', $slug)->first();
        $beritaLainnya = $this->beritaModel->findAll();

        $data = [
            'halaman' => $halaman,
            'beritaLainnya' => $beritaLainnya
        ];

        return view('halaman', $data);
    }

    // halaman
    public function halaman()
    {
        $halaman = $this->halamanModel->findAll();
        $validation = \Config\Services::validation();
        $data = [
            'halaman' => $halaman,
            'validation' => $validation
        ];
        return view('admin/admin_halaman', $data);
    }

    public function halaman_create()
    {
        $halaman = $this->halamanModel->findAll();
        $validation = \Config\Services::validation();
        $data = [
            'halaman' => $halaman,
            'validation' => $validation
        ];
        return view('admin/admin_halaman_create', $data);
    }

    public function halaman_store()
    {
        if ($this->validate([
            'nama_halaman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Halaman wajib diisi'
                ]
            ],
            'isi_halaman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten wajib diisi'
                ]
            ],
        ])) {
            $data = [
                'nama_halaman' => $this->request->getPost('nama_halaman'),
                'isi_halaman' => $this->request->getPost('isi_halaman'),
                'slug' => url_title($this->request->getPost('nama_halaman'), '-', true)
            ];

            $this->halamanModel->insert($data);

            session()->setFlashdata('pesan', 'Halaman berhasil ditambahkan.');
            return redirect()->to(base_url('/admin/menu/halaman'));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/admin/menu/halaman/create'))->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function halaman_edit($id_halaman)
    {
        $halaman = $this->halamanModel->find($id_halaman);
        $validation = \Config\Services::validation();
        $data = [
            'halaman' => $halaman,
            'validation' => $validation
        ];
        return view('admin/admin_halaman_edit', $data);
    }

    public function halaman_update($id_halaman)
    {
        if ($this->validate([
            'nama_halaman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Halaman wajib diisi'
                ]
            ],
            'isi_halaman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten wajib diisi'
                ]
            ],
        ])) {
            $data = [
                'nama_halaman' => $this->request->getPost('nama_halaman'),
                'isi_halaman' => $this->request->getPost('isi_halaman'),
                'slug' => url_title($this->request->getPost('nama_halaman'), '-', true),
            ];
            $this->halamanModel->update($id_halaman, $data);
            session()->setFlashdata('pesan', 'Halaman berhasil diupdate');
            return redirect()->to('/admin/menu/halaman');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function halaman_delete($id)
    {
        $this->halamanModel->delete($id);

        session()->setFlashdata('pesan', 'Halaman berhasil dihapus.');

        return redirect()->to('/admin/menu/halaman');
    }



    // awal
    public function index()
    {
        $menus = $this->menuModel->getMenuWithSubmenu();
        $halaman = $this->halamanModel->findAll();

        $data = [
            'menus' => $menus,
            'halaman' => $halaman
        ];
        return view('admin/admin_menu', $data);
    }

    public function submenu()
    {
        $menuUtama = $this->menuModel->findAll();
        $menuSub = $this->menusubModel->getSubmenudenganMenu();
        $halaman = $this->halamanModel->findAll();
        $data = [
            'menuSub' => $menuSub,
            'halaman' => $halaman,
            'menuUtama' => $menuUtama
        ];
        return view('admin/admin_menu_sub', $data);
    }

    // tambah menu utama
    public function create()
    {
        $data = [
            'nama_menu' => $this->request->getPost('nama_menu'),
            'id_halaman' => $this->request->getPost('id_halaman'),
            'urutan' => $this->request->getPost('urutan'),
            'aktif' => $this->request->getPost('aktif')
        ];
        $this->menuModel->insert($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->to(base_url('/admin/menu'));
    }

    // tambah sub menu
    public function create_subMenu()
    {
        $data = [
            'id_menu_utama' => $this->request->getPost('id_menu_utama'),
            'nama_menu' => $this->request->getPost('nama_menu'),
            'urutan' => $this->request->getPost('urutan'),
            'id_halaman' => $this->request->getPost('id_halaman'),
            'aktif' => $this->request->getPost('aktif')
        ];
        $this->menusubModel->insert($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->to(base_url('/admin/menu/sub'));
    }

    // edit menu utama
    public function menuUtama_update($id_menu_utama)
    {
        $data = [
            'nama_menu' => $this->request->getPost('nama_menu'),
            'id_halaman' => $this->request->getPost('id_halaman'),
            'urutan' => $this->request->getPost('urutan'),
            'aktif' => $this->request->getPost('aktif')
        ];
        $this->menuModel->update($id_menu_utama, $data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Edit !!!');
        return redirect()->to(base_url('/admin/menu'));
    }

    // edit sub menu
    public function menuSub_update($id_menu_sub)
    {
        $data = [
            'id_menu_utama' => $this->request->getPost('id_menu_utama'),
            'nama_menu' => $this->request->getPost('nama_menu'),
            'urutan' => $this->request->getPost('urutan'),
            'id_halaman' => $this->request->getPost('id_halaman'),
            'aktif' => $this->request->getPost('aktif')
        ];
        $this->menusubModel->update($id_menu_sub, $data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Edit !!!');
        return redirect()->to(base_url('/admin/menu/sub'));
    }

    // hapus menu utama
    public function menuUtama_delete($id_menu_utama)
    {
        $this->menuModel->delete($id_menu_utama);

        session()->setFlashdata('pesan', 'Menu Utama berhasil dihapus.');
        return redirect()->to('/admin/menu');
    }

    // hapus sub menu
    public function SubMenu_delete($id_menu_sub)
    {
        $this->menusubModel->delete($id_menu_sub);

        session()->setFlashdata('pesan', 'Menu Sub berhasil dihapus.');
        return redirect()->to('/admin/menu/sub');
    }
}
