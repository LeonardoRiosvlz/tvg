<div id="app" class="container">
  <div class="row">
    <div class="col-lg-12 my-1 ">
      <!-- Shopping cart table -->
      <div class="table-responsive ">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                  <div class="bg-light rounded-pill px-4 py-1 text-uppercase font-weight-bold links">Clientes <i class="fa fa-user-o" aria-hidden="true"></i></div>
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
          <div class="col-md-4">

          <a href="<?=base_url()?>Orders_admin">
            <div class="card-counter info p-2 zoom" style="opacity:0.9">
              <span class=" fa mbri-users" style="font-size:5em;opacity:0.6"></span>
              <span class="count-numbers">5</span>
              <span class="count-name links">Clientes activos</span>
            </div>
          </a>
          </div>

          <div class="col-md-4">

          <a href="<?=base_url()?>Orders_admin">
            <div class="card-counter success p-2 zoom" style="opacity:0.9">
              <span class=" fa mbri-users" style="font-size:5em;opacity:0.6"></span>
              <span class="count-numbers">5</span>
              <span class="count-name links">Clientes activos</span>
            </div>
          </a>
          </div>

          <div class="col-md-4">

            <a href="<?=base_url()?>Shipping">
            <div class="card-counter danger p-2 zoom" style="opacity:0.9;background-color:#red!important">
              <span class="mbri-users" style="font-size:5em;opacity:0.6"></span>
              <span class="count-numbers">6</span>
              <span class="count-name links">Clientes inactivos</span>
            </div>
          </a>
          </div>
        </div>
          <table id="example1" class="table ">
            <thead>
            <tr>
              <th class="links">Empresa</th>
              <th class="links">NIT</th>
              <th class="links">Represante Legal</th>
              <th class="links">Contacto</th>
              <th class="links">Estado</th>
              <th class="links">Action</th>
            </tr>
            </thead>
              <tr v-for="(clientes,index) in clientes">
                <td class="links">{{clientes.nombre_cargo}}</td>
                  <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"@click="setear(index);ver=true">Ver</a>
                            <a class="dropdown-item" href="#" @click="setear(index);ver=false">Editar</a>
                            <a class="dropdown-item" href="#" @click="eliminarclientes(index)">Eliminar</a>
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
               <h4 class="modal-title links">Datos del cliente  <i class="fa fa-user-o" aria-hidden="true"></i></h4>
               <button type="button" @click="resete()" class="close" data-dismiss="modal" aria-label="Close">
                 <span class="mbri-close " ></span>
               </button>
             </div>
             <div class="modal-body">
         <!-- Incio de formulario -->
               <div class="card-body">
                       <form role="form" id="form" @submit.prevent="validateBeforeSubmit">
                         <div class="row">
                           <div class="col-md-4 col-sm-12">
                             <label class="links">Tipo de cliente</label>
                             <div class="form-group">
                               <select v-model="form.tipo_cliente" v-validate="'required'"  name="tipo_cliente" class="form-control" :disabled="ver" >
                                <option value=""></option>
                                <option value="Persona natural">Persona natural</option>
                                <option value="Persona jurídica">Persona jurídica</option>
                               </select>
                               <p class="text-danger my-1 small" v-if="(errors.first('tipo_cliente'))" >  Este dato es requerido  </p>
                             </div>
                           </div>
                           <div class="col-md-4 col-sm-12">
                             <label class="links">Cliente especial</label>
                             <div class="form-group">
                               <select v-model="form.cliente_especial" v-validate="'required'"  name="cliente_especial" class="form-control" :disabled="ver" >
                                <option value=""></option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                               </select>
                               <p class="text-danger my-1 small" v-if="(errors.first('cliente_especial'))" >  Este dato es requerido  </p>
                             </div>
                           </div>
                           <div class="col-md-4 col-sm-12">
                             <label class="links">Sucursal</label>
                             <div class="form-group">
                               <select v-model="form.sucursal" v-validate="'required'" name="sucursal" class="form-control" :disabled="ver"  >
                                <option value=""></option>
                                 <option v-for="sucursales in sucursales" :value="sucursales.nombre_sucursal">{{sucursales.nombre_sucursal}}</option>
                               </select>
                               <p class="text-danger my-1 small" v-if="(errors.first('sucursal'))" >  Este dato es requerido  </p>
                             </div>
                           </div>
                             <div class="col-md-5 col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">NIT</label>
                                  <input type="text" v-model="form.nit_cliente" v-validate="'required'" name="nit_cliente" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('nit_cliente'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-7 col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Nombre Empresa</label>
                                  <input type="text" v-model="form.nombre_empresa" v-validate="'required'" name="nombre_empresa" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('nombre_empresa'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <table class="table">
                               <thead>
                                 <tr>
                                   <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                                       <div class="bg-primary text-white rounded-pill px-4 py-1 text-uppercase font-weight-bold links">Datos del contacto</div>
                                   </th>
                                 </tr>
                               </thead>
                             </table>
                             <div class="col-md-12 col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Nombre y Apellido</label>
                                  <input type="text" v-model="form.nombre_cliente" v-validate="'required'" name="nombre_cliente" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('nombre_cliente'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-6 col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Número de cédula</label>
                                  <input type="number" v-model="form.cedula_cliente" v-validate="'required'" name="cedula_cliente" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('cedula_cliente'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-6 col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Teléfono</label>
                                  <input type="number" v-model="form.telfono_cliente" v-validate="'required'" name="telfono_cliente" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('telfono_cliente'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-12 col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Correo</label>
                                  <input type="email" v-model="form.correo_cliente" v-validate="'required'" name="correo_cliente" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('correo_cliente'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-12 col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Dirección</label>
                                  <textarea type="email" v-model="form.direccion_cliente" v-validate="'required'" name="direccion_cliente" class="form-control" id="" :disabled="ver"></textarea>
                                 <p class="text-danger my-1" v-if="(errors.first('direccion_cliente'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-6 col-sm-12">
                               <label class="links">Departamento</label>
                               <div class="form-group">
                                 <select v-model="form.sucursal" v-validate="'required'" name="sucursal" class="form-control" disabled>
                                  <option value=""></option>
                                   <option v-for="sucursales in sucursales" :value="sucursales.nombre_sucursal">{{sucursales.departamento}}</option>
                                 </select>
                                 <p class="text-danger my-1 small" v-if="(errors.first('sucursal'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-6 col-sm-12">
                               <label class="links">Ciudad</label>
                               <div class="form-group">
                                 <select v-model="form.sucursal" v-validate="'required'" name="sucursal" class="form-control" disabled  >
                                  <option value=""></option>
                                   <option v-for="sucursales in sucursales" :value="sucursales.nombre_sucursal">{{sucursales.ciudad}}</option>
                                 </select>
                                 <p class="text-danger my-1 small" v-if="(errors.first('sucursal'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-md-6 col-sm-12">
                               <label class="links">Estado</label>
                               <div class="form-group">
                                 <select v-model="form.cliente_especial" v-validate="'required'"  name="cliente_especial" class="form-control" :disabled="ver" >
                                  <option value=""></option>
                                  <option value="Activo">Activo</option>
                                  <option value="Inactivo">Inactivo</option>
                                 </select>
                                 <p class="text-danger my-1 small" v-if="(errors.first('cliente_especial'))" >  Este dato es requerido  </p>
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
         clientes:[],
         sucursales:[],
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
                       axios.post('index.php/clientes/insertar',data)
                       .then(response => {
                         if(response.data.status == 200){
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Agregado con exito'
                           })
                           $('#modal-lg').modal('hide');
                           this.loadclientes();
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
                       axios.post('index.php/clientes/editar',data)
                       .then(response => {
                         if(response.data.status == 200)
                         {
                           $('#modal-lg').modal('hide');
                           this.loadclientes();
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
                 eliminarclientes(index){
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
                       data.append('id',this.clientes[index].id);
                         axios.post('index.php/clientes/eliminar',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Eliminado!',
                               'Ha sido eliminado.',
                               'success'
                             ).then(response => {
                                   this.loadclientes();
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                               this.loadclientes();
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
                   this.form.id=this.clientes[index].id,
                   this.form.nombre_cargo=this.clientes[index].nombre_cargo,
                   $('#modal-lg').modal('show');
                   this.editMode=true
                 },
                 ver(index){
                   this.form.id=this.clientes[index].id,
                   this.form.nombre_cargo=this.clientes[index].nombre_cargo,
                   $('#myModal').modal('show');
                   this.editMode=false
                 },
                 async loadclientes() {
                await   axios.get('index.php/clientes/getclientes/')
                   .then(({data: {clientes}}) => {
                     this.clientes = clientes
                   });
                   $("#example1").DataTable();
                 },
             async loadSucursales() {
                await   axios.get('index.php/Sucursales/getsucursales/')
                   .then(({data: {sucursales}}) => {
                     this.sucursales = sucursales
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
            this.loadSucursales();
            this.loadclientes();
            this.loadCart();
       },
   })
 </script>
