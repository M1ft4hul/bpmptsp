<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'id';
    protected $allowedFields = ['category_id', 'image', 'keterangan'];
    
    // Tambahkan fungsi-fungsi lain yang dibutuhkan untuk mengelola galeri
}
