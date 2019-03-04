    /**
     * Evento para mostrar la ventana de registro modal
     */
    $("#btnregistro").on("click", function (event) {
    	$("#registro").trigger('focus');
    });


    /**
     * Evento para ver u ocultar la pass
     */
    $('.verpass').on("click", function (event) {
    	if ($(this).hasClass("fas fa-eye-slash")) {
    		$(this).removeClass("fas fa-eye-slash").addClass("fas fa-eye");
    		$(this).parent().parent().prev('input').attr("type", "text");

    	} else {
    		$(this).removeClass("fas fa-eye").addClass("fas fa-eye-slash");
    		$(this).parent().parent().prev('input').attr("type", "password");

    	}
    });

    /**
     * Evento para sacar el pooper en el select
     */
    $('#instrumentos').on('focus', function () {
    	$("#instrumentos").popover({
    		title: 'Instrumentos',
    		content: "Seleciona todos los intrumentos que sepas usar",
    		trigger: "manual"
    	});
    })

    /**
     * AJAX para modal, envio por ajax
     */
    $("#formregistro").on('submit', function (event) {
    	event.preventDefault();
    	$('#btnmodal').attr('disabled', 'disabled');
    	$.post(baseurl + "usuarios_c/registrarUsuario", $("#formregistro").serialize()).done(function (salida) {
    		if (salida == 'true') {
    			if ($('#feedback').hasClass()) {
    				$('#feedback').removeClass();
    				$('#feedback').addClass('alert alert-success').text(
    					"Registro completado.")
    			} else {
    				$('#feedback').addClass('alert alert-success').text(
    					"Registro completado.")
    			}
    			//Para vaciar el formulario el caso de que el registro se complete
    			$('.close').click();
    			$('#formregistro input').val("");
    		} else {
    			if ($('#feedback').hasClass()) {
    				$('#feedback').removeClass();
    				$('#feedback').addClass('alert alert-warning').text(
    					"Registro no realizado.");
    			} else {
    				$('#feedback').addClass('alert alert-warning').text(
    					"Registro no realizado.");

    			}

    		}
    		$('#btnmodal').removeAttr('disabled');
    		$('#feedback').removeAttr('hidden');

    	});

    });


    /**
     * Para quitar el popper cuando se cierre la pagina
     */
    $('.close').on("click", function (event) {
    	$("#nombre_usum").popover("hide");

    })

    /**
     * Comprobar que existe ese usuario
     */
    $('#nombre_usum').on("blur", function (event) {


    	$.get(baseurl + "usuarios_c/comprobarExiste/", {
    		usuario: $('#nombre_usum').val()
    	}).done(function (salida) {
    		if (salida >= 1) {
    			$("#nombre_usum").popover({
    				title: 'Usuario no valido',
    				content: "Este usuario ya existe",
    				trigger: "manual"
    			}).popover("show");
    			$('#btnmodal').attr('disabled', true);
    		} else {
    			$("#nombre_usum").popover("hide");
    			$('#btnmodal').removeAttr('disabled');
    		}
    	})
    })
