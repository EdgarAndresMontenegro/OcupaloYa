<?php 


class SendpasswordTemplate
{
	// funcion para crear el contenido de la pagina
	// los parametros son los datos basicos que contendra el mensaje
	public static function template( $nombre, $password, $email )
	{
		$body = "
			<html> 
				<body>
					<div style='background: #333; padding: 0px 40px; padding-bottom: 40px;'>
						<div style='background: #fff;'>
							<div style='text-align: center; padding: 40px 30px'>
								<img src='".RUTA_IMG."/logo-color.png' alt='OcupaloYa.com' style='max-width: 200px; width: 100%;'>
							</div>
							<div style='text-align: justify; padding: 10px 30px'>
								<h5 style='color: #333; line-height: 28px;'>Hola ".ucwords($nombre).", para nosotros es un gusto poder contar contigo, gracias por ser parte de la familia ocupaloya. A continuación te daremos la contraseña asignada a tu cuenta de usuario:</h5>
							</div>
							<div style='text-align: center; padding: 10px 30px'>
								<h4 style='color: #333; line-height: 28px;'>".$password."</h4>
							</div>
							<div style='text-align: center; padding: 10px 30px'>
								<h6 style='color: #666; line-height: 28px;'>Para la correcta visualización del contenido por favor haga clic en contenido bloqueado de ser necesario en su servidor de correos.</h6>
							</div>
						</div>
					</div>
				</body> 
			</html>
		";
		return $body; 
	}
}
