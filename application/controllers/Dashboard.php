<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	private $request;
	public function __construct() {
		parent::__construct();
		//$this->load->model('Dashboard_model', 'dashboard');
	  }
    public function index() {

			if( ! $this->verify_min_level(9)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     $this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Dashboard/index');
        $this->load->view('footer',["js"=>[""]]);

      }
      	function getRecibido($id=0) {

		  $data['recibido'] = $this->dashboard->getRecibido();
		  header('Content-Type: application/json');
		  echo json_encode(['recibido' => $data['recibido']]);

		}
		function getPendiente($id=0) {

		  $data['pendiente'] = $this->dashboard->getpendiente();
		  header('Content-Type: application/json');
		  echo json_encode(['pendiente' => $data['pendiente']]);

		}
		function getVentas($id=0) {

			$data['ventas'] = $this->dashboard->getventas();
			header('Content-Type: application/json');
			echo json_encode(['ventas' => $data['ventas']]);

		}
		function getClaims($id=0) {

			$data['claims'] = $this->dashboard->getclaims();
			header('Content-Type: application/json');
			echo json_encode(['claims' => $data['claims']]);

		}
		function getSolicitudes($id=0) {

			$data['solicitudes'] = $this->dashboard->getSolicitudes();
			header('Content-Type: application/json');
			echo json_encode(['solicitudes' => $data['solicitudes']]);

		}
		function getPagos($id=0) {

			$data['pagos'] = $this->dashboard->getPagos();
			header('Content-Type: application/json');
			echo json_encode(['pagos' => $data['pagos']]);

		}
		function getEnvios($id=0) {

			$data['envios'] = $this->dashboard->getEnvios();
			header('Content-Type: application/json');
			echo json_encode(['envios' => $data['envios']]);

		}
}
