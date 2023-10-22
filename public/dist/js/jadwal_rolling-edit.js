/*FormPicker Init*/

$(document).ready(function() {
	"use strict";
	/* Datetimepicker Init*/
	$('#Tanggal').datetimepicker({
		format: 'DD/MM/YYYY',
		useCurrent: true,
		icons: {
			time: "fa fa-clock-o",
			date: "fa fa-calendar",
			up: "fa fa-arrow-up",
			down: "fa fa-arrow-down"
		}
	}).on('dp.change', function(e) {
		if (e.date === null) {
			$(this).data("DateTimePicker").date(moment());
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
