<div id='header_title_container'>
    <span><?php echo $title ?></span>
</div>
<div id='validation_errors_container'>
    <?php echo validation_errors(); ?>
</div>
<?php
$attributes = array('id' => 'submit_form', 'class' => 'form-horizontal');
echo form_open_multipart(base_url() . INDEX_FILE . 'Backend/' . $folder_name . '/modify', $attributes)
?>
<input type="hidden" name="id_servicio" value="<?php echo $servicios_item['id'] ?>" />
<div class="form-group">
    <label for="nombre_servicio" class="col-sm-2 control-label">Servicio</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="nombre_servicio" placeholder="Nombre de servicio" value='<?php echo $servicios_item['nombre_servicio'] ?>'>
    </div>
</div>
<div class="form-group">
    <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
    <div class="col-sm-10">
        <textarea rows='4' placeholder='Descripción' class="form-control" name="descripcion"><?php echo $servicios_item['descripcion'] ?></textarea><br />
    </div>
</div>
<div class="form-group">
    <label for="imagenIcono" class="col-sm-2 control-label">Ícono servicio</label>
    <div class="col-sm-10">
        <input type="file" name="imagenIcono" size="20" />
    </div>
</div>
<div class="form-group">
    <label for="imagenInicio" class="col-sm-2 control-label">Imagen inicio</label>
    <div class="col-sm-10">
        <input type="file" name="imagenInicio" size="20" />
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input class='btn btn-primary btn_create' type="submit" name="submit" value="MODIFICAR" />
    </div>
</div>
</form>