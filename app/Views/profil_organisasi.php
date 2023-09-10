<?php echo $this->extend('komponen/layout') ?>
<?php echo $this->section('content'); ?>
<div class="page-title-area">
    <div class="bg-text">
        <span>Struktur<br>Struktur Organisasi<br>Organisasi<br>DPMPTSP</span>
    </div>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-item">
                    <h2>Struktur Organisasi</h2>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('/home') ?>">Home</a>
                        </li>
                        <li>
                            <span>Struktur Organisasi</span>
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
                        <span class="sub-title">Struktur Organisasi</span>
                        <h2>DPMPTSP</h2>
                    </div>
                    <p>
                        Susunan Organisasi Badan Pelayanan Perizinan Terpadu satu pintu dan Penanaman Modal Daerah Kabupaten Konawe Kepulauan terdiri dari :
                    </p>
                    <ol type='a'>
                        <li>Kepala Badan;</li>
                        <li>Sekretaris;
                            <ol type='a'>
                                <li>Sub Bagian Umum Dan Kepegawaian;</li>
                                <li>Sub Bagian Perencanaan;</li>
                                <li>Sub Bagian Keuangan;</li>
                            </ol>
                        </li>
                        <li>Bidang Pelayanan Perizinan;
                            <ol type='a'>
                                <li>Sub bidang Penetapan;</li>
                                <li>Sub bidang Pengelolaan Adm. Perizinan;</li>
                            </ol>
                        </li>
                        <li>Bidang Penanaman Modal;
                            <ol type='a'>
                                <li>Sub. Bidang Kerja sama Promosi dan Penanaman Modal;</li>
                                <li>Sub Bidang Pengembangan Penanaman Modal;</li>
                            </ol>
                        </li>
                        <li>Bidang Data Pengendalian dan Pengawasan;
                            <ol type='a'>
                                <li>Sub. Bidang data dan Informasi;</li>
                                <li>Sub Bidang Pengendalian dan Pengawasan.</li>
                            </ol>
                        </li>
                        <li>Bidang Penyuluhan dan Pengaduan;
                            <ol type='a'>
                                <li>Sub Bidang Penyuluhan;</li>
                                <li>Sub Bidang Pengaduan.</li>
                            </ol>
                        </li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->endSection(); ?>