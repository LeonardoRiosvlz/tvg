<div id="app" class="container" style="min-height:1000px;">
  <div class="row" v-cloak>
    <div class="col-lg-12 my-5 ">
      <!-- Shopping cart table -->
      <div class="table-responsive ">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                  <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold links">cotizaciones <i class="fa fa-calculator" aria-hidden="true"></i></div>
              </th>
            </tr>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                <button type="button" @click="resete();ver=false;" class="btn btn-block btn-light btn-sm links" >Agregar <span class="mbri-plus"></span></button>
              </th>
            </tr>
        </thead>

       </table>
       <div class="row" >
         <div class="col-md-2">
           <a href="#">
             <div class="card-counter  p-2 zoom" style="opacity:0.9;background:#3333FF;">
               <span class=" fa mbri-briefcase text-white" style="font-size:3em;opacity:0.6"></span>
               <span class="count-numbers text-white">{{estados.borrador}}</span>
               <span class="count-name links text-white my-2">Borrador</span>
             </div>
           </a>
         </div>
         <div class="col-md-2">
           <a href="#">
             <div class="card-counter muted p-2 zoom" style="opacity:0.9;background:#FFA226;">
               <span class=" fa mbri-help text-white" style="font-size:3em;opacity:0.6"></span>
               <span class="count-numbers text-white">{{estados.enviado}}</span>
               <span class="count-name links text-white">Enviadas</span>
             </div>
           </a>
         </div>
         <div class="col-md-2">
           <a href="#">
             <div class="card-counter primary p-2 zoom" style="opacity:0.9">
               <span class=" fa mbri-preview" style="font-size:3em;opacity:0.6"></span>
               <span class="count-numbers">{{estados.estudio}}</span>
               <span class="count-name links">En estudio</span>
             </div>
           </a>
         </div>
         <div class="col-md-2">
           <a href="#">
             <div class="card-counter success p-2 zoom" style="opacity:0.9">
               <span class=" fa mbri-like" style="font-size:3em;opacity:0.6"></span>
               <span class="count-numbers">{{estados.aceptadas}}</span>
               <span class="count-name links">Aceptadas</span>
             </div>
           </a>
         </div>
         <div class="col-md-2">
           <a href="#">
             <div class="card-counter danger p-2 zoom" style="opacity:0.9">
               <span class=" fa mbri-error" style="font-size:3em;opacity:0.6"></span>
               <span class="count-numbers">{{estados.rechazadas}}</span>
               <span class="count-name links">Rechazadas</span>
             </div>
           </a>
         </div>
         <div class="col-md-2">
           <a href="#">
             <div class="card-counter info p-2 zoom" style="opacity:0.9">
               <span class=" fa mbri-sad-face" style="font-size:3em;opacity:0.6"></span>
               <span class="count-numbers">{{estados.anuladas}}</span>
               <span class="count-name links">Anuladas</span>
             </div>
           </a>
         </div>
       </div>
          <table id="example1" class="table ">
            <thead>
            <tr>
              <th class="links" style="white-space: nowrap;">Nº  COTIZACIÓN</th>
              <th class="links" style="white-space: nowrap;">USUARIO</th>
              <th class="links" style="white-space: nowrap;">CREADO</th>
              <th class="links" style="white-space: nowrap;">DIAS DE VIGENCIA</th>
              <th class="links" style="white-space: nowrap;">CLIENTE</th>
              <th class="links" style="white-space: nowrap;">TELEFONO</th>
              <th class="links" style="white-space: nowrap;">ESTADO</th>
                <th class="links"style="white-space: nowrap;">Action</th>
            </tr>
            </thead>
                <tr v-for="(cotizaciones,index) in cotizaciones">
                <td style="white-space: nowrap;" class="links">COT-{{cotizaciones.id}}</td>
                <td style="white-space: nowrap;" class="links">{{cotizaciones.username}}</td>
                <td style="white-space: nowrap;" class="links">{{cotizaciones.fecha_creacion}}</td>
                <td style="white-space: nowrap;" class="links">Dias{{cotizaciones.age}}</td>
                <td style="white-space: nowrap;" class="links" v-if="cotizaciones.nombre_empresa==='No aplica'">{{cotizaciones.nombre_cliente}}</td>
                 <td style="white-space: nowrap;" class="links" v-else>{{cotizaciones.nombre_empresa}}</td>
                <td style="white-space: nowrap;" class="links">{{cotizaciones.telefono_cliente}}</td>
                <td style="white-space: nowrap;" class="links" v-if="cotizaciones.status==='Generado' && cotizaciones.estatus_gestion==='Borrador'">Generado por enviar...</td>
                <td style="white-space: nowrap;" class="links" v-else>{{cotizaciones.estatus_gestion}}</td>
                  <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"@click="setear(index);ver=true">Ver</a>
                            <a v-if="cotizaciones.estatus_gestion==='Borrador' && cotizaciones.status==='Borrador'" class="dropdown-item" href="#" @click="enviarCotizacion(index);setearEmail(index)">Enviar y Generar</a>
                            <a v-if="cotizaciones.status==='Borrador' && cotizaciones.estatus_gestion==='Borrador'" class="dropdown-item" href="#" @click="generar(index);setearEmail(index)">Generar</a>
                            <a v-if="cotizaciones.status==='Generado'|| cotizaciones.estatus_gestion==='Renegociado'" class="dropdown-item" href="#" @click="soloEnviar(index);setearEmail(index)">Enviar</a>
                            <a v-if="cotizaciones.estatus_gestion==='Borrador'" class="dropdown-item" href="#" @click="setear(index);ver=false;form.renegociar='No'">Editar</a>
                            <a v-if="cotizaciones.estatus_gestion==='Rechazada'" class="dropdown-item" href="#" @click="setear(index);ver=false;form.renegociar='Si'">Renegociar</a>
                            <a class="dropdown-item" href="#" @click="duplicar(index);ver=false;editMode=false;">Duplicar</a>
                            <a class="dropdown-item" href="#" @click="editarEstad(index);estado='Rechazada'">Rechazar</a>
                            <a class="dropdown-item" href="#" @click="editarEstad(index);estado='Anulada'">Anular</a>
                          </div>
                        </button>
                    </div>
                  </t d>
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
               <h4 class="modal-title links">Gestión de cotizaciones  <i class="fa fa-calculator" aria-hidden="true"></i></h4>
               <button type="button" @click="resete()" class="close" data-dismiss="modal" aria-label="Close">
                 <span class="mbri-close " ></span>
               </button>
             </div>
             <div class="modal-body">

               <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" @click="form.recalculada='No'" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" > Cotización</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" @click="form.recalculada='Si'" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" v-show="!ver">Recalcuar Cotización</a>
                </li>
              </ul>
              <form role="form" id="form" @submit.prevent="validateBeforeSubmit">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row py-3 pt-3">
                    <div class="col-md-4">
                      <label class="links">Clientes</label>
                      <input list="encodings" v-model="form.cedula"  @change="loadCotizacionesclientes();setCliente();"  value="" class="form-control form-control-lg" placeholder="Escriba una cedula o Nit" :disabled="ver">
                        <datalist id="encodings">
                            <option v-for="clientes in clientes"  v-if="clientes.cliente_especial==='No'" :value="clientes.cedula_cliente">{{clientes.nit_cliente}}</option>
                        </datalist>
                    </div>
                    <div class=" col-md-3 col-sm-12">
                      <div class="form-group">
                         <label class="links">Válida Hasta</label>
                           <flat-pickr
                               v-model="form.f_vencimiento"
                               :config="config"
                               class="form-control form-control-lg"
                               placeholder="Selecciona fecha"
                               name="hSasta">
                         </flat-pickr>
                       </div>
                    </div>
                  </div>

                  <div class="card col-12 p-3">
                     <h5 >Datos del cliente</h5>
                     <div class="row p-2" v-if="form.cedula">
                       <div class="form-group col-3">
                        <label for="exampleInputEmail1">Cliente</label>
                          <input type="email" v-model="form.nombre_cliente" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group col-3">
                         <label for="exampleInputEmail1">Cedula/Nit</label>
                           <input type="email" v-model="form.cn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                         </div>
                         <div class="form-group col-3">
                          <label for="exampleInputEmail1">Telefono</label>
                            <input type="email" v-model="form.telefono_cliente" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                          <div class="form-group col-3">
                           <label for="exampleInputEmail1">Correo </label>
                             <input type="email" v-model="form.correo_cliente" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                           </div>
                     </div>

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
                            <label class="links">Ruta de envío</label>
                            <input list="tarifas" v-model="item.id_tarifa" @change="tari()"  value="" class="form-control form-control-lg" placeholder="Escriba una ruta">
                              <datalist id="tarifas">
                                  <option v-for="tarifas in tarifas" v-if="tarifas.tipo_envio===item.tipo_envio && tarifas.tipo_transporte===item.tipo_transporte"  :value="tarifas.id">De {{tarifas.ciudad_origen}} a {{tarifas.ciudad_destino}} - {{tarifas.itinerarios}}</option>
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

          </div>
          <div class="card col-12">
            <div class="row">
              <div class="col-sm-6">
                 <div class="form-group links">
                   <label>Seguro de carga</label>
                  <select v-model="item.segurocarga" name="segurocarga" class="form-control" >
                    <option v-for="segurocarga in segurocarga"  :value="segurocarga.porcentaje">{{segurocarga.porcentaje}} %</option>
                  </select>

                </div>
             </div>
             <div class="col-sm-6">
                <div class="form-group links">
                  <label>Coste de guía</label>
                 <select v-model="item.costeguia"  name="costeguia" class="form-control" >
                   <option v-for="costeguia in costeguia"   :value="costeguia.valor">{{costeguia.valor}} $</option>
                 </select>

               </div>
            </div>
             <div class="col-sm-6">
               <label class="links">Medida</label>
               <div class="form-group">
                 <select v-model="item.escala"   name="escala" class="form-control" :disabled="ver||item.criterio==='Unidad'" >
                   <option value=""></option>
                  <option value="Metros">Metros</option>
                  <option value="Centímetros">Centímetros</option>
                  <option value="Porcientos">Porcientos</option>
                 </select>
               </div>
             </div>
             <div class="col-sm-6">
                <div class="form-group links">
                  <label>Factor</label>
                 <select v-model="item.factor" @change="facto()" name="segurocarga" class="form-control"   :disabled="ver||item.criterio==='Unidad'">
                   <option value=""></option>
                   <option v-for="factores in factores" v-if="factores.escala===item.escala"  :value="factores.id">{{factores.formula}} </option>
                 </select>

               </div>
            </div>
          </div>
          </div>
        </div>
        </div>
        <button
        v-if="item.id_tarifa && item.segurocarga && item.costeguia && item.escala && item.formula && item.variable || item.id_tarifa && item.segurocarga && item.costeguia && item.criterio==='Unidad' "
         type="button" class="btn btn-success btn-lg btn-block my-2" @click="pushearItem()">Agregar <span class="mbri-save"></span></button>
          <div class="table-responsive my-2">
            <table class="table table-striped table-bordered table condensed table-hover table-responsive  ">
              <thead>
                <tr>
                  <th>ORIGEN</th>
                  <th>DESTINO</th>
                  <th>TRANSPORTE</th>
                  <th style="white-space: nowrap;">TIPO DE ENVÍO</th>
                  <th>PRECIO</th>
                  <th>ITINERARIOS</th>
                  <th style="white-space: nowrap;">TIEMPOS DE ENTREGA</th>
                  <th>SEGURO</th>
                  <th style="white-space: nowrap;">MEDIDADS EN</th>
                  <th>FACTOR</th>
                  <th style="white-space: nowrap;">COSTE DE GUÍA</th>
                  <th v-show="!ver">ACTION</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(elemento ,index) in form.items">
                  <td style="white-space: nowrap;">{{elemento.departamento_origen}}-{{elemento.ciudad_origen}}</td>
                  <td style="white-space: nowrap;">{{elemento.departamento_destino}}-{{elemento.ciudad_destino}}</td>
                  <td style="white-space: nowrap;">{{elemento.tipo_transporte}}</td>
                  <td style="white-space: nowrap;">{{elemento.tipo_envio}}</td>
                  <td style="white-space: nowrap;">{{elemento.precio}} $</td>
                  <td style="white-space: nowrap;">{{elemento.itinerarios}}</td>
                  <td style="white-space: nowrap;">{{elemento.tiempos}}</td>
                  <td style="white-space: nowrap;">{{elemento.segurocarga}} %</td>
                  <td style="white-space: nowrap;">{{elemento.escala}}</td>
                  <td style="white-space: nowrap;">{{elemento.formula}}</td>
                  <td style="white-space: nowrap;">{{elemento.costeguia}} $</td>
                  <td v-show="!ver">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#" @click="eliminarItem(index)">Quitar</a>
                          </div>
                        </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-8">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Observación</label>
              <textarea v-model="form.observaciones" class="form-control" id="exampleFormControlTextarea1" rows="1" :disabled="ver"></textarea>
            </div>
          </div>
          <label class="switch pull-right col-12">
            <input type="checkbox" v-model="form.vernota" checked @change="verNotas()" :disabled="ver">
            <span class="slider round"></span>
          </label>
          <label class="switch pull-right col-12">
            Notas
          </label>
          <div class="collapse" id="collapseExample">
            <div class="form-group">
              <label for="exampleFormControlInput1">Titulo</label>
              <input v-model="resumen" type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripción</label>
            <textarea v-model="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            <button type="button" class="btn btn-primary btn-lg btn-block" @click="pushearNota()">Agregar nota</button>
          </div>

          </div>
          <div class="card col-12" v-if="form.vernota">
            <a class="btn btn-primary my-1" style="width:150px" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Agregar Nota
            </a>
            <div class="card-body p-3">
              <h5 class="card-title">Notas</h5>
              <button v-for="(notas ,index) in form.notas" type="button" class="btn btn-danger m-1" data-toggle="tooltip" data-placement="top" :title="notas.descripcion" @click="eliminarNota(index)">
                {{notas.numero}} {{notas.tipo_transporte}} <span class="mbri-trash"></span>
              </button>
            </div>
          </div>

            <div class="card col-12 my-3" v-if="form.cedula">
              <div class="col-sm-12">
                <h5 class="links text-center"v-if="cotizaciones.length>0">Cotizaciones Relacionadas al cliente</h5>
                <div class=" p-1" v-if="cotizaciones.length>0">
                  <div class="row">
                    <div v-for="cotizaciones in cotizacionesCliente"  class="card col-2">
                      <div class="card-body">
                        <h5 class="card-title small text-center">COT-{{cotizaciones.id}}</h5>
                        <p class="card-text small text-center">{{cotizaciones.username}}</p>
                        <a :href="'<?=base_url()?>Cotizaciones/cotizaciones_to_pdf/'+cotizaciones.codigo+'/'+cotizaciones.id" class="btn btn-primary" download>Descargar <span class="mbri-download"></span></a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            </div>

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="row py-3 pt-3">
            <div class="col-md-4">
              <label class="links">Clientes</label>
              <input list="encodings" v-model="form.cedula"  value="" class="form-control form-control-lg" placeholder="Escriba una cedula" :disabled="ver">
                <datalist id="encodings">
                    <option v-for="clientes in clientes"  v-if="clientes.cliente_especial==='No'" :value="clientes.cedula_cliente">{{clientes.nombre_cliente}}</option>
                </datalist>
            </div>
            <div class=" col-md-3 col-sm-12">
              <div class="form-group">
                 <label class="links">Válida Hasta</label>
                   <flat-pickr
                       v-model="form.f_vencimiento"
                       :config="config"
                       class="form-control form-control-lg"
                       placeholder="Selecciona fecha"
                       name="hSasta">
                 </flat-pickr>
               </div>
            </div>
          </div>
          <div class="card col-12 p-3">
             <h5 >Datos del cliente</h5>
             <div class="row" v-if="form.cedula">
               <div class="col-md-4">
                 <label class="links">Empresa</label>
                 <div class="form-group">
                   <select v-model="form.cedula"  name="tipo_envio" class="form-control" disabled >
                     <option v-for="clientes in clientes" v-if="clientes.cliente_especial==='No'" :value="clientes.cedula_cliente">{{clientes.nombre_empresa}}</option>
                   </select>
                   <p class="text-danger my-1 small" v-if="(errors.first('tipo_envio'))" >  Este dato es requerido  </p>
                 </div>
               </div>
               <div class="col-md-4">
                 <label class="links">Representante Legal</label>
                 <div class="form-group">
                   <select v-model="form.cedula"  name="tipo_envio" class="form-control" disabled>
                     <option v-for="clientes in clientes" v-if="clientes.cliente_especial==='No'" :value="clientes.cedula_cliente">{{clientes.r_legal}}</option>
                   </select>
                   <p class="text-danger my-1 small" v-if="(errors.first('tipo_envio'))" >  Este dato es requerido  </p>
                 </div>
               </div>
               <div class="col-md-4">
                 <label class="links">Telefono</label>
                 <div class="form-group">
                   <select v-model="form.cedula"  name="tipo_envio" class="form-control" disabled>
                     <option v-for="clientes in clientes" v-if="clientes.cliente_especial==='No'" :value="clientes.cedula_cliente">{{clientes.telefono_cliente}}</option>
                   </select>
                   <p class="text-danger my-1 small" v-if="(errors.first('tipo_envio'))" >  Este dato es requerido  </p>
                 </div>
               </div>
               <div class="col-md-4">
                 <label class="links">Correo</label>
                 <div class="form-group">
                   <select v-model="form.cedula"  name="tipo_envio" class="form-control" disabled>
                     <option v-for="clientes in clientes" v-if="clientes.cliente_especial==='No'" :value="clientes.cedula_cliente">{{clientes.correo_cliente}}</option>
                   </select>
                   <p class="text-danger my-1 small" v-if="(errors.first('tipo_envio'))" >  Este dato es requerido  </p>
                 </div>
               </div>
               <div class="col-md-4">
                 <label class="links">Telefono</label>
                 <div class="form-group">
                   <select v-model="form.cedula"  name="tipo_envio" class="form-control" disabled>
                     <option v-for="clientes in clientes" v-if="clientes.cliente_especial==='No'" :value="clientes.cedula_cliente">{{clientes.telefono_cliente}}</option>
                   </select>
                   <p class="text-danger my-1 small" v-if="(errors.first('tipo_envio'))" >  Este dato es requerido  </p>
                 </div>
               </div>
               <div class="col-md-4">
                 <label class="links">Ciudad</label>
                 <div class="form-group">
                   <select v-model="form.cedula"  name="tipo_envio" class="form-control" disabled>
                     <option v-for="clientes in clientes" v-if="clientes.cliente_especial==='No'" :value="clientes.cedula_cliente">{{clientes.ciudad}}</option>
                   </select>
                   <p class="text-danger my-1 small" v-if="(errors.first('tipo_envio'))" >  Este dato es requerido  </p>
                 </div>
               </div>
             </div>
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

                    <label class="links">Ruta de envío</label>
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
       <div class="col-sm-6">
          <div class="form-group">
            <label>Precio Cotizado</label>
           <input v-model="item.precio"  name="nuevo_precio" class="form-control" disabled>
         </div>
      </div>
      <div class="col-sm-6">
         <div class="form-group">
           <label>Nuevo Precio</label>
          <input v-model="item.nuevo_precio"  name="nuevo_precio" class="form-control" >
        </div>
     </div>
  </div>
  <div class="card col-12">
    <div class="row">
      <div class="col-sm-6">
         <div class="form-group links">
           <label>Seguro de carga</label>
          <select v-model="item.segurocarga" name="segurocarga" class="form-control" >
            <option v-for="segurocarga in segurocarga"  :value="segurocarga.porcentaje">{{segurocarga.porcentaje}} %</option>
          </select>

        </div>
     </div>
     <div class="col-sm-6">
        <div class="form-group links">
          <label>Coste de guía</label>
         <select v-model="item.costeguia"  name="costeguia" class="form-control" >
           <option v-for="costeguia in costeguia"   :value="costeguia.valor">{{costeguia.valor}} $</option>
         </select>

       </div>
    </div>
     <div class="col-sm-6">
       <label class="links">Medida</label>
       <div class="form-group">
         <select v-model="item.escala"   name="escala" class="form-control" :disabled="ver||item.criterio==='Unidad'" >
           <option value=""></option>
          <option value="Metros">Metros</option>
          <option value="Centímetros">Centímetros</option>
          <option value="Porcientos">Porcientos</option>
         </select>

       </div>
     </div>
     <div class="col-sm-6">
        <div class="form-group links">
          <label>Factor</label>
         <select v-model="item.factor" @change="facto()" name="segurocarga" class="form-control" :disabled="ver||item.criterio==='Unidad'">
           <option value=""></option>
           <option v-for="factores in factores" v-if="factores.escala===item.escala"  :value="factores.id">{{factores.formula}} </option>
         </select>

       </div>
    </div>

  </div>
  </div>
</div>
</div>
<button
v-if="item.id_tarifa && item.segurocarga && item.costeguia && item.escala && item.formula && item.variable && item.nuevo_precio && !corregirMode || item.id_tarifa && item.segurocarga && item.costeguia && item.criterio==='Unidad'  && item.nuevo_precio && !corregirMode"
 type="button" class="btn btn-success btn-lg btn-block my-2" @click="pushearItemr()">Agregar <span class="mbri-save"></span></button>
 <button
 v-if="item.id_tarifa && item.segurocarga && item.costeguia && item.escala && item.formula && item.variable && item.nuevo_precio && corregirMode || item.id_tarifa && item.segurocarga && item.costeguia && item.criterio==='Unidad' && item.nuevo_precio && corregirMode"
  type="button" class="btn btn-success btn-lg btn-block my-2" @click="editarItem()">Editar <span class="mbri-save"></span></button>
  <div class="table-responsive my-2">
    <table class="table table-striped table-bordered table condensed table-hover table-responsive  ">
      <thead>
        <tr>
          <th>ORIGEN</th>
          <th>DESTINO</th>
          <th>TRANSPORTE</th>
          <th style="white-space: nowrap;">TIPO DE ENVÍO</th>
          <th>PRECIO</th>
          <th>ITINERARIOS</th>
          <th style="white-space: nowrap;">TIEMPOS DE ENTREGA</th>
          <th>SEGURO</th>
          <th style="white-space: nowrap;">MEDIDADS EN</th>
          <th>FACTOR</th>
          <th style="white-space: nowrap;">COSTE DE GUÍA</th>
          <th v-show="!ver">ACTION</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(elemento ,index) in form.items">
          <td style="white-space: nowrap;">{{elemento.departamento_origen}}-{{elemento.ciudad_origen}}</td>
          <td style="white-space: nowrap;">{{elemento.departamento_destino}}-{{elemento.ciudad_destino}}</td>
          <td style="white-space: nowrap;">{{elemento.tipo_transporte}}</td>
          <td style="white-space: nowrap;">{{elemento.tipo_envio}}</td>
          <td style="white-space: nowrap;">{{elemento.precio}} $</td>
          <td style="white-space: nowrap;">{{elemento.itinerarios}}</td>
          <td style="white-space: nowrap;">{{elemento.tiempos}}</td>
          <td style="white-space: nowrap;">{{elemento.segurocarga}} %</td>
          <td style="white-space: nowrap;">{{elemento.escala}}</td>
          <td style="white-space: nowrap;">{{elemento.formula}}</td>
          <td style="white-space: nowrap;">{{elemento.costeguia}} $</td>
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
  <div class="row">
      <div class="col-4">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Usuario que autoriza</label>
          <select class="form-control" id="exampleFormControlSelect1" value="<?=$auth_user_id;?>">
            <option v-for="profiles in profiles" v-if="profiles.user_id==='<?=$auth_user_id;?>'" :value="profiles.user_id">{{profiles.username}}</option>
          </select>
        </div>
      </div>
      <div class="col-8">
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Observación</label>
          <textarea v-model="form.observaciones" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
        </div>
      </div>
  </div>
  <label class="switch pull-right col-12">
    <input type="checkbox" v-model="form.vernota" checked @change="verNotas()" :disabled="ver">
    <span class="slider round"></span>
  </label>


<div class="collapse" id="collapseExampless">
      <div class="form-group">
        <label for="exampleFormControlInput1">Titulo</label>
        <input v-model="resumen" type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
      </div>
      <div class="form-group">
      <label for="exampleFormControlTextarea1">Descripción</label>
      <textarea v-model="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="button" class="btn btn-primary btn-lg btn-block" @click="pushearNota()">Agregar nota</button>
</div>
  <label class="switch pull-right col-12">
    Notas
  </label>
  <div class="card col-12" v-if="form.vernota">
    <a class="btn btn-primary my-1" style="width:150px;" data-toggle="collapse" href="#collapseExampless" role="button" aria-expanded="false" aria-controls="collapseExample">
      Agregar Nota
    </a>
    <div class="card-body p-3">
      <h5 class="card-title">Notas</h5>
      <div v-for="(notas ,index) in form.notas" class="card p-3 m-3">
        <div class="d-flex justify-content-between">
          <h6 class="card-subtitle mb-2 ">{{notas.resumen}}</h6>
          <button v-show="!ver" type="button" class="btn btn-danger pull-right" name="button"  @click="eliminarNota(index)">Eliminar <span class="mbri-trash"></span></button>
        </div>
        <p class="card-text links">{{notas.descripcion}}</p>
      </div>
    </div>
  </div>
  <div class="card col-12 my-3" v-if="form.cedula">
    <div class="col-sm-12">
      <h5 class="links text-center"v-if="cotizaciones.length>0">Cotizaciones Relacionadas al cliente</h5>
      <div class=" p-1" v-if="cotizaciones.length>0">
        <div class="row">
          <div v-for="cotizaciones in cotizacionesCliente" v-if="cotizaciones.cedula===form.cedula" class="card col-3">
            <div class="card-body">
              <h5 class="card-title">COT-{{cotizaciones.id}}</h5>
              <p class="card-text">{{cotizaciones.username}}</p>
              <a :href="'<?=base_url()?>Cotizaciones/cotizaciones_to_pdf/'+cotizaciones.codigo+'/'+cotizaciones.id" class="btn btn-primary" download>Descargar <span class="mbri-download"></span></a>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>
        </div>
      </div>
    </div>
         <!-- Incio de formulario -->


                 <button v-if="editMode===false"  class="button is-primary links btn btn-light float-right my-3" @click="cargarCotizacion()">Guardar</button>
                 <button v-if="editMode===true && !ver"  class="button is-primary btn btn-light links float-right my-3" @click="editarCotizacion()" >Editar</button>
             </form>

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
         estados:{
           'enviado':0,
           'borrador':0,
           'estudio':0,
           'aceptadas':0,
           'rechazadas':0,
           'anuladas':0,
         },
         estado:'',
         departamento:0,
         ver:false,
         cart:[],
         permisos:[],
         profiles:[],
         factura:[],
         cargas:[],
         notas:[],
         cotizacionesCliente:[],
         legalizaciones:[],
         cargas_t:[],
         tarifas:[],
         factores:[],
         segurocarga:[],
         trasnportes:[],
         tiposenvios:[],
         imagenes:[],
         clientes:[],
         costeguia:[],
         userFiles:[],
         transportes:[],
         sedes:[],
         cotizaciones:[],
         editMode:false,
         corregirMode:false,
         descripcion:"",
         resumen:"",
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
           'factor':'',
           'criterio':'',
         },
         email:{
           'correo_cliente':'',
           'nombre_empresa':'',
           'codigo':'',
           'id':'',
         },
         form:{
             'id':'',
             'cedula':'',
             'user_id':'<?=$auth_user_id;?>',
             'vnota':'Si',
             'recalculada':'No',
             'renegociar':'No',
             'tiempo':'',
             'observaciones':'',
             'f_vencimiento':'',
             'nombre_cliente':'',
             'vernota':true,
             'items':[],
             'notas':[],
             'saludo':[],
             'contrato':[],
         },
       },
       methods: {
         setCliente(){

           for (var i = 0; i < this.clientes.length; i++) {

             if (this.clientes[i].cedula_cliente==this.form.cedula) {
               if (this.clientes[i].nombre_empresa==='No aplica') {
                 this.form.nombre_cliente=this.clientes[i].nombre_cliente;
                 this.form.cn=this.clientes[i].cedula_cliente;
                 this.form.telefono_cliente=this.clientes[i].telefono_cliente;
                 this.form.correo_cliente=this.clientes[i].correo_cliente;
                 console.log("natural");
               }else{
                 this.form.nombre_cliente=this.clientes[i].nombre_empresa;
                 this.form.cn=this.clientes[i].nit_cliente;
                 this.form.telefono_cliente=this.clientes[i].telefono_cliente;
                 this.form.correo_cliente=this.clientes[i].correo_cliente;
                 console.log("juridica");
               }
             }
           }
         },
         verNotas(){
           if (this.form.vernota) {
             this.form.vnota="Si";
           }else{
             this.form.vnota="No";
           }
         },
         corregir(index){

           this.item.id_tarifa=this.form.items[index].id_tarifa;
           this.item.segurocarga=this.form.items[index].segurocarga;
           this.item.costeguia=this.form.items[index].costeguia;
           this.item.escala=this.form.items[index].escala;
           this.item.factor=this.form.items[index].factor;
           this.item.variable=this.form.items[index].variable;
           this.item.criterio=this.form.items[index].criterio;
           this.tari();
           this.facto();
           this.item.tipo_transporte=this.form.items[index].tipo_transporte;
           this.item.tipo_envio=this.form.items[index].tipo_envio;
           this.item.llave=index;
           this.item.precio=this.form.items[index].precio;
         },
           depp(){
             this.form.departamento=this.colombia[this.form.dep].departamento;
             console.log(this.form.dep);
           },
           resete(){

               this.$validator.reset();
               document.getElementById("form").reset();
               const dateTime = Date.now();
                 this.form.tiempo = Math.floor(dateTime / 1000);
                 this.loadFotos();
                 this.form.cedula="";
                 this.form.notas=[];
                 this.form.items=[];
               this.editMode=false;
               this.form.nombre_cargo='';
               $('#modal-lg').modal('show');
           },
           async    uploadFoto() {
                this.file_data = $('#imagenFoto').prop('files')[0];
                this.form_data = new FormData();
                this.form_data.append('file', this.file_data);
                this.form_data.append('cedula', this.form.cedula);
                this.form_data.append('tiempo', this.form.tiempo);
            await      axios.post('index.php/Cotizaciones/detail_foto', this.form_data)
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
                      axios.post('index.php/Cotizaciones/eliminarImagen',data)
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
              async loadFotos(){
                 let data = new FormData();
                    data.append('cedula',this.form.cedula);
                    data.append('tiempo',this.form.tiempo);
                    await  axios.post('index.php/Cotizaciones/getimagenes/',data)
                    .then(({data: {imagenes}}) => {
                          this.imagenes = imagenes;
                  });
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
                  this.item.criterio=this.tarifas[i].criterio;
                  if (this.item.criterio==='Unidad') {
                    this.item.factor==="";
                    this.item.escala==="";
                  }
               }
             }
           },
           facto(){
             if (this.item.criterio==='Unidad') {
               this.item.escala="";
               this.item.formula="";
               this.item.variable="";
                this.item.factor="";
             }else{
               for (var i = 0; i < this.factores.length; i++) {
                 if (this.factores[i].id===this.item.factor) {
                   this.item.escala=this.factores[i].escala;
                   this.item.formula=this.factores[i].formula;
                   this.item.variable=this.factores[i].variable;
                    this.item.factor=this.item.factor;
                 }
               }
             }

           },
           cargarCotizacion(index){
             if (this.form.f_vencimiento==='') {
               Swal.fire({
                 type: 'warning',
                 title: '',
                 text: 'Debes señalar una fecha de vencimiento'
               });
               return;
             }
             if (this.form.items.length<1) {
               Swal.fire({
                 type: 'warning',
                 title: '',
                 text: 'Debes agregar al menos un item a la cotización'
               });
               return;
             }
             if (!this.form.cedula) {
               Swal.fire({
                 type: 'warning',
                 title: '',
                 text: 'Debes agregar la cedula del cliente'
               });
               return;
             }
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
                   data.append('service_form',JSON.stringify(this.form));
                   axios.post('index.php/Cotizaciones/insertar',data)
                   .then(response => {
                     if(response.data.status == 200){
                       Swal.fire({
                         type: 'success',
                         title: 'Exito!',
                         text: 'Agregado con exito'
                       })
                       $('#modal-lg').modal('hide');
                       this.form.tiempo="";
                       this.form.cedula="";
                       this.form.notas=[];
                       this.form.items=[];
                       this.loadFotos();
                       this.loadcotizaciones();
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
                     data.append('id',this.cotizaciones[index].id);
                     console.log(this.cotizaciones[index].id);
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
               editarCotizacion(index){
                 if (this.form.items.length<1) {
                   Swal.fire({
                     type: 'warning',
                     title: '',
                     text: 'Debes agregar al menos un item a la cotización'
                   });
                   return;
                 }
                 if (!this.form.cedula) {
                   Swal.fire({
                     type: 'warning',
                     title: '',
                     text: 'Debes agregar la cedula del cliente'
                   });
                   return;
                 }
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
                       data.append('service_form',JSON.stringify(this.form));
                       axios.post('index.php/Cotizaciones/editar',data)
                       .then(response => {
                         if(response.data.status == 200){
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Editado con exito'
                           })
                           $('#modal-lg').modal('hide');
                           this.form.tiempo="";
                           this.form.cedula="";
                           this.form.notas=[];
                           this.form.items=[];
                           this.loadFotos();
                           this.loadcotizaciones();
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

                    });
                    if (this.form.notas.length<1) {
                      for (var i = 0; i < this.notas.length; i++) {
                        if (this.notas[i].tipo_transporte===this.item.tipo_transporte && this.notas[i].estado==='Activo') {
                            this.form.notas.push(this.notas[i]);
                        }
                      }
                    }else if (this.form.notas.length>0) {
                      this.copiaNotas=this.notas;
                      for (var i = 0; i < this.form.notas.length; i++) {
                        for (var j = 0; j < this.copiaNotas.length; j++) {
                          if (this.copiaNotas[j].tipo_transporte===this.item.tipo_transporte && this.copiaNotas[i].estado==='Activo') {
                              if (this.form.notas[i].id===this.copiaNotas[j].id || this.copiaNotas[i].estado==='Inactivo') {
                                this.copiaNotas.splice(j, 1);
                              }else{
                                this.form.notas.push(this.copiaNotas[j]);
                                this.copiaNotas.splice(j, 1);
                              }
                          }
                        }

                      }
                    }
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
                      criterio:this.item.criterio,
                    });
                    if (this.form.notas.length<1) {
                      for (var i = 0; i < this.notas.length; i++) {
                        if (this.notas[i].tipo_transporte===this.item.tipo_transporte && this.notas[i].estado==='Activo') {
                            this.form.notas.push(this.notas[i]);
                        }
                      }
                    }else if (this.form.notas.length>0) {
                      this.copiaNotas=this.notas;
                      for (var i = 0; i < this.form.notas.length; i++) {
                        for (var j = 0; j < this.copiaNotas.length; j++) {
                          if (this.copiaNotas[j].tipo_transporte===this.item.tipo_transporte && this.copiaNotas[i].estado==='Activo') {
                              if (this.form.notas[i].id===this.copiaNotas[j].id || this.copiaNotas[i].estado==='Inactivo') {
                                this.copiaNotas.splice(j, 1);
                              }else{
                                this.form.notas.push(this.copiaNotas[j]);
                                this.copiaNotas.splice(j, 1);
                              }
                          }
                        }

                      }
                    }
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
             pushearNota(){
               Swal({
                 title: '¿Deseas agregar esta nota?',
                 type: 'warning',
                 showCancelButton: true,
                 confirmButtonText: '¡Si!',
                 cancelButtonText: '¡No!',
                 reverseButtons: true
               }).then((result) => {
                 if (result.value) {
                   this.form.notas.push({
                      tipo_transporte:" ",
                      descripcion:this.descripcion,
                      resumen:this.resumen,
                    });
                    this.descripcion="";
                    this.resumen="";
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
                 pushearItemr(index){
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
                        });
                        if (this.form.notas.length<1) {
                          for (var i = 0; i < this.notas.length; i++) {
                            if (this.notas[i].tipo_transporte===this.item.tipo_transporte && this.notas[i].estado==='Activo') {
                                this.form.notas.push(this.notas[i]);
                            }
                          }
                        }else if (this.form.notas.length>0) {
                          this.copiaNotas=this.notas;
                          for (var i = 0; i < this.form.notas.length; i++) {
                            for (var j = 0; j < this.copiaNotas.length; j++) {
                              if (this.copiaNotas[j].tipo_transporte===this.item.tipo_transporte && this.copiaNotas[i].estado==='Activo') {
                                  if (this.form.notas[i].id===this.copiaNotas[j].id || this.copiaNotas[i].estado==='Inactivo') {
                                    this.copiaNotas.splice(j, 1);
                                  }else{
                                    this.form.notas.push(this.copiaNotas[j]);
                                    this.copiaNotas.splice(j, 1);
                                  }
                              }
                            }

                          }
                        }
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
                 eliminarNota(index){
                   Swal({
                     title: '¿Estás seguro?',
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonText: '¡Si! ¡eliminar!',
                     cancelButtonText: '¡No! ¡cancelar!',
                     reverseButtons: true
                   }).then((result) => {
                     if (result.value) {
                       this.form.notas.splice(index, 1);
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
                 eliminarcotizaciones(index){
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
                       data.append('id',this.cotizaciones[index].id);
                         axios.post('index.php/Cotizaciones/eliminar',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Eliminado!',
                               'Ha sido eliminado.',
                               'success'
                             ).then(response => {
                                   this.loadcotizaciones();
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                               this.loadcotizaciones();
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
                 enviarCotizacion(index){
                   Swal({
                     title: '¿Estás seguro?',
                     text: "",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonText: '¡Si! ¡enviar y generar!',
                     cancelButtonText: '¡No!',
                     reverseButtons: true
                   }).then((result) => {
                     if (result.value) {
                       let data = new FormData();
                       data.append('service_form',JSON.stringify(this.email));
                         axios.post('index.php/Cotizaciones/enviar_cotizacion',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Enviado !',
                               'Ha sido enviado con exito .',
                               'success'
                             ).then(response => {
                                   this.loadcotizaciones();
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                               this.loadcotizaciones();
                             })
                           }
                         })
                     } else if (
                       result.dismiss === Swal.DismissReason.cancel
                     ) {
                       Swal(
                         'Cancelado',
                         'No fue enviado.',
                         'success'
                       )
                     }
                   })
                 },
                 soloEnviar(index){
                   Swal({
                     title: '¿Estás seguro?',
                     text: "",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonText: '¡Si! ¡enviar!',
                     cancelButtonText: '¡No!',
                     reverseButtons: true
                   }).then((result) => {
                     if (result.value) {
                       let data = new FormData();
                       data.append('service_form',JSON.stringify(this.email));
                         axios.post('index.php/Cotizaciones/soloenviar',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Enviado !',
                               'Ha sido enviado con exito .',
                               'success'
                             ).then(response => {
                                   this.loadcotizaciones();
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                               this.loadcotizaciones();
                             })
                           }
                         })
                     } else if (
                       result.dismiss === Swal.DismissReason.cancel
                     ) {
                       Swal(
                         'Cancelado',
                         'No fue enviado.',
                         'success'
                       )
                     }
                   })
                 },
                 generar(index){
                   Swal({
                     title: '¿Estás seguro?',
                     text: "",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonText: '¡Si! ¡generar!',
                     cancelButtonText: '¡No!',
                     reverseButtons: true
                   }).then((result) => {
                     if (result.value) {
                       let data = new FormData();
                       data.append('service_form',JSON.stringify(this.email));
                         axios.post('index.php/Cotizaciones/generar',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Enviado !',
                               'Ha sido enviado con exito .',
                               'success'
                             ).then(response => {
                                   this.loadcotizaciones();
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                               this.loadcotizaciones();
                             })
                           }
                         })
                     } else if (
                       result.dismiss === Swal.DismissReason.cancel
                     ) {
                       Swal(
                         'Cancelado',
                         'No fue enviado.',
                         'success'
                       )
                     }
                   })
                 },
                 setear(index){
                   this.form.id=this.cotizaciones[index].id,
                   this.form.cedula=this.cotizaciones[index].cedula,
                   this.form.fecha_creacion=this.cotizaciones[index].fecha_creacion,
                   this.items=JSON.parse(this.cotizaciones[index].items),
                   this.form.estatus=this.cotizaciones[index].estatus,
                   this.form.vnota=this.cotizaciones[index].vnota,
                   this.form.tiempo=this.cotizaciones[index].tiempo,
                   this.form.f_vencimiento=this.cotizaciones[index].f_vencimiento,
                   this.form.observaciones=this.cotizaciones[index].observaciones,
                   this.form.items=JSON.parse(this.cotizaciones[index].items),
                   this.form.notas=JSON.parse(this.cotizaciones[index].notas),
                   this.form.contrato=JSON.parse(this.cotizaciones[index].contrato),
                   this.form.saludo=JSON.parse(this.cotizaciones[index].saludo),
                   $('#modal-lg').modal('show');
                   if (this.form.vnota==='Si') {
                     this.form.vernota=true;
                   }else{
                     this.form.vernota=false;
                   }
                   this.loadFotos();
                   this.editMode=true;
                 },
                 duplicar(index){
                   this.form.cedula=this.cotizaciones[index].cedula,
                   this.form.fecha_creacion=this.cotizaciones[index].fecha_creacion,
                   this.items=JSON.parse(this.cotizaciones[index].items),
                   this.form.estatus=this.cotizaciones[index].estatus,
                   this.form.vnota=this.cotizaciones[index].vnota,
                   this.form.tiempo=this.cotizaciones[index].tiempo,
                   this.form.observaciones=this.cotizaciones[index].observaciones,
                   this.form.items=JSON.parse(this.cotizaciones[index].items),
                   this.form.notas=JSON.parse(this.cotizaciones[index].notas),
                   this.form.contrato=JSON.parse(this.cotizaciones[index].contrato),
                   this.form.saludo=JSON.parse(this.cotizaciones[index].saludo),
                   $('#modal-lg').modal('show');
                   if (this.form.vnota==='Si') {
                     this.form.vernota=true;
                   }else{
                     this.form.vernota=false;
                   }
                   this.loadFotos();
                 },
                 setearEmail(index){
                   this.email.correo_cliente=this.cotizaciones[index].correo_cliente;
                   this.email.id=this.cotizaciones[index].id;
                   this.email.nombre_empresa=this.cotizaciones[index].nombre_empresa;
                   this.email.url_pdf='Cotizaciones/Cotizaciones_to_pdf/'+this.cotizaciones[index].codigo+'/'+this.cotizaciones[index].id;
                   this.email.url_gestion='Cotizaciones/Cot?ref_cot='+this.cotizaciones[index].id+'&ref_cod='+this.cotizaciones[index].codigo;
                   this.email.nombre_archivo='COT-'+this.cotizaciones[index].id;
                   this.email.codigo=this.cotizaciones[index].codigo;
                   this.email.usuario_responsable=this.cotizaciones[index].user_id;
                   this.email.saludos=JSON.parse(this.cotizaciones[index].saludo);
                   this.email.saludo=this.email.saludos[0].descripcion;
                 },
                 ver(index){
                   this.form.id=this.cotizaciones[index].id,
                   this.form.nombre_cargo=this.cotizaciones[index].nombre_cargo,
                   $('#myModal').modal('show');
                   this.editMode=false
                 },
                 <?php if ($this->auth_role == 'customer'): ?>
                 async loadcotizaciones(){
                   let data = new FormData();
                   console.log(this.form.user_id);
                  data.append('id',this.form.user_id);
                   await   axios.post('index.php/Cotizaciones/getcotizacionesu/',data)
                    .then(({data: {cotizaciones}}) => {
                      this.cotizaciones = cotizaciones
                    });
                    $("#example1").DataTable();
                    this.estados.enviado=0;
                    this.estados.anuladas=0;
                    this.estados.rechazadas=0;
                    this.estados.estudio=0;
                    this.estados.borrador=0;
                    this.estados.aceptadas=0;
                    for (var i = 0; i < this.cotizaciones.length; i++) {
                      if (this.cotizaciones[i].estatus_gestion==='Enviado') {
                        this.estados.enviado=this.estados.enviado+1;
                      }else if (this.cotizaciones[i].estatus_gestion==='Anulada') {
                        this.estados.anuladas=this.estados.anuladas+1;
                      }else if (this.cotizaciones[i].estatus_gestion==='Borrador' || this.cotizaciones[i].estatus_gestion==='Renegociado') {
                        this.estados.borrador=this.estados.borrador+1;
                      }else if (this.cotizaciones[i].estatus_gestion==='Rechazada') {
                        this.estados.rechazadas=this.estados.rechazadas+1;
                      }else if (this.cotizaciones[i].estatus_gestion==='En estudio') {
                        this.estados.estudio=this.estados.estudio+1;
                      }else if (this.cotizaciones[i].estatus_gestion==='Aprobada') {
                        this.estados.aceptadas=this.estados.aceptadas+1;
                      }

                    }
                  },
                 <?php endif; ?>
                 <?php if ( $this->auth_role == 'manager' || $this->auth_role == 'admin'): ?>
                 async loadcotizaciones(){
                   await   axios.get('index.php/Cotizaciones/getcotizaciones/')
                    .then(({data: {cotizaciones}}) => {
                      this.cotizaciones = cotizaciones
                    });
                    $("#example1").DataTable();
                    this.estados.enviado=0;
                    this.estados.anuladas=0;
                    this.estados.rechazadas=0;
                    this.estados.estudio=0;
                    this.estados.borrador=0;
                    this.estados.aceptadas=0;
                    for (var i = 0; i < this.cotizaciones.length; i++) {
                      if (this.cotizaciones[i].estatus_gestion==='Enviado') {
                        this.estados.enviado=this.estados.enviado+1;
                      }else if (this.cotizaciones[i].estatus_gestion==='Anulada') {
                        this.estados.anuladas=this.estados.anuladas+1;
                      }else if (this.cotizaciones[i].estatus_gestion==='Borrador' || this.cotizaciones[i].estatus_gestion==='Renegociado') {
                        this.estados.borrador=this.estados.borrador+1;
                      }else if (this.cotizaciones[i].estatus_gestion==='Rechazada') {
                        this.estados.rechazadas=this.estados.rechazadas+1;
                      }else if (this.cotizaciones[i].estatus_gestion==='En estudio') {
                        this.estados.estudio=this.estados.estudio+1;
                      }else if (this.cotizaciones[i].estatus_gestion==='Aprobada') {
                        this.estados.aceptadas=this.estados.aceptadas+1;
                      }

                    }
                  },
                 <?php endif; ?>

                 async loadclientes() {
                      await   axios.get('index.php/Clientes/getclientes/')
                         .then(({data: {clientes}}) => {
                           this.clientes = clientes
                         });
                       },
                   async loadtransportes() {
                      await   axios.get('index.php/Transporte/gettransportes/')
                         .then(({data: {transportes}}) => {
                           this.transportes = transportes
                         });
                       },
                    async loadtiposenvios() {
                      await   axios.get('index.php/TiposEnvios/gettiposenvios/')
                         .then(({data: {tiposenvios}}) => {
                           this.tiposenvios = tiposenvios
                         });
                       },
                  async loadtipocarga() {
                      await   axios.get('index.php/TipoCarga/gettipocarga/')
                         .then(({data: {tipocarga}}) => {
                           this.tipocarga = tipocarga
                         });
                       },
                 async loadtarifas() {
                     await   axios.get('index.php/Tarifas/gettarifas/')
                        .then(({data: {tarifas}}) => {
                          this.tarifas = tarifas
                        });
                      },
                async loadsedes(){
                        let data = new FormData();
                         data.append('id_cliente',this.form.cedula);
                         await axios.post('index.php/Sedes/getsedes/',data)
                        .then(({data: {sedes}}) => {
                          this.sedes = sedes
                        });
                      },
                      async loadCotizacionesclientes(){

                              let data = new FormData();
                               data.append('id_cliente',this.form.cedula);
                               await axios.post('index.php/Cotizaciones/getcc/',data)
                              .then(({data: {cotizacionesCliente}}) => {
                                this.cotizacionesCliente = cotizacionesCliente
                              });
                            },
                  async loadproveedores() {
                     await   axios.get('index.php/Proveedores/getproveedores/')
                        .then(({data: {proveedores}}) => {
                          this.proveedores = proveedores
                        });
                      },
                      async loadsegurocarga() {
                        await   axios.get('index.php/SeguroCarga/getsegurocarga/')
                           .then(({data: {segurocarga}}) => {
                             this.segurocarga = segurocarga
                           });

                         },
                      async loadfactores() {
                        await   axios.get('index.php/Factores/getfactores/')
                           .then(({data: {factores}}) => {
                             this.factores = factores
                           });

                         },
                         async loadcosteguia() {
                        await   axios.get('index.php/CosteGuia/getcosteguia/')
                           .then(({data: {costeguia}}) => {
                             this.costeguia = costeguia
                           });

                         },
                      async loadnotas() {
                            await   axios.get('index.php/Notas/getnotass/')
                               .then(({data: {notas}}) => {
                                 this.notas = notas
                               });
                               for (var i = 0; i < this.notas.length; i++) {
                                 if (this.notas[i].tipo_transporte==='Saludo') {
                                  this.form.saludo.push(this.notas[i]);
                                 }
                               }
                               for (var i = 0; i < this.notas.length; i++) {
                                 if (this.notas[i].tipo_transporte==='Contrato' && this.notas[i].estado==='Activo') {
                                  this.form.contrato.push(this.notas[i]);
                                 }
                               }
                             },
                             async   loadProfiles() {
                             await     axios.get('index.php/User/get_profile/')
                                  .then(({data: {profiles}}) => {
                                    this.profiles = profiles
                                  });
                                },
                                async loadCart() {

                                    await  axios.get('index.php/User/get_profile/')
                                     .then(({data: {profiles}}) => {
                                        this.cart = profiles;
                                     });
                                     this.permisos=JSON.parse(this.cart[0].permisos);
                                     if (! this.permisos.cotizaciones) {
                                      window.setTimeout(function () {
                                            location.href = "<?=base_url();?>";
                                       }, 0);
                                     }
                                   },
       },

       created(){
           this.loadCart();
           this.loadProfiles();
           this.loadnotas();
           this.loadcosteguia();
           this.loadfactores();
           this.loadsegurocarga();
           this.loadproveedores();
           this.loadtarifas();
           this.loadtipocarga();
           this.loadtiposenvios();
           this.loadtransportes();
           this.loadclientes();
           this.loadcotizaciones();

       },
   })
 </script>
