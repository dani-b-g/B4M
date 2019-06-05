$('.borrarAviso').on('click', function (event) {
	let id=$(this).attr('id');
	$('#confirmacion').modal('show');
	$("#confBorrado").attr('data-id',id);
})
$('#confBorrado').on('click',function (event) {	
	let id=$(this).attr("data-id");
	$.post(baseurl + 'avisos_c/eliminar/', {
		id_an: id
	}).done(function (salida) {
		if (salida == "true") {
			// equivale a $(this).parents().eq(3);
			$('#'+id).parents().eq(3).remove();
		} else {
			console.log('No se a podido borrar el aviso');
				
		}
	})
})
