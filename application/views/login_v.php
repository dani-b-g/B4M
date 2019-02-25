<?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    redirect(base_url("usuarios_c/perfil/" . $_SESSION['usuario']));
} ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div id="feedback" class="alert alert-success" hidden></div>
            <?php if (isset($_SESSION['flashdata']) && !isset($_SESSION['login'])): ?>
            <div class=" alert alert-danger" role="alert ">
                <?php echo $_SESSION['flashdata'];
                unset($_SESSION['flashdata']); ?>
            </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['flashdata']) && $_SESSION['login'] == true): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['flashdata'];
                unset($_SESSION['flashdata']); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Login</h5>
            <div class="card-text">
                <form method='post' action="<?php echo base_url('usuarios_c/login') ?>">
                    <div class="form-group">
                        <label for="nombre_usu">Usuario</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="nombre_usu" id="nombre_usu" aria-describedby="emailHelp" maxlength="15" placeholder="Nombre de usuario" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass_usu">Contraseña</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fas fa-unlock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="pass_usu" id="pass_usu" placeholder="Contraseña" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id=""><i class="fas fa-eye-slash verpass"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-switch">
                        <input id="recordar" name="recordar" class="custom-control-input" type="checkbox">
                        <label for="recordar" class="custom-control-label">Recuardame</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                    <button class="btn btn-secondary" id="btnregistro" data-toggle="modal" data-target="#registro" type="button">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="registro" role="dialog" aria-labelledby="registro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registro">Registrarse</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- A partir de aqui es el formulario de registro (modal) -->
                <div class="modal-body">
                    <form method="post" id='formregistro' action="">
                        <div class="form-group">
                            <label for="nombre_usum">Usuario</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input id="nombre_usum" name="nombre_usu" placeholder="Nombre de usuario" class="form-control" type="text" required maxlength="15" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email_usu">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-email"><i class="fas fa-at"></i></i></span></div>
                                <input id="email_usu" placeholder="E-Mail" name="email_usu" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" type="email" placeholder="usuario@dominio.com" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass_usum">Contraseña</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><i class="fas fa-unlock"></i></span>
                                </div>
                                <input type="password" class="form-control" name="pass_usu" id="pass_usum" placeholder="Contraseña" required>
                                <div class="input-group-append">
                                    <span class="input-group-text " id=""><i id="" class="fas fa-eye-slash verpass"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-1">Tipo de usuario</div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="musico" name="tipo_usu" value="m" class="custom-control-input" required>
                            <label class="custom-control-label" for="musico">Músico</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="grupo" name="tipo_usu" value="g" class="custom-control-input" required>
                            <label class="custom-control-label" for="grupo">Grupo</label>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="apenom_usu">Nombre completo</label>
                            <input id="apenom_usu" name="apenom_usu" class="form-control" type="text" maxlength="125" placeholder="Nombre y apellidos" required>
                        </div>
                        <div class="form-group">
                            <label for="ciudad_usu">Ciudad</label>
                            <input id="ciudad_usu" name="ciudad_usu" placeholder="Ciudad" maxlength="15" class="form-control" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="estilo_usu">Estilo músical</label>
                            <input id="estilo_usu" name="estilo_usu" placeholder="Estilo músical" maxlength="25" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="instrumentos">Instrumentos</label>
                            <select id="instrumentos" name="instrumentos[]" class="form-control selectpicker" required multiple>
                                <?php foreach ($instrumentos as $value): ?>
                                <option value="<?php echo $value['id_ins'] ?>">
                                    <?php echo $value['nombre_ins'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="md-form amber-textarea active-amber-textarea-2">
                            <label class="" for="desc_usu">Descripcion</label>
                            <textarea type="text" id="desc_usu" name="desc_usu" class="md-textarea form-control" rows="5"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class=" btn btn-success" id="btnmodal" type="submit">Enviar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    /**
     * Evento para mostrar la ventana de registro modal
     */
    $("#btnregistro").on("click", function(event) {
        $("#registro").trigger('focus');
    });


    /**
     * Evento para ver u ocultar la pass
     */
    $('.verpass').on("click", function(event) {
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
    $('#instrumentos').on('focus', function() {
        $("#instrumentos").popover({
            title: 'Instrumentos',
            content: "Seleciona todos los intrumentos que sepas usar",
            trigger: "manual"
        });
    })

    /**
     * AJAX para modal, envio por ajax
     */
    $("#formregistro").on('submit', function(event) {
        event.preventDefault();
        $('#btnmodal').attr('disabled', 'disabled');
        $.post(baseurl + "usuarios_c/registrarUsuario", $("#formregistro").serialize()).done(function(salida) {
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
    $('.close').on("click", function(event) {
        $("#nombre_usum").popover("hide");

    })

    /**
     * Comprobar que existe ese usuario
     */
    $('#nombre_usum').on("blur", function(event) {


        $.get(baseurl + "usuarios_c/comprobarExiste/" + $('#nombre_usum').val()).done(function(salida) {
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
</script> 