<?php

// importamos el trait de slug
require_once RUTA_APP."/Traits/SlugTrait.php";

// función que carga la vista principal del dashboard 
class SharebedroomController extends Controller
{
	// función constructora de la clase
	public function __construct()
	{
		// validamos que solo puedan ingresar usuarios
		$this->Auth()->role_diff( 1 );
		// instanciamos el modelo de sharebedroom
		$this->sharebedroomModel = $this->model('Sharebedroom');
	}

	public function store()
	{
		// Validamos que sea una petición enviada por post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'bathroom' => 'required',
			'closet' => 'required',
			'wifi' => 'required',
			'fridge' => 'required',
			'cleaning' => 'required',
			'visit_schedule' => 'required',
			'environment' => 'required',
			'arrival_hour' => 'required',
			'stratum' => 'required|number',
			'garage' => 'required',
			'immovable_kind' => 'required',
			'elevator' => 'required',
			'social_zone' => 'required',
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
			'bathroom' => $_POST['bathroom'],
			'closet' => $_POST['closet'],
			'wifi' => $_POST['wifi'],
			'fridge' => $_POST['fridge'],
			'cleaning' => $_POST['cleaning'],
			'visit_schedule' => $_POST['visit_schedule'],
			'environment' => $_POST['environment'],
			'arrival_hour' => $_POST['arrival_hour'],
			'stratum' => $_POST['stratum'],
			'garage' => $_POST['garage'],
			'immovable_kind' => $_POST['immovable_kind'],
			'elevator' => $_POST['elevator'],
			'social_zone' => $_POST['social_zone'],
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => NULL
		];
		// Realizamos la petición de registro
		$result = $this->sharebedroomModel->store( $request );
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
			'sharebedroom_id' => 'required|number',
			'bathroom' => 'required',
			'closet' => 'required',
			'wifi' => 'required',
			'fridge' => 'required',
			'cleaning' => 'required',
			'visit_schedule' => 'required',
			'environment' => 'required',
			'arrival_hour' => 'required',
			'stratum' => 'required|number',
			'garage' => 'required',
			'immovable_kind' => 'required',
			'elevator' => 'required',
			'social_zone' => 'required',
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
			'bathroom' => $_POST['bathroom'],
			'closet' => $_POST['closet'],
			'wifi' => $_POST['wifi'],
			'fridge' => $_POST['fridge'],
			'cleaning' => $_POST['cleaning'],
			'visit_schedule' => $_POST['visit_schedule'],
			'environment' => $_POST['environment'],
			'arrival_hour' => $_POST['arrival_hour'],
			'stratum' => $_POST['stratum'],
			'garage' => $_POST['garage'],
			'immovable_kind' => $_POST['immovable_kind'],
			'elevator' => $_POST['elevator'],
			'social_zone' => $_POST['social_zone'],
			'updated_at' => date("Y-m-d H:i:s")
		];
		// Realizamos la petición de registro
		$result = $this->sharebedroomModel->update( $request );
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
		$result = $this->sharebedroomModel->delete( $_POST['id'] );
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