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
		$this->Auth()->role_diff( 4 );
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
		$this->redirect('Owner/User/Profile');
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
		echo $this->view( 'Owner/User/edit', $params );
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
			'userdata' => mysqli_fetch_assoc( $this->userdataModel->find_by_user_id( $user['id'] ) ),
			'role' => mysqli_fetch_assoc( $this->roleModel->find( $user['rol_id'] ) ),
			'country' => $country,
			'state' => $state,
			'city' => $city,
		];
		// mostramos la vista al usuario
		echo $this->view( 'Owner/User/profile', $params );
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
		// validamos si existe la contraseña y que no sea vacia
		if( isset( $_POST['password'] ) && !empty( $_POST['password'] ) )
			// asignamos la contraseña encriptada
			$_POST['password'] = password_hash( $this->Auth()->protectVars( $_POST['password'] ) , PASSWORD_BCRYPT);
		// creamos el slug del usuario
		$slug = SlugTrait::slug( $_POST['username'] );
		// Creamos el array con los datos a pasar a la clase modelo
		$request = [
			'id' => $_POST['id'],
			'name' => $_POST['name'],
			'username' => $_POST['username'],
			'password' => $_POST['password'],
			'slug' => $slug,
			'icon' => $_POST['photo'],
			'updated_at' => date("Y-m-d H:i:s"),
		];
		// validamos si es vacio o no existe
		if( empty( $request['password'] ) )
			// eliminamos el campo de contraseña para que no se actualice
			unset( $request['password'] );
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

	// función para bloquear la cuenta de un usuario
	public function block()
	{
		// Creamos el array con los datos a pasar a la clase modelo
		$request = [
			'id' => $this->Auth()->user()->id(),
			'block' => 2,
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
			// realizamos la peticion al modelo de cerrar sesion
			$this->Auth()->logout();
			// Mostramos el mensaje de éxito al usuario
			echo "true|".RUTA_URL."/Auth/Login";
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