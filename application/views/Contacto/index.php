<div class="container">


      <div class="row m-5">

        <div class="col-lg-12 ">


       <form role="form" id="form" @submit.prevent="validateBeforeSubmit">

          <div class="messages"></div>

          <div class="controls">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="links" for="form_name">Nombres</label>
                  <input v-model="form.nombre" v-validate="'required'" name="nombre" type="text" class="form-control" placeholder="" >
                 <p class="text-danger my-1" v-if="(errors.first('nombre'))" >  Este dato es requerido  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="links" for="form_lastname">Apellido</label>
                 <input v-model="form.apellido" v-validate="'required'" name="apellido" type="text" class="form-control" placeholder="" >
                 <p class="text-danger my-1" v-if="(errors.first('apellido'))" >  Este dato es requerido  </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="links"  for="form_email">Email </label>
                 <input v-model="form.email" v-validate="'required|email'" name="email" type="text" class="form-control" placeholder="" >
                 <p class="text-danger my-1" v-if="(errors.first('email'))" >  Este dato es requerido  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="links" for="form_phone">Teléfono</label>
                 <input v-model="form.telefono" v-validate="'required'" name="telefono" type="text" class="form-control" placeholder="" >
                 <p class="text-danger my-1" v-if="(errors.first('telefono'))" >  Este dato es requerido  </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="form_message">Message *</label>
                  <textarea v-model="form.mensaje" id="form_message"v-validate="'required'" name="mensaje" class="form-control" placeholder="" rows="4"  data-error="Please,leave us a message."></textarea>
                  <p class="text-danger my-1" v-if="(errors.first('mensaje'))" >  Este dato es requerido  </p>
                </div>
              </div>
              <div class="col-md-12">
                <input class="links" type="submit" class="btn btn-light btn-send" value="Enviar">
              </div>
            </div>

          </div>

          </form>

        </div>

      </div>
</div>
</div>
<script>
     axios.defaults.baseURL = '<?PHP echo base_url(); ?>';
     Vue.use(VeeValidate ,{locale: 'vi'});
     new Vue({
       el: '#app',
       data: {
         cart:[],
         editMode:false,
         form:{
             'nombre':'',
             'apellido':'',
             'email':'',
             'telefono':'',
             'mensaje':'',
         }
       },
       methods: {
           resete(){
               this.$validator.reset();
               document.getElementById("form").reset();
              this.form.nombre="";
              this.form.apellido="";
              this.form.email="";
              this.form.telefono="";
              this.form.mensaje="";
          

           },
           validateBeforeSubmit() {
                   this.$validator.validateAll().then((result) => {
                     if (result) {
                       let data = new FormData();
                       data.append('service_form',JSON.stringify(this.form));
                     if(!this.editMode){
                       axios.post('index.php/Contacto/enviar/',data)
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
                       axios.post('index.php/brand/editar',data)
                       .then(response => {
                         if(response.data.status == 200)
                         {
                           $('#modal-lg').modal('hide');
                           this.loadbrands();
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Editado correctamente'
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
 
                 loadCart(){

                   if(localStorage.getItem('cart')) {
                     this.cart=JSON.parse(localStorage.cart);
                   }else {
                     localStorage.setItem("cart", JSON.stringify(this.cart));
                   }
                 },
       },

       created(){
            this.loadCart();
       },
   })
 </script>
