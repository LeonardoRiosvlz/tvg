    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 d-none  d-sm-none d-md-none d-lg-block spl">
          <img src="<?php echo base_url('../include/svg/login.svg');?>" alt="Chicago" width="100%" height="100%">
        </div>
          <div class=" spl col-lg-6 col-md-12 col-sm-12 d-flex align-items-center">
            <div class="row">
              <div class="col-12 sp  ">
                <div class="container p-5 ">
                    <div class="rows sp">
                        <div class="col-md-12 sp">
                            <img src="<?php echo base_url('../include/img/Logotipo.jpg');?>" class="d-none d-sm-none d-md-none d-lg-block" alt="logo" style="width:100%;">
                            <img src="<?php echo base_url('../include/img/Imagotipo.jpg');?>" class="d-block d-xs-block  d-sm-block d-md-block d-lg-none" alt="logo" style="width:100%;">
                        </div>
                        <h2 class="head_body text-center">Registrarse</h2>
                        <h5 class="text-center">¿Ya tienes una cuenta? <a href="/login" class="head_body btn"><b>Inicia Sesión</b></a></h5>
                       <form class="user abs-center" method="POST" action="/home/registe/action">
                        <div class="col-12 sp justify-content-center">
                          <div class="form-group">
                              <label class="sr-only" for="password">Nick name</label>
                              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                  <div class="input-group-addon "><span class="mbri-user icon-login"></span></div>
                                  <input type="text" id="exampleFirstName" name="username" value="<?php echo set_value('username'); ?>" class="form-control "
                                         placeholder="Nombre de usuario" required>
                              </div>
                              <?php echo form_error('username','<span class="text-danger align-middle"><i class="fa fa-close"></i>' ,'</span>');?>
                          </div>

                        </div>
                          
                        <div class="col-12 sp justify-content-center">
                          <div class="form-group">
                              <label class="sr-only" for="password">Email</label>
                              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                  <div class="input-group-addon "><span class="mbri-letter icon-login"></span></div>
                                  <input type="text" id="exampleInputEmail" name="email"  value="<?php echo set_value('email'); ?>"class="form-control "
                                         placeholder="Nombre de usuario" required>
                              </div>
                    <?php echo form_error('email','<span class="text-danger align-middle"><i class="fa fa-close"></i>' ,'</span>');?>
                          </div>

                        </div>
                                             
                        <div class="col-12 sp justify-content-center">
                          <div class="form-group">
                              <label class="sr-only" for="password">Password</label>
                              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                  <div class="input-group-addon"><span class="mbri-key icon-login"></span></div>
                                  <input class="form-control" type="password" id="exampleInputPassword" name="passwd"    value="<?php echo set_value('passwd'); ?>"
                                         placeholder="Contraseña" required>
                              </div>
                          </div>
                                <?php echo form_error('passwd','<span class="text-danger align-middle">
                  <i class="fa fa-close"></i>' ,'</span>');?>
                        </div>

                        <div class="col-12 sp justify-content-center">
                          <div class="form-group">
                              <label class="sr-only" for="password">re-Password</label>
                              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                  <div class="input-group-addon"><span class="mbri-key icon-login"></span></div>
                                  <input class="form-control " type="password" id="exampleRepeatPassword" name="re_passwd"  value="<?php echo set_value('re_passwd'); ?>"
                                         placeholder="Confrima la contraseña" required>
                              </div>
                          </div>
                            <?php echo form_error('re_passwd','<span class="text-danger align-middle"><i class="fa fa-close"></i>' ,'</span>');?>
                        </div>
                                        <div class=" form-group input-group align-items-center text-center">
                <button type="submit" class="btn btn boton_4 ">Continuar</button> 
                

                </div>
                </div>
              </form> 
                    </div>

                </div>
              </div>
            </div>
          </div>
      </div>
      </div>    
<h2 class="head_body text-center">Registrarse</h2>
     <h5 class="text-center">¿Ya tienes una cuenta? <a href="/login" class="head_body btn"><b>Inicia Sesión</b></a></h5>
              <form class="user abs-center" method="POST" action="/home/registe/action">
                <div>




    <div class="group">                   
      <input  class="align-items-center  no-border" id="exampleInputEmail" name="email"  value="<?php echo set_value('email'); ?>"  required>   
      <span class="highlight"></span>
      <span class="bar"></span>
      <label class="label"><i class="fa fa-envelope " ></i> Email</label>                
      <?php echo form_error('email','<span class="text-danger align-middle"><i class="fa fa-close"></i>' ,'</span>');?>
    </div>
        <div class="group">   
      <input type="password" class="align-items-center  no-border" id="exampleInputPassword" name="passwd"    value="<?php echo set_value('passwd'); ?>" required>     
      <span class="highlight"></span>
      <span class="bar"></span>
      <label class="label"><i class="fa fa-lock "></i> Contraseña</label>                
      <?php echo form_error('passwd','<span class="text-danger align-middle">
                  <i class="fa fa-close"></i>' ,'</span>');?>
    </div>

    <div class="group">                    
      <input type="password" class="align-items-center  no-border" id="exampleRepeatPassword" name="re_passwd"  value="<?php echo set_value('re_passwd'); ?>" required>      
      <span class="highlight"></span>
      <span class="bar"></span>
      <label class="label"><i class="fa fa-lock "></i> Confirmar Contraseña</label>                   
      <?php echo form_error('re_passwd','<span class="text-danger align-middle"><i class="fa fa-close"></i>' ,'</span>');?>
    </div>



                  

                
                 <div class=" form-group input-group align-items-center text-center">
                <button type="submit" class="btn btn boton_4 ">Continuar</button> 
                

                </div>
                </div>
              </form>     
       </div>
         </div>
      </div>



      </div>
           <div class="sidenav">

      </div>
        </div>
      </div>
    </div>
  </div>
 
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover('show');   
});
</script>
                   <div class="invalid-feedback">
        Please provide a valid state.
      </div>