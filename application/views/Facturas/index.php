<div id="app" class="container">
  <div class="row">
    <div class="col-lg-12 my-1 ">
      <!-- Shopping cart table -->
      <div class="table-responsive ">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                  <div class="bg-light rounded-pill px-4  text-uppercase font-weight-bold links">facturas <i class="fa fa-file-text" aria-hidden="true"></i></div>
              </th>
            </tr>

          </thead>

        </table>
          <table id="example1" class="table ">
            <thead>
            <tr>
              <th class="links">Nombre del cargo</th>
                <th class="links">Action</th>
            </tr>
            </thead>
              <tr v-for="(facturas,index) in facturas">
                <td class="links">FV-{{facturas.id}}</td>
                  <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"@click="setear(index);ver=true">Ver</a>
                            <a class="dropdown-item" href="#" @click="setear(index);ver=false">Editar</a>
                            <a class="dropdown-item" href="#" @click="eliminarfacturas(index)">Eliminar</a>
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

  <!-- Modal -->
  <div class="modal fade" id="mplanilla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h2 class="links text-center">Factura</h2>
          <button type="button" class="btn btn-block btn-lg btn-success"><span class="mbri-bookmark"></span>{{archivo.nombre_archivo}}</button>
          <button type="button" class="btn btn-block btn-lg btn-primary" @click="generar();">Generar <span class="mbri-share"></span></button>
          <button type="button" class="btn btn-block btn-lg btn-secondary" @click="generarandGuia()">Generar y Crear Guía <span class="mbri-share"></span></button>
            <pre>{{archivo}}</pre>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

        <!-- Modal agregar   -->
        <div class="modal fade" id="modal-lg" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title links">Gestión de facturas  <i class="fa fa-file-text" aria-hidden="true"></i></h4>
               <button type="button" @click="resete()" class="close" data-dismiss="modal" aria-label="Close">
                 <span class="mbri-close " ></span>
               </button>
             </div>
             <div class="modal-body">
         <!-- Incio de formulario -->
               <div class="card-body">
                       <form role="form" id="form" @submit.prevent="validateBeforeSubmit">
                         <div class="row">
                           <div class=" col-md-6 col-sm-12">
                             <div class="form-group">
                                <label class="links">Fecha</label>
                                  <flat-pickr
                                      v-validate="'required'"
                                      v-model="form.fecha"
                                      :config="config"
                                      class="form-control"
                                      placeholder="Selecciona fecha"
                                      name="hora">
                                </flat-pickr>
                                <p class="text-danger my-1" v-if="(errors.first('hora'))" >  Este dato es requerido  </p>
                              </div>
                           </div>
                           <div class=" col-md-6 col-sm-12">
                             <div class="form-group">
                                <label class="links">Fecha de vencimiento</label>
                                  <flat-pickr
                                      v-validate="'required'"
                                      v-model="form.f_vencimiento"
                                      :config="config"
                                      class="form-control"
                                      placeholder="Selecciona fecha"
                                      name="hora">
                                </flat-pickr>
                                <p class="text-danger my-1" v-if="(errors.first('hora'))" >  Este dato es requerido  </p>
                              </div>
                           </div>
                             <div class="col-md-3">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Cedula/NIT</label>
                                  <input type="text" v-model="form.cedula" v-validate="'required'" name="cedula" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('cedula'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-3">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Cliente</label>
                                  <input type="text" v-model="form.nombre_cliente" v-validate="'required'" name="nombre_cliente" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('nombre_cliente'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-3">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Teléfono Cliente</label>
                                  <input type="text" v-model="form.telefono_cliente" v-validate="'required'" name="telefono_cliente" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('telefono_cliente'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-3">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Ciudad</label>
                                  <input type="text" v-model="form.ciudad_cliente" v-validate="'required'" name="ciudad_cliente" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('ciudad_cliente'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col" colspan="3">DESCRIPCIÓN</th>
                                  <th scope="col">VALOR TOTAL</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="items in form.items">
                                  <td scope="row" colspan="3">Valor correspondiente al transporte {{items.tipo_transporte}}, Nº guía {{items.n_guia}} {{items.origen}}-{{items.destino}}.</td>
                                  <th>{{items.total}} $</th>
                                </tr>
                              </tbody>
                            </table>

                            <div class="col-md-6">
                              <!-- textarea -->
                              <div class="form-group">
                                <label class="links">Precio en letras</label>
                                 <input type="text" v-model="form.precio_letras" v-validate="'required'" name="precio_letras" class="form-control" id="" :disabled="ver">
                                <p class="text-danger my-1" v-if="(errors.first('precio_letras'))" >  Este dato es requerido  </p>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <!-- textarea -->
                              <div class="form-group">
                                <label class="links">Subtotal</label>
                                 <input type="text" v-model="form.subtotal" v-validate="'required'" name="subtotal" class="form-control" id="" :disabled="ver">
                                <p class="text-danger my-1" v-if="(errors.first('subtotal'))" >  Este dato es requerido  </p>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <!-- textarea -->
                              <div class="form-group">
                                <label class="links">Total</label>
                                 <input type="text" v-model="form.total" v-validate="'required'" name="total" class="form-control" id="" :disabled="ver">
                                <p class="text-danger my-1" v-if="(errors.first('total'))" >  Este dato es requerido  </p>
                              </div>
                            </div>
                            <pre>{{form}}</pre>
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
    Vue.component('flat-pickr', VueFlatpickr);
     axios.defaults.baseURL = '<?PHP echo base_url(); ?>';
     Vue.use(VeeValidate ,{locale: 'vi'});
     new Vue({
       el: '#app',
       data: {
          id:0,
         config: {
            wrap: true,
            enableTime: false,
            dateFormat: 'yy-m-d',
            locale: flatpickr.l10ns.es
          },
         departamento:0,
         ver:false,
         cart:[],
         facturas:[],
         editMode:false,
         archivo:{
           'nombre_archivo':'',
           'usuario_responsable':'',
           'url':'',
           'id':'',
         },
         form:{
              'id':'',
              'user_id':'<?=$auth_user_id;?>',
              'items':[],
              'notas':[],
              'fecha':'',
              'f_vencimiento':'',
              'cedula':'',
              'nombre_cliente':'',
              'direccion_cliente':'',
              'telefono_cliente':'',
              'ciudad_cliente':'',
              'valor_total':'',
              'forma_pago':'',
              'precio_letras':'',
              'subtotal':'',
              'total':'',
              'dias_demora':'',
              'estado':'',
         }
       },
       methods: {
        generar(){
             Swal({
               title: '¿Estás seguro?',
               text: "",
               type: 'warning',
               showCancelButton: true,
               confirmButtonText: '¡Si! ¡generar!',
               cancelButtonText: '¡No!',
               reverseButtons: true
             }).then((result) => {
               if (result.value) {
                 let data = new FormData();
                 data.append('service_form',JSON.stringify(this.archivo));
                   axios.post('index.php/Facturas/generar',data)
                   .then(response => {
                     if(response) {
                       Swal(
                         '¡Enviado !',
                         'Ha sido enviado con exito .',
                         'success'
                       ).then(response => {
                             this.loadfacturas();
                               $('#mplanilla').modal('hide');
                       })
                     } else {
                       Swal(
                         'Error',
                         'Ha ocurrido un error.',
                         'warning'
                       ).then(response => {
                         this.loadfacturas();

                       })
                     }
                   })
               } else if (
                 result.dismiss === Swal.DismissReason.cancel
               ) {
                 Swal(
                   'Cancelado',
                   'No fue enviado.',
                   'success'
                 )
               }
             })
           },
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
                  axios.post('index.php/Facturas/insertar',data)
                       .then(response => {
                         if(response.data.status == 200){
                           this.id=response.data.id;
                           window.setTimeout(function () {
                              $('#mplanilla').modal('show');
                            }, 50);
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Agregado con exito'
                           })
                           $('#modal-lg').modal('hide');
                           this.loadfacturas();
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
                       axios.post('index.php/Facturas/editar',data)
                       .then(response => {
                         if(response.data.status == 200)
                         {
                           $('#modal-lg').modal('hide');
                           this.loadfacturas();
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
                 eliminarfacturas(index){
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
                       data.append('id',this.facturas[index].id);
                         axios.post('index.php/Facturas/eliminar',data)
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
                               this.loadfacturas();
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
                   this.form.id=this.facturas[index].id,
                   this.form.nombre_cargo=this.facturas[index].nombre_cargo,
                   $('#modal-lg').modal('show');
                   this.editMode=true
                 },
                 ver(index){
                   this.form.id=this.facturas[index].id,
                   this.form.nombre_cargo=this.facturas[index].nombre_cargo,
                   $('#myModal').modal('show');
                   this.editMode=false
                 },
            async loadfacturas() {
                await   axios.get('index.php/Facturas/getfacturas/')
                   .then(({data: {facturas}}) => {
                     this.facturas = facturas
                   });
                   if (!this.id==0) {
                     for (var i = 0; i < this.facturas.length; i++) {
                       if (this.facturas[i].id==this.id) {
                        this.archivo.nombre_archivo='FV-'+this.id;
                        this.archivo.url='Facturas/to_pdf/'+this.id;
                        this.archivo.usuario_responsable=this.facturas[i].user_id;
                        this.archivo.numero_doc=this.id;
                       }
                     }
                     this.id=0;
                   }
                   $("#example1").DataTable();
                 },
                 loadPln(){
                   this.form.items=JSON.parse(localStorage.factura);
                   if(this.form.items.length>0){
                     if(this.form.items[0].nombre_empresa==='No aplica'){
                       this.form.cedula=this.form.items[0].cedula_cliente;
                       this.form.nombre_cliente=this.form.items[0].nombre_cliente;
                     }else{
                       this.form.cedula=this.form.items[0].nit_cliente;
                       this.form.nombre_cliente=this.form.items[0].nombre_empresa;
                     }
                     this.form.direccion_cliente=this.form.items[0].direccion_cliente;
                     this.form.telefono_cliente=this.form.items[0].telefono_cliente;
                     this.form.ciudad_cliente=this.form.items[0].ciudad_cliente;
                     this.form.forma_pago=this.form.items[0].forma;
                     this.form.dias_demora=this.form.items[0].dias;
                     this.form.fecha = moment().format('YYYY-MM-DD');
                     this.form.f_vencimiento = moment().add(parseInt(this.form.dias_demora),'d').format('YYYY-MM-DD');
                     this.form.total=0;this.form.subtotal=0;
                     for (var i = 0; i < this.form.items.length; i++) {
                       this.form.total=parseFloat(this.form.total)+parseFloat(this.form.items[i].total);
                       this.form.subtotal=parseFloat(this.form.subtotal)+parseFloat(this.form.items[i].total);
                     }
                     window.setTimeout(function () {
                           $('#modal-lg').modal('show');
                           localStorage.removeItem('factura');
                          }, 300);


                   }
                 },
                 async loadnotas() {
                       await   axios.get('index.php/Notas/getnotass/')
                          .then(({data: {notas}}) => {
                            this.notas = notas
                          });
                          for (var i = 0; i < this.notas.length; i++) {
                            if (this.notas[i].tipo_transporte==='Factura' && this.notas[i].estado==='Activo') {
                             this.form.notas.push(this.notas[i]);
                            }
                          }
                        },
                        async loadCart() {
                            await  axios.get('index.php/User/get_profile/')
                             .then(({data: {profiles}}) => {
                                this.cart = profiles;
                             });
                           },
       },

       created(){
            this.loadnotas();
            this.loadfacturas();
            this.loadCart();
            this.loadPln();
       },
   })
 </script>
