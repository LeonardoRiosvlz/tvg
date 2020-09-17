<div id="app" class="container">
  <div class="row">
    <div class="col-lg-12 my-5 ">
      <!-- Shopping cart table -->
      <div class="table-responsive ">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                  <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold links">Cotizador <i class="fa fa-street-view" aria-hidden="true"></i></div>
              </th>
            </tr>
            <tr>

              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                <button type="button" @click="resete();ver=false" class="btn btn-block btn-light btn-sm links" >Reiniciar <span class="mbri-update"></span></button>
              </th>
            </tr>

          </thead>

        </table>

      </div>
        <div class="row" v-show="!ver">

        <div class="card col-12 p-3 border-0" >
         <h4 class="card-title">Tarifa Acorde</h4>
          <div class="card-body row sp">
            <div class="col-md-6" >
              <label class="links">Tipo de transporte</label>
              <div class="form-group">
                <select v-model="item.tipo_transporte" @change="item.tipo_envio=''"  name="tipo_transporte" class="form-control" :disabled="ver" >
                 <option value=""></option>
                  <option v-for="transportes in transportes" :value="transportes.tipo_transporte">{{transportes.tipo_transporte}}</option>
                </select>

              </div>
            </div>
            <div class="col-md-6" >
              <label class="links">Tipo de envío</label>
              <div class="form-group">
                <select v-model="item.tipo_envio"  name="tipo_envio" class="form-control" :disabled="ver" >
                  <option value=""></option>
                  <option v-for="tiposenvios in tiposenvios" v-show="tiposenvios.tipo_transporte===item.tipo_transporte" :value="tiposenvios.nombre_tiposenvios">{{tiposenvios.nombre_tiposenvios}}</option>
                </select>

              </div>
            </div>
              <div class="col-sm-12">

                  <label class="links">Trazabilidad</label>
                  <input list="tarifas" v-model="item.id_tarifa" @change="tari()"  value="" class="form-control form-control-lg" placeholder="Escriba una ruta">
                    <datalist id="tarifas">
                        <option v-for="tarifas in tarifas" v-if="tarifas.tipo_envio===item.tipo_envio && tarifas.tipo_transporte===item.tipo_transporte"  :value="tarifas.id">De {{tarifas.ciudad_origen}} a {{tarifas.ciudad_destino}} Tiempo:{{tarifas.tiempos}}</option>
                    </datalist>

              </div>
            <div class="col-sm-3">
               <div class="form-group links">
                 <label>Depto. origen</label>
                <select v-model="item.id_tarifa" @change="tari()"  name="ciudad_destino" class="form-control" disabled >
                  <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.departamento_origen}}</option>
                </select>

              </div>
           </div>
           <div class="col-sm-3">
              <div class="form-group links">
                <label>Ciudad origen</label>
               <select v-model="item.id_tarifa" @change="tari()" name="ciudad_destino" class="form-control" disabled >
                 <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.ciudad_origen}}</option>
               </select>

             </div>
          </div>
          <div class="col-sm-3">
             <div class="form-group links">
               <label>Depto. destino</label>
              <select v-model="item.id_tarifa" @change="tari()"  name="ciudad_destino" class="form-control" disabled >
                <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.departamento_destino}}</option>
              </select>

            </div>
         </div>
         <div class="col-sm-3">
            <div class="form-group links">
              <label>Ciudad destino</label>
             <select v-model="item.id_tarifa" @change="tari()" name="ciudad_destino" class="form-control" disabled >
               <option v-for="tarifas in tarifas" :value="tarifas.id">{{tarifas.ciudad_destino}}</option>
             </select>

           </div>
        </div>
        <div class="col-sm-4">
           <div class="form-group links">
             <label>itinerarios</label>
            <select v-model="item.id_tarifa" @change="tari()"  name="ciudad_destino" class="form-control" disabled >
              <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.itinerarios}}</option>
            </select>

          </div>
       </div>
       <div class="col-sm-4">
          <div class="form-group links">
            <label>Tiempos de entrega</label>
           <select v-model="item.id_tarifa" @change="tari()"  name="ciudad_destino" class="form-control" disabled >
             <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.tiempos}}</option>
           </select>
         </div>
      </div>
      <div class="col-sm-4">
         <div class="form-group links">
           <label>Tarifa</label>
          <select v-model="item.id_tarifa" @change="tari()"  name="ciudad_destino" class="form-control" disabled >
            <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.precio}}</option>
          </select>

        </div>
     </div>
     <div class="col-sm-4">
       <label class="links">Medida</label>
       <div class="form-group">
         <select v-model="item.escala"  name="escala" class="form-control" :disabled="ver" >
           <option value=""></option>
          <option value="Metros">Metros</option>
          <option value="Centímetros">Centímetros</option>
          <option value="Porcientos">Porcientos</option>
         </select>

       </div>
     </div>
     <div class="col-sm-4">
        <div class="form-group links">
          <label>Factor</label>
         <select v-model="item.factor" @change="facto()"  name="segurocarga" class="form-control" >
           <option value=""></option>
           <option v-for="factores in factores" v-if="factores.escala===item.escala"  :value="factores.id">{{factores.formula}} </option>
         </select>

       </div>
    </div>
     <div class="col-4 py-2">
      <label class="links">Tipo de carga</label>
       <div class="input-group">
          <select v-model="item.tipocarga"   name="tipocarga" class="form-control" >
            <option v-for="tipocarga in tipocarga"  :value="tipocarga.nombre_tipocarga">{{tipocarga.nombre_tipocarga}}</option>
          </select>
          <div class="input-group-append">
            <input v-model="item.cantidad" @change="selector()" type="number" class="form-control" placeholder="Cantidad">
          </div>
        </div>
     </div>
     <div class="col-7 row card  border-0 " v-if="item.escala==='' || item.escala==='Porcientos'">
       <label class="links lead">Volumen</label>
       <div class="col-12 row p-2">
         <div class="col-3">
           <label class="links">LA</label>
           <div class="input-group">
             <input type="number"  class="form-control" placeholder="" disabled>
           </div>
         </div>
         <div class="col-3">
        <label class="links">AN</label>
           <div class="input-group">
             <input type="number" class="form-control" placeholder="" disabled>
           </div>
         </div>
         <div class="col-3">
           <label class="links">AL</label>
           <div class="input-group">
             <input   type="number" class="form-control" placeholder="" disabled>
           </div>
         </div>
         <div class="col-3">
          <label class="links">Total Volumen</label>
           <div class="input-group">
                <input  type="number" class="form-control" placeholder="" disabled>
            </div>
         </div>
       </div>
     </div>
     <div class="col-7 row card  border-0 " v-if="item.escala==='Metros'">
       <label class="links lead">Volumen</label>
       <div class="col-12 row p-2">
         <div class="col-3">
           <label class="links">LA</label>
           <div class="input-group">
             <input v-model="item.la" type="number" @change="metros()" class="form-control" placeholder="">
           </div>
         </div>
         <div class="col-3">
        <label class="links">AN</label>
           <div class="input-group">
             <input v-model="item.an" type="number" @change="metros()" class="form-control" placeholder="">
           </div>
         </div>
         <div class="col-3">
           <label class="links">AL</label>
           <div class="input-group">
             <input  v-model="item.al" type="number" @change="metros()" class="form-control" placeholder="">
           </div>
         </div>
         <div class="col-3">
          <label class="links">Total Volumen</label>
           <div class="input-group">
                <input v-model="item.volumen" type="number" class="form-control" placeholder="" disabled>
            </div>
         </div>
       </div>
     </div>
     <div class="col-7 row card  border-0 " v-if="item.escala==='Centímetros'">
       <label class="links lead">Volumen</label>
       <div class="col-12 row p-2">
         <div class="col-3">
           <label class="links">LA</label>
           <div class="input-group">
             <input v-model="item.la" type="number" @change="centimetros()" class="form-control" placeholder="">
           </div>
         </div>
         <div class="col-3">
        <label class="links">AN</label>
           <div class="input-group">
             <input v-model="item.an" type="number" @change="centimetros()" class="form-control" placeholder="">
           </div>
         </div>
         <div class="col-3">
           <label class="links">AL</label>
           <div class="input-group">
             <input  v-model="item.al" type="number" @change="centimetros()" class="form-control" placeholder="">
           </div>
         </div>
         <div class="col-3">
          <label class="links">Total Volumen</label>
           <div class="input-group">
                <input v-model="item.volumen" type="number" class="form-control" placeholder="" disabled>
            </div>
         </div>
       </div>
     </div>
     <div class="col-5 row" v-if="item.escala===''||item.escala==='Centímetros'|| item.escala==='Metros'">
       <label class="links lead">Peso</label>
       <div class="row">
         <div class="col-5">
        <label class="links">KILOS BASC</label>
           <div class="input-group">
             <input @change="kilos" v-model="item.kilosbascula" type="number" class="form-control" placeholder="">
           </div>
         </div>
         <div class="col-6">
           <label class="links">TOT. KILOS</label>
           <div class="input-group">
             <input v-model="item.kilostotal" type="number" class="form-control" placeholder="" disabled>
           </div>
         </div>
         <div class="col-1 " style="margin-top:39px;">
           <input type="checkbox" id="check17" />
            <label class="labels" for="check17"></label>
         </div>
       </div>
     </div>
     <div class="col-5 row" v-if="item.escala==='Porcientos'">
       <label class="links lead">Peso</label>
       <div class="row">
         <div class="col-5">
        <label class="links">KILOS BASC</label>
           <div class="input-group">
             <input @change="kilos();procientos();" v-model="item.kilosbascula" type="number" class="form-control" placeholder="">
           </div>
         </div>
         <div class="col-6">
           <label class="links">TOT. KILOS</label>
           <div class="input-group">
             <input v-model="item.kilostotal" type="number" class="form-control" placeholder="" disabled>
           </div>
         </div>
         <div class="col-1 " style="margin-top:39px;">
           <input type="checkbox" id="check17" />
            <label class="labels" for="check17"></label>
         </div>
       </div>
     </div>
  </div>
  <button
  v-if="item.id_tarifa && item.escala && item.formula && item.variable && !corregirMode && item.kilostotal && item.volumen"
   type="button" class="btn btn-success btn-lg btn-block my-2" @click="pushearItem()">Agregar <span class="mbri-save"></span></button>
   <button
   v-if="item.id_tarifa  && item.escala && item.formula && item.variable && corregirMode "
    type="button" class="btn btn-success btn-lg btn-block my-2" @click="editarItem()">Editar <span class="mbri-save"></span></button>
    <table class="table table-striped table-bordered table condensed table-hover table-responsive  && kilostotal && volumen">
      <thead>
        <tr>
          <th>ORIGEN</th>
          <th>DESTINO</th>
          <th>TRANSPORTE</th>
          <th style="white-space: nowrap;">TIPO DE ENVÍO</th>
          <th style="white-space: nowrap;">TIPO DE CARGA</th>
          <th style="white-space: nowrap;">TOTAL VOLUMEN</th>
          <th style="white-space: nowrap;">TOTAL PESO</th>
          <th style="white-space: nowrap;"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(elemento ,index) in form.items">
          <td style="white-space: nowrap;">{{elemento.departamento_origen}}-{{elemento.ciudad_origen}}</td>
          <td style="white-space: nowrap;">{{elemento.departamento_destino}}-{{elemento.ciudad_destino}}</td>
          <td style="white-space: nowrap;">{{elemento.tipo_transporte}}</td>
          <td style="white-space: nowrap;">{{elemento.tipo_envio}}</td>
          <td style="white-space: nowrap;">{{elemento.tipocarga}}</td>
          <td style="white-space: nowrap;">{{elemento.volumen}}</td>
          <td style="white-space: nowrap;">{{elemento.kilostotal}}</td>
          <td v-show="!ver">
            <div class="btn-group">
                <button type="button" class="btn btn-default">Action</button>
                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                  <span class="sr-only">Toggle Dropdown</span>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="#" @click="eliminarItem(index)">Quitar</a>
                    <a class="dropdown-item" href="#" @click="corregir(index);corregirMode=true;">Correguir</a>
                  </div>
                </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="col-12 row card  border-0 ">
    <div class="col-12 row p-2">
      <div class="col-3">
     <label class="links">SUMATORIA DE VOLUMEN</label>
        <div class="input-group">
          <input type="number" class="form-control" placeholder="">
        </div>
      </div>
      <div class="col-3">
        <label class="links">SUMATORIA KILOS</label>
        <div class="input-group">
          <input type="number" class="form-control" placeholder="">
        </div>
      </div>
      <div class="col-3">
       <label class="links">VALOR FLETE</label>
        <div class="input-group">
             <input type="number" class="form-control" placeholder="">
         </div>
      </div>
      <div class="col-1 my-5">
        <span class="mbri-plus" style="font-size:15px;"></span>
      </div>
      <div class="col-2 ">
        <label class="links">Seguro sobre valor declarado.</label>
        <label class="links">Coste de guía</label>
        <label class="links">Otros Cargos</label>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>

      <pre>{{item}}</pre><!-- End -->
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
         corregirMode:false,
         departamento:0,
         cart:[],
         cargos:[],
         ver:false,
         factores:[],
         cargas:[],
         legalizaciones:[],
         cargas_t:[],
         tarifas:[],
         imagenes:[],
         clientes:[],
         userFiles:[],
         transportes:[],
         tiposenvios:[],
         tipocarga:[],
         sedes:[],
         editMode:false,
         id_instancia:'',
         item:{
           'departamento_destino':'',
           'ciudad_destino':'',
           'departamento_origen':'',
           'ciudad_origen':'',
           'cedula_cliente':'',
           'tipo_transporte':'',
           'tipo_envio':'',
           'precio':'',
           'tipo_carga':'',
           'itinerarios':'',
           'tiempos':'',
           'segurocarga':'',
           'costeguia':'',
           'escala':'',
           'formula':'',
           'variable':'',
           'volumen':'',
           'factor':'',
           'an':'',
           'al':'',
           'la':'',
           'cantidad':'',
           'kilosbascula':'',
           'kilostotal':'',
         },
         form:{
             'items':[],

         },

       },
       methods: {
         editarItem(index){
           Swal({
             title: '¿Estás seguro?',
             type: 'warning',
             showCancelButton: true,
             confirmButtonText: '¡Si!',
             cancelButtonText: '¡No!',
             reverseButtons: true
           }).then((result) => {
             if (result.value) {
               this.form.items.splice(this.item.llave, 1);
               this.form.items.push({
                  id_tarifa:this.item.id_tarifa,
                  departamento_destino:this.item.departamento_destino,
                  departamento_origen:this.item.departamento_origen,
                  ciudad_origen:this.item.ciudad_origen,
                  ciudad_destino:this.item.ciudad_destino,
                  cedula_cliente:this.item.cedula_cliente,
                  tipo_transporte:this.item.tipo_transporte,
                  tipo_envio:this.item.tipo_envio,
                  precio:this.item.nuevo_precio,
                  factor:this.item.factor,
                  tipo_carga:this.item.tipo_carga,
                  itinerarios:this.item.itinerarios,
                  tiempos:this.item.tiempos,
                  segurocarga:this.item.segurocarga,
                  costeguia:this.item.costeguia,
                  escala:this.item.escala,
                  formula:this.item.formula,
                  variable:this.item.variable,
                  an:this.item.an,
                  al:this.item.al,
                  la:this.item.la,
                  cantidad:this.item.cantidad,
                  kilosbascula:this.item.kilosbascula,
                  kilostotal:this.item.kilostotal,
                  volumen:this.item.volumen,
                  kilostotal:this.item.kilostotal,
                  tipocarga:this.item.tipocarga,
                });
                this.item.id_tarifa="";
                this.item.departamento_destino="";
                this.item.departamento_origen="";
                this.item.ciudad_origen="";
                this.item.cedula_cliente="";
                this.item.tipo_transporte="";
                this.item.tipo_envio="";
                this.item.precio="";
                this.item.tipo_carga="";
                this.item.itinerarios="";
                this.item.tiempos="";
                this.item.segurocarga="";
                this.item.costeguia="";
                this.item.escala="";
                this.item.formula="";
                this.item.variable="";
                this.item.nuevo_precio="";
                this.corregirMode=false;
                this.item.an="";
                this.item.al="";
                this.item.la="";
                this.item.cantidad="";
                this.item.kilosbascula="";
                this.item.kilostotal="";
                this.item.volumen="";
                this.item.kilostotal="";
                this.item.tipocarga="";
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
         corregir(index){

           this.item.id_tarifa=this.form.items[index].id_tarifa;
           this.item.tipocarga=this.form.items[index].tipocarga;
           this.item.escala=this.form.items[index].escala;
           this.item.factor=this.form.items[index].factor;
           this.item.variable=this.form.items[index].variable;
           this.tari();
           this.facto();
           this.item.tipo_transporte=this.form.items[index].tipo_transporte;
           this.item.tipo_envio=this.form.items[index].tipo_envio;
           this.item.llave=index;
           this.item.precio=this.form.items[index].precio;
           this.item.an=this.form.items[index].an;
           this.item.al=this.form.items[index].al;
           this.item.la=this.form.items[index].la;
           this.item.cantidad=this.form.items[index].cantidad;
           this.item.kilosbascula=this.form.items[index].kilosbascula;
           this.item.kilostotal=this.form.items[index].kilostotal;
           this.item.volumen=this.form.items[index].volumen;
           this.item.kilostotal=this.form.items[index].kilostotal;
           this.item.tipocarga=this.form.items[index].tipocarga;
           this.selector();
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
                      id_tarifa:this.item.id_tarifa,
                      departamento_destino:this.item.departamento_destino,
                      departamento_origen:this.item.departamento_origen,
                      ciudad_origen:this.item.ciudad_origen,
                      ciudad_destino:this.item.ciudad_destino,
                      cedula_cliente:this.item.cedula_cliente,
                      tipo_transporte:this.item.tipo_transporte,
                      tipo_envio:this.item.tipo_envio,
                      precio:this.item.precio,
                      factor:this.item.factor,
                      tipo_carga:this.item.tipo_carga,
                      itinerarios:this.item.itinerarios,
                      tiempos:this.item.tiempos,
                      segurocarga:this.item.segurocarga,
                      costeguia:this.item.costeguia,
                      escala:this.item.escala,
                      formula:this.item.formula,
                      variable:this.item.variable,
                      an:this.item.an,
                      al:this.item.al,
                      la:this.item.la,
                      cantidad:this.item.cantidad,
                      kilosbascula:this.item.kilosbascula,
                      kilostotal:this.item.kilostotal,
                      volumen:this.item.volumen,
                      kilostotal:this.item.kilostotal,
                      tipocarga:this.item.tipocarga,
                    });
                    this.item.id_tarifa="";
                    this.item.departamento_destino="";
                    this.item.departamento_origen="";
                    this.item.ciudad_origen="";
                    this.item.cedula_cliente="";
                    this.item.tipo_transporte="";
                    this.item.tipo_envio="";
                    this.item.precio="";
                    this.item.tipo_carga="";
                    this.item.itinerarios="";
                    this.item.tiempos="";
                    this.item.segurocarga="";
                    this.item.costeguia="";
                    this.item.escala="";
                    this.item.formula="";
                    this.item.variable="";
                    this.item.an="";
                    this.item.al="";
                    this.item.la="";
                    this.item.cantidad="";
                    this.item.kilosbascula="";
                    this.item.kilostotal="";
                    this.item.volumen="";
                    this.item.kilostotal="";
                    this.item.tipocarga="";
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
         selector(){
           if (this.item.escala==="Centímetros") {
             this.centimetros();
           } else if (this.item.escala==="Metros"){
             this.metros();
           } else if (this.item.escala==="Porcientos") {
             this.porcientos();
           }
         },
         kilos(){
           this.item.kilostotal=0;
           this.item.kilostotal=parseFloat(this.item.kilosbascula) * parseFloat(this.item.cantidad) ;
         },
          metros(){
            this.item.volumen=0;
            console.log("metros");
            this.item.volumen=parseFloat(this.item.an) * parseFloat(this.item.la) * parseFloat(this.item.al) * parseFloat(this.item.variable) * parseFloat(this.item.cantidad);
          },
          centimetros(){
            this.item.volumen=0;
            console.log("centimetros");
            this.item.volumen=((parseFloat(this.item.an) * parseFloat(this.item.la) * parseFloat(this.item.al) )/ parseFloat(this.item.variable) )* parseFloat(this.item.cantidad);
          },
          porcientos(){
            this.item.volumen=0;
            this.item.kilostotal=0;
            console.log("centimetros");
            this.item.kilostotal=parseFloat(this.item.kilosbascula) + (parseFloat(this.item.kilosbascula) * (parseFloat(this.item.variable) )/ 100);
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
                       axios.post('index.php/cargos/insertar',data)
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
                       axios.post('index.php/cargos/editar',data)
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
                         axios.post('index.php/cargos/eliminar',data)
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

                 tari(){
                   for (var i = 0; i < this.tarifas.length; i++) {
                     if (this.tarifas[i].id===this.item.id_tarifa) {
                       this.item.departamento_origen=this.tarifas[i].departamento_origen;
                       this.item.departamento_destino=this.tarifas[i].departamento_destino;
                       this.item.ciudad_origen=this.tarifas[i].ciudad_origen;
                        this.item.ciudad_destino=this.tarifas[i].ciudad_destino;
                        this.item.tipo_carga=this.tarifas[i].tipo_carga;
                        this.item.itinerarios=this.tarifas[i].itinerarios;
                        this.item.tiempos=this.tarifas[i].tiempos;
                        this.item.precio=this.tarifas[i].precio;
                     }
                   }
                 },
                 facto(){
                   for (var i = 0; i < this.factores.length; i++) {
                     if (this.factores[i].id===this.item.factor) {
                       this.item.escala=this.factores[i].escala;
                       this.item.formula=this.factores[i].formula;
                       this.item.variable=this.factores[i].variable;
                        this.item.factor=this.item.factor;
                        this.selector();
                     }
                   }
                 },
                 async loadfactores() {
                   await   axios.get('index.php/factores/getfactores/')
                      .then(({data: {factores}}) => {
                        this.factores = factores
                      });

                    },
                    async loadtarifas() {
                        await   axios.get('index.php/tarifas/gettarifas/')
                           .then(({data: {tarifas}}) => {
                             this.tarifas = tarifas
                           });
                         },
                   async loadtipocarga() {
                       await   axios.get('index.php/tipocarga/gettipocarga/')
                          .then(({data: {tipocarga}}) => {
                            this.tipocarga = tipocarga
                          });
                        },
                        async loadtiposenvios() {
                          await   axios.get('index.php/tiposenvios/gettiposenvios/')
                             .then(({data: {tiposenvios}}) => {
                               this.tiposenvios = tiposenvios
                             });
                           },
                     async loadtransportes() {
                        await   axios.get('index.php/Transporte/gettransportes/')
                           .then(({data: {transportes}}) => {
                             this.transportes = transportes
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
             this.loadfactores();
             this.loadtarifas();
             this.loadtipocarga();
             this.loadtiposenvios();
             this.loadtransportes();
            this.loadCart();
       },
   })
 </script>
