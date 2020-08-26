
     var data= {
    paisss:'Colombia',
    datos:'',
    valor:' sdasd',
    datos_personales:'',
    datos_empresa:'',
    cuenta:'',
    vnm:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
    vap:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
    vem:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ1-9._-\s]+$/,
    rif:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ1-9._-\s]+$/,
    vpr:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
    vtl:/^[0-9]+$/,
    vcd:/^[0-9]+$/,
    nombre_v:false,
    nombre_v_i:'',
    nombremp_v:false,
    nombremp_v_i:'',    
    apellido_v:false,
    apellido_v_i:'',
    telefono_v:false,
    telefono_v_i:'',
    profesion_v:false,
    profesion_v_i:'',
    ciudad_v:false,
    ciudad_v_i:'',
    direccion_v:false,
    direccion_v_i:'',
    identificacion_v:false,
    identificacion_v_i:'',
    rif_v:false,
    rif_v_i:'',
    paises: [ 'Colombia','Venezuela','Brasil','Argentina','Peru','Ecuador','Uruguay','Chile'],
    rubros: [ 'Financiero','Servicios','Manufactura','Energia Mineria','Retail','Agropecuario','Gobierno','Inmobiliaria','Otros'],
    phones: [
      { text: 'Colombia' ,  value: 57 },
      { text: 'Venezuela', value: 58 }
    ],
        pa: [
        {
            name: 'Argentina',
            pref: 54,
            ce: [ 'Rif-'],


        },
        {
            name: 'Brasil',
            pref: 55,
            ce: [ 'Rif-'],

        },
        {
            name: 'Chile',
            pref: 56,
            ce: [ 'Rif-'],

        },
        {
            name: 'Colombia',
            pref: 58,
            ce: [ 'Rif-'],

        },
        {
            name: 'Ecuador',
            pref: 593,
            ce: [ 'Rif-'],

        },
        {
            name: 'Peru',
            pref: 51,
            ce: [ 'Rif-'],

        },
        {
            name: 'Uruguay',
            pref: 598,
            ce: [ 'Rif-'],

        },
        {
            name: 'Venezuela',
            pref: 58,
            ci: [ 'Cedula','Pasaporte'],
            ce: [ 'Rif-'],

        }                                                        
    ],
    selected: 8,
    mode: 'single',
    selectedDate:'',
    fecha:'',
    bandera:'',
    phone:''
   }

 Vue.component ('navegador-perfil', {
        template: `
 <div class="container-fluid panel shadow">

  <div  class="container panel-nav ">       
  <nav class="navbar navbar-expand-md   ">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
    <ul class="navbar-nav mr-auto ">
                        <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                <img class="img-profile rounded-circle avatar" src="/img/user.jpg">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small text-name">{{datos.nombre}}</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/user/profile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link enlace" href="#">Mis ventas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link enlace" href="#">Cupones</a>
      </li>

      <li class="nav-item">
        <a class="nav-link enlace" href="#">Mi logros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link boton" href="/Transfer">Crear cupon</a>
      </li>
    </ul>
  </nav>
  </div>
 </div> 
              `,
        data: function(){
          return data;
        },
        methods:{

   }
      }) 


var app = new Vue({
  el: '#app',
  data:data,
  methods: {

        recuperarDatos: function(){
      this.$http.get('/user/datos_user').then(function(respuesta){
        this.datos = respuesta.body;

        
      }); 
    },
        validarCedula: function(cedula,tipo,idusu){
     var largo_identificaion=this.datos_personales.identificacion.length; 
        if(largo_identificaion>20) { 
          this.identificacion_v = true,
          this.identificacion_v_i= 'No puede ser mayor a 20 numeros'
        }else{
          this.identificacion_v = false,

      this.$http.get('/user/consultar_id/'+cedula+'/'+tipo+'/'+idusu+'').then(function(respuesta){
        var vdni =this.valor= respuesta.body;
        if( vdni>0){
          this.identificacion_v = true,
          this.identificacion_v_i= 'Este DNI esta en uso'
        }else{

          this.identificacion_v = false
        }

        
      }); 
    }
  },
          validarRif: function(cedula,tipo,idusu){
     var largo_rif=this.datos_empresa.id.length; 
        if(largo_rif>20) { 
          this.rif_v = true,
          this.rif_v_i= 'DNI no puede superar los 20 caracteres'
        }else{
          this.rif_v = false,

      this.$http.get('/user/consultar_rif/'+cedula+'/'+tipo+'/'+idusu+'').then(function(respuesta){
        var vrif =this.valor= respuesta.body;
        if( vrif>0){
          this.rif_v = true,
          this.rif_v_i= 'Este DNI esta en uso'
        }else{

          this.rif_v = false
        }

        
      }); 
    }
  },
      validarNombre: function(){
     
       var largo=this.datos_personales.nombre.length; 
        if(largo>20) { 
          this.nombre_v = true,
          this.nombre_v_i= 'nombre demasiado largo'
        }else{
          this.nombre_v=false;
          var nombre= this.datos_personales.nombre;
          var leo=this.vnm.test(this.datos_personales.nombre);
          if (leo!= true) {
          this.nombre_v = true,
          this.nombre_v_i= 'nombre solo puede contener letras'
          }
        } 
        
      
    },
          validarNombre_empresa: function(){
     
       var largo_emp=this.datos_empresa.nombre.length; 
        if(largo_emp>20) { 
          this.nombremp_v = true,
          this.nombremp_v_i= 'nombre demasiado largo'
        }else{
          this.nombremp_v=false;
          var nombremp= this.datos_empresa.nombre;
          var emp=this.vem.test(this.datos_empresa.nombre);
          if (emp!= true) {
          this.nombremp_v = true,
          this.nombremp_v_i= 'nombre solo puede contener letras y numeros'
          }
        } 
        
      
    },

        modificarPerfil: function(p_perfil){
          var r = confirm("Desea realizar cambios?");
              if (r == true) {
      this.$http.post('modificar_perfil',p_perfil).then(function(){
        $.alert('Cambios realizados');
        this.recuperarDatos_personales();
      }, function(){
        alert('No se ha podido modificar tu prefil.');
      });
     }else{
        $.alert('Cancelado con exito!!');
        this.recuperarDatos_personales();
     } 
    },
            modificarEmpresa: function(p_empresa){
          var r = confirm("Desea realizar cambios?");
              if (r == true) {
      this.$http.post('modificar_empresa',p_empresa).then(function(){
        $.alert('Cambios realizados');
        this.recuperarDatos_empresa();
      }, function(){
        alert('No se ha podido modificar tu empresa.');
      });
     }else{
        $.alert('Cancelado con exito!!');
        this.recuperarDatos_empresa();
     } 

    },
      validarApellido: function(){
     
       var largo_apellido=this.datos_personales.apellido.length; 
        if(largo_apellido>20) { 
          this.apellido_v = true,
          this.apellido_v_i= 'Apellido demasiado largo'
        }else{
          this.apellido_v=false;
          var apellido=this.vap.test(this.datos_personales.apellido);
          if (apellido!= true) {
          this.apellido_v = true,
          this.apellido_v_i= 'Solo puede contener letras'
          }
        } 
        
      
    },
    validarProfesion: function(){
     
       var largo_profesion=this.datos_personales.profesion.length; 
        if(largo_profesion>20) { 
          this.profesion_v = true,
          this.profesion_v_i= 'No puede superar 20 caracteres!!'
        }else{
          this.profesion_v=false;
          var profesion=this.vpr.test(this.datos_personales.profesion);
          if (profesion!= true) {
          this.profesion_v = true,
          this.profesion_v_i= 'Solo puede contener letras'
          }
        } 
        
      
    },
        validarCiudad: function(){
     
       var largo_ciudad=this.datos_personales.ciudad.length; 
        if(largo_ciudad>20) { 
          this.ciudad_v = true,
          this.ciudad_v_i= 'no puedes superar20 caracteres!!'
        }else{
          this.ciudad_v=false;
          var ciudad=this.vcd.test(this.datos_personales.ciudad);
          if (ciudad!= true) {
          this.ciudad_v = true,
          this.ciudad_v_i= 'Solo puede contener letras'
          }
        } 
        
      
    },
      validarDireccion: function(){
     
       var largo_direccion=this.datos_personales.direccion.length; 
        if(largo_direccion>100) { 
          this.direccion_v = true,
          this.direccion_v_i= 'No pudes supara los 80 caracteres!!'
        }else{
          this.direccion_v=false;
        } 
        
      
    },
    validarTelefono: function(){
     
       var largo_telefono=this.datos_personales.telefono.length; 
        if(largo_telefono>15) { 
          this.telefono_v = true,
          this.telefono_v_i= 'No puedes superar 15 caracteres!!'
        }else{
          this.telefono_v=false;
          var telefono=this.vtl.test(this.datos_personales.telefono);
          if (telefono!= true) {
          this.telefono_v = true,
          this.telefono_v_i= 'Solo numeros'
          }
        } 
    },
    recuperarDatos_personales: function(){
      this.$http.get('/user/datos_personales').then(function(respuesta){
        this.datos_personales = respuesta.body;
        this.fecha= respuesta.body.f_nacimiento;
        
      }); 
    },
        recuperarDatos_empresa: function(){
      this.$http.get('/user/datos_empresa').then(function(respuesta){
        this.datos_empresa = respuesta.body;
  
      }); 
    },

        cabiarBandera:function() {
      alert("hola")
    },

          cuentaverificada: function(){
      this.$http.get('/user/verify').then(function(respuesta){
     var v= this.cuenta=respuesta.body;
     var valor=v["verify"];
        if( valor=="0"){
         $.alert({
            title: 'Cuenta No Verificada!',
            content: 'debes ir a tu correo para verificar esta cuenta!',
          });
        }  
        
      }); 
    }
  },  
  created: function(){

    this.recuperarDatos_empresa();
    this.cuentaverificada();
    this. recuperarDatos_personales();

  }
})