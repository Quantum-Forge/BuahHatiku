/*Export Table Init*/

"use strict"; 

$(document).ready(function() {
	$('#export-table').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'excel', 'pdf'
		]
	} );
} );