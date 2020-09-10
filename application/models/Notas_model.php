<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Notas_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('notas', array(
                'numero'     => $data['numero'],
                'resumen'     => $data['resumen'],
                'descripcion'     => $data['descripcion'],
                'tipo_transporte'     => $data['tipo_transporte'],
                'estado'     => $data['estado'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('notas', array(
              'numero'     => $data['numero'],
              'resumen'     => $data['resumen'],
              'descripcion'     => $data['descripcion'],
              'tipo_transporte'     => $data['tipo_transporte'],
              'estado'     => $data['estado'],
            ));
            return $this->db->error();
           }
        public function getnotass() {
            return $this->db
            ->select('*')
            ->from('notas')
            ->where('estado', 'Activo')
            ->get()
            ->result();
          }
          public function getnotas() {
              return $this->db
              ->select('*')
              ->from('notas')
              ->get()
              ->result();
            }
          public function deletenotas($id) {
            $this->db->where('id', $id);
            $this->db->delete('notas');
            return $this->db->error();
          }
    }
