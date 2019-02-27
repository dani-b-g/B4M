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
                    <li id=<?php echo $value->rem_men ?>
                        class="list-group-item d-flex btn purple-gradient justify-content-between align-items-center">
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
        <div class="card-footer">
        </div>
    </div>




</div>