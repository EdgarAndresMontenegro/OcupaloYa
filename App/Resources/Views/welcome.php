<?php 
require_once RUTA_RESOURCES."/Templates/header.php"; 
require_once RUTA_RESOURCES."/Templates/Includes/gallery-main.php"; 
?>
<!-- Your custom styles (optional) -->
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/property.css">
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/additionals.css">

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-12 white">
			<p class="h5 mb-0 py-3 py-md-0 text-center text-information">
				<strong>Publica o encuentra tu inmueble en minutos</strong>
			</p>
		</div>
	</div>
</div>

<div class="container-fluid content-profiles px-0">
	<div class="mask rgba-black-strong">
		<div class="container">
			<div class="row py-3 align-items-stretch">
				<div class="col-12 col-lg-4 my-3 my-lg-2">
					<h4 class="white-text font-weight-bold text-center">Particular</h4>
					<hr class="hr-subtitle-white">
					<ul class="list-group">
						<li class="list-group-item d-flex align-content-start">
							<i class="fas fa-eye mt-1 mr-4 pr-3"></i>
							<div class="md-v-line">Realiza seguimiento a tus inmuebles.</div>
						</li>
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-heart mt-1 mr-4 pr-3"></i>
							<div class="md-v-line">Agrega los inmuebles a tus favoritos.</div>
						</li>
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-clipboard-list mt-1 mr-4 pr-3"></i>
							<div class="md-v-line">Califica el inmueble y el propietario.</div>
						</li>
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-concierge-bell mt-1 mr-4 pr-3"></i>
							<div class="md-v-line">Reserva un inmueble.</div>
						</li>
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-calendar-check mt-1 mr-4 pr-3"></i>
							<div class="md-v-line">Agenda una visita.</div>
						</li>
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-users mt-1 mr-3 pr-3"></i>
							<div class="md-v-line">Ver interesados de un inmueble.</div>
						</li>
					</ul>
					<div class="text-center mt-2">
						<a href="" class="btn btn-blue">Quiero ser particular</a>
					</div>
				</div>
				<div class="col-12 col-lg-4 my-3 my-lg-2">
					<h4 class="white-text font-weight-bold text-center">Propietario</h4>
					<hr class="hr-subtitle-white">
					<ul class="list-group">
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-user-shield mt-1 mr-4 pr-3"></i>
							<div class="md-v-line">Areá privada para administrar tus inmuebles (agregar, actualizar, eliminar, activar, desactivar, etc).</div>
						</li>
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-award mt-1 mr-4 pr-4"></i>
							<div class="md-v-line">Destacar tus anuncios.</div>
						</li>
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-chart-line mt-1 mr-4 pr-3"></i>
							<div class="md-v-line">Análisis estadístico diario.</div>
						</li>
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-handshake mt-1 mr-4 pr-3"></i>
							<div class="md-v-line">Gestión de visitas.</div>
						</li>
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-clipboard-list mt-1 mr-4 pr-4"></i>
							<div class="md-v-line">Califica al arrendatario.</div>
						</li>
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-bullhorn mt-1 mr-4 pr-3"></i>
							<div class="md-v-line">Publicar 2 inmuebles mensuales gratis.</div>
						</li>
					</ul>
					<div class="text-center mt-2">
						<a href="" class="btn btn-blue">Comenzar a publicar</a>
					</div>
				</div>

				<div class="col-12 col-lg-4 my-3 my-lg-2">
					<h4 class="white-text font-weight-bold text-center">Aliado</h4>
					<hr class="hr-subtitle-white">
					<ul class="list-group">
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-user-shield mt-1 mr-4 pr-3"></i>
							<div class="md-v-line">Areá privada para administrar tus inmuebles (agregar, actualizar, eliminar, activar, desactivar, etc)..</div>
						</li>
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-bullhorn mt-1 mr-4 pr-3"></i>
							<div class="md-v-line">Publicar todos tus inmuebles.</div>
						</li>
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-chart-line mt-1 mr-4 pr-3"></i>
							<div class="md-v-line">Análisis estadístico diario.</div>
						</li>
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-pager mt-1 mr-4 pr-3"></i>
							<div class="md-v-line">Página con tu logo y información empresarial.</div>
						</li>
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-clipboard-list mt-1 mr-4 pr-4"></i>
							<div class="md-v-line">Califica al arrendatario.</div>
						</li>
						<li class="list-group-item d-flex align-items-awardt">
							<i class="fas fa-handshake mt-1 mr-4 pr-3"></i>
							<div class="md-v-line">Gestión de visitas.</div>
						</li>
					</ul>
					<div class="text-center mt-2">
						<a href="" class="btn btn-blue">Afiliarme</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row my-4">
		<div class="col-12">
			<h2 class="h5 text-center blue-text font-weight-bold text-uppercase">Inmuebles recomendados</h2>
			<hr class="hr-subtitle">
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-6 col-lg-4 mb-4">
			<div class="card-property">
				<div class="image-property">
					<img src="<?php echo RUTA_IMG; ?>/welcome/banner-profiles.jpg">
					<div class="text-image-property">Arriendo</div>
				</div>
				<div class="description-property">
					<a href="<?php echo RUTA_URL;?>/inmuebles/detalles" class="my-3 d-block" data-toggle="tooltip" title="Ver detalles del inmueble"><strong>Titulo del inmueble</strong></a>
					<div class="row features-property">
						<div class="col-6 col-sm-3 text-center">
							Área (m<sup>2</sup>)
							<p>
								<i class="fa fa-ruler-combined mr-1"></i>
								80
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Habit.
							<p>
								<i class="fa fa-bed mr-1"></i>
								4
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Baños
							<p>
								<i class="fa fa-bath mr-1"></i>
								2
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Garaje
							<p>
								<i class="fa fa-car mr-1"></i>
								Si
							</p>
						</div>
					</div>
				</div>
				<div class="footer-property grey lighten-4">
					<div class="row px-3 py-1">
						<div class="col-7 p-2">
							$1.502.150.000 COP
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
		<div class="col-12 col-md-6 col-lg-4 mb-4">
			<div class="card-property highlight">
				<div class="image-property">
					<img src="<?php echo RUTA_IMG; ?>/welcome/banner-profiles.jpg">
					<div class="text-image-property">Arriendo</div>
					<div class="highlight-image-property" data-toggle="tooltip" data-placement="right" title="Inmueble destacado">
						<i class="fa fa-award animated tada infinite"></i>
					</div>
				</div>
				<div class="description-property">
					<a href="" class="my-3 d-block" data-toggle="tooltip" title="Ver detalles del inmueble"><strong>Titulo del inmueble</strong></a>
					<div class="row features-property">
						<div class="col-6 col-sm-3 text-center">
							Área (m<sup>2</sup>)
							<p>
								<i class="fa fa-ruler-combined mr-1"></i>
								80
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Habit.
							<p>
								<i class="fa fa-bed mr-1"></i>
								4
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Baños
							<p>
								<i class="fa fa-bath mr-1"></i>
								2
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Garaje
							<p>
								<i class="fa fa-car mr-1"></i>
								Si
							</p>
						</div>
					</div>
				</div>
				<div class="footer-property grey lighten-4">
					<div class="row px-3 py-1">
						<div class="col-7 p-2">
							$1.502.150.000 COP
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
		<div class="col-12 col-md-6 col-lg-4 mb-4">
			<div class="card-property">
				<div class="image-property">
					<img src="<?php echo RUTA_IMG; ?>/welcome/banner-profiles.jpg">
					<div class="text-image-property">Arriendo</div>
				</div>
				<div class="description-property">
					<a href="" class="my-3 d-block" data-toggle="tooltip" title="Ver detalles del inmueble"><strong>Titulo del inmueble</strong></a>
					<div class="row features-property">
						<div class="col-6 col-sm-3 text-center">
							Área (m<sup>2</sup>)
							<p>
								<i class="fa fa-ruler-combined mr-1"></i>
								80
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Habit.
							<p>
								<i class="fa fa-bed mr-1"></i>
								4
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Baños
							<p>
								<i class="fa fa-bath mr-1"></i>
								2
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Garaje
							<p>
								<i class="fa fa-car mr-1"></i>
								Si
							</p>
						</div>
					</div>
				</div>
				<div class="footer-property grey lighten-4">
					<div class="row px-3 py-1">
						<div class="col-7 p-2">
							$1.502.150.000 COP
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
		<div class="col-12 col-md-6 col-lg-4 mb-4">
			<div class="card-property highlight">
				<div class="image-property">
					<img src="<?php echo RUTA_IMG; ?>/welcome/banner-profiles.jpg">
					<div class="text-image-property">Venta</div>
					<div class="highlight-image-property" data-toggle="tooltip" data-placement="right" title="Inmueble destacado">
						<i class="fa fa-award animated tada infinite"></i>
					</div>
				</div>
				<div class="description-property">
					<a href="" class="my-3 d-block" data-toggle="tooltip" title="Ver detalles del inmueble"><strong>Titulo del inmueble</strong></a>
					<div class="row features-property">
						<div class="col-6 col-sm-3 text-center">
							Área (m<sup>2</sup>)
							<p>
								<i class="fa fa-ruler-combined mr-1"></i>
								80
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Habit.
							<p>
								<i class="fa fa-bed mr-1"></i>
								4
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Baños
							<p>
								<i class="fa fa-bath mr-1"></i>
								2
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Garaje
							<p>
								<i class="fa fa-car mr-1"></i>
								Si
							</p>
						</div>
					</div>
				</div>
				<div class="footer-property grey lighten-4">
					<div class="row px-3 py-1">
						<div class="col-7 p-2">
							$1.502.150.000 COP
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
		<div class="col-12 col-md-6 col-lg-4 mb-4">
			<div class="card-property highlight">
				<div class="image-property">
					<img src="<?php echo RUTA_IMG; ?>/welcome/banner-profiles.jpg">
					<div class="text-image-property">Venta</div>
					<div class="highlight-image-property" data-toggle="tooltip" data-placement="right" title="Inmueble destacado">
						<i class="fa fa-award animated tada infinite"></i>
					</div>
				</div>
				<div class="description-property">
					<a href="" class="my-3 d-block" data-toggle="tooltip" title="Ver detalles del inmueble"><strong>Titulo del inmueble</strong></a>
					<div class="row features-property">
						<div class="col-6 col-sm-3 text-center">
							Área (m<sup>2</sup>)
							<p>
								<i class="fa fa-ruler-combined mr-1"></i>
								80
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Habit.
							<p>
								<i class="fa fa-bed mr-1"></i>
								4
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Baños
							<p>
								<i class="fa fa-bath mr-1"></i>
								2
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Garaje
							<p>
								<i class="fa fa-car mr-1"></i>
								Si
							</p>
						</div>
					</div>
				</div>
				<div class="footer-property grey lighten-4">
					<div class="row px-3 py-1">
						<div class="col-7 p-2">
							$1.502.150.000 COP
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
		<div class="col-12 col-md-6 col-lg-4 mb-4">
			<div class="card-property highlight">
				<div class="image-property">
					<img src="<?php echo RUTA_IMG; ?>/welcome/banner-profiles.jpg">
					<div class="text-image-property">Permuta</div>
					<div class="highlight-image-property" data-toggle="tooltip" data-placement="right" title="Inmueble destacado">
						<i class="fa fa-award animated tada infinite"></i>
					</div>
				</div>
				<div class="description-property">
					<a href="" class="my-3 d-block" data-toggle="tooltip" title="Ver detalles del inmueble"><strong>Titulo del inmueble</strong></a>
					<div class="row features-property">
						<div class="col-6 col-sm-3 text-center">
							Área (m<sup>2</sup>)
							<p>
								<i class="fa fa-ruler-combined mr-1"></i>
								80
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Habit.
							<p>
								<i class="fa fa-bed mr-1"></i>
								4
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Baños
							<p>
								<i class="fa fa-bath mr-1"></i>
								2
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Garaje
							<p>
								<i class="fa fa-car mr-1"></i>
								Si
							</p>
						</div>
					</div>
				</div>
				<div class="footer-property grey lighten-4">
					<div class="row px-3 py-1">
						<div class="col-7 p-2">
							$1.502.150.000 COP
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
		<div class="col-12 col-md-6 col-lg-4 mb-4">
			<div class="card-property highlight">
				<div class="image-property">
					<img src="<?php echo RUTA_IMG; ?>/welcome/banner-profiles.jpg">
					<div class="text-image-property">Venta</div>
					<div class="highlight-image-property" data-toggle="tooltip" data-placement="right" title="Inmueble destacado">
						<i class="fa fa-award animated tada infinite"></i>
					</div>
				</div>
				<div class="description-property">
					<a href="" class="my-3 d-block" data-toggle="tooltip" title="Ver detalles del inmueble"><strong>Titulo del inmueble</strong></a>
					<div class="row features-property">
						<div class="col-6 col-sm-3 text-center">
							Área (m<sup>2</sup>)
							<p>
								<i class="fa fa-ruler-combined mr-1"></i>
								80
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Habit.
							<p>
								<i class="fa fa-bed mr-1"></i>
								4
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Baños
							<p>
								<i class="fa fa-bath mr-1"></i>
								2
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Garaje
							<p>
								<i class="fa fa-car mr-1"></i>
								Si
							</p>
						</div>
					</div>
				</div>
				<div class="footer-property grey lighten-4">
					<div class="row px-3 py-1">
						<div class="col-7 p-2">
							$1.502.150.000 COP
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
		<div class="col-12 col-md-6 col-lg-4 mb-4">
			<div class="card-property highlight">
				<div class="image-property">
					<img src="<?php echo RUTA_IMG; ?>/welcome/banner-profiles.jpg">
					<div class="text-image-property">Venta</div>
					<div class="highlight-image-property" data-toggle="tooltip" data-placement="right" title="Inmueble destacado">
						<i class="fa fa-award animated tada infinite"></i>
					</div>
				</div>
				<div class="description-property">
					<a href="" class="my-3 d-block" data-toggle="tooltip" title="Ver detalles del inmueble"><strong>Titulo del inmueble</strong></a>
					<div class="row features-property">
						<div class="col-6 col-sm-3 text-center">
							Área (m<sup>2</sup>)
							<p>
								<i class="fa fa-ruler-combined mr-1"></i>
								80
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Habit.
							<p>
								<i class="fa fa-bed mr-1"></i>
								4
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Baños
							<p>
								<i class="fa fa-bath mr-1"></i>
								2
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Garaje
							<p>
								<i class="fa fa-car mr-1"></i>
								Si
							</p>
						</div>
					</div>
				</div>
				<div class="footer-property grey lighten-4">
					<div class="row px-3 py-1">
						<div class="col-7 p-2">
							$1.502.150.000 COP
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
		<div class="col-12 col-md-6 col-lg-4 mb-4">
			<div class="card-property highlight">
				<div class="image-property">
					<img src="<?php echo RUTA_IMG; ?>/welcome/banner-profiles.jpg">
					<div class="text-image-property">Permuta</div>
					<div class="highlight-image-property" data-toggle="tooltip" data-placement="right" title="Inmueble destacado">
						<i class="fa fa-award animated tada infinite"></i>
					</div>
				</div>
				<div class="description-property">
					<a href="" class="my-3 d-block" data-toggle="tooltip" title="Ver detalles del inmueble"><strong>Titulo del inmueble</strong></a>
					<div class="row features-property">
						<div class="col-6 col-sm-3 text-center">
							Área (m<sup>2</sup>)
							<p>
								<i class="fa fa-ruler-combined mr-1"></i>
								80
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Habit.
							<p>
								<i class="fa fa-bed mr-1"></i>
								4
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Baños
							<p>
								<i class="fa fa-bath mr-1"></i>
								2
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Garaje
							<p>
								<i class="fa fa-car mr-1"></i>
								Si
							</p>
						</div>
					</div>
				</div>
				<div class="footer-property grey lighten-4">
					<div class="row px-3 py-1">
						<div class="col-7 p-2">
							$1.502.150.000 COP
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
		<div class="col-12 col-md-6 col-lg-4 mb-4">
			<div class="card-property highlight">
				<div class="image-property">
					<img src="<?php echo RUTA_IMG; ?>/welcome/banner-profiles.jpg">
					<div class="text-image-property">Venta</div>
					<div class="highlight-image-property" data-toggle="tooltip" data-placement="right" title="Inmueble destacado">
						<i class="fa fa-award animated tada infinite"></i>
					</div>
				</div>
				<div class="description-property">
					<a href="" class="my-3 d-block" data-toggle="tooltip" title="Ver detalles del inmueble"><strong>Titulo del inmueble</strong></a>
					<div class="row features-property">
						<div class="col-6 col-sm-3 text-center">
							Área (m<sup>2</sup>)
							<p>
								<i class="fa fa-ruler-combined mr-1"></i>
								80
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Habit.
							<p>
								<i class="fa fa-bed mr-1"></i>
								4
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Baños
							<p>
								<i class="fa fa-bath mr-1"></i>
								2
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Garaje
							<p>
								<i class="fa fa-car mr-1"></i>
								Si
							</p>
						</div>
					</div>
				</div>
				<div class="footer-property grey lighten-4">
					<div class="row px-3 py-1">
						<div class="col-7 p-2">
							$1.502.150.000 COP
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
		<div class="col-12 col-md-6 col-lg-4 mb-4">
			<div class="card-property highlight">
				<div class="image-property">
					<img src="<?php echo RUTA_IMG; ?>/welcome/banner-profiles.jpg">
					<div class="text-image-property">Venta</div>
					<div class="highlight-image-property" data-toggle="tooltip" data-placement="right" title="Inmueble destacado">
						<i class="fa fa-award animated tada infinite"></i>
					</div>
				</div>
				<div class="description-property">
					<a href="" class="my-3 d-block" data-toggle="tooltip" title="Ver detalles del inmueble"><strong>Titulo del inmueble</strong></a>
					<div class="row features-property">
						<div class="col-6 col-sm-3 text-center">
							Área (m<sup>2</sup>)
							<p>
								<i class="fa fa-ruler-combined mr-1"></i>
								80
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Habit.
							<p>
								<i class="fa fa-bed mr-1"></i>
								4
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Baños
							<p>
								<i class="fa fa-bath mr-1"></i>
								2
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Garaje
							<p>
								<i class="fa fa-car mr-1"></i>
								Si
							</p>
						</div>
					</div>
				</div>
				<div class="footer-property grey lighten-4">
					<div class="row px-3 py-1">
						<div class="col-7 p-2">
							$1.502.150.000 COP
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
		<div class="col-12 col-md-6 col-lg-4 mb-4">
			<div class="card-property highlight">
				<div class="image-property">
					<img src="<?php echo RUTA_IMG; ?>/welcome/banner-profiles.jpg">
					<div class="text-image-property">Permuta</div>
					<div class="highlight-image-property" data-toggle="tooltip" data-placement="right" title="Inmueble destacado">
						<i class="fa fa-award animated tada infinite"></i>
					</div>
				</div>
				<div class="description-property">
					<a href="" class="my-3 d-block" data-toggle="tooltip" title="Ver detalles del inmueble"><strong>Titulo del inmueble</strong></a>
					<div class="row features-property">
						<div class="col-6 col-sm-3 text-center">
							Área (m<sup>2</sup>)
							<p>
								<i class="fa fa-ruler-combined mr-1"></i>
								80
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Habit.
							<p>
								<i class="fa fa-bed mr-1"></i>
								4
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Baños
							<p>
								<i class="fa fa-bath mr-1"></i>
								2
							</p>
						</div>
						<div class="col-6 col-sm-3 text-center">
							Garaje
							<p>
								<i class="fa fa-car mr-1"></i>
								Si
							</p>
						</div>
					</div>
				</div>
				<div class="footer-property grey lighten-4">
					<div class="row px-3 py-1">
						<div class="col-7 p-2">
							$1.502.150.000 COP
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
</div>


<div class="container-fluid grey lighten-4 mt-4 pt-4" style="padding-bottom: 1px;">
	<div class="container">
		<div class="row pt-4">
			<div class="col-12">
				<h2 class="h5 text-center blue-text font-weight-bold text-uppercase">Nuestros afiliados</h2>
				<hr class="hr-subtitle">
			</div>
		</div>
		<div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2 mt-0" data-ride="carousel">
			<div class="controls-top controls-slider-afiliados">
				<div class="row align-content-center">
					<div class="col-6 text-left">
						<a class="btn-floating" href="#carousel-example-multi" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
					</div>
					<div class="col-6 text-right">
						<a class="btn-floating" href="#carousel-example-multi" data-slide="next"><i class="fas fa-chevron-right"></i></a>
					</div>
				</div>
			</div>

			<div class="carousel-inner v-2 mt-5" role="listbox">
				<div class="carousel-item active">
					<div class="col-12 col-md-4 text-center">
						<img class="card-img-top img-fluid" style="max-width: 250px;" src="<?php echo RUTA_IMG; ?>/inmuebles/foto_no_disponible_p.jpg" alt="Card image cap">
						<h3 class="h5 my-2">Nombre inmobiliaria</h3>
						<div class="">
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star-half-alt blue-text"></i>
							<i class="far fa-star blue-text"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="col-12 col-md-4 text-center">
						<img class="card-img-top img-fluid" style="max-width: 250px;" src="<?php echo RUTA_IMG; ?>/inmuebles/foto_no_disponible_p.jpg" alt="Card image cap">
						<h3 class="h5 my-2">Nombre inmobiliaria</h3>
						<div class="">
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star-half-alt blue-text"></i>
							<i class="far fa-star blue-text"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="col-12 col-md-4 text-center">
						<img class="card-img-top img-fluid" style="max-width: 250px;" src="<?php echo RUTA_IMG; ?>/inmuebles/foto_no_disponible_p.jpg" alt="Card image cap">
						<h3 class="h5 my-2">Nombre inmobiliaria</h3>
						<div class="">
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star blue-text"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="col-12 col-md-4 text-center">
						<img class="card-img-top img-fluid" style="max-width: 250px;" src="<?php echo RUTA_IMG; ?>/inmuebles/foto_no_disponible_p.jpg" alt="Card image cap">
						<h3 class="h5 my-2">Nombre inmobiliaria</h3>
						<div class="">
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star-half-alt blue-text"></i>
							<i class="far fa-star blue-text"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="col-12 col-md-4 text-center">
						<img class="card-img-top img-fluid" style="max-width: 250px;" src="<?php echo RUTA_IMG; ?>/inmuebles/foto_no_disponible_p.jpg" alt="Card image cap">
						<h3 class="h5 my-2">Nombre inmobiliaria</h3>
						<div class="">
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star-half-alt blue-text"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="col-12 col-md-4 text-center">
						<img class="card-img-top img-fluid" style="max-width: 250px;" src="<?php echo RUTA_IMG; ?>/inmuebles/foto_no_disponible_p.jpg" alt="Card image cap">
						<h3 class="h5 my-2">Nombre inmobiliaria</h3>
						<div class="">
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star blue-text"></i>
							<i class="fa fa-star-half-alt blue-text"></i>
							<i class="far fa-star blue-text"></i>
						</div>
					</div>
				</div>
			</div>
			

		</div>
	</div>
</div>

<?php require_once RUTA_RESOURCES."/Templates/footer.php"; ?>

<script type="text/javascript">
	$('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
		var next = $(this).next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));

		for (var i=0;i<4;i++) {
			next=next.next();
			if (!next.length) {
				next=$(this).siblings(':first');
			}
			next.children(':first-child').clone().appendTo($(this));
		}
	});
</script>