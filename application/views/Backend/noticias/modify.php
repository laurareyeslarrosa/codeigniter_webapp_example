<div id='header_title_container'>
	<span><?php echo $title ?></span>
</div>
<div id='validation_errors_container'>
	<?php echo validation_errors(); ?>
</div>
<?php 
	$attributes = array('id' => 'submit_form', 'class' => 'form-horizontal');
	echo form_open(base_url() . INDEX_FILE . 'Backend/' . $folder_name . '/modify', $attributes) 
?>
	<input type="hidden" name="id_noticia" value="<?php echo $noticias_item['id'] ?>" />	
	<div class="form-group">
	    <label for="titulo" class="col-sm-2 control-label">Título</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="titulo" placeholder="Título" value='<?php echo $noticias_item['titulo'] ?>'>
	    </div>
	 </div>
	<div class="form-group">
	    <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
	    <div class="col-sm-10">
	    	 <textarea rows='4' placeholder='Descripción' class="form-control" name="descripcion"><?php echo $noticias_item['descripcion'] ?></textarea><br />
	    </div>
	 </div>
	   <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input class='btn btn-primary btn_create' type="submit" name="submit" value="MODIFICAR" />
    </div>
  </div>
</form>