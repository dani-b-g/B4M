<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Buscar</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Busqueda de:
                        <?php echo $busc ?>
                    </h5>
                    <div class="card-text">
                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th><i class="fas fa-user mr-2 indigo-text" aria-hidden="true"></i>Usuario</th>
                                    <th><i class="fas fa-user mr-2 indigo-text" aria-hidden="true"></i>Nombre Completo
                                    </th>
                                    <th><i class="fas fa-home mr-2 indigo-text" aria-hidden="true"></i>Ciudad</th>
                                    <th><i class="fas fa-music mr-2 indigo-text" aria-hidden="true"></i>Estilo</th>
                                    <th><i class="fas fa-guitar mr-2 indigo-text" aria-hidden="true"></i>Instrumento
                                    </th>
                                    <!-- <th><i class="fas fa-exclamation mr-2 indigo-text" aria-hidden="true"></i>Acciones
                                    </th> -->

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($busqueda as $value) : ?>
                                <tr id="<?php echo $value->nombre_usu ?>" class="perfiles">
                                    <th scope="row">
                                        <?php echo $value->nombre_usu ?>
                                    </th>
                                    <td>
                                        <?php echo $value->apenom_usu ?>
                                    </td>
                                    <td>
                                        <?php echo $value->ciudad_usu ?>
                                    </td>
                                    <td>
                                        <?php echo $value->estilo_usu ?>
                                    </td>
                                    <td>
                                        <?php echo $value->nombre_ins ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary"
                        href="<?php echo base_url('usuarios_c/perfil/' . $_SESSION['usuario']); ?>">Volver al
                        perfil</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/busqueda_v.js') ?>"></script>