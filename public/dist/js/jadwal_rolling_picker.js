/*FormPicker Init*/

$(document).ready(function() {
	"use strict";
    var today = new Date();

    var targetYear = today.getFullYear(); // Tahun target awal
    var targetMonth = 5; // 5 merepresentasikan bulan Juni (mulai dari 0)
    var targetDay = 30;

    // Cek apakah tanggal hari ini sudah mencapai atau melampaui 30 Juni di tahun ini
    if (today.getMonth() > targetMonth || (today.getMonth() === targetMonth && today.getDate() >= targetDay)) {
        // Jika iya, tambahkan satu tahun
        targetYear++;
    }

    var lastDayOfMonth = new Date(targetYear, targetMonth, targetDay);

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

	$(document).ready(function() {
		var rowCounter = 2; // Dimulai dari 2 karena baris pertama sudah ada

		// Fungsi untuk menambah baris
		$("#addrow").click(function(event) {
			event.preventDefault();
			var item = $(this).closest('.jadwal-item');
			var newItem = item.clone(true, true);
			var newRow = $(newItem);

			// Inisialisasi DateTimePicker untuk elemen input dalam baris baru
			newRow.find('.input-group.date').each(function(index) {
				var inputId = 'datetimepicker' + rowCounter + '-' + index;
				$(this).attr('id', inputId);
				$(this).find('input').datetimepicker({
					format: 'HH:mm',
					useCurrent: false,
					icons: {
						time: "fa fa-clock-o",
						date: "fa fa-calendar",
						up: "fa fa-arrow-up",
						down: "fa fa-arrow-down"
					}
				});
			});

			// Tambahkan ikon "fa-trash" untuk menghapus baris
			var removeIcon = '<a href="#" class="text-danger text-center removeRow"><i class="fa fa-trash"></i></a>';
			newRow.find('.text-center.vertical-align-middle').html(removeIcon);

			// Hapus class 'addrow' pada elemen tindakan
			newRow.find('.removeRow').removeClass('text-primary');

			$("#rolling").append(newRow);

			rowCounter++;
		});


	
		// Fungsi untuk menghapus baris
		$("#rolling").on("click", ".removeRow", function(event) {
			event.preventDefault();
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