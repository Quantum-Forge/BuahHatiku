/*FormPicker Init*/

$(document).ready(function() {
	"use strict";
		/* Daterange picker Init*/
		$('#Tanggal').daterangepicker({
			buttonClasses: ['btn', 'btn-sm'],
				   applyClass: 'btn-info',
				   cancelClass: 'btn-default',
				   locale: {
					   format: 'DD/MM/YYYY',
					   language: 'id'
				   }
		   });
	
});