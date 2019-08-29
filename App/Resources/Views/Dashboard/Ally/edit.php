<?php require_once RUTA_RESOURCES.'/Templates/Dashboard/header.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/croppie.css">
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/dashboard/ally/ally.css">


<!-- contenido de la vista -->
<div class="container-fluid container-main">
	<form class="form-create" method="post" action="<?php echo RUTA_URL; ?>/Dashboard/Ally/Update" autocomplete="off">
		<?php echo $this->csrfToken(); ?>
		<div class="errors-create pt-2 text-center white-text"></div>
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-6 my-5">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title d-flex align-items-center justify-content-between">
								<span class="raleway-bold">Datos del aliado</span>
								<div>
									<button type="submit" class="btn btn-primary btn-sm float-right">
										Actualizar
									</button>
									<a class="btn btn-danger btn-sm float-right" href="<?php echo RUTA_URL; ?>/Dashboard/Ally/Listing">
										Listado
									</a>
								</div>
							</h5>
							<input type="text" name="id" id="id" style="display: none;" value="<?php echo $params['ally']['id']; ?>">
							<div class="row align-items-center my-4  mt-5">
								<div class="col-12 mb-4 d-flex justify-content-center">
									<div class="contenedor-picture"  style="border-radius: 50%; max-width: 120px;  max-height: 120px; overflow: hidden;">
										<label for="upload_image" class="image-cap" style="background-image: url(<?php echo RUTA_IMG; ?>/upload-picture.png);" title="Cambiar foto" data-toggle="tooltip"></label>
										<img src="<?php echo RUTA_IMG; ?>/allies/<?php echo $params['ally']['logo']; ?>" class="img-fluid photo-user" style="max-width: 120px;  max-height: 120px;">
										<input type="file" name="upload_image" id="upload_image" style="display: none;">
										<input type="hidden" class="input_crop_image" name="photo" id="photo" value="<?php echo $params['ally']['logo']; ?>">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="text" name="razon_social" id="razon_social" class="form-control validate_crop_image" placeholder="Razón social (*)" value="<?php echo ucwords($params['ally']['social_reason']); ?>">
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5 text-truncate">
											NIT (*)
										</div>
										<div class="col-7">
											<input type="text" name="nit" id="nit" class="form-control" placeholder="0000000000-0" value="<?php echo $params['ally']['nit']; ?>">
										</div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5 text-truncate">
											Fecha de fundacion
										</div>
										<div class="col-7">
											<input type="date" name="fecha_de_fundacion" id="fecha_de_fundacion" class="form-control" placeholder="Fecha de fundacion" value="<?php echo $params['ally']['foundation_date']; ?>">
										</div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5 text-truncate">
											Sitio web
										</div>
										<div class="col-7">
											<input type="url" name="sitio_web" id="sitio_web" class="form-control" placeholder="https://www.example.com" value="<?php echo $params['ally']['website']; ?>">
										</div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-start justify-content-between">
										<div class="col-5 text-truncate">
											Descripción
										</div>
										<div class="col-7">
											<textarea name="descripcion" id="descripcion" class="form-control" placeholder="Descripción" rows="4"><?php echo ucfirst($params['ally']['description']); ?></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-lg-6 my-5">
					<div class="card">
						<h5 class="card-title d-flex align-items-center justify-content-between px-4 pt-3 pb-0 mb-0">
							<span class="raleway-bold">Datos del representante</span>
							<div>
								<span data-toggle="popover" title="Limpiar selección" data-placement="top" data-content="Si deseas borrar los datos del representante seleccionado y iniciar una nueva búsqueda o registro de un nuevo representante, presiona el botón." class="text-primary" style="cursor: pointer;">
									<i class="fa fa-question-circle"></i>
								</span>
								<a class="btn btn-primary btn-sm clear_owner_data" href="#">
									Limpiar selección
								</a>
							</div>
						</h5>
						<div class="card-body pt-0">
							<div class="row align-items-center">
								<input type="hidden" name="user_id" id="user_id" value="<?php echo $params['user']['id']; ?>">
								<div class="col-12">
									<p class="my-3">
										Puedes búscar los datos del usuario si ya se encuentra registrado (al seleccionar uno, solo cargarán el nombre y el email), de lo contrario ingresa los datos requerios (*). 
										<span data-toggle="popover" title="¿Dudas con la búsqueda?" data-placement="top" data-content="Cuando realizas una búsqueda, podrás seleccionar un representante para indicar que es el responsable del aliado, si deseas registrar uno nuevo, solo haz clic fuera del campo de búsqueda. Una vez seleccionado el representante, ya estará vinculado directamente con el aliado ha registrar." class="text-primary" style="cursor: pointer;">
											<i class="fa fa-question-circle"></i> ¿Cómo funciona?
										</span>
									</p>
									<div class="form-group">
										<input type="text" name="nombre_representante" id="nombre_representante" class="form-control" placeholder="Nombre del representante (*)" data-url="<?php echo RUTA_URL; ?>/Dashboard/Ally/Find-owner" value="<?php echo ucwords($params['user']['name']); ?>">
										<div class="load_owner_ally scroll"></div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5 text-truncate">
											Email (*)
										</div>
										<div class="col-7">
											<input type="email" name="email_representante" id="email_representante" class="form-control" placeholder="example@hyperlinkse.com" value="<?php echo $params['user']['username']; ?>">
										</div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5 text-truncate">
											Teléfono
										</div>
										<div class="col-7">
											<input type="number" name="telefono_representante" id="telefono_representante" class="form-control" placeholder="300 000 0000" value="<?php echo $params['userdata']['telephone']; ?>">
										</div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5 text-truncate">
											Nacionalidad
										</div>
										<div class="col-7">
											<select id="country_id" name="country_id" class="browser-default form-control load_country" data-url="<?php echo RUTA_URL; ?>/Location/find-state-by-country-id">
												<option>-- Seleccione un país --</option>
												<?php 
												foreach ($params['countries'] as $country) 
												{
													echo "<option value='".$country['id']."'>".ucwords( $country['name'] )."</option>";
												} 
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-5">
											Departamento/Estado
										</div>
										<div class="col-7">
											<select id="state_id" name="state_id" class="browser-default form-control load_state" data-url="<?php echo RUTA_URL; ?>/Location/find-city-by-state-id">
												<option>-- Seleccione un País --</option>
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
												<option>-- Seleccione una ciudad --</option>
												<?php 
												foreach ($params['cities'] as $city) 
												{
													$selected = "";
													if( $city['id'] == $params['userdata']['city_id'] )
														$selected = "selected";
													echo "<option ".$selected ." value='".$city['id']."'>".ucwords( $city['name'] )."</option>";
												} 
												?>
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
											<input type="text" id="direccion_representante" name="direccion_representante" class="browser-default form-control" placeholder="Dirección" value="<?php echo ucfirst($params['userdata']['address']); ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row align-items-stretch">
				<?php foreach ($params["allysucursal"] as $allysucursal) { ?>
					<div class="col-12 col-lg-6 mb-5">
						<div class="card card-sucursal">
							<h5 class="card-title d-flex align-items-center justify-content-between px-4 pt-3 pb-0 mb-0">
								<span class="raleway-bold">Datos de la sucursal</span>
								<a class="btn btn-danger btn-sm delete_sucursal_ally" href="#">
									Eliminar
								</a>
							</h5>
							<div class="card-body pt-0">
								<div class="row align-items-center">
									<div class="col-12 mt-4">
										<div class="row align-items-center justify-content-between">
											<div class="col-5 text-truncate">
												País
											</div>
											<div class="col-7">
												<select id="country_id" name="country_id" class="browser-default form-control load_country" data-url="<?php echo RUTA_URL; ?>/Location/find-state-by-country-id">
													<option>-- Seleccione un país --</option>
													<?php 
													foreach ($params['countries'] as $country) 
													{
														echo "<option value='".$country['id']."'>".ucwords( $country['name'] )."</option>";
													} 
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
									<div class="col-12">
										<div class="row align-items-center justify-content-between">
											<div class="col-5">
												Departamento/Estado
											</div>
											<div class="col-7">
												<select id="state_id" name="state_id" class="browser-default form-control load_state"  data-url="<?php echo RUTA_URL; ?>/Location/find-city-by-state-id">
													<option>-- Seleccione un País --</option>
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
												<select id="ciudad_sucursal_id" name="ciudad_sucursal_id[]" class="browser-default form-control load_city">
													<option>-- Seleccione una ciudad --</option>
													<?php 
													foreach ($params['cities'] as $city) 
													{
														$selected = "";
														if( $city['id'] == $allysucursal['city_id'] )
															$selected = "selected";
														echo "<option ".$selected ." value='".$city['id']."'>".ucwords( $city['name'] )."</option>";
													} 
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
									<div class="col-12">
										<div class="row align-items-center justify-content-between">
											<div class="col-5">
												Dirección (*)
											</div>
											<div class="col-7">
												<input type="text" id="direccion_sucursal" name="direccion_sucursal[]" class="browser-default form-control" placeholder="Dirección (*)" value="<?php echo ucfirst($allysucursal['address']); ?>" />
											</div>
										</div>
									</div>
									<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
									<div class="col-12">
										<div class="row align-items-center justify-content-between">
											<div class="col-5">
												Seleccione la ubicación (*)
											</div>
											<div class="col-7">
												<a href="#" data-num-div="-1" class="btn-geolocation btn btn-primary btn-block">Seleccione la ubicación</a>
											</div>
										</div>
									</div>
									<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
									<div class="col-12">
										<div class="row align-items-center justify-content-between">
											<div class="col-5">
												Teléfono
											</div>
											<div class="col-7">
												<input type="text" id="telefono_sucursal" name="telefono_sucursal[]" class="browser-default form-control" placeholder="Teléfono" value="<?php echo $allysucursal['telephone']; ?>" />
											</div>
										</div>
									</div>
									<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
									<div class="col-12">
										<div class="row align-items-center justify-content-between">
											<div class="col-5">
												Celular
											</div>
											<div class="col-7">
												<input type="text" id="celular_sucursal" name="celular_sucursal[]" class="browser-default form-control" placeholder="Celular" value="<?php echo $allysucursal['cellphone']; ?>" />
											</div>
										</div>
									</div>
									<div class="col-12 col-md-6 d-none">
										<div class="form-group">
											<label for="lat-1">Latitude</label>
											<input type="text" class="form-control" id="lat-1" name="lat[]" placeholder="Latitude" value="<?php echo $allysucursal['lattitude']; ?>">
										</div>
									</div>
									<div class="col-12 col-md-6 d-none">
										<div class="form-group">
											<label for="lon-1">Longitude</label>
											<input type="text" class="form-control" id="lon-1" name="lon[]" placeholder="Longitude" value="<?php echo $allysucursal['longitude']; ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="col-12 col-lg-6 mb-5">
					<div class="card card-sucursal card-sucursal-add">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-12 text-center">
									<i class="fa fa-store-alt display-1 mb-5"></i>
									<h3>¿Necesitas agregar más surcusales que tiene el aliado?</h3>
									<a href="" class="btn btn-outline-blue mt-3 add-sucursal">Agregar</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>



<div class="modalgeolocation" style="background-color: rgba(0,0,0,0.4); top: 0; left: 0; position: fixed; z-index: 99999999999; display: none; height: 100vh; width: 100%;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Seleccione la posición</h5>
				<button type="button" class="close close-modalgeolocation" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 col-sm-12" id="map-canvas" style="height:400px;"></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn-primary btn close-modalgeolocation" data-dismiss="modal">Guardar</button>
			</div>
		</div>
	</div>
</div>



<!-- fin contenido de la vista -->
<div class="modal fade" id="uploadimageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog mt-5" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Recortar y guardar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12 d-flex justify-content-center">
						<div id="image_crop" style="width: 300px; height: 300px;"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
				<button class="btn btn-sm btn-success crop_button" data-action="<?php echo RUTA_URL; ?>/Dashboard/Ally/uploadPhoto">Recortar</button>
			</div>
		</div>
	</div>
</div>






<?php require_once RUTA_RESOURCES.'/Templates/Dashboard/footer.php'; ?>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/croppie.js"></script>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/exif.js"></script>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/crop_image.js"></script>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/dashboard/ally/ally.js"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlAsbgXVF49TGsKOdjlSyZRWB8n_w6I-0"></script>

<script type="text/javascript" src="<?php echo RUTA_JS; ?>/dashboard/coordinates.js"></script>