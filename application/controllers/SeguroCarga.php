<?php defined('BASEPATH') OR exit('No direct script access allowed');
class SeguroCarga extends MY_Controller {
	private $request;
	public function __construct() {
		parent::__construct();
		$this->load->model('Segurocarga_model', 'segurocarga');
	  }
    public function index() {
			if( ! $this->verify_min_level(6)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Segurocarga/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getsegurocarga($id=0) {

				  $data['segurocarga'] = $this->segurocarga->getsegurocarga();
				  header('Content-Type: application/json');
				  echo json_encode(['segurocarga' => $data['segurocarga']]);

				}
			public function getsegurocargaTags($id=0) {

			  $data['segurocarga'] = $this->segurocarga->getsegurocargaTags();
			  header('Content-Type: application/json');
			  echo json_encode(['segurocarga' => $data['segurocarga']]);

			}
			public function insertar() {
				if( ! $this->verify_min_level(6)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$data = json_decode($this->input->post('service_form'),true);
				$result = $this->segurocarga->insertar($data);
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
				$result = $this->segurocarga->editar($data);
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
	            $result = $this->segurocarga->deletesegurocarga($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_segurocarga() {
		        $id = $this->input->post('id');
					  $data['segurocarga'] = $this->segurocarga->get_segurocarga($id);
					  header('Content-Type: application/json');
					  echo json_encode(['segurocarga' => $data['segurocarga']]);
		 }
}
