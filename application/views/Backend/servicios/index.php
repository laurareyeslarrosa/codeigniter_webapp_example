<ul class="row" id="btn_subservice_container">
    <a class='btn btn-primary btn_create position_right' href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/<?php echo $folder_name ?>/create_subservice">AGREGAR NUEVO SUBSERVICIO</a>
</ul>                                           


    <?php
    if (count($servicios_array) === 0) {
        echo "<div class='well'>No hay elementos guardados</div>";
    }
    foreach ($servicios_array as $servicios):
        ?>

<ul class="row service_row">
    <li class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

        <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Servicio: <?php echo $servicios['nombre_servicio'] ?></h3>
                </div>
                <div class="panel-body row" id='servicios_container'>
                    <div class="col-xs-11 col-sm-11 col-md-11">
                       <p>Descripción: <?php echo $servicios['descripcion'] ?></p>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <a class='btn btn-primary btn_modify' href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/<?php echo $folder_name ?>/modify/<?php echo $servicios['id'] ?>">MODIFICAR</a>
                        <a class='btn btn-danger btn_delete' href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/<?php echo $folder_name ?>/delete/<?php echo $servicios['id'] ?>">ELIMINAR</a>
                    </div>
                </div> 
        </div>
    </li>
</ul>



    <?php if((count($servicios[SUBSERVICIOS_CLASS])) > 0): ?>


<div class="table-responsive subservice_row">
    <h5>Subservicios de <?php echo $servicios['nombre_servicio'] ?></h5>    
  <table class="table table-condensed">
    <thead>
        <tr>
          <th>Nombre</th>
          <th>Sigla</th>
          <th>Descripción corta</th>
          <th>Desripciión larga</th>
          <th></th>
          <th></th>
        </tr>
    </thead>
    <tbody>

    <?php foreach ($servicios[SUBSERVICIOS_CLASS] as $sub_servicios): ?>


        <tr>
          <th><?php echo $sub_servicios['nombre']?></th>
          <th><?php echo $sub_servicios['sigla']?></th>
          <th><?php echo substr($sub_servicios['descripcion_general'], 0, 20) ?>... <button type="button" class="btn btn-link" data-toggle="modal" data-target="#desc_gral_myModal_<?php echo $sub_servicios['id'] ?>">LEER MAS</button></th>
          <th><?php echo substr($sub_servicios['descripcion_larga'], 0, 20) ?>... <button type="button" class="btn btn-link" data-toggle="modal" data-target="#desc_large_myModal_<?php echo $sub_servicios['id'] ?>">LEER MAS</button></th>
          <th><a class='btn btn-primary btn_modify' href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/<?php echo $folder_name ?>/modify_subservice/<?php echo $sub_servicios['id'] ?>">MODIFICAR</a></th>
          <th><a class='btn btn-danger btn_delete' href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/<?php echo $folder_name ?>/delete_subservice/<?php echo $sub_servicios['id'] ?>">ELIMINAR</a></th>
        </tr>

        <div class="modal fade" id="desc_gral_myModal_<?php echo $sub_servicios['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $servicios['nombre_servicio'] ?></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $sub_servicios['descripcion_general'] ?>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="desc_large_myModal_<?php echo $sub_servicios['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $servicios['nombre_servicio'] ?></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $sub_servicios['descripcion_larga'] ?>
                    </div>
                </div>
            </div>
        </div>

<?php endforeach ?>
    </tbody>
  </table>
</div>
<?php endif ?>

    <?php endforeach ?>
