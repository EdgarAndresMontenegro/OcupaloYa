<?php require_once RUTA_RESOURCES.'/Templates/Dashboard/header.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/pagination.css">
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/flag-icon.min.css">

<?php require_once RUTA_RESOURCES.'/Views/Dashboard/Configurations/tabs.php'; ?>


<!-- contenido de la vista -->
<div class="container-fluid container-main">
	<div class="container pt-5">

		<div class="row align-items-center justify-content-center">
			
			<div class="col-12 content-form-search">
				<div class="card">
					<div class="card-body">
						<form class="form-search" method="get" action="<?php echo RUTA_URL; ?>/Dashboard/Configurations/User/Pagination" data-url-change="<?php echo RUTA_URL; ?>/Dashboard/Configurations/User/Listing">
							<div class="row align-items-center">
								<div class="col-md-10">
									<div class="md-form input-group">
										<div class="input-group-prepend">
											<select id="input_whr" name="input_whr" class="browser-default form-control btn info-color waves-effect white-text">
												<option value="first_name" selected>Nombre</option>
												<option value="slug">Slug</option>
											</select>
										</div>
										<input type="text" id="value_whr" name="value_whr" class="form-control" value="" placeholder="Búsqueda" aria-describedby="value_whr" aria-label="">
										<div class="input-group-prepend">
											<button type="submit" id="btn-search" class="btn btn-info btn-sm waves-effect m-0">
												<i class="fa fa-search"></i>
											</button>
										</div>
									</div>
								</div>
								<div class="col-md-2 text-lg-center">
									<a href="<?php echo RUTA_URL; ?>/Dashboard/Configurations/User/Create" class="btn btn-info waves-effect btn-block">
										<i class="fa fa-plus mr-2"></i>
										<small class="d-md-none d-lg-inline">Nuevo</small>
									</a>
								</div>
							</div>
						</form>

						<div class="errors-delete"></div>
					</div>
				</div>
			</div>

			<div class="col-12">
				<div class="row justify-content-start content-pagination">
					<?php echo $params['list']; ?>
				</div>
				<div class="row align-items-center my-3">
					<div class="col-md-6">
						Listado por página <b class="raleway-bold"><?php echo LIMIT_PAGE; ?></b> | Total: <b class="raleway-bold"><?php echo $params['cant']; ?></b>
					</div>
					<div class="col-md-6 render-pagination justify-content-end">
						<?php echo $params['render']; ?>
					</div>
				</div>
			</div>

		</div>
		
		<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-sm modal-notify modal-danger" role="document">
				<div class="modal-content text-center">
					<div class="modal-header d-flex justify-content-center">
						<p class="heading">¿Está seguro de eliminar?</p>
					</div>
					<div class="modal-body">
						<i class="fa fa-times fa-4x animated rotateIn"></i>
					</div>
					<div class="modal-footer flex-center">
						<input type="hidden" id="id-form-delete" id-form-delete="name">
						<a id="btn-form-delete" class="form-delete btn btn-outline-danger">Si</a>
						<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once RUTA_RESOURCES.'/Templates/Dashboard/footer.php'; ?>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/pagination.js"></script>