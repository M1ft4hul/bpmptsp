<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisPerizinanModel extends Model
{
    protected $table = 'jenis_perizinan';
    protected $primaryKey = 'id_perizinan';
    protected $allowedFields = ['sektor_id', 'nama_perizinan', 'level'];
}
