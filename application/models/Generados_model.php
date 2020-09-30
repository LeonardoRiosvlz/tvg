<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class generados_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('archivos', array(
                'nombre_cargo'     => $data['nombre_cargo'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('generados', array(
              'nombre_cargo'     => $data['nombre_cargo'],
            ));
            return $this->db->error();
           }
        public function getgenerados() {
            return $this->db
            ->select('a.*,u.username')
            ->from('archivos a')
            ->join('users u', 'a.usuario_responsable = u.user_id', 'left outer')
            ->get()
            ->result();
          }
          public function deletegenerados($id) {
            $this->db->where('id', $id);
            $this->db->delete('generados');
            return $this->db->error();
          }
    }
