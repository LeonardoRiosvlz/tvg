<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Facturas_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('facturas', array(
                'id'     => $data['id'],
                'fecha'     => $data['fecha'],
                'f_vencimiento'     => $data['f_vencimiento'],
                'cedula'     => $data['cedula'],
                'nombre_cliente'     => $data['nombre_cliente'],
                'direccion_cliente'     => $data['direccion_cliente'],
                'telefono_cliente'     => $data['telefono_cliente'],
                'ciudad_cliente'     => $data['ciudad_cliente'],
                'items'     => json_encode($data['items']),
                'valor_total'     => $data['valor_total'],
                'forma_pago'     => $data['forma_pago'],
                'precio_letras'     => $data['precio_letras'],
                'subtotal'     => $data['subtotal'],
                'total'     => $data['total'],
                'dias_demora'     => $data['dias_demora'],
                'estado'     => $data['estado'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('facturas', array(
              'fecha'     => $data['fecha'],
              'f_vencimiento'     => $data['f_vencimiento'],
              'cedula'     => $data['cedula'],
              'nombre_cliente'     => $data['nombre_cliente'],
              'direccion_cliente'     => $data['direccion_cliente'],
              'telefono_cliente'     => $data['telefono_cliente'],
              'ciudad_cliente'     => $data['ciudad_cliente'],
              'items'     =>  json_encode($data['items']),
              'valor_total'     => $data['valor_total'],
              'forma_pago'     => $data['forma_pago'],
              'precio_letras'     => $data['precio_letras'],
              'subtotal'     => $data['subtotal'],
              'total'     => $data['total'],
              'dias_demora'     => $data['dias_demora'],
              'estado'     => $data['estado'],
            ));
            return $this->db->error();
           }
        public function getfacturas() {
            return $this->db
            ->select('*')
            ->from('facturas')
            ->get()
            ->result();
          }
          public function deletefacturas($id) {
            $this->db->where('id', $id);
            $this->db->delete('facturas');
            return $this->db->error();
          }
    }
