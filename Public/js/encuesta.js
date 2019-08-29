$(document).ready(function() {
	// obtenemos el valor del id de la encuesta
	var id_encuesta = getCookie("id_encuesta");
	// validamos que la encuesta sea un numero
	if( id_encuesta != "" )
	{
		// removemos la modal de mostrar la encuesta
		$(".modal-encuesta").remove();
	}


	// función para
	$(".input-update").on('blur', function(){
		var form = $(".form-encuesta");
		url = form.attr('action');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			success: function(response) {
				if( response === 'true' )
				{
					toastr.success("Guardado.");
				}else
				{
					toastr.error("Ha ocurrido un error.");
				}
			},
			error: function(xhr) {
				toastr.error("Ha ocurrido un error.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
	});

});