<?php 


class Ally extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "allies";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ "user_id", "social_reason", "slug", "nit", "logo", "website", "description", "foundation_date", "created_at", "updated_at" ];
		// variable que contiene los campos que no queremos dejar ver
		$this->hidden = [ "" ];
	}

	// función para guardar un usuario
	public function all( $input = "social_reason", $order = "desc" )
	{
		return parent::all( $input, $order );
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

	// función para guardar un usuario
	public function find( $id )
	{
		return parent::find( $id );
	}

	// función para buscar un usuario por el slug
	public function find_by_slug( $slug )
	{
		return parent::customer( " SELECT ". $this->selectInputs() ." FROM ". $this->table ." WHERE slug = '".$slug."' " );
	}

	// función para guardar un usuario
	public function delete( $id )
	{
		return parent::delete( $id );
	}

	// función para mostrar la vista con el listado inicial
	public function listing( $pagina = 1, $input_whr = "social_reason", $value_whr = null )
	{
		// código de la consulta de ser necesario (SE AGREGA DESPUES DE $value_whr)
		// $sql = 'SELECT * FROM users WHERE created_at LIKE "%'.$value_whr.'%" ';
		// ejecutamos la consulta
		return parent::pagination( $pagina, $value_whr, $input_whr );
	}
}