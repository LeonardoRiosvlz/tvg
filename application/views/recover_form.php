<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - Recover Form View
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2016, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TVGCARGOS S.A.S</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('../include/vendor/fontawesome-free/css/all.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('../include/css/bootstrap.css');?>">
<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo base_url('../include/css/flags.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('../include/css/main.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('../include/css/mobirise/style.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  	<link rel="stylesheet" href="<?php echo base_url('include/plugins/datatables-bs4/css/dataTables.bootstrap4.css'); ?>">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Anton&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- vue js---->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script src="https://unpkg.com/vee-validate@<3.0.0"></script>
    <link href="https://cdn.jsdelivr.net/npm/flatpickr@4/dist/flatpickr.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4/dist/flatpickr.min.js"></script>
    <!-- Lastly add this package -->
    <script src="https://cdn.jsdelivr.net/npm/vue-flatpickr-component@8"></script>
    <script type="text/javascript" src="https://checkout.epayco.co/checkout.js">   </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js" integrity="sha256-Qfxgn9jULeGAdbaeDjXeIhZB3Ra6NCK3dvjwAG8Y+xU=" crossorigin="anonymous"></script>
    <title>TECNOVITAL</title>
</head>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 d-none  d-sm-none d-md-none d-lg-block spl">
      <img src="<?=base_url();?>include/svg/login.svg" alt="Chicago" width="100%" height="100%">
    </div>
    <div class=" spl col-lg-6 col-md-12 col-sm-12 d-flex align-items-center">
      <div class="row">
        <div class="col-12 sp  ">
          <div class="container p-5 ">
              <div class="rows sp">
                  <div class="col-md-12 sp">
                    <a href="<?=base_url()?>"> <img src="<?=base_url();?>include/img/tvg-cargo-logo.png" class="d-none d-sm-none d-md-none d-lg-block mx-auto"  alt="logo" style="width:60%;"></a>
                    <a href="<?=base_url()?>">  <img src="<?=base_url();?>include/img/tvg-cargo-logo.png" class="d-block d-xs-block  d-sm-block d-md-block d-lg-none mx-auto" alt="logo" style="width:60%;"></a>

<?php
if( isset( $disabled ) )
{
	echo '
			<p class="small">

        Si ha excedido los intentos de inicio de sesión máximos, o excedió
      el número permitido de intentos de recuperación de contraseña, recuperación de cuenta
      será deshabilitado por un corto período de tiempo.
      por favor espera' . ( (int) config_item('seconds_on_hold') / 60 ) . '
				minutos.
			</p>
	';
}
else if( isset( $banned ) )
{
	echo '
			<p class="small">
      Ha intentado usar el sistema de recuperación de contraseña usando
      una dirección de correo electrónico que pertenece a una cuenta que ha sido
      denegó deliberadamente el acceso a las áreas autenticadas de este sitio web.
      Si cree que esto es un error, puede contactarnos
      para hacer una consulta sobre el estado de la cuenta.
			</p>

	';
}
else if( isset( $confirmation ) )
{
	echo '
    <p class="lead">Enviamos un correo con el enlace de recuperación de contraseña</p>
	';
}
else if( isset( $no_match ) )
{
	echo '
		<div >
			<p class="small text-danger">
          El correo electrónico suministrado no coincide con ningún registro.
			</p>
		</div>
	';

	$show_form = 1;
}
else
{
	echo '
		<p class="small">

    Si ha olvidado su contraseña y / o nombre de usuario, ingrese la dirección de correo electrónico utilizada para su cuenta y le enviaremos un correo electrónico con instrucciones sobre cómo acceder a su cuenta.
		</p>
	';

	$show_form = 1;
}
if( isset( $show_form ) )
{
	?>

		 <?php echo form_open(); ?>
			<div >
				<fieldset>
					<label>Ingrese la dirección de correo electrónico de su cuenta:</label>
					<div>

						<?php
							// EMAIL ADDRESS *************************************************
							echo form_label('Email','email', ['class'=>'form_label'] );

							$input_data = [
								'name'		=> 'email',
								'id'		=> 'email',
								'class'		=> 'form_input form-control',
								'maxlength' => 255
							];
							echo form_input($input_data);
						?>

					</div>
				</fieldset>
				<div>
					<div>

						<?php
							// SUBMIT BUTTON **************************************************************
							$input_data = [
								'name'  => 'submit',
                'class'  => 'btn btn-light links my-1',
								'id'    => 'submit_button',
								'value' => 'Enviar Email'
							];
							echo form_submit($input_data);
						?>

					</div>
				</div>
			</div>
		</form>
  </div>
</div>
  </div>
</div>
<div class="sidenav">
sas
</div>
</div></div>
</div>
</div>

	<?php
}
