
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
                  <li class="nav-item">
                    <a class="dropdown-item links" href="<?=base_url()?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Salir</a>
                  </li>

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
                  <li class="nav-item">
                    <a class="dropdown-item links" href="<?=base_url()?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Salir</a>
                  </li>
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
              <li class="list-group-item"><a class="dropdown-item links" href="<?=base_url()?>Cotizaciones"><i class="fa fa-calculator" aria-hidden="true"></i> Cotizaciones</a></li>
              <li class="list-group-item"><a class="dropdown-item links" href="<?=base_url()?>Recalculadas"><i class="fa fa-calculator" aria-hidden="true"></i> Cotizaciones Recalculadas</a></li>
              <li class="list-group-item"><a class="dropdown-item links" href="<?=base_url()?>Liquidaciones"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i> Planillas De Liquidación</a></li>
            </ul>
          </div>
        </div>
        <li style="background:#293072!important;" class="border-bottom  text-warning  links list-group-item list-group-item-dark list-group-item d-flex justify-content-between align-items-center"   data-toggle="collapse" href="#collapse2">
          Guías De Cargas y Facturas   <i class="fa fa-bars" aria-hidden="true"></i>
        </li>
        <div class="panel panel-default">
          <div id="collapse2" class="panel-collapse collapse">
            <ul class="list-group sp">
              <li class="list-group-item"><a class="dropdown-item links" href="<?=base_url()?>Guias"><i class="fa fa-road" aria-hidden="true"></i> Guías De Carga Clientes Normales</a></li>
              <li class="list-group-item"><a class="dropdown-item links" href="<?=base_url()?>ClientesEspeciales"><i class="fa fa-road" aria-hidden="true"></i> Guías De Carga Clientes Especiales</a></li>
              <li class="list-group-item"><a class="dropdown-item links" href="<?=base_url()?>Facturas"><i class="fa fa-file-text" aria-hidden="true"></i> Facturas</a></li>
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
