<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisSektorModel extends Model
{
    protected $table = 'jenis_sektor';
    protected $primaryKey = 'id_sektor';
    protected $allowedFields = ['nama_sektor', 'level'];
}
