<div id="app" class="container">
  <div class="row">
    <div class="col-lg-12 my-1 ">
      <!-- Shopping cart table -->
      <div class="table-responsive ">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                  <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold links">proveedores <i class="fa fa-car" aria-hidden="true"></i></div>
              </th>
            </tr>
            <tr>

              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                <button type="button" @click="resete();ver=false" class="btn btn-block btn-light btn-sm links" >Agregar <span class="mbri-plus"></span></button>
              </th>
            </tr>

          </thead>

        </table>
          <table id="example1" class="table ">
            <thead>
            <tr>
              <th class="links">Nombre </th>
              <th class="links">Contacto</th>
              <th class="links">Dirección</th>
              <th class="links">Teléfono</th>
              <th class="links">Correo</th>
              <th class="links">Estado</th>
              <th class="links">Action</th>
            </tr>
            </thead>
              <tr v-for="(proveedores,index) in proveedores">
                <td class="links">{{proveedores.nombre_proveedor}}</td>
                <td class="links">{{proveedores.contacto_proveedor}}</td>
                <td class="links">{{proveedores.direccion_proveedor}}</td>
                <td class="links">{{proveedores.telefono_proveedor}}</td>
                <td class="links">{{proveedores.correo_proveedor}}</td>
                <td class="links"><span v-if="proveedores.estado_proveedor==='Activo'" class="badge badge-success">{{proveedores.estado_proveedor}}</span><span v-else class="badge badge-danger">{{proveedores.estado_proveedor}}</span></td>

                  <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"@click="setear(index);ver=true">Ver</a>
                            <a class="dropdown-item" href="#" @click="setear(index);ver=false">Editar</a>
                            <a class="dropdown-item" href="#" @click="eliminarproveedores(index)">Eliminar</a>
                          </div>
                        </button>
                    </div>
                  </td>
               </tr>
          </table>
      </div>
      <!-- End -->
    </div>
  </div>
        <!-- Modal agregar   -->
        <div class="modal fade" id="modal-lg" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title links">Gestión de proveedores  <i class="fa fa-car" aria-hidden="true"></i></h4>
               <button type="button" @click="resete()" class="close" data-dismiss="modal" aria-label="Close">
                 <span class="mbri-close " ></span>
               </button>
             </div>
             <div class="modal-body">
         <!-- Incio de formulario -->
               <div class="card-body">
                       <form role="form" id="form" @submit.prevent="validateBeforeSubmit">
                         <div class="row">
                             <div class="col-md-6 col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Nombre</label>
                                  <input type="text" v-model="form.nombre_proveedor" v-validate="'required'" name="nombre_proveedor" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('nombre_proveedor'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-6 col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Contacto</label>
                                  <input type="text" v-model="form.contacto_proveedor" v-validate="'required'" name="contacto_proveedor" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('contacto_proveedor'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-12 col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Dierección</label>
                                  <textarea type="text" v-model="form.direccion_proveedor" v-validate="'required'" name="direccion_proveedor" class="form-control" id="" :disabled="ver"></textarea>
                                 <p class="text-danger my-1" v-if="(errors.first('direccion_proveedor'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-6 col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Correo</label>
                                  <input type="text" v-model="form.correo_proveedor" v-validate="'required|email'" name="correo_proveedor" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('correo_proveedor'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-6 col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Teléfono</label>
                                  <input type="number" v-model="form.telefono_proveedor" v-validate="'required'" name="telefono_proveedor" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('telefono_proveedor'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-6 col-sm-12">
                               <label class="links">Estado</label>
                               <div class="form-group">
                                 <select v-model="form.estado_proveedor" v-validate="'required'"  name="estado_proveedor" class="form-control" :disabled="ver" >
                                  <option value=""></option>
                                  <option value="Activo">Activo</option>
                                  <option value="Inactivo">Inactivo</option>
                                 </select>
                                 <p class="text-danger my-1 small" v-if="(errors.first('estado_proveedor'))" >  Este dato es requerido/o es inválido  </p>
                               </div>
                             </div>
                            </div>
                           <button v-if="editMode===false"  class="button is-primary links btn btn-light float-right my-3" type="submit">Guardar</button>
                           <button v-if="editMode===true && !ver"  class="button is-primary btn btn-light links float-right my-3" type="submit">Editar</button>
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
   </div>

</div>
<script>
     axios.defaults.baseURL = '<?PHP echo base_url(); ?>';
     Vue.use(VeeValidate ,{locale: 'vi'});
     new Vue({
       el: '#app',
       data: {
         departamento:0,
         ver:false,
         cart:[],
         permisos:[],        
         proveedores:[],
         editMode:false,
         form:{
             'id':'',
             'nombre_proveedor':'',
             'contacto_proveedor':'',
             'direccion_proveedor':'',
             'correo_proveedor':'',
             'telefono_proveedor':'',
             'estado_proveedor':'',
         }
       },
       methods: {
           depp(){
             this.form.departamento=this.colombia[this.form.dep].departamento;
             console.log(this.form.dep);
           },
           resete(){

               this.$validator.reset();
               document.getElementById("form").reset();
               this.editMode=false;
               this.form.nombre_proveedor='';
               this.form.contacto_proveedor='';
               this.form.direccion_proveedor='';
               this.form.correo_proveedor='';
               this.form.telefono_proveedor='';
               this.form.estado_proveedor='';
               $('#modal-lg').modal('show');
           },
           validateBeforeSubmit() {
                   this.$validator.validateAll().then((result) => {
                     if (result) {
                       let data = new FormData();
                       data.append('service_form',JSON.stringify(this.form));
                     if(!this.editMode){
                       axios.post('index.php/Proveedores/insertar',data)
                       .then(response => {
                         if(response.data.status == 200){
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Agregado con exito'
                           })
                           $('#modal-lg').modal('hide');
                           this.loadproveedores();
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
                       axios.post('index.php/Proveedores/editar',data)
                       .then(response => {
                         if(response.data.status == 200)
                         {
                           $('#modal-lg').modal('hide');
                           this.loadproveedores();
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Editado correctamente'
                          });
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
                     return;
                     }

                     Swal(
                       'Error',
                       'Debes llenar todos los datos.',
                       'warning'
                     );
                   });
                 },
                 eliminarproveedores(index){
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
                       data.append('id',this.proveedores[index].id);
                         axios.post('index.php/Proveedores/eliminar',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Eliminado!',
                               'Ha sido eliminado.',
                               'success'
                             ).then(response => {
                                   this.loadproveedores();
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                               this.loadproveedores();
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
                   this.form.id=this.proveedores[index].id,
                   this.form.nombre_proveedor=this.proveedores[index].nombre_proveedor,
                   this.form.contacto_proveedor=this.proveedores[index].contacto_proveedor,
                   this.form.direccion_proveedor=this.proveedores[index].direccion_proveedor,
                   this.form.correo_proveedor=this.proveedores[index].correo_proveedor,
                   this.form.telefono_proveedor=this.proveedores[index].telefono_proveedor,
                   this.form.estado_proveedor=this.proveedores[index].estado_proveedor,
                   $('#modal-lg').modal('show');
                   this.editMode=true
                 },
                 ver(index){
                   this.form.id=this.proveedores[index].id,
                   this.form.nombre_proveedor=this.proveedores[index].nombre_proveedor,
                   this.form.contacto_proveedor=this.proveedores[index].contacto_proveedor,
                   this.form.direccion_proveedor=this.proveedores[index].direccion_proveedor,
                   this.form.correo_proveedor=this.proveedores[index].correo_proveedor,
                   this.form.telefono_proveedor=this.proveedores[index].telefono_proveedor,
                   this.form.estado_proveedor=this.proveedores[index].estado_proveedor,
                   $('#myModal').modal('show');
                   this.editMode=false
                 },
                 async loadproveedores() {
                await   axios.get('index.php/Proveedores/getproveedores/')
                   .then(({data: {proveedores}}) => {
                     this.proveedores = proveedores
                   });
                   $("#example1").DataTable();
                 },
                 async loadCart() {

                     await  axios.get('index.php/User/get_profile/')
                      .then(({data: {profiles}}) => {
                         this.cart = profiles;
                      });
                      this.permisos=JSON.parse(this.cart[0].permisos);
                    },
       },

       created(){
            this.loadproveedores();
            this.loadCart();
       },
   })
 </script>
