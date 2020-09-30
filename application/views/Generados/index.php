<div id="app" class="container">
  <div class="row">
    <div class="col-lg-12 my-5 ">
      <!-- Shopping cart table -->
      <div class="table-responsive ">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                  <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold links">Historial de archivos generados <i class="fa fa-history" aria-hidden="true"></i></div>
              </th>
            </tr>
          </thead>

        </table>
          <table id="example1" class="table ">
            <thead>
            <tr>
              <th class="links">Archivo</th>
                <th class="links">Tipo</th>
                <th class="links">Usuario Responsable</th>
                <th class="links">Descargar</th>

            </tr>
            </thead>
              <tr v-for="(generados,index) in generados">
                <td class="links">{{generados.nombre_archivo}}</td>
                <td class="links">{{generados.tipo}}</td>
                <td class="links">{{generados.username}}</td>
                <td class="links"><a :href="'<?=base_url()?>'+generados.url"  download>Descargar PDF</a></td>
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
               <h4 class="modal-title links">Gestión de generados  <i class="fa fa-street-view" aria-hidden="true"></i></h4>
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
                                 <label class="links">Nombre generados</label>
                                  <input type="text" v-model="form.nombre_cargo" v-validate="'required'" name="nombre_generados" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('nombre_generados'))" >  Este dato es requerido  </p>
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
         generados:[],
         editMode:false,
         form:{
             'id':'',
             'nombre_cargo':'',
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
               this.form.nombre_cargo='';
               $('#modal-lg').modal('show');
           },
           validateBeforeSubmit() {
                   this.$validator.validateAll().then((result) => {
                     if (result) {
                       let data = new FormData();
                       data.append('service_form',JSON.stringify(this.form));
                     if(!this.editMode){
                       axios.post('index.php/generados/insertar',data)
                       .then(response => {
                         if(response.data.status == 200){
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Agregado con exito'
                           })
                           $('#modal-lg').modal('hide');
                           this.loadgenerados();
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
                       axios.post('index.php/generados/editar',data)
                       .then(response => {
                         if(response.data.status == 200)
                         {
                           $('#modal-lg').modal('hide');
                           this.loadgenerados();
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
                 eliminargenerados(index){
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
                       data.append('id',this.generados[index].id);
                         axios.post('index.php/generados/eliminar',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Eliminado!',
                               'Ha sido eliminado.',
                               'success'
                             ).then(response => {
                                   this.loadgenerados();
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                               this.loadgenerados();
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
                   this.form.id=this.generados[index].id,
                   this.form.nombre_cargo=this.generados[index].nombre_cargo,
                   $('#modal-lg').modal('show');
                   this.editMode=true
                 },
                 ver(index){
                   this.form.id=this.generados[index].id,
                   this.form.nombre_cargo=this.generados[index].nombre_cargo,
                   $('#myModal').modal('show');
                   this.editMode=false
                 },
              async loadgenerados() {
                await   axios.get('index.php/generados/getgenerados/')
                   .then(({data: {generados}}) => {
                     this.generados = generados
                   });
                   $("#example1").DataTable();
                 },
                 async loadCart() {

                     await  axios.get('index.php/User/get_profile/')
                      .then(({data: {profiles}}) => {
                         this.cart = profiles;
                      });
                    },
       },

       created(){
            this.loadgenerados();
            this.loadCart();
       },
   })
 </script>
