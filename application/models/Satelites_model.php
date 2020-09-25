<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Satelites_model extends MY_Model {
        public function insertar($data){
            $this->db->insert('satelites', array(
                'id'     => $data['id'],
                'dep'     => $data['dep'],
                'departamento_sat' => $data['departamento_sat'],
                'ciudad_sat'     => $data['ciudad_sat'],
                'nombre_sat'     => $data['nombre_sat'],
                'direccion_sat'     => $data['direccion_sat'],
                'telefono_sat'     => $data['telefono_sat'],
                'correo_sat'     => $data['correo_sat'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('satelites', array(
              'dep'     => $data['dep'],
              'departamento_sat' => $data['departamento_sat'],
              'ciudad_sat'     => $data['ciudad_sat'],
              'nombre_sat'     => $data['nombre_sat'],
              'direccion_sat'     => $data['direccion_sat'],
              'telefono_sat'     => $data['telefono_sat'],
              'correo_sat'     => $data['correo_sat'],
            ));
            return $this->db->error();
           }
        public function getsatelites() {
            return $this->db
            ->select('*')
            ->from('satelites')
            ->get()
            ->result();
          }
          public function deletesatelites($id) {
            $this->db->where('id', $id);
            $this->db->delete('satelites');
            return $this->db->error();
          }
          ///////////////////
          public function get_unused_id(){
                // Create a random user id between 1200 and 4294967295
                $random_unique_int = 2147483648 + mt_rand( -2147482448, 2147483647 );

                // Make sure the random user_id isn't already in use
                $query = $this->db->where( 'id', $random_unique_int )
                    ->get_where( $this->db_table('satelites_table') );

                if( $query->num_rows() > 0 )
                {
                    $query->free_result();

                    // If the random user_id is already in use, try again
                    return $this->get_unused_id();
                }

                return $random_unique_int;
            }
            //////////PDF
    }
