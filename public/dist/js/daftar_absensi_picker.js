/*FormPicker Init*/

$(document).ready(function() {
	"use strict";
	// Set startDate berdasarkan bulan berjalan
	var today = new Date();
	var startOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
	var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

		/* Daterange picker Init*/
		$('#Tanggal').daterangepicker({
			startDate: startOfMonth,
			endDate: lastDayOfMonth,
			buttonClasses: ['btn', 'btn-sm'],
				   applyClass: 'btn-info',
				   cancelClass: 'btn-default',
				   locale: {
					   format: 'DD/MM/YYYY',
					   language: 'id'
				   }
		   });
	
});