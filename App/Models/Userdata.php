<?php 


class Userdata extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "user_data";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ "user_id", "city_id", "document_type", "document_number", "sex", "telephone", "address", "birth_date", "created_at", "updated_at" ];
		// variable que contiene los campos que no queremos dejar ver
		$this->hidden = [ "" ];
	}

	// función para guardar los datos de un usuario
	public function store( $request )
	{
		return parent::store( $request );
	}

	// función para actualizar los datos de un usuario
	public function update( $request )
	{
		return parent::update( $request );
	}

	// función para buscar los datos de usuario
	public function find( $id )
	{
		return parent::find( $id );
	}

	// función para buscar los datos de un usuario por el id
	public function find_by_user_id( $user_id )
	{
		return parent::customer( " SELECT ". $this->selectInputs() ." FROM ". $this->table ." WHERE user_id = '".$user_id."' " );
	}

	// función para eliminar los datos de un usuario
	public function delete( $id )
	{
		return parent::delete( $id );
	}
}