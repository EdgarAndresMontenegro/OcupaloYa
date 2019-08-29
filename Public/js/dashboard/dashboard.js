$(document).ready(function() {
	

	// función para mostrar/ocultar las cards flotantes con opciones
	$(".icon-header p").on('click', function() {
		// obtenemos el elemento que le pertenece al icono clickeado
		var card = $(this).siblings(".card-options");
		// obtenemos el estado de la card
		var state = card.data('state');
		// validamos si el estado es cerrado o indefinido
		if( state == "closed" || state == undefined)
		{
			// capturamos el ancho del navegador
			var ww = $(window).width();
			// validamos que el ancho del navegador sea menor a 768 para ocultar el menu
			if(ww < 768)
				// ocultarmos el menu principal
				$(".header-navbar-primary").slideUp("slow");
			// ocultamos todas las cards del usuario
			$(".card-options").slideUp('slow');
			// cambiamos el estado a cerrado a cerrada
			$(".card-options").data('state', 'closed');
			// mostramos la card seleccionada
			card.slideDown('slow');
			// cambiamos el estado de la card a abierta
			card.data('state', 'open');
		}
		else
		{
			// ocultamos la card seleccionada
			card.slideUp('slow');
			// cambiamos el estado de la card a cerrada
			card.data('state', 'closed');
		}
		return false;
	});

	$(".icon-bars").on('click', function() {
		// ocultamos todas las cards del usuario
		$(".card-options").slideUp('slow');
		// cambiamos el estado a cerrado a cerrada
		$(".card-options").data('state', 'closed');
		// mostramos/ocultamos el menu principal
		$(".header-navbar-primary").slideToggle("slow");
		return false;
	});

});