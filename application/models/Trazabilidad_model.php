<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Trazabilidad_model extends CI_Model {
        public function insertar($data){
            $this->db->insert('trazabilidad', array(
                'id_guia'     => $data['id_guia'],
                'fecha_despacho'     => $data['fecha_despacho'],
                'id_proveedor'     => $data['id_proveedor'],
                'guia_proveedor'     => $data['guia_proveedor'],
                'detalles_carga'     => $data['detalles_carga'],
                'observaciones'     => $data['observaciones'],
                'llegada_destino'     => $data['llegada_destino'],
                'id_satelite'     => $data['id_satelite'],
                'tipo_reporte'     => $data['tipo_reporte'],
                'prefijo'     => $data['prefijo'],
                'id_sede'     => $data['id_sede'],
                'hora'     => $data['hora'],
                'url_foto'     => $data['url_foto'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('trazabilidad', array(
              'id_guia'     => $data['id_guia'],
              'fecha_despacho'     => $data['fecha_despacho'],
              'id_proveedor'     => $data['id_proveedor'],
              'guia_proveedor'     => $data['guia_proveedor'],
              'detalles_carga'     => $data['detalles_carga'],
              'observaciones'     => $data['observaciones'],
              'llegada_destino'     => $data['llegada_destino'],
              'id_satelite'     => $data['id_satelite'],
              'tipo_reporte'     => $data['tipo_reporte'],
              'prefijo'     => $data['prefijo'],
              'hora'     => $data['hora'],
              'id_sede'     => $data['id_sede'],
            ));
            return $this->db->error();
           }

           public function editar_img($data) {
               $this->db->where('id',$data['id']);
               $this->db->update('trazabilidad', array(
                 'id_guia'     => $data['id_guia'],
                 'fecha_despacho'     => $data['fecha_despacho'],
                 'id_proveedor'     => $data['id_proveedor'],
                 'guia_proveedor'     => $data['guia_proveedor'],
                 'detalles_carga'     => $data['detalles_carga'],
                 'observaciones'     => $data['observaciones'],
                 'llegada_destino'     => $data['llegada_destino'],
                 'id_satelite'     => $data['id_satelite'],
                 'tipo_reporte'     => $data['tipo_reporte'],
                 'prefijo'     => $data['prefijo'],
                 'id_sede'     => $data['id_sede'],
                 'hora'     => $data['hora'],
                 'url_foto'     => $data['url_foto'],
               ));
               return $this->db->error();
              }
        public function gettrazabilidad($datas) {
            return $this->db
            ->select('t.*,s.ciudad_sat')
            ->where('id_guia', $datas['id_guia'])
            ->where('prefijo', $datas['prefijo'])
            ->join('satelites s', 't.id_satelite = s.id', 'left outer')
            ->order_by("t.id", "desc")
            ->from('trazabilidad t')
            ->get()
            ->result();
          }
          public function deletetrazabilidad($id) {
            $this->db->where('id', $id);
            $this->db->delete('trazabilidad');
            return $this->db->error();
          }
          public function get_id_n($datas) {
              return $this->db
              ->select('c.*,f.dias, f.forma, f.descripcion, u.username,u.nombre,u.apellido,u.cargo')
              ->from('carga c')
              ->where('c.id', $datas['id'])
              ->join('users u', 'c.user_id = u.user_id')
              ->join('forma_pago f', 'c.forma_pago = f.id')
              ->get()
              ->result();
            }
            public function get_id_e($datas) {
                return $this->db
                ->select('*')
                ->from('historial_ce c')
                ->where('codigo', $datas['id'])
                ->get()
                ->result();
              }
    }
