<?php require_once RUTA_RESOURCES.'/Templates/Dashboard/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/dashboard/welcome/statistics.css">


<!-- Classic tabs -->
<div class="classic-tabs">
	
	<div class="container-fluid blue darken-3">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<ul class="nav" id="myClassicTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active show" id="profile-tab-classic" data-toggle="tab" href="#profile-classic" role="tab" aria-controls="profile-classic" aria-selected="true">Estadisticas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="follow-tab-classic" data-toggle="tab" href="#follow-classic" role="tab" aria-controls="follow-classic" aria-selected="false">Recientes</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="contact-tab-classic" data-toggle="tab" href="#contact-classic" role="tab" aria-controls="contact-classic" aria-selected="false">Destacados</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="awesome-tab-classic" data-toggle="tab" href="#awesome-classic" role="tab" aria-controls="awesome-classic" aria-selected="false">Soporte</a>
						</li>
					</ul>
					<div class="triangulo"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-content" id="myClassicTabContent">
		<div class="tab-pane fade active show" id="profile-classic" role="tabpanel" aria-labelledby="profile-tab-classic">
			<?php require_once RUTA_RESOURCES.'/Views/Dashboard/Welcome/statistics.php'; ?>
		</div>
		<div class="tab-pane fade" id="follow-classic" role="tabpanel" aria-labelledby="follow-tab-classic">
			<?php require_once RUTA_RESOURCES.'/Views/Dashboard/Welcome/recent.php'; ?>
		</div>
		<div class="tab-pane fade" id="contact-classic" role="tabpanel" aria-labelledby="contact-tab-classic">
			<?php require_once RUTA_RESOURCES.'/Views/Dashboard/Welcome/prominent.php'; ?>
		</div>
		<div class="tab-pane fade" id="awesome-classic" role="tabpanel" aria-labelledby="awesome-tab-classic">
			<?php require_once RUTA_RESOURCES.'/Views/Dashboard/Welcome/support.php'; ?>
		</div>
	</div>

</div>
<!-- Classic tabs -->


<?php require_once RUTA_RESOURCES.'/Templates/Dashboard/footer.php'; ?>
    <script type="text/javascript" src="<?php echo RUTA_JS; ?>/dashboard/welcome/char-recent.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_JS; ?>/dashboard/welcome/char-prominent-immovable.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_JS; ?>/dashboard/welcome/char-earnings.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_JS; ?>/dashboard/welcome/char-user-growth.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_JS; ?>/dashboard/welcome/char-type-immovable.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_JS; ?>/dashboard/welcome/char-booking.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_JS; ?>/dashboard/welcome/char-usability.js"></script>