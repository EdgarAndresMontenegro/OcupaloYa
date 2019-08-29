$(document).ready(function() {
		
	// funcion para que el usuario se registre
	$("#btn-form-block").click(function(){
		var btn = $(this);
		var url = btn.data('url');
		$.ajax({
			url: url,
			type: 'POST',
			beforeSend: function() {
				toastr.info("Blockeando usuario...");
			},
			success: function(data) {
				console.log(data);
				data = data.split('|');
				if( data[0] === 'true' )
				{
					toastr.success("Usuario bloqueado con éxito.");
					window.location = data[1];
				}else
				{
					toastr.error("Ha ocurrido un error. Intentelo nuevamente");
				}
			},
			error: function(xhr) {
			   	toastr.error("Ha ocurrido un error.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});

});