<?php if (!isset($_SESSION['login'])) {
    $_SESSION['flashdata'] = "No tienes acceso a esta pagina si no estas registrado";
    redirect(base_url("login_c/"));
} ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <?php if (isset($_SESSION['flashdata'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['flashdata'];
                    unset($_SESSION['flashdata']); ?>
            </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header row">
                    <div class="media">
                        <div>
                            <?php if ($perfil[0]['img_usu'] == "") : ?>
                            <img id="avatar" src="<?php echo base_url('assets/img/usuario.jpg') ?>"
                                class="rounded-circle z-depth-0" alt="avatar image">
                            <?php else : ?>
                            <img id="avatar" src="<?php echo base_url($perfil[0]['img_usu']) ?>"
                                class="rounded-circle z-depth-0" alt="avatar image">
                            <?php endif; ?>
                            <div class="media-body">
                                <h5 class="mt-0">
                                    <?php echo $perfil[0]['nombre_usu'] ?>
                                </h5>
                                <?php if (isset($perfil[0]['desc_usu'])) {
                                    echo $perfil[0]['desc_usu'];
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($_SESSION["id_login"] != $perfil[0]['id_usu']) : ?>
                <button class="btn btn-secondary" data-toggle="modal" data-target="#modalMensaje" id="formMensaje"
                    type="button"><span>
                        <i class="fas fa-paper-plane"></i>
                    </span>Enviar un mensaje</button>
                <?php endif; ?>
                <?php if ($_SESSION["id_login"] == $perfil[0]['id_usu']) : ?>
                <button class="btn btn-primary" id="modalActivate" type="button" data-toggle="modal"
                    data-target="#modalPerfil" type="button"><span>
                        <i class="fas fa-cogs"></i>
                    </span>Modificar perfil</button>
                <button class="btn btn-default" id="modal" type="button" data-toggle="modal" data-target="#modalIMG"
                    type="button"><span>
                        <i class="fas fa-image"></i>
                    </span>Modificar imagen</button>
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
                                <?php if ($perfil[0]['tipo_usu'] == "b" || $perfil[0]['tipo_usu'] == "m") : ?>
                                <?php if ($perfil[0]['tipo_usu'] == "b") : ?>
                                <span>Banda</span>
                                <?php else : ?>
                                <span>Musico</span>
                                <?php endif; ?>
                                <?php else : ?>
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
                                        <?php foreach ($perfil as $key => $value) : ?>
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
</div>
<!-- Modal Mensaje -->
<div class="modal fade" tabindex="-1" id="modalMensaje" role="dialog" aria-labelledby="formMensaje" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formMensaje">Mensaje</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('/mensajes_c/enviarMen/') ?>">
                    <div class="form-group">
                        <label for="nombre_destino">Usuario destinatario:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input class="form-control" id="nombre_destino" type="text" placeholder="Usuario"
                                aria-label="Usuario" aria-describedby="Usuario"
                                value="<?php echo $perfil[0]['nombre_usu'] ?>" disabled>
                        </div>
                    </div>
                    <!-- Hidden -->
                    <input id="rem_men" name="rem_men" type="hidden" value="<?php echo $_SESSION['id_login'] ?>">
                    <input id="des_men" name="des_men" type="hidden" value="<?php echo $perfil[0]['id_usu'] ?>">
                    <!-- end Hidden -->
                    <div class="form-group">
                        <label for="titulo_men">Titulo</label>
                        <input id="titulo_men" maxlength="50" name="titulo_men" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <div class="md-form amber-textarea active-amber-textarea-2">
                            <label class="" for="cuerpo_men">Cuerpo Mensaje</label>
                            <textarea type="text" id="cuerpo_men" name="cuerpo_men" class="md-textarea form-control"
                                rows="8"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit">Enviar mensaje</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Modal Mensaje -->
<!-- Modal cambios -->
<div class="modal fade " id="modalPerfil" tabindex="-1" role="dialog" aria-labelledby="modalPerfil" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPerfilHeader">Cambiar perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id=formCambio action="<?php echo base_url('usuarios_c/enviarCambios/') ?>">
                    <div class="form-group">
                        <label for="email_usu">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-email"><i
                                            class="fas fa-at"></i></i></span></div>
                            <input value="<?php echo $perfil[0]['email_usu'] ?>" id="email_usu" placeholder="E-Mail"
                                name="email_usu" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control"
                                type="email" placeholder="usuario@dominio.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastPass">Contraseña antigua</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text " id=""><i class="fas fa-unlock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="lastPass" id="lastPass"
                                placeholder="Contraseña antigua" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id=""><i id=""
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
                    <?php if ($perfil[0]['tipo_usu'] == "m") : ?>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="musico" name="tipo_usu" value="m" checked class="custom-control-input"
                            required>
                        <label class="custom-control-label" for="musico">Músico</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="grupo" name="tipo_usu" value="g" class="custom-control-input" required>
                        <label class="custom-control-label" for="grupo">Grupo</label>
                    </div>
                    <?php elseif ($perfil[0]['tipo_usu'] == "g") : ?>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="musico" name="tipo_usu" value="m" class="custom-control-input" required>
                        <label class="custom-control-label" for="musico">Músico</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="grupo" name="tipo_usu" value="g" checked class="custom-control-input"
                            required>
                        <label class="custom-control-label" for="grupo">Grupo</label>
                    </div>
                    <?php endif; ?>
                    <hr>
                    <div class="form-group">
                        <label for="apenom_usu">Nombre completo</label>
                        <input id="apenom_usu" value="<?php echo $perfil[0]['apenom_usu']; ?>" name="apenom_usu"
                            class="form-control" type="text" maxlength="125" placeholder="Nombre y apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="ciudad_usu">Ciudad</label>
                        <input id="ciudad_usu" value="<?php echo $perfil[0]['ciudad_usu']; ?>" name="ciudad_usu"
                            placeholder="Ciudad" maxlength="15" class="form-control" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="estilo_usu">Estilo músical</label>
                        <input id="estilo_usu" value="<?php echo $perfil[0]['estilo_usu']; ?>" name="estilo_usu"
                            placeholder="Estilo músical" maxlength="25" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="instrumentos">Instrumentos</label>
                        <select id="instrumentos" name="instrumentos[]" class="form-control selectpicker" required
                            multiple>

                            <?php for ($i = 0; $i < count($instrumentos); $i++) : ?>
                            <?php if ($perfil[$i]['id_ins'] == $instrumentos[$i]['id_ins']) : ?>
                            <option selected value="<?php echo $instrumentos[$i]['id_ins'] ?>">
                                <?php echo $instrumentos[$i]['nombre_ins'] ?>
                            </option>
                            <?php else : ?>
                            <option value="<?php echo $instrumentos[$i]['id_ins'] ?>">
                                <?php echo $instrumentos[$i]['nombre_ins'] ?>
                            </option>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="md-form amber-textarea active-amber-textarea-2">
                        <label class="" for="desc_usu">Descripcion</label>
                        <textarea type="text" id="desc_usu" name="desc_usu" class="md-textarea form-control"
                            rows="5"><?php echo $perfil[0]['desc_usu'] ?></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input id="id_usu" name="id_usu" type="hidden" value="<?php echo $perfil[0]['id_usu'] ?>">
                <button type="submit" id="<?php echo $perfil[0]['id_usu'] ?>" class="btn btn-primary enviar">Guardar
                    cambios</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal añadir -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalIMG" aria-labelledby="modalIMG" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalIMG">Cambiar foto de perfil</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <form method="post" action="<?php echo base_url('usuarios_c/setImagen/') ?>"
                        enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01"> <i class="fas fa-upload"></i>
                                </span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img_usu" name="img_usu"
                                    aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="img_usu">Selecciona la imagen</label>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input id="id_usu2" name="id_usu2" type="hidden" value="<?php echo $perfil[0]['id_usu'] ?>">
                <button type="submit" id="<?php echo $perfil[0]['id_usu'] ?>" class="btn btn-primary enviar">Guardar
                    cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/perfiles_v.js') ?>"></script>