<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="id=edge">
	<title>Dashboard | <?php echo APP_NAME; ?></title>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/mdb.min.css">
	<!-- Font awesome CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
	<!-- Your custom styles (fuentes) -->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/fonts.css">
	<!-- Your custom styles (base) -->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/dashboard/dashboard.css">
	<!-- Your custom styles (scroll) -->
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
	<link rel="icon-header icon" type="image/ico" href="<?php echo RUTA_URL; ?>/favicon-header icon.ico">
	<link rel="shortcut icon-header icon" href="<?php echo RUTA_URL; ?>/favicon-header icon.ico">
	<link rel="apple-touch-icon-header icon" sizes="57x57" href="<?php echo RUTA_URL; ?>/icon-header icons/favicon-header icon-57x57.png">
	<link rel="apple-touch-icon-header icon" sizes="60x60" href="<?php echo RUTA_URL; ?>/icon-header icons/favicon-header icon-60x60.png">
	<link rel="apple-touch-icon-header icon" sizes="72x72" href="<?php echo RUTA_URL; ?>/icon-header icons/favicon-header icon-72x72.png">
	<link rel="apple-touch-icon-header icon" sizes="76x76" href="<?php echo RUTA_URL; ?>/icon-header icons/favicon-header icon-76x76.png">
	<link rel="apple-touch-icon-header icon" sizes="114x114" href="<?php echo RUTA_URL; ?>/icon-header icons/favicon-header icon-114x114.png">
	<link rel="apple-touch-icon-header icon" sizes="120x120" href="<?php echo RUTA_URL; ?>/icon-header icons/favicon-header icon-120x120.png">
	<link rel="apple-touch-icon-header icon" sizes="144x144" href="<?php echo RUTA_URL; ?>/icon-header icons/favicon-header icon-144x144.png">
	<link rel="apple-touch-icon-header icon" sizes="152x152" href="<?php echo RUTA_URL; ?>/icon-header icons/favicon-header icon-152x152.png">
	<link rel="apple-touch-icon-header icon" sizes="180x180" href="<?php echo RUTA_URL; ?>/icon-header icons/favicon-header icon-180x180.png">
	<link rel="icon-header icon" type="image/png" sizes="192x192" href="<?php echo RUTA_URL; ?>/icon-header icons/favicon-header icon-192x192.png">
	<link rel="icon-header icon" type="image/png" sizes="32x32" href="<?php echo RUTA_URL; ?>/icon-header icons/favicon-header icon-32x32.png">
	<link rel="icon-header icon" type="image/png" sizes="96x96" href="<?php echo RUTA_URL; ?>/icon-header icons/favicon-header icon-96x96.png">
	<link rel="icon-header icon" type="image/png" sizes="16x16" href="<?php echo RUTA_URL; ?>/icon-header icons/favicon-header icon-16x16.png">
	<link rel="manifest" href="<?php echo RUTA_URL; ?>/manifest.json">
	<meta name="msapplication-TileColor" content="#4CCC4C">
	<meta name="msapplication-TileImage" content="<?php echo RUTA_URL; ?>/icon-header icons/favicon-header icon-144x144.png">
	<meta name="theme-color" content="#4CCC4C">
</head>
<body manifest="manifest.cache" class="scroll">

	<?php 
	// campo del cual podemos obtener la ruta de la aplicación por medio de javascript
	echo "<input type='hidden' id='ruta_url' name='ruta_url' value='".RUTA_URL."' />";
	// validamos si existe una sesión
	if( isset( $_SESSION['id'] ) && !empty( $_SESSION['id'] ) ){
		// imprimos los datos del formulario de cerrar sesión
		echo "
		<input type='hidden' id='user_auth_id' name='user_auth_id' value='".$this->Auth()->user()->id()."' />
		<form id='logout-iniactividad-form' action='".RUTA_URL."/auth/inactividad_logout' method='POST' class='d-none'>
		<input type='hidden' name='logout' value='yes'>
		</form>
		";
	}
	?>


	<header class="fixed-top primary-color-dark">
		<div class="header-navbar">
			<div class="container">
				<div class="row">
					<div class="col-6 col-md-8">
						<div class="icon-header icon-bars">
							<i class="fa fa-bars"></i>
						</div>
						<div class="header-navbar-primary">
							<ul class="list-unstyled">
								<li class="active">
									<a href="<?php echo RUTA_URL; ?>/Dashboard/">
										<img src="<?php echo RUTA_IMG; ?>/icon-w.png" class="d-none d-md-block" style="width: 30px; border-radius: 50%;">
										<span class="d-md-none">Inicio</span>
									</a>
								</li>
								<li class="">
									<a href="">Reservas</a>
								</li>
								<li>
									<a href="<?php echo RUTA_URL; ?>/Dashboard/Owner/Listing">Propietarios</a>
								</li>
								<li>
									<a href="<?php echo RUTA_URL; ?>/Dashboard/Ally/Listing">Aliados</a>
								</li>
								<li>
									<a href="">Inmuebles</a>
								</li>
								<li>
									<a href="<?php echo RUTA_URL; ?>/Dashboard/Support/Listing">Soporte</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-6 col-md-4 header-navbar-second">
						<div class="icon-header icon-notifications">
							<p class="content-icon-notificaons" data-toggle="tooltip" title="Notificaciones">
								<i class="fa fa-bell"></i>
								<span class="badges"></span>
							</p>
							<div class="card-options card-options-notifications scroll">
								<ul>
									<li class="title-card">
										Notificaciones
										<span class="badge badge-info"></span>
									</li>
									<li class="separator"></li>
									<div class="content-notifications"></div>
								</ul>
							</div>
						</div>
						<div class="icon-header icon-comments">
							<a href="<?php echo RUTA_URL; ?>/Dashboard/Configurations/User/Listing" data-toggle="tooltip" title="Configuraciones">
								<i class="fa fa-cog"></i>
							</a>
						</div>
						<div class="icon-header icon-user">
							<p data-toggle="tooltip" title="Mis opciones">
								<img src="<?php echo RUTA_IMG; ?>/users/<?php echo $this->Auth()->user()->icon(); ?>">
							</p>
							<div class="card-options card-options-user scroll">
								<ul>
									<li>
										<a href="<?php echo RUTA_URL; ?>/Dashboard/Configurations/User/Profile">
											<i class="fa fa-id-card-alt"></i>
											Perfil
										</a>
									</li>
									<li>
										<a href="">
											<i class="fa fa-bullhorn"></i>
											Reportar error
										</a>
									</li>
									<li class="separator"></li>
									<li>
										<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
											<i class="fa fa-power-off"></i>
											Cerrar sesión
										</a>
										<form id="logout-form" action="<?php echo RUTA_URL; ?>/Auth/Logout" method="POST" style="display: none;">
											<input type="hidden" name="logou" value="yes">
										</form>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<main>

	