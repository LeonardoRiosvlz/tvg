<div id="app" class="container" style="min-height:1200px;">
  <div class="row">
    <div class="col-lg-12 my-5 ">
      <!-- Shopping cart table -->
      <div class="table-responsive ">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                  <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold links">Trazabilidad de la carga <i class="fa fa-location-arrow" aria-hidden="true"></i></div>
              </th>
            </tr>
            <tr>
          </tr>
          </thead>

        </table>
        <div class="card mb-3" v-for="trazabilidad in trazabilidad">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img :src="'<?=base_url()?>'+trazabilidad.url_foto" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action active">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">{{trazabilidad.tipo_reporte}}</h5>
                  <small>{{trazabilidad.fecha_despacho}} {{trazabilidad.hora}}</small>
                </div>
              </a>
            </div>
              <h7 class="card-title" v-if="trazabilidad.nombre_proveedor">PROVEEDOR: {{trazabilidad.nombre_proveedor}}</h7></br>
              <h7 class="card-title" v-if="trazabilidad.nombre_proveedor">Guia del proveedor: {{trazabilidad.guia_proveedor}}</h7></br>
              <h7 class="card-title">Detalles de carga:</h7>
              <p class="card-text"><small class="text-muted">{{trazabilidad.detalles_carga}}</small></p>
              <h7 class="card-title">Oservaciones:</h7>
              <p class="card-text"><small class="text-muted">{{trazabilidad.observaciones}}</small></p>
              <p class="card-text" v-if="trazabilidad.tipo_reporte==='Salida'"><small class="text-muted">Fecha estimada de llegada: {{trazabilidad.llegada_destino}}</small></p>
              <p class="card-text" v-if="trazabilidad.tipo_reporte==='Redireccionamiento'"><small class="text-muted">Fecha estimada de llegada: {{trazabilidad.llegada_destino}}</small></p>
              <p class="card-text" v-if="trazabilidad.tipo_reporte==='Recogida'"><small class="text-muted">Fecha de alistamiento: {{trazabilidad.llegada_destino}}</small></p>
              <p class="card-text" v-if="trazabilidad.tipo_reporte==='Alistamiento'"><small class="text-muted">Fecha de envío: {{trazabilidad.llegada_destino}}</small></p>
              <p class="card-text" v-if="trazabilidad.tipo_reporte==='Llegada'"><small class="text-muted">Fecha de despacho: {{trazabilidad.llegada_destino}}</small></p>
                <p class="card-text" v-if="trazabilidad.tipo_reporte==='Llegada Destino'"><small class="text-muted">Fecha lista para entregar: {{trazabilidad.llegada_destino}}</small></p>
            </div>
            <article class="gallery-wrap p-3">
            <div class="img-small-wrap">
              <div v-for="imagenes in trazabilidad.fotos" class="item-gallery thumbnail"> <a :href="'#'+imagenes.id"><img :src="'<?=base_url();?>'+imagenes.foto"> </a></div>
            </div>
            </article>
            <a v-for="imagenes in trazabilidad.fotos" href="#_" class="lightbox" :id="imagenes.id">
              <img :src="'<?=base_url();?>'+imagenes.foto">
            </a>
          </div>
        </div>
      </div>

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
                                  <select v-model="form.tipo_reporte" name="tipo_reporte"   v-validate="'required'" class="form-control" id="exampleFormControlSelect1" :disabled="ver">
                                    <option value=""></option>
                                    <option   value="Recogida">Recogida donde cliente</option>
                                    <option   value="Alistamiento">Alistamiento</option>
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
                            <div class="col-3">
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Satélite encargado</label>
                                  <select v-model="form.id_satelite"   v-validate="'required'" name="id_satelite" class="form-control" id="exampleFormControlSelect1" :disabled="ver||form.tipo_reporte==='Recogida'||form.tipo_reporte==='Alistamiento'||form.tipo_reporte==='Llegada Destino'">
                                    <option value=""></option>
                                    <option v-for="satelites in satelites" :value="satelites.id">{{satelites.nombre_sat}}</option>
                                  </select>
                                  <p class="text-danger my-1" v-if="(errors.first('id_satelite'))" >  Este dato es requerido  </p>
                                </div>
                            </div>

                            <div class=" col-md-3 col-sm-12" v-show="form.tipo_reporte">
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
                            <div class="col-6">
                             <label for="colFormLabelSm" class="links">Foto Referecial</label>
                              <div class="form-group" v-if="editMode">
                                <input type="file"  id="image" name="image">
                                 <p class="text-danger my-1 small" v-if="(errors.first('image'))" >  Este dato es requerido  </p>
                               </div>
                               <div v-else class="form-group">
                                      <input type="file" v-validate="'required'"  id="image" name="image">
                                      <p class="text-danger my-1 small" v-if="(errors.first('image'))" >  Este dato es requerido  </p>
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
                                 <label for="exampleFormControlSelect1">Proveedores</label>
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
         imagenes:[],
         satelites:[],
         permisos:[],
         guias:[],
         trazabilidad:[],
         sedes:[],
         proveedores:[],
         cargos:[],
         editMode:false,
         form:{
             'id':'',
             <?php if(  isset( $_GET["ref_pre"] ) ): ?>
              'prefijo':'<?=$_GET["ref_pre"];?>',
             <?php else: ?>
               'prefijo':'',
             <?php endif; ?>
             <?php if(  isset( $_GET["ref_guia"] ) ): ?>
               'id_guia':'<?=$_GET["ref_guia"];?>',
             <?php else: ?>
               'id_guia':'',
             <?php endif; ?>
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
           depp(){
             this.form.departamento=this.colombia[this.form.dep].departamento;
             console.log(this.form.dep);
           },
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
          for (var i = 0; i < this.trazabilidad.length; i++) {
          this.trazabilidad[i].fotos=[];
              let data = new FormData();
               data.append('id_guia',this.trazabilidad[i].id_guia);
               data.append('tiempo',this.trazabilidad[i].tiempo);
                await axios.post('index.php/Trazabilidad/getimagenes/',data)
               .then(({data: {imagenes}}) => {
                     this.imagenes = imagenes;
                     for (var j = 0; j < this.imagenes.length; j++) {

                       this.trazabilidad[i].fotos.push({
                         foto:this.imagenes[j].url,
                         id:this.imagenes[j].id,
                       }
                    );
                 }

                   });




                 }
           },
           resete(){
             const dateTime = Date.now();
               this.form.tiempo = Math.floor(dateTime / 1000);
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
                      this.form.tiempo=this.trazabilidad[index].tiempo;
                       this.form.id_satelite=this.trazabilidad[index].id_satelite;
                        this.form.fecha_despacho=this.trazabilidad[index].fecha_despacho;
                         this.form.llegada_destino=this.trazabilidad[index].llegada_destino;
                          this.form.tipo_reporte=this.trazabilidad[index].tipo_reporte;
                           this.form.id_proveedor=this.trazabilidad[index].id_proveedor;
                            this.form.detalles_carga=this.trazabilidad[index].detalles_carga;
                             this.form.observaciones=this.trazabilidad[index].observaciones;
                             this.form.hora=this.trazabilidad[index].hora;
                             this.loadFotos();
                   $('#modal-lg').modal('show');
                   this.editMode=true
                 },
                 ver(index){
                   this.form.id=this.trazabilidad[index].id;
                    this.form.prefijo=this.trazabilidad[index].prefijo;
                     this.form.id_guia=this.trazabilidad[index].id_guia;
                      this.form.tiempo=this.trazabilidad[index].tiempo;
                       this.form.id_satelite=this.trazabilidad[index].id_satelite;
                        this.form.fecha_despacho=this.trazabilidad[index].fecha_despacho;
                         this.form.llegada_destino=this.trazabilidad[index].llegada_destino;
                          this.form.tipo_reporte=this.trazabilidad[index].tipo_reporte;
                           this.form.id_proveedor=this.trazabilidad[index].id_proveedor;
                            this.form.detalles_carga=this.trazabilidad[index].detalles_carga;
                             this.form.observaciones=this.trazabilidad[index].observaciones;
                             this.loadFotos();
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
                    this.loadFotos();
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
                 loadPln(){
                   if (localStorage.getItem('prefijo')) {
                     this.form.prefijo=localStorage.getItem('prefijo');
                      this.form.id_guia=localStorage.getItem('id_guia');
                      if(this.form.prefijo==="E"){
                        window.setTimeout(function () {
                              localStorage.removeItem('prefijo');
                              localStorage.removeItem('id_guia');
                             }, 300);
                        this.loadguiasE();
                      }
                      if(this.form.prefijo==="N"){
                        window.setTimeout(function () {
                              localStorage.removeItem('prefijo');
                              localStorage.removeItem('id_guia');
                             }, 300);
                        this.loadguiasN();
                      }
                   }

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
         this.loadPln();
            this.loadproveedores();
            this.loadsatelites();
            this.loadCart();
            this.loadTrazabilidad();
       },
   })
 </script>
