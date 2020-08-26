<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - Choose Password Form View
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
    <title>TECNOVITAL</title>
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
                    <a href="<?=base_url()?>"> <img src="<?=base_url();?>include/img/Itipo.jpg" class="d-none d-sm-none d-md-none d-lg-block mx-auto"  alt="logo" style="width:60%;"></a>
                    <a href="<?=base_url()?>">  <img src="<?=base_url();?>include/img/Imagotipo.jpg" class="d-block d-xs-block  d-sm-block d-md-block d-lg-none mx-auto" alt="logo" style="width:60%;"></a>

<?php

$showform = 1;

if( isset( $validation_errors ) )
{
	echo '
		<div style="border:1px solid red;">
			<p>
        Se produjo el siguiente error al cambiar su contraseña:
			</p>
			<ul>
				' . $validation_errors . '
			</ul>
			<p>
        CONTRASEÑA NO ACTUALIZADA
			</p>
		</div>
	';
}
else
{
	$display_instructions = 1;
}

if( isset( $validation_passed ) )
{
	echo '
		<div style="border:1px solid green;">
			<p>
        Has cambiado satisfactoriamente tu contraseña.
			</p>
			<p>
				Tu puedes ahora<a href="/' . LOGIN_PAGE . '"> Iniciar Sesión</a>
			</p>
		</div>
	';

	$showform = 0;
}
if( isset( $recovery_error ) )
{
	echo '
		<div >
			<p class="links">
        Los enlaces de recuperación de cuenta caducan después de
				' . ( (int) config_item('recovery_code_expiration') / ( 60 * 60 ) ) . '
				hours.<br />Necesitará usar el
				<a href="/examples/recover">Account Recovery</a> form
				para enviarte un nuevo enlace.
			</p>
		</div>
	';

	$showform = 0;
}
if( isset( $disabled ) )
{
	echo '
		<div style="">
			<p class="links">
      Ha excedido los intentos de inicio de sesión máximos o ha excedido el
      número permitido de intentos de recuperación de contraseña.
      por favor espera' . ( (int) config_item('seconds_on_hold') / 60 ) . '
				minutos, o contáctenos si necesita ayuda para acceder a su cuenta.
			</p>
		</div>
	';

	$showform = 0;
}
if( $showform == 1 )
{
	if( isset( $recovery_code, $user_id ) )
	{
		if( isset( $display_instructions ) )
		{
			if( isset( $username ) )
			{
				echo '<p class="links tex-center">
					Su nombre de usuario es <i>' . $username . '</i><br />
					Por favor escriba su nueva contraseña, y cambie su password ahora:
				</p>';
			}
			else
			{
				echo '<p class="links">Por favor cambie su password ahora:</p>';
			}
		}

		?>
			<div id="form">
				<?php echo form_open(); ?>
					<fieldset>
						<legend class="links">Step 2 - Escriba su nueva contraseña</legend>
						<div>

							<?php
								// PASSWORD LABEL AND INPUT ********************************
								echo form_label('Password','passwd', ['class'=>'form_label links']);

								$input_data = [
									'name'       => 'passwd',
									'id'         => 'passwd',
									'class'      => 'form_input password form-control',
									'max_length' => config_item('max_chars_for_password')
								];
								echo form_password($input_data);
							?>

						</div>
						<div>

							<?php
								// CONFIRM PASSWORD LABEL AND INPUT ******************************
								echo form_label('Confirmar Password','passwd_confirm', ['class'=>'form_label links']);

								$input_data = [
									'name'       => 'passwd_confirm',
									'id'         => 'passwd_confirm',
									'class'      => 'form_input password form-control',
									'max_length' => config_item('max_chars_for_password')
								];
								echo form_password($input_data);
							?>

						</div>
					</fieldset>
					<div>
						<div>

							<?php
								// RECOVERY CODE *****************************************************************
								echo form_hidden('recovery_code',$recovery_code);

								// USER ID *****************************************************************
								echo form_hidden('user_identification',$user_id);

								// SUBMIT BUTTON **************************************************************
								$input_data = [
									'name'  => 'form_submit',
									'id'    => 'submit_button',
                  'class'    => 'links btn btn-ligth my-3',
									'value' => 'Cambiar Password'
								];
								echo form_submit($input_data);
							?>

						</div>
					</div>
				</form>
			</div>



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
}
/* End of file choose_password_form.php */
/* Location: /community_auth/views/examples/choose_password_form.php */
