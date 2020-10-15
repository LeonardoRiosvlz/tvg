<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Tiposenvios_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('tiposenvios', array(
                'nombre_tiposenvios'     => $data['nombre_tiposenvios'],
                'tipo_transporte'     => $data['tipo_transporte'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('tiposenvios', array(
              'nombre_tiposenvios'     => $data['nombre_tiposenvios'],
              'tipo_transporte'     => $data['tipo_transporte'],
              'criterio'     => $data['criterio'],
            ));
            return $this->db->error();
           }
        public function gettiposenvios() {
            return $this->db
            ->select('*')
            ->from('tiposenvios')
            ->get()
            ->result();
          }
          public function deletetiposenvios($id) {
            $this->db->where('id', $id);
            $this->db->delete('tiposenvios');
            return $this->db->error();
          }
    }
