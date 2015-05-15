<div id='header_title_container'>
    <span><?php echo $title ?></span>
</div>
<div id='validation_errors_container'>
    <?php echo validation_errors(); ?>
</div>
<?php
$attributes = array('id' => 'submit_form', 'class' => 'form-horizontal');
echo form_open(base_url() . INDEX_FILE . 'Backend/' . $folder_name . '/create', $attributes)
?>
<div class="form-group">
    <label for="title_informacion" class="col-sm-2 control-label">Título</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="title_informacion" placeholder="Título" value='<?php echo $this->input->post('title_informacion') ?>'>
    </div>
</div>
<div class="form-group">
    <label for="description_informacion" class="col-sm-2 control-label">Descripción</label>
    <div class="col-sm-10">
        <textarea placeholder='Descripción' class="form-control" name="description_informacion"><?php echo $this->input->post('description_informacion') ?></textarea><br />
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input class='btn btn-primary btn_create' type="submit" name="submit" value="AGREGAR" />
    </div>
</div>
</form>