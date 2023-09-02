<?php echo $this->extend('komponen/layout') ?>
<?php echo $this->section('content'); ?>
<div class="page-title-area">
    <div class="bg-text">
        <span>Galley foto<br>Dpm<br>Galley foto<br>DPMPTSP</span>
    </div>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-item">
                    <h2><?= $halaman['nama_halaman'] ?></h2>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('/') ?>">Home</a>
                        </li>
                        <li>
                            <span><?= $halaman['nama_halaman'] ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="details-item">
                    <div class="details-img">
                        <p><?= $halaman['isi_halaman'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-area">
                    <div class="recent widget-item">
                        <h3>Berita Terkini</h3>
                        <?php foreach ($beritaLainnya as $berita) : ?>
                            <div class="recent-inner">
                                <ul class="align-items-center">
                                    <li>
                                        <img src="<?= base_url('gambar/' . $berita['image']); ?>" alt="Details">
                                    </li>
                                    <li>
                                        <span><?= $berita['tanggal']; ?></span>
                                        <a href="#"><?= substr($berita['judul'], 0, 40); ?>...</a>
                                    </li>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="tags widget-item">
                        <h3>Tags</h3>
                        <ul>
                            <li>
                                <a href="#">#SEO</a>
                            </li>
                            <li>
                                <a href="#">#Internet</a>
                            </li>
                            <li>
                                <a href="#">#Web</a>
                            </li>
                            <li>
                                <a href="#">#Sass</a>
                            </li>
                            <li>
                                <a href="#">#IT</a>
                            </li>
                            <li>
                                <a href="#">#Support</a>
                            </li>
                            <li>
                                <a href="#">#Tips</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>