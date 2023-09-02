<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['jenis_pemohon', 'jenis_identitas', 'nomor_identitas', 'nama_lengkap', 'prov', 'kota', 'kec', 'desa', 'kode_pos', 'rt', 'rw', 'alamat', 'nama_perusahaan', 'nama_direktur', 'npwp_lengkap', 'no_telp', 'email', 'password'];

    // prov
    public function prov()
    {
        return $this->db->table('provinsi')
            ->get();
    }
    
    public function provinsi($id)
    {
        return $this->db->table('provinsi')
            ->where('id', $id)
            ->get();
    }

    // kota
    public function kota()
    {
        return $this->db->table('kabupaten')
            ->get();
    }

    public function kabupaten($id)
    {
        return $this->db->table('kabupaten')
            ->where('id', $id)
            ->get();
    }

    public function getkota($id_prov)
    {
        return $this->db->table('kabupaten')
            ->where('id_prov', $id_prov)
            ->get()->getResult();
    }

    // kec
    public function kec()
    {
        return $this->db->table('kecamatan')
            ->get();
    }

    public function kecamatan($id)
    {
        return $this->db->table('kecamatan')
            ->where('id', $id)
            ->get();
    }

    public function getkec($id_kota)
    {
        return $this->db->table('kecamatan')
            ->where('id_kabupaten', $id_kota)
            ->get()->getResult();
    }

    // desa
    public function desa()
    {
        return $this->db->table('desa')
            ->get();
    }

    public function kelurahan($id)
    {
        return $this->db->table('desa')
            ->where('id', $id)
            ->get();
    }

    public function getdesa($id_kec)
    {
        return $this->db->table('desa')
            ->where('id_kecamatan', $id_kec)
            ->get()->getResult();
    }
}
