<div id="app" class="container">
  <div class="row">
    <div class="col-lg-12 my-5 ">
      <!-- Shopping cart table -->
      <div class="table-responsive ">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                  <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold links">Notas <i class="fa fa-sticky-note-o" aria-hidden="true"></i></div>
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
              <th class="links">Numero</th>
              <th class="links">Asunto</th>
              <th class="links">Descripcion</th>
              <th class="links">Tipo de transporte</th>
              <th class="links">Estado</th>
                <th class="links">Action</th>
            </tr>
            </thead>
              <tr v-for="(notas,index) in notas">
                <td class="links">{{notas.numero}}</td>
                <td class="links">{{notas.resumen}}</td>
                <td class="links">{{notas.descripcion}}</td>
                <td class="links">{{notas.tipo_transporte}}</td>
                <td class="links">{{notas.estado}}</td>

                  <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"@click="setear(index);ver=true">Ver</a>
                            <a class="dropdown-item" href="#" @click="setear(index);ver=false">Editar</a>
                            <a class="dropdown-item" href="#" @click="eliminarnotas(index)">Eliminar</a>
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
               <h4 class="modal-title links">Gestión de notas  <i class="fa fa-sticky-note-o" aria-hidden="true"></i></h4>
               <button type="button" @click="resete()" class="close" data-dismiss="modal" aria-label="Close">
                 <span class="mbri-close " ></span>
               </button>
             </div>
             <div class="modal-body">
         <!-- Incio de formulario -->
               <div class="card-body">
                       <form role="form" id="form" @submit.prevent="validateBeforeSubmit">
                         <div class="row">
                             <div class="col-md-4 col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Numero de nota</label>
                                  <input type="text" v-model="form.numero" v-validate="'required'" name="numero" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('numero'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-8 col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Resumen</label>
                                  <input type="text" v-model="form.resumen" v-validate="'required'" name="resumen" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('resumen'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-12 col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Descripcion</label>
                                  <textarea type="text" v-model="form.descripcion" v-validate="'required'" name="descripcion" class="form-control" id="" :disabled="ver"></textarea>
                                 <p class="text-danger my-1" v-if="(errors.first('descripcion'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-5 col-sm-12" >
                               <label class="links">Tipo de transporte/Tipo de Nota</label>
                               <div class="form-group">
                                 <select v-model="form.tipo_transporte" v-validate="'required'"  name="tipo_transporte" class="form-control" :disabled="ver" >
                                  <option value=""></option>
                                  <option value="Saludo">Saludo</option>
                                  <option value="Contrato">Contrato</option>
                                  <option value="Factura">Factura</option>
                                   <option v-for="transportes in transportes" :value="transportes.tipo_transporte">{{transportes.tipo_transporte}}</option>
                                 </select>
                                 <p class="text-danger my-1 small" v-if="(errors.first('tipo_transporte'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-7 col-sm-12">
                               <label class="links">Estado</label>
                               <div class="form-group">
                                 <select @change="formula()" v-model="form.estado" v-validate="'required'"  name="estado" class="form-control" :disabled="ver" >
                                  <option value="Activo">Activo</option>
                                  <option value="Inactivo">Inactivo</option>

                                 </select>
                                 <p class="text-danger my-1 small" v-if="(errors.first('estado'))" >  Este dato es requerido  </p>
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
         notas:[],
         transportes:[],
         editMode:false,
         form:{
             'id':'',
             'numero':'',
             'resumen':'',
             'descripcion':'',
             'tipo_transporte':'',
             'estado':'',
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
               this.form.id="";
               this.form.numero="";
               this.form.resumen="";
               this.form.descripcion="";
               this.form.tipo_transporte="";
               this.form.estado="";
               $('#modal-lg').modal('show');
           },
           validateBeforeSubmit() {
                   this.$validator.validateAll().then((result) => {
                     if (result) {
                       let data = new FormData();
                       data.append('service_form',JSON.stringify(this.form));
                     if(!this.editMode){
                       axios.post('index.php/Notas/insertar',data)
                       .then(response => {
                         if(response.data.status == 200){
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Agregado con exito'
                           })
                           $('#modal-lg').modal('hide');
                           this.loadnotas();
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
                       axios.post('index.php/Notas/editar',data)
                       .then(response => {
                         if(response.data.status == 200)
                         {
                           $('#modal-lg').modal('hide');
                           this.loadnotas();
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
                 eliminarnotas(index){
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
                       data.append('id',this.notas[index].id);
                         axios.post('index.php/Notas/eliminar',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Eliminado!',
                               'Ha sido eliminado.',
                               'success'
                             ).then(response => {
                                   this.loadnotas();
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                               this.loadnotas();
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
                   this.form.id=this.notas[index].id,
                   this.form.numero=this.notas[index].numero,
                   this.form.resumen=this.notas[index].resumen,
                   this.form.descripcion=this.notas[index].descripcion,
                   this.form.tipo_transporte=this.notas[index].tipo_transporte,
                   this.form.estado=this.notas[index].estado,
                   $('#modal-lg').modal('show');
                   this.editMode=true
                 },
                 ver(index){
                   this.form.id=this.notas[index].id,
                   this.form.numero=this.notas[index].numero,
                   this.form.resumen=this.notas[index].resumen,
                   this.form.descripcion=this.notas[index].descripcion,
                   this.form.tipo_transporte=this.notas[index].tipo_transporte,
                   this.form.estado=this.notas[index].estado,
                   $('#myModal').modal('show');
                   this.editMode=false
                 },
                 async loadnotas() {
                await   axios.get('index.php/Notas/getnotas/')
                   .then(({data: {notas}}) => {
                     this.notas = notas
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

                     await  axios.get('index.php/User/get_profile/')
                      .then(({data: {profiles}}) => {
                         this.cart = profiles;
                      });
                        this.permisos=JSON.parse(this.cart[0].permisos);
                    },
       },

       created(){

            this.loadtransportes();
            this.loadnotas();
            this.loadCart();
       },
   })
 </script>
