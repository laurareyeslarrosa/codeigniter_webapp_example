<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Frontend</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php if ($this->uri->segment(1, 0) === INICIO_CLASS || $this->uri->segment(1, 0) === 0): ?>class="active"<?php endif; ?>><a href="<?php echo base_url() ?><?php echo INDEX_FILE ?>inicio">Inicio <span class="sr-only">(current)</span></a></li>
                <li <?php if ($this->uri->segment(1, 0) === INFORMACION_CLASS): ?>class="active"<?php endif; ?>><a href="<?php echo base_url() ?><?php echo INDEX_FILE ?>empresa">Empresa</a></li>
                <li <?php if ($this->uri->segment(1, 0) === SERVICIOS_CLASS): ?>class="active"<?php endif; ?>><a href="<?php echo base_url() ?><?php echo INDEX_FILE ?>servicios">Servicios</a></li>
                <li <?php if ($this->uri->segment(1, 0) === PARTNERS_CLASS): ?>class="active"<?php endif; ?>><a href="<?php echo base_url() ?><?php echo INDEX_FILE ?>partners">Partners</a></li>
                <li <?php if ($this->uri->segment(1, 0) === ALIANZAS_CLASS): ?>class="active"<?php endif; ?>><a href="<?php echo base_url() ?><?php echo INDEX_FILE ?>alianzas">Alianzas</a></li>
                <li <?php if ($this->uri->segment(1, 0) === CONTACTO_CLASS): ?>class="active"<?php endif; ?>><a href="<?php echo base_url() ?><?php echo INDEX_FILE ?>contacto">Contacto</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>