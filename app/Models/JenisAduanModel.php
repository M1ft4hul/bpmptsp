<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisAduanModel extends Model
{
    protected $table = 'jenis_aduan';
    protected $primaryKey = 'id_jenis';
    protected $allowedFields = ['nama_aduan'];
}
