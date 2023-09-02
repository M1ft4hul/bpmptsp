<?php

namespace App\Models;

use CodeIgniter\Model;

class MenusubModel extends Model
{
    protected $table = 'menu_sub';
    protected $primaryKey = 'id_menu_sub';
    protected $allowedFields = ['id_menu_utama', 'nama_menu', 'link', 'urutan', 'id_halaman', 'aktif'];

    public function getSubmenudenganMenu()
    {
        $builder = $this->db->table($this->table);
        $builder->select('menu_sub.*, menu_utama.nama_menu AS nama_utama, tb_halaman.nama_halaman');
        $builder->join('menu_utama', 'menu_utama.id_menu_utama = menu_sub.id_menu_utama', 'left');
        $builder->join('tb_halaman', 'tb_halaman.id_halaman = menu_sub.id_halaman', 'left');
        $query = $builder->get();

        return $query->getResultArray();
    }
    
}
