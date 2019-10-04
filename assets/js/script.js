
$(document).ready(function() {
	
	/* Plugins */

	// Persian DataPicker
	$(function() {
		$(".datepicker").persianDatepicker({
		});       
	});

	// Time Picker
	$('.timepicker').timepicker({
		showSeconds: false,
		showMeridian: false,
		defaultTime: false
	});

	// DataTable
	$('#dataTables').dataTable();
	
	// Tipsy Tooltip
	$('.tipsy').tipsy({fade: true, gravity: 'n'});
});





// Tabbable tabs 
$('#tabbable a').click(function (e) {
	e.preventDefault()
	$(this).tab('show')
})

// Show Specific tab when click on related link
// Javascript to enable link to tab
var url = document.location.toString();
if (url.match('#')) {
	$('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
} 
// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
	window.location.hash = e.target.hash;
})

// Format Number
$('.formatNumber').keyup(function (event) {
// skip for arrow keys
	if (event.which >= 37 && event.which <= 40) {
		event.preventDefault();
	}
	var $this = $(this);
	var num = $this.val().replace(/,/g, '');
	// the following line has been simplified. Revision history contains original.
	$this.val(num.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
});


// Modal Delete Confirm
$('#confirm-delete').on('show.bs.modal', function(e) {
		$(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
// Simple Delete Confirm Dialog
$('[rel=delete]').click(function() {
	if (window.confirm('گزینه مورد نظر حذف خواهد شد. آیا مطمئن هستید؟')) {
		return true;
	} else {
		return false;
	}
})

// Ajax Loading
$(document).ready(function () {
    $(document).ajaxStart(function () {
        $("#ajax-loader").show();
    }).ajaxStop(function () {
        $("#ajax-loader").hide();
    }).ajaxError(function(){
    		
	});
});



/* SALARY CALCULATION */
// Get Karkard and Gheybat
$('.staff_name li').click(function(){
	var staffID 	= $(this).attr('id');
	var baseID 		= $('#baseID').val();
	var date_month 	= $('#date_month').val();
	var date_year 	= $('#date_year').val();
	$('.staff_name li').removeClass('active');
	$(this).addClass('active');
	$('#main_calculation').css('display','block');
	$('input[type=checkbox]:not(:disabled)').prop('checked', false);
	$.ajax({
		type: 'POST',
		dataType: 'JSON',
		data: 	{ 	'get': 'calculation', 
					'staffID': staffID, 'baseID': baseID, 
					'date_month': date_month, 'date_year': date_year
				},
		success: function(data){
			// check sub and add checkbox
			data['staffsubadd'].forEach(function(entry) {
				$('input[type=checkbox]#subaddvalue_'+entry['subadd_value_id']).prop('checked', true);
			});
			// Success
			if (data['karkard']) {
				// show karkard and gheybat in each input 
				$('.karkard_day').val(data['karkard']['karkard_day']);
				$('.karkard_hour').val(data['karkard']['karkard_hour']);
				$('.karkard_minute').val(data['karkard']['karkard_minute']);
				$('.gheybat_day').val(data['karkard']['gheybat_day']);
				$('.gheybat_hour').val(data['karkard']['gheybat_hour']);
				$('.gheybat_minute').val(data['karkard']['gheybat_minute']);
				// show total karkard and gheybat in hoghogh box (blue box)
				var karkard_total 	= (data['karkard']['karkard_day'] * 24) + Number(data['karkard']['karkard_hour']) + ' ساعت ' + ' و ' + data['karkard']['karkard_minute'] + ' دقیقه ';
				$('.total_karkard').text(karkard_total);
				var gheybat_total 	= (data['karkard']['gheybat_day'] * 24) + Number(data['karkard']['gheybat_hour']) + ' ساعت ' + ' و ' + data['karkard']['gheybat_minute'] + ' دقیقه ';
				$('.total_gheybat').text(gheybat_total);
				// show total salary in hoghogh box (blue box)
				if (data['salary']) {
					$('.total_salary').text(data['salary']['total_salary']);
				} else {
					$('.total_karkard').text('');
					$('.total_gheybat').text('');
					$('.total_salary').text('');
				}
			} 
			// Fail
			if (!data['karkard']) {
				$('.gheybat').val('');
				$('.karkard').val('');
				$('.total_karkard').text('');
				$('.total_gheybat').text('');
				$('.total_salary').text('');
				$("#ajax-loader").hide();
			}
		},

		error: function() {
			$('.gheybat').val('');
			$('.karkard').val('');
			$('.total_karkard').text('');
			$('.total_gheybat').text('');
			$('.total_salary').text('');
			$("#ajax-loader").hide();
		}
	});
});
// Set Karkard and Gheybat
$('#submit').click(function(){
	var sub_and_add = new Array();
	$.each($('input[type=checkbox]:checked'), function() {
		var subadd_id 		= 	$(this).parent().find('.subadd_id').attr('id');
		var subadd_type 	= 	$(this).attr('name');
		var subadd_value_id = 	$(this).attr('id').split('_');
		var subadd_value	= 	$(this).parent().parent().find('input[type=text]').val()
		sub_and_add.push({subadd_id: subadd_id, subadd_value_id: subadd_value_id[1], subadd_value: subadd_value, subadd_type: subadd_type});
	});
	
	var staffID 		= $('.staff_name ul li.active').attr('id');
	var baseID 			= $('#baseID').val();
	var karkard_day 	= $('.karkard_day').val();
	var karkard_hour	= $('.karkard_hour').val();
	var karkard_minute 	= $('.karkard_minute').val();
	var gheybat_day 	= $('.gheybat_day').val();
	var gheybat_hour 	= $('.gheybat_hour').val();
	var gheybat_minute 	= $('.gheybat_minute').val();
	var date_month 		= $('#date_month').val();
	var date_year 		= $('#date_year').val();
	var salary_base 	= $('#salary_base').val();
	var salary_min 		= $('#salary_min').val();
	$.ajax({
		type: 	'POST',
		data: 	{ 	'set': 'calculation', 
					'sub_and_add': sub_and_add,
					'date_month': date_month, 'date_year': date_year, 'baseID': baseID, 'staffID': staffID, 
					'salary_min': salary_min, 'salary_base': salary_base,
					'karkard_day': karkard_day, 'karkard_hour': karkard_hour, 'karkard_minute': karkard_minute,
					'gheybat_day': gheybat_day, 'gheybat_hour': gheybat_hour, 'gheybat_minute': gheybat_minute 
				},
		success: function(data){
		}
	});
	
});
// Total Hoghogh show at hoghogh box (blue box) (karkard, gheybat, total)
$('.karkard, .gheybat').keyup(function(){
	var karkard_day 	= $('.karkard_day').val();
	var karkard_hour 	= $('.karkard_hour').val();
	var karkard_minute 	= $('.karkard_minute').val();
	var karkard_total 	= (karkard_day * 24) + Number(karkard_hour) + ' ساعت ' + ' و ' + karkard_minute + ' دقیقه ';
	$('.total_karkard').text(karkard_total);

	var gheybat_day 	= $('.gheybat_day').val();
	var gheybat_hour 	= $('.gheybat_hour').val();
	var gheybat_minute 	= $('.gheybat_minute').val();
	var gheybat_total 	= (gheybat_day * 24) + Number(gheybat_hour) + ' ساعت ' + ' و ' + gheybat_minute + ' دقیقه ';
	$('.total_gheybat').text(gheybat_total);

});


/* SALARY */
$('.salary_staff_name a').click(function(){
	$('.salary_staff_name a').removeClass('active');
	$(this).addClass('active');
	$('.pay_slip').text('');
});


$('.show_salary').click(function(){	
	var date 		= $('.salary_date').val().split('-');
	var staffID 	= $('.salary_staff_name a.active').attr('id');
	$.ajax({
		type: 'GET',
		data: 'date_year='+date[0]+'&date_month='+date[1]+'&staffID='+staffID,
		success: function(data){
			if (data) {
				// Tarikhe Fish Hoghoghi
				$('.pay_slip_date').text(data['salary']['date_year'] + '/'+ data['salary']['date_month']);
				// Moshakhasat
				$('.staff_name').text(data['staff']['fname'] +' '+ data['staff']['lname']);
				$('.staff_no').text(data['staff']['staff_no']);
				$('.kod_meli').text(data['staff']['kod_meli']);
				$('.shenasnameh').text(data['staff']['shenasnameh']);
				// Karkard
				$('.salary_total').text(data['salary']['total_salary']);
				$('.karkard').text(Math.round(data['work']['karkard_total'] / Number(60)));
				$('.gheybat').text(Math.round(data['work']['gheybat_total'] / Number(60)));
				// Pardakht
				$('.salary_base').text(data['salary_base']['salary_base']);
				$('.salary_per_min').text(data['salary_base']['salary_per_min'] * Number(60));
				// Kosor
				$('.kosor').text('');
				$('.ezafat').text('');
				$.each(data['subadd'], function(index){
					// Sub
					if(data['subadd'][index][0]['type'] == 'sub') {
						$.each(data['subadd_value'], function(index2){
							// check if subadd_value and subadd are related
							if (data['subadd_value'][index2][0]['subadd_id'] == data['subadd'][index][0]['id']) {
								$('.kosor').append(
									'<p>'+
										data['subadd'][index][0]['title']+': '+
										data['subadd_value'][index2][0]['value']+
									'</p>'
								);
							}
						});
					}
					// Add
					if(data['subadd'][index][0]['type'] == 'add') {
						$.each(data['subadd_value'], function(index2){
							// check if subadd_value and subadd are related
							if (data['subadd_value'][index2][0]['subadd_id'] == data['subadd'][index][0]['id']) {
								$('.ezafat').append(
									'<p>'+
										data['subadd'][index][0]['title']+': '+
										data['subadd_value'][index2][0]['value']+
									'</p>'
								);
							}
						});
					}
				});
			} else {
				$('.pay_slip').text('');
				$('.not_found').text('اطلاعات حقوق و دستمزد این پرسنل در تاریخ موردنظر ثبت نشده است.');
			}
		}
	});
});

$('.print').click(function(){
	var DocumentContainer = document.getElementById('salary_area');
    var WindowObject = window.open('', 'PrintWindow', 'width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes');
    WindowObject.document.writeln('<!DOCTYPE html>');
    WindowObject.document.writeln('<html><head><title></title>');
    WindowObject.document.writeln('<link rel="stylesheet" type="text/css" href="../public/assets/css/bootstrap.min.css">');
    WindowObject.document.writeln('<link rel="stylesheet" type="text/css" href="../public/assets/css/print.css">');
    WindowObject.document.writeln('</head><body>')
    WindowObject.document.writeln(DocumentContainer.innerHTML);
    WindowObject.document.writeln('</body></html>');
    WindowObject.document.close();
    WindowObject.focus();
    WindowObject.print();
    // Close print window?
   		 // WindowObject.close();
})


// Override default html5 error message
document.addEventListener("DOMContentLoaded", function() {
    var elements = document.querySelectorAll('INPUT,TEXTAREA');
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("این فیلد نمی‌تواند خالی باشد.");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})


// SETTINGS > GENERAL > CALENDAR
// Submit DayOff (Yearly)
$(document).on('click', '.submit_dayOff', function(){
	var day_off = $('#dayOff').val();
	if (day_off) {
		$.ajax({
			type: "POST",
			data: {'submit': 'yearly', 'yearly_date': day_off},
			success: function(html){
				// console.log(data);
				$("#dayOff_result").replaceWith($('#dayOff_result', $(html)));
			}
		});
	}
	return false;
});
// Delete DayOff (Yearly)
$(document).on('click', '.delete_dayOff', function(){
	var dayOffId = $(this).attr('id');
	if (dayOffId) {
		$.ajax({
			type: "POST",
			data: {'delete': 'yearly', 'yearly_date_id': dayOffId},
			success: function(html){
				$("#dayOff_result").replaceWith($('#dayOff_result', $(html)));
			}
		});
	}
	return false;
});
// Submit DayOff (Weely)
$(document).on('click', '.submit_weekly', function(){
	var weekly_dayOff = document.getElementById("weekly_dayOff").value;
	if (weekly_dayOff != 0) {
		$.ajax({
			type: "POST",
			data: {'submit': 'weekly', 'weekly_dayOff': weekly_dayOff},
			success: function(html){
				$("#dayOff_result").replaceWith($('#dayOff_result', $(html)));
			}
		});
	}
	return false;
});