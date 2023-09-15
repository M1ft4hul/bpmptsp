<?php echo $this->extend('komponen/layout') ?>
<?php echo $this->section('content'); ?>
<!-- isi -->
<div class="page-title-area">
    <div class="bg-text">
        <span>Moto<br>dan<br>Tujuan<br>OPD</span>
    </div>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-item">
                    <h2>Moto & Tujuan OPD</h2>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('/home') ?>">Home</a>
                        </li>
                        <li>
                            <span>Moto & Tujuan OPD</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="design-area two pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-11">
                <div class="design-content">
                    <div class="section-title two">
                        <img src="<?php echo base_url() ?>assetsa/img/it-startup/baner.jpg" alt="Design">
                        <br><br>
                        <span class="sub-title">Moto & Tujuan OPD</span>
                        <h2>DPMPTSP</h2>
                    </div>
                    <p>
                    <h3>Visi</h3>
                    "Menjadi lembaga yang mampu mewujudkan penanaman modal yang berdaya saing menuju Riau sebagai daerah tujuan investasi"
                    </p>
                    <h3>Misi</h3>
                    <ul>
                        <li>
                            <i class="flaticon-checkmark"></i>
                            <h6> Mewujudkan iklim penanaman modal yang kondusif</h6>
                        </li>
                        <li>
                            <i class="flaticon-checkmark"></i>
                            <h6> Meningkatkan daya tarik penanaman modal</h6>
                        </li>
                        <li>
                            <i class="flaticon-checkmark"></i>
                            <h6> Mewujudkan pelayanan terpadu satu pintu yang prima</h6>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-lg-6">
                <div class="design-img">
                    <img src="assets/img/it-startup/design1.jpg" alt="Design">
                </div>
            </div> -->
        </div>
    </div>
</section>
<?php echo $this->endSection(); ?>