<?php

namespace App\Models;

use CodeIgniter\Model;

class AduanModel extends Model
{
    protected $table = 'aduan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['subjek', 'lokasi', 'kategori', 'isian', 'image', 'tanggal', 'slug'];
}
