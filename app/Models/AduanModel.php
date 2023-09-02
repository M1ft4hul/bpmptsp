<?php

namespace App\Models;

use CodeIgniter\Model;

class AduanModel extends Model
{
    protected $table = 'aduan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['subjek', 'nama_pengadu', 'alamat_lengkap', 'telp', 'email', 'isian', 'image', 'tanggal', 'slug'];
}
