<?php defined('BASEPATH') OR exit('No direct script access allowed');
class tarifas extends MY_Controller {
	private $request;
	public function __construct() {
		parent::__construct();
		$this->load->model('Tarifas_model', 'tarifas');
		$this->load->library('Excel');
		// EXCEL
		$this->load->model('Clientes_model', 'clientes');
		// Load form validation library
		$this->load->library('form_validation');
		// load CSV library
		$this->load->library('CSVReader');
		// Load file helper
		$this->load->helper('file');

		$this->load->library('Pdf');
	  }
    public function index() {
			if( ! $this->verify_min_level(9)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Tarifas/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function gettarifas($id=0) {

				  $data['tarifas'] = $this->tarifas->gettarifas();
				  header('Content-Type: application/json');
				  echo json_encode(['tarifas' => $data['tarifas']]);

				}
			public function insertar() {
				if( ! $this->verify_min_level(9)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$data = json_decode($this->input->post('service_form'),true);
				$result = $this->tarifas->insertar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
			public function editar() {
				if( ! $this->verify_min_level(9)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
			    $data = json_decode($this->input->post('service_form'),true);
				$result = $this->tarifas->editar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
		public function eliminar() {
			if( ! $this->verify_min_level(9)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
            $id = $this->input->post('id');
            $result = $this->tarifas->deletetarifas($id);
               if($result['code'] == 0){
                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
                  }
                else{
                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
                  }
     		 }
				 public function get_tarifas() {
		             $id = $this->input->post('id');
										 $data['tarifas'] = $this->tarifas->get_tarifas($id);
							 		  header('Content-Type: application/json');
							 		  echo json_encode(['tarifas' => $data['tarifas']]);
		      		 }

							 public function excelexport(){
					 			 $llamadas = $this->tarifas->gettarifas();
					 			 if(count($llamadas) > 0){
					 					 //Cargamos la librería de excel.
					 					 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
					 					 $this->excel->getActiveSheet()->setTitle('Llamadas');
					 					 //Contador de filas
					 					 $contador = 1;
					 					 //Le aplicamos ancho las columnas.
					 					 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
					 					 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
					 					 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
					 					 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
					 					 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
					 					 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
					 					 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
					 					 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
					 					 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
					 					 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
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

					 					 //Definimos los títulos de la cabecera.
					 					 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'DEPARTAMENTO ORIGEN');
					 					 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CIUDAD ORIGEN');
					 					 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'DEPARTAMENTO DESTINO');
					 					 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'CIUDAD DESTINO');
					 					 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'TRANSPORTE');
					 					 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO ENVIO');
					 					 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'PRECIO');
					 					 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'ITINEARIOS');
										 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'TIEMPOS');
					 					 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'ESTATUS');

					 					 //Definimos la data del cuerpo.
					 					 foreach($llamadas as $l){
					 							//Incrementamos una fila más, para ir a la siguiente.
					 							$contador++;
					 							//Informacion de las filas de la consulta.
					 							$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->departamento_origen);
					 							$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->ciudad_origen);
					 							$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->departamento_destino);
					 							$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
					 							$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->tipo_transporte);
					 							$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_envio);
					 							$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->precio);
					 							$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->itinerarios);
					 							$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->tiempos);
												$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->status);

					 					 }
					 					 //Le ponemos un nombre al archivo que se va a generar.
					 					 $archivo = "Tarifas_excel.xls";
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
							 // export Data
					     public function exportData() {
								 $storData = array();
					        $metaData[] = array('departamento_origen' => 'departamento_origen',
																				'ciudad_origen' => 'ciudad_origen',
																				'departamento_destino' => 'departamento_destino',
																				'ciudad_destino' => 'ciudad_destino',
																				'dep' => 'dep',
																				'dep_dos' => 'dep_dos',
																				'tipo_transporte' => 'tipo_transporte',
																				'tipo_envio' => 'tipo_envio',
																				'precio' => 'precio',
																				'itinerarios' => 'itinerarios',
																				'tiempos' => 'tiempos',
																				'status' => 'status',
																			 );

					        $customerInfo = $this->tarifas->getcustomerList();
					        foreach($customerInfo as $key=>$element) {
					            $storData[] = array(
												'departamento_origen'     => $element['departamento_origen'],
												'ciudad_origen'     => $element['ciudad_origen'],
												'departamento_destino'     => $element['departamento_destino'],
												'ciudad_destino'     => $element['ciudad_destino'],
												'dep'     => $element['dep'],
												'dep_dos'     => $element['dep_dos'],
												'tipo_transporte'     => $element['tipo_transporte'],
												'tipo_envio'     => $element['tipo_envio'],
												'precio'     => $element['precio'],
												'itinerarios'     => $element['itinerarios'],
												'tiempos'     => $element['tiempos'],
												'status'     => $element['status'],
					            );
					        }
					        $data = array_merge($metaData,$storData);
					        header("Content-type: application/csv");
					        header("Content-Disposition: attachment; filename=\"csv-sample-customer".".csv\"");
					        header("Pragma: no-cache");
					        header("Expires: 0");
					        $handle = fopen('php://output', 'w');
					        foreach ($data as $data) {
					            fputcsv($handle, $data);
					        }
					            fclose($handle);
					        exit;
					     }


					public function save() {
							 $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
							 if($this->form_validation->run() == false) {
									$data = array();
									$data['page'] = 'customer-add';
									$data['title'] = 'Customer Add | TechArise';
									$data['breadcrumbs'] = array('Home' => '#');
									$this->load->view('customer/add', $data);
							 } else {
									// If file uploaded
									if(is_uploaded_file($_FILES['fileURL']['tmp_name'])) {
											// Parse data from CSV file
											$csvData = $this->csvreader->parse_csv($_FILES['fileURL']['tmp_name']);

											var_dump($csvData);
											// create array from CSV file
											if(!empty($csvData)){
													foreach($csvData as $element){
															// Prepare data for Database insertion
															$data[] = array(
																'departamento_origen'     => $element['departamento_origen'],
									              'ciudad_origen'     => $element['ciudad_origen'],
									              'departamento_destino'     => $element['departamento_destino'],
									              'ciudad_destino'     => $element['ciudad_destino'],
									              'dep'     => $element['dep'],
									              'dep_dos'     => $element['dep_dos'],
									              'tipo_transporte'     => $element['tipo_transporte'],
									              'tipo_envio'     => $element['tipo_envio'],
									              'precio'     => $element['precio'],
									              'itienerarios'     => $element['itienerarios'],
									              'tiempos'     => $element['tiempos'],
									              'status'     => $element['status'],
															);
													}
											}
									}
									// insert/update data into database
									foreach($data as $element) {
											$this->trarifas->setDepartamento_origen($element['departamento_origen']);
											$this->trarifas->setCiudad_origen($element['ciudad_origen']);
											$this->trarifas->setDepartamento_destino($element['departamento_destino']);
											$this->trarifas->setCiudad_destino($element['ciudad_destino']);
											$this->trarifas->setDep($element['dep']);
											$this->trarifas->setDep_dos($element['dep_dos']);
											$this->trarifas->setTipo_transporte($element['tipo_transporte']);
											$this->trarifas->setTipo_envio($element['tipo_envio']);
											$this->trarifas->setPrecio($element['precio']);
											$this->trarifas->setItienerarios($element['itienerarios']);
											$this->trarifas->setTiempos($element['tiempos']);
											$this->trarifas->setStatus($element['status']);
											$this->trarifas->createCustomer();
									}
									redirect('Tarifas');
							}
					}

}
