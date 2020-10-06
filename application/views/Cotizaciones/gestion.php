<style media="screen">
.nopadding {
 padding: 0 !important;
 margin: 0 !important;
}
.jus{
  text-align:justify;
  text-justify:inter-word;
  text-indent: 0.5em;
}
</style>
<div id="app" class="container">
  <div class="row" v-if="cotizaciones.length>0 && estatus_gestion==='En estudio'|| cotizaciones.length>0 && estatus_gestion==='Enviado'">
    <div class="col-lg-12 my-5 ">
      <!-- Shopping cart table -->
      <div class="car border-0 p-2">

          <img v-for="empresa in empresa" :src="'<?=base_url();?>'+empresa.logo_uno" alt="" width="100%"  class="mx-auto  img-fluid">
            <p class="lead small ">Bogotá, D.C. {{fecha_creacion}}</p>
            <p class="lead small nopadding">Señores {{nombre_empresa}}</p>
            <p class="lead small nopadding">{{nombre_cliente}}</p>
            <p class="lead small nopadding">Tel.{{telefono_cliente}}</p>
            <p class="lead small nopadding">Correo: {{correo_cliente}}</p>
            <p class="lead small nopadding">Ciudad: {{ciudad}}</p>
            <p class="lead small  ">REF: COTIZACIÓN TRANSPORTE A DIFERENTES DESTINOS</p>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">SALUDO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">ITEMS DE COTIZADOS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">NOTAS DEL TIPO DE TRANSPORTE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contrato" role="tab" aria-controls="contact" aria-selected="false">NOTAS DEL CONTRATO</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card p-3 border-0 " v-for="saludo in saludo">
                  <p class="lead jus links">{{saludo.resumen}}</p>
                  <p class="lead jus links">{{saludo.descripcion}}</p>
                </div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                  <table class="table table table-sm table-responsive  ">
                    <thead>
                      <tr>
                        <th>ORIGEN</th>
                        <th>DESTINO</th>
                        <th>TRANSPORTE</th>
                        <th style="white-space: nowrap;" >VALOR KILO</th>
                        <th>SEGURO</th>
                        <th style="white-space: nowrap;">COSTE DE GUÍA</th>
                        <th>ITINERARIOS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(elemento ,index) in items">
                        <td style="white-space: nowrap;">{{elemento.departamento_origen}}-{{elemento.ciudad_origen}}</td>
                        <td style="white-space: nowrap;">{{elemento.departamento_destino}}-{{elemento.ciudad_destino}}</td>
                        <td style="white-space: nowrap;">{{elemento.tipo_transporte}}</td>
                        <td style="white-space: nowrap;">{{elemento.precio}} $</td>
                        <td >{{elemento.segurocarga}}% del valor declarado de la mercancía</td>
                        <td style="white-space: nowrap;">{{elemento.costeguia}} $</td>
                        <td style="white-space: nowrap;">{{elemento.itinerarios}}</td>
                      </tr>
                    </tbody>
                  </table>

              </div>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="card p-3 border-0 " v-for="notas in notas">
                  <p class="lead jus links"><strong style="font-weight: bold;">{{notas.resumen}}</strong>:{{notas.descripcion}}</p>
                </div>

              </div>
              <div class="tab-pane fade" id="contrato" role="tabpanel" aria-labelledby="contact-tab">
                <div class="card p-3 border-0 " v-for="contrato in contrato">
                  <p class="lead jus links"><strong style="font-weight: bold;">{{contrato.resumen}}</strong>:{{contrato.descripcion}}</p>
                </div>
              <p class="lead jus links">  De requerir información sobre otras rutas, tarifas y condiciones por favor indíquenos la información y con gusto le presentaremos la Propuesta comercial.</p>
              <p class="lead jus links">  Estaremos muy atentos a sus comentarios y requerimientos;</p>
              <p class="lead jus links">  {{nombre}} {{apellido}}</p>
              <p class="lead jus links" style="font-weight: bold;">  {{cargo}}</p>
              <div class="row mb-4">
                  <div class="col-6">
                    <button type="button" class="btn btn-danger btn-lg btn-block" @click="editarEstad();estado='Rechazada'">RECHAZAR</button>
                  </div>
                  <div class="col-6">
                    <button type="button" class="btn btn-success btn-lg btn-block" @click="editarEstad();estado='Aprobada'">ACEPTAR</button>
                  </div>
              </div>
              </div>
                <pre>{{estado}}</pre>
            </div>

          <img v-for="empresa in empresa" :src="'<?=base_url();?>'+empresa.logo_dos" alt="" width="100%"  class="mx-auto  img-fluid">
      </div>
      <!-- End -->
    </div>
  </div>
  <div v-else class="col-12 my-5" style="height:1000px;">
    <img src="<?=base_url();?>/img/404.svg" alt="">
  </div>


   </div>

</div>
<script>
     axios.defaults.baseURL = '<?PHP echo base_url(); ?>';
     Vue.use(VeeValidate ,{locale: 'vi'});
     new Vue({
       el: '#app',
       data: {
         estado:'',
         departamento:0,
         ver:false,
         ref_cot:'<?=$_GET["ref_cot"];?>',
         ref_cod:'<?=$_GET["ref_cod"];?>',
         cart:[],
         cotizaciones:[],
         items:[],
         notas:[],
         saludo:[],
         editMode:false,
         fecha_creacion:'',
         nombre_empresa:'',
         nombre_cliente:'',
         telefono_cliente:'',
         correo_cliente:'',
         ciudad:'',
         fecha_creacion:'',
         estatus_gestion:'',
         form:{
             'fecha_creacion':'',
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
                       axios.post('index.php/Cargos/insertar',data)
                       .then(response => {
                         if(response.data.status == 200){
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Agregado con exito'
                           })
                           $('#modal-lg').modal('hide');
                           this.loadcargos();
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
                       axios.post('index.php/Cargos/editar',data)
                       .then(response => {
                         if(response.data.status == 200)
                         {
                           $('#modal-lg').modal('hide');
                           this.loadcargos();
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
                       data.append('id',this.cargos[index].id);
                         axios.post('index.php/Cargos/eliminar',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Eliminado!',
                               'Ha sido eliminado.',
                               'success'
                             ).then(response => {
                                   this.loadcargos();
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
                   this.form.id=this.cargos[index].id,
                   this.form.nombre_cargo=this.cargos[index].nombre_cargo,
                   $('#modal-lg').modal('show');
                   this.editMode=true
                 },
                 ver(index){
                   this.form.id=this.cargos[index].id,
                   this.form.nombre_cargo=this.cargos[index].nombre_cargo,
                   $('#myModal').modal('show');
                   this.editMode=false
                 },
                 editarEstad(index){
                     Swal({
                       title: '¿Estás seguro?',
                       text: "",
                       type: 'warning',
                       showCancelButton: true,
                       confirmButtonText: '¡Si!',
                       cancelButtonText: '¡No! ',
                       reverseButtons: true
                     }).then((result) => {
                       if (result.value) {
                         let data = new FormData();
                         data.append('estatus_gestion',this.estado);
                         data.append('id',this.ref_cot);
                         axios.post('index.php/Cotizaciones/editarEstad',data)
                         .then(response => {
                           if(response.data.status == 200){
                             Swal.fire({
                               type: 'success',
                               title: 'Exito!',
                               text: 'Editado con exito'
                             });
                             this.loadcotizaciones();
                           }
                           else{
                             Swal.fire({
                               type: 'error',
                               title: 'Lo sentimos',
                               text: 'Ha ocurrido un error'
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
                 async loadcotizaciones(){
                    let data = new FormData();
                       data.append('id',this.ref_cot);
                       data.append('codigo',this.ref_cod);
                       await  axios.post('index.php/Cotizaciones/getcotizacion/',data)
                       .then(({data: {cotizaciones}}) => {
                             this.cotizaciones = cotizaciones;
                     });
                     this.fecha_creacion=this.cotizaciones[0].fecha_creacion;
                     this.nombre_empresa=this.cotizaciones[0].nombre_empresa;
                     this.nombre_cliente=this.cotizaciones[0].nombre_cliente;
                     this.telefono_cliente=this.cotizaciones[0].telefono_cliente;
                     this.correo_cliente=this.cotizaciones[0].correo_cliente;
                     this.ciudad=this.cotizaciones[0].ciudad;
                     this.nombre=this.cotizaciones[0].nombre;
                     this.estatus_gestion=this.cotizaciones[0].estatus_gestion;
                     this.apellido=this.cotizaciones[0].apellido;
                     this.cargo=this.cotizaciones[0].cargo;
                     this.saludo=JSON.parse(this.cotizaciones[0].saludo);
                     this.items=JSON.parse(this.cotizaciones[0].items);
                     this.notas=JSON.parse(this.cotizaciones[0].notas);
                     this.contrato=JSON.parse(this.cotizaciones[0].contrato);


                     if (this.cotizaciones[0].estatus_gestion==='Enviado') {
                       data.append('id',this.ref_cot);
                       data.append('codigo',this.ref_cod);
                       await  axios.post('index.php/Cotizaciones/estudio/',data)
                       .then(response => {
                         if(response) {

                         } else {

                         }
                       })
                     }
                   },
                   async loadempresa() {
                   await axios.get('index.php/DatosEmpresa/getempresa/')
                      .then(({data: {empresa}}) => {
                        this.empresa = empresa
                      });
                      this.setear();
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
            this.loadempresa();
            this.loadcotizaciones();
            this.loadCart();
       },
   })
 </script>
