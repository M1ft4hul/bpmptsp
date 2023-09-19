<?php

namespace App\Models;

use CodeIgniter\Model;

class AduanModel extends Model
{
    protected $table = 'aduan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'jk', 'alamat_rumah', 'pekerjaan', 'alamat_kantor', 'email', 'ktp', 'tlp', 'jenis_id', 'subjek', 'lokasi', 'isian', 'tanggal_kejadian', 'tujuan_pengaduan','tanggapan', 'slug'];
}
