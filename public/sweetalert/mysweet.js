const Sweetalert = $('.sweetalert').data('sweetalert');
// console.log(Sweetalert);

if (Sweetalert) {
    Swal.fire({
        title: 'Terkirim!',
        text: Sweetalert,
        type: 'success'
    });
}

// hapus

$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "data akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});