<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Actas_recogida extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Actas_recogida_model', 'actas_recogida');
	  }
    public function index() {
			if( ! $this->verify_min_level(9)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('actas_recogida/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getactas_recogida($id=0) {

				  $data['actas_recogida'] = $this->actas_recogida->getactas_recogida();
				  header('Content-Type: application/json');
				  echo json_encode(['actas_recogida' => $data['actas_recogida']]);

				}

			public function insertar() {
				if( ! $this->verify_min_level(9)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$data = json_decode($this->input->post('service_form'),true);
				$data['id']    = $this->actas_recogida->get_unused_id();
				$result = $this->actas_recogida->insertar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'id' => $data['id']]);
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
				$result = $this->actas_recogida->editar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'id' => $data['id']]);
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
	            $result = $this->actas_recogida->deleteactas_recogida($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_actas_recogida() {
		        $id = $this->input->post('id');
					  $data['actas_recogida'] = $this->actas_recogida->get_actas_recogida($id);
					  header('Content-Type: application/json');
					  echo json_encode(['actas_recogida' => $data['actas_recogida']]);
		 }
		 public function to_pdf($id){
			 $this->load->library('Pdf');
				$hoy=date("d/m/y");
				$html_content = $this->actas_recogida->fetch_details($id);
				//$this->pdf->set_paper('letter', 'landscape');
				$this->pdf->loadHtml($html_content);
				$this->pdf->render();
				$this->pdf->stream("ADE-".$id.".pdf", array("Attachment"=>0));

		}
}
