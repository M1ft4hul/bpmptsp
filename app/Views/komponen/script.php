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
<!-- <script src="<?php echo base_url() ?>assetsa/js/pagination.js"></script> -->
<!-- Custom JS -->
<script src="<?php echo base_url() ?>assetsa/js/custom.js"></script>
<script src="<?php echo base_url() ?>/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>/sweetalert/mysweet.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable(

            {

                "aLengthMenu": [
                    [5, 10, 25, -1],
                    [5, 10, 25, "All"]
                ],
                "iDisplayLength": 5
            }
        );
    });


    function checkAll(bx) {
        var cbs = document.getElementsByTagName('input');
        for (var i = 0; i < cbs.length; i++) {
            if (cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
            }
        }
    }
</script>

<script>
    const formulirSelect = document.getElementById('formulir');
    const formulirContainer = document.getElementById('formulir-container');

    formulirSelect.addEventListener('change', () => {
        const selectedOption = formulirSelect.options[formulirSelect.selectedIndex];
        const formulirPageUrl = selectedOption.getAttribute('data-url');

        formulirContainer.innerHTML = '';

        if (formulirPageUrl) {
            const formulirControllerUrl = `/izin/${formulirPageUrl}`;
            fetch(formulirControllerUrl)
                .then(response => response.text())
                .then(data => {
                    formulirContainer.innerHTML = data;
                })
                .catch(error => {
                    console.error('Gagal memuat formulir:', error);
                });
        }
    });
</script>


</body>

</html>