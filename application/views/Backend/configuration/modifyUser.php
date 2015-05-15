<div id='header_title_container'>
	<span><?php echo $title ?></span>
</div>
<div id='validation_errors_container'>
	<?php echo validation_errors(); ?>
</div>
<?php
	$attributes = array('id' => 'submit_form', 'class' => 'form-horizontal');
	echo form_open(base_url() . INDEX_FILE . 'Backend/' . $folder_name . '/modifyUser', $attributes) 
?>
	<input type="hidden" name="id_about" value="<?php echo $usuarios_item['id'] ?>" />	
	<div class="form-group">
	    <label for="nombre_usuario" class="col-sm-2 control-label">Usuario</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="nombre_usuario" placeholder="Título" value='<?php echo $usuarios_item['usuario'] ?>'>
	    </div>
	 </div>
	<div class="form-group">
	    <label for="password" class="col-sm-2 control-label">Contraseña</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" name="password" placeholder="Contraseña" value='******'>
	    </div>
	 </div>
	

	<div class="form-group">
	    <label for="password_confirm" class="col-sm-2 control-label">Confirmar contraseña</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" name="password_confirm" placeholder="Confirmar contraseña" value=''>
	    </div>
	 </div>


	   <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input class='btn btn-primary btn_create' type="submit" name="submit" value="MODIFICAR" />
    </div>
  </div>
</form>