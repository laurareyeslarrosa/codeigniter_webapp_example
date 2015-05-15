<ul class="row">
    <?php
    if (count($servicios_array) === 0) {
        echo "<div class='well'>No hay elementos guardados</div>";
    }
    foreach ($servicios_array as $servicios):
        ?>
        <li class="col-xs-12 col-sm-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $servicios['nombre_servicio'] ?></h3>
                </div>
                <div class="panel-body row" id='servicios_container'>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <img alt='' src='<?php echo $servicios['ruta_icono'] ?>'>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9">
                        <?php echo $servicios['descripcion_corta'] ?>

                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal_<?php echo $servicios['id'] ?>">
                            LEER MAS
                        </button>

                    </div>
                </div>
            </div>
        </li>
        <!-- Modal -->
        <div class="modal fade" id="myModal_<?php echo $servicios['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $servicios['nombre_servicio'] ?></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $servicios['descripcion_larga'] ?>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach ?>
</ul>