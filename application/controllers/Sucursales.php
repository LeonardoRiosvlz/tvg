<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Sucursales extends MY_Controller {
	private $request;
	public function __construct() {
		parent::__construct();
		$this->load->model('Sucursales_model', 'sucursales');
	  }
    public function index() {
			if( ! $this->verify_min_level(1)){
				redirect (base_url());
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Sucursales/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getsucursales($id=0) {

				  $data['sucursales'] = $this->sucursales->getsucursales();
				  header('Content-Type: application/json');
				  echo json_encode(['sucursales' => $data['sucursales']]);

				}
				public function getsucursalesTags($id=0) {

			  $data['sucursales'] = $this->sucursales->getsucursalesTags();
			  header('Content-Type: application/json');
			  echo json_encode(['sucursales' => $data['sucursales']]);

			}
			public function insertar() {
				if( ! $this->verify_min_level(1)){
					redirect (base_url());
				}
				$data = json_decode($this->input->post('service_form'),true);
				$result = $this->sucursales->insertar($data);
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
				$result = $this->sucursales->editar($data);
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
            $result = $this->sucursales->deletesucursales($id);
               if($result['code'] == 0){
                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
                  }
                else{
                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
                  }
     		 }
				 public function get_sucursales() {
		             $id = $this->input->post('id');
										 $data['sucursales'] = $this->sucursales->get_sucursales($id);
							 		  header('Content-Type: application/json');
							 		  echo json_encode(['sucursales' => $data['sucursales']]);
		      		 }
}
