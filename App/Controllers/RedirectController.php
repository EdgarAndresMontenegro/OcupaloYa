<?php

// clase para realizar la redirección de la plataforma 
class RedirectController extends Controller
{
	// función constructora de la clase
	public function __construct()
	{
		// creamos una instancia de la sesión
		$this->Auth();
	}

	// función para validar las redirecciones del usuario
	public function index()
	{	
		// validamos si existe una sesión de usuario
		if( $this->Auth()->check() )
		{
			// obtenemos el rol del usuario
			$role = $this->Auth()->user()->role();
			// validamos el tipo de rol
			switch ( $role ) {
				// validamos si es un administrador
				case 1:
					// redireccionamos a la vista del dashboard
					$this->redirect('Dashboard');
				break;
				// validamos si es un administrador
				case 4:
					// redireccionamos a la vista del dashboard
					$this->redirect('Owner');
				break;
				// por defecto decimos que es un cliente
				default:
					// redireccionamos a la vista principal de la página
					$this->redirect('Welcome');
				break;
			}
		}
		// en caso de que no exista la sesión
		else
		{
			// redireccionamos a iniciar sesión
			$this->redirect('Auth/Login');
		}
	}

}