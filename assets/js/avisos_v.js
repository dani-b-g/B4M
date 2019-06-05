$('.borrarAviso').on('click', function (event) {
	let that = $(this);
	$.post(baseurl + 'avisos_c/eliminar/', {
		id_an: $(this).attr("id")
	}).done(function (salida) {
		if (salida == "true") {
			// equivale a $(this).parents().eq(3);
			$(that).parents().eq(3).remove();
		} else {
			console.log('No se a podido borrar el aviso');

		}
	})
})
