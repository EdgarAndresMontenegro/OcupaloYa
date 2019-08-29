<?php require_once RUTA_RESOURCES.'/Templates/Owner/header.php'; ?>

<!-- property CSS -->
<link href="<?php echo RUTA_CSS; ?>/property.css" rel="stylesheet">
<!-- property CSS -->
<link href="<?php echo RUTA_CSS; ?>/owner/publish.css" rel="stylesheet">
<!-- Stepper CSS -->
<link href="<?php echo RUTA_CSS; ?>/addons-pro/stepper.css" rel="stylesheet">
<!-- Stepper CSS - minified-->
<link href="<?php echo RUTA_CSS; ?>/addons-pro/stepper.min.css" rel="stylesheet">

<!-- contenido de la vista -->
<div class="container-fluid container-main">
	<div class="container py-5">
		<div class="row">
			<div class="col-12 col-lg-8">
				<form class="form-create" method="post" action="<?php echo RUTA_URL; ?>/Owner/Immovable/Store" enctype="multipart/form-data">
					<?php echo $this->csrfToken(); ?>
					<div class="errors-create pt-2 text-center white-text"></div>
					<div class="row first_step">
						<div class="col-12">
							<div class="card">
								<div class="card-header align-items-center d-flex justify-content-between blue white-text">
									<span class="raleway-regular">Datos generales</span>
									<a href="#" class="btn btn-white btn-sm btn_first_step" data-url="<?php echo RUTA_URL; ?>/Owner/Immovable/publish-type/">
										Siguiente
									</a>
								</div>
								<div class="card-body">
									<div class="row">
										<input type="hidden" name="poster_inmueble" id="poster_inmueble" value="foto_no_disponible_p.jpg">
										<div class="col-12 col-md-6">
											<div class="form-group">
												<input type="text" name="titulo_inmueble" id="titulo_inmueble" class="form-control" placeholder="Título del inmueble (*)" value="">
											</div>
										</div>
										<div class="col-12 col-md-6">
											<div class="form-group">
												<select id="tipo_inmueble" name="tipo_inmueble" class="browser-default form-control">
													<option value="" selected="" disabled="">-- Seleccione un tipo de inmueble --</option>
													<?php 
													foreach ($params['immovable_kind'] as $immovable_kind) 
													{
														echo "<option value='".$immovable_kind['id']."'>".ucwords( $immovable_kind['name'] )."</option>";
													} 
													?>
												</select>
											</div>
										</div>
										<div class="col-12 col-md-6">
											<div class="form-group">
												<input type="number" name="precio_inmueble" id="precio_inmueble" class="form-control" placeholder="Precio del inmueble (*)" value="">
											</div>
										</div>
										<div class="col-12 col-md-6">
											<div class="form-group">
												<select id="tipo_proceso" name="tipo_proceso" class="browser-default form-control">
													<option value="" selected="" disabled="">-- Seleccione el tipo de proceso --</option>
													<option value="1">Arriendo</option>
													<option value="2">Permuta</option>
													<option value="3">Venta</option>
												</select>
											</div>
										</div>
										<div class="col-12 col-md-6">
											<div class="form-group">
												<select id="tipo_contrato" name="tipo_contrato" class="browser-default form-control">
													<option value="" selected="" disabled="">-- Seleccione el tipo de contrato --</option>
													<option value="1">Directo</option>
													<option value="2">Inmobiliaria</option>
												</select>
											</div>
										</div>									
										<div class="col-12 col-md-6">
											<div class="form-group">
												<input type="text" name="tiempo_minimo_contrato" id="tiempo_minimo_contrato" class="form-control" placeholder="Tiempo mínimo de contrato" value="">
											</div>
										</div>		
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 mt-4">
							<div class="card">
								<div class="card-header align-items-center d-flex justify-content-between blue white-text">
									<span class="raleway-regular">Descripción del inmueble</span>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<div class="form-group">
													<textarea name="descripcion" id="descripcion" class="form-control" rows="4" placeholder="Tiempo mínimo de contrato"></textarea>
												</div>
											</div>
										</div>		
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 mt-4">
							<div class="card">
								<div class="card-header align-items-center d-flex justify-content-between blue white-text">
									<span class="raleway-regular">Datos del inmueble</span>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-12 col-md-6">
											<div class="form-group">
												<input type="text" name="area" id="area" class="form-control" placeholder="Área en metros cuadrados" value="">
											</div>
										</div>										
										<div class="col-12 col-md-6">
											<div class="form-group">
												<input type="text" name="habitaciones" id="habitaciones" class="form-control" placeholder="Cantidad de habitaciones" value="">
											</div>
										</div>									
										<div class="col-12 col-md-6">
											<div class="form-group">
												<input type="text" name="banos" id="banos" class="form-control" placeholder="Cantidad de baños" value="">
											</div>
										</div>										
										<div class="col-12 col-md-6">
											<div class="form-group">
												<select id="garaje" name="garaje" class="browser-default form-control">
													<option value="" selected="" disabled="">¿Acceso a Garaje?</option>
													<option value="1">No</option>
													<option value="2">Si</option>
												</select>
											</div>
										</div>									
										<div class="col-12 col-md-6">
											<div class="form-group">
												<input type="text" name="antiguedad" id="antiguedad" class="form-control" placeholder="Antiguedad" value="">
											</div>
										</div>										
										<div class="col-12 col-md-6">
											<div class="form-group">
												<input type="text" name="estrato" id="estrato" class="form-control" placeholder="Estrato" value="">
											</div>
										</div>									
										<div class="col-12 col-md-6">
											<div class="form-group">
												<select id="estado" name="estado" class="browser-default form-control">
													<option value="" selected="" disabled="">-- Estado del inmueble --</option>
													<option value="1">Excelente</option>
													<option value="2">Muy bueno</option>
													<option value="3">Bueno</option>
													<option value="4">Regular</option>
													<option value="5">Malo</option>
												</select>
											</div>
										</div>		
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row second_step">
						<div class="col-12">
							<div class="card">
								<div class="card-header align-items-center d-flex justify-content-between blue white-text raleway-regular">
									<span class="raleway-regular">Datos <span class="title_second_step"></span></span>
									<div class="text-right">
										<a href="#" class="btn btn-white btn-sm btn_second_step_before">
											Anterior
										</a>
										<button type="submit" class="btn btn-danger btn-sm float-right">
											Publicar
										</button>
									</div>
								</div>
								<div class="card-body data_immovable_kind">

								</div>
							</div>
						</div>
						<div class="col-12 mt-4">
							<div class="card">
								<div class="card-header align-items-center d-flex justify-content-between blue white-text">
									<span class="raleway-regular">Fotos del inmueble</span>
								</div>
								<div class="card-body">
									<div class="row content_picture_immovable">
										<div class="col-6 col-md-3">
											<label for="add_picture_immovable" title="Agregar campo de foto" data-toggle="tooltip">
												<img src="<?php echo RUTA_IMG; ?>/upload-picture.png" class="img-fluid add_photo_immovable" style="max-width: 150px;  max-height: 150px; cursor: pointer;" title="Agregar campo de foto" data-toggle="tooltip">
											</label>
											<input type="file" name="picture_immovable" id="add_picture_immovable" data-url="<?php echo RUTA_URL; ?>/Owner/Immovable/uploadimg" class="d-none">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-12 col-lg-4 mt-4 mt-lg-0">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-12">
						<div class="container-card-property">
							<div class="card-property">
								<div class="image-property">
									<img src="<?php echo RUTA_IMG; ?>/immovable/foto_no_disponible_p.jpg">
									<div class="text-image-property tipo_proceso">Arriendo</div>
								</div>
								<div class="description-property">
									<a href="" class="my-3 d-block" data-toggle="tooltip" title="Ver detalles del inmueble">
										<strong class="text-truncate titulo_inmueble">Titulo del inmueble</strong>
									</a>
									<div class="row features-property">
										<div class="col-6 col-sm-3 text-center">
											Área(m<sup>2</sup>)
											<p class="text-truncate">
												<i class="fa fa-ruler-combined mr-1"></i>
												<span class="area">-</span>
											</p>
										</div>
										<div class="col-6 col-sm-3 text-center">
											Habit.
											<p class="text-truncate">
												<i class="fa fa-bed mr-1"></i>
												<span class="habitaciones">-</span>
											</p>
										</div>
										<div class="col-6 col-sm-3 text-center">
											Baños
											<p class="text-truncate">
												<i class="fa fa-bath mr-1"></i>
												<span class="banos">-</span>
											</p>
										</div>
										<div class="col-6 col-sm-3 text-center">
											Garaje
											<p class="text-truncate">
												<i class="fa fa-car mr-1"></i>
												<span class="garaje">-</span>
											</p>
										</div>
									</div>
								</div>
								<div class="footer-property grey lighten-4">
									<div class="row px-3 py-1">
										<div class="col-7 p-2 text-truncate">
											$<span class="precio_inmueble">0</span> COP
										</div>
										<div class="col-5 p-2 text-center">
											<a href="#" data-toggle="tooltip" title="Seguir inmueble" class="mr-2">
												<i class="fa fa-bookmark"></i>
											</a>
											<a href="#" data-toggle="tooltip" title="Agregar a favoritos" class="mr-2">
												<i class="fa fa-heart"></i>
											</a>
											<a href="#" data-toggle="tooltip" title="Comparar inmueble" class="mr-2">
												<i class="fa fa-exchange-alt"></i>
											</a>
											<a href="#" data-toggle="tooltip" title="Ver detalles del inmueble" class="mr-2">
												<i class="fab fa-readme"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-12 mt-lg-5">
						<div class="card">
							<div class="card-header blue white-text">
								<h6 class="text-truncate">
									<i class="fa fa-star"></i>
									Consejos al publicar tu inmueble
								</h6>
							</div>
							<div class="card-body">
								<p class="text-justify">Aumenta la probabilidad de obtener mejores resultados con tu anuncio aplicando las siguientes recomentaciones:</p>
								<ul class="mb-0">
									<li>Agrega al menos 1 foto.</li>
									<li>Dar una descripción real de tu inmueble.</li>
									<li>Agrega la mayor cantidad de información que puedas.</li>
									<li>Comparte tu anuncio en redes sociales.</li>
									<li>Destaca tu anuncio con nuestros planes.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once RUTA_RESOURCES.'/Templates/Owner/footer.php'; ?>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/Owner/publish.js"></script>
<!-- Stepper JavaScript -->
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/addons-pro/stepper.js"></script>
<!-- Stepper JavaScript - minified -->
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/addons-pro/stepper.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		$('.stepper').mdbStepper();
	})
</script>