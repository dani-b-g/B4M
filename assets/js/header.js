$(function () {
	$("#busqueda").popover({
		title: 'Usa este campo para buscar a tus musicos',
		content: "Busca por nombre de tu ciudad, intrumentos, email, nombres o por correo electronico",
		trigger: 'click'
	});
	$.post(baseurl + "mensajes_c/contnoleidos/").done(function (salida) {
		$('#notificacion').text(salida);
	});

})
