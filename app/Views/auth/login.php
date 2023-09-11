<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assetsa/css/bootstrap.min.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assetsa/css/meanmenu.css">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assetsa/css/boxicons.min.css">
    <!-- Flaticons CSC -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assetsa/fonts/flaticon.css">
    <!-- Popup CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assetsa/css/magnific-popup.min.css">
    <!-- Odometer CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assetsa/css/odometer.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assetsa/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assetsa/css/owl.theme.default.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assetsa/css/animate.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assetsa/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assetsa/css/responsive.css">
    <!-- Theme Dark CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assetsa/css/theme-dark.css">

    <title>DPM-PTSP NAKERTRANS Kabupaten Konawe Kepulauan</title>

    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assetsa/img/log.png">
</head>

<body>
    <!-- Preloader -->
    <div class="loader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Sign Up -->
    <div class="user-form-area">
        <div class="container-fluid p-0">
            <div class="rows m-0">
                <div class="col-lg-6 p-0">
                    <div class="user-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="user-content-inner">
                                    <div class="top">
                                        <a href="<?php echo base_url('/') ?>">
                                            <img src="<?php echo base_url() ?>assetsa/img/logoptsp.png" class="logo-one" alt="Logo">
                                            <img src="<?php echo base_url() ?>assetsa/img/logoptsp.png" class="logo-two" alt="Logo">
                                        </a>
                                        <h2>Login</h2>
                                    </div>
                                    <!-- alert -->
                                    <?php session()->getFlashdata('errors');

                                    if (session()->getFlashdata('pesan')) {
                                        echo '<div class="alert alert-danger mb-4" role="alert"> 
                                                <strong>GAGAL!</strong> ';
                                        echo session()->getFlashdata('pesan');
                                        echo '</div>';
                                    }

                                    ?>
                                    <!-- alert -->
                                    <?= form_open('Auth/cek_login'); ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Masukkan email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control" placeholder="Masukkan password">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn">Login</button>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                    <div class="bottom">
                                        <!-- <p>Belum Punya akun? <a href="</?php echo base_url('/register') ?>">Register</a></p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sign Up -->


    <!-- Essential JS -->
    <script src="<?php echo base_url() ?>assetsa/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assetsa/js/bootstrap.bundle.min.js"></script>
    <!-- Form Validator JS -->
    <script src="<?php echo base_url() ?>assetsa/js/form-validator.min.js"></script>
    <!-- Contact JS -->
    <script src="<?php echo base_url() ?>assetsa/js/contact-form-script.js"></script>
    <!-- Ajax Chip JS -->
    <script src="<?php echo base_url() ?>assetsa/js/jquery.ajaxchimp.min.js"></script>
    <!-- Meanmenu JS -->
    <script src="<?php echo base_url() ?>assetsa/js/jquery.meanmenu.js"></script>
    <!-- Popup JS -->
    <script src="<?php echo base_url() ?>assetsa/js/jquery.magnific-popup.min.js"></script>
    <!-- Odometer JS -->
    <script src="<?php echo base_url() ?>assetsa/js/odometer.min.js"></script>
    <script src="<?php echo base_url() ?>assetsa/js/jquery.appear.js"></script>
    <!-- Owl Carousel JS -->
    <script src="<?php echo base_url() ?>assetsa/js/owl.carousel.min.js"></script>
    <!-- Thumb Slider JS -->
    <script src="<?php echo base_url() ?>assetsa/js/thumb-slide.js"></script>
    <!-- Wow JS -->
    <script src="<?php echo base_url() ?>assetsa/js/wow.min.js"></script>
    <!-- Custom JS -->
    <script src="<?php echo base_url() ?>assetsa/js/custom.js"></script>

    <script>
        setTimeout(function() {
            var alert = document.getElementById('alert');
            alert.style.display = 'none';
        }, 3000);
    </script>
</body>

</html>