<?php

// importamos el trait de slug
require_once RUTA_APP."/Traits/SlugTrait.php";
// importamos el trait de slug
require_once RUTA_APP."/Traits/ConvertTrait.php";

// función que carga la vista principal del dashboard 
class UserController extends Controller
{
	// función constructora de la clase
	public function __construct()
	{
		// validamos que solo puedan ingresar usuarios
		$this->Auth()->role_diff( 1 );
		// instanciamos el modelo de usuarios
		$this->userModel = $this->model('User');
		// instanciamos el modelo de datos de usuarios
		$this->userdataModel = $this->model('Userdata');
		// instanciamos el modelo de usuarios
		$this->roleModel = $this->model('Role');
		// instanciamos el modelo de roles
		$this->countryModel = $this->model('Country');
		// instanciamos el modelo de roles
		$this->stateModel = $this->model('State');
		// instanciamos el modelo de roles
		$this->cityModel = $this->model('City');
	}

	// función para mostrar la vista
	public function index()
	{	
		// mostramos la vista
		$this->redirect('Dashboard/Configurations/User/listing');
	}

	// función para crear los datos del usuario
	public function create()
	{
		/* array que contiene los parametros a pasar a la vista */
		$params = [
			'countries' => $this->countryModel->all(),
			'roles' => $this->roleModel->all(),
		];
		/* código para cargar la vista para almacenar un registro */
		echo $this->view( 'Dashboard/Configurations/User/create', $params );
	}

	// función para mostrar los datos del usuario
	public function find( $slug )
	{
		// buscamos los datos del usuario
		$user = mysqli_fetch_assoc( $this->userModel->find_by_slug( $slug ) );
		// buscamos los datos del usuario
		$userdata = mysqli_fetch_assoc( $this->userdataModel->find_by_user_id( $user['id'] ) );
		/* array que contiene los parametros a pasar a la vista */
		$params = [
			"user" => $user,
			"userdata" => $userdata,
		];
		/* código para cargar la vista para almacenar un registro */
		echo $this->view( 'Dashboard/Configurations/User/find', $params );
	}

	// función para actualziar los datos del usuario
	public function edit( $slug )
	{
		// buscamos los datos del usuario
		$user = mysqli_fetch_assoc( $this->userModel->find_by_slug( $slug ) );
		// buscamos los datos del usuario
		$userdata = mysqli_fetch_assoc( $this->userdataModel->find_by_user_id( $user['id'] ) );
		/* array que contiene los parametros a pasar a la vista */
		$params = [
			"user" => $user,
			"userdata" => $userdata,
			'countries' => $this->countryModel->all(),
			'cities' => $this->cityModel->all(),
			'roles' => $this->roleModel->all(),
		];
		/* código para cargar la vista para almacenar un registro */
		echo $this->view( 'Dashboard/Configurations/User/edit', $params );
	}

	// función para mostrar el perfil del usuario
	public function profile()
	{
		$user = mysqli_fetch_assoc( $this->userModel->find( $this->Auth()->user()->id() ) );
		// buscamos los datos del usuario
		$userdata = mysqli_fetch_assoc( $this->userdataModel->find_by_user_id( $user['id'] ) );
		// validamos si existe alguna ciudad registrada
		if( $userdata['city_id'] )
		{
			// obtenemos los datos de la ciudad
			$city = mysqli_fetch_assoc( $this->cityModel->find( $userdata['city_id'] ) );
			// obtenemos los datos de la ciudad
			$state = mysqli_fetch_assoc( $this->stateModel->find( $city['state_id'] ) );
			// obtenemos los datos de la ciudad
			$country = mysqli_fetch_assoc( $this->countryModel->find( $state['country_id'] ) );
		}
		else
		{
			// asignamos un valor vacio
			$city['name'] = '';
			// asignamos un valor vacio
			$state['name'] = '';
			// asignamos un valor vacio
			$country = ['name' => '', 'icon' => '', 'prefix' => ''];
		}
		// variable que envia los datos a la vista
		$params = [
			'user' => $user,
			'userdata' => $userdata,
			'role' => mysqli_fetch_assoc( $this->roleModel->find( $user['rol_id'] ) ),
			'country' => $country,
			'state' => $state,
			'city' => $city,
		];
		// validamos si el icono es uno por defecto
		if( $params['user']['icon'] == "icon-o.png" || $params['user']['icon'] == "icon-h.png" || $params['user']['icon'] == "icon-m.png" )
			// asignamos el icono sin ruta
			$params['user']['icon'] = $params['user']['icon'];
		else
			// asignamos el icono con la ruta de la foto
			$params['user']['icon'] = $params['user']['slug']."/".$params['user']['icon'];
		// mostramos la vista al usuario
		echo $this->view( 'Dashboard/Configurations/User/profile', $params );
	}

	// función para mostrar la vista con el listado inicial
	public function listing( $pagina = 1, $input_whr = "name", $value_whr = null )
	{
		// obtenemos los datos del modelo
		$lista = $this->data( $pagina, $input_whr, $value_whr );
		// mostramos la vista al usuario
		echo $this->view( 'Dashboard/Configurations/User/index', $lista );
	}

	// función para consultar por medio de ajax para estar cargando los datos sin recargar la página
	public function pagination( $pagina = 1, $input_whr = "name", $value_whr = null )
	{
		// obtenemos los datos del modelo
		$jsondata = $this->data( $pagina, $input_whr, $value_whr );
		// agregamos la cabecera de json para evitar errores
		header('Content-type: application/json; charset=utf-8');
		// mostramos la vista al usuario
		echo json_encode( $jsondata, JSON_FORCE_OBJECT );
	}

	// función para obtener los datos del listado
	public function data( $pagina, $input_whr, $value_whr )
	{
		// obtenemos obtenemos los datos del listado
		$data = $this->userModel->listing( $pagina, $input_whr, $value_whr );
		// variable que contendra el listado
		$list = "";
		// validamos que existan datos
		if( $data['cant'] > 0 ) 
		{
			// recorremos los datos existentes
			foreach( $data['list'] as $user )
			{
				// vamos concatenando cada dato
				$list .= '
					<div class="col-md-6 mt-4">
						<div class="card">
							<div class="card-body">
								<div class="card-title">
									<a data-toggle="modal" data-target="#modalConfirmDelete" class="open-confirm-delete float-right h6 text-danger btn-outline-danger btn-sm" data-id="'.$user['id'].'" data-toggle="tooltip" title="Eliminar"> Eliminar
										<i class="fas fa-trash"></i>
									</a>
									<form id="form-delete-'.$user['id'].'" action="'.RUTA_URL.'/Dashboard/Configurations/user/delete" method="POST" style="display: none;">
										'.$this->csrfToken().'
										<input type="hidden" name="id" value="'.$user['id'].'">
									</form>
									<a href="'.RUTA_URL.'/Dashboard/Configurations/User/Edit/'.$user['slug'].'" class="float-right h6 text-primary mr-3 btn-outline-primary btn-sm" title="Actualizar">
										<i class="fa fa-pen"></i> Actualizar
									</a>
								</div>
								<div class="card-body">
									<div class="row align-items-center mt-3">
										<div class="col-lg-4 text-center">
											<img src="'.RUTA_IMG.'/users/'.$user['icon'].'" class="img-fluid" style="border-radius: 50%; max-width: 100px;  max-height: 100px;">
										</div>
										<div class="col-lg-8">
											<h5 class="text-truncate mb-2">
												'.ucwords( $user['name'] ).'
												<small class="text-muted h6">('.ucwords( $user['role'] ).')</small>
											</h5>
											<p class="h6 mb-2 text-truncate">
												'.$user['username'].'
											</p>
											<p class="h6 text-truncate">
												<span class="flag-icon '.$user['country_icon'].' mr-1 h5"></span> ('.$user['prefix'].') '.ConvertTrait::cellphone_space( $user['telephone'] ).'
											</p>
											<p class="h6 text-truncate">
												Miembro desde '.ConvertTrait::date( $user['created_at'] ).'.
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				';
			}
		}
		else
		{
			// asignamos el código para mostrar que no se han encontrado resultados
			$list .= '
				<div class="col-12 mt-4">
					<div class="card">
						<div class="card-body text-center">
							<i class="fa fa-ban mr-2"></i>
							No se han encontrado resultados
						</div>
					</div>
				</div>
			';
		}
		// cambiamos el valor del parametro que tiene los resultados de la lista con el valor que acabamos de crear
		$data['list'] = $list;
		// retornamos el array
		return $data;	
	}

	public function store()
	{
		// Validamos que sea una petición enviada por post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'rol_id' => 'required|number',
			'name' => 'required',
			'username' => 'required|email|unique:users'
		]);
		// Validamos si existe un error
		if( $errors )
		{
			// Mostramos el mensaje de error al usuario
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// creamos el slug del usuario
		$slug = SlugTrait::slug( $_POST['username'] );
		// creamos una contraseña totalmente aleatoria
		$password = $this->Auth()->generar_password_complejo();
		// encriptamos y protegemos la variable del password
		$password_encriptada = password_hash( $this->Auth()->protectVars( $password ) , PASSWORD_BCRYPT);
		// Creamos el array con los datos a pasar a la clase modelo
		$request = [
			'rol_id' => $_POST['rol_id'],
			'name' => $_POST['name'],
			'username' => $_POST['username'],
			'password' => $password_encriptada,
			'slug' => $slug,
			'icon' => $_POST['photo'],
			'state' => '1',
			'block' => '1',
			'balance' => '0.0',
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => NULL,
		];
		// Realizamos la petición de registro
		$result = $this->userModel->store( $request );
		// Validamos si existe un error
		if( !$result )
		{
			// Agregamos el mensaje a la variable para ser mostrada
			array_push( $this->errors, $result );
			// Mostramos el mensaje de error al usuario
			echo $this->errors();
		}
		else
		{
			// buscamos los datos del usuario registrado
			$user = mysqli_fetch_assoc( $this->userModel->find_by_slug( $slug ) );
			// Creamos el array con los datos a pasar a la clase modelo
			$request = [
				'user_id' => $user['id'],
				'city_id' => $_POST['city_id'],
				'sex' => $_POST['sex'],
				'telephone' => $_POST['telephone'],
				'address' => $_POST['address'],
				'birth_date' => $_POST['birth_date'],
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => NULL,
			];
			// Realizamos la petición de registro
			$result = $this->userdataModel->store( $request );
			// Validamos si existe un error
			if( !$result )
			{
				// eliminamos los datos del usuario a crear
				$this->userModel->delete( $user['id'] );	
				// Agregamos el mensaje a la variable para ser mostrada
				array_push( $this->errors, $result );
				// Mostramos el mensaje de error al usuario
				echo $this->errors();
			}
			else
			{
				require_once RUTA_APP."/Traits/SendMailTrait.php";
				require_once RUTA_APP."/Helpers/EmailTemplates/SendpasswordTemplate.php";
				$template = SendpasswordTemplate::template( $_POST['name'], $password, $_POST['username'] );
				$mensaje = "Si no puedes ver el contenido del correo electrónico desde tu móvil, te recomendamos verlo desde un equipo de computo.";
				$sendmail = SendMailTrait::send( SMTP_ADDRESS, ucwords(APP_NAME), $template, $mensaje, $_POST['username'], "Información de acceso" );
				// Mostramos el mensaje de éxito al usuario
				echo "true";
			}
		}

	}


	public function update()
	{
		// Validamos que sea una petición enviada por post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'name' => 'required',
			'city_id' => 'required|number',
			'username' => 'required|email|unique:users:'.$_POST['id'],
		]);
		// Validamos si existe un error
		if( $errors )
		{
			// Mostramos el mensaje de error al usuario
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// creamos el slug del usuario
		$slug = SlugTrait::slug( $_POST['username'] );
		// Creamos el array con los datos a pasar a la clase modelo
		$request = [
			'id' => $_POST['id'],
			'rol_id' => $_POST['rol_id'],
			'name' => $_POST['name'],
			'username' => $_POST['username'],
			'slug' => $slug,
			'icon' => $_POST['photo'],
			'updated_at' => date("Y-m-d H:i:s"),
		];
		// Realizamos la petición de registro
		$result = $this->userModel->update( $request );
		// Validamos si existe un error
		if( !$result )
		{
			// Agregamos el mensaje a la variable para ser mostrada
			array_push( $this->errors, $result );
			// Mostramos el mensaje de error al usuario
			echo $this->errors();
		}
		else
		{
			// buscamos los datos de la tabla datos de usuario del usuario registrado
			$userdata = mysqli_fetch_assoc( $this->userdataModel->find_by_user_id( $_POST['id'] ) );
			// Creamos el array con los datos a pasar a la clase modelo
			$request = [
				'id' => $userdata['id'],
				'city_id' => $_POST['city_id'],
				'document_type' => $_POST['document_type'],
				'document_number' => $_POST['document_number'],
				'sex' => $_POST['sex'],
				'telephone' => $_POST['telephone'],
				'address' => $_POST['address'],
				'birth_date' => $_POST['birth_date'],
				'updated_at' => date("Y-m-d H:i:s"),
			];
			// Realizamos la petición de registro
			$result = $this->userdataModel->update( $request );
			// Validamos si existe un error
			if( !$result )
			{
				// Agregamos el mensaje a la variable para ser mostrada
				array_push( $this->errors, $result );
				// Mostramos el mensaje de error al usuario
				echo $this->errors();
			}
			else
			{
				// Mostramos el mensaje de éxito al usuario
				echo "true";
			}
		}

	}


	public function delete()
	{
		// Validamos que sea una petición enviada por post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'id' => 'required|number'
		]);
		// Validamos si existe un error
		if( $errors )
		{
			// Mostramos el mensaje de error al usuario
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// buscamos los datos del usuario registrado
		$user = mysqli_fetch_assoc( $this->userModel->find( $_POST['id'] ) );
		// buscamos los datos de la tabla datos de usuario del usuario registrado
		$userdata = mysqli_fetch_assoc( $this->userdataModel->find_by_user_id( $user['id'] ) );
		// Realizamos la petición de registro
		$result = $this->userdataModel->delete( $userdata['id'] );
		// Validamos si existe un error
		if( !$result )
		{
			// Agregamos el mensaje a la variable para ser mostrada
			array_push( $this->errors, $result );
			// Mostramos el mensaje de error al usuario
			echo $this->errors();
		}
		else
		{
			/// Realizamos la petición de registro
			$result = $this->userModel->delete( $user['id'] );
			// Validamos si existe un error
			if( !$result )
			{
				// Agregamos el mensaje a la variable para ser mostrada
				array_push( $this->errors, $result );
				// Mostramos el mensaje de error al usuario
				echo $this->errors();
			}
			else
			{
				// Mostramos el mensaje de éxito al usuario
				echo "true";
			}
		}

	}

	// función para subir la foto de perfil
	public function uploadPhoto()
	{
		// obtenemos la imagen despúes de hacer crop
		$data = $_POST['image'];
		// expltamos la imagen para obtener los datos del base64
		$image_exp = explode(",", $data);
		// desencriptamos el base64
		$data = base64_decode($image_exp[1]);
		// obtenemos el slug del titulo del club
		$slug = SlugTrait::slug( $_POST['folder'] );
		// creamos el nombre de la imagen
		$imageName = time() . '-' . $slug . '.png';
		// creamos la ruta de acuerdo a la varible global public
		$folder = RUTA_PUBLIC . '/' . 'img/users/'.$slug;
		// creamos la carpeta si no existe
		if (!file_exists($folder))
			// creamos la carpeta
			mkdir($folder, 0777, true);
		// creamos la imagen segun la ruta que deseemos
		file_put_contents($folder.'/'.$imageName, $data);
		// enviamos el nombre de la imagen
		echo "true|".$slug."/".$imageName."|".RUTA_IMG."/users/".$slug."/".$imageName;
	}

}