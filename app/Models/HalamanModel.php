<?php

namespace App\Models;

use CodeIgniter\Model;

class HalamanModel extends Model
{
    protected $table = 'tb_halaman';
    protected $primaryKey = 'id_halaman';
    protected $allowedFields = ['nama_halaman', 'isi_halaman', 'slug'];
}
