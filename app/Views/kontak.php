<?php echo $this->extend('komponen/layout') ?>
<?php echo $this->section('content'); ?>
<!-- Page Title -->
<div class="page-title-area">
    <div class="bg-text">
        <span>Kontak<br>Kontak<br>Kontak<br>DpmPtsp</span>
    </div>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-item">
                    <h2>Kontak</h2>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('/') ?>">Home</a>
                        </li>
                        <li>
                            <span>Kontak</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title -->

<!-- Contact -->
<div class="contact-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h2>Alamat</h2>
            <p>Jl. Poros Langara-Lampeapi Km.3</p>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2366.480257101516!2d122.99046799787898!3d-4.034803577734934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1544884496046" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

    </div>
</div>
<!-- End Contact -->

<!-- Contact Info -->
<div class="contact-info-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="info-item">
                <h2>Kontak Dengan Nomor Telepon atau Alamat Email
                </h2>
                <ul class="mail-call">
                    <li>
                        <a href="tel:+04013129641">(0401) 3129641</a>
                    </li>
                    <li>
                        <a href="mailto:dpmptspkonkep@gmail.com">dpmptspkonkep@gmail.com</a>
                    </li>
                </ul>
                <ul class="social-item">
                    <li>
                        <a href="#" target="_blank">
                            <i class='bx bxl-facebook'></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class='bx bxl-twitter'></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class='bx bxl-instagram'></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class='bx bxl-pinterest-alt'></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class='bx bxl-youtube'></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Contact Info -->
<?php echo $this->endSection(); ?>