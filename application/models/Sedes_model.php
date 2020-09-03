<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Sedes_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('sedes', array(
                'id_cliente'     => $data['id_cliente'],
                'departamento_sede'     => $data['departamento_sede'],
                'ciudad_sede'     => $data['ciudad_sede'],
                'nombre_sede'     => $data['nombre_sede'],
                'contacto_sede'     => $data['contacto_sede'],
                'direccion_sede'     => $data['direccion_sede'],
                'telefono_sede'     => $data['telefono_sede'],
                'correo_sede'     => $data['correo_sede'],
                'dep'     => $data['dep'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('sedes', array(
              'id_cliente'     => $data['id_cliente'],
              'departamento_sede'     => $data['departamento_sede'],
              'ciudad_sede'     => $data['ciudad_sede'],
              'nombre_sede'     => $data['nombre_sede'],
              'contacto_sede'     => $data['contacto_sede'],
              'direccion_sede'     => $data['direccion_sede'],
              'telefono_sede'     => $data['telefono_sede'],
              'correo_sede'     => $data['correo_sede'],
              'dep'     => $data['dep'],
            ));
            return $this->db->error();
           }
        public function getsedes($id) {
            return $this->db
            ->select('*')
            ->from('sedes')
            ->where('id_cliente',$id)
            ->get()
            ->result();
          }
          public function deletesedes($id) {
            $this->db->where('id', $id);
            $this->db->delete('sedes');
            return $this->db->error();
          }
    }
