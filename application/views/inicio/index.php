<ul class="row">
    <?php foreach ($trabajos_array as $trabajosRealizados): ?>
        <li class="col-xs-12 col-sm-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $trabajosRealizados['nombre_empresa'] ?></h3>
                </div>
                <div class="panel-body row" id='servicios_container'>
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <img alt='' src='<?php echo $trabajosRealizados['ruta_logo_empresa'] ?>'>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9">
                        <?php echo $trabajosRealizados['titulo_trabajo'] ?>
                    </div>
                    <div class="col-xs-11 col-sm-11 col-md-11">
                        <p> URL: <?php echo $trabajosRealizados['descripcion'] ?> </p>
                        <?php echo $trabajosRealizados['descripcion'] ?>
                    </div>
                </div> 
            </div>
        </li>
    <?php endforeach ?>
</ul>