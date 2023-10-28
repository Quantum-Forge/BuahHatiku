/*FormPicker Init*/

$(document).ready(function() {
	"use strict";
	var today = new Date();
	var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0); // Menghitung akhir bulan
	/* Datetimepicker Init */
	$('#Tanggal').daterangepicker({
		startDate: today,
		endDate: lastDayOfMonth,
		buttonClasses: ['btn', 'btn-sm'],
		applyClass: 'btn-info',
		cancelClass: 'btn-default',
		locale: {
			format: 'DD/MM/YYYY',
			language: 'id'
		}
	});


	// Inisialisasi datetimepicker untuk elemen-elemen yang sesuai
	$('#WaktuStart').datetimepicker({
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

	
	$('#WaktuSelesai').datetimepicker({
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
		var rowCounter = 1; // Mulai dari 1 karena baris awal sudah ada
		var datetimepickerCounter = 2; // Mulai dari 2 karena ada 1 datetimepicker awal
		var rowTemplate = '<tr>' +
            '<td><div class="form-group mb-0"><select name="" id="" class="form-control"><option value="">Senin</option><option value="">Selasa</option><option value="">Rabu</option><option value="">Kamis</option><option value="">Jumat</option><option value="">Sabtu</option></select></div></td>' +
            '<td><div class="form-group mb-0"><div class="input-group date" id="datetimepicker' + rowCounter + '"><span class="input-group-addon"><span class="fa fa-clock-o"></span></span><input type="text" class="form-control datetimepicker" placeholder="Isi Waktu Mulai..." name="WaktuMulai[]" value=""></div></div></td>' +
            '<td><div class="form-group mb-0"><div class="input-group date" id="datetimepicker' + rowCounter + '"><span class="input-group-addon"><span class="fa fa-clock-o"></span></span><input type="text" class="form-control datetimepicker" placeholder="Isi Waktu Selesai..." name="WaktuSelesai[]" value=""></div></div></td>' +
            '<td><div class="form-group mb-0"><select class="form-control" name="NoIdentitas" data-placeholder="Choose Terapis" tabindex=""><option disabled selected>Choose..</option></select></div></td>' +
            '<td><div class="form-group mb-0"><select class="form-control" name="IdAnak"><option disabled selected>Choose..</option></select></div></td>' +
            '<td class="text-center vertical-align-middle"><a href="#" id="addrowClone" class="text-primary mr-10"><i class="fa fa-plus"></i></a><a href="#" class="text-danger text-center removeRow"><i class="fa fa-trash"></i></a></td>' +
            '</tr>';
		 // Fungsi untuk menambah baris
		 function addRow() {
			var newRow = $(rowTemplate);
	
			// Ganti ID yang dihasilkan dengan yang unik
			var datetimepickers = newRow.find('.input-group.date');
			datetimepickers.each(function(index) {
				var newId = 'datetimepicker' + datetimepickerCounter++;
				$(this).attr('id', newId);
			});
	
			// Ganti class dan ikon aksi dengan yang benar
			var actionRow = newRow.find('.text-center.removeRow');
			actionRow.removeClass('text-primary').addClass('text-danger');
			actionRow.find('i').removeClass('fa-plus').addClass('fa-trash');
	
			// Inisialisasi DateTimePicker untuk elemen input dalam baris baru
			newRow.find('.input-group.date').datetimepicker({
				format: 'HH:mm',
				useCurrent: false,
				icons: {
					time: "fa fa-clock-o",
					date: "fa fa-calendar",
					up: "fa fa-arrow-up",
					down: "fa fa-arrow-down"
				}
			});
	
			// Tambahkan baris baru ke dalam tabel
			$("#rolling").append(newRow);
		}
	
		// Fungsi untuk menghapus baris
		$("#rolling").on("click", ".removeRow", function(event) {
			event.preventDefault();
			console.log($(this).closest("tr"));
			$(this).closest("tr").remove();
		});
	
		// Tambahkan event click ke elemen "#addrow"
		$("#addrow").click(function(event) {
			event.preventDefault();
			addRow();
		});
	
		// Tambahkan event click ke elemen "#addrow" di baris awal
		$("#rolling").on("click", "#addrowClone", function(event) {
			event.preventDefault();
			addRow();
		});
	});
	

	$(document).ready(function() {
		// Handler untuk kotak centang "Check All"
		$('#checkAllPenjadwalan').change(function() {
			var isChecked = $(this).prop('checked');
			// Mengatur status kotak centang pada semua kotak centang anak dalam tabel
			$('.checkbox.penjadwalan input[type="checkbox"]').prop('checked', isChecked);
		});
		
		// Handler untuk kotak centang anak
		$('.checkbox.penjadwalan input[type="checkbox"]').change(function() {
			// Periksa apakah semua kotak centang anak telah dipilih
			var allChecked = $('.checkbox.penjadwalan input[type="checkbox"]').not('#checkAllPenjadwalan').get().every(function(checkbox) {
				return $(checkbox).prop('checked');
			});
			// Mengatur status kotak centang "Check All" berdasarkan kotak centang anak
			$('#checkAllPenjadwalan').prop('checked', allChecked);
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