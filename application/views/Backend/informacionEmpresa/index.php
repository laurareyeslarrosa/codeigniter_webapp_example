<ul class="row">
    <?php foreach ($informacionEmpresa_array as $informacionEmpresa): ?>
        <li class="col-xs-12 col-sm-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Título: <?php echo $informacionEmpresa['titulo'] ?></h3>
                </div>
                <div class="panel-body">
                    <p>Descripción: <?php echo $informacionEmpresa['descripcion'] ?></p>
                </div>
                <div class="panel-footer">
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <a class='btn btn-primary btn_modify' href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/<?php echo $folder_name ?>/modify/<?php echo $informacionEmpresa['id'] ?>">MODIFICAR</a>
                        <a class='btn btn-danger btn_delete' href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/<?php echo $folder_name ?>/delete/<?php echo $informacionEmpresa['id'] ?>">ELIMINAR</a>
                    </div>
                </div> 
            </div>
        </li>
    <?php endforeach ?>
</ul>