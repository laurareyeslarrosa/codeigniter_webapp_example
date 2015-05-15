<ul class="row">
	<li class="col-xs-12 col-sm-6 col-md-4 col-md-offset-1">
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Usuario</h3>
		  </div>
		  <div class="panel-body" id='servicios_container'>
                    Nombre: <?php echo $usuario['usuario'] ?>
          </div>
		  <div class="panel-footer">
		  	<div class="btn-group btn-group-justified" role="group" aria-label="...">
    			<a class='btn btn-primary btn_modify' href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/<?php echo $folder_name ?>/modifyUser/<?php echo $usuario['id'] ?>">MODIFICAR USUARIO</a>
			</div>
		  </div> 
		</div>
	</li>


	<li class="col-xs-12 col-sm-6 col-md-4 col-md-offset-1">
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Texto sobre la empresa</h3>
		  </div>
		  <div class="panel-body" id='servicios_container'>
                    Texto: <?php echo $aboutText['texto'] ?>
          </div>
		  <div class="panel-footer">
		  	<div class="btn-group btn-group-justified" role="group" aria-label="...">
    			<a class='btn btn-primary btn_modify' href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/<?php echo $folder_name ?>/modifyAbout/<?php echo $aboutText['id'] ?>">MODIFICAR TEXTO</a>
			</div>
		  </div> 
		</div>
	</li>
</ul>
