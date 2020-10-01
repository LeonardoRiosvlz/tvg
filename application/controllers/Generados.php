<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Generados extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Generados_model', 'generados');
	  }
    public function index() {
			if( ! $this->verify_min_level(6)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Generados/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getgenerados($id=0) {

				  $data['generados'] = $this->generados->getgenerados();
				  header('Content-Type: application/json');
				  echo json_encode(['generados' => $data['generados']]);

				}

			public function insertar() {
				if( ! $this->verify_min_level(6)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$data = json_decode($this->input->post('service_form'),true);
				$result = $this->generados->insertar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
			public function editar() {
				if( ! $this->verify_min_level(6)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
			    $data = json_decode($this->input->post('service_form'),true);
				$result = $this->generados->editar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
			public function eliminar() {
				if( ! $this->verify_min_level(6)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
	            $id = $this->input->post('id');
	            $result = $this->generados->deletegenerados($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_generados() {
		        $id = $this->input->post('id');
					  $data['generados'] = $this->generados->get_generados($id);
					  header('Content-Type: application/json');
					  echo json_encode(['generados' => $data['generados']]);
		 }
}
