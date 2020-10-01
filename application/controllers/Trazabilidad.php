<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Trazabilidad extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Trazabilidad_model', 'trazabilidad');
		$this->load->model('Guias_model', 'guias');
	  }
    public function index() {
			if( ! $this->verify_min_level(6)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Trazabilidad/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function timeline() {
	     		$this->is_logged_in();
	        $this->load->view('header',["css"=>[""]]);
					$this->load->view('menu_blank',["css"=>[""]]);
	        $this->load->view('Trazabilidad/timeline');
	        $this->load->view('footer',["js"=>[""]]);
	      }
				public function satelites() {
						$this->is_logged_in();
						$this->load->view('header',["css"=>[""]]);
						$this->load->view('menu_blank',["css"=>[""]]);
						$this->load->view('Trazabilidad/satelite');
						$this->load->view('footer',["js"=>[""]]);
					}
			public function gettrazabilidad($id=0) {
					$datas['id_guia'] = $this->input->post('id_guia');
					$datas['prefijo'] = $this->input->post('prefijo');
				  $data['trazabilidad'] = $this->trazabilidad->gettrazabilidad($datas);
				  header('Content-Type: application/json');
				  echo json_encode(['trazabilidad' => $data['trazabilidad']]);

				}

			public function insertar() {
				if( ! $this->verify_min_level(6)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$config['upload_path']          = './include/img/trazabilidad/';
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['max_size']             = 70500;
				$config['max_width']            = 20500;
				$config['max_height']           = 14000;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('files')) {
					$error = array('error' => $this->upload->display_errors());
					echo json_encode($error);
				} else {
					$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];
					$data = json_decode($this->input->post('service_form'),true);
					$data['url_foto'] ="/include/img/trazabilidad/".$file_name;
					$result = $this->trazabilidad->insertar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}

				}
			public function editar() {
				if( ! $this->verify_min_level(6)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
			    $data = json_decode($this->input->post('service_form'),true);
				$result = $this->trazabilidad->editar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
				public function editar_img() {
					if( ! $this->verify_min_level(6)){
						redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
					}
					$config['upload_path']          = './include/img/trazabilidad/';
					$config['allowed_types']        = 'jpg|png|jpeg';
					$config['max_size']             = 70500;
					$config['max_width']            = 20500;
					$config['max_height']           = 14000;
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('files')) {
						$error = array('error' => $this->upload->display_errors());
						echo json_encode($error);
					} else {
						$upload_data = $this->upload->data();
						$file_name = $upload_data['file_name'];
						$data = json_decode($this->input->post('service_form'),true);
						$data['url_foto'] ="/include/img/trazabilidad/".$file_name;
						$result = $this->trazabilidad->editar_img($data);
						if($result['code'] == 0){
							echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
						}
						else{
							echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
						}
					}
				}
				public function get_id_n($id=0) {
						$datas['id'] = $this->input->post('id');
						$data['guias'] = $this->trazabilidad->get_id_n($datas);
						header('Content-Type: application/json');
						echo json_encode(['guias' => $data['guias']]);
					}
					public function get_id_e($id=0) {
							$datas['id'] = $this->input->post('id');
							$data['guias'] = $this->trazabilidad->get_id_e($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
						public function get_id_ns($id=0) {
								$datas['id'] = $this->input->post('id');
								$datas['s'] = $this->input->post('s');
								$data['guias'] = $this->trazabilidad->get_id_n($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
							public function get_id_es($id=0) {
									$datas['id'] = $this->input->post('id');
									$datas['s'] = $this->input->post('s');
									$data['guias'] = $this->trazabilidad->get_id_e($datas);
									header('Content-Type: application/json');
									echo json_encode(['guias' => $data['guias']]);
								}
			public function eliminar() {
				if( ! $this->verify_min_level(6)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
	            $id = $this->input->post('id');
	            $result = $this->trazabilidad->deletetrazabilidad($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_trazabilidad() {
		        $id = $this->input->post('id');
					  $data['trazabilidad'] = $this->trazabilidad->get_trazabilidad($id);
					  header('Content-Type: application/json');
					  echo json_encode(['trazabilidad' => $data['trazabilidad']]);
		 }
		 public function get_satelite() {
				 $id = $this->input->post('id');
				 $data['satelite'] = $this->trazabilidad->get_satelite($id);
				 header('Content-Type: application/json');
				 echo json_encode(['satelite' => $data['satelite']]);
	}
}
