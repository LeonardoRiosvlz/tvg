<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Clientes extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
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
        $this->load->view('clientes/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getclientes($id=0) {

				  $data['clientes'] = $this->clientes->getclientes();
				  header('Content-Type: application/json');
				  echo json_encode(['clientes' => $data['clientes']]);

				}
				public function getclientesN($id=0) {

					  $data['clientes'] = $this->clientes->getclientesN();
					  header('Content-Type: application/json');
					  echo json_encode(['clientes' => $data['clientes']]);

					}
			public function insertar() {
				if( ! $this->verify_min_level(9)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$data = json_decode($this->input->post('service_form'),true);
				if ($data['estado']==="Inactivo") {
					$data['fecha_inactivo'] = date("Y-m-d");
				}
				$result = $this->clientes->insertar($data);
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
					if ($data['estado']==="Inactivo") {
						$data['fecha_inactivo'] = date("Y-m-d");
					}
				$result = $this->clientes->editar($data);
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
	            $result = $this->clientes->deleteclientes($id);
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


		 // export Data
     public function exportData() {
			 $storData = array();
        $metaData[] = array('nit_cliente' => 'nit_cliente',
															'nombre_empresa' => 'nombre_empresa',
															'r_legal' => 'r_legal',
															'nombre_cliente' => 'nombre_cliente',
															'cedula_cliente' => 'cedula_cliente',
															'telefono_cliente' => 'telefono_cliente',
															'correo_cliente' => 'correo_cliente',
															'departamento' => 'departamento',
															'ciudad' => 'ciudad',
															'dep' => 'dep',
															'direccion_cliente' => 'direccion_cliente',
															'estado' => 'estado',
															'fecha_inactivo' => 'fecha_inactivo',
															'fecha_registro' => 'fecha_registro',
															'tipo_cliente' => 'tipo_cliente',
															'sucursal' => 'sucursal',
															'forma_pago' => 'forma_pago',
															'autorizador' => 'autorizador',
															'cliente_especial' => 'cliente_especial',
															'observacion' => 'observacion',
														 );

        $customerInfo = $this->clientes->getcustomerList();
        foreach($customerInfo as $key=>$element) {
            $storData[] = array(
							'nit_cliente'     => $element['nit_cliente'],
							'nombre_empresa'     => $element['nombre_empresa'],
							'r_legal'     => $element['r_legal'],
							'nombre_cliente'     => $element['nombre_cliente'],
							'cedula_cliente'     => $element['cedula_cliente'],
							'telefono_cliente'     => $element['telefono_cliente'],
							'correo_cliente'     => $element['correo_cliente'],
							'departamento'     => $element['departamento'],
							'ciudad'     => $element['ciudad'],
							'dep'     => $element['dep'],
							'direccion_cliente'     => $element['direccion_cliente'],
							'estado'     => $element['estado'],
							'fecha_inactivo'     => $element['fecha_inactivo'],
							'fecha_registro'     => $element['fecha_registro'],
							'tipo_cliente'     => $element['tipo_cliente'],
							'sucursal'     => $element['sucursal'],
							'forma_pago'     => $element['forma_pago'],
							'autorizador'     => $element['autorizador'],
							'cliente_especial'     => $element['cliente_especial'],
							'observacion'     => $element['observacion'],
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
											'nit_cliente'     => $element['nit_cliente'],
				              'nombre_empresa'     => $element['nombre_empresa'],
				              'r_legal'     => $element['r_legal'],
				              'nombre_cliente'     => $element['nombre_cliente'],
				              'cedula_cliente'     => $element['cedula_cliente'],
				              'telefono_cliente'     => $element['telefono_cliente'],
				              'correo_cliente'     => $element['correo_cliente'],
				              'departamento'     => $element['departamento'],
				              'ciudad'     => $element['ciudad'],
				              'dep'     => $element['dep'],
				              'direccion_cliente'     => $element['direccion_cliente'],
				              'estado'     => $element['estado'],
				              'fecha_inactivo'     => $element['fecha_inactivo'],
											'fecha_registro'     => $element['fecha_registro'],
				              'tipo_cliente'     => $element['tipo_cliente'],
				              'sucursal'     => $element['sucursal'],
				              'forma_pago'     => $element['forma_pago'],
				              'autorizador'     => $element['autorizador'],
				              'cliente_especial'     => $element['cliente_especial'],
				              'observacion'     => $element['observacion'],
										);
								}
						}
				}
				// insert/update data into database
				foreach($data as $element) {
						$this->clientes->setNit($element['nit_cliente']);
						$this->clientes->setNombreEmpresa($element['nombre_empresa']);
						$this->clientes->setReLegal($element['r_legal']);
						$this->clientes->setNombreCliente($element['nombre_cliente']);
						$this->clientes->setCedulaCliente($element['cedula_cliente']);
						$this->clientes->setTelefonoCliente($element['telefono_cliente']);
						$this->clientes->setCorreoCliente($element['correo_cliente']);
						$this->clientes->setDepartamento($element['departamento']);
						$this->clientes->setCiudad($element['ciudad']);
						$this->clientes->setDep($element['dep']);
						$this->clientes->setFechaRegistro($element['fecha_registro']);
						$this->clientes->setFechaInactivo($element['fecha_inactivo']);
						$this->clientes->setDireccionCliente($element['direccion_cliente']);
						$this->clientes->setEstado($element['estado']);
						$this->clientes->setTipoCliente($element['tipo_cliente']);
						$this->clientes->setSucursal($element['sucursal']);
						$this->clientes->setFormaPago($element['forma_pago']);
						$this->clientes->setAutorizador($element['autorizador']);
						$this->clientes->setClienteEspecial($element['cliente_especial']);
						$this->clientes->setObservacion($element['observacion']);
						$this->clientes->createCustomer();
				}
				redirect('Clientes');
		}
}


public function excelexport(){
	 $llamadas = $this->clientes->getclientes();
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
			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(5);
			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(40);
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
			 //Definimos los títulos de la cabecera.
			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'NIT');
			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'EMPRESA');
			 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'REPRESENTANTE LEGAL');
			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'NOMBRE Y APELLIDO');
			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CÉDULA');
			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TELÉFONO');
			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'CORREO');
			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'DEPARTAMENTO');
			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CIUDAD');
			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'FECHA INACTIVO');
			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCIÓN DEL CLIENTE');
			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'ESTADO');
			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'TIPO DE CLIENTES');
			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'SUCURSAL');
			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FORMA DE PAGO');
			 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'USUARIO AUTORIZADOR');
			 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'CLIENTE ESPECIAL');
			 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'OBSERVACIÓN');
			 //Definimos la data del cuerpo.
			 foreach($llamadas as $l){
					//Incrementamos una fila más, para ir a la siguiente.
					$contador++;
					//Informacion de las filas de la consulta.
					$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->nit_cliente);
					$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
					$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->r_legal);
					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->nombre_cliente);
					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula_cliente);
					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->telefono_cliente);
					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->correo_cliente);
					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->departamento);
					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->ciudad);
					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->fecha_inactivo);
					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_cliente);
					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->estado);
					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->tipo_cliente);
					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->nombre_sucursal);
					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->forma);
					$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre." ".$l->apellido);
					$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->cliente_especial);
					$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->observacion);
			 }
			 //Le ponemos un nombre al archivo que se va a generar.
			 $archivo = "Clientes_excel.xls";
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


			 public function pdf(){
				 $this->load->library('Pdf');

     			$hoy=date("d/m/y");
     			$html_content = $this->clientes->fetch_details();
					$this->pdf->set_paper('letter', 'landscape');
     			$this->pdf->loadHtml($html_content);
     			$this->pdf->render();
     			$this->pdf->stream("Clientestvgcargos.pdf", array("Attachment"=>0));

			}



// checkFileValidation
public function checkFileValidation($string) {
		$mime_types = array(
				'text/csv',
				'text/x-csv',
				'application/csv',
				'application/x-csv',
				'application/excel',
				'text/x-comma-separated-values',
				'text/comma-separated-values',
				'application/octet-stream',
				'application/vnd.ms-excel',
				'application/vnd.msexcel',
				'text/plain',
		);
		if(isset($_FILES['fileURL']['name']) && $_FILES['fileURL']['name'] != ""){
				// get mime by extension
				$mime = get_mime_by_extension($_FILES['fileURL']['name']);
				$fileExt = explode('.', $_FILES['fileURL']['name']);
				$ext = end($fileExt);
				if(($ext == 'csv') && in_array($mime, $mime_types)){
						return true;
				}else{
						$this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
						return false;
				}
		}else{
				$this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
				return false;
		}
}


}
