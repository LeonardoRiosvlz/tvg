<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Actas_recogida_model extends MY_Model {
        public function insertar($data){
            $fecha=date("Y-m-d");
            $this->db->insert('actas_recogida', array(
                'id'     => $data['id'],
                'nombre_empresa'     => $data['nombre_empresa'],
                'codigo'     => $data['codigo'],
                'creado'     => $fecha,
                'version'     => $data['version'],
                'direccion_cliente'     => $data['direccion_cliente'],
                'telefono_cliente'     => $data['telefono_cliente'],
                'correo_cliente'     => $data['correo_cliente'],
                'id_cliente'     => $data['id_cliente'],
                'ciudad_cliente'     => $data['ciudad_cliente'],
                'ciudad_origen'     => $data['ciudad_origen'],
                'departamento_origen'     => $data['departamento_origen'],
                'ciudad_destino'     => $data['ciudad_destino'],
                'departamento_destino'     => $data['departamento_destino'],
                'dep'     => $data['dep'],
                'depp'     => $data['depp'],
                'barrio'     => $data['barrio'],
                'cedula_c'     => $data['cedula_c'],
                'placa'     => $data['placa'],
                'conductor'     => $data['conductor'],
                'fecha_recogida'     => $data['fecha_recogida'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $fecha=date("Y-m-d");
            $this->db->where('id',$data['id']);
            $this->db->update('actas_recogida', array(
              'nombre_empresa'     => $data['nombre_empresa'],
              'codigo'     => $data['codigo'],
              'creado'     => $fecha,
              'version'     => $data['version'],
              'direccion_cliente'     => $data['direccion_cliente'],
              'telefono_cliente'     => $data['telefono_cliente'],
              'correo_cliente'     => $data['correo_cliente'],
              'id_cliente'     => $data['id_cliente'],
              'ciudad_cliente'     => $data['ciudad_cliente'],
              'ciudad_origen'     => $data['ciudad_origen'],
              'departamento_origen'     => $data['departamento_origen'],
              'ciudad_destino'     => $data['ciudad_destino'],
              'departamento_destino'     => $data['departamento_destino'],
              'dep'     => $data['dep'],
              'depp'     => $data['depp'],
              'barrio'     => $data['barrio'],
              'cedula_c'     => $data['cedula_c'],
              'placa'     => $data['placa'],
              'conductor'     => $data['conductor'],
              'fecha_recogida'     => $data['fecha_recogida'],
            ));
            return $this->db->error();
           }
        public function getactas_recogida() {
            return $this->db
            ->select('*')
            ->from('actas_recogida')
            ->get()
            ->result();
          }
          public function getacta_recogida($id) {
              return $this->db
              ->select('*')
              ->from('actas_recogida')
              ->where('id', $id)
              ->get()
              ->result();
            }
          public function deleteactas_recogida($id) {
            $this->db->where('id', $id);
            $this->db->delete('actas_recogida');
            return $this->db->error();
          }
          public function get_unused_id(){
                // Create a random user id between 1200 and 4294967295
                $random_unique_int = 2147483648 + mt_rand( -2147482448, 2147483647 );

                // Make sure the random user_id isn't already in use
                $query = $this->db->where( 'id', $random_unique_int )
                    ->get_where( $this->db_table('satelites_table') );

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
                                            ->from('actas_recogida')
                                            ->where('id',$id);
                                $data = $this->db->get();

                                $output = '<html lang="en">
                                          <head>
                                          <meta charset="utf-8">
                                          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                          <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
                                          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
                                          <title>ACTA DE ENTREGA TVG CARGOS</title>
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
                                          $output .='
                                          <div id="header">
                                            <img class="adapt-img" src="'.base_url($row->logo_uno).'" alt style="display: block;" width="100%" height="68px"></a>
                                          </div>
                                          <div id="footer">
                                            <img class="adapt-img" src="'.base_url($row->logo_dos).'" alt style="display: block;" width="100%" height="68px"></a>
                                          </div>';
                                          }

                                     foreach($data->result() as $row){
                                         $output .= '
                                            <p style="text-align: right;color:red;font-size:15px;">SERIAL-'.$row->id.'</p></BR>
                                            <p style="font-size:15px; "> '.$row->ciudad_destino.'  '.$row->creado.'</p></BR>
                                            <h2 style="font-weight: bold;font-size:25px;text-align: center;" >ACTA DE RECOGIDA</h2></BR>
                                            <p style="text-align: right;font-weight: bold;font-size:17px;padding: 0;margin: 0;">CODIGO:'.$row->codigo.'</p></BR>
                                            <p style="text-align: right;font-weight: bold;font-size:17px;0;">VERSIÓN:'.$row->version.'</p></BR>
                                            <p style="font-size:17px;padding: 0;margin: 0;">Señores</p></BR>
                                            <p style="font-weight: bold;font-size:17px;padding: 0;margin: 0;">'.$row->nombre_empresa.'</p></BR>
                                            <p style="font-weight: bold;font-size:17px;padding: 0;margin: 0;">Dirección: '.$row->direccion_cliente.'</p></BR>
                                            <p style="font-weight: bold;font-size:17px;padding: 0;margin: 0;">Cel: '.$row->telefono_cliente.'</p></BR>
                                            <h3 style="font-weight: bold;font-size:17px;text-align: center;" >ACTA DE ENTREGA DE CARGA</h3></BR>
                                            <p style="font-size:16px; padding: 0;margin: 0;text-align: center;" >Carga Transportada desde ('.$row->ciudad_origen.') hasta ('.$row->ciudad_destino.')</p></BR>
                                            <p style="font-size:14px; text-indent: 40px;text-justify: inter-word;text-align: justify; padding: 0;margin: 0;">Por medio de la presente nos permitimos informar los datos de nuestro conductor, quien será responsable de recoger la
mercancía en sus instalaciones, el día '.$row->fecha_recogida.'.</p></BR>
                                            <p style="font-weight: bold;font-size:17px;padding: 0;margin: 0;">Nombre:'.$row->conductor.'</p></BR>
                                            <p style="font-weight: bold;font-size:17px;padding: 0;margin: 0;">C.C.'.$row->cedula_c.'</p></BR>
                                            <p style="font-weight: bold;font-size:17px;padding: 0;margin: 0;">Datos del Vehículo: '.$row->placa.'</p></BR>';

                                              }
                                        foreach($data->result() as $row){
                                            $output .= '
                                                <p style="font-weight: bold;font-size:17px;0;">NOTA.</p></BR>
                                                <p style="font-size:14px; text-indent: 40px;text-justify: inter-word;text-align: justify; "> TVG CARGO S.A.S y la póliza, No cubre daños en Tanques de almacenamiento de Agua, vidrios, mármol, porcelanas,
baldosas, cielorrasos, vasos de vidrio, cuadros, lámparas, bombillos, arcilla, artesanías en barro y demás derivados a los
anteriores elementos mencionados anteriormente, estos elementos viajan bajo responsabilidad del remitente y/o cliente y
se reciben cajas sellas sin verificar contenido ni cantidades internas.
</p></BR>
                                                <p style="font-size:14px; text-indent: 40px;text-justify: inter-word;text-align: justify; ">Número de cajas entregada:_____________________________</p></BR>
                                                <p style="font-size:14px; text-indent: 40px;text-justify: inter-word;text-align: justify;margin-button: 40px;">DESCRIPCIÓN:_____________________________________________________________________________</p></BR>
                                                <p style="font-size:14px; text-indent: 40px;text-justify: inter-word;text-align: justify; padding: 0;margin-button: 40px;">__________________________________________________________________________________________</p></BR>
                                                <p style="font-size:14px; text-indent: 40px;text-justify: inter-word;text-align: justify; padding: 0;margin-button: 40px;">__________________________________________________________________________________________</p></BR>

                                                <p style="font-size:14px; text-indent: 40px;text-justify: inter-word;text-align: justify; ">Datos de quien entrega la carga por parte de '.$row->nombre_empresa.', son:</p></BR>
<p style="font-size:14px; text-indent: 60px;text-justify: inter-word;text-align: justify; ">FIRMA: ___________________________________    FECHA:___________________________________ </p></BR>
<p style="font-size:14px; text-indent: 60px;text-justify: inter-word;text-align: justify; ">NOMBRE:___________________________________    CC:   ___________________________________ </p></BR>
<p style="font-size:14px; text-indent: 60px;text-justify: inter-word;text-align: justify; ">Tel de contacto: ___________________________________ </p></BR>';
                                              }
                                    $output .= '
                                       </body>
                                      </html>';

                                      return $output;

                            }


    }
