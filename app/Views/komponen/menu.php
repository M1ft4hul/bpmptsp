<div class="navbar-area fixed-top">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="<?php echo base_url('/') ?>" class="logo">
            <img src="<?php echo base_url() ?>assetsa/img/logoptsp.png" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="<?php echo base_url('/') ?>">
                    <img src="<?php echo base_url() ?>assetsa/img/logoptsp.png" class="logo-one" alt="Logo">
                    <img src="<?php echo base_url() ?>assetsa/img/logoptsp.png" class="logo-two" alt="Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">

                        <?php
                        $db = \Config\Database::connect();
                        $utama = $db->query("SELECT mu.*, tb_halaman.slug AS halaman_slug FROM menu_utama mu LEFT JOIN tb_halaman ON mu.id_halaman = tb_halaman.id_halaman WHERE aktif='1' ORDER BY urutan ASC");
                        $r1 = $utama->getResultArray();
                        foreach ($r1 as $key => $m1) :
                            $id = $m1['id_menu_utama'];
                            $sub = $db->query("SELECT * FROM menu_sub WHERE aktif='1' AND id_menu_utama=$id ORDER BY urutan ASC");
                            $r2 = $sub->getResultArray(); // Ambil semua sub menu terkait menu utama ini
                        ?>
                            <?php if (count($r2) > 0) : ?>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle"><?= $m1['nama_menu'] ?> <i class='bx bx-chevron-down'></i></a>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($r2 as $key => $m2) : ?>
                                            <li class="nav-item">
                                                <a href="<?= $m2['link'] ?>" class="nav-link"><?= $m2['nama_menu'] ?></a>
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
                        <a class="left-btn" href="<?php echo base_url('/register')?>">
                            Registrasi
                            <i class='bx bx-log-in'></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>