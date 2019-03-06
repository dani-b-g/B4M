/**
 * Para obtener los datos del mensaje que hacemos click en el modal
 */
$('.mensajes').on('click', function (event) {
	idmen = $(this).attr('data-mensaje-type');
	$('#last_men').text("");
	$.post(baseurl + "mensajes_c/contMens/", {
		id_men: idmen
	}).done(function (salida) {
		salida = JSON.parse(salida);
		$('#tituloMensaje').text(salida[0].titulo_men);
		$('#cuerpoMen').text(salida[0].cuerpo_men);
		$('#fechaMen').text(salida[0].fecha_men);
		$('#des_men').val(salida[0].rem_men);
		$('#remitenteMen').text($('#remMen').attr("data-rem-type"));
		$('#modalMensaje').modal();

	});
	rem = $(this).attr('id');
	des = $(this).attr('data-des-type');

	$.post(baseurl + "mensajes_c/getRespuesta/", {
		rem_men: rem,
		des_men: des
	}).done(function (salida) {
		salida = JSON.parse(salida);
		$('#last_men').text(salida.cuerpo_men);

	});
	/**
	 * Para marcar el mensaje como leido
	 */
	$.post(baseurl + "mensajes_c/setleido/", {
		id_men: idmen
	}).done(function (salida) {
		if (salida == "1") {
			$("li[data-mensaje-type='" + idmen + "']")
				.find('span').find('i').removeClass().addClass('fas fa-envelope-open');
		}
	});
})
