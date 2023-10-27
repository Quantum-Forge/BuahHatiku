/*Export Table Init*/

"use strict"; 

$(document).ready(function() {
	$('#export-table, #senin_table, #selasa_table, #rabu_table, #kamis_table, #jumat_table, #sabtu_table').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'excel', 'pdf'
		]
	} );
} );