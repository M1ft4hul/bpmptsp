<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Portal');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// portal
$routes->get('/', 'Portal::index');
$routes->get('/kuesioner', 'Portal::kuesioner');
$routes->post('/add', 'Portal::add_kuesioner');
$routes->get('/progres_add_wa/(:num)', 'Portal::halaman_baru/$1');
$routes->post('/proses', 'Portal::proses_nomor_wa');
$routes->get('/progres_finish', 'Portal::halaman_terakhir');


$routes->get('/home', 'Home::index');
$routes->get('/berita/show/(:any)', 'Home::show_berita/$1'); //untuk detail berita
$routes->get('/halaman/(:any)', 'MenuController::show_halaman/$1'); //untuk detail berita

$routes->get('/profil_sejarah', 'Home::profil_sejarah');
$routes->get('/profil_visimisi', 'Home::profil_visimisi');
$routes->get('/profil_organisasi', 'Home::profil_organisasi');
$routes->get('/profil_sambutan', 'Home::profil_sambutan');
$routes->get('/profil_pejabat', 'Home::profil_pejabat');
$routes->get('/peta', 'Home::peta_rencana');
$routes->get('/kontak', 'Home::kontak');
$routes->get('/perizinan', 'Home::perizinan');
$routes->get('/berita', 'Home::berita');
$routes->get('/galeri', 'Home::galeri');

$routes->get('/aduan', 'Home::aduan');
$routes->get('/aduan/show/(:any)', 'Home::show_aduan/$1');
$routes->post('/home/aduan/store', 'Home::aduan_simpan');


// auth
$routes->get('/login', 'Auth::index');
$routes->get('/register', 'Auth::regis');
$routes->post('/register/add', 'Auth::add_regis');
$routes->get('/kota', 'Auth::kota');
$routes->get('/kec', 'Auth::kec');
$routes->get('/desa', 'Auth::desa');

// dashboard admin
$routes->get('/admin', 'Admin::index');

// kategori
$routes->get('/admin/kategori', 'Admin::kategori');
$routes->get('/admin/kategori_create', 'Admin::kategori_create');
$routes->get('/admin/kategori_edit/(:any)', 'Admin::kategori_edit/$1');

$routes->post('/admin/kategori_delete/(:any)', 'Admin::kategori_delete/$1');
$routes->post('/kategoriUpdate/(:any)', 'Admin::kategori_update/$1');
$routes->post('/admin/category/store', 'Admin::kategori_store');


// gallery
$routes->get('/admin/gallery', 'Admin::gallery');
$routes->get('/admin/gallery_create', 'Admin::gallery_create');
$routes->get('/admin/gallery_edit/(:any)', 'Admin::gallery_edit/$1');

$routes->post('/admin/gallery_delete/(:any)', 'Admin::gallery_delete/$1');
$routes->post('/galleryUpdate/(:any)', 'Admin::gallery_update/$1');
$routes->post('/admin/gallery/store', 'Admin::gallery_store');


//aduan
$routes->get('/admin/aduan', 'Admin::aduan');
$routes->get('/admin/aduan_create', 'Admin::aduan_create');
$routes->get('/admin/aduan_edit/(:any)', 'Admin::aduan_edit/$1');

$routes->post('/admin/aduan_delete/(:any)', 'Admin::aduan_delete/$1');
$routes->post('/aduanUpdate/(:any)', 'Admin::aduan_update/$1');
$routes->post('/admin/aduan/store', 'Admin::aduan_store');

// kuesioner
$routes->get('/admin/kuesioner', 'Admin::kuesioner');
$routes->get('/admin/pdf_kuesioner/(:any)', 'Admin::pdf_kuesioner/$1');

// berita
$routes->get('/admin/berita', 'Admin::berita');
$routes->get('/admin/berita_create', 'Admin::berita_create');
$routes->get('/admin/berita_edit/(:any)', 'Admin::berita_edit/$1');

$routes->post('/admin/berita_delete/(:any)', 'Admin::berita_delete/$1');
$routes->post('/beritaUpdate/(:any)', 'Admin::berita_update/$1');
$routes->post('/admin/berita/store', 'Admin::berita_store');

// pengaturan menu & halaman
// menu sub
$routes->get('/admin/menu/sub', 'MenuController::submenu');

$routes->post('/admin/Tambah_Submenu', 'MenuController::create_subMenu');
$routes->post('/menuSubUpdate/(:any)', 'MenuController::menuSub_update/$1');
$routes->post('/admin/hapusSubMenu_delete/(:any)', 'MenuController::SubMenu_delete/$1');
// end

// menu utama
$routes->get('/admin/menu', 'MenuController::index');

$routes->post('/admin/Tambah_menu', 'MenuController::create');
$routes->post('/menuUtamaUpdate/(:any)', 'MenuController::menuUtama_update/$1');
$routes->post('/admin/hapusMenuUtama_delete/(:any)', 'MenuController::menuUtama_delete/$1');
// end

// halaman
$routes->get('/admin/menu/halaman', 'MenuController::halaman');
$routes->get('/admin/menu/halaman/create', 'MenuController::halaman_create');
$routes->get('/admin/halaman/edit/(:any)', 'MenuController::halaman_edit/$1');

$routes->post('/admin/halaman_delete/(:any)', 'MenuController::halaman_delete/$1');
$routes->post('/halamanUpdate/(:any)', 'MenuController::halaman_update/$1');
$routes->post('/admin/halaman/save', 'MenuController::halaman_store');
// end


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
