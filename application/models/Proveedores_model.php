<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Proveedores_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('proveedores', array(
                'nombre_proveedor'     => $data['nombre_proveedor'],
                'contacto_proveedor'     => $data['contacto_proveedor'],
                'direccion_proveedor'     => $data['direccion_proveedor'],
                'correo_proveedor'     => $data['correo_proveedor'],
                'telefono_proveedor'     => $data['telefono_proveedor'],
                'estado_proveedor'     => $data['estado_proveedor'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('proveedores', array(
              'nombre_proveedor'     => $data['nombre_proveedor'],
              'contacto_proveedor'     => $data['contacto_proveedor'],
              'direccion_proveedor'     => $data['direccion_proveedor'],
              'correo_proveedor'     => $data['correo_proveedor'],
              'telefono_proveedor'     => $data['telefono_proveedor'],
              'estado_proveedor'     => $data['estado_proveedor'],
            ));
            return $this->db->error();
           }
        public function getproveedores() {
            return $this->db
            ->select('*')
            ->from('proveedores')
            ->get()
            ->result();
          }
          public function deleteproveedores($id) {
            $this->db->where('id', $id);
            $this->db->delete('proveedores');
            return $this->db->error();
          }
    }
