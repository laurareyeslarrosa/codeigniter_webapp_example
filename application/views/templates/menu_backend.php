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
            <a class="navbar-brand" href="#">Backend</a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php if ($this->uri->segment(2, 0) === TRABAJOS_CLASS || $this->uri->segment(2, 0) === 0): ?>class="active"<?php endif; ?>><a href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/trabajosRealizados">Trabajos realizados <span class="sr-only">(current)</span></a></li>
                <li <?php if ($this->uri->segment(2, 0) === INFORMACION_CLASS): ?>class="active"<?php endif; ?>><a href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/informacionEmpresa">Información empresa</a></li>
                <li <?php if ($this->uri->segment(2, 0) === SERVICIOS_CLASS): ?>class="active"<?php endif; ?>><a href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/servicios">Servicios</a></li>
                <li <?php if ($this->uri->segment(2, 0) === PARTNERS_CLASS): ?>class="active"<?php endif; ?>><a href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/partners">Partners</a></li>
                <li <?php if ($this->uri->segment(2, 0) === ALIANZAS_CLASS): ?>class="active"<?php endif; ?>><a href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/alianzas">Alianzas</a></li>
                <li <?php if ($this->uri->segment(2, 0) === NOTICIAS_CLASS): ?>class="active"<?php endif; ?>><a href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/noticias">Noticias</a></li>
                <li <?php if ($this->uri->segment(2, 0) === CONFIG_CLASS): ?>class="active"<?php endif; ?>><a href="<?php echo base_url() ?><?php echo INDEX_FILE ?>Backend/configuration">Configuracion</a></li> 
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url() ?><?php echo INDEX_FILE ?>auth/logout">Cerrar session</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>