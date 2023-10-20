/*DataTable Init*/

"use strict"; 

$(document).ready(function() {
	"use strict";
	$('#user_view').DataTable({
		paging: true,
		ordering: false,
	});
	$('#datable_1').DataTable();
    $('#datable_2').DataTable({ "lengthChange": false});
} );