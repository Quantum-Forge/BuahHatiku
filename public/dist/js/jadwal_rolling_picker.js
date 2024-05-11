/*FormPicker Init*/
$(document).ready(function() {
	"use strict";
    var today = new Date();
	// Set startDate berdasarkan bulan berjalan
	var startOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);

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
	var filterStartDate = startOfMonth;
	var filterEndDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);;
	if($('#TanggalFilter').val()){
		var tanggal = $('#TanggalFilter').val().split(' - ');
		filterStartDate = tanggal[0];
		filterEndDate = tanggal[1];
	}
	$('#TanggalFilter').daterangepicker({
		startDate: filterStartDate,
		endDate: filterEndDate,
		buttonClasses: ['btn', 'btn-sm'],
		applyClass: 'btn-info',
		cancelClass: 'btn-default',
		locale: {
			format: 'DD/MM/YYYY',
			language: 'id'
		}
	});
	// Inisialisasi datetimepicker untuk elemen-elemen yang sesuai
	$(document).ready(function() {
		// Inisialisasi datetimepicker pada card pertama
		$('#WaktuStart, #WaktuSelesai').datetimepicker({
		  format: 'HH:mm',
		  useCurrent: false,
		  icons: {
			time: "fa fa-clock-o",
			date: "fa fa-calendar",
			up: "fa fa-arrow-up",
			down: "fa fa-arrow-down"
		  }
		});
	  
		var cardCount = 1; // Inisialisasi jumlah card
	
		// Add card when the "Add" button is clicked
		$(document).on('click', '.add-card', function(e) {
		  e.preventDefault(); // Prevent the default form submission
		  var clonedCard = $('#jadwal-rolling').clone(); // Clone the original card
		  clonedCard.find('input, select').val(''); // Clear input and select values in the cloned card
	  
		  // Update datetimepicker IDs
		  clonedCard.find('[id^="WaktuStart"]').each(function() {
			var currentId = $(this).attr('id');
			var newId = currentId.replace('WaktuStart', 'datetimepicker' + cardCount + '-0');
			$(this).attr('id', newId);
		  });
	  
		  clonedCard.find('[id^="WaktuSelesai"]').each(function() {
			var currentId = $(this).attr('id');
			var newId = currentId.replace('WaktuSelesai', 'datetimepicker' + cardCount + '-1');
			$(this).attr('id', newId);
		  });
	  
		  // Set display to - for both buttons
		  clonedCard.find('.add-card, .remove-card').css('display', '');
		  $('#jadwal-container').append(clonedCard); // Append the cloned card to the container
	  
		  // Inisialisasi datetimepicker pada card yang baru ditambahkan
		  $('#jadwal-container').find('[id^="datetimepicker' + cardCount + '"]').datetimepicker({
			format: 'HH:mm',
			useCurrent: false,
			icons: {
			  time: "fa fa-clock-o",
			  date: "fa fa-calendar",
			  up: "fa fa-arrow-up",
			  down: "fa fa-arrow-down"
			}
		  });
	  
		  cardCount++; // Increment the card count
		});
	  
		// Remove card when the "Remove" button is clicked
		$(document).on('click', '.remove-card', function(e) {
		  e.preventDefault(); // Prevent the default form submission
		  $(this).closest('.panel').remove(); // Remove the closest ancestor with class "panel"
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
			// Menghitung jumlah kotak centang yang tercentang, kecuali kotak centang "checkAllPenjadwalan"
			var checkedCount = $('.checkbox.penjadwalan input[type="checkbox"]:checked:not(#checkAllPenjadwalan)').length;
			// Memperbarui teks di dalam tag <span> dengan ID "checkedCount"
			$('#checkedCount, #checkedCountModal').text('' + checkedCount + '');
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