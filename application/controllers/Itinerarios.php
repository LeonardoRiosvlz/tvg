<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Itinerarios extends MY_Controller {
	private $request;
	public function __construct() {
		parent::__construct();
		$this->load->model('Itinerarios_model', 'itinerarios');
	  }
    public function index() {
			if( ! $this->verify_min_level(6)){
				redirect (base_url());
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Itinerarios/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getitinerarios($id=0) {

				  $data['itinerarios'] = $this->itinerarios->getitinerarios();
				  header('Content-Type: application/json');
				  echo json_encode(['itinerarios' => $data['itinerarios']]);

				}
			public function getitinerariosTags($id=0) {

			  $data['itinerarios'] = $this->itinerarios->getitinerariosTags();
			  header('Content-Type: application/json');
			  echo json_encode(['itinerarios' => $data['itinerarios']]);

			}
			public function insertar() {
				if( ! $this->verify_min_level(1)){
					redirect (base_url());
				}
				$data = json_decode($this->input->post('service_form'),true);
				$result = $this->itinerarios->insertar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
			public function editar() {
				if( ! $this->verify_min_level(1)){
					redirect (base_url());
				}
			    $data = json_decode($this->input->post('service_form'),true);
				$result = $this->itinerarios->editar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
			public function eliminar() {
				if( ! $this->verify_min_level(1)){
					redirect (base_url());
				}
	            $id = $this->input->post('id');
	            $result = $this->itinerarios->deleteitinerarios($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_itinerarios() {
		        $id = $this->input->post('id');
					  $data['itinerarios'] = $this->itinerarios->get_itinerarios($id);
					  header('Content-Type: application/json');
					  echo json_encode(['itinerarios' => $data['itinerarios']]);
		 }
}
