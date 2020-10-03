<style media="screen">
.padre {
height: 150px;
/*IMPORTANTE*/
display: flex;
justify-content: center;
align-items: center;
}
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
.hijo {
width: 120px;
}
</style>
<div class="container-fluid camion">
<div id="app" class="container">
  <div class="row">
    <div class="col-lg-12 my-5 ">
      <!-- Shopping cart table -->
      <div class=" ">
        <h1 class="text-white">Bienvenido!! Para tener información de su envío digite el serial de rastreo!!</h1>
        <transition name="slide-fade">
        <div class="row p-1 padre" v-if="trazabilidad.length<1" style="min-height:600px;">
          <div class="col-md-4 hijo">
          <div class="input-group">
              <select v-model="form.prefijo" class="custom-select form-control-lg" id="inputGroupSelect04">
                <option ></option>
                <option value="E">E</option>
                <option value="N">N</option>
              </select>
              <div class="input-group-append">
                <input list="encodings" v-model="form.id_guia"  value="" class="form-control form-control-lg" placeholder="Serial de rastreo" :disabled="ver">
              </div>
            </div>

              </div>
              <div class="col-3" v-if="form.prefijo==='N' && form.id_guia">
                <button class="btn btn-success btn-lg" @click="loadguiasN()" type="button">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
              </div>
              <div class="col-3" v-if="form.prefijo==='E' && form.id_guia">
                <button class="btn btn-success btn-lg" @click="loadguiasE()" type="button">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
              </div>
        </div>
        </transition>

      </div>
      <!-- End -->
    </div>
  </div>
<transition name="slide-fade">
  <div class="container"  v-if="trazabilidad.length>0">
      <h4> Carga {{form.prefijo}}-{{form.id_guia}}</h4>
      <div class="row">
        <div class="col-3" v-if="form.prefijo==='E' && form.id_guia">
          <button class="btn btn-success btn-lg" @click="trazabilidad=[]" type="button">Volver</button>
        </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <div class="main-timeline2">
                  <a href="#" v-for="trazabilidad in trazabilidad" class="timeline">

                        <div class="timeline-icon">
                                  <i v-if="trazabilidad.tipo_reporte==='Alistamiento'" class=" icon fa fa-hourglass-start"></i>
                                  <i v-if="trazabilidad.tipo_reporte==='Salida'"  class=" icon fa fa-paper-plane-o"></i>
                                  <i v-if="trazabilidad.tipo_reporte==='Redireccionamiento'" class=" icon fa fa-road"></i>
                                  <i v-if="trazabilidad.tipo_reporte==='Llegada'" class=" icon fa fa-cubes"></i>
                        </div>
                        <div class="timeline-content">
                            <h3 class="title">{{trazabilidad.tipo_reporte}}</h3>
                            <p v-if="trazabilidad.tipo_reporte==='Alistamiento'"  class="description">
                                Su envío esta en {{trazabilidad.ciudad_sat}} siendo alistado a las {{trazabilidad.hora}} horas, fecha estimada para su próximo destino {{trazabilidad.llegada_destino}}.
                            </p>
                            <p v-if="trazabilidad.tipo_reporte==='Salida'"  class="description">
                                Su carga fue enviado a las {{trazabilidad.hora}} horas, desde {{trazabilidad.ciudad_sat}} para llegar a su próximo destino el día {{trazabilidad.llegada_destino}}.
                            </p>
                            <p v-if="trazabilidad.tipo_reporte==='Redireccionamiento'"  class="description">
                               Su envío ha sido reenviado desde {{trazabilidad.ciudad_sat}} a las {{trazabilidad.hora}} horas, para llegar a su próximo destino el día {{trazabilidad.llegada_destino}}.
                            </p>
                            <p v-if="trazabilidad.tipo_reporte==='Llegada'"  class="description">
                                Su envío esta en {{trazabilidad.ciudad_sat}} a las {{trazabilidad.hora}} horas y sera enviado el dia: {{trazabilidad.fecha_despacho}} fecha estimado de llegada a su  proximo destino {{trazabilidad.llegada_destino}}.
                            </p>
                            <img :src="'<?=base_url()?>'+trazabilidad.url_foto" alt="..." class="img-thumbnail">
                        </div>
                  </a>
              </div>
          </div>
      </div>
  </div>
  </transition>
  <hr>
        <!-- Modal agregar   -->
        <div class="modal fade" id="modal-lg" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title links">Trazabilidad de la carga <i class="fa fa-location-arrow" aria-hidden="true"></i></h4>
               <button type="button" @click="resete()" class="close" data-dismiss="modal" aria-label="Close">
                 <span class="mbri-close " ></span>
               </button>
             </div>
             <div class="modal-body">
         <!-- Incio de formulario -->
               <div class="card-body">
                       <form role="form" id="form" @submit.prevent="validateBeforeSubmit">
                         <div class="row">
                            <div class="col-4">
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Tipo de raporte</label>
                                  <select v-model="form.tipo_reporte" name="tipo_reporte"   v-validate="'required'" class="form-control" id="exampleFormControlSelect1">
                                    <option value=""></option>
                                    <option v-if="trazabilidad.length<1"  value="Alistamiento">Alistamiento</option>
                                    <option v-if="trazabilidad.length>0"  value="Salida">Salida</option>
                                    <option v-if="trazabilidad.length>0"  value="Redireccionamiento">Redireccionamiento</option>
                                    <option v-if="trazabilidad.length>0" value="LLegada">LLegada</option>
                                  </select>
                                  <p class="text-danger my-1" v-if="(errors.first('tipo_reporte'))" >  Este dato es requerido  </p>
                                </div>
                            </div>
                            <div class=" col-md-4 col-sm-12">
                              <div class="form-group">
                                 <label class="links">Hora de {{form.tipo_reporte}}</label>
                                   <flat-pickr
                                       v-validate="'required'"
                                       v-model="form.hora"
                                       :config="dconfig"
                                       class="form-control"
                                       placeholder="Selecciona fecha"
                                       name="hora">
                                 </flat-pickr>
                                 <p class="text-danger my-1" v-if="(errors.first('hora'))" >  Este dato es requerido  </p>
                               </div>
                            </div>
                            <div class=" col-md-4 col-sm-12">
                              <div class="form-group">
                                 <label class="links">Fecha Despacho</label>
                                   <flat-pickr
                                       v-validate="'required'"
                                       v-model="form.fecha_despacho"
                                       :config="config"
                                       class="form-control"
                                       placeholder="Selecciona fecha"
                                       name="fecha_despacho">
                                 </flat-pickr>
                                 <p class="text-danger my-1" v-if="(errors.first('fecha_despacho'))" >  Este dato es requerido  </p>
                               </div>
                            </div>
                            <div class="col-4">
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Proveedores</label>
                                  <select v-model="form.id_proveedor"   v-validate="'required'" name="id_proveedor" class="form-control" id="exampleFormControlSelect1">
                                    <option value=""></option>
                                    <option v-for="proveedores in proveedores" :value="proveedores.id">{{proveedores.nombre_proveedor}}</option>
                                  </select>
                                  <p class="text-danger my-1" v-if="(errors.first('id_proveedor'))" >  Este dato es requerido  </p>
                                </div>
                            </div>
                             <div class="col-md-4">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Nº Guía proveedor</label>
                                  <input type="text" v-model="form.guia_proveedor" v-validate="'required'" name="guia_proveedor" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('guia_proveedor'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-8">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Detalles de carga</label>
                                  <textarea type="text" v-model="form.detalles_carga" v-validate="'required'" name="detalles_carga" class="form-control" id="" :disabled="ver"></textarea>
                                 <p class="text-danger my-1" v-if="(errors.first('detalles_carga'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-4">
                               <div class="form-group">
                                 <label for="exampleFormControlSelect1">Satélite encargado</label>
                                   <select v-model="form.id_satelite"   v-validate="'required'" name="id_satelite" class="form-control" id="exampleFormControlSelect1">
                                     <option value=""></option>
                                     <option v-for="satelites in satelites" :value="satelites.id">{{satelites.nombre_sat}}</option>
                                   </select>
                                   <p class="text-danger my-1" v-if="(errors.first('id_satelite'))" >  Este dato es requerido  </p>
                                 </div>
                             </div>
                             <div class="col-md-8">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">observaciones</label>
                                  <textarea type="text" v-model="form.observaciones" v-validate="'required'" name="observaciones" class="form-control" id="" :disabled="ver"></textarea>
                                 <p class="text-danger my-1" v-if="(errors.first('observaciones'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class=" col-md-4 col-sm-12">
                               <div class="form-group">
                                  <label class="links">LLegada carga destino</label>
                                    <flat-pickr
                                        v-validate="'required'"
                                        v-model="form.llegada_destino"
                                        :config="config"
                                        class="form-control"
                                        placeholder="Selecciona fecha"
                                        name="llegada_destino">
                                  </flat-pickr>
                                  <p class="text-danger my-1" v-if="(errors.first('llegada_destino'))" >  Este dato es requerido  </p>
                                </div>
                             </div>
                             <div class="col-4">
                               <div class="form-group">
                                 <label for="exampleFormControlSelect1">Sede cliente</label>
                                   <select v-model="form.id_sede"   v-validate="'required'" name="id_sede" class="form-control" id="exampleFormControlSelect1">
                                     <option value=""></option>
                                     <option v-for="sedes in sedes" :value="sedes.id">{{sedes.nombre_sede}}</option>
                                   </select>
                                   <p class="text-danger my-1" v-if="(errors.first('id_sede'))" >  Este dato es requerido  </p>
                                 </div>
                             </div>
                             <div class="col-4">
                               <div class="form-group" v-if="editMode">
                                 <input type="file"  id="image" name="image">
                                  <p class="text-danger my-1 small" v-if="(errors.first('image'))" >  Este dato es requerido  </p>
                                </div>
                                <div v-else class="form-group">
                                       <input type="file" v-validate="'required'"  id="image" name="image">
                                       <p class="text-danger my-1 small" v-if="(errors.first('image'))" >  Este dato es requerido  </p>
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
</div>
<script>
      Vue.component('flat-pickr', VueFlatpickr);
     axios.defaults.baseURL = '<?PHP echo base_url(); ?>';
     Vue.use(VeeValidate ,{locale: 'vi'});
     new Vue({
       el: '#app',
       data: {
         config: {
            wrap: true,
            enableTime: false,
            dateFormat: 'yy-m-d',
            locale: flatpickr.l10ns.es
          },
          dconfig: {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
           },
         tipo:"",
         id:"",
         departamento:0,
         ver:false,
         cart:[],
         guias:[],
         trazabilidad:[],
         sedes:[],
         proveedores:[],
         cargos:[],
         editMode:false,
         form:{
             'id':'',
             'prefijo':'',
             'id_guia':'',
             'hora':'',
             'id_sede':'',
             'id_satelite':'',
             'fecha_recogida':'',
             'llegada_destino':'',
             'tipo_reporte':'',
             'id_proveedor':'',
             'guia_proveedor':'',
             'detalles_carga':'',
             'observaciones':'',
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
                 this.form.guia_proveedor="";
                 this.form.id_sede="";
                 this.form.id_satelite="";
                 this.form.fecha_despacho="";
                 this.form.llegada_destino="";
                 this.form.tipo_reporte="";
                 this.form.id_proveedor="";
                 this.form.detalles_carga="";
                 this.form.observaciones="";
                 this.form.hora="";
               this.editMode=false;
               this.form.nombre_cargo='';
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
                       axios.post('index.php/Trazabilidad/insertar',data)
                       .then(response => {
                         if(response.data.status == 200){
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Agregado con exito'
                           });
                           this.loadTrazabilidad();
                            $('#modal-lg').modal('hide');
                            $("#fileControl").val('');

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
                         console.log("edit sin imagen");
                         axios.post('index.php/Trazabilidad/editar',data)
                         .then(response => {
                           if(response.data.status == 200)
                           {
                             $('#myModal').modal('hide');

                             Swal.fire({
                               type: 'success',
                               title: 'Exito!',
                               text: 'Editado correctamente'
                            });
                            this.loadTrazabilidad();
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
                         axios.post('index.php/Trazabilidad/editar_img',data)
                         .then(response => {
                           if(response.data.status == 200)
                           {
                             $('#modal-lg').modal('hide');
                             $("#fileControl").val('');

                             Swal.fire({
                               type: 'success',
                               title: 'Exito!',
                               text: 'Editado correctamente'
                            });
                            this.editMode=false;
                                  this.loadTrazabilidad();

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
                 eliminarcargos(index){
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
                       data.append('id',this.trazabilidad[index].id);
                         axios.post('index.php/Trazabilidad/eliminar',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Eliminado!',
                               'Ha sido eliminado.',
                               'success'
                             ).then(response => {
                                   this.loadTrazabilidad();
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                              this.loadTrazabilidad();
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
                   this.form.id=this.trazabilidad[index].id;
                    this.form.prefijo=this.trazabilidad[index].prefijo;
                     this.form.id_guia=this.trazabilidad[index].id_guia;
                     this.form.guia_proveedor=this.trazabilidad[index].guia_proveedor;
                      this.form.id_sede=this.trazabilidad[index].id_sede;
                       this.form.id_satelite=this.trazabilidad[index].id_satelite;
                        this.form.fecha_despacho=this.trazabilidad[index].fecha_despacho;
                         this.form.llegada_destino=this.trazabilidad[index].llegada_destino;
                          this.form.tipo_reporte=this.trazabilidad[index].tipo_reporte;
                           this.form.id_proveedor=this.trazabilidad[index].id_proveedor;
                            this.form.detalles_carga=this.trazabilidad[index].detalles_carga;
                             this.form.observaciones=this.trazabilidad[index].observaciones;
                             this.form.hora=this.trazabilidad[index].hora;
                   $('#modal-lg').modal('show');
                   this.editMode=true
                 },
                 ver(index){
                   this.form.id=this.trazabilidad[index].id;
                    this.form.prefijo=this.trazabilidad[index].prefijo;
                     this.form.id_guia=this.trazabilidad[index].id_guia;
                      this.form.id_sede=this.trazabilidad[index].id_sede;
                       this.form.id_satelite=this.trazabilidad[index].id_satelite;
                        this.form.fecha_despacho=this.trazabilidad[index].fecha_despacho;
                         this.form.llegada_destino=this.trazabilidad[index].llegada_destino;
                          this.form.tipo_reporte=this.trazabilidad[index].tipo_reporte;
                           this.form.id_proveedor=this.trazabilidad[index].id_proveedor;
                            this.form.detalles_carga=this.trazabilidad[index].detalles_carga;
                             this.form.observaciones=this.trazabilidad[index].observaciones;
                   $('#myModal').modal('show');
                   this.editMode=false
                 },
                 async loadproveedores() {
                await   axios.get('index.php/Proveedores/getproveedores/')
                   .then(({data: {proveedores}}) => {
                     this.proveedores = proveedores
                   });
                 },
                 async loadsatelites() {
                await   axios.get('index.php/Satelites/getsatelites/')
                   .then(({data: {satelites}}) => {
                     this.satelites = satelites
                   });

                 },
                 async loadguiasN(){
                   let data = new FormData();
                    data.append('id',this.form.id_guia);
                    await axios.post('index.php/Trazabilidad/get_id_n/',data)
                    .then(({data: {guias}}) => {
                      this.guias = guias
                    });
                    if (this.guias.length>0) {
                      this.loadsedes(this.guias[0].cedula);
                      this.loadTrazabilidad();

                    }else {
                      this.trazabilidad=[];
                      Swal.fire({
                        type: 'error',
                        title: 'No existe una guía de carga ',
                        text: 'con ese número.'
                      });
                    }
                 },
                 async loadguiasE(){
                   let data = new FormData();
                    data.append('id',this.form.id_guia);
                    await axios.post('index.php/Trazabilidad/get_id_e/',data)
                    .then(({data: {guias}}) => {
                      this.guias = guias
                    });
                    if (this.guias.length>0) {
                      this.loadsedes(this.guias[0].cedula_cliente);
                      this.loadTrazabilidad();
                    }else {
                      this.trazabilidad=[];
                      Swal.fire({
                        type: 'error',
                        title: 'No existe una guía de carga ',
                        text: 'con ese número.'
                      });
                    }
                 },
                 async loadTrazabilidad(){
                   let data = new FormData();
                    data.append('prefijo',this.form.prefijo);
                    data.append('id_guia',this.form.id_guia);
                    await axios.post('index.php/Trazabilidad/gettrazabilidad/',data)
                    .then(({data: {trazabilidad}}) => {
                      this.trazabilidad = trazabilidad
                    });
                    if (this.trazabilidad.length<1) {
                      Swal.fire({
                        type: 'error',
                        title: 'Esta carga aun no tiene registros de trazabilidad ',
                        text: ''
                      });
                    }
                 },
                 async loadsedes(index) {
                   console.log(index);
                   let data = new FormData();
                    data.append('id_cliente',index);
                    await axios.post('index.php/Sedes/getsedes/',data)
                   .then(({data: {sedes}}) => {
                     this.sedes = sedes
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
            this.loadproveedores();
            this.loadsatelites();
            this.loadCart();
       },
   })
 </script>
