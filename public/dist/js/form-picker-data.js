/*FormPicker Init*/

$(document).ready(function() {
	"use strict";
	/* Datetimepicker Init*/
	$('#TglLahir, #TglLahirOrtu').datetimepicker({
		format: 'DD/MM/YYYY',
		useCurrent: true,
		defaultDate: moment(),
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
});