<?php require_once RUTA_RESOURCES.'/Templates/Dashboard/header.php'; ?>


<!-- contenido de la vista -->
<div class="container-fluid container-main" >
	<form class="form-create" method="post" action="<?php echo RUTA_URL; ?>/Dashboard/Configurations/Role/Store">
		<?php echo $this->csrfToken(); ?>
		<div class="errors-create pt-2 text-center white-text"></div>
		<div class="container pt-4">
			<div class="row justify-content-center align-items-center">
				<div class="col-12 col-md-8">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title d-flex justify-content-between align-items-center">
								<span class="raleway-regular">Tipo de rol</span>
								<a class="btn btn-danger btn-sm" href="<?php echo RUTA_URL; ?>/Dashboard/Configurations/Role/Listing">
									Listado
								</a>
							</h5>
							<div class="row align-items-center my-4  mt-5">
								<div class="col-12">
									<div class="row align-items-center justify-content-between">
										<div class="col-12">
											<input type="text" id="rol" name="rol" class="browser-default form-control" placeholder="Tipo de rol. Ej: Administrador, Cliente, etc..." value="" />
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