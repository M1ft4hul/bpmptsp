<?php echo $this->extend('komponen/layout') ?>
<?php echo $this->section('content'); ?>
<!-- isi -->
<div class="page-title-area">
    <div class="bg-text">
        <span>News<br>Dpm<br>Detail Aduan<br>PTSP</span>
    </div>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-item">
                    <h2>Aduan Masyarakat</h2>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('/home') ?>">Home</a>
                        </li>
                        <li>
                            <span>Aduan Masyarakat</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="project-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="details-item">
                    <div class="details-img">
                        <img src="<?php echo base_url()?>gambar/gambar.jpg" alt="Details">
                        <h2><?= $aduan['subjek'] ?></h2>
                        <p><?= $aduan['isian'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="details-right">
                    <div class="details-info">
                        <ul>
                            <li>
                                <i class='bx bx-user'></i>
                                <h3>Jenis Aduan:</h3>
                                <span><?= $aduan['nama_jenis_aduan'] ?></span>
                            </li>
                            <li>
                                <i class='bx bx-calendar'></i>
                                <h3>Tanggal Kejadian:</h3>
                                <span><?= date('d F, Y', strtotime($aduan['tanggal_kejadian'])); ?></span>
                            </li>
                            <li>
                                <i class='bx bx-current-location'></i>
                                <h3>Lokasi:</h3>
                                <span><?= $aduan['lokasi'] ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>