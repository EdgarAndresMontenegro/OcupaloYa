<?php require_once RUTA_RESOURCES.'/Templates/Dashboard/header.php'; ?>


<!-- contenido de la vista -->
<div class="container-fluid container-main" >
	<form class="form-create" method="post" action="<?php echo RUTA_URL; ?>/Dashboard/Configurations/Plan/Store">
		<?php echo $this->csrfToken(); ?>
		<div class="errors-create pt-2 text-center white-text"></div>
		<div class="container pt-4">
			<div class="row justify-content-center align-items-center">
				<div class="col-12 col-md-10">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title d-flex justify-content-between align-items-center">
								<span class="raleway-regular">Nuevo plan</span>
								<a class="btn btn-danger btn-sm" href="<?php echo RUTA_URL; ?>/Dashboard/Configurations/Plan/Listing">
									Listado
								</a>
							</h5>
							<div class="row align-items-center mt-4">
								<div class="col-12 col-lg-4 mb-4">
									<input type="text" id="plan" name="plan" class="browser-default form-control" placeholder="Nombre" value="" />
								</div>
								<div class="col-12 col-lg-4 mb-4">
									<input type="number" id="precio" name="precio" class="browser-default form-control" placeholder="Precio" value="" min="0" />
								</div>
								<div class="col-12 col-lg-4 mb-4">
									<input type="number" id="dias_activo" name="dias_activo" class="browser-default form-control" placeholder="Días activo" value="" min="0" />
								</div>
							</div>
							<div class="row">
								<div class="col-12 mb-3"> <hr style="border-style: dashed; border-color: #ccc;"> </div>
								<div class="col-12 mb-3">
									<h5>Secciones</h5>
								</div>
							</div>
							<div class="row align-items-center mb-3">
								<?php 
									foreach ($params['sections'] as $section) 
									{
										echo '
											<div class="col-12 col-md-4 col-lg-3">
												<div class="form-check">
													<input type="checkbox" class="form-check-input" id="chk-'.$section['name'].'" name="secciones[]" value="'.$section['id'].'">
													<label class="form-check-label" for="chk-'.$section['name'].'">'.ucfirst( $section['name'] ).'</label>
												</div>
											</div>
										';
									}
								?>
							</div>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary btn-sm float-right">
								Guardar
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<?php require_once RUTA_RESOURCES.'/Templates/Dashboard/footer.php'; ?>