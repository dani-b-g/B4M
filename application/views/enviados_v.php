<div class="container mt-5">
<?php $ci = &get_instance(); $ci->load->model("Usuarios_m"); ?>
    <?php if (isset($_SESSION['flashdata'])) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['flashdata'];
            unset($_SESSION['flashdata']); ?>
    </div>
    <?php endif; ?>
	
    <div class="card mb-2">
        <div class="card-header row">
            <span class="col h4-responsive">
				Bandeja de salida de:
				<?php echo $usuario; ?>
			</span>
			<a class="btn btn-primary waves-effect" href="<?php echo base_url('mensajes_c/mensajes') ?>" type="button">Ver bandeja de entrada</a>
        </div>
        <div class="card-body">
            <div class="card-text">
                <ul class="list-group">
                    <?php foreach ($mensajes as $value) : ?>
                    <li data-mensaje-type='<?php echo $value->id_men ?>' data-des-type='<?php echo $value->des_men ?>'
                        id='<?php echo $value->rem_men ?>'
                        class="list-group-item d-flex btn purple-gradient justify-content-between align-items-center mensajes row">
                        <div class="h5 col-4 text-left" id="remMen" data-rem-type="<?php echo $value->salida  ?>">
							<?php echo($ci->Usuarios_m->getName($value->destino)) ?>
                        </div>
                        <div class="h6 col-8 text-right">
                            <?php echo $value->titulo_men  ?>
                        </div>
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
                        <span class="h4-responsive">Cuerpo del mensaje:</span>
						<hr>
                        <p style="font-size: 1.2em" id="cuerpoMen">
                        </p>
						<hr>
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
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
<!-- Fin modal -->
<script src="<?php echo base_url('assets/js/mensajes_v.js') ?>"></script>
