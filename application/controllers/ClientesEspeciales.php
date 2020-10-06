<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ClientesEspeciales extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->library('Excel');
		// EXCEL
		$this->load->model('HistoriaCE_model', 'historial');
		// Load form validation library
		$this->load->library('form_validation');
		// load CSV library
		$this->load->library('CSVReader');
		// Load file helper
		$this->load->helper('file');

	  $this->load->library('Pdf');
	  }
    public function index() {
			if( ! $this->verify_min_level(1)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('ClientesEspeciales/index');
        $this->load->view('footer',["js"=>[""]]);
      }

			/////global
			public function getcarga($id=0) {
				  $data['cargas'] = $this->historial->getcarga();
				  header('Content-Type: application/json');
				  echo json_encode(['cargas' => $data['cargas']]);
				}
				public function get_anexo($id=0) {
						$id = $this->input->post('anexo');
						$data['cargas'] = $this->historial->get_anexo($id);
						header('Content-Type: application/json');
						echo json_encode(['cargas' => $data['cargas']]);
					}
					public function getcarga_cedula($id=0) {
							$id = $this->input->post('cedula');
							$data['cargas'] = $this->historial->getcarga_cedula($id);
							header('Content-Type: application/json');
							echo json_encode(['cargas' => $data['cargas']]);
						}
					public function getcarga_cedula_tiempo($id=0) {
							$datas['cedula'] = $this->input->post('cedula');
							$datas['desde'] = $this->input->post('desde');
							$datas['hasta'] = $this->input->post('hasta');
							$data['cargas'] = $this->historial->getcarga_cedula_tiempo($datas);
							header('Content-Type: application/json');
							echo json_encode(['cargas' => $data['cargas']]);
						}
						public function getcarga_fecha_numero($id=0) {
								$datas['numero'] = $this->input->post('numero');
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$data['cargas'] = $this->historial->getcarga_fecha_numero($datas);
								header('Content-Type: application/json');
								echo json_encode(['cargas' => $data['cargas']]);
							}
							public function getcarga_fecha_cedula_numero($id=0) {
									$datas['numero'] = $this->input->post('numero');
									$datas['cedula'] = $this->input->post('cedula');
									$datas['desde'] = $this->input->post('desde');
									$datas['hasta'] = $this->input->post('hasta');
									$data['cargas'] = $this->historial->getcarga_fecha_cedula_numero($datas);
									header('Content-Type: application/json');
									echo json_encode(['cargas' => $data['cargas']]);
								}
						public function getcarga_tiempo($id=0) {
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$data['cargas'] = $this->historial->getcarga_tiempo($datas);
								header('Content-Type: application/json');
								echo json_encode(['cargas' => $data['cargas']]);
							}
							public function getcarga_numero($id=0) {
									$datas['numero'] = $this->input->post('numero');
									$data['cargas'] = $this->historial->getcarga_numero($datas);
									header('Content-Type: application/json');
									echo json_encode(['cargas' => $data['cargas']]);
								}
					public function getcarga_cedula_numero($id=0) {
							$id = $this->input->post('cedula');
							$numero = $this->input->post('numero');
							$data['cargas'] = $this->historial->getcarga_cedula_numero($id,$numero);
							header('Content-Type: application/json');
							echo json_encode(['cargas' => $data['cargas']]);
						}
						public function enviarcarga($id=0) {
				            $id = $this->input->post('id');
				            $result = $this->historial->enviarcarga($id);
				               if($result['code'] == 0){
				                    echo json_encode(['status' => '200', 'message' => ' correctamente']);
				                  }
				                else{
				                    echo json_encode(['status' => '500', 'message' => ' ha ocurrido un error']);
				                  }
							}
						public function getcarga_cedula_numero_tiempo($id=0) {
								$datas['cedula'] = $this->input->post('cedula');
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$datas['n_referencia_c'] = $this->input->post('n_referencia_c');
								$data['cargas'] = $this->historial->getcarga_cedula_numero_tiempo($datas);
								header('Content-Type: application/json');
								echo json_encode(['cargas' => $data['cargas']]);
							}

			public function insertar() {
				if( ! $this->verify_min_level(1)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$data = json_decode($this->input->post('service_form'),true);
				$data['codigo']    = $this->historial->get_unused_id();
				$result = $this->historial->insertar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
			public function editar() {
				if( ! $this->verify_min_level(1)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
			    $data = json_decode($this->input->post('service_form'),true);
				$result = $this->historial->editar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
			public function eliminar() {
				if( ! $this->verify_min_level(1)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
	            $id = $this->input->post('id');
	            $result = $this->historial->deletecarga($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_clientes() {
		        $id = $this->input->post('id');
					  $data['clientes'] = $this->clientes->get_clientes($id);
					  header('Content-Type: application/json');
					  echo json_encode(['clientes' => $data['clientes']]);
		 }

		////////////////
				public function detail_foto() {
					if( ! $this->verify_min_level(1)){
							redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
						}
					$config['upload_path']          = './include/files';
					$config['allowed_types']        = 'jpg|png|jpeg';
					$config['max_size']             = 7500;
					$config['max_width']            = 2500;
					$config['max_height']           = 1400;
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('file')) {
						$error = array('error' => $this->upload->display_errors());
						echo json_encode($error);
					} else {
							$upload_data = $this->upload->data();
						$file_name = $upload_data['file_name'];
						$data['url'] ="/include/files/".$file_name;
						$data['id_carga_cliente'] = $this->input->post('id_carga_cliente');
						$rut=$this->historial->imagen_insert($data);
						echo json_encode(['status' => '201', 'message' => 'Imagen creada exitosamente']);
					}
				}
				function getimagenes() {

				$id = $this->input->post('id_carga_cliente');
				$data['imagenes'] = $this->historial->imagenes_get($id);
				header('Content-Type: application/json');
				echo json_encode(['imagenes' => $data['imagenes']]);

				}

				public function eliminarImagen() {
					if( ! $this->verify_min_level(1)){
								redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
							}
					$id = $this->input->post('id');
					$result = $this->historial->eliminarImagen($id);
						 if($result['code'] == 0){
									echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
								}
							else{
									echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
								}
			 }



			 public function excelexport_cedula($id){
				 $llamadas = $this->historial->getcarga_cedula($id);
			 	 if(count($llamadas) > 0){
			 			 //Cargamos la librería de excel.
			 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
			 			 $this->excel->getActiveSheet()->setTitle('Cargas');
			 			 //Contador de filas
			 			 $contador = 1;
			 			 //Le aplicamos ancho las columnas.
			 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
						 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
						 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
						 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

			 			 //Le aplicamos negrita a los títulos de la cabecera.
			 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
						 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
						 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

			 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
			 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
			 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
			 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
			 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
			 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
			 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
			 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
			 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
			 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
			 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
			 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
			 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
			 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
						 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
						 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
						 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
						 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
			 			 //Definimos la data del cuerpo.
			 			 foreach($llamadas as $l){
			 					//Incrementamos una fila más, para ir a la siguiente.
			 					$contador++;
			 					//Informacion de las filas de la consulta.
			 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
								if ($l->nombre_empresa==="No aplica") {
									$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
								}else{
									$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
								}
								if ($l->nombre_empresa==="No aplica") {
									$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
								}else{
									$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
								}
			 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
			 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
			 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
			 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
			 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
			 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
			 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
			 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
			 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
			 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
			 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
			 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
								$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
								$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
								$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
								$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
								$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);


			 			 }
			 			 //Le ponemos un nombre al archivo que se va a generar.
			 			 $archivo = "Cargas_excel.xls";
			 			 header('Content-Type: application/vnd.ms-excel');
			 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
			 			 header('Cache-Control: max-age=0');
			 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
			 			 //Hacemos una salida al navegador con el archivo Excel.
			 			 $objWriter->save('php://output');
			 		}else{
			 			 echo 'No se han encontrado llamadas';
			 			 exit;
			 		}
			  }
				public function excelexport_numero($id){
					$datas['numero']=$id;
	 			 $llamadas = $this->historial->getcarga_numero($datas);
	 			 if(count($llamadas) > 0){
	 					 //Cargamos la librería de excel.
	 					 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
	 					 $this->excel->getActiveSheet()->setTitle('Cargas');
	 					 //Contador de filas
	 					 $contador = 1;
						 //Le aplicamos ancho las columnas.
			 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
						 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
						 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
						 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

			 			 //Le aplicamos negrita a los títulos de la cabecera.
			 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
						 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
						 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

			 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
			 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
			 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
			 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
			 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
			 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
			 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
			 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
			 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
			 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
			 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
			 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
			 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
			 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
						 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
						 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
						 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
						 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
			 			 //Definimos la data del cuerpo.
			 			 foreach($llamadas as $l){
			 					//Incrementamos una fila más, para ir a la siguiente.
			 					$contador++;
			 					//Informacion de las filas de la consulta.
			 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
								if ($l->nombre_empresa==="No aplica") {
									$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
								}else{
									$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
								}
								if ($l->nombre_empresa==="No aplica") {
									$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
								}else{
									$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
								}
			 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
			 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
			 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
			 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
			 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
			 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
			 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
			 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
			 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
			 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
			 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
			 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
								$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
								$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
								$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
								$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
								$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);



	 					 }
	 					 //Le ponemos un nombre al archivo que se va a generar.
	 					 $archivo = "Cargas_excel.xls";
	 					 header('Content-Type: application/vnd.ms-excel');
	 					 header('Content-Disposition: attachment;filename="'.$archivo.'"');
	 					 header('Cache-Control: max-age=0');
	 					 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
	 					 //Hacemos una salida al navegador con el archivo Excel.
	 					 $objWriter->save('php://output');
	 				}else{
	 					 echo 'No se han encontrado llamadas';
	 					 exit;
	 				}
	 			}


							 public function excelexport_cedula_numero($id,$numero){
								 $llamadas =  $this->historial->getcarga_cedula_numero($id,$numero);
							 	 if(count($llamadas) > 0){
							 			 //Cargamos la librería de excel.
							 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
							 			 $this->excel->getActiveSheet()->setTitle('Cargas');
							 			 //Contador de filas
							 			 $contador = 1;
										 //Le aplicamos ancho las columnas.
							 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

							 			 //Le aplicamos negrita a los títulos de la cabecera.
							 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

							 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
							 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
							 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
							 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
							 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
							 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
							 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
							 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
							 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
							 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
							 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
							 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
										 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
										 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
										 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
										 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
							 			 //Definimos la data del cuerpo.
							 			 foreach($llamadas as $l){
							 					//Incrementamos una fila más, para ir a la siguiente.
							 					$contador++;
							 					//Informacion de las filas de la consulta.
							 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
												}
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
												}
							 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
							 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
							 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
							 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
							 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
							 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
							 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
							 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
							 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
							 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
												$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
												$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
												$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
												$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
												$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);




							 			 }
							 			 //Le ponemos un nombre al archivo que se va a generar.
							 			 $archivo = "Cargas_excel.xls";
							 			 header('Content-Type: application/vnd.ms-excel');
							 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
							 			 header('Cache-Control: max-age=0');
							 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
							 			 //Hacemos una salida al navegador con el archivo Excel.
							 			 $objWriter->save('php://output');
							 		}else{
							 			 echo 'No se han encontrado llamadas';
							 			 exit;
							 		}
							  }
								public function excelexport_tiempo($desde,$hasta){
									$datas['desde'] = $desde;
									$datas['hasta'] = $hasta;
									$llamadas = $this->historial->getcarga_tiempo($datas);
							 	 if(count($llamadas) > 0){
							 			 //Cargamos la librería de excel.
							 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
							 			 $this->excel->getActiveSheet()->setTitle('Cargas');
							 			 //Contador de filas
							 			 $contador = 1;
										 //Le aplicamos ancho las columnas.
							 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

							 			 //Le aplicamos negrita a los títulos de la cabecera.
							 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

							 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
							 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
							 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
							 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
							 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
							 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
							 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
							 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
							 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
							 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
							 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
							 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
										 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
										 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
										 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
										 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
							 			 //Definimos la data del cuerpo.
							 			 foreach($llamadas as $l){
							 					//Incrementamos una fila más, para ir a la siguiente.
							 					$contador++;
							 					//Informacion de las filas de la consulta.
							 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
												}
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
												}
							 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
							 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
							 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
							 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
							 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
							 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
							 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
							 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
							 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
							 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
												$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
												$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
												$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
												$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
												$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);




							 			 }
							 			 //Le ponemos un nombre al archivo que se va a generar.
							 			 $archivo = "Cargas_excel.xls";
							 			 header('Content-Type: application/vnd.ms-excel');
							 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
							 			 header('Cache-Control: max-age=0');
							 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
							 			 //Hacemos una salida al navegador con el archivo Excel.
							 			 $objWriter->save('php://output');
							 		}else{
							 			 echo 'No se han encontrado llamadas';
							 			 exit;
							 		}
							 	}

								public function excelexport_cedula_tiempo($desde,$hasta,$id){
									$datas['cedula'] = $id;
									$datas['desde'] = $desde;
									$datas['hasta'] = $hasta;
									$llamadas = $this->historial->getcarga_cedula_tiempo($datas);
							 	 if(count($llamadas) > 0){
							 			 //Cargamos la librería de excel.
							 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
							 			 $this->excel->getActiveSheet()->setTitle('Cargas');
							 			 //Contador de filas
							 			 $contador = 1;
										 //Le aplicamos ancho las columnas.
							 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

							 			 //Le aplicamos negrita a los títulos de la cabecera.
							 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

							 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
							 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
							 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
							 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
							 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
							 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
							 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
							 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
							 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
							 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
							 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
							 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
										 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
										 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
										 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
										 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
							 			 //Definimos la data del cuerpo.
							 			 foreach($llamadas as $l){
							 					//Incrementamos una fila más, para ir a la siguiente.
							 					$contador++;
							 					//Informacion de las filas de la consulta.
							 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
												}
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
												}
							 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
							 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
							 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
							 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
							 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
							 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
							 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
							 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
							 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
							 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
												$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
												$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
												$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
												$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
												$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);




							 			 }
							 			 //Le ponemos un nombre al archivo que se va a generar.
							 			 $archivo = "Cargas_excel.xls";
							 			 header('Content-Type: application/vnd.ms-excel');
							 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
							 			 header('Cache-Control: max-age=0');
							 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
							 			 //Hacemos una salida al navegador con el archivo Excel.
							 			 $objWriter->save('php://output');
							 		}else{
							 			 echo 'No se han encontrado llamadas';
							 			 exit;
							 		}
							 	}

																public function excelexport_fecha_cedula_numero($desde,$hasta,$id,$numero){
																	$datas['cedula'] = $id;
																	$datas['numero'] = $numero;
																	$datas['desde'] = $desde;
																	$datas['hasta'] = $hasta;
																	$llamadas = $this->historial->getcarga_fecha_cedula_numero($datas);
															 	 if(count($llamadas) > 0){
															 			 //Cargamos la librería de excel.
															 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
															 			 $this->excel->getActiveSheet()->setTitle('Cargas');
															 			 //Contador de filas
															 			 $contador = 1;
																		 //Le aplicamos ancho las columnas.
															 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
																		 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
																		 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
																		 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

															 			 //Le aplicamos negrita a los títulos de la cabecera.
															 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
																		 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
																		 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

															 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
															 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
																		 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
															 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
															 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
															 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
															 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
															 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
															 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
															 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
															 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
															 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
															 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
															 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
															 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
																		 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
																		 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
																		 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
																		 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
																		 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
															 			 //Definimos la data del cuerpo.
															 			 foreach($llamadas as $l){
															 					//Incrementamos una fila más, para ir a la siguiente.
															 					$contador++;
															 					//Informacion de las filas de la consulta.
															 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
																				if ($l->nombre_empresa==="No aplica") {
																					$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
																				}else{
																					$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
																				}
																				if ($l->nombre_empresa==="No aplica") {
																					$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
																				}else{
																					$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
																				}
															 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
															 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
															 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
															 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
															 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
															 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
															 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
															 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
															 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
															 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
															 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
															 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
																				$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
																				$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
																				$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
																				$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
																				$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);




															 			 }
															 			 //Le ponemos un nombre al archivo que se va a generar.
															 			 $archivo = "Cargas_excel.xls";
															 			 header('Content-Type: application/vnd.ms-excel');
															 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
															 			 header('Cache-Control: max-age=0');
															 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
															 			 //Hacemos una salida al navegador con el archivo Excel.
															 			 $objWriter->save('php://output');
															 		}else{
															 			 echo 'No se han encontrado llamadas';
															 			 exit;
															 		}
															 	}
								public function excelexport_fecha_numero($desde,$hasta,$id){
									$datas['numero'] = $id;
									$datas['desde'] = $desde;
									$datas['hasta'] = $hasta;
									$llamadas = $this->historial->getcarga_fecha_numero($datas);
							 	 if(count($llamadas) > 0){
							 			 //Cargamos la librería de excel.
							 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
							 			 $this->excel->getActiveSheet()->setTitle('Cargas');
							 			 //Contador de filas
							 			 $contador = 1;
										 //Le aplicamos ancho las columnas.
							 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

							 			 //Le aplicamos negrita a los títulos de la cabecera.
							 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

							 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
							 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
							 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
							 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
							 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
							 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
							 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
							 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
							 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
							 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
							 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
							 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
										 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
										 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
										 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
										 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
							 			 //Definimos la data del cuerpo.
							 			 foreach($llamadas as $l){
							 					//Incrementamos una fila más, para ir a la siguiente.
							 					$contador++;
							 					//Informacion de las filas de la consulta.
							 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
												}
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
												}
							 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
							 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
							 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
							 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
							 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
							 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
							 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
							 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
							 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
							 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
												$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
												$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
												$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
												$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
												$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);




							 			 }
							 			 //Le ponemos un nombre al archivo que se va a generar.
							 			 $archivo = "Cargas_excel.xls";
							 			 header('Content-Type: application/vnd.ms-excel');
							 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
							 			 header('Cache-Control: max-age=0');
							 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
							 			 //Hacemos una salida al navegador con el archivo Excel.
							 			 $objWriter->save('php://output');
							 		}else{
							 			 echo 'No se han encontrado llamadas';
							 			 exit;
							 		}
							 	}


								public function excelexport_cedulant($id,$desde,$hasta){
									$datas['n_referencia_c'] = $id;
									$datas['desde'] = $desde;
									$datas['hasta'] = $hasta;
									$llamadas = $this->historial->getcarga_cedula_numero_tiempo($datas);
							 	 if(count($llamadas) > 0){
							 			 //Cargamos la librería de excel.
							 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
							 			 $this->excel->getActiveSheet()->setTitle('Cargas');
							 			 //Contador de filas
							 			 $contador = 1;
										 //Le aplicamos ancho las columnas.
							 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

							 			 //Le aplicamos negrita a los títulos de la cabecera.
							 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

							 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
							 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
							 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
							 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
							 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
							 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
							 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
							 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
							 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
							 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
							 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
							 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
										 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
										 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
										 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
										 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
							 			 //Definimos la data del cuerpo.
							 			 foreach($llamadas as $l){
							 					//Incrementamos una fila más, para ir a la siguiente.
							 					$contador++;
							 					//Informacion de las filas de la consulta.
							 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
												}
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
												}
							 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
							 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
							 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
							 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
							 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
							 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
							 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
							 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
							 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
							 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
												$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
												$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
												$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
												$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
												$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);




							 			 }
							 			 //Le ponemos un nombre al archivo que se va a generar.
							 			 $archivo = "Cargas_excel.xls";
							 			 header('Content-Type: application/vnd.ms-excel');
							 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
							 			 header('Cache-Control: max-age=0');
							 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
							 			 //Hacemos una salida al navegador con el archivo Excel.
							 			 $objWriter->save('php://output');
							 		}else{
							 			 echo 'No se han encontrado llamadas';
							 			 exit;
							 		}
							 	}

								public function excelexport_anexo($id){

									$llamadas	= $this->historial->get_anexo($id);
							 	 if(count($llamadas) > 0){
							 			 //Cargamos la librería de excel.
							 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
							 			 $this->excel->getActiveSheet()->setTitle('Cargas');
							 			 //Contador de filas
							 			 $contador = 1;
										 //Le aplicamos ancho las columnas.
							 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

							 			 //Le aplicamos negrita a los títulos de la cabecera.
							 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

							 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
							 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
							 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
							 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
							 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
							 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
							 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
							 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
							 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
							 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
							 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
							 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
										 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
										 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
										 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
										 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
							 			 //Definimos la data del cuerpo.
							 			 foreach($llamadas as $l){
							 					//Incrementamos una fila más, para ir a la siguiente.
							 					$contador++;
							 					//Informacion de las filas de la consulta.
							 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
												}
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
												}
							 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
							 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
							 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
							 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
							 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
							 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
							 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
							 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
							 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
							 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
												$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
												$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
												$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
												$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
												$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);


							 			 }
							 			 //Le ponemos un nombre al archivo que se va a generar.
							 			 $archivo = "Cargas_excel.xls";
							 			 header('Content-Type: application/vnd.ms-excel');
							 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
							 			 header('Cache-Control: max-age=0');
							 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
							 			 //Hacemos una salida al navegador con el archivo Excel.
							 			 $objWriter->save('php://output');
							 		}else{
							 			 echo 'No se han encontrado llamadas';
							 			 exit;
							 		}
							 	}
}
