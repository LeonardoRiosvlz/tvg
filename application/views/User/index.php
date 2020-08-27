<div class="container">
  <div class="row">
    <div class="col-lg-12 my-5 ">
      <!-- Shopping cart table -->
      <table id="example2" class="table">
        <thead>
          <tr>
            <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                <div class="bg-light rounded-pill px-4 text-uppercase font-weight-bold links">Gestió de usuarios <i class="fa fa-users" aria-hidden="true"></i></div>
            </th>
          </tr>
          <tr>
            <th scope="col" colspan="5" class="border-0 bg-white  text-center">
              <button type="button" @click="resete();ver=false" class="btn btn-block btn-light btn-sm links" >Agregar <span class="mbri-plus"></span></button>
            </th>
          </tr>
        </thead>
      </table>
                        <div class="table-responsive ">
                          <table class="table" id="example1" class="table ">
                            <thead>
                              <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Detalles</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="(profile, index) in profiles">
                                <th class="links">{{profile.nombre}} {{profile.apellido}}</th>
                                <td class="links">{{profile.cedula}}</td>
                                <td class="links"><span >{{profile.created_at}}</span></td>
                                <td v-if="profile.banned==='1'" class="links"><span class="badge badge-danger">Baneado</span></td>
                                <td v-else><span class="badge badge-success">Activo</span></td>
                                <td>
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-default">Action</button>
                                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                        <div class="dropdown-menu" role="menu">
                                          <a class="dropdown-item" href="#"@click="setear(index);ver=true">Ver</a>
                                          <a class="dropdown-item" href="#" @click="setear(index);ver=false">Editar</a>
                                          <a class="dropdown-item" href="#" @click="eliminar(index)">Eliminar</a>
                                        </div>
                                      </button>
                                  </div>
                                </td>
                             </tr>
                            </tbody>
                          </table>
                        </div>
      <!-- End -->
    </div>
  </div>
  <!-- Modal -->

          <!-- Modal agregar   -->
          <div class="modal fade" id="modal-lg" data-backdrop="static" data-keyboard="false">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header">
                 <h4 class="modal-title links">Gestió de usuarios <i class="fa fa-users" aria-hidden="true"></i></h4>
                 <button type="button" @click="resete()" class="close" data-dismiss="modal" aria-label="Close">
                   <span class="mbri-close " ></span>
                 </button>
               </div>
               <div class="modal-body">
           <!-- Incio de formulario -->
                 <div class="card-body">
                         <form role="form" id="form" @submit.prevent="validateBeforeSubmit">
                           <table class="table">
                             <thead>
                               <tr>
                                 <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                                     <div class="bg-primary text-white rounded-pill px-4 py-1 text-uppercase font-weight-bold links">Perfíl de usuario <i class="fa fa-user" aria-hidden="true"></i></div>
                                 </th>
                               </tr>
                             </thead>
                           </table>
                           <table class="table">
                             <thead>
                               <tr>
                                 <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                                     <div class="bg-light rounded-pill px-4  text-uppercase font-weight-bold links">Información general <i class="fa fa-user" aria-hidden="true"></i></div>
                                 </th>
                               </tr>
                             </thead>
                           </table>
                           <div class="row">
                             <div class="col-12">
                                <div class="row justify-content-center">
                                  <div class="card col-md-6 col-sm-12 ">
                                    <div class="card-body  align-self-center">
                                      <h3 class="lead text-center">{{form.nombre}} {{form.apellido}}</h3>
                                    </hr>
                                      <img :src="'<?=base_url();?>'+form.url_foto" v-if="form.url_foto" alt="" class="mx-auto  img-fluid">
                                      <img v-else  src="<?=base_url();?>/include/img/avatar.png"  alt="" class="mx-auto  img-fluid">
                                      <div class="form-group" v-if="editMode">
                                              <input type="file"   id="image" name="image">
                                       </div>
                                       <div v-else class="form-group">
                                              <input type="file" v-validate="'required'"  id="image" name="image">
                                              <p class="text-danger my-1 small" v-if="(errors.first('image'))" >  Este dato es requerido  </p>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12 ">
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <label class="links">Sucursal</label>
                                        <div class="form-group">
                                          <select v-model="form.sucursal" v-validate="'required'"  name="sucursal" class="form-control" :disabled="ver" >
                                           <option value=""></option>
                                            <option v-for="sucursales in sucursales" :value="sucursales.nombre_sucursal">{{sucursales.nombre_sucursal}}</option>
                                          </select>
                                          <p class="text-danger my-1 small" v-if="(errors.first('sucursal'))" >  Este dato es requerido  </p>
                                        </div>
                                      </div>
                                      <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                          <label class="links">Nombre</label>
                                           <input type="text" v-model="form.nombre" v-validate="'required|alpha_spaces'" name="nombre" class="form-control form-control-lg" id="" :disabled="ver">
                                          <p class="text-danger my-1 small" v-if="(errors.first('nombre'))" >  Este dato es requerido  </p>
                                        </div>
                                      </div>
                                      <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                          <label class="links">Apellido</label>
                                           <input type="text" v-model="form.apellido" v-validate="'required|alpha_spaces'" name="apellido" class="form-control form-control-lg" id="" :disabled="ver">
                                          <p class="text-danger my-1 small" v-if="(errors.first('apellido'))" >  Este dato es requerido  </p>
                                        </div>
                                      </div>
                                      <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                          <label class="links">Cedula</label>
                                           <input type="text" v-model="form.cedula" @change="check_cedula()" v-validate="'required|numeric'" name="cedula" class="form-control form-control-lg" id="" :disabled="ver">
                                          <p class="text-danger my-1 small" v-if="(errors.first('cedula'))" >  Este dato es requerido  </p>
                                        </div>
                                      </div>
                                      <div class="col-sm-12">
                                        <label class="links">Cargo</label>
                                        <div class="form-group">
                                          <select v-model="form.cargo" v-validate="'required'"  name="cargo" class="form-control" :disabled="ver" >
                                           <option value=""></option>
                                            <option v-for="cargos in cargos" :value="cargos.nombre_cargo">{{cargos.nombre_cargo}}</option>
                                          </select>
                                          <p class="text-danger my-1 small" v-if="(errors.first('cargo'))" >  Este dato es requerido  </p>
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                          <label class="links">Teléfono personal</label>
                                           <input type="text" v-model="form.telefono_personal" v-validate="'required|numeric'" name="telefono_personal" class="form-control form-control-lg" id="" :disabled="ver">
                                          <p class="text-danger my-1 small" v-if="(errors.first('telefono_personal'))" >  Este dato es requerido  </p>
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                          <label class="links">Teléfono corporativo</label>
                                           <input type="text" v-model="form.telefono_corporativo" v-validate="'required|numeric'" name="telefono_corporativo" class="form-control form-control-lg" id="" :disabled="ver">
                                          <p class="text-danger my-1 small" v-if="(errors.first('telefono_corporativo'))" >  Este dato es requerido  </p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                             </div>
                               <div class="col-sm-12">
                                 <table class="table">
                                   <thead>
                                     <tr>
                                       <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                                           <div class="bg-light rounded-pill px-4  text-uppercase font-weight-bold links">Información del sistema <i class="fa fa-tachometer" aria-hidden="true"></i></div>
                                       </th>
                                     </tr>
                                   </thead>
                                 </table>
                               </div>
                               <div class="col-6">
                                 <!-- textarea -->
                                 <div class="form-group">
                                   <label class="links">Email</label>
                                    <input type="text" v-model="form.email" @change="check_email()" v-validate="'required|email'" name="email" class="form-control form-control-lg" id="" :disabled="ver|| editMode">
                                   <p class="text-danger my-1 small" v-if="(errors.first('email'))" >  Este dato es requerido  </p>
                                 </div>
                               </div>
                               <div class="col-6">
                                 <!-- textarea -->
                                 <div class="form-group">
                                   <label class="links">Nombre de usuario</label>
                                    <input type="text" v-model="form.username" @change="check_nick()" v-validate="'required|alpha_dash'" name="username" class="form-control form-control-lg" id="" :disabled="ver">
                                   <p class="text-danger my-1 small" v-if="(errors.first('username'))" >  Este dato es requerido /no usar espacios </p>
                                 </div>
                               </div>
                               <div class="col-sm-6">
                                 <label class="links">Rol</label>
                                 <div class="form-group">
                                   <select v-model="form.auth_level" v-validate="'required'"  name="auth_level" class="form-control" :disabled="ver" >
                                    <option value="9">SUPER ADMINISTRADOR</option>
                                    <option value="6">ADMINISTRADOR</option>
                                    <option value="1">LOGISTICO</option>
                                   </select>
                                   <p class="text-danger my-1 small" v-if="(errors.first('auth_level'))" >  Este dato es requerido  </p>
                                 </div>
                               </div>
                               <div class="col-sm-6">
                                 <label class="links">Estado</label>
                                 <div class="form-group">
                                   <select v-model="form.banned" v-validate="'required'"  name="banned" class="form-control" :disabled="ver" >
                                    <option value="0">Activo</option>
                                    <option value="1">Banear</option>
                                   </select>
                                   <p class="text-danger my-1 small" v-if="(errors.first('banned'))" >  Este dato es requerido  </p>
                                 </div>
                               </div>

                              </div>
                             <button v-if="editMode===false"  class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
                             <button v-if="editMode===true && !ver"  class="btn btn-primary btn-lg btn-block" type="submit">Editar</button>
                         </form>
                       </div>
           <!-- Fin del formulario -->
               </div>
             </div>
             <!-- /.modal-content -->
           </div>
           <!-- /.modal-dialog -->
          </div>
        <!-- fin del modal -->

  <!-- The Modal -->
   <div class="modal fade" id="myModal">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
           <h4 class="modal-title links">Datos personales</h4>
           <button type="button" class="close" data-dismiss="modal"><span class="mbri-close"></span></button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
           <div class="row">
               <div class="col-5">
                   <div class="card">
                       <div class="card-body">
                           <div class="row">
                               <div class="col-12 ">
                                   <h3 class="mb-0 text-truncated links">{{form.nombre}} {{form.apellido}}</h3>
                                   <hr>

                               </div>
                               <div class="col-12  text-center">
                                   <img :src="'<?=base_url();?>'+form.foto" alt="" class="mx-auto rounded-circle img-fluid">
                                   <br>
                               </div>
                               <div class="col-12"  v-if="form.profesional==='Si'">
                                   <button class="btn btn-block links" @click="habilitar(1)"><span class="mbri-success " ></span> Habilitar</button>
                                   <button class="btn btn-block links" @click="habilitar(0)"><span class="mbri-close " ></span> Rechazar</button>
                               </div>
                               <div class="col-12">
                                 <button v-if="form.banned==='0'" class="btn btn-block btn-danger links" @click="banear(1)"><span class="mbri-close " ></span> Banear </button>
                                 <button v-if="form.banned==='1'" class="btn btn-block btn-success links" @click="banear(0)"><span class="mbri-ok " ></span> Desbanear</button>
                               </div>
                               <!--/col-->
                           </div>
                           <!--/row-->
                       </div>
                       <!--/card-block-->
                   </div>
               </div>

           <div class="col-7 bg-white rounded shadow-sm ">

             <!-- Shopping cart table -->
             <div class="table table-responsive ">
               <table class="table">
                 <tbody>
                   <tr>
                     <th scope="col" colspan="4" class="border-0 bg-white  text-center">
                         <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold links">Datos personales</div>
                     </th>
                   </tr>
                   <tr>
                     <td class="  align-middle"><span class="mbri-edit" style="font-size: 1.6em"></span> Nombre</td>
                     <td class="  align-middle">{{form.nombre}} {{form.apellido}}</td>
                   </tr>
                   <tr v-if="form.profesional==='Si'">
                     <td class="  align-middle"><span class="mbri-edit" style="font-size: 1.6em"></span> Nombre Empresa</td>
                     <td class="  align-middle">{{form.nombre_empresa}}</td>
                   </tr>
                   <tr>
                     <td class="  align-middle"><span class="mbri-mobile2" style="font-size: 1.6em"></span> Telefono</td>
                     <td class="  align-middle">{{form.telefono}}</td>
                   </tr>
                    <tr v-if="form.profesional==='Si'">
                     <td class="  align-middle" ><span class="mbri-mobile2" style="font-size: 1.6em"></span> Telefono Empresa</td>
                     <td class="  align-middle">{{form.telefono_empresa}}</td>
                   </tr>
                   <tr >
                     <td class="  align-middle"><span class="mbri-delivery" style="font-size: 1.6em"></span> Dirección de facturación</td>
                     <td class="  align-middle">{{form.direccion_facturacion}}</td>
                   </tr>
                   <tr v-if="form.profesional==='Si'">
                     <td class="  align-middle"><span class="mbri-delivery" style="font-size: 1.6em"></span> Dirección de empresa</td>
                     <td class="  align-middle">{{form.direccion_empresa}}</td>
                   </tr>
                   <tr >
                     <td class="  align-middle"><span class="mbri-delivery" style="font-size: 1.6em"></span> Dirección de envío</td>
                     <td class="  align-middle">{{form.direccion_envio}}</td>
                   </tr>
                 </tbody>
               </table>
             </div>
             <!-- End -->
             <h3 class="links" v-if="form.profesional==='Si'">Documentos de acreditación</h3>
             <div class="row" v-if="form.profesional==='Si'">
               <div v-for="(img ,index) in documentos" class="card col-lg-4 col-md-6 col-sm-12 col-xs-12 m-3 pr-3 py-3 border-0" >
                   <a :href="'<?=base_url();?>'+img.url_documento" class="card-img-top" download="documento" alt="..."><span class="mbri-file" style="font-size:7em"></span></a>
                 </div>
             </div>
           </div>
         </div>
         </div>


         <!-- Modal footer -->


       </div>
     </div>
   </div>
</div>

</div>
<script>
     axios.defaults.baseURL = '<?PHP echo base_url(); ?>';
     Vue.use(VeeValidate ,{locale: 'vi'});
     new Vue({
       el: '#app',
       data: {
         profiles:[],
         cargos:[],
         sucursales:[],
         editMode:false,
         ver:false,
         form:{
             'email':'',
             'banned':'',
             'auth_level':'',
             'username':'',
             'user_id':'',
             'nombre':'',
             'apellido':'',
             'cedula':'',
             'cargo':'',
             'datos':[{
               'sucursal':'',
             }],
             'url_foto':''
         },
       },
       methods: {
         check_email(index){
           for (var i = 0; i < this.profiles.length; i++) {
             if ( this.profiles[i].email===this.form.email) {
               Swal.fire({
                 type: 'error',
                 title: 'Lo sentimos',
                 text: 'Este email esta en uso'
               });
               this.form.email="";
             }
           }
         },
         check_nick(index){
           for (var i = 0; i < this.profiles.length; i++) {
             if ( this.profiles[i].username===this.form.username) {
               Swal.fire({
                 type: 'error',
                 title: 'Lo sentimos',
                 text: 'Este nombre esta en uso'
               });
               this.form.username="";
             }
           }
         },
         check_cedula(index){
           for (var i = 0; i < this.profiles.length; i++) {
             if ( this.profiles[i].cedula===this.form.cedula) {
               Swal.fire({
                 type: 'error',
                 title: 'Lo sentimos',
                 text: 'Esta cedula ya esta en uso'
               });
               this.form.cedula="";
             }
           }
         },
           resete(){
             this.form.user_id="";
             this.form.banned="";
             this.form.auth_level="";
             this.form.email="";
             this.form.username="";
             this.form.url_foto="";
             this.form.cedula="";
             this.form.apellido="";
             this.form.nombre="";
             this.form.cargo="";
             this.form.telefono_personal="";
             this.form.telefono_corporativo="";
             this.form.sucursal="";
             this.editMode=false;
               this.$validator.reset();
               document.getElementById("form").reset();

               console.log("asdasd");
               $('#modal-lg').modal('show');
           },
           validateBeforeSubmit() {
                   this.$validator.validateAll().then((result) => {
                     if (result) {
                       let data = new FormData();
                       this.file_data = $('#image').prop('files')[0];
                       data.append('files', this.file_data);
                       data.append('service_form',JSON.stringify(this.form));
                     if(!this.editMode){
                       axios.post('index.php/Root_user/insertar',data)
                       .then(response => {
                         if(response.data.status == 200){
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Agregado con exito'
                           })
                            $('#modal-lg').modal('hide');
                           this.loadProfiles();
                           this.reset();
                         }
                         else{
                           Swal.fire({
                             type: 'error',
                             title: 'Lo sentimos',
                             text: 'Ha ocurrido un error'
                           })
                         }
                       })
                     }
                     else{
                       if (!$('#image').val()) {
                         axios.post('index.php/Root_user/editar',data)
                         .then(response => {
                           if(response.data.status == 200)
                           {
                             $('#myModal').modal('hide');
                             this.loadProfiles();
                             Swal.fire({
                               type: 'success',
                               title: 'Exito!',
                               text: 'Editado correctamente'
                            })
                            this.editMode=false;
                           $('#modal-lg').modal('hide');
                           }
                           else{
                             Swal.fire({
                               type: 'error',
                               title: 'Lo sentimos',
                               text: 'Ha ocurrido un error'
                             })
                           }
                         })
                       }else {
                         this.file_data = $('#image').prop('files')[0];
                         data.append('files', this.file_data);
                         axios.post('index.php/Root_user/editar_img',data)
                         .then(response => {
                           if(response.data.status == 200)
                           {
                             $('#modal-lg').modal('hide');
                             this.loadProfiles();
                             Swal.fire({
                               type: 'success',
                               title: 'Exito!',
                               text: 'Editado correctamente'
                            })
                            this.editMode=false;
                            $('#modal-lg').modal('hide');
                           }
                           else{
                             Swal.fire({
                               type: 'error',
                               title: 'Lo sentimos',
                               text: 'Ha ocurrido un error'
                             })
                           }
                         })
                       }
                     }
                     return;
                     }

                     Swal(
                       'Error',
                       'Debes llenar todos los datos.',
                       'warning'
                     );
                   });
                 },
                 eliminar(index){
                   Swal({
                     title: '¿Estás seguro?',
                     text: "¡ será eliminado para siempre!",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonText: '¡Si! ¡eliminar!',
                     cancelButtonText: '¡No! ¡cancelar!',
                     reverseButtons: true
                   }).then((result) => {
                     if (result.value) {
                       let data = new FormData();
                       data.append('id',this.profiles[index].user_id);
                         axios.post('index.php/Root_user/eliminar',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Eliminado!',
                               'Ha sido eliminado.',
                               'success'
                             ).then(response => {
                                   this.loadProfiles();
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                               this.loadProfiles();
                             })
                           }
                         })
                     } else if (
                       result.dismiss === Swal.DismissReason.cancel
                     ) {
                       Swal(
                         'Cancelado',
                         'No fue eliminado.',
                         'success'
                       )
                     }
                   })
                 },
                 setear(index){
                       this.form.user_id=this.profiles[index].user_id;
                       this.form.banned=this.profiles[index].banned;
                       this.form.auth_level=this.profiles[index].auth_level;
                       this.form.email=this.profiles[index].email;
                       this.form.username=this.profiles[index].username;
                       this.form.url_foto=this.profiles[index].url_foto;
                       this.form.cedula=this.profiles[index].cedula;
                       this.form.apellido=this.profiles[index].apellido;
                       this.form.nombre=this.profiles[index].nombre;
                       this.form.cargo=this.profiles[index].cargo;
                       this.form.telefono_personal=this.profiles[index].telefono_personal;
                       this.form.telefono_corporativo=this.profiles[index].telefono_corporativo;
                       this.form.sucursal=this.profiles[index].sucursal;
                       $('#modal-lg').modal('show');
                       this.editMode=true
                 },
                 ver(index){
                       this.form.user_id=this.profiles[index].user_id;
                       this.form.banned=this.profiles[index].banned;
                       this.form.auth_level=this.profiles[index].auth_level;
                       this.form.email=this.profiles[index].email;
                       this.form.username=this.profiles[index].username;
                       this.form.url_foto=this.profiles[index].url_foto;
                       this.form.cedula=this.profiles[index].cedula;
                       this.form.apellido=this.profiles[index].apellido;
                       this.form.nombre=this.profiles[index].nombre;
                       this.form.cargo=this.profiles[index].cargo;
                       this.form.telefono_personal=this.profiles[index].telefono_personal;
                       this.form.telefono_corporativo=this.profiles[index].telefono_corporativo;
                       this.form.sucursal=this.profiles[index].sucursal;
                       $('#modal-lg').modal('show');
                       this.editMode=false
                 },
              async   loadProfiles() {
              await     axios.get('index.php/Root_user/get_profile/')
                   .then(({data: {profiles}}) => {
                     this.profiles = profiles
                   });
                   $("#example1").DataTable();
                 },
               async loadSucursales() {
                await   axios.get('index.php/Sucursales/getsucursales/')
                   .then(({data: {sucursales}}) => {
                     this.sucursales = sucursales
                   });
                 },
             async loadcargos() {
                await   axios.get('index.php/cargos/getcargos/')
                   .then(({data: {cargos}}) => {
                     this.cargos = cargos
                   });
                 },
                 loadCart(){

                   if(localStorage.getItem('cart')) {
                     this.cart=JSON.parse(localStorage.cart);

                   }else {
                     localStorage.setItem("cart", JSON.stringify(this.cart));

                   }
                 },
       },

       created(){
            this.loadcargos();
            this.loadSucursales();
            this.loadProfiles();
            this.loadCart();
       },
   })
 </script>
