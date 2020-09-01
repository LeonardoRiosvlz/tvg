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
			if( ! $this->verify_min_level(9)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('ClientesEspeciales/index');
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

		////////////////
				public function detail_foto() {
					if( ! $this->verify_min_level(9)){
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

				$id = $this->input->post('id_pro');
				$data['imagenes'] = $this->historial->imagenes_get($id);
				header('Content-Type: application/json');
				echo json_encode(['imagenes' => $data['imagenes']]);

				}

				public function eliminarImagen() {
					if( ! $this->verify_min_level(9)){
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

}
