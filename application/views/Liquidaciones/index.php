<div id="app" class="container">
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
            <input list="encodings" v-model="form.cedula" @change="loadLiquidaciones();loadCotizaciones()"  value="" class="form-control form-control-lg" placeholder="Escriba una cedula" :disabled="ver">
              <datalist id="encodings">
                  <option v-for="clientes in clientes"  v-if="clientes.cliente_especial==='No'" :value="clientes.cedula_cliente">{{clientes.nombre_cliente}}</option>
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
              <th class="links">Estado</th>
              <th class="links">Action</th>
            </tr>
            </thead>
              <tr v-for="(liquidaciones,index) in liquidaciones">
                <td class="links">{{liquidaciones.id}}</td>
                <td class="links">{{liquidaciones.nombre_cliente}}</td>
                <td class="links">{{liquidaciones.ciudad_origen}}</td>
                <td class="links">{{liquidaciones.ciudad_destino}}</td>
                <td class="links">{{liquidaciones.totalVolumen}}</td>
                <td class="links">{{liquidaciones.totalKilos}}</td>
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
                <div class="row p-1 ">
                  <div class="col-md-4">
                    <label class="links"></label>
                    <input list="encodings" v-model="form.cedula" @change="loadLiquidaciones();loadCotizaciones()"  value="" class="form-control form-control-lg" placeholder="Escriba una cedula" :disabled="ver">
                      <datalist id="encodings">
                          <option v-for="clientes in clientes"  v-if="clientes.cliente_especial==='No'" :value="clientes.cedula_cliente">{{clientes.nombre_cliente}}</option>
                      </datalist>
                  </div>
                </div>
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
                     <input list="encodings" v-model="form.cedula" @change="loadCotizaciones();loadLiquidaciones();"  value="" class="form-control form-control-lg" placeholder="Escriba una cedula" :disabled="ver">
                       <datalist id="encodings">
                           <option v-for="clientes in clientes"  v-if="clientes.cliente_especial==='No'" :value="clientes.cedula_cliente" :disabled="ver">{{clientes.nombre_cliente}}</option>
                       </datalist>
                   </div>
                   <div class="col-md-4">
                     <label class="links">COTIZACIÓN</label>
                     <input list="encodingss" v-model="form.id_cotizacion" @change="cargarItems()"  value="" class="form-control form-control-lg" placeholder="Escriba una cedula" :disabled="!form.cedula">
                       <datalist id="encodingss">
                           <option v-for="cotizaciones in cotizaciones" :value="cotizaciones.id">{{cotizaciones.id}}</option>
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
                 <label class="switch pull-right" v-if="!form.id_tarifa">
                   <input type="checkbox" v-model="vertable">
                   <span class="slider round"></span>
                 </label>
               </br>
                 <div class="d-flex justify-content-center" v-if="vertable && !form.id_tarifa">
                   <div class="table-responsive my-2 ">
                     <table  class="table table-striped table-bordered table condensed table-hover "width="100%"  >
                       <thead>
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

                <div class="row" v-if="form.id_tarifa">
                  <div class="col-sm-3">
                     <div class="form-group links">
                       <label>Depto. origen</label>
                      <select v-model="form.id_tarifa" @change="tari()"  name="ciudad_destino" class="form-control" disabled >
                        <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.departamento_origen}}</option>
                      </select>

                    </div>
                 </div>
                 <div class="col-sm-3">
                    <div class="form-group links">
                      <label>Ciudad origen</label>
                     <select v-model="form.id_tarifa" @change="tari()" name="ciudad_destino" class="form-control" disabled >
                       <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.ciudad_origen}}</option>
                     </select>

                   </div>
                </div>
                <div class="col-sm-3">
                   <div class="form-group links">
                     <label>Depto. destino</label>
                    <select v-model="form.id_tarifa" @change="tari()"  name="ciudad_destino" class="form-control" disabled >
                      <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.departamento_destino}}</option>
                    </select>

                  </div>
               </div>
               <div class="col-sm-3">
                  <div class="form-group links">
                    <label>Ciudad destino</label>
                   <select v-model="form.id_tarifa" @change="tari()" name="ciudad_destino" class="form-control" disabled >
                     <option v-for="tarifas in tarifas" :value="tarifas.id">{{tarifas.ciudad_destino}}</option>
                   </select>

                 </div>
              </div>
              <div class="col-sm-3">
                 <div class="form-group links">
                   <label>itinerarios</label>
                  <select v-model="form.id_tarifa" @change="tari()"  name="ciudad_destino" class="form-control" disabled >
                    <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.itinerarios}}</option>
                  </select>

                </div>
             </div>
             <div class="col-sm-3">
                <div class="form-group links">
                  <label>Tiempos de entrega</label>
                 <select v-model="form.id_tarifa" @change="tari()"  name="ciudad_destino" class="form-control" disabled >
                   <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.tiempos}}</option>
                 </select>
               </div>
            </div>
            <div class="col-sm-3">
               <div class="form-group links">
                 <label>Tarifa</label>
                <select v-model="form.id_tarifa" @change="tari()"  name="ciudad_destino" class="form-control" disabled >
                  <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.precio}}</option>
                </select>
              </div>
           </div>
           <div class="col-3">
             <label class="links">Precio negociado</label>
             <div class="input-group">
               <input v-model="form.precio" type="number"  class="form-control" placeholder="" disabled>
             </div>
           </div>
           <div class="col-4">
             <label class="links">Coste de Guía</label>
             <div class="input-group">
               <input v-model="form.costeguia" type="number"  class="form-control" placeholder="" disabled>
             </div>
           </div>
           <div class="col-4">
             <label class="links">Seguro de Carga</label>
             <div class="input-group">
               <select  name="escala" class="form-control"  disabled>
                 <option value="">{{form.segurocarga}} %</option>
               </select>
             </div>
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
                     <select v-model="form.escala"  name="escala" class="form-control" disabled >
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
                     <select v-model="form.factor" @change="facto()"  name="segurocarga" class="form-control"  disabled>
                       <option value=""></option>
                       <option v-for="factores in factores" v-if="factores.escala===form.escala"  :value="factores.id">{{factores.formula}} </option>
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
                        <input v-model="item.cantidad" @change="selector();" type="number" :disabled="ver" class="form-control" placeholder="Cantidad">
                      </div>
                    </div>
                 </div>
                 <div class="col-7 row card  border-0 " v-if="form.escala==='' || form.escala==='Porcientos'">
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
                 <div class="col-7 row card  border-0 " v-if="form.escala==='Metros'">
                   <label class="links lead">Volumen</label>
                   <div class="col-12 row p-2">
                     <div class="col-3">
                       <label class="links">LA</label>
                       <div class="input-group">
                         <input v-model="item.la" type="number" @change="metros()" class="form-control" placeholder="" :disabled="ver">
                       </div>
                     </div>
                     <div class="col-3">
                    <label class="links">AN</label>
                       <div class="input-group">
                         <input v-model="item.an" type="number" @change="metros()" class="form-control" placeholder="" :disabled="ver">
                       </div>
                     </div>
                     <div class="col-3">
                       <label class="links">AL</label>
                       <div class="input-group">
                         <input  v-model="item.al" type="number" @change="metros()" class="form-control" placeholder="" :disabled="ver">
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
                 <div class="col-7 row card  border-0 " v-if="form.escala==='Centímetros'">
                   <label class="links lead">Volumen</label>
                   <div class="col-12 row p-2">
                     <div class="col-3">
                       <label class="links">LA</label>
                       <div class="input-group">
                         <input v-model="item.la" type="number" @change="centimetros()" class="form-control" placeholder="" :disabled="ver">
                       </div>
                     </div>
                     <div class="col-3">
                    <label class="links">AN</label>
                       <div class="input-group">
                         <input v-model="item.an" type="number" @change="centimetros()" class="form-control" placeholder="" :disabled="ver">
                       </div>
                     </div>
                     <div class="col-3">
                       <label class="links">AL</label>
                       <div class="input-group">
                         <input  v-model="item.al" type="number" @change="centimetros()" class="form-control" placeholder="" :disabled="ver">
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
                 <div class="col-5 row" v-if="form.escala===''||form.escala==='Centímetros'|| form.escala==='Metros'" :disabled="ver">
                   <label class="links lead">Peso</label>
                   <div class="row">
                     <div class="col-5">
                    <label class="links">KILOS BASC</label>
                       <div class="input-group">
                         <input @change="kilos();selector();" v-model="item.kilosbascula" type="number" class="form-control" placeholder="" :disabled="ver">
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
                 <div class="col-5 row" v-if="item.escala==='Porcientos'">
                   <label class="links lead">Peso</label>
                   <div class="row">
                     <div class="col-5">
                    <label class="links">KILOS BASC</label>
                       <div class="input-group">
                         <input @change="kilos();porcientos();" v-model="item.kilosbascula" type="number" class="form-control" placeholder="">
                       </div>
                     </div>
                     <div class="col-6">
                       <label class="links">TOT. KILOS</label>
                       <div class="input-group">
                         <input v-model="item.kilostotal" @change="kilos()" type="number" class="form-control" placeholder="" disabled>
                       </div>
                     </div>
                   </div>
                 </div>
              </div>
              <div class="row" v-if="item.precioItem>0" v-if="form.id_tarifa">
                <div class="col-3" v-if="item.volumen>item.kilostotal">
                  <div class="form-group">
                   <label for="inputlg">Volumen</label>
                   <input v-model="item.volumen" class="form-control input-lg" id="inputlg" type="text" disabled>
                 </div>
                </div>
                <div class="col-3" v-if="item.volumen<item.kilostotal||item.volumen==item.kilostotal">
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
                   <input v-model="form.precioItem" class="form-control input-lg" id="inputlg" type="text" disabled>
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
              v-if="form.id_tarifa && form.escala && !corregirMode && item.kilostotal && item.volumen  && item.precioItem || form.id_tarifa && form.escala==='Porcientos' && form.formula && form.variable && !corregirMode && item.kilostotal && item.precioItem"
               type="button" class="btn btn-success btn-lg btn-block my-2" @click="pushearItem()">Agregar <span class="mbri-save"></span></button>
               <button
               v-if="form.id_tarifa  && form.escala && corregirMode && item.precioItem  || form.id_tarifa && form.escala==='Porcientos' && form.formula && form.variable && !corregirMode && item.kilostotal && item.precioItem && corregirMode"
                type="button" class="btn btn-success btn-lg btn-block my-2" @click="editarItem()">Editar <span class="mbri-save"></span></button>
                <table class="table table-striped table-bordered table condensed table-hover  "v-if="form.id_tarifa">
                  <thead>
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
                <div class="col-12 row card  border-0 " v-if="form.id_tarifa">
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
                    <div class="col-3">
                     <label class="links">Total seguro de carga</label>
                      <div class="input-group">
                           <input v-model="form.totalSeguro" type="number" class="form-control" placeholder="" disabled>
                       </div>
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
         cart:[],
         cargos:[],
         items:[],
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
             this.form.precio="",
             this.form.precioItem="",
             this.form.escala="",
             this.form.formula="",
             this.form.variable="",
             this.form.factor="",
             this.form.id_tarifa="",
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
                    precioItem:this.item.precioItem,
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
             this.item.precioItem=this.form.items[index].precioItem;
             this.selector();
           },
           crearplanilla(index){
             this.form.id_tarifa=this.items[index].id_tarifa;
             this.form.tipocarga=this.items[index].tipocarga;
             this.form.escala=this.items[index].escala;
             this.form.factor=this.items[index].factor;
             this.form.variable=this.items[index].variable;
             this.form.costeguia=this.items[index].costeguia;
             this.form.segurocarga=this.items[index].segurocarga;
             this.tari();
             this.facto();
             this.form.tipo_transporte=this.items[index].tipo_transporte;
             this.form.tipo_envio=this.items[index].tipo_envio;
             this.item.llave=index;
             this.form.precio=this.items[index].precio;
             this.form.precioItem=this.items[index].precio;
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
                        precioItem:this.item.precioItem,
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
              this.item.volumen=parseFloat(this.item.an) * parseFloat(this.item.la) * parseFloat(this.item.al) * parseFloat(this.form.variable) * parseFloat(this.item.cantidad);
              if (this.item.escala==='Porcientos') {
                  this.item.precioItem=this.item.kilostotal*parseFloat(this.form.precioItem);
              }else{
                if (this.item.volumen>this.item.kilostotal) {
                  this.item.precioItem=this.item.volumen*this.form.precioItem;
                }else if(this.item.volumen<this.item.kilostotal){
                  this.item.precioItem=this.item.kilostotal*this.form.precioItem;
                }else if(this.item.volumen==this.item.kilostotal){
                  this.item.precioItem=this.item.kilostotal*this.form.precioItem;
                }
              }

            },
            centimetros(){
              this.item.volumen=0;
              this.item.precioItem=0;
              this.item.volumen=((parseFloat(this.item.an) * parseFloat(this.item.la) * parseFloat(this.item.al) )/ parseFloat(this.form.variable) )* parseFloat(this.item.cantidad);
              if (this.item.escala==='Porcientos') {
                  this.item.precioItem=this.item.kilostotal*parseFloat(this.form.precioItem);
              }else{
                if (this.item.volumen>this.item.kilostotal) {
                  this.item.precioItem=this.item.volumen*this.form.precioItem;
                }else if(this.item.volumen<this.item.kilostotal){
                  this.item.precioItem=this.item.kilostotal*this.form.precioItem;
                }else if(this.item.volumen==this.item.kilostotal){
                  this.item.precioItem=this.item.kilostotal*this.form.precioItem;
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
              this.item.kilostotal=(parseFloat(this.item.kilosbascula)+(parseFloat(this.item.kilosbascula)*((parseFloat(this.form.variable) )/ 100)))*parseInt(this.item.cantidad);
              if (this.item.escala==='Porcientos') {
                  this.item.precioItem=this.item.kilostotal*parseFloat(this.form.precioItem);
              }else{
                if (this.item.volumen>this.item.kilostotal) {
                  this.item.precioItem=this.item.volumen*this.form.precioItem;
                }else if(this.item.volumen<this.item.kilostotal){
                  this.item.precioItem=this.item.kilostotal*this.form.precioItem;
                }else if(this.item.volumen==this.item.kilostotal){
                  this.item.precioItem=this.item.kilostotal*this.form.precioItem;
                }
              }
            },
            tari(){
              for (var i = 0; i < this.tarifas.length; i++) {
                if (this.tarifas[i].id===this.form.id_tarifa) {
                  this.form.departamento_origen=this.tarifas[i].departamento_origen;
                  this.form.departamento_destino=this.tarifas[i].departamento_destino;
                  this.form.ciudad_origen=this.tarifas[i].ciudad_origen;
                   this.form.ciudad_destino=this.tarifas[i].ciudad_destino;
                   this.form.tipo_carga=this.tarifas[i].tipo_carga;
                   this.form.itinerarios=this.tarifas[i].itinerarios;
                   this.form.tiempos=this.tarifas[i].tiempos;
                   this.form.precio=this.tarifas[i].precio;
                }
              }
            },
            facto(){
              for (var i = 0; i < this.factores.length; i++) {
                if (this.factores[i].id===this.form.factor) {
                  this.form.escala=this.factores[i].escala;
                  this.form.formula=this.factores[i].formula;
                  this.form.variable=this.factores[i].variable;

                   this.selector();
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
                   this.form.precio=this.liquidaciones[index].precio,
                   this.form.precioItem=this.liquidaciones[index].precio,
                   this.form.escala=this.liquidaciones[index].escala,
                   this.form.formula=this.liquidaciones[index].formula,
                   this.form.variable=this.liquidaciones[index].variable,
                   this.form.factor=this.liquidaciones[index].factor,
                   this.form.id_tarifa=this.liquidaciones[index].id_tarifa,
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
           async loadCotizaciones(){
              let data = new FormData();
                 data.append('cedula',this.form.cedula);
                 await  axios.post('index.php/Liquidaciones/getcotizaciones/',data)
                 .then(({data: {cotizaciones}}) => {
                       this.cotizaciones = cotizaciones;
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
                 loadCart(){

                   if(localStorage.getItem('cart')) {
                     this.cart=JSON.parse(localStorage.cart);

                   }else {
                     localStorage.setItem("cart", JSON.stringify(this.cart));

                   }
                 },
       },

       created(){

            this.loadCotizaciones();
            this.loadfactores();
            this.loadtipocarga();
            this.loadclientes();
            this.loadtarifas();
            this.loadcargos();
            this.loadCart();
       },
   })
 </script>
