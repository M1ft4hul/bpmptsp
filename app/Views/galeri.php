<?php echo $this->extend('komponen/layout') ?>
<?php echo $this->section('content'); ?>
<!-- isi -->
<div class="page-title-area">
    <div class="bg-text">
        <span>Galley foto<br>Dpm<br>Galley foto<br>DPMPTSP</span>
    </div>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-item">
                    <h2>Galleri Kegiatan</h2>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('/') ?>">Home</a>
                        </li>
                        <li>
                            <span>Galleri Kegiatan</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-area two ptb-100">
    <div class="container">
        <div class="row">
            <?php foreach ($galleries as $gallerie) : ?>
                <div class="col-sm-6 col-lg-4">
                    <div class="portfolio-item">
                        <img width="355px" height="363px" src="<?= base_url() ?>gambar/<?= $gallerie['image'] ?>" alt="Portfolio">
                        <div class="portfolio-inner">
                            <span><?= $gallerie['nama_kategori']; ?></span>
                            <h3>
                                <a href="#"><?= $gallerie['keterangan']; ?></a>
                            </h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?= $pager->links('gallery', 'galeri_pagination') ?>

            <!-- pagination -->
        </div>


    </div>
</div>
<?php echo $this->endSection(); ?>