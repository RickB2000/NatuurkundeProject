function check() {
	$.get("/ajax/validator.php", { type: "number_check", id: $("#llnr").val() })
  		.done(function( data ) {
			$("#llnr-form-group").removeClass('has-success');
			$("#llnr-form-group").removeClass('has-error');
    		if(data != "INVALID") {
				if(data == "AUTHENTICATION_REQUIRED") {
					$("#llnr-form-group").addClass('has-success');
					$('#student_name').html("Leerling gevonden, wachtwoord vereist.");
					$('#passwd-form-group').slideDown();
					$('#passwd-form-group input').val("");
				} else {
					$("#llnr-form-group").addClass('has-success');
					$("#submit").prop('disabled', false);
					$('#student_name').html("Leerling gevonden: " + data);
					$('#password').focus();
				}
			} else {
				$('#passwd-form-group').slideUp();
				$("#llnr-form-group").addClass('has-error');
				$("#submit").prop('disabled', true);
				$('#student_name').html("&nbsp;");
			}
  		});
}
$(document).ready(function() {
	if($('#llnr').val() !== "") {
		check();
	}else{
		$('#llnr').focus();
	}
	
	$("#llnr").keyup(function( event ) {
		setTimeout(function() {
			check();
		}, 250);
	});
	
	$("#password").keyup(function( event ) {
		setTimeout(function() {
			$.get("/ajax/validator.php", { type: "password_check", id: $("#llnr").val(), password: $("#password").val() })
			.done(function( data ) {
				//$('#passwd-form-group').slideUp();
				$("#passwd-form-group").removeClass('has-success');
				$("#passwd-form-group").removeClass('has-error');
				if(data == "OK") {
					$("#passwd-form-group").addClass('has-success');
					$("#passwd_indicator").html("Wachtwoord geldig!");
					$("#submit").prop('disabled', false);
				} else {
					//$("#passwd-form-group").addClass('has-error');
					//$("#passwd_indicator").html("Wachtwoord incorrect!");
					$("#passwd_indicator").html("&nbsp;");
					$("#submit").prop('disabled', true);
				}
			});
		}, 250);
	});
});