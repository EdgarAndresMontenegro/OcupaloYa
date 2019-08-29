<?php

// importamos el trait de slug
require_once RUTA_APP."/Traits/SlugTrait.php";
// importamos el trait de slug
require_once RUTA_APP."/Traits/ConvertTrait.php";

// función que carga la vista principal del dashboard 
class AllyController extends Controller
{
	// función constructora de la clase
	public function __construct()
	{
		// validamos que solo puedan ingresar usuarios
		$this->Auth()->role_diff( 1 );
		// instanciamos el modelo de usuarios
		$this->allyModel = $this->model('Ally');
		// instanciamos el modelo de usuarios
		$this->allysucursalModel = $this->model('Allysucursal');
		// instanciamos el modelo de usuarios
		$this->userModel = $this->model('User');
		// instanciamos el modelo de datos de usuarios
		$this->userdataModel = $this->model('Userdata');
		// instanciamos el modelo de usuarios
		$this->roleModel = $this->model('Role');
		// instanciamos el modelo de roles
		$this->countryModel = $this->model('Country');
		// instanciamos el modelo de roles
		$this->stateModel = $this->model('State');
		// instanciamos el modelo de roles
		$this->cityModel = $this->model('City');
	}

	// función para mostrar la vista
	public function index()
	{	
		// mostramos la vista
		$this->redirect('Dashboard/Ally/listing');
	}

	// función para crear los datos del usuario
	public function create()
	{
		/* array que contiene los parametros a pasar a la vista */
		$params = [
			'countries' => $this->countryModel->all()
		];
		/* código para cargar la vista para almacenar un registro */
		echo $this->view( 'Dashboard/Ally/create', $params );
	}

	// función para crear los datos del usuario
	public function edit( $slug )
	{
		// buscamos los datos del aliado
		$ally = mysqli_fetch_assoc( $this->allyModel->find_by_slug( $slug ) );
		// buscamos los datos de las sucursales
		$allysucursal = $this->allysucursalModel->find_by_ally_id( $ally['id'] );
		// buscamos los datos del usuario
		$user = mysqli_fetch_assoc( $this->userModel->find( $ally['user_id'] ) );
		// buscamos los datos del usuario
		$userdata = mysqli_fetch_assoc( $this->userdataModel->find_by_user_id( $user['id'] ) );
		/* array que contiene los parametros a pasar a la vista */
		$params = [
			'countries' => $this->countryModel->all(),
			'cities' => $this->cityModel->all(),
			'ally' => $ally,
			'allysucursal' =>$allysucursal,
			"user" => $user,
			"userdata" => $userdata,
		];
		/* código para cargar la vista para almacenar un registro */
		echo $this->view( 'Dashboard/Ally/edit', $params );
	}

	// función para mostrar la vista con el listado inicial
	public function listing( $pagina = 1, $input_whr = "social_reason", $value_whr = null )
	{
		// obtenemos los datos del modelo
		$lista = $this->data( $pagina, $input_whr, $value_whr );
		// mostramos la vista al usuario
		echo $this->view( 'Dashboard/Ally/index', $lista );
	}

	// función para consultar por medio de ajax para estar cargando los datos sin recargar la página
	public function pagination( $pagina = 1, $input_whr = "social_reason", $value_whr = null )
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
		$data = $this->allyModel->listing( $pagina, $input_whr, $value_whr );
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
					<div class="col-md-6 mt-4">
						<div class="card">
							<div class="card-body">
								<div class="card-title">
									<a href="'.RUTA_URL.'/Dashboard/Ally/Edit/'.$user['slug'].'" class="float-right h6 text-primary mr-3 btn-outline-primary btn-sm">
										<i class="fa fa-info-circle"></i> Ver información
									</a>
								</div>
								<div class="card-body">
									<div class="row align-items-center mt-3">
										<div class="col-lg-4 text-center">
											<img src="'.RUTA_IMG.'/allies/'.$user['logo'].'" class="img-fluid" style="border-radius: 50%; max-width: 100px;  max-height: 100px;">
										</div>
										<div class="col-lg-8">
											<h5 class="text-truncate mb-2">
												'.ucwords( $user['social_reason'] ).'
											</h5>
											<p class="h6 mb-2 text-truncate">
												'.$user['nit'].'
											</p>
											<p class="h6 text-truncate">
												'.$user['description'].'
											</p>
											<p class="h6 text-truncate">
												Miembro desde '.ConvertTrait::date( $user['created_at'] ).'.
											</p>
										</div>
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

	// función para búscar los aliados registrados en la base de datos
	public function find_owner( $name )
	{
		// búscamos los datos de los representantes que coincidan con el dato
		$owners = $this->userModel->find_ally_by_name( $name );
		// validamos que existen resultados
		if( $owners->num_rows > 0 )
		{
			// variable que contiene el listado de los aliarepresentantesdos encontrados
			$list_owners = '';
			// recorremos los datos del aliado
			foreach ($owners as $owner) 
			{
				$list_owners .= '
					<a data-id="'.$owner['id'].'" data-name="'.ucwords($owner['name']).'" data-username="'.$owner['username'].'" class="item-list-owner text-truncate">
						<img src="'.RUTA_IMG.'/users/'.$owner['icon'].'" class="img-fluid photo-user" style="max-width: 30px;  max-height: 30px;">
						'.ucwords($owner['name']).' - '.$owner['username'].'
					</a>
				';
			}
			// variable que contiene el listado de los aliados encontrados
			$list_owners .= '
				<script>
					$(".item-list-owner").on("click", function(){
						var obj = $(this);
						$("#user_id").val( obj.data("id") );
						$("#nombre_representante").val( obj.data("name") );
						$("#email_representante").val( obj.data("username") );
						$("#telefono_representante").val("");
						$("#direccion_representante").val("");
						$("#state_id").html("<option>-- Seleccione un País --</option>");
						$("#ciudad_representante_id").html("<option>-- Seleccione un Departamento/Estado --</option>");
						return false;
					});
				</script>
			';
			// mostramos el resultado
			echo $list_owners;
		}
		else
		{
			echo '
				<a href="" class="item-list-owner text-truncate">
					<i class="fa fa-ban mr-2"></i>
					No se han encontrado resultados
				</a>
			';
		}
	}

	public function store()
	{
		// Validamos que sea una petición enviada por post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'razon_social' => 'required',
			'nit' => 'required',
		]);
		// Validamos si existe un error
		if( $errors )
		{
			// Mostramos el mensaje de error al usuario
			echo $this->errors();
			// evitamos que siga la función
			return;
		}

		// validamos si no existe o es vacio el user_id para registrar el nuevo representante
		if( !isset( $_POST['user_id'] ) or empty( $_POST['user_id'] ) )
		{
			// obtenemos el resultado de la consulta
			$result = $this->store_owner( $_POST['nombre_representante'], $_POST['email_representante'], $_POST['telefono_representante'], $_POST['ciudad_representante_id'], $_POST['direccion_representante'] );
			// validamos si no es un número
			if( !is_numeric( $result ) )
			{
				// Mostramos el mensaje de error al usuario
				echo $result;
				// evitamos que siga la función
				return;
			}
			else
				// asignamos el valor del user_id que viene desde la vista
				$_POST['user_id'] = $result;
		}
		// creamos el slug del aliado
		$slug = SlugTrait::slug( $_POST['razon_social'] );
		// Creamos el array con los datos a pasar a la clase modelo
		$request = [
			'user_id' => $_POST['user_id'],
			'social_reason' => $_POST['razon_social'],
			'slug' => $slug,
			'nit' => $_POST['nit'],
			'logo' => $_POST['photo'],
			'website' => $_POST['sitio_web'],
			'description' => $_POST['descripcion'],
			'foundation_date' => $_POST['fecha_de_fundacion'],
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => NULL,
		];
		// Realizamos la petición de registro
		$result = $this->allyModel->store( $request );
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
			// buscamos los datos del aliado registrado
			$ally = mysqli_fetch_assoc( $this->allyModel->find_by_slug( $slug ) );
			// recorremos los datos de las sucursales
			for ($i=0; $i < count( $_POST['ciudad_sucursal_id'] ); $i++) 
			{ 
				// Creamos el array con los datos a pasar a la clase modelo
				$request = [
					'ally_id' => $ally['id'],
					'city_id' => $_POST['ciudad_sucursal_id'][$i],
					'telephone' => $_POST['telefono_sucursal'][$i],
					'cellphone' => $_POST['celular_sucursal'][$i],
					'address' => $_POST['direccion_sucursal'][$i],
					'lattitude' => $_POST['lat'][$i],
					'longitude' => $_POST['lon'][$i],
					'created_at' => date("Y-m-d H:i:s"),
					'updated_at' => NULL,
				];
				// Realizamos la petición de registro
				$result = $this->allysucursalModel->store( $request );
				// Validamos si existe un error
				if( !$result )
				{
					// eliminamos todas sucursales
					$this->allysucursalModel->delete_by_ally_id( $ally['id'] );
					// eliminamos la sucursal
					$this->allyModel->delete( $ally['id'] );
					// Agregamos el mensaje a la variable para ser mostrada
					array_push( $this->errors, $result );
					// Mostramos el mensaje de error al usuario
					echo $this->errors();
					// paramos la ejecución
					return false;
				}
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
			'razon_social' => 'required',
			'nit' => 'required',
		]);
		// Validamos si existe un error
		if( $errors )
		{
			// Mostramos el mensaje de error al usuario
			echo $this->errors();
			// evitamos que siga la función
			return;
		}

		// validamos si no existe o es vacio el user_id para registrar el nuevo representante
		if( !isset( $_POST['user_id'] ) or empty( $_POST['user_id'] ) )
		{
			// obtenemos el resultado de la consulta
			$result = $this->store_owner( $_POST['nombre_representante'], $_POST['email_representante'], $_POST['telefono_representante'], $_POST['ciudad_representante_id'], $_POST['direccion_representante'] );
			// validamos si no es un número
			if( !is_numeric( $result ) )
			{
				// Mostramos el mensaje de error al usuario
				echo $result;
				// evitamos que siga la función
				return;
			}
			else
				// asignamos el valor del user_id que viene desde la vista
				$_POST['user_id'] = $result;
		}
		// creamos el slug del aliado
		$slug = SlugTrait::slug( $_POST['razon_social'] );
		// Creamos el array con los datos a pasar a la clase modelo
		$request = [
			'id' => $_POST['id'],
			'user_id' => $_POST['user_id'],
			'social_reason' => $_POST['razon_social'],
			'slug' => $slug,
			'nit' => $_POST['nit'],
			'logo' => $_POST['photo'],
			'website' => $_POST['sitio_web'],
			'description' => $_POST['descripcion'],
			'foundation_date' => $_POST['fecha_de_fundacion'],
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => NULL,
		];
		// Realizamos la petición de registro
		$result = $this->allyModel->update( $request );
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
			// buscamos los datos del aliado registrado
			$ally_id = $_POST['id'];
			// eliminamos todas sucursales
			$this->allysucursalModel->delete_by_ally_id( $ally_id );
			// recorremos los datos de las sucursales
			for ($i=0; $i < count( $_POST['ciudad_sucursal_id'] ); $i++) 
			{ 
				// Creamos el array con los datos a pasar a la clase modelo
				$request = [
					'ally_id' => $ally_id,
					'city_id' => $_POST['ciudad_sucursal_id'][$i],
					'telephone' => $_POST['telefono_sucursal'][$i],
					'cellphone' => $_POST['celular_sucursal'][$i],
					'address' => $_POST['direccion_sucursal'][$i],
					'lattitude' => $_POST['lat'][$i],
					'longitude' => $_POST['lon'][$i],
					'created_at' => date("Y-m-d H:i:s"),
					'updated_at' => NULL,
				];
				// Realizamos la petición de registro
				$result = $this->allysucursalModel->store( $request );
				// Validamos si existe un error
				if( !$result )
				{
					// eliminamos todas sucursales
					$this->allysucursalModel->delete_by_ally_id( $ally_id );
					// Agregamos el mensaje a la variable para ser mostrada
					array_push( $this->errors, $result );
					// Mostramos el mensaje de error al usuario
					echo $this->errors();
					// paramos la ejecución
					return false;
				}
			}
			// Mostramos el mensaje de éxito al usuario
			echo "true";
		}

	}

	// función para registrar al representante
	public function store_owner( $name, $username, $telephone, $city_id, $address )
	{
		// creamos el slug del usuario
		$slug = SlugTrait::slug( $username );
		// buscamos los datos del usuario
		$user = $this->userModel->find_by_slug( $slug );
		// validamos si existen datos
		if( $user->num_rows > 0 )
		{
			// obtenemos los datos del usuario
			$user = mysqli_fetch_assoc( $user );
			// retornamos el id del usuario
			return $user['id'];
		}
		else
		{
			// creamos una contraseña totalmente aleatoria
			$password = $this->Auth()->generar_password_complejo();
			// encriptamos y protegemos la variable del password
			$password_encriptada = password_hash( $this->Auth()->protectVars( $password ) , PASSWORD_BCRYPT);
			// Creamos el array con los datos a pasar a la clase modelo
			$request = [
				'rol_id' => 3,
				'name' => $name,
				'username' => $username,
				'password' => $password_encriptada,
				'slug' => $slug,
				'icon' => 'icon-o.png',
				'state' => '1',
				'block' => '1',
				'balance' => '0.0',
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => NULL,
			];
			// Realizamos la petición de registro
			$result = $this->userModel->store( $request );
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
				// buscamos los datos del usuario registrado
				$user = mysqli_fetch_assoc( $this->userModel->find_by_slug( $slug ) );
				// Creamos el array con los datos a pasar a la clase modelo
				$request = [
					'user_id' => $user['id'],
					'city_id' => $city_id,
					'sex' => NULL,
					'telephone' => $telephone,
					'address' => $address,
					'birth_date' => NULL,
					'created_at' => date("Y-m-d H:i:s"),
					'updated_at' => NULL,
				];
				// Realizamos la petición de registro
				$result = $this->userdataModel->store( $request );
				// Validamos si existe un error
				if( !$result )
				{
					// eliminamos los datos del usuario a crear
					$this->userModel->delete( $user['id'] );	
					// Agregamos el mensaje a la variable para ser mostrada
					array_push( $this->errors, $result );
					// Mostramos el mensaje de error al usuario
					return $this->errors();
				}
				else
				{
					require_once RUTA_APP."/Traits/SendMailTrait.php";
					require_once RUTA_APP."/Helpers/EmailTemplates/SendpasswordTemplate.php";
					$template = SendpasswordTemplate::template( $name, $password, $username );
					$mensaje = "Si no puedes ver el contenido del correo electrónico desde tu móvil, te recomendamos verlo desde un equipo de computo.";
					$sendmail = SendMailTrait::send( SMTP_ADDRESS, ucwords(APP_NAME), $template, $mensaje, $username, "Información de acceso" );
					// retornamos el id del usuario
					return $user['id'];
				}
			}
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
		$result = $this->allyModel->delete( $_POST['id'] );
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

	// función para subir la foto de perfil
	public function uploadPhoto()
	{
		// obtenemos la imagen despúes de hacer crop
		$data = $_POST['image'];
		// expltamos la imagen para obtener los datos del base64
		$image_exp = explode(",", $data);
		// desencriptamos el base64
		$data = base64_decode($image_exp[1]);
		// obtenemos el slug del titulo del club
		$slug = SlugTrait::slug( $_POST['folder'] );
		// creamos el nombre de la imagen
		$imageName = time() . '-' . $slug . '.png';
		// creamos la ruta de acuerdo a la varible global public
		$folder = RUTA_PUBLIC . '/' . 'img/allies/'.$slug;
		// creamos la carpeta si no existe
		if (!file_exists($folder))
			// creamos la carpeta
			mkdir($folder, 0777, true);
		// creamos la imagen segun la ruta que deseemos
		file_put_contents($folder.'/'.$imageName, $data);
		// enviamos el nombre de la imagen
		echo "true|".$slug."/".$imageName."|".RUTA_IMG."/allies/".$slug."/".$imageName;
	}

}