<?php

namespace App\Models;

use CodeIgniter\Model;

class KotaM extends Model
{
    protected $table            = 'kabupaten';
    protected $allowedFields    = ['prov', 'nama',];

    protected $useTimestamps = true;
}
