<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Tarifas_model extends CI_Model {
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
    }
