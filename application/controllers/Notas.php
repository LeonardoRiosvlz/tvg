<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Notas extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('notas_model', 'notas');
	  }
    public function index() {
			if( ! $this->verify_min_level(1)){
				redirect (base_url());
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Notas/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getnotas($id=0) {

				  $data['notas'] = $this->notas->getnotas();
				  header('Content-Type: application/json');
				  echo json_encode(['notas' => $data['notas']]);

				}
				public function getnotass($id=0) {

					  $data['notas'] = $this->notas->getnotass();
					  header('Content-Type: application/json');
					  echo json_encode(['notas' => $data['notas']]);

					}
			public function insertar() {
				if( ! $this->verify_min_level(1)){
					redirect (base_url());
				}
				$data = json_decode($this->input->post('service_form'),true);
				$result = $this->notas->insertar($data);
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
				$result = $this->notas->editar($data);
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
	            $result = $this->notas->deletenotas($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_notas() {
		        $id = $this->input->post('id');
					  $data['notas'] = $this->notas->get_notas($id);
					  header('Content-Type: application/json');
					  echo json_encode(['notas' => $data['notas']]);
		 }
}
