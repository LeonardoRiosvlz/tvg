<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Cargos_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('cargos', array(
                'nombre_cargo'     => $data['nombre_cargo'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('cargos', array(
              'nombre_cargo'     => $data['nombre_cargo'],
            ));
            return $this->db->error();
           }
        public function getcargos() {
            return $this->db
            ->select('*')
            ->from('cargos')
            ->get()
            ->result();
          }
          public function deletecargos($id) {
            $this->db->where('id', $id);
            $this->db->delete('cargos');
            return $this->db->error();
          }
    }
