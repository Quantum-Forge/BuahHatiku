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
        var rowCounter = 2; // Mulai dari 2 karena baris awal sudah ada

        var rowTemplate = '<tr>' +
            '<td><div class="form-group mb-0"><select name="" id="" class="form-control"><option value="">Senin</option><option value="">Selasa</option><option value="">Rabu</option><option value="">Kamis</option><option value="">Jumat</option><option value="">Sabtu</option></select></div></td>' +
            '<td><div class="form-group mb-0"><div class="input-group date" id="datetimepicker' + rowCounter + '"><span class="input-group-addon"><span class="fa fa-clock-o"></span></span><input type="text" class="form-control datetimepicker" placeholder="Isi Waktu Mulai..." name="WaktuMulai[]" value=""></div></div></td>' +
            '<td><div class="form-group mb-0"><div class="input-group date" id="datetimepicker' + rowCounter + '"><span class="input-group-addon"><span class="fa fa-clock-o"></span></span><input type="text" class="form-control datetimepicker" placeholder="Isi Waktu Selesai..." name="WaktuSelesai[]" value=""></div></div></td>' +
            '<td><div class="form-group mb-0"><select class="form-control" name="NoIdentitas" data-placeholder="Choose Terapis" tabindex=""><option disabled selected>Choose..</option></select></div></td>' +
            '<td><div class="form-group mb-0"><select class="form-control" name="IdAnak"><option disabled selected>Choose..</option></select></div></td>' +
            '<td class="text-center vertical-align-middle"><a href="#" class="text-danger text-center removeRow"><i class="fa fa-trash"></i></a></td>' +
            '</tr>';

        // Fungsi untuk menambah baris
        $("#addrow").click(function(event) {
            event.preventDefault();

			var item = $(this).closest('.jadwal-item');
			var newItem = item.clone(true, true);
			var newRow = $(newItem);

			var waktu = newRow.find('.date');
			waktu.eq(0).prop('id', 'datetimepicker' + rowCounter);
			waktu.eq(1).prop('id', 'datetimepicker' + rowCounter);
			
			var action_row = newRow.find('#addrow');
			action_row.prop('class', 'text-danger text-center removeRow');
			action_row.find('.fa-plus').prop('class', 'fa fa-trash');
			action_row.prop('id', '');

            // var newRow = $(rowTemplate);

            // Inisialisasi DateTimePicker untuk elemen input dalam baris baru
            newRow.find('.date').datetimepicker({
                format: 'HH:mm',
                useCurrent: false,
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });

            $("#rolling").append(newRow);

            rowCounter++;
        });

        // Fungsi untuk menghapus baris
        $("#rolling").on("click", ".removeRow", function(event) {
            event.preventDefault();
			console.log($(this).closest("tr"));
            $(this).closest("tr").remove();
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