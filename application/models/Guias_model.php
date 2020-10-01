<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Guias_model extends MY_Model {
        public function insertar($data){
          $fecha=date("Y-m-d");
            $this->db->insert('carga', array(
                'id'     => $data['id'],
                'fecha'          => $fecha,
                'ciudad_origen'     => $data['ciudad_origen'],
                'ciudad_destino'     => $data['ciudad_destino'],
                'cedula'     => $data['cedula'],
                'nombre_empresa'     => $data['nombre_empresa'],
                'direccion_cliente'     => $data['direccion_cliente'],
                'telefono_cliente'     => $data['telefono_cliente'],
                'cedula_remitente'     => $data['cedula_remitente'],
                'contacto_remitente'     => $data['contacto_remitente'],
                'direccion_remitente'     => $data['direccion_remitente'],
                'telefono_remitente'     => $data['telefono_remitente'],
                'cantidad'     => $data['cantidad'],
                'totalKilos'     => $data['totalKilos'],
                'totalVolumen'     => $data['totalVolumen'],
                'valorDeclarado'     => $data['valorDeclarado'],
                'segurocarga'     => $data['segurocarga'],
                'totalSeguro'     => $data['totalSeguro'],
                'dicecontener'     => $data['dicecontener'],
                'user_id'     => $data['user_id'],
                'forma_pago'     => $data['forma_pago'],
                'costeguia'     => $data['costeguia'],
                'valor_flete'     => $data['totalPrecios'],
                'otrosCargos'     => $data['otrosCargos'],
                'total'     => $data['total'],
                'id_tarifa'     => $data['id_tarifa'],
                'precioNegociado'     => $data['precioNegociado'],
            ));
            return $this->db->error();
        }
        public function anularguias($id) {
            $this->db->where('id',$id);
            $this->db->update('carga', array(
              'estado' => "Anulada",
            ));
            return $this->db->error();
           }
       public function archivada($id) {
           $this->db->where('id',$id);
           $this->db->update('carga', array(
             'estado' => "Archivada",
           ));
           return $this->db->error();
          }

          public function enfisico($id) {
              $this->db->where('id',$id);
              $this->db->update('carga', array(
                'estado' => "En Físico",
              ));
              return $this->db->error();
             }
       public function cumplidasguias($datas) {
           $this->db->where('id',$datas['id']);
           $this->db->update('carga', array(
             'estado' =>    "Cumplida",
             'f_cumplida'     => $datas['f_cumplida'],
           ));
           return $this->db->error();
          }
           public function enviarguias($id) {
               $this->db->where('id',$id);
               $this->db->update('carga', array(
                 'estado' => "Enviada",
               ));
               return $this->db->error();
              }
        public function getguias() {
            return $this->db
            ->select('c.*,cl.nombre_cliente,cl.nit_cliente,cl.nombre_empresa,cl.cedula_cliente,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
            ->from('carga c')
            ->join('users u', 'c.user_id = u.user_id', 'left outer')
            ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
            ->join('forma_pago f', 'c.forma_pago = f.id', 'left outer')
            ->get()
            ->result();
          }
          public function get_tiempo($datas) {
              return $this->db
              ->select('c.*,cl.nombre_cliente,cl.nit_cliente,cl.nombre_empresa,cl.ciudad,t.tipo_transporte,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
              ->from('carga c')
              ->where('fecha >=', $datas['desde'])
              ->where('fecha <=', $datas['hasta'])
              ->join('users u', 'c.user_id = u.user_id', 'left outer')
              ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
              ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
              ->join('forma_pago f', 'c.forma_pago = f.id', 'left outer')
              ->get()
              ->result();
            }
            public function get_cedula($datas) {
                return $this->db
                ->select('c.*,cl.nombre_cliente,cl.nit_cliente,cl.nombre_empresa,cl.ciudad,t.tipo_transporte,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
                ->from('carga c')
                ->where('c.cedula', $datas['cedula'])
                ->join('users u', 'c.user_id = u.user_id', 'left outer')
                ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
                ->join('forma_pago f', 'c.forma_pago = f.id', 'left outer')
                ->get()
                ->result();
              }
              public function get_estado($datas) {
                  return $this->db
                  ->select('c.*,cl.nombre_cliente,cl.nit_cliente,cl.nombre_empresa,cl.ciudad,t.tipo_transporte,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
                  ->from('carga c')
                  ->where('c.estado', $datas['estado'])
                  ->join('users u', 'c.user_id = u.user_id', 'left outer')
                  ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                  ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
                  ->join('forma_pago f', 'c.forma_pago = f.id', 'left outer')
                  ->get()
                  ->result();
                }
                public function get_ciudad($datas) {
                    return $this->db
                    ->select('c.*,cl.nombre_cliente,cl.nit_cliente,cl.nombre_empresa,cl.ciudad,t.tipo_transporte,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
                    ->from('carga c')
                    ->where('c.ciudad_destino', $datas['ciudad'])
                    ->join('users u', 'c.user_id = u.user_id', 'left outer')
                    ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                    ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
                    ->join('forma_pago f', 'c.forma_pago = f.id', 'left outer')
                    ->get()
                    ->result();
                  }
                  public function get_fecha_cedula($datas) {
                      return $this->db
                      ->select('c.*,cl.nombre_cliente,cl.nit_cliente,cl.nombre_empresa,cl.ciudad,t.tipo_transporte,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
                      ->from('carga c')
                      ->where('fecha >=', $datas['desde'])
                      ->where('fecha <=', $datas['hasta'])
                      ->where('c.cedula', $datas['cedula'])
                      ->join('users u', 'c.user_id = u.user_id', 'left outer')
                      ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                      ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
                      ->join('forma_pago f', 'c.forma_pago = f.id', 'left outer')
                      ->get()
                      ->result();
                    }
              public function get_fecha_estado($datas) {
                  return $this->db
                  ->select('c.*,cl.nombre_cliente,cl.nit_cliente,cl.nombre_empresa,cl.ciudad,t.tipo_transporte,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
                  ->from('carga c')
                  ->where('fecha >=', $datas['desde'])
                  ->where('fecha <=', $datas['hasta'])
                  ->where('c.estado', $datas['estado'])
                  ->join('users u', 'c.user_id = u.user_id', 'left outer')
                  ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                  ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
                  ->join('forma_pago f', 'c.forma_pago = f.id', 'left outer')
                  ->get()
                  ->result();
                }
                public function get_fecha_ciudad($datas) {
                    return $this->db
                    ->select('c.*,cl.nombre_cliente,cl.nit_cliente,cl.nombre_empresa,cl.ciudad,t.tipo_transporte,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
                    ->from('carga c')
                    ->where('fecha >=', $datas['desde'])
                    ->where('fecha <=', $datas['hasta'])
                    ->where('c.ciudad_destino', $datas['ciudad'])
                    ->join('users u', 'c.user_id = u.user_id', 'left outer')
                    ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                    ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
                    ->join('forma_pago f', 'c.forma_pago = f.id', 'left outer')
                    ->get()
                    ->result();
                  }
                  public function get_cedula_estado($datas) {
                      return $this->db
                      ->select('c.*,cl.nombre_cliente,cl.nit_cliente,cl.nombre_empresa,cl.ciudad,t.tipo_transporte,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
                      ->from('carga c')
                      ->where('c.cedula', $datas['cedula'])
                      ->where('c.estado', $datas['estado'])
                      ->join('users u', 'c.user_id = u.user_id', 'left outer')
                      ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                      ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
                      ->join('forma_pago f', 'c.forma_pago = f.id', 'left outer')
                      ->get()
                      ->result();
                    }
                public function get_cedula_ciudad($datas) {
                    return $this->db
                    ->select('c.*,cl.nombre_cliente,cl.nit_cliente,cl.nombre_empresa,cl.ciudad,t.tipo_transporte,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
                    ->from('carga c')
                    ->where('c.cedula', $datas['cedula'])
                    ->where('c.ciudad_destino', $datas['ciudad'])
                    ->join('users u', 'c.user_id = u.user_id', 'left outer')
                    ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                    ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
                    ->join('forma_pago f', 'c.forma_pago = f.id', 'left outer')
                    ->get()
                    ->result();
                  }
                  public function get_estado_ciudad($datas) {
                      return $this->db
                      ->select('c.*,cl.nombre_cliente,cl.nit_cliente,cl.nombre_empresa,cl.ciudad,t.tipo_transporte,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
                      ->from('carga c')
                      ->where('c.estado', $datas['estado'])
                      ->where('c.ciudad_destino', $datas['ciudad'])
                      ->join('users u', 'c.user_id = u.user_id', 'left outer')
                      ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                      ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
                      ->join('forma_pago f', 'c.forma_pago = f.id', 'left outer')
                      ->get()
                      ->result();
                    }
                public function get_fecha_cedula_ciudad($datas) {
                    return $this->db
                    ->select('c.*,cl.nombre_cliente,cl.nit_cliente,cl.nombre_empresa,cl.ciudad,t.tipo_transporte,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
                    ->from('carga c')
                    ->where('fecha >=', $datas['desde'])
                    ->where('fecha <=', $datas['hasta'])
                    ->where('c.cedula', $datas['cedula'])
                    ->where('c.ciudad_destino', $datas['ciudad'])
                    ->join('users u', 'c.user_id = u.user_id', 'left outer')
                    ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                    ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
                    ->join('forma_pago f', 'c.forma_pago = f.id', 'left outer')
                    ->get()
                    ->result();
                  }
              public function get_fecha_estado_ciudad($datas) {
                  return $this->db
                  ->select('c.*,cl.nombre_cliente,cl.nit_cliente,cl.nombre_empresa,cl.ciudad,t.tipo_transporte,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
                  ->from('carga c')
                  ->where('fecha >=', $datas['desde'])
                  ->where('fecha <=', $datas['hasta'])
                  ->where('c.estado', $datas['estado'])
                  ->where('c.ciudad_destino', $datas['ciudad'])
                  ->join('users u', 'c.user_id = u.user_id', 'left outer')
                  ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                  ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
                  ->join('forma_pago f', 'c.forma_pago = f.id', 'left outer')
                  ->get()
                  ->result();
                }
                public function get_fecha_estado_cedula($datas) {
                    return $this->db
                    ->select('c.*,cl.nombre_cliente,cl.nit_cliente,cl.nombre_empresa,cl.ciudad,t.tipo_transporte,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
                    ->from('carga c')
                    ->where('fecha >=', $datas['desde'])
                    ->where('fecha <=', $datas['hasta'])
                    ->where('c.estado', $datas['estado'])
                    ->where('c.cedula', $datas['cedula'])
                    ->join('users u', 'c.user_id = u.user_id', 'left outer')
                    ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                    ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
                    ->join('forma_pago f', 'c.forma_pago = f.id', 'left outer')
                    ->get()
                    ->result();
                  }
                public function get_fecha_estado_ciudad_cedula($datas) {
                    return $this->db
                    ->select('c.*,cl.nit_cliente,cl.nombre_empresa,cl.ciudad,t.tipo_transporte,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
                    ->from('carga c')
                    ->where('fecha >=', $datas['desde'])
                    ->where('fecha <=', $datas['hasta'])
                    ->where('c.estado', $datas['estado'])
                    ->where('c.cedula', $datas['cedula'])
                    ->where('c.ciudad_destino', $datas['ciudad'])
                    ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
                    ->join('users u', 'c.user_id = u.user_id', 'left outer')
                    ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                    ->join('forma_pago f', 'c.forma_pago = f.id', 'left outer')
                    ->get()
                    ->result();
                  }

          ///////////////////
          public function get_unused_id(){
                // Create a random user id between 1200 and 4294967295
                $random_unique_int = 2147483648 + mt_rand( -2147482448, 2147483647 );

                // Make sure the random user_id isn't already in use
                $query = $this->db->where( 'id', $random_unique_int )
                    ->get_where( $this->db_table('carga_table') );

                if( $query->num_rows() > 0 )
                {
                    $query->free_result();

                    // If the random user_id is already in use, try again
                    return $this->get_unused_id();
                }

                return $random_unique_int;
            }
            //////////PDF
            function fetch_details($id){
             $this->db->select('*')
              ->from('empresa')
              ->where('id', 1);
              $datos=$this->db->get();


                $this->db->select('c.*,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
                ->from('carga c')
                ->where('c.id', $id)
                ->join('users u', 'c.user_id = u.user_id')
                ->join('forma_pago f', 'c.forma_pago = f.id');
                $data = $this->db->get();

                $output = '<html lang="en">
                          <head>
                          <meta charset="utf-8">
                          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                          <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
                          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
                          <title>GIA DE CARGA-TVG CARGOS</title>
                          <style media="screen">
                            .bounce-enter-active {
                              animation: bounce-in .5s;
                            }
                            .bounce-leave-active {
                              animation: bounce-out .5s;
                            }
                            @keyframes bounce-in {
                              0% {
                                transform: scale(0);
                              }
                              50% {
                                transform: scale(1.5);
                              }
                              100% {
                                transform: scale(1);
                              }
                            }
                            @keyframes bounce-out {
                              0% {
                                transform: scale(1);
                              }
                              50% {
                                transform: scale(1.5);
                              }
                              100% {
                                transform: scale(0);
                              }
                            }
                            @page { margin: 100px 30px; }
                              #header { position: fixed; left: 0px; top: -100px; right: 0px; height: 70px; background-color: white; text-align: left; padding-top:30px; }
                              #footer { position: fixed; left: 0px; bottom: -105px; right: 0px; height: 70px; background-color: white; }
                              #footer .page:after { content: counter(page, upper-roman); }
                          </style>
                        </head>
                    <body >
                      <style type="text/css">
                      .tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
                      .tftable th {font-size:12px;background-color:#acc8cc;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;text-align:left;}
                      .tftable tr {background-color:#ffffff;}
                      .tftable td {font-size:12px;border-width: 1px;padding: 4px;border-style: solid;border-color: #729ea5;}
                      .tftable tr:hover {background-color:#ffffff;}
                      .verticalText {
                      -webkit-transform: rotate(-90deg);
                      -moz-transform: rotate(-90deg);
                      .titulos {font-family: "Roboto", sans-serif;}
                      }
                      table {
                          border-collapse: collapse;
                          overflow: hidden;
                        }

                        th, td {
                          padding: 0.3em;
                          background: #f5f4f442;
                          border-top: 1px solid lightgrey;
                          border-bottom: 1px solid lightgrey;
                          border-left: 1px solid lightgrey;
                          border-right: 1px solid lightgrey;
                          color:black;
                          font-family: "Roboto", sans-serif;
                        }

                      </style>';

                      foreach($datos->result() as $row){
                          $output .= '
                          <div id="header">
                            <img class="adapt-img" src="'.base_url($row->logo_uno).'" alt style="display: block;" width="100%" height="68px">
                            ';
                            foreach($data->result() as $rows){
                              if ($rows->estado=="Anulada") {
                                $output .= '
                            <h1 style="color:red;transform: rotate(-40deg);font-size:80px;opacity:0.2px;">ANULADA</h1>
                            ';
                              }
                            }
                        $output .= '</a>
                          </div>
                          <div id="footer">
                            <img class="adapt-img" src="'.base_url($row->logo_dos).'" alt style="display: block;" width="100%" height="68px"></a>
                          </div>';
                          }
                      foreach($data->result() as $row){
                          $output .= '

                          <table style="float: right;">
        									  <tr>
        										<th colspan="2"style="font-size:20px; padding:1em;">Guía de carga</th>
        										<th style="color:red;font-size:20px;padding:1em;">Nº'.$row->id.'</th>
        										<th style="font-size:20px;padding:1em;">Fecha</th>
        										<th style="color:red;font-size:20px;padding:1em;white-space: nowrap;">'.$row->fecha.'</th>
        									  </tr>
        									  <tr>
        										<th colspan="2" style="font-size:15px;">Origen</th>
        										<th style="color:red;font-size:15px;">'.$row->ciudad_origen.'</th>
        										<th style="font-size:15px;">Destino</th>
        										<th style="color:red;font-size:15px;">'.$row->ciudad_destino.'</th>
        									  </tr>
        									  <tr>
        										<th  colspan="2"style="font-size:15px;">Cliente<p style="color:red">'.$row->nombre_empresa.'</p></th>
        										<th colspan="2" style="font-size:15px;">Dirección<p style="color:red">'.$row->direccion_cliente.'</p></th>
        										<th style="font-size:15px;">Teléfono<p style="color:red">'.$row->telefono_cliente.'</p></th>
        									  </tr>
        									  <tr>
        										<th  colspan="2">Remitente<p style="color:red">'.$row->contacto_remitente.'</p></th>
        										<th colspan="2">Dirección<p style="color:red">'.$row->direccion_remitente.'</p></th>
        										<th >Teléfono<p style="color:red">'.$row->telefono_remitente.'</p></th>
        									  </tr>
        									  <tr>
        										<th >Piezas<p style="color:red">'.$row->cantidad.'</p></th>
        										<th >Kilos<p style="color:red">'.$row->totalKilos.'</p></th>
        										<th >Volumen<p style="color:red">'.$row->totalVolumen.'</p></th>
        										<th >Valor Declarado  <p style="color:red"> $'.$row->valorDeclarado.'</p></th>
        										<th >Valor Seguro <p style="color:red"> $ '.$row->totalSeguro.'</p></th>
        									  </tr>
        									  <tr>
        										<th  colspan="3"rowspan="2">Dice Contener <p style="color:red">'.$row->dicecontener.'</p></th>
        										<th >Liquidador:<p style="color:red">'.$row->nombre.' '.$row->apellido.'</p></th>
        										<th >Valuación <p style="color:red"> $ '.$row->costeguia.'</p></th>
        									  </tr>
        										<tr>
        										<th >Forma de pago<p style="color:red">'.$row->forma.'</p></th>
        										<th >Valor de envío<p style="color:red"> $ '.$row->valor_flete.'</p></th>
        									  </tr>
        									  <tr>
        										<td colspan="4" style="font-size:9px; color:red;justify;">EL REMITENTE ACEPTA IMPLÍCITAMENTE LAS CONDICIONES Y LA TARIFA DE LA EMPRESA TVG CARGO S.A.S. Y LAS DEMAS QUE SEÑALA EL CODIGO DE CORMERCIO, ADEMAS DEJA CONSTANCIA EXPRESA QUE ESTA REMESA NO CONTIENE DINERO Y DEBERA AGREGAR A LA EMPRESA, LOS DOCUMENTOS NECESARIOS PARA EL CUMPLIMIENTO ANTE LAS AUTORIDADES DE POLICIA, ADUANA Y SANIDAD Y SE RESPONSABILIZA ANTE LAS AUTORIDADES, POR EL ORIGEN Y EL CONTENIDO DE LAS MERCANCIAS.</td>
        										<th >Otros cargos <p style="color:red"> $ '.$row->otrosCargos.'</p></th>
        									  </tr>
        									  <tr>
        										<td colspan="4" style="font-size:7px; color:red; justify;" >EL SEGURO SOLO CUBRE PERDIDA TOTAL, NO PERDIDAS PARCIALES O DAÑOS QUE SE PRESENTEN EN LA MERCANCIA A TRANSPORTAR. PARA EVITAR DAÑOS DEBE ESTAR BIEN EMBALADA LA CARGA A TRANSPORTAR. NO SE RESPONDE POR VIDRIOS</td>
        										<th >Total <p style="color:red">  $ '.$row->total.'</p></th>
        									  </tr>
        									  <tr>
                              <th colspan="5" style="padding-button:1em!importan;" >Nombre, firma y c.c. Remitente   </th>
        									  </tr>
                            <tr>
                              <th colspan="5" style="padding-button:1em!importan;" >Nombre, firma y c.c. Destinatario  </th>
                            </tr>
                            <tr>
                              <th colspan="5"  style="font-size:20px; float:center;">MERCANCIA SUJETA A CUPO </th>
                            </tr>
        									</table>';
                          }

                    $output .= '
                       </body>
                      </html>';

                      return $output;

            }


                    ////////////////
          public function imagen_insert($data) {
              $this->db->insert('soportes_guia', array(
                  'guia'          => $data['guia'],
                  'url'             => $data['url'],
                  'nombre'             => $data['nombre'],
              ));
              return $this->db->error();
             }
          public function imagenes_get($data){
           return $this->db
              ->select('*')
               ->from('soportes_guia')
               ->where('guia',$data['guia'])
               ->get()
               ->result();
              }
              public function eliminarImagen($id) {
                $this->db->where('id', $id);
                $this->db->delete('soportes_guia');
                return $this->db->error();
              }
              ///////////////////
    }
