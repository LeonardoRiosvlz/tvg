<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Tiempos_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('tiempos_entrega', array(
                'nombre_tiempo'     => $data['nombre_tiempo'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('tiempos_entrega', array(
              'nombre_tiempo'     => $data['nombre_tiempo'],
            ));
            return $this->db->error();
           }
        public function gettiempos() {
            return $this->db
            ->select('*')
            ->from('tiempos_entrega')
            ->get()
            ->result();
          }
          public function deletetiempo($id) {
            $this->db->where('id', $id);
            $this->db->delete('tiempos_entrega');
            return $this->db->error();
          }
    }
