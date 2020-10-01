<div id="app" class="container">
  <div id="mydiv" v-show="factura.length>0">
    <div id="mydivheader">ANEXOS PARA FACTURAR</div>
    <table  class="table ">
      <thead>
      <tr>
        <th class="links"> Guia de carga</th>
        <th class="links">Valor</th>
        <th class="links">Action</th>
      </tr>
      <tr v-for="(factura,index) in factura">
        <td>N-{{factura.id}}</td>
        <td>$ {{factura.total}}</td>
        <td><button class="btn btn-danger" @click="eliminarItem(index)"><span class="mbri-trash"></span></button></td>
      </tr>
    </table>
    <button v-if="factura.length>0"  @click="crearFactura()" type="button" class="btn-primary btn-block" name="button">Generar Factura</button>
  </div>

  <div class="row">
    <div class="col-lg-12 my-3 ">
      <!-- Shopping cart table -->
      <div class="table-responsive ">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                  <div class="bg-light rounded-pill px-4 py-1 text-uppercase font-weight-bold links">guias <i class="fa fa-road" aria-hidden="true"></i></div>
              </th>
            </tr>
            <tr>
              <th scope="col" colspan="5" class="border-0 bg-white  text-center">
                <button type="button" @click="resete();ver=false" class="btn btn-block btn-light btn-sm links" >Agregar <span class="mbri-plus"></span></button>
              </th>
            </tr>
          </thead>
        </table>
        <div class="row" >
          <div class="col-md-2">
            <a href="#">
              <div class="card-counter  p-2 zoom" style="opacity:0.9;background:#3333FF;">
                <span class=" fa mbri-briefcase text-white" style="font-size:3em;opacity:0.6"></span>
                <span class="count-numbers text-white">{{creada}}</span>
                <span class="count-name links text-white my-2">Creadas</span>
              </div>
            </a>
          </div>
          <div class="col-md-2">
            <a href="#">
              <div class="card-counter muted p-2 zoom" style="opacity:0.9;background:#FFA226;">
                <span class=" fa mbri-help text-white" style="font-size:3em;opacity:0.6"></span>
                <span class="count-numbers text-white">{{enviada}}</span>
                <span class="count-name links text-white">Enviadas</span>
              </div>
            </a>
          </div>
          <div class="col-md-2">
            <a href="#">
              <div class="card-counter success p-2 zoom" style="opacity:0.9">
                <span class=" fa mbri-like" style="font-size:3em;opacity:0.6"></span>
                <span class="count-numbers">{{cumplida}}</span>
                <span class="count-name links">Cumplidas</span>
              </div>
            </a>
          </div>
          <div class="col-md-2">
            <a href="#">
              <div class="card-counter primary p-2 zoom" style="opacity:0.9">
                <span class="mbri-paperclip" style="font-size:3em;opacity:0.6"></span>
                <span class="count-numbers">{{fisico}}</span>
                <span class="count-name links">En fisico</span>
              </div>
            </a>
          </div>
          <div class="col-md-2">
            <a href="#">
              <div class="card-counter info p-2 zoom" style="opacity:0.9">
                <span class="mbri-to-local-drive" style="font-size:3em;opacity:0.6"></span>
                <span class="count-numbers">{{archivadas}}</span>
                <span class="count-name links">Archivadas</span>
              </div>
            </a>
          </div>
          <div class="col-md-2">
            <a href="#">
              <div class="card-counter danger p-2 zoom" style="opacity:0.9">
                <span class=" fa mbri-error" style="font-size:3em;opacity:0.6"></span>
                <span class="count-numbers">{{anulada}}</span>
                <span class="count-name links">Anuldas</span>
              </div>
            </a>
          </div>
        </div>
        <div class="row">
          <div class=" col-md-3 col-sm-12">
            <div class="form-group">
               <label class="links">Dede</label>
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
        <div class="row">
          <div class="col-md-3">
            <label >CLIENTE</label>
            <input list="encodings" v-model="cedula"  @keyup="form.nombre_empresa='';form.direccion_cliente='';form.telefono_cliente='';"   value="" class="form-control " placeholder="Escriba una cedula" :disabled="ver">
              <datalist id="encodings">
                  <option v-for="clientes in clientes"  v-if="clientes.cliente_especial==='No'" :value="clientes.cedula_cliente" :disabled="ver">{{clientes.nombre_cliente}}</option>
              </datalist>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label >Estado</label>
              <select v-model="estado" class="form-control" id="sel1">
                <option value="Creada">Creada</option>
                <option value="Enviada">Enviada</option>
                <option value="Cumplida">Cumplida</option>
                <option value="Creada">En Físico</option>
                <option value="Archivada">Archivada</option>
                <option value="Anulada">Anulada</option>
              </select>
            </div>
          </div>
          <div class="form-group col-md-3">
            <label class="links">Ciudad</label>
             <input type="text" v-model="ciudad"    class="form-control"  >
          </div>
        </div>
        <div class="row">
          <div class="col-2 p-2 ml-auto">
              <a v-if="guias.length>0" :href="'<?=base_url();?>'+url" type="button"  class="btn btn-block btn-primary btn-sm links" >Exportar Excel <span class="mbri-save"></span></a>
          </div>
        </div>

          <table id="example1" class="table ">
            <thead>
            <tr>
              <th class="links">Nº Guía</th>
              <th class="links">Cliente</th>
              <th class="links">ORIGEN</th>
              <th class="links">DESTINO</th>
              <th class="links">ESTADO</th>
              <th class="links">REMITENTE</th>
              <th class="links">DESCARGAR</th>
              <th class="links">Action</th>
            </tr>
            </thead>
              <tr v-for="(guias,index) in guias">
                <td class="links">N-{{guias.id}}</td>
                <td class="links">{{guias.nombre_empresa}}</td>
                <td class="links">{{guias.ciudad_origen}}</td>
                <td class="links">{{guias.ciudad_destino}}</td>
                <td class="links">{{guias.estado}}</td>
                <td class="links"><a :href="'<?=base_url()?>Guias/Guia_to_pdf/'+guias.id"  download>Descargar PDF</a></td>
                <td class="links">{{guias.contacto_remitente}}</td>
                  <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"@click="setear(index);ver=true">Ver</a>
                            <a class="dropdown-item" href="#" @click="setear(index)">Duplicar</a>
                            <a class="dropdown-item" v-show="guias.estado==='En físico'" href="#" @click="addFactura(index)">Agregar a factura</a>
                            <a class="dropdown-item" href="#" @click="anularguias(index)">Anular</a>
                            <a class="dropdown-item"  href="#" @click="enviarguias(index)">Enviar Guía</a>
                            <a class="dropdown-item" v-show="guias.estado==='Enviada'" href="#" @click="setearCumplida(index)">Cimplidas</a>
                            <a class="dropdown-item" href="#" @click="enfisico(index)">En Físico</a>
                            <a class="dropdown-item" href="#" @click="archivada(index)">Archivada</a>
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
  <div class="modal fade" id="cumplidas"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Guías de carga cumplidas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class=" col-md-6 col-sm-12">
            <div class="form-group">
               <label class="links">Fecha de entrega carga en destino</label>
                 <flat-pickr
                     v-model="form.f_cumplida"
                     :config="config"
                     class="form-control"
                     placeholder="Selecciona fecha"
                     name="hSasta">
               </flat-pickr>
             </div>
          </div>
          <div class="card col-12 my-3" v-if="form.cedula">
            <div class="col-sm-12 p-2">
             <div class="form-group">
               <label for="colFormLabelSm" class="links">Documentos Relacionados</label>
                      <div v-if="!ver"  class="col-sm-12">
                        <div class="row ">
                          <div class="col-8">
                            <input type="file"   id="imagenFoto" name="imagenFoto" >
                          </div>
                            <div class="col-4">
                            <button class="btn btn-light links btn-lg" type="button"  @click="uploadFoto()">Subir archivo</button>
                          </div>
                         </div>
                    </div>
              </div>
          </div>
          <div class="row pl-5 pr-5" v-if="form.cedula">
           <table class="table">
             <tr v-for="(img , index) in imagenes">
               <th scope="row"><a :href="'<?=base_url()?>'+img.url" download>{{img.nombre}}</a></th>
               <td v-if="!ver"><a href="#"  class="" @click="eliminarImagen(index)"><span class="mbri-trash"></span></a></td>
             </tr>
           </table>
          </div>
          </div>
          <button type="button" class="btn btn-success btn-block my-2" @click="cumplidasGuias()" name="button">Guardar</button>
        </div>
      </div>
    </div>
  </div>

        <!-- Modal agregar   -->
        <div class="modal fade" id="modal-lg" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title links">Gestión de guias  <i class="fa fa-street-view" aria-hidden="true"></i></h4>
               <button type="button" @click="resete()" class="close" data-dismiss="modal" aria-label="Close">
                 <span class="mbri-close " ></span>
               </button>
             </div>
             <div class="modal-body">
         <!-- Incio de formulario -->
               <div class="row pr-4 pl-4 p-1 d-flex justify-content-between">
                 <div class="col-md-4">
                   <label class="links">CLIENTE</label>
                   <input list="encodings" v-model="form.cedula" v-validate="'required'" @keyup="form.nombre_empresa='';form.direccion_cliente='';form.telefono_cliente='';"   value="" class="form-control form-control-lg" placeholder="Escriba una cedula" :disabled="ver">
                     <datalist id="encodings">
                         <option v-for="clientes in clientes"  v-if="clientes.cliente_especial==='No'" :value="clientes.cedula_cliente" :disabled="ver">{{clientes.nombre_cliente}}</option>
                     </datalist>
                     <p class="text-danger my-1 small" v-if="(errors.first('telefono_cliente'))" >  Este dato es requerido  </p>
                 </div>
                 <div class="col-md-4">
                   <button type="button" class="btn btn-primary btn-lg" @click="buscarCliente()" style="margin-top:37px;">Buscar <span class="mbri-search"></span></button>
                 </div>
                 <div class="col-md-4">
                   <label class="links">PLANILLAS</label>
                   <input list="encodingss" v-model="form.id_planilla" @keyup="loadLiquidacion()"  value="" class="form-control form-control-lg" placeholder="Escriba una cedula" :disabled="!form.cedula">
                     <datalist id="encodingss">
                         <option v-for="liquidaciones in liquidaciones" v-if="liquidaciones.estado==='Generado'" :value="liquidaciones.id">{{liquidaciones.id}}</option>
                     </datalist>
                 </div>
               </div>
              <form role="form" id="form" @submit.prevent="validateBeforeSubmit">
               <div class="row pr-4 pl-4">
                 <div class="form-group col-4">
                   <label class="links">Empresa</label>
                    <input type="text" v-model="form.nombre_empresa" v-validate="'required'" name="nombre_empresa" class="form-control" id="" >
                   <p class="text-danger my-1 small" v-if="(errors.first('nombre_empresa'))" >  Este dato es requerido  </p>
                 </div>
                 <div class="form-group col-4">
                   <label class="links">Dirección empresa</label>
                    <input type="text" v-model="form.direccion_cliente" v-validate="'required'" name="direccion_cliente" class="form-control" id="" >
                   <p class="text-danger my-1 small" v-if="(errors.first('direccion_cliente'))" >  Este dato es requerido  </p>
                 </div>
                 <div class="form-group col-4">
                   <label class="links">Teléfono</label>
                    <input type="text" v-model="form.telefono_cliente" v-validate="'required'" name="telefono_cliente" class="form-control" id="" >
                   <p class="text-danger my-1 small" v-if="(errors.first('telefono_cliente'))" >  Este dato es requerido  </p>
                 </div>
               </div>
                 <div class="card col-12 pl-4 pr-4 border-0" >
                  <h4 class="card-title">Tarifa Acorde</h4>
                   <div class="card-body row sp">
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
                         <select v-model="form.tipo_envio"  name="tipo_envio" class="form-control" :disabled="ver" >
                           <option value=""></option>
                           <option v-for="tiposenvios in tiposenvios" v-show="tiposenvios.tipo_transporte===form.tipo_transporte" :value="tiposenvios.nombre_tiposenvios">{{tiposenvios.nombre_tiposenvios}}</option>
                         </select>
                       </div>
                     </div>
                       <div class="col-sm-12">
                           <label class="links">Origen-Destino</label>
                           <input list="tarifas" v-model="form.id_tarifa" @change="tari()" v-validate="'required'" value="" name="orige" class="form-control form-control-lg" placeholder="Escriba una ruta">
                             <datalist id="tarifas">
                                 <option v-for="tarifas in tarifas" v-if="tarifas.tipo_envio===form.tipo_envio && tarifas.tipo_transporte===form.tipo_transporte"  :value="tarifas.id">De {{tarifas.ciudad_origen}} a {{tarifas.ciudad_destino}} Tiempo:{{tarifas.tiempos}}</option>
                             </datalist>
                             <p class="text-danger my-1 small" v-if="(errors.first('orige'))" >  Este dato es requerido  </p>
                       </div>
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
              <div class="form-group col-3" v-if="form.precio">
                <label class="links">Precio negociado</label>
                 <input type="number" v-model="form.precioNegociado" v-validate="'required'" name="precioNegociado" class="form-control"  disabled>
                <p class="text-danger my-1 small" v-if="(errors.first('precioNegociado'))" >  Este dato es requerido  </p>
              </div>
            </div>
            <div class="row pr-4 pl-4 p-1 d-flex ">
              <div class="col-md-4">
                <label class="links">Remitente</label>
                <input list="encoding" v-model="form.cedula_remitente" v-validate="'required'"  @keyup="form.contacto_remitente='';form.direccion_remitente='';form.telefono_remitente='';"   value="" class="form-control form-control-lg" placeholder="Escriba una cedula" :disabled="ver">
                  <datalist id="encoding">
                      <option v-for="remitentes in remitentes"  :value="remitentes.cedula_remitente" :disabled="ver">{{remitentes.contacto_remitente}}</option>
                  </datalist>
                    <p class="text-danger my-1 small" v-if="(errors.first('cedula_remitente'))" >  Este dato es requerido  </p>
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-primary btn-lg" @click="buscarRemitente()" style="margin-top:37px;">Buscar <span class="mbri-search"></span></button>
              </div>
            </div>
            <div class="row pr-4 pl-4">
              <div class="form-group col-4">
                <label class="links">Empresa</label>
                 <input type="text" v-model="form.contacto_remitente" v-validate="'required'" name="contacto_remitente" class="form-control" id="" >
                <p class="text-danger my-1 small" v-if="(errors.first('contacto_remitente'))" >  Este dato es requerido  </p>
              </div>
              <div class="form-group col-4">
                <label class="links">Dirección empresa</label>
                 <input type="text" v-model="form.direccion_remitente" v-validate="'required'" name="direccion_remitente" class="form-control" id="" >
                <p class="text-danger my-1 small" v-if="(errors.first('direccion_remitente'))" >  Este dato es requerido  </p>
              </div>
              <div class="form-group col-4">
                <label class="links">Teléfono</label>
                 <input type="text" v-model="form.telefono_remitente" v-validate="'required'" name="telefono_remitente" class="form-control" id="" >
                <p class="text-danger my-1 small" v-if="(errors.first('telefono_remitente'))" >  Este dato es requerido  </p>
              </div>
              <div class="form-group col-4">
                <label class="links">Piezas</label>
                 <input type="number" v-model="form.cantidad" v-validate="'required'" name="cantidad" class="form-control"  >
                <p class="text-danger my-1 small" v-if="(errors.first('cantidad'))" >  Este dato es requerido  </p>
              </div>
              <div class="form-group col-4">
                <label class="links">Kilos</label>
                 <input type="text" v-model="form.totalKilos" v-validate="'required'" name="totalKilos" class="form-control"  >
                <p class="text-danger my-1 small" v-if="(errors.first('totalKilos'))" >  Este dato es requerido  </p>
              </div>
              <div class="form-group col-4">
                <label class="links">Volumen</label>
                 <input type="text" v-model="form.totalVolumen" v-validate="'required'" name="totalVolumen" class="form-control"  >
                <p class="text-danger my-1 small" v-if="(errors.first('totalVolumen'))" >  Este dato es requerido  </p>
              </div>
              <div class="form-group col-4">
                <label class="links">Valor declarado</label>
                 <input type="number" @change="seg();sumar" v-model="form.valorDeclarado" v-validate="'required'" name="valorDeclarado" class="form-control"  >
                <p class="text-danger my-1 small" v-if="(errors.first('valorDeclarado'))" >  Este dato es requerido  </p>
              </div>
              <div class="form-group col-4">
                <div class="form-group">
                 <label class="links">Seguro carga</label>
                  <select class="form-control" @change="seg();sumar();" v-model="form.segurocarga" v-validate="'required'" name="segurocarga"  name="valorDeclarado" id="exampleFormControlSelect1" >
                    <option></option>
                    <option v-for="segurocarga in segurocarga" :value="segurocarga.porcentaje">{{segurocarga.porcentaje}} %</option>
                  </select>
                  <p class="text-danger my-1 small" v-if="(errors.first('segurocarga'))" >  Este dato es requerido  </p>
                </div>
              </div>
              <div class="form-group col-4">
                <label class="links">Valor seguro</label>
                 <input type="number" @change="sumar()" v-model="form.totalSeguro" v-validate="'required'" name="totalSeguro" class="form-control"  >
                <p class="text-danger my-1 small" v-if="(errors.first('totalSeguro'))" >  Este dato es requerido  </p>
              </div>
              <div class="form-group col-4">
                <label class="links">Valuacion</label>
                 <input type="number" v-model="form.costeguia" v-validate="'required'" name="costeguia" class="form-control"  >
                <p class="text-danger my-1 small" v-if="(errors.first('costeguia'))" >  Este dato es requerido  </p>
              </div>
              <div class="form-group col-4">
                <label class="links">Valor envió</label>
                 <input type="text" v-model="form.totalPrecios" v-validate="'required'" name="totalPrecios" class="form-control"  >
                <p class="text-danger my-1 small" v-if="(errors.first('totalPrecios'))" >  Este dato es requerido  </p>
              </div>
              <div class="form-group col-4">
                <label class="links">Otros cargos</label>
                 <input type="number" v-model="form.otrosCargos" @change="sumar()" v-validate="'required'" name="otrosCargos" class="form-control"  >
                <p class="text-danger my-1 small" v-if="(errors.first('otrosCargos'))" >  Este dato es requerido  </p>
              </div>
            </div>
            <div class="row align-items-end">
              <div class="col-md-4 ml-auto">
                <label >Total</label>
                <input v-model="form.total" class="form-control form-control-lg" type="text" placeholder="" disabled>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-6">
                <label class="links">Dice contener</label>
                 <input type="text" v-model="form.dicecontener" @change="sumar()" v-validate="'required'" name="dicecontener" class="form-control"  >
                <p class="text-danger my-1 small" v-if="(errors.first('dicecontener'))" >  Este dato es requerido  </p>
              </div>
              <div class="form-group col-6">
                <div class="form-group">
                 <label class="links">Forma pago</label>
                  <select class="form-control" v-model="form.forma_pago" v-validate="'required'" name="forma_pago"  name="valorDeclarado" id="exampleFormControlSelect1" >
                    <option></option>
                    <option v-for="formaspago in formaspago" :value="formaspago.id">{{formaspago.descripcion}} {{formaspago.dias}} dias</option>
                  </select>
                  <p class="text-danger my-1 small" v-if="(errors.first('forma_pago'))" >  Este dato es requerido  </p>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Liquidador</label>
                  <select class="form-control" id="exampleFormControlSelect1" value="<?=$auth_user_id;?>">
                    <option v-for="profiles in profiles" v-if="profiles.user_id==='<?=$auth_user_id;?>'" :value="profiles.user_id">{{profiles.username}}</option>
                  </select>
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
    Vue.component('flat-pickr', VueFlatpickr);
     axios.defaults.baseURL = '<?PHP echo base_url(); ?>';
     Vue.use(VeeValidate ,{locale: 'vi'});
     new Vue({
       el: '#app',
       data: {
         creada:'',
         enviada:'',
         cumplida:'',
         fisico:'',
         archivadas:'',
         anulada:'',
         url:'',
         cedula:'',
         estado:'',
         desde:'',
         hasta:'',
         ciudad:'',
         config: {
            wrap: true,
            enableTime: false,
            dateFormat: 'yy-m-d',
            locale: flatpickr.l10ns.es
          },
         contador:0,
         departamento:0,
         ver:false,
         cart:[],
         guias:[],
         imagenes:[],
         liquidaciones:[],
         liquidacion:[],
         remitentes:[],
         clientes:[],
         factura:[],
         guias:[],
         tarifas:[],
         formaspago:[],
         segurocarga:[],
         transportes:[],
         tiposenvios:[],
         profiles:[],
         editMode:false,
         form:{
             'id':'',
             'user_id':'<?=$auth_user_id;?>',
             'id_planilla':'',
             'nombre_cargo':'',
             'cedula':'',
             'nombre_empresa':'',
             'direccion_cliente':'',
             'telefono_cliente':'',
             'contacto_remitente':'',
             'direccion_remitente':'',
             'telefono_remitente':'',
             'tipo_envio':'',
             'tipo_transporte':'',
             'id_tarifa':'',
             'segurocarga':'',
             'totalSeguro':'',
             'otrosCargos':'',
             'total':'',
         }
       },
       methods: {
         async    uploadFoto() {
             this.file_data = $('#imagenFoto').prop('files')[0];
             this.form_data = new FormData();
             this.form_data.append('file', this.file_data);
             this.form_data.append('guia', this.form.id);
         await      axios.post('index.php/Guias/detail_foto', this.form_data)
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
                    axios.post('index.php/Guias/eliminarImagen',data)
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
                  data.append('guia',this.form.id);
                  await  axios.post('index.php/Guias/getimagenes/',data)
                  .then(({data: {imagenes}}) => {
                        this.imagenes = imagenes;
                });
              },
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
                   location.href = "http://tvgcargo.co/Facturas";
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
         addFactura(index){

           Swal({
             title: '¿Estás seguro?',
             type: 'warning',
             showCancelButton: true,
             confirmButtonText: '¡Si! ¡agregar!',
             cancelButtonText: '¡No! ¡cancelar!',
             reverseButtons: true
           }).then((result) => {
             for (var i = 0; i < this.factura.length; i++) {
               if (this.factura[i].id===this.guias[index].id) {
                 Swal(
                   'Esta guía ya esta anexada',
                   '',
                   'warning'
                 );
                 return;
               }
             }
             if (result.value) {
               this.factura.push({
                  origen:this.guias[index].ciudad_origen,
                  destino:this.guias[index].ciudad_destino,
                  tipo_transporte:this.guias[index].tipo_transporte,
                  tipo_transporte:this.guias[index].tipo_transporte,
                  total:this.guias[index].total,
                  n_guia:'N-'+this.guias[index].id,
                  id:this.guias[index].id,
                  nombre_cliente:this.guias[index].nombre_cliente,
                  nombre_empresa:this.guias[index].nombre_empresa,
                  nit_cliente:this.guias[index].nit_cliente,
                  direccion_cliente:this.guias[index].direccion_cliente,
                  telefono_cliente:this.guias[index].telefono_cliente,
                  cedula_cliente:this.guias[index].cedula,
                  ciudad_cliente:this.guias[index].ciudad,
                  forma:this.guias[index].forma,
                  dias:this.guias[index].dias,

                });
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
          async  mathc(){
              if (this.desde && this.hasta && !this.cedula && !this.estado && !this.ciudad) {
                console.log("solo fecha");
                let data = new FormData();
                 data.append('desde',this.desde);
                 data.append('hasta',this.hasta);
                 await axios.post('index.php/Guias/get_tiempo/',data)
                 .then(({data: {guias}}) => {
                   this.guias = guias
                 });
                  $("#example1").DataTable();
                  this.url='Guias/excelexport_tiempo/'+this.desde+'/'+this.hasta;
              }else if(!this.desde && !this.hasta && this.cedula && !this.estado && !this.ciudad) {
                console.log("solo cedula");
                let data = new FormData();
                 data.append('cedula',this.cedula);
                 await axios.post('index.php/Guias/get_cedula/',data)
                 .then(({data: {guias}}) => {
                   this.guias = guias
                 });
                  $("#example1").DataTable();
                  this.url='Guias/excelexport_cedula/'+this.cedula;
              }else if(!this.desde && !this.hasta && !this.cedula && this.estado && !this.ciudad) {
                  console.log("solo estado");
                  let data = new FormData();
                   data.append('estado',this.estado);
                   await axios.post('index.php/Guias/get_estado/',data)
                   .then(({data: {guias}}) => {
                     this.guias = guias
                   });
                    $("#example1").DataTable();
                    this.url='Guias/excelexport_estado/'+this.estado;
              }else if(!this.desde && !this.hasta && !this.cedula && !this.estado && this.ciudad) {
                  console.log("solo ciudad");
                  let data = new FormData();
                   data.append('ciudad',this.ciudad);
                   await axios.post('index.php/Guias/get_ciudad/',data)
                   .then(({data: {guias}}) => {
                     this.guias = guias
                   });
                    $("#example1").DataTable();
                    this.url='Guias/excelexport_ciudad/'+this.ciudad;
              }else if(this.desde && this.hasta && this.cedula && !this.estado && !this.ciudad) {
                  console.log("Fecha y cedula");
                  let data = new FormData();
                  data.append('desde',this.desde);
                  data.append('hasta',this.hasta);
                   data.append('cedula',this.cedula);
                   await axios.post('index.php/Guias/get_fecha_cedula/',data)
                   .then(({data: {guias}}) => {
                     this.guias = guias
                   });
                    $("#example1").DataTable();
                this.url='Guias/excelexport_fecha_cedula/'+this.desde+'/'+this.hasta+'/'+this.cedula;
              }else if(this.desde && this.hasta && !this.cedula && this.estado && !this.ciudad) {
                  console.log("Fecha y estado")
                  let data = new FormData();
                  data.append('desde',this.desde);
                  data.append('hasta',this.hasta);
                   data.append('estado',this.estado);
                   await axios.post('index.php/Guias/get_fecha_estado/',data)
                   .then(({data: {guias}}) => {
                     this.guias = guias
                   });
                    $("#example1").DataTable();
                    this.url='Guias/excelexport_fecha_estado/'+this.desde+'/'+this.hasta+'/'+this.estado;
              }else if(this.desde && this.hasta && !this.cedula && !this.estado && this.ciudad) {
                  console.log("Fecha y ciudad");
                  let data = new FormData();
                  data.append('desde',this.desde);
                  data.append('hasta',this.hasta);
                   data.append('ciudad',this.ciudad);
                   await axios.post('index.php/Guias/get_fecha_ciudad/',data)
                   .then(({data: {guias}}) => {
                     this.guias = guias
                   });
                    $("#example1").DataTable();
                    this.url='Guias/excelexport_fecha_ciudad/'+this.desde+'/'+this.hasta+'/'+this.ciudad;
              }else if(!this.desde && !this.hasta && this.cedula && this.estado && !this.ciudad) {
                  console.log("cedula y estado");
                  let data = new FormData();
                  data.append('cedula',this.cedula);
                  data.append('estado',this.estado);
                   await axios.post('index.php/Guias/get_cedula_estado/',data)
                   .then(({data: {guias}}) => {
                     this.guias = guias
                   });
                    $("#example1").DataTable();
                    this.url='Guias/excelexport_cedula_estado/'+this.cedula+'/'+this.estado;
              }else if(!this.desde && !this.hasta && this.cedula && !this.estado && this.ciudad) {
                  console.log("cedula y ciudad");
                  let data = new FormData();
                  data.append('cedula',this.cedula);
                  data.append('ciudad',this.ciudad);
                   await axios.post('index.php/Guias/get_cedula_ciudad/',data)
                   .then(({data: {guias}}) => {
                     this.guias = guias
                   });
                    $("#example1").DataTable();
                  this.url='Guias/excelexport_cedula_ciudad/'+this.cedula+'/'+this.ciudad;
              }else if(!this.desde && !this.hasta && !this.cedula && this.estado && this.ciudad) {
                  console.log("estado y ciudad")
                  let data = new FormData();
                  data.append('estado',this.estado);
                  data.append('ciudad',this.ciudad);
                   await axios.post('index.php/Guias/get_estado_ciudad/',data)
                   .then(({data: {guias}}) => {
                     this.guias = guias
                   });
                    $("#example1").DataTable();
                    this.url='Guias/excelexport_estado_ciudad/'+this.estado+'/'+this.ciudad;
              }else if(this.desde && this.hasta && this.cedula && !this.estado && this.ciudad) {
                  console.log("fecha y cedula y ciudad");
                  let data = new FormData();
                  data.append('desde',this.desde);
                  data.append('hasta',this.hasta);
                  data.append('cedula',this.cedula);
                  data.append('ciudad',this.ciudad);
                   await axios.post('index.php/Guias/get_fecha_cedula_ciudad/',data)
                   .then(({data: {guias}}) => {
                     this.guias = guias
                   });
                    $("#example1").DataTable();
                this.url='Guias/excelexport_fecha_ciudad_cedula/'+this.desde+'/'+this.hasta+'/'+this.cedula+'/'+this.ciudad;
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
            sumar(){
            this.form.total=parseFloat(this.form.totalSeguro)+parseFloat(this.form.costeguia)+parseFloat(this.form.totalPrecios)+parseFloat(this.form.otrosCargos);
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
           seg(){
             this.form.totalSeguro=parseFloat(this.form.valorDeclarado)*parseFloat(this.form.segurocarga)/100;
           },

           validateBeforeSubmit() {
                   this.$validator.validateAll().then((result) => {
                     if (result) {
                       let data = new FormData();
                       data.append('service_form',JSON.stringify(this.form));
                     if(!this.editMode){
                       axios.post('index.php/Guias/insertar',data)
                       .then(response => {
                         if(response.data.status == 200){
                           Swal.fire({
                             type: 'success',
                             title: 'Exito!',
                             text: 'Agregado con exito'
                           })
                           $('#modal-lg').modal('hide');
                           this.loadguias();
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
                       axios.post('index.php/Guias/editar',data)
                       .then(response => {
                         if(response.data.status == 200)
                         {
                           $('#modal-lg').modal('hide');
                           this.loadguias();
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
                 anularguias(index){
                   Swal({
                     title: '¿Estás seguro?',
                     text: "¡ será anulado para siempre!",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonText: '¡Si! ',
                     cancelButtonText: '¡No! ',
                     reverseButtons: true
                   }).then((result) => {
                     if (result.value) {
                       let data = new FormData();
                       data.append('id',this.guias[index].id);
                         axios.post('index.php/Guias/anular',data)
                         .then(response => {
                           if(response) {
                             Swal(
                               '¡Anulda la guia!',
                               'Ha sido anulado.',
                               'success'
                             ).then(response => {
                               this.mathc();
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
                 enfisico(index){
                   Swal({
                     title: '¿Estás seguro?',
                     text: "¡ Cambiar el estado a en físico!",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonText: '¡Si! ',
                     cancelButtonText: '¡No! ',
                     reverseButtons: true
                   }).then((result) => {
                     if (result.value) {
                       let data = new FormData();
                       data.append('id',this.guias[index].id);
                         axios.post('index.php/Guias/enfisico',data)
                         .then(response => {
                           if(response) {
                             this.mathc();
                             Swal(
                               '¡Eliminado!',
                               'Ha cambiado el estado.',
                               'success'
                             ).then(response => {
                                this.mathc();
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
                 archivada(index){
                   Swal({
                     title: '¿Estás seguro?',
                     text: "¡ Cambiar a archivada!",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonText: '¡Si! ',
                     cancelButtonText: '¡No! ',
                     reverseButtons: true
                   }).then((result) => {
                     if (result.value) {
                       let data = new FormData();
                       data.append('id',this.guias[index].id);
                         axios.post('index.php/Guias/archivada',data)
                         .then(response => {
                           if(response) {
                             this.mathc();
                             Swal(
                               '¡Eliminado!',
                               'Ha cambiado el estado.',
                               'success'
                             ).then(response => {
                                this.mathc();
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
                 enviarguias(index){
                   Swal({
                     title: '¿Estás seguro?',
                     text: "¡ Cambiar el estado a enviada!",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonText: '¡Si! ',
                     cancelButtonText: '¡No! ',
                     reverseButtons: true
                   }).then((result) => {
                     if (result.value) {
                       let data = new FormData();
                       data.append('id',this.guias[index].id);
                         axios.post('index.php/Guias/enviarguias',data)
                         .then(response => {
                           if(response) {
                             this.mathc();
                             Swal(
                               '¡Eliminado!',
                               'Ha cambiado el estado.',
                               'success'
                             ).then(response => {
                                this.mathc();
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
                 cumplidasGuias(index){
                   Swal({
                     title: '¿Estás seguro?',
                     text: "¡ Cambiar el estado a cumplida!",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonText: '¡Si! ',
                     cancelButtonText: '¡No! ',
                     reverseButtons: true
                   }).then((result) => {
                     if (result.value) {
                       let data = new FormData();
                       data.append('id',this.form.id);
                       data.append('f_cumplida',this.form.f_cumplida);
                         axios.post('index.php/Guias/cumplidasguias',data)
                         .then(response => {
                           if(response) {
                             this.mathc();
                             Swal(
                               '¡Eliminado!',
                               'Ha cambiado el estado.',
                               'success'
                             ).then(response => {
                                this.mathc();
                                $('#cumplidas').modal('hide');
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
                 setearCumplida(index){
                   this.form.id=this.guias[index].id,
                   this.form.fecha=this.guias[index].fecha,
                   this.form.ciudad_origen=this.guias[index].ciudad_origen,
                   this.form.ciudad_destino=this.guias[index].ciudad_destino,
                   this.form.cedula=this.guias[index].cedula,
                   this.form.nombre_empresa=this.guias[index].nombre_empresa,
                   this.form.direccion_cliente=this.guias[index].direccion_cliente,
                   this.form.telefono_cliente=this.guias[index].telefono_cliente,
                   this.form.cedula_remitente=this.guias[index].cedula_remitente,
                   this.form.contacto_remitente=this.guias[index].contacto_remitente,
                   this.form.direccion_remitente=this.guias[index].direccion_remitente,
                   this.form.telefono_remitente=this.guias[index].telefono_remitente,
                   this.form.cantidad=this.guias[index].cantidad,
                   this.form.totalKilos=this.guias[index].totalKilos,
                   this.form.totalVolumen=this.guias[index].totalVolumen,
                   this.form.valorDeclarado=this.guias[index].valorDeclarado,
                   this.form.segurocarga=this.guias[index].segurocarga,
                   this.form.totalSeguro=this.guias[index].totalSeguro,
                   this.form.dicecontener=this.guias[index].dicecontener,
                   this.form.forma_pago=this.guias[index].forma_pago,
                   this.form.costeguia=this.guias[index].costeguia,
                   this.form.totalPrecios=this.guias[index].valor_flete,
                   this.form.otrosCargos=this.guias[index].otrosCargos,
                   this.form.total=this.guias[index].total,
                   this.form.id_tarifa=this.guias[index].id_tarifa,
                   this.form.precioNegociado=this.guias[index].precioNegociado,
                   this.form.f_cumplida=this.guias[index].f_cumplida,
                   this.form.estado='Cumplida',
                   this.editMode=true;
                   this.tari();
                   $('#cumplidas').modal('show');
                   this.loadFotos();
                 },
                 setear(index){
                   this.form.fecha=this.guias[index].fecha,
                   this.form.ciudad_origen=this.guias[index].ciudad_origen,
                   this.form.ciudad_destino=this.guias[index].ciudad_destino,
                   this.form.cedula=this.guias[index].cedula,
                   this.form.nombre_empresa=this.guias[index].nombre_empresa,
                   this.form.direccion_cliente=this.guias[index].direccion_cliente,
                   this.form.telefono_cliente=this.guias[index].telefono_cliente,
                   this.form.cedula_remitente=this.guias[index].cedula_remitente,
                   this.form.contacto_remitente=this.guias[index].contacto_remitente,
                   this.form.direccion_remitente=this.guias[index].direccion_remitente,
                   this.form.telefono_remitente=this.guias[index].telefono_remitente,
                   this.form.cantidad=this.guias[index].cantidad,
                   this.form.totalKilos=this.guias[index].totalKilos,
                   this.form.totalVolumen=this.guias[index].totalVolumen,
                   this.form.valorDeclarado=this.guias[index].valorDeclarado,
                   this.form.segurocarga=this.guias[index].segurocarga,
                   this.form.totalSeguro=this.guias[index].totalSeguro,
                   this.form.dicecontener=this.guias[index].dicecontener,
                   this.form.forma_pago=this.guias[index].forma_pago,
                   this.form.costeguia=this.guias[index].costeguia,
                   this.form.totalPrecios=this.guias[index].valor_flete,
                   this.form.otrosCargos=this.guias[index].otrosCargos,
                   this.form.total=this.guias[index].total,
                   this.form.id_tarifa=this.guias[index].id_tarifa,
                   this.form.precioNegociado=this.guias[index].precioNegociado,
                   this.tari();
                   $('#modal-lg').modal('show');
                 },
                 ver(index){
                   this.form.id=this.guias[index].id,
                   this.form.nombre_cargo=this.guias[index].nombre_cargo,
                   $('#myModal').modal('show');
                   this.editMode=false
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
                 async loadtiposenvios() {
                   await   axios.get('index.php/TiposEnvios/gettiposenvios/')
                      .then(({data: {tiposenvios}}) => {
                        this.tiposenvios = tiposenvios
                      });
                    },
                    async loadtarifas() {
                        await   axios.get('index.php/Tarifas/gettarifas/')
                           .then(({data: {tarifas}}) => {
                             this.tarifas = tarifas
                           });
                         },
              async loadtransportes() {
                 await   axios.get('index.php/Transporte/gettransportes/')
                    .then(({data: {transportes}}) => {
                      this.transportes = transportes
                    });
                  },
                 loadPln(){
                   this.form.id_planilla=localStorage.getItem('planilla');
                   if(this.form.id_planilla){
                     console.log(localStorage.getItem('planilla'));
                     window.setTimeout(function () {
                           $('#modal-lg').modal('show');
                           localStorage.removeItem('planilla');
                          }, 300);
                     this.loadLiquidacion();
                   }
                 },
                 async loadLiquidacion(){
                    let data = new FormData();
                       data.append('id',this.form.id_planilla);
                       await  axios.post('index.php/Liquidaciones/getLiquidacion/',data)
                       .then(({data: {liquidaciones}}) => {
                             this.liquidacion = liquidaciones;
                     });
                     if (this.liquidacion.length>0) {
                       this.form.cedula=this.liquidacion[0].cedula;
                       this.form.id_tarifa=this.liquidacion[0].id_tarifa;
                       this.form.tipo_envio=this.liquidacion[0].tipo_envio;
                       this.form.tipo_transporte=this.liquidacion[0].tipo_transporte;
                       this.form.cantidad=this.liquidacion[0].totalUnidades;
                       this.form.totalKilos=this.liquidacion[0].totalKilos;
                       this.form.totalVolumen=this.liquidacion[0].totalVolumen;
                       this.form.segurocarga=this.liquidacion[0].segurocarga;
                       this.form.totalPrecios=this.liquidacion[0].totalPrecios;
                       this.form.precioNegociado=this.liquidacion[0].precio;
                       this.form.costeguia=this.liquidacion[0].costeguia;
                       this.form.dicecontener=this.liquidacion[0].idcarga;
                     }else{

                     this.form.id_tarifa="";
                     this.form.tipo_envio="";
                     this.form.tipo_transporte="";
                     this.form.cantidad="";
                     this.form.totalKilos="";
                     this.form.totalVolumen="";
                     this.form.segurocarga="";
                     this.form.totalPrecios="";
                     this.form.precio="";
                     this.form.precioNegociado="";
                     this.form.totalSeguro="";
                     this.form.costeguia="";
                     }
                       this.tari();
                       for (var i = 0; i < this.clientes.length; i++) {
                         if (this.clientes[i].cedula_cliente===this.liquidacion[0].cedula) {
                          this.form.telefono_cliente=this.clientes[i].telefono_cliente;
                          this.form.direccion_cliente=this.clientes[i].direccion_cliente;
                          this.form.nombre_empresa=this.clientes[i].nombre_empresa;
                         }
                      }
                   },
                   buscarCliente(){
                     for (var i = 0; i < this.clientes.length; i++) {
                       this.contador=0;
                       if (this.clientes[i].cedula_cliente==this.form.cedula) {
                         this.loadLiquidaciones();
                         this.form.telefono_cliente=this.clientes[i].telefono_cliente;
                         this.form.direccion_cliente=this.clientes[i].direccion_cliente;
                         this.form.nombre_empresa=this.clientes[i].nombre_empresa;
                         this.contador=1
                       }
                     }
                     if (!this.form.telefono_cliente) {
                       Swal.fire({
                          type: 'warning',
                          title: 'Oops...',
                          text: 'Este cliente no existe!',
                          footer: '<a href="<?=base_url();?>Clientes">Agregar nuevo cliente</a>'
                        });
                     }
                   },
                   buscarRemitente(){
                     for (var i = 0; i < this.remitentes.length; i++) {
                       this.contador=0;
                       if (this.remitentes[i].cedula_remitente==this.form.cedula_remitente) {
                         this.form.telefono_remitente   =this.remitentes[i].telefono_remitente;
                         this.form.direccion_remitente  =this.remitentes[i].direccion_remitente;
                         this.form.contacto_remitente   =this.remitentes[i].contacto_remitente;
                         this.contador=1;
                       }
                     }
                     if (!this.form.contacto_remitente){
                       Swal.fire({
                          type: 'warning',
                          title: 'Oops...',
                          text: 'Este remitente no existe!',
                          footer: '<a href="<?=base_url();?>Remitentes">Agregar nuevo remitente</a>'
                        });
                     }
                   },
                 async loadclientes() {
                      await   axios.get('index.php/Clientes/getclientesN/')
                         .then(({data: {clientes}}) => {
                           this.clientes = clientes
                         });
                       },
                 async loadLiquidaciones(){
                    let data = new FormData();
                       data.append('cedula',this.form.cedula);
                       await  axios.post('index.php/Liquidaciones/getLiquidaciones/',data)
                       .then(({data: {liquidaciones}}) => {
                             this.liquidaciones = liquidaciones;
                     });
                   },
                   async loadtarifas() {
                       await   axios.get('index.php/Tarifas/gettarifas/')
                          .then(({data: {tarifas}}) => {
                            this.tarifas = tarifas
                          });
                        },
                  async loadremitentes() {
                       await   axios.get('index.php/Remitentes/getremitentes/')
                          .then(({data: {remitentes}}) => {
                            this.remitentes = remitentes
                          });

                        },
                  async loadsegurocarga() {
                    await   axios.get('index.php/SeguroCarga/getsegurocarga/')
                       .then(({data: {segurocarga}}) => {
                         this.segurocarga = segurocarga
                       });

                     },
                     async loadformaspago() {
                    await   axios.get('index.php/FormasPago/getformaspago/')
                       .then(({data: {formaspago}}) => {
                         this.formaspago = formaspago
                       });

                     },
                     async loadguias() {
                    await   axios.get('index.php/Guias/getguias/')
                       .then(({data: {guias}}) => {
                         this.guias = guias
                       });
                       this.contadors();
                       $("#example1").DataTable();

                     },
                     async   loadProfiles() {
                     await     axios.get('index.php/Root_user/get_profile/')
                          .then(({data: {profiles}}) => {
                            this.profiles = profiles
                          });
                        },
                        async loadCart() {

                            await  axios.get('index.php/User/get_profile/')
                             .then(({data: {profiles}}) => {
                                this.cart = profiles;
                             });
                           },
                    contadors(){
                      this.creada=0;this.enviada=0;this.cumplida=0;this.fisico=0;this.archivadas=0;this.anulada=0;
                      for (var i = 0; i < this.guias.length; i++) {
                        if (this.guias[i].estado==='Creada') {
                          this.creada=parseInt(this.creada)+1;
                        }else if(this.guias[i].estado==='Enviada'){
                          this.enviada=parseInt(this.enviada)+1;
                        }else if(this.guias[i].estado==='Cimplida'){
                          this.cumplida=parseInt(this.cumplida)+1;
                        }else if(this.guias[i].estado==='En físico'){
                          this.fisico=parseInt(this.fisico)+1;
                        }else if(this.guias[i].estado==='Archivada'){
                          this.archivadas=parseInt(this.archivadas)+1;
                        }else if(this.guias[i].estado==='Anulada'){
                          this.anulada=parseInt(this.anulada)+1;
                        }

                      }
                    }
       },

       created(){
            this.loadProfiles();
            this.loadformaspago();
            this.loadremitentes();
            this.loadtransportes();
            this.loadtiposenvios();
            this.loadsegurocarga();
            this.loadtarifas();
            this.loadclientes();
            this.loadPln();
            this.loadguias();

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
