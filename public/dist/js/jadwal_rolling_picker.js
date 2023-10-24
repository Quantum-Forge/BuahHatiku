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

	// Inisialisasi datetimepicker untuk elemen-elemen yang sesuai
	$('#SeninStart, #SelasaStart, #RabuStart, #KamisStart, #JumatStart, #SabtuStart').datetimepicker({
		format: 'HH:mm',
		useCurrent: false,
		icons: {
			time: "fa fa-clock-o",
			date: "fa fa-calendar",
			up: "fa fa-arrow-up",
			down: "fa fa-arrow-down"
		}
	});

	// Mengatur nilai awal input dengan waktu saat ini
	// $('#SeninStart, #SelasaStart, #RabuStart, #KamisStart, #JumatStart, #SabtuStart').find('input').val(moment().format('LT'));


	$('#SeninSelesai, #SelasaSelesai, #RabuSelesai, #KamisSelesai, #JumatSelesai, #SabtuSelesai').datetimepicker({
		format: 'HH:mm',
		useCurrent: false,
		icons: {
			time: "fa fa-clock-o",
			date: "fa fa-calendar",
			up: "fa fa-arrow-up",
			down: "fa fa-arrow-down"
		}
	});

	// Mengatur nilai awal input dengan waktu saat ini
	// $('#SeninSelesai, #SelasaSelesai, #RabuSelesai, #KamisSelesai, #JumatSelesai, #SabtuSelesai').find('input').val(moment().format('LT'));
	 
	$(document).ready(function() {
		// Handler untuk kotak centang "Check All"
		$('#checkAll').change(function() {
			var isChecked = $(this).prop('checked');
			// Mengatur status kotak centang pada semua kotak centang anak dalam tabel
			$('.checkbox input[type="checkbox"]').prop('checked', isChecked);
		});
		
		// Handler untuk kotak centang anak
		$('.checkbox input[type="checkbox"]').change(function() {
			// Periksa apakah semua kotak centang anak telah dipilih
			var allChecked = $('.checkbox input[type="checkbox"]').not('#checkAll').get().every(function(checkbox) {
				return $(checkbox).prop('checked');
			});
			// Mengatur status kotak centang "Check All" berdasarkan kotak centang anak
			$('#checkAll').prop('checked', allChecked);
		});
	});

	// options untuk delete
	/* delete Init*/
	$('#TanggalDelete').datetimepicker({
		format: 'DD/MM/YYYY',
		useCurrent: true,
		icons: {
			time: "fa fa-clock-o",
			date: "fa fa-calendar",
			up: "fa fa-arrow-up",
			down: "fa fa-arrow-down"
		}
	}).data("DateTimePicker").date(moment());

});
// Clear null di waktu
function submitForm() {
	const form = document.getElementById('jadwal_rolling_form');
	const inputFields = form.querySelectorAll('input');
	
	for (let inputField of inputFields) {
		if (inputField.value === "") {
		inputField.removeAttribute("name");
		}
	}
	
	form.submit();
}