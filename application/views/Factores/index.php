<div id="app" class="container">
  <div class="row">
    <div class="col-lg-12 my-5 ">
      <!-- Shopping cart table -->
      <div class="table-responsive ">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                  <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold links">factores <i class="fa fa-hashtag" aria-hidden="true"></i></div>
              </th>
            </tr>
            <tr>

              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                <button type="button" @click="resete();ver=false" class="btn btn-block btn-light btn-sm links" >Agregar <span class="mbri-plus"></span></button>
              </th>
            </tr>

          </thead>

        </table>
          <table id="example1" class="table ">
            <thead>
            <tr>
              <th class="links">Medida</th>
              <th class="links">Formula</th>
              <th class="links">Estado</th>
                <th class="links">Action</th>
            </tr>
            </thead>
              <tr v-for="(factores,index) in factores">
                <td class="links">{{factores.escala}}</td>
                <td class="links">{{factores.formula}}</td>
                <td class="links">{{factores.estado}}</td>
                  <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"@click="setear(index);ver=true">Ver</a>
                            <a class="dropdown-item" href="#" @click="setear(index);ver=false">Editar</a>
                            <a class="dropdown-item" href="#" @click="eliminarfactores(index)">Eliminar</a>
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
               <h4 class="modal-title links">Gestión de factores  <i class="fa fa-hashtag" aria-hidden="true"></i></h4>
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
                             <label class="links">Medida</label>
                             <div class="form-group">
                               <select @change="formula()" v-model="form.escala" v-validate="'required'"  name="escala" class="form-control" :disabled="ver" >
                                 <option value=""></option>
                                <option value="Metros">Metros</option>
                                <option value="Centímetros">Centímetros</option>
                                <option value="Porcientos">Porcientos</option>
                               </select>
                               <p class="text-danger my-1 small" v-if="(errors.first('escala'))" >  Este dato es requerido  </p>
                             </div>
                           </div>
                             <div class="col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Formula</label>
                                  <input type="text" v-model="form.formula" v-validate="'required'" name="formula" class="form-control" id="" disabled>
                                 <p class="text-danger my-1" v-if="(errors.first('formula'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-sm-12">
                               <!-- textarea -->
                               <div class="form-group">
                                 <label class="links">Variable</label>
                                  <input @keyup="formula()"  type="number" v-model="form.variable" v-validate="'required'" name="variable" class="form-control" id="" :disabled="ver">
                                 <p class="text-danger my-1" v-if="(errors.first('variable'))" >  Este dato es requerido  </p>
                               </div>
                             </div>
                             <div class="col-sm-12">
                               <label class="links">Estado</label>
                               <div class="form-group">
                                 <select @change="formula()" v-model="form.estado" v-validate="'required'"  name="estado" class="form-control" :disabled="ver" >
                                  <option value="Activo">Activo</option>
                                  <option value="Inactivo">Inactivo</option>

                                 </select>
                                 <p class="text-danger my-1 small" v-if="(errors.first('estado'))" >  Este dato es requerido  </p>
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
         factores:[],
         editMode:false,
         form:{
             'id':'',
             'escala':'',
             'formula':'',
             'variable':'',
         }
       },
       methods: {
           formula(){
             console.log("hola");
             if (this.form.escala==='Metros') {
                this.form.formula="VOLUMEN=(AN * AL* LA) *"+this.form.variable;
             }else if (this.form.escala==='Centímetros') {
                this.form.formula="VOLUMEN=(AN * AL* LA) /"+this.form.variable;
             }else if (this.form.escala==='Porcientos') {
                this.form.formula="TOTAL KILOS + (TOTAL KILOS *"+this.form.variable+ "%)";
             }
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
                       axios.post('index.php/Factores/insertar',data)
                       .then(response => {
                         if(response.data.status == 200){
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Agregado con exito'
                           })
                           $('#modal-lg').modal('hide');
                           this.loadfactores();
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
                       axios.post('index.php/Factores/editar',data)
                       .then(response => {
                         if(response.data.status == 200)
                         {
                           $('#modal-lg').modal('hide');
                           this.loadfactores();
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
                 eliminarfactores(index){
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
                       data.append('id',this.factores[index].id);
                         axios.post('index.php/Factores/eliminar',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Eliminado!',
                               'Ha sido eliminado.',
                               'success'
                             ).then(response => {
                                   this.loadfactores();
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                               this.loadfactores();
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
                   this.form.id=this.factores[index].id,
                   this.form.escala=this.factores[index].escala,
                   this.form.formula=this.factores[index].formula,
                   this.form.variable=this.factores[index].variable,
                   this.form.estado=this.factores[index].estado,
                   $('#modal-lg').modal('show');
                   this.editMode=true
                 },
                 ver(index){
                   this.form.id=this.factores[index].id,
                   this.form.escala=this.factores[index].escala,
                   this.form.formula=this.factores[index].formula,
                   this.form.variable=this.factores[index].variable,
                   this.form.estado=this.factores[index].estado,
                   $('#myModal').modal('show');
                   this.editMode=false
                 },
                 async loadfactores() {
                await   axios.get('index.php/Factores/getfactores/')
                   .then(({data: {factores}}) => {
                     this.factores = factores
                   });
                   $("#example1").DataTable();
                 },
                 async loadCart() {
                     await  axios.get('index.php/User/get_profile/')
                      .then(({data: {profiles}}) => {
                         this.cart = profiles;
                      });
                    },
       },

       created(){
            this.loadfactores();
            this.loadCart();
       },
   })
 </script>
