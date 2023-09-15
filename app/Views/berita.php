<?php echo $this->extend('komponen/layout') ?>
<?php echo $this->section('content'); ?>
<div class="page-title-area">
    <div class="bg-text">
        <span>News<br>Dpm<br>Berita<br>DPMPTSP</span>
    </div>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-item">
                    <h2>Berita</h2>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('/home') ?>">Home</a>
                        </li>
                        <li>
                            <span>Berita</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog-area ptb-100">
    <div class="container">
        <div class="row">
            <?php foreach ($berita as $item) : ?>

                <div class="col-sm-6 col-lg-4">
                    <div class="blog-item blog-img-one" style="background-image:url('<?= base_url('gambar/' . $item['image']); ?>');">
                        <ul class="top">
                            <li><?= $item['tanggal']; ?></li>
                            <li><?= $item['nama_kategori']; ?></li>
                        </ul>
                        <h3>
                            <a href="<?= base_url('berita/show/' . $item['slug']) ?>"><?= substr($item['judul'], 0, 30); ?>...</a>
                        </h3>
                        <p><?= substr($item['konten'], 0, 100); ?>...</p>
                        <ul class="bottom">
                            <li>
                                <img style="width: 60px; height: 60px;" src="<?php echo base_url() ?>assets/images/user.png" alt="Blog">
                            </li>
                            <li>
                                <span>Penulis:</span>
                            </li>
                            <li>
                                <a href="#"><?= $item['author']; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>

            <?php endforeach; ?>

            <?= $pager->links('berita', 'berita_pagination') ?>

        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>