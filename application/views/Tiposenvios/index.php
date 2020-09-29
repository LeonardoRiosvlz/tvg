<div id="app" class="container">
  <div class="row">
    <div class="col-lg-12 my-5 ">
      <!-- Shopping cart table -->
      <div class="table-responsive ">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                  <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold links">Tipos de envios <i class="fa fa-paper-plane-o" aria-hidden="true"></i></div>
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
              <th class="links">Nombre Elemento o Condición</th>
              <th class="links">Tipo de transporte</th>
              <th class="links">Action</th>
            </tr>
            </thead>
              <tr v-for="(tiposenvios,index) in tiposenvios">
                <td class="links">{{tiposenvios.nombre_tiposenvios}}</td>
                <td class="links">{{tiposenvios.tipo_transporte}}</td>
                  <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"@click="setear(index);ver=true">Ver</a>
                            <a class="dropdown-item" href="#" @click="setear(index);ver=false">Editar</a>
                            <a class="dropdown-item" href="#" @click="eliminartiposenvios(index)">Eliminar</a>
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
         <div class="modal-dialog ">
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title links">Gestión de tipos de envíos  <i class="fa fa-paper-plane-o" aria-hidden="true"></i></h4>
               <button type="button" @click="resete()" class="close" data-dismiss="modal" aria-label="Close">
                 <span class="mbri-close " ></span>
               </button>
             </div>
             <div class="modal-body">
         <!-- Incio de formulario -->
               <div class="card-body">
                       <form role="form" id="form" @submit.prevent="validateBeforeSubmit">
                         <div class="row">
                             <div class="col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Nombre Elemento o Condición</label>
                                  <input type="text" v-model="form.nombre_tiposenvios" v-validate="'required'" name="nombre_tiposenvios" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('nombre_tiposenvios'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-sm-12">
                               <label class="links">Tipo de transporte</label>
                               <div class="form-group">
                                 <select v-model="form.tipo_transporte" class="form-control" :disabled="ver" >
                                   <option v-for="transportes in transportes" :value="transportes.tipo_transporte">{{transportes.tipo_transporte}}</option>
                                 </select>
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
         tiposenvios:[],
         transportes:[],
         editMode:false,
         form:{
             'id':'',
             'nombre_tiposenvios':'',
             'tipo_transporte':'',
         }
       },
       methods: {
           resete(){

               this.$validator.reset();
               document.getElementById("form").reset();
               this.editMode=false;
               this.form.nombre_tiposenvios='';
               $('#modal-lg').modal('show');
           },
           validateBeforeSubmit() {
                   this.$validator.validateAll().then((result) => {
                     if (result) {
                       let data = new FormData();
                       data.append('service_form',JSON.stringify(this.form));
                     if(!this.editMode){
                       axios.post('index.php/TiposEnvios/insertar',data)
                       .then(response => {
                         if(response.data.status == 200){
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Agregado con exito'
                           })
                           $('#modal-lg').modal('hide');
                           this.loadtiposenvios();
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
                       axios.post('index.php/TiposEnvios/editar',data)
                       .then(response => {
                         if(response.data.status == 200)
                         {
                           $('#modal-lg').modal('hide');
                           this.loadtiposenvios();
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
                 eliminartiposenvios(index){
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
                       data.append('id',this.tiposenvios[index].id);
                         axios.post('index.php/TiposEnvios/eliminar',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Eliminado!',
                               'Ha sido eliminado.',
                               'success'
                             ).then(response => {
                                   this.loadtiposenvios();
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                               this.loadtiposenvios();
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
                   this.form.id=this.tiposenvios[index].id,
                   this.form.nombre_tiposenvios=this.tiposenvios[index].nombre_tiposenvios,
                   this.form.tipo_transporte=this.tiposenvios[index].tipo_transporte,
                   $('#modal-lg').modal('show');
                   this.editMode=true
                 },
                 ver(index){
                   this.form.id=this.tiposenvios[index].id,
                   this.form.nombre_tiposenvios=this.tiposenvios[index].nombre_tiposenvios,
                   this.form.tipo_transporte=this.tiposenvios[index].tipo_transporte,
                   $('#myModal').modal('show');
                   this.editMode=false
                 },
                 async loadtiposenvios() {
                await   axios.get('index.php/TiposEnvios/gettiposenvios/')
                   .then(({data: {tiposenvios}}) => {
                     this.tiposenvios = tiposenvios
                   });
                   $("#example1").DataTable();
                 },
                 async loadtransportes() {
                await   axios.get('index.php/Transporte/gettransportes/')
                   .then(({data: {transportes}}) => {
                     this.transportes = transportes
                   });
                 },
                 async loadCart() {
                     console.log("hol");
                     await  axios.get('index.php/User/get_profile/')
                      .then(({data: {profiles}}) => {
                         this.cart = profiles;
                      });
                    },
       },

       created(){
            this.loadtransportes();
            this.loadtiposenvios();
            this.loadCart();
       },
   })
 </script>
