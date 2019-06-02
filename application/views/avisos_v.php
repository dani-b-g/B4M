<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div id="feedback" class="alert alert-success" hidden></div>
            <?php if (isset($_SESSION['flashdata']) && isset($_SESSION['error'])) : ?>
            <div class=" alert alert-info" role="alert">
                <?php echo $_SESSION['flashdata'];
                    unset($_SESSION['flashdata']); ?>
            </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['flashdata']) && $_SESSION['login'] == true) : ?>
            <div class="alert alert-info" role="alert">
                <?php echo $_SESSION['flashdata'];
                    unset($_SESSION['flashdata']); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-header text-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrearAviso" type="button">Crear
                    aviso</button>
            </div>
            <h5 class="card-title"></h5>
            <div class="card-text">
                <?php foreach ($avisos as $aviso) : ?>
                <div class="card border-secondary p-2 m-2">
                    <div class="card-header border-secondary">
                        <div class="row">
                            <div class="col-10">
                                <a href=""><img style="width: 70px;" class="rounded-circle z-depth-0"
                                        src="<?php echo base_url($aviso->img_usu) ?>"></a>
                                <span class="h5 text-primary"><?php echo $aviso->nombre_usu ?></span>
                            </div>
                            <div class="col-2">
                                <span class="text-right"><?php echo $aviso->fecha_an ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-secondary">
                        <h5 class="card-title"><?php echo $aviso->titulo_an ?></h5>
                        <p class="card-text"><?php echo $aviso->cuerpo_an ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo base_url('Avisos_c/crear') ?>" method="post">
    <div class="modal fade" id="modalCrearAviso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Crear aviso</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-heading prefix grey-text"></i>
                        <input type="text" id="titulo_an" name="titulo_an" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="titulo_an">Titulo</label>
                    </div>
                    <!--Textarea with icon prefix-->
                    <div class="md-form mb-5 amber-textarea active-amber-textarea-2">
                        <i class="fas fa-pencil-alt prefix"></i>
                        <textarea id="cuerpo_an" name="cuerpo_an" class="md-textarea form-control" rows="3"
                            required></textarea>
                        <label for="cuerpo_an">Cuerpo del aviso</label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <input type="hidden" name="usu_an" id="usu_an" value="<?php echo $_SESSION['id_login'] ?>">
                    <!-- <input type="hidden" name="fecha_an" id="fecha_an" value="<?php echo date('Y-m-d H:i:s'); ?>"> -->
                    <input type="submit" class="btn btn-secondary" value="Crear">
                </div>
            </div>
        </div>
    </div>
</form>