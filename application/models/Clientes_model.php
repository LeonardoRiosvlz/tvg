<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Clientes_model extends CI_Model {

      private $_id;
      private $_nit_cliente;
      private $_nombre_empresa;
      private $_r_legal;
      private $_nombre_cliente;
      private $_cedula_cliente;
      private $_telefono_cliente;
      private $_correo_cliente;
      private $_departamento;
      private $_ciudad;
      private $_dep;
      private $_fecha_inactivo;
      private $_fecha_registro;
      private $_direccion_cliente;
      private $_estado;
      private $_tipo_cliente;
      private $_sucursal;
      private $_forma_pago;
      private $_autorizador;
      private $_cliente_especial;
      private $_observacion;

          public function setID($id) {
              $this->_customerID = $customerID;
          }
          public function setNit($nit_cliente) {
              $this->_nit_cliente = $nit_cliente;
          }
          public function setNombreEmpresa($nombre_empresa) {
              $this->_nombre_empresa = $nombre_empresa;
          }
          public function setReLegal($r_legal) {
              $this->_r_legal = $r_legal;
          }
          public function setNombreCliente($nombre_cliente) {
              $this->_nombre_cliente = $nombre_cliente;
          }
          public function setCedulaCliente($cedula_cliente) {
              $this->_cedula_cliente = $cedula_cliente;
          }
          public function setTelefonoCliente($telefono_cliente) {
              $this->_telefono_cliente = $telefono_cliente;
          }
          public function setCorreoCliente($correo_cliente) {
              $this->_correo_cliente = $correo_cliente;
          }
          public function setDepartamento($departamento) {
              $this->_departamento = $departamento;
          }

          public function setCiudad($ciudad) {
              $this->_ciudad = $ciudad;
          }
          public function setDep($dep) {
              $this->_dep = $dep;
          }
          public function setFechaInactivo($fecha_inactivo) {
              $this->_fecha_inactivo = $fecha_inactivo;
          }
          public function setFechaRegistro($fecha_registro) {
              $this->_fecha_registro = $fecha_registro;
          }
          public function setDireccionCliente($direccion_cliente) {
              $this->_direccion_cliente = $direccion_cliente;
          }
          public function setEstado($estado) {
              $this->_estado = $estado;
          }
          public function setTipoCliente($tipo_cliente) {
              $this->_tipo_cliente = $tipo_cliente;
          }
          public function setSucursal($sucursal) {
              $this->_sucursal = $sucursal;
          }
          public function setFormaPago($forma_pago) {
              $this->_forma_pago = $forma_pago;
          }
          public function setAutorizador($autorizador) {
              $this->_autorizador = $autorizador;
          }
          public function setClienteEspecial($cliente_especial) {
              $this->_cliente_especial = $cliente_especial;
          }
          public function setObservacion($observacion) {
              $this->_observacion = $observacion;
          }
        public function insertar($data){
            $this->db->insert('clientes', array(
                'nit_cliente'     => $data['nit_cliente'],
                'nombre_empresa'     => $data['nombre_empresa'],
                'r_legal'     => $data['r_legal'],
                'nombre_cliente'     => $data['nombre_cliente'],
                'cedula_cliente'     => $data['cedula_cliente'],
                'telefono_cliente'     => $data['telefono_cliente'],
                'correo_cliente'     => $data['correo_cliente'],
                'departamento'     => $data['departamento'],
                'ciudad'     => $data['ciudad'],
                'dep'     => $data['dep'],
                'fecha_inactivo'     => $data['fecha_inactivo'],
                'direccion_cliente'     => $data['direccion_cliente'],
                'estado'     => $data['estado'],
                'tipo_cliente'     => $data['tipo_cliente'],
                'sucursal'     => $data['sucursal'],
                'forma_pago'     => $data['forma_pago'],
                'autorizador'     => $data['autorizador'],
                'cliente_especial'     => $data['cliente_especial'],
                'observacion'     => $data['observacion'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('clientes', array(
              'nit_cliente'     => $data['nit_cliente'],
              'nombre_empresa'     => $data['nombre_empresa'],
              'r_legal'     => $data['r_legal'],
              'nombre_cliente'     => $data['nombre_cliente'],
              'cedula_cliente'     => $data['cedula_cliente'],
              'telefono_cliente'     => $data['telefono_cliente'],
              'correo_cliente'     => $data['correo_cliente'],
              'departamento'     => $data['departamento'],
              'ciudad'     => $data['ciudad'],
              'dep'     => $data['dep'],
              'direccion_cliente'     => $data['direccion_cliente'],
              'estado'     => $data['estado'],
              'fecha_inactivo'     => $data['fecha_inactivo'],
              'tipo_cliente'     => $data['tipo_cliente'],
              'sucursal'     => $data['sucursal'],
              'forma_pago'     => $data['forma_pago'],
              'autorizador'     => $data['autorizador'],
              'cliente_especial'     => $data['cliente_especial'],
              'observacion'     => $data['observacion'],
            ));
            return $this->db->error();
           }
        public function getclientes() {
            return $this->db
            ->select('c.*,u.nombre,u.apellido, s.nombre_sucursal, f.forma')
            ->from('clientes C')
            ->join('users u', 'c.autorizador = u.user_id')
            ->join('sucursales s', 'c.sucursal = s.id')
            ->join('forma_pago f', 'c.forma_pago = f.id')
            ->get()
            ->result();
          }
          public function get_clientes() {
              return $this->db
              ->select('*')
              ->from('clientes')
              ->get()
              ->result_array();
            }
          public function deleteclientes($id) {
            $this->db->where('id', $id);
            $this->db->delete('clientes');
            return $this->db->error();
          }

          // get customer List
          public function getcustomerList() {
              $this->db->select(array('*'));
              $this->db->from('clientes as c');
              $query = $this->db->get();
              return $query->result_array();
          }
          // create Customer
        public function createCustomer() {
            $tableName = 'clientes';
            $this->db->select(array('c.id'));
            $this->db->from($tableName . ' as c');
            $this->db->where('c.correo_cliente', $this->_correo_cliente);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $data = array(
                  'nit_cliente'     => $this->_nit_cliente,
                  'nombre_empresa'     => $this->_nombre_empresa,
                  'r_legal'     => $this->_r_legal,
                  'nombre_cliente'     => $this->_nombre_cliente,
                  'cedula_cliente'     => $this->_cedula_cliente,
                  'telefono_cliente'     => $this->_telefono_cliente,
                  'correo_cliente'     => $this->_correo_cliente,
                  'departamento'     => $this->_departamento,
                  'ciudad'     => $this->_ciudad,
                  'dep'     => $this->_dep,
                  'fecha_inactivo'     => $this->_fecha_inactivo,
                  'direccion_cliente'     => $this->_direccion_cliente,
                  'estado'     => $this->_estado,
                  'tipo_cliente'     => $this->_tipo_cliente,
                  'sucursal'     => $this->_sucursal,
                  'forma_pago'     => $this->_forma_pago,
                  'autorizador'     => $this->_autorizador,
                  'cliente_especial'     => $this->_cliente_especial,
                  'observacion'     => $this->_observacion,
                );
                $this->db->where('correo_cliente', $this->_correo_cliente);
                $this->db->update($tableName, $data);
            } else {
                $data = array(
                  'nit_cliente'     => $this->_nit_cliente,
                  'nombre_empresa'     => $this->_nombre_empresa,
                  'r_legal'     => $this->_r_legal,
                  'nombre_cliente'     => $this->_nombre_cliente,
                  'cedula_cliente'     => $this->_cedula_cliente,
                  'telefono_cliente'     => $this->_telefono_cliente,
                  'correo_cliente'     => $this->_correo_cliente,
                  'departamento'     => $this->_departamento,
                  'ciudad'     => $this->_ciudad,
                  'dep'     => $this->_dep,
                  'fecha_inactivo'     => $this->_fecha_inactivo,
                  'direccion_cliente'     => $this->_direccion_cliente,
                  'estado'     => $this->_estado,
                  'tipo_cliente'     => $this->_tipo_cliente,
                  'sucursal'     => $this->_sucursal,
                  'forma_pago'     => $this->_forma_pago,
                  'autorizador'     => $this->_autorizador,
                  'cliente_especial'     => $this->_cliente_especial,
                  'observacion'     => $this->_observacion,
                );
                $this->db->insert($tableName, $data);
                return $this->db->insert_id();
            }

        }
//////////PDF
function fetch_details(){

    $this->db->select('c.*,u.nombre,u.apellido, s.nombre_sucursal, f.forma')
    ->from('clientes C')
    ->join('users u', 'c.autorizador = u.user_id')
    ->join('sucursales s', 'c.sucursal = s.id')
    ->join('forma_pago f', 'c.forma_pago = f.id');
    $data = $this->db->get();
    $output = '<html lang="en">
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <title>servicecompany.com.co/</title>
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
        </style>
      </head>
  <body >
    <style type="text/css">
    .tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
    .tftable th {font-size:12px;background-color:#acc8cc;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;text-align:left;}
    .tftable tr {background-color:#d4e3e5;}
    .tftable td {font-size:12px;border-width: 1px;padding: 4px;border-style: solid;border-color: #729ea5;}
    .tftable tr:hover {background-color:#ffffff;}
    .verticalText {
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    }
    </style>';



  $output .= '

    <table class="tftable" border="1">
    <tr>
      <td>NIT</td>
      <td>EMPRESA</td>
      <td>REPRESENTANTE LEGA</td>
      <td>NOMBRE Y APELLIDO</td>
      <td>CÉDULA</td>
      <td>TELEFONO</td>
      <td>CORREO</td>
      <td>DEPARTAMENTO</td>
      <td>CIUDAD</td>
      <td>DIRECCIÓN</td>
      <td>SUCURSAL</td>
      <td>FORMA DE PAGO</td>
      <td>CLIENTE ESPECIAL</td>
    </tr>

    ';
    foreach($data->result() as $row){
      $auditoria=$row->auditoria;
        $output .= '<tr>
          <td class=" text-center ">'.$row->nit_cliente.'</td>
          <td>'.$row->nombre_empresa.'</td>
          <td>'.$row->r_legal.'</td>
          <td>'.$row->nombre_cliente.'</td>
          <td>'.$row->cedula_cliente.'</td>
          <td>'.$row->telefono_cliente.'</td>
          <td>'.$row->correo_cliente.'</td>
          <td>'.$row->departamento.'</td>
          <td>'.$row->ciudad.'</td>
          <td>'.$row->direccion_cliente.'</td>
          <td>'.$row->nombre_sucursal.'</td>
          <td>'.$row->forma.'</td>
          <td>'.$row->tipo_cliente.'</td>
        </tr>';
        }
      $output .= '
        </table>
         </body>
        </html>';
    return $output;

}


    }
