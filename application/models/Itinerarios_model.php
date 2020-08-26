<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Itinerarios_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('itinerarios', array(
                'nombre_itinerario'     => $data['nombre_itinerario'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('itinerarios', array(
              'nombre_itinerario'     => $data['nombre_itinerario'],
            ));
            return $this->db->error();
           }
        public function getitinerarios() {
            return $this->db
            ->select('*')
            ->from('itinerarios')
            ->get()
            ->result();
          }
          public function deleteitinerarios($id) {
            $this->db->where('id', $id);
            $this->db->delete('itinerarios');
            return $this->db->error();
          }
    }
