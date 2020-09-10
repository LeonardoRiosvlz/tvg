<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Cotizaciones_model extends  MY_Model {
        public function insertar($data){
            $this->db->insert('cotizaciones', array(
                'id'         => $data['id'],
                'user_id'    => $data['user_id'],
                'vnota'      => $data['vnota'],
                'codigo'      => $data['codigo'],
                'status'      => 'Borrador',
                'estatus_gestion' => 'Borrador',
                'cedula'      => $data['cedula'],
                'tiempo'     => json_encode($data['tiempo']),
                'items'      => json_encode($data['items']),
                'notas'      => json_encode($data['notas']),
                'saludo'     => json_encode($data['saludo']),
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
            ->select('c.*, u.username,cl.correo_cliente, cl.nombre_empresa, cl.telefono_cliente')
            ->from('cotizaciones c')
            ->join('users u', 'c.user_id = u.user_id')
            ->join('clientes cl', 'c.cedula = cl.cedula_cliente')
            ->get()
            ->result();
          }
          public function deletecotizaciones($id) {
            $this->db->where('id', $id);
            $this->db->delete('cotizaciones');
            return $this->db->error();
          }
          ////////////////
          public function imagen_insert($data) {
              $this->db->insert('documentos_cotizaciones', array(
                  'tiempo'          => $data['tiempo'],
                  'id_cliente'          => $data['id_cliente'],
                  'url'             => $data['url'],
              ));
              return $this->db->error();
             }
          public function imagenes_get($data){
           return $this->db
              ->select('*')
               ->from('documentos_cotizaciones')
               ->where('id_cliente',$data['id_cliente'])
               ->where('tiempo',$data['tiempo'])
               ->get()
               ->result();
              }
              public function eliminarImagen($id) {
                $this->db->where('id', $id);
                $this->db->delete('documentos_cotizaciones');
                return $this->db->error();
              }
              ///////////////////
              public function get_unused_id(){
                    // Create a random user id between 1200 and 4294967295
                    $random_unique_int = 2147483648 + mt_rand( -2147482448, 2147483647 );

                    // Make sure the random user_id isn't already in use
                    $query = $this->db->where( 'id', $random_unique_int )
                        ->get_where( $this->db_table('cotizaciones_table') );

                    if( $query->num_rows() > 0 )
                    {
                        $query->free_result();

                        // If the random user_id is already in use, try again
                        return $this->get_unused_id();
                    }

                    return $random_unique_int;
                }
    }
