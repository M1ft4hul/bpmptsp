<?php echo $this->include('komponen/head') ?>

<body>
    <div class="sweetalert" data-sweetalert="<?php echo session()->get('pesan'); ?>"></div>
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

    <!-- Start Navbar Area -->
    <?php echo $this->include('komponen/menu') ?>
    <!-- End Navbar Area -->

    <!-- isi -->
    <?php echo $this->renderSection('content') ?>
    <!-- isi -->

    <!-- footer -->
    <?php echo $this->include('komponen/footer') ?>
    <!-- end footer -->

    <!-- Go Top -->
    <div class="go-top">
        <i class='bx bx-up-arrow'></i>
        <i class='bx bx-up-arrow'></i>
    </div>
    <!-- End Go Top -->
    <?php echo $this->include('komponen/script') ?>