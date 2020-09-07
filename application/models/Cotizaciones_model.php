<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Cotizaciones_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('cotizaciones', array(
                'nombre_cargo'     => $data['nombre_cargo'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('cotizaciones', array(
              'nombre_cargo'     => $data['nombre_cargo'],
            ));
            return $this->db->error();
           }
        public function getcotizaciones() {
            return $this->db
            ->select('*')
            ->from('cotizaciones')
            ->get()
            ->result();
          }
          public function deletecotizaciones($id) {
            $this->db->where('id', $id);
            $this->db->delete('cotizaciones');
            return $this->db->error();
          }
    }
