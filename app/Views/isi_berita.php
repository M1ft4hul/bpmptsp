<?php echo $this->extend('komponen/layout') ?>
<?php echo $this->section('content'); ?>
<!-- isi -->
<!-- Page Title -->
<div class="page-title-area">
    <div class="bg-text">
        <span>News<br>Dpm<br>Detail Berita<br>PTSP</span>
    </div>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-item">
                    <h2>Detail Berita</h2>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('/') ?>">Home</a>
                        </li>
                        <li>
                            <span>Detail Berita</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title -->

<!-- Blog Details -->
<div class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="details-item">
                    <div class="details-img">
                        <h4><?= $tanggal ?> <span><?= $bulan ?></span></h4>
                        <img src="<?= base_url('gambar/' . $berita['image']); ?>" alt="Details">
                        <h2><?= $berita['judul'] ?></h2>
                        <p><?= $berita['konten'] ?></p>
                    </div>
                    <div class="details-user">
                        <img src="<?php echo base_url() ?>assets/images/user.png" alt="Details">
                        <img src="<?php echo base_url() ?>assetsa/img/blog-details5.jpg" alt="Details">
                        <img src="<?php echo base_url() ?>assetsa/img/blog-details6.jpg" alt="Details">
                        <div class="top">
                            <div class="row align-items-end">
                                <div class="col-lg-6">
                                    <div class="top-left">
                                        <h3><?= $berita['author'] ?></h3>
                                        <span>Penulis</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-area">

                    <div class="recent widget-item">
                        <h3>Berita Lainnya</h3>
                        <?php foreach ($beritaLainnya as $berita) : ?>
                            <div class="recent-inner">
                                <ul class="align-items-center">
                                    <li>
                                        <img src="<?= base_url('gambar/' . $berita['image']); ?>" alt="Details">
                                    </li>
                                    <li>
                                        <span><?= $berita['tanggal']; ?></span>
                                        <a href="<?= base_url('berita/show/' . $berita['slug']) ?>"><?= substr($berita['judul'], 0, 40); ?>...</a>
                                    </li>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Details -->
<?php echo $this->endSection(); ?>