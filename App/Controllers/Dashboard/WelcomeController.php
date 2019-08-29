<?php

require_once RUTA_APP."/Traits/ConvertTrait.php";

// función que carga la vista principal del dashboard 
class WelcomeController extends Controller
{

	// función constructora de la clase
	public function __construct()
	{
		// validamos que solo puedan ingresar usuarios administradores
		$this->Auth()->role_diff( 1 );
	}


	// función para mostrar la vista
	public function index()
	{	
		// mostramos la vista
		$this->view('Dashboard/Welcome/welcome');
	}

}