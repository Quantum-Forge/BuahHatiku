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
		/* Daterange picker Init*/
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
	
});