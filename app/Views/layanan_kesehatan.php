<?php echo $this->extend('komponen/layout') ?>
<?php echo $this->section('content'); ?>
<div class="page-title-area">
    <div class="bg-text">
        <span>Layanan<br>Permohonan<br>Izin<br>DPMPTSP</span>
    </div>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-item">
                    <h2>Layanan Permohonan Izin</h2>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('/home') ?>">Home</a>
                        </li>
                        <li>
                            <span>Layanan Permohonan Izin</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="service-area ptb-100">
    <div class="container">
        <div class="row">
            <form action="<?php echo base_url('/perizinan/store') ?>" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Perizinan</label>
                    <div class="col-sm-4">
                        <select name="jenisizin_id" class="form-select" aria-label="Default select example" id="jenisizin">
                            <option selected disabled>Pilih Jenis Perizinan</option>

                            <?php foreach ($izin as $sektor => $perizinan) : ?>
                                <optgroup label="<?= $sektor; ?>">
                                    <?php foreach ($perizinan as $a) : ?>
                                        <option value="<?= $a['id_perizinan']; ?>"><?= $a['nama_perizinan']; ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Formulir Perizinan</label>
                    <div class="col-sm-4">
                        <select class="form-select" aria-label="Default select example" id="formulir">
                            <option selected disabled>Pilih Jenis Formulir Perizinan</option>
                            <?php
                            $daftarFormulir = [
                                'izin_praktik_gigi_mulut.php' => 'Izin Praktik Trapis Gigi dan Mulut',
                                'izin_fisiotrapi.php' => 'Izin Fisiotrapi',
                            ];

                            foreach ($daftarFormulir as $filename => $formulirName) {
                                echo "<option value='{$filename}' data-url='{$filename}'>{$formulirName}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3" id="formulir-container">
                    <!-- formulir yang ditampilkan di sini. -->
                </div>
                <button class="btn btn-primary" type="submit">Kirim Perizinan</button>
            </form>
        </div>
    </div>
</section>
<?php echo $this->endSection(); ?>