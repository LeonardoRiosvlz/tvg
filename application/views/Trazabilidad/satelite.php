<div class="container-fluid camion">
  <div id="app" class="container " >
    <div class="row hero-image" style="min-height:800px; background-">
      <div class="col-lg-12 my-5 ">
        <!-- Shopping cart table -->
        <div class=" ">
          <table id="example2" class="table" v-show="trazabilidad.length>0">
            <thead>
              <tr>
                <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold links">Trazabilidad de la carga <i class="fa fa-location-arrow" aria-hidden="true"></i></div>
                </th>
              </tr>
              <tr>
                <th scope="col" colspan="5" class="border-0 bg-white  text-center" v-if="guias.length>0">
                  <button type="button" @click="resete();ver=false" class="btn btn-block btn-light btn-sm links" >Agregar <span class="mbri-plus"></span></button>
                </th>
              </tr>

            </thead>

          </table>

          <div class="row p-1  ">
            <div class="col-md-4">
            <div class="input-group">
                <select v-model="form.prefijo" class="custom-select form-control-lg" id="inputGroupSelect04">
                  <option ></option>
                  <option value="E">E</option>
                  <option value="N">N</option>
                </select>
                <div class="input-group-append">
                  <input list="encodings" v-model="form.id_guia"  value="" class="form-control form-control-lg" placeholder="Guia" :disabled="ver">
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="input-group-append">
                <input list="encodingss" v-model="form.id_satelite"  value="" class="form-control form-control-lg" placeholder="XXXXXXXXX" :disabled="ver">
              </div>
            </div>
            <div class="col-3">
                <button v-if="form.id_satelite && form.id_guia && form.prefijo" class="btn btn-success btn-lg" @click="loadsatelite()" type="button">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
          </div>

            <table  class="table bg-white"  v-show="trazabilidad.length>0">
              <thead>
              <tr class="bg-white">
                <th class="links">Tipo de reporte</th>
                <th class="links">Hora</th>
                <th class="links">Ciudad</th>
                <th class="links">Fecha despacho</th>
                <th class="links">Fecha de llegada</th>
                <th class="links">Observaciones</th>
                  <th class="links">Action</th>
              </tr>
              </thead class="bg-white">
                <tr v-for="(trazabilidad,index) in trazabilidad" >
                  <td class="links bg-white">{{trazabilidad.tipo_reporte}}</td>
                  <td class="links bg-white">{{trazabilidad.hora}}</td>
                  <td class="links bg-white">{{trazabilidad.ciudad_sat}}</td>
                  <td class="links bg-white">{{trazabilidad.fecha_despacho}}</td>
                  <td class="links bg-white">{{trazabilidad.llegada_destino}}</td>
                  <td class="links bg-white">{{trazabilidad.observaciones}}</td>
                  <td class="links bg-white">{{trazabilidad.id_satelite}}</td>
                    <td>
                      <div class="btn-group"  >
                          <button type="button" class="btn btn-default" >Action</button>
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item" href="#" @click="setear(index);ver=false" v-if="trazabilidad.id_satelite==form.id_satelite">Editar</a>
                              <a class="dropdown-item" href="#" @click="eliminarcargos(index)" v-if="trazabilidad.id_satelite==form.id_satelite">Eliminar</a>
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
                                     <option  value="Salida">Salida</option>
                                     <option  value="Redireccionamiento">Redireccionamiento</option>
                                     <option  value="Llegada">Llegada</option>
                                       <option  value="Llegada Destino">Llegada Destino</option>
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

                                  <label  class="links">Fecha de {{form.tipo_reporte}}</label>
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
                                 <label for="exampleFormControlSelect1">Satélite encargado</label>
                                   <select v-model="form.id_satelite"   v-validate="'required'" name="id_satelite" class="form-control" id="exampleFormControlSelect1" disabled>
                                     <option value=""></option>
                                     <option v-for="satelites in satelites" :value="satelites.id">{{satelites.nombre_sat}}</option>
                                   </select>
                                   <p class="text-danger my-1" v-if="(errors.first('id_satelite'))" >  Este dato es requerido  </p>
                                 </div>
                             </div>

                             <div class=" col-md-4 col-sm-12" v-show="form.tipo_reporte">
                               <div class="form-group">
                                 <label v-if="form.tipo_reporte==='Recogida'" class="links">Fecha De Alistamiento</label>
                                 <label v-if="form.tipo_reporte==='Alistamiento'" class="links">Fecha De Envío</label>
                                  <label v-if="form.tipo_reporte==='Salida'||form.tipo_reporte==='Redireccionamiento'"  class="links">LLegada carga destino</label>
                                  <label v-if="form.tipo_reporte==='Llegada'"  class="links">Fecha de despacho</label>
                                  <label v-if="form.tipo_reporte==='Llegada Destino'"  class="links">Fecha lista para entregar </label>
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
                              <label for="colFormLabelSm" class="links">Foto Referecial</label>
                               <div class="form-group" v-if="editMode">
                                 <input type="file"  id="image" name="image">
                                  <p class="text-danger my-1 small" v-if="(errors.first('image'))" >  Este dato es requerido  </p>
                                </div>
                                <div v-else class="form-group">
                                       <input type="file" v-validate="'required'"  id="image" name="image">
                                       <p class="text-danger my-1 small" v-if="(errors.first('image'))" >  Foto portada es obligatoria </p>
                                </div>
                             </div>
                              <div class="col-md-6">
                                <!-- textarea -->
                                <div class="form-group">
                                  <label class="links">Detalles de carga</label>
                                   <textarea type="text" v-model="form.detalles_carga" v-validate="'required'" name="detalles_carga" class="form-control" id="" :disabled="ver"></textarea>
                                  <p class="text-danger my-1" v-if="(errors.first('detalles_carga'))" >  Este dato es requerido  </p>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <!-- textarea -->
                                <div class="form-group">
                                  <label class="links">observaciones</label>
                                   <textarea type="text" v-model="form.observaciones" v-validate="'required'" name="observaciones" class="form-control" id="" :disabled="ver"></textarea>
                                  <p class="text-danger my-1" v-if="(errors.first('observaciones'))" >  Este dato es requerido  </p>
                                </div>
                              </div>

                              <div class="col-4">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Proveedor de transporte</label>
                                    <select v-model="form.id_proveedor"   v-validate="'required'" name="id_proveedor" class="form-control" id="exampleFormControlSelect1" :disabled="ver||form.tipo_reporte==='Alistamiento'||form.tipo_reporte==='Recogida'">
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
                                    <input type="text" v-model="form.guia_proveedor" v-validate="'required'" name="guia_proveedor" class="form-control" id="" :disabled="ver||form.tipo_reporte==='Alistamiento'||form.tipo_reporte==='Recogida'">
                                   <p class="text-danger my-1" v-if="(errors.first('guia_proveedor'))" >  Este dato es requerido  </p>
                                 </div>
                               </div>

                              <div class="card col-12">
                               <div class="col-sm-12">
                                <div class="form-group">
                                  <label for="colFormLabelSm" class="links">Fotos detalladas</label>
                                         <div class="col-sm-12">
                                           <div class="row ">
                                             <div class="col-8">
                                               <input type="file"   id="imagenFoto" name="imagenFoto">
                                             </div>
                                               <div class="col-4">
                                               <button class="btn btn-light links btn-lg" type="button"  @click="uploadFoto()">Subir archivo</button>
                                             </div>
                                            </div>
                                       </div>
                                 </div>
                             </div>
                             <div class="row">
                               <div v-for="(img ,index) in imagenes" class="card col-lg-3 col-md-3 col-sm-12 col-xs-12" >
                                   <img :src="'<?=base_url();?>'+img.url" class="card-img-top" alt="...">
                                   <div class="card-body">
                                     <a  class="list-group-item list-group-item-action" @click="eliminarImagen(index)"><span class="mbri-close"></span> Eliminar</a>
                                   </div>
                                 </div>
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
         imagenes:[],
         proveedores:[],
         sates:[],
         satelites:[],
         editMode:false,
         form:{
             'id':'',
             'prefijo':'',
             'id_guia':'',
             'hora':'',
             'tiempo':'',
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
         async    uploadFoto() {
             this.file_data = $('#imagenFoto').prop('files')[0];
             this.form_data = new FormData();
             this.form_data.append('file', this.file_data);
             this.form_data.append('id_guia', this.form.id_guia);
             this.form_data.append('tiempo', this.form.tiempo);
         await      axios.post('index.php/Trazabilidad/detail_foto', this.form_data)
               .then(response => {
                 if(response.data.status == 201){
                   Swal.fire({
                     type: 'success',
                     title: 'Exito!',
                     text: 'Agregado correctamente'
                   });
                  this.loadFotos();
                  document.getElementById("imagenFoto").value = "";
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

           eliminarImagen(index){
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
                 data.append('id',this.imagenes[index].id);
                   axios.post('index.php/Trazabilidad/eliminarImagen',data)
                   .then(response => {
                     if(response) {
                       Swal(
                         '¡Eliminado!',
                         'Ha sido eliminado.',
                         'success'
                       ).then(response => {
                             this.loadFotos();
                       })
                     } else {
                       Swal(
                         'Error',
                         'Ha ocurrido un error.',
                         'warning'
                       ).then(response => {
                         this.loadFotos();
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
            async    loadFotos(){
            let data = new FormData();
             data.append('id_guia',this.form.id_guia);
             data.append('tiempo',this.form.tiempo);
        await      axios.post('index.php/Trazabilidad/getimagenes/',data)
             .then(({data: {imagenes}}) => {
                   this.imagenes = imagenes;
                 });
             },
         buscar(){
           for (var i = 0; i < this.satelites.length; i++) {
             if (this.satelites[i].id===this.satelite) {

             }
           }
         },
           depp(){
             this.form.departamento=this.colombia[this.form.dep].departamento;
             console.log(this.form.dep);
           },
           resete(){
             const dateTime = Date.now();
              this.form.tiempo = Math.floor(dateTime / 1000);
               this.$validator.reset();
               document.getElementById("form").reset();
                 this.form.guia_proveedor="";
                 this.form.id_sede="";
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
                 async loadsatelite() {
                   let data = new FormData();
                   console.log(this.form.id_satelite);
                   data.append('id',this.form.id_satelite);
                await   axios.post('index.php/Trazabilidad/get_satelite/',data)
                   .then(({data: {satelite}}) => {
                     this.sates = satelite
                     console.log(this.sates);
                   });
                   if (this.sates.length>0) {
                     if (this.form.prefijo==="N") {
                      this.loadguiasN();
                    }else{
                      this.loadguiasE();
                    }
                  }else {
                    Swal(
                      'Error',
                      'No estas aurotirzado',
                      'warning'
                    );
                  }
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
                      this.resete();
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
                      this.resete();
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
                 async loadCart() {

                     await  axios.get('index.php/User/get_profile/')
                      .then(({data: {profiles}}) => {
                         this.cart = profiles;
                      });
                    },
       },

       created(){
            this.loadproveedores();
            this.loadsatelites();
            this.loadCart();
       },
   })
 </script>
