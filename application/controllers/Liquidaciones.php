<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Liquidaciones extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Liquidaciones_model', 'Liquidaciones');
	  }
    public function index() {
			if( ! $this->verify_min_level(9)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Liquidaciones/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getLiquidaciones($id=0) {

				  $data['Liquidaciones'] = $this->Liquidaciones->getLiquidaciones();
				  header('Content-Type: application/json');
				  echo json_encode(['Liquidaciones' => $data['Liquidaciones']]);

				}
				public function getCotizaciones($id=0) {
						$cedula = $this->input->post('cedula');
					  $data['cotizaciones'] = $this->Liquidaciones->getCotizaciones($cedula);
					  header('Content-Type: application/json');
					  echo json_encode(['cotizaciones' => $data['cotizaciones']]);
					}

			public function insertar() {
				if( ! $this->verify_min_level(9)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$data = json_decode($this->input->post('service_form'),true);
				$result = $this->Liquidaciones->insertar($data);
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
				$result = $this->Liquidaciones->editar($data);
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
	            $result = $this->Liquidaciones->deleteLiquidaciones($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_Liquidaciones() {
		        $id = $this->input->post('id');
					  $data['Liquidaciones'] = $this->Liquidaciones->get_Liquidaciones($id);
					  header('Content-Type: application/json');
					  echo json_encode(['Liquidaciones' => $data['Liquidaciones']]);
		 }
}
