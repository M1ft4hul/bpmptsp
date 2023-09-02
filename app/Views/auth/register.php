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
                                        <h2>Registrasi Perizinan Online</h2>
                                    </div>
                                    <p>Silahkan lengkapi formulir berikut</p>
                                    <form action="<?php echo base_url('/register/add') ?>" method="post" class="needs-validation" novalidate>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <select id="jenisPemohon" name="jenis_pemohon" class="form-select" aria-label="Default select example" required>
                                                    <option value="" disabled selected>Jenis Pemohon</option>
                                                    <option value="Perorangan">Perorangan</option>
                                                    <option value="Perusahaan">Perusahaan</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Jenis Pemohon harus diIsi.
                                                </div>
                                            </div>

                                        </div>
                                        <!-- data perorangan -->
                                        <div id="dataPerorangan" style="display: none;">
                                            <p>Data Pemohon</p>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select class="form-select" name="jenis_identitas" aria-label="Default select example" required>
                                                            <option value="" disabled selected>Jenis Identitas</option>
                                                            <option value="KTP">KTP</option>
                                                            <option value="Paspor">Paspor</option>
                                                            <option value="KartuKeluarga">Kartu Keluarga</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Jenis Identitas harus diIsi.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required>
                                                        <div class="invalid-feedback">
                                                            Nama Lengkap harus diIsi.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="nomor_identitas" placeholder="Nomor Identitas" required>
                                                        <div class="invalid-feedback">
                                                            Nomor Identitas(NIK) harus diIsi.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" name="no_telp" placeholder="+(62)00-0000-0000" required>
                                                        <div class="invalid-feedback">
                                                            No HP/WA Pemohon Harus diIsi.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Alamat Tinggal</p>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select class="form-select" id="prov" name="prov" aria-label="Default select example" required>
                                                            <option value="" disabled selected>-- Pilih Provinsi --</option>
                                                            <!-- </?php foreach ($provinsi as $p) { ?>
                                                                <option value="</?= $p->id ?>"></?= $p->nama ?></option>
                                                            </?php } ?> -->
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Provinsi harus diIsi.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" id="div_kota">
                                                    <div class="form-group">
                                                        <select class="form-select" id="kota" name="kota" aria-label="Default select example" required>

                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Kabupaten/Kota harus diIsi.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" id="div_kec">
                                                    <div class="form-group">
                                                        <select class="form-select" id="kec" name="kec" aria-label="Default select example" required>

                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Kecamatan harus diIsi.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" id="div_desa">
                                                    <div class="form-group">
                                                        <select class="form-select" id="desa" name="desa" aria-label="Default select example" required>

                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Kelurahan/Desa harus diIsi.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" placeholder="Kode Pos" required>
                                                        <div class="invalid-feedback">
                                                            Kode Pos harus diIsi.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" placeholder="RT" required>
                                                        <div class="invalid-feedback">
                                                            RT harus diIsi.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" placeholder="RW" required>
                                                        <div class="invalid-feedback">
                                                            RW harus diIsi.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" cols="30" rows="3" placeholder="Alamat Lengkap" required></textarea>
                                                        <div class="invalid-feedback">
                                                            Alamat Lengkap harus diIsi.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- data perusahaan -->
                                        <div id="dataPerusahaan" style="display: none;">
                                            <p>Data Perusahaan</p>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Nama Perusahaan">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Nama Direktur">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="NPWP Lengkap">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" placeholder="+(62)00-0000-0000">
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Alamat Perusahaan</p>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>-- Pilih Provinsi --</option>
                                                            <option value="1">KTP</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>-- Pilih Kabupaten/Kota --</option>
                                                            <option value="1">KTP</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>-- Pilih Kecamatan --</option>
                                                            <option value="1">KTP</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>-- Pilih Kelurahan/Desa --</option>
                                                            <option value="1">KTP</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" placeholder="Kode Pos">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" placeholder="RT">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" placeholder="RW">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Alamat Perusahaan"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <p>Data Login</p>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="Email Anda">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" placeholder="Masukkan Kata Sandi">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="password_konfirm" class="form-control" placeholder="Ulangi Kata Sandi">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn">Daftar</button>
                                        </div>
                                    </form>
                                    <div class="bottom">
                                        <p>Sudah Punya akun? <a href="<?php echo base_url('/login') ?>">Login</a></p>
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
        const jenisPemohonSelect = document.getElementById('jenisPemohon');
        const dataPerorangan = document.getElementById('dataPerorangan');
        const dataPerusahaan = document.getElementById('dataPerusahaan');

        jenisPemohonSelect.addEventListener('change', function() {
            if (jenisPemohonSelect.value === 'Perorangan') {
                dataPerorangan.style.display = 'block';
                dataPerusahaan.style.display = 'none';
            } else if (jenisPemohonSelect.value === 'Perusahaan') {
                dataPerorangan.style.display = 'none';
                dataPerusahaan.style.display = 'block';
            } else {
                dataPerorangan.style.display = 'none';
                dataPerusahaan.style.display = 'none';
            }
        });

        // masalah bikin berat ini nih


        // $(document).ready(function() {

        //     $('#prov').on('change', function() {

        //         var id_prov = $(this).val();
        //         // AJAX request
        //         $.ajax({
        //             async: true,
        //             url: 'kota',
        //             method: 'get',
        //             data: {
        //                 id: id_prov,
        //                 // [csrfName]: csrfHash
        //             },
        //             dataType: 'json',
        //             success: function(response) {
        //                 $("#div_kota").show();
        //                 $("#kota").html(response.kota);
        //                 $("#kec").html(response.kec);
        //                 $("#desa").html(response.desa);
        //             }
        //         });
        //     });

        //     $('#kota').on('change', function() {

        //         var id_kota = $(this).val();
        //         // AJAX request
        //         $.ajax({
        //             async: true,
        //             url: 'kec',
        //             method: 'get',
        //             data: {
        //                 id: id_kota,
        //             },
        //             dataType: 'json',
        //             success: function(response) {
        //                 $("#div_kec").show();
        //                 $("#kec").html(response.kec);
        //                 $("#desa").html(response.desa);
        //             }
        //         });
        //     });

        //     $('#kec').on('change', function() {

        //         var id_kec = $(this).val();
        //         // AJAX request
        //         $.ajax({
        //             async: true,
        //             url: 'desa',
        //             method: 'get',
        //             data: {
        //                 id: id_kec,
        //             },
        //             dataType: 'json',
        //             success: function(response) {
        //                 $("#div_desa").show();
        //                 $("#desa").html(response.desa);
        //             }
        //         });
        //     });

        //     $('#desa').on('change', function() {
        //     });
        // });
    </script>

    <!-- <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script> -->
</body>

</html>