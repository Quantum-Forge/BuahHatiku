$(function() {
    "use strict";

    // Hapus semua data dan event handler dari DataTable yang sudah ada di tabel dengan ID datable_1
    var table1 = $('#datable_1').DataTable({ destroy: true});
    table1.clear().destroy();

    // Kemudian inisialisasi DataTable yang baru di atas tabel dengan ID datable_1
    $('#datable_1').DataTable({ destroy: true});

    // Inisialisasi DataTable untuk tabel dengan ID datable_2
    $('#datable_2').DataTable({ "lengthChange": false });
});