$(function () {
	/**
	 * Evento que muestra la ventana emergente en en 
	 * apartado de busqueda del header
	 * 
	 */
	$("#busqueda").popover({
		title: 'Usa este campo para buscar a tus musicos',
		content: "Busca por nombre de tu ciudad, intrumentos, email, nombres o por correo electronico",
		trigger: 'focus'
	});
	/**
	 * Evento que cuenta los mensajes no 
	 * leidos al iniciar la pantalla
	 * 
	 */
	$.post(baseurl + "mensajes_c/contnoleidos/").done(function (salida) {
		$('#notificacion').text(salida);
	});

})
