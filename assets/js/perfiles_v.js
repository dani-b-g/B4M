/**
 * Evento para ver u ocultar la pass
 */
$('.verpass').on("click", function (event) {
	if ($(this).hasClass("fas fa-eye-slash")) {
		$(this).removeClass("fas fa-eye-slash").addClass("fas fa-eye");
		$(this).parent().parent().prev("input").attr("type", "text");

	} else {
		$(this).removeClass("fas fa-eye").addClass("fas fa-eye-slash");
		$(this).parent().parent().prev("input").attr("type", "password");

	}
});
/**
 * Comprobar que existe esa contraseña
 */
$('#lastPass').on("blur", function (event) {
	$.post(baseurl + "usuarios_c/comprobarPass/", {
		usuario: $(".enviar").attr("id"),
		pass: $("#lastPass").val()
	}).done(function (salida) {
		if (salida == "false") {
			$("#lastPass").popover({
				title: 'La contraseña no es valida',
				content: "Esa no es la contraseña antigua",
				trigger: "manual"
			}).popover("show");
			$('.enviar').attr('disabled', true);
		} else {
			$("#lastPass").popover("hide");
			$('.enviar').removeAttr('disabled');
		}
	})
})
