/*Form advanced Init*/
$(document).ready(function() {
"use strict";

/* Select2 Init*/
$(".select2").select2();

/* Bootstrap Select Init*/
$('.selectpicker').selectpicker();

/* Switchery Init*/
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
$('.js-switch').each(function() {
	new Switchery($(this)[0], $(this).data());
});

/* Bootstrap-TouchSpin Init*/
$(".vertical-spin").TouchSpin({
	verticalbuttons: true,
	verticalupclass: 'ti-plus',
	verticaldownclass: 'ti-minus'
});
var vspinTrue = $(".vertical-spin").TouchSpin({
	verticalbuttons: true
});
if (vspinTrue) {
	$('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
}

$("input[id='tch1']").TouchSpin({
	min: 0,
	max: 100,
	step: 0.1,
	decimals: 2,
	boostat: 5,
	maxboostedstep: 10,
	postfix: '%'
});
$("input[id='tch2']").TouchSpin({
	min: 0,
	max: 1000000000,
	stepinterval: 50,
	maxboostedstep: 10000000,
	prefix: 'Rp.'
});
$("input[id='tch3']").TouchSpin();

$("input[id='tch3_22']").TouchSpin({
	initval: 40
});

$("input[name='tch5']").TouchSpin({
	prefix: "pre",
	postfix: "post"
});

});









