<?php

require_once RUTA_APP."/Traits/ConvertTrait.php";

// función que carga la vista principal del dashboard 
class ImmovableController extends Controller
{

	// función constructora de la clase
	public function __construct()
	{
		// validamos que solo puedan ingresar usuarios administradores
		$this->Auth()->role_diff( 4 );
		// instanciamos el modelo de usuarios
		$this->immovableModel = $this->model('Immovable');
		// instanciamos el modelo de usuarios
		$this->immovablekindModel = $this->model('Immovablekind');
		// instanciamos el modelo de usuarios
		$this->immovablepictureModel = $this->model('Immovablepicture');
	}

	// función para mostrar la vista
	public function index()
	{	
		// mostramos la vista
		$this->view('Owner/Welcome/welcome');
	}

	// función para mostrar la vista de publicar un inmueble
	public function publish()
	{	
		$params = [
			'immovable_kind' => $this->immovablekindModel->all(),
		];
		// mostramos la vista
		$this->view('Owner/Immovable/publish', $params);
	}

	// funcion para mostrar la subvista
	public function publish_type( $immovable_kind )
	{
		switch ( $immovable_kind ) {
			case '1':
				$this->view('Owner/Immovable/publish-type/habitacion');
			break;
			case '2':
				$this->view('Owner/Immovable/publish-type/cupo');
			break;
			case '3':
				$this->view('Owner/Immovable/publish-type/casa_apartamento');
			break;
			case '4':
				$this->view('Owner/Immovable/publish-type/casa_apartamento');
			break;
			case '5':
				$this->view('Owner/Immovable/publish-type/local_oficina');
			break;
			case '6':
				$this->view('Owner/Immovable/publish-type/local_oficina');
			break;
			case '8':
				$this->view('Owner/Immovable/publish-type/lote');
			break;
			case '9':
				$this->view('Owner/Immovable/publish-type/bodega');
			break;
			default:
				$this->view('Owner/Immovable/publish-type/parqueadero');
			break;
		}
	}

	// función para registrar un anuncio
	public function store()
	{
		// validamos que sea enviado por post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'titulo_inmueble' => 'required',
			'precio_inmueble' => 'required',
			'tipo_inmueble' => 'required',
			'tipo_proceso' => 'required',
			'tipo_contrato' => 'required',
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
		$slug = SlugTrait::slug( $_POST['titulo_inmueble'] );
		// Creamos el array con los datos a pasar a la clase modelo
		$request = [
			'user_id' => $this->Auth()->user()->id(),
			'name' => $_POST['titulo_inmueble'],
			'immovable_type' => $_POST['tipo_inmueble'],
			'area' => $_POST['area'],
			'slug' => $slug,
			'contract_type' => $_POST['tipo_contrato'],
			'process_type' => $_POST['tipo_proceso'],
			'antiquity' => $_POST['antiguedad'],
			'stratum' => $_POST['estrato'],
			'state' => $_POST['estado'],
			'tcm' => $_POST['tiempo_minimo_contrato'],
			'poster' => $_POST['poster_inmueble'],
			'description' => $_POST['descripcion'],
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => NULL
		];
		// Realizamos la petición de registro
		$result = $this->immovableModel->store( $request );
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
			// obtenemos los datos del registro
			$immovable = mysqli_fetch_assoc( $this->immovableModel->find_by_slug( $slug ) );
			// recorremos los secciones seleccionados por el miembro
			foreach ($_POST['photo'] as $photo) 
			{
				// creamos el request con los datos necesarios
				$request = [
					'immovable_id' => $immovable['id'],
					'name' => $photo,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => NULL
				];
				// ejecutamos la petición de seguimiento
				$this->immovablepictureModel->store( $request );
			}
			// Mostramos el mensaje de éxito al usuario
			echo "true";
		}
	}


	// función para subir una foto
	public function uploadimg()
	{
		require_once RUTA_APP."/Traits/UploadFileTrait.php";
		$res = UploadFileTrait::uploadImg( $_FILES['picture_immovable'], "immovable/" );
		if( $res[0] == 'error' )
		{
			array_push( $this->errors, $res[1] );
			$this->errors();
		}
		else
			echo "img/immovable/".$res[0]."|".$res[0];
	}

}