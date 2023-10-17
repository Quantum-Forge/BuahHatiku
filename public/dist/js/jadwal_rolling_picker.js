/*FormPicker Init*/

$(document).ready(function() {
	"use strict";
	
	/* Bootstrap Colorpicker Init*/
	$('.colorpicker').colorpicker();

	$('.colorpicker-rgb').colorpicker({
		color: '#AA3399',
		format: 'rgba'
	});

	$('.colorpicker-inline').colorpicker({
		color: '#ffaa00',
		container: true,
		inline: true
	});
	
	/* Datetimepicker Init*/
	$('#TglLahir, #TglLahirOrtu, #Tanggal, #TanggalMasuk').datetimepicker({
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
	

	$('#WaktuMulai').datetimepicker({
			format: 'LT',
			useCurrent: false,
			icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
		}).data("DateTimePicker").date(moment());

		$('#WaktuSelesai').datetimepicker({
			format: 'LT',
			useCurrent: false,
			icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
		}).data("DateTimePicker").date(moment());
	 
	
});