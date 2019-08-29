<?php

// importamos el trait de slug
require_once RUTA_APP."/Traits/SlugTrait.php";

// función que carga la vista principal del dashboard 
class CityController extends Controller
{
	// función constructora de la clase
	public function __construct()
	{
		// validamos que solo puedan ingresar usuarios
		$this->Auth()->role_diff( 1 );
		// instanciamos el modelo de city
		$this->cityModel = $this->model('City');
	}

	public function store()
	{
		// Validamos que sea una petición enviada por post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'state_id' => 'required|number',
			'name' => 'required'
		]);
		// Validamos si existe un error
		if( $errors )
		{
			// Mostramos el mensaje de error al usuario
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// Creamos el array con los datos a pasar a la clase modelo
		$request = [
			'state_id' => $_POST['state_id'],
			'name' => $_POST['name'],
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => NULL
		];
		// Realizamos la petición de registro
		$result = $this->cityModel->store( $request );
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


	public function update()
	{
		// Validamos que sea una petición enviada por post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'state_id' => 'required|number',
			'name' => 'required'
		]);
		// Validamos si existe un error
		if( $errors )
		{
			// Mostramos el mensaje de error al usuario
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// Creamos el array con los datos a pasar a la clase modelo
		$request = [
			'id' => $_POST['id'],
			'state_id' => $_POST['state_id'],
			'name' => $_POST['name'],
			'updated_at' => date("Y-m-d H:i:s")
		];
		// Realizamos la petición de registro
		$result = $this->cityModel->update( $request );
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
		// Realizamos la petición de registro
		$result = $this->cityModel->delete( $_POST['id'] );
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