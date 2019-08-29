<?php 

require_once RUTA_APP."/Models/User.php";
require_once RUTA_APP."/Traits/SlugTrait.php";

class Auth extends Model
{
	// campo por donde se inicia sesion
	private $username = "username";
	// campo por el cual se validara el correo ingresado por el usuario para obtener su nueva contraseña
	private $inpu_recover_pass = "username";
	// vista a la que se redirige si hay un login exitoso
	public $viewSuccess = RUTA_URL."/Redirect";
	// vista a la que se redirige si no hay existe una session cuando se valide con el metodo guest
	private $viewRedirect = RUTA_URL."/Auth/Login";
	// vista a la que se redirige el empleado/administrador cuando requiera ir a otra vista
	private $viewHyperboard = RUTA_URL."/Dashboard";

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "users";
		// llenamos la variable que contiene 
		$this->fillable = [ 
			"rol_id", "name", "username", "password", "slug", "icon", "state", "block", "balance", "created_at", "updated_at" 
		];
		// llenamos la variable que conteniene los datos que no queremos dejar ver
		$this->hidden = [ 
			"password"
		];
		// iniciamos la sesion para que puedan acceder a los datos del usuario cuando se haga login
		 if(!isset($_SESSION)) 
		 { 
		 	session_start();
		 } 
	}

	// funcion para realizar el logueo
	public function login( $username, $password )
	{
		// protegemos las variables para evitar el sql injection
		$username = $this->protectVars( $username );
		$password = $this->protectVars( $password );
		// buscamos si existe el usuario en la base de datos
		$result = $this->conex->query( ' SELECT ' . $this->selectInputs() . ' FROM ' . $this->table . ' WHERE ' . $this->username . ' = "' . $username .'" ' );
		// contamos los registros obtenidos para saber si se encontro registros
		if( $result->num_rows > 0 )
		{
			// obtenemos los datos del usuario
			$user = mysqli_fetch_assoc($result);
			// validamos que el usuario no este bloqueado
			if( $user['block'] == 1 )
			{
				// ahora seleccionamos la contraseña para validar que sea la misma ingresada por el usuario
				$find_password = $this->conex->query(' SELECT password FROM ' . $this->table . ' WHERE ' . $this->username . ' = "' . $username . '" ' );
				// recorremos los datos de la consulta anterior
				$data = mysqli_fetch_assoc($find_password);
				// validamos que las contraseñas sean iguales
				if( password_verify( $password, $data['password'] ) )
				{
					// validamos que el usuario no este bloqueado por exceder número de intentos permitidos
					if( !isset( $_SESSION['bloqueado'] ) || $_SESSION['bloqueado'] == 'no' ) 
					{
						
						// obtenemos los campos que se pueden guardar
						$values = explode(',', $this->selectInputs() );
						// recorremos los campos que se pueden guardar para iniciar una sesion
						foreach( $values as $key )
						{
							// declaramos las variables de sesio que se dejan ver
							$_SESSION[ trim( $key ) ] = $user[ trim( $key ) ];
						}
						// inicializar una variable de sesión que contenga en _token de seguirdad
						$_SESSION['_token'] = $this->generar_password_complejo( 100 );
						// retornamos un mensaje de exito
						return "logueado|".$this->viewSuccess;
					}
				}
				// validamos los intentos de acceso a la aplicación
				return $this->validateAttemps();
			}
			else
			{
				// retornamos un mensaje de error
				return "El usuario " . $username . " ha sido bloqueado permanentemente por solicitud del propietario. Si eres el propietario y deseas recuperar tu cuenta envia un correo con la solicitud a soporte@ocupaloya.com";
			}
		}
		else
		{
			// retornamos un mensaje de error
			return "El usuario " . $username . " no existe.";	
		}
	}

	// funcion para cerrar la sesión
	public function logout()
	{
		// validamos si existe una sesion
		if( isset( $_SESSION['id'] ) )
		{
			// eliminamos la variable de seguirdad
			unset( $_SESSION['_token'] );
			// desasemos la sesión
			session_unset();
			// destruimos la sesión
			session_destroy();
		}

	}

	// funcion para registrar un usuario en la base de datos
	public function register( $name, $username, $password )
	{
		// protegemos el valor inicial de las variables
		$username_logueo = $username;
		$password_logueo = $password;
		// protegemos las variables para evitar el sql injection
		$name = $this->protectVars( $name );
		$username = $this->protectVars( $username );
		// encriptamos y protegemos la variable del password
		$password = password_hash( $this->protectVars( $password ) , PASSWORD_BCRYPT);
		// ejecutamos el query de registo
		$query = $this->conex->query( 'INSERT INTO ' . $this->table .' (name, slug, username, password, created_at, updated_at) VALUES ( "' . $name .'", "'.SlugTrait::slug($name).'", "' . $username .'", "' . $password .'", "'.date('Y-m-d h:i:s').'", "'.date('Y-m-d h:i:s').'" ) ' );
		// validamos que no exista ningun error en el registro
		parent::validateError( $query );
		// lo mandamos a loguearde si todo esta correcto
		return $this->login( $username_logueo, $password_logueo );
	}

	// funcion para cambiar contraseña de un usuario con el email en la base de datos
	public function recover_password( $email )
	{
		// protegemos el valor inicial de las variables
		$email_recover = $email;
		// protegemos las variables para evitar el sql injection
		$email = $this->protectVars( $email );
		// buscamos el usuario en la base de datos
		$find_email = parent::simple(' SELECT name FROM '.$this->table.' WHERE '.$this->inpu_recover_pass.' = "'.$email.'" ');
		// validamos que obtengamos algún resultado
		if( $find_email->num_rows < 1 )
		{
			// retornamos un mensaje de error
			return "El e-mail ".$email_recover." no se ha encontrado.";
		}
		else
		{
			// creamos una contraseña totalmente aleatoria
			$password = $this->generar_password_complejo();
			// encriptamos y protegemos la variable del password
			$password_encriptada = password_hash( $this->protectVars( $password ) , PASSWORD_BCRYPT);
			// ejecutamos el query de registo
			$query = parent::simple( 'UPDATE ' . $this->table .' SET password = "' . $password_encriptada .'" WHERE '.$this->inpu_recover_pass.' = "'.$email.'" ' );
			// validamos que no exista ningun error en el registro
			parent::validateError( $query );
			// requerimos los archivos para enviar el correo
			require_once RUTA_APP."/Traits/SendMailTrait.php";
			require_once RUTA_APP."/Helpers/EmailTemplates/RecoverpasswordTemplate.php";
			// obtenemos los datos del usuario
			$user = mysqli_fetch_assoc( $find_email );
			// obtenemos la plantilla para enviar
			$template = RecoverpasswordTemplate::template( $user['name'], $password );
			// enviamos el correo y lo capturamos
			$send = SendMailTrait::send( SMTP_ADDRESS, $user['name'], $template, '', $email );
			// validamos si el mensaje se envio
			if( !$send )
				// retornamos mensaje de error
				return "Ha ocurrido un error al enviar su nueva contraseña a ".$email_recover;
			else
			{
				// retornamos mensaje de exito
				return "enviado";
			}
		}
	}

	// funcion para validar que exista una sesion
	public function check()
	{
		if( isset( $_SESSION['id'] ) )
			return true;
		return false;
	}

	// funcion para validar que exista una sesion y evitar que entren usuarios no deseados
	public function guest()
	{
		if( !$this->check() )
			header('Location: ' . $this->viewRedirect );
		return true;
	}

	// funcion para validar que el role del usuario sesionado sea diferente al del enviado por parametro y evitamos que ingrese
	public function role_diff( $role )
	{	
		// validamos exista una sesion
		if( $this->guest() )
			if( $this->user()->role() != $role or empty( $this->user()->role() ) )
				header('Location: ' . $this->viewRedirect );
	}

	// funcion para validar que el role del usuario sesionado sea igual al del enviado por parametro y evitamos que ingrese
	public function role_equals( $role )
	{
		// validamos exista una sesion
		if( $this->guest() )
			// validamos si el rol sea igual y lo redireccionamos
			if( $this->user()->role() == $role or empty( $this->user()->role() ) )
				header('Location: ' . $this->viewRedirect );
	}

	// funcion para evitar que el empleado/administrador salgan del panel de usuario
	public function role_employee()
	{
		// validamos exista una sesion
		if( $this->guest() )
			// validamos que el id de sesion no venga vacio y que el rol enviado sea igual al de la sesion
			if( !empty( $this->user()->id() ) && $this->user()->role() != "cliente" )
				header('Location: ' . $this->viewHyperboard );
	}

	// funcion para validar que exista una sesion
	public function validate_role_user( $role )
	{
		// validamos si el rol sea igual y lo redireccionamos
		if( $this->user()->role() == $role )
			return true;
		return false;
	}

	// funcion para obtener el _token del usuario
	public function _token()
	{
		if( isset( $_SESSION['_token'] ) && !empty( $_SESSION['_token'] ) )
			return $_SESSION['_token'];
	}

	// funcion para arreglar una cadena para evitar el sql injection
	public function protectVars( $str )
	{
		// escapamos los caracteres raros
		$str = $this->conex->real_escape_string( $str );
		// retornamos este valir
		return $str;
	}

	// función para validar los intentos que ha hecho el usuario para entrar a la aplicación
	private function validateAttemps()
	{
		// variable que contiene el número de intentos de inicio de sesión
		if( !isset( $_SESSION['attempts'] ) || empty( $_SESSION['attempts'] ) || $_SESSION['attempts'] == 0 )
		{
			// declaramos un valor inicial de la variable de intentos
			$_SESSION['attempts'] = 1;
			// declaramos el momento en el que ingreso a la función de inicio de sesión
			$_SESSION['time_last_attempt'] = new DateTime("now");
			// declaramos la variable que contiene el tiempo de espera inicial
			$_SESSION['wait_time'] = 1;
			// retornamos un mensaje de error
			return "Datos de acceso incorrectos.";
		}
		else
		{
			if( $_SESSION['attempts'] < 3 )
			{
				// retornamos un mensaje de error al usuario
				$m = "Te quedan ".( 3 - $_SESSION['attempts'] )." intentos permitidos.";
				// aumentamos los intentos
				$_SESSION['attempts']++;
			}
			else
			{
				// aumentamos los intentos
				$_SESSION['attempts']++;
				// obtenemos la fecha de la sesión
				$date1 = $_SESSION['time_last_attempt'];
				// obtenemos la fecha de ahora
				$date2 = new DateTime("now");
				// calculamos la diferencia entre las dos fechas
				$diff = $date1->diff($date2);
				// convertimos la diferencia a un número entero
				$diff_time = ( ($diff->days * 24 ) * 60 ) + ( $diff->i );
				// validamos que el tiempo halla trascurrido
				if( $diff_time < $_SESSION['wait_time'] )
				{
					// cambiamos el estado de la variable de bloqueo
					$_SESSION['bloqueado'] = 'si';
					// retornamos un mensaje de espera al usuario
					$m = "Debes esperar ".( $_SESSION['wait_time'] - $diff_time )." minutos para poder realizar otro intento de acceso.";
				}
				else
				{
					// declaramos un valor inicial de la variable de intentos
					$_SESSION['attempts'] = 1;
					// declaramos la variable que contiene el tiempo de espera inicial
					$_SESSION['wait_time'] = ( $_SESSION['wait_time'] * 3 );
					// cambiamos el estado de la variable de bloqueo
					$_SESSION['bloqueado'] = 'no';
					// enviamos mensaje de desbloqueo
					return "Datos de acceso incorrectos.";
				}
			}
			return $m;
		}
	}

	// funcion para crear una contraseña aleatoria
	// $largo: es el tamaño de la contraseña por defecto son 15 caracteres
	public function generar_password_complejo($largo = 15)
	{
		$cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$cadena_base .= '0123456789' ;
		$cadena_base .= '!@#%^&*()_,./<>?;:[]{}\|=+';

		$password = '';
		$limite = strlen($cadena_base) - 1;

		for ($i=0; $i < $largo; $i++)
			$password .= $cadena_base[rand(0, $limite)];

		return $password;
	}

	// funcion para devolver un objeto de tipo usuario
	public function user()
	{
		return new User;
	}
}