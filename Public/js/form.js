$(document).ready(function() {

	// funciones para CRUD tradicional en tablas
	
	$(".form-create").submit(function(){
		var errors_create = $(this).children(".errors-create");
		var form = $(this);
		var url = form.attr('action');
		errors_create.html('');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Creando registro...");
			},
			success: function(data) {
				if( data === 'true' )
				{
					toastr.success("Registro exitoso.");
				}else
				{
					toastr.error("Ha ocurrido un error.");
					errors_create.append( data );
					$('.scroll').animate({
						scrollTop: errors_create.offset().top
					});
				}
			},
			error: function(xhr) {
			   	toastr.error("Ha ocurrido un error.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});


	$(".open-confirm-delete").click(function()
	{
		$("#id-form-delete").val( $(this).data('id') );
		$("#btn-form-delete").data( "id", $(this).data('id') );
	});


	$(".form-delete").click(function(){
		var id = $(this).data('id');
		var form = $("#form-delete-"+id);
		var url = form.attr('action');
		var errors_delete = $(this).parent("div").siblings(".modal-body").children('.errors-delete');
		errors_delete.html('');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Eliminando registro...");
			},
			success: function(data) {
				if( data === 'true' )
				{
					toastr.success("Registro eliminado con exito.");
					location.reload();
				}else
				{
					toastr.error("Ha ocurrido un error.");
					errors_delete.append( data );
					$('.scroll').animate({
						scrollTop: errors_delete.offset().top
					});
				}
			},
			error: function(xhr) {
			   	toastr.error("Ha ocurrido un error.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});


	$(".form-find").click(function(){
		alert("asd"); return;
		var errors_find = $(this).children(".errors-find");
		var id = $(this).data('id');
		var url = $(this).data('url');
		errors_find.html('');
		$.ajax({
			url: url,
			type: 'POST',
			data: {'id': id},
			dataType: 'json',
			beforeSend: function() {
				toastr.info("Buscando registro...");
			},
			success: function(data) {
				if( data['status'] === 'true' )
				{
					toastr.success("Registro encontrado con exito.");
					$(".modalEdit").modal('show');

					$.each( data['datos'], function(key, value){
						$(".modalEdit #"+key).val(value);
					});

				}
				else
				{
					toastr.error("Ha ocurrido un error.");
				}
			},
			error: function(xhr) {
			   	toastr.error("Ha ocurrido un error.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});

	$(".form-edit").submit(function(){
		var errors_edit = $(this).children(".errors-edit");
		var form = $(this);
		var url = form.attr('action');
		errors_edit.html('');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Actualizando registro...");
			},
			success: function(data) {
				if( data === 'true' )
				{
					toastr.success("Registro actualizado con exito.");
				}else
				{
					toastr.error("Ha ocurrido un error.");
					errors_edit.append( data );
					$('.scroll').animate({
						scrollTop: errors_edit.offset().top
					});
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