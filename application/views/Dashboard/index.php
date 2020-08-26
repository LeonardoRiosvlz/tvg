<div class="container">
  <div class="row my-3">
    <div class="col-md-3">
      <a href="<?=base_url()?>Purchases_admin">
      <div class="card-counter primary zoom" style="opacity:0.9">
        <span class=" fa mbri-cash" style="font-size:5em;opacity:0.1"></span>
        <span class="count-numbers" >{{ total | toCurrency}}</span>
        <span class="count-name links">Ventas</span>
      </div>
      </a>
    </div>

    <div class="col-md-3">
      
    <a href="<?=base_url()?>Orders_admin">
      <div class="card-counter info p-2 zoom" style="opacity:0.9">
        <span class=" fa mbri-shopping-bag" style="font-size:5em;opacity:0.6"></span>
        <span class="count-numbers">5</span>
        <span class="count-name links">Pedidos</span>
      </div>
    </a>
    </div>

    <div class="col-md-3">
     
      <a href="<?=base_url()?>Shipping">
      <div class="card-counter danger p-2 zoom" style="opacity:0.9;background-color:#ffc107!important">
        <span class="mbri-info" style="font-size:5em;opacity:0.6"></span>
        <span class="count-numbers">{{pendiente.length}}</span>
        <span class="count-name links">Envíos Pendientes</span>
      </div>
    </a>
    </div>

    <div class="col-md-3">
      <a href="<?=base_url()?>Shipping">
      <div class="card-counter success p-2 zoom" style="opacity:0.9">
        <span class="mbri-success" style="font-size:5em;opacity:0.6"></span>
        <span class="count-numbers">{{recibido.length}}</span>
        <span class="count-name links">Recibidos</span>
      </div>
    </a>
    </div>
  </div>
  <div class="row my-3">
    <div class="col-md-3">
      <a href="<?=base_url()?>Purchases_admin">
      <div class="card-counter dark p-2 zoom" style="opacity:0.9;background-color:#d629dced!important">
        <span class=" fa mbri-sale text-white" style="font-size:5em;opacity:0.6"></span>
        <span class="count-numbers text-white">{{ descuentos | toCurrency}}</span>
        <span class="count-name text-white links">Descuentos</span>
      </div>
    </a>
    </div>

    <div class="col-md-3">
    <a href="<?=base_url()?>Claims_admin">
      <div class="card-counter danger p-2 zoom" style="opacity:0.9">
        <span class=" fa mbri-sad-face" style="font-size:5em;opacity:0.6"></span>
        <span class="count-numbers">{{claims.length}}</span>
		<span class="count-name links">Reclamos</span>
      </div>
    </a>
    </div>

    <div class="col-md-6">
     <a href="<?=base_url()?>Root_user"> 
      <div class="card-counter success p-2 zoom" style="opacity:0.9;background-color:#8f6f90ed!important">
        <span class="mbri-users" style="font-size:5em;opacity:0.6"></span>
        <span class="count-numbers">{{solicitudes.length}}</span>
        <span class="count-name links">Solicitudes pendientes</span>
      </div>
     </a> 
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-6">
         <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active" style="">
              <div class="card" style="width:100%;height:300px;opacity:0.9;background-color:#2458c3ed!important">
                <div class="card-body">
                      <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1 links text-white">Últimos Envíos</h5>
                        </div>
                </div>
              </div>
            </div>
            <div class="carousel-item" v-for="envios in envios">
              <div class="card" style="width:100%;opacity:0.9;background-color:#2458c3ed!important">
                  <div class="card-body">
                    <h4 class="card-title links text-white">{{envios.nombre}} {{envios.apellido}}</h4>
                    <p class="card-text links text-white">Ciudad:{{envios.ciudad}}</p>
                    <p class="card-text links text-white">Fecha de envío:{{envios.fecha_envio}}</p>
                    <p class="card-text links text-white">Fecha de llegada:{{envios.fecha_llegada}}</p>
                   
                  </div>
                </div>
            </div>
          </div>
      </div>
    </div>
    <div class="col-6">
         <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card zoom" style="width:100%;height:300px;opacity:0.9;background-color:#f27474!important">
                  <div class="card-body">
                    <h4 class="card-title links text-white">Últimos Pagos</h4>
                  </div>
                </div>
            </div>
            <div v-for="pagos in pagos"  class="carousel-item  " style="">
              <div class="card " style="width:100%;opacity:0.9;background-color:#f27474!important">
                <div class="card-body">
                      <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1 links text-white">Últimos Pagos</h5>
                          <small class="links text-white">{{pagos.fecha}}</small>
                        </div>
                        <hr class="ligth" style="opacity:0.6;background-color:white!important">
                  <h4 class="card-title links text-white">{{pagos.nombre}} {{pagos.apellido}}</h4>
                  <p class="card-text links text-white">Ciudad:{{pagos.ciudad}}</p>
                  <p class="card-text links text-white">Transporte:{{ parseInt(pagos.transporte) | toCurrency}}</p>
                  <p class="card-text links text-white">Valor:{{ parseInt(pagos.total) | toCurrency}}</p>
                  <p v-if="pagos.descuento>0" class="card-text links text-white">Descuento:{{ parseInt(pagos.descuento) | toCurrency}}</p>
                  <p v-if="pagos.descuento>0" class="card-text links text-white">Cupon:{{ pagos.cupon | toCurrency}}</p>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
     axios.defaults.baseURL = '<?PHP echo base_url(); ?>';
     Vue.use(VeeValidate ,{locale: 'vi'});
     Vue.use(VueTheMask);
     Vue.filter('toCurrency', function (value) {
            if (typeof value !== "number") {
                return value;
            }
            var formatter = new Intl.NumberFormat('de-DE', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 0
            });
            return formatter.format(value);
        });
     new Vue({
       el: '#app',
       data: {
         total:0,
         descuentos:0,
         cart:[],
         pendiente:[],
         pagos:[],
         envios:[],
         solicitudes:[],
         claims:[],
         ventas:[],
         recibido:[],
         editMode:false,
         form:{
             'id':'',
             'name':'',
             'url_brand':'',

         }
       },
       methods: {

                 loadRecibidos() {
                   axios.get('index.php/dashboard/getRecibido')
                   .then(({data: {recibido}}) => {
                     this.recibido = recibido
                   });
                 },
                loadPendiente() {
                   axios.get('index.php/dashboard/getPendiente')
                   .then(({data: {pendiente}}) => {
                     this.pendiente = pendiente
                   });
                 },
                 loadClaims() {
                    axios.get('index.php/dashboard/getClaims')
                    .then(({data: {claims}}) => {
                      this.claims = claims
                    });
                  },
                  loadSolicitudes() {
                     axios.get('index.php/dashboard/getSolicitudes')
                     .then(({data: {solicitudes}}) => {
                       this.solicitudes = solicitudes
                     });
                   },
                   loadPagos() {
                      axios.get('index.php/dashboard/getPagos')
                      .then(({data: {pagos}}) => {
                        this.pagos = pagos
                      });
                    },
                   loadEnvios() {
                      axios.get('index.php/dashboard/getEnvios')
                      .then(({data: {envios}}) => {
                        this.envios = envios
                      });
                    },
                 loadVentas() {
                    axios.get('index.php/dashboard/getVentas')
                    .then(({data: {ventas}}) => {
                      this.ventas = ventas,
                      this.total=0; this.descuentos=0;
                      for (var i = 0; i < this.ventas.length; i++) {
                        this.total=parseInt(this.ventas[i].total)+this.total;
                        this.descuentos=parseInt(this.ventas[i].descuento)+this.descuentos;
                        }
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
            this.loadRecibidos();
            this.loadPendiente();
            this.loadVentas();
            this.loadCart();
            this.loadClaims();
            this.loadSolicitudes();
            this.loadPagos();
            this.loadEnvios();
       },
   })
 </script>
