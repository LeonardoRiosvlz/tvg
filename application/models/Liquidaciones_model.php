<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Liquidaciones_model extends MY_Model {
        public function insertar($data){
            $this->db->insert('liquidaciones', array(
                'id'                       => $data['id'],
                'user_id'                  => $data['user_id'],
                'id_cotizacion'            => $data['id_cotizacion'],
                'cedula'                   => $data['cedula'],
                'items'                    => json_encode($data['items']),
                'tipo_transporte'          => $data['tipo_transporte'],
                'tipo_envio'               => $data['tipo_envio'],
                'departamento_origen'      => $data['departamento_origen'],
                'departamento_destino'     => $data['departamento_destino'],
                'ciudad_origen'            => $data['ciudad_origen'],
                'ciudad_destino'           => $data['ciudad_destino'],
                'itinerarios'              => $data['itinerarios'],
                'tiempos'                  => $data['tiempos'],
                'segurocarga'                  => $data['segurocarga'],
                'totalVolumen'             => $data['totalVolumen'],
                'totalKilos'               => $data['totalKilos'],
                'totalPrecios'             => $data['totalPrecios'],
                'totalUnidades'            => $data['totalUnidades'],
                'totalSeguro'              => $data['totalSeguro'],
                'costeguia'                => $data['costeguia'],
                'idcarga'                => $data['idcarga'],
            //    'estado'                   => $data['estado'],
            //    'generado_fecha'           => $data['generado_fecha'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('liquidaciones', array(
              'user_id'                  => $data['user_id'],
              'id_cotizacion'            => $data['id_cotizacion'],
              'cedula'                   => $data['cedula'],
              'items'                    => json_encode($data['items']),
              'tipo_transporte'          => $data['tipo_transporte'],
              'tipo_envio'               => $data['tipo_envio'],
              'departamento_origen'      => $data['departamento_origen'],
              'departamento_destino'     => $data['departamento_destino'],
              'ciudad_origen'            => $data['ciudad_origen'],
              'ciudad_destino'           => $data['ciudad_destino'],
              'itinerarios'              => $data['itinerarios'],
              'tiempos'                  => $data['tiempos'],
              'precio'                   => $data['precio'],
              'escala'                   => $data['escala'],
              'formula'                  => $data['formula'],
              'idcarga'                => $data['idcarga'],
              'segurocarga'                  => $data['segurocarga'],
              'variable'                 => $data['variable'],
              'factor'                   => $data['factor'],
              'id_tarifa'                => $data['id_tarifa'],
              'totalVolumen'             => $data['totalVolumen'],
              'totalKilos'               => $data['totalKilos'],
              'totalPrecios'             => $data['totalPrecios'],
              'totalUnidades'            => $data['totalUnidades'],
              'totalSeguro'              => $data['totalSeguro'],
              'costeguia'                => $data['costeguia'],
            ));
            return $this->db->error();
           }
           public function generar($data) {
                $fecha=date("y-m-d");
               $this->db->where('id',$data['numero_doc']);
               $this->db->update('liquidaciones', array(
                 'estado'         => 'Generado',
                 'generado_fecha' => $fecha,
               ));
               return $this->db->error();
              }
        public function getLiquidaciones($cedula) {
            return $this->db
            ->select('l.*,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo,cl.correo_cliente, cl.nombre_empresa, cl.telefono_cliente, cl.tipo_cliente, cl.nombre_cliente, cl.telefono_cliente, cl.ciudad')
            ->from('liquidaciones l')
            ->join('users u', 'l.user_id = u.user_id')
            ->join('clientes cl', 'l.cedula = cl.cedula_cliente')
            ->join('forma_pago f', 'cl.forma_pago = f.id')
            ->where('l.cedula', $cedula)
            ->get()
            ->result();
          }
          public function getLiquidacion($id) {
              return $this->db
              ->select('l.*,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo,cl.forma_pago ,cl.correo_cliente, cl.nombre_empresa, cl.telefono_cliente, cl.tipo_cliente, cl.nombre_cliente, cl.telefono_cliente, cl.ciudad')
              ->from('liquidaciones l')
              ->join('users u', 'l.user_id = u.user_id')
              ->join('clientes cl', 'l.cedula = cl.cedula_cliente')
              ->join('forma_pago f', 'cl.forma_pago = f.id')
              ->where('l.id', $id)
              ->get()
              ->result();
            }
          public function deleteLiquidaciones($id) {
            $this->db->where('id', $id);
            $this->db->delete('Liquidaciones');
            return $this->db->error();
          }
          public function getCotizaciones($cedula){
              return $this->db
              ->select('c.*, u.username,cl.correo_cliente, cl.nombre_empresa, cl.telefono_cliente')
              ->from('cotizaciones c')
              ->where('c.cedula', $cedula)
              ->where('c.estatus_gestion', 'Aprobada')
              ->join('users u', 'c.user_id = u.user_id')
              ->join('clientes cl', 'c.cedula = cl.cedula_cliente')
              ->get()
              ->result();
          }
          ///////////////////
          public function get_unused_id(){
                // Create a random user id between 1200 and 4294967295
                $random_unique_int = 2147483648 + mt_rand( -2147482448, 2147483647 );

                // Make sure the random user_id isn't already in use
                $query = $this->db->where( 'id', $random_unique_int )
                    ->get_where( $this->db_table('liquidaciones_table') );

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


                                $this->db->select('l.*,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo,cl.correo_cliente, cl.nombre_empresa, cl.telefono_cliente, cl.tipo_cliente, cl.nombre_cliente, cl.telefono_cliente, cl.ciudad')
                                ->from('liquidaciones l')
                                ->where('l.id', $id)
                                ->join('users u', 'l.user_id = u.user_id')
                                ->join('clientes cl', 'l.cedula = cl.cedula_cliente')
                                ->join('forma_pago f', 'cl.forma_pago = f.id');
                                $data = $this->db->get();

                                $output = '<html lang="en">
                                          <head>
                                          <meta charset="utf-8">
                                          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                          <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
                                          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
                                          <title>PLANILLA DE LIQUIDACION TVG CARGOS</title>
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
                                      </style>';

                                      foreach($datos->result() as $row){
                                          $output .= '
                                          <div id="header">
                                            <img class="adapt-img" src="'.base_url($row->logo_uno).'" alt style="display: block;" width="100%" height="68px"></a>
                                          </div>
                                          <div id="footer">
                                            <img class="adapt-img" src="'.base_url($row->logo_dos).'" alt style="display: block;" width="100%" height="68px"></a>
                                          </div>';
                                          }

                                     foreach($data->result() as $row){
                                         $output .= '
                                            <span style="float:right;color:red;font-size:17px;">PLN-'.$row->id.'</span></BR>
                                            <span style="font-weight: bold;font-size:17px;">Bogotá, D.C. '.$row->creado.'</span></BR>
                                                ';
                                                if ($row->tipo_cliente==="Persona jurídica") {
                                                  $output .= '
                                                      <p style="font-weight: bold;font-size:17px; padding: 0;margin: 0;" > Señores '.$row->nombre_empresa.'</p></BR>
                                                         ';
                                                }

                                         $output .= '
                                                <p style="font-weight: bold;font-size:15px; padding: 0;margin: 0;"> Estimad@ '.$row->nombre_cliente.'</p></BR>
                                                <p style="font-weight: bold;font-size:15px; padding: 0;margin: 0;"> Teléfono: '.$row->telefono_cliente.'</p></BR>
                                                <p style="font-weight: bold;font-size:15px; padding: 0;margin: 0;"> Correo electrónico:'.$row->correo_cliente.'</p></BR>
                                                <p style="font-weight: bold;font-size:15px; padding: 0;margin: 0;"> Ciudad:'.$row->ciudad.'</p></BR>
                                                <h2 class="titulos" style="font-weight: bold;font-size:25px;"> PLANILLA DE DESAPACHO  '.$row->tipo_transporte.'</h2>
                                                <p style="font-weight: bold;font-size:15px; padding: 0;margin: 0;">'.$row->ciudad_origen.'-'.$row->ciudad_destino.'</p></BR>
                                                <p style="font-weight: bold;font-size:15px; padding: 0;margin: 0;">COT-'.$row->id_cotizacion.'</p></BR>
                                                <p style="font-weight: bold;font-size:15px; padding: 0;margin: 0;">TARIFA POR KILO O VOLUMEN SE APLICA AL MAYOR VALOR</p></BR>

                                                ';
                                                if ($row->dias==="0") {
                                                $output .= '<p style="font-size:15px; padding: 0;margin: 0;">FORMA DE PAGO:'.$row->forma.':'.$row->descripcion.'</p></BR>';
                                                  }else{
                                                    $output .= '<p style="font-size:15px; padding: 0;margin: 0;">FORMA DE PAGO:'.$row->forma.':'.$row->descripcion.' ('.$row->dias.' Dias) </p></BR>';
                                                  }
                                              }
                                      $output .= '

                                      <div id="content">
                                        <table class="tftable" border="1" cellspacing="0">
                                          <tr
                                          <tr>
                                            <td colspan="2">DESCRIPCION DE CARGA</td>
                                            <td colspan="4">DESCRIPCION DE VOLUMEN </td>
                                            <td colspan="2">DESTINO</td>
                                            <td colspan="1">PRECIO</td>
                                          </tr>
                                          <tr>
                                            <td>TIPO DE CARGA</td>
                                            <td>CANTIDAD</td>
                                            <td>LARGO</td>
                                            <td>ALTO</td>
                                            <td>ANCHO</td>
                                            <td style="white-space: nowrap;">VOL 320!</td>
                                            <td style="white-space: nowrap;">KILOS BASC C/U</td>
                                            <td style="white-space: nowrap;">T.KL REAL</td>
                                            <td style="white-space: nowrap;">VALOR C/U</td>

                                          </tr>';
                                      foreach($data->result() as $row){
                                          $items=$row->items;
                                            foreach(json_decode($items) as $row){
                                              $output .= '
                                                  <tr>
                                                    <td>'.$row->tipocarga.'</td>
                                                    <td>'.$row->cantidad.'</td>
                                                    <td>'.$row->la.'</td>
                                                    <td>'.$row->al.'</td>
                                                    <td>'.$row->an.'</td>
                                                    <td>'.$row->volumen.'</td>
                                                    <td>'.$row->kilosbascula.'</td>
                                                    <td>'.$row->kilostotal.'</td>
                                                    <td>$'.$row->precio.'</td>


                                                  </tr>
                                              ';}
                                        }
                                        foreach($data->result() as $row){
                                            $output .= '
                                                    <tr>
                                                      <td style="white-space: nowrap;">TOTAL UNIDADES </td>
                                                      <td>'.$row->totalUnidades.'</td>
                                                      <td colspan="2" style="border:0px;"></td>
                                                      <td style="white-space: nowrap;">Sumatoria vol.</td>
                                                      <td>'.$row->totalVolumen.'</td>
                                                      <td style="white-space: nowrap;">Sumatoria Kilos.</td>
                                                      <td colspan="2">'.$row->totalKilos.'</td>


                                                    </tr>

                                                    <tr>
                                                      <td colspan="4" style=" border-style: none;"></td>';
                                                      if ($row->totalKilos>=$row->totalVolumen) {
                                                        $output .= '<td colspan="2" style="white-space: nowrap;">VALOR PARA LIQUIDAR</td>
                                                                    <td style="white-space: nowrap;">Sumatoria Kilos. </td>
                                                                    <td colspan="2">'.$row->totalKilos.' kg</td>
                                                             ';
                                                      }else{
                                                        $output .= '<td colspan="2" style="white-space: nowrap;">VALOR PARA LIQUIDAR</td>
                                                                    <td style="white-space: nowrap;">Sumatoria volumen. </td>
                                                                    <td colspan="2">'.$row->totalVolumen.'</td>';
                                                      }

                                                      $output .= '</tr>';
                                                     $output .= '  <tr>
                                                         <td colspan="4" style=" border-style: none;"></td>
                                                         <td colspan="3" style="white-space: nowrap;">VALOR FLETE</td>
                                                                 <td colspan="2" style="white-space: nowrap;">$ '.$row->totalPrecios.'</td></tr>';
                                                    $output .= '  <tr>
                                                        <td colspan=4 style="border-style: none;"></td>
                                                        <td colspan="2" style="white-space: nowrap;">SEGURO SOBRE VALOR DECLARADO</td>
                                                                <td colspan="3" style="white-space: nowrap;">'.$row->segurocarga.' %</td>
                                                                </tr>';
                                                   $output .= '  <tr border="0">
                                                       <td colspan=4 style=" border-style: none;"></td>
                                                       <td colspan="3" style="white-space: nowrap; background:yellow;">TOTAL</td>

                                                               <td colspan="2" style="white-space: nowrap;">$ '.$row->totalPrecios.'</td></tr>';
                                                 }
                                        $output .= '</table>';



                                          $output .= '<p style="font-weight: bold;text-indent: 40px;text-align: justify; font-size:10px;">Quedamos a la espera de sus gratos comentarios y en Pro de seguir fortaleciendo nuestra relacion comercial con su prestigiosa Empresa
.</p>

                                          <p  style="font-size:10px;"> Cordialmente, </p>';
                                          foreach($data->result() as $row){
                                              $output .= '
                                                 <p style="font-size:17px;">'.$row->nombre.' '.$row->apellido.'</p></BR>
                                                 <p style="font-weight: bold;font-size:17px;">'.$row->cargo.'</p></BR>
                                                     ';
                                                   }
                                    $output .= '
                                       </body>
                                      </html>';

                                      return $output;

                            }

    }
