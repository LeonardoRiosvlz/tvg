<?php defined('BASEPATH') OR exit('No direct script access allowed');
class DatosEmpresa extends MY_Controller {
	private $request;
	public function __construct() {
		parent::__construct();
		$this->load->model('DatosEmpresa_model', 'empresa');
	  }
    public function index() {
			if( ! $this->verify_min_level(6)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('DatosEmpresa/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getempresa($id=0) {

				  $data['empresa'] = $this->empresa->getempresa();
				  header('Content-Type: application/json');
				  echo json_encode(['empresa' => $data['empresa']]);

				}
				public function getempresaTags($id=0) {

			  $data['empresa'] = $this->empresa->getempresaTags();
			  header('Content-Type: application/json');
			  echo json_encode(['empresa' => $data['empresa']]);

			}
			public function editar() {
				if( ! $this->verify_min_level(9)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
			    $data = json_decode($this->input->post('service_form'),true);
				$result = $this->empresa->editar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}

				 public function get_empresa() {
		             $id = $this->input->post('id');
										 $data['empresa'] = $this->empresa->get_empresa($id);
							 		  header('Content-Type: application/json');
							 		  echo json_encode(['empresa' => $data['empresa']]);
		      		 }
}
