<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Transportes_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('transportes', array(
              'tipo_transporte'     => $data['tipo_transporte'],
              'descripcion_transporte'     => $data['descripcion_transporte'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('transportes', array(
              'tipo_transporte'     => $data['tipo_transporte'],
              'descripcion_transporte'     => $data['descripcion_transporte'],
            ));
            return $this->db->error();
           }
        public function gettransportes() {
            return $this->db
            ->select('*')
            ->from('transportes')
            ->get()
            ->result();
          }
          public function deletetransportes($id) {
            $this->db->where('id', $id);
            $this->db->delete('transportes');
            return $this->db->error();
          }
    }
