<?php 


class User extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "users";
		// state values:
		//// 1: activo
		//// 2: inactivo
		// block values:
		//// 1: no bloqueado
		//// 2: bloqueado
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ "rol_id", "name", "username", "password", "slug", "icon", "state", "block", "balance", "created_at", "updated_at" ];
		// variable que contiene los campos que no queremos dejar ver
		$this->hidden = [ "password" ];
	}

	// función para obtener el id del usuario
	public function id()
	{
		return $this->findUser()['id'];
	}

	// función para obtener el nombre del usuario
	public function role()
	{
		return $this->findUser()['rol_id'];
	}

	// función para obtener el nombre del usuario
	public function name()
	{
		return $this->findUser()['name'];
	}

	// función para obtener el username del usuario
	public function username()
	{
		return $this->findUser()['username'];
	}

	// función para obtener el slug del usuario
	public function slug()
	{
		return $this->findUser()['slug'];
	}

	// función para obtener el icon del usuario
	public function icon()
	{
		return $this->findUser()['icon'];
	}

	// función para obtener el state del usuario
	public function state()
	{
		return $this->findUser()['state'];
	}

	// función para obtener el block del usuario
	public function block()
	{
		return $this->findUser()['block'];
	}

	// función para obtener el balance del usuario
	public function balance()
	{
		return $this->findUser()['balance'];
	}

	// función para buscar los datos del usuario con ayuda de los datos de sesión
	private function findUser()
	{
		return mysqli_fetch_assoc( parent::find( $_SESSION['id'] ) );
	}

	// función para listar todos los usuarios
	public function all( $input = "name", $order = "desc" )
	{
		return parent::store( $input, $order );
	}

	// función para guardar un usuario
	public function store( $request )
	{
		return parent::store( $request );
	}

	// función para actualizar un usuario
	public function update( $request )
	{
		return parent::update( $request );
	}

	// función para buscar un usuario
	public function find( $id )
	{
		return parent::find( $id );
	}

	// función para buscar un usuario por el slug
	public function find_by_slug( $slug )
	{
		return parent::customer( " SELECT ". $this->selectInputs() ." FROM ". $this->table ." WHERE slug = '".$slug."' " );
	}

	// función para buscar un usuario por el slug
	public function find_ally_by_name( $name )
	{
		return parent::customer( " SELECT ". $this->selectInputs() ." FROM ". $this->table ." WHERE name LIKE '%".$name."%' and rol_id = '3' " );
	}

	// función para elimiar un usuario
	public function delete( $id )
	{
		return parent::delete( $id );
	}

	// función para mostrar la vista con el listado inicial
	public function listing( $pagina = 1, $input_whr = "name", $value_whr = null )
	{
		// código de la consulta de ser necesario (SE AGREGA DESPUES DE $value_whr)
		$sql = 'SELECT t1.*, t2.telephone, t3.name as role, t6.prefix, t6.icon as country_icon FROM users as t1 INNER JOIN user_data as t2 ON t2.user_id = t1.id INNER JOIN roles t3 ON t1.rol_id = t3.id INNER JOIN cities t4 ON t2.city_id = t4.id INNER JOIN states t5 ON t4.state_id = t5.id INNER JOIN countries t6 ON t5.country_id = t6.id WHERE t1.name LIKE "%'.$value_whr.'%" and t1.id != "'.$_SESSION['id'].'" and t3.id != "3" and t3.id != "4" ';
		// ejecutamos la consulta
		return parent::pagination( $pagina, $value_whr, $input_whr, $sql );
	}

	// función para mostrar la vista con el listado inicial
	public function listing_owner( $pagina = 1, $input_whr = "name", $value_whr = null )
	{
		// código de la consulta de ser necesario (SE AGREGA DESPUES DE $value_whr)
		$sql = 'SELECT t1.*, t2.telephone, t3.name as role, t6.prefix, t6.icon as country_icon FROM users as t1 INNER JOIN user_data as t2 ON t2.user_id = t1.id INNER JOIN roles t3 ON t1.rol_id = t3.id INNER JOIN cities t4 ON t2.city_id = t4.id INNER JOIN states t5 ON t4.state_id = t5.id INNER JOIN countries t6 ON t5.country_id = t6.id WHERE t1.name LIKE "%'.$value_whr.'%" and t3.id = "4" ';
		// ejecutamos la consulta
		return parent::pagination( $pagina, $value_whr, $input_whr, $sql );
	}
}