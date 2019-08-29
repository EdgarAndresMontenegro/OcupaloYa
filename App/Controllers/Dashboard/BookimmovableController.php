<?php

// importamos el trait de slug
require_once RUTA_APP."/Traits/SlugTrait.php";

// función que carga la vista principal del dashboard 
class BookimmovableController extends Controller
{
	// función constructora de la clase
	public function __construct()
	{
		// validamos que solo puedan ingresar usuarios
		$this->Auth()->role_diff( 1 );
		// instanciamos el modelo de bedroom
		$this->bookimmovableModel = $this->model('BookImmovable');
	}

	// función para mostrar la vista
	public function index()
	{	
		// mostramos la vista
		$this->redirect('Dashboard/BookImmovable/listing');
	}

	// función para mostrar la vista con el listado inicial
	public function listing( $pagina = 1, $input_whr = "name", $value_whr = null )
	{
		// obtenemos los datos del modelo
		$lista = $this->data( $pagina, $input_whr, $value_whr );
		// mostramos la vista al usuario
		echo $this->view( 'Dashboard/BookImmovable/index', $lista );
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
		$data = $this->bookimmovableModel->listing( $pagina, $input_whr, $value_whr );
		// variable que contendra el listado
		$list = "";
		// validamos que existan datos
		if( $data['cant'] > 0 ) 
		{
			// recorremos los datos existentes
			foreach( $data['list'] as $bookimmovable )
			{
				// vamos concatenando cada dato
				$list .= '
				<tr>
					<td>'.$bookimmovable['id'].'</td>
					<td>'.$bookimmovable['user_id'].'</td>
					<td>'.$bookimmovable['immovable_id'].'</td>
					<td>'.$bookimmovable['taking_date'].'</td>
					<td>'.$bookimmovable['advanced_budget'].'</td>
					<td>'.$bookimmovable['state'].'</td>
					<td>'.$bookimmovable['took_by_interested'].'</td>
					<td>'.$bookimmovable['gave_by_owner'].'</td>
					<td>'.$bookimmovable['retire_state'].'</td>
					<td>'.$bookimmovable['updated_at'].'</td>
					<td width="10px">
						<a href="'.RUTA_URL.'/Hyperboard/BookImmovable/Edit/'.$bookimmovable['id'].'" class="btn btn-sm btn-warning m-0">
							<i class="fas fa-pen"></i>
						</a>
					</td>
					<td width="10px">
						<a data-toggle="modal" data-target="#modalConfirmDelete" class="open-confirm-delete btn btn-sm btn-danger ml-auto" data-id="'.$bookimmovable['id'].'">
							<i class="fas fa-trash"></i>
						</a>
						<form id="form-delete-'.$bookimmovable['id'].'" action="'.RUTA_URL.'/hyperboard/bookimmovable/delete" method="POST" style="display: none;">
							'.$this->csrfToken().'
							<input type="hidden" name="id" value="'.$bookimmovable['id'].'">
						</form>
					</td>
				</tr>
				';
			}
		}
		else
		{
			// asignamos el código para mostrar que no se han encontrado resultados
			$list .= '
			<tr>
				<td colspan="6" class="grey-text text-center h6 py-4">
					<i class="fa fa-ban mr-2"></i>
					No se han encontrado resultados
				</td>
			</tr>
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
			'user_id' => 'required|number',
			'immovable_id' => 'required|number',
			'taking_date' => 'required',
			'advanced_budget' => 'required|number',
			'state' => 'required',
			'took_by_interested' => 'required',
			'gave_by_owner' => 'required',
			'retire_state' => 'required|number'
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
			'user_id' => $_POST['user_id'],
			'immovable_id' => $_POST['immovable_id'],
			'taking_date' => $_POST['taking_date'],
			'advanced_budget' => $_POST['advanced_budget'],
			'state' => $_POST['state'],
			'took_by_interested' => $_POST['took_by_interested'],
			'gave_by_owner' => $_POST['gave_by_owner'],
			'retire_state' => $_POST['retire_state'],
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => NULL
		];
		// Realizamos la petición de registro
		$result = $this->bookimmovableModel->store( $request );
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
			'user_id' => 'required|number',
			'immovable_id' => 'required|number',
			'taking_date' => 'required',
			'advanced_budget' => 'required|number',
			'state' => 'required',
			'took_by_interested' => 'required',
			'gave_by_owner' => 'required',
			'retire_state' => 'required|number'
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
			'user_id' => $_POST['user_id'],
			'immovable_id' => $_POST['immovable_id'],
			'taking_date' => $_POST['taking_date'],
			'advanced_budget' => $_POST['advanced_budget'],
			'state' => $_POST['state'],
			'took_by_interested' => $_POST['took_by_interested'],
			'gave_by_owner' => $_POST['gave_by_owner'],
			'retire_state' => $_POST['retire_state'],
			'updated_at' => date("Y-m-d H:i:s")
		];
		// Realizamos la petición de registro
		$result = $this->bookimmovableModel->update( $request );
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
		$result = $this->bookimmovableModel->delete( $_POST['id'] );
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