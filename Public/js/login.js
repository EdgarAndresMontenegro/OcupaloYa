$(document).ready(function(){

	// funcion para que el usuario se registre
	$("#register-form").submit(function(){
		$("#errors-register").html('');
		var form = $(this);
		var url = form.attr('action');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Registandome...");
			},
			success: function(data) {
				data = data.split('|');
				if( data[0] === 'true' )
				{
					toastr.success("Sesión iniciada con éxito.");
					window.location = data[1];
				}else
				{
					toastr.error("Ha ocurrido un error..");
					$("#errors-register").append( data[0] );
				}
			},
			error: function(xhr) { // if error occured
			   	toastr.error("Ha ocurrido un error.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});


	// funcion para que el usuario inicie sesion
	$("#login-form").submit(function(){
		$("#errors-login").html('');
		var form = $(this);
		var url = form.attr('action');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Iniciando sesión...");
			},
			success: function(data) {
				data = data.split('|');
				if( data[0] === 'true' )
				{
					// obtenemos el usuario que va a ingresar
					var username = form.children('.modal-body').children('.md-form').children('#username_login').val();
					// creamos la cookie
					setCookie( "username", username, 31 );
					var d = new Date();
					// creamos la cookie
					setCookie( "fehca_ingreso", d.getDate()+"-"+d.getMonth()+"-"+d.getFullYear(), 1 );
					toastr.success("Sesión iniciada con éxito.");
					window.location = data[1];
				}else
				{
					toastr.error("Ha ocurrido un error..");
					$("#errors-login").append( data[0] );
				}
			},
			error: function(xhr) { // if error occured
			   	toastr.error("Ha ocurrido un error.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});

	// funcion para que el usuario inicie sesion
	$("#recover-form").submit(function(){
		$("#errors-recover").html('');
		var form = $(this);
		var url = form.attr('action');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Validando datos...");
			},
			success: function(data) {
				if( data === 'true' )
				{
					toastr.success("Password enviada con éxito.");
				}else
				{
					toastr.error("Ha ocurrido un error..");
					$("#errors-recover").append( data );
				}
			},
			error: function(xhr) { // if error occured
			   	toastr.error("Ha ocurrido un error.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});

});