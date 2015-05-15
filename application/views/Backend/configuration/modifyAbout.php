<div id='header_title_container'>
	<span><?php echo $title ?></span>
</div>
<div id='validation_errors_container'>
	<?php echo validation_errors(); ?>
</div>
<?php 
	$attributes = array('id' => 'submit_form', 'class' => 'form-horizontal');
	echo form_open(base_url() . INDEX_FILE . 'Backend/' . $folder_name . '/modifyAbout', $attributes) 
?>
	<input type="hidden" name="id_usuario" value="<?php echo $about_item['id'] ?>" />
	<div class="form-group">
	    <label for="text_about" class="col-sm-2 control-label">Texto</label>
	    <div class="col-sm-10">
	      <textarea rows='5' placeholder='Texto about' class="form-control" name="text_about"><?php echo $about_item['text_about'] ?></textarea><br />
	    </div>
	 </div>
	   <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input class='btn btn-primary btn_create' type="submit" name="submit" value="MODIFICAR" />
    </div>
  </div>
</form>