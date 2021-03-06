<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Liquidaciones extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Liquidaciones_model', 'Liquidaciones');
		$this->load->model('Archivos_model', 'archivos');
	  }
    public function index() {
			if( ! $this->verify_min_level(1)){
				redirect (base_url());
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Liquidaciones/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getLiquidaciones($id=0) {
					$cedula = $this->input->post('cedula');
				  $data['liquidaciones'] = $this->Liquidaciones->getLiquidaciones($cedula);
				  header('Content-Type: application/json');
				  echo json_encode(['liquidaciones' => $data['liquidaciones']]);

				}
				public function getLiquidacion($id=0) {
						$id = $this->input->post('id');
						$data['liquidaciones'] = $this->Liquidaciones->getLiquidacion($id);
						header('Content-Type: application/json');
						echo json_encode(['liquidaciones' => $data['liquidaciones']]);
					}
				public function getCotizaciones($id=0) {
						$cedula = $this->input->post('cedula');
					  $data['cotizaciones'] = $this->Liquidaciones->getCotizaciones($cedula);
					  header('Content-Type: application/json');
					  echo json_encode(['cotizaciones' => $data['cotizaciones']]);
					}

			public function insertar() {
				if( ! $this->verify_min_level(1)){
					redirect (base_url());
				}
				$data = json_decode($this->input->post('service_form'),true);
				$data['id']    = $this->Liquidaciones->get_unused_id();
				$result = $this->Liquidaciones->insertar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'id' => $data['id'] ]);
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
				$result = $this->Liquidaciones->editar($data);
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
	            $result = $this->Liquidaciones->deleteLiquidaciones($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_Liquidaciones() {
		        $id = $this->input->post('id');
					  $data['Liquidaciones'] = $this->Liquidaciones->get_Liquidaciones($id);
					  header('Content-Type: application/json');
					  echo json_encode(['Liquidaciones' => $data['Liquidaciones']]);
		 }
		 public function Liquidaciones_to_pdf($id){
			 $this->load->library('Pdf');
				$hoy=date("d/m/y");
				$html_content = $this->Liquidaciones->fetch_details($id);
				//$this->pdf->set_paper('letter', 'landscape');
				$this->pdf->loadHtml($html_content);
				$this->pdf->render();
				$this->pdf->stream("PLN-".$id.".pdf", array("Attachment"=>0));

		}
		public function generar(){
			$data = json_decode($this->input->post('service_form'),true);
			$data['id']= $this->archivos->get_unused_id();
			$data['tipo']="Planilla de liquidación";
			$data['tipo_archivo']="PDF";
			$result = $this->archivos->insertar_planilla($data);
				if($result['code'] == 0){
					$results = $this->Liquidaciones->generar($data);
					echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
				}
				else{
					echo json_encode(['status' => '500', 'message' => $data['id_archivo']]);
				}
		 }
}
