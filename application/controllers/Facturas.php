<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Facturas extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Facturas_model', 'facturas');
		$this->load->model('Archivos_model', 'archivos');
	  }
    public function index() {
			if( ! $this->verify_min_level(9)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('facturas/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getfacturas($id=0) {

				  $data['facturas'] = $this->facturas->getfacturas();
				  header('Content-Type: application/json');
				  echo json_encode(['facturas' => $data['facturas']]);

				}

			public function insertar() {
				if( ! $this->verify_min_level(9)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
				$data = json_decode($this->input->post('service_form'),true);
				$data['id']    = $this->facturas->get_unused_id();
				$result = $this->facturas->insertar($data);
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
				$result = $this->facturas->editar($data);
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
	            $result = $this->facturas->deletefacturas($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				 public function generar(){
					 $data = json_decode($this->input->post('service_form'),true);
					 $data['id_archivo']= $this->archivos->get_unused_id();
					 $data['tipo']="Factura";
					 $data['tipo_archivo']="PDF";
					 $result = $this->archivos->insertar_factura($data);
						 if($result['code'] == 0){
							 $results = $this->facturas->generar($data);
							 echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
						 }
						 else{
							 echo json_encode(['status' => '500', 'message' => $data['id_archivo']]);
						 }
					}
					public function to_pdf($id){
						$this->load->library('Pdf');
						 $hoy=date("d/m/y");
						 $html_content = $this->facturas->fetch_details($id);
						 //$this->pdf->set_paper('letter', 'landscape');
						 $this->pdf->loadHtml($html_content);
						 $this->pdf->render();
						 $this->pdf->stream("FV-".$id.".pdf", array("Attachment"=>0));

				 }
				public function get_facturas() {
		        $id = $this->input->post('id');
					  $data['facturas'] = $this->facturas->get_facturas($id);
					  header('Content-Type: application/json');
					  echo json_encode(['facturas' => $data['facturas']]);
		 }
}