<?php 


////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                                                                                    //
// Para usar este trait se importa de igual manera que cualquier otro trait                           //
// ejemplo su uso:                                                                                    //
// require_once RUTA_APP."/Traits/ChagescoretostarsTrait.php";                                        //
// $slug = ChagescoretostarsTrait::chage_score_to_stars( $text )                                      //
//                                                                                                    //
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////

class ChagescoretostarsTrait
{
	// funcion para convertir un texto en un slug
	public static function chage_score_to_stars( $score )
	{
		// validamos el valor y le asignamos las estrellas correspondientes
		switch ( $score ) {
			case '0':
			return '<div title="Calificación: 0"><i class="far fa-star amber-text"></i><i class="far fa-star amber-text"></i><i class="far fa-star amber-text"></i><i class="far fa-star amber-text"></i><i class="far fa-star amber-text"></i></div>';
			break;
			case '1':
			return '<div title="Calificación: 1"><i class="fa fa-star amber-text"></i><i class="far fa-star amber-text"></i><i class="far fa-star amber-text"></i><i class="far fa-star amber-text"></i><i class="far fa-star amber-text"></i></div>';
			break;
			case '2':
			return '<div title="Calificación: 2"><i class="fa fa-star amber-text"></i><i class="fa fa-star amber-text"></i><i class="far fa-star amber-text"></i><i class="far fa-star amber-text"></i><i class="far fa-star amber-text"></i></div>';
			break;
			case '3':
			return '<div title="Calificación: 3"><i class="fa fa-star amber-text"></i><i class="fa fa-star amber-text"></i><i class="fa fa-star amber-text"></i><i class="far fa-star amber-text"></i><i class="far fa-star amber-text"></i></div>';
			break;
			case '4':
			return '<div title="Calificación: 4"><i class="fa fa-star amber-text"></i><i class="fa fa-star amber-text"></i><i class="fa fa-star amber-text"></i><i class="fa fa-star amber-text"></i><i class="far fa-star amber-text"></i></div>';
			break;
			default:
			return '<div title="Calificación: 5"><i class="fa fa-star amber-text"></i><i class="fa fa-star amber-text"></i><i class="fa fa-star amber-text"></i><i class="fa fa-star amber-text"></i><i class="fa fa-star amber-text"></i></div>';
			break;
		}
	}
}