<?php

class WelcomeController extends Controller
{

	public function __construct()
	{
		$this->Auth();
		// instanciamos el modelo de usuarios
		$this->surveyModel = $this->model('Survey');
		// instanciamos el modelo de usuarios
		$this->dbModel = $this->model('Db');
		// creamos la base de datos
		$this->dbModel->create();
	}

	public function index()
	{	
		$this->view('welcome');
	}


	public function encuesta()
	{	
		$this->view('encuesta');
	}


	public function store( $id_encuesta )
	{
		// Creamos el array con los datos a pasar a la clase modelo
		$request = [
			'id_encuesta' => $id_encuesta,
		];
		// Realizamos la petición de registro
		$result = $this->surveyModel->store( $request );
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
		$encuesta = mysqli_fetch_assoc( $this->surveyModel->find_by_id_encuest( $_POST["id_encuesta"] ) );
		// Creamos el array con los datos a pasar a la clase modelo
		$request = [
			'id' => $encuesta["id"],
			'name' => $_POST["name"],
			'lastname' => $_POST["lastname"],
			'age' => $_POST["age"],
			'city' => $_POST["city"],
			'immovable_kind' => $_POST["immovable_kind"],
			'stratum' => $_POST["stratum"],
			'pets' => $_POST["pets"],
			'enviroment' => $_POST["enviroment"],
			'smooke' => $_POST["smooke"],
			'budget' => $_POST["budget"],
		];
		// Realizamos la petición de registro
		$result = $this->surveyModel->update( $request );
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