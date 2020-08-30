<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Clientes extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Clientes_model', 'clientes');
		// Load form validation library
		$this->load->library('form_validation');
		// load CSV library
		$this->load->library('CSVReader');
		// Load file helper
		$this->load->helper('file');
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
			 //csv file name
	 		$filename = 'clientes_'.date('Ymd').'.csv';
	 		header("Content-Description: File Transfer");
	 		header("Content-Disposition: attachment; filename=$filename");
	 		header("Content-Type: application/csv; ");

	 		// get data
	 		$usersData = $this->clientes->get_clientes();

	 		// file creation
	 		$file = fopen('php://output', 'w');

	 		$header = array("id","nit_cliente","nombre_empresa","r_legal","nombre_cliente","cedula_cliente","telefono_cliente","correo_cliente","departamento","ciudad","dep","direccion_cliente","estado","fecha_inactivo","tipo_cliente","sucursal","forma_pago","autorizador","cliente_especial","observacion");
	 		fputcsv($file, $header);

	 		foreach ($usersData as $key=>$line){
	 		 fputcsv($file,$line);
	 		}

	 		fclose($file);
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
						$this->clientes->setTelefonoCliente($element['telefono_cliente']);
						$this->clientes->setCorreoCliente($element['correo_cliente']);
						$this->clientes->setDepartamento($element['departamento']);
						$this->clientes->setCiudad($element['ciudad']);
						$this->clientes->setDep($element['dep']);
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

		}
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
