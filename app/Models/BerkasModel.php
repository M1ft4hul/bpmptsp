<?php

namespace App\Models;

use CodeIgniter\Model;

class BerkasModel extends Model
{
    protected $table = 'tb_sop';
    protected $primaryKey = 'id_berkas';
    protected $allowedFields = ['nama_file'];
}
