<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Sucursales_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('sucursales', array(
                'nombre_sucursal'     => $data['nombre_sucursal'],
                'direccion'     => $data['direccion'],
                'descripcion'     => $data['descripcion'],
                'telefono'     => $data['telefono'],
                'celular'     => $data['celular'],
                'ciudad'     => $data['ciudad'],
                'email'     => $data['email'],
                'departamento'     => $data['departamento'],
                'dep'     => $data['dep'],


            ));
            return $this->db->error();
        }
        public function editar($data) {

            $this->db->where('id',$data['id']);
            $this->db->update('sucursales', array(
              'nombre_sucursal'     => $data['nombre_sucursal'],
              'direccion'     => $data['direccion'],
              'descripcion'     => $data['descripcion'],
              'telefono'     => $data['telefono'],
              'celular'     => $data['celular'],
              'ciudad'     => $data['ciudad'],
              'email'     => $data['email'],
              'departamento'     => $data['departamento'],
              'dep'     => $data['dep'],
            ));
            return $this->db->error();
           }
        public function getsucursales() {
            return $this->db
            ->select('*')
            ->from('sucursales')
            ->get()
            ->result();
          }
          public function get_sucursal($id) {
              return $this->db
              ->query("SELECT * FROM `sucursales` WHERE `ciudad` LIKE '$id'")
              ->result();
            }
          public function deletesucursales($id) {
            $this->db->where('id', $id);
            $this->db->delete('sucursales');
            return $this->db->error();
          }
    }
