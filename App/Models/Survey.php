<?php 

class Survey extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "survey";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ "id_encuesta", "name", "lastname", "age", "city", "immovable_kind", "stratum", "pets", "enviroment", "smooke", "budget" ];
		// variable que contiene los campos que no queremos dejar ver
		$this->hidden = [];
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

	public function find_by_id_encuest( $id_encuesta )
	{
		return parent::customer( " SELECT ". $this->selectInputs() ." FROM ". $this->table ." WHERE id_encuesta = '".$id_encuesta."' " );
	}
}