<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cargos extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Cargos_model', 'cargos');
	  }
    public function index() {
			if( ! $this->verify_min_level(1)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Cargos/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getcargos($id=0) {

				  $data['cargos'] = $this->cargos->getcargos();
				  header('Content-Type: application/json');
				  echo json_encode(['cargos' => $data['cargos']]);

				}

			public function insertar() {
				if( ! $this->verify_min_level(1)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$data = json_decode($this->input->post('service_form'),true);
				$result = $this->cargos->insertar($data);
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
				$result = $this->cargos->editar($data);
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
	            $result = $this->cargos->deletecargos($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_cargos() {
		        $id = $this->input->post('id');
					  $data['cargos'] = $this->cargos->get_cargos($id);
					  header('Content-Type: application/json');
					  echo json_encode(['cargos' => $data['cargos']]);
		 }
}
