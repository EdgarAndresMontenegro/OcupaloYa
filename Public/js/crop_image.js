$(document).ready(function() {
	$image_crop = $('#image_crop').croppie({
		enableExif: true,
		viewport: {
			width: 150,
			height: 150,
			type: 'square'
		},
		boundary: {
			width: 300,
			height: 300
		}
	});

	$('#upload_image').on('change', function(){
		if( $('.validate_crop_image').val() != '' )
		{
			$("#uploadimageModal").modal('show');
			var reader = new FileReader();
			reader.onload = function (event) {
				$image_crop.croppie('bind', {
					url: event.target.result
				});
			}
			reader.readAsDataURL(this.files[0]);
			$("#uploadimageModal").modal('show');
		}
		else
		{
			toastr.error("Por favor ingresa el campo indicado.");
			$('.validate_crop_image').focus();
			$("#upload_image").val('');
		}
		return;
	});


	$(".crop_button").click(function(event){
		var url = $(this).data('action');
		$image_crop.croppie('result', {
			type: 'canvas',
			size: 'viewport'
		}).then(function(response){

			$.ajax({
				url: url,
				method: "POST",
				data: {
					"image": response,
					"folder": $('.validate_crop_image').val()
				},
				success: function(data)
				{
					$("#uploadimageModal").modal('hide');
					data = data.split('|');
					$(".input_crop_image").val( data[1] );
					$(".photo-user").attr('src', data[2]);
				}
			});
		});
	});


	$(".cerrar_ventana").click(function(){
		$("#uploadimageModal").fadeOut('slow');
	});


});