<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Liquidaciones_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('Liquidaciones', array(
                'nombre_cargo'     => $data['nombre_cargo'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('Liquidaciones', array(
              'nombre_cargo'     => $data['nombre_cargo'],
            ));
            return $this->db->error();
           }
        public function getLiquidaciones() {
            return $this->db
            ->select('*')
            ->from('Liquidaciones')
            ->get()
            ->result();
          }
          public function deleteLiquidaciones($id) {
            $this->db->where('id', $id);
            $this->db->delete('Liquidaciones');
            return $this->db->error();
          }
          public function getCotizaciones($cedula){
              return $this->db
              ->select('c.*, u.username,cl.correo_cliente, cl.nombre_empresa, cl.telefono_cliente')
              ->from('cotizaciones c')
              ->where('c.cedula', $cedula)
              ->where('c.estatus_gestion', 'Aprobada')
              ->join('users u', 'c.user_id = u.user_id')
              ->join('clientes cl', 'c.cedula = cl.cedula_cliente')
              ->get()
              ->result();
          }
    }
