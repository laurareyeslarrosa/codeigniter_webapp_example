<div id='header_title_container'>
    <span>LOGIN</span>
</div>
<div id='validation_errors_container'>
    <?php echo $error_login_message; ?>
    <?php echo validation_errors(); ?>
</div>
<?php
$attributes = array('id' => 'submit_form', 'class' => 'form-horizontal');
echo form_open(base_url() . INDEX_FILE . $folder_name . '/login', $attributes)
?>
<div class="form-group">
    <label for="nombre_usuario" class="col-sm-2 control-label">Usuario</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="nombre_usuario" placeholder="Usuario" value="<?php echo $this->input->post('nombre_usuario') ?>">
    </div>
</div>
<div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">

         <input type="password" class="form-control" name="password" placeholder="Contraseña" value="<?php echo $this->input->post('password') ?>">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input class='btn btn-primary btn_create' type="submit" name="submit" value="LOGIN" />
    </div>
</div>
</form>