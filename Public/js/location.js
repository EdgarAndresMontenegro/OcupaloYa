$(document).ready(function() {

	// función para cargar los departamentos por id de país
	$("#country_id").change(function(){
		alert("asd");
		var url = $(this).data('url');
		var country_id = $(this).val();
		$.ajax({
			url: url,
			type: 'POST',
			data: { 'country_id': country_id },
			beforeSend: function() {
				toastr.info("Buscando departamentos/estados...");
			},
			success: function(data) {
				data = data.split('|');
				if( data[0] === 'true' )
				{
					$("#state_id").html(data[1]);
					toastr.success("Departamentos/estados cargados con éxito.");
				}else
				{
					toastr.error("Ha ocurrido un error. Intentelo nuevamente.");
				}
			},
			error: function(xhr) {
				toastr.error("Ha ocurrido un error. Intentelo nuevamente.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});

	// función para cargar las ciudades por id de departamento
	$("#state_id").change(function(){
		var url = $(this).data('url');
		var state_id = $(this).val();
		$.ajax({
			url: url,
			type: 'POST',
			data: { 'state_id': state_id },
			beforeSend: function() {
				toastr.info("Buscando ciudades...");
			},
			success: function(data) {
				data = data.split('|');
				if( data[0] === 'true' )
				{
					$("#ciudad_id").html(data[1]);
					toastr.success("ciudades cargadas con éxito.");
				}else
				{
					toastr.error("Ha ocurrido un error. Intentelo nuevamente.");
				}
			},
			error: function(xhr) {
				toastr.error("Ha ocurrido un error. Intentelo nuevamente.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});

});