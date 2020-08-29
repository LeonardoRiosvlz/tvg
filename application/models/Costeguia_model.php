<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class CosteGuia_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('coste_guia', array(
                'valor'     => $data['valor'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('coste_guia', array(
              'valor'     => $data['valor'],
            ));
            return $this->db->error();
           }
        public function getcosteguia() {
            return $this->db
            ->select('*')
            ->from('coste_guia')
            ->get()
            ->result();
          }
          public function deletecosteguia($id) {
            $this->db->where('id', $id);
            $this->db->delete('costeguia');
            return $this->db->error();
          }
    }
