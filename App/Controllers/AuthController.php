<?php

class AuthController extends Controller
{

	public function index(){
		$this->location('Auth/login');
	}

	public function login(){
		$this->view('Auth/login');
	}

	public function sign_up(){
		$this->view('Auth/sign_up');
	}

	public function recover(){
		$this->view('Auth/recover');
	}

	// funcion para ejecutar el acceso o el logueo
	public function access()
	{
		// validamos que existan los campos
		$errors = $this->validate( $_POST, [
			'username' => 'required',
			'password' => 'required',
		] );

		if( $errors )
		{
			echo $this->errors();
			return;
		}

		// validamos que sea una peticion por post
		$this->methodPost();
		
		// enviamos peticion al modelo para que inicie la sesion
		$login = $this->Auth()->login( $_POST['username'], $_POST['password'] );
		$login = explode("|", $login);
		// validamos si se logueo o no
		if( $login[0] != 'logueado' )
		{
			// agregamos a las variables de error la respuesta del servidor
			array_push($this->errors, $login[0]);
			// agregamos los errores obtenidos desde la peticion hecha al model
			echo $this->errors();
			return;
		}
		// retornamos a la vista de acceso cuando se satisfatorio el logueo
		echo "true|".$login[1];
	}

	// funcion para cerrar sesion
	public function logout()
	{
		// validamos que sea una peticion por post
		$this->methodPost();
		// realizamos la peticion al modelo de cerrar sesion
		$this->Auth()->logout();
		// retornamos a la vista de inicio de sesion
		$this->redirect('welcome');
	}

	// funcion para cerrar sesion
	public function inactividad_logout()
	{
		// validamos que sea una peticion por post
		$this->methodPost();
		// realizamos la peticion al modelo de cerrar sesion
		$this->Auth()->logout();
		// retornamos a la vista de inicio de sesion
		echo "true";
	}

	// funcion para registrar un usuario
	public function register()
	{
		// validamos que existan los campos
		$errors = $this->validate( $_POST, [
			'name' => 'required',
			'username' => 'required|unique:users',
			'password' => 'required',
		] );

		if( $errors )
		{
			echo $this->errors();
			return;
		}
		// validamos que sea una peticion por post
		$this->methodPost();
		// realizamos la peticion al modelo de cerrar sesion
		$login = $this->Auth()->register( $_POST['name'], $_POST['username'], $_POST['password'] );
		$login = explode("|", $login);
		// validamos si se logueo o no
		if( $login[0] != 'logueado' )
		{
			// agregamos los errores obtenidos desde la peticion hecha al model
			echo $login[0];
		}
		else{
			// retornamos a la vista de acceso cuando se satisfatorio el logueo
			echo 'true|'.$login[1];
		}
	}

	// función para validar la recuperación de contraseña
	public function recover_validation()
	{
		// validamos que existan los campos
		$errors = $this->validate( $_POST, [
			'email' => 'required|email',
		] );

		if( $errors )
		{
			echo $this->errors();
			return;
		}
		// validamos que sea una peticion por post
		$this->methodPost();
		// realizamos la peticion al modelo de cerrar sesion
		$recover = $this->Auth()->recover_password( $_POST['email'] );

		// validamos si se logueo o no
		if( $recover != 'enviado' )
		{
			// agregamos a las variables de error la respuesta del servidor
			array_push($this->errors, $recover);
			// agregamos los errores obtenidos desde la peticion hecha al model
			echo $this->errors();
			return;
		}
		else{
			// retornamos a la vista de acceso cuando se satisfatorio el logueo
			echo 'true';
		}
	}

}