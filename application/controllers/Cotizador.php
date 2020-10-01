<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cotizador extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Cargos_model', 'cargos');
	  }
    public function index() {

     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Cotizador/index');
        $this->load->view('footer',["js"=>[""]]);
      }

}
