$(document).ready(function () {
    // Jumlah item per halaman
    var itemsPerPage = 8;

    // Fungsi untuk menampilkan pertemuan pada halaman yang diberikan
    function displayMeetings(page) {
        var rows = $('#meetingsTable tbody tr');
        var startIndex = (page - 1) * itemsPerPage;
        var endIndex = startIndex + itemsPerPage;

        rows.hide(); // Sembunyikan semua baris

        for (var i = startIndex; i < endIndex; i++) {
            if (rows[i]) {
                $(rows[i]).show(); // Tampilkan baris yang sesuai dengan halaman
            }
        }
    }

    // Fungsi untuk inisialisasi pagination
    function initPagination() {
        var rows = $('#meetingsTable tbody tr');
        var totalRows = rows.length;
        var totalPages = Math.ceil(totalRows / itemsPerPage);

        var paginationElement = $('#pagination');
        paginationElement.empty();

        for (var i = 1; i <= totalPages; i++) {
            var link = $('<a href="#">' + i + '</a>');

            link.on('click', function (event) {
                event.preventDefault();
                var page = parseInt($(this).text());
                displayMeetings(page);
            });

            paginationElement.append(link);
        }

        // Menampilkan halaman pertama saat halaman dimuat
        displayMeetings(1);
    }

    // Memanggil fungsi inisialisasi pagination
    initPagination();
});



// new

$(document).ready(function () {
    // Jumlah item per halaman
    var itemsPerPage = 8;

    // Fungsi untuk menampilkan pertemuan pada halaman yang diberikan
    function displayMeetings(page) {
        var rows = $('#number tbody tr');
        var startIndex = (page - 1) * itemsPerPage;
        var endIndex = startIndex + itemsPerPage;

        rows.hide(); // Sembunyikan semua baris

        for (var i = startIndex; i < endIndex; i++) {
            if (rows[i]) {
                $(rows[i]).show(); // Tampilkan baris yang sesuai dengan halaman
            }
        }
    }

    // Fungsi untuk inisialisasi pagination
    function initPagination() {
        var rows = $('#number tbody tr');
        var totalRows = rows.length;
        var totalPages = Math.ceil(totalRows / itemsPerPage);

        var paginationElement = $('#viewPagination');
        paginationElement.empty();

        for (var i = 1; i <= totalPages; i++) {
            var link = $('<a href="#">' + i + '</a>');

            link.on('click', function (event) {
                event.preventDefault();
                var page = parseInt($(this).text());
                displayMeetings(page);
            });

            paginationElement.append(link);
        }

        // Menampilkan halaman pertama saat halaman dimuat
        displayMeetings(1);
    }

    // Memanggil fungsi inisialisasi pagination
    initPagination();
});