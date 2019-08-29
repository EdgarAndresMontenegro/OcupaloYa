<?php require_once RUTA_RESOURCES.'/Templates/Dashboard/header.php'; ?>
<!-- importamos el css que me carga los iconos de las vanderas -->
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/flag-icon.min.css">


<!-- contenido de la vista -->
<div class="container-fluid container-main">
	<div class="container pb-5">
		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="row">
					<div class="col-12 mt-4">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">
									<span class="raleway-regular">Perfil</span>
									<a href="<?php echo RUTA_URL; ?>/Dashboard/Configurations/User/Edit/<?php echo $this->Auth()->user()->slug(); ?>" class="float-right h6 text-primary" data-toggle="tooltip" title="Actualizar">
										<i class="fa fa-pen"></i>
									</a>
								</h5>
								<div class="row align-items-center my-4">
									<div class="col-sm-4 text-center">
										<img src="<?php echo RUTA_IMG; ?>/users/<?php echo $params['user']['icon']; ?>" class="img-fluid" style="border-radius: 50%; max-width: 120px;  max-height: 120px;">
									</div>
									<div class="col-sm-8">
										<h5 class="text-truncate">
											<?php echo ucwords( $params['user']['name'] ); ?>
										</h5>
										<p class="text-muted h6 mb-2 text-truncate">
											<?php echo ucwords( $params['role']['name'] ); ?>
										</p>
										<p class="text-muted h6 mb-3 text-truncate">
											Miembro desde <?php echo ConvertTrait::date( $params['user']['created_at'] ); ?>.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 mt-4">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">
									<span class="raleway-regular">Detalles de cuenta</span>
								</h5>
								<div class="row align-items-center mt-4">
									<div class="col-12">
										<div class="row align-items-center justify-content-between">
											<div class="col-4">
												Idioma
											</div>
											<div class="col-8">
												<select class="browser-default form-control">
													<option value="Español">Español</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
									<div class="col-12">
										<div class="row align-items-center justify-content-between">
											<div class="col-4">
												Zona horaria
											</div>
											<div class="col-8">
												<select class="browser-default form-control">
													<option value="<?php echo ucwords( $params['country']['time_zone'] ); ?>"><?php echo ucwords( $params['country']['time_zone'] ); ?></option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
									<div class="col-12">
										<div class="row align-items-center justify-content-between">
											<div class="col-4">
												Nacionalidad
											</div>
											<div class="col-8">
												<span class="flag-icon <?php echo $params['country']['icon']; ?> mr-1 h5"></span> <?php echo ucwords( $params['country']['name'] ); ?>
											</div>
										</div>
									</div>
									<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
									<div class="col-12">
										<div class="row align-items-center justify-content-between">
											<div class="col-4">
												Tipo de documento
											</div>
											<div class="col-8">
												<select class="browser-default form-control">
													<option <?php echo ( $params['userdata']['document_type'] == 1 ) ? 'selected' : ''; ?> value="1">Cédula de ciudadania</option>
													<option <?php echo ( $params['userdata']['document_type'] == 2 ) ? 'selected' : ''; ?> value="2">Tarjeta de identidad</option>
													<option <?php echo ( $params['userdata']['document_type'] == 3 ) ? 'selected' : ''; ?> value="3">Cédula de extranjeria</option>
													<option <?php echo ( $params['userdata']['document_type'] == 4 ) ? 'selected' : ''; ?> value="4">Pasaporte</option>
													<option <?php echo ( $params['userdata']['document_type'] == 5 ) ? 'selected' : ''; ?> value="5">Visa</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
									<div class="col-12">
										<div class="row align-items-center justify-content-between">
											<div class="col-4">
												Número documento
											</div>
											<div class="col-8">
												<input class="browser-default form-control" value="<?php echo $params['userdata']['document_number']; ?>" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-lg-6">
				<div class="row">
					<div class="col-12 mt-4">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">
									<span class="raleway-regular">Saldo</span>
									<small class="text-muted float-right">(COP)</small>
								</h5>
								<div class="row align-items-center mt-4 mb-3">
									<div class="col-12 col-lg-6">
										<h5 class="text-truncate text-primary">
											<span class="h3">100'000.000,00</span>
										</h5>
										<p class="text-muted h6 mb-4">
											Disponible
										</p>
									</div>
									<div class="col-12 col-lg-6">
										<h5 class="text-muted text-truncate">
											<span class="h3">1'000.000,00</span>
										</h5>
										<p class="text-muted h6 mb-4">
											Retenido
										</p>
									</div>
									<a href="" class="btn btn-sm btn-rounded btn-outline-primary">
										Solicitar transferencia
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 mt-4">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">
									<span class="raleway-regular">Correo electrónico vinculado</span>
								</h5>
								<div class="row align-items-center mt-4 mb-1">
									<div class="col-12">
										<p class="text-muted h6 text-truncate">
											<?php echo $params['user']['username']; ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 mt-4">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">
									<span class="raleway-regular">Télefono asociado</span>
								</h5>
								<div class="row align-items-center mt-4 mb-1">
									<div class="col-12">
										<p class="text-muted h6 text-truncate">
											<?php echo $params['country']['prefix']." ".ConvertTrait::cellphone_space( $params['userdata']['telephone'] ); ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 mt-4">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">
									<span class="raleway-regular">Dirección</span>
								</h5>
								<div class="row align-items-center mt-4 mb-1">
									<div class="col-12">
										<p class="text-muted h6 mb-3 text-truncate"><?php echo ucwords($params['userdata']['address']); ?></p>
										<p class="text-muted h6 text-truncate"><?php echo ucwords( $params['city']['name'].', '.$params['state']['name'] ); ?>.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- fin contenido de la vista -->

<?php require_once RUTA_RESOURCES.'/Templates/Dashboard/footer.php'; ?>