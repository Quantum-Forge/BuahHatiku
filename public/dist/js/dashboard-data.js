/*Dashboard Init*/
 
"use strict"; 

/*****Ready function start*****/
$(document).ready(function(){
	$('#statement').DataTable({
		"bFilter": false,
		"bLengthChange": false,
		"bPaginate": false,
		"bInfo": false,
	});
	if( $('#chart_1').length > 0 ){
		var ctx1 = document.getElementById("chart_1").getContext("2d");
		var data1 = {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [
			{
				label: "Hadir",
				backgroundColor: "rgba(60,184,120,0.4)",
				borderColor: "rgba(60,184,120,0.4)",
				pointBorderColor: "rgb(60,184,120)",
				pointHighlightStroke: "rgba(60,184,120,1)",
				data: [
					document.getElementById('hadir_January').getAttribute('data-value'),
					document.getElementById('hadir_February').getAttribute('data-value'),
					document.getElementById('hadir_March').getAttribute('data-value'),
					document.getElementById('hadir_April').getAttribute('data-value'),
					document.getElementById('hadir_May').getAttribute('data-value'),
					document.getElementById('hadir_June').getAttribute('data-value'),
					document.getElementById('hadir_July').getAttribute('data-value')
				]
			},
			{
				label: "Tidak Hadir",
				backgroundColor: "rgba(252,176,59,0.4)",
				borderColor: "rgba(252,176,59,0.4)",
				pointBorderColor: "rgb(252,176,59)",
				pointBackgroundColor: "rgba(252,176,59,0.4)",
				data: [
					document.getElementById('tidak_hadir_January').getAttribute('data-value'),
					document.getElementById('tidak_hadir_February').getAttribute('data-value'),
					document.getElementById('tidak_hadir_March').getAttribute('data-value'),
					document.getElementById('tidak_hadir_April').getAttribute('data-value'),
					document.getElementById('tidak_hadir_May').getAttribute('data-value'),
					document.getElementById('tidak_hadir_June').getAttribute('data-value'),
					document.getElementById('tidak_hadir_July').getAttribute('data-value')
				],
			}
			
		]
		};
		
		var areaChart = new Chart(ctx1, {
			type:"line",
			data:data1,
			
			options: {
				tooltips: {
					mode:"label"
				},
				elements:{
					point: {
						hitRadius:90
					}
				},
				
				scales: {
					yAxes: [{
						stacked: true,
						gridLines: {
							color: "#eee",
						},
						ticks: {
							fontFamily: "Varela Round",
							fontColor:"#2f2c2c"
						}
					}],
					xAxes: [{
						stacked: true,
						gridLines: {
							color: "#eee",
						},
						ticks: {
							fontFamily: "Varela Round",
							fontColor:"#2f2c2c"
						}
					}]
				},
				animation: {
					duration:	3000
				},
				responsive: true,
				maintainAspectRatio:false,
				legend: {
					display: false,
				},
				tooltips: {
					backgroundColor:'rgba(47,44,44,.9)',
					cornerRadius:0,
					footerFontFamily:"'Varela Round'"
				}
				
			}
		});
	}
	if( $('#chart_6').length > 0 ){
		var ctx6 = document.getElementById("chart_6").getContext("2d");
		var jumlah_terapis = document.getElementById('jumlah_terapis').getAttribute('data-value');
		var hadir = document.getElementById('hadir').getAttribute('data-value');
		var tidak_hadir = document.getElementById('tidak_hadir').getAttribute('data-value');
		var data6 = {
			 labels: [
			"Jumlah Terapis",
			"Anak Hadir",
			"Anak Tidak Hadir"
		],
		datasets: [
			{
				data: [jumlah_terapis, hadir, tidak_hadir],
				backgroundColor: [
					"#337ab7",
					"#ea65a2",
					"#f15b26"
				],
				hoverBackgroundColor: [
					"#337ab8",
					"#ea65a3",
					"#f15b27"
				]
			}]
		};
		
		var pieChart  = new Chart(ctx6,{
			type: 'pie',
			data: data6,
			options: {
				animation: {
					duration:	3000
				},
				responsive: true,
				maintainAspectRatio:false,
				legend: {
					labels: {
					fontFamily: "Varela Round",
					fontColor:"#2f2c2c"
					}
				},
				tooltips: {
					backgroundColor:'rgba(47,44,44,.9)',
					cornerRadius:0,
					footerFontFamily:"'Varela Round'"
				}
			}
		});
	}

});
/*****Ready function end*****/

/*****Load function start*****/
$(window).load(function(){
	window.setTimeout(function(){
		$.toast({
			heading: 'Welcome to Buahatiku',
			text: 'Attendace Management System siap membantu anda',
			position: 'top-right',
			loaderBg:'#ea65a2',
			icon: 'success',
			hideAfter: 3000, 
			stack: 6
		});
	}, 3000);
});
/*****Load function* end*****/

