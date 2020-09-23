<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Remitentes_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('remitentes', array(
              'id'     => $data['id'],
              'nit_remitente'     => $data['nit_remitente'],
              'empresa_remitente'     => $data['empresa_remitente'],
              'contacto_remitente'     => $data['contacto_remitente'],
              'ciudad_remitente'     => $data['ciudad_remitente'],
              'cedula_remitente'     => $data['cedula_remitente'],
              'telefono_remitente'     => $data['telefono_remitente'],
              'correo_remitente'     => $data['correo_remitente'],
              'departamento_remitente'     => $data['departamento_remitente'],
              'direccion_remitente'     => $data['direccion_remitente'],
              'dep'     => $data['dep'],

            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('remitentes', array(
              'nit_remitente'     => $data['nit_remitente'],
              'empresa_remitente'     => $data['empresa_remitente'],
              'contacto_remitente'     => $data['contacto_remitente'],
              'ciudad_remitente'     => $data['ciudad_remitente'],
              'cedula_remitente'     => $data['cedula_remitente'],
              'telefono_remitente'     => $data['telefono_remitente'],
              'correo_remitente'     => $data['correo_remitente'],
              'departamento_remitente'     => $data['departamento_remitente'],
              'direccion_remitente'     => $data['direccion_remitente'],
            ));
            return $this->db->error();
           }
        public function getremitentes() {
            return $this->db
            ->select('*')
            ->from('remitentes')
            ->get()
            ->result();
          }
          public function deleteremitentes($id) {
            $this->db->where('id', $id);
            $this->db->delete('remitentes');
            return $this->db->error();
          }
    }
