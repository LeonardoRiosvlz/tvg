<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Factores_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('factores', array(
                'escala'     => $data['escala'],
                'formula'     => $data['formula'],
                'variable'     => $data['variable'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('factores', array(
              'escala'     => $data['escala'],
              'formula'     => $data['formula'],
              'variable'     => $data['variable'],
            ));
            return $this->db->error();
           }
        public function getfactores() {
            return $this->db
            ->select('*')
            ->from('factores')
            ->get()
            ->result();
          }
          public function deletefactores($id) {
            $this->db->where('id', $id);
            $this->db->delete('factores');
            return $this->db->error();
          }
    }
