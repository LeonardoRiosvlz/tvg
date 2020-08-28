<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class FormasPago_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('forma_pago', array(
                'forma'     => $data['forma'],
                'descripcion'     => $data['descripcion'],
                'dias'     => $data['dias'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('forma_pago', array(
              'forma'     => $data['forma'],
              'descripcion'     => $data['descripcion'],
              'dias'     => $data['dias'],
            ));
            return $this->db->error();
           }
        public function getformaspago() {
            return $this->db
            ->select('*')
            ->from('forma_pago')
            ->get()
            ->result();
          }
          public function deleteformaspago($id) {
            $this->db->where('id', $id);
            $this->db->delete('forma_pago');
            return $this->db->error();
          }
    }
