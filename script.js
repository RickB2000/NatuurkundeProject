
$(document).ready(function() {
	$("#llnr").keyup(function( event ) {
		$.get("/ajax/validator.php", { id: $("#llnr").val() })
  		.done(function( data ) {
			$("#llnr-form-group").removeClass('has-success');
			$("#llnr-form-group").removeClass('has-error');
    		if(data != "INVALID") {
				$("#llnr-form-group").addClass('has-success');
				$("#submit").prop('disabled', false);
				$('#student_name').html("Leerling gevonden: " + data);
			}else{
				$("#llnr-form-group").addClass('has-error');
				$("#submit").prop('disabled', true);
				$('#student_name').html("&nbsp;");
			}
  		});
	});
});