/*FormPicker Init*/

$(document).ready(function() {
	"use strict";
	var today = new Date(); // Get the current date and time
	var sixDaysLater = new Date(today.getTime() + 6 * 24 * 60 * 60 * 1000); // Calculate 7 days in the future
	/* Datetimepicker Init*/
	$('#Tanggal').daterangepicker({
		startDate: today,
		endDate: sixDaysLater,
		buttonClasses: ['btn', 'btn-sm'],
			   applyClass: 'btn-info',
			   cancelClass: 'btn-default',
			   locale: {
				   format: 'DD/MM/YYYY',
				   language: 'id'
			   }
	   });

	$('#WaktuMulai').datetimepicker({
		format: 'HH:mm',
		useCurrent: false,
		icons: {
				time: "fa fa-clock-o",
				date: "fa fa-calendar",
				up: "fa fa-arrow-up",
				down: "fa fa-arrow-down"
			},
	}).data("DateTimePicker").date(moment());

	$('#WaktuSelesai').datetimepicker({
		format: 'HH:mm',
		useCurrent: false,
		icons: {
				time: "fa fa-clock-o",
				date: "fa fa-calendar",
				up: "fa fa-arrow-up",
				down: "fa fa-arrow-down"
			},
	}).data("DateTimePicker").date(moment());
	
});
