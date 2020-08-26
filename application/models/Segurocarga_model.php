<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Segurocarga_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('segurocarga', array(
                'porcentaje'     => $data['porcentaje'],
                'status'         => $data['status'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('segurocarga', array(
              'porcentaje'     => $data['porcentaje'],
              'status'         => $data['status'],
            ));
            return $this->db->error();
           }
        public function getsegurocarga() {
            return $this->db
            ->select('*')
            ->from('segurocarga')
            ->get()
            ->result();
          }
          public function deletesegurocarga($id) {
            $this->db->where('id', $id);
            $this->db->delete('segurocarga');
            return $this->db->error();
          }
    }
