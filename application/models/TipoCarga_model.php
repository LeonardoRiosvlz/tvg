<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class TipoCarga_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('tipocarga', array(
                'nombre_tipocarga'     => $data['nombre_tipocarga'],
                'descripcion_tipocarga'     => $data['descripcion_tipocarga'],
                'estado'     => $data['estado'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('tipocarga', array(
              'nombre_tipocarga'     => $data['nombre_tipocarga'],
              'descripcion_tipocarga'     => $data['descripcion_tipocarga'],
              'estado'     => $data['estado'],
            ));
            return $this->db->error();
           }
        public function gettipocarga() {
            return $this->db
            ->select('*')
            ->from('tipocarga')
            ->get()
            ->result();
          }
          public function deletetipocarga($id) {
            $this->db->where('id', $id);
            $this->db->delete('tipocarga');
            return $this->db->error();
          }
    }
