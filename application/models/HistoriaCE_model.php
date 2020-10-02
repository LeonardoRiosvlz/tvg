<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class HistoriaCE_model extends MY_Model  {
        public function insertar($data){
            $this->db->insert('historial_ce', array(
                'id'  => $data['id'],
                'codigo'  => $data['codigo'],
                'f_recogida'  => $data['f_recogida'],
                'f_ingreso'  => $data['f_ingreso'],
                'cedula_cliente' => $data['cedula'],
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
                'id_tarifa' => $data['id_tarifa'],
            ));
            return $this->db->error();
        }
        public function editar($data) {
            $this->db->where('codigo',$data['codigo']);
            $this->db->update('historial_ce', array(
              'f_recogida'  => $data['f_recogida'],
              'f_ingreso'  => $data['f_ingreso'],
              'cedula_cliente' => $data['cedula'],
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
              'id_tarifa' => $data['id_tarifa'],
            ));
            return $this->db->error();
           }
        public function getcarga() {
            return $this->db
            ->select('c.*,s.nombre_sede,t.*,k.nombre_cliente,p.nombre_proveedor')
            ->from('historial_ce c')
            ->join('sedes s', 'c.sede_cliente = s.id', 'left outer')
            ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
            ->join('clientes k', 'c.cedula_cliente = k.cedula_cliente', 'left outer')
            ->join('proveedores p', 'c.proveedor = p.id', 'left outer')
            ->get()
            ->result();
          }
          public function get_anexo($id) {
              return $this->db
              ->select('c.*,f.forma,f.dias,s.nombre_sede,t.*,k.nombre_empresa,k.nit_cliente,k.nombre_cliente,k.telefono_cliente,k.direccion_cliente,k.ciudad,p.nombre_proveedor')
              ->from('historial_ce c')
              ->where('numero_anexo_l', $id)
              ->join('sedes s', 'c.sede_cliente = s.id', 'left outer')
              ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
              ->join('clientes k', 'c.cedula_cliente = k.cedula_cliente', 'left outer')
              ->join('forma_pago f', 'k.forma_pago = f.id', 'left outer')
              ->join('proveedores p', 'c.proveedor = p.id', 'left outer')
              ->get()
              ->result();
            }
          public function getcarga_cedula($id) {
              return $this->db
              ->select('c.*,s.nombre_sede,t.*,k.nombre_cliente,p.nombre_proveedor')
              ->from('historial_ce c')
              ->where('c.cedula_cliente', $id)
              ->join('sedes s', 'c.sede_cliente = s.id', 'left outer')
              ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
              ->join('clientes k', 'c.cedula_cliente = k.cedula_cliente', 'left outer')
              ->join('proveedores p', 'c.proveedor = p.id', 'left outer')
              ->get()
              ->result();
            }
            public function getcarga_cedula_tiempo($datas) {
                return $this->db
                ->select('c.*,s.nombre_sede,t.*,k.nombre_cliente,p.nombre_proveedor')
                ->from('historial_ce c')
                ->where('c.cedula_cliente', $datas['cedula'])
  //              ->where('fecha_despacho <=',$datas['desde'])
  //              ->where('fecha_despacho >=',$datas['hasta'])
                ->where('fecha_despacho >=', $datas['desde'])
                ->where('fecha_despacho <=', $datas['hasta'])
                ->join('sedes s', 'c.sede_cliente = s.id', 'left outer')
                ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                ->join('clientes k', 'c.cedula_cliente = k.cedula_cliente', 'left outer')
                ->join('proveedores p', 'c.proveedor = p.id', 'left outer')
                ->get()
                ->result();
              }
              public function getcarga_fecha_numero($datas) {
                  return $this->db
                  ->select('c.*,s.nombre_sede,t.*,k.nombre_cliente,p.nombre_proveedor')
                  ->from('historial_ce c')
                  ->where('n_referencia_c', $datas['numero'])
    //              ->where('fecha_despacho <=',$datas['desde'])
    //              ->where('fecha_despacho >=',$datas['hasta'])
                  ->where('fecha_despacho >=', $datas['desde'])
                  ->where('fecha_despacho <=', $datas['hasta'])
                  ->join('sedes s', 'c.sede_cliente = s.id', 'left outer')
                  ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                  ->join('clientes k', 'c.cedula_cliente = k.cedula_cliente', 'left outer')
                  ->join('proveedores p', 'c.proveedor = p.id', 'left outer')
                  ->get()
                  ->result();
                }
                public function getcarga_fecha_cedula_numero($datas) {
                    return $this->db
                    ->select('c.*,s.nombre_sede,t.*,k.nombre_cliente,p.nombre_proveedor')
                    ->from('historial_ce c')
                    ->where('n_referencia_c', $datas['numero'])
      //              ->where('fecha_despacho <=',$datas['desde'])
      //              ->where('fecha_despacho >=',$datas['hasta'])
                    ->where('fecha_despacho >=', $datas['desde'])
                    ->where('fecha_despacho <=', $datas['hasta'])
                    ->join('sedes s', 'c.sede_cliente = s.id', 'left outer')
                    ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                    ->join('clientes k', 'c.cedula_cliente = k.cedula_cliente', 'left outer')
                    ->join('proveedores p', 'c.proveedor = p.id', 'left outer')
                    ->get()
                    ->result();
                  }
              public function getcarga_tiempo($datas) {
                  return $this->db
                  ->select('c.*,s.nombre_sede,t.*,k.nombre_cliente,p.nombre_proveedor')
                  ->from('historial_ce c')
    //              ->where('fecha_despacho <=',$datas['desde'])
    //              ->where('fecha_despacho >=',$datas['hasta'])
                  ->where('fecha_despacho >=', $datas['desde'])
                  ->where('fecha_despacho <=', $datas['hasta'])
                  ->join('sedes s', 'c.sede_cliente = s.id', 'left outer')
                  ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                  ->join('clientes k', 'c.cedula_cliente = k.cedula_cliente', 'left outer')
                  ->join('proveedores p', 'c.proveedor = p.id', 'left outer')
                  ->get()
                  ->result();
                }
                public function getcarga_numero($datas) {
                    return $this->db
                    ->select('c.*,s.nombre_sede,t.*,k.nombre_cliente,p.nombre_proveedor')
                    ->from('historial_ce c')
                    ->where('n_referencia_c', $datas['numero'])
                    ->join('sedes s', 'c.sede_cliente = s.id', 'left outer')
                    ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                    ->join('clientes k', 'c.cedula_cliente = k.cedula_cliente', 'left outer')
                    ->join('proveedores p', 'c.proveedor = p.id', 'left outer')
                    ->get()
                    ->result();
                  }
            public function getcarga_cedula_numero($id,$numero) {
                return $this->db
                ->select('c.*,s.nombre_sede,t.*,k.nombre_cliente,p.nombre_proveedor')
                ->from('historial_ce c')
                ->where('c.cedula_cliente', $id)
                ->where('n_referencia_c', $numero)
                ->join('sedes s', 'c.sede_cliente = s.id', 'left outer')
                ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                ->join('clientes k', 'c.cedula_cliente = k.cedula_cliente', 'left outer')
                ->join('proveedores p', 'c.proveedor = p.id', 'left outer')
                ->get()
                ->result();
              }
              public function getcarga_cedula_numero_tiempo($datas) {
                return $this->db
                ->select('c.*,s.nombre_sede,t.*,k.nombre_cliente,p.nombre_proveedor')
                ->from('historial_ce c')
                ->where('n_referencia_c', $datas['n_referencia_c'])
  //              ->where('fecha_despacho <=',$datas['desde'])
  //              ->where('fecha_despacho >=',$datas['hasta'])
                ->where('fecha_despacho >=', $datas['desde'])
                ->where('fecha_despacho <=', $datas['hasta'])
                ->join('sedes s', 'c.sede_cliente = s.id', 'left outer')
                ->join('tarifas t', 'c.id_tarifa = t.id', 'left outer')
                ->join('clientes k', 'c.cedula_cliente = k.cedula_cliente', 'left outer')
                ->join('proveedores p', 'c.proveedor = p.id', 'left outer')
                ->get()
                ->result();
                }
          public function deletecarga($id) {
            $this->db->where('codigo', $id);
            $this->db->delete('historial_ce');
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
      ///////////////////
      public function get_unused_id(){
            // Create a random user id between 1200 and 4294967295
            $random_unique_int = 2147483648 + mt_rand( -2147482448, 2147483647 );

            // Make sure the random user_id isn't already in use
            $query = $this->db->where( 'codigo', $random_unique_int )
                ->get_where( $this->db_table('historial_ce_table') );

            if( $query->num_rows() > 0 )
            {
                $query->free_result();

                // If the random user_id is already in use, try again
                return $this->get_unused_id();
            }

            return $random_unique_int;
        }

    }
