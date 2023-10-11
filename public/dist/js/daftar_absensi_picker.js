/*FormPicker Init*/

$(document).ready(function() {
	"use strict";
	var today = new Date();
	var threeDaysAgo = new Date(today.getTime() - 3 * 24 * 60 * 60 * 1000);
		/* Daterange picker Init*/
		$('#Tanggal').daterangepicker({
			startDate: threeDaysAgo,
			endDate: today,
			buttonClasses: ['btn', 'btn-sm'],
				   applyClass: 'btn-info',
				   cancelClass: 'btn-default',
				   locale: {
					   format: 'DD/MM/YYYY',
					   language: 'id'
				   }
		   });
	
});