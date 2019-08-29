$(document).ready(function() {
	$(".dropdown-toggle").click(function(){
		var id = $(this).attr('id');
		$("#"+id+"-dropdown").slideToggle();
	});

	$(".navbar-toggler").click(function(){
		$(".navbar-collapse").slideToggle();
	});

	$(".link-ingresar").click(function(){
		$("#register_panel").removeClass("active").removeClass("show");
		$("#login_panel").addClass("active").addClass("show");
		$("#tab_register").removeClass("active");
		$("#tab_login").addClass("active");
	});

	$(".link-register").click(function(){
		$("#register_panel").addClass("active").addClass("show");
		$("#login_panel").removeClass("active").removeClass("show");
		$("#tab_login").removeClass("active");
		$("#tab_register").addClass("active");
	});
});