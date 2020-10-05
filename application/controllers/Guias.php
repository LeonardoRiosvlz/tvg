<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Guias extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Guias_model', 'guias');
	  }
    public function index() {
			if( ! $this->verify_min_level(1)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Guias/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getguias($id=0) {

				  $data['guias'] = $this->guias->getguias();
				  header('Content-Type: application/json');
				  echo json_encode(['guias' => $data['guias']]);

				}
				public function getguiasu($id=0) {
						$id = $this->input->post('id');
						$data['guias'] = $this->guias->getguiasu($id);
						header('Content-Type: application/json');
						echo json_encode(['guias' => $data['guias']]);

					}
				public function get_tiempo($id=0) {
						$datas['desde'] = $this->input->post('desde');
						$datas['hasta'] = $this->input->post('hasta');
						$data['guias'] = $this->guias->get_tiempo($datas);
						header('Content-Type: application/json');
						echo json_encode(['guias' => $data['guias']]);
					}
			public function get_tiempou($id=0) {
					$datas['desde'] = $this->input->post('desde');
					$datas['hasta'] = $this->input->post('hasta');
					$datas['user_id'] = $this->input->post('user_id');
					$data['guias'] = $this->guias->get_tiempou($datas);
					header('Content-Type: application/json');
					echo json_encode(['guias' => $data['guias']]);
				}
					public function get_cedula($id=0) {
							$datas['cedula'] = $this->input->post('cedula');
							$data['guias'] = $this->guias->get_cedula($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
						public function get_cedulau($id=0) {
								$datas['cedula'] = $this->input->post('cedula');
								$datas['user_id'] = $this->input->post('user_id');
								$data['guias'] = $this->guias->get_cedulau($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
					public function get_estado($id=0) {
							$datas['estado'] = $this->input->post('estado');
							$data['guias'] = $this->guias->get_estado($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
			 	public function get_estadou($id=0) {
					  $datas['user_id'] = $this->input->post('user_id');
			 			$datas['estado'] = $this->input->post('estado');
			 			$data['guias'] = $this->guias->get_estadou($datas);
			 			header('Content-Type: application/json');
			 			echo json_encode(['guias' => $data['guias']]);
			 		}
					public function get_ciudad($id=0) {
							$datas['ciudad'] = $this->input->post('ciudad');
							$data['guias'] = $this->guias->get_ciudad($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
						public function get_ciudadu($id=0) {
								$datas['user_id'] = $this->input->post('user_id');
								$data['guias'] = $this->guias->get_ciudadu($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
						public function get_fecha_cedula($id=0) {
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$datas['cedula'] = $this->input->post('cedula');
								$data['guias'] = $this->guias->get_fecha_cedula($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
					public function get_fecha_cedulau($id=0) {
							$datas['desde'] = $this->input->post('desde');
							$datas['hasta'] = $this->input->post('hasta');
							$datas['cedula'] = $this->input->post('cedula');
							$datas['user_id'] = $this->input->post('user_id');
							$data['guias'] = $this->guias->get_fecha_cedulau($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
				public function get_fecha_estado($id=0) {
						$datas['desde'] = $this->input->post('desde');
						$datas['hasta'] = $this->input->post('hasta');
						$datas['estado'] = $this->input->post('estado');
						$data['guias'] = $this->guias->get_fecha_estado($datas);
						header('Content-Type: application/json');
						echo json_encode(['guias' => $data['guias']]);
					}
					public function get_fecha_estadou($id=0) {
							$datas['desde'] = $this->input->post('desde');
							$datas['hasta'] = $this->input->post('hasta');
							$datas['estado'] = $this->input->post('estado');
							$datas['user_id'] = $this->input->post('user_id');
							$data['guias'] = $this->guias->get_fecha_estadou($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
					public function get_fecha_ciudad($id=0) {
							$datas['desde'] = $this->input->post('desde');
							$datas['hasta'] = $this->input->post('hasta');
							$datas['ciudad'] = $this->input->post('ciudad');
							$data['guias'] = $this->guias->get_fecha_ciudad($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
					public function get_fecha_ciudadu($id=0) {
							$datas['desde'] = $this->input->post('desde');
							$datas['hasta'] = $this->input->post('hasta');
							$datas['ciudad'] = $this->input->post('ciudad');
							$datas['user_id'] = $this->input->post('user_id');
							$data['guias'] = $this->guias->get_fecha_ciudadu($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
						public function get_cedula_estado($id=0) {
								$datas['cedula'] = $this->input->post('cedula');
								$datas['estado'] = $this->input->post('estado');
								$data['guias'] = $this->guias->get_cedula_estado($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
					public function get_cedula_estadou($id=0) {
							$datas['cedula'] = $this->input->post('cedula');
							$datas['estado'] = $this->input->post('estado');
							$datas['user_id'] = $this->input->post('user_id');
							$data['guias'] = $this->guias->get_cedula_estadou($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
						public function get_cedula_ciudad($id=0) {
								$datas['cedula'] = $this->input->post('cedula');
								$datas['ciudad'] = $this->input->post('ciudad');
								$data['guias'] = $this->guias->get_cedula_ciudad($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
						public function get_estado_ciudadu($id=0) {
								$datas['estado'] = $this->input->post('estado');
								$datas['ciudad'] = $this->input->post('ciudad');
								$datas['user_id'] = $this->input->post('user_id');
								$data['guias'] = $this->guias->get_estado_ciudadu($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
							public function get_fecha_cedula_ciudad($id=0) {
									$datas['desde'] = $this->input->post('desde');
									$datas['hasta'] = $this->input->post('hasta');
									$datas['cedula'] = $this->input->post('cedula');
									$datas['ciudad'] = $this->input->post('ciudad');
									$data['guias'] = $this->guias->get_fecha_cedula_ciudad($datas);
									header('Content-Type: application/json');
									echo json_encode(['guias' => $data['guias']]);
								}
						public function get_fecha_cedula_ciudadu($id=0) {
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$datas['cedula'] = $this->input->post('cedula');
								$datas['ciudad'] = $this->input->post('ciudad');
								$datas['user_id'] = $this->input->post('user_id');
								$data['guias'] = $this->guias->get_fecha_cedula_ciudadu($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
							public function get_fecha_estado_ciudad($id=0) {
									$datas['desde'] = $this->input->post('desde');
									$datas['hasta'] = $this->input->post('hasta');
									$datas['estado'] = $this->input->post('estado');
									$datas['ciudad'] = $this->input->post('ciudad');
									$data['guias'] = $this->guias->get_fecha_estado_ciudad($datas);
									header('Content-Type: application/json');
									echo json_encode(['guias' => $data['guias']]);
								}
						public function get_fecha_estado_ciudadu($id=0) {
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$datas['estado'] = $this->input->post('estado');
								$datas['ciudad'] = $this->input->post('ciudad');
								$datas['user_id'] = $this->input->post('user_id');
								$data['guias'] = $this->guias->get_fecha_estado_ciudadu($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
							public function get_fecha_estado_cedula($id=0) {
									$datas['desde'] = $this->input->post('desde');
									$datas['hasta'] = $this->input->post('hasta');
									$datas['estado'] = $this->input->post('estado');
									$datas['cedula'] = $this->input->post('cedula');
									$data['guias'] = $this->guias->get_fecha_estado_cedula($datas);
									header('Content-Type: application/json');
									echo json_encode(['guias' => $data['guias']]);
								}
						public function get_fecha_estado_cedulau($id=0) {
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$datas['estado'] = $this->input->post('estado');
								$datas['cedula'] = $this->input->post('cedula');
								$datas['user_id'] = $this->input->post('user_id');
								$data['guias'] = $this->guias->get_fecha_estado_cedulau($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
						public function get_fecha_estado_ciudad_cedula($id=0) {
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$datas['estado'] = $this->input->post('estado');
								$datas['ciudad'] = $this->input->post('ciudad');
								$datas['cedula'] = $this->input->post('cedula');
								$data['guias'] = $this->guias->get_fecha_estado_ciudad_cedula($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
					public function get_fecha_estado_ciudad_cedulau($id=0) {
							$datas['desde'] = $this->input->post('desde');
							$datas['hasta'] = $this->input->post('hasta');
							$datas['estado'] = $this->input->post('estado');
							$datas['ciudad'] = $this->input->post('ciudad');
							$datas['cedula'] = $this->input->post('cedula');
							$datas['user_id'] = $this->input->post('user_id');
							$data['guias'] = $this->guias->get_fecha_estado_ciudad_cedulau($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
			public function insertar() {
				if( ! $this->verify_min_level(1)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$data = json_decode($this->input->post('service_form'),true);
				$data['id']    = $this->guias->get_unused_id();
				$result = $this->guias->insertar($data);
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
				$result = $this->guias->editar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
			public function anular() {
				if( ! $this->verify_min_level(1)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
	            $id = $this->input->post('id');
	            $result = $this->guias->anularguias($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				 public function enfisico() {
					 if( ! $this->verify_min_level(1)){
						 redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
					 }
								 $id = $this->input->post('id');
								 $result = $this->guias->enfisico($id);
										if($result['code'] == 0){
												 echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
											 }
										 else{
												 echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
											 }
							}
					public function archivada() {
						if( ! $this->verify_min_level(1)){
							redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
						}
									$id = $this->input->post('id');
									$result = $this->guias->archivada($id);
										 if($result['code'] == 0){
													echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
												}
											else{
													echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
												}
							 }
				 public function cumplidasguias() {
					 if( ! $this->verify_min_level(1)){
						 redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
					 }
								 $datas['id'] = $this->input->post('id');
								 $datas['f_cumplida']= $this->input->post('f_cumplida');
								 $result = $this->guias->cumplidasguias($datas);
										if($result['code'] == 0){
												 echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
											 }
										 else{
												 echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
											 }
							}
				 ////////////////
			 public function detail_foto() {
				 if( ! $this->verify_min_level(1)){
						 redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
					 }
				 $config['upload_path']          = './include/guias';
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
					 $data['url'] ="/include/guias/".$file_name;
					 $data['guia'] = $this->input->post('guia');
					 $data['nombre'] = $upload_data['file_name'];
					 $rut=$this->guias->imagen_insert($data);
					 echo json_encode(['status' => '201', 'message' => 'Imagen creada exitosamente']);
				 }
			 }
			 function getimagenes() {
			 $data['guia'] = $this->input->post('guia');
			 $data['imagenes'] = $this->guias->imagenes_get($data);
			 header('Content-Type: application/json');
			 echo json_encode(['imagenes' => $data['imagenes']]);

			 }

			 public function eliminarImagen() {
				 if( ! $this->verify_min_level(1)){
							 redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
						 }
				 $id = $this->input->post('id');
				 $result = $this->guias->eliminarImagen($id);
						if($result['code'] == 0){
								 echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
							 }
						 else{
								 echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
							 }
			}
				 public function enviarguias() {
					 if( ! $this->verify_min_level(1)){
						 redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
					 }
								 $id = $this->input->post('id');
								 $result = $this->guias->enviarguias($id);
										if($result['code'] == 0){
												 echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
											 }
										 else{
												 echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
											 }
							}
				public function get_guias() {
		        $id = $this->input->post('id');
					  $data['guias'] = $this->guias->get_guias($id);
					  header('Content-Type: application/json');
					  echo json_encode(['guias' => $data['guias']]);
		 }
				 public function Guia_to_pdf($id){
					 $this->load->library('Pdf');
						$hoy=date("d/m/y");
						$html_content = $this->guias->fetch_details($id);
						//$this->pdf->set_paper('letter', 'landscape');
						$this->pdf->loadHtml($html_content);
						$this->pdf->render();
						$this->pdf->stream("GDC-".$id.".pdf", array("Attachment"=>0));

				}
				public function excelexport_tiempo($desde,$hasta){
					$datas['desde'] = $desde;
					$datas['hasta'] = $hasta;
					$llamadas = $this->guias->get_tiempo($datas);
				 if(count($llamadas) > 0){
						 //Cargamos la librería de excel.
						 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
						 $this->excel->getActiveSheet()->setTitle('Cargas');
						 //Contador de filas
						 $contador = 1;
						 //Le aplicamos ancho las columnas.
						 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
						 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
						 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
						 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
						 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

						 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
						 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
						 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
						 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
						 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
						 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
						 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
						 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
						 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
						 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
						 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
						 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
						 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
						 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
						 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
						 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
						 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
						 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
						 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
						 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
						 //Definimos la data del cuerpo.
						 foreach($llamadas as $l){
								//Incrementamos una fila más, para ir a la siguiente.
								$contador++;
								//Informacion de las filas de la consulta.
								$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
								$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
								$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
								$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
								$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
								$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
								$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
								$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
								$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
								$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
								$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
								$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
								$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
								$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
								$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
								$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
								$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
								$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
								$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
								$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
								$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
								$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
								$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
								$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


						 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga.xls";
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
		public function excelexport_cedula($cedula){
			$datas['cedula'] = $cedula;
			$llamadas = $this->guias->get_cedula($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_cedula.xls";
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
		public function excelexport_estado($estado){
			$datas['estado'] = $estado;
			$llamadas = $this->guias->get_estado($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_estado.xls";
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
		public function excelexport_ciudad($ciudad){
			$datas['ciudad'] = $ciudad;
			$llamadas = $this->guias->get_ciudad($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_ciudad.xls";
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
		public function excelexport_fecha_cedula($desde,$hasta,$cedula){
			$datas['desde'] = $desde;
			$datas['hasta'] = $hasta;
			$datas['cedula'] = $cedula;
			$llamadas = $this->guias->get_fecha_cedula($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_FC.xls";
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
		public function excelexport_fecha_estado($desde,$hasta,$estado){
			$datas['desde'] = $desde;
			$datas['hasta'] = $hasta;
			$datas['estado'] = $estado;
			$llamadas = $this->guias->get_fecha_estado($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_FE.xls";
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
		public function excelexport_fecha_ciudad($desde,$hasta,$ciudad){
			$datas['desde'] = $desde;
			$datas['hasta'] = $hasta;
			$datas['ciudad'] = $ciudad;
			$llamadas = $this->guias->get_fecha_ciudad($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_FCI.xls";
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
		public function excelexport_cedula_estado($cedula,$estado){
			$datas['estado'] = $estado;
			$datas['cedula'] = $cedula;
			$llamadas = $this->guias->get_cedula_estado($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_CE.xls";
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
		public function excelexport_cedula_ciudad($cedula,$ciudad){
			$datas['ciudad'] = $ciudad;
			$datas['cedula'] = $cedula;
			$llamadas = $this->guias->get_cedula_ciudad($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_CC.xls";
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
 public function excelexport_estado_ciudad($estado,$ciudad){
	 $datas['ciudad'] = $ciudad;
	 $datas['estado'] = $estado;
	 $llamadas = $this->guias->get_estado_ciudad($datas);
	if(count($llamadas) > 0){
			//Cargamos la librería de excel.
			$this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Cargas');
			//Contador de filas
			$contador = 1;
			//Le aplicamos ancho las columnas.
			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
			$this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

			$this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
			$this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
			$this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
			$this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
			$this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
			$this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
			$this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
			$this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
			$this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
			$this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
			$this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
			$this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
			$this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
			$this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
			$this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
			$this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
			$this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
			$this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
			$this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
			$this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
			$this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
			$this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
			//Definimos la data del cuerpo.
			foreach($llamadas as $l){
				 //Incrementamos una fila más, para ir a la siguiente.
				 $contador++;
				 //Informacion de las filas de la consulta.
				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


			}
			//Le ponemos un nombre al archivo que se va a generar.
			$archivo = "Guias_De_Carga_ECI.xls";
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
public function excelexport_fecha_ciudad_cedula($desde,$hasta,$cedula,$ciudad){
	$datas['desde'] = $desde;
	$datas['hasta'] = $hasta;
	$datas['ciudad'] = $ciudad;
	$datas['cedula'] = $cedula;
	$llamadas = $this->guias->get_fecha_cedula_ciudad($datas);
 if(count($llamadas) > 0){
		 //Cargamos la librería de excel.
		 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
		 $this->excel->getActiveSheet()->setTitle('Cargas');
		 //Contador de filas
		 $contador = 1;
		 //Le aplicamos ancho las columnas.
		 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
		 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

		 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
		 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
		 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
		 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
		 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
		 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
		 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
		 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
		 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
		 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
		 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
		 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
		 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
		 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
		 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
		 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
		 //Definimos la data del cuerpo.
		 foreach($llamadas as $l){
				//Incrementamos una fila más, para ir a la siguiente.
				$contador++;
				//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
				$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
				$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
				$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
				$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
				$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
				$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
				$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
				$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
				$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
				$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
				$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
				$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
				$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
				$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
				$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
				$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
				$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
				$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
				$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
				$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
				$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
				$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
				$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


		 }
		 //Le ponemos un nombre al archivo que se va a generar.
		 $archivo = "Guias_De_Carga_FCC.xls";
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
public function excelexport_fecha_estado_ciudad($desde,$hasta,$estado,$ciudad){
	$datas['desde'] = $desde;
	$datas['hasta'] = $hasta;
	$datas['ciudad'] = $ciudad;
	$datas['estado'] = $estado;
	$llamadas = $this->guias->get_fecha_estado_ciudad($datas);
 if(count($llamadas) > 0){
		 //Cargamos la librería de excel.
		 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
		 $this->excel->getActiveSheet()->setTitle('Cargas');
		 //Contador de filas
		 $contador = 1;
		 //Le aplicamos ancho las columnas.
		 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
		 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

		 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
		 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
		 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
		 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
		 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
		 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
		 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
		 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
		 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
		 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
		 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
		 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
		 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
		 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
		 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
		 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
		 //Definimos la data del cuerpo.
		 foreach($llamadas as $l){
				//Incrementamos una fila más, para ir a la siguiente.
				$contador++;
				//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
				$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
				$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
				$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
				$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
				$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
				$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
				$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
				$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
				$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
				$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
				$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
				$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
				$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
				$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
				$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
				$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
				$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
				$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
				$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
				$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
				$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
				$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
				$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


		 }
		 //Le ponemos un nombre al archivo que se va a generar.
		 $archivo = "Guias_De_Carga_FEC.xls";
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
public function excelexport_fecha_estado_cedula($desde,$hasta,$estado,$cedula){
	$datas['desde'] = $desde;
	$datas['hasta'] = $hasta;
	$datas['cedula'] = $cedula;
	$datas['estado'] = $estado;
	$llamadas = $this->guias->get_fecha_estado_cedula($datas);
 if(count($llamadas) > 0){
		 //Cargamos la librería de excel.
		 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
		 $this->excel->getActiveSheet()->setTitle('Cargas');
		 //Contador de filas
		 $contador = 1;
		 //Le aplicamos ancho las columnas.
		 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
		 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

		 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
		 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
		 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
		 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
		 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
		 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
		 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
		 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
		 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
		 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
		 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
		 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
		 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
		 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
		 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
		 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
		 //Definimos la data del cuerpo.
		 foreach($llamadas as $l){
				//Incrementamos una fila más, para ir a la siguiente.
				$contador++;
				//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
				$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
				$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
				$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
				$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
				$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
				$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
				$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
				$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
				$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
				$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
				$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
				$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
				$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
				$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
				$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
				$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
				$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
				$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
				$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
				$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
				$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
				$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
				$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


		 }
		 //Le ponemos un nombre al archivo que se va a generar.
		 $archivo = "Guias_De_Carga_FECd.xls";
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
public function excelexport_fecha_estado_ciudad_cedula($desde,$hasta,$estado,$ciudad,$cedula){
	$datas['desde'] = $desde;
	$datas['hasta'] = $hasta;
	$datas['cedula'] = $cedula;
	$datas['ciudad'] = $ciudad;
	$datas['estado'] = $estado;
	$llamadas = $this->guias->get_fecha_estado_ciudad_cedula($datas);
 if(count($llamadas) > 0){
		 //Cargamos la librería de excel.
		 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
		 $this->excel->getActiveSheet()->setTitle('Cargas');
		 //Contador de filas
		 $contador = 1;
		 //Le aplicamos ancho las columnas.
		 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
		 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

		 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
		 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
		 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
		 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
		 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
		 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
		 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
		 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
		 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
		 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
		 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
		 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
		 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
		 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
		 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
		 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
		 //Definimos la data del cuerpo.
		 foreach($llamadas as $l){
				//Incrementamos una fila más, para ir a la siguiente.
				$contador++;
				//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
				$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
				$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
				$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
				$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
				$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
				$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
				$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
				$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
				$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
				$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
				$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
				$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
				$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
				$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
				$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
				$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
				$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
				$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
				$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
				$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
				$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
				$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
				$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


		 }
		 //Le ponemos un nombre al archivo que se va a generar.
		 $archivo = "Guias_De_Carga_FECC.xls";
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
