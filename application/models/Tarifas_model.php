<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Tarifas_model extends CI_Model {

      private $_id;
      private $_departamento_origen;
      private $_ciudad_origen;
      private $_departamento_destino;
      private $_ciudad_destino;
      private $_dep;
      private $_dep_dos;
      private $_tipo_transporte;
      private $_tipo_envio;
      private $_precio;
      private $_itinerarios;
      private $_tiempos;
      private $_status;
      private $_criterio;

          public function setId($id) {
              $this->_id = $id;
          }
          public function setDepartamento_origen($departamento_origen) {
              $this->_departamento_origen = $departamento_origen;
          }
          public function setCiudad_origen($ciudad_origen) {
              $this->_ciudad_origen = $ciudad_origen;
          }
          public function setDepartamento_destino($departamento_destino) {
              $this->_departamento_destino = $departamento_destino;
          }
          public function setCiudad_destino($ciudad_destino) {
              $this->_ciudad_destino = $ciudad_destino;
          }
          public function setDep($dep) {
              $this->_dep= $dep;
          }
          public function setDep_dos($dep_dos) {
              $this->_dep_dos = $dep_dos;
          }
          public function setTipo_transporte($tipo_transporte) {
              $this->_tipo_transporte = $tipo_transporte;
          }
          public function setTipo_envio($tipo_envio) {
              $this->_tipo_envio = $tipo_envio;
          }

          public function setPrecio($precio) {
              $this->_precio = $precio;
          }
          public function setItinerarios($itinerarios) {
              $this->_itinerarios = $itinerarios;
          }
          public function setTiempos($tiempos) {
              $this->_tiempos = $tiempos;
          }
          public function setStatus($status) {
              $this->_status = $status;
          }
          public function setCriterio($criterio) {
              $this->_criterio = $criterio;
          }
        public function insertar($data){
            $this->db->insert('tarifas', array(
                'ciudad_origen'     => $data['ciudad_origen'],
                'departamento_origen'     => $data['departamento_origen'],
                'ciudad_destino'     => $data['ciudad_destino'],
                'departamento_destino'     => $data['departamento_destino'],
                'dep'     => $data['dep'],
                'dep_dos'     => $data['dep_dos'],
                'tipo_transporte'     => $data['tipo_transporte'],
                'tipo_envio'     => $data['tipo_envio'],
                'precio'     => $data['precio'],
                'itinerarios'     => $data['itinerarios'],
                'tiempos'     => $data['tiempos'],
                'status'     => $data['status'],
                'criterio'     => $data['criterio'],
            ));
            return $this->db->error();
        }
        public function editar($data) {

            $this->db->where('id',$data['id']);
            $this->db->update('tarifas', array(
              'ciudad_origen'     => $data['ciudad_origen'],
              'departamento_origen'     => $data['departamento_origen'],
              'ciudad_destino'     => $data['ciudad_destino'],
              'departamento_destino'     => $data['departamento_destino'],
              'dep'     => $data['dep'],
              'dep_dos'     => $data['dep_dos'],
              'tipo_transporte'     => $data['tipo_transporte'],
              'tipo_envio'     => $data['tipo_envio'],
              'precio'     => $data['precio'],
              'itinerarios'     => $data['itinerarios'],
              'tiempos'     => $data['tiempos'],
              'status'     => $data['status'],
              'criterio'     => $data['criterio'],
            ));
            return $this->db->error();
           }
        public function gettarifas() {
            return $this->db
            ->select('*')
            ->from('tarifas')
            ->get()
            ->result();
          }
          public function get_sucursal($id) {
              return $this->db
              ->query("SELECT * FROM `tarifas` WHERE `ciudad` LIKE '$id'")
              ->result();
            }
          public function deletetarifas($id) {
            $this->db->where('id', $id);
            $this->db->delete('tarifas');
            return $this->db->error();
          }




                    // get customer List
                    public function getcustomerList() {
                        $this->db->select(array('*'));
                        $this->db->from('tarifas as t');
                        $query = $this->db->get();
                        return $query->result_array();
                    }
                    // create Customer
                  public function createCustomer() {
                      $tableName = 'tarifas';
                      $this->db->select(array('t.id'));
                      $this->db->from($tableName . ' as t');
                      $this->db->where('t.id', $this->_id);
                      $query = $this->db->get();
                      if ($query->num_rows() > 0) {
                          $data = array(
                            'id'     => $this->_id,
                            'departamento_origen'     => $this->_departamento_origen,
                            'ciudad_origen'     => $this->_ciudad_origen,
                            'departamento_destino'     => $this->_departamento_destino,
                            'ciudad_destino'     => $this->_ciudad_destino,
                            'dep'     => $this->_dep,
                            'dep_dos'     => $this->_dep_dos,
                            'tipo_transporte'     => $this->_tipo_transporte,
                            'tipo_envio'     => $this->_tipo_envio,
                            'precio'     => $this->_precio,
                            'itinerarios'   => $this->_itinerarios,
                            'tiempos'     => $this->_tiempos,
                            'status'     => $this->_status,
                            'criterio'     => $this->_criterio,
                          );
                          $this->db->where('id', $this->_id);
                          $this->db->update($tableName, $data);
                      } else {
                          $data = array(
                            'id'     => $this->_id,
                            'departamento_origen'     => $this->_departamento_origen,
                            'ciudad_origen'     => $this->_ciudad_origen,
                            'departamento_destino'     => $this->_departamento_destino,
                            'ciudad_destino'     => $this->_ciudad_destino,
                            'dep'     => $this->_dep,
                            'dep_dos'     => $this->_dep_dos,
                            'tipo_transporte'     => $this->_tipo_transporte,
                            'tipo_envio'     => $this->_tipo_envio,
                            'precio'     => $this->_precio,
                            'itinerarios'     => $this->_itinerarios,
                            'tiempos'     => $this->_tiempos,
                            'status'     => $this->_status,
                            'crirterio'     => $this->_crirterio,
                          );
                          $this->db->insert($tableName, $data);
                          return $this->db->insert_id();
                      }

                  }
    }
