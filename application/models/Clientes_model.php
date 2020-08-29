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
            ->select('*')
            ->from('clientes')
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
    }
