<ul class="row">
    <?php foreach ($informacion_array as $informacionEmpresa): ?>
        <li class="col-xs-12 col-sm-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $informacionEmpresa['titulo'] ?></h3>
                </div>
                <div class="panel-body">
                    <?php echo $informacionEmpresa['descripcion'] ?>
                </div>
            </div>
        </li>
    <?php endforeach ?>
</ul>