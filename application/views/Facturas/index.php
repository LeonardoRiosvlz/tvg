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
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                <button type="button" @click="resete();ver=false" class="btn btn-block btn-light btn-sm links" >Agregar <span class="mbri-plus"></span></button>
              </th>
            </tr>
          </thead>
        </table>
        <div class="row">
          <div class=" col-md-3 col-sm-12">
            <div class="form-group">
               <label class="links">Dede</label>
                 <flat-pickr
                     v-model="desde"
                     :config="config"
                     class="form-control"
                     placeholder="Selecciona fecha"
                     name="desde">
               </flat-pickr>
             </div>
          </div>
          <div class=" col-md-3 col-sm-12">
            <div class="form-group">
               <label class="links">Hasta</label>
                 <flat-pickr
                     v-model="hasta"
                     :config="config"
                     class="form-control"
                     placeholder="Selecciona fecha"
                     name="hSasta">
               </flat-pickr>
             </div>
          </div>
          <div class=" col-md-6 col-sm-12 my-4 py-2">
            <button type="button" @click="mathc()" class="btn btn-info btn-block" style="margin-top:6px;">Buscar <span class="mbri-search"></span></button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <label >CLIENTE</label>
            <input list="encodings" v-model="cedula"  @keyup="form.nombre_empresa='';form.direccion_cliente='';form.telefono_cliente='';"   value="" class="form-control " placeholder="Escriba una cedula" :disabled="ver">
              <datalist id="encodings">
                  <option v-for="clientes in clientes"   :value="clientes.cedula_cliente" :disabled="ver">{{clientes.nombre_cliente}}</option>
              </datalist>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label >Estado</label>
              <select v-model="estado" class="form-control" id="sel1">
                <option value="Generado">Generado</option>
                <option value="Enviada">Enviada</option>
                <option value="Cumplida">Cumplida</option>
                <option value="Creada">En Físico</option>
                <option value="Archivada">Archivada</option>
                <option value="Anulada">Anulada</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-2 p-2 ml-auto">
              <a v-if="facturas.length>0" :href="'<?=base_url();?>'+url" type="button"  class="btn btn-block btn-primary btn-sm links" >Exportar Excel <span class="mbri-save"></span></a>
          </div>
        </div>

          <table id="example1" class="table ">
            <thead>
            <tr>
              <th class="links">Nº Factura</th>
              <th class="links">Clienteo</th>
              <th class="links">Nit / Cedula Cliente</th>
              <th class="links">Total</th>
              <th class="links">Estado</th>
              <th class="links">Dia Hábiles</th>
              <th class="links">Descargar</th>
              <th class="links">Action</th>
            </tr>
            </thead>
              <tr v-for="(facturas,index) in facturas">
                <td class="links">FV-{{facturas.id}}</td>
                <td class="links">{{facturas.nombre_cliente}}</td>
                <td class="links">{{facturas.cedula}}</td>
                <td class="links">{{facturas.total}} $</td>
                <td class="links">{{facturas.estado}}</td>
                <td class="links">{{facturas.dias_demora}}</td>
                <td class="links"><a :href="'<?=base_url()?>Facturas/to_pdf/'+facturas.id"  download>Descargar PDF</a></td>

                  <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"@click="setear(index);ver=true">Ver</a>
                            <a class="dropdown-item" href="#"@click="setear(index)">Editar</a>
                            <a class="dropdown-item" href="#"@click="setear(index);editMode=false">Duplicar</a>
                            <a class="dropdown-item" href="#" @click="gestionar(index)">Gestionar</a>
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
          <button type="button" class="btn btn-block btn-lg btn-primary" v-if="archivo.estado==='Creado'" @click="generar();">Generar <span class="mbri-share"></span></button>
          <button type="button" class="btn btn-block btn-lg btn-secondary" v-if="archivo.estado==='Creado'" @click="generarEnviar()">Generar y enviar <span class="mbri-share"></span></button>
          <button type="button" class="btn btn-block btn-lg btn-secondary" v-if="archivo.estado==='Generado'||archivo.estado==='Enviado'" @click="Enviar()">Enviar correo <span class="mbri-share"></span></button>
          <button type="button" class="btn btn-block btn-lg btn-secondary"  @click="anular()">Anular <span class="mbri-share"></span></button>
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
               <div class="row">
                 <div class="col-md-4">
                   <label class="links">Clientes</label>
                   <input list="encodings" v-model="cedula"  value="" class="form-control form-control-lg" placeholder="Escriba una cedula">
                     <datalist id="encodings">
                         <option v-for="clientes in clientes":value="clientes.cedula_cliente">{{clientes.nombre_cliente}}</option>
                     </datalist>
                 </div>
                 <div class="col-3 py-4">
                    <button type="button" @click="setearCliente()" class="btn btn-primary btn-lg">Buscar Cliente</button>
                 </div>
               </div>
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
                             <div class="col-md-6">
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
                             <div class="col-md-4">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Correo Cliente</label>
                                  <input type="text" v-model="form.correo_cliente" v-validate="'required'" name="correo_cliente" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('correo_cliente'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-5">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Dirección Cliente</label>
                                  <input type="text" v-model="form.direccion_cliente" v-validate="'required'" name="direccion_cliente" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('direccion_cliente'))" >  Este dato es requerido  </p>
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
                             <div class="col-md-6">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Origen</label>
                                  <input type="text" v-model="item.origen"  name="ciudad_cliente" class="form-control" id="" :disabled="ver">
                               </div>
                             </div>
                             <div class="col-md-6">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Destino</label>
                                  <input type="text" v-model="item.destino"  name="ciudad_cliente" class="form-control" id="" :disabled="ver">
                               </div>
                             </div>
                             <div class="col-md-4">
                               <div class="form-group">
                                  <label for="exampleFormControlSelect2">Tipo de transporte</label>
                                  <select v-model="item.tipo_transporte"  class="form-control" id="exampleFormControlSelect2">
                                    <option></option>
                                    <option v-for="transportes in transportes" :value="transportes.tipo_transporte">{{transportes.tipo_transporte}}</option>
                                  </select>
                                </div>
                             </div>

                             <div class="col-md-4">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Id de la carga</label>
                                  <input type="text" v-model="item.n_guia"  name="n_guia" class="form-control" id="" :disabled="ver">
                               </div>
                             </div>
                             <div class="col-md-4">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Subtotal</label>
                                  <input type="text" v-model="item.total"  name="total" class="form-control" id="" :disabled="ver">
                               </div>
                             </div>
                             <button
                             v-if="item.origen && item.destino && item.n_guia && item.total && item.tipo_transporte"
                              type="button" class="btn btn-success btn-lg btn-block my-2" @click="pushearItem()">Agregar <span class="mbri-save"></span></button>
                             <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col" colspan="3">DESCRIPCIÓN</th>
                                  <th scope="col">VALOR</th>
                                  <th scope="col"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="items in form.items">
                                  <td scope="row" colspan="3">Valor correspondiente al transporte {{items.tipo_transporte}}, Nº guía {{items.n_guia}} {{items.origen}}-{{items.destino}}.</td>
                                  <th>{{items.total}} $</th>
                                  <td v-show="!ver">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default">Action</button>
                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                          <span class="sr-only">Toggle Dropdown</span>
                                          <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#" @click="eliminarItem(index)">Quitar</a>
                                          </div>
                                        </button>
                                    </div>
                                  </td>
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
                                <label class="links">Total</label>
                                 <input type="text" v-model="form.total" v-validate="'required'" name="total" class="form-control" id="" :disabled="ver">
                                <p class="text-danger my-1" v-if="(errors.first('total'))" >  Este dato es requerido  </p>
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
    Vue.component('flat-pickr', VueFlatpickr);
     axios.defaults.baseURL = '<?PHP echo base_url(); ?>';
     Vue.use(VeeValidate ,{locale: 'vi'});
     new Vue({
       el: '#app',
       data: {
         url:'',
         desde:'',
         hasta:'',
         estado:'',
          id:0,
         config: {
            wrap: true,
            enableTime: false,
            dateFormat: 'yy-m-d',
            locale: flatpickr.l10ns.es
          },
         departamento:0,
         cedula:"",
         ver:false,
         cart:[],
         clientes:[],
         transportes:[],
         facturas:[],
         editMode:false,
         archivo:{
           'nombre_archivo':'',
           'usuario_responsable':'',
           'url':'',
           'url_gestion':'',
           'nombre_cliente':'',
           'correo_cliente':'',
           'id':'',
           'numero_doc': '',
         },
         archivo:{
           'nombre_archivo':'',
           'usuario_responsable':'',
           'url':'',
           'url_gestion':'',
           'nombre_cliente':'',
           'correo_cliente':'',
           'id':'',
           'numero_doc': '',
           'estado': '',
         },
         item:{
          'origen': '',
          'destino': '',
          'tipo_transporte': '',
          'total': '',
          'n_guia': '',
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
              'total':'',
              'dias_demora':'',
              'estado':'',
         }
       },
       methods: {
         async  mathc(){
             if (this.desde && this.hasta && !this.cedula && !this.estado ) {
               console.log("solo fecha");
               let data = new FormData();
                data.append('desde',this.desde);
                data.append('hasta',this.hasta);
                await axios.post('index.php/Facturas/get_tiempo/',data)
                .then(({data: {facturas}}) => {
                  this.facturas = facturas
                });
                 $("#example1").DataTable();
                 this.url='Facturas/excelexport_tiempo/'+this.desde+'/'+this.hasta;
             }else if(!this.desde && !this.hasta && this.cedula && !this.estado ) {
               console.log("solo cedula");
               let data = new FormData();
                data.append('cedula',this.cedula);
                await axios.post('index.php/Facturas/get_cedula/',data)
                .then(({data: {facturas}}) => {
                  this.facturas = facturas
                });
                 $("#example1").DataTable();
                 this.url='Facturas/excelexport_cedula/'+this.cedula;
             }else if(!this.desde && !this.hasta && !this.cedula && this.estado ) {
                 console.log("solo estado");
                 let data = new FormData();
                  data.append('estado',this.estado);
                  await axios.post('index.php/Facturas/get_estado/',data)
                  .then(({data: {facturas}}) => {
                    this.facturas = facturas
                  });
                   $("#example1").DataTable();
                   this.url='Facturas/excelexport_estado/'+this.estado;
             }else if(this.desde && this.hasta && this.cedula && !this.estado ) {
                 console.log("Fecha y cedula");
                 let data = new FormData();
                 data.append('desde',this.desde);
                 data.append('hasta',this.hasta);
                  data.append('cedula',this.cedula);
                  await axios.post('index.php/Facturas/get_fecha_cedula/',data)
                  .then(({data: {facturas}}) => {
                    this.facturas = facturas
                  });
                   $("#example1").DataTable();
               this.url='Facturas/excelexport_fecha_cedula/'+this.desde+'/'+this.hasta+'/'+this.cedula;
             }else if(this.desde && this.hasta && !this.cedula && this.estado && !this.ciudad) {
                 console.log("Fecha y estado")
                 let data = new FormData();
                 data.append('desde',this.desde);
                 data.append('hasta',this.hasta);
                  data.append('estado',this.estado);
                  await axios.post('index.php/Facturas/get_fecha_estado/',data)
                  .then(({data: {facturas}}) => {
                    this.facturas = facturas
                  });
                   $("#example1").DataTable();
                   this.url='Facturas/excelexport_fecha_estado/'+this.desde+'/'+this.hasta+'/'+this.estado;
             }else if(!this.desde && !this.hasta && this.cedula && this.estado) {
                 console.log("cedula y estado");
                 let data = new FormData();
                 data.append('cedula',this.cedula);
                 data.append('estado',this.estado);
                  await axios.post('index.php/Facturas/get_cedula_estado/',data)
                  .then(({data: {facturas}}) => {
                    this.facturas = facturas
                  });
                   $("#example1").DataTable();
                   this.url='Facturas/excelexport_cedula_estado/'+this.cedula+'/'+this.estado;
             }else if(this.desde && this.hasta && this.cedula && this.estado) {
                 console.log("fecha y estado y cedula");
                 let data = new FormData();
                 data.append('desde',this.desde);
                 data.append('hasta',this.hasta);
                 data.append('estado',this.estado);
                 data.append('cedula',this.cedula);
                  await axios.post('index.php/Facturas/get_fecha_estado_cedula/',data)
                  .then(({data: {facturas}}) => {
                    this.facturas = facturas
                  });
                   $("#example1").DataTable();
                   this.url='Facturas/excelexport_fecha_estado_cedula/'+this.desde+'/'+this.hasta+'/'+this.estado+'/'+this.cedula;
             }
           },
         generarEnviar(index){
           Swal({
             title: '¿Estás seguro?',
             text: "",
             type: 'warning',
             showCancelButton: true,
             confirmButtonText: '¡Si! ¡enviar y generar!',
             cancelButtonText: '¡No!',
             reverseButtons: true
           }).then((result) => {
             if (result.value) {
               let data = new FormData();
               data.append('service_form',JSON.stringify(this.archivo));
                 axios.post('index.php/Facturas/enviar_generar',data)
                 .then(response => {
                   if(response) {
                     Swal(
                       '¡Enviado !',
                       'Ha sido enviado con exito .',
                       'success'
                     ).then(response => {
                         $('#mplanilla').modal('hide');
                           this.loadfacturas();
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
                 'No fue enviado.',
                 'success'
               )
             }
           })
         },
         anular(index){
           Swal({
             title: '¿Estás seguro?',
             text: "",
             type: 'warning',
             showCancelButton: true,
             confirmButtonText: '¡Si! ¡Anular factura!',
             cancelButtonText: '¡No!',
             reverseButtons: true
           }).then((result) => {
             if (result.value) {
               let data = new FormData();
               data.append('service_form',JSON.stringify(this.archivo));
                 axios.post('index.php/Facturas/anular',data)
                 .then(response => {
                   if(response) {
                     Swal(
                       '¡Enviado !',
                       'Ha sido enviado con exito .',
                       'success'
                     ).then(response => {
                         $('#mplanilla').modal('hide');
                           this.loadfacturas();
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
                 'No fue enviado.',
                 'success'
               )
             }
           })
         },
         Enviar(index){
           Swal({
             title: '¿Estás seguro?',
             text: "",
             type: 'warning',
             showCancelButton: true,
             confirmButtonText: '¡Si! ¡enviar!',
             cancelButtonText: '¡No!',
             reverseButtons: true
           }).then((result) => {
             if (result.value) {
               let data = new FormData();
               data.append('service_form',JSON.stringify(this.archivo));
                 axios.post('index.php/Facturas/enviar',data)
                 .then(response => {
                   if(response) {
                     Swal(
                       '¡Enviado !',
                       'Ha sido enviado con exito .',
                       'success'
                     ).then(response => {
                         $('#mplanilla').modal('hide');
                           this.loadfacturas();
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
                 'No fue enviado.',
                 'success'
               )
             }
           })
         },
         setearCliente(){
           console.log("hola");
           for (var i = 0; i < this.clientes.length; i++) {
             if (this.clientes[i].cedula_cliente===this.cedula) {
               if(this.clientes[i].nombre_empresa==='No aplica'){
                 this.form.cedula=this.clientes[i].cedula_cliente;
                 this.form.nombre_cliente=this.clientes[i].nombre_cliente;
               }else{
                 this.form.cedula=this.clientes[i].nit_cliente;
                 this.form.nombre_cliente=this.clientes[i].nombre_empresa;
               }
                  this.form.forma_pago=this.clientes[i].forma;
                  this.form.dias_demora=this.clientes[i].dias;
                  this.form.fecha = moment().format('YYYY-MM-DD');
                  this.form.f_vencimiento = moment().add(parseInt(this.form.dias_demora),'d').format('YYYY-MM-DD');
                  this.form.direccion_cliente=this.clientes[i].direccion_cliente;
                  this.form.telefono_cliente=this.clientes[i].telefono_cliente;
                  this.form.ciudad_cliente=this.clientes[i].ciudad;
                  this.form.correo_cliente=this.clientes[i].correo_cliente;
             }

           }
         },
         pushearItem(index){
           Swal({
             title: '¿Estás seguro?',
             type: 'warning',
             showCancelButton: true,
             confirmButtonText: '¡Si!',
             cancelButtonText: '¡No!',
             reverseButtons: true
           }).then((result) => {
             if (result.value) {
               this.form.items.push({
                  origen:this.item.origen,
                  destino:this.item.destino,
                  n_guia:this.item.n_guia,
                  total:this.item.total,
                  tipo_transporte:this.item.tipo_transporte,
                });
                this.sumar();
                this.item.origen="";
                this.item.destino="";
                this.item.n_guia="";
                this.item.total="";
                this.item.tipo_transporte="";
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
         sumar(){
            this.form.total=0;
           for (var i = 0; i < this.form.items.length; i++) {
             this.form.total=parseFloat(this.form.total)+parseFloat(this.form.items[i].total);
             this.form.subtotal=parseFloat(this.form.subtotal)+parseFloat(this.form.items[i].total);
           }
         },
         eliminarItem(index){
           Swal({
             title: '¿Estás seguro?',
             type: 'warning',
             showCancelButton: true,
             confirmButtonText: '¡Si! ¡eliminar!',
             cancelButtonText: '¡No! ¡cancelar!',
             reverseButtons: true
           }).then((result) => {
             if (result.value) {
               this.form.items.splice(index, 1);
               this.sumar();
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
             this.form.id=="";
             this.form.items=[];
             this.form.notas=[];
             this.form.fecha="";
             this.form.f_vencimiento="";
             this.form.cedula="";
             this.form.nombre_cliente="";
             this.form.direccion_cliente="";
             this.form.correo_cliente="";
             this.form.telefono_cliente="";
             this.form.ciudad_cliente="";
             this.form.valor_total="";
             this.form.forma_pago="";
             this.form.precio_letras="";
             this.form.total="";
             this.form.dias_demora="";
             this.form.estado="";
               this.$validator.reset();
               document.getElementById("form").reset();
               this.editMode=false;
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
                   this.form.id=this.facturas[index].id;
                   this.form.items=JSON.parse(this.facturas[index].items);
                   this.form.notas=JSON.parse(this.facturas[index].notas);
                   this.form.fecha=this.facturas[index].fecha;
                   this.form.f_vencimiento=this.facturas[index].f_vencimiento;
                   this.form.cedula=this.facturas[index].cedula;
                   this.form.nombre_cliente=this.facturas[index].nombre_cliente;
                   this.form.direccion_cliente=this.facturas[index].direccion_cliente;
                   this.form.correo_cliente=this.facturas[index].correo_cliente;
                   this.form.telefono_cliente=this.facturas[index].telefono_cliente;
                   this.form.ciudad_cliente=this.facturas[index].ciudad_cliente;
                   this.form.valor_total=this.facturas[index].valor_total;
                   this.form.forma_pago=this.facturas[index].forma_pago;
                   this.form.precio_letras=this.facturas[index].precio_letras;
                   this.form.total=this.facturas[index].total;
                   this.form.dias_demora=this.facturas[index].dias_demora;
                   this.form.estado=this.facturas[index].estado;
                   $('#modal-lg').modal('show');
                   this.editMode=true
                 },
                 ver(index){
                   this.form.id=this.facturas[index].id,
                   this.form.nombre_cargo=this.facturas[index].nombre_cargo,
                   $('#myModal').modal('show');
                   this.editMode=false
                 },
                 gestionar(index){

                      this.archivo.nombre_archivo='FV-'+this.facturas[index].id;
                      this.archivo.url='Facturas/to_pdf/'+this.facturas[index].id;
                      this.archivo.url_gestion='Facturas/fat?ref_='+this.facturas[index].id;
                      this.archivo.usuario_responsable=this.facturas[index].user_id;
                      this.archivo.correo_cliente=this.facturas[index].correo_cliente;
                      this.archivo.nombre_cliente=this.facturas[index].nombre_cliente;
                      this.archivo.estado=this.facturas[index].estado;
                      this.archivo.numero_doc=this.facturas[index].id;
                      this.archivo.id=this.facturas[index].id;
                        $('#mplanilla').modal('show');
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
                        this.archivo.url_gestion='Facturas/fat?ref_='+this.id;
                        this.archivo.usuario_responsable=this.facturas[i].user_id;
                        this.archivo.correo_cliente=this.facturas[i].correo_cliente;
                        this.archivo.nombre_cliente=this.facturas[i].nombre_cliente;
                        this.archivo.estado=this.facturas[i].estado;
                        this.archivo.numero_doc=this.id;
                        this.archivo.id=this.id;
                       }
                     }
                     this.id=0;
                   }
                   $("#example1").DataTable();
                 },
                 loadPln(){
                   this.form.items=JSON.parse(localStorage.factura);
                   if(this.form.items.length>0){
                      this.cedula=this.form.items[0].cedula_cliente;
                      this.setearCliente();
                     this.form.total=0;this.form.subtotal=0;
                     for (var i = 0; i < this.form.items.length; i++) {
                       this.form.total=parseFloat(this.form.total)+parseFloat(this.form.items[i].total);
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
                        async loadtransportes() {
                       await   axios.get('index.php/Transporte/gettransportes/')
                          .then(({data: {transportes}}) => {
                            this.transportes = transportes
                          });
                        },
                        async loadclientes() {
                          await   axios.get('index.php/Clientes/getclientesa/')
                             .then(({data: {clientes}}) => {
                               this.clientes = clientes
                             });
                             this.loadPln();
                           },
                        async loadCart() {
                            await  axios.get('index.php/User/get_profile/')
                             .then(({data: {profiles}}) => {
                                this.cart = profiles;
                             });
                           },
                      },

                 created(){
                      this.loadclientes();
                      this.loadtransportes();
                      this.loadnotas();
                      this.loadfacturas();
                      this.loadCart();

                 },
             })
 </script>
