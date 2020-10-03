
<div id="app">

    <div class="container-fluid text-center text-warning" style="background-color:#293072;">SVG CARGO S.A.S.</div>

    <div class="container-fluid">
      <div class="row head-s">
        <div class="col-2  imagisotipo d-none d-sm-none d-md-none d-xl-block py-2 ">
           <a href="<?=base_url("User");?>"><img src="<?php echo base_url('include/img/logo.png');?>" alt="logo" style="width:90%;"></a>
        </div>
        <div class="menu col-xl-9 col-md-12  col-sm-12 d-sm-block">
        <div class="d-none d-sm-none d-md-block d-xl-block">
          <nav class="navbar navbar-expand-md container  navbar-light sp ">
              <!-- Links -->
                <ul class="navbar-nav ml-auto sp">
                  <?php if(  empty( $this->auth_role ) ): ?>
                    <li class="nav-item">
                      <a class="nav-link btn-icono sp" href="login" ><span class="mbri-login"></span></a>
                    </li>

                  <?php else: ?>

                    <li class="nav-item">
                      <a class="nav-link btn-icono sp" href="../logout" ><span class="mbri-logout"></span></a>
                    </li>

                  <?php endif; ?>
                  <?php if ($this->auth_role == 'customer' ||   $this->auth_role == 'manager' || $this->auth_role == 'admin'): ?>

                  <?php endif; ?>
                <?php if ($this->auth_role == 'customer' ||   $this->auth_role == 'manager' || $this->auth_role == 'admin'): ?>
                  <li class="nav-item">
                    <a class="nav-link btn-icono sp" onclick="openNav2()" ><span class="mbri-setting"></span></a>
                  </li>
                <?php endif; ?>
                </ul>
            </nav>
                  <hr >
          </div>
          <nav class="navbar navbar-expand-lg navbar-light sp hidden-md">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="mbri-menu"></span><a class="nav-link btn-icono sp" href="#"></a>
            </button>
              <!-- Links -->
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto sp d-sm-block d-md-none d-xl-none">
                  <?php if(  empty( $this->auth_role ) ): ?>
                    <li class="nav-item">
                      <a class="nav-link btn-icono sp" href="login" ><span class="mbri-login"></span></a>
                    </li>

                  <?php else: ?>

                    <li class="nav-item">
                      <a class="nav-link btn-icono sp links" href="../logout" ><span class="mbri-logout"></span>Salir</a>
                    </li>

                  <?php endif; ?>
                  <?php if ($this->auth_role == 'customer' ||   $this->auth_role == 'manager' || $this->auth_role == 'admin'): ?>

                  <?php endif; ?>
                <?php if ($this->auth_role == 'customer' ||   $this->auth_role == 'manager' || $this->auth_role == 'admin'): ?>
                  <li class="nav-item">
                    <a class="nav-link btn-icono sp" onclick="openNav2()" ><span class="mbri-setting"></span></a>
                  </li>
                <?php endif; ?>
                </ul>
                <ul class="navbar-nav sp">
                  <div class="dropdown sp">
                    <?php if (  $this->auth_role == 'manager' || $this->auth_role == 'admin'): ?>
                      <button class="btn btn-default nav-link links dropdown-toggle sp" type="button" data-toggle="dropdown" data-hover="dropdown">
                        Super Administrador
                      </button>
                    <?php endif; ?>
                    <div class="dropdown-menu">
                      <a class="dropdown-item links" href="<?=base_url()?>DatosEmpresa"><i class="fa fa-sitemap" aria-hidden="true"></i> Datos de la empresa</a>
                      <a class="dropdown-item links" href="<?=base_url()?>sucursales"><i class="fa fa-bank" aria-hidden="true"></i> Sucursales</a>
                      <a class="dropdown-item links" href="<?=base_url()?>Root_user"><i class="fa fa-users" aria-hidden="true"></i> Usuarios del sistema</a>
                      <a class="dropdown-item links" href="<?=base_url()?>FormasPago"><i class="fa fa-money" aria-hidden="true"></i> Formas de pago </a>
                    </div>
                  </div>
                  <div class="dropdown">
                  <?php if (  $this->auth_role == 'manager' || $this->auth_role == 'admin'): ?>
                    <button type="button" class="btn nav-link links dropdown-toggle sp" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hover="dropdown">
                      Catálogo
                    </button>
                    <?php endif; ?>
                    <div class="dropdown-menu">
                      <a class="dropdown-item links" href="<?=base_url()?>cargos"><i class="fa fa-street-view" aria-hidden="true"></i> Cargos</a>
                      <a class="dropdown-item links" href="<?=base_url()?>Tiempo"><i class="fa fa-clock-o" aria-hidden="true"></i> Tiempos de entrega</a>
                      <a class="dropdown-item links" href="<?=base_url()?>transporte"><i class="fa fa-truck" aria-hidden="true"></i> Tipos de trasnporte</a>
                      <a class="dropdown-item links" href="<?=base_url()?>Itinerarios"><i class="fa fa-align-center" aria-hidden="true"></i> Itinerarios</a>
                      <a class="dropdown-item links" href="<?=base_url()?>Factores"><i class="fa fa-hashtag" aria-hidden="true"></i> Factores</a>
                      <a class="dropdown-item links" href="<?=base_url()?>TipoCarga"><i class="fa fa-dropbox" aria-hidden="true"></i> Tipos de carga</a>
                      <a class="dropdown-item links" href="<?=base_url()?>TiposEnvios"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Tipos de envío</a>
                      <a class="dropdown-item links" href="<?=base_url()?>Tarifas"><i class="fa fa-usd" aria-hidden="true"></i> Tabla de tarifas</a>
                      <a class="dropdown-item links" href="<?=base_url()?>SeguroCarga"><i class="fa fa-shield" aria-hidden="true"></i> Seguros de carga</a>
                      <a class="dropdown-item links" href="<?=base_url()?>CosteGuia"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Coste de guía</a>
                      <a class="dropdown-item links" href="<?=base_url()?>Trazabilidad"><i class="fa fa-location-arrow" aria-hidden="true"></i> Trazabilidad de la carga</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button type="button" class="btn nav-link links dropdown-toggle sp" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hover="dropdown">
                      Notas y Alertas
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item links" href="<?=base_url()?>Notas"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Notas</a>
                      <a class="dropdown-item links" href="<?=base_url()?>Alertas"><i class="fa fa-bell" aria-hidden="true"></i> Alertas</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button type="button" class="btn  nav-link links dropdown-toggle sp" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hover="dropdown">
                      Clientes y Proveedores
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item links" href="<?=base_url()?>Sedes"><i class="fa fa-paper-plane" aria-hidden="true"></i> Sedes Clientes</a>
                      <a class="dropdown-item links" href="<?=base_url()?>Clientes"><i class="fa fa-user-o" aria-hidden="true"></i> Clientes de la empresa</a>
                      <a class="dropdown-item links" href="<?=base_url()?>Remitentes"><i class="fa fa-terminal" aria-hidden="true"></i> Remitentes</a>
                      <a class="dropdown-item links"  href="<?=base_url()?>Proveedores"><i class="fa fa-car" aria-hidden="true"></i> Proveedores de transporte</a>
                      <a class="dropdown-item links"  href="<?=base_url()?>Satelites"><i class="fa fa-space-shuttle" aria-hidden="true"></i> Satélites</a>
                    </div>
                  </div>
                </div>
                </ul>
            </nav>

        </div>
      </div>
    </div>
    <div id="mySidenav2" class="sidenav">
      <a class="links" href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
      <div v-for="profiles in cart" class="card border-0" style="width: 100%;background:#293072!important;" style="background:#293072!important;">
        <img style="background:#293072!important;width:40%; float:center; margin-left: auto;margin-right: auto;"  class="card-img-top rounded-circle" :src="'<?=base_url();?>'+profiles.url_foto" alt="Card image cap">
        <div  class="card-body">
          <h5 class="card-title text-center text-white ">{{profiles.nombre}} {{profiles.apellido}}</h5>
          <h5 class="card-title text-white text-center lead">{{profiles.sucursal}}</h5>
          <h5 class="card-title text-white text-center lead">{{profiles.cargo}}</h5>

        </div>
      </div>
      <ul class="list-group">
        <li style="background:#293072!important;" class="border-bottom  text-warning  links list-group-item list-group-item-dark list-group-item d-flex justify-content-between align-items-center"   data-toggle="collapse" href="#collapse1">
          Cotizaciones y Planillas <i class="fa fa-bars" aria-hidden="true"></i>
        </li>
        <div class="panel panel-default">
          <div id="collapse1" class="panel-collapse collapse">
            <ul class="list-group sp">
              <li class="list-group-item"><a class="dropdown-item links" href="<?=base_url()?>Cotizador"><i class="fa fa-calculator" aria-hidden="true"></i> Cotizador</a></li>
              <li class="list-group-item" v-show="permisos.cotizaciones"><a class="dropdown-item links" href="<?=base_url()?>Cotizaciones"><i class="fa fa-calculator" aria-hidden="true"></i> Cotizaciones</a></li>
              <li class="list-group-item"v-show="permisos.cotizaciones"><a class="dropdown-item links" href="<?=base_url()?>Recalculadas"><i class="fa fa-calculator" aria-hidden="true"></i> Cotizaciones Recalculadas</a></li>
              <li class="list-group-item"v-show="permisos.planillas"><a class="dropdown-item links" href="<?=base_url()?>Liquidaciones"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i> Planillas De Liquidación</a></li>
            </ul>
          </div>
        </div>
        <li style="background:#293072!important;" class="border-bottom  text-warning  links list-group-item list-group-item-dark list-group-item d-flex justify-content-between align-items-center"   data-toggle="collapse" href="#collapse2">
          Guías De Cargas y Facturas   <i class="fa fa-bars" aria-hidden="true"></i>
        </li>
        <div class="panel panel-default">
          <div id="collapse2" class="panel-collapse collapse">
            <ul class="list-group sp">
              <li class="list-group-item" v-show="permisos.guiasNormales"><a class="dropdown-item links" href="<?=base_url()?>Guias"><i class="fa fa-road" aria-hidden="true"></i> Guías De Carga Clientes Normales</a></li>
              <li class="list-group-item"v-show="permisos.guiasEspeciales"><a class="dropdown-item links" href="<?=base_url()?>ClientesEspeciales"><i class="fa fa-road" aria-hidden="true"></i> Guías De Carga Clientes Especiales</a></li>
              <li class="list-group-item"v-show="permisos.facturas"><a class="dropdown-item links" href="<?=base_url()?>Facturas"><i class="fa fa-file-text" aria-hidden="true"></i> Facturas</a></li>
            </ul>
          </div>
        </div>
        <li style="background:#293072!important;" class="border-bottom text-warning   links list-group-item list-group-item-dark list-group-item d-flex justify-content-between align-items-center"   data-toggle="collapse" href="#collapse3">
          Centro De Descargas <i class="fa fa-bars" aria-hidden="true"></i>
        </li>
        <div class="panel panel-default">
          <div id="collapse3" class="panel-collapse collapse">
            <ul class="list-group sp">
              <li class="list-group-item"><a class="dropdown-item links" href="<?=base_url()?>Actas_entrega"><i class="fa fa-handshake-o" aria-hidden="true"></i> Actas de entrega</a></li>
              <li class="list-group-item"><a class="dropdown-item links" href="<?=base_url()?>Actas_recogida"><i class="fa fa-cubes" aria-hidden="true"></i> Actas de recogida</a></li>
              <li class="list-group-item"><a class=" links"  href="<?=base_url()?>Generados"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Documentos generados</a></li>
            </ul>
          </div>
        </div>
      </ul>

    </div>
    <div id="mySidenav" class="sidenav">
      <a class="links" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a class="links" href="#">Hola!</a>
        <div class="panel-group">

        </div>
          <div class="dropdown">
            <button type="button" class="btn  nav-link links dropdown-toggle sp" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hover="dropdown">
              Cotizaciones-Planillas
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item links"  href="<?=base_url()?>aparatologia"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Documentos especiales</a>
              <a class="dropdown-item links"  href="<?=base_url()?>aparatologia"><i class="fa fa-street-view" aria-hidden="true"></i> Planilla de liquidación</a>
            </div>
          </div>
          <div class="dropdown">
            <button type="button" class="btn  nav-link links dropdown-toggle sp" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hover="dropdown">
              Guías Cargas Factura
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item links" href="<?=base_url()?>remitentes"><i class="fa fa-file" aria-hidden="true"></i> Actas de entrega</a>
              <a class="dropdown-item links" href="<?=base_url()?>belleza-higiene"><i class="fa fa-file" aria-hidden="true"></i> Actas de recogidas</a>
              <a class="dropdown-item links"  href="<?=base_url()?>dermatologia"><i class="fa fa-file" aria-hidden="true"></i> Guías de carga</a>
              <a class="dropdown-item links"  href="<?=base_url()?>aparatologia"><i class="fa fa-file" aria-hidden="true"></i> Trazabilidad de carga</a>
              <a class="dropdown-item links"  href="<?=base_url()?>aparatologia"><i class="fa fa-file" aria-hidden="true"></i> Facturación</a>
            </div>
          </div>
          <div class="dropdown">
            <button type="button" class="btn  nav-link links dropdown-toggle sp" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hover="dropdown">
                Centro de descargas
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item links" href="<?=base_url()?>remitentes"><i class="fa fa-file" aria-hidden="true"></i> Archivos procesados</a>
            </div>
          </div>
          <div class="dropdown">
            <button type="button" class="btn  nav-link links dropdown-toggle sp" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hover="dropdown">
                Centro informativo
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item links" href="<?=base_url()?>remitentes"><i class="fa fa-file" aria-hidden="true"></i> Reportes</a>
            </div>
          </div>
    </div>
