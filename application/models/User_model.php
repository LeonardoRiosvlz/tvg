<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_model extends MY_Model {

  function get_profiles(){
    return $this->db
    ->select('*')
    ->from('users')
    ->get()
    ->result();
  }
  function get_profiless($id){
    return $this->db
    ->select('u.user_id, u.username,u.permisos, u.url_foto, u.nombre, u.apellido, u.cedula, u.cargo, u.telefono_personal, u.telefono_corporativo, u.sucursal, u.email')
    ->from('users u')
    ->get()
    ->result();
  }
  function get_profile($id){
    return $this->db
    ->select('u.user_id, u.username,u.permisos, u.url_foto, u.nombre, u.apellido, u.cedula, u.cargo, u.telefono_personal, u.telefono_corporativo, u.sucursal, u.email')
    ->from('users u')
    ->where('user_id', $id)
    ->get()
    ->result();
  }

 function get_users_verify($id){

		return $this->db
			->select('verify')
			->from('users')
			->where('user_id', $id)
			->get()
			->row();


   }
    function get_users_datos_personales($id){

		return $this->db
			->select('*')
			->from('datos')
			->where('id_usuario', $id)
			->get()
			->row();


   }

       function get_users_datos_empresa($id){
      		return $this->db
      			->select('*')
      			->from('empresa')
      			->where('id_usu', $id)
      			->get()
      			->row();
   }

   public function foto($data) {
       $this->db->where('user_id',$data['user_id']);
       $this->db->update('users', array(
           'url_foto'     => $data['url_foto'],
       ));
       return $this->db->error();
      }

      public function documentos($data) {
          $this->db->insert('documentos', array(
              'id_usuario'          => $data['id_usuario'],
              'url_documento'       => $data['url_documento'],
          ));
          return $this->db->error();
         }

      public function documentos_get($id) {

       return $this->db
          ->select('*')
       ->from('documentos')
       ->where('id_usuario',$id)
       ->get()
       ->result();
    }
    public function eliminar($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('users');
        return $this->db->error();
      }

      public function editar_a($data) {

          $this->db->where('id_usuario',$data['id_usuario']);
          $this->db->update('datos', array(
              'nombre'     => $data['nombre'],
              'apellido'     => $data['apellido'],
              'direccion_envio'     => $data['direccion_envio'],
              'telefono'     => $data['telefono'],
              'direccion_facturacion'     => $data['direccion_facturacion'],
              'direccion_empresa'     => $data['direccion_empresa'],
              'nombre_empresa'     => $data['nombre_empresa'],
              'nit'     => $data['nit'],
              'telefono_empresa'     => $data['telefono_empresa'],
              'profesional'     => $data['profesional'],
              'dep'     => $data['dep'],
              'departamento'     => $data['departamento'],
              'ciudad'     => $data['ciudad'],
              'status'     => $data['status'],
          ));
          return $this->db->error();
         }


         public function editar_aua($data) {

             $this->db->where('user_id',$data['id_usuario']);
             $this->db->update('users', array(
                 'auth_level' => 6,
             ));
             return $this->db->error();
            }

            public function editar_aur($data) {

                $this->db->where('user_id',$data['id_usuario']);
                $this->db->update('users', array(
                    'auth_level' => 1,
                ));
                return $this->db->error();
               }
         public function banear_a($data) {

             $this->db->where('user_id',$data['id_usuario']);
             $this->db->update('users', array(
                 'banned'     => $data['banned'],
             ));
             return $this->db->error();
            }



//////////////

public function insertar($data){
    $this->db->insert('users', array(
        'user_id'        => $data['user_id'],
        'username'       => $data['username'],
        'nombre'       => $data['nombre'],
        'apellido'       => $data['apellido'],
        'cedula'       => $data['cedula'],
        'email'          => $data['email'],
        'auth_level'     => $data['auth_level'],
        'banned'         => $data['banned'],
        'passwd'         => $data['passwd'],
        'created_at'         => $data['created_at'],
        'passwd_verify_code' =>   $data['passwd_verify_code'],
        'cargo'         => $data['cargo'],
        'telefono_personal'         => $data['telefono_personal'],
        'telefono_corporativo'         => $data['telefono_corporativo'],
        'sucursal'         => $data['sucursal'],
        'url_foto'         => $data['url_foto'],
        'permisos'         => json_encode($data['permisos']),
    ));
    return $this->db->error();
}
public function editar($data) {

    $this->db->where('user_id',$data['user_id']);
    $this->db->update('users', array(
      'auth_level'     => $data['auth_level'],
      'banned'         => $data['banned'],
      'username'         => $data['username'],
      'nombre'       => $data['nombre'],
      'cargo'         => $data['cargo'],
      'apellido'       => $data['apellido'],
      'cedula'       => $data['cedula'],
      'telefono_personal'         => $data['telefono_personal'],
      'telefono_corporativo'         => $data['telefono_corporativo'],
      'sucursal'         => $data['sucursal'],
      'permisos'         => json_encode($data['permisos']),
    ));
    return $this->db->error();
   }
   public function editarp($data) {

       $this->db->where('user_id',$data['user_id']);
       $this->db->update('users', array(
         'apellido'       => $data['apellido'],
         'cedula'       => $data['cedula'],
         'telefono_personal'         => $data['telefono_personal'],
         'telefono_corporativo'         => $data['telefono_corporativo'],
       ));
       return $this->db->error();
      }
public function editar_img($data) {

  $this->db->where('user_id',$data['user_id']);
  $this->db->update('users', array(
      'auth_level'     => $data['auth_level'],
      'banned'         => $data['banned'],
      'username'         => $data['username'],
      'url_foto'         => $data['url_foto'],
      'nombre'       => $data['nombre'],
      'cargo'         => $data['cargo'],
      'apellido'       => $data['apellido'],
      'cedula'       => $data['cedula'],
      'telefono_personal'         => $data['telefono_personal'],
      'telefono_corporativo'         => $data['telefono_corporativo'],
      'sucursal'         => $data['sucursal'],
      'permisos'         => json_encode($data['permisos']),
    ));
    return $this->db->error();
   }
}
