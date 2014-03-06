$(document).ready(function() {
	$('.edit').click(function() {
		var addressJSON = {};
		addressJSON['address'] =  $('#address').val();
		$.ajax({
			type: 'POST',
			url: '/address/verify/',
			data: addressJSON,
			success: function(data) {
				if (data['verify'] === false) {
					$('#dialogid').dialog("open");
				} else if (data['verify'] === true) {
					// display geodata results
				}
			},
			dataType: 'json'
		});
	});
});
