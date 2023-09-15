<div class="navbar-area fixed-top">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="<?php echo base_url('/home') ?>" class="logo">
            <img src="<?php echo base_url() ?>assetsa/img/logoptsp2.png" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="<?php echo base_url('/home') ?>">
                    <img src="<?php echo base_url() ?>assetsa/img/logoy.png" width="250" height="100" class="logo-one" alt="Logo">
                    <img src="<?php echo base_url() ?>assetsa/img/logoy.png" width="250" height="100" class="logo-two" alt="Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?php echo base_url('/home') ?>" class="nav-link dropdown-toggle">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Profile <i class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('/profil_sejarah') ?>" class="nav-link">Sejarah Singkat</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('/profil_visimisi') ?>" class="nav-link">Moto & Tujuan OPD</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('/profil_organisasi') ?>" class="nav-link">Struktur Organisai</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('/profil_sambutan') ?>" class="nav-link">Sambutan Kepala Dinas</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('/profil_pejabat') ?>" class="nav-link">Pejabat Struktural</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Layanan <i class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('/perizinan') ?>" class="nav-link">Perizinan Online</a>
                                </li>
                                <!-- menu yang mau di kerja -->
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>" class="nav-link">SP (Standar Pelayanan)</a>
                                </li>
                                <!-- end menu -->
                                <li class="nav-item">
                                    <a href="<?php echo base_url('/web/sop') ?>" class="nav-link dropdown-toggle">Standar Operasional Prosedur</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Media & Publikasi <i class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('/berita') ?>" class="nav-link">Berita</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('/galeri') ?>" class="nav-link">Galleri Foto</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('/peta') ?>" class="nav-link dropdown-toggle">Peta Rencana</a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item">
                        </li> -->
                        <li class="nav-item">
                            <a href="<?php echo base_url('/web/kuesioner') ?>" class="nav-link dropdown-toggle">SKM</a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url('/kontak') ?>" class="nav-link dropdown-toggle">Kontak</a>
                        </li>
                        <?php
                        $db = \Config\Database::connect();
                        $utama = $db->query("SELECT mu.*, tb_halaman.slug AS halaman_slug FROM menu_utama mu LEFT JOIN tb_halaman ON mu.id_halaman = tb_halaman.id_halaman WHERE aktif='1' ORDER BY urutan ASC");
                        $r1 = $utama->getResultArray();
                        foreach ($r1 as $key => $m1) :
                            $id = $m1['id_menu_utama'];
                            $sub = $db->query("SELECT mu.*, tb_halaman.slug AS halaman_slug FROM menu_sub mu LEFT JOIN tb_halaman ON mu.id_halaman = tb_halaman.id_halaman WHERE aktif='1' AND id_menu_utama=$id ORDER BY urutan ASC");
                            $r2 = $sub->getResultArray(); // Ambil semua sub menu terkait menu utama ini
                        ?>
                            <?php if (count($r2) > 0) : ?>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle"><?= $m1['nama_menu'] ?> <i class='bx bx-chevron-down'></i></a>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($r2 as $key => $m2) : ?>
                                            <li class="nav-item">
                                                <a href="<?= base_url('halaman/' . $m2['halaman_slug']) ?>" class="nav-link"><?= $m2['nama_menu'] ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php else : ?>
                                <?php if (!empty($m1['halaman_slug'])) : ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url('halaman/' . $m1['halaman_slug']) ?>" class="nav-link dropdown-toggle"><?= $m1['nama_menu'] ?></a>
                                    </li>
                                <?php else : ?>
                                    <li class="nav-item">
                                        <a href="<?= $m1['link'] ?>" class="nav-link dropdown-toggle"><?= $m1['nama_menu'] ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>


                    <!-- tombol -->
                    <div class="side-nav">
                        <a class="left-btn" href="<?php echo base_url('/login') ?>">
                            Login
                            <i class='bx bx-log-in'></i>
                        </a>
                        <!-- </?php echo base_url('/register') ?> -->
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>