<?php 

require_once RUTA_RESOURCES."/Templates/Login/header.php";
?>

<form method="POST" action="<?php echo RUTA_URL; ?>/auth/recover_validation" id="recover-form" name="recover-form">
	<div id="errors-recover"></div>
	<div class="row my-4 justify-content-center">
		<div class="col-12 col-md-10 text-justify">
			<p>Ingresa el correo electronico vinculado a su cuenta para enviarle su nueva contraseña:</p>
		</div>
	</div>
	<div class="row my-4 justify-content-center">
		<div class="col-12 col-md-10">
			<input type="email" class="form-control" name="email" id="email" placeholder="Usuario" class="py-5">
		</div>
	</div>
	<div class="row align-items-center justify-content-center">
		<div class="col-12 order-2 order-md-1 col-md-5 text-center text-md-left">
			<a href="<?php echo RUTA_URL; ?>/Auth/login" title="Iniciar sesión" data-toggle="tooltip" class="btn btn-outline-info raleway-regular">Iniciar sesión</a>
		</div>
		<div class="col-12 order-md-2 col-md-5 text-center">
			<div class="text-md-right my-2">
				<button id="btn-recover" class="btn btn-info" title="Recuperar" data-toggle="tooltip">Recuperar</button>
			</div>
		</div>
	</div>
</form>



<?php
require_once RUTA_RESOURCES."/Templates/Login/footer.php";
?>