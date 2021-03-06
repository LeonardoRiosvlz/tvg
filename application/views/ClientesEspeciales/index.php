<div id="app" class="container"style="min-height:1000px;">
  <div id="mydiv" v-show="facturar">
    <div id="mydivheader">ANEXOS PARA FACTURAR</div>
    <table  class="table ">
      <thead>
      <tr>
        <th class="links">Anexo legalización</th>
        <th class="links">Nº Guía</th>
        <th class="links">Valor</th>
        <th class="links">Action</th>
      </tr>
      <tr v-for="(factura,index) in factura">
        <td>E-{{factura.codigo}}</td>
        <td>{{factura.numero_anexo_l}}</td>
        <td>{{factura.total}}$</td>
        <td><button class="btn btn-danger" @click="eliminarItem(index)"><span class="mbri-trash"></span></button></td>
      </tr>
    </table>

    <button v-if="factura.length>0"  @click="crearFactura()" type="button" class="btn-primary btn-block" name="button">Generar Factura</button>
  </div>
  <div class="row">
    <div class="col-lg-12 my-1 ">
      <!-- Shopping cart table -->
      <div class="table-responsive ">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                  <div class="bg-light rounded-pill px-4 py-1 text-uppercase font-weight-bold links">Guía de carga clientes especiales  <i class="fa fa-road" aria-hidden="true"></i></div>
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
          <div class=" col-md-3 col-sm-12">
            <div class="form-group">
               <label class="links">Desde</label>
                 <flat-pickr
                     v-model="desde"
                     :config="config"
                     class="form-control"
                     placeholder="Selecciona fecha"
                     name="desde">
               </flat-pickr>
             </div>
          </div>
          <div class=" col-md-3 col-sm-12">
            <div class="form-group">
               <label class="links">Hasta</label>
                 <flat-pickr

                     v-model="hasta"
                     :config="config"
                     class="form-control"
                     placeholder="Selecciona fecha"
                     name="hSasta">
               </flat-pickr>
             </div>
          </div>
          <div class=" col-md-6 col-sm-12 my-4 py-2">
            <button type="button" @click="mathc()" class="btn btn-info btn-block" style="margin-top:6px;">Buscar <span class="mbri-search"></span></button>
          </div>
        </div>
        <div class="row ">
          <div class="col-md-4">
            <label class="links">Clientes</label>
            <input list="encodings" v-model="form.cedula"  value="" class="form-control form-control-lg" placeholder="Escriba una cedula o nit">
              <datalist id="encodings">
                  <option v-for="clientes in clientes" v-if="clientes.cliente_especial==='Si'" :value="clientes.cedula_cliente">{{clientes.nit_cliente}}</option>
              </datalist>
          </div>
          <div class="col-md-4">
            <label class="links">Nº referencia cumplidos</label>
            <input list="encodings_d" v-model="numero" value=""  class="form-control form-control-lg" placeholder="Escriba Nº referencia cumplidos">
              <datalist id="encodings_d">
                  <option v-for="cargas in cargas" v-if="cargas.cedula_cliente===form.cedula"  :value="cargas.n_referencia_c">{{cargas.n_referencia_c}}</option>
              </datalist>
          </div>
          <div class="col-md-3 ">
            <label class="links">Anexo legalización</label>
            <input list="encodingss" v-model="anexo" class="form-control form-control-lg" placeholder="Escriba anexo de legalización ">
              <datalist id="encodingss">
                  <option v-for="cargas_t in cargas_t"  :value="cargas_t.numero_anexo_l">{{cargas_t.numero_anexo_l}}</option>
              </datalist>
          </div>
          <div class="col-1 py-5">
            <input type="checkbox" id="check17" v-model="facturar"/>
             <label class="labels" for="check17"></label>
          </div>
        </div>
        <div class="row">
          <div class="col-2 p-2 ml-auto">
              <a v-if="cargas.length>0" :href="'<?=base_url();?>'+url" type="button"  class="btn btn-block btn-primary btn-sm links" >Exportar Excel <span class="mbri-save"></span></a>
          </div>
        </div>
          <table id="example1" class="table ">
            <thead>
            <tr>
              <th class="links">Codigo</th>
              <th class="links">Origen</th>
              <th class="links">Destino</th>
              <th class="links">Cliente</th>
              <th class="links">Estado</th>
              <th class="links">Kilos Cliente</th>
              <th class="links">Flete Total</th>
              <th class="links">Action</th>
            </tr>
            </thead>
              <tr v-for="(cargas,index) in cargas">
                <td style="white-space: nowrap;" class="links">E-{{cargas.codigo}}</td>
                <td style="white-space: nowrap;" class="links">{{cargas.ciudad_origen}}</td>
                <td style="white-space: nowrap;" class="links">{{cargas.ciudad_destino}}</td>
                <td v-if="!cargas.nombre_empresa=='No aplica'" style="white-space: nowrap;" class="links">{{cargas.nombre_empresa}}</td>
                <td v-else style="white-space: nowrap;" class="links">{{cargas.nombre_cliente}}</td>
                <td style="white-space: nowrap;" class="links"><span class="badge badge-primary">{{cargas.estado}}</span></td>
                <td style="white-space: nowrap;" class="links">{{cargas.kilos_cliente}}</td>
                <td style="white-space: nowrap;" class="links">{{cargas.flete_total}} $</td>
                  <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"@click="setear(index);ver=true">Ver</a>
                            <a class="dropdown-item" href="#"@click="loadTrazabilidad(index)">Trazabilidad</a>
                            <a class="dropdown-item" href="#" @click="setear(index);ver=false">Editar</a>
                            <a class="dropdown-item" href="#" @click="setearcerrar(index);ver=false;cerrar=true;">Cerrar envío</a>
                            <a class="dropdown-item" href="#" @click="enviarcarga(index)">Enviar Carga</a>
                            <a class="dropdown-item" href="#" @click="eliminarcarga(index)">Eliminar</a>
                            <a class="dropdown-item" href="#" @click="notificarCliente(index)">Notificar llegada al cliente</a>
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
  <div class="modal fade" id="trazabilidads" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Trazabilidad de carga E-{{cargaa}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 p-1">
                <a v-if="cargas.length>0" :href="'<?=base_url();?>Trazabilidad/excelexport/'+cargaa" type="button"  class="btn btn-block btn-primary btn-sm links" >Exportar Excel <span class="mbri-save"></span></a>
            </div>
            <div class="col-12 p-1">
                <a v-if="cargas.length>0" :href="'<?=base_url();?>Trazabilidad/detalles?ref_pre=E&ref_guia='+cargaa" type="button"  class="btn btn-block btn-success btn-sm links" target="_blank"> Ver Detalles <span class="mbri-save"></span></a>
            </div>
          </div>
          <div v-for="traza in trazabilidades" class="tracking-item">
             <div class="tracking-icon status-intransit">
                <i class="fa fa-location-arrow" aria-hidden="true" style="font-size:15px;color:red;"></i>
             </div>
             <div class="tracking-date">{{traza.fecha_despacho}}<span>{{traza.hora}}</span></div>
             <div class="tracking-content">{{traza.tipo_reporte}} <span>{{traza.ciudad_sat}}</span></div>
             <div v-if="traza.id_proveedor" class="tracking-content">{{traza.nombre_proveedor}} <span>Nº Guia Proveedor: {{traza.guia_proveedor}}</span></div>
          </div>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>


        <!-- Modal agregar   -->
        <div class="modal fade" id="modal-lg" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" @click="resete()" class="close" data-dismiss="modal" aria-label="Close">
                 <span class="mbri-close " ></span>
               </button>
             </div>
             <div class="modal-body row">
               <div class="col-md-4" >
                 <label class="links">Clientes</label>
                 <input list="encodings" v-model="form.cedula" @change="loadsedes" value="" class="form-control form-control-lg" placeholder="Escriba una cedula">
                   <datalist id="encodings">
                       <option v-for="clientes in clientes" v-if="clientes.cliente_especial==='Si'" :value="clientes.cedula_cliente">{{clientes.nombre_cliente}}</option>
                   </datalist>
               </div>
               <div class="col-md-4 my-4 py-2"><button type="button" class="btn btn-light btn-block btn-lg">Buscar <span class="mbri-search"></span></button></div>
               <div class="card col-12 p-3">
                  <h5 >Datos del cliente</h5>
                  <div class="row">
                    <div class="col-md-4">
                      <label class="links">Nombre</label>
                      <div class="form-group">
                        <select v-model="form.cedula" v-validate="'required'" name="tipo_envio" class="form-control" disabled >
                          <option v-for="clientes in clientes" v-if="clientes.cliente_especial==='Si'" :value="clientes.cedula_cliente">{{clientes.nombre_cliente}}</option>
                        </select>
                        <p class="text-danger my-1 small" v-if="(errors.first('tipo_envio'))" >  Este dato es requerido  </p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label class="links">Departamento</label>
                      <div class="form-group">
                        <select v-model="form.cedula" v-validate="'required'" name="tipo_envio" class="form-control" disabled>
                          <option v-for="clientes in clientes" v-if="clientes.cliente_especial==='Si'" :value="clientes.cedula_cliente">{{clientes.departamento}}</option>
                        </select>
                        <p class="text-danger my-1 small" v-if="(errors.first('tipo_envio'))" >  Este dato es requerido  </p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label class="links">Ciudad</label>
                      <div class="form-group">
                        <select v-model="form.cedula" v-validate="'required'" name="tipo_envio" class="form-control" disabled>
                          <option v-for="clientes in clientes" v-if="clientes.cliente_especial==='Si'" :value="clientes.cedula_cliente">{{clientes.ciudad}}</option>
                        </select>
                        <p class="text-danger my-1 small" v-if="(errors.first('tipo_envio'))" >  Este dato es requerido  </p>
                      </div>
                    </div>
                  </div>
               </div>
               <div class="card-body">
                       <form role="form" id="form" @submit.prevent="validateBeforeSubmit">
                         <div class="row">
                           <div class="col-md-6" v-if="!form.id_tarifa">
                             <label class="links">Tipo de transporte</label>
                             <div class="form-group">
                               <select v-model="form.tipo_transporte" @change="form.tipo_envio=''" v-validate="'required'" name="tipo_transporte" class="form-control" :disabled="ver" >
                                <option value=""></option>
                                 <option v-for="transportes in transportes" :value="transportes.tipo_transporte">{{transportes.tipo_transporte}}</option>
                               </select>
                               <p class="text-danger my-1 small" v-if="(errors.first('tipo_transporte'))" >  Este dato es requerido  </p>
                             </div>
                           </div>
                           <div class="col-md-6" v-if="!form.id_tarifa">
                             <label class="links">Tipo de envío</label>
                             <div class="form-group">
                               <select v-model="form.tipo_envio" v-validate="'required'" name="tipo_envio" class="form-control" :disabled="ver" >
                                 <option value=""></option>
                                 <option v-for="tiposenvios in tiposenvios" v-show="tiposenvios.tipo_transporte===form.tipo_transporte" :value="tiposenvios.nombre_tiposenvios">{{tiposenvios.nombre_tiposenvios}}</option>
                               </select>
                               <p class="text-danger my-1 small" v-if="(errors.first('tipo_envio'))" >  Este dato es requerido  </p>
                             </div>
                           </div>
                           <div class="col-sm-12" v-if="!form.id_tarifa">

                               <label class="links">Ruta de envío</label>
                               <input list="tarifas" v-model="form.id_tarifa" @change="tari()"  value="" class="form-control form-control-lg" placeholder="Escriba una ruta">
                                 <datalist id="tarifas">
                                     <option v-for="tarifas in tarifas" v-if="tarifas.tipo_envio===form.tipo_envio && tarifas.tipo_transporte===form.tipo_transporte"  :value="tarifas.id">De {{tarifas.ciudad_origen}} a {{tarifas.ciudad_destino}} {{tarifas.itinerarios}}</option>
                                 </datalist>

                           </div>


                         <div class="card col-12 p-3 " v-if="form.id_tarifa">
                          <h4 class="card-title">Tarifa Acorde</h4>
                           <div class="card-body row sp">
                             <div class="col-sm-3">
                                <div class="form-group links">
                                  <label>Depto. origen</label>
                                 <select v-model="form.id_tarifa" @change="tari()" v-validate="'required'" name="ciudad_destino" class="form-control" disabled >
                                   <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.departamento_origen}}</option>
                                 </select>
                                 <p class="text-danger my-1 small" v-if="(errors.first('ciudad_destino'))" >  Este dato es requerido  </p>
                               </div>
                            </div>
                            <div class="col-sm-3">
                               <div class="form-group links">
                                 <label>Ciudad origen</label>
                                <select v-model="form.id_tarifa" @change="tari()" v-validate="'required'" name="ciudad_destino" class="form-control" disabled >
                                  <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.ciudad_origen}}</option>
                                </select>
                                <p class="text-danger my-1 small" v-if="(errors.first('ciudad_destino'))" >  Este dato es requerido  </p>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="form-group links">
                                <label>Depto. destino</label>
                               <select v-model="form.id_tarifa" @change="tari()" v-validate="'required'" name="ciudad_destino" class="form-control" disabled >
                                 <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.departamento_destino}}</option>
                               </select>
                               <p class="text-danger my-1 small" v-if="(errors.first('ciudad_destino'))" >  Este dato es requerido  </p>
                             </div>
                          </div>
                          <div class="col-sm-3">
                             <div class="form-group links">
                               <label>Ciudad destino</label>
                              <select v-model="form.id_tarifa" @change="tari()" v-validate="'required'" name="ciudad_destino" class="form-control" disabled >
                                <option v-for="tarifas in tarifas" :value="tarifas.id">{{tarifas.ciudad_destino}}</option>
                              </select>
                              <p class="text-danger my-1 small" v-if="(errors.first('ciudad_destino'))" >  Este dato es requerido  </p>
                            </div>
                         </div>
                         <div class="col-sm-3">
                            <div class="form-group links">
                              <label>Itinerarios</label>
                             <select v-model="form.id_tarifa" @change="tari()" v-validate="'required'" name="ciudad_destino" class="form-control" disabled >
                               <option v-for="tarifas in tarifas" :value="tarifas.id">{{tarifas.itinerarios}}</option>
                             </select>
                             <p class="text-danger my-1 small" v-if="(errors.first('ciudad_destino'))" >  Este dato es requerido  </p>
                           </div>
                        </div>
                         <div class="col-sm-3">
                            <div class="form-group links">
                              <label>Tipo de transporte</label>
                             <select v-model="form.id_tarifa" @change="tari()" v-validate="'required'" name="ciudad_destino" class="form-control" disabled >
                               <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.tipo_transporte}}</option>
                             </select>
                             <p class="text-danger my-1 small" v-if="(errors.first('ciudad_destino'))" >  Este dato es requerido  </p>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group links">
                             <label>Tipo de envío</label>
                            <select v-model="form.id_tarifa" @change="tari()" v-validate="'required'" name="ciudad_destino" class="form-control" disabled >
                              <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.tipo_envio}}</option>
                            </select>
                            <p class="text-danger my-1 small" v-if="(errors.first('ciudad_destino'))" >  Este dato es requerido  </p>
                          </div>
                       </div>
                       <div class="col-sm-3">
                          <div class="form-group links">
                            <label>Tarifa</label>
                           <select v-model="form.id_tarifa" @change="tari()" v-validate="'required'" name="ciudad_destino" class="form-control" disabled >
                             <option v-for="tarifas in tarifas"  :value="tarifas.id">{{tarifas.precio}}</option>
                           </select>
                           <p class="text-danger my-1 small" v-if="(errors.first('ciudad_destino'))" >  Este dato es requerido  </p>
                         </div>
                      </div>
                             <a href="#" @click="form.departamento_origen='Amazonas';form.ciudad_destino='';form.departamento_destino='';form.ciudad_destino='';form.tipo_transporte='';form.tipo_envio='';form.id_tarifa=''" class="card-link">Cambiar Ruta</a>
                           </div>
                         </div>
                         <div class="col-md-3">
                           <label class="links">Identificación Carga Cliente</label>
                           <div class="form-group">
                             <input v-model="form.id_carga_cliente" v-validate="'required'" name="id_carga_cliente" class="form-control" :disabled="ver||editMode" >
                             <p class="text-danger my-1 small" v-if="(errors.first('id_carga_cliente'))" >  Este dato es requerido  </p>
                           </div>
                         </div>
                         <div class="col-md-3">
                           <label class="links">Tipo de carga</label>
                           <div class="form-group">
                             <select v-model="form.tipo_carga" v-validate="'required'" name="tipo_envio" class="form-control" :disabled="ver" >
                               <option value=""></option>
                               <option v-for="tipocarga in tipocarga" v-if="tipocarga.estado==='Activo'" :value="tipocarga.nombre_tipocarga">{{tipocarga.nombre_tipocarga}}</option>
                             </select>
                             <p class="text-danger my-1 small" v-if="(errors.first('tipo_envio'))" >  Este dato es requerido  </p>
                           </div>
                         </div>
                         <div class="col-md-3">
                           <label class="links">Cantidad</label>
                           <div class="form-group">
                             <input v-model="form.cantidad" @change="fletetotal()"  v-validate="'required'" name="cantidad" class="form-control" :disabled="ver" >
                             <p class="text-danger my-1 small" v-if="(errors.first('cantidad'))" >  Este dato es requerido  </p>
                           </div>
                         </div>
                         <div class="col-md-3">
                           <label class="links">KILOS TVG</label>
                           <div class="form-group">
                             <input v-model="form.kilos_tvg" v-validate="'required'" name="kilos_tvg" class="form-control" :disabled="ver" >
                             <p class="text-danger my-1 small" v-if="(errors.first('kilos_tvg'))" >  Este dato es requerido  </p>
                           </div>
                         </div>
                         <div class="col-md-3">
                           <label class="links">Kilos Cliente</label>
                           <div class="form-group">
                             <input v-model="form.kilos_cliente" @change="fletetotal()" v-validate="'required'" name="kilos_cliente" class="form-control" :disabled="ver" >
                             <p class="text-danger my-1 small" v-if="(errors.first('kilos_cliente'))" >  Este dato es requerido  </p>
                           </div>
                         </div>
                         <div class="col-md-3">
                           <label class="links">Flete Fijo</label>
                           <div class="form-group">
                             <input v-model="form.flete_fijo" @change="fletetotal()"  v-validate="'required'" name="flete_fijo" class="form-control" :disabled="ver" >
                             <p class="text-danger my-1 small" v-if="(errors.first('flete_fijo'))" >  Este dato es requerido  </p>
                           </div>
                         </div>
                         <div class="col-md-3">
                           <label class="links">Flete Total</label>
                           <div class="form-group">
                             <input v-model="form.flete_total" v-validate="'required'" name="flete_total" class="form-control" disabled>
                             <p class="text-danger my-1 small" v-if="(errors.first('flete_total'))" >  Este dato es requerido  </p>
                           </div>
                         </div>
                         <div class="col-md-3">
                           <label class="links">Sede Cliente</label>
                           <div class="form-group">
                             <select v-model="form.sede_cliente" v-validate="'required'" name="tipo_envio" class="form-control" :disabled="ver" >
                               <option v-for="sedes in sedes" :value="sedes.id">{{sedes.nombre_sede}}</option>
                             </select>
                             <p class="text-danger my-1 small" v-if="(errors.first('tipo_envio'))" >  Este dato es requerido  </p>
                           </div>
                         </div>
                         <div class="col-md-3">
                           <label class="links">Referencia Cumplidos</label>
                           <div class="form-group">
                             <input v-model="form.n_referencia_c" v-validate="'required'" name="n_referencia_c" class="form-control" :disabled="ver||form.estado==='Creada'" >
                             <p class="text-danger my-1 small" v-if="(errors.first('n_referencia_c'))" >  Este dato es requerido  </p>
                           </div>
                         </div>
                         <div class=" col-md-3 col-sm-12">
                           <div class="form-group">
                              <label class="links">Fecha entrega cumplidos</label>
                                <flat-pickr
                                    v-model="form.f_entrega_c"
                                    :config="config"
                                    class="form-control"
                                    placeholder="Selecciona fecha"
                                    name="numero_anexo_l"
                                    :disabled="ver||form.estado==='Creada'">
                              </flat-pickr>
                              <p class="text-danger my-1 small" v-if="(errors.first('numero_anexo_l'))" >  Este dato es requerido  </p>
                            </div>
                         </div>
                         <div class="col-md-6">
                           <label class="links">Número anexo legalización</label>
                           <div class="form-group">
                             <input v-model="form.numero_anexo_l" v-validate="'required'" name="numero_anexo_l" class="form-control" :disabled="ver||form.estado==='Creada'" >
                             <p class="text-danger my-1 small" v-if="(errors.first('numero_anexo_l'))" >  Este dato es requerido  </p>
                           </div>
                         </div>

                            </div>
                           <button v-if="editMode===false"  class="button is-primary links btn btn-light float-right my-3" type="submit">Guardar</button>
                           <button v-if="editMode===true && !ver && !cerrar"  class="button is-primary btn btn-light links float-right my-3" type="submit">Editar</button>
                           <button v-if="editMode===true && !ver && cerrar"  class="button is-primary btn btn-light links float-right my-3" type="submit">Cerrar envio</button>
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
    Vue.component('flat-pickr', VueFlatpickr);
     axios.defaults.baseURL = '<?PHP echo base_url(); ?>';
     Vue.use(VeeValidate ,{locale: 'vi'});
     new Vue({
       el: '#app',
       data: {
         url:"",
         config: {
            wrap: true,
            enableTime: false,
            dateFormat: 'yy-m-d',
            locale: flatpickr.l10ns.es
          },
         cargaa:"",
         departamento:0,
         ver:false,
         cart:[],
         permisos:[],
         factura:[],
         cargas:[],
         legalizaciones:[],
         tiposenvios:[],
         transportes:[],
         tipocarga:[],
         proveedores:[],
         cargas_t:[],
         guias:[],
         trazabilidades:[],
         tarifas:[],
         imagenes:[],
         clientes:[],
         userFiles:[],
         sedes:[],
         editMode:false,
         id_instancia:'',
         form:{
             'id':'',
             'dep':0,
             'departamento_destino':'',
             'ciudad_destino':'',
             'dep_dos':0,
             'departamento_origen':'Amazonas',
             'ciudad_origen':'',
             'id_carga_cliente':'',
             'f_recogida':'',
             'f_ingreso':'',
             'cedula_cliente':'',
             'tipo_transporte':'',
             'tipo_envio':'',
             'precio':'',
             'estado':'Creada',
             'id_carga_cliente':'',
             'tipo_carga':'',
             'cantidad':'',
             'kilos_tvg':'',
             'kilos_cliente':'',
             'flete_fijo':'',
             'flete_total':'',
             'fecha_despacho':'',
             'proveedor':'',
             'n_guia_proveedor':'',
             'fecha_en_destino':'',
             'sede_cliente':'',
             'fecha_conectividad':'',
             'n_referencia_c':'',
             'f_entrega_c':'',
             'numero_anexo_l':'',
             'numero_factura':'',
             'fecha_factura':'',
             'id_tarifa':'',
         },
        colombia:[
          {
          "id":0,
          "departamento":"Amazonas",
          "ciudades":[
            "Leticia",
            "Puerto Nari\u00f1o"
          ]
          },
          {
          "id":1,
          "departamento":"Antioquia",
          "ciudades":[
            "Abejorral",
            "Abriaqu\u00ed",
            "Alejandr\u00eda",
            "Amag\u00e1",
            "Amalfi",
            "Andes",
            "Angel\u00f3polis",
            "Angostura",
            "Anor\u00ed",
            "Anz\u00e1",
            "Apartad\u00f3",
            "Arboletes",
            "Argelia",
            "Armenia",
            "Barbosa",
            "Bello",
            "Belmira",
            "Betania",
            "Betulia",
            "Brice\u00f1o",
            "Buritic\u00e1",
            "C\u00e1ceres",
            "Caicedo",
            "Caldas",
            "Campamento",
            "Ca\u00f1asgordas",
            "Caracol\u00ed",
            "Caramanta",
            "Carepa",
            "Carolina del Pr\u00edncipe",
            "Caucasia",
            "Chigorod\u00f3",
            "Cisneros",
            "Ciudad Bol\u00edvar",
            "Cocorn\u00e1",
            "Concepci\u00f3n",
            "Concordia",
            "Copacabana",
            "Dabeiba",
            "Donmat\u00edas",
            "Eb\u00e9jico",
            "El Bagre",
            "El Carmen de Viboral",
            "El Pe\u00f1ol",
            "El Retiro",
            "El Santuario",
            "Entrerr\u00edos",
            "Envigado",
            "Fredonia",
            "Frontino",
            "Giraldo",
            "Girardota",
            "G\u00f3mez Plata",
            "Granada",
            "Guadalupe",
            "Guarne",
            "Guatap\u00e9",
            "Heliconia",
            "Hispania",
            "Itag\u00fc\u00ed",
            "Ituango",
            "Jard\u00edn",
            "Jeric\u00f3",
            "La Ceja",
            "La Estrella",
            "La Pintada",
            "La Uni\u00f3n",
            "Liborina",
            "Maceo",
            "Marinilla",
            "Medell\u00edn",
            "Montebello",
            "Murind\u00f3",
            "Mutat\u00e1",
            "Nari\u00f1o",
            "Nech\u00ed",
            "Necocl\u00ed",
            "Olaya",
            "Peque",
            "Pueblorrico",
            "Puerto Berr\u00edo",
            "Puerto Nare",
            "Puerto Triunfo",
            "Remedios",
            "Rionegro",
            "Sabanalarga",
            "Sabaneta",
            "Salgar",
            "San Andr\u00e9s de Cuerquia",
            "San Carlos",
            "San Francisco",
            "San Jer\u00f3nimo",
            "San Jos\u00e9 de la Monta\u00f1a",
            "San Juan de Urab\u00e1",
            "San Luis",
            "San Pedro de Urab\u00e1",
            "San Pedro de los Milagros",
            "San Rafael",
            "San Roque",
            "San Vicente",
            "Santa B\u00e1rbara",
            "Santa Fe de Antioquia",
            "Santa Rosa de Osos",
            "Santo Domingo",
            "Segovia",
            "Sons\u00f3n",
            "Sopetr\u00e1n",
            "T\u00e1mesis",
            "Taraz\u00e1",
            "Tarso",
            "Titirib\u00ed",
            "Toledo",
            "Turbo",
            "Uramita",
            "Urrao",
            "Valdivia",
            "Valpara\u00edso",
            "Vegach\u00ed",
            "Venecia",
            "Vig\u00eda del Fuerte",
            "Yal\u00ed",
            "Yarumal",
            "Yolomb\u00f3",
            "Yond\u00f3",
            "Zaragoza"
          ]
          },
          {
          "id":2,
          "departamento":"Arauca",
          "ciudades":[
            "Arauca",
            "Arauquita",
            "Cravo Norte",
            "Fortul",
            "Puerto Rond\u00f3n",
            "Saravena",
            "Tame"
          ]
          },
          {
          "id":3,
          "departamento":"Atl\u00e1ntico",
          "ciudades":[
            "Baranoa",
            "Barranquilla",
            "Campo de la Cruz",
            "Candelaria",
            "Galapa",
            "Juan de Acosta",
            "Luruaco",
            "Malambo",
            "Manat\u00ed",
            "Palmar de Varela",
            "Pioj\u00f3",
            "Polonuevo",
            "Ponedera",
            "Puerto Colombia",
            "Repel\u00f3n",
            "Sabanagrande",
            "Sabanalarga",
            "Santa Luc\u00eda",
            "Santo Tom\u00e1s",
            "Soledad",
            "Su\u00e1n",
            "Tubar\u00e1",
            "Usiacur\u00ed"
          ]
          },
          {
          "id":4,
          "departamento":"Bol\u00edvar",
          "ciudades":[
            "Ach\u00ed",
            "Altos del Rosario",
            "Arenal",
            "Arjona",
            "Arroyohondo",
            "Barranco de Loba",
            "Brazuelo de Papayal",
            "Calamar",
            "Cantagallo",
            "Cartagena de Indias",
            "Cicuco",
            "Clemencia",
            "C\u00f3rdoba",
            "El Carmen de Bol\u00edvar",
            "El Guamo",
            "El Pe\u00f1\u00f3n",
            "Hatillo de Loba",
            "Magangu\u00e9",
            "Mahates",
            "Margarita",
            "Mar\u00eda la Baja",
            "Momp\u00f3s",
            "Montecristo",
            "Morales",
            "Noros\u00ed",
            "Pinillos",
            "Regidor",
            "R\u00edo Viejo",
            "San Crist\u00f3bal",
            "San Estanislao",
            "San Fernando",
            "San Jacinto del Cauca",
            "San Jacinto",
            "San Juan Nepomuceno",
            "San Mart\u00edn de Loba",
            "San Pablo",
            "Santa Catalina",
            "Santa Rosa",
            "Santa Rosa del Sur",
            "Simit\u00ed",
            "Soplaviento",
            "Talaigua Nuevo",
            "Tiquisio",
            "Turbaco",
            "Turban\u00e1",
            "Villanueva",
            "Zambrano"
          ]
          },
          {
          "id":5,
          "departamento":"Boyac\u00e1",
          "ciudades":[
            "Almeida",
            "Aquitania",
            "Arcabuco",
            "Bel\u00e9n",
            "Berbeo",
            "Bet\u00e9itiva",
            "Boavita",
            "Boyac\u00e1",
            "Brice\u00f1o",
            "Buenavista",
            "Busbanz\u00e1",
            "Caldas",
            "Campohermoso",
            "Cerinza",
            "Chinavita",
            "Chiquinquir\u00e1",
            "Ch\u00edquiza",
            "Chiscas",
            "Chita",
            "Chitaraque",
            "Chivat\u00e1",
            "Chivor",
            "Ci\u00e9nega",
            "C\u00f3mbita",
            "Coper",
            "Corrales",
            "Covarach\u00eda",
            "Cubar\u00e1",
            "Cucaita",
            "Cu\u00edtiva",
            "Duitama",
            "El Cocuy",
            "El Espino",
            "Firavitoba",
            "Floresta",
            "Gachantiv\u00e1",
            "G\u00e1meza",
            "Garagoa",
            "Guacamayas",
            "Guateque",
            "Guayat\u00e1",
            "G\u00fcic\u00e1n",
            "Iza",
            "Jenesano",
            "Jeric\u00f3",
            "La Capilla",
            "La Uvita",
            "La Victoria",
            "Labranzagrande",
            "Macanal",
            "Marip\u00ed",
            "Miraflores",
            "Mongua",
            "Mongu\u00ed",
            "Moniquir\u00e1",
            "Motavita",
            "Muzo",
            "Nobsa",
            "Nuevo Col\u00f3n",
            "Oicat\u00e1",
            "Otanche",
            "Pachavita",
            "P\u00e1ez",
            "Paipa",
            "Pajarito",
            "Panqueba",
            "Pauna",
            "Paya",
            "Paz del R\u00edo",
            "Pesca",
            "Pisba",
            "Puerto Boyac\u00e1",
            "Qu\u00edpama",
            "Ramiriqu\u00ed",
            "R\u00e1quira",
            "Rond\u00f3n",
            "Saboy\u00e1",
            "S\u00e1chica",
            "Samac\u00e1",
            "San Eduardo",
            "San Jos\u00e9 de Pare",
            "San Luis de Gaceno",
            "San Mateo",
            "San Miguel de Sema",
            "San Pablo de Borbur",
            "Santa Mar\u00eda",
            "Santa Rosa de Viterbo",
            "Santa Sof\u00eda",
            "Santana",
            "Sativanorte",
            "Sativasur",
            "Siachoque",
            "Soat\u00e1",
            "Socha",
            "Socot\u00e1",
            "Sogamoso",
            "Somondoco",
            "Sora",
            "Sorac\u00e1",
            "Sotaquir\u00e1",
            "Susac\u00f3n",
            "Sutamarch\u00e1n",
            "Sutatenza",
            "Tasco",
            "Tenza",
            "Tiban\u00e1",
            "Tibasosa",
            "Tinjac\u00e1",
            "Tipacoque",
            "Toca",
            "Tog\u00fc\u00ed",
            "T\u00f3paga",
            "Tota",
            "Tunja",
            "Tunungu\u00e1",
            "Turmequ\u00e9",
            "Tuta",
            "Tutaz\u00e1",
            "\u00dambita",
            "Ventaquemada",
            "Villa de Leyva",
            "Viracach\u00e1",
            "Zetaquira"
          ]
          },
          {
          "id":6,
          "departamento":"Caldas",
          "ciudades":[
            "Aguadas",
            "Anserma",
            "Aranzazu",
            "Belalc\u00e1zar",
            "Chinchin\u00e1",
            "Filadelfia",
            "La Dorada",
            "La Merced",
            "Manizales",
            "Manzanares",
            "Marmato",
            "Marquetalia",
            "Marulanda",
            "Neira",
            "Norcasia",
            "P\u00e1cora",
            "Palestina",
            "Pensilvania",
            "Riosucio",
            "Risaralda",
            "Salamina",
            "Saman\u00e1",
            "San Jos\u00e9",
            "Sup\u00eda",
            "Victoria",
            "Villamar\u00eda",
            "Viterbo"
          ]
          },
          {
          "id":7,
          "departamento":"Caquet\u00e1",
          "ciudades":[
            "Albania",
            "Bel\u00e9n de los Andaqu\u00edes",
            "Cartagena del Chair\u00e1",
            "Curillo",
            "El Doncello",
            "El Paujil",
            "Florencia",
            "La Monta\u00f1ita",
            "Mil\u00e1n",
            "Morelia",
            "Puerto Rico",
            "San Jos\u00e9 del Fragua",
            "San Vicente del Cagu\u00e1n",
            "Solano",
            "Solita",
            "Valpara\u00edso"
          ]
          },
          {
          "id":8,
          "departamento":"Casanare",
          "ciudades":[
            "Aguazul",
            "Ch\u00e1meza",
            "Hato Corozal",
            "La Salina",
            "Man\u00ed",
            "Monterrey",
            "Nunch\u00eda",
            "Orocu\u00e9",
            "Paz de Ariporo",
            "Pore",
            "Recetor",
            "Sabanalarga",
            "S\u00e1cama",
            "San Luis de Palenque",
            "T\u00e1mara",
            "Tauramena",
            "Trinidad",
            "Villanueva",
            "Yopal"
          ]
          },
          {
          "id":9,
          "departamento":"Cauca",
          "ciudades":[
            "Almaguer",
            "Argelia",
            "Balboa",
            "Bol\u00edvar",
            "Buenos Aires",
            "Cajib\u00edo",
            "Caldono",
            "Caloto",
            "Corinto",
            "El Tambo",
            "Florencia",
            "Guachen\u00e9",
            "Guap\u00ed",
            "Inz\u00e1",
            "Jambal\u00f3",
            "La Sierra",
            "La Vega",
            "L\u00f3pez de Micay",
            "Mercaderes",
            "Miranda",
            "Morales",
            "Padilla",
            "P\u00e1ez",
            "Pat\u00eda",
            "Piamonte",
            "Piendam\u00f3",
            "Popay\u00e1n",
            "Puerto Tejada",
            "Purac\u00e9",
            "Rosas",
            "San Sebasti\u00e1n",
            "Santa Rosa",
            "Santander de Quilichao",
            "Silvia",
            "Sotar\u00e1",
            "Su\u00e1rez",
            "Sucre",
            "Timb\u00edo",
            "Timbiqu\u00ed",
            "Torib\u00edo",
            "Totor\u00f3",
            "Villa Rica"
          ]
          },
          {
          "id":10,
          "departamento":"Cesar",
          "ciudades":[
            "Aguachica",
            "Agust\u00edn Codazzi",
            "Astrea",
            "Becerril",
            "Bosconia",
            "Chimichagua",
            "Chiriguan\u00e1",
            "Curuman\u00ed",
            "El Copey",
            "El Paso",
            "Gamarra",
            "Gonz\u00e1lez",
            "La Gloria (Cesar)",
            "La Jagua de Ibirico",
            "La Paz",
            "Manaure Balc\u00f3n del Cesar",
            "Pailitas",
            "Pelaya",
            "Pueblo Bello",
            "R\u00edo de Oro",
            "San Alberto",
            "San Diego",
            "San Mart\u00edn",
            "Tamalameque",
            "Valledupar"
          ]
          },
          {
          "id":11,
          "departamento":"Choc\u00f3",
          "ciudades":[
            "Acand\u00ed",
            "Alto Baud\u00f3",
            "Bagad\u00f3",
            "Bah\u00eda Solano",
            "Bajo Baud\u00f3",
            "Bojay\u00e1",
            "Cant\u00f3n de San Pablo",
            "C\u00e9rtegui",
            "Condoto",
            "El Atrato",
            "El Carmen de Atrato",
            "El Carmen del Dari\u00e9n",
            "Istmina",
            "Jurad\u00f3",
            "Litoral de San Juan",
            "Llor\u00f3",
            "Medio Atrato",
            "Medio Baud\u00f3",
            "Medio San Juan",
            "N\u00f3vita",
            "Nuqu\u00ed",
            "Quibd\u00f3",
            "R\u00edo Ir\u00f3",
            "R\u00edo Quito",
            "Riosucio",
            "San Jos\u00e9 del Palmar",
            "Sip\u00ed",
            "Tad\u00f3",
            "Uni\u00f3n Panamericana",
            "Ungu\u00eda"
          ]
          },
          {
          "id":12,
          "departamento":"Cundinamarca",
          "ciudades":[
            "Agua de Dios",
            "Alb\u00e1n",
            "Anapoima",
            "Anolaima",
            "Apulo",
            "Arbel\u00e1ez",
            "Beltr\u00e1n",
            "Bituima",
            "Bogot\u00e1",
            "Bojac\u00e1",
            "Cabrera",
            "Cachipay",
            "Cajic\u00e1",
            "Caparrap\u00ed",
            "C\u00e1queza",
            "Carmen de Carupa",
            "Chaguan\u00ed",
            "Ch\u00eda",
            "Chipaque",
            "Choach\u00ed",
            "Chocont\u00e1",
            "Cogua",
            "Cota",
            "Cucunub\u00e1",
            "El Colegio",
            "El Pe\u00f1\u00f3n",
            "El Rosal",
            "Facatativ\u00e1",
            "F\u00f3meque",
            "Fosca",
            "Funza",
            "F\u00faquene",
            "Fusagasug\u00e1",
            "Gachal\u00e1",
            "Gachancip\u00e1",
            "Gachet\u00e1",
            "Gama",
            "Girardot",
            "Granada",
            "Guachet\u00e1",
            "Guaduas",
            "Guasca",
            "Guataqu\u00ed",
            "Guatavita",
            "Guayabal de S\u00edquima",
            "Guayabetal",
            "Guti\u00e9rrez",
            "Jerusal\u00e9n",
            "Jun\u00edn",
            "La Calera",
            "La Mesa",
            "La Palma",
            "La Pe\u00f1a",
            "La Vega",
            "Lenguazaque",
            "Machet\u00e1",
            "Madrid",
            "Manta",
            "Medina",
            "Mosquera",
            "Nari\u00f1o",
            "Nemoc\u00f3n",
            "Nilo",
            "Nimaima",
            "Nocaima",
            "Pacho",
            "Paime",
            "Pandi",
            "Paratebueno",
            "Pasca",
            "Puerto Salgar",
            "Pul\u00ed",
            "Quebradanegra",
            "Quetame",
            "Quipile",
            "Ricaurte",
            "San Antonio del Tequendama",
            "San Bernardo",
            "San Cayetano",
            "San Francisco",
            "San Juan de Rioseco",
            "Sasaima",
            "Sesquil\u00e9",
            "Sibat\u00e9",
            "Silvania",
            "Simijaca",
            "Soacha",
            "Sop\u00f3",
            "Subachoque",
            "Suesca",
            "Supat\u00e1",
            "Susa",
            "Sutatausa",
            "Tabio",
            "Tausa",
            "Tena",
            "Tenjo",
            "Tibacuy",
            "Tibirita",
            "Tocaima",
            "Tocancip\u00e1",
            "Topaip\u00ed",
            "Ubal\u00e1",
            "Ubaque",
            "Ubat\u00e9",
            "Une",
            "\u00datica",
            "Venecia",
            "Vergara",
            "Vian\u00ed",
            "Villag\u00f3mez",
            "Villapinz\u00f3n",
            "Villeta",
            "Viot\u00e1",
            "Yacop\u00ed",
            "Zipac\u00f3n",
            "Zipaquir\u00e1"
          ]
          },
          {
          "id":13,
          "departamento":"C\u00f3rdoba",
          "ciudades":[
            "Ayapel",
            "Buenavista",
            "Canalete",
            "Ceret\u00e9",
            "Chim\u00e1",
            "Chin\u00fa",
            "Ci\u00e9naga de Oro",
            "Cotorra",
            "La Apartada",
            "Lorica",
            "Los C\u00f3rdobas",
            "Momil",
            "Montel\u00edbano",
            "Monter\u00eda",
            "Mo\u00f1itos",
            "Planeta Rica",
            "Pueblo Nuevo",
            "Puerto Escondido",
            "Puerto Libertador",
            "Pur\u00edsima",
            "Sahag\u00fan",
            "San Andr\u00e9s de Sotavento",
            "San Antero",
            "San Bernardo del Viento",
            "San Carlos",
            "San Jos\u00e9 de Ur\u00e9",
            "San Pelayo",
            "Tierralta",
            "Tuch\u00edn",
            "Valencia"
          ]
          },
          {
          "id":14,
          "departamento":"Guain\u00eda",
          "ciudades":[
            "In\u00edrida"
          ]
          },
          {
          "id":15,
          "departamento":"Guaviare",
          "ciudades":[
            "Calamar",
            "El Retorno",
            "Miraflores",
            "San Jos\u00e9 del Guaviare"
          ]
          },
          {
          "id":16,
          "departamento":"Huila",
          "ciudades":[
            "Acevedo",
            "Agrado",
            "Aipe",
            "Algeciras",
            "Altamira",
            "Baraya",
            "Campoalegre",
            "Colombia",
            "El Pital",
            "El\u00edas",
            "Garz\u00f3n",
            "Gigante",
            "Guadalupe",
            "Hobo",
            "\u00cdquira",
            "Isnos",
            "La Argentina",
            "La Plata",
            "N\u00e1taga",
            "Neiva",
            "Oporapa",
            "Paicol",
            "Palermo",
            "Palestina",
            "Pitalito",
            "Rivera",
            "Saladoblanco",
            "San Agust\u00edn",
            "Santa Mar\u00eda",
            "Suaza",
            "Tarqui",
            "Tello",
            "Teruel",
            "Tesalia",
            "Timan\u00e1",
            "Villavieja",
            "Yaguar\u00e1"
          ]
          },
          {
          "id":17,
          "departamento":"La Guajira",
          "ciudades":[
            "Albania",
            "Barrancas",
            "Dibulla",
            "Distracci\u00f3n",
            "El Molino",
            "Fonseca",
            "Hatonuevo",
            "La Jagua del Pilar",
            "Maicao",
            "Manaure",
            "Riohacha",
            "San Juan del Cesar",
            "Uribia",
            "Urumita",
            "Villanueva"
          ]
          },
          {
          "id":18,
          "departamento":"Magdalena",
          "ciudades":[
            "Algarrobo",
            "Aracataca",
            "Ariguan\u00ed",
            "Cerro de San Antonio",
            "Chibolo",
            "Chibolo",
            "Ci\u00e9naga",
            "Concordia",
            "El Banco",
            "El Pi\u00f1\u00f3n",
            "El Ret\u00e9n",
            "Fundaci\u00f3n",
            "Guamal",
            "Nueva Granada",
            "Pedraza",
            "Piji\u00f1o del Carmen",
            "Pivijay",
            "Plato",
            "Pueblo Viejo",
            "Remolino",
            "Sabanas de San \u00c1ngel",
            "Salamina",
            "San Sebasti\u00e1n de Buenavista",
            "San Zen\u00f3n",
            "Santa Ana",
            "Santa B\u00e1rbara de Pinto",
            "Santa Marta",
            "Sitionuevo",
            "Tenerife",
            "Zapay\u00e1n",
            "Zona Bananera"
          ]
          },
          {
          "id":19,
          "departamento":"Meta",
          "ciudades":[
            "Acac\u00edas",
            "Barranca de Up\u00eda",
            "Cabuyaro",
            "Castilla la Nueva",
            "Cubarral",
            "Cumaral",
            "El Calvario",
            "El Castillo",
            "El Dorado",
            "Fuente de Oro",
            "Granada",
            "Guamal",
            "La Macarena",
            "La Uribe",
            "Lejan\u00edas",
            "Mapirip\u00e1n",
            "Mesetas",
            "Puerto Concordia",
            "Puerto Gait\u00e1n",
            "Puerto Lleras",
            "Puerto L\u00f3pez",
            "Puerto Rico",
            "Restrepo",
            "San Carlos de Guaroa",
            "San Juan de Arama",
            "San Juanito",
            "San Mart\u00edn",
            "Villavicencio",
            "Vista Hermosa"
          ]
          },
          {
          "id":20,
          "departamento":"Nari\u00f1o",
          "ciudades":[
            "Aldana",
            "Ancuy\u00e1",
            "Arboleda",
            "Barbacoas",
            "Bel\u00e9n",
            "Buesaco",
            "Chachag\u00fc\u00ed",
            "Col\u00f3n",
            "Consac\u00e1",
            "Contadero",
            "C\u00f3rdoba",
            "Cuaspud",
            "Cumbal",
            "Cumbitara",
            "El Charco",
            "El Pe\u00f1ol",
            "El Rosario",
            "El Tabl\u00f3n",
            "El Tambo",
            "Francisco Pizarro",
            "Funes",
            "Guachucal",
            "Guaitarilla",
            "Gualmat\u00e1n",
            "Iles",
            "Imu\u00e9s",
            "Ipiales",
            "La Cruz",
            "La Florida",
            "La Llanada",
            "La Tola",
            "La Uni\u00f3n",
            "Leiva",
            "Linares",
            "Los Andes",
            "Mag\u00fc\u00ed Pay\u00e1n",
            "Mallama",
            "Mosquera",
            "Nari\u00f1o",
            "Olaya Herrera",
            "Ospina",
            "Pasto",
            "Policarpa",
            "Potos\u00ed",
            "Providencia",
            "Puerres",
            "Pupiales",
            "Ricaurte",
            "Roberto Pay\u00e1n",
            "Samaniego",
            "San Bernardo",
            "San Jos\u00e9 de Alb\u00e1n",
            "San Lorenzo",
            "San Pablo",
            "San Pedro de Cartago",
            "Sandon\u00e1",
            "Santa B\u00e1rbara",
            "Santacruz",
            "Sapuyes",
            "Taminango",
            "Tangua",
            "Tumaco",
            "T\u00faquerres",
            "Yacuanquer"
          ]
          },
          {
          "id":21,
          "departamento":"Norte de Santander",
          "ciudades":[
            "\u00c1brego",
            "Arboledas",
            "Bochalema",
            "Bucarasica",
            "C\u00e1chira",
            "C\u00e1cota",
            "Chin\u00e1cota",
            "Chitag\u00e1",
            "Convenci\u00f3n",
            "C\u00facuta",
            "Cucutilla",
            "Duran\u00eda",
            "El Carmen",
            "El Tarra",
            "El Zulia",
            "Gramalote",
            "Hacar\u00ed",
            "Herr\u00e1n",
            "La Esperanza",
            "La Playa de Bel\u00e9n",
            "Labateca",
            "Los Patios",
            "Lourdes",
            "Mutiscua",
            "Oca\u00f1a",
            "Pamplona",
            "Pamplonita",
            "Puerto Santander",
            "Ragonvalia",
            "Salazar de Las Palmas",
            "San Calixto",
            "San Cayetano",
            "Santiago",
            "Santo Domingo de Silos",
            "Sardinata",
            "Teorama",
            "Tib\u00fa",
            "Toledo",
            "Villa Caro",
            "Villa del Rosario"
          ]
          },
          {
          "id":22,
          "departamento":"Putumayo",
          "ciudades":[
            "Col\u00f3n",
            "Mocoa",
            "Orito",
            "Puerto As\u00eds",
            "Puerto Caicedo",
            "Puerto Guzm\u00e1n",
            "Puerto Legu\u00edzamo",
            "San Francisco",
            "San Miguel",
            "Santiago",
            "Sibundoy",
            "Valle del Guamuez",
            "Villagarz\u00f3n"
          ]
          },
          {
          "id":23,
          "departamento":"Quind\u00edo",
          "ciudades":[
            "Armenia",
            "Buenavista",
            "Calarc\u00e1",
            "Circasia",
            "C\u00f3rdoba",
            "Filandia",
            "G\u00e9nova",
            "La Tebaida",
            "Montenegro",
            "Pijao",
            "Quimbaya",
            "Salento"
          ]
          },
          {
          "id":24,
          "departamento":"Risaralda",
          "ciudades":[
            "Ap\u00eda",
            "Balboa",
            "Bel\u00e9n de Umbr\u00eda",
            "Dosquebradas",
            "Gu\u00e1tica",
            "La Celia",
            "La Virginia",
            "Marsella",
            "Mistrat\u00f3",
            "Pereira",
            "Pueblo Rico",
            "Quinch\u00eda",
            "Santa Rosa de Cabal",
            "Santuario"
          ]
          },
          {
          "id":25,
          "departamento":"San Andr\u00e9s y Providencia",
          "ciudades":[
            "Providencia y Santa Catalina Islas",
            "San Andr\u00e9s"
          ]
          },
          {
          "id":26,
          "departamento":"Santander",
          "ciudades":[
            "Aguada",
            "Albania",
            "Aratoca",
            "Barbosa",
            "Barichara",
            "Barrancabermeja",
            "Betulia",
            "Bol\u00edvar",
            "Bucaramanga",
            "Cabrera",
            "California",
            "Capitanejo",
            "Carcas\u00ed",
            "Cepit\u00e1",
            "Cerrito",
            "Charal\u00e1",
            "Charta",
            "Chima",
            "Chipat\u00e1",
            "Cimitarra",
            "Concepci\u00f3n",
            "Confines",
            "Contrataci\u00f3n",
            "Coromoro",
            "Curit\u00ed",
            "El Carmen de Chucur\u00ed",
            "El Guacamayo",
            "El Pe\u00f1\u00f3n",
            "El Play\u00f3n",
            "El Socorro",
            "Encino",
            "Enciso",
            "Flori\u00e1n",
            "Floridablanca",
            "Gal\u00e1n",
            "G\u00e1mbita",
            "Gir\u00f3n",
            "Guaca",
            "Guadalupe",
            "Guapot\u00e1",
            "Guavat\u00e1",
            "G\u00fcepsa",
            "Hato",
            "Jes\u00fas Mar\u00eda",
            "Jord\u00e1n",
            "La Belleza",
            "La Paz",
            "Land\u00e1zuri",
            "Lebrija",
            "Los Santos",
            "Macaravita",
            "M\u00e1laga",
            "Matanza",
            "Mogotes",
            "Molagavita",
            "Ocamonte",
            "Oiba",
            "Onzaga",
            "Palmar",
            "Palmas del Socorro",
            "P\u00e1ramo",
            "Piedecuesta",
            "Pinchote",
            "Puente Nacional",
            "Puerto Parra",
            "Puerto Wilches",
            "Rionegro",
            "Sabana de Torres",
            "San Andr\u00e9s",
            "San Benito",
            "San Gil",
            "San Joaqu\u00edn",
            "San Jos\u00e9 de Miranda",
            "San Miguel",
            "San Vicente de Chucur\u00ed",
            "Santa B\u00e1rbara",
            "Santa Helena del Op\u00f3n",
            "Simacota",
            "Suaita",
            "Sucre",
            "Surat\u00e1",
            "Tona",
            "Valle de San Jos\u00e9",
            "V\u00e9lez",
            "Vetas",
            "Villanueva",
            "Zapatoca"
          ]
          },
          {
          "id":27,
          "departamento":"Sucre",
          "ciudades":[
            "Buenavista",
            "Caimito",
            "Chal\u00e1n",
            "Colos\u00f3",
            "Corozal",
            "Cove\u00f1as",
            "El Roble",
            "Galeras",
            "Guaranda",
            "La Uni\u00f3n",
            "Los Palmitos",
            "Majagual",
            "Morroa",
            "Ovejas",
            "Sampu\u00e9s",
            "San Antonio de Palmito",
            "San Benito Abad",
            "San Juan de Betulia",
            "San Marcos",
            "San Onofre",
            "San Pedro",
            "Sinc\u00e9",
            "Sincelejo",
            "Sucre",
            "Tol\u00fa",
            "Tol\u00fa Viejo"
          ]
          },
          {
          "id":28,
          "departamento":"Tolima",
          "ciudades":[
            "Alpujarra",
            "Alvarado",
            "Ambalema",
            "Anzo\u00e1tegui",
            "Armero",
            "Ataco",
            "Cajamarca",
            "Carmen de Apical\u00e1",
            "Casabianca",
            "Chaparral",
            "Coello",
            "Coyaima",
            "Cunday",
            "Dolores",
            "El Espinal",
            "Fal\u00e1n",
            "Flandes",
            "Fresno",
            "Guamo",
            "Herveo",
            "Honda",
            "Ibagu\u00e9",
            "Icononzo",
            "L\u00e9rida",
            "L\u00edbano",
            "Mariquita",
            "Melgar",
            "Murillo",
            "Natagaima",
            "Ortega",
            "Palocabildo",
            "Piedras",
            "Planadas",
            "Prado",
            "Purificaci\u00f3n",
            "Rioblanco",
            "Roncesvalles",
            "Rovira",
            "Salda\u00f1a",
            "San Antonio",
            "San Luis",
            "Santa Isabel",
            "Su\u00e1rez",
            "Valle de San Juan",
            "Venadillo",
            "Villahermosa",
            "Villarrica"
          ]
          },
          {
          "id":29,
          "departamento":"Valle del Cauca",
          "ciudades":[
            "Alcal\u00e1",
            "Andaluc\u00eda",
            "Ansermanuevo",
            "Argelia",
            "Bol\u00edvar",
            "Buenaventura",
            "Buga",
            "Bugalagrande",
            "Caicedonia",
            "Cali",
            "Calima",
            "Candelaria",
            "Cartago",
            "Dagua",
            "El \u00c1guila",
            "El Cairo",
            "El Cerrito",
            "El Dovio",
            "Florida",
            "Ginebra",
            "Guacar\u00ed",
            "Jamund\u00ed",
            "La Cumbre",
            "La Uni\u00f3n",
            "La Victoria",
            "Obando",
            "Palmira",
            "Pradera",
            "Restrepo",
            "Riofr\u00edo",
            "Roldanillo",
            "San Pedro",
            "Sevilla",
            "Toro",
            "Trujillo",
            "Tulu\u00e1",
            "Ulloa",
            "Versalles",
            "Vijes",
            "Yotoco",
            "Yumbo",
            "Zarzal"
          ]
          },
          {
          "id":30,
          "departamento":"Vaup\u00e9s",
          "ciudades":[
            "Carur\u00fa",
            "Mit\u00fa",
            "Taraira"
          ]
          },
          {
          "id":31,
          "departamento":"Vichada",
          "ciudades":[
            "Cumaribo",
            "La Primavera",
            "Puerto Carre\u00f1o",
            "Santa Rosal\u00eda"
          ]
          }
          ],
          desde:'',
          cerrar:false,
          hasta:'',
          numero:'',
          exceluno:false,
          exceldos:false,
          exceltres:false,
          excelcuatro:false,
          excelcinco:false,
          anexo:'',
          facturar:false,
       },
       methods: {
           crearFactura(){
             Swal({
               title: '¿Estás seguro?',
               text: "",
               type: 'warning',
               showCancelButton: true,
               confirmButtonText: '¡Si! ¡Generar!',
               cancelButtonText: '¡No! ¡cancelar!',
               reverseButtons: true
             }).then((result) => {
               if (result.value) {
                localStorage.setItem("factura", JSON.stringify(this.factura));
                window.setTimeout(function () {
                     location.href = "<?=base_url();?>Facturas";
                 }, 500);
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
                alerta(){
                  if (this.cargas.length<1) {
                    Swal.fire({
                      type: 'warning',
                      title: '',
                      text: 'No existen cocidencias'
                    });
                  }
                },
                async  mathc(){
                  if (this.anexo && !this.facturar) {
                    this.loadcargas_anexos();
                    console.log("anexo");
                    return;
                  }else if (this.anexo && this.facturar) {
                    this.loadAnexos();
                    this.loadcargas_anexos();
                    console.log("anexo fac");
                    return;
                  } else  if (this.desde && this.hasta && !this.form.cedula && !this.numero) {
                      console.log("solo fecha");
                      let data = new FormData();
                       data.append('desde',this.desde);
                       data.append('hasta',this.hasta);
                       await axios.post('index.php/ClientesEspeciales/getcarga_tiempo/',data)
                       .then(({data: {cargas}}) => {
                         this.cargas = cargas
                       });
                        $("#example1").DataTable();
                        this.url='ClientesEspeciales/excelexport_tiempo/'+this.desde+'/'+this.hasta;
                    }else if(!this.desde && !this.hasta && this.form.cedula && !this.numero && !this.ciudad) {
                      console.log("solo cedula");
                      let data = new FormData();
                       data.append('cedula',this.form.cedula);
                       await axios.post('index.php/ClientesEspeciales/getcarga_cedula/',data)
                       .then(({data: {cargas}}) => {
                         this.cargas = cargas
                       });
                        $("#example1").DataTable();
                        this.url='ClientesEspeciales/excelexport_cedula/'+this.form.cedula;
                    }else if(!this.desde && !this.hasta && !this.form.cedula && this.numero ) {
                        console.log("solo estado");
                        let data = new FormData();
                         data.append('numero',this.numero);
                         await axios.post('index.php/ClientesEspeciales/getcarga_numero/',data)
                         .then(({data: {cargas}}) => {
                           this.cargas = cargas
                         });
                          $("#example1").DataTable();
                          this.url='ClientesEspeciales/excelexport_numero/'+this.numero;
                    }else if(this.desde && this.hasta && this.form.cedula && !this.numero) {
                        console.log("Fecha y cedula");
                        let data = new FormData();
                        data.append('desde',this.desde);
                        data.append('hasta',this.hasta);
                         data.append('cedula',this.form.cedula);
                         await axios.post('index.php/ClientesEspeciales/getcarga_cedula_tiempo/',data)
                         .then(({data: {cargas}}) => {
                           this.cargas = cargas
                         });
                          $("#example1").DataTable();
                      this.url='ClientesEspeciales/excelexport_cedula_tiempo/'+this.desde+'/'+this.hasta+'/'+this.form.cedula;
                    }else if(this.desde && this.hasta && !this.form.cedula && this.numero) {
                        console.log("Fecha y numero")
                        let data = new FormData();
                        data.append('desde',this.desde);
                        data.append('hasta',this.hasta);
                         data.append('numero',this.numero);
                         await axios.post('index.php/ClientesEspeciales/getcarga_fecha_numero/',data)
                         .then(({data: {cargas}}) => {
                           this.cargas = cargas
                         });
                          $("#example1").DataTable();
                          this.url='ClientesEspeciales/excelexport_fecha_numero/'+this.desde+'/'+this.hasta+'/'+this.numero;
                    }else if(!this.desde && !this.hasta && this.form.cedula && this.numero ) {
                        console.log("cedula y numero");
                        let data = new FormData();
                        data.append('cedula',this.form.cedula);
                        data.append('numero',this.numero);
                         await axios.post('index.php/ClientesEspeciales/getcarga_cedula_numero/',data)
                         .then(({data: {cargas}}) => {
                           this.cargas = cargas
                         });
                          $("#example1").DataTable();
                          this.url='ClientesEspeciales/excelexport_cedula_numero/'+this.form.cedula+'/'+this.numero;

                    }else if(this.desde && this.hasta && this.form.cedula && this.numero) {
                        console.log("fecha y cedula y numero");
                        let data = new FormData();
                        data.append('desde',this.desde);
                        data.append('hasta',this.hasta);
                        data.append('cedula',this.form.cedula);
                        data.append('numero',this.numero);
                         await axios.post('index.php/ClientesEspeciales/getcarga_fecha_cedula_numero/',data)
                         .then(({data: {cargas}}) => {
                           this.cargas = cargas
                         });
                          $("#example1").DataTable();
                      this.url='ClientesEspeciales/excelexport_fecha_cedula_numero/'+this.desde+'/'+this.hasta+'/'+this.form.cedula+'/'+this.numero;
                    }else if(this.desde && this.hasta && !this.cedula && this.estado && this.ciudad) {
                        console.log("fecha y estado y ciudad");
                        let data = new FormData();
                        data.append('desde',this.desde);
                        data.append('hasta',this.hasta);
                        data.append('estado',this.estado);
                        data.append('ciudad',this.ciudad);
                         await axios.post('index.php/Guias/get_fecha_estado_ciudad/',data)
                         .then(({data: {guias}}) => {
                           this.guias = guias
                         });
                          $("#example1").DataTable();
                      this.url='Guias/excelexport_fecha_estado_ciudad/'+this.desde+'/'+this.hasta+'/'+this.estado+'/'+this.ciudad;
                    }else if(this.desde && this.hasta && this.cedula && this.estado && this.ciudad) {
                        console.log("fecha y estado y cedula y ciudad")
                        let data = new FormData();
                        data.append('desde',this.desde);
                        data.append('hasta',this.hasta);
                        data.append('estado',this.estado);
                        data.append('ciudad',this.ciudad);
                        data.append('cedula',this.cedula);
                         await axios.post('index.php/Guias/get_fecha_estado_ciudad_cedula/',data)
                         .then(({data: {guias}}) => {
                           this.guias = guias
                         });
                          $("#example1").DataTable();
                          this.url='Guias/excelexport_fecha_estado_ciudad_cedula/'+this.desde+'/'+this.hasta+'/'+this.estado+'/'+this.ciudad+'/'+this.cedula;
                    }else if(this.desde && this.hasta && this.cedula && this.estado && !this.ciudad) {
                        console.log("fecha y estado y cedula");
                        let data = new FormData();
                        data.append('desde',this.desde);
                        data.append('hasta',this.hasta);
                        data.append('estado',this.estado);
                        data.append('cedula',this.cedula);
                         await axios.post('index.php/Guias/get_fecha_estado_cedula/',data)
                         .then(({data: {guias}}) => {
                           this.guias = guias
                         });
                          $("#example1").DataTable();
                          this.url='Guias/excelexport_fecha_estado_cedula/'+this.desde+'/'+this.hasta+'/'+this.estado+'/'+this.cedula;
                    }
                  },
                 fletetotal(){
                  this.form.flete_total=parseInt(this.form.cantidad)*parseInt(this.form.flete_fijo)*parseInt(this.form.kilos_cliente);
                 },
                 tari(){
                   for (var i = 0; i < this.tarifas.length; i++) {
                     if (this.tarifas[i].id===this.form.id_tarifa) {
                        this.form.ciudad_destino=this.tarifas[i].ciudad_destino;
                        this.form.precio=this.tarifas[i].precio;
                        console.log(this.tarifas[i].ciudad_destino);
                     }
                   }
                 },
         async    uploadFoto() {
              this.file_data = $('#imagenFoto').prop('files')[0];
              this.form_data = new FormData();
              this.form_data.append('file', this.file_data);
              this.form_data.append('id_carga_cliente', this.form.id_carga_cliente);
          await      axios.post('index.php/ClientesEspeciales/detail_foto', this.form_data)
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
                    axios.post('index.php/ClientesEspeciales/eliminarImagen',data)
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
             async    loadFotos(){
             let data = new FormData();
              data.append('id_carga_cliente',this.form.id_carga_cliente);
        await      axios.post('index.php/ClientesEspeciales/getimagenes/',data)
              .then(({data: {imagenes}}) => {
                    this.imagenes = imagenes;
                  });
              },
           depp(){
             this.form.departamento_origen=this.colombia[this.form.dep].departamento;
             console.log(this.form.dep);
           },
           depp_dos(){
             this.form.departamento_destino=this.colombia[this.form.dep_dos].departamento;
             console.log(this.form.dep_dos);
           },
           resete(){
                const dateTime = Date.now();
                this.id_instancia = Math.floor(dateTime / 1000);
               this.$validator.reset();
               document.getElementById("form").reset();
               this.editMode=false;
               this.form.nombre_cargo='';
               this.form.id='';
               this.form.nombre_cargo='';
               this.form.f_recogida='';
               this.form.f_ingreso='';
               this.form.cedula='';
               this.form.id_carga_cliente='';
               this.form.tipo_carga='';
               this.form.cantidad='';
               this.form.kilos_tvg='';
               this.form.kilos_cliente='';
               this.form.flete_fijo='';
               this.form.flete_total='';
               this.form.fecha_despacho='';
               this.form.proveedor='';
               this.form.n_guia_proveedor='';
               this.form.fecha_en_destino='';
               this.form.sede_cliente='';
               this.form.fecha_conectividad='';
               this.form.n_referencia_c='';
               this.form.f_entrega_c='';
               this.form.numero_anexo_l='';
               this.form.numero_factura='';
               this.form.fecha_factura='';
               this.form.id_tarifa='';
               this.imagenes='';
               $('#modal-lg').modal('show');
           },
           validateBeforeSubmit() {
                   this.$validator.validateAll().then((result) => {
                     if (result) {
                       let data = new FormData();
                       data.append('service_form',JSON.stringify(this.form));
                     if(!this.editMode){
                       axios.post('index.php/ClientesEspeciales/insertar',data)
                       .then(response => {
                         if(response.data.status == 200){
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Agregado con exito'
                           })
                           $('#modal-lg').modal('hide');
                           this.loadcargas();
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
                       axios.post('index.php/ClientesEspeciales/editar',data)
                       .then(response => {
                         if(response.data.status == 200)
                         {
                           $('#modal-lg').modal('hide');
                           this.loadcargas_cedulas();
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Editado correctamente'
                          });
                          this.editMode=false;
                          this.cerrar=false;
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
                 eliminarcarga(index){
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
                       data.append('id',this.cargas[index].codigo);
                         axios.post('index.php/ClientesEspeciales/eliminar',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Eliminado!',
                               'Ha sido eliminado.',
                               'success'
                             ).then(response => {
                                   this.loadcargas_cedulas();
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                               this.loadcargas();
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
                 enviarcarga(index){
                   Swal({
                     title: '¿Estás seguro?',
                     text: "",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonText: '¡Si! ',
                     cancelButtonText: '¡No! ',
                     reverseButtons: true
                   }).then((result) => {
                     if (result.value) {
                       let data = new FormData();
                       data.append('id',this.cargas[index].codigo);
                       data.append('correo_cliente',this.cargas[index].correo_cliente);
                         axios.post('index.php/ClientesEspeciales/enviarcarga',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Carga enviada!',
                               '',
                               'success'

                             ).then(response => {
                               this.mathc();
                               localStorage.setItem('id_guia', this.cargas[index].codigo);
                               localStorage.setItem('prefijo', "E");
                               window.setTimeout(function () {
                                     location.href = "<?=base_url();?>Trazabilidad";
                                 }, 100);
                             })
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {
                                  this.mathc();
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
                 notificarCliente(index){
                   Swal({
                     title: '¿Desea notificar al cliente la llegada?',
                     text: "",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonText: '¡Si! ',
                     cancelButtonText: '¡No! ',
                     reverseButtons: true
                   }).then((result) => {
                     if (result.value) {
                       let data = new FormData();
                       data.append('id',this.cargas[index].codigo);
                       data.append('correo_cliente',this.cargas[index].correo_cliente);
                         axios.post('index.php/ClientesEspeciales/notificarcliente',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Notificación enviada!',
                               '',
                               'success'
                             )
                           } else {
                             Swal(
                               'Error',
                               'Ha ocurrido un error.',
                               'warning'
                             ).then(response => {

                             })
                           }
                         })
                     } else if (
                       result.dismiss === Swal.DismissReason.cancel
                     ) {
                       Swal(
                         'Cancelado',
                         '',
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
                       this.factura.splice(index, 1);
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
                 async loadTrazabilidad(index){
                   this.cargaa=this.cargas[index].codigo;
                   let data = new FormData();
                    data.append('prefijo',"E");
                    data.append('id_guia',this.cargas[index].codigo);
                    await axios.post('index.php/Trazabilidad/gettrazabilidad/',data)
                    .then(({data: {trazabilidad}}) => {
                      this.trazabilidades = trazabilidad
                    });
                    if (this.trazabilidades.length>0) {
                      $('#trazabilidads').modal('show');
                    }
                 },
                 setear(index){
                   this.form.codigo=this.cargas[index].codigo,
                   this.form.nombre_cargo=this.cargas[index].nombre_cargo,
                   this.form.f_recogida=this.cargas[index].f_recogida,
                   this.form.f_ingreso=this.cargas[index].f_ingreso,
                   this.form.cedula=this.cargas[index].cedula_cliente,
                   this.form.id_carga_cliente=this.cargas[index].id_carga_cliente,
                   this.form.tipo_carga=this.cargas[index].tipo_carga,
                   this.form.cantidad=this.cargas[index].cantidad,
                   this.form.kilos_tvg=this.cargas[index].kilos_tvg,
                   this.form.kilos_cliente=this.cargas[index].kilos_cliente,
                   this.form.flete_fijo=this.cargas[index].flete_fijo,
                   this.form.flete_total=this.cargas[index].flete_total,
                   this.form.fecha_despacho=this.cargas[index].fecha_despacho,
                   this.form.proveedor=this.cargas[index].proveedor,
                   this.form.n_guia_proveedor=this.cargas[index].n_guia_proveedor,
                   this.form.fecha_en_destino=this.cargas[index].fecha_en_destino,
                   this.form.sede_cliente=this.cargas[index].sede_cliente,
                   this.form.fecha_conectividad=this.cargas[index].fecha_conectividad,
                   this.form.n_referencia_c=this.cargas[index].n_referencia_c,
                   this.form.f_entrega_c=this.cargas[index].f_entrega_c,
                   this.form.numero_anexo_l=this.cargas[index].numero_anexo_l,
                   this.form.numero_factura=this.cargas[index].numero_factura,
                   this.form.fecha_factura=this.cargas[index].fecha_factura,
                   this.form.id_tarifa=this.cargas[index].id_tarifa,
                   this.loadsedes();
                   this.loadFotos();
                   this.tari();
                   $('#modal-lg').modal('show');
                   this.editMode=true
                 },
                 setearcerrar(index){
                   this.form.codigo=this.cargas[index].codigo,
                   this.form.nombre_cargo=this.cargas[index].nombre_cargo,
                   this.form.f_recogida=this.cargas[index].f_recogida,
                   this.form.f_ingreso=this.cargas[index].f_ingreso,
                   this.form.cedula=this.cargas[index].cedula_cliente,
                   this.form.id_carga_cliente=this.cargas[index].id_carga_cliente,
                   this.form.tipo_carga=this.cargas[index].tipo_carga,
                   this.form.cantidad=this.cargas[index].cantidad,
                   this.form.kilos_tvg=this.cargas[index].kilos_tvg,
                   this.form.kilos_cliente=this.cargas[index].kilos_cliente,
                   this.form.flete_fijo=this.cargas[index].flete_fijo,
                   this.form.flete_total=this.cargas[index].flete_total,
                   this.form.fecha_despacho=this.cargas[index].fecha_despacho,
                   this.form.proveedor=this.cargas[index].proveedor,
                   this.form.n_guia_proveedor=this.cargas[index].n_guia_proveedor,
                   this.form.fecha_en_destino=this.cargas[index].fecha_en_destino,
                   this.form.sede_cliente=this.cargas[index].sede_cliente,
                   this.form.fecha_conectividad=this.cargas[index].fecha_conectividad,
                   this.form.n_referencia_c=this.cargas[index].n_referencia_c,
                   this.form.f_entrega_c="",
                   this.form.numero_anexo_l=this.cargas[index].numero_anexo_l,
                   this.form.numero_factura=this.cargas[index].numero_factura,
                   this.form.fecha_factura=this.cargas[index].fecha_factura,
                   this.form.id_tarifa=this.cargas[index].id_tarifa,
                   this.form.estado="Cumplida",
                   this.loadsedes();
                   this.loadFotos();
                   this.tari();
                   $('#modal-lg').modal('show');
                   this.editMode=true
                 },
                 ver(index){
                   this.form.id=this.cargas[index].id,
                   this.form.nombre_cargo=this.cargas[index].nombre_cargo,
                   this.form.f_recogida=this.cargas[index].f_recogida,
                   this.form.f_ingreso=this.cargas[index].f_ingreso,
                   this.form.cedula=this.cargas[index].cedula_cliente,
                   this.form.id_carga_cliente=this.cargas[index].id_carga_cliente,
                   this.form.tipo_carga=this.cargas[index].tipo_carga,
                   this.form.cantidad=this.cargas[index].cantidad,
                   this.form.kilos_tvg=this.cargas[index].kilos_tvg,
                   this.form.kilos_cliente=this.cargas[index].kilos_cliente,
                   this.form.flete_fijo=this.cargas[index].flete_fijo,
                   this.form.flete_total=this.cargas[index].flete_total,
                   this.form.fecha_despacho=this.cargas[index].fecha_despacho,
                   this.form.proveedor=this.cargas[index].proveedor,
                   this.form.n_guia_proveedor=this.cargas[index].n_guia_proveedor,
                   this.form.fecha_en_destino=this.cargas[index].fecha_en_destino,
                   this.form.sede_cliente=this.cargas[index].sede_cliente,
                   this.form.fecha_conectividad=this.cargas[index].fecha_conectividad,
                   this.form.n_referencia_c=this.cargas[index].n_referencia_c,
                   this.form.f_entrega_c=this.cargas[index].f_entrega_c,
                   this.form.numero_anexo_l=this.cargas[index].numero_anexo_l,
                   this.form.numero_factura=this.cargas[index].numero_factura,
                   this.form.fecha_factura=this.cargas[index].fecha_factura,
                   this.form.id_tarifa=this.cargas[index].id_tarifa,
                   this.loadsedes();
                   this.loadFotos();
                   this.tari();
                   $('#myModal').modal('show');
                   this.editMode=false
                 },
             async loadcargas() {
                await   axios.get('index.php/ClientesEspeciales/getcarga/')
                   .then(({data: {cargas}}) => {
                     this.cargas_t = cargas
                   });

                 },
                 async loadcargas_cedulas(){
                         let data = new FormData();
                          data.append('cedula',this.form.cedula);
                          await axios.post('index.php/ClientesEspeciales/getcarga_cedula/',data)
                          .then(({data: {cargas}}) => {
                            this.cargas = cargas
                          });
                           this.alerta();

                       },
             async loadcargas_anexos(){
                     let data = new FormData();
                      data.append('anexo',this.anexo);
                      await axios.post('index.php/ClientesEspeciales/get_anexo/',data)
                      .then(({data: {cargas}}) => {
                        this.cargas = cargas
                      });
                  this.alerta();
                   },
        /////anexos///////////
            async loadAnexos(){
                 let data = new FormData();
                  data.append('anexo',this.anexo);
                  await axios.post('index.php/ClientesEspeciales/get_anexo/',data)
                  .then(({data: {cargas}}) => {
                    this.legalizaciones = cargas
                  });

                  if (this.legalizaciones.length>0) {
                    if (this.factura.length<1) {
                      for (var i = 0; i < this.legalizaciones.length; i++) {
                        this.factura.push({
                           origen:this.legalizaciones[i].ciudad_origen,
                           destino:this.legalizaciones[i].ciudad_destino,
                           tipo_transporte:this.legalizaciones[i].tipo_transporte,
                           total:this.legalizaciones[i].flete_total,
                           n_guia:'E-'+this.legalizaciones[i].codigo,
                           codigo:this.legalizaciones[i].codigo,
                           nombre_cliente:this.legalizaciones[i].nombre_cliente,
                           nombre_empresa:this.legalizaciones[i].nombre_empresa,
                           nit_cliente:this.legalizaciones[i].nit_cliente,
                           direccion_cliente:this.legalizaciones[i].direccion_cliente,
                           telefono_cliente:this.legalizaciones[i].telefono_cliente,
                           cedula_cliente:this.legalizaciones[i].cedula_cliente,
                           ciudad_cliente:this.legalizaciones[i].ciudad,
                           forma:this.legalizaciones[i].forma,
                           dias:this.legalizaciones[i].dias,
                           numero_anexo_l:this.legalizaciones[i].numero_anexo_l,
                         });
                     }
                   }else{
                     for (var i = 0; i < this.legalizaciones.length; i++) {
                       for (var j = 0; j < this.factura.length; j++) {
                         var contador=0;
                         if (this.legalizaciones[i].codigo===this.factura[j].codigo) {
                           this.legalizaciones.splice(i, 1)
                         }
                       }
                       if (this.legalizaciones.length>0) {
                         this.factura.push({
                           origen:this.legalizaciones[i].ciudad_origen,
                           destino:this.legalizaciones[i].ciudad_destino,
                           tipo_transporte:this.legalizaciones[i].tipo_transporte,
                           total:this.legalizaciones[i].flete_total,
                           n_guia:'E-'+this.legalizaciones[i].codigo,
                           codigo:this.legalizaciones[i].codigo,
                           nombre_cliente:this.legalizaciones[i].nombre_cliente,
                           nombre_empresa:this.legalizaciones[i].nombre_empresa,
                           nit_cliente:this.legalizaciones[i].nit_cliente,
                           direccion_cliente:this.legalizaciones[i].direccion_cliente,
                           telefono_cliente:this.legalizaciones[i].telefono_cliente,
                           cedula_cliente:this.legalizaciones[i].cedula_cliente,
                           ciudad_cliente:this.legalizaciones[i].ciudad,
                           forma:this.legalizaciones[i].forma,
                           dias:this.legalizaciones[i].dias,
                          numero_anexo_l:this.legalizaciones[i].numero_anexo_l,
                          });
                       }
                   }


                    }
                  }

               },

               /////////anexos////////////
                       async loadcargas_cedulas_tiempo(){
                               let data = new FormData();
                                data.append('cedula',this.form.cedula);
                                data.append('desde',this.desde);
                                data.append('hasta',this.hasta);
                                await axios.post('index.php/ClientesEspeciales/getcarga_cedula_tiempo/',data)
                                .then(({data: {cargas}}) => {
                                  this.cargas = cargas
                                });
                              this.alerta();
                             },
             async loadcargas_cedulas_nc(){
                     let data = new FormData();
                      data.append('cedula',this.form.cedula);
                      data.append('n_referencia_c',this.numero);
                      await axios.post('index.php/ClientesEspeciales/getcarga_cedula_numero/',data)
                      .then(({data: {cargas}}) => {
                        this.cargas = cargas
                      });
                       this.alerta();
                   },
                   async loadcargas_cedulas_nc_tiempo(){
                           let data = new FormData();
                            data.append('cedula',this.form.cedula);
                            data.append('n_referencia_c',this.numero);
                            data.append('desde',this.desde);
                            data.append('hasta',this.hasta);
                            await axios.post('index.php/ClientesEspeciales/getcarga_cedula_numero_tiempo/',data)
                            .then(({data: {cargas}}) => {
                              this.cargas = cargas
                            });
                             this.alerta();
                         },
                   async loadcargas_cedulas_nc(){
                           let data = new FormData();
                            data.append('cedula',this.form.cedula);
                            data.append('n_referencia_c',this.numero);
                            await axios.post('index.php/ClientesEspeciales/getcarga_cedula_numero/',data)
                            .then(({data: {cargas}}) => {
                              this.cargas = cargas
                            });
                             this.alerta();
                         },
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
            async loadproveedores() {
               await   axios.get('index.php/Proveedores/getproveedores/')
                  .then(({data: {proveedores}}) => {
                    this.proveedores = proveedores
                  });
                },
                async loadCart() {

                    await  axios.get('index.php/User/get_profile/')
                     .then(({data: {profiles}}) => {
                        this.cart = profiles;
                     });
                     this.permisos=JSON.parse(this.cart[0].permisos);
                   },
       },

       created(){
            this.loadcargas();
            this.loadproveedores();
            this.loadtarifas();
            this.loadtipocarga();
            this.loadtiposenvios();
            this.loadtransportes();
            this.loadclientes();
            this.loadCart();
       },
   })
 </script>


 <script>
 //Make the DIV element draggagle:
 dragElement(document.getElementById("mydiv"));

 function dragElement(elmnt) {
   var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
   if (document.getElementById(elmnt.id + "header")) {
     /* if present, the header is where you move the DIV from:*/
     document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
   } else {
     /* otherwise, move the DIV from anywhere inside the DIV:*/
     elmnt.onmousedown = dragMouseDown;
   }

   function dragMouseDown(e) {
     e = e || window.event;
     e.preventDefault();
     // get the mouse cursor position at startup:
     pos3 = e.clientX;
     pos4 = e.clientY;
     document.onmouseup = closeDragElement;
     // call a function whenever the cursor moves:
     document.onmousemove = elementDrag;
   }

   function elementDrag(e) {
     e = e || window.event;
     e.preventDefault();
     // calculate the new cursor position:
     pos1 = pos3 - e.clientX;
     pos2 = pos4 - e.clientY;
     pos3 = e.clientX;
     pos4 = e.clientY;
     // set the element's new position:
     elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
     elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
   }

   function closeDragElement() {
     /* stop moving when mouse button is released:*/
     document.onmouseup = null;
     document.onmousemove = null;
   }
 }
 </script>
