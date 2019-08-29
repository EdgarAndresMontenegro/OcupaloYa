<?php 


class InmueblesController extends Controller
{

	public function __construct()
	{
		$this->Auth();
		// instanciamos el model
		$this->userModel = $this->model('User');	
	}

	// función para redireccionar a la vista con el listado inicial
	public function index()
	{
		// redireccionamos a la vista del listado
		$this->redirect('Inmuebles/Lista');	
	}

	// función para mostrar la vista con el listado inicial
	public function lista( $pagina = 1, $input_whr = "name", $value_whr = null )
	{
		// obtenemos los datos del modelo
		$lista = $this->data( $pagina, $input_whr, $value_whr );
		// mostramos la vista al usuario
		echo $this->view( 'inmovable_list', $lista );
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

	public function detalles(){
		$this->view('detalles');
	}

	// función para obtener los datos del listado
	public function data( $pagina, $input_whr, $value_whr )
	{
		// obtenemos obtenemos los datos del listado
		$data = $this->userModel->listing( $pagina, $input_whr, $value_whr );
		// variable que contendra el listado
		$list = "";
		// validamos que existan datos
		if( $data['cant'] > 0 ) 
		{
			// recorremos los datos existentes
			foreach( $data['list'] as $user )
			{
				// vamos concatenando cada dato
				$list .= '
				<tr>
					<td>'.$user['id'].'</td>
					<td>'.ucfirst( $user['name'] ).'</td>
					<td>'.$user['username'].'</td>
					<td>'.$user['updated_at'].'</td>
					<td width="10px">
						<a href="'.RUTA_URL.'/Hyperboard/User/Edit/'.$user['id'].'" class="btn btn-sm btn-warning m-0">
							<i class="fas fa-pen"></i>
						</a>
					</td>
					<td width="10px">
						<a data-toggle="modal" data-target="#modalConfirmDelete" class="open-confirm-delete btn btn-sm btn-danger ml-auto" data-id="'.$user['id'].'">
							<i class="fas fa-trash"></i>
						</a>
						<form id="form-delete-'.$user['id'].'" action="'.RUTA_URL.'/hyperboard/user/delete" method="POST" style="display: none;">
							'.$this->csrfToken().'
							<input type="hidden" name="id" value="'.$user['id'].'">
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

}