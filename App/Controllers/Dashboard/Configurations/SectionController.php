<?php

class SectionController extends Controller
{
	// función constructora de la clase
	public function __construct()
	{
		// validamos que solo puedan ingresar usuarios
		$this->Auth()->role_diff( 1 );
		// instanciamos el modelo de plan
		$this->sectionModel = $this->model('Section');
	}

	// función para mostrar la vista
	public function index()
	{	
		// mostramos la vista
		$this->redirect('Dashboard/Configurations/Section/listing');
	}

	// función para crear los datos del usuario
	public function create()
	{
		/* código para cargar la vista para almacenar un registro */
		echo $this->view( 'Dashboard/Configurations/Section/create' );
	}

	// función para actualziar los datos del usuario
	public function edit( $id )
	{
		// buscamos los datos del usuario
		$section = mysqli_fetch_assoc( $this->sectionModel->find( $id ) );
		/* array que contiene los parametros a pasar a la vista */
		$params = [
			"section" => $section
		];
		/* código para cargar la vista para almacenar un registro */
		echo $this->view( 'Dashboard/Configurations/Section/edit', $params );
	}

	// función para mostrar la vista con el listado inicial
	public function listing( $pagina = 1, $input_whr = "name", $value_whr = null )
	{
		// obtenemos los datos del modelo
		$lista = $this->data( $pagina, $input_whr, $value_whr );
		// mostramos la vista al usuario
		echo $this->view( 'Dashboard/Configurations/Section/index', $lista );
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
		$data = $this->sectionModel->listing( $pagina, $input_whr, $value_whr );
		// variable que contendra el listado
		$list = "";
		// validamos que existan datos
		if( $data['cant'] > 0 ) 
		{
			// recorremos los datos existentes
			foreach( $data['list'] as $section )
			{
				// vamos concatenando cada dato
				$list .= '
					<div class="col-md-6 mt-4">
						<div class="card">
							<div class="card-body">
								<div class="card-title mb-0 row">
									<div class="col-12 mb-3 mb-sm-0 col-sm-6 col-md-7 col-lg-6 text-truncate">
										'.ucwords( $section['name'] ).'
									</div>
									<div class="col-12 col-sm-6 col-md-5 col-lg-6">
										<a href="'.RUTA_URL.'/Dashboard/Configurations/Section/Edit/'.$section['id'].'" class="h6 text-primary mr-3 btn-outline-primary btn-sm mr-2" title="Actualizar">
											<i class="fa fa-pen"></i>
											<span class="d-md-none d-lg-inline">Actualizar</span>
										</a>
										<a data-toggle="modal" data-target="#modalConfirmDelete" class="open-confirm-delete h6 text-danger btn-outline-danger btn-sm" data-id="'.$section['id'].'" data-toggle="tooltip" title="Eliminar"> 
											<i class="fas fa-trash"></i>
											<span class="d-md-none d-lg-inline">Eliminar</span>
										</a>
										<form id="form-delete-'.$section['id'].'" action="'.RUTA_URL.'/Dashboard/Configurations/Section/Delete" method="POST" style="display: none;">
											'.$this->csrfToken().'
											<input type="hidden" name="id" value="'.$section['id'].'">
										</form>
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
			'seccion' => 'required',
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
			'name' => $_POST['seccion'],
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => NULL
		];
		// Realizamos la petición de registro
		$result = $this->sectionModel->store( $request );
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
			'seccion' => 'required'
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
			'name' => $_POST['seccion'],
			'updated_at' => date("Y-m-d H:i:s")
		];
		// Realizamos la petición de registro
		$result = $this->sectionModel->update( $request );
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
		$result = $this->sectionModel->delete( $_POST['id'] );
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