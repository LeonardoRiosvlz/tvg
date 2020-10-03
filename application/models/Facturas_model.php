<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Facturas_model extends MY_Model {
        public function insertar($data){
            $this->db->insert('facturas', array(
                'id'     => $data['id'],
                'user_id'     => $data['user_id'],
                'fecha'     => $data['fecha'],
                'f_vencimiento'     => $data['f_vencimiento'],
                'cedula'     => $data['cedula'],
                'nombre_cliente'     => $data['nombre_cliente'],
                'direccion_cliente'     => $data['direccion_cliente'],
                'telefono_cliente'     => $data['telefono_cliente'],
                'ciudad_cliente'     => $data['ciudad_cliente'],
                'items'     => json_encode($data['items']),
                'notas'     => json_encode($data['notas']),
                'forma_pago'     => $data['forma_pago'],
                'precio_letras'     => $data['precio_letras'],
                'total'     => $data['total'],
                'dias_demora'     => $data['dias_demora'],
                'correo_cliente'     => $data['correo_cliente'],
                'estado'     => 'Creado ',
                'alertar'     => 'Si ',
            ));
            return $this->db->error();
        }
        public function generar($data) {
            $this->db->where('id',$data['numero_doc']);
            $this->db->update('facturas', array(
              'estado'         => 'Generado',
            ));
            return $this->db->error();
           }
           public function generar_enviar($data) {
               $this->db->where('id',$data['id']);
               $this->db->update('facturas', array(
                 'estado'     => 'Enviado',
               ));
               return $this->db->error();
              }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('facturas', array(
              'user_id'     => $data['user_id'],
              'fecha'     => $data['fecha'],
              'f_vencimiento'     => $data['f_vencimiento'],
              'cedula'     => $data['cedula'],
              'nombre_cliente'     => $data['nombre_cliente'],
              'direccion_cliente'     => $data['direccion_cliente'],
              'telefono_cliente'     => $data['telefono_cliente'],
              'ciudad_cliente'     => $data['ciudad_cliente'],
              'items'     => json_encode($data['items']),
              'notas'     => json_encode($data['notas']),
              'forma_pago'     => $data['forma_pago'],
              'precio_letras'     => $data['precio_letras'],
              'total'     => $data['total'],
              'dias_demora'     => $data['dias_demora'],
              'correo_cliente'     => $data['correo_cliente'],
            ));
            return $this->db->error();
           }
           public function cancelar($data) {
               $this->db->where('id',$data['id']);
               $this->db->update('facturas', array(
                 'url_foto'     => $data['url_foto'],
                 'estado'     => 'Cancelado',
                 'alertar'     => 'No',
               ));
               return $this->db->error();
              }
              public function anular($data) {
                  $this->db->where('id',$data['id']);
                  $this->db->update('facturas', array(
                    'url_foto'     => $data['url_foto'],
                    'estado'     => 'Anulado',
                  ));
                  return $this->db->error();
                 }
        public function getfacturas() {
            return $this->db
            ->select('*')
            ->select("TIMESTAMPDIFF(DAY,f_vencimiento, CURDATE()) AS age", false)
            ->from('facturas')
            ->get()
            ->result();
          }
          public function get_factura($id) {
              return $this->db
              ->select('*')
              ->from('facturas')
              ->where('id', $id)
              ->get()
              ->result();
            }
            public function dejarNotificar($id) {
              $this->db->where('id',$id);
              $this->db->update('facturas', array(
                'alertar'     => 'No',
              ));
              return $this->db->error();
              }
          public function get_tiempo($datas) {
              return $this->db
              ->select('*')
              ->from('facturas')
              ->where('fecha >=', $datas['desde'])
              ->where('fecha <=', $datas['hasta'])
              ->get()
              ->result();
            }
            public function get_cedula($datas) {
                return $this->db
                ->select('*')
                ->from('facturas')
                ->where('cedula', $datas['cedula'])
                ->get()
                ->result();
              }
              public function get_estado($datas) {
                  return $this->db
                  ->select('*')
                  ->from('facturas')
                  ->where('estado', $datas['estado'])
                  ->get()
                  ->result();
                }
                public function get_fecha_cedula($datas) {
                    return $this->db
                    ->select('*')
                    ->from('facturas')
                    ->where('fecha >=', $datas['desde'])
                    ->where('fecha <=', $datas['hasta'])
                    ->where('cedula', $datas['cedula'])
                    ->get()
                    ->result();
                  }
                  public function get_fecha_estado_cedula($datas) {
                      return $this->db
                      ->select('*')
                      ->from('facturas')
                      ->where('fecha >=', $datas['desde'])
                      ->where('fecha <=', $datas['hasta'])
                      ->where('cedula', $datas['cedula'])
                      ->where('estado', $datas['estado'])
                      ->get()
                      ->result();
                    }
                  public function get_fecha_estado($datas) {
                      return $this->db
                      ->select('*')
                      ->from('facturas')
                      ->where('fecha >=', $datas['desde'])
                      ->where('fecha <=', $datas['hasta'])
                      ->where('estado', $datas['estado'])
                      ->get()
                      ->result();
                    }
                    public function get_cedula_estado($datas) {
                        return $this->db
                        ->select('*')
                        ->from('facturas')
                        ->where('estado', $datas['estado'])
                        ->where('cedula', $datas['cedula'])
                        ->get()
                        ->result();
                      }
          public function deletefacturas($id) {
            $this->db->where('id', $id);
            $this->db->delete('facturas');
            return $this->db->error();
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
                      //////////PDF
                      function fetch_details($id){
                       $this->db->select('*')
                        ->from('empresa')
                        ->where('id', 1);
                        $datos=$this->db->get();


                          $this->db->select('*')
                          ->from('facturas')
                          ->where('id', $id);
                          $data = $this->db->get();

                          $output = '<html lang="en">
                                    <head>
                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
                                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
                                    <title>FACTURA DE VENTA-TVG CARGOS</title>
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
                                      <img class="adapt-img" src="'.base_url($row->logo_uno).'" alt style="display: block;" width="100%" height="68px"></a>';
                                      foreach($data->result() as $rows){
                                        if ($rows->estado=="Anulado") {
                                          $output .= '
                                      <h1 style="color:red;transform: rotate(-40deg);font-size:80px;opacity:0.2px;">ANULADA</h1>
                                      ';
                                        }
                                      }
                                  $output .= '  </div>
                                    <div id="footer">
                                      <img class="adapt-img" src="'.base_url($row->logo_dos).'" alt style="display: block;" width="100%" height="68px"></a>
                                    </div>';
                                    }
                              foreach($data->result() as $row){
                                  $output .= '
                               <div class="container">

                               <div class="row">
                                      <ul class="list-group" style="width:57%; float:left">
                                          <li class="list-group-item " style=" height:10px!important;">Cliente : '.$row->nombre_cliente.'</li>
                                          <li class="list-group-item " style=" height:10px!important;">NIT : '.$row->cedula.' </li>
                                          <li class="list-group-item "style=" height:10px!important;" >Dirección : '.$row->direccion_cliente.'</li>
                                          <li class="list-group-item " style=" height:10px!important;">Teléfono: '.$row->telefono_cliente.'</li>
                                          <li class="list-group-item " style=" height:10px!important;">Ciudad: '.$row->ciudad_cliente.'</li>
                                        </ul>
                                        <div class="list-group" style="width:40%;float:right;">
                                          <a href="#" class="list-group-item list-group-item-success" style=" font-size:30px; height:49px!important;">FV-'.$row->id.'</a>
                                          <a href="#" class="list-group-item  " styles="font-size:10px;">Fecha: '.$row->fecha.'</a>
                                          <a href="#" class="list-group-item " styles="font-size:10px;">Vencimiento: '.$row->f_vencimiento.'</a>
                                        </div>
                                    </div>
                                    ';
                                    }
                                    $output .= '<div class="row">
                                    <div class="panel panel-default">
                                      <div class="panel-heading"></div>
                                      <div class="panel-body">
                                      <table class="table border-0" width="100%"  >
                                        <thead>
                                          <tr>
                                            <th style="border-left:0;border-right:0;" colspan="2">Descripción</th>
                                            <th style="border-left:0;border-right:0;">Valor</th>
                                          </tr>
                                        </thead>
                                        <tbody>';
                                        foreach($data->result() as $row){
                                            $items=$row->items;
                                              foreach(json_decode($items) as $row){
                                                $output .= '
                                          <tr>
                                            <td style="border-left:0;border-right:0;" colspan="2">Valor correspondiente al transporte '.$row->tipo_transporte.', (Nº guía '.$row->n_guia.' ),'.$row->origen.'-'.$row->destino.'.</td>
                                            <td style="border-left:0;border-right:0;">$ '.$row->total.'</td>
                                          </tr>';}
                                        }
                                      $output .= '
                                        </tbody>
                                      </table>
                                      </div>
                                      </div>
                                    </div>
                                        <div class="row">
                                        <div class="panel panel-default">
                                          <div class="panel-heading">Notas</div>
                                          <div class="panel-body">';
                                          foreach($data->result() as $row){
                                              $items=$row->notas;
                                                foreach(json_decode($items) as $row){
                                                  $output .= '<p>'.$row->descripcion.'</p>';}
                                          }
                                        $output .= '</div>
                                          </div>
                                        </div>
                                        <div class="row">
                                        <div class="panel panel-default">';
                                        foreach($data->result() as $row){
                                            $output .= '
                                          <div class="panel-heading">Tipo de pago</div>
                                          <div class="panel-body">
                                            '.$row->forma_pago.'.
                                            Son:'.$row->precio_letras.'
                                          </div>
                                          </div>';}
                                      $output .='</div>
                                        <div class="row">
                                        <div class="panel panel-default" style="width:65%; float:left">
                                          <div class="panel-heading">Firma Aturizada</div>
                                        </div>';
                                        foreach($data->result() as $row){
                                        $output .= '<ul class="list-group" style="width:30%; float:right">

                                            <li class="list-group-item " style=" height:30px!important;">TOTAL:$ '.$row->total.'</li>
                                          </ul>
                                  </div>';}

                              $output .= '
                                 </body>
                                </html>';

                                return $output;

                      }
    }
