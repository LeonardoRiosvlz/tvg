<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Archivos_model extends My_Model {
        public function insertar_cotizacion($data){
            $this->db->insert('archivos', array(
                'id'     => $data['id_archivo'],
                'nombre_archivo'     => $data['nombre_archivo'],
                'tipo_archivo'     => $data['tipo_archivo'],
                'tipo'     => $data['tipo'],
                'numero_doc'     => $data['id'],
                'codigo_hex'     => $data['codigo'],
                'url'     => $data['url_pdf'],
                'usuario_responsable'     => $data['usuario_responsable'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('cargos', array(
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
            $this->db->where('id', $id);
            $this->db->delete('cargos');
            return $this->db->error();
          }
          public function get_unused_id(){
                // Create a random user id between 1200 and 4294967295
                $random_unique_int = 2147483648 + mt_rand( -2147482448, 2147483647 );

                // Make sure the random user_id isn't already in use
                $query = $this->db->where( 'id', $random_unique_int )
                    ->get_where( $this->db_table('archivos_table') );

                if( $query->num_rows() > 0 )
                {
                    $query->free_result();

                    // If the random user_id is already in use, try again
                    return $this->get_unused_id();
                }

                return $random_unique_int;
            }
    }
