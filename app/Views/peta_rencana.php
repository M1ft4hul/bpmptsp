<?php echo $this->extend('komponen/layout') ?>
<?php echo $this->section('content'); ?>
<!-- Page Title -->
<div class="page-title-area">
    <div class="bg-text">
        <span>Peta<br>Rencana<br>Detail<br>Konkep</span>
    </div>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-item">
                    <h2>Peta Rencana Detail Tata Ruang Kab Konkep</h2>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('/home') ?>">Home</a>
                        </li>
                        <li>
                            <span>Peta Rencana</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title -->
<div class="portfolio-area two ptb-100">
    <div class="container">
        <div class="row">
            <img src="<?php echo base_url()?>Lampiran_Peta_Penetapan_Deliniasi_RDTR_Langara_FIX-1.png" alt="">
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>