<?php defined('BASEPATH') OR exit('No direct script access allowed');
class TipoCarga extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('tipocarga_model', 'tipocarga');
	  }
    public function index() {
			if( ! $this->verify_min_level(9)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('TipoCarga/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function gettipocarga($id=0) {

				  $data['tipocarga'] = $this->tipocarga->gettipocarga();
				  header('Content-Type: application/json');
				  echo json_encode(['tipocarga' => $data['tipocarga']]);

				}

			public function insertar() {
				if( ! $this->verify_min_level(9)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$data = json_decode($this->input->post('service_form'),true);
				$result = $this->tipocarga->insertar($data);
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
				$result = $this->tipocarga->editar($data);
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
	            $result = $this->tipocarga->deletetipocarga($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_tipocarga() {
		        $id = $this->input->post('id');
					  $data['tipocarga'] = $this->tipocarga->get_tipocarga($id);
					  header('Content-Type: application/json');
					  echo json_encode(['tipocarga' => $data['tipocarga']]);
		 }
}