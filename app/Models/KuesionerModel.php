<?php

namespace App\Models;

use CodeIgniter\Model;

class KuesionerModel extends Model
{
    protected $table = 'kuesioner';
    protected $primaryKey = 'id_kuesioner';
    protected $allowedFields = ['tgl_survei', 'jam_survei', 'jk', 'pendidikan', 'pekerjaan', 'jenis_layanan', 'p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8', 'p9', 'kritik_saran', 'nama', 'wa'];
}
