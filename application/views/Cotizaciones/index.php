<div id="app" class="container-fluid">
  <div class="row">
    <div class="col-lg-12 my-5 ">
      <!-- Shopping cart table -->
      <div class="table-responsive ">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                  <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold links">cotizaciones <i class="fa fa-calculator" aria-hidden="true"></i></div>
              </th>
            </tr>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                <button type="button" @click="resete();ver=false" class="btn btn-block btn-light btn-sm links" >Agregar <span class="mbri-plus"></span></button>
              </th>
            </tr>
        </thead>

       </table>
       <div class="row">
         <div class="col-md-2">
           <a href="<?=base_url()?>Orders_admin">
             <div class="card-counter info p-2 zoom" style="opacity:0.9">
               <span class=" fa mbri-briefcase" style="font-size:5em;opacity:0.6"></span>
               <span class="count-numbers">4</span>
               <span class="count-name links">Borrador</span>
             </div>
           </a>
         </div>
         <div class="col-md-2">
           <a href="<?=base_url()?>Orders_admin">
             <div class="card-counter info p-2 zoom" style="opacity:0.9">
               <span class=" fa mbri-help" style="font-size:5em;opacity:0.6"></span>
               <span class="count-numbers">4</span>
               <span class="count-name links">Enviadas</span>
             </div>
           </a>
         </div>
         <div class="col-md-2">
           <a href="<?=base_url()?>Orders_admin">
             <div class="card-counter info p-2 zoom" style="opacity:0.9">
               <span class=" fa mbri-preview" style="font-size:5em;opacity:0.6"></span>
               <span class="count-numbers">4</span>
               <span class="count-name links">En estudio</span>
             </div>
           </a>
         </div>
         <div class="col-md-2">
           <a href="<?=base_url()?>Orders_admin">
             <div class="card-counter info p-2 zoom" style="opacity:0.9">
               <span class=" fa mbri-like" style="font-size:5em;opacity:0.6"></span>
               <span class="count-numbers">4</span>
               <span class="count-name links">Aceptadas</span>
             </div>
           </a>
         </div>
         <div class="col-md-2">
           <a href="<?=base_url()?>Orders_admin">
             <div class="card-counter info p-2 zoom" style="opacity:0.9">
               <span class=" fa mbri-error" style="font-size:5em;opacity:0.6"></span>
               <span class="count-numbers">4</span>
               <span class="count-name links">Rechazadas</span>
             </div>
           </a>
         </div>
         <div class="col-md-2">
           <a href="<?=base_url()?>Orders_admin">
             <div class="card-counter info p-2 zoom" style="opacity:0.9">
               <span class=" fa mbri-sad-face" style="font-size:5em;opacity:0.6"></span>
               <span class="count-numbers">4</span>
               <span class="count-name links">Anuladas</span>
             </div>
           </a>
         </div>
       </div>
          <table id="example1" class="table ">
            <thead>
            <tr>
              <th class="links">Nombre del cargo</th>
                <th class="links">Action</th>
            </tr>
            </thead>
              <tr v-for="(cotizaciones,index) in cotizaciones">
                <td class="links">{{cotizaciones.nombre_cargo}}</td>
                  <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"@click="setear(index);ver=true">Ver</a>
                            <a class="dropdown-item" href="#" @click="setear(index);ver=false">Editar</a>
                            <a class="dropdown-item" href="#" @click="eliminarcotizaciones(index)">Eliminar</a>
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
               <h4 class="modal-title links">Gestión de cotizaciones  <i class="fa fa-calculator" aria-hidden="true"></i></h4>
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
                                 <label class="links">Nombre cotizaciones</label>
                                  <input type="text" v-model="form.nombre_cargo" v-validate="'required'" name="nombre_cotizaciones" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('nombre_cotizaciones'))" >  Este dato es requerido  </p>
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
         cotizaciones:[],
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
                       axios.post('index.php/cotizaciones/insertar',data)
                       .then(response => {
                         if(response.data.status == 200){
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Agregado con exito'
                           })
                           $('#modal-lg').modal('hide');
                           this.loadcotizaciones();
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
                       axios.post('index.php/cotizaciones/editar',data)
                       .then(response => {
                         if(response.data.status == 200)
                         {
                           $('#modal-lg').modal('hide');
                           this.loadcotizaciones();
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
                 eliminarcotizaciones(index){
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
                       data.append('id',this.cotizaciones[index].id);
                         axios.post('index.php/cotizaciones/eliminar',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Eliminado!',
                               'Ha sido eliminado.',
                               'success'
                             ).then(response => {
                                   this.loadcotizaciones();
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                               this.loadcotizaciones();
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
                   this.form.id=this.cotizaciones[index].id,
                   this.form.nombre_cargo=this.cotizaciones[index].nombre_cargo,
                   $('#modal-lg').modal('show');
                   this.editMode=true
                 },
                 ver(index){
                   this.form.id=this.cotizaciones[index].id,
                   this.form.nombre_cargo=this.cotizaciones[index].nombre_cargo,
                   $('#myModal').modal('show');
                   this.editMode=false
                 },
                 async loadcotizaciones() {
                await   axios.get('index.php/cotizaciones/getcotizaciones/')
                   .then(({data: {cotizaciones}}) => {
                     this.cotizaciones = cotizaciones
                   });
                   $("#example1").DataTable();
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
            this.loadcotizaciones();
            this.loadCart();
       },
   })
 </script>
