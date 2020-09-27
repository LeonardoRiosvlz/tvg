<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Trazabilidad_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('trazabilidad', array(
                'nombre_cargo'     => $data['nombre_cargo'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('trazabilidad', array(
              'nombre_cargo'     => $data['nombre_cargo'],
            ));
            return $this->db->error();
           }
        public function gettrazabilidad() {
            return $this->db
            ->select('*')
            ->from('trazabilidad')
            ->get()
            ->result();
          }
          public function deletetrazabilidad($id) {
            $this->db->where('id', $id);
            $this->db->delete('trazabilidad');
            return $this->db->error();
          }
    }
