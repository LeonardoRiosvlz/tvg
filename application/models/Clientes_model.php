<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Clientes_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('clientes', array(
                'nit_cliente'     => $data['nit_cliente'],
                'nombre_empresa'     => $data['nombre_empresa'],
                'r_legal'     => $data['r_legal'],
                'nombre_cliente'     => $data['nombre_cliente'],
                'cedula_cliente'     => $data['cedula_cliente'],
                'telefono_cliente'     => $data['telefono_cliente'],
                'correo_cliente'     => $data['correo_cliente'],
                'departamento'     => $data['departamento'],
                'ciudad'     => $data['ciudad'],
                'dep'     => $data['dep'],
                'fecha_inactivo'     => $data['fecha_inactivo'],
                'direccion_cliente'     => $data['direccion_cliente'],
                'estado'     => $data['estado'],
                'tipo_cliente'     => $data['tipo_cliente'],
                'sucursal'     => $data['sucursal'],
                'forma_pago'     => $data['forma_pago'],
                'autorizador'     => $data['autorizador'],
                'cliente_especial'     => $data['cliente_especial'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('clientes', array(
              'nit_cliente'     => $data['nit_cliente'],
              'nombre_empresa'     => $data['nombre_empresa'],
              'r_legal'     => $data['r_legal'],
              'nombre_cliente'     => $data['nombre_cliente'],
              'cedula_cliente'     => $data['cedula_cliente'],
              'telefono_cliente'     => $data['telefono_cliente'],
              'correo_cliente'     => $data['correo_cliente'],
              'departamento'     => $data['departamento'],
              'ciudad'     => $data['ciudad'],
              'dep'     => $data['dep'],
              'direccion_cliente'     => $data['direccion_cliente'],
              'estado'     => $data['estado'],
              'fecha_inactivo'     => $data['fecha_inactivo'],
              'tipo_cliente'     => $data['tipo_cliente'],
              'sucursal'     => $data['sucursal'],
              'forma_pago'     => $data['forma_pago'],
              'autorizador'     => $data['autorizador'],
              'cliente_especial'     => $data['cliente_especial'],
            ));
            return $this->db->error();
           }
        public function getclientes() {
            return $this->db
            ->select('*')
            ->from('clientes')
            ->get()
            ->result();
          }
          public function deleteclientes($id) {
            $this->db->where('id', $id);
            $this->db->delete('clientes');
            return $this->db->error();
          }
    }
