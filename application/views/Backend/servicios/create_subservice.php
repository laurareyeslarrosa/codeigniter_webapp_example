<div id='header_title_container'>
    <span><?php echo $title ?></span>
</div>
<div id='validation_errors_container'>
    <?php echo $image_upload_error; ?>
    <?php echo validation_errors(); ?>
</div>

<?php
$attributes = array('id' => 'submit_form', 'class' => 'form-horizontal');
echo form_open_multipart(base_url() . INDEX_FILE . 'Backend/' . $folder_name . '/create_subservice', $attributes)
?>
<div class="form-group">
    <label for="nombre" class="col-sm-2 control-label">SubServicio</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="nombre" placeholder="Nombre del subservicio" value='<?php echo $this->input->post('nombre') ?>'>
    </div>
</div>
<div class="form-group">
    <label for="sigla" class="col-sm-2 control-label">Sigla</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="sigla" placeholder="Sigla del subservicio" value='<?php echo $this->input->post('sigla') ?>'>
    </div>
</div>

<div class="form-group">
    <label for="id_servicio" class="col-sm-2 control-label">Servicio principal</label>
    <div class="col-sm-10">

        <select class="form-control" name="id_servicio">

    <?php
    foreach ($servicios_array as $servicios):
        ?>
          <option value="<?php echo $servicios['id'] ?>"><?php echo $servicios['nombre_servicio'] ?></option>
          
          <?php endforeach ?>
        </select>
    </div>
</div>


<div class="form-group">
    <label for="descripcion_general" class="col-sm-2 control-label">Descripción general</label>
    <div class="col-sm-10">
        <textarea rows='5' placeholder='Resumen descripción' class="form-control" name="descripcion_general"><?php echo $this->input->post('descripcion_general') ?></textarea><br />
    </div>
</div>
<div class="form-group">
    <label for="descripcion_larga" class="col-sm-2 control-label">Descripción completa</label>
    <div class="col-sm-10">
        <textarea rows='10' placeholder='Descripción' class="form-control" name="descripcion_larga"><?php echo $this->input->post('descripcion_larga') ?></textarea><br />
    </div>
</div>
<div class="form-group">
    <label for="logo_subservicio" class="col-sm-2 control-label">Logo sub servicio</label>
    <div class="col-sm-10">
        <input type="file" name="logo_subservicio" size="20" />
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input class='btn btn-primary btn_create' type="submit" name="submit" value="AGREGAR" />
    </div>
</div>
</form>