<div id="app" class="container" style="min-height:700px;">
  <div class="row">
    <div class="col-lg-12 my-5 ">
      <!-- Shopping cart table -->
      <div class="table-responsive ">
        <table  class="table">
          <thead>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                  <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold links">Planillas de liquidación <i class="fa fa-file-powerpoint-o" aria-hidden="true"></i></div>
              </th>
            </tr>
            <tr>

              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                <button type="button" @click="resete();ver=false" class="btn btn-block btn-light btn-sm links" >Agregar <span class="mbri-plus"></span></button>
              </th>
            </tr>

          </thead>
        </table>
        <div class="row p-1 ">
          <div class="col-md-4">
            <label class="links">Clientes</label>
            <input list="encodings" v-model="form.cedula" @change="loadLiquidaciones();loadCotizacionesclientes()"  value="" class="form-control form-control-lg" placeholder="Escriba una cedula o NIT" :disabled="ver">
              <datalist id="encodings">
                  <option v-for="clientes in clientes"  v-if="clientes.cliente_especial==='No'" :value="clientes.cedula_cliente">{{clientes.nit_cliente}}</option>
              </datalist>
          </div>
        </div>
          <table id="example1" class="table ">
            <thead>
            <tr>
              <th class="links">Nº Planilla</th>
              <th class="links">Cliente</th>
              <th class="links">Origen</th>
              <th class="links">Destino</th>
              <th class="links">Total Volumen</th>
              <th class="links">Total peso</th>
              <th class="links">Descargar</th>
              <th class="links">Estado</th>
              <th class="links">Action</th>
            </tr>
            </thead>
            <?php if ($this->auth_role == 'customer'): ?>
              <tr v-for="(liquidaciones,index) in liquidaciones" v-if="liquidaciones.user_id==='<?=$auth_user_id;?>'">
            <?php endif; ?>
            <?php if ( $this->auth_role == 'manager' || $this->auth_role == 'admin'): ?>
              <tr v-for="(liquidaciones,index) in liquidaciones">
            <?php endif; ?>

                <td class="links">{{liquidaciones.id}}</td>
                <td class="links">{{liquidaciones.nombre_cliente}}</td>
                <td class="links">{{liquidaciones.ciudad_origen}}</td>
                <td class="links">{{liquidaciones.ciudad_destino}}</td>
                <td class="links">{{liquidaciones.totalVolumen}}</td>
                <td class="links">{{liquidaciones.totalKilos}}</td>
                <td class="links"><a :href="'<?=base_url()?>Liquidaciones/Liquidaciones_to_pdf/'+liquidaciones.id"  download>Descargar PDF</a></td>
                <td class="links" v-if="liquidaciones.estado==='Creado'">Archivado</td>
                <td class="links" v-else>{{liquidaciones.estado}}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"@click="setear(index);ver=true">Ver</a>
                            <a class="dropdown-item" href="#"@click="setear(index);editMode=false">Duplicar</a>
                            <a class="dropdown-item" v-if="liquidaciones.estado==='Creado'" href="#" @click="ged(index)">Generar</a>
                            <a class="dropdown-item" v-if="liquidaciones.estado==='Generado'" href="#" @click="crearGuia(index)">Crear Guía</a>
                            <a class="dropdown-item" v-if="liquidaciones.estado==='Creado'" href="#" @click="setear(index);ver=false">Editar</a>
                            <a class="dropdown-item" v-if="liquidaciones.estado==='Creado'" href="#" @click="eliminar(index)">Eliminar</a>
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



        <!-- Modal -->
        <div class="modal fade" id="mplanilla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <h2 class="links text-center"> PLANILLA</h2>
                <button type="button" class="btn btn-block btn-lg btn-success"><span class="mbri-bookmark"></span>PLN-{{id}}</button>
                <button type="button" class="btn btn-block btn-lg btn-primary" @click="generar()">Generar <span class="mbri-share"></span></button>
                <button type="button" class="btn btn-block btn-lg btn-secondary" @click="generarandGuia()">Generar y Crear Guía <span class="mbri-share"></span></button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal agregar   -->
        <div class="modal fade" id="modal-lg" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title links">Gestión de planillas <i class="fa fa-file-powerpoint-o" aria-hidden="true"></i></h4>
               <button type="button" @click="resete()" class="close" data-dismiss="modal" aria-label="Close">
                 <span class="mbri-close " ></span>
               </button>
             </div>
             <div class="modal-body">
         <!-- Incio de formulario -->
               <div class="card-body">
                 <div class="row p-1 d-flex justify-content-between">
                   <div class="col-md-4">

                     <label class="links">CLIENTE</label>
                     <input list="encodings" v-model="form.cedula" @change="loadCotizacionesclientes();loadLiquidaciones();"  value="" class="form-control form-control-lg" placeholder="Escriba una cedula o NIT" :disabled="ver">
                       <datalist id="encodings">
                           <option v-for="clientes in clientes"  v-if="clientes.cliente_especial==='No'" :value="clientes.cedula_cliente" :disabled="ver">{{clientes.nit_cliente}}</option>
                       </datalist>
                   </div>
                   <div class="col-md-4">
                     <label class="links">COTIZACIÓN</label>
                     <input list="encodingss" v-model="form.id_cotizacion" @change="cargarItems()"  value="" class="form-control form-control-lg" placeholder="Escriba una cedula" :disabled="!form.cedula">
                       <datalist id="encodingss">
                           <option v-for="cotizaciones in cotizaciones"  :value="cotizaciones.id">{{cotizaciones.id}}</option>
                       </datalist>
                   </div>
                 </div>
                 <div class="card col-12 p-3 mb-1">
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
                      <label for="">Cotizacion/Tarifa</label>
                 <div class="row">
                   <label class="switch pull-right">
                     <input type="checkbox" v-model="vertable">
                     <span class="slider round"></span>
                   </label>
                 </div>
                 <div class="row" v-if="!vertable">
                   <div class="col-md-6" >
                     <label class="links">Tipo de transporte</label>
                     <div class="form-group">
                       <select v-model="form.tipo_transporte" @change="form.tipo_envio=''"  name="tipo_transporte" class="form-control" :disabled="ver" >
                        <option value=""></option>
                         <option v-for="transportes in transportes" :value="transportes.tipo_transporte">{{transportes.tipo_transporte}}</option>
                       </select>
                     </div>
                   </div>
                   <div class="col-md-6" >
                     <label class="links">Tipo de envío</label>
                     <div class="form-group">
                       <select v-model="form.tipo_envio" @change="item.id_tarifa=''"  name="tipo_envio" class="form-control" :disabled="ver" >
                         <option value=""></option>
                         <option v-for="tiposenvios in tiposenvios" v-show="tiposenvios.tipo_transporte===form.tipo_transporte" :value="tiposenvios.nombre_tiposenvios">{{tiposenvios.nombre_tiposenvios}}</option>
                       </select>
                     </div>
                   </div>
                     <div class="col-sm-12">

                         <label class="links">Ruta de envío</label>
                         <input list="tarifas" v-model="item.id_tarifa" @change="tari()"  value="" class="form-control form-control-lg" placeholder="Escriba una ruta">
                           <datalist id="tarifas">
                               <option v-for="tarifas in tarifas" v-if="tarifas.tipo_envio===form.tipo_envio && tarifas.tipo_transporte===form.tipo_transporte"  :value="tarifas.id">De {{tarifas.ciudad_origen}} a {{tarifas.ciudad_destino}}  -{{tarifas.itinerarios}}</option>
                           </datalist>

                     </div>
                 </div>

                 <div class="d-flex justify-content-center row" v-if="vertable">
                   <div class="table-responsive my-2 ">
                     <table  class="table table-striped table-bordered table condensed table-hover "width="100%"  >
                       <thead>
                         <tr>
                           <th scope="col" colspan="6" class="border-0 bg-info  text-center">
                               <div class="bg-info rounded-pill px-4  text-uppercase font-weight-bold links text-white">Items de la cotización <i class="fa fa-calculator" aria-hidden="true"></i></div>
                           </th>
                         </tr>
                         <tr>
                           <th>ORIGEN</th>
                           <th>DESTINO</th>
                           <th>TRANSPORTE</th>
                           <th style="white-space: nowrap;">TIPO DE ENVÍO</th>
                           <th>PRECIO</th>
                           <th v-show="!ver">ACTION</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr v-for="(elemento ,index) in items">
                           <td style="white-space: nowrap;">{{elemento.departamento_origen}}-{{elemento.ciudad_origen}}</td>
                           <td style="white-space: nowrap;">{{elemento.departamento_destino}}-{{elemento.ciudad_destino}}</td>
                           <td style="white-space: nowrap;">{{elemento.tipo_transporte}}</td>
                           <td style="white-space: nowrap;">{{elemento.tipo_envio}}</td>
                           <td style="white-space: nowrap;">{{elemento.precio}} $</td>
                           <td v-show="!ver">
                             <div class="btn-group">
                                 <button type="button" class="btn btn-default">Action</button>
                                 <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                   <span class="sr-only">Toggle Dropdown</span>
                                   <div class="dropdown-menu" role="menu">
                                     <a class="dropdown-item" href="#" @click="crearplanilla(index)">Crear Planilla</a>
                                   </div>
                                 </button>
                             </div>
                           </td>
                         </tr>
                       </tbody>
                     </table>

                   </div>
                 </div>

                <div class="row" >
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
              <div class="col-sm-3">
                 <div class="form-group links">
                   <label>itinerarios</label>
                  <select v-model="item.id_tarifa" @change="tari()"  name="ciudad_destino" class="form-control" disabled >
                    <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.itinerarios}}</option>
                  </select>

                </div>
             </div>
             <div class="col-sm-3">
                <div class="form-group links">
                  <label>Tiempos de entrega</label>
                 <select v-model="item.id_tarifa" @change="tari()"  name="ciudad_destino" class="form-control" disabled >
                   <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.tiempos}}</option>
                 </select>
               </div>
            </div>
            <div class="col-sm-3">
               <div class="form-group links">
                 <label>Tarifa</label>
                <select v-model="item.id_tarifa" @change="tari()"  name="ciudad_destino" class="form-control" disabled >
                  <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.precio}}</option>
                </select>
              </div>
           </div>
           <div class="col-3">
             <label class="links">Precio negociado</label>
             <div class="input-group">
               <input v-model="item.precio" type="number"  class="form-control" placeholder="" disabled>
             </div>
           </div>
           <div class="col-4">
             <label class="links">Coste de Guía</label>
             <select v-model="form.costeguia"  name="escala" class="form-control"  >
               <option value=""></option>
              <option v-for="costeguia in costeguia" :value="costeguia.valor">{{costeguia.valor}}</option>
             </select>
           </div>
           <div class="col-4">
             <label class="links">Seguro de Carga %</label>
             <select v-model="form.segurocarga"  name="escala" class="form-control"  >
               <option value=""></option>
              <option v-for="segurocarga in segurocarga" :value="segurocarga.porcentaje">{{segurocarga.porcentaje}}</option>
             </select>
           </div>
           <div class="col-4">
             <div class="form-group">
              <label for="inputlg">Identificación de  la carga</label>
              <input v-model="form.idcarga" class="form-control" id="inputlg" type="text">
            </div>
           </div>
                 <div class="col-sm-4">
                   <label class="links">Medida</label>
                   <div class="form-group">
                     <select v-model="item.escala"  name="escala" class="form-control"  :disabled="ver||item.criterio==='Unidad'"  >
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
                     <select v-model="item.factor" @change="facto()"  name="segurocarga" class="form-control"  :disabled="ver||item.criterio==='Unidad'"  >
                       <option value=""></option>
                       <option v-for="factores in factores" v-if="factores.escala===item.escala"  :value="factores.id">{{factores.formula}} </option>
                     </select>
                   </div>
                </div>
                 <div class="col-4 py-2">
                  <label class="links">Tipo de carga</label>
                   <div class="input-group">
                      <select v-model="item.tipocarga"   name="tipocarga" class="form-control" :disabled="ver" >
                        <option v-for="tipocarga in tipocarga"  :value="tipocarga.nombre_tipocarga" >{{tipocarga.nombre_tipocarga}}</option>
                      </select>
                      <div class="input-group-append">
                        <input v-model="item.cantidad"  type="number" :disabled="ver" class="form-control" placeholder="Cantidad">
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
                         <input v-model="item.la" type="number" class="form-control" placeholder="" :disabled="ver">
                       </div>
                     </div>
                     <div class="col-3">
                    <label class="links">AN</label>
                       <div class="input-group">
                         <input v-model="item.an" type="number"  class="form-control" placeholder="" :disabled="ver">
                       </div>
                     </div>
                     <div class="col-3">
                       <label class="links">AL</label>
                       <div class="input-group">
                         <input  v-model="item.al" type="number"  class="form-control" placeholder="" :disabled="ver">
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
                         <input v-model="item.la" type="number"  class="form-control" placeholder="" :disabled="ver">
                       </div>
                     </div>
                     <div class="col-3">
                    <label class="links">AN</label>
                       <div class="input-group">
                         <input v-model="item.an" type="number"  class="form-control" placeholder="" :disabled="ver">
                       </div>
                     </div>
                     <div class="col-3">
                       <label class="links">AL</label>
                       <div class="input-group">
                         <input  v-model="item.al" type="number"  class="form-control" placeholder="" :disabled="ver">
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
                         <input  v-model="item.kilosbascula" @change="kilos()" type="number" class="form-control" placeholder="" :disabled="ver||item.criterio==='Unidad'">
                       </div>
                     </div>
                     <div class="col-6">
                       <label class="links">TOT. KILOS</label>
                       <div class="input-group">
                         <input v-model="item.kilostotal" type="number" class="form-control" placeholder="" disabled>
                       </div>
                     </div>
                     <div class="col-1 " style="margin-top:39px;">
                       <button v-if="item.criterio==='Unidad'" class="btn btn-success float-left" type="button" @click="unidad()" name="button"><span class="mbri-play"></span>u</button>
                       <button v-if="item.escala==='Metros'&& item.criterio==='Kilos'" class="btn btn-success float-left" type="button" @click="metros()" name="button"><span class="mbri-play"></span>m</button>
                       <button v-if="item.escala==='Centímetros' && item.criterio==='Kilos'" class="btn btn-success float-left" type="button" @click="centimetros()" name="button"><span class="mbri-play"></span>c</button>
                       <button v-if="item.escala==='Porcientos' && item.criterio==='Kilos'" class="btn btn-success float-left" type="button" @click="porcientos()" name="button"><span class="mbri-play"></span>p</button>
                     </div>
                   </div>
                 </div>
                 <div class="col-5 row" v-if="item.escala==='Porcientos'">
                   <label class="links lead">Peso</label>
                   <div class="row">
                     <div class="col-5">
                    <label class="links">KILOS BASC</label>
                       <div class="input-group">
                         <input  v-model="item.kilosbascula" @change="kilos()" type="number" class="form-control" placeholder="">
                       </div>
                     </div>
                     <div class="col-6">
                       <label class="links">TOT. KILOS</label>
                       <div class="input-group">
                         <input v-model="item.kilostotal" type="number" class="form-control" placeholder="" disabled>
                       </div>
                     </div>

                   </div>

                 </div>
              </div>
              <div class="row" v-if="item.precioItem>0" >
                <div class="col-3" v-if="item.volumen>item.kilostotal && item.criterio==='Kilos'">
                  <div class="form-group">
                   <label for="inputlg">Volumen</label>
                   <input v-model="item.volumen" class="form-control input-lg" id="inputlg" type="text" disabled>
                 </div>
                </div>
                <div class="col-3" v-if="item.volumen<item.kilostotal||item.volumen==item.kilostotal && item.criterio==='Kilos'">
                  <div class="form-group">
                   <label for="inputlg">Kilos</label>
                   <input v-model="item.kilostotal" class="form-control input-lg" id="inputlg" type="text" disabled>
                 </div>
                </div>
                <div class="col-3" v-if="item.criterio==='Unidad'">
                  <div class="form-group">
                   <label for="inputlg">Cantidad</label>
                   <input v-model="item.cantidad" class="form-control input-lg" id="inputlg" type="text" disabled>
                 </div>
                </div>
                <div class="col-3" v-if="item.cantidad==='Kilos'">
                  <div class="form-group">
                   <label for="inputlg">Kilos</label>
                   <input v-model="item.kilostotal" class="form-control input-lg" id="inputlg" type="text" disabled>
                 </div>
                </div>
                <div class="col-1" style="padding-top:38px;">
                   <span class="mbri-close" style="font-size:30px;"></span>
                </div>
                <div class="col-3">
                  <div class="form-group">
                   <label for="inputlg">PRECIO</label>
                   <input v-model="item.precio" class="form-control input-lg" id="inputlg" type="text" disabled>
                 </div>
                </div>
                <div class="col-1" style="padding-top:38px;">
                  <span class="mbri-arrow-next" style="font-size:30px;"></span>
                </div>
                <div class="col-4">
                  <div class="form-group">
                   <label for="inputlg">PRECIO TOTAL</label>
                   <input v-model="item.precioItem" class="form-control input-lg" id="inputlg" type="text" disabled>
                 </div>
                </div>
              </div>
              <button
              v-if="item.criterio==='Unidad' && item.precioItem && !corregirMode"
               type="button" class="btn btn-success btn-lg btn-block my-2" @click="pushearItem()">Agregar <span class="mbri-save"></span></button>
               <button
               v-if="item.criterio==='Unidad'  && item.precioItem && corregirMode"
                type="button" class="btn btn-success btn-lg btn-block my-2" @click="editarItem()">Editar <span class="mbri-save"></span></button>
              <button
              v-if="item.id_tarifa && item.escala && !corregirMode && item.kilostotal && item.volumen  && item.precioItem || item.id_tarifa && item.escala==='Porcientos' && item.formula && item.variable && !corregirMode && item.kilostotal && item.precioItem"
               type="button" class="btn btn-success btn-lg btn-block my-2" @click="pushearItem()">Agregar <span class="mbri-save"></span></button>
               <button
               v-if="item.criterio==='Kilos' && item.id_tarifa  && item.escala && corregirMode && item.precioItem  || item.criterio==='Kilos' && item.id_tarifa && item.escala==='Porcientos' && item.formula && item.variable && !corregirMode && item.kilostotal && item.precioItem && corregirMode"
                type="button" class="btn btn-success btn-lg btn-block my-2" @click="editarItem()">Editar <span class="mbri-save"></span></button>
                <table class="table table-striped table-bordered table condensed table-hover  ">

                  <thead>
                    <tr>
                      <th scope="col" colspan="6" class="border-0 bg-danger  text-center">
                          <div class="bg-danger rounded-pill px-4  text-uppercase font-weight-bold links text-white">Items Liquidados <i class="fa fa-calculator" aria-hidden="true"></i></div>
                      </th>
                    </tr>
                    <tr>

                      <th style="white-space: nowrap;">TIPO DE CARGA</th>
                      <th style="white-space: nowrap;">CANTIDAD</th>
                      <th style="white-space: nowrap;">TOTAL VOLUMEN</th>
                      <th style="white-space: nowrap;">TOTAL PESO</th>
                      <th style="white-space: nowrap;">PRECIO</th>
                      <th v-if="!ver" style="white-space: nowrap;">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(elemento ,index) in form.items">

                      <td style="white-space: nowrap;">{{elemento.tipocarga}}</td>
                      <td style="white-space: nowrap;">{{elemento.cantidad}}</td>
                      <td style="white-space: nowrap;">{{elemento.volumen}}</td>
                      <td style="white-space: nowrap;">{{elemento.kilostotal}}</td>
                      <td style="white-space: nowrap;">{{elemento.precioItem}} $</td>
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
                <div class="col-12 row card  border-0 " >
                  <div class="col-12 row p-2">
                    <div class="col-3">
                   <label class="links">SUMATORIA DE VOLUMEN</label>
                      <div class="input-group">
                        <input v-model="form.totalVolumen" type="number" class="form-control" placeholder="" disabled>
                      </div>
                    </div>
                    <div class="col-3">
                      <label class="links">SUMATORIA KILOS</label>
                      <div class="input-group">
                        <input v-model="form.totalKilos" type="number" class="form-control" placeholder="" disabled>
                      </div>
                    </div>
                    <div class="col-3">
                     <label class="links">VALOR FLETE</label>
                      <div class="input-group">
                           <input v-model="form.totalPrecios" type="number" class="form-control" placeholder="" disabled>
                       </div>
                    </div>

                  </div>
                </div>
                <h5 class="links text-center"v-if="liquidaciones.length>0">Liquidaciones Relacionadas al cliente</h5>
                <div class="card p-1" v-if="liquidaciones.length>0">
                  <div class="row">

                    <div v-for="liquidaciones in liquidaciones" v-if="liquidaciones.estado==='Generado'" class="col-2">
                        <a :href="'<?=base_url()?>Liquidaciones/Liquidaciones_to_pdf/'+liquidaciones.id"  download>PL-{{liquidaciones.id}}<i style="font-size:7em" class="fa fa-file-powerpoint-o" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
                  <button v-if="editMode===false" @click="cargarPlanilla()"  class="button is-primary links btn btn-light float-right my-3" type="submit">Guardar</button>
                  <button v-if="editMode===true && !ver" @click="editarPlanilla()"  class="button is-primary btn btn-light links float-right my-3" type="submit">Editar</button>
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
         id:0,
         corregirMode:false,
         vertable:true,
         departamento:0,
         ver:false,
         cart:{
           'username':'',
         },
         permisos:{
           'cotizaciones':true,
           'planillas':true,
           'guiasNormales':true,
           'guiasEspeciales':true,
           'actasEntrega':true,
           'actasRecogidas':true,
           'documentosGenerados':true,
           'alertas':true,
           'remitentes':true,
           'clientes':true,
           'proveedores':true,
           'trazabilidad':true,
           'facturas':true,
         },
         cargos:[],
         costeguia:[],
         tiposenvios:[],
         transportes:[],
         items:[],
         segurocarga:[],
         factores:[],
         tarifas:[],
         tipocarga:[],
         clientes:[],
         cotizaciones:[],
         liquidaciones:[],
         editMode:false,
         cedula:'',
         totalVolumen:'',
         totalKilos:'',
         totalPrecios:'',
        form:{
             'id':'',
             'user_id':'<?=$auth_user_id;?>',
             'id_cotizacion':'',
             'cedula':'',
             'nombre_cargo':'',
             'items':[],
             'tipo_transporte':'',
             'tipo_envio':'',
             'departamento_origen':'',
             'departamento_destino':'',
             'ciudad_origen':'',
             'ciudad_destino':'',
             'tipo_carga':'',
             'itinerarios':'',
             'tiempos':'',
             'precio':'',
             'escala':'',
             'formula':'',
             'variable':'',
             'factor':'',
             'id_tarifa':'',
             'totalVolumen':'',
             'totalKilos':'',
             'totalPrecios':'',
             'totalUnidades':'',
             'totalSeguro':'',
         },
         archivo:{
           'nombre_archivo':'',
           'usuario_responsable':'',
           'url':'',
           'id':'',
         },
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
           'precioItem':'',
           'criterio':'',
         },
       },
       methods: {
         eliminar(index){
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
               data.append('id',this.liquidaciones[index].id);
                 axios.post('index.php/Liquidaciones/eliminar',data)
                 .then(response => {
                   if(response) {
                     Swal(
                       '¡Eliminado!',
                       'Ha sido eliminado.',
                       'success'
                     ).then(response => {
                           this.loadLiquidaciones();
                     })
                   } else {
                     Swal(
                       'Error',
                       'Ha ocurrido un error.',
                       'warning'
                     ).then(response => {
                       this.loadLiquidaciones();
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
         cargarPlanilla(index){
           if (this.form.items.length<1) {
             Swal.fire({
               type: 'warning',
               title: '',
               text: 'Debes agregar al menos un item a la panilla'
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
                 axios.post('index.php/Liquidaciones/insertar',data)
                 .then(response => {

                   if(response.data.status == 200){
                     this.id=response.data.id;
                     window.setTimeout(function () {
                        $('#mplanilla').modal('show');
                      }, 50);
                     Swal.fire({
                       type: 'success',
                       title: 'Exito!',
                       text: 'Agregado con exito'
                     })
                     $('#modal-lg').modal('hide');
                     this.form.items=[];
                     this.loadLiquidaciones();
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
           editarPlanilla(index){
             if (this.form.items.length<1) {
               Swal.fire({
                 type: 'warning',
                 title: '',
                 text: 'Debes agregar al menos un item a la panilla'
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
                   axios.post('index.php/Liquidaciones/editar',data)
                   .then(response => {

                     if(response.data.status == 200){
                       this.id=response.data.id;
                       Swal.fire({
                         type: 'success',
                         title: 'Exito!',
                         text: 'Editado con exito'
                       })
                       $('#modal-lg').modal('hide');
                       this.form.items=[];
                       this.loadLiquidaciones();
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
             crearGuia(index){
               Swal({
                 title: '¿Estás seguro?',
                 text: "",
                 type: 'warning',
                 showCancelButton: true,
                 confirmButtonText: '¡Si! ¡generar Guia!',
                 cancelButtonText: '¡No!',
                 reverseButtons: true
               }).then((result) => {
                 if (result.value) {
                   localStorage.setItem('planilla', this.liquidaciones[index].id);
                   window.setTimeout(function () {
                         location.href = "<?=base_url();?>Guias";
                     }, 100);
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
             ged(index){
                  this.archivo.nombre_archivo='PLN-'+this.liquidaciones[index].id;
                  this.archivo.url='Liquidaciones/Liquidaciones_to_pdf/'+this.liquidaciones[index].id;
                  this.archivo.usuario_responsable=this.liquidaciones[index].user_id;
                  this.archivo.numero_doc=this.liquidaciones[index].id;

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
                   data.append('service_form',JSON.stringify(this.archivo));
                     axios.post('index.php/Liquidaciones/generar',data)
                     .then(response => {
                       if(response) {
                         Swal(
                           '¡Enviado !',
                           'Ha sido enviado con exito .',
                           'success'
                         ).then(response => {
                               this.loadLiquidaciones();

                         })
                       } else {
                         Swal(
                           'Error',
                           'Ha ocurrido un error.',
                           'warning'
                         ).then(response => {
                           this.loadLiquidaciones();

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
             unidad(){
               this.item.volumen=0;
               this.item.precioItem=0;
               this.item.kilostotal=0;
               this.item.al="";
               this.item.la="";
               this.item.an="";
               this.item.kilostotal=0;
               if (this.item.criterio==='Unidad') {
                   this.item.precioItem=this.item.cantidad*parseFloat(this.item.precio);

               }
             },
           generar(){
             for (var i = 0; i < this.liquidaciones.length; i++) {
               if (this.liquidaciones[i].id==this.id) {
                this.archivo.nombre_archivo='PLN-'+this.liquidaciones[i].id;
                this.archivo.url='Liquidaciones/Liquidaciones_to_pdf/'+this.liquidaciones[i].id;
                this.archivo.usuario_responsable=this.liquidaciones[i].user_id;
                this.archivo.numero_doc=this.id;
               }
             }
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
                 data.append('service_form',JSON.stringify(this.archivo));
                   axios.post('index.php/Liquidaciones/generar',data)
                   .then(response => {
                     if(response) {
                       Swal(
                         '¡Enviado !',
                         'Ha sido enviado con exito .',
                         'success'
                       ).then(response => {
                             this.loadLiquidaciones();
                               $('#mplanilla').modal('hide');
                       })
                     } else {
                       Swal(
                         'Error',
                         'Ha ocurrido un error.',
                         'warning'
                       ).then(response => {
                         this.loadLiquidaciones();

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
           generarGuia(){
             for (var i = 0; i < this.liquidaciones.length; i++) {
               if (this.liquidaciones[i].id==this.id) {
                this.archivo.nombre_archivo='PLN-'+this.liquidaciones[i].id;
                this.archivo.url='Liquidaciones/Liquidaciones_to_pdf/'+this.liquidaciones[i].id;
                this.archivo.usuario_responsable=this.liquidaciones[i].user_id;
                this.archivo.numero_doc=this.id;
               }
             }
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
                 data.append('service_form',JSON.stringify(this.archivo));
                   axios.post('index.php/Liquidaciones/generar',data)
                   .then(response => {
                     if(response) {
                       Swal(
                         '¡Enviado !',
                         'Ha sido enviado con exito .',
                         'success'
                       ).then(response => {
                             this.loadLiquidaciones();
                               $('#mplanilla').modal('hide');
                       })
                     } else {
                       Swal(
                         'Error',
                         'Ha ocurrido un error.',
                         'warning'
                       ).then(response => {
                         this.loadLiquidaciones();

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
           generarandGuia(){
             for (var i = 0; i < this.liquidaciones.length; i++) {
               if (this.liquidaciones[i].id==this.id) {
                this.archivo.nombre_archivo='PLN-'+this.liquidaciones[i].id;
                this.archivo.url='Liquidaciones/Liquidaciones_to_pdf/'+this.liquidaciones[i].id;
                this.archivo.usuario_responsable=this.liquidaciones[i].user_id;
                this.archivo.numero_doc=this.id;
               }
             }
             Swal({
               title: '¿Estás seguro?',
               text: "",
               type: 'warning',
               showCancelButton: true,
               confirmButtonText: '¡Si! ¡generar y crear guía!',
               cancelButtonText: '¡No!',
               reverseButtons: true
             }).then((result) => {
               if (result.value) {
                 let data = new FormData();
                 data.append('service_form',JSON.stringify(this.archivo));
                   axios.post('index.php/Liquidaciones/generar',data)
                   .then(response => {
                     if(response) {
                       Swal(
                         '¡Enviado !',
                         'Ha sido generado con exito .',
                         'success'
                       ).then(response => {
                             this.loadLiquidaciones();
                               $('#mplanilla').modal('hide');
                               localStorage.setItem('planilla', this.id);
                               window.setTimeout(function () {
                                     location.href = "<?=base_url();?>Guias";
                                 }, 100);
                       })
                     } else {
                       Swal(
                         'Error',
                         'Ha ocurrido un error.',
                         'warning'
                       ).then(response => {
                         this.loadLiquidaciones();

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
         sumar(){
           this.form.totalKilos=0;this.form.totalVolumen=0;this.form.totalPrecios=0;this.form.totalUnidades=0;this.form.totalSeguro=0;
           for (var i = 0; i < this.form.items.length; i++) {
             this.form.totalVolumen= parseFloat(this.form.items[i].volumen)+parseFloat(this.form.totalVolumen);
             this.form.totalKilos=parseFloat(this.form.items[i].kilostotal)+parseFloat(this.form.totalKilos);
             this.form.totalPrecios=parseFloat(this.form.items[i].precioItem)+parseFloat(this.form.totalPrecios);
             this.form.totalUnidades=parseInt(this.form.items[i].cantidad)+parseInt(this.form.totalUnidades);
           }
           this.form.totalSeguro=parseFloat(this.form.totalPrecios)*(parseFloat(this.form.segurocarga)/100);
         },
           depp(){
             this.form.departamento=this.colombia[this.form.dep].departamento;
             console.log(this.form.dep);
           },
           cargarItems(){
             for (var i = 0; i < this.cotizaciones.length; i++) {
               if (this.cotizaciones[i].id===this.form.id_cotizacion) {
                 this.items=JSON.parse(this.cotizaciones[i].items);
               }

             }
           },
           resete(){
             this.form.id_cotizacion="",
             this.form.items=[],
             this.form.tipo_transporte="",
             this.form.tipo_envio="",
             this.form.departamento_origen="",
             this.form.departamento_destino="",
             this.form.ciudad_origen="",
             this.form.ciudad_destino="",
             this.form.tipo_carga="",
             this.form.itinerarios="",
             this.item.precio="",
             this.item.precioItem="",
             this.item.escala="",
             this.item.formula="",
             this.item.variable="",
             this.item.factor="",
             this.item.id_tarifa="",
             this.form.totalVolumen="",
             this.form.totalKilos="",
             this.form.totalPrecios="",
             this.form.totalUnidades="",
             this.form.totalVolumen="",
             this.form.totalSeguro="",
             this.form.costeguia="",
             this.form.segurocarga="",
             this.form.idcarga="",
               this.$validator.reset();

               this.editMode=false;
               this.form.nombre_cargo='';
               $('#modal-lg').modal('show');
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
                   tipo_carga:this.item.tipo_carga,
                   an:this.item.an,
                   al:this.item.al,
                   la:this.item.la,
                   cantidad:this.item.cantidad,
                   kilosbascula:this.item.kilosbascula,
                   kilostotal:this.item.kilostotal,
                   volumen:this.item.volumen,
                   kilostotal:this.item.kilostotal,
                   tipocarga:this.item.tipocarga,
                   precio:this.item.precio,
                   precioItem:this.item.precioItem,
                   id_tarifa:this.item.id_tarifa,
                   cirterio:this.item.criterio,
                   factor:this.item.factor,
                  });
                  this.sumar();
                  this.item.precio="";
                  this.item.tipo_carga="";
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
                  this.item.precioItem="";
                  this.item.id_tarifa="";
                  this.item.tipo_transporte="";
                  this.item.tipo_envio="";
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
             this.item.tipocarga=this.form.items[index].tipocarga;
             this.item.factor=this.form.items[index].factor;
             this.item.llave=index;
             this.item.precio=this.form.items[index].precio;
             this.item.an=this.form.items[index].an;
             this.item.al=this.form.items[index].al;
             this.item.la=this.form.items[index].la;
              this.item.cirterio=this.form.items[index].cirterio;
             this.item.cantidad=this.form.items[index].cantidad;
             this.item.kilosbascula=this.form.items[index].kilosbascula;
             this.item.kilostotal=this.form.items[index].kilostotal;
             this.item.volumen=this.form.items[index].volumen;
             this.item.kilostotal=this.form.items[index].kilostotal;
             this.item.tipocarga=this.form.items[index].tipocarga;
             this.item.precioItem=this.form.items[index].precioItem;
             this.selector();
              this.facto();
           },
           crearplanilla(index){
             this.item.id_tarifa=this.items[index].id_tarifa;
             this.item.tipocarga=this.items[index].tipocarga;
             this.item.escala=this.items[index].escala;
             this.item.factor=this.items[index].factor;
             this.item.variable=this.items[index].variable;
             this.form.costeguia=this.items[index].costeguia;
             this.form.segurocarga=this.items[index].segurocarga;
             this.tari();
             this.facto();
             this.form.tipo_transporte=this.items[index].tipo_transporte;
             this.form.tipo_envio=this.items[index].tipo_envio;
             this.item.llave=index;
             this.item.precio=this.items[index].precio;


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
                        tipo_carga:this.item.tipo_carga,
                        an:this.item.an,
                        al:this.item.al,
                        la:this.item.la,
                        cantidad:this.item.cantidad,
                        kilosbascula:this.item.kilosbascula,
                        kilostotal:this.item.kilostotal,
                        volumen:this.item.volumen,
                        kilostotal:this.item.kilostotal,
                        tipocarga:this.item.tipocarga,
                        precio:this.item.precio,
                        precioItem:this.item.precioItem,
                        id_tarifa:this.item.id_tarifa,
                        cirterio:this.item.criterio,
                        factor:this.item.factor,
                      });
                      this.sumar();
                      this.item.precio="";
                      this.item.tipo_carga="";
                      this.item.an="";
                      this.item.al="";
                      this.item.la="";
                      this.item.cantidad="";
                      this.item.kilosbascula="";
                      this.item.kilostotal="";
                      this.item.volumen="";
                      this.item.kilostotal="";
                      this.item.tipocarga="";
                      this.item.precioItem="";
                      this.item.factor="";
                      this.item.escala="";
                      this.item.id_tarifa="";
                      this.item.tipo_transporte="";
                      this.item.tipo_envio="";
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
                     this.sumar();
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
               async loadtiposenvios() {
                 await   axios.get('index.php/TiposEnvios/gettiposenvios/')
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
                 this.selector();
               },
            metros(){
              this.item.volumen=0;
              this.item.precioItem=0;
              this.item.volumen=parseFloat(this.item.an) * parseFloat(this.item.la) * parseFloat(this.item.al) * parseInt(this.item.variable) * parseInt(this.item.cantidad);
              this.item.volumen=this.item.volumen.toFixed(2);
              if (this.item.escala==='Porcientos') {
                  this.item.precioItem=this.item.kilostotal*parseFloat(this.item.precioItem);
              }else{
                if (this.item.volumen>this.item.kilostotal) {
                  console.log("volumen");
                  this.item.precioItem=this.item.volumen*this.item.precio;
                }else if(this.item.volumen<this.item.kilostotal){
                  console.log("kilos");
                  this.item.precioItem=this.item.kilostotal*this.item.precio;
                }else if(this.item.volumen==this.item.kilostotal){
                  this.item.precioItem=this.item.kilostotal*this.item.precio;
                }
              }

            },
            centimetros(){
              console.log("metros");
              this.item.volumen=0;
              this.item.precioItem=0;
              this.item.volumen=((parseFloat(this.item.an) * parseFloat(this.item.la) * parseFloat(this.item.al) )/ parseFloat(this.item.variable) )* parseFloat(this.item.cantidad);
              this.item.volumen=this.item.volumen.toFixed(2);
              if (this.item.escala==='Porcientos') {
                  this.item.precioItem=this.item.kilostotal*parseFloat(this.item.precioItem);
              }else{
                if (this.item.volumen>this.item.kilostotal) {
                  this.item.precioItem=this.item.volumen*this.item.precio;
                }else if(this.item.volumen<this.item.kilostotal){
                  this.item.precioItem=this.item.kilostotal*this.item.precio;
                }else if(this.item.volumen==this.item.kilostotal){
                  this.item.precioItem=this.item.kilostotal*this.item.precio;
                }
              }
            },
            porcientos(){
              this.item.volumen=0;
              this.item.precioItem=0;
              this.item.kilostotal=0;
              this.item.al="";
              this.item.la="";
              this.item.an="";
              this.item.kilostotal=(parseFloat(this.item.kilosbascula)+(parseFloat(this.item.kilosbascula)*((parseFloat(this.item.variable) )/ 100)))*parseInt(this.item.cantidad);
              if (this.item.escala==='Porcientos') {
                  this.item.precioItem=this.item.kilostotal*parseFloat(this.item.precioItem);
              }else{
                if (this.item.volumen>this.item.kilostotal) {
                  this.item.precioItem=this.item.volumen*this.item.precio;
                }else if(this.item.volumen<this.item.kilostotal){
                  this.item.precioItem=this.item.kilostotal*this.item.precio;
                }else if(this.item.volumen==this.item.kilostotal){
                  this.item.precioItem=this.item.kilostotal*this.item.precio;
                }
              }
            },
            tari(){
              for (var i = 0; i < this.tarifas.length; i++) {
                if (this.tarifas[i].id===this.item.id_tarifa) {
                  this.form.departamento_origen=this.tarifas[i].departamento_origen;
                  this.form.departamento_destino=this.tarifas[i].departamento_destino;
                  this.form.ciudad_origen=this.tarifas[i].ciudad_origen;
                   this.form.ciudad_destino=this.tarifas[i].ciudad_destino;
                   this.form.tipo_carga=this.tarifas[i].tipo_carga;
                   this.form.itinerarios=this.tarifas[i].itinerarios;
                   this.form.tiempos=this.tarifas[i].tiempos;
                   this.item.precio=this.tarifas[i].precio;
                   this.item.criterio=this.tarifas[i].criterio;
                   console.log(this.tarifas[i].criterio);
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
                 setear(index){
                   this.form.id=this.liquidaciones[index].id,
                   this.form.user_id=this.liquidaciones[index].user_id,
                   this.form.id_cotizacion=this.liquidaciones[index].id_cotizacion,
                   this.form.cedula=this.liquidaciones[index].cedula,
                   this.form.items=JSON.parse(this.liquidaciones[index].items),
                   this.form.tipo_transporte=this.liquidaciones[index].tipo_transporte,
                   this.form.tipo_envio=this.liquidaciones[index].tipo_envio,
                   this.form.departamento_origen=this.liquidaciones[index].departamento_origen,
                   this.form.departamento_destino=this.liquidaciones[index].departamento_destino,
                   this.form.ciudad_origen=this.liquidaciones[index].ciudad_origen,
                   this.form.ciudad_destino=this.liquidaciones[index].ciudad_destino,
                   this.form.tipo_carga=this.liquidaciones[index].tipo_carga,
                   this.form.itinerarios=this.liquidaciones[index].itinerarios,
                   this.item.precio=this.liquidaciones[index].precio,
                   this.item.precioItem=this.liquidaciones[index].precio,
                   this.form.escala=this.liquidaciones[index].escala,
                   this.form.formula=this.liquidaciones[index].formula,
                   this.form.variable=this.liquidaciones[index].variable,
                   this.form.factor=this.liquidaciones[index].factor,
                   this.item.id_tarifa=this.liquidaciones[index].id_tarifa,
                   this.form.totalVolumen=this.liquidaciones[index].totalVolumen,
                   this.form.totalKilos=this.liquidaciones[index].totalKilos,
                   this.form.totalPrecios=this.liquidaciones[index].totalPrecios,
                   this.form.totalUnidades=this.liquidaciones[index].totalUnidades,
                   this.form.totalVolumen=this.liquidaciones[index].totalVolumen,
                   this.form.totalSeguro=this.liquidaciones[index].totalSeguro,
                   this.form.costeguia=this.liquidaciones[index].costeguia,
                   this.form.idcarga=this.liquidaciones[index].idcarga,
                   this.form.segurocarga=this.liquidaciones[index].segurocarga,
                   $('#modal-lg').modal('show');
                   this.editMode=true;
                 },
                 ver(index){
                   this.form.id=this.cargos[index].id,
                   this.form.nombre_cargo=this.cargos[index].nombre_cargo,
                   $('#myModal').modal('show');
                   this.editMode=false
                 },
                 async loadcargos() {
                await   axios.get('index.php/Cargos/getcargos/')
                   .then(({data: {cargos}}) => {
                     this.cargos = cargos
                   });

                 },
             async loadclientes() {
                  await   axios.get('index.php/Clientes/getclientes/')
                     .then(({data: {clientes}}) => {
                       this.clientes = clientes
                     });
                   },
                   async loadtarifas() {
                       await   axios.get('index.php/Tarifas/gettarifas/')
                          .then(({data: {tarifas}}) => {
                            this.tarifas = tarifas
                          });
                        },
             async loadCotizacionesclientes(){
                     let data = new FormData();
                      data.append('id_cliente',this.form.cedula);
                      await axios.post('index.php/Cotizaciones/getcca/',data)
                     .then(({data: {cotizacionesCliente}}) => {
                       this.cotizaciones = cotizacionesCliente
                     });
                   },
             async loadLiquidaciones(){
                let data = new FormData();
                   data.append('cedula',this.form.cedula);
                   await  axios.post('index.php/Liquidaciones/getLiquidaciones/',data)
                   .then(({data: {liquidaciones}}) => {
                         this.liquidaciones = liquidaciones;
                 });
                  $("#example1").DataTable();
               },
               async loadcosteguia() {
              await   axios.get('index.php/CosteGuia/getcosteguia/')
                 .then(({data: {costeguia}}) => {
                   this.costeguia = costeguia
                 });

               },
             async loadfactores() {
               await   axios.get('index.php/Factores/getfactores/')
                  .then(({data: {factores}}) => {
                    this.factores = factores
                  });

                },
               async loadtipocarga() {
                   await   axios.get('index.php/TipoCarga/gettipocarga/')
                      .then(({data: {tipocarga}}) => {
                        this.tipocarga = tipocarga
                      });
                    },
                    async loadsegurocarga() {
                      await   axios.get('index.php/SeguroCarga/getsegurocarga/')
                         .then(({data: {segurocarga}}) => {
                           this.segurocarga = segurocarga
                         });

                       },
                    async loadCart() {
                        await  axios.get('index.php/User/get_profile/')
                         .then(({data: {profiles}}) => {
                            this.cart = profiles;
                         });
                          this.permisos=JSON.parse(this.cart[0].permisos);
                          if (! this.permisos.planillas) {
                           window.setTimeout(function () {
                                 location.href = "<?=base_url();?>";
                            }, 0);
                          }
                       },
       },

       created(){
            this.loadcosteguia();
            this.loadsegurocarga();
            this.loadtransportes();
            this.loadtiposenvios();
            this.loadfactores();
            this.loadtipocarga();
            this.loadclientes();
            this.loadtarifas();
            this.loadcargos();
            this.loadCart();
       },
   })
 </script>
