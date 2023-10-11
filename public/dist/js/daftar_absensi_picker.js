/*FormPicker Init*/

$(document).ready(function() {
	"use strict";
	

	 
	// $('#datetimepicker3').datetimepicker({
	// 		format: 'DD-MM-YYYY',
	// 		inline:true,
	// 		sideBySide: true,
	// 		icons: {
    //                 time: "fa fa-clock-o",
    //                 date: "fa fa-calendar",
    //                 up: "fa fa-arrow-up",
    //                 down: "fa fa-arrow-down"
    //             },
	// }); 

	// $('#datetimepicker4').datetimepicker({
	// 		inline:true,
	// 		sideBySide: true,
	// 		useCurrent: false,
	// 		icons: {
    //                 time: "fa fa-clock-o",
    //                 date: "fa fa-calendar",
    //                 up: "fa fa-arrow-up",
    //                 down: "fa fa-arrow-down"
    //             },
	// }).data("DateTimePicker").date(moment());
	
	/* Daterange picker Init*/
	var today = new Date();
	var threeDaysAgo = new Date(today.getTime() - 3 * 24 * 60 * 60 * 1000);

	$('#Tanggal').daterangepicker({
	startDate: threeDaysAgo,
	endDate: today,
	format:'DD/MM/YYYY',
	buttonClasses: ['btn', 'btn-sm'],
	applyClass: 'btn-info',
	cancelClass: 'btn-default'
	});
	// $('.input-daterange-timepicker').daterangepicker({
	// 	timePicker: true,
	// 	format: 'MM/DD/YYYY h:mm A',
	// 	timePickerIncrement: 30,
	// 	timePicker12Hour: true,
	// 	timePickerSeconds: false,
	// 	buttonClasses: ['btn', 'btn-sm'],
	// 	applyClass: 'btn-info',
	// 	cancelClass: 'btn-default'
	// });
	// $('#Tanggal').daterangepicker({
	// 	format: 'MM/DD/YYYY',
	// 	minDate: 'threeDaysAgo',
	// 	maxDate: '06/30/2015',
	// 	buttonClasses: ['btn', 'btn-sm'],
	// 	applyClass: 'btn-info',
	// 	cancelClass: 'btn-default',
	// 	dateLimit: {
	// 		days: 6
	// 	}
	// });
});