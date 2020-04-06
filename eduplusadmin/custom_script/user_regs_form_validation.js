
function registration_Submit_fm()
{

	//alert('ok');
	var first_name = $('#first_name').val();
	if (!isNull(first_name)) {
		$('#first_name').removeClass('black_border').addClass('red_border');
	} else {
		$('#first_name').removeClass('red_border').addClass('black_border');
	}

	var last_name = $('#last_name').val();
	if (!isNull(last_name)) {
		$('#last_name').removeClass('black_border').addClass('red_border');
	} else {
		$('#last_name').removeClass('red_border').addClass('black_border');
	}

	var phone = $('#phone').val();
	if (!isNull(phone)) {
		$('#phone').removeClass('black_border').addClass('red_border');
	} else {
		$('#phone').removeClass('red_border').addClass('black_border');
	}

	var country_list = $('#country_list').val();
	if (!isNull(country_list)) {
		$('#country_list').removeClass('black_border').addClass('red_border');
	} else {
		$('#country_list').removeClass('red_border').addClass('black_border');
	}

	var r_state_list = $('#r_state_list').val();
	if (!isNull(r_state_list)) {
		$('#r_state_list').removeClass('black_border').addClass('red_border');
	} else {
		$('#r_state_list').removeClass('red_border').addClass('black_border');
	}

	var email = $('#email').val();
	if (!isEmail(email)) {
		$('#email').removeClass('black_border').addClass('red_border');
	} else {
		$('#email').removeClass('red_border').addClass('black_border');
	}

	var r_city_lst = $('#r_city_lst').val();
	if (!isNull(r_city_lst)) {
		$('#r_city_lst').removeClass('black_border').addClass('red_border');
	} else {
		$('#r_city_lst').removeClass('red_border').addClass('black_border');
	}

	/*var password = $('#password').val();
	
	if (!isNull(password)) {
		$('#password').removeClass('black_border').addClass('red_border');
	} else {
		$('#password').removeClass('red_border').addClass('black_border');
	}
	*/
	var con_password = $('#con_password').val();

	if (!isNull(con_password)) {
		$('#con_password').removeClass('black_border').addClass('red_border');
	} else {
		$('#con_password').removeClass('red_border').addClass('black_border');
	}

	

	var pincode = $('#pincode').val();
	if (!isNull(pincode)) {
		$('#pincode').removeClass('black_border').addClass('red_border');
	} else {
		$('#pincode').removeClass('red_border').addClass('black_border');
	}

	var address1 = $('#address1').val();
	if (!isNull(address1)) {
		$('#address1').removeClass('black_border').addClass('red_border');
	} else {
		$('#address1').removeClass('red_border').addClass('black_border');
	}

	if($('#checkpermission').is(':checked'))
	{
		$('#checkpermission').removeClass('red_border').addClass('black_border');
	} else {
		$('#checkpermission').removeClass('black_border').addClass('red_border');
	}
}





function form_validation_action()
{
	//alert("ok");

	$('#reg_form').attr('onchange', 'registration_Submit_fm()');
	$('#reg_form').attr('onkeyup', 'registration_Submit_fm()');

	registration_Submit_fm();
	//alert($('#contact_form .red_border').size());

	if ($('#reg_form .red_border').size() > 0)
	{
		$('#reg_form .red_border:first').focus();
		$('#reg_form .alert-error').show();
		return false;
	} else {

		$('#reg_form').submit();
	}
}

