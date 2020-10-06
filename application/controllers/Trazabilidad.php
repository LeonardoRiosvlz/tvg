<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Trazabilidad extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Trazabilidad_model', 'trazabilidad');
		$this->load->model('Guias_model', 'guias');
	  }
    public function index() {
			if( ! $this->verify_min_level(1)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Trazabilidad/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function timeline() {
	     		$this->is_logged_in();
	        $this->load->view('header',["css"=>[""]]);
					$this->load->view('menu_blank',["css"=>[""]]);
	        $this->load->view('Trazabilidad/timeline');
	        $this->load->view('footer',["js"=>[""]]);
	      }
				public function satelites() {
						$this->is_logged_in();
						$this->load->view('header',["css"=>[""]]);
						$this->load->view('menu_blank',["css"=>[""]]);
						$this->load->view('Trazabilidad/satelite');
						$this->load->view('footer',["js"=>[""]]);
					}
			public function gettrazabilidad($id=0) {
					$datas['id_guia'] = $this->input->post('id_guia');
					$datas['prefijo'] = $this->input->post('prefijo');
				  $data['trazabilidad'] = $this->trazabilidad->gettrazabilidad($datas);
				  header('Content-Type: application/json');
				  echo json_encode(['trazabilidad' => $data['trazabilidad']]);

				}

			public function insertar() {
				if( ! $this->verify_min_level(1)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$config['upload_path']          = './include/img/trazabilidad/';
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['max_size']             = 70500;
				$config['max_width']            = 20500;
				$config['max_height']           = 14000;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('files')) {
					$error = array('error' => $this->upload->display_errors());
					echo json_encode($error);
				} else {
					$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];
					$data = json_decode($this->input->post('service_form'),true);
					$data['url_foto'] ="/include/img/trazabilidad/".$file_name;
					$result = $this->trazabilidad->insertar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}

				}
			public function editar() {
				if( ! $this->verify_min_level(1)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
			    $data = json_decode($this->input->post('service_form'),true);
				$result = $this->trazabilidad->editar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
				public function editar_img() {
					if( ! $this->verify_min_level(1)){
						redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
					}
					$config['upload_path']          = './include/img/trazabilidad/';
					$config['allowed_types']        = 'jpg|png|jpeg';
					$config['max_size']             = 70500;
					$config['max_width']            = 20500;
					$config['max_height']           = 14000;
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('files')) {
						$error = array('error' => $this->upload->display_errors());
						echo json_encode($error);
					} else {
						$upload_data = $this->upload->data();
						$file_name = $upload_data['file_name'];
						$data = json_decode($this->input->post('service_form'),true);
						$data['url_foto'] ="/include/img/trazabilidad/".$file_name;
						$result = $this->trazabilidad->editar_img($data);
						if($result['code'] == 0){
							echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
						}
						else{
							echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
						}
					}
				}
				public function get_id_n($id=0) {
						$datas['id'] = $this->input->post('id');
						$data['guias'] = $this->trazabilidad->get_id_n($datas);
						header('Content-Type: application/json');
						echo json_encode(['guias' => $data['guias']]);
					}
					public function get_id_e($id=0) {
							$datas['id'] = $this->input->post('id');
							$data['guias'] = $this->trazabilidad->get_id_e($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
						public function get_id_ns($id=0) {
								$datas['id'] = $this->input->post('id');
								$datas['s'] = $this->input->post('s');
								$data['guias'] = $this->trazabilidad->get_id_n($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
							public function get_id_es($id=0) {
									$datas['id'] = $this->input->post('id');
									$datas['s'] = $this->input->post('s');
									$data['guias'] = $this->trazabilidad->get_id_e($datas);
									header('Content-Type: application/json');
									echo json_encode(['guias' => $data['guias']]);
								}
			public function eliminar() {
				if( ! $this->verify_min_level(1)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
	            $id = $this->input->post('id');
	            $result = $this->trazabilidad->deletetrazabilidad($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_trazabilidad() {
		        $id = $this->input->post('id');
					  $data['trazabilidad'] = $this->trazabilidad->get_trazabilidad($id);
					  header('Content-Type: application/json');
					  echo json_encode(['trazabilidad' => $data['trazabilidad']]);
		 }
		 public function get_satelite() {
				 $id = $this->input->post('id');
				 $data['satelite'] = $this->trazabilidad->get_satelite($id);
				 header('Content-Type: application/json');
				 echo json_encode(['satelite' => $data['satelite']]);
	}
	public function excelexport($id){
		$datas['id_guia'] = $id;
		$datas['prefijo'] = "E";
		$llamadas= $this->trazabilidad->gettrazabilidad($datas);
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

			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'REPORTE');
			 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'HORA');
			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'FECHA');
			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'PROVEEDOR');
			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'GUIA PROVEEDOR');
			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'FECHA (ESTIMADA PRÓXIMO TRAZO)');
			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'CIUDAD');
			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Nº ANEXO LEGALIZACION');
			 //Definimos la data del cuerpo.
			 foreach($llamadas as $l){
					//Incrementamos una fila más, para ir a la siguiente.
					$contador++;
					//Informacion de las filas de la consulta.
					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->id_guia);
					$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->tipo_reporte);
				  $this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->hora);
					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->fecha_despacho);
					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->nombre_proveedor);
					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->guia_proveedor);
					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->llegada_destino);
					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->ciudad_sat);
					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->numero_anexo_l);




			 }
			 //Le ponemos un nombre al archivo que se va a generar.
			 $archivo = "Trazabilidad-E-.$id.xls";
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


	////////////////
			public function detail_foto() {

				$config['upload_path']          = './include/img/trazabilidad/';
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
					$data['url'] ="/include/img/trazabilidad/".$file_name;
					$data['id_guia'] = $this->input->post('id_guia');
					$data['tiempo'] = $this->input->post('tiempo');
					$rut=$this->trazabilidad->imagen_insert($data);
					echo json_encode(['status' => '201', 'message' => 'Imagen creada exitosamente']);
				}
			}
			function getimagenes() {
				$datas['id_guia'] = $this->input->post('id_guia');
			$datas['tiempo'] = $this->input->post('tiempo');
			$data['imagenes'] = $this->trazabilidad->imagenes_get($datas);
			header('Content-Type: application/json');
			echo json_encode(['imagenes' => $data['imagenes']]);

			}

			public function eliminarImagen() {
	
				$id = $this->input->post('id');
				$result = $this->trazabilidad->eliminarImagen($id);
					 if($result['code'] == 0){
								echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
							}
						else{
								echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
							}
		 }



}
