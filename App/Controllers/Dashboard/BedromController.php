<?php

// importamos el trait de slug
require_once RUTA_APP."/Traits/SlugTrait.php";

// función que carga la vista principal del dashboard 
class BedroomController extends Controller
{
	// función constructora de la clase
	public function __construct()
	{
		// validamos que solo puedan ingresar usuarios
		$this->Auth()->role_diff( 1 );
		// instanciamos el modelo de bedroom
		$this->bedroomModel = $this->model('Bedroom');
	}

	// función para mostrar la vista
	public function index()
	{	
		// mostramos la vista
		$this->redirect('Dashboard/Bedroom/listing');
	}

	// función para mostrar la vista con el listado inicial
	public function listing( $pagina = 1, $input_whr = "name", $value_whr = null )
	{
		// obtenemos los datos del modelo
		$lista = $this->data( $pagina, $input_whr, $value_whr );
		// mostramos la vista al usuario
		echo $this->view( 'Dashboard/Bedroom/index', $lista );
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
		$data = $this->bedroomModel->listing( $pagina, $input_whr, $value_whr );
		// variable que contendra el listado
		$list = "";
		// validamos que existan datos
		if( $data['cant'] > 0 ) 
		{
			// recorremos los datos existentes
			foreach( $data['list'] as $bedroom )
			{
				// vamos concatenando cada dato
				$list .= '
				<tr>
					<td>'.$bedroom['id'].'</td>
					<td>'.$bedroom['washing_machine'].'</td>
					<td>'.$bedroom['kitchen'].'</td>
					<td>'.$bedroom['pet_allowed'].'</td>
					<td>'.$bedroom['furnitured'].'</td>
					<td>'.$bedroom['updated_at'].'</td>
					<td width="10px">
						<a href="'.RUTA_URL.'/Hyperboard/Bedroom/Edit/'.$bedroom['id'].'" class="btn btn-sm btn-warning m-0">
							<i class="fas fa-pen"></i>
						</a>
					</td>
					<td width="10px">
						<a data-toggle="modal" data-target="#modalConfirmDelete" class="open-confirm-delete btn btn-sm btn-danger ml-auto" data-id="'.$bedroom['id'].'">
							<i class="fas fa-trash"></i>
						</a>
						<form id="form-delete-'.$bedroom['id'].'" action="'.RUTA_URL.'/hyperboard/bedroom/delete" method="POST" style="display: none;">
							'.$this->csrfToken().'
							<input type="hidden" name="id" value="'.$bedroom['id'].'">
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
			'washing_machine' => 'required',
			'kitchen' => 'required',
			'pet_allowed' => 'required',
			'furnitured' => 'required'
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
			'washing_machine' => $_POST['washing_machine'],
			'kitchen' => $_POST['kitchen'],
			'pet_allowed' => $_POST['pet_allowed'],
			'furnitured' => $_POST['furnitured'],
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s")
		];
		// Realizamos la petición de registro
		$result = $this->bedroomModel->store( $request );
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
			'washing_machine' => 'required',
			'kitchen' => 'required',
			'pet_allowed' => 'required',
			'furnitured' => 'required'
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
			'washing_machine' => $_POST['washing_machine'],
			'kitchen' => $_POST['kitchen'],
			'pet_allowed' => $_POST['pet_allowed'],
			'furnitured' => $_POST['furnitured'],
			'updated_at' => date("Y-m-d H:i:s")
		];
		// Realizamos la petición de registro
		$result = $this->bedroomModel->update( $request );
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
		$result = $this->bedroomModel->delete( $_POST['id'] );
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