<ul class="row">
    <?php foreach ($alianzas_array as $alianzas): ?>
        <li class="col-xs-12 col-sm-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $alianzas['nombre_empresa'] ?></h3>
                </div>
                <div class="panel-body row" id='alianzas_container'>
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <img alt='' src='<?php echo $alianzas['ruta_logo_empresa'] ?>'>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9">
                        Url: <?php echo $alianzas['url_empresa'] ?>
                    </div>
                </div> 
            </div>
        </li>
    <?php endforeach ?>
</ul>