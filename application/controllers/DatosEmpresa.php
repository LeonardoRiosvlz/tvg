<?php defined('BASEPATH') OR exit('No direct script access allowed');
class DatosEmpresa extends MY_Controller {
	private $request;
	public function __construct() {
		parent::__construct();
		$this->load->model('DatosEmpresa_model', 'empresa');
	  }
    public function index() {
			if( ! $this->verify_min_level(6)){
				redirect (base_url());
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
				if( ! $this->verify_min_level(6)){
					redirect (base_url());
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

							public function logo_uno() {
								$config['upload_path']          = './include/img/';
								$config['allowed_types']        = 'jpg|png|jpeg';
								$config['max_size']             = 7500;
								$config['max_width']            = 12500;
								$config['max_height']           = 11400;
								$this->load->library('upload', $config);
								if ( ! $this->upload->do_upload('file')) {
									$error = array('error' => $this->upload->display_errors());
									echo json_encode($error);
								} else {
									$upload_data = $this->upload->data();
									$file_name = $upload_data['file_name'];
									$data['logo_uno'] ="include/img/".$file_name;
									$rut=$this->empresa->logo_uno($data);
									echo json_encode(['status' => '201', 'message' => 'Imagen creada exitosamente']);
								}
							}
							public function logo_dos() {
								$config['upload_path']          = './include/img/';
								$config['allowed_types']        = 'jpg|png|jpeg';
								$config['max_size']             = 7500;
								$config['max_width']            = 12500;
								$config['max_height']           = 11400;
								$this->load->library('upload', $config);
								if ( ! $this->upload->do_upload('file')) {
									$error = array('error' => $this->upload->display_errors());
									echo json_encode($error);
								} else {
									$upload_data = $this->upload->data();
									$file_name = $upload_data['file_name'];
									$data['logo_dos'] ="include/img/".$file_name;
									$rut=$this->empresa->logo_dos($data);
									echo json_encode(['status' => '201', 'message' => 'Imagen creada exitosamente']);
								}
							}
}
