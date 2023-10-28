/*DataTable Init*/

"use strict"; 

$(document).ready(function() {
	"use strict";
	$('#jadwal_table').DataTable({"lengthMenu": [ [5, 25, 50, -1], [5, 25, 50, "All"] ],"pageLength": 5,ordering: false});
	$('#user_view').DataTable({paging: true,ordering: false});
	$('#datable_1').DataTable();
    $('#senin_table, #selasa_table, #rabu_table, #kamis_table, #jumat_table, #sabtu_table').DataTable({ "lengthChange": false, ordering:false, pagination:false});
} );
