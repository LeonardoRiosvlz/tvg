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
                'tiempo'     => $data['tiempo'],
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
              'tiempo'     => $data['tiempo'],
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
            ->select('t.*,s.ciudad_sat,p.nombre_proveedor,h.numero_anexo_l,c.id as `guia`')
            ->where('id_guia', $datas['id_guia'])
            ->where('prefijo', $datas['prefijo'])
            ->join('satelites s', 't.id_satelite = s.id', 'left outer')
            ->join('proveedores p', 't.id_proveedor = p.id', 'left outer')
            ->join('historial_ce h', 't.id_guia = h.codigo', 'left outer')
            ->join('carga c', 't.id_guia = c.id', 'left outer')
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
          public function get_satelite($id) {
              return $this->db
              ->select('*')
              ->from('satelites s')
              ->where('id', $id)
              ->get()
              ->result();
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
///////////////////////////////
        public function imagen_insert($data) {
            $this->db->insert('documentos_historial', array(
                'id_guia'          => $data['id_guia'],
                'tiempo'          => $data['tiempo'],
                'url'             => $data['url'],
            ));
            return $this->db->error();
           }
        public function imagenes_get($datas){
         return $this->db
            ->select('*')
             ->from('documentos_historial')
             ->where('id_guia',$datas['id_guia'])
             ->where('tiempo',$datas['tiempo'])
             ->get()
             ->result();
            }
            public function eliminarImagen($id) {
              $this->db->where('id', $id);
              $this->db->delete('documentos_historial');
              return $this->db->error();
            }


    }
