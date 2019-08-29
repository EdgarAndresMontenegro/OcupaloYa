$(document).ready(function() {
	// variable que contiene la cantidad de sucursulas a agregar
	var num_div = 1;
	// variable que contiene la ruta de la aplicación
	var url_page = $("#ruta_url").val();
	
	// función para mostrar la caja de listado de usuarios
	$("#nombre_representante").on('keyup', function(){
		// obtenemos la url a donde va a búscar los datos
		var url = $(this).data("url");
		// obtenemos el valor de la caja
		var str = $.trim( $(this).val() );
		// validamos que no sea vacio
		if( str != "" )
		{
			$.ajax({
				url: url+"/"+str,
				type: 'GET',
				beforeSend: function() {
					// mostramos la ventana del contenedor de la lista de dueños de aliados
					$(".load_owner_ally").slideDown('fast');
					// mostramos el spinner de cargando
					$(".load_owner_ally").html('<div class="container-preloader-wrapper"><div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div></div>');
				},
				success: function( response ) {
					// removemos el spinner de carga de datos
					$(".load_owner_ally .container-preloader-wrapper").remove();
					// mostramos los datos encontrados
					$(".load_owner_ally").html(response);
				},
				error: function(xhr) { 
					// if error occured
					toastr.error("Ha ocurrido un error.");
					// console.log(xhr.statusText + xhr.responseText);
				},
			});
		}
		else
		{
			$(".load_owner_ally").slideUp('fast').html('');
		}
	});

	// función para ocultar la caja de listado de usuarios cuando se hace clic afuera de ella
	$("#nombre_representante").on('blur', function(){
		// establecemos una función que se ejecutara en 0,4 seg despues de perder el foco
		setTimeout(function(){
			$(".load_owner_ally").slideUp('slow');
		}, 400);
	});

	// función para limpiar la selección del representante
	$(".clear_owner_data").on('click', function(){
		$("#user_id").val('');
		$("#nombre_representante").val('');
		$("#email").val(''); 
		return false;
	});

	// función para eliminar los datos de una sucursal
	$(".delete_sucursal_ally").on('click', function(){
		$(this).parent("h5").parent("div").parent("div").remove(); 
		return false;
	});


	$(".add-sucursal").on('click', function(){
		var button = $(this);
		$.ajax({
			url: url_page+'/Location/find-countries/',
			type: 'POST',
			success: function(data) {
				// explotamos el resultado
				data = data.split('|');
				// validamos si es correcto
				if( data[0] === 'true' )
				{
					// capturamos 
					var countries = data[1];
					// aumentamos la cantidad que tiene variable que contiene la cantidad de sucursulas a agregar
					num_div = num_div+1;
					// agregamos el nuevo elemento
					button.parent('div').parent('div').parent('div').parent('div').parent('div').before('<div class="col-12 col-lg-6 mb-5"><div class="card card-sucursal"><h5 class="card-title d-flex align-items-center justify-content-between px-4 pt-3 pb-0 mb-0"><span class="raleway-bold">Datos de la sucursal</span><a class="btn btn-danger btn-sm delete_sucursal_ally" href="#">Eliminar</a></h5><div class="card-body pt-0"><div class="row align-items-center"><div class="col-12 mt-4"><div class="row align-items-center justify-content-between"><div class="col-5 text-truncate">País</div><div class="col-7"><select id="country_id" name="country_id" class="browser-default form-control load_country" data-url="'+url_page+'/Location/find-state-by-country-id">'+countries+'</select></div></div></div><div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div><div class="col-12"><div class="row align-items-center justify-content-between"><div class="col-5">Departamento/Estado</div><div class="col-7"><select id="state_id" name="state_id" class="browser-default form-control load_state" data-url="'+url_page+'/Location/find-city-by-state-id"><option>-- Seleccione un país --</option></select></div></div></div><div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div><div class="col-12"><div class="row align-items-center justify-content-between"><div class="col-5">Ciudad (*)</div><div class="col-7"><select id="ciudad_sucursal_id" name="ciudad_sucursal_id[]" class="browser-default form-control load_city"><option>-- Seleccione un Departamento/Estado --</option></select></div></div></div><div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div><div class="col-12"><div class="row align-items-center justify-content-between"><div class="col-5">Dirección (*)</div><div class="col-7"><input type="text" id="direccion_sucursal" name="direccion_sucursal[]" class="browser-default form-control" placeholder="Dirección (*)" value="" /></div></div></div><div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div><div class="col-12"><div class="row align-items-center justify-content-between"><div class="col-5">Seleccione la ubicación (*)</div><div class="col-7"><a href="#" data-num-div="-'+num_div+'" class="btn-geolocation btn btn-primary btn-block">Seleccione la ubicación</a></div></div></div><div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div><div class="col-12"><div class="row align-items-center justify-content-between"><div class="col-5">Teléfono</div><div class="col-7"><input type="text" id="telefono_sucursal" name="telefono_sucursal[]" class="browser-default form-control" placeholder="Teléfono" value="" /></div></div></div><div class="col-12"><hr style="border-style: dashed; border-color: #ccc;"></div><div class="col-12"><div class="row align-items-center justify-content-between"><div class="col-5">Celular</div><div class="col-7"><input type="text" id="celular_sucursal" name="celular_sucursal[]" class="browser-default form-control" placeholder="Celular" value="" /></div></div></div><div class="col-12 col-md-6 d-none"><div class="form-group"><label for="lat-'+num_div+'">Latitude</label><input type="text" class="form-control" id="lat-'+num_div+'" name="lat[]" placeholder="Latitude"></div></div><div class="col-12 col-md-6 d-none"><div class="form-group"><label for="lon-'+num_div+'">Longitude</label><input type="text" class="form-control" id="lon-'+num_div+'" name="lon[]" placeholder="Longitude"></div></div></div></div></div></div><script type="text/javascript">$(document).ready(function(){$(".load_country").change(function(){var select = $(this);var url = $(this).data("url");var country_id = $(this).val();$.ajax({url: url,type: "POST",data: { "country_id": country_id },beforeSend: function() {toastr.info("Buscando departamentos/estados...");},success: function(data) {data = data.split("|");if( data[0] === "true" ){select.parent("div").parent("div").parent("div").siblings(".col-12").children(".row").children(".col-7").children(".load_state").html(data[1]);toastr.success("Departamentos/estados cargados con éxito.");}else{toastr.error("Ha ocurrido un error. Intentelo nuevamente.");}},error: function(xhr) {toastr.error("Ha ocurrido un error. Intentelo nuevamente.");},});return false;});$(".load_state").change(function(){var select = $(this);var url = $(this).data("url");var state_id = $(this).val();$.ajax({url: url,type: "POST",data: { "state_id": state_id },beforeSend: function() {toastr.info("Buscando ciudades...");},success: function(data) {data = data.split("|");if( data[0] === "true" ){select.parent("div").parent("div").parent("div").siblings(".col-12").children(".row").children(".col-7").children(".load_city").html(data[1]);toastr.success("ciudades cargadas con éxito.");}else{toastr.error("Ha ocurrido un error. Intentelo nuevamente.");}},error: function(xhr) {toastr.error("Ha ocurrido un error. Intentelo nuevamente.");},});return false;});$(".btn-geolocation").click(function(event) {var num_div = $(this).data("num-div");initialize( num_div );$(".modalgeolocation").fadeIn("show");return;});$(".delete_sucursal_ally").on("click", function(){$(this).parent("h5").parent("div").parent("div").remove(); return false;});});</script>');
					return false;
				}else
				{
					toastr.error("Ha ocurrido un error al cargar los paises. Intentelo nuevamente.");
				}
			},
			error: function(xhr) {
				toastr.error("Ha ocurrido un error. Intentelo nuevamente.");
			    console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});


	// función para cargar los departamentos por id de país
	$(".load_country").change(function(){
		// obtenemos el select
		var select = $(this);
		// obtenemos la ruta a donde va
		var url = $(this).data('url');
		// obtenemos el parametro a enviar
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
					select.parent("div").parent("div").parent("div").siblings('.col-12').children('.row').children('.col-7').children(".load_state").html(data[1]);
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
	$(".load_state").change(function(){
		// obtenemos el select
		var select = $(this);
		// obtenemos la ruta a donde va
		var url = $(this).data('url');
		// obtenemos el parametro a enviar
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
					select.parent("div").parent("div").parent("div").siblings('.col-12').children('.row').children('.col-7').children(".load_city").html(data[1]);
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




	