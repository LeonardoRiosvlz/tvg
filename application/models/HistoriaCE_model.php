<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class HistoriaCE_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('historial_Ce', array(

                'id'  => $data['id'],
                'f_recogida'  => $data['f_recogida'],
                'f_ingreso'  => $data['f_ingreso'],
                'cedula_cliente' => $data['cedula_cliente'],
                'departamento_origen' => $data['departamento_origen'],
                'ciudad_origen' => $data['ciudad_origen'],
                'dep'=> $data['dep'],
                'departamento_destino'  => $data['departamento_destino'],
                'ciudad_destino'  => $data['ciudad_destino'],
                'dep_dos'  => $data['dep_dos'],
                'tipo_transporte'  => $data['tipo_transporte'],
                'tipo_envio'  => $data['tipo_envio'],
                'precio'  => $data['precio'],
                'id_carga_cliente'  => $data['id_carga_cliente'],
                'tipo_carga' => $data['tipo_carga'],
                'cantidad'  => $data['cantidad'],
                'kilos_tvg'  => $data['kilos_tvg'],
                'kilos_cliente'  => $data['kilos_cliente'],
                'flete_fijo' => $data['flete_fijo'],
                'flete_total' => $data['flete_total'],
                'fecha_despacho'  => $data['fecha_despacho'],
                'proveedor' => $data['proveedor'],
                'n_guia_proveedor'  => $data['n_guia_proveedor'],
                'fecha_en_destino'  => $data['fecha_en_destino'],
                'sede_cliente'  => $data['sede_cliente'],
                'fecha_conectividad'  => $data['fecha_conectividad'],
                'n_referencia_c' => $data['n_referencia_c'],
                'f_entrega_c' => $data['f_entrega_c'],
                'numero_anexo_l' => $data['numero_anexo_l'],
                'numero_factura'  => $data['numero_factura'],
                'fecha_factura' => $data['fecha_factura'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('historial_Ce', array(
              'nombre_cargo'     => $data['nombre_cargo'],
            ));
            return $this->db->error();
           }
        public function getcargos() {
            return $this->db
            ->select('*')
            ->from('cargos')
            ->get()
            ->result();
          }
          public function deletecargos($id) {
            $this->db->where('historial_Ce', $id);
            $this->db->delete('cargos');
            return $this->db->error();
          }
          ////////////////
          public function imagen_insert($data) {
              $this->db->insert('documentos_historial', array(
                  'id_carga_cliente'          => $data['id_carga_cliente'],
                  'url'             => $data['url'],
              ));
              return $this->db->error();
             }
          public function imagenes_get($id){
           return $this->db
              ->select('*')
               ->from('documentos_historial')
               ->where('id_carga_cliente',$id)
               ->get()
               ->result();
              }
              public function eliminarImagen($id) {
                $this->db->where('id', $id);
                $this->db->delete('documentos_historial');
                return $this->db->error();
              }

    }
