<div class="container-fluid px-0">
	<!--Carousel Wrapper-->
	<div id="gallery-main" class="carousel slide carousel-fade" data-ride="carousel">
		<!--Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#gallery-main" data-slide-to="0" class="active"></li>
			<li data-target="#gallery-main" data-slide-to="1"></li>
			<li data-target="#gallery-main" data-slide-to="2"></li>
		</ol>
		<!--/.Indicators-->
		<!--Slides-->
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<!--Mask color-->
				<div class="view">
					<img src="<?php echo RUTA_IMG; ?>/gal-3.jpg"
					alt="Third slide">
				</div>
				<div class="carousel-caption">
					<h3 class="h3-responsive" style="text-shadow: 3px 1px 2px #000;">¡Búsca tu inmueble ideal!</h3>
				</div>
			</div>
			<div class="carousel-item">
				<div class="view">
					<img src="<?php echo RUTA_IMG; ?>/gal-1.jpg"
					alt="First slide">
				</div>
				<div class="carousel-caption">
					<h3 class="h3-responsive" style="text-shadow: 3px 1px 2px #000;">¡Comparte con los que más quieres!</h3>
				</div>
			</div>
			<div class="carousel-item">
				<!--Mask color-->
				<div class="view">
					<img src="<?php echo RUTA_IMG; ?>/gal-2.jpg"
					alt="Second slide">
				</div>
				<div class="carousel-caption">
					<h3 class="h3-responsive" style="text-shadow: 3px 1px 2px #000;">Disfruta de espacios para cualquier ocasión.</h3>
				</div>
			</div>
		</div>
		<!--/.Slides-->
		<!--Controls-->
		<a class="carousel-control-prev" href="#gallery-main" role="button" data-slide="prev">
			<i class="fa fa-angle-left"></i>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#gallery-main" role="button" data-slide="next">
			<i class="fa fa-angle-right"></i>
			<span class="sr-only">Next</span>
		</a>
		<!--/.Controls-->
	</div>
	<!--/.Carousel Wrapper-->

	<div id="form-search-main">
		<?php require_once RUTA_RESOURCES."/Templates/Includes/form-search.php";  ?>
	</div>
</div>