// variable que contiene el mapa
var map;
// funcion para iniciarlizar el mapa
// num_div: parametro por si hay varias funciones que lo requieran, entonces para diferenciarles
function initialize( num_div ) 
{
	// validamos si se puede usar geolocalización
	if (navigator.geolocation)
	{
		// obtenemos la posicion actual del usuario
		navigator.geolocation.getCurrentPosition(function(position){ 
			// obtenemos las coordemanads
			var latitude = position.coords.latitude;
			var longitude = position.coords.longitude;
			// las mostramos en un mapa
			map = new google.maps.Map(document.getElementById('map-canvas'), {
				zoom: 16,
				center: {lat: latitude, lng: longitude}
			});
			// creamos un markerpara indicar donde esta
			var marker=new google.maps.Marker({
				position:map.getCenter(), 
				map:map, 
				draggable:true
			});
			// le agregamos el evento de poder mover el marker
			google.maps.event.addListener(marker,'dragend',function(event) {
				// convertimos la posicion en string
				var position = this.getPosition().toString();
				// explomaos la posicion
				var coords = position.split('(');
				// obtenemos las coordenadas
				coords = coords[1].split(',');
				// seleccionamos la latitud
				latitude = coords[0];
				// obtenemos las coordenadas
				coords = coords[1].split(')');
				// seleccionamos la longuitud
				longitude = coords[0];
				// agregamos el valor en los inputs correspondientes
				$("#lat"+num_div).val(latitude);
				$("#lon"+num_div).val(longitude);
			});
			// agregamos el valor en los inputs correspondientes
			$("#lat"+num_div).val(latitude);
			$("#lon"+num_div).val(longitude);
		});
	}
	else
	{
		// mostramos mensaje de error
		alert("¡Error! El navegador no soporta la Geolocalización.");
	}
}

// obtenemos el evento click cuando quieran seleccionar la ubicación
$(".btn-geolocation").click(function(event) {
	// obtenemos el data 'num-div' por si hay varias funciones que lo requieran, entonces para diferenciarles
	var num_div = $(this).data('num-div');
	// iniciamos la función de selección sobre el mapa
	initialize( num_div );
	// mostramos la card del mapa
	$(".modalgeolocation").fadeIn('show');
	// evitamos que envie el href
	return;
});

// funcion para ocultar la card del mapa
$(".close-modalgeolocation").click(function(event) {
	// ocultamos la card del mapa
	$(".modalgeolocation").fadeOut('slow');
	// evitamos que envie el href
	return;
});

// funcion para ocultar la card del mapa
$(".button-geolocation").click(function(){
	// ocultamos la card del mapa
	$(".modal-geolocation").css('display', 'none');
});