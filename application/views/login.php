<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo '

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 d-none  d-sm-none d-md-none d-lg-block spl">
          <img src="include/svg/login.svg" alt="Chicago" width="100%" height="100%">
        </div>
';
if( ! isset( $optional_login ) )
{
   echo '
          <div class=" spl col-lg-6 col-md-12 col-sm-12 d-flex align-items-center">
            <div class="row">
              <div class="col-12 sp  ">
                <div class="container p-5 ">
                    <div class="rows sp">
                        <div class="col-md-12 p-5">
                            <img src="https://tvgcargo.com/wp-content/uploads/2017/01/tvg-cargo-logo.png" class="d-none d-sm-none d-md-none d-lg-block mx-auto" alt="logo" style="width:100%;">
                            <img src="https://tvgcargo.com/wp-content/uploads/2017/01/tvg-cargo-logo.png" class="d-block d-xs-block  mx-auto d-sm-block d-md-block d-lg-none" alt="logo" style="width:100%;">
                        </div>';
}

if( ! isset( $on_hold_message ) )
{
   if( isset( $login_error_mesg ) )
   {
      echo '
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>
               Login Error #'.$this->authentication->login_errors_count.'/'. config_item('max_allowed_attempts') . ': usuario o cotraseña incorrectas!!
            </strong>

         </div>
      ';
   }

   if( $this->input->get('logout') )
   {
      echo '
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>logout exitoso!!!</strong>
</div>
      ';
   }
   if( $this->input->get('regist') )
   {
      echo '
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Registro exitoso</strong>
</div>
      ';
   }
   $login_url= base_url('/login?redirect=user');
   echo form_open( $login_url, ['class' => 'user abs-center'] );
?>

   <div>
                        <div class="col-12 sp  justify-content-center align-self-center">
                          <div class="form-group">
                              <label class="sr-only" for="password">Email</label>
                              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                  <div class="input-group-addon "><span class="mbri-lock icon-login"></span></div>
                                  <input type="text" name="login_string" class="form-control " id="password"
                                         placeholder="Email"  id="login_string"  autocomplete="off" maxlength="255" value="<?php echo set_value('login_string'); ?>" required>
                              </div>
                             <?php echo form_error('email','<span class="text-danger align-middle"><i class="fa fa-close"></i>' ,'</span>');?>
                          </div>

                        </div>
                        <div class="col-12 sp  justify-content-center">
                          <div class="form-group">
                              <label class="sr-only" for="password">Password</label>
                              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                  <div class="input-group-addon"><span class="mbri-key icon-login"></span></div>
                                  <input type="password" name="login_pass" id="login_pass" class="form-control" id="password"
                                         placeholder="Password" <?php
         if( config_item('max_chars_for_password') > 0 )
            echo 'maxlength="' . config_item('max_chars_for_password') . '"';
      ?> autocomplete="off" readonly="readonly" onfocus="this.removeAttribute('readonly');"  required>
                              </div>

                          </div>
                                 <?php echo form_error('email','<span class="text-danger align-middle">
                  <i class="fa fa-close"></i>' ,'</span>');?>
                        </div>







 <input type="submit" class="btn btn boton_4" name="submit" value="Iniciar Sesión" id="submit_button"/>
      <?php
         if( config_item('allow_remember_me') )
         {
      ?>

         <br />

         <label for="remember_me" class="form_label btn head_body">Recuerdame</label>
         <input type="checkbox" id="remember_me" name="remember_me" value="yes" />

      <?php
         }
      ?>

      <p>
         <?php
            $link_protocol = USE_SSL ? 'https' : NULL;
         ?>
         <a class="btn" href="<?php echo site_url('/home/recover', $link_protocol); ?>">
            ¿Olvidaste tu contraseña?
         </a>
      </p>
          ¿No tienes una cuenta? <a class="btn" href="<?php echo site_url('/home/registe', $link_protocol); ?>">
            Regístrate
         </a>
   </div>
</form>

<?php

   }
   else
   {
      // EXCESSIVE LOGIN ATTEMPTS ERROR MESSAGE
      echo '


            <p>
              Su acceso al inicio de sesión y recuperación de la cuenta ha sido bloqueado durante  ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutos.
            </p>
            <p>
               Utilice la recuperación de la cuenta después de que hayan transcurrido' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutos<br />
               o comuníquese con nosotros si necesita ayuda para obtener acceso a su cuenta..
            </p>
         <div class="sidenav">

      </div>
      ';
   }
