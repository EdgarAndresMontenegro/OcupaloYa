<?php

// importamos el trait de slug
require_once RUTA_APP."/Traits/SlugTrait.php";

// función que carga la vista principal del dashboard 
class ImmovableController extends Controller
{
	// función constructora de la clase
	public function __construct()
	{
		// validamos que solo puedan ingresar usuarios
		$this->Auth()->role_diff( 1 );
		// importamos el modelo de inmuebles
		$this->immovableModel = $this->model('Immovable');
		// importamos el modelo de fotos de inmuebles
		$this->immovablepictureModel = $this->model('Immovablepicture');
	}

	public function store()
	{
		// Validamos que sea una petición enviada por post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'user_id' => 'required'
			'area' => 'required',
			'name' => 'required',
			'price' => 'required',
			'foundation_date' => 'required'
		]);
		// Validamos si existe un error
		if( $errors )
		{
			// Mostramos el mensaje de error al usuario
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// creamos el slug del inmueble
		$slug = SlugTrait::slug( $_POST['name'] );
		// Creamos el array con los datos a pasar a la clase modelo
		$request = [
			'user_id' => $_POST['user_id'],
			'area' => $_POST['area'],
			'name' => $_POST['name'],
			'slug' => $slug,
			'price' => $_POST['price'],
			'contract_type' => $_POST['contract_type'],
			'antiquity' => $_POST['antiquity'],
			'stratum' => $_POST['stratum'],
			'state' => $_POST['state'],
			'tcm' => $_POST['tcm'],
			'description' => $_POST['description'],
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => NULL,
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
			// buscamos los datos del inmueble
			$immovable = mysqli_fetch_assoc( $this->immovableModel->find_by_slug( $slug ) );
			// recorremos el array de fotos
			foreach ($_POST['photos'] as $picture) 
			{
				// Creamos el array con los datos a pasar a la clase modelo
				$request = [
					'immovable_id' => $immovable['id'],
					'name' => $picture['name'],
					'created_at' => date("Y-m-d H:i:s"),
					'updated_at' => NULL,
				];
				// realizamos la petición
				$this->immovablepictureModel->store( $request );
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
			'user_id' => 'required'
			'social_reason' => 'required',
			'nit' => 'required',
			'logo' => 'required',
			'foundation_date' => 'required'
		]);
		// Validamos si existe un error
		if( $errors )
		{
			// Mostramos el mensaje de error al usuario
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// creamos el slug del inmueble
		$slug = SlugTrait::slug( $_POST['name'] );
		// Creamos el array con los datos a pasar a la clase modelo
		$request = [
			'id' => $_POST['id'],
			'user_id' => $_POST['user_id'],
			'area' => $_POST['area'],
			'name' => $_POST['name'],
			'slug' => $slug,
			'price' => $_POST['price'],
			'contract_type' => $_POST['contract_type'],
			'antiquity' => $_POST['antiquity'],
			'stratum' => $_POST['stratum'],
			'state' => $_POST['state'],
			'tcm' => $_POST['tcm'],
			'description' => $_POST['description'],
			'updated_at' => date("Y-m-d H:i:s")
		];
		// Realizamos la petición de registro
		$result = $this->immovableModel->update( $request );
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
			// buscamos las imagenes del inmueble
			$immovablepictures = $this->immovablepictureModel->find_by_immovable_id( $_post['id'] );
			// validamos si tiene imagenes almacenadas
			if( $immovablepictures->num_rows > 0 )
				// recorremos las fotos del inmueble
				foreach ($immovablepictures as $picture) 
				{
					// eliminamos la foto del inmueble
					$this->immovablepictureModel->delete( $picture['id'] );
					// eliminamos la foto del servidor
					unset( RUTA_PUBLIC."img/immovable".$slug."/".$picture['name'] );
				}

			// recorremos el array de fotos para agregarlos
			foreach ($_POST['photos'] as $picture) 
			{
				// Creamos el array con los datos a pasar a la clase modelo
				$request = [
					'immovable_id' => $_post['id'],
					'name' => $picture['name'],
					'created_at' => date("Y-m-d H:i:s"),
					'updated_at' => NULL,
				];
				// realizamos la petición
				$this->immovablepictureModel->store( $request );
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
		$result = $this->immovableModel->delete( $_POST['id'] );
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
			// buscamos las imagenes del inmueble
			$immovablepictures = $this->immovablepictureModel->find_by_immovable_id( $_post['id'] );
			// validamos si tiene imagenes almacenadas
			if( $immovablepictures->num_rows > 0 )
				// recorremos las fotos del inmueble
				foreach ($immovablepictures as $picture) 
				{
					// eliminamos la foto del inmueble
					$this->immovablepictureModel->delete( $picture['id'] );
					// eliminamos la foto del servidor
					unset( RUTA_PUBLIC."img/immovable".$slug."/".$picture['name'] );
				}
			// Mostramos el mensaje de éxito al usuario
			echo "true";
		}

	}

	// funcion para subir las fotos del inmueble
	public function uploadImage()
	{
		// importamos el trait para subir fotos
		require_once RUTA_APP."/Traits/UploadFileTrait.php";
		// creamos el nombre de la carpeta
		$folder = SlugTrait::slug( $_POST['immovable_name'] );
		// subimos la foto y obtenmos el resultado
		$res = UploadFileTrait::uploadImg( $_FILES['upload_photo'], "immovable/".$folder );
		// validamos si existe un error
		if( $res[0] == 'error' )
		{
			array_push( $this->errors, $res[1] );
			$this->errors();
		}
		else
		{
			echo "true";
		}
	}

}