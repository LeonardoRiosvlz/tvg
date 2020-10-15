<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Cotizaciones_model extends  MY_Model {
        public function insertar($data){
            $this->db->insert('cotizaciones', array(
                'id'         => $data['id'],
                'user_id'    => $data['user_id'],
                'vnota'      => $data['vnota'],
                'codigo'      => $data['codigo'],
                'status'      => 'Borrador',
                'estatus_gestion' => 'Borrador',
                'cedula'      => $data['cedula'],
                'tiempo'     => $data['tiempo'],
                'items'      => json_encode($data['items']),
                'notas'      => json_encode($data['notas']),
                'saludo'     => json_encode($data['saludo']),
                'contrato'     => json_encode($data['contrato']),
                'observaciones'     => $data['observaciones'],
                'f_vencimiento'     => $data['f_vencimiento'],
            ));
            return $this->db->error();
        }
        public function inseRecalculada($data){
            $this->db->insert('historialcotizaciones', array(
                'id_cotizacion'         => $data['id'],
                'user_id'    => $data['user_id'],
                'vnota'      => $data['vnota'],
                'status'      => 'Borrador',
                'estatus_gestion' => 'Borrador',
                'cedula'      => $data['cedula'],
                'tiempo'     => $data['tiempo'],
                'observaciones'     => $data['observaciones'],
                'items'      => json_encode($data['items']),
                'notas'      => json_encode($data['notas']),
                'saludo'     => json_encode($data['saludo']),
                'contrato'     => json_encode($data['contrato']),
            ));
            return $this->db->error();
        }
        public function generar_enviar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('cotizaciones', array(
              'status'     => 'Enviado',
              'estatus_gestion'     => 'Enviado',
            ));
            return $this->db->error();
           }
           public function generar($data) {
               $this->db->where('id',$data['id']);
               $this->db->update('cotizaciones', array(
                 'status'     => 'Generado',
               ));
               return $this->db->error();
              }
          public function estudio($data) {
              $this->db->where('id',$data['id']);
              $this->db->update('cotizaciones', array(
                'estatus_gestion'     => 'En estudio',
              ));
              return $this->db->error();
             }
             public function editarEstads($data) {
               $this->db->where('id',$data['id']);
               $this->db->update('cotizaciones', array(
                 'estatus_gestion'     => $data['estatus_gestion'],
               ));
               return $this->db->error();
                }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('cotizaciones', array(
              'user_id'    => $data['user_id'],
              'vnota'      => $data['vnota'],
              'status'      => 'Borrador',
              'observaciones'     => $data['observaciones'],
              'estatus_gestion' => $data['estatus_gestion'],
              'items'      => json_encode($data['items']),
              'notas'      => json_encode($data['notas']),
              'saludo'     => json_encode($data['saludo']),
              'contrato'     => json_encode($data['contrato']),
              'f_vencimiento'     => $data['f_vencimiento'],
            ));
            return $this->db->error();
           }
           public function renegociar($data) {
               $this->db->where('id',$data['id']);
               $this->db->update('cotizaciones', array(
                 'user_id'    => $data['user_id'],
                 'vnota'      => $data['vnota'],
                 'status'      => 'Borrador',
                 'estatus_gestion' => 'Editado',
                 'items'      => json_encode($data['items']),
                 'notas'      => json_encode($data['notas']),
                 'saludo'     => json_encode($data['saludo']),
                 'contrato'     => json_encode($data['contrato']),
                 'f_vencimiento'     => $data['f_vencimiento'],
               ));
               return $this->db->error();
              }

        public function getcotizacionesu($id) {
            return $this->db
            ->select('c.*, u.username,cl.correo_cliente, cl.nombre_empresa,cl.nombre_cliente, cl.telefono_cliente')
            ->select("TIMESTAMPDIFF(DAY,c.f_vencimiento, CURDATE()) AS age", false)
            ->from('cotizaciones c')
            ->where('c.user_id',$id)
            ->join('users u', 'c.user_id = u.user_id', 'left outer')
            ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
            ->get()
            ->result();
          }
          public function getcc($id) {
              return $this->db
              ->select('c.*, u.username,cl.correo_cliente, cl.nombre_empresa,cl.nombre_cliente, cl.telefono_cliente')
              ->select("TIMESTAMPDIFF(DAY,c.f_vencimiento, CURDATE()) AS age", false)
              ->from('cotizaciones c')
              ->where('c.cedula',$id)
              ->join('users u', 'c.user_id = u.user_id', 'left outer')
              ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
              ->get()
              ->result();
            }
            public function getcca($id) {
                return $this->db
                ->select('c.*, u.username,cl.correo_cliente, cl.nombre_empresa,cl.nombre_cliente, cl.telefono_cliente')
                ->select("TIMESTAMPDIFF(DAY,c.f_vencimiento, CURDATE()) AS age", false)
                ->from('cotizaciones c')
                ->where('c.cedula',$id)
                ->where('c.estatus_gestion',"Aprobada")
                ->join('users u', 'c.user_id = u.user_id', 'left outer')
                ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
                ->get()
                ->result();
              }
          public function getcotizaciones() {
              return $this->db
              ->select('c.*, u.username,cl.correo_cliente, cl.nombre_empresa,cl.nombre_cliente, cl.telefono_cliente')
              ->select("TIMESTAMPDIFF(DAY,c.f_vencimiento, CURDATE()) AS age", false)
              ->from('cotizaciones c')
              ->join('users u', 'c.user_id = u.user_id', 'left outer')
              ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
              ->get()
              ->result();
            }

          public function getcotizacionesr() {
              return $this->db
              ->select('c.*, u.username,cl.correo_cliente, cl.nombre_empresa,cl.nombre_cliente, cl.telefono_cliente')
              ->select("TIMESTAMPDIFF(DAY,c.f_vencimiento, CURDATE()) AS age", false)
              ->from('historialcotizaciones c')
              ->join('users u', 'c.user_id = u.user_id', 'left outer')
              ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
              ->get()
              ->result();
            }
          public function getcotizacion($data) {
              return $this->db
              ->select('c.*,u.nombre,u.apellido,u.cargo, u.username,cl.*')
              ->select("TIMESTAMPDIFF(DAY,c.f_vencimiento, CURDATE()) AS age", false)
              ->from('cotizaciones c')
              ->where('c.id',$data['id'])
              ->where('codigo',$data['codigo'])
              ->join('users u', 'c.user_id = u.user_id', 'left outer')
              ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer')
              ->get()
              ->result();
            }
          public function deletecotizaciones($id) {
            $this->db->where('id', $id);
            $this->db->delete('cotizaciones');
            return $this->db->error();
          }
          ////////////////
          public function imagen_insert($data) {
              $this->db->insert('documentos_cotizaciones', array(
                  'tiempo'          => $data['tiempo'],
                  'id_cliente'          => $data['id_cliente'],
                  'url'             => $data['url'],
                  'nombre'             => $data['nombre'],
              ));
              return $this->db->error();
             }
          public function imagenes_get($data){
           return $this->db
              ->select('*')
               ->from('documentos_cotizaciones')
               ->where('id_cliente',$data['id_cliente'])
               ->where('tiempo',$data['tiempo'])
               ->get()
               ->result();
              }
              public function eliminarImagen($id) {
                $this->db->where('id', $id);
                $this->db->delete('documentos_cotizaciones');
                return $this->db->error();
              }
              ///////////////////
              public function get_unused_id(){
                    // Create a random user id between 1200 and 4294967295
                    $random_unique_int = 2147483648 + mt_rand( -2147482448, 2147483647 );

                    // Make sure the random user_id isn't already in use
                    $query = $this->db->where( 'id', $random_unique_int )
                        ->get_where( $this->db_table('cotizaciones_table') );

                    if( $query->num_rows() > 0 )
                    {
                        $query->free_result();

                        // If the random user_id is already in use, try again
                        return $this->get_unused_id();
                    }

                    return $random_unique_int;
                }


////////////////////////// pdf ///////////////////////
//////////PDF
                function fetch_details($codigo,$id){
                 $this->db->select('*')
                  ->from('empresa')
                  ->where('id', 1);
                  $datos=$this->db->get();


                    $this->db->select('c.*, u.username,u.nombre,u.apellido,u.cargo,cl.correo_cliente, cl.nombre_empresa,cl.nombre_cliente, cl.telefono_cliente, cl.tipo_cliente, cl.nombre_cliente, cl.telefono_cliente, cl.ciudad')
                    ->from('cotizaciones c')
                    ->where('c.id', $id)
                    ->where('c.codigo',$codigo)
                    ->join('users u', 'c.user_id = u.user_id', 'left outer')
                    ->join('clientes cl', 'c.cedula = cl.cedula_cliente', 'left outer');
                    $data = $this->db->get();

                    $output = '<html lang="en">
                              <head>
                              <meta charset="utf-8">
                              <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                              <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
                              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
                              <title>COTIZACIÓN TVG CARGOS</title>
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
                                ';
                                foreach($data->result() as $rows){
                                  if ($rows->estatus_gestion=="Anulada") {
                                    $output .= '
                                <h1 style="color:red;transform: rotate(-40deg);font-size:80px;opacity:0.2px;">ANULADA</h1>
                                ';
                                  }
                                }
                            $output .= '
                              </div>
                              <div id="footer">
                                <img class="adapt-img" src="'.base_url($row->logo_dos).'" alt style="display: block;" width="100%" height="68px"></a>
                              </div>';
                              }

                         foreach($data->result() as $row){
                             $output .= '
                                <p class="lead text-right" style="color:red;font-size:17px; margin:0;padding:0; float:right">  COT-'.$row->id.'</p></BR>
                                 <p style="font-size:17px; margin:0;padding:0;float:right;color:grey;">('.$row->nombre.' '.$row->apellido.')</p></BR>
                                <p class="lead text-right" style="color:grey;font-size:14px;margin:0;padding:0;">Válido hasta: '.$row->f_vencimiento.'</p></BR>
                                <p class="lead text-left" style="font-size:15px;">Bogotá, D.C. '.$row->fecha_creacion.'</sp</BR>
                                    ';
                                    if ($row->tipo_cliente==="Persona jurídica") {
                                      $output .= '
                                          <p style="font-weight: bold;font-size:19px; padding: 0;margin-top:15px;margin-button:0;" > Señores '.$row->nombre_empresa.'</p></BR>
                                             ';
                                    }

                             $output .= '
                                    <p style="font-size:19px; padding: 0;margin: 0;"> Estimad@ '.$row->nombre_cliente.'</p></BR>
                                    <p style="font-size:19px; padding: 0;margin: 0;"> Teléfono: '.$row->telefono_cliente.'</p></BR>
                                    <p style="font-size:19px; padding: 0;margin: 0;"> Correo electrónico:'.$row->correo_cliente.'</p></BR>
                                    <p style="font-size:19px; padding: 0;margin: 0;"> Ciudad:'.$row->ciudad.'</p></BR>
                                    <h4 class="titulos text-center" style="font-weight: bold;font-size:19px;;"> REF: COTIZACIÓN TRANSPORTE A DIFERENTES DESTINOS </h4>
                                    <h5 class="titulos" style="font-weight: bold;font-size:19px;">Estimados Señores:</h5>
                                    ';
                                  }
                        foreach($data->result() as $row){
                            $saludo=$row->saludo;
                              foreach(json_decode($saludo) as $row){
                                $output .= '
                                      <p style="font-weight: bold;text-indent: 40px;text-align: justify; font-size:17px;">'.$row->resumen.'</p></BR>
                                      <p style="text-indent: 40px;text-align: justify;font-size:17px;">'.$row->descripcion.'</p></BR>
                                      <div style="page-break-after:always;"></div>
                                ';}
                          }
                          $output .= '
                          <h4 class="titulos" style="font-weight: bold;"> Resumen de Tarifas</h4>
                          <div id="content">
                            <table class="table">
                              <tr
                              <tr>
                                <td>TRANSPORTE</td>
                                <td>ORIGEN</td>
                                <td>DESTINO</td>
                                <td>VALOR KILO/UNIDAD</td>
                                <td>VALOR SEGURO</td>
                                <td>COSTE DE GUIA</td>
                                <td>ITINERARIO</td>
                              </tr>';
                          foreach($data->result() as $row){
                              $items=$row->items;
                                foreach(json_decode($items) as $row){
                                  $output .= '
                                      <tr>
                                        <td>'.$row->tipo_transporte.'</td>
                                        <td>'.$row->ciudad_origen.'</td>
                                        <td>'.$row->ciudad_destino.'</td>
                                        <td>$'.$row->precio.'</td>
                                        <td>'.$row->segurocarga.'% del valor declarado de la mercancía</td>
                                        <td>$'.$row->costeguia.'</td>
                                        <td>'.$row->itinerarios.'</td>
                                      </tr>
                                  ';}
                            }
                            $output .= '</table>';
                            foreach($data->result() as $row){
                              if ($row->vnota==="Si") {
                                $output .= '
                                <h5 class="titulos tex-center" style="font-size:19px;;">NOTAS RELACIONADAS A EL TIPO DE TRANSPORTE </h5>
                                </hr>';
                                foreach($data->result() as $row){
                                    $notas=$row->notas;
                                      foreach(json_decode($notas) as $row){
                                        $output .= '
                                        <p style="text-indent: 40px;text-align: justify; font-size:14px;"><span style="font-weight: bold;">'.$row->tipo_transporte.'-'.$row->resumen.'</span>:'.$row->descripcion.'</p></BR>
                                        ';}
                                  }
                              }

                             }

                              $output .= '<div style="page-break-after:always;"></div>
                              <h5 class="titulos" style="font-weight: bold;font-size:19px;;">NOTAS DE CONTRATO</h5>';
                              foreach($data->result() as $row){
                                  $contrato=$row->contrato;
                                    foreach(json_decode($contrato) as $row){
                                      $output .= '
                                        <p style="text-indent: 20px;text-align: justify; font-size:10px;"><span style="font-weight: bold;">'.$row->resumen.'</span>:'.$row->descripcion.'</p></BR>
                                      ';}
                                }
                              $output .= '<p style="font-weight: bold;text-indent: 40px;text-align: justify; font-size:10px;">De requerir información sobre otras rutas, tarifas y condiciones por favor indíquenos la información y con gusto le presentaremos la Propuesta comercial.</p>
                              <p style="font-size:10px;">Estaremos muy atentos a sus comentarios y requerimientos;</p>
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
