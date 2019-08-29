<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="id=edge">
	<title><?php echo APP_NAME; ?></title>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/mdb.min.css">
	<!-- Font awesome CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/fonts.css">
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/style.css">
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/scroll.css">
	<!-- etiquetas seo -->
	<meta http-equiv="content-language" content="es-co">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="geography" content="Bucaramanga, Santander, Colombia">
	<meta name="city" content="Bucaramanga, Santander, Colombia,">
	<meta name="country" content="colombia,">
	<meta name="language" content="spanish">
	<meta http-equiv="expires" content="never">
	<meta name="copyright" content="2018 Hyperlink Soluciones Empresariales - www.hyperlinkse.com">
	<meta name="designer" content="Hyperlink Soluciones Empresariales - www.hyperlinkse.com">
	<meta name="author" content="Hyperlink Soluciones Empresariales - www.hyperlinkse.com">
	<meta name="publisher" content="Hyperlink Soluciones Empresariales - www.hyperlinkse.com">
	<meta name="revisit-after" content="1 days">
	<meta name="distribution" content="global">
	<meta name="robots" content="Index, Follow">
	<meta property="og:url" content="" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:type" content="website" />
	<meta property="fb:app_id" content="">
	<meta property="og:locale" content="co_ES">
	<meta property="og:image" content="" />
	<meta property="og:image:url" content="" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="630" />
	<meta property="og:image:alt" content="" />
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="">
	<meta name="twitter:creator" content="">
	<meta name="twitter:title" content="">
	<meta name="twitter:description" content="">
	<meta name="twitter:image" content="">
	<link rel="icon" type="image/ico" href="<?php echo RUTA_URL; ?>/favicon.ico">
	<link rel="shortcut icon" href="<?php echo RUTA_URL; ?>/favicon.ico">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo RUTA_URL; ?>/icons/favicon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo RUTA_URL; ?>/icons/favicon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo RUTA_URL; ?>/icons/favicon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo RUTA_URL; ?>/icons/favicon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo RUTA_URL; ?>/icons/favicon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo RUTA_URL; ?>/icons/favicon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo RUTA_URL; ?>/icons/favicon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo RUTA_URL; ?>/icons/favicon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo RUTA_URL; ?>/icons/favicon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo RUTA_URL; ?>/icons/favicon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo RUTA_URL; ?>/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo RUTA_URL; ?>/icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo RUTA_URL; ?>/icons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo RUTA_URL; ?>/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo RUTA_URL; ?>/icons/favicon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>
<body manifest="manifest.cache" class="scroll">
	
	<input type='hidden' id='RUTA_URL' name='RUTA_URL' value='<?php echo RUTA_URL; ?>' />

	<?php 
	require_once RUTA_RESOURCES."/Templates/Includes/session.php"; 
	if( isset( $_SESSION['id'] ) && !empty( $_SESSION['id'] ) ){
		?>
		<input type='hidden' id='user_auth_id' name='user_auth_id' value='<?php echo $this->Auth()->user()->id(); ?>' />
		<form id="logout-iniactividad-form" action="<?php echo RUTA_URL; ?>/auth/inactividad_logout" method="POST" style="display: none;">
			<input type="hidden" name="logout" value="yes">
		</form>
		<?php
	}

	?>



	<header class="fixed-top">
		<nav class="navbar navbar-expand-lg navbar-light scrolling-navbar">
			<div class="container">
				<a class="navbar-brand mx-auto d-flex align-items-center" href="#">
					<img src="<?php echo RUTA_IMG; ?>/logo-color.png" alt="logotipo" class="img-fluid mr-2 navbar-icono" title="Ocupalo Ya" data-toggle="tooltip">
				</a>
				<div class="collapse navbar-collapse justify-content-lg-end pb-3 pb-lg-0 pl-lg-4" id="navbarNav">
					<!--
					<ul class="navbar-nav align-items-lg-center">
						<li class="nav-item active">
							<a class="nav-link" data-toggle="tooltip" href="<?php echo RUTA_URL; ?>" title="Inicio">Inicio</a>
						</li>
						<li class="separate"></li>
						<li class="nav-item ">
							<a class="nav-link" data-toggle="tooltip" href="<?php echo RUTA_URL; ?>" title="Arriendos">Arriendos</a>
						</li>
						<li class="separate"></li>
						<li class="nav-item ">
							<a class="nav-link" data-toggle="tooltip" href="<?php echo RUTA_URL; ?>" title="Ventas">Ventas</a>
						</li>
						<li class="separate"></li>
						<li class="nav-item ">
							<a class="nav-link" data-toggle="tooltip" href="<?php echo RUTA_URL; ?>" title="Inmobiliarias">Inmobiliarias</a>
						</li>
					</ul>
				-->
					<ul class="navbar-nav align-items-lg-center">
						<li class="separate-bottom"></li>
						<?php
						if( !$this->Auth()->check() )
						{
							?>
							<li class="nav-item">
								<a class="nav-link link-ingresar" data-toggle="modal" data-target="#modalLRForm">Ingresar</a>
							</li>
							<li class="separate"></li>
							<li class="nav-item">
								<a class="nav-link link-register" data-toggle="modal" data-target="#modalLRForm">Regístrate</a>
							</li>
							<?php
						}else{

							?>
							<li class="nav-item nav-name-user">
								<a class="nav-link text-truncate" data-toggle="tooltip" title="Ir al panel de administración" href="<?php echo RUTA_URL; ?>/Redirect">
									Hola, <?php echo $_SESSION['name']; ?>
								</a>
							</li>
							<li class="separate"></li>
							<li class="nav-item">
								<a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="tooltip" title="Cerrar sesión">
									Cerrar sesión
								</a>
								<form id="logout-form" action="<?php echo RUTA_URL; ?>/Auth/Logout" method="POST" style="display: none;">
									<input type="hidden" name="logou" value="yes">
								</form>
							</li>
							<?php   
						}
						?>
						<li class="nav-item">
							<a class="nav-link publish" data-toggle="tooltip" href="<?php echo RUTA_URL; ?>" title="Publicar inmueble">
								<i class="fa fa-bullhorn mr-1"></i>
								Publicar inmueble
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="navbar-btn-float d-fle d-lg-none">
			<button class="navbar-toggler blue darken-2" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars"></i>
			</button>
		</div>
		<div class="navbar-btn-favorite">
			<div class="content-badge">
				<a data-toggle="tooltip" title="Clic para ver inmuebles" class="" data-placement="top">
					0
				</a>
			</div>
			<a data-toggle="tooltip" title="Mis inmuebles favoritos" class="blue darken-2" data-placement="top">
				<i class="fa fa-heart"></i>
			</a>
		</div>
	</header>


	<div class="modal-dialog modal-frame modal-top modal-notify modal-success fixed-bottom mb-0 modal-encuesta" role="document" style="max-width: 100%;">
		<!--Content-->
		<div class="modal-content">
			<!--Body-->
			<div class="modal-body">
				<div class="row d-flex justify-content-center align-items-center">
					<p class="pt-3 mx-4">Ayudanos a mejorar tu experiencia resolviendo una encuesta.</p>

					<a href="<?php echo RUTA_URL; ?>/Welcome/Encuesta" class="btn btn-success">
						<i class="fas fa-book mr-1 white-text"></i>
						Vamos
					</a>
					<a type="button" class="btn btn-outline-success waves-effect modal-remove-encuesta" data-dismiss="modal">No, gracias</a>
				</div>
			</div>
		</div>
		<!--/.Content-->
	</div>