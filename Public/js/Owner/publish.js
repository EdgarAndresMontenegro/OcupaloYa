$(document).ready(function() {
	// obtenemos la ruta de la plataforma
	var ruta_url = $("#ruta_url").val();

	// funcion para que el usuario se registre
	$("#titulo_inmueble").on('keyup', function(){
		// obtenemos el valor del input
		var value = $(this).val();
		if( value == "" || value == null )
		{
			$(".titulo_inmueble").html("Título del inmueble");
		}
		else
		{
			$(".titulo_inmueble").html( value );
		}
	});

	// funcion para que el usuario se registre
	$("#area").on('keyup', function(){
		// obtenemos el valor del input
		var value = $(this).val();
		if( value == "" || value == null )
		{
			$(".area").html("-");
		}
		else
		{
			$(".area").html( value );
		}
	});

	// funcion para que el usuario se registre
	$("#habitaciones").on('keyup', function(){
		// obtenemos el valor del input
		var value = $(this).val();
		if( value == "" || value == null )
		{
			$(".habitaciones").html("-");
		}
		else
		{
			$(".habitaciones").html( value );
		}
	});

	// funcion para que el usuario se registre
	$("#banos").on('keyup', function(){
		// obtenemos el valor del input
		var value = $(this).val();
		if( value == "" || value == null )
		{
			$(".banos").html("-");
		}
		else
		{
			$(".banos").html( value );
		}
	});

	// funcion para que el usuario se registre
	$("#garaje").on('change', function(){
		// obtenemos el valor del input
		var value = $(this).val();
		if( value == "¿Acceso a Garaje?" || value == "" || value == null )
		{
			$(".garaje").html("-");
		}
		else
		{
			if( value == 2 )
			{
				$(".garaje").html("Si");
			}
			else
			{
				$(".garaje").html("No");
			}
		}
	});

	// funcion para que el usuario se registre
	$("#precio_inmueble").on('keyup', function(){
		// obtenemos el valor del input
		var value = $(this).val();
		if( value == "" || value == null )
		{
			$(".precio_inmueble").html("0");
		}
		else
		{
			$(".precio_inmueble").html( new Intl.NumberFormat("co-CO").format(value) );
		}
	});

	// funcion para que el usuario se registre
	$("#tipo_proceso").on('change', function(){
		// obtenemos el valor del input
		var value = $(this).val();
		if( value == "" || value == "-- Seleccione el tipo de proceso --" || value == null)
		{
			$(".tipo_proceso").html("-");
		}
		else
		{
			if( value == 1 )
			{
				$(".tipo_proceso").html("Arriendo");
			}
			else if( value == 2 )
			{
				$(".tipo_proceso").html("Permuta");
			}
			else
			{
				$(".tipo_proceso").html("Venta");
			}
		}
	});

	// función para cambiar a la segunda pestaña
	$(".btn_first_step").on('click', function(){
		// obtenemos el tipo de inmueble
		var titulo_inmueble = $("#titulo_inmueble").val();
		// obtenemos el tipo de inmueble
		var precio_inmueble = $("#precio_inmueble").val();
		// obtenemos el tipo de inmueble
		var immovable_kind = $("#tipo_inmueble").val();
		// obtenemos el tipo de inmueble
		var tipo_proceso = $("#tipo_proceso").val();
		// obtenemos el tipo de inmueble
		var tipo_contrato = $("#tipo_contrato").val();
		// obtenemos la url del
		var url = $(this).data('url');
		// validamos que no se encuentre vacio el nombre del inmubelbe
		if( titulo_inmueble == "" || titulo_inmueble == null)
		{
			// mostamos un error
			toastr.error("Por favor ingresa el nombre de inmueble.");
			return false;
		}
		// validamos que no se encuentre vacio el precio de inmueble
		if( precio_inmueble == "" || precio_inmueble == null)
		{
			// mostamos un error
			toastr.error("Por favor ingresa el precio de inmueble.");
			return false;
		}
		// validamos que no se encuentre vacio el tipo de inmueble
		if( immovable_kind == "" || immovable_kind == "-- Seleccione un tipo de inmueble --"  || immovable_kind == null)
		{
			// mostamos un error
			toastr.error("Por favor seleccione un tipo de inmueble.");
			return false;
		}
		// validamos que no se encuentre vacio el tipo de proceso
		if( tipo_proceso == "" || tipo_proceso == "-- Seleccione un tipo de proceso --"  || tipo_proceso == null)
		{
			// mostamos un error
			toastr.error("Por favor seleccione un tipo de proceso.");
			return false;
		}
		// validamos que no se encuentre vacio el tipo de contrato
		if( tipo_contrato == "" || tipo_contrato == "-- Seleccione un tipo de contrato --"  || tipo_contrato == null)
		{
			// mostamos un error
			toastr.error("Por favor seleccione un tipo de contrato.");
			return false;
		}
		switch ( immovable_kind ) {
			case '1':
			$(".title_second_step").html('de la habitación');
			break;
			case '2':
			$(".title_second_step").html('del cupo universitario');
			break;
			case '3':
			$(".title_second_step").html('del apartamento');
			break;
			case '4':
			$(".title_second_step").html('de la casa');
			break;
			case '5':
			$(".title_second_step").html('del local');
			break;
			case '6':
			$(".title_second_step").html('de la oficina');
			break;
			case '8':
			$(".title_second_step").html('del lote');
			break;
			case '9':
			$(".title_second_step").html('de la bodega');
			break;
			default:
			$(".title_second_step").html('del parqueadero');
			break;
		}
		// mostramos la vista de acuerdo al tipo de inmueble
		$(".data_immovable_kind").load( url+"/"+immovable_kind );
		// ocultamos la primera en .7 seg
		$(".first_step").fadeOut('700');
		// esperamos .7 seg para mostrar la otra pestaña
		setTimeout(function(){
			$(".second_step").fadeIn('slow');
		}, 700);
		return false;
	});

	// funcion para retornar a la primera sección
	$(".btn_second_step_before").on('click', function(){
		$(".second_step").fadeOut('slow');
		setTimeout(function(){
			$(".first_step").fadeIn('slow');
		}, 700);
		return false;
	});


	// función para agregar otro campo de foto
	$(".delete_picture_immovable").on('click', function(){$(this).remove();});


	// función para agregar fotos al inmueble
	$("#add_picture_immovable").change(function()
	{
		$(".errors-create").html('');
		var url = $(this).data('url');
		var formData = new FormData( $(".form-create")[0] );                         
		$.ajax({
			url: url,
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			data: formData,                         
			type: 'post',
			success: function( data ){
				$("#add_picture_immovable").val('');
				data = data.split('|');
				data_img = data[0].split('/');
				if( data_img[0] != 'img' )
				{
					toastr.error("Ha ocurrido un error.");
					$(".errors-create").append( data );
				}else
				{
					$(".content_picture_immovable").append('<div class="col-6 col-md-3 delete_picture_immovable"><div class="contenedor-picture" style="width: 150px;  height: 150px; overflow: hidden;"><label for="upload_image" class="image-cap not-radius" style="background-image: url('+ruta_url+'/img/delete-picture.png);" title="Eliminar foto"></label><img src="'+ruta_url+'/'+data[0]+'" class="img-fluid photo-user" style="width: 150px;  height: 150px;"><input type="hidden" name="photo[]" id="photo" value="'+data[1]+'"></div></div><script>$(".delete_picture_immovable").on("click", function(){$(this).remove();});</script>');
					$(".image-property img").attr('src', ruta_url+'/'+data[0]);
					$("#poster_inmueble").val(data[0]);
					toastr.success("Imagen subida con éxito.");
				}
			}
		});
		return false;
	});

});



