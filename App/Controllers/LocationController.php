<?php

class LocationController extends Controller
{
	public function __construct()
	{
		// instanciamos el modelo de roles
		$this->countryModel = $this->model('Country');
		// instanciamos el modelo de roles
		$this->stateModel = $this->model('State');
		// instanciamos el modelo de roles
		$this->cityModel = $this->model('City');
	}

	public function index()
	{	
		$this->redirect('Auth/Login');
	}

	// función para buscar los departamentos de un país
	public function find_countries()
	{
		// buscamos los estados por id del país
		$countries = $this->countryModel->all();
		// variable que contendrá el listado de los departamentos
		$option = '<option>-- Seleccione un país --</option>';
		// recorremos todos los registros
		foreach ($countries as $country) 
		{
			$option .= '<option value="'.$country['id'].'">'.ucfirst( strtolower( $country['name'] ) ).'</option>';
		}
		// imprimimos el listado
		echo "true|".$option;
	}

	// función para buscar los departamentos de un país
	public function find_state_by_country_id()
	{
		// buscamos los estados por id del país
		$states = $this->stateModel->find_country_id( $_POST['country_id'] );
		// variable que contendrá el listado de los departamentos
		$option = '<option>-- Seleccione un departamento/estado --</option>';
		// recorremos todos los registros
		foreach ($states as $state) 
		{
			$option .= '<option value="'.$state['id'].'">'.ucfirst( strtolower( $state['name'] ) ).'</option>';
		}
		// imprimimos el listado
		echo "true|".$option;
	}

	// función para buscar los departamentos de un país
	public function find_city_by_state_id()
	{
		// buscamos los estados por id del país
		$cities = $this->cityModel->find_state_id( $_POST['state_id'] );
		// variable que contendrá el listado de los departamentos
		$option = '<option>-- Seleccione una ciudad --</option>';
		// recorremos todos los registros
		foreach ($cities as $city) 
		{
			$option .= '<option value="'.$city['id'].'">'.ucfirst( strtolower( $city['name'] ) ).'</option>';
		}
		// imprimimos el listado
		echo "true|".$option;
	}

}