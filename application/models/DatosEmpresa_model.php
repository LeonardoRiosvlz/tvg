<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class DatosEmpresa_model extends CI_Model {

        public function editar($data) {
            $this->db->where('id',0);
            $this->db->update('empresa', array(
              'nombre_empresa'     => $data['nombre_empresa'],
              'nit'                 => $data['nit'],
              'departamento'        => $data['departamento'],
              'ciudad'              => $data['ciudad'],
              'direccion'           => $data['direccion'],
              'email'               => $data['email'],
              'pbx'                 => $data['pbx'],
              'telefono_uno'        => $data['telefono_uno'],
              'telefono_dos'        => $data['telefono_dos'],
              'celular'             => $data['celular'],
              'web'                 => $data['web'],
              'dep'                 => $data['dep'],
            ));
            return $this->db->error();
           }
          public function getempresa() {
              return $this->db
              ->select('*')
              ->from('empresa')
              ->where('id', 0)
              ->get()
              ->result();
            }
            public function logo_uno($data) {
                $this->db->where('id',0);
                $this->db->update('empresa', array(
                    'logo_uno'     => $data['logo_uno'],
                ));
                return $this->db->error();
            }
            public function logo_dos($data) {
                $this->db->where('id',0);
                $this->db->update('empresa', array(
                    'logo_dos'     => $data['logo_dos'],
                ));
                return $this->db->error();
            }
    }
