<?php

namespace App\Controllers;

use App\Models\KuesionerModel;

class Portal extends BaseController
{
    public function __construct()
    {
        $this->kuesionerModel = new KuesionerModel();
    }

    public function index()
    {
        return view('portal/home');
    }

    public function kuesioner()
    {
        return view('portal/kuesioner');
    }

    public function add_kuesioner()
    {
        if ($this->validate([
            'tgl_survei' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Survei harus di isi'
                ]
            ],
        ])) {
            $data = [
                'tgl_survei' => $this->request->getPost('tgl_survei'),
                'jam_survei' => $this->request->getPost('jam_survei'),
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
            session()->setFlashdata('pesan', 'Kuesioner anda sudah Terkirim!, Silakan masukkan nomor Whatsapp anda dibawah ini!...');
            return redirect()->to(base_url('/progres_add_wa/' . $id_kuesioner));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/kuesioner'))->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function halaman_baru($id_kuesioner)
    {
        $kuesioner = $this->kuesionerModel->find($id_kuesioner);
        $data = [
            'kuesioner' => $kuesioner
        ];
        return view('portal/halaman', $data);
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
            session()->setFlashdata('pesanku', 'Data anda sudah lengkap!, Silahkan tunggu tahap berikutnya');
            return redirect()->to(base_url('/progres_finish'));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/halaman_baru/' . $id_kuesioner))->withInput()->with('errors', $validation->getErrors());
        }
    }


    public function halaman_terakhir()
    {
        return view('portal/halaman_terakhir');
    }
}
