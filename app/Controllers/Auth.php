<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('auth/login');
    }

    public function regis()
    {
        $validation = \Config\Services::validation();
        // $prov = $this->userModel->prov()->getResult();
        // $kota = $this->userModel->kota()->getResult();
        // $kec = $this->userModel->kec()->getResult();
        // $desa = $this->userModel->desa()->getResult();
        $data = [
            'validation' => $validation,
            // 'provinsi' => $prov,
            // 'kota' => $kota,
            // 'kec' => $kec,
            // 'desa' => $desa,
        ];
        return view('auth/register', $data);
    }

    public function add_regis()
    {
        if ($this->validate([
            'jenis_pemohon' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Jenis Pemohon harus diIsi',
                ]
            ],
            'jenis_identitas' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Jenis Identitas harus diIsi',
                ]
            ],
        ])) {
            $data = [
                'jenis_pemohon' => $this->request->getPost('jenis_pemohon'),
                'jenis_identitas' => $this->request->getPost('jenis_identitas'),
                'nomor_identitas' => $this->request->getPost('nomor_identitas'),
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'no_telp' => $this->request->getPost('no_telp'),
            ];
            $this->userModel->insert($data);
            session()->setFlashdata('pesan', 'Silahkan Login dengan Email dan Password.');
            return redirect()->to(base_url('/login'));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/register'))->withInput()->with('errors', $validation->getErrors());
        }
    }


    public function kota()
    {
        $id_prov = $this->request->getVar('id');
        $kota = $this->userModel->getkota($id_prov);
        $lists = "<option value='' disabled selected>-- Pilih Kabupaten/Kota --</option>";
        $listskec = "<option value='' disabled selected>-- Pilih Kecamatan --</option>";
        $listsdesa = "<option value='' disabled selected>-- Pilih Kelurahan/Desa --</option>";
        foreach ($kota as $data) {
            $lists .= "<option value='" . $data->id . "'>" . $data->nama . "</option>";
        }

        $callback = array(
            'kota' => $lists,
            'kec' => $listskec,
            'desa' => $listsdesa,
            'csrfHash' => csrf_hash()
        );
        echo json_encode($callback);
    }
    public function kec()
    {

        $id_kota = $this->request->getVar('id');
        $kec = $this->userModel->getkec($id_kota);
        $lists = "<option value='' disabled selected>-- Pilih Kecamatan --</option>";
        $listsdesa = "<option value='' disabled selected>-- Pilih Kelurahan/Desa --</option>";
        foreach ($kec as $data) {
            $lists .= "<option value='" . $data->id . "'>" . $data->nama . "</option>";
        }

        $callback = array(
            'kec' => $lists,
            'desa' => $listsdesa,
            'csrfHash' => csrf_hash()
        );
        echo json_encode($callback);
    }
    public function desa()
    {
        $id_kec = $this->request->getVar('id');
        $desa = $this->userModel->getdesa($id_kec);
        $lists = "<option value='' disabled selected>-- Pilih Kelurahan/Desa --</option>";
        foreach ($desa as $data) {
            $lists .= "<option value='" . $data->id . "'>" . $data->nama . "</option>";
        }

        $callback = array(
            'desa' => $lists,
            'csrfHash' => csrf_hash()
        );
        echo json_encode($callback);
    }
}
