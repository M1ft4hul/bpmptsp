<?php echo $this->extend('komponen/layout') ?>
<?php echo $this->section('content'); ?>
<!-- Page Title -->
<div class="page-title-area">
    <div class="bg-text">
        <span>Kuesioner<br>Survei<br>Kepuasan<br>Masyarakat</span>
    </div>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-item">
                    <h2>Kuesioner Survei Kepuasan Masyarakat</h2>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('/home') ?>">Home</a>
                        </li>
                        <li>
                            <span>Kuesioner SKM</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title -->
<div class="contact-area ptb-100">
    <div class="container">
        <!-- alert -->
        <?php session()->getFlashdata('errors');

        if (session()->getFlashdata('pesanku')) {
            echo '<div id="alert" class="alert alert-warning alert-dismissible fade show">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
            </svg>
            <strong> Berhasil! </strong>';

            echo session()->getFlashdata('pesanku');
            echo '</div>';
        }

        ?>
        <!-- alert -->

        <form action="<?php echo base_url('/proses/add') ?>" method="post" class="row g-3">
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Tanggal Survei</label>
                <input type="text" value="<?= $kuesioner['tgl_survei']; ?>" class="form-control" id="inputEmail4" readonly>
            </div>
            <div class="col-md-4">
                <input type="hidden" name="id_kuesioner" value="<?= $kuesioner['id_kuesioner']; ?>">
                <label for="inputPassword4" class="form-label">Nama Panjang</label>
                <input type="text" name="nama" class="form-control" id="inputPassword4">
            </div>
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Nomor Whatsapp</label>
                <input type="number" name="wa" class="form-control" id="inputPassword4">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<?php echo $this->endSection(); ?>