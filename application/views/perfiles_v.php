<?php if (!isset($_SESSION['login'])) {
    $_SESSION['flashdata'] = "No tienes acceso a esta pagina si no estas registrado";
    redirect(base_url("login_c/"));
} ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header row">
                    <div class="media">
                        <div>
                            <img id="avatar" src="<?php echo base_url() ?>assets/img/usuario.jpg"
                                class="rounded-circle z-depth-0" alt="avatar image">
                            <div class="media-body">
                                <h5 class="mt-0">
                                    <?php echo $perfil[0]['nombre_usu'] ?>
                                </h5>
                                <?php echo $perfil[0]['desc_usu'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-secondary" type="button">Enviar un mensaje</button>
                <?php if ($_SESSION['usuario'] == $perfil[0]['nombre_usu']): ?>
                <button class="btn btn-primary" id="modalActivate" type="button" data-toggle="modal"
                    data-target="#modalPerfil" type="button">Modificar perfil</button>
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title">Datos</h5>
                    <div style="font-size: 1.5em" class="card-text">
                        <div class="row">
                            <div class="col">
                                <span class="badge m-1 text-center badge-pill badge-secondary">
                                    Nombre y apellidos:
                                </span>
                                <span>
                                    <?php echo $perfil[0]['apenom_usu'] ?>
                                </span>
                            </div>
                            <div class="col">
                                <span class="badge m-1 text-center badge-pill badge-secondary">
                                    Email de usuario:
                                </span>
                                <span>
                                    <?php echo $perfil[0]['email_usu'] ?>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <span class="badge m-1 text-center badge-pill badge-secondary">
                                    Ciudad:
                                </span>
                                <span>
                                    <?php echo $perfil[0]['ciudad_usu'] ?>
                                </span>
                            </div>
                            <div class="col">
                                <span class="badge m-1 text-center badge-pill badge-secondary">
                                    Tipo de usuario:
                                </span>
                                <?php if ($perfil[0]['tipo_usu'] == "b" || $perfil[0]['tipo_usu'] == "m"): ?>
                                <?php if ($perfil[0]['tipo_usu'] == "b"): ?>
                                <span>Banda</span>
                                <?php else: ?>
                                <span>Musico</span>
                                <?php endif; ?>
                                <?php else: ?>
                                <span>Administrador</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col">
                                <span class="badge m-1 text-center badge-pill badge-secondary">
                                    Estilo:
                                </span>
                                <span>
                                    <?php echo $perfil[0]['estilo_usu'] ?>
                                </span>
                            </div>
                            <div class="col">
                                <span class="badge m-1 text-center badge-pill badge-secondary">
                                    Instrumentos:
                                </span>
                                <div class="">
                                    <ul>
                                        <?php foreach ($perfil as $key => $value): ?>
                                        <li>
                                            <?php echo $perfil[$key]["nombre_ins"]; ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TODO: ENVIAR CAMBIOS DE PERFIL -->
    <!-- Modal -->
    <div class="modal fade right" id="modalPerfil" tabindex="-1" role="dialog" aria-labelledby="modalPerfil"
        aria-hidden="true">
        <div class="modal-dialog modal-full-height modal-right" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPerfilHeader">Cambiar perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id=formCambio action="">
                        <div class="form-group">
                            <label for="nombre_usum">Usuario</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input id="nombre_usum" name="nombre_usu" value="<?php   ?>"
                                    placeholder="Nombre de usuario" class="form-control" type="text" required
                                    maxlength="15" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email_usu">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="fas fa-email"><i class="fas fa-at"></i></i></span></div>
                                <input id="email_usu" placeholder="E-Mail" name="email_usu"
                                    pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" type="email"
                                    placeholder="usuario@dominio.com" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastPass">Contraseña antigua</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text " id=""><i class="fas fa-unlock"></i></span>
                                </div>
                                <input type="password" class="form-control" name="lastPass" id="lastPass"
                                    placeholder="Contraseña" required>
                                <div class="input-group-append">
                                    <span class="input-group-text " id=""><i id=""
                                            class="fas fa-eye-slash verpass"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass_usu">Nueva contraseña</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><i class="fas fa-unlock"></i></span>
                                </div>
                                <input type="password" class="form-control" name="pass_usu" id="pass_usum"
                                    placeholder="Contraseña" required>
                                <div class="input-group-append">
                                    <span class="input-group-text " id=""><i id=""
                                            class="fas fa-eye-slash verpass"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-1">Tipo de usuario</div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="musico" name="tipo_usu" value="m" class="custom-control-input"
                                required>
                            <label class="custom-control-label" for="musico">Músico</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="grupo" name="tipo_usu" value="g" class="custom-control-input"
                                required>
                            <label class="custom-control-label" for="grupo">Grupo</label>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="apenom_usu">Nombre completo</label>
                            <input id="apenom_usu" name="apenom_usu" class="form-control" type="text" maxlength="125"
                                placeholder="Nombre y apellidos" required>
                        </div>
                        <div class="form-group">
                            <label for="ciudad_usu">Ciudad</label>
                            <input id="ciudad_usu" name="ciudad_usu" placeholder="Ciudad" maxlength="15"
                                class="form-control" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="estilo_usu">Estilo músical</label>
                            <input id="estilo_usu" name="estilo_usu" placeholder="Estilo músical" maxlength="25"
                                class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="instrumentos">Instrumentos</label>
                            <select id="instrumentos" name="instrumentos[]" class="form-control selectpicker" required
                                multiple>
                                <?php foreach ($instrumentos as $value): ?>
                                <option value="<?php echo $value['id_ins'] ?>">
                                    <?php echo $value['nombre_ins'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="<?php $perfil[0]['id_usu'] ?>" class="btn btn-primary">Guardar
                        cambios</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
</div>
<script>
// TODO: Hacer validaciones de contraseñas, para revisar si es la de ese usuario con ajax
// TODO: Que se muestren los instrumentos y los seleccionados por el usuario
// NOTE: Tienes la id del usuario ne el boton de enviar
/**
 * Evento para ver u ocultar la pass
 */
$('.verpass').on("click", function(event) {
    if ($(this).hasClass("fas fa-eye-slash")) {
        $(this).removeClass("fas fa-eye-slash").addClass("fas fa-eye");
        $(this).parent().parent().prev("input").attr("type", "text");

    } else {
        $(this).removeClass("fas fa-eye").addClass("fas fa-eye-slash");
        $(this).parent().parent().prev("input").attr("type", "password");

    }
});
</script>