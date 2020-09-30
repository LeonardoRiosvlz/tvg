<style media="screen">
.nopadding {
 padding: 0 !important;
 margin: 0 !important;
}
.jus{
  text-align:justify;
  text-justify:inter-word;
  text-indent: 1.5em;
}
</style>
<div id="app" class="container-fluid my-5">
  <div class="row" v-if="facturas.length>0">

  </div>
  <div v-else class="col-12 my-5" style="height:1000px;">
    <img src="<?=base_url();?>/img/404.svg" alt="">
    {{ref_cod}}
  </div>
  <div v-for="facturas in facturas" class="container">

  <div class="row">
    <div class="col-7">
        <p class="lead" style="font-size:17px;margin:0">Cliente: {{form.nombre_cliente}}</p>
        <p class="lead" style="font-size:17px;margin:0">NIT/Cedula: {{form.cedula}}</p>
        <p class="lead" style="font-size:17px;margin:0">Dirección: {{form.direccion_cliente}}</p>
        <p class="lead" style="font-size:17px;margin:0">Teléfono: {{form.telefono_cliente}}</p>
        <p class="lead" style="font-size:17px;margin:0">Ciudad: {{form.ciudad_cliente}}</p>

    </div>
           <div class="col-5" >
             <a href="#" class="list-group-item list-group-item-success" style=" font-size:30px; height:49px!important;">FV-{{form.id}}</a>
             <a href="#" class="list-group-item  " styles="font-size:10px;">Fecha: {{form.fecha}}</a>
             <a href="#" class="list-group-item " styles="font-size:10px;">Vencimiento: {{form.f_vencimiento}}</a>
           </div>
       </div>
       <div class="row my-1">
           <table class="table" width="100%">
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
              </tr>
            </tbody>
          </table>

       </div>
           <div class="row">
           <div class="panel panel-default">
             <div class="panel-heading">Notas</div>
             <div class="panel-body">
               <p style="font-size:15px;" v-for="notas in form.notas">{{notas.descripcion}}</p>

               </div>
             </div>
           </div>
           <div class="row">
           <div class="panel panel-default">


             <div class="panel-heading">Tipo de pago{{form.forma_pago}}</div>
             <div class="panel-body">

             </div>
             </div>
         </div>
           <div class="row">
           <div class="panel panel-default" style="width:65%; float:left">
             <div class="panel-body ">
             .
             </div>
           </div>
           <ul class="list-group" style="width:35%; height: 50px;float:right">

               <li class="list-group-item " >TOTAL: {{form.total}} $</li>
             </ul>
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
         <?php if(  isset( $_GET["ref_cot"] ) ): ?>
          ref_cot:'<?=$_GET["ref_cot"];?>',
         <?php else: ?>
           ref_cot:'',
         <?php endif; ?>
         <?php if(  isset( $_GET["ref_cod"] ) ): ?>
          ref_cod:'<?=$_GET["ref_cod"];?>',
         <?php else: ?>
           ref_cod:'',
         <?php endif; ?>
         cart:[],
         facturas:[],
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
              'id':'',
              'user_id':'',
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
                       await  axios.post('index.php/Facturas/getfactura/',data)
                       .then(({data: {facturas}}) => {
                             this.facturas = facturas;
                     });
                     this.form.id=this.facturas[0].id;
                     this.form.user_id=this.facturas[0].user_id;
                     this.form.items=JSON.parse(this.facturas[0].items);
                     this.form.notas=JSON.parse(this.facturas[0].notas);
                     this.form.fecha=this.facturas[0].fecha;
                     this.form.f_vencimiento=this.facturas[0].f_vencimiento;
                     this.form.cedula=this.facturas[0].cedula;
                     this.form.nombre_cliente=this.facturas[0].nombre_cliente;
                     this.form.direccion_cliente=this.facturas[0].direccion_cliente;
                     this.form.telefono_cliente=this.facturas[0].telefono_cliente;
                     this.form.ciudad_cliente=this.facturas[0].ciudad_cliente;
                     this.form.valor_total=this.facturas[0].valor_total;
                     this.form.forma_pago=this.facturas[0].forma_pago;
                     this.form.precio_letras=this.facturas[0].precio_letras;
                     this.form.total=this.facturas[0].total;
                     this.form.dias_demora=this.facturas[0].dias_demora;
                     this.form.estado=this.facturas[0].estado;
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
