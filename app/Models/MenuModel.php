<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menu_utama';
    protected $primaryKey = 'id_menu_utama';
    protected $allowedFields = ['nama_menu', 'icon', 'link', 'urutan', 'id_halaman', 'aktif'];

    public function getMenuWithSubmenu()
    {
        $builder = $this->db->table($this->table);
        $builder->select('menu_utama.*,  tb_halaman.nama_halaman');
        $builder->join('tb_halaman', 'tb_halaman.id_halaman = menu_utama.id_halaman', 'left');
        $query = $builder->get();

        return $query->getResultArray();
    }
}
