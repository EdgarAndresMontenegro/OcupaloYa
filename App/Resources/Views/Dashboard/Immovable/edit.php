<?php require_once RUTA_RESOURCES.'/Templates/Dashboard/header.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/croppie.css">



<!-- contenido de la vista -->
<div class="container-fluid container-main">
	<form class="form-create" method="post" action="<?php echo RUTA_URL; ?>/Dashboard/Immovable/Store" autocomplete="off">
		<?php echo $this->csrfToken(); ?>
		<div class="errors-create pt-2 text-center white-text"></div>
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-6 my-5">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title d-flex align-items-center justify-content-between">
								<span class="raleway-bold">Datos del inmueble</span>
								<div>
									<button type="submit" class="btn btn-primary btn-sm float-right">
										Guardar
									</button>
									<a class="btn btn-danger btn-sm float-right" href="<?php echo RUTA_URL; ?>/Dashboard/Immovable/Listing">
										Listado
									</a>
								</div>
							</h5>
							<div class="row align-items-center my-4  mt-5">
								<div class="col-12 mb-4 d-flex justify-content-center">
									<div class="contenedor-picture"  style="border-radius: 50%; max-width: 120px;  max-height: 120px; overflow: hidden;">
										<label for="upload_image" class="image-cap" style="background-image: url(<?php echo RUTA_IMG; ?>/upload-picture.png);" title="Cambiar foto" data-toggle="tooltip"></label>
										<img src="<?php echo RUTA_IMG; ?>/users/icon-o.png" class="img-fluid photo-user" style="max-width: 120px;  max-height: 120px;">
										<input type="file" name="upload_image" id="upload_image" style="display: none;">
										<input type="hidden" class="input_crop_image" name="photo" id="photo" value="icon-o.png">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="text" name="nombre" id="nombre" class="form-control validate_crop_image" placeholder="Nombre (*)" value="">
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5 text-truncate">
											Area (*)
										</div>
										<div class="col-7">
											<input type="text" name="nit" id="nit" class="form-control" placeholder="000">
										</div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5 text-truncate">
											Tipo de inmueble
										</div>
										<div class="col-7">
											<select id="immovable_type" name="immovable_type" class="browser-default form-control load_state" data-url="<?php echo RUTA_URL; ?>/">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-lg-6 my-5">
					<div class="card">
						<h5 class="card-title d-flex align-items-center justify-content-between px-4 pt-3 pb-0 mb-0 mt-2">
							<span class="raleway-bold">Información contractual</span>
						</h5>
						<div class="card-body pt-0">
							<div class="row align-items-center">
								<div class="col-12 mt-3">
									<div class="row align-items-center justify-content-between">
										<div class="col-5 text-truncate">
											Precio (*)
										</div>
										<div class="col-7">
											<input type="email" name="email_representante" id="email_representante" class="form-control" placeholder="example@hyperlinkse.com" value="">
										</div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5 text-truncate">
											Tipo de contrato
										</div>
										<div class="col-7">
											<select id="contract_type" name="contract_type" class="browser-default form-control load_state" data-url="<?php echo RUTA_URL; ?>/">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5 text-truncate">
											Tipo de proceso
										</div>
										<div class="col-7">
											<select id="process_type" name="process_type" class="browser-default form-control load_state" data-url="<?php echo RUTA_URL; ?>/">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5 text-truncate">
											Estrato
										</div>
										<div class="col-7">
											<select id="stratum" name="stratum" class="browser-default form-control load_state" data-url="<?php echo RUTA_URL; ?>/">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5">
											Ciudad (*)
										</div>
										<div class="col-7">
											<select id="ciudad_representante_id" name="ciudad_representante_id" class="browser-default form-control load_city">
												<option>-- Seleccione un Departamento/Estado --</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5">
											Dirección
										</div>
										<div class="col-7">
											<input type="text" id="direccion_representante" name="direccion_representante" class="browser-default form-control" placeholder="Dirección" value="" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row align-items-stretch">
				<div class="col-12 col-lg-6 mb-5">
					<div class="card card-sucursal">
						<h5 class="card-title d-flex align-items-center justify-content-between px-4 pt-3 pb-0 mb-0 mt-2">
							<span class="raleway-bold">Datos adicionales</span>
						</h5>
						<div class="card-body pt-0">
							<div class="row align-items-center">
								<div class="col-12 mt-4">
									<div class="row align-items-start justify-content-between">
										<div class="col-5 text-truncate">
											Descripción
										</div>
										<div class="col-7">
											<textarea name="descripcion" id="descripcion" class="form-control" placeholder="Descripción" rows="4"></textarea>
										</div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5">
											Antigüedad
										</div>
										<div class="col-7">
											<input type="text" id="direccion_sucursal" name="direccion_sucursal[]" class="browser-default form-control" placeholder="# años" value="" />
										</div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5">
											Estado
										</div>
										<div class="col-7">
											<input type="text" id="direccion_sucursal" name="direccion_sucursal[]" class="browser-default form-control" placeholder="Condición del inmueble" value="" />
										</div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5">
											Tiempo mínimo de contrato
										</div>
										<div class="col-7">
											<input type="text" id="direccion_sucursal" name="direccion_sucursal[]" class="browser-default form-control" placeholder="Meses" value="" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>



<?php require_once RUTA_RESOURCES.'/Templates/Dashboard/footer.php'; ?>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/croppie.js"></script>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/exif.js"></script>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/crop_image.js"></script>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/dashboard/ally/ally.js"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlAsbgXVF49TGsKOdjlSyZRWB8n_w6I-0"></script>

<script type="text/javascript" src="<?php echo RUTA_JS; ?>/dashboard/coordinates.js"></script>