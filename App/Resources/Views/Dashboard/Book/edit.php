<?php require_once RUTA_RESOURCES.'/Templates/Dashboard/header.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/croppie.css">


<!-- contenido de la vista -->
<div class="container-fluid container-main">
	<form class="form-edit" method="post" action="<?php echo RUTA_URL; ?>/Dashboard/Book/Update">
		<?php echo $this->csrfToken(); ?>
		<div class="errors-edit pt-2 text-center white-text"></div>
		<div class="container pb-5">
			<div class="row">
				<div class="col-12 col-lg-6">
					<div class="row">
						<div class="col-12 mt-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">
										<span class="raleway-regular">Reserva</span>
										<button type="submit" class="btn btn-primary btn-sm float-right">
											Actualizar
										</button>
										<a class="btn btn-danger btn-sm float-right" href="<?php echo RUTA_URL; ?>/Dashboard/Book/Listing">
											Listado
										</a>
									</h5>

									<input type="hidden" name="id" value="<?php echo $params['user']['id']; ?>">
									<div class="row align-items-center my-4  mt-5">
										<div class="col-12">
											<div class="row align-items-center justify-content-between">
												<div class="col-5">
													Estado
												</div>
												<div class="col-7">
													<select id="state_id" name="state_id" class="browser-default form-control">
														<option>-- Aprobado --</option>
														<?php 
														foreach ($params['books'] as $book) 
														{
															$selected = "";
															if( $book['id'] == $params['book_immovable']['state_id'] )
																$selected = "selected";
															echo "<option ".$selected ." value='".$book['id']."'>".ucwords( $book['state'] )."</option>";
														} 
														?>
													</select>
												</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 mt-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">
										<span class="raleway-regular">Acuerdo</span>
									</h5>
									<div class="row align-items-center mt-4 mb-1">
										<div class="col-12">
											<div class="row align-items-center justify-content-between">
												<div class="col-5">
													Tomado por interesado
												</div>
												<div class="col-7">
													<select id="took_by_interested" name="took_by_interested" class="browser-default form-control" data-url="<?php echo RUTA_URL; ?>/">
														<option>-- No --</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
										<div class="col-12">
											<div class="row align-items-center justify-content-between">
												<div class="col-5">
													Cedido por el propietario
												</div>
												<div class="col-7">
													<select id="gave_by_owner" name="gave_by_owner" class="browser-default form-control" data-url="<?php echo RUTA_URL; ?>/">
														<option>-- No --</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-12"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
										<div class="col-12">
											<div class="row align-items-center justify-content-between">
												<div class="col-5">
													Fecha para tomar
												</div>
												<div class="col-7">
													<input type="date" id="taking_date" name="taking_date" class="browser-default form-control" value="<?php echo $params['book_immovable']['taking_date']; ?>"  />
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
										<span class="raleway-regular">Retiro</span>
									</h5>
									<div class="row align-items-center mt-4 mb-1">
										<div class="col-12">
											<div class="row align-items-center justify-content-between">
												<div class="col-5">
													Estado
												</div>
												<div class="col-7">
													<select id="retire_state" name="retire_state" class="browser-default form-control" data-url="<?php echo RUTA_URL; ?>/">
														<option>-- Aprobado --</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 mt-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">
										<span class="raleway-regular">Adelanto</span>
									</h5>
									<div class="row align-items-center mt-4 mb-1">
										<div class="col-12">
											<div class="form-group">
												<input type="number" name="advanced_budget" id="advanced_budget" class="form-control" placeholder="60000000" value="<?php echo $params['book_immovable']['advanced_budget']; ?>">
											</div>
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