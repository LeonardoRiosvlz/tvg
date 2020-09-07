<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cotizaciones extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Cotizaciones_model', 'cotizaciones');
	  }
    public function index() {
			if( ! $this->verify_min_level(9)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('cotizaciones/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getcotizaciones($id=0) {

				  $data['cotizaciones'] = $this->cotizaciones->getcotizaciones();
				  header('Content-Type: application/json');
				  echo json_encode(['cotizaciones' => $data['cotizaciones']]);

				}

			public function insertar() {
				if( ! $this->verify_min_level(9)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$data = json_decode($this->input->post('service_form'),true);
				$result = $this->cotizaciones->insertar($data);
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
				$result = $this->cotizaciones->editar($data);
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
	            $result = $this->cotizaciones->deletecotizaciones($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_cotizaciones() {
		        $id = $this->input->post('id');
					  $data['cotizaciones'] = $this->cotizaciones->get_cotizaciones($id);
					  header('Content-Type: application/json');
					  echo json_encode(['cotizaciones' => $data['cotizaciones']]);
		 }
}
