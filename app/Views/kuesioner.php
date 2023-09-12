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
        <div class="section-title">
            <h4>KUESIONER <br>
                SURVEI KEPUASAN MASYARAKAT <br>
                UNIT LAYANAN PENANAMAN MODAL PELAYANAN TERPADU SATU PINTU (PTSP) <br>
                KABUPATEN KONAWE KEPULAUAN
            </h4>
        </div>
        <div class="garis"></div>

        <div class="col-lg-12 col-md-6">
            <div style="margin-bottom: 100px;" class="icon-text layout-6 wow flipInX">
                <form action="<?php echo base_url('/add') ?>" method="post" class="row">

                    <div class="col">
                        <table>
                            <tr>
                                <td>Tanggal Survei : </td>
                                <td></td>
                                <td>
                                    Jam Survei :
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<?php echo $this->endSection(); ?>