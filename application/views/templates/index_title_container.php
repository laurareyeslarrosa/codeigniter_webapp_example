<?php if ($abm_status !== null) { ?>
    <div id='status_alert' class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Exito!</strong> <?php echo $abm_status ?>
    </div>
<?php } ?>
<div id='header_title_container'>
    <span><?php echo $title ?></span>

    <?php if ($this->uri->segment(2, 0) !== CONFIG_CLASS): ?>
    	<a class='btn btn-primary btn_create position_right' href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/<?php echo $folder_name ?>/create">AGREGAR NUEVO</a>
    <?php endif; ?>
</div>