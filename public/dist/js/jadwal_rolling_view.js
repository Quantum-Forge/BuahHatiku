/*FormPicker Init*/
$(document).ready(function() {
	"use strict";
    var today = new Date();
	// Set startDate berdasarkan bulan berjalan
	var startOfWeek = new Date(today);
	startOfWeek.setDate(today.getDate() - today.getDay() + 1);
	var endOfWeek = new Date(startOfWeek);
	endOfWeek.setDate(endOfWeek.getDate() + 14);

    /* Datetimepicker Init */
	var filterStartDate = startOfWeek;
	var filterEndDate = endOfWeek;
	if($('#TanggalFilter').val()){
		var tanggal = $('#TanggalFilter').val().split(' - ');
		filterStartDate = tanggal[0];
		filterEndDate = tanggal[1];
	}
	$('#TanggalFilter').daterangepicker({
		startDate: filterStartDate,
		endDate: filterEndDate,
		buttonClasses: ['btn', 'btn-sm'],
		applyClass: 'btn-info',
		cancelClass: 'btn-default',
		locale: {
			format: 'DD/MM/YYYY',
			language: 'id'
		}
	});
	
});