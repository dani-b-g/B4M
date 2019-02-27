<div class="container mt-5">



    <div class="card">
        <div class="card-header">
            Mensajes de:
            <?php echo $usuario; ?>
        </div>
        <div class="card-body">
            <?php print_r($mensajes) ?>
            <h5 class="card-title">Mensajes</h5>
            <div class="card-text">
                <ul class="list-group">
                    <?php foreach ($mensajes as $value): ?>
                    <li class="mensajes" data-mensaje-type='<?php echo $value->id_men ?>' id='id=<?php echo $value->rem_men ?>' class="list-group-item d-flex btn purple-gradient justify-content-between align-items-center">
                        <h5>
                            <?php echo $value->salida  ?>
                        </h5>
                        <h6>
                            <?php echo $value->titulo_men  ?>
                        </h6>
                        <span class="badge badge-dark badge-pill">
                            <?php if ($value->estado_men == 0): ?>
                            <i class="fas fa-envelope"></i>
                            <?php else: ?>
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
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mensaje" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloMensaje"></h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id=contenidoMen>
                    <div>
                        <div id="fechaMen">
                        </div>
                        <div id="remitenteMen">
                        </div>
                    </div>
                </div>
                <hr>
                <h1>Respuesta:</h1>
                <form method="post" action="">
                    <input id="rem_men" name="rem_men" type="hidden" value="">
                    <div class="form-group">
                        <label for="titulo_men">Titulo</label>
                        <input id="titulo_men" maxlength="50" name="titulo_men" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <div class="md-form amber-textarea active-amber-textarea-2">
                            <label class="" for="desc_usu">Cuerpo Mensaje</label>
                            <textarea type="text" id="desc_usu" name="desc_usu" class="md-textarea form-control" rows="8"></textarea>
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
<script>
    $('.mensajes').on('click', function(event) {
        idmen = $(this).attr('data-mensaje-type');
        $.post(baseurl + "mensajes_c/contMens/", {
            id_men: idmen
        }).done(function(salida) {
            // TODO: llamada a que quede como en visto el mensaje
            // TODO: llamada a abrir el modal con los datos del mensaje
        });
    })
</script> 