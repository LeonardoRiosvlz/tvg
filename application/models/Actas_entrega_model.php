<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Actas_entrega_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('actas_entrega', array(
                'nombre_cargo'     => $data['nombre_cargo'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('actas_entrega', array(
              'nombre_cargo'     => $data['nombre_cargo'],
            ));
            return $this->db->error();
           }
        public function getactas_entrega() {
            return $this->db
            ->select('*')
            ->from('actas_entrega')
            ->get()
            ->result();
          }
          public function deleteactas_entrega($id) {
            $this->db->where('id', $id);
            $this->db->delete('actas_entrega');
            return $this->db->error();
          }
    }
