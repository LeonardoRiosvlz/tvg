<?php defined('BASEPATH') OR exit('No direct script access allowed');
class TiposEnvios extends MY_Controller {
	private $request;
	public function __construct() {
		parent::__construct();
		$this->load->model('Tiposenvios_model', 'tiposenvios');
	  }
    public function index() {
			if( ! $this->verify_min_level(9)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Tiposenvios/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function gettiposenvios($id=0) {

				  $data['tiposenvios'] = $this->tiposenvios->gettiposenvios();
				  header('Content-Type: application/json');
				  echo json_encode(['tiposenvios' => $data['tiposenvios']]);

				}
			public function gettiposenviosTags($id=0) {

			  $data['tiposenvios'] = $this->tiposenvios->gettiposenviosTags();
			  header('Content-Type: application/json');
			  echo json_encode(['tiposenvios' => $data['tiposenvios']]);

			}
			public function insertar() {
				if( ! $this->verify_min_level(9)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$data = json_decode($this->input->post('service_form'),true);
				$result = $this->tiposenvios->insertar($data);
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
				$result = $this->tiposenvios->editar($data);
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
	            $result = $this->tiposenvios->deletetiposenvios($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_tiposenvios() {
		        $id = $this->input->post('id');
					  $data['tiposenvios'] = $this->tiposenvios->get_tiposenvios($id);
					  header('Content-Type: application/json');
					  echo json_encode(['tiposenvios' => $data['tiposenvios']]);
		 }
}
