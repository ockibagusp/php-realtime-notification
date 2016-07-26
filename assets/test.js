///////////////////
/// Test
/// 
/// //////////////

$('#form_notif').find('#form_submit').click(function(event) {
	event.preventDefault();

	var input_message = $('#input_message');

	if ('' == input_message.val()) {
		alert('input kosong');
		return;
	}

	$.ajax({
		url: "/notif/notification/create",
		type: "post",
		dataType: 'json',
		data: {
			'user_id': 1,
			'message': input_message.val()
		}
    });
	// reset form
	input_message.val('');
    alert('terkirim');
});