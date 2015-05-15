<ul class="row">
    <?php foreach ($alianzas_array as $alianzas): ?>
        <li class="col-xs-12 col-sm-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Empresa: <?php echo $alianzas['nombre_empresa'] ?></h3>
                </div>
                <div class="panel-body row" id='alianzas_container'>
                    <div class="col-xs-11 col-sm-11 col-md-11">
                        <p>URL: <?php echo $alianzas['url_empresa'] ?></p>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <a class='btn btn-primary btn_modify' href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/<?php echo $folder_name ?>/modify/<?php echo $alianzas['id'] ?>">MODIFICAR</a>
                        <a class='btn btn-danger btn_delete' href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/<?php echo $folder_name ?>/delete/<?php echo $alianzas['id'] ?>">ELIMINAR</a>
                    </div>
                </div> 
            </div>
        </li>
    <?php endforeach ?>
</ul>