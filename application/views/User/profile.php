  <div class="container spl my-5 ">
            <!-- Wrapper for carousel items -->

                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                      <div v-for="profile in profiles" class="card">
                                          <div class="card-body">
                                              <div class="row">
                                                  <div class="col-12 ">
                                                      <h3 class="mb-0 text-truncated links">{{profile.nombre}} {{profile.apellido}}</h3>
                                                      <hr>

                                                  </div>
                                                  <div class="col-12  text-center">
                                                      <img :src="'<?=base_url();?>'+profile.url_foto" alt="" class="mx-auto  img-fluid">
                                                      <br>
                                                  </div>
                                                 <div class="col-12 " >
                                                    <a class="btn btn-block links" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><span class="mbri-camera"></span>Editar foto</a>
                                                    <a class="btn btn-block links" role="button" href="#" @click="resete()" aria-expanded="false" aria-controls="collapseExample"><span class="mbri-edit"></span> Editar datos</a>

                                                      <div class="col-sm-12 collapse" id="collapseExample">
                                                        <div class="row ">
                                                            <div class=" my-2 custom-file btn-group spl col-12">
                                                              <input type="file" class="custom-file-input"  id="imagenFoto" name="imagenFoto">
                                                              <label class="custom-file-label my-3" for="customFile">Buscar Archivo</label>
                                                            </div>
                                                         </div>
                                                         <button class="btn btn-block links"  @click="uploadFoto()" data-toggle="collapse" href="#collapseExample"><span class="mbri-success " ></span> Cambiar foto</button>
                                                    </div>

                                                  </div>

                                              </div>
                                              <!--/row-->
                                          </div>
                                          <!--/card-block-->
                                      </div>
                                  </div>


                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 bg-white rounded shadow-sm ">

                  <!-- Shopping cart table -->
                  <div class="table table-responsive ">
                    <table class="table" v-for="profile in profiles">
                      <tbody>
                        <tr>
                          <th scope="col" colspan="4" class="border-0 bg-white  text-center">
                              <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold links">Datos personales</div>
                          </th>
                        </tr>
                        <tr>
                          <td class="  align-middle"><span class="mbri-edit" style="font-size: 1.6em"></span> Nombre</td>
                          <td class="  align-middle">{{profile.nombre}} {{profile.apellido}}</td>
                        </tr>
                        <tr >
                          <td class="  align-middle"><span class="mbri-mobile" style="font-size: 1.6em"></span> Teléfono personal</td>
                          <td class="  align-middle">{{profile.telefono_personal}}</td>
                        </tr>
                        <tr>
                          <td class="  align-middle"><span class="mbri-mobile2" style="font-size: 1.6em"></span> Telefono corporativo</td>
                          <td class="  align-middle">{{profile.telefono_corporativo}}</td>
                        </tr>
                         <tr >
                          <td class="  align-middle" ><span class="mbri-contact-form" style="font-size: 1.6em"></span> Cédula</td>
                          <td class="  align-middle">{{profile.cedula}}</td>
                        </tr>
                        <tr >
                          <td class="  align-middle"><span class="mbri-sites" style="font-size: 1.6em"></span> Cargo</td>
                          <td class="  align-middle">{{profile.cargo}}</td>
                        </tr>
                        <tr >
                          <td class="  align-middle"><span class="mbri-calendar" style="font-size: 1.6em"></span> sucursal</td>
                          <td class="  align-middle">{{profile.sucursal}}</td>
                        </tr>
                        <tr >
                          <td class="  align-middle"><span class="mbri-letter" style="font-size: 1.6em"></span> Email</td>
                          <td class="  align-middle">{{profile.email}}</td>
                        </tr>
                        <tr >
                          <td class="  align-middle"><span class="mbri-user" style="font-size: 1.6em"></span> Nick</td>
                          <td class="  align-middle">{{profile.username}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- End -->
                </div>

              </div>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <h5 class="modal-title  links" id="exampleModalLabel">EDITAR DATOS</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body ">
                       <form role="form" id="form" @submit.prevent="validateBeforeSubmit">
                        <div class="form-group pl-4 pr-4 row">
                          <div class="form-group col-6">
                            <label class="links">Nombre</label>
                            <input v-model="form.nombre" v-validate="'required'" name="nombre" type="text" class="form-control" id="" placeholder="">
                            <p class="text-danger my-1" v-if="(errors.first('nombre'))" >  Este dato es requerido  </p>
                          </div>
                          <div class="form-group col-6">
                            <label class="links">Apellido</label>
                            <input v-model="form.apellido" v-validate="'required'" name="apellido" type="text" class="form-control" id="" placeholder="">
                            <p class="text-danger my-1" v-if="(errors.first('apellido'))" >  Este dato es requerido  </p>
                          </div>
                          <div class="form-group col-6">
                            <label class="links">Telefono corporativo</label>
                            <input v-model="form.telefono_corporativo" v-validate="'required'" name="telefono_corporativo" type="text" class="form-control" id="" placeholder="">
                            <p class="text-danger my-1" v-if="(errors.first('telefono_corporativo'))" >  Este dato es requerido  </p>
                          </div>
                            <div class="form-group col-6" >
                              <label class="links">Teléfono personal</label>
                              <input v-model="form.telefono_personal" v-validate="'required'" name="telefono_personal" type="text" class="form-control" id="" placeholder="">
                              <p class="text-danger my-1" v-if="(errors.first('telefono_personal'))" >  Este dato es requerido  </p>
                            </div>
                        </div>

                        <div class="col-12 ">
                            <button class="btn btn-block links" data-toggle="modal" data-target="#exampleModal"><span class="mbri-edit2 " ></span> Editar mis datos</button>
                        </div>

                      </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>

</div></div></div></div>
</div>
        <script>
             axios.defaults.baseURL = '<?PHP echo base_url(); ?>';
             Vue.use(VeeValidate ,{locale: 'vi'});
             new Vue({
               el: '#app',
               data: {
                 ciudades:0,
                 cart:[],
                 profiles:[],
                 documentos:[],
                 permisos:[],
                 editMode:false,
                 form:{
                     'id_usuario':'',
                     'nombre':'',
                     'apellido':'',
                     'foto':'',
                     'direccion_envio':'',
                     'telefono':'',
                     'direccion_facturacion':'',
                     'direccion_empresa':'',
                     'nombre_empresa':'',
                     'nit':'',
                     'status':'',
                     'telefono_empresa':'',
                     'profesional':'',
                     'dep':0,
                     'departamento':'',
                     'ciudad':'',
                 },
                 departamento:0,
               },
               methods: {
                   resete(){
                      this.setear();
                       $('#exampleModal').modal('show');
                   },

              async     uploadFoto() {
                     this.file_data = $('#imagenFoto').prop('files')[0];
                     this.form_data = new FormData();
                     this.form_data.append('file', this.file_data);
                  await     axios.post('index.php/User/foto', this.form_data)
                       .then(response => {
                         if(response.data.status == 201){
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Agregado correctamente'
                           });
                           this.loadProfiles();
                         }
                         else
                         {
                           Swal.fire({
                             type: 'error',
                             title: 'Lo sentimos',
                             text: 'Ha ocurrido un error'
                           })
                         }
                       })
                   },
                   validateBeforeSubmit() {
                           this.$validator.validateAll().then((result) => {
                             if (result) {
                               let data = new FormData();
                               data.append('service_form',JSON.stringify(this.form));
                             if(!this.editMode){
                               axios.post('index.php/User/editarp',data)
                               .then(response => {
                                 if(response.data.status == 200){
                                   Swal.fire({
                                     type: 'success',
                                     title: 'Exito!',
                                     text: 'Agregado con exito'
                                   })
                                   $('#modal-lg').modal('hide');
                                   this.loadProfiles();
                                   this.resete();
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
                                 axios.post('index.php/User/editarp',data)
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
                                    this.resete();
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
                         eliminarprofile(index){
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
                               data.append('id',this.profiles[index].id);
                                 axios.post('index.php/profile/eliminar',data)
                                 .then(response => {
                                   if(response) {
                                     Swal(
                                       '¡Eliminado!',
                                       'Ha sido eliminado.',
                                       'success'
                                     ).then(response => {
                                           this.loadprofiles();
                                     })
                                   } else {
                                     Swal(
                                       'Error',
                                       'Ha ocurrido un error.',
                                       'warning'
                                     ).then(response => {
                                       this.loadprofiles();
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
                               this.form.id_usuario=this.profiles[0].id_usuario,
                               this.form.nombre=this.profiles[0].nombre,
                               this.form.apellido=this.profiles[0].apellido,
                               this.form.foto=this.profiles[0].foto,
                               this.form.direccion_envio=this.profiles[0].direccion_envio,
                               this.form.telefono=this.profiles[0].telefono,
                               this.form.direccion_facturacion=this.profiles[0].direccion_facturacion,
                               this.form.direccion_empresa=this.profiles[0].direccion_empresa,
                               this.form.profesional=this.profiles[0].profesional,
                               this.form.dep=this.profiles[0].dep,
                               this.form.departamento=this.profiles[0].departamento,
                               this.form.ciudad=this.profiles[0].ciudad,
                               this.form.nombre_empresa=this.profiles[0].nombre_empresa,
                               this.form.nit=this.profiles[0].nit,
                               this.form.status=this.profiles[0].status,
                               this.form.telefono_empresa=this.profiles[0].telefono_empresa,

                               $('#modal-lg').modal('show');
                               this.editMode=true
                         },
                         ver(index){
                               this.form.id=this.profiles[index].id,
                               this.form.name=this.profiles[index].name,
                               this.form.url_profile=this.profiles[index].url_profile,
                               $('#myModal').modal('show');
                               this.editMode=false
                         },
                         async loadProfiles() {
                             await  axios.get('index.php/User/get_profile/')
                              .then(({data: {profiles}}) => {
                                 this.profiles = profiles;
                              });
                              this.form.user_id=this.profiles[0].user_id;
                              this.form.banned=this.profiles[0].banned;
                              this.form.auth_level=this.profiles[0].auth_level;
                              this.form.email=this.profiles[0].email;
                              this.form.username=this.profiles[0].username;
                              this.form.url_foto=this.profiles[0].url_foto;
                              this.form.cedula=this.profiles[0].cedula;
                              this.form.apellido=this.profiles[0].apellido;
                              this.form.nombre=this.profiles[0].nombre;
                              this.form.cargo=this.profiles[0].cargo;
                              this.form.telefono_personal=this.profiles[0].telefono_personal;
                              this.form.telefono_corporativo=this.profiles[0].telefono_corporativo;
                              this.form.sucursal=this.profiles[0].sucursal;
                            },
                            async loadCart() {
                                console.log("hol");
                                await  axios.get('index.php/User/get_profile/')
                                 .then(({data: {profiles}}) => {
                                    this.cart = profiles;

                                 });
                                 this.permisos=JSON.parse(this.cart[0].permisos);
                               },
                            depp(){
                              this.form.departamento=this.colombia[this.form.dep].departamento;
                            },


               },

               created(){
                    this.loadProfiles();
                    this.loadCart();
               },
           })
         </script>
