<div id="app" class="container">
  <div class="row">
    <div class="col-lg-12 my-5 ">
      <!-- Shopping cart table -->
      <div class="table-responsive ">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                  <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold links">Alertas <i class="fa fa-bell" aria-hidden="true"></i></div>
              </th>
            </tr>
            <tr>
          </thead>

        </table>
          <table id="example1" class="table ">
            <thead>
            <tr>
              <th class="links">Nombre del cargo</th>
              <th class="links">Dias Restantes/ De Mora</th>
              <th class="links">Fecha de vencimiento</th>
                <th class="links">Estatus</th>
                <th class="links">Action</th>
            </tr>
            </thead>
              <tr v-for="(facturas,index) in facturas" v-if="facturas.age>-6 && facturas.alertar==='Si'">
                <td class="links">FV-{{facturas.id}}</td>
                <td class="links">{{facturas.age}}</td>
                <td class="links">{{facturas.f_vencimiento}}</td>
                <td class="links" v-if="facturas.age>-6 && facturas.age<1 ">Por vencer</td>
                  <td class="links" v-if="facturas.age>0 ">Vencida</td>
                  <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"@click="dejarNotificar(index)">Dejar de notificar</a>
                            <a class="dropdown-item" href="#" @click="setear(index);ver=false">Enviar Correo</a>

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
               <h4 class="modal-title links">Enviar Notificación  <i class="fa fa-street-view" aria-hidden="true"></i></h4>
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
                                 <label class="links">Asunto</label>
                                  <input type="text" v-model="form.asunto" v-validate="'required'" name="nombre_cargos" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('nombre_cargos'))" >  Este dato es requerido  </p>
                               </div>
                             </div>

                             <div class="col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Correo del cliente</label>
                                  <input type="text" v-model="form.correo_cliente" v-validate="'required'" name="correo_cliente" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('correo_cliente'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Saludo</label>
                                  <input type="text" v-model="form.saludo" v-validate="'required'" name="saludo" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('saludo'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Mensaje</label>
                                  <textarea type="text" v-model="form.mensaje" v-validate="'required'" name="saludo" class="form-control" id="" :disabled="ver"></textarea>
                                 <p class="text-danger my-1" v-if="(errors.first('saludo'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Despedida</label>
                                  <textarea type="text" v-model="form.despedida" v-validate="'required'" name="despedida" class="form-control" id="" :disabled="ver"></textarea>
                                 <p class="text-danger my-1" v-if="(errors.first('despedida'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                            </div>
                           <button v-if="editMode===false"  class="button is-primary links btn btn-light float-right my-3" type="submit">Guardar</button>
                           <button v-if="editMode===true && !ver"  class="button is-primary btn btn-success btn-block links float-right my-3" type="submit">Enviar Notificación</button>
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
         facturas:[],
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
                       axios.post('index.php/Alertas/enviar/',data)
                       .then(response => {
                         if(response.data.status == 200){
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Enviado con exito'
                           })
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
                       axios.post('index.php/Alertas/enviar/',data)
                       .then(response => {
                         if(response.data.status == 200)
                         {
                           $('#modal-lg').modal('hide');

                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Enviado con exito'
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
                     return;
                     }

                     Swal(
                       'Error',
                       'Debes llenar todos los datos.',
                       'warning'
                     );
                   });
                 },
                 dejarNotificar(index){
                   Swal({
                     title: '¿Estás seguro?',
                     text: "¡ dejar de recibir alertas de este item!",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonText: '¡Si! ',
                     cancelButtonText: '¡No! ',
                     reverseButtons: true
                   }).then((result) => {
                     if (result.value) {
                       let data = new FormData();
                       data.append('id',this.facturas[index].id);
                         axios.post('index.php/Alertas/dejarNotificar',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Eliminado!',
                               'Ha sido eliminado.',
                               'success'
                             ).then(response => {
                                   this.loadfacturas();
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                               this.loadcargos();
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
                   this.form.id=this.facturas[index].id;
                   this.form.user_id=this.facturas[index].user_id;
                   this.form.items=JSON.parse(this.facturas[index].items);
                   this.form.notas=JSON.parse(this.facturas[index].notas);
                   this.form.fecha=this.facturas[0].fecha;
                   this.form.f_vencimiento=this.facturas[index].f_vencimiento;
                   this.form.cedula=this.facturas[index].cedula;
                   this.form.nombre_cliente=this.facturas[index].nombre_cliente;
                   this.form.direccion_cliente=this.facturas[index].direccion_cliente;
                   this.form.telefono_cliente=this.facturas[index].telefono_cliente;
                   this.form.ciudad_cliente=this.facturas[index].ciudad_cliente;
                   this.form.valor_total=this.facturas[index].valor_total;
                   this.form.forma_pago=this.facturas[index].forma_pago;
                   this.form.precio_letras=this.facturas[index].precio_letras;
                   this.form.total=this.facturas[index].total;
                    this.form.correo_cliente=this.facturas[index].correo_cliente;
                   this.form.dias_demora=this.facturas[index].dias_demora;
                   this.form.estado=this.facturas[index].estado;
                   this.form.asunto='Notificación de vencimiento de factura FV'+this.facturas[index].id;
                   this.form.saludo='Señores de '+this.facturas[index].nombre_cliente;
                   this.form.mensaje='Estimado cliente, le informamos que tiene una factura por pagara con fecha de caducidad '+this.facturas[index].f_vencimiento+'.';
                   this.form.despedida='Esperando  su pronta respuesta TVG CARGO S.A.S. se despide ';
                   $('#modal-lg').modal('show');
                   this.editMode=true
                 },
                 ver(index){
                   this.form.id=this.cargos[index].id,
                   this.form.nombre_cargo=this.cargos[index].nombre_cargo,
                   $('#myModal').modal('show');
                   this.editMode=false
                 },
                 async loadfacturas() {
                     await   axios.get('index.php/Facturas/getfacturas/')
                        .then(({data: {facturas}}) => {
                          this.facturas = facturas
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
            this.loadfacturas();
            this.loadCart();
       },
   })
 </script>
