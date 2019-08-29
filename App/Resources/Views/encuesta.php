<?php 
require_once RUTA_RESOURCES."/Templates/header.php"; 
require_once RUTA_RESOURCES."/Templates/Includes/gallery-main.php"; 
?>

<form class="form-encuesta" method="post" action="<?php echo RUTA_URL; ?>/Welcome/Update" >
	<div class="container">
		<div class="row justify-content-center">
			<input type="hidden" name="id_encuesta" id="id_encuesta" value="">
			<div class="col-12 col-md-10 col-lg-9 my-5">
				<div class="card">
					<div class="card-header">
						Con el fin de mejorar tu experiencia con nosotros, te invitamos a completar la siguiente encuesta.
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-lg-6">
								<div class="form-group">
									<input type="text" name="name" placeholder="Nombre" class="form-control input-update">
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="form-group">
									<input type="text" name="lastname" placeholder="Apellido" class="form-control input-update">
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="form-group">
									<input type="number" name="age" placeholder="Edad" class="form-control input-update">
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="form-group">
									<input type="text" name="city" placeholder="Ciudad" class="form-control input-update">
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="form-group">
									<input type="text" name="immovable_kind" placeholder="Tipo de inmueble que más te gusta" class="form-control input-update">
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="form-group">
									<input type="number" name="stratum" placeholder="Estrato de preferencia" class="form-control input-update">
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="form-group">
									<select class="browser-default form-control input-update" name="pets">
										<option value="1" disabled="" selected="">¿Te gustan las mascotas?</option>
										<option value="1">No</option>
										<option value="2">Si</option>
									</select>
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="form-group">
									<select class="browser-default form-control input-update" name="enviroment">
										<option value="1" disabled="" selected="">¿Qué tipo de ambiente prefieres?</option>
										<option value="1">Familiar</option>
										<option value="2">No familiar</option>
									</select>
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="form-group">
									<select class="browser-default form-control input-update" name="smooke">
										<option value="1" disabled="" selected="">¿Ambiente libre de humo?</option>
										<option value="1">No</option>
										<option value="2">Si</option>
									</select>
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="form-group">
									<input type="number" name="budget" placeholder="Presupuesto" class="form-control input-update">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<?php 
require_once RUTA_RESOURCES."/Templates/footer.php";
?>

<script type="text/javascript">
	
	var id_encuesta = getCookie("id_encuesta");
	// validamos si existe la cookie
	if( id_encuesta == ""  )
	{
		// obtenemos el número aleatorio
		var number = 100000 + Math.floor(Math.random() * 100000);
		// creamos la cookie
		setCookie( "id_encuesta", number, 185 );
		// asignamos el valor del número
		id_encuesta = number;
		// llamamos la función para crear la encuesta
		createData( id_encuesta );
	}
	// removemos la modal de mostrar la encuesta
	$(".modal-encuesta").remove();
	// asignamos el valor del id al campo de encuesta
	$("#id_encuesta").val( id_encuesta );
	

	function createData( id_encuesta )
	{
		url = $('#RUTA_URL').val()+"/Welcome/Store/"+id_encuesta;
		$.ajax({
			url: url,
			type: 'GET',
			success: function(response) {
				if( response === 'true' )
				{
					toastr.success("Registro exitoso.");
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
	}
</script>