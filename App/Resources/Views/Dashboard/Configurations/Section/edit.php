<?php require_once RUTA_RESOURCES.'/Templates/Dashboard/header.php'; ?>

<!-- contenido de la vista -->
<div class="container-fluid container-main" >
	<form class="form-edit" method="post" action="<?php echo RUTA_URL; ?>/Dashboard/Configurations/Section/Update">
		<?php echo $this->csrfToken(); ?>
		<div class="errors-edit pt-2 text-center white-text"></div>
		<div class="container pt-4">
			<div class="row justify-content-center align-items-center">
				<div class="col-12 col-md-8">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title d-flex justify-content-between align-items-center">
								<span class="raleway-regular">Nombre de la sección</span>
								<a class="btn btn-danger btn-sm" href="<?php echo RUTA_URL; ?>/Dashboard/Configurations/Section/Listing">
									Listado
								</a>
							</h5>
							<div class="row align-items-center my-4  mt-5">
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-12">
											<input type="hidden" id="id" name="id" value="<?php echo ucfirst($params['section']['id']); ?>" />
											<input type="text" id="seccion" name="seccion" class="browser-default form-control" placeholder="Nombre de la sección. Ej: Administrador, Cliente, etc..." value="<?php echo ucfirst($params['section']['name']); ?>" />
										</div>
									</div>
								</div>
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