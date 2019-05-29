<div class="container mt-5">
    <?php if (isset($_SESSION['flashdata'])) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['flashdata'];
        unset($_SESSION['flashdata']); ?>
    </div>
    <?php endif; ?>
    <div class="card mb-2">
        <div class="card-header">
            Mensajes de:
            <?php echo $usuario; ?>
        </div>
        <div class="card-body">
            <h5 class="card-title">Mensajes</h5>
            <div class="card-text">
                <ul class="list-group">
                    <?php foreach ($mensajes as $value) : ?>
                    <li data-mensaje-type='<?php echo $value->id_men ?>' data-des-type='<?php echo $value->des_men ?>'
                        id='<?php echo $value->rem_men ?>'
                        class="list-group-item d-flex btn purple-gradient justify-content-between align-items-center mensajes">
                        <h5 id="remMen" data-rem-type="<?php echo $value->salida  ?>">
                            <?php echo $value->salida  ?>
                        </h5>
                        <h6>
                            <?php echo $value->titulo_men  ?>
                        </h6>
                        <span class="badge badge-dark badge-pill">
                            <?php if ($value->estado_men == 0) : ?>
                            <i class="fas fa-envelope"></i>
                            <?php else : ?>
                            <i class="fas fa-envelope-open"></i>
                            <?php endif; ?>
                        </span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Modal mensaje -->
<div id="modalMensaje" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mensaje" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloMensaje"></h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="contenidoMen">
                    <div class="col">
                        <h3>Cuerpo del mensaje:</h3>
                        <p style="font-size: 1.2em" id="cuerpoMen">
                        </p>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6 class="font-weight-bold" style="font-size: 0.8em" id="fechaMen">
                            </h6>
                        </div>
                        <div class="col">
                            <p class="font-weight-bold" id="remitenteMen">
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Respuesta:</h4>
                <form method="post" action="<?php echo base_url('/mensajes_c/enviarmen/') ?>">
                    <input id="des_men" name="des_men" type="hidden" value="">
                    <input id="id_men" name="id_men" type="hidden" value="">
                    <div class="form-group">
                        <label for="titulo_men">Titulo</label>
                        <input id="titulo_men" maxlength="50" name="titulo_men" class="form-control" type="text"
                            required>
                    </div>
                    <div class="form-group">
                        <div class="md-form amber-textarea active-amber-textarea-2">
                            <label class="" for="cuerpo_men">Cuerpo Mensaje</label>
                            <textarea type="text" id="cuerpo_men" name="cuerpo_men" class="md-textarea form-control"
                                rows="15" required></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="submit">Responder</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin modal -->
<script src="<?php echo base_url('assets/js/mensajes_v.js') ?>"></script>