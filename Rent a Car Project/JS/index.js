
var global_info = {
	chassis_no : 0,
	car_name:"Null",
	motor_cc : "Null",
	motor_hp : "Null",
	transmission : "Null",
	price : 0,
	total_price : 0,
	pickup_date : "Null",
	return_date : "Null"
};

$(document).on("click", "#bookingnow", function() {

	console.log('click');

	var pickupdate = document.getElementById('pickup').value;
	var returndate = document.getElementById('return').value;
	var car = document.getElementById('car').value;

	console.log(' pickup '+pickupdate+' return '+returndate+' car '+car);

	var values = $('#datefilter').serialize();

	console.log(values);

	var request = $.ajax({
		                    url: "../php/search.php",
		                    type: "post",
		                    data: values,
		                    dataType  : 'json',
		                    success:function(response)
                        {
													console.log(response.success);

													if(!response.success) {
														alert ('This car has been rented on these dates.');
													}

													else {
        										$("#result").text(" ");

														var chassis_no = global_info.chassis_no = response.Chassis_No;
														var car_model = global_info.car_name = response.Car_Model;
														var motor_cc = global_info.motor_cc = response.Motor_cc;
														var motor_hp = global_info.motor_hp = response.Motor_hp;
														var transmission = global_info.transmission = response.Transmission;
														var price = global_info.price = response.Price;

														var date1 = new Date(pickupdate);
														var date2 = new Date(returndate);

														var timeDiff = Math.abs(date2.getTime() - date1.getTime());
														var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

														var total = global_info.total_price = parseInt(price) * diffDays;

														global_info.pickup_date = pickupdate;
														global_info.return_date = returndate;

														$("#result").append("<div class=\"result-inner\">\
																									<div class=\"result-cell\">Chassis No : "+chassis_no+"</div>\
																									<div class=\"result-cell\">Car Model : "+car_model+"</div>\
																									<div class=\"result-cell\">Motor CC : "+motor_cc+"</div>\
																									<div class=\"result-cell\">Motor HP : "	+motor_hp+"</div>\
																									<div class=\"result-cell\">Transmission : "+transmission+"</div>\
																									<div class=\"result-cell\">Total Price : "+total+"</div>\
																									<div class=\"result-cell\"><button id=\"confirm_button\">Confirm</button></div>\
														 										</div>");
											  }
											}
										});
});

$(document).on("click","#confirm_button",function() {
	console.log("Button pressed ", global_info);

	var request = $.ajax({
												url: "../php/confirm.php",
												type: "post",
												dataType:"json",
												data: {
													'chassisNo':global_info.chassis_no,
													'pickupDate':global_info.pickup_date,
													'returnDate':global_info.return_date,
													'totalPrice':global_info.total_price
												},

												success:function(response)
												{
													console.log(response);
												},

												error:function(xhr,stat,err) {
													console.log("error : "+err);
												}
											});
});
