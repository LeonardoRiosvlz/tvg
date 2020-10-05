<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Facturas extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Facturas_model', 'facturas');
		$this->load->model('Archivos_model', 'archivos');
	  }
    public function index() {
			if( ! $this->verify_min_level(1)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Facturas/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getfacturas($id=0) {

				  $data['facturas'] = $this->facturas->getfacturas();
				  header('Content-Type: application/json');
				  echo json_encode(['facturas' => $data['facturas']]);

				}
				public function getfacturasu($id=0) {
					$datas['user_id'] = $this->input->post('user_id');
						$data['facturas'] = $this->facturas->getfacturasu($datas);
						header('Content-Type: application/json');
						echo json_encode(['facturas' => $data['facturas']]);
					}
				public function get_tiempo($id=0) {
						$datas['desde'] = $this->input->post('desde');
						$datas['hasta'] = $this->input->post('hasta');
						$data['facturas'] = $this->facturas->get_tiempo($datas);
						header('Content-Type: application/json');
						echo json_encode(['facturas' => $data['facturas']]);
					}
				public function get_tiempou($id=0) {
						$datas['desde'] = $this->input->post('desde');
						$datas['hasta'] = $this->input->post('hasta');
						$datas['user_id'] = $this->input->post('user_id');
						$data['facturas'] = $this->facturas->get_tiempou($datas);
						header('Content-Type: application/json');
						echo json_encode(['facturas' => $data['facturas']]);
					}

					public function excelexport_tiempo($desde,$hasta){
						$datas['desde'] = $desde;
						$datas['hasta'] = $hasta;
						$llamadas = $this->facturas->get_tiempo($datas);
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

							 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Nº Factura');
							 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
							 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'FECHA VENCIMIENTO');
							 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'NIT/CEDULA');
							 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CLIENTE');
							 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'DIRECCIÓN');
							 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TELEFONO');
							 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'CIUDAD');
							 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'FORMA DE PAGO');
							 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'DIAS HÁBILES');
							 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'ESTADO');
							 //Definimos la data del cuerpo.
							 foreach($llamadas as $l){
									//Incrementamos una fila más, para ir a la siguiente.
									$contador++;
									//Informacion de las filas de la consulta.
									$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
									$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
									$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->f_vencimiento);
									$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->cedula);
									$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->nombre_cliente);
									$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->direccion_cliente);
									$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->telefono_cliente);
									$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->ciudad_cliente);
									$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->forma_pago);
									$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->dias_demora);
									$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->estado);
							 }
							 //Le ponemos un nombre al archivo que se va a generar.
							 $archivo = "Facturas_fecha.xls";
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
					public function get_cedula($id=0) {
							$datas['cedula'] = $this->input->post('cedula');
							$data['facturas'] = $this->facturas->get_cedula($datas);
							header('Content-Type: application/json');
							echo json_encode(['facturas' => $data['facturas']]);
						}
						public function get_cedulau($id=0) {
								$datas['cedula'] = $this->input->post('cedula');
								$datas['user_id'] = $this->input->post('user_id');
								$data['facturas'] = $this->facturas->get_cedulau($datas);
								header('Content-Type: application/json');
								echo json_encode(['facturas' => $data['facturas']]);
							}
						public function excelexport_cedula($id){
							$datas['cedula'] = $id;
							$llamadas = $this->facturas->get_cedula($datas);
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

								 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Nº Factura');
								 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
								 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'FECHA VENCIMIENTO');
								 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'NIT/CEDULA');
								 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CLIENTE');
								 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'DIRECCIÓN');
								 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TELEFONO');
								 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'CIUDAD');
								 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'FORMA DE PAGO');
								 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'DIAS HÁBILES');
								 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'ESTADO');
								 //Definimos la data del cuerpo.
								 foreach($llamadas as $l){
										//Incrementamos una fila más, para ir a la siguiente.
										$contador++;
										//Informacion de las filas de la consulta.
										$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
										$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
										$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->f_vencimiento);
										$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->cedula);
										$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->nombre_cliente);
										$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->direccion_cliente);
										$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->telefono_cliente);
										$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->ciudad_cliente);
										$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->forma_pago);
										$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->dias_demora);
										$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->estado);
								 }
								 //Le ponemos un nombre al archivo que se va a generar.
								 $archivo = "Facturas_fecha.xls";
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
					public function get_estado($id=0) {
							$datas['estado'] = $this->input->post('estado');
							$data['facturas'] = $this->facturas->get_estado($datas);
							header('Content-Type: application/json');
							echo json_encode(['facturas' => $data['facturas']]);
						}
					public function get_estadou($id=0) {
							$datas['estado'] = $this->input->post('estado');
							$datas['user_id'] = $this->input->post('user_id');
							$data['facturas'] = $this->facturas->get_estadou($datas);
							header('Content-Type: application/json');
							echo json_encode(['facturas' => $data['facturas']]);
						}
						public function excelexport_estado($id){
							$datas['estado'] = $id;
							$llamadas = $this->facturas->get_estado($datas);
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

								 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Nº Factura');
								 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
								 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'FECHA VENCIMIENTO');
								 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'NIT/CEDULA');
								 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CLIENTE');
								 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'DIRECCIÓN');
								 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TELEFONO');
								 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'CIUDAD');
								 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'FORMA DE PAGO');
								 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'DIAS HÁBILES');
								 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'ESTADO');
								 //Definimos la data del cuerpo.
								 foreach($llamadas as $l){
										//Incrementamos una fila más, para ir a la siguiente.
										$contador++;
										//Informacion de las filas de la consulta.
										$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
										$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
										$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->f_vencimiento);
										$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->cedula);
										$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->nombre_cliente);
										$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->direccion_cliente);
										$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->telefono_cliente);
										$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->ciudad_cliente);
										$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->forma_pago);
										$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->dias_demora);
										$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->estado);
								 }
								 //Le ponemos un nombre al archivo que se va a generar.
								 $archivo = "Facturas_fecha_estado.xls";
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
						public function get_fecha_cedula($id=0) {
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$datas['cedula'] = $this->input->post('cedula');
								$data['facturas'] = $this->facturas->get_fecha_cedula($datas);
								header('Content-Type: application/json');
								echo json_encode(['facturas' => $data['facturas']]);
							}
						public function get_fecha_cedulau($id=0) {
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$datas['cedula'] = $this->input->post('cedula');
								$datas['user_id'] = $this->input->post('user_id');
								$data['facturas'] = $this->facturas->get_fecha_cedulau($datas);
								header('Content-Type: application/json');
								echo json_encode(['facturas' => $data['facturas']]);
							}
							public function excelexport_fecha_cedula($desde,$hasta,$cedula){
								$datas['desde'] = $desde;
								$datas['hasta'] = $hasta;
								$datas['cedula'] = $cedula;
								$llamadas = $this->facturas->get_fecha_cedula($datas);
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

									 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Nº Factura');
									 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
									 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'FECHA VENCIMIENTO');
									 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'NIT/CEDULA');
									 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CLIENTE');
									 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'DIRECCIÓN');
									 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TELEFONO');
									 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'CIUDAD');
									 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'FORMA DE PAGO');
									 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'DIAS HÁBILES');
									 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'ESTADO');
									 //Definimos la data del cuerpo.
									 foreach($llamadas as $l){
											//Incrementamos una fila más, para ir a la siguiente.
											$contador++;
											//Informacion de las filas de la consulta.
											$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
											$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
											$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->f_vencimiento);
											$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->cedula);
											$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->nombre_cliente);
											$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->direccion_cliente);
											$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->telefono_cliente);
											$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->ciudad_cliente);
											$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->forma_pago);
											$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->dias_demora);
											$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->estado);
									 }
									 //Le ponemos un nombre al archivo que se va a generar.
									 $archivo = "Facturas_fecha_cedula.xls";
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
							public function get_fecha_estado($id=0) {
									$datas['desde'] = $this->input->post('desde');
									$datas['hasta'] = $this->input->post('hasta');
									$datas['estado'] = $this->input->post('estado');
									$data['facturas'] = $this->facturas->get_fecha_estado($datas);
									header('Content-Type: application/json');
									echo json_encode(['facturas' => $data['facturas']]);
								}
								public function get_fecha_estadou($id=0) {
										$datas['desde'] = $this->input->post('desde');
										$datas['hasta'] = $this->input->post('hasta');
										$datas['estado'] = $this->input->post('estado');
										$datas['user_id'] = $this->input->post('user_id');
										$data['facturas'] = $this->facturas->get_fecha_estadou($datas);
										header('Content-Type: application/json');
										echo json_encode(['facturas' => $data['facturas']]);
									}
								public function excelexport_fecha_estado($desde,$hasta,$estado){
									$datas['desde'] = $desde;
									$datas['hasta'] = $hasta;
									$datas['estado'] = $estado;
									$llamadas = $this->facturas->get_fecha_estado($datas);
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

										 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Nº Factura');
										 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
										 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'FECHA VENCIMIENTO');
										 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'NIT/CEDULA');
										 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'DIRECCIÓN');
										 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TELEFONO');
										 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'CIUDAD');
										 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'FORMA DE PAGO');
										 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'DIAS HÁBILES');
										 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'ESTADO');
										 //Definimos la data del cuerpo.
										 foreach($llamadas as $l){
												//Incrementamos una fila más, para ir a la siguiente.
												$contador++;
												//Informacion de las filas de la consulta.
												$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
												$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
												$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->f_vencimiento);
												$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->cedula);
												$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->nombre_cliente);
												$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->direccion_cliente);
												$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->telefono_cliente);
												$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->ciudad_cliente);
												$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->forma_pago);
												$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->dias_demora);
												$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->estado);
										 }
										 //Le ponemos un nombre al archivo que se va a generar.
										 $archivo = "Facturas_fecha.xls";
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

								public function get_cedula_estado($id=0) {

										$datas['cedula'] = $this->input->post('cedula');
										$datas['estado'] = $this->input->post('estado');
										$data['facturas'] = $this->facturas->get_cedula_estado($datas);
										header('Content-Type: application/json');
										echo json_encode(['facturas' => $data['facturas']]);
									}
									public function get_cedula_estadou($id=0) {

											$datas['cedula'] = $this->input->post('cedula');
											$datas['estado'] = $this->input->post('estado');
											$datas['user_id'] = $this->input->post('user_id');
											$data['facturas'] = $this->facturas->get_cedula_estadou($datas);
											header('Content-Type: application/json');
											echo json_encode(['facturas' => $data['facturas']]);
										}
									public function excelexport_cedula_estado($cedula,$estado){
										$datas['cedula'] = $cedula;
										$datas['estado'] = $estado;
										$llamadas = $this->facturas->get_cedula_estado($datas);
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

											 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Nº Factura');
											 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
											 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'FECHA VENCIMIENTO');
											 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'NIT/CEDULA');
											 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CLIENTE');
											 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'DIRECCIÓN');
											 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TELEFONO');
											 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'CIUDAD');
											 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'FORMA DE PAGO');
											 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'DIAS HÁBILES');
											 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'ESTADO');
											 //Definimos la data del cuerpo.
											 foreach($llamadas as $l){
													//Incrementamos una fila más, para ir a la siguiente.
													$contador++;
													//Informacion de las filas de la consulta.
													$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->f_vencimiento);
													$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->cedula);
													$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->nombre_cliente);
													$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->direccion_cliente);
													$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->telefono_cliente);
													$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->ciudad_cliente);
													$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->forma_pago);
													$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->dias_demora);
													$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->estado);
											 }
											 //Le ponemos un nombre al archivo que se va a generar.
											 $archivo = "Facturas_fecha.xls";
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
									public function get_fecha_estado_cedula($id=0) {
											$datas['desde'] = $this->input->post('desde');
											$datas['hasta'] = $this->input->post('hasta');
											$datas['cedula'] = $this->input->post('cedula');
											$datas['estado'] = $this->input->post('estado');
											$data['facturas'] = $this->facturas->get_fecha_estado_cedula($datas);
											header('Content-Type: application/json');
											echo json_encode(['facturas' => $data['facturas']]);
										}
										public function get_fecha_estado_cedulau($id=0) {
												$datas['desde'] = $this->input->post('desde');
												$datas['hasta'] = $this->input->post('hasta');
												$datas['cedula'] = $this->input->post('cedula');
												$datas['estado'] = $this->input->post('estado');
												$datas['user_id'] = $this->input->post('user_id');
												$data['facturas'] = $this->facturas->get_fecha_estado_cedulau($datas);
												header('Content-Type: application/json');
												echo json_encode(['facturas' => $data['facturas']]);
											}
										public function excelexport_fecha_estado_cedula($desde,$hasta,$estado,$cedula){
											$datas['cedula'] = $cedula;
											$datas['estado'] = $estado;
											$datas['desde'] = $desde;
											$datas['hasta'] = $hasta;
											$llamadas = $this->facturas->get_fecha_estado_cedula($datas);
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

												 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Nº Factura');
												 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
												 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'FECHA VENCIMIENTO');
												 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'NIT/CEDULA');
												 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CLIENTE');
												 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'DIRECCIÓN');
												 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TELEFONO');
												 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'CIUDAD');
												 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'FORMA DE PAGO');
												 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'DIAS HÁBILES');
												 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'ESTADO');
												 //Definimos la data del cuerpo.
												 foreach($llamadas as $l){
														//Incrementamos una fila más, para ir a la siguiente.
														$contador++;
														//Informacion de las filas de la consulta.
														$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
														$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
														$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->f_vencimiento);
														$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->cedula);
														$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->nombre_cliente);
														$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->direccion_cliente);
														$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->telefono_cliente);
														$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->ciudad_cliente);
														$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->forma_pago);
														$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->dias_demora);
														$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->estado);
												 }
												 //Le ponemos un nombre al archivo que se va a generar.
												 $archivo = "Facturas_fecha.xls";
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
			public function insertar() {
				if( ! $this->verify_min_level(1)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$data = json_decode($this->input->post('service_form'),true);
				$data['id']    = $this->facturas->get_unused_id();
				$result = $this->facturas->insertar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'id' => $data['id']]);
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
					$result = $this->facturas->editar($data);
						if($result['code'] == 0){
							echo json_encode(['status' => '200', 'id' => $data['id']]);
						}
						else{
							echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
						}
					}
			public function anular() {
				if( ! $this->verify_min_level(1)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
			    $data = json_decode($this->input->post('service_form'),true);
				$result = $this->facturas->anular($data);
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
	            $result = $this->facturas->deletefacturas($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				 public function generar(){
					 $data = json_decode($this->input->post('service_form'),true);
					 $data['id_archivo']= $this->archivos->get_unused_id();
					 $data['tipo']="Factura";
					 $data['tipo_archivo']="PDF";
					 $result = $this->archivos->insertar_factura($data);
						 if($result['code'] == 0){
							 $results = $this->facturas->generar($data);
							 echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
						 }
						 else{
							 echo json_encode(['status' => '500', 'message' => $data['id_archivo']]);
						 }
					}
					public function enviar_generar(){
							$data = json_decode($this->input->post('service_form'),true);
											$this->load->library('email');
											$config = array(
											 'protocol' => 'smtp',
											 'smtp_host' => 'gator4124.hostgator.com',
											 'smtp_user' => 'info@luzguerrera.com', //Su Correo de Gmail Aqui
											 'smtp_pass' => 'Alfayomega', // Su Password de Gmail aqui
											 'smtp_port' => 465,
											 'smtp_crypto' => 'ssl',
											 'mailtype' => 'html',
											 'wordwrap' => TRUE,
											 'charset' => 'utf-8'
											 );
											 $this->email->initialize($config);
											 $this->email->from('info@luzguerrera.com');
											 $this->email->to($data['correo_cliente']);
											 $this->email->subject( "Factura de venta ");
											 $this->email->message('
											 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
											 <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

											 <head>
													 <meta charset="UTF-8">
													 <meta content="width=device-width, initial-scale=1" name="viewport">
													 <meta name="x-apple-disable-message-reformatting">
													 <meta http-equiv="X-UA-Compatible" content="IE=edge">
													 <meta content="telephone=no" name="format-detection">
													 <title></title>
													 <!--[if (mso 16)]>
													 <style type="text/css">
													 a {text-decoration: none;}
													 </style>
													 <![endif]-->
													 <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
													 <!--[if gte mso 9]>
											 <xml>
													 <o:OfficeDocumentSettings>
													 <o:AllowPNG></o:AllowPNG>
													 <o:PixelsPerInch>96</o:PixelsPerInch>
													 </o:OfficeDocumentSettings>
											 </xml>
											 <![endif]-->
											 </head>

											 <body>
													 <div class="es-wrapper-color">
															 <!--[if gte mso 9]>
														<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
															<v:fill type="tile" color="#f6f6f6"></v:fill>
														</v:background>
													<![endif]-->
															 <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
																	 <tbody>
																			 <tr>
																					 <td class="esd-email-paddings" valign="top">
																							 <table class="es-content es-preheader esd-header-popover" cellspacing="0" cellpadding="0" align="center">
																									 <tbody>
																											 <tr>
																													 <td class="es-adaptive esd-stripe" align="center">
																															 <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" align="center">
																																	 <tbody>
																																			 <tr>
																																					 <td class="esd-structure es-p10t es-p10b es-p20r es-p20l" align="left">
																																							 <!--[if mso]><table width="560"><tr><td width="268" valign="top"><![endif]-->
																																							 <table class="es-left" cellspacing="0" cellpadding="0" align="left">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="268" align="left">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td class="es-infoblock esd-block-text es-m-txt-c" align="left">
																																																							 <p>TVGCARGOS S.A.S</p>
																																																					 </td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																							 <!--[if mso]></td><td width="20"></td><td width="272" valign="top"><![endif]-->
																																							 <table class="es-right" cellspacing="0" cellpadding="0" align="right">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="272" align="left">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td class="es-infoblock esd-block-text es-m-txt-c" align="right">
																																																							 <p><em><strong>SUS ENVÍOS FÁCILES Y RÁPIDOS SEGUROS Y A TIEMPO</strong></em><br></p>
																																																					 </td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																							 <!--[if mso]></td></tr></table><![endif]-->
																																					 </td>
																																			 </tr>
																																	 </tbody>
																															 </table>
																													 </td>
																											 </tr>
																									 </tbody>
																							 </table>
																							 <table class="es-content" cellspacing="0" cellpadding="0" align="center">
																									 <tbody>
																											 <tr></tr>
																											 <tr>
																													 <td class="es-adaptive esd-stripe" align="center">
																															 <table class="es-header-body" width="600" cellspacing="0" cellpadding="0" align="center">
																																	 <tbody>
																																			 <tr>
																																					 <td class="esd-structure es-p15t es-p20b es-p20r es-p20l" style="background-color: #ffffff;" bgcolor="#ffffff" align="left">
																																							 <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="174" valign="top"><![endif]-->
																																							 <table class="es-left" cellspacing="0" cellpadding="0" align="left">
																																									 <tbody>
																																											 <tr>
																																													 <td class="es-m-p0r esd-container-frame" width="174" valign="top" align="center">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://tvgcargo.com/wp-content/uploads/2017/01/tvg-cargo-logo.png" alt style="display: block;" width="162"></a></td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																							 <!--[if mso]></td><td width="20"></td><td width="366" valign="top"><![endif]-->
																																							 <table cellspacing="0" cellpadding="0" align="right">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="366" align="left">
																																															 <table style="border-left:2px solid #808080;border-right:2px solid #808080;border-top:2px solid #808080;border-bottom:2px solid #808080;" width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://tvgcargo.com/wp-content/uploads/2017/01/transporte-por-avion-mercancia.jpg" alt style="display: block;" width="362"></a></td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																							 <!--[if mso]></td></tr></table><![endif]-->
																																					 </td>
																																			 </tr>
																																	 </tbody>
																															 </table>
																													 </td>
																											 </tr>
																									 </tbody>
																							 </table>
																							 <table class="es-content" cellspacing="0" cellpadding="0" align="center">
																									 <tbody>
																											 <tr>
																													 <td class="esd-stripe" align="center">
																															 <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
																																	 <tbody>
																																			 <tr>
																																					 <td class="esd-structure es-p30t es-p20r es-p20l" align="left">
																																							 <table width="100%" cellspacing="0" cellpadding="0">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="560" valign="top" align="center">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td class="esd-block-text es-p5b" align="left">
																																																							 <h2>Cotización</h2>
																																																					 </td>
																																																			 </tr>
																																																			 <tr>
																																																					 <td class="esd-block-text es-p5b" align="left">
																																																							 <h2>Estimados de '.$data['nombre_cliente'].':</h2>
																																																					 </td>
																																																			 </tr>
																																																			 <tr>
																																																					 <td class="esd-block-text es-m-txt-c es-p10b" align="left">
																																																							 <p style="color: #333333;">Le hacemos llegar mediante este correo de manera formal la factura de pago con un link por cual ud puede gestionar y notificar el pago.</p>
																																																					 </td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																					 </td>
																																			 </tr>
																																	 </tbody>
																															 </table>
																													 </td>
																											 </tr>
																									 </tbody>
																							 </table>
																							 <table class="es-content" cellspacing="0" cellpadding="0" align="center">
																									 <tbody>
																											 <tr>
																													 <td class="esd-stripe" align="center">
																															 <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
																																	 <tbody>
																																			 <tr>
																																					 <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
																																							 <table width="100%" cellspacing="0" cellpadding="0">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="560" valign="top" align="center">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td class="esd-block-button es-p10b" align="left"><span class="es-button-border"><a href="'.base_url($data['url_gestion']).'" class="es-button" target="_blank">Gestionar Factura</a></span></td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																					 </td>
																																			 </tr>
																																	 </tbody>
																															 </table>
																													 </td>
																											 </tr>
																									 </tbody>
																							 </table>
																							 <table cellpadding="0" cellspacing="0" class="es-content" align="center">
																									 <tbody>
																											 <tr>
																													 <td class="esd-stripe" align="center">
																															 <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600">
																																	 <tbody>
																																			 <tr>
																																					 <td class="es-p20t es-p20r es-p20l esd-structure" align="left">
																																							 <table cellpadding="0" cellspacing="0" width="100%">
																																									 <tbody>
																																											 <tr>
																																													 <td width="560" class="esd-container-frame" align="center" valign="top">
																																															 <table cellpadding="0" cellspacing="0" width="100%">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td align="center" class="esd-block-button"><span class="es-button-border"><a href="'.base_url($data['url']).'" class="es-button" target="_blank">Descargar PDF</a></span></td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																					 </td>
																																			 </tr>
																																	 </tbody>
																															 </table>
																													 </td>
																											 </tr>
																									 </tbody>
																							 </table>
																							 <table class="es-content" cellspacing="0" cellpadding="0" align="center">
																									 <tbody>
																											 <tr>
																													 <td class="esd-stripe" align="center">
																															 <table class="es-content-body" style="background-color: #ffffff;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
																																	 <tbody>
																																			 <tr>
																																					 <td class="esd-structure" align="left">
																																							 <table width="100%" cellspacing="0" cellpadding="0">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="600" valign="top" align="center">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td class="esd-block-spacer es-p40b es-p40r es-p40l" align="center" style="font-size:0">
																																																							 <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
																																																									 <tbody>
																																																											 <tr>
																																																													 <td style="border-bottom: 0px solid #efefef; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; height: 1px; width: 100%; margin: 0px;"></td>
																																																											 </tr>
																																																									 </tbody>
																																																							 </table>
																																																					 </td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																					 </td>
																																			 </tr>
																																			 <tr>
																																					 <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" align="left">
																																							 <!--[if mso]><table width="560" cellpadding="0"
																							 cellspacing="0"><tr><td width="270" valign="top"><![endif]-->
																																							 <table class="es-left" cellspacing="0" cellpadding="0" align="left">
																																									 <tbody>
																																											 <tr>
																																													 <td class="es-m-p20b esd-container-frame" width="270" align="left">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td align="center" class="esd-empty-container" style="display: none;"></td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																							 <!--[if mso]></td><td width="20"></td><td width="270" valign="top"><![endif]-->
																																							 <table class="es-right" cellspacing="0" cellpadding="0" align="right">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="270" align="left">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td class="esd-block-social es-p5t es-m-txt-c" align="right" style="font-size:0">
																																																							 <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0">
																																																									 <tbody>
																																																											 <tr>
																																																													 <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Facebook" src="https://hobhfv.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png" alt="Fb" width="32"></a></td>
																																																													 <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Twitter" src="https://hobhfv.stripocdn.email/content/assets/img/social-icons/logo-black/twitter-logo-black.png" alt="Tw" width="32"></a></td>
																																																													 <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Instagram" src="https://hobhfv.stripocdn.email/content/assets/img/social-icons/logo-black/instagram-logo-black.png" alt="Inst" width="32"></a></td>
																																																													 <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Youtube" src="https://hobhfv.stripocdn.email/content/assets/img/social-icons/logo-black/youtube-logo-black.png" alt="Yt" width="32"></a></td>
																																																											 </tr>
																																																									 </tbody>
																																																							 </table>
																																																					 </td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																							 <!--[if mso]></td></tr></table><![endif]-->
																																					 </td>
																																			 </tr>
																																	 </tbody>
																															 </table>
																													 </td>
																											 </tr>
																									 </tbody>
																							 </table>
																							 <table class="es-footer esd-footer-popover" cellspacing="0" cellpadding="0" align="center">
																									 <tbody>
																											 <tr>
																													 <td class="esd-stripe" align="center">
																															 <table class="es-footer-body" width="600" cellspacing="0" cellpadding="0" align="center">
																																	 <tbody>
																																			 <tr>
																																					 <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" align="left">
																																							 <table width="100%" cellspacing="0" cellpadding="0">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="560" valign="top" align="center">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td class="esd-block-text" align="center">
																																																							 <p>www.tvgcargos.com</p>
																																																					 </td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																					 </td>
																																			 </tr>
																																	 </tbody>
																															 </table>
																													 </td>
																											 </tr>
																									 </tbody>
																							 </table>
																					 </td>
																			 </tr>
																	 </tbody>
															 </table>
													 </div>
											 </body>

											 </html>');
											 if($this->email->send()){
												 $data = json_decode($this->input->post('service_form'),true);
												 $data['id_archivo']= $this->archivos->get_unused_id();
												 $data['tipo']="Factura";
												 $data['tipo_archivo']="PDF";
												 $result = $this->archivos->insertar_factura($data);
													 if($result['code'] == 0){
														 $results = $this->facturas->generar_enviar($data);
														 echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
													 }
													 else{
														 echo json_encode(['status' => '500', 'message' => $data['id_archivo']]);
													 }
											 }else{
												echo json_encode(['status' => '500', 'message' => $data['id_archivo']]);
											 }

					}
					public function enviar(){
							$data = json_decode($this->input->post('service_form'),true);
											$this->load->library('email');
											$config = array(
											 'protocol' => 'smtp',
											 'smtp_host' => 'gator4124.hostgator.com',
											 'smtp_user' => 'info@luzguerrera.com', //Su Correo de Gmail Aqui
											 'smtp_pass' => 'Alfayomega', // Su Password de Gmail aqui
											 'smtp_port' => 465,
											 'smtp_crypto' => 'ssl',
											 'mailtype' => 'html',
											 'wordwrap' => TRUE,
											 'charset' => 'utf-8'
											 );
											 $this->email->initialize($config);
											 $this->email->from('info@luzguerrera.com');
											 $this->email->to($data['correo_cliente']);
											 $this->email->subject( "Factura de venta ");
											 $this->email->message('
											 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
											 <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

											 <head>
													 <meta charset="UTF-8">
													 <meta content="width=device-width, initial-scale=1" name="viewport">
													 <meta name="x-apple-disable-message-reformatting">
													 <meta http-equiv="X-UA-Compatible" content="IE=edge">
													 <meta content="telephone=no" name="format-detection">
													 <title></title>
													 <!--[if (mso 16)]>
													 <style type="text/css">
													 a {text-decoration: none;}
													 </style>
													 <![endif]-->
													 <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
													 <!--[if gte mso 9]>
											 <xml>
													 <o:OfficeDocumentSettings>
													 <o:AllowPNG></o:AllowPNG>
													 <o:PixelsPerInch>96</o:PixelsPerInch>
													 </o:OfficeDocumentSettings>
											 </xml>
											 <![endif]-->
											 </head>

											 <body>
													 <div class="es-wrapper-color">
															 <!--[if gte mso 9]>
														<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
															<v:fill type="tile" color="#f6f6f6"></v:fill>
														</v:background>
													<![endif]-->
															 <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
																	 <tbody>
																			 <tr>
																					 <td class="esd-email-paddings" valign="top">
																							 <table class="es-content es-preheader esd-header-popover" cellspacing="0" cellpadding="0" align="center">
																									 <tbody>
																											 <tr>
																													 <td class="es-adaptive esd-stripe" align="center">
																															 <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" align="center">
																																	 <tbody>
																																			 <tr>
																																					 <td class="esd-structure es-p10t es-p10b es-p20r es-p20l" align="left">
																																							 <!--[if mso]><table width="560"><tr><td width="268" valign="top"><![endif]-->
																																							 <table class="es-left" cellspacing="0" cellpadding="0" align="left">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="268" align="left">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td class="es-infoblock esd-block-text es-m-txt-c" align="left">
																																																							 <p>TVGCARGOS S.A.S</p>
																																																					 </td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																							 <!--[if mso]></td><td width="20"></td><td width="272" valign="top"><![endif]-->
																																							 <table class="es-right" cellspacing="0" cellpadding="0" align="right">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="272" align="left">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td class="es-infoblock esd-block-text es-m-txt-c" align="right">
																																																							 <p><em><strong>SUS ENVÍOS FÁCILES Y RÁPIDOS SEGUROS Y A TIEMPO</strong></em><br></p>
																																																					 </td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																							 <!--[if mso]></td></tr></table><![endif]-->
																																					 </td>
																																			 </tr>
																																	 </tbody>
																															 </table>
																													 </td>
																											 </tr>
																									 </tbody>
																							 </table>
																							 <table class="es-content" cellspacing="0" cellpadding="0" align="center">
																									 <tbody>
																											 <tr></tr>
																											 <tr>
																													 <td class="es-adaptive esd-stripe" align="center">
																															 <table class="es-header-body" width="600" cellspacing="0" cellpadding="0" align="center">
																																	 <tbody>
																																			 <tr>
																																					 <td class="esd-structure es-p15t es-p20b es-p20r es-p20l" style="background-color: #ffffff;" bgcolor="#ffffff" align="left">
																																							 <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="174" valign="top"><![endif]-->
																																							 <table class="es-left" cellspacing="0" cellpadding="0" align="left">
																																									 <tbody>
																																											 <tr>
																																													 <td class="es-m-p0r esd-container-frame" width="174" valign="top" align="center">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://tvgcargo.com/wp-content/uploads/2017/01/tvg-cargo-logo.png" alt style="display: block;" width="162"></a></td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																							 <!--[if mso]></td><td width="20"></td><td width="366" valign="top"><![endif]-->
																																							 <table cellspacing="0" cellpadding="0" align="right">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="366" align="left">
																																															 <table style="border-left:2px solid #808080;border-right:2px solid #808080;border-top:2px solid #808080;border-bottom:2px solid #808080;" width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://tvgcargo.com/wp-content/uploads/2017/01/transporte-por-avion-mercancia.jpg" alt style="display: block;" width="362"></a></td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																							 <!--[if mso]></td></tr></table><![endif]-->
																																					 </td>
																																			 </tr>
																																	 </tbody>
																															 </table>
																													 </td>
																											 </tr>
																									 </tbody>
																							 </table>
																							 <table class="es-content" cellspacing="0" cellpadding="0" align="center">
																									 <tbody>
																											 <tr>
																													 <td class="esd-stripe" align="center">
																															 <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
																																	 <tbody>
																																			 <tr>
																																					 <td class="esd-structure es-p30t es-p20r es-p20l" align="left">
																																							 <table width="100%" cellspacing="0" cellpadding="0">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="560" valign="top" align="center">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td class="esd-block-text es-p5b" align="left">
																																																							 <h2>Cotización</h2>
																																																					 </td>
																																																			 </tr>
																																																			 <tr>
																																																					 <td class="esd-block-text es-p5b" align="left">
																																																							 <h2>Estimados de '.$data['nombre_cliente'].':</h2>
																																																					 </td>
																																																			 </tr>
																																																			 <tr>
																																																					 <td class="esd-block-text es-m-txt-c es-p10b" align="left">
																																																							 <p style="color: #333333;">Le hacemos llegar mediante este correo de manera formal la factura de pago con un link por cual ud puede gestionar y notificar el pago.</p>
																																																					 </td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																					 </td>
																																			 </tr>
																																	 </tbody>
																															 </table>
																													 </td>
																											 </tr>
																									 </tbody>
																							 </table>
																							 <table class="es-content" cellspacing="0" cellpadding="0" align="center">
																									 <tbody>
																											 <tr>
																													 <td class="esd-stripe" align="center">
																															 <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
																																	 <tbody>
																																			 <tr>
																																					 <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
																																							 <table width="100%" cellspacing="0" cellpadding="0">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="560" valign="top" align="center">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td class="esd-block-button es-p10b" align="left"><span class="es-button-border"><a href="'.base_url($data['url_gestion']).'" class="es-button" target="_blank">Gestionar Factura</a></span></td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																					 </td>
																																			 </tr>
																																	 </tbody>
																															 </table>
																													 </td>
																											 </tr>
																									 </tbody>
																							 </table>
																							 <table cellpadding="0" cellspacing="0" class="es-content" align="center">
																									 <tbody>
																											 <tr>
																													 <td class="esd-stripe" align="center">
																															 <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600">
																																	 <tbody>
																																			 <tr>
																																					 <td class="es-p20t es-p20r es-p20l esd-structure" align="left">
																																							 <table cellpadding="0" cellspacing="0" width="100%">
																																									 <tbody>
																																											 <tr>
																																													 <td width="560" class="esd-container-frame" align="center" valign="top">
																																															 <table cellpadding="0" cellspacing="0" width="100%">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td align="center" class="esd-block-button"><span class="es-button-border"><a href="'.base_url($data['url']).'" class="es-button" target="_blank">Descargar PDF</a></span></td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																					 </td>
																																			 </tr>
																																	 </tbody>
																															 </table>
																													 </td>
																											 </tr>
																									 </tbody>
																							 </table>
																							 <table class="es-content" cellspacing="0" cellpadding="0" align="center">
																									 <tbody>
																											 <tr>
																													 <td class="esd-stripe" align="center">
																															 <table class="es-content-body" style="background-color: #ffffff;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
																																	 <tbody>
																																			 <tr>
																																					 <td class="esd-structure" align="left">
																																							 <table width="100%" cellspacing="0" cellpadding="0">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="600" valign="top" align="center">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td class="esd-block-spacer es-p40b es-p40r es-p40l" align="center" style="font-size:0">
																																																							 <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
																																																									 <tbody>
																																																											 <tr>
																																																													 <td style="border-bottom: 0px solid #efefef; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; height: 1px; width: 100%; margin: 0px;"></td>
																																																											 </tr>
																																																									 </tbody>
																																																							 </table>
																																																					 </td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																					 </td>
																																			 </tr>
																																			 <tr>
																																					 <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" align="left">
																																							 <!--[if mso]><table width="560" cellpadding="0"
																							 cellspacing="0"><tr><td width="270" valign="top"><![endif]-->
																																							 <table class="es-left" cellspacing="0" cellpadding="0" align="left">
																																									 <tbody>
																																											 <tr>
																																													 <td class="es-m-p20b esd-container-frame" width="270" align="left">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td align="center" class="esd-empty-container" style="display: none;"></td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																							 <!--[if mso]></td><td width="20"></td><td width="270" valign="top"><![endif]-->
																																							 <table class="es-right" cellspacing="0" cellpadding="0" align="right">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="270" align="left">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td class="esd-block-social es-p5t es-m-txt-c" align="right" style="font-size:0">
																																																							 <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0">
																																																									 <tbody>
																																																											 <tr>
																																																													 <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Facebook" src="https://hobhfv.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png" alt="Fb" width="32"></a></td>
																																																													 <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Twitter" src="https://hobhfv.stripocdn.email/content/assets/img/social-icons/logo-black/twitter-logo-black.png" alt="Tw" width="32"></a></td>
																																																													 <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Instagram" src="https://hobhfv.stripocdn.email/content/assets/img/social-icons/logo-black/instagram-logo-black.png" alt="Inst" width="32"></a></td>
																																																													 <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Youtube" src="https://hobhfv.stripocdn.email/content/assets/img/social-icons/logo-black/youtube-logo-black.png" alt="Yt" width="32"></a></td>
																																																											 </tr>
																																																									 </tbody>
																																																							 </table>
																																																					 </td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																							 <!--[if mso]></td></tr></table><![endif]-->
																																					 </td>
																																			 </tr>
																																	 </tbody>
																															 </table>
																													 </td>
																											 </tr>
																									 </tbody>
																							 </table>
																							 <table class="es-footer esd-footer-popover" cellspacing="0" cellpadding="0" align="center">
																									 <tbody>
																											 <tr>
																													 <td class="esd-stripe" align="center">
																															 <table class="es-footer-body" width="600" cellspacing="0" cellpadding="0" align="center">
																																	 <tbody>
																																			 <tr>
																																					 <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" align="left">
																																							 <table width="100%" cellspacing="0" cellpadding="0">
																																									 <tbody>
																																											 <tr>
																																													 <td class="esd-container-frame" width="560" valign="top" align="center">
																																															 <table width="100%" cellspacing="0" cellpadding="0">
																																																	 <tbody>
																																																			 <tr>
																																																					 <td class="esd-block-text" align="center">
																																																							 <p>www.tvgcargos.com</p>
																																																					 </td>
																																																			 </tr>
																																																	 </tbody>
																																															 </table>
																																													 </td>
																																											 </tr>
																																									 </tbody>
																																							 </table>
																																					 </td>
																																			 </tr>
																																	 </tbody>
																															 </table>
																													 </td>
																											 </tr>
																									 </tbody>
																							 </table>
																					 </td>
																			 </tr>
																	 </tbody>
															 </table>
													 </div>
											 </body>

											 </html>');
											 if($this->email->send()){
														 echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);

											 	 	}else{
												echo json_encode(['status' => '500', 'message' => 'Error']);
											 }

					}
					public function to_pdf($id){
						$this->load->library('Pdf');
						 $hoy=date("d/m/y");
						 $html_content = $this->facturas->fetch_details($id);
						 //$this->pdf->set_paper('letter', 'landscape');
						 $this->pdf->loadHtml($html_content);
						 $this->pdf->render();
						 $this->pdf->stream("FV-".$id.".pdf", array("Attachment"=>0));

				 }
				public function getfactura() {
		        $id = $this->input->post('id');
					  $data['facturas'] = $this->facturas->get_factura($id);
					  header('Content-Type: application/json');
					  echo json_encode(['facturas' => $data['facturas']]);
		 }
		 public function fat(){
			 $this->load->view('header',["css"=>[""]]);
			  $this->load->view('menu_blank');
			 $this->load->view('Facturas/gestion');
			 $this->load->view('footer',["js"=>[""]]);
		 }
		 public function cancelar() {
			 $config['upload_path']          = './include/img/comprobantes/';
			 $config['allowed_types']        = 'jpg|png|jpeg|pdf';
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
				 $data['url_foto'] ="/include/img/comprobantes/".$file_name;
				 $result = $this->facturas->cancelar($data);
				 if($result['code'] == 0){
					 echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
				 }
				 else{
					 echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
				 }
			 }
		 }
}
