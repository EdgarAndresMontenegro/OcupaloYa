<?php

class PlanController extends Controller
{
	// función constructora de la clase
	public function __construct()
	{
		// validamos que solo puedan ingresar usuarios
		$this->Auth()->role_diff( 1 );
		// instanciamos el modelo de plan
		$this->planModel = $this->model('Plan');
		// instanciamos el modelo de plan
		$this->sectionModel = $this->model('Section');
		// instanciamos el modelo de plan
		$this->plansectionModel = $this->model('Plansection');
	}

	// función para mostrar la vista
	public function index()
	{	
		// mostramos la vista
		$this->redirect('Dashboard/Configurations/Plan/listing');
	}

	// función para crear los datos del usuario
	public function create()
	{
		$params = [
			'sections' => $this->sectionModel->all(),
		];
		/* código para cargar la vista para almacenar un registro */
		echo $this->view( 'Dashboard/Configurations/Plan/create', $params );
	}

	// función para actualziar los datos del usuario
	public function edit( $name )
	{
		// buscamos los datos del usuario
		$plan = mysqli_fetch_assoc( $this->planModel->find_by_name( $name ) );
		/* array que contiene los parametros a pasar a la vista */
		$params = [
			"plan" => $plan,
			'sections' => $this->sectionModel->all(),
			'plan_sections' => $this->plansectionModel->find_by_plan_id( $plan['id'] ),
		];
		/* código para cargar la vista para almacenar un registro */
		echo $this->view( 'Dashboard/Configurations/Plan/edit', $params );
	}

	// función para mostrar la vista con el listado inicial
	public function listing( $pagina = 1, $input_whr = "name", $value_whr = null )
	{
		// obtenemos los datos del modelo
		$lista = $this->data( $pagina, $input_whr, $value_whr );
		// mostramos la vista al usuario
		echo $this->view( 'Dashboard/Configurations/Plan/index', $lista );
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
		$data = $this->planModel->listing( $pagina, $input_whr, $value_whr );
		// variable que contendra el listado
		$list = "";
		// validamos que existan datos
		if( $data['cant'] > 0 ) 
		{
			// recorremos los datos existentes
			foreach( $data['list'] as $plan )
			{
				// buscamos las secciones del plan
				$sections = $this->plansectionModel->find_by_plan_id( $plan['id'] );
				// variable para mostrar las secciones
				$secciones = '';
				// recorremos las secciones
				foreach ($sections as $section) 
				{
					// buscamos los datos de la seccion
					$section_find = mysqli_fetch_assoc( $this->sectionModel->find( $section['section_id'] ) );
					// concatenamos las secciones
					$secciones .= ucfirst($section_find['name']).", ";
				}
				// eliminamos el espacio y la coma
				$secciones = substr($secciones, 0, -2);
				// vamos concatenando cada dato
				$list .= '
					<div class="col-md-6 mt-4">
						<div class="card">
							<div class="card-body">
								<div class="card-title mb-0 row">
									<div class="col-12 mb-3 mb-sm-0 col-sm-6 col-md-7 col-lg-6 text-truncate">
										<p>'.ucwords( $plan['name'] ).'</p>
										<small>Secciones: '.$secciones.'</small>
									</div>
									<div class="col-12 col-sm-6 col-md-5 col-lg-6">
										<a href="'.RUTA_URL.'/Dashboard/Configurations/Plan/Edit/'.$plan['name'].'" class="h6 text-primary mr-3 btn-outline-primary btn-sm mr-2" title="Actualizar">
											<i class="fa fa-pen"></i>
											<span class="d-md-none d-lg-inline">Actualizar</span>
										</a>
										<a data-toggle="modal" data-target="#modalConfirmDelete" class="open-confirm-delete h6 text-danger btn-outline-danger btn-sm" data-id="'.$plan['id'].'" data-toggle="tooltip" title="Eliminar"> 
											<i class="fas fa-trash"></i>
											<span class="d-md-none d-lg-inline">Eliminar</span>
										</a>
										<form id="form-delete-'.$plan['id'].'" action="'.RUTA_URL.'/Dashboard/Configurations/Plan/Delete" method="POST" style="display: none;">
											'.$this->csrfToken().'
											<input type="hidden" name="id" value="'.$plan['id'].'">
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
			'plan' => 'required',
			'precio' => 'required',
			'dias_activo' => 'required',
		]);
		// Validamos si existe un error
		if( $errors )
		{
			// Mostramos el mensaje de error al usuario
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// validamos que existan dias en el programa
		if( !isset( $_POST['secciones'] ) )
		{
			// retornamos un mensaje de error al usuario
			array_push( $this->errors, "Debes seleccionar al menos una sección." );
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// Creamos el array con los datos a pasar a la clase modelo
		$request = [
			'name' => $_POST['plan'],
			'price' => $_POST['precio'],
			'active_days' => $_POST['dias_activo'],
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => NULL
		];
		// Realizamos la petición de registro
		$result = $this->planModel->store( $request );
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
			$plan = mysqli_fetch_assoc( $this->planModel->find_by_name( $_POST['plan'] ) );
			// recorremos los secciones seleccionados por el miembro
			foreach ($_POST['secciones'] as $seccion) 
			{
				// creamos el request con los datos necesarios
				$request = [
					'plan_id' => $plan['id'],
					'section_id' => $seccion,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => NULL
				];
				// ejecutamos la petición de seguimiento
				$this->plansectionModel->store( $request );
			}
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
			'plan' => 'required',
			'precio' => 'required',
			'dias_activo' => 'required',
		]);
		// Validamos si existe un error
		if( $errors )
		{
			// Mostramos el mensaje de error al usuario
			echo $this->errors();
			// evitamos que siga la función
			return;
		}

		// validamos que existan dias en el programa
		if( !isset( $_POST['secciones'] ) )
		{
			// retornamos un mensaje de error al usuario
			array_push( $this->errors, "Debes seleccionar al menos una sección." );
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// Creamos el array con los datos a pasar a la clase modelo
		$request = [
			'id' => $_POST['id'],
			'name' => $_POST['plan'],
			'price' => $_POST['precio'],
			'active_days' => $_POST['dias_activo'],
			'updated_at' => date("Y-m-d H:i:s")
		];
		// Realizamos la petición de registro
		$result = $this->planModel->update( $request );
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
			// eliminamos las secciones registradas
			$this->plansectionModel->delete_by_plan_id( $_POST['id'] );
			// recorremos los secciones seleccionados por el miembro
			foreach ($_POST['secciones'] as $seccion) 
			{
				// creamos el request con los datos necesarios
				$request = [
					'plan_id' => $_POST['id'],
					'section_id' => $seccion,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => NULL
				];
				// ejecutamos la petición de seguimiento
				$this->plansectionModel->store( $request );
			}
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
		$result = $this->plansectionModel->delete_by_plan_id( $_POST['id'] );
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
			// Realizamos la petición de registro
			$result = $this->planModel->delete( $_POST['id'] );
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

}